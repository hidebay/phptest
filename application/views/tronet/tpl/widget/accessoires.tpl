[{if $products}]
  [{capture name="slides"}]
    [{assign var="aArticles" value=$products}]
    [{assign var="iNumOfArticles" value=$products|@count}]
    [{foreach from=$aArticles item=oArticle}]
        
        [{counter assign="slideCount"}]
			
		
		
            <li>
			
				
                [{assign var="currency" value=$oView->getActCurrency()}]
                [{if $showMainLink}]
                    [{assign var='_productLink' value=$oArticle->getMainLink()}]
                [{else}]
                    [{assign var='_productLink' value=$oArticle->getLink()}]
                [{/if}]

				
                <a id="[{$testid}]" itemprop="url" href="[{$_productLink}]" class="imageBlock title fn" title="[{ $oArticle->oxarticles__oxtitle->value}]" style="z-index: 1"><img src="[{ $oArticle->getThumbnailUrl() }]" alt="[{ $oArticle->oxarticles__oxtitle->value }]"></a>
				<span class="artno">[{oxmultilang ident="TRO_ARTNO"}]: [{ $oArticle->oxarticles__oxartnum->value }]</span>
                <a id="[{$testid}]" itemprop="url" href="[{$_productLink}]" class="titleBlock title fn" title="[{ $oArticle->oxarticles__oxtitle->value}]" style="z-index: 1">
                     <span class="title" itemprop="name">[{ $oArticle->oxarticles__oxtitle->value }]</span></a>

                    <div class="priceBlock" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <div class="content">
                                   
                                    [{block name="widget_product_listitem_infogrid_price"}]
                                        [{oxhasrights ident="SHOWARTICLEPRICE"}]
                                            [{if $oArticle->getFTPrice() > $oArticle->getFPrice()}]
                                                [{assign var="strich" value="strich.png"}]                    
                                                <p class="priceOld">
                                                    <img src="[{$oViewConf->getImageUrl()}]strich.png">
                                                    [{*[{oxmultilang ident="WIDGET_PRODUCT_PRODUCT_REDUCEDFROM" }] <del>[{ $oArticle->getFTPrice()}] [{ $currency->sign}]</del>*}]
                                                    [{ $oArticle->getFTPrice()}] [{ $currency->sign}]
                                                </p>
                                            [{/if}]
                                            [{block name="widget_product_listitem_infogrid_price_value"}]
                                                [{if $oArticle->getFPrice()}]
                                                    <span class="price"><span itemprop="price">[{ $oArticle->getFPrice() }]</span> [{ $currency->sign}] * <meta itemprop="priceCurrency" content="[{ $currency->name}]"></span>
                                                [{/if}]
                                            [{/block}]
                                            [{ if $oArticle->getPricePerUnit()}]
                                                <div id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                                                    [{$oArticle->oxarticles__oxunitquantity->value}] [{$oArticle->oxarticles__oxunitname->value}] | [{$oArticle->getPricePerUnit()}] [{ $currency->sign}]/[{$product->oxarticles__oxunitname->value}]
                                                </div>
                                            [{elseif $oArticle->oxarticles__oxweight->value  }]
                                                <span id="productPricePerUnit_[{$testid}]" class="pricePerUnit">
                                                    <span title="weight">[{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT" }]</span>
                                                    <span class="value">[{ $oArticle->oxarticles__oxweight->value }] [{ oxmultilang ident="WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2" }]</span>
                                                </span>
                                            [{/if }]
                                            <span class="mwst">[{*oxmultilang ident="TRO_INKL_MST"*}]</span>
                                        [{/oxhasrights}]
                                    [{/block}]
                                </div>
                       </div>
					   
					
            </li>
		
       
    [{/foreach}]
[{/capture}]
    <h2 class="sectionHead clear">
        <span>[{ oxmultilang ident="ACCESSORIES" }]</span>		
    </h2>
    [{oxscript include="js/libs/jcarousellite.js"}]
    [{oxscript include="js/widgets/troaccessoiresslider.js" priority=10 }]
    [{oxscript add="$( '#accessoiresSlider' ).troAccessoiresSlider();"}]
    <div class="itemSlider">
        <div class="leftHolder">
           [{if $iNumOfArticles > 4 }][{* Volker *}] 
              <a class="prevItem2 slideNav" href="#" rel="nofollow"><span class="slidePointer">&lt;&laquo;</span><span class="slideBg">&lt;</span></a>
           [{else}]
              <div class="noSlideDiv"><span class="noSlideLeft"></span></div>
           [{/if}]
        </div>
        [{if $iNumOfArticles > 4 }][{* Volker *}] 
            <a class="nextItem2 slideNav" href="#" rel="nofollow"><span class="slidePointer">&raquo;</span><span class="slideBg">&gt;</span></a>
        [{else}]
            <div class="noSlideDiv"><span class="noSlideRight"></span></div>
        [{/if}]
        <div id="accessoiresSlider">
            <ul>
                [{$smarty.capture.slides}]
            </ul>
        </div>
    </div>  
[{/if}]