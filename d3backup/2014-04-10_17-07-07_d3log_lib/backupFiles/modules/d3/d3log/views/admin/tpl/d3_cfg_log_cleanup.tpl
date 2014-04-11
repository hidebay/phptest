[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

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
    oSearch.delete_oxtime.value = document.getElementById('myedit').delete_oxtime.value;
    oSearch.delete_oxtype.value = document.getElementById('myedit').delete_oxtype.value;
    oSearch.delete_oxmodid.value = document.getElementById('myedit').delete_oxmodid.value;
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
        <input type="hidden" name="fnc" value="delete">
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
                            [{oxmultilang ident="D3_CFG_CLEAN_DEL1"}]&nbsp;
                        </td>
                        <td class="edittext">
                        </td>
                    </tr>

                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_CLEAN_DEL_MODULE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <select name="delete_oxmodid" class="editinput">
                                <option value="">[{oxmultilang ident="D3_CFG_CLEAN_DEL_MODULE_ALL"}]</option>
                                [{foreach from=$oView->getModIdList() item="item"}]
                                    <option value="[{$item}]">[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_CLEAN_DEL_TIME"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <input type="text" class="editinput" size="32" maxlength="[{$edit->d3log__oxtime->fldmax_length}]" name="delete_oxtime" value="[{$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}]" [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext">
                            [{oxmultilang ident="D3_CFG_CLEAN_DEL_TYPE"}]&nbsp;
                        </td>
                        <td class="edittext">
                            <select name="delete_oxtype" class="editinput">
                                <option value="">[{oxmultilang ident="D3_CFG_CLEAN_DEL_TYPE_ALL"}]</option>
                                [{foreach from=$oView->getLogTypeList() item="item"}]
                                    <option value="[{$item}]">[{$item}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><br><br>
                            <span class="d3modcfg_btn icon status_failed">
                                <input type="submit" name="deleteItem" value="[{oxmultilang ident="D3_CFG_CLEAN_DELETE"}]" onClick="transferFields(); top.oxid.admin.deleteThis('');" [{$readonly}]>
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
