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
 * @version   SVN: $Id: oxloginbox.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxLoginBox = {

        _create: function(){

            var self = this,
                options = self.options,
                el      = self.element;

            el.click(function(){
                $("#loginBox").show();
                return false;
            });

            $(".altLoginBox .fb_button").live("click", function(){
                $("#loginBox").hide();
            });

            $(document).click( function( e ){
                if( ! $(e.target).parents("div").hasClass("loginBox") ){
                    $("#loginBox").hide();
                }
            });

            $(document).keydown( function( e ) {
               if( e.which == 27) {
                    $("#loginBox").hide();
               }
            });
        }
    }

    $.widget( "ui.oxLoginBox", oxLoginBox );

} )( jQuery );