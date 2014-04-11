[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign box="list"}]

[{if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

[{assign var="where" value=$oView->getListFilter()}]

<script type="text/javascript">
<!--
function EditThis( sID)
{
    var oTransfer = parent.edit.document.getElementById("transfer");
    oTransfer.oxid.value=sID;
    oTransfer.cl.value='[{if $actlocation}][{$actlocation}][{else}][{$default_edit}][{/if}]';

    //forcing edit frame to reload after submit
    top.forceReloadingEditFrame();

    var oSearch = document.getElementById("search");
    oSearch.oxid.value=sID;
    oSearch.submit();
}

function ChangeEditBar( sLocation, sPos)
{
    var oSearch = document.getElementById("search");
    oSearch.actedit.value=sPos;
    oSearch.submit();

    var oTransfer = parent.edit.document.getElementById("transfer");
    oTransfer.cl.value=sLocation;

    //forcing edit frame to reload after submit
    top.forceReloadingEditFrame();
}
[{*
function ChangeLanguage()
{
    var oSearch = document.getElementById("search");
    oSearch.language.value=oSearch.changelang.value;
    oSearch.editlanguage.value=oSearch.changelang.value;
    oSearch.submit();

    var oTransfer = parent.edit.document.getElementById("transfer");
    oTransfer.innerHTML += '<input type="hidden" name="language" value="'+oSearch.changelang.value+'">';
    oTransfer.innerHTML += '<input type="hidden" name="editlanguage" value="'+oSearch.changelang.value+'">';

    //forcing edit frame to reload after submit
    top.forceReloadingEditFrame();
}
*}]

window.onLoad = top.reloadEditFrame();

//-->
</script>

<div id="liste">

    <form name="search" id="search" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{include file="_formparams.tpl" cl=$oViewConf->getActiveClassName() lstrt=$lstrt actedit=$actedit oxid=$oxid fnc="" language=$actlang editlanguage=$actlang}]
        <input type="hidden" name="delete_oxtime" value="">
        <input type="hidden" name="delete_oxmodid" value="">
        <input type="hidden" name="delete_oxtype" value="">
        [{foreach from=$oView->d3getAdditionalFormParams() key="key" item="formparam"}]
            <input type="hidden" name="[{$key}]" value="[{$formparam}]">
        [{/foreach}]

        <table cellspacing="0" cellpadding="0" border="0" width="100%">
            <colgroup>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
                <col>
            </colgroup>
            <tr class="listitem">
                <td height="20" valign="middle" class="listfilter first" nowrap>
                    <div class="r1"><div class="b1">
                            <select class="listedit" name="where[[{$listTable}]][oxlogtype]">
                            <option value="">--</option>
                            [{foreach from=$oView->getLogTypeList() item="item"}]
                                <option value="[{$item}]"
                                        [{if $where.d3log.oxlogtype == $item}]selected[{/if}]
                                >[{$item}]</option>
                            [{/foreach}]
                        </select>
                    </div></div>
                </td>
                <td height="20" valign="middle" class="listfilter" nowrap>
                    <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="20" maxlength="128"
                                name="where[[{$listTable}]][oxtime]" value="[{$where.d3log.oxtime}]"
                        [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                    </div></div>
                </td>
                <td height="20" valign="middle" class="listfilter" nowrap>
                    <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="8" maxlength="128"
                                name="where[[{$listTable}]][oxcounter]" value="[{$where.d3log.oxcounter}]"
                       [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                    </div></div>
                </td>
                <td height="20" valign="middle" class="listfilter" nowrap>
                    <div class="r1"><div class="b1">
                            <select class="listedit" name="where[[{$listTable}]][oxmodid]">
                            <option value="">--</option>
                            [{foreach from=$oView->getModIdList() item="item"}]
                                <option value="[{$item}]"
                                        [{if $where.d3log.oxmodid == $item}]selected[{/if}]
                                >[{$item}]</option>
                            [{/foreach}]
                        </select>
                    </div></div>
                </td>
                <td height="20" valign="middle" class="listfilter" nowrap>
                    <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="20" maxlength="128"
                                name="where[[{$listTable}]][oxclass]" value="[{$where.d3log.oxclass}]"
                        [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                    </div></div>
                </td>
                <td height="20" valign="middle" class="listfilter" nowrap>
                    <div class="r1"><div class="b1">
                        <input class="listedit" type="text" size="20" maxlength="128"
                                name="where[[{$listTable}]][oxsessid]" value="[{$where.d3log.oxsessid}]"
                        [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                    </div></div>
                </td>
                <td valign="top" class="listfilter" colspan="2" nowrap>
                    <div class="r1"><div class="b1">
                        <div class="find">
                            <input class="listedit" type="submit" name="submitit" value="[{oxmultilang ident="GENERAL_SEARCH"}]" onClick="document.search.lstrt.value=0;">
                        </div>
                        <select name="pwrsearchfld" class="editinput"
                                onChange="document.search.lstrt.value=0;top.oxid.admin.setSorting( document.search, 'd3log', this.value, 'asc');document.forms.search.submit();"
                        >
                            [{foreach from=$pwrsearchfields key=field item=desc}]
                                [{assign var="ident" value=D3_CFG_FIELDTITLE_$desc}]
                                [{assign var="ident" value=$ident|oxupper}]
                                <option value="[{$desc}]" [{if $pwrsearchfld == $desc|oxupper}]SELECTED[{/if}]>[{oxmultilang|oxtruncate:20:"..":true ident=$ident}]</option>
                            [{/foreach}]
                        </select>
                        <input class="listedit" type="text" size="25" maxlength="128"
                                name="where[[{$listTable}]][[{$pwrsearchfld|oxlower}]]" value="[{$pwrsearchinput}]"
                        [{include file="help.tpl" helpid=searchfieldoxdynamic}]>
                    </div></div>
                </td>
            </tr>
            <tr>
                <td class="listheader first" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxlogtype', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_LOGTYPE"}]</a>
                </td>
                <td class="listheader" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxtime', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_TIME"}]</a>
                </td>
                <td class="listheader" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxcounter', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_COUNTER"}]</a>
                </td>
                <td class="listheader" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxmodid', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_MODULE"}]</a>
                </td>
                <td class="listheader" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxclass', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_CLASS"}]</a>
                </td>
                <td class="listheader" height="15">&nbsp;
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', 'oxsessid', 'asc');document.search.submit();"
                    class="listheader">[{oxmultilang ident="D3_CFG_LOG_SESSID"}]</a>
                </td>
                <td class="listheader" height="15" colspan="2">
                    <a
                            href="Javascript:top.oxid.admin.setSorting( document.search, 'd3log', '[{$pwrsearchfld|oxlower}]', 'asc');document.search.submit();"
                    class="listheader">
                        [{assign var="ident" value=D3_CFG_FIELDTITLE_$pwrsearchfld}]
                        [{assign var="ident" value=$ident|oxupper}]
                        [{oxmultilang ident=$ident}]</a>
                </td>
            </tr>

            [{assign var="blWhite" value=""}]
            [{assign var="_cnt" value=0}]
            [{foreach from=$mylist item=listitem}]
                [{assign var="_cnt" value=$_cnt+1}]
                <tr id="row.[{$_cnt}]">

                    [{if $listitem->blacklist == 1}]
                        [{assign var="listclass" value="listitem3"}]
                    [{else}]
                        [{assign var="listclass" value="listitem"|cat:$blWhite}]
                    [{/if}]
                    [{if $listitem->getId() == $oxid}]
                        [{assign var="listclass" value="listitem4"}]
                    [{/if}]
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxlogtype')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxtime')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxcounter')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxmodid')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxclass')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->getFieldData('oxsessid')}]</a></div></td>
                    <td valign="top" class="[{$listclass}]"><div class="listitemfloating"><a href="Javascript:EditThis('[{$listitem->getId()}]');" class="[{$listclass}]">[{$listitem->pwrsearchval|truncate:50:"..":false }]</a></div></td>
                </tr>
                [{if $blWhite == "2"}]
                    [{assign var="blWhite" value=""}]
                [{else}]
                    [{assign var="blWhite" value="2"}]
                [{/if}]
            [{/foreach}]

            [{include file="pagenavisnippet.tpl" colspan="7"}]
        </table>
    </form>
</div>

[{include file="pagetabsnippet.tpl"}]

<script type="text/javascript">
    if (parent.parent)
    {
        parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem    = "[{oxmultilang ident="d3mxlog"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3mxlog_main"}]";
        parent.parent.sWorkArea    = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>

</body>
</html>