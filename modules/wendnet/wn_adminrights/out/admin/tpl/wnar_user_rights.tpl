[{include file="headitem.tpl" title="GENERAL_ADMIN_TITLE"|oxmultilangassign}]

[{ if $readonly}]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]

<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="wnar_user_rights">
</form>

<div class="messagebox">
    [{if $savedone}]<p class="warning" style="color:#393">[{ oxmultilang ident="USER_RIGHTS_DB_SAVE_DONE" }]</p>[{/if}]

[{if $edit->oxuser__oxid == 'oxdefaultadmin' }]
    <p class="warning" style="border:none">[{ oxmultilang ident="USER_RIGHTS_NO_DEFAULT_ADMIN" }]</p>
</div>

[{elseif $edit->oxuser__oxrights != 'malladmin' }]
    <p class="warning" style="border:none">[{ oxmultilang ident="USER_RIGHTS_ONLY_ADMINS" }]</p>
</div>

[{elseif $noAccess }]
    <p class="warning" style="border:none">[{ oxmultilang ident="USER_RIGHTS_NO_ACCESS" }]</p>
</div>

[{else}]
    <p class="warning" style="border:none;color:#333">[{ oxmultilang ident="USER_RIGHTS_INFO" }]
        ( <a href="#" onClick="chkChilds('top',true)"><u>[{ oxmultilang ident="USER_RIGHTS_CHOOSE_ALL" }]</u></a> |
        <a href="#" onClick="chkChilds('top',false)"><u>[{ oxmultilang ident="USER_RIGHTS_CHOOSE_NONE" }]</u></a> )</p>
</div>
<br>
<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
[{ $oViewConf->getHiddenSid() }]
<input type="hidden" name="cl" value="wnar_user_rights">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="[{ $oxid }]">
<input type="hidden" name="editval[oxuser__oxid]" value="[{ $oxid }]">

<table id="top" width="100%">
    [{assign var="length" value=$menustructure->length}]
    [{foreach from=$menustructure item=menuholder }]
        [{if $menuholder->getAttribute('id') == 'mxservicearea'}]
            [{assign var="length" value=$length-1}]
        [{/if}]
    [{/foreach}]
    [{assign var="tp" value=1}]
    [{foreach from=$menustructure item=menuholder }]
    [{assign var="menuid" value=$menuholder->getAttribute('id')}]
    [{if $menuholder->nodeType == XML_ELEMENT_NODE && $menuholder->childNodes->length && $menuid != 'mxservicearea'}]
        [{assign var="nrCol" value=1}]
        [{assign var="ttCol" value=1}]
        [{assign var="mxCol" value=3}]
        [{assign var="inCol" value=$menuholder->childNodes->length/$mxCol|round}]
        [{assign var="mn" value=1}]
        [{if $length > 1}]
        <tr>
            <td colspan="5">
                <h3>[{ oxmultilang ident=$menuholder->getAttribute('name')|default:$menuid noerror=true }]</h3>
            </td>
        </tr>
        [{/if}]
        <tr id="top_[{$tp}]">
            <td valign="top" width="30%">
            [{foreach from=$menuholder->childNodes item=menuitem}]
            [{if $menuitem->nodeType == XML_ELEMENT_NODE && $menuitem->childNodes->length}]
                [{assign var="sb" value=1}]
                <dl [{if $nrCol == 1}]class="first"[{/if}]>
                    <dt>
                        [{assign var="topid" value=$menuitem->getAttribute('id')}]
                        <input type="checkbox" name="restrict[]" value="[{ $topid }]"[{ if $restrict.$topid }] checked[{/if}] id="men_[{$tp}]_[{$mn}]" style="float:left;margin-right:5px" onClick="chkChilds('ul_[{$tp}]_[{$mn}]',this.checked)">
                        <label for="men_[{$tp}]_[{$mn}]">[{ oxmultilang ident=$menuitem->getAttribute('name')|default:$topid noerror=true }]</label>
                    </dt>
                    <dd>
                        <ul id="ul_[{$tp}]_[{$mn}]">
                        [{foreach from=$menuitem->childNodes item=submenuitem}]
                        [{if $submenuitem->nodeType == XML_ELEMENT_NODE}]
                            <li style="padding:1px 0 1px 20px;background:none;">
                                [{assign var="subid" value=$submenuitem->getAttribute('id')}]
                                [{assign var="len" value=$submenuitem->childNodes->length}]
                                <input type="checkbox" name="restrict[]" value="[{ $subid }]"[{ if $restrict.$topid || $restrict.$subid }] checked[{/if}][{ if $restrict.$topid }] disabled[{/if}] id="sub_[{$tp}]_[{$mn}]_[{$sb}]" style="float:left;margin-right:5px" onClick="[{ if $len }]chkChilds('ul_[{$tp}]_[{$mn}]_[{$sb}]',this.checked)[{else}]chkParents()[{/if}]">
                                <label for="sub_[{$tp}]_[{$mn}]_[{$sb}]"><b>[{ oxmultilang ident=$submenuitem->getAttribute('name')|default:$subid noerror=true }]</b></label>
                                [{ if $len }]
                                    <ul id="ul_[{$tp}]_[{$mn}]_[{$sb}]" style="padding-left:20px;">
                                    [{assign var="tb" value=1}]
                                    [{foreach from=$submenuitem->childNodes item=tabitem }]
                                    [{if $tabitem->nodeType == XML_ELEMENT_NODE}]
                                        [{assign var="tabid" value=$tabitem->getAttribute('id')}]
                                        [{assign var="btnname" value=$tabid|regex_replace:"/^[a-z]+_([a-z]+)$/":'\1'}]
                                        [{if $btnname != 'new' && $btnname != 'rights'}]
                                          <li style="padding:1px 0;background:none;">
                                            <input type="checkbox" name="restrict[]" value="[{ $tabid }]"[{ if $restrict.$topid || $restrict.$subid || $restrict.$tabid }] checked[{/if}][{ if $restrict.$topid || $restrict.$subid }] disabled[{/if}] id="tab_[{$tp}]_[{$mn}]_[{$sb}]_[{$tb}]" style="float:left;margin-right:5px" onClick="chkParents()">
                                            <label for="tab_[{$tp}]_[{$mn}]_[{$sb}]_[{$tb}]">
                                            [{if $tabitem->nodeName == 'TAB'}]
                                                [{ oxmultilang ident=$tabitem->getAttribute('name')|default:$tabid noerror=true }]
                                            [{elseif $tabitem->nodeName == 'BTN'}]
                                                [<em>[{ $tabitem->getAttribute('name')|default:$btnname noerror=true }]</em>]
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
        [{assign var="tp" value=$tp+1}]
    [{/if}]
    [{/foreach}]
