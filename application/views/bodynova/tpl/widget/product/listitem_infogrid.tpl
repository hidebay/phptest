[{block name="widget_product_listitem_grid"}]
  [{assign var="currency" value=$oView->getActCurrency()}]
  [{if $showMainLink}]
    [{assign var='_productLink' value=$product->getMainLink()}]
  [{else}]
    [{assign var='_productLink' value=$product->getLink()}]
  [{/if}]
    [{assign var="aVariantSelections" value=$product->getVariantSelections(null,null,1)}]
    [{assign var="blShowToBasket" value=true}] [{* tobasket or more info ? *}]
    [{if $blDisableToCart || $product->isNotBuyable()||($aVariantSelections&&$aVariantSelections.selections)||$product->hasMdVariants()||($oViewConf->showSelectListsInList() && $product->getSelections(1))||$product->getVariants()}]
        [{assign var="blShowToBasket" value=false}]
    [{/if}]

  <form name="tobasket[{$testid}]" [{if $blShowToBasket}]action="[{ $oViewConf->getSelfActionLink() }]" method="post"[{else}]action="[{$_productLink}]" method="get"[{/if}]>
    [{ $oViewConf->getNavFormParams() }]
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="pgNr" value="[{ $oView->getActPage() }]">
    [{if $recommid}]
        <input type="hidden" name="recommid" value="[{ $recommid }]">
    [{/if}]
    [{oxhasrights ident="TOBASKET"}]
        [{ if $blShowToBasket}]
            <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
            [{if $owishid}]
                <input type="hidden" name="owishid" value="[{$owishid}]">
            [{/if}]
            [{if $toBasketFunction}]
                <input type="hidden" name="fnc" value="[{$toBasketFunction}]">
            [{else}]
              <input type="hidden" name="fnc" value="tobasket">
            [{/if}]
            <input type="hidden" name="aid" value="[{ $product->oxarticles__oxid->value }]">
            [{if $altproduct}]
                <input type="hidden" name="anid" value="[{ $altproduct }]">
            [{else}]
                <input type="hidden" name="anid" value="[{ $product->oxarticles__oxnid->value }]">
            [{/if}]
            <input type="hidden" name="am" value="1">            
        [{/if}]
      <input type="hidden" id="varse[{$testid}]" name="[{$sFieldName|default:"varselid"}][[{$iKey}]]" value="">
    [{/oxhasrights}]
  <div class="shortinfo">
    [{assign var="currency" value=$oView->getActCurrency()}]
    [{assign var="blShowToBasket" value=true}] [{* tobasket or more info ? *}]
    [{if $blDisableToCart || $product->isNotBuyable()||($aVariantSelections&&$aVariantSelections.selections)||$product->hasMdVariants()||($oViewConf->showSelectListsInList() && $product->getSelections(1))||$product->getVariants()}]
        [{assign var="blShowToBasket" value=false}]
    [{/if}]
    [{assign var="aVariantSelections" value=$product->getVariantSelections(null,null,1)}] 
    [{capture name=product_price}]
        [{block name="widget_product_listitem_grid_price"}]
            [{oxhasrights ident="SHOWARTICLEPRICE"}]
                [{if $product->oxarticles__bodyshowprice == '1'}]
                    [{assign var=tprice value=$product->getTPrice()}]
                    [{assign var=price  value=$product->getPrice()}]
                    [{if $tprice && $tprice->getBruttoPrice() > $price->getBruttoPrice()}]
                    [{assign var="strich" value="strich.png"}]                    
                    <p class="priceOld">
                        <img src="[{$oViewConf->getImageUrl()}]strich.png">
                        [{*}][{oxmultilang ident="WIDGET_PRODUCT_PRODUCT_REDUCEDFROM" }] <del>[{ $product->getFTPrice()}] [{ $currency->sign}]</del>[{*}]
                        [{ $product->getFTPrice()}] [{ $currency->sign}]
                    </p>
                    [{/if}]
                    [{block name="widget_product_listitem_grid_price_value"}]
                        [{if $product->getFPrice()}]
                            <strong><span itemprop="price">[{ $product->getFPrice() }]</span> [{ $currency->sign}] <meta itemprop="priceCurrency" content="[{ $currency->name}]">
                              [{*if !($product->hasMdVariants() || ($oViewConf->showSelectListsInList() && $product->getSelections(1)) || $product->getVariantList())*}] *[{*/if*}]</strong>
                        [{/if}]
                    [{/block}]
                    [{if $product->getPricePerUnit()}]
                        <span id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                            [{$product->oxarticles__oxunitquantity->value}] [{$product->oxarticles__oxunitname->value}] | [{$product->getPricePerUnit()}] [{ $currency->sign}]/[{$product->oxarticles__oxunitname->value}]
                        </span>
                    [{elseif $product->oxarticles__oxweight->value  }]
                        <span id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                            <span title="weight">[{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT" }]</span>
                            <span class="value">[{ $product->oxarticles__oxweight->value }] [{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2" }]</span>
                        </span>
                    [{/if }]
                [{/if}]
            [{/oxhasrights}]
        [{/block}]
    [{/capture}]
	<div class="infobox_left" style="float:left;">
		<a id="[{$testid}]" itemprop="url" href="[{$_productLink}]" class="titleBlock title fn" title="[{ $product->oxarticles__oxtitle->value}]">
	
    <meta itemprop='productID' content='sku:[{ $product->oxarticles__oxartnum->value }]'>
    
        <span itemprop="name">
          [{$product->oxarticles__oxtitle->value}]
[{ D3 Modul "extSearch" CHANGE START}]
                <a id="[{$testid}]" href="[{$_productLink}]" class="title" title="[{ $product->oxarticles__oxtitle->value}] [{$product->oxarticles__oxvarselect->value}]">
                    <span>[{ d3_extsearch_highlight text=$product->oxarticles__oxtitle->value }] [{ d3_extsearch_highlight text=$product->oxarticles__oxvarselect->value}]</span>
                </a>
                [{d3modcfgcheck modid="d3_extsearch"}]
            [{if $product->blIsSimilar}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_SIMILAR"}]</span>[{/if}]
            [{if $product->isD3CatHit}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_CATHIT"}]</span>[{/if}]
                [{/d3modcfgcheck}]
[{D3 Modul "extSearch" CHANGE END}]
        </span> 
        <span class="shortdesc">
          [{$product->oxarticles__oxshortdesc->value }]
        </span>
    </a>
    [{block name="widget_product_listitem_grid_tobasket"}]
        <div class="priceBlocktop" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            [{oxhasrights ident="TOBASKET"}]
                [{$smarty.capture.product_price}]
                <span class="mwst">[{oxmultilang ident="TRO_INKL_MST"}]</span>
                <span class="artno">[{oxmultilang ident="TRO_ARTNO"}]: [{ $product->oxarticles__oxartnum->value }]</span>
            [{/oxhasrights}]
        </div>
   [{/block}]		
	</div>
	<div class="infobox_right" style="float:right;;">
        <div class="gridPicture">
            <img itemprop="image" src="[{$product->getThumbnailUrl()}]" alt="[{ $product->oxarticles__oxtitle->value }]">
        </div>
	
	</div>
	
	

  </div>
        
        
  <!-- neue Detailansicht -->
    <div class="detailinfo">
    [{assign var="currency" value=$oView->getActCurrency()}]
    [{assign var="blShowToBasket" value=true}] [{* tobasket or more info ? *}]
    [{if $blDisableToCart || $product->isNotBuyable()||($aVariantSelections&&$aVariantSelections.selections)||$product->hasMdVariants()||($oViewConf->showSelectListsInList() && $product->getSelections(1))||$product->getVariants()}]
        [{assign var="blShowToBasket" value=false}]
    [{/if}]
    [{assign var="aVariantSelections" value=$product->getVariantSelections(null,null,1)}] 
    [{capture name=product_price}]
        [{block name="widget_product_listitem_grid_price"}]
            [{oxhasrights ident="SHOWARTICLEPRICE"}]
                [{if $product->oxarticles__troshowprice == '1'}]
                    [{assign var=tprice value=$product->getTPrice()}]
                    [{assign var=price  value=$product->getPrice()}]
                    [{if $tprice && $tprice->getBruttoPrice() > $price->getBruttoPrice()}]
                    [{assign var="strich" value="strich.png"}]                    
                    <p class="priceOld">
                        <img src="[{$oViewConf->getImageUrl()}]strich.png">
                        [{*[{oxmultilang ident="WIDGET_PRODUCT_PRODUCT_REDUCEDFROM" }] <del>[{ $product->getFTPrice()}] [{ $currency->sign}]</del>*}]
                        [{ $product->getFTPrice()}] [{ $currency->sign}]
                    </p>
                    [{/if}]
                    [{block name="widget_product_listitem_grid_price_value"}]
                        [{if $product->getFPrice()}]
                            <strong><span itemprop="price">[{ $product->getFPrice() }]</span> [{ $currency->sign}] <meta itemprop="priceCurrency" content="[{ $currency->name}]">
                            [{*if !($product->hasMdVariants() || ($oViewConf->showSelectListsInList() && $product->getSelections(1)) || $product->getVariantList())*}] *[{*/if*}]</strong>
                        [{/if}]
                    [{/block}]
                    [{if $product->getPricePerUnit()}]
                        <span id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                                    [{$product->oxarticles__oxunitquantity->value}] [{$product->getUnitName()}] | [{$product->getPricePerUnit()}] [{ $currency->sign}]/[{$product->getUnitName()}]
                        </span>
                    [{elseif $product->oxarticles__oxweight->value  }]
                        <span id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                            <span title="weight">[{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT" }]</span>
                            <span class="value">[{ $product->oxarticles__oxweight->value }] [{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2" }]</span>
                        </span>
                    [{/if }]
                [{/if}]
            [{/oxhasrights}]
        [{/block}]
    [{/capture}]
	<div class="infobox_left" style="float:left;">
		<a id="[{$testid}]" itemprop="url" href="[{$_productLink}]" class="titleBlock title fn" title="[{ $product->oxarticles__oxtitle->value}]">
	
    <meta itemprop='productID' content='sku:[{ $product->oxarticles__oxartnum->value }]'>
    
        <span itemprop="name">
          [{$product->oxarticles__oxtitle->value}]
[{*D3 Modul "extSearch" CHANGE START}]
                <a id="[{$testid}]" href="[{$_productLink}]" class="title" title="[{ $product->oxarticles__oxtitle->value}] [{$product->oxarticles__oxvarselect->value}]">
                    <span>[{ d3_extsearch_highlight text=$product->oxarticles__oxtitle->value }] [{ d3_extsearch_highlight text=$product->oxarticles__oxvarselect->value}]</span>
                </a>
                [{d3modcfgcheck modid="d3_extsearch"}]
            [{if $product->blIsSimilar}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_SIMILAR"}]</span>[{/if}]
            [{if $product->isD3CatHit}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_CATHIT"}]</span>[{/if}]
                [{/d3modcfgcheck}]
[{D3 Modul "extSearch" CHANGE END*}]
        </span> 
        <span class="shortdesc">
          [{$product->oxarticles__oxshortdesc->value }]
        </span>
    </a>
    [{block name="widget_product_listitem_grid_tobasket"}]
        <div class="priceBlocktop" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            [{oxhasrights ident="TOBASKET"}]
                [{$smarty.capture.product_price}] [{if !$smarty.capture.product_price|strpos:"*"}] *[{/if}]
                <span class="mwst">[{*oxmultilang ident="TRO_INKL_MST"*}]</span>
                <span class="artno">[{oxmultilang ident="TRO_ARTNO"}]: [{ $product->oxarticles__oxartnum->value }]</span>
            [{/oxhasrights}]
        </div>
   [{/block}]		
	</div>
	<div class="infobox_right" style="float:right;;">
        <div class="gridPicture">
            <img itemprop="image" src="[{$product->getThumbnailUrl()}]" alt="[{ $product->oxarticles__oxtitle->value }]">
        </div>
	
	</div>
  <div class="orderbuttons">
    [{assign var="listType" value=$oView->getListType()}]
      <div class="priceBlock">
        [{if !$product->isNotBuyable() && !$aVariantSelections.selections}]
          <a href="[{$oView->getLink()|oxaddparams:"listtype=`$listType`&amp;fnc=tobasket&amp;aid=`$product->oxarticles__oxid->value`&amp;am=1" }]" class="submitButton button" title="[{oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ADDTOCART" }]">[{oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ADDTOCART" }]</a>
        [{else}]
            [{if $aVariantSelections && $aVariantSelections.selections }]
            <div class="selectorsBox js-fnSubmit clear" id="compareVariantSelections_[{$testid}]">
                [{foreach from=$aVariantSelections.selections item=oSelectionList key=iKey}]
                    [{include file="widget/product/listselectbox.tpl" oSelectionList=$oSelectionList}]
                [{/foreach}]
            </div>            
          [{/if}]
        [{/if}]
        <a href="[{$_productLink}]" style="display: block; clear: both;" class="submitButton button">[{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_MOREINFO" }]</a>
      </div>
      
  </div>
	
	

  </div>
  <!-- neue Detailansicht -->
  
  
</form>
[{/block}]