<div style="background-color: #EFF0FF; border: 1px solid #BBCCEE; color: #000; margin-bottom: 10px; padding: 0 5px;">
    [{oxmultilang ident="D3_INSTALL_FTPINFO_CONFIG"}]
</div>

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

                <table cellspacing="0" cellpadding="0" border="0" style="width: 50%;">
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FORCEFTP"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blInstall_forceFtpConnect]" value="0">
                            <input type="checkbox" name="value[blInstall_forceFtpConnect]" value="1" [{if $edit->getValue('blInstall_forceFtpConnect')}] checked[{/if}]>
                            [{oxinputhelp ident="D3_INSTALL_CFG_FORCEFTP_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FTPSERVER"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            ftp://<input type="text" size="50" maxlength="150" name="value[sInstall_forceFtpServerName]" value="[{$edit->getValue('sInstall_forceFtpServerName')}]">/
                            [{oxinputhelp ident="D3_INSTALL_CFG_FTPSERVER_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FTPPORT"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="6" maxlength="10" name="value[sInstall_forceFtpPort]" value="[{$edit->getValue('sInstall_forceFtpPort')}]">
                            [{oxinputhelp ident="D3_INSTALL_CFG_FTPPORT_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FTPPATH"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="50" maxlength="50" name="value[sInstall_forceFtpPath]" value="[{$edit->getValue('sInstall_forceFtpPath')}]">
                            [{oxinputhelp ident="D3_INSTALL_CFG_FTPPATH_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FTPUSER"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="text" size="50" maxlength="50" name="value[sInstall_forceFtpUser]" value="[{$edit->getValue('sInstall_forceFtpUser')}]">
                            [{oxinputhelp ident="D3_INSTALL_CFG_FTPUSER_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 100%;">
                            [{oxmultilang ident="D3_INSTALL_CFG_FTPPASS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="password" size="50" maxlength="30" name="value[sInstall_forceFtpPass]" value="[{$edit->getValue('sInstall_forceFtpPass')}]">
                            [{oxinputhelp ident="D3_INSTALL_CFG_FTPPASS_HELP"}]
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