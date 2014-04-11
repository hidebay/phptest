[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
<!--
[{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
[{/if}]

function getDetails(sElemId, sDisplayType)
{
    if (!sDisplayType) sDisplayType = 'table-row';

    oElem = document.getElementById(sElemId);
    if (oElem.style.display == sDisplayType)
        oElem.style.display = 'none';
    else
        oElem.style.display = sDisplayType;
}

function getUpdateStatus()
{
    document.getElementById('getRemote').submit();
}
-->
</script>

<style type="text/css">
<!--
fieldset{
    border: 1px inset black;
    background-color: #F0F0F0;
}

legend{
    font-weight: bold;
}

dl dt{
    font-weight: normal;
    width: 55%;
}

.ext_edittext {
    padding: 2px;
}

td.edittext {
    white-space: normal;
}

td.noaction,
a.noaction{
    color:#AAA;
}

td.noaction img,
td.action img {
	border: none;
}

td.listitem.action,
td.listitem2.action,
td.listitem.noaction,
td.listitem2.noaction {
   padding-left: 5px;
   padding-right: 5px;
}

td.listitem img,
td.listitem2 img,
td.listitem .image,
td.listitem2 .image {
	height: 20px;
}

.d3install_btn {
	background
}

.statusyellow {
	width: 5px;
    background-color: #FFCC00;
}

.statusgreen {
    width: 5px;
    background-color: #00CC22;
}

.statusblue {
    width: 5px;
    background-color: #0000FF;
}

.box td.listitem.itemerror,
.box td.listitem2.itemerror {
    color: darkred;
}

.box td.listitem.itemdisabled,
.box td.listitem2.itemdisabled {
    color: #888;
}

.clickable {
    cursor: pointer;
}

dl {
    border-top: 0 none;
    padding-top: 0;
    margin-top: 0;
}

dl dt {
    clear: both;
    float: left;
}

dl dt.listitem,
dl dd.listitem,
dl dt.listitem2,
dl dd.listitem2
{
    min-height: 21px;
    padding: 2px 4px;
}

dl dt.listitem2,
dl dd.listitem2
{
    background-color: #F0F0F0;
}

-->
</style>

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="actshop" value="[{$shop->id}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
</form>

[{if $sInstallModId}]
    [{oxmultilang ident="D3_CFG_MOD_VERSION_INSTALLSTATUS"}]
    <iframe scrolling="no" frameborder="0" src="[{$oView->getInstallModiFrameLink()}]" width="100%" height="95%" name="d3_mod_install">
    </iframe>
    <style type="text/css">
        div.box{background-image: none !important;}
    </style>

[{else}]
    <table border="0" width="98%">
        <tr>
            <td valign="top" class="edittext">
                [{assign var="aRemoteMods" value=$oView->getRemoteMods()}]
                [{assign var="sDownloadField" value=$oView->getPhpVersionDownloadField()}]
                <fieldset>
                    <legend>
                        [{if $oView->getModuleType() == 'lib'}]
                            [{oxmultilang ident="D3_MOD_LIB_INSTALLED"}]
                        [{else}]
                            [{oxmultilang ident="D3_MOD_EXT_INSTALLED"}]
                        [{/if}]
                    </legend>
                    <table style="width: 100%;">
                        <colgroup>
                            <col width="35">
                            <col width="40">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col width="40">
                            <col width="40">
                            <col width="40">
                        </colgroup>
                        <tr>
                            <th>[{oxmultilang ident="D3_CFG_LIB_STATUS"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_UPDATE"}]</th>
                            [{if $oView->getModuleType() == 'lib'}]
                                <th>[{oxmultilang ident="D3_CFG_LIB_LIBRARY"}]</th>
                            [{else}]
                                <th>[{oxmultilang ident="D3_CFG_LIB_EXTENSION"}]</th>
                            [{/if}]
                            <th>[{oxmultilang ident="D3_CFG_LIB_INSTALLDATE"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_INSTALLED"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_AVAILABLE"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_INFO"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_INSTALLATION"}]</th>
                            <th>[{oxmultilang ident="D3_CFG_LIB_DOWNLOADIT"}]</th>
                        </tr>

                        [{assign var="blWhite" value=""}]
                        [{foreach from=$oView->getInstalledModuleList() item="oModule" key="sKey"}]
                            [{assign var="listclass" value="listitem"|cat:$blWhite}]

                            [{if !$oModule->getId()}]
                                [{assign var="formatclass" value=""}]
                                [{assign var="iconclass" value="d3modcfg_icon status_plus_inactive"}]
                            [{elseif $oModule->getErrorMessage()}]
                                [{assign var="formatclass" value="itemerror"}]
                                [{assign var="iconclass" value="d3modcfg_icon status_danger"}]
                            [{elseif !$oModule->isActive()}]
                                [{assign var="formatclass" value="itemdisabled"}]
                                [{assign var="iconclass" value="d3modcfg_icon status_ok_inactive"}]
                            [{else}]
                                [{assign var="formatclass" value=""}]
                                [{assign var="iconclass" value="d3modcfg_icon status_ok"}]
                            [{/if}]

                            [{assign var="aRemoteModData" value=$oView->getRemoteModuleData($oModule->d3GetModId())}]

                            [{if ($aRemoteModData.newestversion.version && $oView->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData.newestversion.version, '>='))
                                 || (!$aRemoteModData.newestversion.version && $aRemoteModData.availableversion.version && $oView->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData.availableversion.version, '>='))}]
                                [{assign var="updateicon" value="d3modcfg_icon"}]
                                [{assign var="icondesc" value="D3_MOD_LIB_NOACTION"|oxmultilangassign}]
                            [{elseif ($aRemoteModData.newestversion.version && $oView->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData.newestversion.version, '<'))
                                 || (!$aRemoteModData.newestversion.version && $aRemoteModData.availableversion.version && $oView->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData.availableversion.version, '<'))}]
                                [{assign var="updateicon" value="d3modcfg_icon status_attention"}]
                                [{assign var="icondesc" value="D3_MOD_EXT_REFRESH"|oxmultilangassign}]
                            [{elseif $blGetRemoteUpdateStatus}]
                                [{assign var="updateicon" value="d3modcfg_icon status_question_inactive"}]
                                [{assign var="icondesc" value="D3_MOD_LIB_NOUPDATEINFO"|oxmultilangassign}]
                            [{else}]
                                [{assign var="updateicon" value="d3modcfg_icon status_question_inactive"}]
                                [{assign var="icondesc" value="D3_CFG_LIB_GETLIBLIST"|oxmultilangassign}]
                            [{/if}]
                            <tr>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="height: 24px; text-align: center;" onClick="getDetails('[{$sKey}]'); return false;">
                                    <img class="[{$iconclass}]" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]">
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="height: 24px; text-align: center;" onClick="getUpdateStatus(); return false;">
                                    <img class="[{$updateicon}]" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{$icondesc}]" title="[{$icondesc}]">
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="background-image: url('[{$oViewConf->getResourceUrl()}]bg/grouping.gif'); background-repeat: no-repeat; background-position: 0 -37px; padding: 5px; padding-left: 15px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    <b>[{$oModule->getModTitle()}]</b> ([{$oModule->getFieldData('oxmodid')}])
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{$oModule->getFieldData('oxinstalldate')|date_format:"%d.%m.%Y %H:%M"}]
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{$oModule->getFieldData('oxversion')}] [{$oModule->getFieldData('oxshopversion')}]
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}] clickable" style="padding: 5px;" title="[{oxmultilang ident="D3_CFG_LIB_GETDETAILS"}]" onClick="getDetails('[{$sKey}]'); return false;">
                                    [{if $aRemoteModData.newestversion.version}]
                                        [{$aRemoteModData.newestversion.version}]
                                    [{elseif $aRemoteModData.availableversion.version}]
                                        [{$aRemoteModData.availableversion.version}]
                                    [{else}]
                                        [{oxmultilang ident="D3_CFG_LIB_VERSIONUNKNOWN"}]
                                    [{/if}]
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                    [{if $aRemoteModData.newestversion.infourl}]
                                        <a target="modinfo" class="[{$fontclass}] d3modcfg_icon status_info" href="[{$aRemoteModData.newestversion.infourl}]" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></a>
                                    [{elseif $aRemoteModData.availableversion.infourl}]
                                        <a target="modinfo" class="[{$fontclass}] d3modcfg_icon status_info" href="[{$aRemoteModData.availableversion.infourl}]" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></a>
                                    [{else}]
                                        <img class="d3modcfg_icon status_info_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                    [{/if}]
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                    [{if $aRemoteModData.availableversion.autoupdate && $aRemoteModData.availableversion.$sDownloadField}]
                                        <form name="autoupdate" id="autoupdate" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            [{$oViewConf->getHiddenSid()}]
                                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                            <input type="hidden" name="oxid" value="[{$oxid}]">
                                            <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                            <input type="hidden" name="fnc" value="installMod">
                                            <input type="hidden" name="modid" value="[{$aRemoteModData.availableversion.modid}]">

                                            [{if !$oModule->getFieldData('oxversion')}]
                                                <input type="image" class="d3modcfg_icon action_plus" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" alt="[{oxmultilang ident="D3_MOD_LIB_INSTALL"}]" title="[{oxmultilang ident="D3_MOD_LIB_INSTALL"}]">
                                            [{elseif $oView->version_compare($oModule->getFieldData('oxversion'), $aRemoteModData.availableversion.version, '<')}]
                                                <input type="image" class="d3modcfg_icon action_refresh" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" alt="[{oxmultilang ident="D3_MOD_LIB_REFRESH"}]" title="[{oxmultilang ident="D3_MOD_LIB_REFRESH"}]">
                                            [{else}]
                                                <input type="image" class="d3modcfg_icon action_refresh_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" alt="[{oxmultilang ident="D3_MOD_LIB_OVERWRITE"}]" title="[{oxmultilang ident="D3_MOD_LIB_OVERWRITE"}]">
                                            [{/if}]
                                        </form>
                                    [{else}]
                                        <input class="d3modcfg_icon action_refresh_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" [{if !$blGetRemoteUpdateStatus}]onclick="getUpdateStatus(); [{/if}] return false;" type="image" alt="[{if $blGetRemoteUpdateStatus}][{oxmultilang ident="D3_MOD_LIB_NOINSTALL"}][{else}][{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}][{/if}]" title="[{if $blGetRemoteUpdateStatus}][{oxmultilang ident="D3_MOD_LIB_NOINSTALL"}][{else}][{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}][{/if}]">
                                    [{/if}]
                                </td>
                                <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                    [{if $aRemoteModData.availableversion.$sDownloadField}]
                                        [{if $oView->getModuleType == 'lib'}]
                                            [{assign var="sDLLink" value=$oViewConf->getSelfLink()|oxaddparams:"cl=d3modext_status"|oxaddparams:"fnc=filedownload"}]
                                        [{else}]
                                            [{assign var="sDLLink" value=$oViewConf->getSelfLink()|oxaddparams:"cl=d3modlib_status"|oxaddparams:"fnc=filedownload"}]
                                        [{/if}]
                                        <a class="[{$fontclass}] d3modcfg_icon action_download" href="[{$sDLLink}]&amp;modid=[{$aRemoteModData.availableversion.modid}]" alt="[{oxmultilang ident="D3_MOD_LIB_DOWNLOAD"}]" title="[{oxmultilang ident="D3_MOD_LIB_DOWNLOAD"}]"></a>
                                    [{else}]
                                        <input class="d3modcfg_icon action_download_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{if $blGetRemoteUpdateStatus}][{oxmultilang ident="D3_MOD_LIB_NODOWNLOAD"}][{else}][{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}][{/if}]" title="[{if $blGetRemoteUpdateStatus}][{oxmultilang ident="D3_MOD_LIB_NODOWNLOAD"}][{else}][{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}][{/if}]">
                                    [{/if}]
                                </td>
                            </tr>
                            <tr id="[{$sKey}]" style="display: [{if $oModule->getErrorMessage()}]table-row[{else}]none[{/if}];">
                                <td colspan="9" class="[{$listclass}]" style="height: 30px; border: 1px solid #CCC; border-top-style: none; padding: 5px; padding-bottom: 20px;">
                                    [{if $oModule->getErrorMessage()}]
                                        <div class="extension_error">
                                            [{$oModule->getErrorMessage()}]
                                        </div>
                                    [{/if}]

                                    <form action="[{$oViewConf->getSelfLink()}]" method="post">
                                        [{$oViewConf->getHiddenSid()}]
                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                        <input type="hidden" name="fnc" value="saveModCfg">
                                        <input type="hidden" name="editval[oxid]" value="[{$oModule->getId()}]">
                                        <input type="hidden" name="oxmodid" value="[{$sKey}]">
                                        <table style="width: 100%">
                                            <tr>
                                                <td style="width:50%; border-right: 1px solid #999; vertical-align: top;">
                                                    <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td class="edittext ext_edittext">
                                                                <label for="[{$oModule->getId()}]_active">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULEACTIVE"}]</label>
                                                            </td>
                                                            <td class="edittext ext_edittext">
                                                                <input type="hidden" name="[{if $oView->getModuleType() != 'lib'}]editval[oxactive][{/if}]" value='0'>
                                                                <input id="[{$oModule->getId()}]_active" class="edittext ext_edittext" type="checkbox" name="[{if $oView->getModuleType() != 'lib'}]editval[oxactive][{/if}]" value='1' [{if $oModule->getFieldData('oxactive') == 1}]checked[{/if}]>
                                                                [{oxinputhelp ident="D3_CFG_MOD_GENERAL_MODULEACTIVE_DESC"}]
                                                            </td>
                                                        </tr>
                                                        [{assign var="oLog" value=$oModule->d3getLog()}]
                                                        [{assign var="oLogSet" value=$oLog->getLogSet()}]
                                                        <tr>
                                                            <td class="edittext ext_edittext">
                                                                <label for="loglevelelement">[{oxmultilang ident="D3_CFG_MOD_GENERAL_MODULELOGGING"}]</label>
                                                            </td>
                                                            <td class="edittext ext_edittext">
                                                                [{include file="d3loglevel_form.tpl" oLogSet=$oLogSet oModule=$oModule}]
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td style="width:50%;">
                                                    [{if $aRemoteModData.newestversion || $aRemoteModData.availableversion}]
                                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                                            [{if $aRemoteModData.availableversion.version}]
                                                                <tr>
                                                                    <td>
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_AVAILVERSION"}]
                                                                    </td>
                                                                    <td>
                                                                        [{$aRemoteModData.availableversion.version}]
                                                                    </td>
                                                                </tr>
                                                            [{/if}]
                                                            [{if $aRemoteModData.newestversion.version}]
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <hr>
                                                                    </td>
                                                                <tr>
                                                                    <td>
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION"}]
                                                                    </td>
                                                                    <td>
                                                                        [{$aRemoteModData.newestversion.version}]
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2" style="padding-top: 10px;">
                                                                        [{if $oView->check4ShopUpdate($aRemoteModData.newestversion.fromshop)}]
                                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1"}] [{$aRemoteModData.newestversion.fromshop}] [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2"}]<br>
                                                                        [{/if}]
                                                                        [{if $oView->check4LicenseUpdate($oModule->d3GetModId(), $aRemoteModData.newestversion.version)}]
                                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_LIC"}]<br>
                                                                        [{/if}]
                                                                    </td>
                                                                </tr>
                                                            [{/if}]
                                                        </table>
                                                    [{/if}]
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <br>
                                                    <span class="d3modcfg_btn icon status_ok">
                                                        <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MOD_GENERAL_SAVE"}]">
                                                        <span></span>
                                                    </span>
                                                    [{if $oModule->isLicenseRequired()}]
                                                        <span class="d3modcfg_btn icon" style="margin-left: 20px;">
                                                            <input type="button" style="padding-left: 23px;" value="[{oxmultilang ident="D3_CFG_MOD_ADDKEY"}]" onClick="getDetails('[{$sKey}]__licform', 'block'); return false;">
                                                            <span style="background-position: 0 -180px;"></span>
                                                        </span>

                                                        <span class="d3modcfg_btn icon" style="margin-left: 20px;">
                                                            <input type="button" style="padding-left: 23px;" value="[{oxmultilang ident="D3_CFG_MOD_SHOWKEY"}]" onClick="getDetails('[{$sKey}]__licinfo', 'block'); return false;">
                                                            <span style="background-position: -180px 0;"></span>
                                                        </span>
                                                    [{/if}]
                                                    <br><br>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                    [{if $oModule->isLicenseRequired() && $oModule->getFieldData('oxserial')}]
                                        <div id="[{$sKey}]__licinfo" style="padding-left: 10px; display: none;">
                                            <hr>
                                            <h4>[{oxmultilang ident="D3_CFG_MOD_LICDETAILS"}]</h4>
                                            [{assign var="itemno" value="2"}]
                                            <dl>
                                                [{if $oModule->getLicenseData('result')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_GENERALVALID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{assign var="translKey" value="D3_CFG_MOD_STATUS_"|cat:$oModule->getLicenseData('result')|upper}]
                                                        [{oxmultilang ident=$translKey}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('domain')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDDOMAIN"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getLicenseData('domain')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('allow_local')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                        [{oxinputhelp ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC"}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('startdate')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFROMDATE"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getLicenseData('startdate')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('enddate')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDTODATE"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{if $oModule->getExpireSpan() > 756864000}]
                                                            [{oxmultilang ident="D3_CFG_MOD_STATUS_NEVER_EXPIRES"}]
                                                        [{else}]
                                                            [{$oModule->getLicenseData('enddate')}] ([{$oView->getExpireSpanString($oModule)}])
                                                        [{/if}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('modid')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getLicenseData('modid')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('modversion')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getLicenseData('modversion')}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getFormatedShopIdList()}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{$oModule->getFormatedShopIdList()}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('isdemo')}]
                                                    [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                    <dt class="listitem[{$itemno}]">[{oxmultilang ident="D3_CFG_MOD_LICDETAILS_ISTEST"}]</dt>
                                                    <dd class="listitem[{$itemno}]">
                                                        [{if $oModule->getLicenseData('isdemo')}]
                                                            [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                        [{/if}]
                                                    </dd>
                                                [{/if}]
                                                [{if $oModule->getLicenseData('config')}]
                                                    [{foreach from=$oModule->getLicenseData('config') key="sLicDataKey" item="mValue"}]
                                                        [{if $itemno == 2}][{assign var="itemno" value=""}][{else}][{assign var="itemno" value="2"}][{/if}]
                                                        <dt class="listitem[{$itemno}]">
                                                            [{assign var="translKey" value=$oModule->d3getModId()|upper|cat:"_CONFIGVARS_"|cat:$sLicDataKey|upper}]
                                                            [{oxmultilang ident=$translKey}]
                                                        </dt>
                                                        <dd class="listitem[{$itemno}]">
                                                            [{$mValue}]
                                                        </dd>
                                                    [{/foreach}]
                                                [{/if}]
                                            </dl>
                                        </div>
                                        <div class="clear"></div>
                                    [{/if}]
                                    [{if $oModule->isLicenseRequired()}]
                                        <div id="[{$sKey}]__licform" style="display: none;">
                                            <hr>
                                            <form action="[{$oViewConf->getSelfLink()}]" method="post">
                                                [{$oViewConf->getHiddenSid()}]
                                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                <input type="hidden" name="fnc" value="submit_licensekey">
                                                <input type="hidden" name="oxmodid" value="[{$sKey}]">
                                                [{oxmultilang ident="D3_CFG_MOD_ACTIVATE_1"}]
                                            <iframe src="[{$oView->getLicenceFrameUrl($oModule->getModId())}]" style="width: 99%; height: 270px; border: 0 none transparent;" framborder="0"></iframe>
                                        </div>
                                        <div class="clear"></div>
                                    [{/if}]

                                    [{if $oView->getModuleCfgTplPath($sKey)}]
                                        <hr>
                                        [{include file=$oView->getModuleCfgTplPath($sKey) oxid=$oModule->getId() edit=$oModule value=$oModule->oValue}]
                                    [{/if}]
                                </td>
                            </tr>
                            [{if $blWhite == "2"}]
                                [{assign var="blWhite" value=""}]
                            [{else}]
                                [{assign var="blWhite" value="2"}]
                            [{/if}]
                        [{/foreach}]

                        [{if $oView->getShowNewItems()}]
                            [{assign var="aAllRemoteModuleData" value=$oView->getAllRemoteModuleData()}]
                            [{if $aAllRemoteModuleData}]
                                <tr><td class="[{$listclass}] [{$fontclass}]" colspan="9"><hr style="margin: 3px 0;"></td></tr>
                            [{/if}]
                            [{foreach from=$aAllRemoteModuleData item="oModule"}]
[{******************}]
                                [{if !$oView->isInstalled($oView->getRemoteModVar($oModule, 'modid'))}]
                                    [{assign var="listclass" value="listitem"|cat:$blWhite}]

                                        [{assign var="formatclass" value=""}]
                                        [{assign var="iconclass" value="d3modcfg_icon status_question_inactive"}]
                                        [{assign var="aRemoteModData" value=$oView->getRemoteModuleData($oView->getRemoteModVar($oModule, 'modid'))}]
                                        [{assign var="updateicon" value="d3modcfg_icon status_plus"}]
                                        [{assign var="icondesc" value="D3_MOD_LIB_INSTALL"|oxmultilangassign}]

                                        <tr>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                                <img class="[{$iconclass}]" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]" title="[{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]">
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                                <img class="[{$updateicon}]" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{$icondesc}]" title="[{$icondesc}]">
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="padding: 5px; padding-left: 15px;" title="">
                                                <b>[{$oView->getRemoteModVar($oModule, 'modtitle')}]</b> ([{$oView->getRemoteModVar($oModule, 'modid')}])
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                                [{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                                [{oxmultilang ident="D3_CFG_LIB_NOTINSTALLED"}]
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="padding: 5px;" title="">
                                                [{if $aRemoteModData.newestversion.version}]
                                                    [{$aRemoteModData.newestversion.version}]
                                                [{elseif $aRemoteModData.availableversion.version}]
                                                    [{$aRemoteModData.availableversion.version}]
                                                [{elseif $aRemoteModData.formerversion.version}]
                                                    <nobr>[{oxmultilang ident="D3_CFG_LIB_FORMERVERSION"}] [{$aRemoteModData.formerversion.version}]</nobr><br>
                                                    <nobr>[{oxmultilang ident="D3_CFG_LIB_USEABLETO"}] [{$aRemoteModData.formerversion.toshop}]</nobr>
                                                [{else}]
                                                    [{oxmultilang ident="D3_CFG_LIB_VERSIONUNKNOWN"}]
                                                [{/if}]
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                                [{if $aRemoteModData.newestversion.infourl}]
                                                    <a target="modinfo" class="[{$fontclass}] d3modcfg_icon status_info" href="[{$aRemoteModData.newestversion.infourl}]" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></a>
                                                [{elseif $aRemoteModData.availableversion.infourl}]
                                                    <a target="modinfo" class="[{$fontclass}] d3modcfg_icon status_info" href="[{$aRemoteModData.availableversion.infourl}]" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></a>
                                                [{elseif $aRemoteModData.formerversion.infourl}]
                                                    <a target="modinfo" class="[{$fontclass}] d3modcfg_icon status_info" href="[{$aRemoteModData.formerversion.infourl}]" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]"></a>
                                                [{else}]
                                                    <img class="d3modcfg_icon status_info_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_INFO"}]" title="[{oxmultilang ident="D3_CFG_LIB_INFO"}]">
                                                [{/if}]
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                                [{if $aRemoteModData.availableversion.autoupdate && $aRemoteModData.availableversion.$sDownloadField}]
                                                    <form name="installmod" id="installmod" action="[{$oViewConf->getSelfLink()}]" method="post">
                                                        [{$oViewConf->getHiddenSid()}]
                                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                        <input type="hidden" name="oxid" value="[{$oxid}]">
                                                        <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                                        <input type="hidden" name="fnc" value="installMod">
                                                        <input type="hidden" name="modid" value="[{$aRemoteModData.availableversion.modid}]">
                                                        <input type="image" class="d3modcfg_icon action_plus" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" alt="[{oxmultilang ident="D3_MOD_LIB_INSTALL"}]" title="[{oxmultilang ident="D3_MOD_LIB_INSTALL"}]">
                                                    </form>
                                                [{else}]
                                                    <input class="d3modcfg_icon action_refresh_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]" title="[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]">
                                                [{/if}]
                                            </td>
                                            <td class="[{$listclass}] [{$fontclass}] [{$formatclass}]" style="height: 24px; text-align: center;">
                                                [{if $aRemoteModData.availableversion.$sDownloadField}]
                                                    [{if $oView->getModuleType == 'lib'}]
                                                        [{assign var="sDLLink" value=$oViewConf->getSelfLink()|oxaddparams:"cl=d3modext_status"|oxaddparams:"fnc=filedownload"}]
                                                    [{else}]
                                                        [{assign var="sDLLink" value=$oViewConf->getSelfLink()|oxaddparams:"cl=d3modlib_status"|oxaddparams:"fnc=filedownload"}]
                                                    [{/if}]
                                                    <a class="[{$fontclass}] d3modcfg_icon action_download" href="[{$sDLLink}]&amp;modid=[{$aRemoteModData.availableversion.modid}]" alt="[{oxmultilang ident="D3_MOD_LIB_DOWNLOAD"}]" title="[{oxmultilang ident="D3_MOD_LIB_DOWNLOAD"}]"></a>
                                                [{else}]
                                                    <input class="d3modcfg_icon action_download_inactive" src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" type="image" alt="[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]" title="[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]">
                                                [{/if}]
                                            </td>
                                        </tr>
                                        [{if $blWhite == "2"}]
                                            [{assign var="blWhite" value=""}]
                                        [{else}]
                                            [{assign var="blWhite" value="2"}]
                                        [{/if}]
                                    [{/if}]
