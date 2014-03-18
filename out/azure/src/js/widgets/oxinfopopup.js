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
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 * @version   SVN: $Id: oxinfopopup.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxInfoPopup = {
            options: {
                width         : 300,
                resizable     : true,
                zIndex         : 10000,
                target         : '#popup'
            },

            _create: function() {

                var self = this,
                options = self.options,
                el      = self.element;

                var position = el.position();

                el.click(function(){

                    self.openDialog(options.target, options, position);

                    return false;
                });
            },

             openDialog: function (target, options, position) {

                $(target).dialog({

                        width         : options.width,
                        modal         : false,
                        resizable     : options.resizable,
                        zIndex         : options.zIndex,
                        position     : [position.left + 30, position.top - 30],

                        open: function(event, ui) {

                        $('div.ui-dialog-titlebar').css("visibility", "hidden");
                    }
                });
             }
    };

    $.widget("ui.oxInfoPopup", oxInfoPopup );

} )( jQuery );