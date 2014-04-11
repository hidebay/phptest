[{$smarty.block.parent}]

<tr id="d3notuse4filter">
    <td class="edittext">
        [{oxmultilang ident="D3_EXTSEARCH_ATTRIBUTE_NOTUSE4FILTER"}]
    </td>
    <td class="edittext">
        <input type="hidden" name="editval[oxattribute__d3notuse4filter]" value="0">
        <input type="checkbox" name="editval[oxattribute__d3notuse4filter]" id="d3notuse4filter" value="1" class="edittext" [{if $edit->oxattribute__d3notuse4filter->value == 1}]CHECKED[{/if}] [{$readonly}]>
    </td>
</tr>