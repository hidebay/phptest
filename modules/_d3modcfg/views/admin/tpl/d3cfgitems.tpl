[{include file="headitem.tpl" title="d3mxmoditems"|oxmultilangassign}]

<style type="text/css">
    #modpreview p {margin: 0 0 0 100px; text-indent: -100px;}

    table#modpreview {display: block; height: 100%; overflow: auto;}
    #modpreview td {padding: 0 2px;}
    #modpreview .mod {margin-left: 5px;}
    #modpreview .mod.deactive {color: silver;}
    #modpreview .mod.new, .mod.new {border: 1px solid darkgrey; padding: 0 3px;}
    #modpreview .mod .mod {cursor: pointer;}
    #modpreview .mod.succ, .mod.succ{ color: darkgreen; float: left;}
    #modpreview .mod.deactive .mod.succ, #modpreview .mod.deactive.succ, .mod.deactive.succ{ color: #bcddb6; float: left;}
    #modpreview .mod.error, .mod.error{ color: darkred; float: left;}
    #modpreview .mod.deactive .mod.error, #modpreview .mod.deactive.error{ color: #ddb6b6; float: left;}
    #modpreview .mod option.desc {background: #E2E2E2; text-align: center;}
</style>

<script type="text/javascript">
<!--

var oLastDropDownElem;

function dropDownHandler(oElement)
{
    if (oLastDropDownElem)
    {
        oLastDropDownElem.childNodes[0].style.display = 'none';
        oLastDropDownElem.childNodes[1].style.display = 'block';
    }
    if (oElement && oElement.childNodes[0].style.display == 'none')
    {
        oElement.childNodes[0].childNodes[0].fnc.selectedIndex = 0;
        oElement.childNodes[0].style.display = 'block';
        oElement.childNodes[1].style.display = 'none';

        oLastDropDownElem = oElement;
    }
}

function submitDropDown(oElement, sText)
{
    if (oElement.fnc.options[oElement.fnc.selectedIndex].value &&
        ((oElement.fnc.options[oElement.fnc.selectedIndex].value == 'delitem' && confirm('[{oxmultilang ident="D3_CFG_MODITEM_DELMSG"}]: \n\n' + sText)) ||
        oElement.fnc.options[oElement.fnc.selectedIndex].value != 'delitem'))
        oElement.submit();
    else
        dropDownHandler(null);
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
</form>

    <fieldset style="padding: 5px; margin-bottom: 10px; height: 91%; width: 99%; float: left; background-color: white;">
        <legend>
            <form action="[{$oViewConf->getSelfLink()}]" id="fileSelectForm" method="post">
                [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    <input type="hidden" name="actshop" value="[{$shop->id}]">
                    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
                <select name="sFileSelect" size="1" onchange="document.getElementById('fileSelectForm').submit();">
                    [{foreach from=$oView->getEditableFiles() key="sKey" item="aFile"}]
                        <option [{if $sFileSelect == $sKey}] selected[{/if}] value="[{$sKey}]">[{$oView->getFileName($sKey)}]</option>
                    [{/foreach}]
                </select>
                [{if $oView->isWriteable()}][{oxmultilang ident="D3_CFG_CFGITEM_EDITABLE"}][{/if}][{if !$oView->getWritePermission()}][{oxmultilang ident="D3_CFG_CFGITEM_WRITEPROTECTED"}][{else}]<span style="color:darkred;"> [{oxmultilang ident="D3_CFG_CFGITEM_NOTWRITEPROTECTED"}]</span>[{/if}]
            </form>
        </legend>
        <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="height: 97%;" [{if !$oView->isWriteable()}]onSubmit="return confirm('[{oxmultilang ident="D3_CFG_CFGITEM_EDITABLE_QUESTION"}]');"[{else}]onSubmit="return confirm('[{oxmultilang ident="D3_CFG_CFGITEM_SAVE_QUESTION"}]');"[{/if}]>
            [{$oViewConf->getHiddenSid()}]
            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
            <input type="hidden" name="oxid" value="[{$oxid}]">
            <input type="hidden" name="voxid" value="[{$oxid}]">
            <input type="hidden" name="sFileSelect" value="[{$sFileSelect}]">
            [{if $oView->isWriteable()}]
                <input type="hidden" name="fnc" value="save">
            [{else}]
                <input type="hidden" name="fnc" value="editFile">
            [{/if}]
        <textarea cols="150" rows="5" name="newcfg" style="font-family: courier; border: none; width: 100%; height: 100%; [{if !$oView->isWriteable()}]color: silver;[{/if}]" [{if !$oView->isWriteable()}]readonly [{/if}]>[{$sCfgContent}]</textarea>
    </fieldset>

    [{if $oView->isWriteable()}]
        <div class="d3modcfg_btn fixed icon status_ok" style="margin-left: 10px;">
            <input type="submit" name="save" value="[{if $oView->hasRequiredWriteProtection()}][{oxmultilang ident="D3_CFG_CFGITEM_SAVE"}][{else}][{oxmultilang ident="D3_CFG_CFGITEM_SAVEWOPROTECTION"}][{/if}]">
    [{else}]
        <div class="d3modcfg_btn fixed icon status_danger" style="margin-left: 10px;">
            <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_CFGITEM_EDIT"}]">
    [{/if}]
        <div></div>
        </form>
    </div>

    <div class="zero_placeholder"></div>

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