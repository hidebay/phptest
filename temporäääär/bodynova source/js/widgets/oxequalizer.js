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
 * @version   SVN: $Id: oxequalizer.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function ( $ ) {

    /**
     * Equalize columns
     */
    oxEqualizer = {

        /**
         * Gets tallest element value
         *
         * @return integer
         */
        equalHeight: function(group, target)
        {
            var self    = this;

            if (target) {
                if (group.height() < target.height()){
                    group.css("height", target.height());
                }
            } else {
                tallest = self.getTallest(group);
                group.each(function(){
                    if( $(this).hasClass('catPicOnly') && $(this).height() < tallest  ){
                        $(this).height(tallest+20);
                    }else{
                        $(this).height(tallest);

                    }
                });
            }
        },

        /**
         * Gets tallest element value
         *
         * @return integer
         */
        getTallest: function(el)
        {
            var tallest = 0;
            el.each(function(){
                var thisHeight = $(this).height();
                if (thisHeight > tallest) {
                    tallest = thisHeight;
                }
            });
            return tallest;
        }
    };

    /**
     * Equalizer widget
     */
    $.widget("ui.oxEqualizer", oxEqualizer );

})( jQuery )
