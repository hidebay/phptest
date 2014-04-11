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
body {
[{if $oView->getBgColor()}]
    background-color: [{$oView->getBgColor()}];
[{else}]
    background-color: #FAFAFA;
[{/if}]
    margin: 0;
}
div.box {
    border: 0 none transparent;
    [{if $oView->getBgColor()}]
        background: none [{$oView->getBgColor()}] !important;
    [{else}]
        background: none #FAFAFA !important;
    [{/if}]
}
div.actions {
    display: none;
}
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

.box td.listitem2,
.box td.listitem
{
    padding: 2px 5px;
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

dl {border-top: none;}

dl dt {
    float: left;
    width: 270px;
    clear: both;
}

dl dd {
    float: left;
}

h4 {
    margin-top: 0;
}

-->
</style>

<form action="[{$oViewConf->getSelfLink()}]" method="post" id="activationform">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="modid" value="[{$oModule->getModId()}]">

[{if $oModule->isLicenseRequired() && $oView->getNextStep() == 'getActivationType'}]
    <input type="hidden" name="fnc" value="setStep1">
    <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_HEADLINE"}]</h4>
    <table style="border: none solid 0;" cellspacing="0" cellpadding="0">
        [{assign var="listclass" value="listitem2"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="boughtoxidmodule" value="boughtoxidmodule" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="boughtoxidmodule">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE_DESC"}]
            </td>
        </tr>

        [{assign var="listclass" value="listitem"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="boughtforeign" value="boughtforeign" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="boughtforeign">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN_DESC"}]
            </td>
        </tr>

        [{assign var="listclass" value="listitem2"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="hasserial" value="hasserial" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="hasserial">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_HASLICENCE"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_HASLICENCE_DESC"}]
            </td>
        </tr>

        [{assign var="listclass" value="listitem"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="usedemo" value="usedemo" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="usedemo">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_DEMO"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_DEMO_DESC"}]
            </td>
        </tr>

        [{assign var="listclass" value="listitem2"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="wantbuy" value="wantbuy" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="wantbuy">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_BUY"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_BUY_DESC"}]
            </td>
        </tr>

        [{assign var="listclass" value="listitem"}]
        <tr>
            <td class="edittext [{$listclass}]">
                <input id="notlisted" value="notlisted" type="radio" name="activationtype">
            </td>
            <td class="edittext [{$listclass}]">
                <label for="notlisted">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED"}]</label>
            </td>
            <td class="edittext [{$listclass}]">
                [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED_DESC"}]
            </td>
        </tr>
    </table>
    [{assign var="blBackStep" value=false}]
    [{assign var="blNextStep" value=true}]
[{elseif $oModule->isLicenseRequired() && $oView->getNextStep() == 'getActivationData'}]
    <input type="hidden" name="fnc" value="setStep2">
    <input type="hidden" name="activationtype" value="[{$oView->getActivationType()}]">
    [{if $oView->getActivationType() == 'boughtoxidmodule' || $oView->getActivationType() == 'usedemo'}]
        [{assign var="oShop" value=$oView->getSubmitLicenceShop()}]
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_HEADLINE"}]</h4>
        <table style="border: none solid 0;" cellspacing="0" cellpadding="0">
            [{assign var="listclass" value="listitem2"}]
            <tr>
                <td class="edittext [{$listclass}]">
                    [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_MODULE"}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{$oModule->getModId()}] ([{$oModule->getModTitle()}])
                </td>
                <td class="edittext [{$listclass}]">
                    [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_MODULE_DESC"}]
                </td>
            </tr>

            [{assign var="listclass" value="listitem"}]
            <tr>
                <td class="edittext [{$listclass}]">
                    [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_MODVERSION"}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{$oModule->getModVersion()}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_MODVERSION_DESC"}]
                </td>
            </tr>

            [{assign var="listclass" value="listitem2"}]
            <tr>
                <td class="edittext [{$listclass}]">
                    [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_DOMAIN"}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{$oView->getSubmitLicenceDomain()}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_DOMAIN_DESC"}]
                </td>
            </tr>

            [{assign var="listclass" value="listitem"}]
            <tr>
                <td class="edittext [{$listclass}]">
                    [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_SHOP"}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{$oShop->getId()}] ([{$oShop->getFieldData('oxname')}])
                </td>
                <td class="edittext [{$listclass}]">
                    [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_SHOP_DESC"}]
                </td>
            </tr>

            [{assign var="listclass" value="listitem2"}]
            <tr>
                <td class="edittext [{$listclass}]">
                    [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_EDITION"}]
                </td>
                <td class="edittext [{$listclass}]">
                    [{$oView->getSubmitShopEdition(0)}] ([{$oView->getSubmitShopEdition(1)}])
                </td>
                <td class="edittext [{$listclass}]">
                    [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_EDITION_DESC"}]
                </td>
            </tr>

            [{if $oView->getActivationType() == 'boughtoxidmodule'}]
                [{assign var="listclass" value="listitem"}]
                <tr>
                    <td class="edittext [{$listclass}]">
                        <label for="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER"}]</label>
                    </td>
                    <td class="edittext [{$listclass}]">
                        <input id="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER" type="text" size="32" name="sActIdent" maxlength="32">
                    </td>
                    <td class="edittext [{$listclass}]">
                        [{oxinputhelp ident="D3_CFG_MOD_ACTIVATION_DATA_VOUCHER_DESC"}]
                    </td>
                </tr>
            [{/if}]
        </table>

        [{if $oView->getActivationType() == 'usedemo'}]
            <div class="clear"></div>
            <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_DATA_DEMO_DESC"}]</p>
        [{/if}]
        <div class="clear"></div>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=true}]
    [{elseif $oView->getActivationType() == "boughtforeign"}]
        <input type="hidden" name="activationtype" value="">
        <input type="hidden" name="fnc" value="">
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_FOREIGN_HEADLINE"}]</h4>
        <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_FOREIGN_DESC"}]</p>
        <div class="clear"></div>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=false}]
    [{elseif $oView->getActivationType() == 'hasserial'}]
        <input type="hidden" name="fnc" value="saveSerial">
        <h4><label for="D3_CFG_MOD_ACTIVATION_HASSERIAL_HEADLINE">[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_HASSERIAL_HEADLINE"}]</label></h4>
        <textarea id="D3_CFG_MOD_ACTIVATION_HASSERIAL_HEADLINE" class="editinput" cols="82" name="licencekey" style="font-family: courier; height: 130px;"></textarea>
        <div class="clear"></div>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=true}]
    [{elseif $oView->getActivationType() == 'wantbuy'}]
        <input type="hidden" name="activationtype" value="">
        <input type="hidden" name="fnc" value="">
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_HEADLINE"}]</h4>
        [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_DESC_1"}]
        http://www.oxidmodule.com/index.php?cl=search&searchparam=[{$oModule->getModId()}]
        [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_BUY_DESC_2"}]
        <div class="clear"></div>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=false}]
    [{elseif $oView->getActivationType() == "notlisted"}]
        <input type="hidden" name="activationtype" value="">
        <input type="hidden" name="fnc" value="">
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_NOTLISTED_HEADLINE"}]</h4>
        [{oxmultilang ident="D3_CFG_MOD_ACTIVATION_NOTLISTED_DESC"}]
        <div class="clear"></div>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=false}]
    [{/if}]
[{elseif $oModule->isLicenseRequired() && $oView->getNextStep() == 'submitData'}]
    <input type="hidden" name="fnc" value="">
    <input type="hidden" name="activationtype" value="[{$oView->getActivationType()}]">
    [{if !$oView->getSubmitStatus()}]
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL"}]</h4>
        <p>[{$oView->getExpirationMessage()}]</p>
        <textarea style="width: 600px; height: 130px; font-family: courier;">[{$oView->getModuleSerial()}]</textarea>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=false}]
    [{else}]
        <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_NSUCCESS_HL"}]</h4>
        <p>[{$oView->getNotSuccessMessage()}]</p>
        [{assign var="blBackStep" value=true}]
        [{assign var="blNextStep" value=false}]
    [{/if}]
[{elseif $oView->getNextStep() == 'saveSerialSuccess'}]
    <h4>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL"}]</h4>
    <p>[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SAVESERIALSUCC"}]</p>
    [{assign var="blBackStep" value=false}]
    [{assign var="blNextStep" value=false}]
[{/if}]
    [{if $blBackStep}]
        <span class="d3modcfg_btn icon status_nok" style="margin: 10px 0 0 0; margin-right: 23px;">
            <input type="button" value="[{oxmultilang ident="D3_CFG_MOD_ACTIVATION_SUBMIT_BACK"}]" onclick="aElems = document.getElementsByName('activationtype'); aElems[0].value = ''; aFElems = document.getElementsByName('fnc'); aFElems[0].value = ''; document.getElementById('activationform').submit();">
            <span style="background-position: -120px -300px;"></span>
        </span>
    [{/if}]
    [{if $blNextStep}]
        <span class="d3modcfg_btn icon status_ok" style="margin: 10px 0 0 0;">
            <input type="submit" value="[{$oView->getSubmitText()}]">
            <span></span>
        </span>
    [{/if}]
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

[{include file="bottomitem.tpl"}]