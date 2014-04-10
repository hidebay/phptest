[{include file="headitem.tpl" title="d3mxmoditems"|oxmultilangassign}]

<style type="text/css">
    #modpreview p {margin: 0 0 0 100px; text-indent: -100px;}

    table#modpreview {display: block; height: 100%; overflow: auto;}
    #modpreview td {padding: 0 2px;}
    #modpreview .mod {margin-left: 5px;}
    #modpreview .mod.deactive {color: silver;}
    #modpreview .mod.new, .mod.new {border: 1px solid darkgrey; padding: 0 3px;}
    #modpreview .mod.new.problem, .mod.new.problem {border: 1px solid red; padding: 0 3px;}
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

[{assign var="aDisabledModules" value=$oView->getDisabledModules()}]
<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="getNewModPreview">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">

    <fieldset style="padding: 5px; margin-bottom: 10px; height: 125px; width: 65%; float: left;">
        <legend><b>[{oxmultilang ident="D3_CFG_MODITEM_NEWITEMS"}]</b></legend>
        <textarea cols="150" rows="5" name="newmoditems" style="border: none; width: 99%;">[{$newMods}]</textarea>
    </fieldset>

    <fieldset style="padding: 5px; margin-bottom: 10px; height: 125px; display: block;">
        <legend>[{oxmultilang ident="D3_CFG_MODITEM_LEGEND"}]</legend>
        <ul>
            <li class="mod succ" style="float: none; clear: both;">[{oxmultilang ident="D3_CFG_MODITEM_LEGEND_EXISTS"}]</li>
            <li class="mod error" style="float: none; clear: both;">[{oxmultilang ident="D3_CFG_MODITEM_LEGEND_NOTEXISTS"}]</li>
            <li class="mod deactive succ" style="float: none; clear: both;">[{oxmultilang ident="D3_CFG_MODITEM_LEGEND_INACTIVE"}]</li>
            <li class="mod new" style="padding: 2px 2px 2px 11px; float: none; clear: both;">[{oxmultilang ident="D3_CFG_MODITEM_LEGEND_NEW"}]</li>
            <li class="mod new problem" style="padding: 2px 2px 2px 11px; float: none; clear: both;">[{oxmultilang ident="D3_CFG_MODITEM_LEGEND_NEWPROBLEM"}]</li>
        </ul>
    </fieldset>

    <div style="float: none; clear: both; height: 0; line-height: 0.1pt;"></div>

    <div class="d3modcfg_btn fixed icon status_question">
        <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MODITEM_PREVIEW"}]">
        <div></div>
    </div>

    <div class="d3modcfg_btn fixed icon status_ok" style="margin-left: 10px;">
        <input type="submit" name="save" onclick="document.getElementById('myedit').fnc.value='setNewMods'; return;" value="[{oxmultilang ident="D3_CFG_MODITEM_SAVE"}]">
        <div></div>
    </div>

    <div class="zero_placeholder"></div>
