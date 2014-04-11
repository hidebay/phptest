</div>

<div class="actions">
    [{strip}]

    <ul>
        [{include file="bottomnavicustom.tpl"}]

        [{if method_exists($oView, 'getNaviItems')}]
            [{foreach from=$oView->getNaviItems() key="sKey" item="naviItem"}]
                <li><a [{if !$firstitem}]class="firstitem"[{assign var="firstitem" value="1"}][{/if}] id="btn.[{$sKey}]" href="#" onClick="[{$naviItem.sScript}]" target="edit">[{oxmultilang ident=$naviItem.sTranslationId}]</a> |</li>
            [{/foreach}]
        [{/if}]

        [{if $oView->getHelpURL()}]
            [{* HELP *}]
            <li>
                <a [{if !$firstitem}]class="firstitem"[{assign var="firstitem" value="1"}][{/if}] id="btn.help" href="[{$oView->getHelpURL()}]" OnClick="window.open('[{$oView->getHelpURL()}]','D3_Help','width=800,height=600,resizable=no,scrollbars=yes');return false;">[{oxmultilang ident="TOOLTIPS_OPENHELP"}]</a>
            </li>
        [{/if}]
    </ul>
    [{/strip}]
</div>