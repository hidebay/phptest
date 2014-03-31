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
 * @version   SVN: $Id: oxtopmenu.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxTopMenu = {

        _create: function(){

            var self = this,
                options = self.options,
                el      = self.element;


            if ($.browser.msie) {
                $("li:not(:has(ul))", el).hover(function(){
                    $(this).addClass("sfHover");
                }, function(){
                    $(" li:not(:has(ul))", el).removeClass("sfHover");
                });
            }

            //Categories menu init
            el.supersubs({
                minWidth:    12,   // minimum width of sub-menus in em units
                maxWidth:    35,   // maximum width of sub-menus in em units
                extraWidth:  1     // extra width can ensure lines don't sometimes turn over
                                   // due to slight rounding differences and font-family
            }).superfish( {
                 delay : 500,
                 dropShadows : false,
                 onBeforeShow : function() {
                    //adding hover class for active <A> elements
                    $('a:first', this.parent()).addClass($.fn.superfish.op.hoverClass);

                    // horizontaly centering top navigation first level popup accoring its parent
                    activeItem = this.parent()
                    if ( activeItem.parent().hasClass('sf-menu') ) {
                        liWidth = activeItem.width();
                        ulWidth = $('ul:first', activeItem).width();
                        marginWidth = (liWidth - ulWidth) / 2;
                        
                        var itemleft = activeItem.position().left + marginWidth;
                        if (itemleft < 0) marginWidth -= itemleft;

                        var pagewidth = $("#page").outerWidth(),
                        itemright = activeItem.position().left + this.outerWidth() + marginWidth;
                        if (itemright > pagewidth) marginWidth += pagewidth - itemright;

                        $('ul:first', activeItem).css("margin-left", marginWidth);
                    }
                },
                onHide : function() {
                    $('a:first-child',this.parent()).removeClass($.fn.superfish.op.hoverClass);
                }
            });
        }
    }

    $.widget( "ui.oxTopMenu", oxTopMenu );

} )( jQuery );

/*$('#navigation .sub a').mouseover(function() {
  $(this).parent().parent().parent().parent().children(":first-child").css('border-bottom','1px solid #000');
});

$('#navigation .sub a').mouseout(function() {
  $(this).parent().parent().parent().parent().children(":first-child").css('border-bottom','none');
});*/