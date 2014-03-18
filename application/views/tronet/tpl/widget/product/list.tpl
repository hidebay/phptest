[{ if $type=="line" || $type=="infogrid" }]
    [{oxscript include="js/widgets/oxcenterelementonhover.js" priority=10 }]
    [{oxscript add="$( '.pictureBox' ).oxCenterElementOnHover();" }]
[{/if}]

[{oxscript add="$('a.js-external').attr('target', '_blank');"}]

[{if $products|@count gt 0}]
    <ul class="[{$type}]View [{$clear}]" id="[{$listId}]">
        [{foreach from=$products item=_product name=productlist}]
            <li class="productData" itemscope itemtype="http://schema.org/Product">[{include file="widget/product/listitem_"|cat:$type|cat:".tpl" product=$_product testid=$listId|cat:"_"|cat:$smarty.foreach.productlist.iteration blDisableToCart=$blDisableToCart}]</li>
            [{*if ($type eq "infogrid" AND ($smarty.foreach.productlist.last) AND ($smarty.foreach.productlist.iteration % 2 != 0 )) }]
                <li class="productData"></li>
            [{/if*}]
        [{/foreach}]
    </ul>
[{/if}]