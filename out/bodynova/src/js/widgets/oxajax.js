/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link      http://www.oxid-esales.com
 * @package   out
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop PE
 * @version   SVN: $Id: oxajax.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function ( $ ) {

    /**
     * Ajax
     */
    oxAjax = {

        /**
         * Loading temporary screen when ajax call proseeds
         */
        loadingScreen:  {

            /**
             * Starts load
             *
             * @target - DOM element witch must be hide with the loading screen
             * @iconPositionElement - element of a target on witch loaging icon is shown
             */
            start : function (target, iconPositionElement) {

                var loadingScreens = Array();
                $(target).each(function() {
                    var overlayKeeper = document.createElement("div");
                    overlayKeeper.innerHTML = '<div class="loadingfade"></div><div class="loadingicon"></div><div class="loadingiconbg"></div>';
                    $('div', overlayKeeper).css({
                            'position' : 'absolute',
                            'left'     : $(this).offset().left-10,
                            'top'      : $(this).offset().top-10,
                            'width'    : $(this).width()+20,
                            'height'   : $(this).height()+20
                        });
                    if (iconPositionElement && iconPositionElement.length) {
                        var x = Math.round(
                            iconPositionElement.offset().left // my left
                            - 10 - $(this).offset().left      // relativeness
                            + iconPositionElement.width()/2   // plus half of width to center
                        );
                        var offsetTop = iconPositionElement.offset().top;
                        var y = Math.round(
                            offsetTop                         //my top
                            - 10 - $(this).offset().top       // relativeness
                            + (                               // this requires, that last element in collection, would be the bottom one
                                                              // as it computes last element offset from the first one plus its height
                                iconPositionElement.last().offset().top - offsetTop + iconPositionElement.last().height()
                            )/2
                        );

                        $('div.loadingiconbg, div.loadingicon', overlayKeeper).css({
                            'background-position' : x + "px "+y+"px"
                        });
                    }
                    $('div.loadingfade', overlayKeeper)
                        .css({'opacity' : 0})
                        .animate({
                            opacity: 0.55
                        }, 200
                        );
                    $("body").append(overlayKeeper);
                    loadingScreens.push(overlayKeeper);
                });

                return loadingScreens;
            },


            /**
             * Stops viewing loading screens
             *
             * @loadingScreens - one or more showing screens
             */
            stop : function ( loadingScreens ) {
              $.each(loadingScreens, function(i, el) {
                  $('div', el).not('.loadingfade').remove();
                  $('div.loadingfade', el)
                      .stop(true, true)
                      .animate({
                          opacity: 0
                      }, 100, function(){
                          $(el).remove();
                      });
              });
            }
        },

        /**
         * Updating errors on page
         *
         * @errors - array of errors
         */
        updatePageErrors : function(errors) {
            if (errors.length) {
                var errlist = $("#content > .status.error");
                if (errlist.length == 0) {
                    $("#content").prepend("<div class='status error corners'>");
                    errlist = $("#content > .status.error");
                }
                if (errlist) {
                    errlist.children().remove();
                    var i;
                    for (i=0; i<errors.length; i++) {
                        var p = document.createElement('p');
                        $(p).append(document.createTextNode(errors[i]));
                        errlist.append(p);
                    }
                }
            } else {
                $("#content > .status.error").remove();
            }
        },

        /**
         * Ajax call
         *
         * @activator - link or form element that activates ajax call
         * @params - call params: targetEl, iconPosEl, onSuccess, onError, additionalData
         */
        ajax : function(activator, params) {
            var self = this;
            var inputs = {};
            var action = "";
            var type   = "";
            if (activator[0].tagName == 'FORM') {
                $("input", activator).each(function() {
                    inputs[this.name] = this.value;
                });
                action = activator.attr("action");
                type   = activator.attr("method");
            } else if (activator[0].tagName == 'A') {
                action = activator.attr("href");
            }

            if (params['additionalData']) {
                $.each(params['additionalData'], function(i, f) {inputs[i] = f;});
            }

            var sLoadingScreen = null;
            if (params['targetEl']) {
                sLoadingScreen = self.loadingScreen.start(params['targetEl'], params['iconPosEl']);
            }

            if (!type) {
                type = "get";
            }

            jQuery.ajax({
                data    : inputs,
                url     : action,
                type    : type,
                timeout : 30000,

                error   : function(jqXHR, textStatus, errorThrown) {
                    if (sLoadingScreen) {
                        self.loadingScreen.stop(sLoadingScreen);
                    }
                    if (params['onError']) {
                        params['onError'](jqXHR, textStatus, errorThrown);
                    }
                },

                success : function(r) {

                    if (sLoadingScreen) {
                        self.loadingScreen.stop(sLoadingScreen);
                    }
                    if (r['debuginfo'] != undefined && r['debuginfo']) {
                        $("body").append(r['debuginfo']);
                    }
                    if   (r['errors'] != undefined
                       && r['errors']['default'] != undefined) {
                        self.updatePageErrors(r['errors']['default']);
                    } else {
                        self.updatePageErrors([]);
                    }
                    if (params['onSuccess']) {
                        params['onSuccess'](r, inputs);
                    }
                }
            });
        },

        /**
         * Evals returned html and executes javascript after reload
         *
         * @container - witch javascript must be restarted
         */
        evalScripts : function(container){
            try {
                $("script", container).each(function(){
                    try {
                        eval(this.innerHTML);
                    } catch (e) {
                       //  console.error(e);
                    }
                    $(this).remove();
                });
            } catch (e) {
               //  console.error(e);
            }
        }
    };

    $.widget("ui.oxAjax", oxAjax );

})( jQuery )