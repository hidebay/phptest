[{include file="headitem.tpl" title="d3mxmoditems"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    function _groupExp(el) {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
        else _cur.className = "exp";
    }
    -->
</script>

<style type="text/css">
    .groupExp dl dt {
        font-weight:  normal;
        width:        55%;
        padding-left: 10px;
    }
</style>

<form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="oxidCopy" value="[{$oxid}]">
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
</form>

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="getNewModPreview">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="voxid" value="[{$oxid}]">

    <table border="0" width="98%">
        <tr>
            <td valign="top" class="edittext">
                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <b>
                                [{oxmultilang ident="D3_CFG_MAINTENANCE_MODULES"}]
                            </b>
                        </a>
                        <dl>
                            <dt>
                                [{oxmultilang ident="D3_CFG_MAINTENANCE_REPAIRMODULES"}]
                            </dt>
                            <dd>
                                <div class="d3modcfg_btn fixed icon status_question">
                                    <input type="submit" name="save" value="[{oxmultilang ident="D3_CFG_MODITEM_PREVIEW"}]" onclick="document.getElementById('myedit').fnc.value = 'repairModuleDbItems'; document.getElementById('myedit').submit(); return false;">
                                    <div></div>
                                </div>
                            </dd>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</form>

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