[{d3modcfgcheck modid="d3_extsearch"}]
    [{if $sSearchFieldName}]
        <input type="hidden" name="searchfieldname" value="[{$sSearchFieldName}]">
        <label for="searchParam" class="innerLabel">[{oxmultilang ident="SEARCH"}]</label>
        <input
            class="textbox [{if !$oView->getSearchParamForHtml()}]d3notice[{/if}]"
            type="text"
            id="searchParam"
            name="[{$sSearchFieldName}]"
            value="[{$oView->getSearchParamForHtml()}]"
            size="150" maxlength="150"
        >
    [{else}]
        [{$smarty.block.parent}]
    [{/if}]

    [{if $blOwnFormFields}]
        [{*** Fügen Sie hier bei Bedarf noch weitere Filtermöglichkeiten hinzu ***}]
        [{* Gesucht wird nach Teilen mit LIKE *}]
        <input type="text" name="d3searchlike[oxtitle]" value="[{$oD3ExtSearchCmpUtils->getOwnFormFieldLikeValue('oxtitle')}]" size="21" class="txt">
        [{*<input type="text" name="d3searchlike[oxshortdesc]" value="[{$oD3ExtSearchCmpUtils->getOwnFormFieldLikeValue('oxshortdesc')}]" size="21" class="txt">*}]
        [{* Gesucht wird nach genauem Wortlaut mit = *}]
        <input type="text" name="d3searchis[d3_select]" value="[{$oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('d3_select')}]" size="21" class="txt">
        [{*<input type="text" name="d3searchis[oxshortdesc]" value="[{$oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxshortdesc')}]" size="21" class="txt">*}]
        <select name="d3searchis[oxstock]">
            <option value="">Bitte Lagerstand wählen</option>
            <option value="BETWEEN__AND_5_" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxstock') == 'BETWEEN__AND_5_'}] selected[{/if}]>bis 5</option>
            <option value="BETWEEN_3_AND_7_" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxstock') == 'BETWEEN_3_AND_7_'}] selected[{/if}]>von 3 bis 7</option>
            <option value="BETWEEN_8_AND_200_" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxstock') == 'BETWEEN_8_AND_200_'}] selected[{/if}]>von 8 bis 200</option>
            <option value="BETWEEN_201_AND__" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxstock') == 'BETWEEN_201_AND__'}] selected[{/if}]>ab 201</option>
        </select>
        <select name="d3searchis[oxprice]">
            <option value="">Bitte Preis wählen</option>
            <option value="BETWEEN__AND_3.5_" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxprice') == 'BETWEEN__AND_3.5_'}] selected[{/if}]>bis 3,50</option>
            <option value="BETWEEN_3_AND_8.7_" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxprice') == 'BETWEEN_3_AND_8.7_'}] selected[{/if}]>von 3,00 bis 8,70</option>
            <option value="BETWEEN_8.71_AND__" [{if $oD3ExtSearchCmpUtils->getOwnFormFieldIsValue('oxprice') == 'BETWEEN_8.71_AND__'}] selected[{/if}]>ab 8,71</option>
        </select>
    [{/if}]
[{/d3modcfgcheck}]

[{if !$mod_d3_extsearch}]
    [{$smarty.block.parent}]
[{/if}]