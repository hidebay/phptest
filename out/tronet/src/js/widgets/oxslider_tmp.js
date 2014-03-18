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
 * @version   SVN: $Id: oxslider.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxSlider = {
            options: {
                width                  : 940,
                height               : 220,
                autoPlay             : true,
                classPanel             : '.panel',
                classStartStop         : '.start-stop',
                classPromotionText     : '.promoBox',
                classNavigation        : '.thumbNav',
                classForwardArrow    : '.forward',
                classBackArrow        : '.back',
                classAnythingSlider    : '.anythingSlider',
                classThumbNav        : '.thumbNav',
                classAnythingControls    : '.anythingControls',
                elementLi             : 'li',
                eventMouseover        : "mouseover",
                eventMouseout        : "mouseout",
                opacity70            : 0.7,
                opacity100            : 1,
                opacity0            : 0

            },

            _create: function() {
               
                var self = this,
                options = self.options,
                el         = self.element;
                var oAnythingSlider;

                var aNavigationTabs = new Array();

                aNavigationTabs = self.getNavigationTabsArray(el, options.elementLi);

                el.anythingSlider({
                        width               : options.width,
                        height              : options.height,
                        autoPlay            : options.autoPlay,
                        startStopped        : false,
                        delay               : 6700,
                        animationTime       : 2700,
                        navigationFormatter : function(i, panel){
                            return aNavigationTabs[i - 1];
                        }
                });

                oAnythingSlider = $(options.classAnythingSlider);

                $(options.classAnythingControls, oAnythingSlider).css("left", (options.width - $(options.classThumbNav, oAnythingSlider).innerWidth() ) / 2);

                self.hideControls(oAnythingSlider);

                $("a[class^='panel']", oAnythingSlider).attr("rel", 'nofollow');

                var blOnNav = false;

                $(options.classPromotionText, el).each(function(){
                    var targetObj = $(this).children(".promoPrice");
                    var targetObjHeight = targetObj.nextAll("strong").height();
                    targetObj.css({
                        "height" : targetObjHeight,
                        "line-height" : targetObjHeight + "px"
                    });
                });


                oAnythingSlider.mouseover( function() {
                    self.showTextSpan(el, options.classPromotionText);
                    if ( ! blOnNav ){
                        self.showControlsWithOpacity(oAnythingSlider, options.opacity70);
                    }

                });

                $(options.classNavigation, oAnythingSlider).mouseover(function() {

                    self.showControlsWithOpacity(oAnythingSlider, options.opacity70);
                    self.showControlWithOpacity(oAnythingSlider, options.classNavigation, options.opacity100);
                      blOnNav = true;

                });

                $(options.classBackArrow, oAnythingSlider).mouseover(function() {

                    self.showControlsWithOpacity(oAnythingSlider, options.opacity70);
                    self.showControlWithOpacity(oAnythingSlider, options.classBackArrow, options.opacity100);
                      blOnNav = true;

                });

                $(options.classForwardArrow, oAnythingSlider).mouseover(function() {

                    self.showControlsWithOpacity(oAnythingSlider, options.opacity70);
                    self.showControlWithOpacity(oAnythingSlider, options.classForwardArrow, options.opacity100);
                      blOnNav = true;

                });

                oAnythingSlider.mouseout( function() {

                   self.hideTextSpan(el, options.classPromotionText);
                   self.showControlWithOpacity(oAnythingSlider, options.classNavigation, options.opacity0);
                   self.hideControls(oAnythingSlider);
                   blOnNav = false;

                });

            },

            /**
             * generate slider navigation array
             *
             * @return array
             */
            getNavigationTabsArray: function(oElement, stElementType){

                var aTabs = new Array();

                $( stElementType, oElement ).each( function( index ) {
                    aTabs[index] = index + 1;
                });

                return aTabs;
            },

            /**
             * shows controls with opacity (navigation, start-stop button, etc.)
             *
             * @return object
             */
            showControlsWithOpacity: function(oElement, fOpacity){

                oOptions = this.options;

                this.showControlWithOpacity(oElement, oOptions.classForwardArrow, fOpacity);
                this.showControlWithOpacity(oElement, oOptions.classBackArrow, fOpacity);
                this.showControlWithOpacity(oElement, oOptions.classNavigation, fOpacity);

            },

            /**
             * shows control with opacity (navigation, start-stop button, etc.)
             *
             * @return object
             */
            showControlWithOpacity: function(oElement, stClass, fOpacity){

                oElement = $(stClass, oElement).fadeTo(0, fOpacity);
                return oElement;

            },

            /**
             * Show control (navigation, start-stop button, etc.)
             *
             * @return object
             */
            showControl: function(oElement, stClass){

                oElement = $(stClass, oElement).show();
                return oElement;

            },

            /**
             * hide control (navigation, start-stop button, etc.)
             *
             * @return object
             */
            hideControl: function(oElement, stClass ){

                oElement = $(stClass, oElement).hide();
                return oElement;

            },

            /**
             * hides controla (navigation, start-stop button, etc.)
             *
             * @return object
             */
            hideControls: function(oElement){

                oOptions = this.options;

                this.hideControl(oElement, oOptions.classStartStop);
                this.hideControl(oElement, oOptions.classForwardArrow);
                this.hideControl(oElement, oOptions.classBackArrow);
                this.hideControl(oElement, oOptions.classNavigation);
            },

            /**
             * hides texts spans
             *
             * @return object
             */
            hideTextSpan: function(oElement, stClass ){

                oElement = $(stClass, oElement).css("visibility", "hidden");

                return oElement;
            },

            /**
             * shows texts spans
             *
             * @return object
             */
            showTextSpan: function(oElement, stClass ){

                oElement = $( stClass, oElement );
                oElement.css("visibility", "visible");

                /*var targetObj = oElement.children(".promoPrice");
                var targetObjHeight = targetObj.nextAll("strong").height();

                targetObj.css({
                    "height" : targetObjHeight,
                    "line-height" : targetObjHeight + "px"
                });*/

                return oElement;
            }

    };

    $.widget("ui.oxSlider", oxSlider );

} )( jQuery );