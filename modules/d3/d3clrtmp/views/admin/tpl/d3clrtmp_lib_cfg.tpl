<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="modid" value="[{$oView->getSelectedModId()}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

    <table border="0" width="98%">
        <tr>
            <td valign="top" class="edittext">

                [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
                <table cellspacing="0" cellpadding="0" border="0" style="width: 50%;">
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_CREATE_NOHTACCESS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blClrTmp_nohtaccess]" value="0">
                            <input type="checkbox" name="value[blClrTmp_nohtaccess]"
                                   value="1" [{if $edit->getValue('blClrTmp_nohtaccess')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_REMOVEFOLDERS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blClrTmp_nofolderremove]" value="0">
                            <input type="checkbox" name="value[blClrTmp_nofolderremove]"
                                   value="1" [{if $edit->getValue('blClrTmp_nofolderremove')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_NOUPDATEVIEWS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blClrTmp_noviewupdate]" value="0">
                            <input type="checkbox" name="value[blClrTmp_noviewupdate]"
                                   value="1" [{if $edit->getValue('blClrTmp_noviewupdate')}] checked[{/if}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_TICKERTHRESHOLD"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="6" maxlength="6" name="value[iClrTmp_tickerThreshold]"
                                   value="[{if $edit->getValue('iClrTmp_tickerThreshold')}][{$edit->getValue('iClrTmp_tickerThreshold')}][{else}]5000[{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_1"}]
                        </td>
                        <td class="edittext ext_edittext" align="left"></td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="40" maxlength="100"
                                   name="value[sClrTmp_useraction1name]"
                                   value="[{if $edit->getValue('sClrTmp_useraction1name')}][{$edit->getValue('sClrTmp_useraction1name')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="40" maxlength="150"
                                   name="value[sClrTmp_useraction1pattern]"
                                   value="[{if $edit->getValue('sClrTmp_useraction1pattern')}][{$edit->getValue('sClrTmp_useraction1pattern')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_2"}]
                        </td>
                        <td class="edittext ext_edittext" align="left"></td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_NAME"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="40" maxlength="100"
                                   name="value[sClrTmp_useraction2name]"
                                   value="[{if $edit->getValue('sClrTmp_useraction2name')}][{$edit->getValue('sClrTmp_useraction2name')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                        [{oxmultilang ident="D3_CFG_CLRTMP_CFG_USERACTION_PATTERN"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="40" maxlength="150"
                                   name="value[sClrTmp_useraction2pattern]"
                                   value="[{if $edit->getValue('sClrTmp_useraction2pattern')}][{$edit->getValue('sClrTmp_useraction2pattern')}][{/if}]">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="d3modcfg_btn icon status_ok">
                                <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MOD_SAVE"}]">
                                <span></span>
                            </span>
                        </td>
                        <td></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>