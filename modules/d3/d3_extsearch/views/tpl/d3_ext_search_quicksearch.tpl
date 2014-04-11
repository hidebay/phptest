<div id="d3_extsearch_quicksearch" class="[{if $blStartSearch}]searchWaitMsg[{/if}]">
    <div class="headline">
        [{if $blStartSearch}]
            [{oxmultilang ident="D3_EXTSEARCH_QUICK_SEARCH"}]
        [{else}]
            <a alt="[{oxmultilang ident="D3_EXTSEARCH_QUICK_CLOSE"}]" title="[{oxmultilang ident="D3_EXTSEARCH_QUICK_CLOSE"}]" href="#" class="closebtn" onclick="$('#xajax_resp').css({'display' : 'none'}); return false;"></a>
            [{if $useMultipleObjectTypes}]
                [{oxmultilang ident="D3_EXTSEARCH_QUICK_MULTIPLEHITS"}]
            [{else}]
                [{$iHitCount}] [{if $similar}][{oxmultilang ident="D3_EXTSEARCH_QUICK_SIMILARHITS"}][{else}][{oxmultilang ident="D3_EXTSEARCH_QUICK_HITS"}][{/if}] "[{$sSearchparam}]"
            [{/if}]
        [{/if}]
    </div>

    [{strip}]
        [{if !$blStartSearch}]
            <div class="list [{if $useMultipleObjectTypes}]small[{/if}]" id="searchItemList">

                [{*** einfache Darstellung ***
                    [{if $useMultipleObjectTypes && $oCatHitList}]
                        [{foreach name="cathitlist" from=$oCatHitList item="oHit"}]
                            [{strip}]
                            <a class="item_inact d3QSItem category" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.cathitlist.index}]);' href="[{$oHit->getLink()}]">
                                <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_CATEGORY"}]</div>
                                [{$oHit->getFieldData('oxtitle')}]
                            </a>
                            [{/strip}]
                            [{assign var="blItem" value=true}]
                        [{/foreach}]
                    [{/if}]
                    [{if $oHitList}]
                        [{foreach name="hitlist" from=$oHitList item="oHit"}]
                            [{strip}]
                            <a class="item_inact d3QSItem article" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.hitlist.index}]);' href="[{$oHit->getLink()}]">
                                <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_ARTICLE"}]</div>
                                [{$oHit->getFieldData('oxtitle')}]
                                [{if $oHit->getFieldData('oxvarselect')}] [{$oHit->getFieldData('oxvarselect')}][{/if}]
                            </a>
                            [{/strip}]
                            [{assign var="blItem" value=true}]
                        [{/foreach}]
                    [{/if}]
                    [{if $useMultipleObjectTypes && $oManHitList}]
                        [{foreach name="manhitlist" from=$oManHitList item="oHit"}]
                            [{strip}]
                            <a class="item_inact d3QSItem manufacturer" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.manhitlist.index}]);' href="[{$oHit->getLink()}]">
                                <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_MANUFACTURER"}]</div>
                                [{$oHit->getFieldData('oxtitle')}]
                            </a>
                            [{/strip}]
                            [{assign var="blItem" value=true}]
                        [{/foreach}]
                    [{/if}]
                    [{if $useMultipleObjectTypes && $oVendorHitList}]
                        [{foreach name="vendorhitlist" from=$oVendorHitList item="oHit"}]
                            [{strip}]
                            <a class="item_inact d3QSItem vendor" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.vendorhitlist.index}]);' href="[{$oHit->getLink()}]">
                                <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_VENDOR"}]</div>
                                [{$oHit->getFieldData('oxtitle')}]
                            </a>
                            [{/strip}]
                            [{assign var="blItem" value=true}]
                        [{/foreach}]
                    [{/if}]
                    [{if $useMultipleObjectTypes && $oContentHitList}]
                        [{foreach name="contenthitlist" from=$oContentHitList item="oHit"}]
                            [{strip}]
                            <a class="item_inact d3QSItem content" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.contenthitlist.index}]);' href="[{$oHit->getLink()}]">
                                <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_CONTENT"}]</div>
                                [{$oHit->getFieldData('oxtitle')}]
                            </a>
                            [{/strip}]
                            [{assign var="blItem" value=true}]
                        [{/foreach}]
                    [{/if}]
                    [{if $blToMuchHits}]
                        <a href="#" onclick="document.getElementById('search').submit(); return false;" class="item_inact">
                            [{oxmultilang ident="D3_EXTSEARCH_QUICK_TOMUCHHITS"}]
                        </a>
                    [{elseif !$blItem}]
                        <a href="#" onclick="$('#xajax_resp').css({'display' : 'none'}); return false;" class="item_inact">
                            [{oxmultilang ident="D3_EXTSEARCH_QUICK_NOHIT"}]
                        </a>
                    [{/if}]
                *** Ende der einfachen Darstellung ***}]

                [{if $useMultipleObjectTypes && $oCatHitList}]
                    [{foreach name="cathitlist" from=$oCatHitList item="oHit"}]
                        [{strip}]
                        <a class="item_inact d3QSItem category" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.cathitlist.index}]);' href="[{$oHit->getLink()}]">
                            <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_CATEGORY"}]</div>
                            <div class="imgframe"><img src="[{$oHit->getIconUrl()}]" alt="[{$oHit->getFieldData('oxtitle')}]"></div>
                            [{$oHit->getFieldData('oxtitle')}]
                        </a>
                        [{/strip}]
                        [{assign var="blItem" value=true}]
                    [{/foreach}]
                [{/if}]
                [{if $oHitList}]
                    [{foreach name="hitlist" from=$oHitList item="oHit"}]
                        [{strip}]
                        <a class="item_inact d3QSItem article" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.hitlist.index}]);' href="[{$oHit->getLink()}]">
                            [{if $useMultipleObjectTypes}]<div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_ARTICLE"}]</div>[{/if}]
                            <div class="imgframe"><img src="[{$oHit->getIconUrl()}]" alt="[{$oHit->getFieldData('oxtitle')}]"></div>
                            [{$oHit->getFieldData('oxtitle')}]
                            [{if $oHit->getFieldData('oxvarselect')}] [{$oHit->getFieldData('oxvarselect')}][{/if}]
                        </a>
                        [{/strip}]
                        [{assign var="blItem" value=true}]
                    [{/foreach}]
                [{/if}]
                [{if $useMultipleObjectTypes && $oManHitList}]
                    [{foreach name="manhitlist" from=$oManHitList item="oHit"}]
                        [{strip}]
                        <a class="item_inact d3QSItem manufacturer" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.manhitlist.index}]);' href="[{$oHit->getLink()}]">
                            <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_MANUFACTURER"}]</div>
                            <div class="imgframe"><img src="[{$oHit->getIconUrl()}]" alt="[{$oHit->getFieldData('oxtitle')}]"></div>
                            [{$oHit->getFieldData('oxtitle')}]
                        </a>
                        [{/strip}]
                        [{assign var="blItem" value=true}]
                    [{/foreach}]
                [{/if}]
                [{if $useMultipleObjectTypes && $oVendorHitList}]
                    [{foreach name="vendorhitlist" from=$oVendorHitList item="oHit"}]
                        [{strip}]
                        <a class="item_inact d3QSItem vendor" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.vendorhitlist.index}]);' href="[{$oHit->getLink()}]">
                            <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_VENDOR"}]</div>
                            <div class="imgframe"><img src="[{$oHit->getIconUrl()}]" alt="[{$oHit->getFieldData('oxtitle')}]"></div>
                            [{$oHit->getFieldData('oxtitle')}]
                        </a>
                        [{/strip}]
                        [{assign var="blItem" value=true}]
                    [{/foreach}]
                [{/if}]
                [{if $useMultipleObjectTypes && $oContentHitList}]
                    [{foreach name="vendorhitlist" from=$oContentHitList item="oHit"}]
                        [{strip}]
                        <a class="item_inact d3QSItem content" id="[{$oHit->getId()|replace:".":""}]" onmouseover='$(document).d3JQmoveActItemLineMouse(this.id, [{$smarty.foreach.contenthitlist.index}]);' href="[{$oHit->getLink()}]">
                            <div class="descframe">[{oxmultilang ident="D3_EXTSEARCH_QUICK_CONTENT"}]</div>
                            [{* <div class="imgframe"><img src="[{$oHit->getIconUrl()}]" alt="[{$oHit->getFieldData('oxtitle')}]"></div> *}]
                            [{$oHit->getFieldData('oxtitle')}]
                        </a>
                        [{/strip}]
                        [{assign var="blItem" value=true}]
                    [{/foreach}]
                [{/if}]
                [{if $blToMuchHits}]
                    <a href="#" onclick="document.getElementById('search').submit(); return false;" class="item_inact">
                        [{oxmultilang ident="D3_EXTSEARCH_QUICK_TOMUCHHITS"}]
                    </a>
                [{elseif !$blItem}]
                    <a href="#" onclick="$('#xajax_resp').css({'display' : 'none'}); return false;" class="item_inact">
                        [{oxmultilang ident="D3_EXTSEARCH_QUICK_NOHIT"}]
                    </a>
                [{/if}]
            </div>
            [{if $oHit}]
                <div class="d3_extsearch_footer">
                    <a href="#" onclick="document.getElementById('search').submit(); return false;" class="">
                        [{oxmultilang ident="D3_EXTSEARCH_QUICK_STARTSEARCH"}]
                    </a>
                </div>
            [{/if}]
        [{/if}]
    [{/strip}]
</div>

[{*** Folgender Abschnitt, um Warenkorbfunktionalität zu integrieren. Innerhalb der foreach-Schleife zu verwenden ***}]
[{*
<form action='[{$oViewConf->getSelfActionLink()}]' method='POST' name='basket'>
    [{$oViewConf->getHiddenSid()}]
    <input type='hidden' name='cl' value='[{$sClassname}]'>
    *}][{* Achtung, nicht $shop->cl verwenden, statt dessen [{$sClassname}]  *}][{*
    <input type='hidden' name='fnc' value='tobasket'>
    <input type='hidden' name='aid' value='[{$hit->oxarticles__oxid->value}]'>
    <input type='hidden' name='anid' value='[{$hit->oxarticles__oxid->value}]'>
    <input type='hidden' name='am' value='1'>
    <input type='image' src='[{$oViewConf->getImageUrl()}]/tobasket_button.gif' alt='[{oxmultilang ident="D3_EXTSEARCH_QUICK_TOBASKET"}]' style='float: left; margin: 0; margin-right: 2px; border-style: solid; border-color: #CCC; border-width: 1px;'>
</form>
*}]