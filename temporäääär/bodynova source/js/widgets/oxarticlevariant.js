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
 * @version   SVN: $Id: oxarticlevariant.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function ( $ ) {

    oxArticleVariant = {

        _create: function() {

            var self = this;
            //var options = self.options;

            /**
             * Variant selection dropdown
             */
            $('ul.vardrop a').click(function() {
                var obj = $( this );
                // resetting
                if ( obj.parents().hasClass("js-disabled") ) {
                    self.resetVariantSelections();
                } else {
                    $( "form.js-oxProductForm input[name=anid]" ).attr( "value", $( "form.js-oxProductForm input[name=parentid]" ).attr( "value" ) );
                }

                // setting new selection
                if ( obj.parents().hasClass("js-fnSubmit") ){
                    obj.parent('li').parent('ul').siblings('input:hidden').attr( "value", obj.attr("rel") );
                    var form = obj.closest("form");
                    $('input[name=fnc]', form).val("");
                    form.submit();
                }
                return false;
            });

            /**
             * variant reset link
             */
            $('div.variantReset a').click( function () {
                self.resetVariantSelections();
                var obj = $( this );
                var form = obj.closest("form");
                $('input[name=fnc]', form).val("");
                form.submit();
                return false;
            });

            $("form.js-oxProductForm").submit(function () {
                if (!$("input[name='fnc']", this).val()) {
                    if (($( "input[name=aid]", this ).val() == $( "input[name=parentid]", this ).val() )) {
                        var aSelectionInputs = $("input[name^=varselid]", this);
                        if (aSelectionInputs.length) {
                            var hash = '';
                            aSelectionInputs.not("*[value='']").each(function(i){
                                hash = hash+i+':'+$(this).val()+"|";
                            });
                            if ( jQuery.inArray( hash, oxVariantSelections ) ) {
                                return self.reloadProductPartially( $("form.js-oxProductForm"), 'detailsMain', $("#detailsMain"), $("#detailsMain")[0]);
                            }
                        }
                    }
                    return self.reloadProductPartially($("form.js-oxProductForm"),'productInfo',$("#productinfo"),$("#productinfo")[0]);
                }
            });

        },

        /**
         * Runs defined scripts inside the method, before ajax is called
         */
        _preAjaxCaller : function()
        {
            $('#zoomModal').remove();
        },

        reloadProductPartially : function(activator, renderPart, highlightTargets, contentTarget) {

            // calls some scripts before the ajax starts
            this._preAjaxCaller();

            oxAjax.ajax(
                activator,
                {//targetEl, onSuccess, onError, additionalData
                    'targetEl'  : highlightTargets,
                    'iconPosEl' : $("#variants .dropDown"),
                    'additionalData' : {'renderPartial' : renderPart},
                    'onSuccess' : function(r) {
                        contentTarget.innerHTML = r['content'];
                        oxAjax.evalScripts(contentTarget);
                    }
                }
            );
            return false;
        },

        resetVariantSelections : function()
        {
            var aVarSelections = $( "form.js-oxProductForm input[name^=varselid]" );
            for (var i = 0; i < aVarSelections.length; i++) {
                $( aVarSelections[i] ).attr( "value", "" );
            }
            $( "form.js-oxProductForm input[name=anid]" ).attr( "value", $( "form.js-oxProductForm input[name=parentid]" ).attr( "value" ) );
            
        }

    }

    $.widget("ui.oxArticleVariant", oxArticleVariant );

})( jQuery )