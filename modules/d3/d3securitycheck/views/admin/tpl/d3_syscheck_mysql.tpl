[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{ if $updatelist == 1}]
    UpdateList('[{ $oxid }]');
    [{ /if}]
    function UpdateList( sID)
    {
        var oSearch = parent.list.document.getElementById("search");
        oSearch.oxid.value=sID;
        oSearch.fnc.value='';
        oSearch.submit();
    }

    function EditThis( sID)
    {
        var oTransfer = document.getElementById("transfer");
        oTransfer.oxid.value=sID;
        oTransfer.cl.value='';
        oTransfer.submit();

        var oSearch = parent.list.document.getElementById("search");
        oSearch.actedit.value = 0;
        oSearch.oxid.value=sID;
        oSearch.submit();
    }

    function _groupExp(el) {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
        else _cur.className = "exp";
    }



    //-->
</script>

<style type="text/css">
    td.edittext{  height: 25px; }
    td.edittext table{ width: 100%; }
    .code, .codepre{ background-color:#EEEEEE; border:1px inset #999999; margin:10px auto; width:100%; white-space: normal; }
    .codepre{ white-space: pre; }
    .code div, .codepre div{ font-family:courier; max-height:145px; overflow:auto; padding:5px; }
    div.box{ background: white url([{$oView->getBGLogoUrl()}]) no-repeat bottom right; }

    #imgcheck td.exists, #imgcheck td.exists a{ color: green; }
    #imgcheck td.missing, #imgcheck td.missing a{ color: red; }
    #imgcheck td.notset, #imgcheck td.notset a{ color: orange; }
    input.navigat{ border: 1px outset; font-size: 10px; width: 20px; height: 20px; }
    div.tablebox{ background:none repeat scroll 0 0 lightBlue;border:1px dashed black;float:left;height:35px;margin:2px;width:48%; }
    .questbox{ background-color: #07f;color: white;float: right;position: relative;display: block;padding: 1px 4px;font-weight: bold;z-index: 98;cursor: help;font-family: Verdana,Arial,Helvetica,sans-serif;font-size: 10px;line-height: 12px; }
    .helptextbox{ background-color: white;color: black;border: 1px solid black;position: absolute;overflow: hidden;padding: 5px;margin-top: 15px;width: 300px;z-index: 99; }
    fieldset{ border: 1px inset black;background-color: #F0F0F0; position:relative; }
    legend{ font-weight: bold; }
    dl dt{ font-weight: normal;width: 55%; }
    .ext_edittext{ padding: 2px; }
    td.edittext{ white-space: normal; }
    td.noaction,a.noaction{ color:#AAA; }
    td.noaction img,td.action img{ border: none; }
    .d3repair{ padding: 0 6px 0 0; margin:0; background:url("[{ $oViewConf->getResourceUrl() }]bg/d3modcfg_buttons.png") no-repeat scroll right -59px transparent; border:medium none;display:block;float:left;height:24px;}
    input.d3repair { padding:0px; background-position:left -59px;text-indent:4px; }
    .picblock{ display:block; margin-left:auto; margin-right:auto; height: 20px; width: 20px; background: url([{$oViewConf->getResourceUrl()}]bg/d3modcfg_icons.png);}
    .picblock.stateok {background-position: -0px -0px;}
    .picblock.statenotok {background-position: -120px -30px;}
    .listitem{ padding: 5px; }
    .box th.listitem { background-color:#F6F6F6; border-right:1px solid #FFFFFF; text-align:left; }
    .d3status { height: 24px; width:24px; text-align: center;}
    div.box { height:95%; }
</style>

[{ if $readonly}]
[{assign var="readonly" value="readonly disabled"}]
[{else}]
[{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
    <input type="hidden" name="editlanguage" value="[{ $editlanguage }]">
</form>
[{*<!--  noch im test
<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="oxidCopy" value="[{ $oxid }]">
<input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
<input type="hidden" name="fnc" value="setOptions">
<fieldset>
	<legend>[{ oxmultilang ident="d3mxsyscheck_mysql_options" }]</legend>
	<table>
		<tr>
			<td></td>
			<td>
				<select name="iShowTables" onchange="submit()">
				<option value="5" [{ if $options.iShowTables == 5 }]selected="selected"[{ /if }]>5</option>
				<option value="10" [{ if $options.iShowTables == 10 }]selected="selected"[{ /if }]>10</option>
				<option value="25" [{ if $options.iShowTables == 25 }]selected="selected"[{ /if }]>25</option>
				<option value="[{ $options.iCountAllTables}]" [{ if $options.iShowTables == $options.iCountAllTables }]selected="selected"[{ /if }]>Alle</option>
				</select>
			</td>
		</tr>
	</table>
</fieldset>
</form>
-->*}]
<fieldset>
    <legend>[{ oxmultilang ident="d3mxsyscheck_mysql_title" }]</legend>
    <table style="width: 100%;">
        <tr>
            <th class="listitem ">[{ oxmultilang ident="d3mxsyscheck_mysql_status" }]</th>
            <th class="listitem ">[{ oxmultilang ident="d3mxsyscheck_mysql_tablename" }]</th>
            <th class="listitem " colspan="2">[{ oxmultilang ident="d3mxsyscheck_mysql_options" }] ([{ oxmultilang ident="d3mxsyscheck_mysql_note" }])</th>
        </tr>
        [{ foreach from=$oView->getTables($navigation.currentPages) item="aContent" key="sTabellenname" }]
            <tr>
                <td class="listitem d3status">
            [{ if $oView->getTableStatus($sTabellenname, true) }]
                [{ assign var="d3StatusClass" value="stateok" }]
                [{ assign var="d3StatusInfo" value="d3mxsyscheck_mysql_stateok" }]
            [{ else }]
                [{ assign var="d3StatusClass" value="statenotok" }]
                [{ assign var="d3StatusInfo" value="d3mxsyscheck_mysql_statenotok" }]
            [{ /if }]
                    <img class="picblock [{$d3StatusClass}]" src="[{$oViewConf->getImageUrl()}]d3modcfg_empty.gif" alt="[{ $d3StatusInfo|oxmultilangassign }]" title="[{ $d3StatusInfo|oxmultilangassign }]">
                </td>
                <td class="listitem">
                    <div>[{ $sTabellenname }] ([{ $oView->getRowsFromTable($sTabellenname)}] [{ oxmultilang ident="d3mxsyscheck_mysql_rows"}])</div>
                </td>
                <td class="listitem " style="width:33%">
            [{ if !$oView->getTableStatus($sTabellenname, true) }]
                    <form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
                        [{ $oViewConf->getHiddenSid() }]
                        <input type="hidden" name="oxid" value="[{ $oxid }]">
                        <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
                        <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
                        <input type="hidden" name="fnc" value="setRepairCards">
                        <input type="hidden" name="tablename" value="[{ $sTabellenname }]">
                        <input type="hidden" name="page" value="[{ $navigation.currentPages/10+1 }]">
                        <div class="d3repair">
                            <input class="d3repair" type="submit" value="[{ oxmultilang ident="d3mxsyscheck_mysql_repaircards" }]" title="[{ oxmultilang ident="d3mxsyscheck_mysql_repaircards" }]">
                        </div>
                    </form>
            [{ /if }]
                </td>
                <td class="listitem " style="width:33%">

                </td>
            </tr>
        [{ /foreach }]
    </table>
    <table style="width:100%">
        <tr>
   	    [{assign var="addparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
            <td style="white-space:nowrap;">
   		[{ oxmultilang ident="NAVIGATION_PAGE" }] [{ $navigation.currentPages/10+1 }] / [{ $navigation.lastPage }]
            </td>
            <td>
		[{ if $navigation.lastPage > 1 }]
                    [{foreach key=iPage from=$oView->getNaviPages() item=page}]
                        <a id="nav.page.[{$iPage}]" class="pagenavigation[{if $iPage == $navigation.currentPages/10+1 }] pagenavigationactive[{/if}]" href="[{$oViewConf->getSelfLink()|oxaddparams:$addparam}]&page=[{$iPage}]">[{$iPage}]</a>
                        [{ if $iPage%10 == 0 }] <br> [{ /if }]
                    [{/foreach}]
            </td>
            <td style="white-space:nowrap;">
                <a href="[{$oViewConf->getSelfLink()|oxaddparams:$addparam}]&page=[{$navigation.firstPage}]" class="pagenavigation">[{ oxmultilang ident='GENERAL_LIST_FIRST'}]</a>
                <a href="[{$oViewConf->getSelfLink()|oxaddparams:$addparam}]&page=[{$navigation.prevPage}]" class="pagenavigation">[{ oxmultilang ident='GENERAL_LIST_PREV'}]</a>
                <a href="[{$oViewConf->getSelfLink()|oxaddparams:$addparam}]&page=[{$navigation.nextPage}]" class="pagenavigation">[{ oxmultilang ident='GENERAL_LIST_NEXT'}]</a>
                <a href="[{$oViewConf->getSelfLink()|oxaddparams:$addparam}]&page=[{$navigation.lastPage}]" class="pagenavigation">[{ oxmultilang ident='GENERAL_LIST_LAST'}]</a>
   		[{ /if }]
            </td>
        </tr>
    </table>
</fieldset>

[{include file="bottomitem.tpl"}]
