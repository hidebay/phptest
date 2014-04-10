[{include file="headitem.tpl" title="d3mxd3cleartmp"|oxmultilangassign}]

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

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">
</form>

<script type="text/javascript">
    [{if $oView->getTickerUrl()}]
        window.open('[{$oView->getTickerUrl()}]', 'clrTmpTicker', 'width=300, height=300, left=100');
    [{/if}]

    function deselect_combineditem()
    {
        [{block name="d3cleartmp_js_combineditem"}]
            document.getElementById('clearall').checked = false;
        [{/block}]
    }

    function deselect_singleitems()
    {
        [{block name="d3cleartmp_js_singleitems"}]
            document.getElementById('clearfrontend').checked = false;
            document.getElementById('cleardbcache').checked = false;
            document.getElementById('clearlangcache').checked = false;
            document.getElementById('clearmenucache').checked = false;
            document.getElementById('clearclasspathcache').checked = false;
            document.getElementById('clearstructurecache').checked = false;
            document.getElementById('cleartagcloudcache').checked = false;
            document.getElementById('clearseocache').checked = false;
            document.getElementById('clearviewcache').checked = false;
            document.getElementById('cleartplblocks').checked = false;
            document.getElementById('clearmodulecache').checked = false;
        [{/block}]
    }
</script>

[{assign var="blDevMode" value=$oCfgValues->d3_cfg_mod__blClrTmp_notmpuse}]

<style type="text/css">
    table#statistik td {
        padding: 4px;
    }

    table#statistik td.bold {
        font-weight: bold;
    }

    #popup {
        display: none;
    }
</style>

