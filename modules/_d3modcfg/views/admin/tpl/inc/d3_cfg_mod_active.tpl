[{if $edit->getErrorMessage()}]
    <div class="extension_error">
        [{$edit->getErrorMessage()}]
    </div>
[{/if}]

<table style="width: 100%">
    <tr>
        <td style="width:50%; border-right: 1px solid #999;">
            <table cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td class="edittext ext_edittext">
                        <label for="module_active">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULEACTIVE"}]</label>
                    </td>
                    <td class="edittext ext_edittext">
                        <input type="hidden" name="editval[oxactive]" value='0'>
                        <input id="module_active" class="edittext ext_edittext" type="checkbox" name="editval[oxactive]" value='1' [{if $edit->getFieldData('oxactive') == 1}]checked[{/if}]>
                        [{oxinputhelp ident="D3_CFG_MOD_GENERAL_MODULEACTIVE_DESC"}]
                    </td>
                </tr>
                [{if $oView->getHasDebugSwitch()}]
                    <tr>
                        <td class="edittext ext_edittext">
                            [{if $oView->getLogStatus('debug', FALSE)}]<span style="font-weight: bold; color: #CD0210;">[{/if}]<label for="module_debug">[{oxmultilang ident="D3_CFG_MOD_GENERAL_DEBUGACTIVE"}]</label>[{if $oView->getLogStatus(FALSE, 'debug')}]</span>[{/if}]
                        </td>
                        <td class="edittext ext_edittext">
                            <input type="hidden" name="logtypes[7]" value="0">
                            <input id="module_debug" class="edittext ext_edittext" type="checkbox" name="logtypes[7]" value='1' [{if $oView->getLogStatus('debug', FALSE)}]checked[{/if}]>
                            [{oxinputhelp ident=$oView->getDebugHelpTextIdent()}]
                        </td>
                    </tr>
                [{/if}]
                [{if $oView->getHasTestSwitch()}]
                    <tr>
                        <td class="edittext ext_edittext">
                            [{if $oView->getLogStatus('test', FALSE)}]<span style="font-weight: bold; color: #CD0210;">[{/if}]<label for="module_test">[{oxmultilang ident="D3_CFG_MOD_GENERAL_TESTMODEACTIVE"}]</label>[{if $oView->getLogStatus('test', FALSE)}]</span>[{/if}]
                        </td>
                        <td class="edittext ext_edittext">
                            <input type="hidden" name="logtypes[8]" value="0">
                            <input id="module_test" class="edittext ext_edittext" type="checkbox" name="logtypes[8]" value='1' [{if $oView->getLogStatus('test', FALSE)}]checked[{/if}]>
                            [{oxinputhelp ident=$oView->getTestModeHelpTextIdent()}]
                        </td>
                    </tr>
                [{/if}]
            </table>
        </td>
        <td>
            [{assign var="blD3HasLog" value=$oView->checkD3Log()}]
            [{assign var="oLogSet" value=$oView->getLogSet()}]
            <table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">
                <tr>
                    <td class="edittext ext_edittext" style="width: 50%;">
                        [{if $blD3HasLog}]
                            <label for="loglevelelement">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING"}]</label>
                        [{/if}]
                    </td>
                    <td class="edittext ext_edittext" align="left">
                    [{if $blD3HasLog}]
                        [{include file="d3loglevel_form.tpl" oLogSet=$oLogSet oModule=FALSE}]
                    [{/if}]
                    </td>
                </tr>
                <tr>
                    <td class="edittext ext_edittext" style="width: 50%;">
                        &nbsp;
                    </td>
                    <td class="edittext ext_edittext" align="left">
                        &nbsp;
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>