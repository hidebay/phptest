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
                <table cellspacing="0" cellpadding="0" border="0">
                    [{if $blD3HasLog}]
                        <tr>
                            <td class="edittext ext_edittext" style="width: 50%;">
                                [{oxmultilang ident="D3_LOG_CFG_USEEXTLOG"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_useExtendedLogging]" value="0">
                                <input type="checkbox" name="value[blLog_useExtendedLogging]" value="1" [{if $edit->getValue('blLog_useExtendedLogging')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_EXTENDED_LOGGING_HELP"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext" style="width: 50%;">
                                [{oxmultilang ident="D3_LOG_CFG_ENABLE_ERR_REPORT"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_enableErrorReporting]" value="0">
                                <input type="checkbox" name="value[blLog_enableErrorReporting]" value="1" [{if $edit->getValue('blLog_enableErrorReporting')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_ENABLE_ERR_REPORT_HELP"}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext ext_edittext" style="width: 50%;">
                                [{oxmultilang ident="D3_LOG_CFG_ENABLE_EXC_REPORT"}]
                            </td>
                            <td class="edittext ext_edittext" align="left">
                                <input type="hidden" name="value[blLog_enableExceptionReporting]" value="0">
                                <input type="checkbox" name="value[blLog_enableExceptionReporting]" value="1" [{if $edit->getValue('blLog_enableExceptionReporting')}] checked[{/if}]>
                                       [{oxinputhelp ident="D3_LOG_CFG_ENABLE_EXC_REPORT_HELP"}]
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext ext_edittext" style="width: 50%;">
                            [{oxmultilang ident="D3_LOG_CFG_ENABLE_ADMINPROFILING"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blLog_enableAdminProfiling]" value="0">
                            <input type="checkbox" name="value[blLog_enableAdminProfiling]" value="1" [{if $edit->getValue('blLog_enableAdminProfiling')}] checked[{/if}]>
                                   [{oxinputhelp ident="D3_LOG_CFG_ENABLE_ADMINPROFILING_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext ext_edittext" style="width: 50%;">
                            [{oxmultilang ident="D3_LOG_CFG_SHOWALLEXCEPTIONS"}]
                        </td>
                        <td class="edittext ext_edittext" align="left">
                            <input type="hidden" name="value[blLog_showAllExceptions]" value="0">
                            <input type="checkbox" name="value[blLog_showAllExceptions]" value="1" [{if $edit->getValue('blLog_showAllExceptions')}] checked[{/if}]>
                                   [{oxinputhelp ident="D3_LOG_CFG_SHOWALLEXCEPTIONS_HELP"}]
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <fieldset style="margin: 10px 3px;">
                                <Legend>[{oxmultilang ident="D3_LOG_CFG_MAILMESSAGING"}]</Legend>
                                <table style="width: 100%;">
                                    <tr>
                                        <td>1.</td>
                                        <td>[{oxmultilang ident="D3_LOG_CFG_MAILADDRESS"}]: <input type="text" size="20" maxlength="80" name="value[sLog_messageadr1]" value="[{$edit->getValue('sLog_messageadr1')}]"></td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL"}]:
                                            <select class="edittext" name="value[sLog_messageerrlevel1]">
                                                <option style="background-color: silver;" value="" [{if $edit->getValue('sLog_messageerrlevel1') == ''}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_NOERR"}]</option>
                                                <option style="background-color: darkred; color: white;" value="emergency" [{if $edit->getValue('sLog_messageerrlevel1') == 'emergency'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_EMERGENCY"}]</option>
                                                <option style="background-color: #C00; color: white;" value="alert" [{if $edit->getValue('sLog_messageerrlevel1') == 'alert'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ALERT"}]</option>
                                                <option style="background-color: red;" value="critical" [{if $edit->getValue('sLog_messageerrlevel1') == 'critical'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_CRITICAL"}]</option>
                                                <option style="background-color: #FAA;" value="error" [{if $edit->getValue('sLog_messageerrlevel1') == 'error'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ERROR"}]</option>
                                                <option value="warning" [{if $edit->getValue('sLog_messageerrlevel1') == 'warning'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_WARNING"}]</option>
                                            </select>
                                            [{oxinputhelp ident="D3_LOGTYPE_DESC"}]
                                        </td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_INTERVAL"}]:
                                            [{oxmultilang ident="D3_LOG_CFG_INTERVALMAX"}] <input type="text" size="3" maxlength="4" value="[{if $edit->getValue('sLog_messageinterval1')}][{$edit->getValue('sLog_messageinterval1')}][{else}]1[{/if}]" name="value[sLog_messageinterval1]">
                                            <select class="edittext" name="value[sLog_messageintervaltype1]">
                                                <option value="day" [{if $edit->getValue('sLog_messageintervaltype1') == 'day'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_DAYS"}]</option>
                                                <option value="hour" [{if $edit->getValue('sLog_messageintervaltype1') == 'hour'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_HOURS"}]</option>
                                                <option value="minute" [{if $edit->getValue('sLog_messageintervaltype1') == 'minute'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_MINS"}]</option>
                                            </select>
                                        </td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_MAILLASTSEND"}]: [{if $edit->getValue('sLog_messagetimestamp1')}][{$edit->getValue('sLog_messagetimestamp1')|date_format:"%d.%m.%Y %H:%M"}][{else}]--[{/if}]
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>[{oxmultilang ident="D3_LOG_CFG_MAILADDRESS"}]: <input type="text" size="20" maxlength="80" name="value[sLog_messageadr2]" value="[{$edit->getValue('sLog_messageadr2')}]"></td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL"}]:
                                            <select class="edittext" name="value[sLog_messageerrlevel2]">
                                                <option style="background-color: silver;" value="" [{if $edit->getValue('sLog_messageerrlevel2') == ''}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_NOERR"}]</option>
                                                <option style="background-color: darkred; color: white;" value="emergency" [{if $edit->getValue('sLog_messageerrlevel2') == 'emergency'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_EMERGENCY"}]</option>
                                                <option style="background-color: #C00; color: white;" value="alert" [{if $edit->getValue('sLog_messageerrlevel2') == 'alert'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ALERT"}]</option>
                                                <option style="background-color: red;" value="critical" [{if $edit->getValue('sLog_messageerrlevel2') == 'critical'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_CRITICAL"}]</option>
                                                <option style="background-color: #FAA;" value="error" [{if $edit->getValue('sLog_messageerrlevel2') == 'error'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_ERROR"}]</option>
                                                <option value="warning" [{if $edit->getValue('sLog_messageerrlevel2') == 'warning'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_MAILERRLEVEL_WARNING"}]</option>
                                            </select>
                                            [{oxinputhelp ident="D3_LOGTYPE_DESC"}]
                                        </td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_INTERVAL"}]:
                                            [{oxmultilang ident="D3_LOG_CFG_INTERVALMAX"}] <input type="text" size="3" maxlength="4" value="[{if $edit->getValue('sLog_messageinterval2')}][{$edit->getValue('sLog_messageinterval2')}][{else}]1[{/if}]" name="value[sLog_messageinterval2]">
                                            <select class="edittext" name="value[sLog_messageintervaltype2]">
                                                <option value="day" [{if $edit->getValue('sLog_messageintervaltype2') == 'day'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_DAYS"}]</option>
                                                <option value="hour" [{if $edit->getValue('sLog_messageintervaltype2') == 'hour'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_HOURS"}]</option>
                                                <option value="minute" [{if $edit->getValue('sLog_messageintervaltype2') == 'minute'}]selected[{/if}]>[{oxmultilang ident="D3_LOG_CFG_INTERVALMAX_MINS"}]</option>
                                            </select>
                                        </td>
                                        <td>
                                            [{oxmultilang ident="D3_LOG_CFG_MAILLASTSEND"}]: [{if $edit->getValue('sLog_messagetimestamp2')}][{$edit->getValue('sLog_messagetimestamp2')|date_format:"%d.%m.%Y %H:%M"}][{else}]--[{/if}]
                                        </td>
                                    </tr>
                                </table>
                            </fieldset>
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