</form>

    [{if $aModPreview}]
        <hr>
        <fieldset style="height: 60%;">
            <legend>[{oxmultilang ident="D3_CFG_MODITEM_PREV"}]</legend>
            <table id="modpreview" cellspacing="0" cellpadding="0">
            [{foreach from=$aModPreview key="sClassKey" item="aClassExtension"}]
                <tr>
                    [{strip}]
                    <td style="vertical-align: top;">
                        [{if is_array($aDisabledModules[$sClassName]) && in_array($sModule, $aDisabledModules[$sClassName])}]
                            [{assign var="cssDisabled" value="disabled"}]
                        [{else}]
                            [{assign var="cssDisabled" value=""}]
                        [{/if}]
                        <div class="mod [{if !$oView->checkActive($sClassKey)}]deactive[{/if}] [{if $oView->checkClassExist($sClassKey|replace:'#':'')}]succ[{else}]error[{/if}]">
                            <div name="dropdown" style="display: none;">
                                <form action="[{$oViewConf->getSelfLink()}]" method="post" style="">
                                    [{$oViewConf->getHiddenSid()}]
                                    <input type="hidden" name="actClass" value="[{$sClassKey}]">
                                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                    <select name="fnc" onchange="submitDropDown(this.parentNode, '[{$sClassKey}]');">
                                        <option class="desc" value="" onclick="dropDownHandler(); return false;">[{*oxmultilang ident="D3_CFG_MODITEM_ACTIONFOR"*}][{$sClassKey}]</option>
                                        <option value="delitem">[{oxmultilang ident="D3_CFG_MODITEM_DELETE"}]</option>
                                        <option class="desc" value="">[{oxmultilang ident="D3_CFG_MODITEM_CANCEL"}]</option>
                                    </select>
                                </form>
                            </div>
                            <div name="desc" style="display: block; cursor: pointer;" onclick="dropDownHandler(this.parentNode); return false;">
                                [{$sClassKey}]
                            </div>
                        </div>
                    </td>
                    <td style="vertical-align: top;" class="mod [{if !$oView->checkActive($sClassKey)}]deactive[{/if}]">=></td>
                    <td class="mod [{if !$oView->checkActive($sClassKey)}]deactive[{/if}]">
                        [{foreach from=$aClassExtension item="sExtension" name="classExt"}]
                            [{assign var="oModule" value=$oView->getModuleId($sExtension)}]
                            [{if $oView->isDisabled($sExtension)}]
                                [{assign var="cssDisabled" value="deactive"}]
                            [{else}]
                                [{assign var="cssDisabled" value=""}]
                            [{/if}]
                            <div class="mod [{$cssDisabled}] [{if $oView->isNewModule($sClassKey, $sExtension)}]new[{if $oView->hasFurtherPossibleProblems($sClassKey, $sExtension)}] problem[{/if}][{/if}] [{if $oView->checkModExist($sExtension)}]succ[{else}]error[{/if}]">
                                <div name="dropdown" style="display: none;">
                                    <form action="[{$oViewConf->getSelfLink()}]" method="post" style="">
                                        [{$oViewConf->getHiddenSid()}]
                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                        <input type="hidden" name="actClass" value="[{$sClassKey}]">
                                        <input type="hidden" name="extension" value="[{$sExtension}]">
                                        [{if $oModule}]
                                            <input type="hidden" name="moduleid" value="[{$oModule->getId()}]">
                                        [{/if}]
                                        <select name="fnc" onchange="submitDropDown(this.parentNode, '[{$sExtension}]');">
                                            <option class="desc" value="" onclick="dropDownHandler(); return false;">[{*oxmultilang ident="D3_CFG_MODITEM_ACTIONFOR"*}][{$sExtension}]</option>
                                            [{if $oView->isDisabled($sExtension)}]
                                                <option value="activateallmoditems">[{oxmultilang ident="D3_CFG_MODITEM_ACTIVEALLMOD"}]</option>
                                            [{else}]
                                                <option value="deactivateallmoditems">[{oxmultilang ident="D3_CFG_MODITEM_DEACTIVEALLMOD"}]</option>
                                            [{/if}]
                                            <option value="delitem">[{oxmultilang ident="D3_CFG_MODITEM_DELETE"}]</option>
                                            [{if !$smarty.foreach.classExt.first}]<option value="moveItemToFirst">[{oxmultilang ident="D3_CFG_MODITEM_TOFIRST"}]</option>[{/if}]
                                            [{if !$smarty.foreach.classExt.last}]<option value="moveItemToLast">[{oxmultilang ident="D3_CFG_MODITEM_TOLAST"}]</option>[{/if}]
                                            <option class="desc" value="">[{oxmultilang ident="D3_CFG_MODITEM_CANCEL"}]</option>
                                        </select>
                                    </form>
                                </div>
                                <div name="desc" style="display: block;" onclick="dropDownHandler(this.parentNode); return false;">
                                    [{if !$smarty.foreach.classExt.first}]&[{/if}]
                                    [{$sExtension}]
                                </div>
                            </div>
                        [{/foreach}]
                    </td>
                    [{/strip}]
                </tr>
            [{/foreach}]
            </table>
        </fieldset>
    [{/if}]

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">

[{if $sD3Msg}]
    [{assign var="sMsgIdent" value="D3_CFG_MSG_"|cat:$sD3Msg|upper}]
    alert('[{oxmultilang ident=$sMsgIdent}]');
[{/if}]

if (parent.parent)
{   parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
    parent.parent.sMenuItem    = "[{oxmultilang ident=$oView->d3GetMenuItemTitle()}]";
    parent.parent.sMenuSubItem = "[{oxmultilang ident=$oView->d3GetMenuSubItemTitle()}]";
    parent.parent.sWorkArea    = "[{$_act}]";
    parent.parent.setTitle();
}
</script>