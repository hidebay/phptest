[{block name="widget_header_search_form"}]
[{if $oView->showSearch() }]
    [{oxscript include="js/widgets/oxinnerlabel.js" priority=10 }]
    [{oxscript add="$( '#searchParam' ).oxInnerLabel();"}]
[{* D3 MOD NEXT_LINE extSearch id added*}]
    <form class="search" action="[{ $oViewConf->getSelfActionLink() }]" method="get" name="search" id="search">
     [{php}] $iso_lang = oxLang::getInstance()->getLanguageAbbr(); $this->assign('iso_lang', $iso_lang);[{/php}]            
        <div class="searchBox" lang="[{$iso_lang}]">
            <div class="searchLabel">[{oxmultilang ident="TRO_SEARCH_LABEL" }]</div>
            [{ $oViewConf->getHiddenSid() }]
            <input type="hidden" name="cl" value="search">
            [{block name="header_search_field"}]
            
            [{* D3 Modul "extSearch" START REPLACEMENT}]
                [{d3modcfgcheck modid="d3_extsearch"}]
                    [{include file="widget/d3extsearch/d3_ext_search_form.tpl"}]
                [{/d3modcfgcheck}]
            [{D3 Modul "extSearch" END*}]
            [{*** D3 Modul "extSearch" DISABLED ***}]
                [{*if !$mod_d3_extsearch*}]
                    <label for="searchParam" class="innerLabel">[{oxmultilang ident="SEARCH_TITLE" }]</label>
                    <input class="textbox" type="text" id="searchParam" name="searchparam" value="[{$oView->getSearchParamForHtml()}]">
                [{*/if*}]
            [{*** D3 Modul "extSearch" DISABLED ***}]
            [{/block}]
            <input class="searchSubmit" type="submit" value="">
        </div>
    </form>
[{/if}]    
[{/block}]