<table cellspacing="0" cellpadding="0" border="0" width="98%">
    <tr>
        <td valign="top" class="edittext" width="50%">
            [{block name="d3cleartmp_form"}]
                <form name="delform" id="delform" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="[{if !$oView->hasTicker()}]document.getElementById('mask').className='on';document.getElementById('popup').className='on';[{/if}] return;">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                    [{if $oView->hasTicker()}]
                        <input type="hidden" name="fnc" value="startTicker">
                    [{else}]
                        <input type="hidden" name="fnc" value="clearTmp">
                    [{/if}]

                    <table cellspacing="0" cellpadding="0" border="0">
                        [{block name="d3cleartmp_all"}]
                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearall">[{oxmultilang ident="D3_CFG_CLRTMP_ALL"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearall" value="0">
                                    <input onClick="deselect_singleitems();" type="checkbox" value="1" class="edittext" id="clearall" name="clearall" [{if $clearAll}]checked[{/if}] [{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>
                        [{/block}]

                        <tr>
                            <td colspan="2" style="text-align: center;">[{oxmultilang ident="D3_CFG_CLRTMP_OR"}]</td>
                        </tr>

                        [{block name="d3cleartmp_separated"}]
                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearfrontend">[{oxmultilang ident="D3_CFG_CLRTMP_TPL"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearfrontend" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearfrontend" name="clearfrontend" value="1" class="edittext" name="clearfrontend" [{if $clearFrontend}]checked[{/if}] [{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="cleardbcache">[{oxmultilang ident="D3_CFG_CLRTMP_DB"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="cleardbcache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="cleardbcache" value="1" class="edittext" name="cleardbcache" [{if $clearDB}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearlangcache">[{oxmultilang ident="D3_CFG_CLRTMP_LANG"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearlangcache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearlangcache" value="1" class="edittext" name="clearlangcache" [{if $clearLang}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearmenucache">[{oxmultilang ident="D3_CFG_CLRTMP_MENU"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearmenucache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearmenucache" value="1" class="edittext" name="clearmenucache" [{if $clearMenu}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearclasspathcache">[{oxmultilang ident="D3_CFG_CLRTMP_CLASSPATH"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearclasspathcache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearclasspathcache" value="1" class="edittext" name="clearclasspathcache" [{if $clearClassPath}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearstructurecache">[{oxmultilang ident="D3_CFG_CLRTMP_STRUCTURE"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearstructurecache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearstructurecache" value="1" class="edittext" name="clearstructurecache" [{if $clearStructure}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="cleartagcloudcache">[{oxmultilang ident="D3_CFG_CLRTMP_TAGCLOUD"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="cleartagcloudcache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="cleartagcloudcache" value="1" class="edittext" name="cleartagcloudcache" [{if $clearTagcloud}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearseocache">[{oxmultilang ident="D3_CFG_CLRTMP_SEO"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearseocache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearseocache" value="1" class="edittext" name="clearseocache" [{if $clearSeo}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>

                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearmodulecache">[{oxmultilang ident="D3_CFG_CLRTMP_MODULE"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearmodulecache" value="0">
                                    <input onClick="deselect_combineditem();" type="checkbox" id="clearmodulecache" value="1" class="edittext" name="clearmodulecache" [{if $clearModule}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>
                        [{/block}]

                        [{block name="d3cleartmp_userdefined"}]
                            [{if $oView->getUserDefinedAction(1)}]
                                <tr>
                                    <td class="edittext" valign="top">
                                        <label for="clearuser1cache">[{$oView->getUserDefinedAction(1)}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearuser1cache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearuser1cache" value="1" class="edittext" name="clearuser1cache" [{if $clearUser1}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>
                            [{/if}]
                            [{if $oView->getUserDefinedAction(2)}]
                                <tr>
                                    <td class="edittext" valign="top">
                                        <label for="clearuser2cache">[{$oView->getUserDefinedAction(2)}]</label>
                                    </td>
                                    <td class="edittext">
                                        <input type="hidden" name="clearuser2cache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearuser2cache" value="1" class="edittext" name="clearuser2cache" [{if $clearUser2}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>
                            [{/if}]
                        [{/block}]

                        [{block name="d3cleartmp_views"}]
                            <tr>
                                <td class="edittext" valign="top">
                                    <label for="clearviewcache">[{oxmultilang ident="D3_CFG_CLRTMP_VIEWS"}]</label>
                                </td>
                                <td class="edittext">
                                    <input type="hidden" name="clearviewcache" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="clearviewcache" value="1" class="edittext" name="clearviewcache" [{if $clearViews}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                </td>
                            </tr>
                        [{/block}]

                        <tr>
                            <td colspan="2" style="text-align: center;"><hr></td>
                        </tr>

                        [{block name="d3cleartmp_additional"}]
                            [{if $oView->hasTplBlocks()}]
                                <tr>
                                    <td class="edittext" valign="top">
                                        <label for="cleartplblocks">[{oxmultilang ident="D3_CFG_CLRTMP_TPLBLOCKS"}]</label>
                                        <select name="tplblockmodule" size="1" id="cleartplblockslist" onchange="document.getElementById('cleartplblocks').checked = 'checked'; deselect_combineditem();" [{if $blDevMode}]disabled [{/if}]>
                                            [{foreach from=$oView->getTplBlockModules() item="sModuleId"}]
                                                <option value="[{$sModuleId}]">[{$sModuleId}]</option>
                                            [{/foreach}]
                                        </select><br>
                                        <span style="font-size: 9px;">[{oxmultilang ident="D3_CFG_CLRTMP_TPLBLOCKS_REQUACT"}]</span>
                                    </td>
                                    <td class="edittext" style="vertical-align: top;">
                                        <input type="hidden" name="cleartplblocks" value="0">
                                        <input onClick="deselect_combineditem();" type="checkbox" id="cleartplblocks" value="1" class="edittext" name="cleartplblocks" [{if $clearTplBlocks}]checked[{/if}][{$readonly}] [{if $blDevMode}]disabled [{/if}]>
                                    </td>
                                </tr>
                            [{/if}]
                        [{/block}]

                        <tr>
                            <td class="edittext">
                            </td>
                            <td class="edittext"><br>
                                <br>
                                <span class="d3modcfg_btn fixed icon status_ok[{if $blDevMode}]_inactive[{/if}]">
                                    <input [{if $blDevMode}]disabled [{/if}] id="sumbitbtn" type="submit" name="save" style="width: 150px;" value='[{oxmultilang ident="D3_CFG_CLRTMP_SUBMIT"}]'>
                                    <span></span>
                                </span>
                            </td>
                        </tr>
                    </table>
                </form>
            [{/block}]
        </td>
        <td valign="top" class="edittext" align="left">
            [{block name="d3cleartmp_info"}]
                <fieldset>
                    <legend>[{oxmultilang ident="D3_CFG_CLRTMP_STAT"}]</legend>

                    <table cellspacing="0" cellpadding="0" border="0" id="statistik">
                        [{block name="d3cleartmp_infoitems"}]
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_PATH"}]</td>
                                <td>[{$oView->getTmpPath()}]</td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_COUNT"}]</td>
                                <td>[{$oView->getTmpCount()}]</td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_SIZE"}]</td>
                                <td>[{$oView->getTmpSize()}]</td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_DELFOLDER"}]</td>
                                <td>
                                    <span style="float: left; margin-right: 10px;"
                                    [{if $oCfgValues->d3_cfg_mod__blClrTmp_nofolderremove}]
                                        class="d3modcfg_icon status_failed" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                    [{else}]
                                        class="d3modcfg_icon status_ok" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                    [{/if}]
                                    ></span>
                                    [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_CREATEHTA"}]</td>
                                <td>
                                    <span style="float: left; margin-right: 10px;"
                                    [{if $oCfgValues->d3_cfg_mod__blClrTmp_nohtaccess}]
                                        class="d3modcfg_icon status_failed" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                    [{else}]
                                        class="d3modcfg_icon status_ok" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                    [{/if}]
                                    ></span>
                                    [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_UPDATEVIEW"}]</td>
                                <td>
                                    <span style="float: left; margin-right: 10px;"
                                    [{if $oCfgValues->d3_cfg_mod__blClrTmp_noviewupdate}]
                                        class="d3modcfg_icon status_failed" title="[{oxmultilang ident="D3_CFG_CLRTMP_NO"}]"
                                    [{else}]
                                        class="d3modcfg_icon status_ok" title="[{oxmultilang ident="D3_CFG_CLRTMP_YES"}]"
                                    [{/if}]
                                    ></span>
                                    [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                </td>
                            </tr>
                            <tr>
                                <td class="bold">[{oxmultilang ident="D3_CFG_CLRTMP_USETICKER"}]</td>
                                <td>
                                    [{$oView->getTickerThreshold()}] [{oxmultilang ident="D3_CFG_CLRTMP_USETICKERFILES"}]
                                    [{oxinputhelp ident="D3_CFG_CLRTMP_SET_DESC"}]
                                </td>
                            </tr>
                        [{/block}]
                    </table>
                </fieldset>
            [{/block}]
        </td>
    </tr>

    <tr>
        <td colspan="2" style="padding: 15px;">
            [{block name="d3cleartmp_devmode"}]
                <fieldset style="[{if $blDevMode}]background-color: yellow;[{/if}]">
                    <legend>[{oxmultilang ident="D3_CFG_CLRTMP_DEV_LEGEND"}]</legend>
                    <form name="delform" id="devmode" action="[{$oViewConf->getSelfLink()}]" method="post" onsubmit="[{if $blShopIsProductive && !$blDevMode}]alert('[{oxmultilang ident="D3_CFG_CLRTMP_DEV_DEACTPRODUCTIVE"}]');[{/if}] return;">
                        [{$oViewConf->getHiddenSid()}]
                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                        <input type="hidden" name="fnc" value="setDevelopmentMode">
                        <div style="margin: 5px 0 10px 0;">[{oxmultilang ident="D3_CFG_CLRTMP_DEV_DESC"}]</div>
                        <input type="hidden" name="value[d3_cfg_mod__blClrTmp_notmpuse]" value="[{if $blDevMode}]0[{else}]1[{/if}]">
                        <span class="d3modcfg_btn fixed icon [{if $blDevMode}]status_ok[{else}]status_attention[{/if}]">
                            <input type="submit" name="save" value='[{if $blDevMode}][{oxmultilang ident="D3_CFG_CLRTMP_DEV_BTNDEACT"}][{else}][{oxmultilang ident="D3_CFG_CLRTMP_DEV_BTNACT"}][{/if}]' onclick=''>
                            <span></span>
                        </span>
                    </form>
                </fieldset>
            [{/block}]
        </td>
    </tr>
</table>

<div id="mask" class=""></div>
<div id="popup" class=""><span style="font-weight: bold;">[{oxmultilang ident="D3_CFG_CLRTMP_MSG1"}]</span> [{oxmultilang ident="D3_CFG_CLRTMP_MSG2"}]</div>

[{include file="d3_cfg_mod_inc.tpl"}]

[{oxstyle}]

<script type="text/javascript">
    if (parent.parent)
    {   
		parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{oxmultilang ident=$oView->d3GetMenuItemTitle()}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident=$oView->d3GetMenuSubItemTitle()}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>