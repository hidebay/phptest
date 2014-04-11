<div class="actions">
    [{strip}]

    <ul>
        [{include file="bottomnavicustom.tpl"}]
        <li><a [{if !$firstitem}]class="firstitem"[{assign var="firstitem" value="1"}][{/if}] id="btn.new" href="#" onClick="Javascript:top.oxid.admin.editThis( -1 );return false" target="edit">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_NEWWORD"}]</a> </li>
    </ul>
    [{/strip}]
</div>