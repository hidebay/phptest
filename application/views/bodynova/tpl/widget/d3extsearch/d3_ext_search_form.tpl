[{if $sSearchFieldName}]
    <input type="hidden" name="searchfieldname" value="[{$sSearchFieldName}]">
    <input
        type="text"
        name="[{$sSearchFieldName}]"
        value="[{if $oView->getSearchParamForHtml()}][{$oView->getSearchParamForHtml()}][{/if}]"
        size="21"
        id="searchparam"
        class="textbox [{if !$oView->getSearchParamForHtml()}]d3notice[{/if}]">
[{else}]
    [{*** Standardsuchfeld ***}]
    <input class="textbox innerLabel" type="text" id="searchParam" name="searchparam" title="[{ oxmultilang ident="SEARCH_TITLE" }]" value="[{if $oView->getSearchParamForHtml()}][{$oView->getSearchParamForHtml()}][{else}][{ oxmultilang ident="SEARCH_TITLE" }][{/if}]">
[{/if}]

[{if $blOwnFormFields}]
[{*** Fügen Sie hier bei Bedarf noch weitere Filtermöglichkeiten hinzu ***}]
    [{* Gesucht wird nach Teilen mit LIKE *}]
        <input type="text" name="d3searchlike[oxtitle]" value="[{ $aD3OwnFormFieldsLike.oxtitle }]" size="21" class="txt">
        [{*<input type="text" name="d3searchlike[oxshortdesc]" value="[{ $aD3OwnFormFieldsLike.oxshortdesc }]" size="21" class="txt">*}]
    [{* Gesucht wird nach genauem Wortlaut mit = *}]
        <input type="text" name="d3searchis[d3_select2]" value="[{ $aD3OwnFormFieldsIs.d3_select }]" size="21" class="txt">
        [{*<input type="text" name="d3searchis[oxshortdesc]" value="[{ $aD3OwnFormFieldsIs.oxshortdesc }]" size="21" class="txt">*}]


[{/if}]