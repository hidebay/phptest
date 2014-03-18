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
 * @version OXID eShop EE
 * @version   SVN: $Id: oxmanufacturerslider.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    troTopArticlesSlider = {
            options: {
                classButtonNext    : '.nextItem',
                classButtonPrev    : '.prevItem'
            },

            _create: function() {

                var self = this,
                options = self.options,
                el         = self.element;

                 el.jCarouselLite({
                     btnNext: options.classButtonNext,
                     btnPrev: options.classButtonPrev,
                   visible: 4,
                   scroll: 4
                });
            }
    };

    $.widget("ui.troTopArticlesSlider", troTopArticlesSlider );

} )( jQuery );