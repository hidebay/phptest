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
 * @version   SVN: $Id: oxtag.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function ( $ ) {

    oxTag = {

         highTag : function() {

            var oSelf = $(this);

            $("p.tagError").hide();

            oxAjax.ajax(
                $("#tagsForm"),
                {//targetEl, onSuccess, onError, additionalData
                    'targetEl' : $("#tags"),
                    'additionalData' : {'highTags' : oSelf.prev().text()},
                    'onSuccess' : function(response, params) {
                        oSelf.prev().addClass('taggedText');
                        oSelf.hide();
                    }
                }
            );
            return false;
        },

        saveTag : function() {
            $("p.tagError").hide();

            oxAjax.ajax(
                $("#tagsForm"),
                {//targetEl, onSuccess, onError, additionalData
                    'targetEl' : $("#tags"),
                    'additionalData' : {'blAjax' : '1'},
                    'onSuccess' : function(response, params) {
                        if ( response ) {
                            $(".tagCloud").append("<span class='taggedText'>" + params["newTags"] + "</span> ");
                        } else {
                            $("p.tagError").show();
                        }
                    }
                }
            );
            return false;
        },

        cancelTag : function () {
            oxAjax.ajax(
                $("#tagsForm"),
                {//targetEl, onSuccess, onError, additionalData
                    'targetEl' : $("#tags"),
                    'additionalData' : {'blAjax' : '1', 'fnc' : 'cancelTags'},
                    'onSuccess' : function(response, params) {
                        if ( response ) {
                            $('#tags').html(response);
                            $("#tags #editTag").click(oxTag.editTag);
                        }
                    }
                }
            );
            return false;
        },

        editTag : function() {

            oxAjax.ajax(
                $("#tagsForm"),
                { //targetEl, onSuccess, onError, additionalData
                    'targetEl' : $("#tags"),
                    'additionalData' : {'blAjax' : '1'},
                    'onSuccess' : function(response, params) {

                        if ( response ) {
                            $('#tags').html(response);
                            $("#tags .tagText").click(oxTag.highTag);
                            $('#tags #saveTag').click(oxTag.saveTag);
                            $('#tags #cancelTag').click(oxTag.cancelTag);
                        }
                    }
                }
            );

            return false;
        }
    }

    $.widget("ui.oxTag", oxTag );

})( jQuery )