[{$smarty.block.parent}]

<tr id="d3issearchable">
    <td class="edittext">
        [{oxmultilang ident="D3_EXTSEARCH_CONTENT_SEARCHABLE"}]
    </td>
    <td class="edittext">
        <input type="hidden" name="editval[oxcontents__d3issearchable]" value="0">
        <input type="checkbox" name="editval[oxcontents__d3issearchable]" id="d3issearchable" value="1" class="edittext" [{if $edit->oxcontents__d3issearchable->value == 1}]CHECKED[{/if}] [{$readonly}]>
    </td>
</tr>