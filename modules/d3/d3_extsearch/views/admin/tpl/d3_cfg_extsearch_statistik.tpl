[{include file="headitem.tpl" title="d3tbclextsearch_settings_statistik"|oxmultilangassign}]

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

    function showGraph(sSearchWord, sFilters)
    {
        document.popuptransfer.target='_new';
        document.popuptransfer.fnc.value='generateStat';
        document.popuptransfer.searchword.value= sSearchWord;
        document.popuptransfer.searchparams.value= sFilters;
        document.popuptransfer.submit();
    }

    -->
</script>

<style type="text/css">
    <!--
    fieldset {
        border:           1px inset black;
        background-color: #F0F0F0;
    }

    legend {
        font-weight: bold;
    }

    dl dt {
        font-weight: normal;
        width:       55%;
    }

    a.showstat {
        background:  transparent url("[{$oViewConf->getModuleUrl('d3_extsearch', 'out/admin/src/bg/ico_statistic.gif')}]") no-repeat scroll 0 center;
        display:     block;
        height:      15px;
        line-height: 1px;
        margin:      0 1px;
        width:       24px;
    }

    a.showstat:hover {
        background-position: -24px center;
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

<form name="popuptransfer" id="popuptransfer" action="[{$oViewConf->getSelfLink()}]" target="" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="actshop" value="[{$shop->id}]">
    <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
    <input type="hidden" name="statparams[type]" value="[{$aParams.type}]">
    <input type="hidden" name="statparams[time]" value="[{$aParams.time}]">
    <input type="hidden" name="searchword" value="">
    <input type="hidden" name="searchparams" value="">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="generateStatList">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

<table border="0" style="width:98%;">
    <tr>
        <td style="vertical-align: top;" class="edittext">

            [{if $edit->getErrorMessage()}]
                <div class="extension_error">
                    [{$edit->getErrorMessage()}]
                </div>
            [{/if}]

            [{if $oView->checkReportBaseClass()}]
                [{if $oView->getValueStatus() == 'error'}]
                    <span style="font-weight: bold;">[{oxmultilang ident="D3_EXTSEARCH_MAIN_NOCONFIG_DESC"}]</span><br>
                    <span class="d3modcfg_btn">
                        <input type="submit" name="save" value="[{oxmultilang ident="D3_EXTSEARCH_MAIN_NOCONFIG_BTN"}]">
                    </span>
                    </form>
                [{else}]
                    <fieldset>
                        <table cellspacing="0" cellpadding="0" border="0" style="width: 100%;">
                            <colgroup>
                                <col width="35%">
                                <col width="35%">
                                <col width="30%">
                            </colgroup>
                            <tr>
                                <td>
                                    <label for="stattype">[{oxmultilang ident="D3_EXTSEARCH_STAT_TYPE"}]</label>
                                    <select id="stattype" name="statparams[type]">
                                        [{if $aTimes|count}]
                                            <option value="hitless" [{if $aParams.type == 'hitless'}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_STAT_TYPEHITLESS"}]</option>
                                            <option value="mosthits" [{if $aParams.type == 'mosthits'}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_STAT_TYPEMOSTHITS"}]</option>
                                            <option value="mostsearches" [{if $aParams.type == 'mostsearches'}]selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_STAT_TYPEMOSTSEARCHES"}]</option>
                                        [{else}]
                                            <option value="" disabled>[{oxmultilang ident="D3_EXTSEARCH_STAT_NOHITS"}]</option>
                                        [{/if}]
                                    </select>
                                </td>
                                <td>
                                    <label for="stattime">[{oxmultilang ident="D3_EXTSEARCH_STAT_TIME"}]</label>
                                    <select id="stattime" name="statparams[time]">
                                        [{if $aTimes|count}]
                                            [{foreach from=$aTimes item="aTime"}]
                                                <option value="[{$aTime.value}]" [{if $aParams.time == $aTime.value}]selected[{/if}]>[{$aTime.output}]</option>
                                            [{/foreach}]
                                        [{else}]
                                            <option value="" disabled>[{oxmultilang ident="D3_EXTSEARCH_STAT_NOHITS"}]</option>
                                        [{/if}]
                                    </select>
                                </td>
                                <td>
                                    <span class="d3modcfg_btn">
                                        <input [{if !$aTimes|count}] disabled [{/if}] type="submit" name="save" value="[{oxmultilang ident="D3_EXTSEARCH_STAT_GENERATESTAT"}]">
                                    </span>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="3"><hr></td>
                            </tr>
                            <tr>
                                <td style="font-weight: bold;">[{oxmultilang ident="D3_EXTSEARCH_STAT_SEARCHWORD"}]</td>
                                <td style="font-weight: bold;">[{if $aParams.type == 'mosthits'}][{oxmultilang ident="D3_EXTSEARCH_STAT_HITS"}][{else}][{oxmultilang ident="D3_EXTSEARCH_STAT_SEARCHES"}][{/if}]</td>
                                <td style="font-weight: bold;">[{oxmultilang ident="D3_EXTSEARCH_STATISTIC_GRAPH"}]</td>
                            </tr>
                            [{assign var="blWhite" value=""}]
                            [{assign var="_cnt" value=0}]
                            [{foreach from=$oView->getStatList() item="searchword"}]
                                [{assign var="_cnt" value=$_cnt+1}]
                                [{if $listitem->blacklist == 1}]
                                    [{assign var="listclass" value="listitem3"}]
                                [{else}]
                                    [{assign var="listclass" value="listitem"|cat:$blWhite}]
                                [{/if}]
                                <tr>
                                    <td class="[{$listclass}]" style="vertical-align: top;">
                                        <b>[{$searchword->sWord}]</b>
                                        [{if $searchword->aFilters}][{*oxmultilang ident="D3_EXTSEARCH_STATISTIC_FURTHERFILTERS"*}]
                                            [{foreach from=$searchword->aFilters item="oFilter"}]
                                                <div style="padding-left: 10px;">[{$oFilter->desc}]: [{$oFilter->value}]</div>
                                            [{/foreach}]
                                        [{/if}]
                                    </td>
                                    <td class="[{$listclass}]" style="vertical-align: top;">
                                        [{$searchword->iCount}]
                                    </td>
                                    <td class="[{$listclass}]" style="vertical-align: top;">
                                        [{if $searchword->blGraph}]
                                            <a id="del.[{$_cnt}]" class="showstat" href="#" onclick="showGraph('[{$searchword->sWord}]', '[{$searchword->sFilters}]'); return false;" onClick=""></a>
                                        [{/if}]
                                    </td>
                                </tr>
                                [{if $blWhite == "2"}]
                                [{assign var="blWhite" value=""}]
                                [{else}]
                                [{assign var="blWhite" value="2"}]
                                [{/if}]
                            [{/foreach}]
                        </table>
                    </FIELDSET>
                [{/if}]
            [{else}]
                [{oxmultilang ident="D3_EXTSEARCH_STAT_NOREPORTBASE"}]
            [{/if}]
        </td>
    </tr>
</table>

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxextsearch"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3tbclextsearch_settings_statistik"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>