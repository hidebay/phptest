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
 * @version   SVN: $Id: oxminibasket.js 35529 2011-05-23 07:31:20Z vilma $
 */
( function( $ ) {

    oxMiniBasket = {

        _create: function(){

            var self = this,
                options = self.options,
                el      = self.element;

            var timeout;

            // show on hover after some time
            $("#minibasketIcon", el).hover(function(){
                timeout = setTimeout(function(){
                    self.showMiniBasket();
                }, 500);
            }, function(){
                clearTimeout(timeout);
            });
            
            /*$("#basketFlyout").mouseout(function(){
              $(this).hide();
            });*/
            
            // show on click
            $("#minibasketIcon", el).click(function(){
                self.showMiniBasket();
            });

            // close basket
            $("#continue").click(function(){
                $(".basketFlyout").hide();
                clearTimeout(timeout);
                return false;
            });

            // show / hide added article message
            if($("#newItemMsg").length > 0){
                $("#countValue").hide();
                $("#newItemMsg").delay(500).fadeTo("fast", 0, function(){
                    $("#countValue").fadeTo("fast", 1);
                    $("#newItemMsg").remove()
                });
            }

            $("#countdown").countdown(
                function(count, element, container) {
                    if (count <= 1) {
                        //alert('aa');
                        //closing and emptying the basket
                        $(element).parents("#basketFlyout").hide();
                        $("#countValue").parent('span').remove();
                        $("#basketFlyout").remove();
                        $("#miniBasket #minibasketIcon").unbind('mouseenter mouseleave');
                        return container.not(element);
                    }
                    return null;
                }
            );

        },

        showMiniBasket : function(){
            $("#basketFlyout").show();

            if ($(".scrollable .scrollbarBox").length > 0) {
                $('.scrollable .scrollbarBox').jScrollPane({
                    showArrows: true,
                    verticalArrowPositions: 'split'
                });
            }
        }
    }

    $.widget( "ui.oxMiniBasket", oxMiniBasket );

} )( jQuery );

$(document).click(function(e) { 
  if (e.target.id) {
    if (e.target.id != 'minibasketIcon') {
      $(".basketFlyout").hide();
    }
  }
});

$(document).keypress(function(e) { 
  if (e.keyCode == 27) {
    $(".basketFlyout").hide();
  }
});

/*$('#miniBasket').mouseout(function(){
  window.setTimeout(
    function(){
      $('#basketFlyout').hide();
    }, 3000
  );  
});*/
