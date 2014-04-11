[{d3modcfgcheck modid="d3_extsearch"}]
    [{if !$oView->getArticleCount()}]
        <h3>[{oxcontent ident="d3extsearch_noarticlefound" field="oxtitle"}]</h3>
        [{oxcontent ident="d3extsearch_noarticlefound"}]
    [{/if}]

    [{if $oView->d3GetCMSList()}]
        <div class="box d3_extsearch_navigation baseframe">
            <h3>
                [{oxmultilang ident="D3_EXTSEARCH_EXT_CMSHEADLINE"}]
            </h3>
            <div class="content list">
        <!--
        [{* Darstellung als Detaileinträge untereinander
               <ul style="margin: 2px;">
                   [{foreach from=$oView->d3GetCMSList() item="oContent"}]
                       [{assign var="TitleCharCount" value=$oContent->oxcontents__oxtitle->value|count_characters}]
                       [{math equation="100-s" s=$TitleCharCount assign="iTextLength"}]
                       <li>
                           <a href="[{$oContent->getLink()}]"><b>[{$oContent->oxcontents__oxtitle->value}]</b> - [{$oContent->oxcontents__oxcontent->value|strip_tags|oxtruncate:$iTextLength:"..."}]</a><br>
                       </li>
                   [{/foreach}]
               </ul>
        *}]
        -->

               [{foreach from=$oView->d3GetCMSList() item="oContent"}]
                   [{assign var="TitleCharCount" value=$oContent->oxcontents__oxtitle->value|count_characters}]
                   [{math equation="100-s" s=$TitleCharCount assign="iTextLength"}]
                   <div class="item">
                       <a href="[{$oContent->getLink()}]">[{$oContent->oxcontents__oxtitle->value}]</a>
                   </div>
               [{/foreach}]
               <div class="clearitem"></div>
            </div>
        </div>
    [{/if}]

    [{assign var="similarSearch" value=$oView->getSearchResultStatusMessage()}]
    [{if $similarSearch}]
    <div class="d3_extsearch_navigation baseframe">
        <div class="message">
            [{if $similarSearch == 'similar'}]
                [{oxmultilang ident="D3_EXTSEARCH_EXT_NOARTMSG"}] [{$oView->getUsedParams()}]
            [{elseif $similarSearch == 'combined'}]
                [{oxmultilang ident="D3_EXTSEARCH_EXT_LESSARTMSG"}]
            [{/if}]
        </div>
    </div>
    [{/if}]

    [{if $blSearchPluginLink == 1}]
    <div class="box d3_extsearch_navigation baseframe">
        <h3>
            [{oxmultilang ident="D3_EXTSEARCH_EXT_PLUGINHEADLINE"}]
        </h3>
        <div class="content list">
           <SCRIPT type="text/javascript">
               function installSearchEngine() {
                   if (window.external && ("AddSearchProvider" in window.external)) {
                       window.external.AddSearchProvider("[{$sSearchPluginURL}]");
                   } else {
                       alert('[{oxmultilang ident="D3_EXTSEARCH_EXT_PLUGINBROWSERERROR"}]');
                   }
               }
           </SCRIPT>
           [{oxmultilang ident="D3_EXTSEARCH_EXT_PLUGININSTALLMSG"}]
           <div style="text-align: center; padding-top: 5px;"><a class="login_button" style="padding: 2px;" onclick="installSearchEngine();">[{oxmultilang ident="D3_EXTSEARCH_EXT_PLUGININSTALLBTN"}]</a></div>
        </div>
    </div>
    [{/if}]

    [{if $oView->d3HasjQuerySlider()}]
        [{assign var="sTplInc" value=$oViewConf->getModulePath('d3_extsearch')|cat:"views/tpl/d3_ext_search_slider.tpl"}]
        [{include file=$sTplInc}]
        [{assign var="sCssInc" value=$oViewConf->getModuleUrl('d3_extsearch', 'out/src/css/d3_ext_search_slider.css')}]
        [{oxstyle include=$sCssInc}]
    [{/if}]

    [{if $aSemanticHits || $oView->d3getCategoryList()|count ||
         $sSelectedCatId || $oView->d3getVendorList()|count ||
         $sSelectedVendorId || $oView->d3getManufacturerList()|count ||
         $sSelectedManufacturerId || $oView->d3getPriceSteps() ||
         $oView->d3GetAttributeList()}]
        <div class="box d3_extsearch_navigation baseframe">
            <h3>
                [{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHBOX"}]
            </h3>
            <div class="content list">

                <form action="[{$oViewConf->getSelfActionLink()}]" method="post" id="d3searchfilterform">
                    [{$oViewConf->getHiddenSid()}]
                    <input type="hidden" name="cl" value="search">
                    <input type="hidden" name="searchparam" value="[{$oView->getSearchParamForHtml()}]">
                    <input type="hidden" name="fnc" value="">
                    <input type="hidden" name="isextsearch" value="true">
                    [{foreach from=$oView->getNavigationParams() key="keyname" item="value"}]
                        [{if $keyname != 'searchcnid' && $keyname != 'searchvendor' && $keyname != 'searchmanufacturer'}]
                            <input type="hidden" name="[{$keyname}]" value="[{$value}]">
                        [{/if}]
                    [{/foreach}]

                    [{block name="d3_inc_ext_search__filter"}]
                        [{if $aSemanticHits}]
                            <div class="item">
                                <label for="semanticlist">[{oxmultilang ident="D3_EXTSEARCH_EXT_YOUMEAN"}]</label><br>
                                <SELECT id="semanticlist" name="semanticlist" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                    <OPTION value="" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSECAT"}]</OPTION>
                                    [{foreach from=$aSemanticHits item="sSemantic"}]
                                        <OPTION value="[{$sSemantic->sLink}]">[{$sSemantic->sWord}]</OPTION>
                                    [{/foreach}]
                                </SELECT>
                            </div>
                        [{/if}]

                        [{if $oView->d3getCategoryList()|count || $sSelectedCatId}]
                            <div class="item">
                                <label for="searchcnid">[{oxmultilang ident="D3_EXTSEARCH_EXT_CATEGORIES"}]</label><br>
                                <SELECT id="searchcnid" name="searchcnid" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                    [{if $sSelectedCatId}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINCATEGORIES"}]</OPTION>
                                        <OPTION value="[{$sSelectedCatId}]" selected="selected">[{$sSelectedCat}]</OPTION>
                                    [{else}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSECAT"}]</OPTION>
                                        [{foreach from=$oView->d3getCategoryList() item="category"}]
                                            <OPTION value="[{$category->getId()}]">[{$category->oxcategories__oxtitle->getRawValue()}][{if $category->getFieldData('counter')}] ([{$category->getFieldData('counter')}])[{/if}]</OPTION>
                                        [{/foreach}]
                                    [{/if}]
                                </SELECT>
                            </div>
                        [{/if}]
                        [{if $oView->d3getVendorList()|count || $sSelectedVendorId}]
                            <div class="item">
                                <label for="searchvendor">[{oxmultilang ident="D3_EXTSEARCH_EXT_VENDORS"}]</label><br>
                                <SELECT id="searchvendor" name="searchvendor" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                    [{if $sSelectedVendorId}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINVENDORS"}]</OPTION>
                                        <OPTION value="[{$sSelectedVendorId}]" selected="selected">[{$sSelectedVendor}]</OPTION>
                                    [{else}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEVENDOR"}]</OPTION>
                                        [{foreach from=$oView->d3getVendorList() item="vendor"}]
                                            <OPTION value="[{$vendor->getId()}]">[{$vendor->oxvendor__oxtitle->getRawValue()}][{if $vendor->getFieldData('counter')}] ([{$vendor->getFieldData('counter')}])[{/if}]</OPTION>
                                        [{/foreach}]
                                    [{/if}]
                                </SELECT>
                            </div>
                        [{/if}]
                        [{if $oView->d3getManufacturerList()|count || $sSelectedManufacturerId}]
                            <div class="item">
                                <label for="searchmanufacturer">[{oxmultilang ident="D3_EXTSEARCH_EXT_MANUFACTURERS"}]</label><br>
                                <SELECT id="searchmanufacturer" name="searchmanufacturer" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                    [{if $sSelectedManufacturerId}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINMANUFACTURERS"}]</OPTION>
                                        <OPTION value="[{$sSelectedManufacturerId}]" selected="selected">[{$sSelectedManufacturer}]</OPTION>
                                    [{else}]
                                        <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEMANUFACTURER"}]</OPTION>
                                        [{foreach from=$oView->d3getManufacturerList() item="manufacturer"}]
                                            <OPTION value="[{$manufacturer->getId()}]">[{$manufacturer->oxmanufacturers__oxtitle->getRawValue()}][{if $manufacturer->getFieldData('counter')}] ([{$manufacturer->getFieldData('counter')}])[{/if}]</OPTION>
                                        [{/foreach}]
                                    [{/if}]
                                </SELECT>
                            </div>
                        [{/if}]

                        [{if $oView->d3GetAttributeList()}]
                            [{foreach from=$oView->d3GetAttributeList() name=search key=key item=oAttribute}]
                                <div class="item">
                                    <label for="d3searchattrib__[{$key}]">[{$oAttribute->title}]:</label><br>
                                    <SELECT id="d3searchattrib__[{$key}]" name="d3searchattrib[[{$key}]]" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                        [{if $oAttribute->selected}]
                                            <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSDESELECT1"}] [{$oAttribute->title}] [{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSDESELECT2"}]</OPTION>
                                        [{else}]
                                            <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION1"}] [{$oAttribute->title}] [{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION2"}]</OPTION>
                                        [{/if}]
                                        [{foreach from=$oAttribute->_aList name=attrvalues key=valuekey item=oAttrValue}]
                                            <OPTION class="[{if $oAttrValue->highlighted}]highlight [{/if}]" value="[{$oAttrValue->rawvalue}]" [{if $oAttrValue->selected}] selected[{/if}]>[{$oAttrValue->value}] [{if $oAttrValue->count}]([{$oAttrValue->count}])[{/if}]</OPTION>
                                        [{/foreach}]
                                    </SELECT>
                                </div>
                            [{/foreach}]
                        [{/if}]

                        [{if $oView->d3getPriceSteps() || $sSelectedPriceStep}]
                            [{assign var="currency" value=$oView->getActCurrency()}]
                            <div class="item">
                                <label for="priceselector">[{oxmultilang ident="D3_EXTSEARCH_EXT_PRICECATS"}]:</label><br>
                                [{if $oView->d3HasjQuerySlider()}]
                                    <div style="text-align: center; display: none;" id="d3extsearchpriceinfo"><span id="d3extsearch_priceinfomin">[{$oView->getPriceSliderInfoMinValue()}]</span> [{$currency->sign}] - <span id="d3extsearch_priceinfomax">[{$oView->getPriceSliderInfoMaxValue()}]</span> [{$currency->sign}]</div>
                                    <div style="display: block;" id="d3extsearchpricefields">
                                        <input size="10" maxlength="20" type="text" name="priceselector[min]" value="[{$oView->getPriceSliderInputMinValue()}]" id="d3extsearch_pricefieldmin" style="width: 50px;"> [{$currency->sign}] -
                                        <input size="10" maxlength="20" type="text" name="priceselector[max]" value="[{$oView->getPriceSliderInputMaxValue()}]" id="d3extsearch_pricefieldmax" style="width: 50px;"> [{$currency->sign}]
                                    </div>
                                    <script type="text/javascript">document.getElementById('d3extsearchpriceinfo').style.display = 'block'; document.getElementById('d3extsearchpricefields').style.display = 'none';</script>
                                    <div id="d3extsearch_priceslider" class="ui-slider">
                                        <div class="ui-slider-handle" id="d3extsearch_priceslider1"></div>
                                        <div class="ui-slider-handle" id="d3extsearch_priceslider2" style="left:300px;"></div>
                                    </div>
                                [{else}]
                                    <SELECT id="priceselector" name="priceselector" onchange="d3_extsearch_popup.popup.load(); document.getElementById('d3searchfilterform').submit();">
                                        <OPTION value="[{$sSelectedPriceStep}]" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEPRICE"}]</OPTION>
                                    [{foreach from=$oView->d3getPriceSteps() item="price"}]
                                        <OPTION value="[{$price->addParam}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_PRICEFROM"}] [{$price->iFMin}] [{$currency->sign}] [{oxmultilang ident="D3_EXTSEARCH_EXT_PRICETO"}] [{$price->iFMax}] [{$currency->sign}][{if $price->iCount != ''}] ([{$price->iCount}])[{/if}]</OPTION>
                                    [{/foreach}]
                                    [{if $sSelectedPriceStep}]
                                        <OPTION value="" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_DESELECTPRICE"}]</OPTION>
                                    [{/if}]
                                   </SELECT>
                                [{/if}]
                            </div>
                        [{/if}]
                    [{/block}]

                    <noscript>
                        <div class="fullitem">
                            <span class="btn">
                                <input type="submit" value="[{oxmultilang ident="D3_EXTSEARCH_EXT_START_SEARCH"}]">
                            </span>
                        </div>
                    </noscript>

                    <div class="clearitem"></div>
                </form>
            </div>
        </div>
    [{/if}]

    [{if $oView->hasFilterParams()}]
        <div class="d3_extsearch_navigation baseframe fit">
            [{assign var="sTplPath" value=$oViewConf->getModulePath('d3_extsearch')|cat:"views/tpl/"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fdesc="D3_EXTSEARCH_EXT_ALL"|oxmultilangassign d3fparam="all"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="A"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="B"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="C"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="D"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="E"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="F"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="G"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="H"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="I"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="J"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="K"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="L"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="M"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="N"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="O"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="P"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="Q"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="R"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="S"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="T"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="U"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="V"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="W"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="X"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="Y"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="Z"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="1"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="2"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="3"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="4"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="5"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="6"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="7"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="8"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="9"}]
            [{include file=$sTplPath|cat:"d3_ext_search_filter.tpl" d3fparam="0"}]
        </div>
    [{/if}]
[{/d3modcfgcheck}]

[{if $oView->getArticleCount()}]
    [{$smarty.block.parent}]
[{/if}]