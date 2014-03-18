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
 * @version   SVN: $Id: oxmodalpopup.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

     oxModalPopup = {
            options: {
                width        : 687,
                height       : 'auto',
                modal        : true,
                resizable    : true,
                zIndex       : 10000,
                position     : 'center',
                draggable    : true,
                target       : '#popup',
                openDialog   : false,
                loadUrl      : false
            },

            _create: function() {

                var self = this,
                options = self.options,
                el      = self.element;

                if (options.openDialog) {

                    if (options.loadUrl){
                        $(options.target).load(options.loadUrl);
                    }

                    self.openDialog(options.target, options);

                } else {

                    el.click(function(){

                        if (options.loadUrl){
                            $(options.target).load(options.loadUrl);
                        }

                        self.openDialog(options.target, options);

                        return false;
                    });
                }

                $("img.closePop, button.closePop", $( options.target ) ).click(function(){
                    $( options.target ).dialog("close");
                    return false;
                });
                
            },

            openDialog: function (target, options) {
                $(target).dialog({
                    width     : options.width,
                    height    : options.height,
                    modal     : options.modal,
                    resizable : options.resizable,
                    zIndex    : options.zIndex,
                    position  : options.position,
                    draggable : options.draggable,

                    open: function(event, ui) {
                        $('div.ui-dialog-titlebar').css("visibility", "hidden");
                    }
                });
            }
    };

    $.widget("ui.oxModalPopup", oxModalPopup );

} )( jQuery );