</table>

<div align="center">
    <table><tr>
        <td><input type="checkbox" name="restrict[]" value="noeditadmin" id="no_edit"[{ if $chknoeditadmin }] checked[{/if}]></td>
        <td><label for="no_edit">[{ oxmultilang ident="USER_RIGHTS_NO_EDIT_ADMIN" }]</label></td>
    </tr><tr>
        <td><input type="checkbox" name="restrict[]" value="noforeignart" id="no_foreign"[{ if $chknoforeignart }] checked[{/if}]></td>
        <td><label for="no_foreign">[{ oxmultilang ident="USER_RIGHTS_NO_FOREIGN_ART" }]</label></td>
    </tr><tr>
        <td><input type="checkbox" name="restrict[]" value="noservicearea" id="no_service"[{ if $chknoservicearea }] checked[{/if}]></td>
        <td><label for="no_service">[{ oxmultilang ident="USER_RIGHTS_NO_SERVICE_AREA" }]</label></td>
    </tr><tr>
        <td><input type="checkbox" name="restrict[]" value="nodeltmp" id="no_deltmp"[{ if $chknodeltmp }] checked[{/if}]></td>
        <td><label for="no_deltmp">[{ oxmultilang ident="USER_RIGHTS_NO_DEL_TMP" }]</label></td>
    </tr></table>
    <table><tr>
        <td>[{ oxmultilang ident="USER_RIGHTS_COPY" }]</td>
        <td><input type="text" size="100%" name="" value="[{ $edit->oxuser__wnrestrict }]" onFocus="select()" style="color:#777"></td>
    </tr><tr>
        <td>[{ oxmultilang ident="USER_RIGHTS_PASTE" }]</td>
        <td><input type="text" size="100%" name="editval[oxuser__wnrestrict]" value=""></td>
    </tr></table>
    <input type="submit" class="edittext" name="save" value="[{ oxmultilang ident="GENERAL_SAVE" }]" onClick="Javascript:document.myedit.fnc.value='save';return chkSubmit()" [{ $readonly}]>
    <br><br>
</div>
</form>

<script type="text/javascript">
function chkChilds(e,t){chkParents();var n=0,r=null,i;if(i=document.getElementById(e)){var s=i.getElementsByTagName("li");while(s[n]&&(r=s[n].getElementsByTagName("input")[0])){r.checked=t;r.disabled=t;n++}}if(e=="top"){var o=1;while(document.getElementById("top_"+o)){n=1;while(i=document.getElementById("men_"+o+"_"+n)){i.checked=t;n++}o++}}}function chkParents(){var e=1,t=1,n=1,r=1,i=1,s=1,o,u,a;while(document.getElementById("top_"+e)){while(o=document.getElementById("men_"+e+"_"+t)){while(u=document.getElementById("sub_"+e+"_"+t+"_"+n)){while(a=document.getElementById("tab_"+e+"_"+t+"_"+n+"_"+r)){if(a.checked&&!a.disabled)s++;r++}if(r>1&&r==s){r=1;u.checked=true;while(a=document.getElementById("tab_"+e+"_"+t+"_"+n+"_"+r)){a.disabled=true;r++}}if(u.checked&&!u.disabled)i++;n++;r=1;s=1}if(n>1&&n==i){n=1;o.checked=true;while(u=document.getElementById("sub_"+e+"_"+t+"_"+n)){u.disabled=true;n++}}t++;n=1;i=1}e++;t=1}}function chkSubmit(){var e=1,t;while(document.getElementById("top_"+e)){t=1;while(elem=document.getElementById("men_"+e+"_"+t)){if(elem.checked==false)return true;t++}e++}alert('[{ oxmultilang ident="USER_RIGHTS_WARN_NO_RIGHTS" }]');return false}
</script>
[{/if}]

[{include file="bottomnaviitem.tpl"}]

[{include file="bottomitem.tpl"}]
