[{if $sSearchFieldName}]
    <input type="hidden" name="searchfieldname" value="[{$sSearchFieldName}]">
    <input
        type="text"
        name="[{$sSearchFieldName}]"
        value="[{if $searchparamforhtml}][{$searchparamforhtml}][{else}][{oxmultilang ident="D3_EXTSEARCH_FIELD_NOTICE"}][{/if}]"
        size="21"
        id="f.search.param"
        class="field [{if !$searchparamforhtml}]notice[{/if}]"
        onFocus="if(this.value == '[{oxmultilang ident="D3_EXTSEARCH_FIELD_NOTICE"}]') {
            this.className = 'field';
            this.value = '';
        }"
        [{if !$blD3EmptySearch}]
            onBlur="if (this.value == '') {
                this.className = 'field notice';
                this.value = '[{oxmultilang ident="D3_EXTSEARCH_FIELD_NOTICE"}]';
            }"
        [{/if}]
    >
[{else}]
    [{*** Standardsuchfeld ***}]
    <input type="text" name="searchparam" value="[{$searchparamforhtml}]" size="21" id="f.search.param" class="field">
[{/if}]

[{if $blOwnFormFields}]
[{*** Fügen Sie hier bei Bedarf noch weitere Filtermöglichkeiten hinzu ***}]
    [{* Gesucht wird nach Teilen mit LIKE *}]
        <input type="text" name="d3searchlike[oxtitle]" value="[{ $aD3OwnFormFieldsLike.oxtitle }]" size="21" class="field">
        [{*<input type="text" name="d3searchlike[oxshortdesc]" value="[{ $aD3OwnFormFieldsLike.oxshortdesc }]" size="21" class="field">*}]
    [{* Gesucht wird nach genauem Wortlaut mit = *}]
        <input type="text" name="d3searchis[d3_select2]" value="[{ $aD3OwnFormFieldsIs.d3_select }]" size="21" class="field">
        [{*<input type="text" name="d3searchis[oxshortdesc]" value="[{ $aD3OwnFormFieldsIs.oxshortdesc }]" size="21" class="field">*}]


[{/if}]