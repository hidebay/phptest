[{include file="headitem.tpl" title="D3SECCHECK_LIB_TRANSL"|oxmultilangassign}]

[{ if $readonly }]
    [{assign var="readonly" value="readonly disabled"}]
[{else}]
    [{assign var="readonly" value=""}]
[{/if}]
<form name="transfer" id="transfer" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="oxidCopy" value="[{ $oxid }]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
</form>

<form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="oxid" value="[{ $oxid }]">
    <input type="hidden" name="voxid" value="[{ $oxid }]">
</form>

<script type="text/javascript">
    function _groupExp(el) {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
          else _cur.className = "exp";
    }
</script>

<style type="text/css">
    div.box{background: white url([{$oView->getBGLogoUrl()}]) no-repeat bottom right;}
    div.groupExp {padding: 0 0 0 17px;}
    div.groupExp.errormark {background-color: #CD0210;}
    div.groupExp.successmark {background-color: #0B3;}
    div.groupExp.infomark {background-color: #3f6bc3;}
    div.groupExp.errormark div, div.groupExp.successmark div, div.groupExp.infomark div {background-color: #F0F0F0;}
    .groupExp dl dd {padding: 5px 5px 0 0;}
    .groupExp dl dd {float: left; padding: 0; width: 30%;}
    .statusicon {height: 20px; margin: 0px 20px; float: left;}
    .userIdentForm {position: relative; background-color: transparent; border-style: none; display: block;}
    .userIdentForm .activate {display: block;}
    .userIdentForm .formElems {display: none;}
    .userIdentFormActive .activate{display: none;}
    .userIdentFormActive {background-color:white; border:2px outset #999999; display:block; height:200px; left:200px; position:absolute; top:150px; width:450px;}
    .userIdentFormActive .d3modcfg_btn {background: none;}
    .groupExp dl dd.userIdentFormActive {width: 425px;}
</style>

[{if !$blStartCheck}]
    [{oxmultilang ident="D3_SECCHECK_MSG_STARTCHECK"}]
    <form name="myedit" id="myedit" action="[{ $oViewConf->getSelfLink() }]" method="post">
        [{ $oViewConf->getHiddenSid() }]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="blStartCheck" value="1">
        <span class="d3modcfg_btn icon status_ok">
            <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_STARTCHECK"}]">
            <div></div>
        </span>
    </form>
[{else}]

        [{foreach from=$oView->getRestrictionList() item="oRestriction"}]
            <div class="groupExp [{if $oRestriction->blGeneralError}]errormark[{else}]successmark[{/if}]">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <b>
                            [{$oRestriction->sFolder}]
                        </b>
                    </a>
                    [{foreach from=$oRestriction->status item="oStatus"}]
                        <dl>
                            <dt style="width: 30%;">
                                    <span class="d3modcfg_icon
                                    [{if $oStatus->status == 'success'}]
                                        status_ok
                                    [{elseif $oStatus->status == 'error'}]
                                        status_danger
                                    [{/if}]
                                    statusicon" style="margin-right: 10px;"></span>
                                [{assign var="ident" value="D3_SECCHECK_MSG_"|cat:$oStatus->statusmsg|upper}]
                                [{oxmultilang ident=$ident}]
                            </dt>
                            <dd style="width: 35%; float: left;">
                                [{$oStatus->statusmsgadd}]
                            </dd>
                            <dd class="userIdentForm">

                                [{if $oStatus->status == 'error'}]
                                    <form name="secaction" action="[{ $oViewConf->getSelfLink() }]" method="post">
                                        [{ $oViewConf->getHiddenSid() }]
                                        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                        <input type="hidden" name="blStartCheck" value="[{$blStartCheck}]">
                                        <input type="hidden" name="filename" value="[{$oStatus->statusmsgadd}]">
                                        [{if $oStatus->statusmsg == 'fileMissing'}]
                                            <input type="hidden" name="fnc" value="createFile">
                                            <span class="d3modcfg_btn icon status_ok">
                                                <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_CREATEFILE"}]">
                                                <div></div>
                                            </span>
                                        [{elseif $oStatus->statusmsg == 'noFileListing'}]
                                            <input type="hidden" name="fnc" value="setFileListing">
                                            <span class="d3modcfg_btn icon status_ok">
                                                <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_SETRESTRICTION"}]">
                                                <div></div>
                                            </span>
                                        [{elseif $oStatus->statusmsg == 'checkNoFileAccess'}]
                                            <input type="hidden" name="fnc" value="setNoFileAccess">
                                            <span class="d3modcfg_btn icon status_ok">
                                                <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_SETRESTRICTION"}]">
                                                <div></div>
                                            </span>
                                        [{elseif $oStatus->statusmsg == 'userIdent'}]
                                            <input type="hidden" name="fnc" value="setUserIdent">
                                            <span class="d3modcfg_btn icon status_ok">
                                                <input type="button" class="activate" value="[{oxmultilang ident="D3_SECCHECK_BTN_SETPASSWORD"}]" onClick="this.parentNode.parentNode.parentNode.className='userIdentFormActive';">
                                                <div></div>
                                            </span>
                                            <h3 class="formElems" style="padding-left: 40px;">[{oxmultilang ident="D3_SECCHECK_BTN_SETPASSWORD"}]</h3>
                                            <p class="formElems">
                                                <table class="formElems">
                                                    <tr>
                                                        <td style="font-weight: bold;">[{oxmultilang ident="D3_SECCHECK_MSG_DIRECTORY"}]</td>
                                                        <td>[{$oStatus->statusmsgadd}]</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">[{oxmultilang ident="D3_SECCHECK_MSG_USERNAME"}]</td>
                                                        <td><input class="formElems" type="text" name="username" size="30" maxlength="50"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="font-weight: bold;">[{oxmultilang ident="D3_SECCHECK_MSG_PASSWORD"}]</td>
                                                        <td><input class="formElems" type="password" name="pass" size="30"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>
                                                            <span class="d3modcfg_btn icon status_ok">
                                                                <input class="formElems" type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_SAVE"}]">
                                                                <div></div>
                                                            </span>
                                                            &nbsp;&nbsp;
                                                            <span class="d3modcfg_btn icon status_failed">
                                                                <input class="formElems" type="reset" value="[{oxmultilang ident="D3_SECCHECK_BTN_RESET"}]" onclick="this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.className='userIdentForm';">
                                                                <div></div>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </p>
                                        [{elseif $oStatus->statusmsg == 'file'}]
                                            <input type="hidden" name="fnc" value="deleteFile">
                                            <span class="d3modcfg_btn icon status_attention">
                                                <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_DELETEFILE"}]">
                                                <div></div>
                                            </span>
                                        [{elseif $oStatus->statusmsg == 'folderexist'}]
                                            <input type="hidden" name="fnc" value="deleteFolder">
                                            <span class="d3modcfg_btn icon status_attention">
                                                <input type="submit" value="[{oxmultilang ident="D3_SECCHECK_BTN_DELETEFOLDER"}]">
                                                <div></div>
                                            </span>
                                        [{/if}]
                                    </form>
                                [{else}]
                                    [{* don't ask, it's required :) *}]
                                    <form></form>
                                [{/if}]
                            </dd>
                            <div class="spacer"></div>
                        </dl>
                    [{/foreach}]
                </div>
            </div>
        [{/foreach}]

        <div class="groupExp infomark">
            <div class="">
                <a class="rc" onclick="_groupExp(this); return false;" href="#">
                    <b>
                        [{$oView->getAdminUserCount()}] [{oxmultilang ident="D3_SECCHECK_MSG_ADMIN"}]
                    </b>
                </a>
                [{foreach from=$oView->getAdminUser() item="aUser"}]
                    <dl>
                        <dt style="width: 30%;">
                            [{$aUser.oxusername}]
                        </dt>
                        <dd style="width: 35%; float: left;">
                            [{$aUser.oxlname}], [{$aUser.oxfname}]
                            [{if $aUser.oxcompany}]
                                - [{$aUser.oxcompany}]
                            [{/if}]
                        </dd>
                        <div class="spacer"></div>
                    </dl>
                [{/foreach}]
            </div>
        </div>

[{/if}]

        </td>
    </tr>
</table>

[{if $oView->getErrorStatus()}]
    <script type="text/javascript">
        [{if $oView->getErrorStatus() == 1}]
            alert('[{oxmultilang ident="D3SECCHECK_MSG_TOSHORT"}]');
        [{/if}]
    </script>
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