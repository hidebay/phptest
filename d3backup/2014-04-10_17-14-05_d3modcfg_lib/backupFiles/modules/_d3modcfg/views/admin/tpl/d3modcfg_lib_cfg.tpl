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
                            [{oxmultilang ident="D3_CFG_MODCFG_CFG_HIDEADMINHOMEINFO"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blModCfg_noAdminHomeInfo]" value="0">
                            <input type="checkbox" name="value[blModCfg_noAdminHomeInfo]" value="1" [{if $value->d3_cfg_mod__blModCfg_noAdminHomeInfo}] checked[{/if}]>
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