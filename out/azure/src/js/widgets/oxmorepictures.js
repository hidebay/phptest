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
 * @version   SVN: $Id: oxmorepictures.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxMorePictures = {

        options: {
            iDefaultIndex  : -1
        },

        _create: function() {

            var self    = this,
                options = self.options,
                el      = self.element;

            $("li a", el).click(function() {

                $("li a", el).removeClass("selected");
                $(this).addClass("selected");

                return false;
            });
        },

        _init: function() {
            var self    = this,
                options = self.options,
                el      = self.element;

            // checking which item should be selected
            if (options.iDefaultIndex != -1 && $("li a.selected", el).parent().index() != options.iDefaultIndex) {
                $("li a:eq("+ options.iDefaultIndex +")", el).trigger("click");
            }
        }
    }

    $.widget( "ui.oxMorePictures", oxMorePictures );

} )( jQuery );
