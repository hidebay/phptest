[{include file="headitem.tpl" title="d3mxextsearch_syneditor"|oxmultilangassign}]

<script type="text/javascript">
    <!--
    window.onload = function ()
    {
        [{if $updatelist == 1}]
            top.oxid.admin.updateList('[{$oxid}]');
        [{/if}]
        var oField = top.oxid.admin.getLockTarget();
        oField.onchange = oField.onkeyup = oField.onmouseout = top.oxid.admin.unlockSave;
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

    .ext_edittext {
        padding: 2px;
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

<form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0;margin: 0;height:0;">
    [{$oViewConf->getHiddenSid()}]
    <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
    <input type="hidden" name="fnc" value="save">
    <input type="hidden" name="oxid" value="[{$oxid}]">
    <input type="hidden" name="editval[d3_extsearch_category_link__synset_id]" value="[{$edit->d3_extsearch_term__synset_id->value}]">
    <input type="hidden" name="editval[d3_extsearch_category_link__version]" value="0">
    <table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
        <tr>
            <td valign="top" class="edittext" style="padding-top:10px;padding-left:10px; width: 50%;">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr>
                        <td class="edittext" style="width:120px;">
                            <label for="is_visible">[{oxmultilang ident="D3_EXTSEARCH_SYNED_SYNSET_VISIBLE"}]</label>
                        </td>
                        <td class="edittext">
                            <input class="edittext" type="hidden" name="editval[d3_extsearch_synset__is_visible]" value='0'>
                            <input id="is_visible" class="edittext" type="checkbox" name="editval[d3_extsearch_synset__is_visible]" value='1' [{if $oView->convertBin2Int($synset->d3_extsearch_synset__is_visible->value) == 1}]checked[{/if}] [{$readonly}]>
                        </td>
                    </tr>
                    <tr>
                        <td class="edittext" style="width:120px;">
                            <label for="category_id">[{oxmultilang ident="D3_EXTSEARCH_SYNED_SYNSET_CATEGORY"}]</label>
                        </td>
                        <td class="edittext">
                            <select id="category_id" class="editinput" name="editval[d3_extsearch_category_link__category_id]" [{$readonly}]>
                                <option value="" selected>---</option>
                                [{foreach from=$oView->getCategoryList() item="aCategory"}]
                                    <option value="[{$aCategory.id}]"[{if $syn2cat->d3_extsearch_category_link__category_id->value == $aCategory.id}] selected[{/if}]>[{$aCategory.category_name}]</option>
                                [{/foreach}]
                            </select>
                        </td>
                    </tr>
                </table>
            </td>
    <!-- Anfang rechte Seite -->
            <td class="edittext" style="vertical-align: top; text-align: left;width:100%;height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                <table cellspacing="0" cellpadding="0" border="0">
                    <tr><td></td></tr>
                </table>
            </td>
    <!-- Ende rechte Seite -->
        </tr>
        <tr>
            <td class="edittext ext_edittext" style="text-align: left;" colspan="2">
                <br>
                <span class="d3modcfg_btn icon status_ok">
                    <input type="submit" name="save" value="[{oxmultilang ident="D3_EXTSEARCH_MAIN_SAVE"}]">
                    <span></span>
                </span>
            </td>
        </tr>
    </table>
</form>

[{include file="d3_cfg_mod_inc.tpl"}]

<script type="text/javascript">
    if (parent.parent) {
        parent.parent.sShopTitle = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
        parent.parent.sMenuItem = "[{oxmultilang ident="d3mxextsearch"}]";
        parent.parent.sMenuSubItem = "[{oxmultilang ident="d3mxextsearch_syneditor"}]";
        parent.parent.sWorkArea = "[{$_act}]";
        parent.parent.setTitle();
    }
</script>