[{****************}]
                                [{/foreach}]
                            [{/if}]
                        </table>
                        [{if $oView->getInstallClass() && !$oView->hasConnectionError()}]
                            <hr>
                            <form name="getRemote" id="getRemote" action="[{$oViewConf->getSelfLink()}]" method="post">
                                [{$oViewConf->getHiddenSid()}]
                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                <input type="hidden" name="oxid" value="[{$oxid}]">
                                <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                <input type="hidden" name="fnc" value="getRemoteModList">
                                <span class="d3modcfg_btn icon status_question">
                                    <input type="submit" value="[{oxmultilang ident="D3_CFG_LIB_GETLIBLIST"}]">
                                    <span></span>
                                </span>
                                <br>
                            </form>
                        [{/if}]
                        [{if $oView->hasConnectionError()}]
                            <script type="text/javascript">alert('[{oxmultilang ident="D3_CFG_LIB_CONNECTERROR"}]');</script>
                        [{/if}]
                </fieldset>
            </td>
        <tr>
    </table>

    [{if $oView->showNoUpdateMessage()}]
        <script type="text/javascript">
            alert('[{oxmultilang ident="D3_CFG_LIB_NOINSTALLNOTICE"}]');
        </script>
    [{/if}]
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

[{include file="bottomitem.tpl"}]