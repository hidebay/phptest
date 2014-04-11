[{include file="headitem.tpl" title="D3_CFG_MOD"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    [{if $updatelist == 1}]
    UpdateList('[{$oxid}]');
    [{/if}]

    function _groupExp(el)
    {
        var _cur = el.parentNode;

        if (_cur.className == "exp") _cur.className = "";
        else _cur.className = "exp";
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
        width:       100%;
    }

    strong.version {
        border:           1px solid black;
        margin:           5px;
        padding:          5px 10px;
        background-color: white;
        color:            black;
    }

    strong.version.error {
        background-color: #FF3600;
        color:            white;
    }

    .ext_edittext {
        padding: 2px;
    }

    ul li.syscheck {
        background:     none;
        white-space:    normal;
        padding-bottom: 10px;
        padding-left:   34px;
        text-indent:    -24px;
    }

    ul li.syscheck div.desc {
        text-indent: 0;
        margin:      5px 20px;
    }

    ul li.syscheck img {
        margin-right: 5px;
        height:       20px;
    }

    div.desc ul li {
        list-style: inside;
        background: none;
    }

    div.desc ul li ul li {
        padding-left: 18px;
    }

    .extension_error {
        margin-bottom: 10px;
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

[{assign var="sDownloadField" value=$oView->getPhpVersionDownloadField()}]

<table border="0" width="100%">
    <tr>
        <td valign="top">

            [{if $edit->getErrorMessage()}]
                <div class="extension_error">
                    [{$edit->getErrorMessage()}]
                </div>
            [{/if}]

            <div class="groupExp">
                <div class="exp">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_VERSION"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <div style="border-bottom: 1px solid silver;">
                                <div>
                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_TEXT1"}][{$edit->getModTitle()}][{oxmultilang ident="D3_CFG_MOD_VERSION_TEXT2"}] [{$edit->getFieldData('oxshopversion')}]
                                </div>
                                <div style="margin: 23px 0;">
                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_INSTALLEDV"}] <strong
                                        class="version [{if $oView->checkModuleVersion() != 'OK'}]error[{/if}]">[{$edit->getModVersion()}]
                                    </strong>
                                    [{if $oView->checkModuleVersion() != 'OK'}]<span class="d3modcfg_icon status_danger"
                                                                                      style="display:inline-block;"></span>&nbsp;[{oxmultilang ident="D3_CFG_LIB_INSTALLEDVERSIONNOTCONGRUENT"}]
                                   [{/if}]
                                </div>
                            </div>

                            [{if $oView->hasUpdate()}]
                                [{if $oView->getAction() == 'versionCheck'}]
                                    <div style="margin: 10px 0;">
                                        <strong>[{oxmultilang ident="D3_CFG_MOD_VERSION_RESULT"}]</strong>
                                        [{if $oView->getUpdateData('version')}]
                                            <div style="margin: 23px 0 10px; padding-bottom: 10px; border-bottom: 1px solid silver;">
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_AVAILVERSION"}]
                                                <strong class="version" style="border-color: green;">
                                                    [{$oView->getUpdateData('version')}]
                                                </strong>
                                                [{if $oView->getUpdateData('infourl')}]
                                                    <a href="[{$oView->getUpdateData('infourl')}]">[{oxmultilang ident="D3_CFG_MOD_VERSION_MODINFO"}]</a>
                                                [{/if}]

                                                [{if $oView->getUpdateData($sDownloadField)}]
                                                    <div style="padding: 20px 0 [{if $oView->getUpdateData('autoupdate') > 0 && $oView->getInstallClass()}]35px[{else}]0[{/if}];">
                                                        [{if $oView->getInstallClass()}]
                                                            <form name="myedit" id="installMod" action="[{$oViewConf->getSelfLink()}]" method="post">
                                                                [{$oViewConf->getHiddenSid()}]
                                                                <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                                                <input type="hidden" name="oxid" value="[{$oxid}]">
                                                                <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                                                <input type="hidden" name="fnc" value="installMod">
                                                                <input type="hidden" name="modid" value="[{$edit->d3getModId()}]">
                                                        [{/if}]
                                                        [{assign var="classparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
                                                        <div>
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD1"}]
                                                            <a href="[{$oViewConf->getSelfLink()|oxaddparams:$classparam|oxaddparams:"fnc=filedownload"}]">
                                                                <strong style="text-decoration: underline;">
                                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD2"}]
                                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD3"}]
                                                                </strong>
                                                            </a>
                                                            [{if $oView->getInstallClass()}]
                                                                    [{if $oView->getUpdateData('autoupdate') > 0}]
                                                                        [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD4"}]
                                                                        <div class="d3modcfg_btn icon status_question" style="margin: 10px 0 0 0;">
                                                                            <input type="submit"
                                                                                   value="[{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD5"}]">
                                                                            <div></div>
                                                                        </div>
                                                                    [{/if}]
                                                                </form>
                                                            [{/if}]
                                                        </div>
                                                    </div>
                                                [{/if}]
                                            </div>
                                        [{else}]
                                            <div>
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_NONEWVERSION"}]
                                            </div>
                                        [{/if}]
                                    </div>
                                    [{if $oView->getNewestModuleData('version')}]
                                        <div style="padding-top: 10px;">
                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION"}]
                                            <strong class="version" style="border-color: yellow;">
                                                [{$oView->getNewestModuleData('version')}]
                                            </strong>
                                            [{if $oView->getNewestModuleData('infourl')}]
                                                <a href="[{$oView->getNewestModuleData('infourl')}]">
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_MODINFO"}]
                                                </a>
                                            [{/if}]
                                            <div style="padding-top: 20px;">
                                                [{if $oView->check4ShopUpdate($oView->getNewestModuleData('fromshop'))}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1"}]
                                                    [{$oView->getNewestModuleData('fromshop')}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2"}]<br>
                                                [{/if}]
                                                [{if $oView->check4LicenseUpdate($edit->d3getModId(), $oView->getNewestModuleData('version'))}]
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_NEWESTVERSION_LIC"}]<br>
                                                [{/if}]
                                            </div>
                                            [{if $oView->getNewestModuleData($sDownloadField)}]
                                                [{assign var="classparam" value="cl="|cat:$oViewConf->getActiveClassName()}]
                                                <div>
                                                    [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD1"}]
                                                    <a href="[{$oViewConf->getSelfLink()|oxaddparams:$classparam|oxaddparams:"fnc=filedownload"|oxaddparams:"type=newest"}]">
                                                        <strong style="text-decoration: underline;">
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD2"}]
                                                            [{oxmultilang ident="D3_CFG_MOD_VERSION_UPDLOAD3"}]
                                                        </strong>
                                                    </a>
                                                </div>
                                            [{/if}]
                                        </div>
                                    [{/if}]
                                [{else}]
                                    <div style="padding: 15px 0 40px;">
                                        <form name="myedit" id="check_update" action="[{$oViewConf->getSelfLink()}]" method="post">
                                            [{$oViewConf->getHiddenSid()}]
                                            <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                            <input type="hidden" name="fnc" value="checkUpdate">
                                            <input type="hidden" name="oxid" value="[{$oxid}]">
                                            <input type="hidden" name="editval[oxid]" value="[{$oxid}]">

                                            <div>
                                                [{oxmultilang ident="D3_CFG_MOD_VERSION_CHECKTXT"}]
                                            </div>
                                            <div class="d3modcfg_btn icon status_question" style="margin: 10px 0 0 0;">
                                                <input type="submit"
                                                       value="[{oxmultilang ident="D3_CFG_MOD_VERSION_STARTCHECK"}]">
                                                <div></div>
                                            </div>
                                        </form>
                                        <div></div>
                                    </div>
                                [{/if}]
                            [{/if}]
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_DEV"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <div style="float: right; margin: 20px;"><img src="../modules/_d3modcfg/public/d3logo.php?size=L" alt="D³" title="D³ Data Development"></div>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_TEXT1"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR1"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR2"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR3"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR4"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_ADR5"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_WEBLINK"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_MAILLINK"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_DEV_MODULELINK"}]<br>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_1"}]<br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_2"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_3"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_4"}]
                            <a href="mailto:[{oxmultilang ident="D3_CFG_MOD_SUPPORT_MAIL"}]">
                                [{oxmultilang ident="D3_CFG_MOD_SUPPORT_MAIL"}]
                            </a><br>
                            <br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_5"}]<br>
                            [{oxmultilang ident="D3_CFG_MOD_SUPPORT_6"}]
                            <br>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            [{if $edit->isLicenseRequired()}]
                [{if $edit->getFieldData('oxserial')}]
                    <div class="groupExp">
                        <div class="">
                            <a class="rc" onclick="_groupExp(this); return false;" href="#">
                                <span style="font-weight: bold;">
                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS"}]
                                </span>
                            </a>
                            <dl>
                                <dt>
                                    <table>
                                        [{if $edit->getLicenseData('result')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_GENERALVALID"}]
                                                </td>
                                                <td>
                                                    [{assign var="translKey" value="D3_CFG_MOD_STATUS_"|cat:$edit->getLicenseData('result')|upper}]
                                                    [{oxmultilang ident=$translKey}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('domain')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDDOMAIN"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('domain')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('allow_local')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL"}]
                                                </td>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                    [{oxinputhelp ident="D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC"}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('startdate')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFROMDATE"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('startdate')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('enddate')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDTODATE"}]
                                                </td>
                                                <td>
                                                    [{if $edit->getExpireSpan() > 756864000}]
                                                        [{oxmultilang ident="D3_CFG_MOD_STATUS_NEVER_EXPIRES"}]
                                                    [{else}]
                                                        [{$edit->getLicenseData('enddate')}] ([{$oView->getExpireSpanString()}])
                                                    [{/if}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('modid')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODID"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('modid')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('modversion')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION"}]
                                                </td>
                                                <td>
                                                    [{$edit->getLicenseData('modversion')}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getFormatedShopIdList()}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID"}]
                                                </td>
                                                <td>
                                                    [{$edit->getFormatedShopIdList()}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('isdemo')}]
                                            <tr>
                                                <td>
                                                    [{oxmultilang ident="D3_CFG_MOD_LICDETAILS_ISTEST"}]
                                                </td>
                                                <td>
                                                    [{if $edit->getLicenseData('isdemo')}][{oxmultilang ident="D3_CFG_MOD_LICDETAILS_VALID_YES"}]
                                                    [{/if}]
                                                </td>
                                            </tr>
                                        [{/if}]
                                        [{if $edit->getLicenseData('config')}]
                                            [{foreach from=$edit->getLicenseData('config') key="sKey" item="mValue"}]
                                                <tr>
                                                    <td>
                                                        [{assign var="translKey" value=$edit->d3getModId()|upper|cat:"_CONFIGVARS_"|cat:$sKey|upper}]
                                                        [{oxmultilang ident=$translKey}]
                                                    </td>
                                                    <td>
                                                        [{$mValue}]
                                                    </td>
                                                </tr>
                                            [{/foreach}]
                                        [{/if}]
                                    </table>
                                </dt>
                                <dd class="spacer"></dd>
                            </dl>
                        </div>
                    </div>
                [{/if}]

                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{if $oView->hasLicenseKey()}]
                                [{oxmultilang ident="D3_CFG_MOD_CHANGEKEY"}]
                                [{else}]
                                [{oxmultilang ident="D3_CFG_MOD_ACTIVATE"}]
                                [{/if}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <iframe src="[{$oView->getLicenceFrameUrl($edit->getModId())}]" style="width: 99%; height: 270px; border: 0 none transparent;" framborder="0"></iframe>
                            </dt>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            [{/if}]

            [{if $oView->hasNewsletterForm()}]
                <div class="groupExp">
                    <div class="">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_CFG_MOD_STAYINFORMED"}]
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post">
                                    [{$oViewConf->getHiddenSid()}]
                                    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
                                    <input type="hidden" name="fnc" value="setInfoMail">
                                    <input type="hidden" name="oxid" value="[{$oxid}]">
                                    <input type="hidden" name="editval[oxid]" value="[{$oxid}]">
                                    <input type="hidden" name="service[bl_updateinfo]" value="0">
                                    <input class="edittext ext_edittext" id="bl_updateinfo" type="checkbox" name="service[d3_cfg_mod__bl_updateinfo]" value='1' [{if $service->d3_cfg_mod__bl_updateinfo->value == 1}]checked[{/if}]>
                                    <label for="bl_updateinfo">[{oxmultilang ident="D3_CFG_MOD_STAYINFORMED_1"}]</label><br>
                                    <label for="s_updateinfomail">[{oxmultilang ident="D3_CFG_MOD_STAYINFORMED_2"}]</label>
                                    <input type="text" class="editinput" id="s_updateinfomail" size="30" maxlength="255" name="service[d3_cfg_mod__s_updateinfomail]" value="[{if $service->d3_cfg_mod__s_updateinfomail}][{$service->d3_cfg_mod__s_updateinfomail}][{else}][{$actshopobj->oxshops__oxinfoemail->value}][{/if}]">
                                    <br>
                                    <div class="d3modcfg_btn icon action_mail" style="margin: 10px 10px 0 0;">
                                        <input type="submit" value="[{oxmultilang ident="D3_CFG_MOD_SAVE"}]">
                                        <div></div>
                                    </div>
                                </form>
                            </dt>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            [{/if}]

            <div class="groupExp">
                <div class="">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_SYS_CHECK"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            <ul>
                                <li class="syscheck">
                                    [{if $oView->d3CheckRevision() == 'undefined'}]
                                        <img class="d3modcfg_icon status_attention" style="display: inline; margin: 0;"
                                             src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                             alt="[{oxmultilang ident="D3_CFG_MOD_SYS_REVUNDEF"}]"
                                             title="[{oxmultilang ident="D3_CFG_MOD_SYS_REVUNDEF"}]">
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_REVUNDEF"}]
                                    [{elseif $oView->d3CheckRevision() == 'higher'}]
                                        <img class="d3modcfg_icon status_attention" style="display: inline; margin: 0;"
                                             src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                             alt="[{oxmultilang ident="D3_CFG_MOD_SYS_REVUNDEF"}]"
                                             title="[{oxmultilang ident="D3_CFG_MOD_SYS_REVUNDEF"}]">
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_REVHIGHER"}]
                                    [{elseif $oView->d3CheckRevision() == 'ok'}]
                                        <img class="d3modcfg_icon status_ok" style="display: inline; margin: 0;"
                                             src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                             alt="[{oxmultilang ident="D3_CFG_MOD_SYS_REVOK"}]"
                                             title=[{oxmultilang ident="D3_CFG_MOD_SYS_REVOK"}]>
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_REVOK"}]
                                    [{else}]
                                        <img class="d3modcfg_icon status_minus" style="display: inline; margin: 0;"
                                             src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                             alt="[{oxmultilang ident="D3_CFG_MOD_SYS_REVNOK"}]"
                                             title="[{oxmultilang ident="D3_CFG_MOD_SYS_REVNOK"}]">
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_REVNOK"}]
                                    [{/if}]
                                </li>
                                <li class="syscheck">
                                    [{if $oView->d3CheckCurl()}]
                                        <img class="d3modcfg_icon status_ok" style="display: inline; margin: 0;"
                                             src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                             alt="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLOK"}]"
                                             title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLOK"}]">
                                        &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLOK"}]
                                    [{else}]
                                        [{if $oView->d3ModUseCurl()}]
                                            <img class="d3modcfg_icon status_minus" style="display: inline; margin: 0;"
                                                 src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                 alt="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLREQ"}]"
                                                 title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLREQ"}]">
                                            &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLREQ"}]
                                        [{else}]
                                            <img class="d3modcfg_icon status_attention" style="display: inline; margin: 0;"
                                                 src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                 alt="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLNOK"}]"
                                                 title="[{oxmultilang ident="D3_CFG_MOD_SYS_CURLNOK"}]">
                                            &nbsp;[{oxmultilang ident="D3_CFG_MOD_SYS_CURLNOK"}]
                                        [{/if}]
                                    [{/if}]
                                </li>
                            </ul>
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

            [{if $edit->hasModuleHealthCheck()}]
                <div class="groupExp">
                    <div class="[{if $edit->hasGeneralUnhealthyItems()}]exp[{/if}]">
                        <a class="rc" onclick="_groupExp(this); return false;" href="#">
                            <span style="font-weight: bold;">
                                [{oxmultilang ident="D3_CFG_MOD_MODHEALTH"}] "[{$edit->getModTitle()}]"
                            </span>
                        </a>
                        <dl>
                            <dt>
                                <ul>
                                    [{if $edit->hasRequModuleItems()}]
                                        <li class="syscheck">
                                            [{assign var="oRequ" value=$edit->getRequModuleItems()}]
                                            [{if $oRequ->mod}]
                                                [{if $oRequ->failure}]
                                                    <img class="d3modcfg_icon status_failed" style="display: inline; margin: 0;"
                                                         src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                         alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSNOK"}]"
                                                         title="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSNOK"}]">
                                                    &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSNOK"}]
                                                [{else}]
                                                    <img class="d3modcfg_icon status_ok" style="display: inline; margin: 0;"
                                                         src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                         alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSOK"}]"
                                                         title="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSOK"}]">
                                                    &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_ITEMSOK"}]
                                                [{/if}]
                                                <div class="desc">
                                                    <ul>
                                                        [{foreach from=$oRequ->mod item="modItem"}]
                                                            <li style="color: [{if $modItem->status == 'OK'}]darkgreen[{else}]darkred[{/if}];">
                                                                [{$modItem->class}] => [{$modItem->modulepath}]
                                                            </li>
                                                        [{/foreach}]
                                                    </ul>
                                                </div>
                                            [{/if}]
                                        </li>
                                    [{/if}]

                                    [{if $edit->hasRequDBItems()}]
                                        <li class="syscheck">
                                            [{assign var="oRequ" value=$edit->getRequDBItems()}]
                                            [{if $oRequ->tbl}]
                                                [{if $oRequ->failure}]
                                                    <img class="d3modcfg_icon status_failed" style="display: inline; margin: 0;"
                                                         src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                         alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBNOK"}]"
                                                         title="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBNOK"}]">
                                                    &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBNOK"}]
                                                [{else}]
                                                    <img class="d3modcfg_icon status_ok" style="display: inline; margin: 0;"
                                                         src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                         alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBOK"}]"
                                                         title="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBOK"}]">
                                                    &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBOK"}]
                                                [{/if}]
                                                <div class="desc">
                                                    <ul>
                                                        [{foreach from=$oRequ->tbl key="tableName" item="DbItem"}]
                                                            <li style="color: [{if $DbItem->status == 'OK'}]darkgreen[{else}]darkred[{/if}];">
                                                                [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBTABLE"}] <span style="font-weight: bold;">[{$tableName}]</span>
                                                                [{if $DbItem->status == 'missing'}]
                                                                    - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_MISSING"}]
                                                                [{/if}]
                                                                [{if $DbItem->fields}]
                                                                    <ul>
                                                                        [{foreach from=$DbItem->fields item="field"}]
                                                                            <li style="color: [{if $field->status == 'OK'}]darkgreen[{else}]darkred[{/if}];">
                                                                                [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_DBFIELD"}] <span style="font-weight: bold;">[{$field->name}]</span>
                                                                                [{if $field->status == 'missing'}]
                                                                                    - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_MISSING"}]
                                                                                [{elseif $field->status == 'fieldtype'}]
                                                                                    - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_FIELDTYPE"}]
                                                                                [{/if}]
                                                                            </li>
                                                                        [{/foreach}]
                                                                    </ul>
                                                                [{/if}]
                                                            </li>
                                                        [{/foreach}]
                                                    </ul>
                                                </div>
                                            [{/if}]
                                        </li>
                                    [{/if}]

                                    [{if $edit->hasMissingConfigItems()}]
                                        <li class="syscheck">
                                            [{assign var="oRequ" value=$edit->getMissingConfigItems()}]
                                            [{if $oRequ->failure}]
                                                <img class="d3modcfg_icon status_failed" style="display: inline; margin: 0;"
                                                     src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                     alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGNOK"}]"
                                                     title="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGNOK"}]">
                                                &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGNOK"}]
                                            [{else}]
                                                <img class="d3modcfg_icon status_ok" style="display: inline; margin: 0;"
                                                     src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]"
                                                     alt="[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGOK"}]"
                                                     title=[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGOK"}]>
                                                &nbsp;[{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGOK"}]
                                            [{/if}]
                                            [{if $oRequ->aMissing}]
                                                <div class="desc">
                                                    <ul>
                                                        [{foreach from=$oRequ->aMissing key="configName" item="configItem"}]
                                                            [{if $configItem}]
                                                                <li style="color: [{if $configItem.type == 'OK'}]darkgreen[{else}]darkred[{/if}];">
                                                                    [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONFIGNAME"}] <span style="font-weight: bold;">[{$configItem.name}]</span>
                                                                    [{if $configItem.type == 'missing'}]
                                                                        - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_MISSING"}]
                                                                    [{elseif $configItem.type == 'fieldtype'}]
                                                                        - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_VARTYPE"}]
                                                                    [{elseif $configItem.type == 'content'}]
                                                                        - [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_CONTENT"}]
                                                                    [{/if}]
                                                                </li>
                                                            [{else}]
                                                                <li>
                                                                    [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_MISSING"}]
                                                                </li>
                                                            [{/if}]
                                                        [{/foreach}]
                                                    </ul>
                                                </div>
                                            [{/if}]
                                        </li>
                                    [{/if}]

                                    [{if $edit->hasGeneralUnhealthyItems()}]
                                        <li class="syscheck">
                                            [{oxmultilang ident="D3_CFG_MOD_MODHEALTH_SEEMANUAL"}]
                                        </li>
                                    [{/if}]
                                </ul>
                            </dt>
                            <dd class="spacer"></dd>
                        </dl>
                    </div>
                </div>
            [{/if}]

            <div class="groupExp">
                <div class="[{if $oView->hasBlogContent()}]exp[{/if}]">
                    <a class="rc" onclick="_groupExp(this); return false;" href="#">
                        <span style="font-weight: bold;">
                            [{oxmultilang ident="D3_CFG_MOD_NEWS_NEWS"}]
                        </span>
                    </a>
                    <dl>
                        <dt>
                            [{if $oView->hasBlogContent()}]
                                <ul>
                                    [{foreach from=$oView->hasBlogContent() item="oBlog"}]
                                        <li class="syscheck">
                                            <img class="d3modcfg_icon action_zoom1" style="display: inline; margin: 0;"
                                                 src="[{$oViewConf->getModuleUrl('d3modcfg_lib','out/admin/img/d3modcfg_empty.gif')}]" alt="[{$oBlog->title|replace:'"':''}]"
                                                 title="[{$oBlog->title|replace:'"':''}]">
                                            <a href="[{$oBlog->link}]" target="blog">
                                                [{$oBlog->date|date_format:"%d.%m.%Y %H:%M"}] -
                                                <span style="font-weight: bold;">[{$oBlog->title}]</span>
                                            </a>
                                        </li>
                                    [{/foreach}]
                                </ul>
                                <hr>
                                [{oxmultilang ident="D3_CFG_MOD_NEWS_FURTHER1"}]
                                <a href="[{$oView->getBlogBaseUrl()}]" target="blog">
                                    <span style="font-weight: bold;">[{$oView->getBlogBaseUrl()}]</span>
                                </a>
                            [{else}]
                                [{oxmultilang ident="D3_CFG_MOD_NEWS_FURTHER2"}]
                                <a href="[{$oView->getBlogBaseUrl()}]" target="blog">
                                    <b>[{$oView->getBlogBaseUrl()}]</b>
                                </a>
                            [{/if}]
                        </dt>
                        <dd class="spacer"></dd>
                    </dl>
                </div>
            </div>

        </td>
    </tr>
</table>

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident=$oView->d3GetMenuItemTitle()}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident=$oView->d3GetMenuSubItemTitle()}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>
