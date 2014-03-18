<div id="d3_extsearch_quicksearch">
    <div class="headline">
        <div class="closebtn" onclick="document.getElementById('xajax_resp').style.display='none';"></div>
        [{$iHitCount}] [{if $similar}][{oxmultilang ident="D3_EXTSEARCH_QUICK_SIMILARHITS"}][{else}][{oxmultilang ident="D3_EXTSEARCH_QUICK_HITS"}][{/if}] "[{$sSearchparam}]"
    </div>

    [{strip}]
        <div class="list" id="searchItemList">
            [{if $oHit}]
                [{foreach name="hitlist" from=$oHit item="hit"}]
                    [{strip}]
                    <a class="item_inact" id="[{$hit->oxarticles__oxid->value}]" onmouseover='moveActItemLineMouse(this.id, [{$smarty.foreach.hitlist.index}]);' href="[{$hit->getLink()}]">
                        <div class="imgframe"><img src="[{$hit->getIconUrl()}]" alt="[{$hit->oxarticles__oxtitle->value}]"></div>&nbsp;[{$hit->oxarticles__oxtitle->value}]
                        [{if $hit->oxarticles__oxvarselect->value}] [{$hit->oxarticles__oxvarselect->value}][{/if}]
                    </a>
                    [{/strip}]
                [{/foreach}]
                <a href="#" onclick="document.getElementById('f.search').submit();" class="item_inact">
                    [{oxmultilang ident="D3_EXTSEARCH_QUICK_STARTSEARCH"}]
                </a>
            [{elseif $blToMuchHits}]
                <a href="#" onclick="document.getElementById('f.search').submit();" class="item_inact">
                    [{oxmultilang ident="D3_EXTSEARCH_QUICK_TOMUCHHITS"}]
                </a>
            [{else}]
                <a href="#" onclick="document.getElementById('xajax_resp').style.display='none';" class="item_inact">
                    [{oxmultilang ident="D3_EXTSEARCH_QUICK_NOHIT"}]
                </a>
            [{/if}]
        </div>
    [{/strip}]
</div>

[{*** Folgender Abschnitt, um Warenkorbfunktionalit�t zu integrieren. Innerhalb der foreach-Schleife zu verwenden ***}]
[{*
<form action='[{$shop->selfactionlink}]' method='POST' name='basket'>
    [{$shop->hiddensid}]
    <input type='hidden' name='cl' value='[{$sClassname}]'>
    *}][{* Achtung, nicht $shop->cl verwenden, statt dessen [{$sClassname}]  *}][{*
    <input type='hidden' name='fnc' value='tobasket'>
    <input type='hidden' name='aid' value='[{$hit->oxarticles__oxid->value}]'>
    <input type='hidden' name='anid' value='[{$hit->oxarticles__oxid->value}]'>
    <input type='hidden' name='am' value='1'>
    <input type='image' src='[{$shop->imagedir}]/tobasket_button.gif' alt='[{oxmultilang ident="D3_EXTSEARCH_QUICK_TOBASKET"}]' style='float: left; margin: 0px; margin-right: 2px; border-style: solid; border-color: #CCC; border-width: 1px;'>
</form>
*}]