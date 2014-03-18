[{capture append="oxidBlock_content"}]
  [{assign var="oDetailsProduct" value=$oView->getProduct()}]
  [{assign var="oPictureProduct" value=$oView->getPicturesProduct()}]
  [{assign var="currency" value=$oView->getActCurrency()}]
  [{assign var="sPageHeadTitle" value=$oDetailsProduct->oxarticles__oxtitle->value|cat:' '|cat:$oDetailsProduct->oxarticles__oxvarselect->value}]

    [{if $oView->getPriceAlarmStatus() == 1}]
        [{assign var="_statusMessage1" value="PAGE_DETAILS_THANKYOUMESSAGE1"|oxmultilangassign|cat:" "|cat:$oxcmp_shop->oxshops__oxname->value}]
        [{assign var="_statusMessage2" value="PAGE_DETAILS_THANKYOUMESSAGE2"|oxmultilangassign|cat:" "}]
        [{assign var="_statusMessage3" value="PAGE_DETAILS_THANKYOUMESSAGE3"|oxmultilangassign|cat:" "|cat:$oView->getBidPrice()|cat:" "|cat:$currency->sign|cat:" "}]
        [{assign var="_statusMessage4" value="PAGE_DETAILS_THANKYOUMESSAGE4"|oxmultilangassign}]
        [{include file="message/success.tpl" statusMessage=`$_statusMessage1``$_statusMessage2``$_statusMessage3``$_statusMessage4`}]
    [{elseif $oView->getPriceAlarmStatus() == 2}]
        [{assign var="_statusMessage" value="PAGE_DETAILS_WRONGVERIFICATIONCODE"|oxmultilangassign}]
        [{include file="message/error.tpl" statusMessage=$_statusMessage}]
    [{elseif $oView->getPriceAlarmStatus() === 0}]
        [{assign var="_statusMessage1" value="PAGE_DETAILS_NOTABLETOSENDEMAIL"|oxmultilangassign|cat:"<br> "}]
        [{assign var="_statusMessage2" value="PAGE_DETAILS_VERIFYYOUREMAIL"|oxmultilangassign}]
        [{include file="message/error.tpl" statusMessage=`$_statusMessage1``$_statusMessage2`}]
    [{/if}]

    <div id="details">
        [{ if $oView->getSearchTitle() }]
          [{ assign var="detailsLocation" value=$oView->getSearchTitle()}]
        [{else}]
          [{foreach from=$oView->getCatTreePath() item=oCatPath name="detailslocation"}]
          [{if $smarty.foreach.detailslocation.last}]

            [{assign var="detailsLocation" value=$oCatPath->oxcategories__oxtitle->value}]
            [{/if}]
          [{/foreach}]
        [{/if }]


        [{* details locator  *}]
        [{assign var="actCategory" value=$oView->getActiveCategory()}]
        
        [{*<h2 class="pageHead">[{$sPageHeadTitle|truncate:80}]</h2>*}]
        <div class="pageHead">
          <div class="pager refineParams clear" id="detailsItemsPager">
            <span class="page">
              [{oxmultilang ident="DETAILS_LOCATOR_PRODUCT"}] [{$actCategory->iProductPos}] [{oxmultilang ident="DETAILS_LOCATOR_FROM"}] [{$actCategory->iCntOfProd}]
            </span>
            <span class="page">
              [{if $actCategory->prevProductLink}]<a id="linkPrevArticle" class="prev" href="[{$actCategory->prevProductLink}]">&lt; [{oxmultilang ident="TRO_DETAILS_LOCATOR_PREVIUOSPRODUCT"}]</a>[{/if}]  
              [{if $actCategory->nextProductLink}]<a id="linkNextArticle" href="[{$actCategory->nextProductLink}]" class="next">[{oxmultilang ident="DETAILS_LOCATOR_NEXTPRODUCT"}] &gt;</a>[{/if}]
            </span>
            <a href="[{ $actCategory->toListLink }]" class="overviewLink">&gt; [{ oxmultilang ident="WIDGET_BREADCRUMB_OVERVIEW" }]</a>
          </div>              
        </div>
        [{*<div class="detailsParams listRefine bottomRound">
                    
        </div>*}]

        <div id="productinfo" itemscope itemtype="http://schema.org/Product">
            [{include file="page/details/inc/fullproductinfo.tpl"}]
        </div>        
    </div>
    [{ insert name="oxid_tracker" title="DETAILS_PRODUCTDETAILS"|oxmultilangassign product=$oDetailsProduct cpath=$oView->getCatTreePath() }]
[{/capture}]
[{include file="layout/page.tpl" sidebar="Left"}]