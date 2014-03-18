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
 * @version   SVN: $Id: oxreview.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxReview = {
        options: {
            reviewButton : "#writeNewReview",
            reviewForm   : "#writeReview"
        },

        _create: function() {

            var self    = this;
            var options = self.options;
            var el      = self.element;

            $( options.reviewButton ).click(function(){
                $( options.reviewForm ).slideToggle();
                $( options.reviewButton ).hide();
                return false;
            });
        }
    };

    /**
     * Review widget
     */
    $.widget("ui.oxReview", oxReview );


} )( jQuery );