[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{ if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="wn_user_rights">
</form>

<div class="messagebox">
    [{if $setupdone}]<p class="warning" style="color:#393">[{ oxmultilang ident="USER_RIGHTS_DB_SETUP_DONE" }]</p>[{/if}]
    [{if $savedone}]<p class="warning" style="color:#393">[{ oxmultilang ident="USER_RIGHTS_DB_SAVE_DONE" }]</p>[{/if}]

[{if $edit->oxuser__oxid == 'oxdefaultadmin' }]
    <p class="warning" style="border:none">[{ oxmultilang ident="USER_RIGHTS_NO_DEFAULT_ADMIN" }]</p>
</div>

[{elseif $edit->oxuser__oxrights != 'malladmin' }]
    <p class="warning" style="border:none">[{ oxmultilang ident="USER_RIGHTS_ONLY_ADMINS" }]</p>
</div>

[{else}]
    <p class="warning" style="border:none;color:#333">[{ oxmultilang ident="USER_RIGHTS_INFO" }]
        (<a href="#" onClick="chkChilds('top',true)"><u>alle</u></a> |
        <a href="#" onClick="chkChilds('top',false)"><u>kein</u></a>)</p>
</div>
<br>
<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="wn_user_rights">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="editval[oxuser__oxid]" value="[{ $oxid }]">

<table id="top" width="100%">
    [{foreach from=$menustructure item=menuholder }]
    [{if $menuholder->nodeType == XML_ELEMENT_NODE && $menuholder->childNodes->length }]

        [{assign var="nrCol" value=1}]
        [{assign var="ttCol" value=1}]
        [{assign var="mxCol" value=3}]
        [{assign var="inCol" value=$menuholder->childNodes->length/$mxCol|round}]
        [{assign var="mn" value=1}]
            <tr>
            <td valign="top" width="30%">
            [{foreach from=$menuholder->childNodes item=menuitem}]
            [{if $menuitem->nodeType == XML_ELEMENT_NODE && $menuitem->childNodes->length}]
                [{assign var="sb" value=1}]
                <dl [{if $nrCol == 1}]class="first"[{/if}]>
                    <dt>
                        [{assign var="topid" value=$menuitem->getAttribute('id')}]
                        <input type="checkbox" name="restrict[]" value="[{ $topid }]"[{ if $restrict.$topid }] checked[{/if}] id="top_[{$mn}]" style="float:left;margin-right:5px" onClick="chkChilds('ul_[{$mn}]',this.checked)">
                        <label for="top_[{$mn}]">[{ oxmultilang ident=$menuitem->getAttribute('name')|default:$topid }]</label>
                    </dt>
                    <dd>
                        <ul id="ul_[{$mn}]">
                        [{foreach from=$menuitem->childNodes item=submenuitem}]
                        [{if $submenuitem->nodeType == XML_ELEMENT_NODE}]
                            <li style="padding:1px 0 1px 20px;background:none;">
                                [{assign var="subid" value=$submenuitem->getAttribute('id')}]
                                [{assign var="len" value=$submenuitem->childNodes->length}]
                                <input type="checkbox" name="restrict[]" value="[{ $subid }]"[{ if $restrict.$topid || $restrict.$subid }] checked[{/if}][{ if $restrict.$topid }] disabled[{/if}] id="sub_[{$mn}]_[{$sb}]" style="float:left;margin-right:5px" onClick="[{ if $len }]chkChilds('ul_[{$mn}]_[{$sb}]',this.checked)[{else}]chkParents()[{/if}]">
                                <label for="sub_[{$mn}]_[{$sb}]"><b>[{ oxmultilang ident=$submenuitem->getAttribute('name')|default:$subid }]</b></label>
                                [{ if $len }]
                                    <ul id="ul_[{$mn}]_[{$sb}]" style="padding-left:20px;">
                                    [{assign var="tb" value=1}]
                                    [{foreach from=$submenuitem->childNodes item=tabitem }]
                                    [{if $tabitem->nodeType == XML_ELEMENT_NODE}]
                                        [{assign var="tabid" value=$tabitem->getAttribute('id')}]
                                        [{assign var="btnname" value=$tabid|regex_replace:"/^[a-z]+_([a-z]+)$/":'\1'}]
                                        [{if $btnname != 'new'}]
                                          <li style="padding:1px 0;background:none;">
                                            <input type="checkbox" name="restrict[]" value="[{ $tabid }]"[{ if $restrict.$topid || $restrict.$subid || $restrict.$tabid }] checked[{/if}][{ if $restrict.$topid || $restrict.$subid }] disabled[{/if}] id="tab_[{$mn}]_[{$sb}]_[{$tb}]" style="float:left;margin-right:5px" onClick="chkParents()">
                                            <label for="tab_[{$mn}]_[{$sb}]_[{$tb}]">
                                            [{if $tabitem->nodeName == 'TAB'}]
                                                [{ oxmultilang ident=$tabitem->getAttribute('name')|default:$tabid }]
                                            [{elseif $tabitem->nodeName == 'BTN'}]
                                                [<em>[{ $tabitem->getAttribute('name')|default:$btnname }]</em>]
                                            [{/if}]
                                            </label>
                                          </li>
                                        [{assign var="tb" value=$tb+1}]
                                        [{/if}]
                                    [{/if}]
                                    [{/foreach}]
                                    </ul>
                                [{/if}]
                            </li>
                            [{assign var="sb" value=$sb+1}]
                        [{/if}]
                        [{/foreach}]
                        </ul>
                    </dd>
                </dl>
                [{assign var="mn" value=$mn+1}]
                [{if $nrCol == $inCol && $ttCol<$mxCol}]
                    </td><td width="5%"></td><td valign="top" width="30%">
                    [{assign var="nrCol" value=1}]
                    [{assign var="ttCol" value=$ttCol+1}]
                [{else}]
                    [{assign var="nrCol" value=$nrCol+1}]
                [{/if}]

            [{/if}]
            [{/foreach}]
            </td>
            </tr>
    [{/if}]
    [{/foreach}]
</table>

<div align="center">
    <table><tr>
        <td><input type="checkbox" name="restrict[]" value="noeditadmin" id="no_edit"[{ if $chknoeditadmin }] checked[{/if}][{ if $disablechk }] disabled[{/if}]></td>
        <td><label for="no_edit">[{ oxmultilang ident="USER_RIGHTS_NO_EDIT_ADMIN" }]</label></td>
    </tr></table>
    [{* if $disablechk && $chknoeditadmin }]<input type="hidden" name="restrict[]" value="noeditadmin">[{/if*}]
    <p>Copy:&nbsp; <input type="text" size="100%" name="" value="[{ $edit->oxuser__wnrestrict }]" onFocus="select()" style="color:#777"></p>
    <p>Paste: <input type="text" size="100%" name="editval[oxuser__wnrestrict]" value=""></p>
    <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="GENERAL_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save'"" [{ $readonly}]>
    <br><br>
</div>
</form>

<script type="text/javascript">
function chkChilds( id, chk )
{
    chkParents();

    var i = 0;
    var el = null;
    var elem;

    if ( elem = document.getElementById(id) )
    {
        var elems = elem.getElementsByTagName('li');

        while ( elems[i] && ( el = elems[i].getElementsByTagName('input')[0] )) {
            el.checked = chk;
            el.disabled = chk;
            i++;
        }
    }

    if ( id == 'top' )
    {
        i = 1;
        while ( elem = document.getElementById('top_'+i) ) {
            elem.checked = chk;
            i++;
        }
    }
}

function chkParents()
{
    var i=1, j=1, k=1, subcnt=1, tabcnt=1;

    while ( eltop = document.getElementById('top_'+i) )
    {
        while ( elsub = document.getElementById('sub_'+i+'_'+j) )
        {
            while ( eltab = document.getElementById('tab_'+i+'_'+j+'_'+k) )
            {
                if ( eltab.checked && !eltab.disabled )
                    tabcnt++;
                k++;
            }

            if ( k > 1 && k == tabcnt )
            {
                k = 1;
                elsub.checked = true;
                while ( eltab = document.getElementById('tab_'+i+'_'+j+'_'+k) ) {
                    eltab.disabled = true;
                    k++;
                }
            }

            if ( elsub.checked && !elsub.disabled )
                subcnt++;
            j++;
            k = 1;
            tabcnt = 1;
        }

        if ( j > 1 && j == subcnt )
        {
            j = 1;
            eltop.checked = true;
            while ( elsub = document.getElementById('sub_'+i+'_'+j) ) {
                elsub.disabled = true;
                j++;
            }
        }

        i++;
        j = 1;
        subcnt = 1;
    }
}
</script>
[{/if}]

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
