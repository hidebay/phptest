[{$smarty.block.parent}]

<tr>
    <td class="edittext" width="120">
        [{oxmultilang ident="D3_EXTSEARCH_PUSH"}]
    </td>
    <td class="edittext">
        <select class="edittext" name="editval[oxarticles__d3push]" size="1">
            <option value="1"
            [{if $edit->oxarticles__d3push->value == 1}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_PUSH_1"}]</option>
            <option value="2"
            [{if $edit->oxarticles__d3push->value == 2}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_PUSH_2"}]</option>
            <option value="3"
            [{if $edit->oxarticles__d3push->value == 3}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_PUSH_3"}]</option>
        </select>
        [{oxinputhelp ident="D3_EXTSEARCH_PUSH_DESC"}]
    </td>
</tr>