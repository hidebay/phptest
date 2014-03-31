[{*}]<!--
<div id="detailsMain">
    [{include file="page/details/inc/productmain.tpl"}]
</div>
<div id="detailsRelated" class="detailsRelated clear">
    <div class="relatedInfo[{if !$oView->getSimilarProducts() && !$oView->getCrossSelling() && !$oView->getAccessoires()}] relatedInfoFull[{/if}]">
      [{include file="page/details/inc/tabs.tpl"}]
      <div class="detailsParams listRefine bottomRound">
        <div class="pager refineParams clear" id="detailsItemsPager">
          <span class="forward">
            [{if $actCategory->prevProductLink}]<a id="linkPrevArticle" class="prev" href="[{$actCategory->prevProductLink}]">&lt; [{oxmultilang ident="TRO_DETAILS_LOCATOR_PREVIUOSPRODUCT"}]</a>[{/if}]  
          </span>
          <span class="backward">
            [{if $actCategory->nextProductLink}]<a id="linkNextArticle" href="[{$actCategory->nextProductLink}]" class="next">[{oxmultilang ident="DETAILS_LOCATOR_NEXTPRODUCT"}] &gt;</a>[{/if}]
          </span>    
          <span class="suggest">
            <a id="suggest" rel="nofollow" href="[{ oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=suggest" params="anid=`$oDetailsProduct->oxarticles__oxnid->value`"|cat:$oViewConf->getNavUrlParams() }]">[{ oxmultilang ident="TRO_PAGE_DETAILS_RECOMMEND" }]</a>
          </span>
                
        </div>    
      </div>  
        [{if $oView->getAlsoBoughtTheseProducts()}]
            <h2 class="sectionHead clear normal">[{oxmultilang ident="PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT"}]</h2>
            [{include file="widget/product/list.tpl" type="grid" listId="alsoBought" header="light" head="PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT"|oxmultilangassign products=$oView->getAlsoBoughtTheseProducts()}]
        [{/if}]
        <div class="widgetBox reviews" style="display: none;">
            <h4>[{oxmultilang ident="DETAILS_PRODUCTREVIEW"}]</h4>
            [{include file="widget/review/review.tpl"}]
        </div>
    </div>
    [{block name="details_relatedproducts_crossselling"}]
      [{if $oView->getCrossSelling()}]
        <h2 class="sectionHead clear normal">[{oxmultilang ident="WIDGET_PRODUCT_RELATED_PRODUCTS_CROSSSELING_HEADER"}]</h2>
        [{include file="widget/product/list.tpl" type="grid" listId="crossSelling" header="light" head="PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT"|oxmultilangassign products=$oView->getCrossSelling()}]
      [{/if}]
    [{/block}]
    
    [{block name="details_relatedproducts_similarproducts"}]
      [{if $oView->getSimilarProducts()|count}]
        <h2 class="sectionHead clear normal">[{oxmultilang ident="WIDGET_PRODUCT_RELATED_PRODUCTS_SIMILAR_HEADER"}]</h2>
        [{include file="widget/product/list.tpl" type="grid" listId="crossSelling" header="light" head="PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT"|oxmultilangassign products=$oView->getSimilarProducts()}]
      [{/if }]
    [{/block}]
    
    [{block name="details_relatedproducts_accessoires"}]
      [{if $oView->getAccessoires()|count}]
        <div id="zubehoer">
        [{include file="widget/accessoires.tpl" type="grid" listId="crossSelling" header="light" head="PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT"|oxmultilangassign products=$oView->getAccessoires()}]
        </div>
      [{/if }]
    [{/block}]
    
    [{*include file="page/details/inc/related_products.tpl"*}]
</div>
-->[{*}]
<div id="detailsMain">
    [{include file="page/details/inc/productmain.tpl"}]
</div>
<div id="detailsRelated" class="detailsRelated clear">
    <div class="relatedInfo[{if !$oView->getSimilarProducts() && !$oView->getCrossSelling() && !$oView->getAccessoires()}] relatedInfoFull[{/if}]">
        [{include file="page/details/inc/tabs.tpl"}]
        [{if $oView->getAlsoBoughtTheseProducts()}]
            [{include file="widget/product/list.tpl" type="grid" listId="alsoBought" header="light" head="CUSTOMERS_ALSO_BOUGHT"|oxmultilangassign|colon products=$oView->getAlsoBoughtTheseProducts()}]
        [{/if}]
        [{if $oView->isReviewActive() }]
        <div class="widgetBox reviews">
            <h4>[{oxmultilang ident="WRITE_PRODUCT_REVIEW"}]</h4>
            [{assign var="product" value=$oView->getProduct()}]
            [{if $oxcmp_user}]
                [{assign var="force_sid" value=$oView->getSidForWidget()}]
            [{/if}]
            [{oxid_include_widget cl="oxwReview" nocookie=1 force_sid=$force_sid _parent=$oViewConf->getTopActiveClassName() type=oxarticle anid=$product->oxarticles__oxnid->value aid=$product->oxarticles__oxid->value canrate=$oView->canRate() skipESIforUser=1}]
        </div>
        [{/if}]
    </div>
    [{ include file="page/details/inc/related_products.tpl" }]
</div>