[{d3modcfgcheck modid="d3_extsearch"}]
    [{if $oView->showSearch()}]
        [{oxscript include="js/widgets/oxinnerlabel.js" priority=10}]
        [{oxscript add="$( '#searchParam' ).oxInnerLabel();"}]
        <form class="search" action="[{$oViewConf->getSelfActionLink()}]" method="get" name="search" id="search" onSubmit="d3_extsearch_popup.popup.load();">
            <div class="searchBox">
                [{$oViewConf->getHiddenSid()}]
                <input type="hidden" name="cl" value="search">
                [{block name="header_search_field"}]
                    <label for="searchParam" class="innerLabel">[{oxmultilang ident="SEARCH"}]</label>
                    <input class="textbox" type="text" id="searchParam" name="searchparam" value="[{$oView->getSearchParamForHtml()}]">
                [{/block}]
                <input class="searchSubmit" type="submit" value="">
            </div>
        </form>
    [{/if}]
[{/d3modcfgcheck}]

[{if !$mod_d3_extsearch}]
    [{$smarty.block.parent}]
[{/if}]