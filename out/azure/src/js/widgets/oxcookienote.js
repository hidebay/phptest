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
 * @version   SVN: $Id: oxcookienote.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function ( $ ) {

    /**
     * Cookie note handler
     */
    oxCookieNote = {
        options: {
            closeButton : ".dismiss"
        },
        /**
         * Enable cookie note dismiss
         *
         * @return false
         */
        _create: function() {
            var self = this;
            if( !$.cookie("displayedCookiesNotification") ) {
                $.cookie("displayedCookiesNotification", 1, { path: '/', expires: 30 });
            } else {
                self.element.remove();
                return false;
            }
            $(self.options.closeButton, self.element).click(
                function(){
                    self.element.fadeOut('slow').remove();
                    return false;
                }
            );
        }
    };

    /**
     * CookieNote widget
     */
    $.widget("ui.oxCookieNote", oxCookieNote );

})( jQuery );