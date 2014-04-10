[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{if $sExportPath && !$Errors}]
    <div class="messagebox" style="padding-left: 9px;">
        <p>[{oxmultilang ident="D3_CFG_EXPORT_FILEMESSAGE"}] [{$sExportPath}] [{if $blMailSend}][{oxmultilang ident="D3_CFG_EXPORT_MAILMESSAGE"}][{/if}]</p>
    </div>
[{/if}]

<script type="text/javascript">
<!--
[{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
[{/if}]

function UpdateList( sID)
{
    var oSearch = parent.list.document.getElementById("search");
    oSearch.oxid.value=sID;
    oSearch.fnc.value='';
    oSearch.submit();
}

function transferFields()
{
    oSearch = top.basefrm.list.document.getElementById('search');
    oSearch.export_oxtime.value = document.getElementById('myedit').export_oxtime.value;
    oSearch.export_oxmodid.value = document.getElementById('myedit').export_oxmodid.value;
}

//-->
</script>

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

<table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
    <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0;margin: 0;height:0;">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="d3logexport_sql">
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="voxid" value="[{$oxid}]">
        [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
            <input type="hidden" name="[{$key}]" value="[{$formparam}]">
        [{/foreach}]
        <tr>
            <td valign="top" class="edittext" style="padding-top:10px;padding-left:10px;">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP1"}]&nbsp;
                        </td>
                        <td class="edittext">
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP_MODULE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <select name="export_oxmodid" class="editinput">
                                <option value="">[{oxmultilang ident="D3_CFG_EXPORT_EXP_MODULE_ALL"}]</option>
                                [{foreach from=$oView->getModIdList() item="item"}]
                                    <option value="[{$item}]" [{if $oxmodid == $item}] selected[{/if}]>[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP_TIME"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxtime->fldmax_length}]" name="export_oxtime" value="[{if $oxtime}][{$oxtime}][{else}][{$deftime}][{/if}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP_SESSID"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxsessid->fldmax_length}]" name="export_oxsessid" value="[{if $oxsessid}][{$oxsessid}][{/if}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP_CLASS"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <select name="export_oxclass" class="editinput">
                                <option value="">[{oxmultilang ident="D3_CFG_EXPORT_EXP_CLASS_ALL"}]</option>
                                [{foreach from=$oView->getClassList() item="item"}]
                                    <option value="[{$item}]" [{if $oxclass == $item}] selected[{/if}]>[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_EXPORT_EXP_MAIL"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="40" name="export_mail" value="[{if $mail}][{$mail}][{/if}]" [{$readonly}]>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" style="white-space: normal;"><br><br>
                            <span class="d3modcfg_btn icon action_download" style="margin-right: 10px;">
                                <input type="submit" name="exportItem" value="[{oxmultilang ident="D3_CFG_EXPORT_SQL"}]" onclick="document.getElementById('myedit').fnc.value='d3logexport_sql';" [{$readonly}]>
                                <span></span>
                            </span>
                            &nbsp;&nbsp;
                            <span class="d3modcfg_btn icon action_download">
                                <input type="submit" name="exportItem" value="[{oxmultilang ident="D3_CFG_EXPORT_CSV"}]" onclick="document.getElementById('myedit').fnc.value='d3logexport_csv';" [{$readonly}]>
                                <span></span>
                            </span>
                        </td>
                    </tr>

                </table>
            </td>

    <!-- Anfang rechte Seite -->
            <td valign="top" class="edittext" align="left" style="height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">

            </td>
    <!-- Ende rechte Seite -->
        </tr>
    </form>
</table>

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
