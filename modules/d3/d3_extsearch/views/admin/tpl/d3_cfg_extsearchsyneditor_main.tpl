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

[{if !$oView->hasSemanticLexicon()}]
    [{oxmultilang ident="D3_EXTSEARCH_SYNED_NOLEXICON"}]
[{else}]
    <form name="transfer" id="transfer" action="[{$oViewConf->getSelfLink()}]" method="post">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="actshop" value="[{$shop->id}]">
        <input type="hidden" name="editlanguage" value="[{$editlanguage}]">
    </form>

    <table cellspacing="0" cellpadding="0" border="0" style="width:98%;">
        <form name="myedit" id="myedit" action="[{$oViewConf->getSelfLink()}]" method="post" style="padding: 0px;margin: 0px;height:0px;">
        [{$oViewConf->getHiddenSid()}]
        <input type="hidden" name="cl" value="[{$oViewConf->getActiveClassName()}]">
        <input type="hidden" name="fnc" value="save">
        <input type="hidden" name="oxid" value="[{$oxid}]">
        <input type="hidden" name="editval[d3_extsearch_term__oxid]" value="[{$oxid}]">
            <tr>
                <td valign="top" class="edittext" style="padding-top:10px;padding-left:10px; width: 50%;">

                    <table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__word">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_WORD"}]</label
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="[{$edit->d3_extsearch_term__word->fldmax_length}]" id="term__word" name="editval[d3_extsearch_term__word]" value="[{$edit->getFieldData('word')}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__normalized_word">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_NORMALIZEDWORD"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="[{$edit->d3_extsearch_term__normalized_word->fldmax_length}]" id="term__normalized_word" name="editval[d3_extsearch_term__normalized_word]" value="[{$edit->getFieldData('normalized_word')}]">
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__is_acronym">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_ISACRONYM"}]</label>
                            </td>
                            <td class="edittext">
                                <input class="edittext" type="hidden" name="editval[d3_extsearch_term__is_acronym]" value='0'>
                                <input class="edittext" type="checkbox" name="editval[d3_extsearch_term__is_acronym]" value='1' id="term__is_acronym" [{if $oView->convertBin2Int($edit->getFieldData('is_acronym')) == 1}]checked[{/if}] [{$readonly}]>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__user_comment">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_COMMENT"}]</label>
                            </td>
                            <td class="edittext">
                                <input type="text" class="editinput" size="32" maxlength="[{$edit->d3_extsearch_term__user_comment->fldmax_length}]" id="term__user_comment" name="editval[d3_extsearch_term__user_comment]" value="[{$edit->getFieldData('user_comment')}]">
                            </td>
                        </tr>
                    </table>
                </td>
        <!-- Anfang rechte Seite -->
                <td valign="top" class="edittext" align="left" style="width:100%;height:99%;padding-left:5px;padding-bottom:30px;padding-top:10px;">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__synset_id">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_SYNSETID"}]</label>
                            </td>
                            <td class="edittext">
                                [{if $oxid != '-1'}]
                                    <input type="text" class="editinput" size="32" maxlength="[{$edit->d3_extsearch_term__synset_id->fldmax_length}]" id="term__synset_id" name="editval[d3_extsearch_term__synset_id]" value="[{$edit->getFieldData('synset_id')}]">
                                [{else}]
                                    [{$oView->getNextSynsetId()}]
                                [{/if}]
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__language_id">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_LANGUAGE"}]</label>
                            </td>
                            <td class="edittext">
                                <select class="editinput" name="editval[d3_extsearch_term__language_id]" id="term__language_id" [{$readonly}]>
                                    <option value="" selected>---</option>
                                    [{foreach from=$oView->getLanguageList() item="aLanguage"}]
                                        <option value="[{$aLanguage.id}]"[{if $edit->getFieldData('language_id') == $aLanguage.id}] selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_LANGUAGE_"|cat:$aLanguage.short_form|replace:" ":"_"|upper}] [{if $oView->convertBin2Int($aLanguage.is_disabled) == 1}][{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_LANGUAGE_DISABLED"}][{/if}]</option>
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__word_grammar">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_GRAMMAR"}]</label>
                            </td>
                            <td class="edittext">
                                <select class="editinput" name="editval[d3_extsearch_term__word_grammar_id]" id="term__word_grammar" [{$readonly}]>
                                    <option value="" selected>---</option>
                                    [{foreach from=$oView->getGrammarList() item="aGrammar"}]
                                        <option value="[{$aGrammar.id}]"[{if $edit->getFieldData('word_grammar_id') == $aGrammar.id}] selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_GRAMMAR_"|cat:$aGrammar.form|replace:" ":"_"|upper}]</option>
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="edittext" style="width:120px;">
                                <label for="term__level_id">[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_LEVEL"}]</label>
                            </td>
                            <td class="edittext">
                                <select class="editinput" name="editval[d3_extsearch_term__level_id]" id="term__level_id" [{$readonly}]>
                                    <option value="" selected>---</option>
                                    [{foreach from=$oView->getLevelList() item="aLevel"}]
                                        <option value="[{$aLevel.id}]"[{if $edit->getFieldData('level_id') == $aLevel.id}] selected[{/if}]>[{oxmultilang ident="D3_EXTSEARCH_SYNED_MAIN_LEVEL_"|cat:$aLevel.id|upper}]</option>
                                    [{/foreach}]
                                </select>
                            </td>
                        </tr>
                    </table>

                </td>
        <!-- Ende rechte Seite -->
            </tr>
            <tr>
                <td class="edittext ext_edittext" style="text-align: left;" colspan="2">
                    <br>
                    <div class="d3modcfg_btn icon status_ok">
                        <input type="submit" name="save" value="[{oxmultilang ident="D3_EXTSEARCH_MAIN_SAVE"}]">
                        <div></div>
                    </div>
                </td>
            </tr>
        </form>
    </table>
[{/if}]

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