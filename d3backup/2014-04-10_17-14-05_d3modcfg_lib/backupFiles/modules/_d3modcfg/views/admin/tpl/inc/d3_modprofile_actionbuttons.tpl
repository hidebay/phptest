<tr>
    <td class="edittext" colspan="2" style="padding-top: 20px;">
        <span class="d3modcfg_btn icon status_ok">
            <input type="submit" class="edittext" name="saveArticle" value="[{oxmultilang ident="D3_GENERAL_MODPROFILE_SAVE"}]" onClick="document.myedit.fnc.value='save'" [{$readonly}]>
            <span></span>
        </span>
    </td>
</tr>

<tr>
    <td class="edittext" colspan="2"><br>
        <span class="d3modcfg_btn icon action_plus" style="margin-right: 10px;">
            <input type="submit" name="save" value="[{oxmultilang ident="D3_GENERAL_MODPROFILE_COPY"}]" class="saveinnewlangtext" style="width: 100;" onClick="document.myedit.fnc.value='d3savecopy'" [{if $oxid == '-1'}] disabled[{/if}] [{$readonly}] [{$readonly_fields}] [{$custreadonly}]>
            <span></span>
        </span>

        <span class="d3modcfg_btn icon action_download">
            <input type="submit" name="save" value="[{oxmultilang ident="D3_GENERAL_MODPROFILE_EXPORT"}]" class="saveinnewlangtext" style="width: 100;" onClick="document.myedit.fnc.value='d3exportProfile'" [{if $oxid == '-1'}] disabled[{/if}] [{$readonly_fields}] [{$custreadonly}]>
            <span></span>
        </span>
    </td>
</tr>