[{oxscript include="js/widgets/oxcenterelementonhover.js" priority=10 }]
[{oxscript add="$( '#specCatBox' ).oxCenterElementOnHover();" }]
[{capture append="oxidBlock_content"}]
    [{assign var="oFirstArticle" value=$oView->getFirstArticle()}]
    [{*if $oView->getCatOfferArticleList()|@count > 0}]
        [{foreach from=$oView->getCatOfferArticleList() item=actionproduct name=CatArt}]
        [{if $smarty.foreach.CatArt.first}]
        [{assign var="oCategory" value=$actionproduct->getCategory()}]
            [{if $oCategory }]
                [{assign var="promoCatTitle" value=$oCategory->oxcategories__oxtitle->value}]
                [{assign var="promoCatImg" value=$oCategory->getPromotionIconUrl()}]
                [{assign var="promoCatLink" value=$oCategory->getLink()}]
            [{/if}]
        [{/if}]
        [{/foreach}]
    [{/if*}]
	
    [{*if $oView->getBargainArticleList()|@count > 0 || ($promoCatTitle && $promoCatImg)*}]
            [{if count($oView->getBargainArticleList()) > 0 }]
                <div id="specBox" class="specBox">
                    [{include file="widget/product/bargainitems.tpl"}]
                </div>
            [{/if}]
			
			
			[{if $oView->getCatOfferArticleList()|@count > 0}]
			
				[{foreach from=$oView->getCatOfferArticleList() item=actionproduct name=CatArt}]
				
				[{*assign var="oCategory" value=$actionproduct->getPromoCategory()*}]
				[{assign var="oCategory" value=$actionproduct->getCategory()}]
				
					[{if $oCategory }]

					
						[{assign var="promoCatTitle" value=$oCategory->oxcategories__oxtitle->value}]
						[{assign var="promoCatImg" value=$oCategory->getPromotionIconUrl()}]
						[{assign var="promoCatLink" value=$oCategory->getLink()}]
						[{if $promoCatTitle && $promoCatImg}]
							<div id="specCatBox" class="specCatBox">								
								<a href="[{$promoCatLink}]">
								<img src="[{$promoCatImg}]" alt="[{$promoCatTitle}]"></a>
							</div>
						[{/if}]
					
					[{/if}]
				[{/foreach}]
			[{/if}]
        
    [{*/if*}]
	
    [{if $oView->getNewestArticles() }]
        [{assign var='rsslinks' value=$oView->getRssLinks() }]
        [{include file="widget/product/list.tpl" clear="" type=$oViewConf->getViewThemeParam('sStartPageListDisplayType') head="PAGE_SHOP_START_JUSTARRIVED"|oxmultilangassign listId="newItems" products=$oView->getNewestArticles() rsslink=$rsslinks.newestArticles rssId="rssNewestProducts" showMainLink=true}]
    [{/if}]
	
	[{if $oView->getArticleList()}]
        [{include clear="clear" file="widget/product/list.tpl" type="infogrid" listId="startItems" products=$oView->getArticleList() rsslink=$rsslinks.newestArticles rssId="rssNewestProducts" showMainLink=true}]
	[{/if}]
	
	[{*<div id="start_toparticles">	
    [{include file="widget/toparticlesslider.tpl" rsslink=$rsslinks.newestArticles rssId="rssNewestProducts"  }]
	</div>*}]	
	
	
	
    [{ insert name="oxid_tracker"}]
[{/capture}]
[{include file="layout/page.tpl" sidebar="Left"}]