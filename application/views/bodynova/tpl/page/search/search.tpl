[{oxscript add="$('a.js-external').attr('target', '_blank');"}]
[{capture append="oxidBlock_content"}]
[{assign var="search_title" value="PAGE_SEARCH_SEARCH_TITLE"|oxmultilangassign}]
[{assign var="searchparamforhtml" value=$oView->getSearchParamForHtml() }]
[{assign var="template_title" value="$search_title - $searchparamforhtml"}]
[{assign var="search_head" value="HITS_FOR"|oxmultilangassign}]
[{assign var="search_head" value=$oView->getArticleCount()|cat:" "|cat:$search_head|cat:" &quot;"|cat:$oView->getSearchParamForHtml()|cat:"&quot;"}]
[{assign var='rsslinks' value=$oView->getRssLinks() }]
[{if $rsslinks.searchArticles}]
    [{assign var="imgUrl" value=$oViewConf->getImageUrl('rss.png')}]
        [{assign var="search_head" value="`$search_head` <a class=\"rss js-external\" id=\"rssSearchProducts\" href=\"`$rsslinks.searchArticles.link`\" title=\"`$rsslinks.searchArticles.title`\"><img src=\"$imgUrl\" alt=\"`$rsslinks.searchArticles.title`\"><span class=\"FXgradOrange corners glowShadow\">`$rsslinks.searchArticles.title`</span></a>"}]
[{/if}]
  <div class="searchheader">
    <h1 class="pageHead">[{$search_head}]</h1>
    [{block name="search_results"}]
    [{if $oView->getArticleCount() }]
      <div class="listRefine clear bottomRound">
          [{block name="search_top_listlocator"}]
          [{include file="widget/locator/listlocator.tpl"  locator=$oView->getPageNavigationLimitedTop() listDisplayType=true itemsPerPage=true sort=true }]
          [{/block}]
      </div>

[{*}]<!--[{ D3 Modul "extSearch" START }]-->[{*}]

[{*}]<!--
    [{d3modcfgcheck modid="d3_extsearch"}][{/d3modcfgcheck}]
    [{if $mod_d3_extsearch}]
        [{include file="widget/d3extsearch/d3_inc_ext_search.tpl"}]
    [{/if}]
-->[{*}]

[{*}]<!--[{ D3 Modul "extSearch" END }]-->[{*}]

[{*}]<!--
  [{else}]
-->[{*}]
  
[{*}]<!--[{ D3 Modul "extSearch" START }]-->[{*}]

[{*}]<!--
    [{d3modcfgcheck modid="d3_extsearch"}][{/d3modcfgcheck}]
    [{if $mod_d3_extsearch}]
        [{include file="widget/d3extsearch/d3_inc_ext_search.tpl"}]
    [{/if}]
-->[{*}]    
    
[{*}]<!--[{ D3 Modul "extSearch" END }]-->[{*}]


    <div>

[{*}]<!--[{ D3 Modul "extSearch" START }] -->[{*}]

[{*}]<!--
        [{ oxmultilang ident="PAGE_SEARCH_SEARCH_NOITEMSFOUND" }]
-->[{*}]
        
[{*}]<!--[{ D3 Modul "extSearch" END }]-->[{*}]
[{*}]<!--[{D3 Modul "extSearch" START }]-->[{*}]
[{*}]<!--
        <h3>[{oxcontent ident="d3extsearch_noarticlefound" field="oxtitle"}]</h3>
        [{oxcontent ident="d3extsearch_noarticlefound"}]
-->[{*}]

[{*}]<!--[{ D3 Modul "extSearch" END }]-->[{*}]

    </div>
    [{/if}]
  </div>
  [{if $oView->getArticleList() }]
    [{foreach from=$oView->getArticleList() name=search item=product}]
      [{include file="widget/product/list.tpl" type=$oView->getListDisplayType() listId="searchList" products=$oView->getArticleList() showMainLink=true }]
    [{/foreach}]
  [{/if}]
  [{if $oView->getArticleCount() }]
    [{include file="widget/locator/listlocator.tpl" locator=$oView->getPageNavigationLimitedBottom() place="bottom"}]
  [{/if}]
  [{/block}]
[{ insert name="oxid_tracker" title=$template_title }]
[{/capture}]
[{assign var="template_title" value="PAGE_SEARCH_SEARCH_TITLE"|oxmultilangassign}]

[{include file="layout/page.tpl" title=$template_title location="PAGE_SEARCH_SEARCH_LOCATION"|oxmultilangassign sidebar="Left"}]