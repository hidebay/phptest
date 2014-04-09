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

[{ insert name="oxid_tracker" title="DETAILS_PRODUCTDETAILS"|oxmultilangassign product=$oDetailsProduct cpath=$oView->getCatTreePath() }]    
[{*}]<!-- old -->[{*}]    
    [{if $oxcmp_user}]
        [{assign var="force_sid" value=$oView->getSidForWidget()}]
    [{/if}]
    <div id="details_container">
        [{oxid_include_widget cl="oxwArticleDetails" _parent=$oView->getClassName() nocookie=1 force_sid=$force_sid _navurlparams=$oViewConf->getNavUrlParams() _object=$oView->getProduct() anid=$oViewConf->getActArticleId() iPriceAlarmStatus=$oView->getPriceAlarmStatus() sorting=$oView->getSortingParameters() skipESIforUser=1}]
    </div>


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
        
<h2>[{$detailsLocation}]</h2>
[{*}]<!--[{assign var="meine" value=$alist->getViewId()}]
<h2> [{$meine}] </h2>-->[{*}]

[{*}]<!--
        [{ details locator  }]
-->[{*}]
        [{assign var="actCategory" value=$oView->getActiveCategory()}]
[{*}]<!--
        <h2 class="pageHead">[{$sPageHeadTitle|truncate:80}]</h2>
-->[{*}]
        <div class="pageHead">
          <div class="pager refineParams clear" id="detailsItemsPager">
            <span class="page">
              [{oxmultilang ident="PRODUCT"}] [{$actCategory->iProductPos}] [{oxmultilang ident="OF"}] [{$actCategory->iCntOfProd}]
            </span>
            <span class="page">
              [{if $actCategory->prevProductLink}]<a id="linkPrevArticle" class="prev" href="[{$actCategory->prevProductLink}]">&lt; [{oxmultilang ident="PREVIOUS_PRODUCT"}]</a>[{/if}]  
              [{if $actCategory->nextProductLink}]<a id="linkNextArticle" href="[{$actCategory->nextProductLink}]" class="next">[{oxmultilang ident="NEXT_PRODUCT"}] &gt;</a>[{/if}]
            </span>
[{*}]<!--
            <div id="breadCrumb">
-->[{*}]
            <span class="pageBreadCrumb" style="float:right">
    			<a href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]">
    				<img src="[{$oViewConf->getImageUrl()}]icon_breadcrumb_home.png" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]">
    			</a>
        		[{foreach from=$oView->getBreadCrumb() item=sCrum name="breadcrumb"}]
            		&nbsp;&gt;&nbsp;
            		<span class="[{if $smarty.foreach.breadcrumb.last}]last[{/if}]">
              			[{if $sCrum.link }]
              				<a href="[{ $sCrum.link }]" title="[{ $sCrum.title|escape:'html'}]">
              			[{/if}]
              			[{$sCrum.title}]
              			[{if $sCrum.link }]
              				</a>
              			[{/if}]
            		</span>
        		[{/foreach}]
    		</span>
			[{*}]<!--</div>-->[{*}]
            
            [{*}]<!--<a href="[{ $actCategory->toListLink }]" class="overviewLink">&gt; [{ oxmultilang ident="WIDGET_BREADCRUMB_OVERVIEW" }]</a> -->[{*}]
          </div>              
        </div> 
        
        
[{*}]<!-- 
        <div class="detailsParams listRefine bottomRound">
                    
        </div> 
-->[{*}]

[{*}]<!--    
    	<div id="productinfo" itemscope itemtype="http://schema.org/Product">
            [{include file="page/details/inc/fullproductinfo.tpl"}]
        </div>    
-->[{*}]    
   [{*}]<!-- </div> -->[{*}]
    
[{/capture}]
[{include file="layout/page.tpl" sidebar="Left"}]
