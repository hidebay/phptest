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
 * @version   SVN: $Id: oxlistremovebutton.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxListRemoveButton = {

        _create: function(){

            var self = this;
            var el   = self.element;

            el.click(function(){
                var targetForm = $(this).attr("triggerForm");
                $("#"+targetForm).submit();
                return false;
            });

        }
    }

    $.widget( "ui.oxListRemoveButton", oxListRemoveButton );

} )( jQuery );