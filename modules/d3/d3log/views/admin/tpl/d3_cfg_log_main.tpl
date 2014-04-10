[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
    [{if $updatelist == 1}]
        UpdateList('[{$oxid}]');
    [{/if}]

    function ChangeFormat()
    {
        var oOPField = document.getElementById("codeformat");
        if (oOPField.className == 'code')
            oOPField.className = 'codepre';
        else
            oOPField.className = 'code';
    }

//-->
</script>

<style type="text/css">
    td.edittext { height: 25px;}
    td.edittext table {width: 100%;}
    .code, .codepre {background-color:#EEEEEE; border:1px inset #999999; margin:10px auto; width:100%; white-space: normal;}
    .codepre {white-space: pre;}
    .code div, .codepre div {font-family:courier; max-height:145px; overflow:auto; padding:5px;}
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
    [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
        <input type="hidden" name="[{$key}]" value="[{$formparam}]">
    [{/foreach}]
</form>

[{if $edit->getId()}]
    <table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
        <tr>
            <td valign="top" class="edittext" style="padding-top:10px;padding-left:10px;">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_MODULE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxmodid')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_TIME"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxtime')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_COUNTER"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxcounter')}]
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_LOGTYPE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxlogtype')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_SESSID"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxsessid')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_CLASS"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxclass')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_FUNCTION"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxfnc')}]
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_LINE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            [{$edit->getFieldData('oxline')}]
                        </td>
                    </tr>

                </table>
            </td>

<!-- Anfang rechte Seite -->
            <td valign="top" class="edittext" align="left" style="width: 65%; height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                <table cellspacing="0" cellpadding="0" border="0">
                    [{if $edit->getFieldData('oxaction')}]
                        <tr>
                            <td class="edittext">
                                [{oxmultilang ident="D3_CFG_LOG_ACTION"}]&nbsp;
                            </td>
                            <td class="edittext">
                                [{$edit->getFieldData('oxaction')}]
                            </td>
                        </tr>
                    [{/if}]
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_LOG_TEXT"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <fieldset class="codepre" id="codeformat">
                                <div>
                                    [{$edit->getFieldData('oxtext')}]
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            <label for="wrapMessage">[{oxmultilang ident="D3_CFG_LOG_WRAP"}]</label>&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="checkbox" id="wrapMessage" onClick="ChangeFormat();" checked>
                        </td>
                    </tr>
                </table>

            </td>
<!-- Ende rechte Seite -->

        </tr>
    </table>

[{else}]
    [{$oView->getLogInfoMessage()}]
[{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
if (parent.parent)
{   parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
    parent.parent.sMenuItem    = "[{oxmultilang ident=$oView->d3GetMenuItemTitle()}]";
    parent.parent.sMenuSubItem = "[{oxmultilang ident=$oView->d3GetMenuSubItemTitle()}]";
    parent.parent.sWorkArea    = "[{$_act}]";
    parent.parent.setTitle();
}
</script>
