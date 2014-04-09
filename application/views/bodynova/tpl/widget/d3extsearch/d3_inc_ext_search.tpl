[{if $oView->d3GetCMSList()}]
<div class="d3_extsearch_navigation baseframe">
    <h4 class="headline">
        [{oxmultilang ident="D3_EXTSEARCH_EXT_CMSHEADLINE"}]
    </h4>
    <div class="list">
[{**** Darstellung als Detaileinträge untereinander ****
       <ul style="margin: 2px;">
           [{foreach from=$oView->d3GetCMSList() item="oContent"}]
               [{assign var="TitleCharCount" value=$oContent->oxcontents__oxtitle->value|count_characters}]
               [{math equation="100-s" s=$TitleCharCount assign="iTextLength"}]
               <li>
                   <a href="[{$oContent->getLink()}]"><b>[{$oContent->oxcontents__oxtitle->value}]</b> - [{$oContent->oxcontents__oxcontent->value|strip_tags|oxtruncate:$iTextLength:"..."}]</a><br>
               </li>
           [{/foreach}]
       </ul>
****}]

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
<div class="d3_extsearch_navigation baseframe">
    <h4 class="headline">
        [{oxmultilang ident="D3_EXTSEARCH_EXT_PLUGINHEADLINE"}]
    </h4>
    <div class="list">
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

[{if $oView->getSearchViewListType() == 'linklist'}]
    [{if $aSemanticHits}]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{oxmultilang ident="D3_EXTSEARCH_EXT_YOUMEAN"}]
            </h4>
            <div class="list">
            [{assign var="counter" value="1"}]
                <table style="width: 100%;">
                [{foreach from=$aSemanticHits item="sSemantic"}]
                    [{if $counter == "1"}]
                        <tr>
                    [{/if}]
                            <td style="width: 33%;">
                                <a class="list_link" href="[{$sSemantic->sLink}]" onclick="[{*d3_extsearch_popup.popup.load();*}]">
                                    [{$sSemantic->sWord}]
                                </a>
                            </td>
                    [{if $counter >= "3"}]
                        </tr>
                        [{assign var="counter" value="1"}]
                    [{else}]
                        [{math equation="c+1" c=$counter assign="counter"}]
                    [{/if}]
                [{/foreach}]
                </table>
            </div>
        </div>
    [{/if}]

    [{if $oView->d3GetCategoryList() || $sSelectedCatId}]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{oxmultilang ident="D3_EXTSEARCH_EXT_HITSINCAT"}] [{if $sSelectedCat}]"[{$sSelectedCat}]"[{else}][{oxmultilang ident="D3_EXTSEARCH_EXT_THISCAT"}][{/if}]
            </h4>
            <div class="list">
               [{if $sSelectedCatId}]
                  <div class="buttonframe">
                      <a class="button" onclick="[{*d3_extsearch_popup.popup.load();*}]" href="[{$oView->generatePageNavigationUrl()|replace:$sSelectedCatId:''}]">
                          [{oxmultilang ident="D3_EXTSEARCH_EXT_ALLCATHITS"}]
                      </a>
                  </div>
               [{elseif $oView->d3GetCategoryList()}]

                    [{foreach from=$oView->d3GetCategoryList() name=search item=category}]
                        <div class="item">
                            <a href="[{ oxgetseourl ident=$oView->generatePageNavigationUrl()}]&searchcnid=[{$category->oxcategories__oxid->value}]&isextsearch=true" [{if $oView->noIndex() }] rel="nofollow"[{/if}] onclick="[{*d3_extsearch_popup.popup.load();*}]">[{$category->oxcategories__oxtitle->value}][{if $category->oxcategories__counter->value}] ([{$category->oxcategories__counter->value}])[{/if}]</a>
                        </div>
                    [{/foreach}]

                    [{if $limitedCatSearch}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_categories=1" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWALL"}]</a></div>
                    [{elseif $limitedCatButton}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_categories=0" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWLESS"}]</a></div>
                    [{/if}]

                    <div class="clearitem"></div>
                [{/if}]
            </div>
        </div>
    [{/if}]

    [{if $oView->d3GetVendorList() || $sSelectedVendorId}]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{if $sSelectedVendor}][{oxmultilang ident="D3_EXTSEARCH_EXT_HITSINVENDOR"}] "[{$sSelectedVendor}]"[{else}][{oxmultilang ident="D3_EXTSEARCH_EXT_THISVENDORS"}][{/if}]
            </h4>
            <div class="list">
               [{if $sSelectedVendorId}]
                  <div class="buttonframe">
                      <a class="button" onclick="[{*d3_extsearch_popup.popup.load();*}]" href="[{$oView->generatePageNavigationUrl()|replace:$sSelectedVendorId:''}]">
                          [{oxmultilang ident="D3_EXTSEARCH_EXT_ALLVENDORHITS"}]
                      </a>
                  </div>
               [{elseif $oView->d3GetVendorList()}]

                    [{foreach from=$oView->d3GetVendorList() name=search item=vendor}]
                        <div class="item">
                            <a href="[{ oxgetseourl ident=$oView->generatePageNavigationUrl()}]&searchvendor=[{$vendor->oxvendor__oxid->value}]&isextsearch=true" " [{if $oView->noIndex() }] rel="nofollow"[{/if}] onclick="[{*d3_extsearch_popup.popup.load();*}]">[{$vendor->oxvendor__oxtitle->value}] ([{$vendor->oxvendor__counter->value}])</a>
                        </div>
                    [{/foreach}]

                    [{if $limitedVendorSearch}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_vendors=1" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWALL"}]</a></div>
                    [{elseif $limitedVendorButton}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_vendors=0" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWLESS"}]</a></div>
                    [{/if}]

                    <div class="clearitem"></div>
                [{/if}]
            </div>
        </div>
    [{/if}]

    [{if $oView->d3GetManufacturerList() || $sSelectedManufacturerId}]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{if $sSelectedManufacturer}][{oxmultilang ident="D3_EXTSEARCH_EXT_HITSINMANUFACTURER"}] "[{$sSelectedManufacturer}]"[{else}][{oxmultilang ident="D3_EXTSEARCH_EXT_THISMANUFACTURERS"}][{/if}]
            </h4>
            <div class="list">
               [{if $sSelectedManufacturerId}]
                  <div class="buttonframe">
                      <a class="button" onclick="[{*d3_extsearch_popup.popup.load();*}]" href="[{$oView->generatePageNavigationUrl()|replace:$sSelectedManufacturerId:''}]">
                          [{oxmultilang ident="D3_EXTSEARCH_EXT_ALLMANUFACTURERHITS"}]
                      </a>
                  </div>
               [{elseif $oView->d3GetManufacturerList()}]

                    [{foreach from=$oView->d3GetManufacturerList() name=search item=manufacturer}]
                        <div class="item">
                            <a href="[{ oxgetseourl ident=$oView->generatePageNavigationUrl()}]&searchmanufacturer=[{$manufacturer->oxmanufacturers__oxid->value}]&isextsearch=true" " [{if $oView->noIndex() }] rel="nofollow"[{/if}] onclick="[{*d3_extsearch_popup.popup.load();*}]">[{$manufacturer->oxmanufacturers__oxtitle->value}] ([{$manufacturer->oxmanufacturers__counter->value}])</a>
                        </div>
                    [{/foreach}]

                    [{if $limitedManufacturerSearch}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_manufacturers=1" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWALL"}]</a></div>
                    [{elseif $limitedManufacturerButton}]
                        <div class="clearitem"></div>
                        <div class="buttonframe"><a class="button" href="[{$oView->generatePageNavigationUrl()}]&showall_manufacturers=0" onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_SHOWLESS"}]</a></div>
                    [{/if}]

                    <div class="clearitem"></div>
                [{/if}]
            </div>
        </div>
    [{/if}]

    [{if $oView->d3GetAttributeList()}]
        [{assign var="aNavParams" value=$oView->getNavigationParams()}]
        [{foreach from=$oView->d3GetAttributeList() name=search key=key item=oAttribute}]
            [{assign var="sKeySearch" value="d3searchattrib["|cat:$key|cat:"]"}]
            <div class="d3_extsearch_navigation baseframe">
                <h4 class="headline">
                    [{$oAttribute->title}]
                </h4>
                <div class="list">
                    [{if $aNavParams.$sKeySearch}]
                        <div class="buttonframe">
                          <a class="button" onclick="[{*d3_extsearch_popup.popup.load();*}]" href="[{$oView->generatePageNavigationUrl()|replace:$aNavParams.$sKeySearch:''}]">
                              [{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSDESELECT1"}] [{$oAttribute->title}] &quot;[{$aNavParams.$sKeySearch}]&quot; [{oxmultilang ident="D3_EXTSEARCH_EXT_ATTRIBSDESELECT2"}]
                          </a>
                        </div>
                    [{elseif $oAttribute->_aList}]
                        [{foreach from=$oAttribute->_aList name=attrvalues key=valuekey item=oAttrValue}]
                            <div class="item">
                                <a href="[{ oxgetseourl ident=$oView->generatePageNavigationUrl()}]&d3searchattrib[[{$key}]]=[{$oAttrValue->rawvalue}]&isextsearch=true" " [{if $oView->noIndex() }] rel="nofollow"[{/if}] onclick="d3_extsearch_popup.popup.load();">[{$oAttrValue->value}] [{if $oAttrValue->count}]([{$oAttrValue->count}])[{/if}]</a>
                            </div>
                        [{/foreach}]
                        <div class="clearitem"></div>
                    [{/if}]
                </div>
            </div>
        [{/foreach}]
    [{/if}]

    [{if $oView->d3getPriceSteps() || $sSelectedPriceStep}]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{oxmultilang ident="D3_EXTSEARCH_EXT_PRICECATS"}]
            </h4>
            <div class="list">
                [{if $sSelectedPriceStep}]
                    <div class="buttonframe">
                        <a class="button" onclick="[{*d3_extsearch_popup.popup.load();*}]" href="[{$oView->generatePageNavigationUrl()|replace:$sSelectedPriceStep:''}]">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_DESELECTPRICE"}]
                        </a>
                    </div>
                [{elseif $oView->d3getPriceSteps()}]
                    [{foreach from=$oView->d3getPriceSteps() name=search item=price}]
                        <div class="item">
                            <a href="[{ oxgetseourl ident=$oView->generatePageNavigationUrl()}]&priceselector=[{$price->addParam}]&isextsearch=true" " [{if $oView->noIndex() }] rel="nofollow"[{/if}] onclick="[{*d3_extsearch_popup.popup.load();*}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_PRICEFROM"}] <b>[{$price->iFMin}] [{ $currency->sign}]</b> [{oxmultilang ident="D3_EXTSEARCH_EXT_PRICETO"}] <b>[{$price->iFMax}] [{ $currency->sign}]</b>[{if $price->iCount != ''}] ([{$price->iCount}])[{/if}]</a>
                        </div>
                    [{/foreach}]

                    <div class="clearitem"></div>
                [{/if}]
            </div>
        </div>
   [{/if}]

[{else}]

    [{if $oView->d3HasjQuerySlider()}]
        [{include file="widget/d3extsearch/d3_ext_search_slider.tpl"}]
    [{/if}]

[{*** requires "show, if 1 hit" ***}]

    [{if $aSemanticHits || $oView->d3getCategoryList() ||
         $sSelectedCatId || $oView->d3getVendorList() ||
         $sSelectedVendorId || $oView->d3getManufacturerList() ||
         $sSelectedManufacturerId || $oView->d3getPriceSteps() ||
         $oView->d3GetAttributeList()
    }]
        <div class="d3_extsearch_navigation baseframe">
            <h4 class="headline">
                [{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHBOX"}]
            </h4>
            <div class="list">

                <form action="[{ $oViewConf->getSelfActionLink() }]" method="post" id="d3searchfilterform">
                    [{ $oViewConf->getHiddenSid() }]
                    <input type="hidden" name="cl" value="search">
                    <input type="hidden" name="searchparam" value="[{$oView->getSearchParamForHtml()}]">
                    <input type="hidden" name="fnc" value="">
                    <input type="hidden" name="isextsearch" value="true">
                    [{foreach from=$oView->getNavigationParams() key="keyname" item="value"}]
                        [{if $keyname != 'searchcnid' && $keyname != 'searchvendor' && $keyname != 'searchmanufacturer'}]
                            <input type="hidden" name="[{$keyname}]" value="[{$value}]">
                        [{/if}]
                    [{/foreach}]

                    [{if $aSemanticHits}]
                        <div class="item">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_YOUMEAN"}]<br>
                            <SELECT name="semanticlist" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
                                <OPTION value="" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSECAT"}]</OPTION>
                                [{foreach from=$aSemanticHits item="sSemantic"}]
                                    <OPTION value="[{$sSemantic->sLink}]">[{$sSemantic->sWord}]</OPTION>
                                [{/foreach}]
                            </SELECT>
                        </div>
                    [{/if}]

                    [{if $oView->d3getCategoryList() || $sSelectedCatId}]
                        <div class="item">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_CATEGORIES"}]<br>
                            <SELECT name="searchcnid" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
                                [{if $sSelectedCatId}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINCATEGORIES"}]</OPTION>
                                    [{*<OPTION selected>[{$sSelectedCat}]</OPTION>*}]
                                [{else}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSECAT"}]</OPTION>
                                [{/if}]
                                [{foreach from=$oView->d3getCategoryList() item="category"}]
                                    <OPTION value="[{$category->oxcategories__oxid->value}]" [{if $sSelectedCatId == $category->oxcategories__oxid->value}] selected[{/if}]>[{$category->oxcategories__oxtitle->rawValue}][{if $category->oxcategories__counter->value}] ([{$category->oxcategories__counter->value}])[{/if}]</OPTION>
                                [{/foreach}]
                            </SELECT>
                        </div>
                    [{/if}]
                    [{if $oView->d3getVendorList() || $sSelectedVendorId}]
                        <div class="item">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_VENDORS"}]<br>
                            <SELECT name="searchvendor" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
                                [{if $sSelectedVendorId}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINVENDORS"}]</OPTION>
                                    [{*<OPTION selected>[{$sSelectedVendor}]</OPTION>*}]
                                [{else}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEVENDOR"}]</OPTION>
                                [{/if}]
                                [{foreach from=$oView->d3getVendorList() item="vendor"}]
                                    <OPTION value="[{$vendor->oxvendor__oxid->value}]" [{if $sSelectedVendorId == $vendor->oxvendor__oxid->value}] selected[{/if}]>[{$vendor->oxvendor__oxtitle->rawValue}] ([{$vendor->oxvendor__counter->value}])</OPTION>
                                [{/foreach}]
                            </SELECT>
                        </div>
                    [{/if}]
                    [{if $oView->d3getManufacturerList() || $sSelectedManufacturerId}]
                        <div class="item">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_MANUFACTURERS"}]<br>
                            <SELECT name="searchmanufacturer" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
                                [{if $sSelectedManufacturerId}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_SEARCHINMANUFACTURERS"}]</OPTION>
                                    [{*<OPTION selected>[{$sSelectedManufacturer}]</OPTION>*}]
                                [{else}]
                                    <OPTION class="desc" value="">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEMANUFACTURER"}]</OPTION>
                                [{/if}]
                                [{foreach from=$oView->d3getManufacturerList() item="manufacturer"}]
                                    <OPTION value="[{$manufacturer->oxmanufacturers__oxid->value}]" [{if $sSelectedManufacturerId == $manufacturer->oxmanufacturers__oxid->value}] selected[{/if}]>[{$manufacturer->oxmanufacturers__oxtitle->rawValue}] ([{$manufacturer->oxmanufacturers__counter->value}])</OPTION>
                                [{/foreach}]
                            </SELECT>
                        </div>
                    [{/if}]

                    [{if $oView->d3GetAttributeList()}]
                        [{foreach from=$oView->d3GetAttributeList() name=search key=key item=oAttribute}]
                            <div class="item">
                                [{$oAttribute->title}]:<br>
                                <SELECT name="d3searchattrib[[{$key}]]" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
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
                        <div class="item">
                            [{oxmultilang ident="D3_EXTSEARCH_EXT_PRICECATS"}]:<br>
                            [{if $oView->d3HasjQuerySlider()}]

[{*** put it in php !!! ***}]
                                [{assign var="aPriceSteps" value=$oView->d3getPriceSteps()}]
                                [{assign var="aPriceLimits" value=$oView->d3getPriceLimits()}]

                                [{if $submpriceselectors.min}][{assign var="inpMinValue" value=$submpriceselectors.min}][{else}][{assign var="inpMinValue" value=$aPriceSteps.0}][{/if}]
                                [{if $submpriceselectors.max}][{assign var="inpMaxValue" value=$submpriceselectors.max}][{else}][{assign var="inpMaxValue" value=$aPriceSteps.1}][{/if}]

                                <div style="text-align: center; display: none;" id="d3extsearchpriceinfo"><span id="d3extsearch_priceinfomin">[{math equation='p/100' p=$aPriceSteps.0 format="%.2f"}]</span> [{$currency->sign}] - <span id="d3extsearch_priceinfomax">[{math equation='p/100' p=$aPriceSteps.1 format="%.2f"}]</span> [{$currency->sign}]</div>
                                <div style="display: block;" id="d3extsearchpricefields">
                                    <input size="10" maxlength="20" type="text" name="priceselector[min]" value="[{math equation='p/100' p=$inpMinValue format="%.2f"}]" id="d3extsearch_pricefieldmin" style="width: 50px;"> [{$currency->sign}] -
                                    <input size="10" maxlength="20" type="text" name="priceselector[max]" value="[{math equation='p/100' p=$inpMaxValue format="%.2f"}]" id="d3extsearch_pricefieldmax" style="width: 50px;"> [{$currency->sign}]
                                </div>
                                <script type="text/javascript">document.getElementById('d3extsearchpriceinfo').style.display = 'block'; document.getElementById('d3extsearchpricefields').style.display = 'none';</script>
                                <div id="d3extsearch_priceslider" class="ui-slider">
                                    <div class="ui-slider-handle" id="d3extsearch_priceslider1"></div>
                                    <div class="ui-slider-handle" id="d3extsearch_priceslider2" style="left:300px;"></div>
                                </div>
                            [{else}]
                                <SELECT name="priceselector" onchange="[{*d3_extsearch_popup.popup.load();*}] document.getElementById('d3searchfilterform').submit();">
                                    <OPTION value="[{$sSelectedPriceStep}]" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_CHOOSEPRICE"}]</OPTION>
                                [{foreach from=$oView->d3getPriceSteps() item="price"}]
                                    <OPTION value="[{$price->addParam}]">[{oxmultilang ident="D3_EXTSEARCH_EXT_PRICEFROM"}] [{$price->iFMin}] [{ $currency->sign}] [{oxmultilang ident="D3_EXTSEARCH_EXT_PRICETO"}] [{$price->iFMax}] [{ $currency->sign}][{if $price->iCount != ''}] ([{$price->iCount}])[{/if}]</OPTION>
                                [{/foreach}]
                                [{if $sSelectedPriceStep}]
                                    <OPTION value="" class="desc">[{oxmultilang ident="D3_EXTSEARCH_EXT_DESELECTPRICE"}]</OPTION>
                                [{/if}]
                               </SELECT>
                            [{/if}]
                        </div>
                    [{/if}]

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

[{/if}]

[{if $oView->hasFilterParams()}]
    <div class="d3_extsearch_navigation baseframe fit">
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fdesc="D3_EXTSEARCH_EXT_ALL"|oxmultilangassign d3fparam="all"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="A"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="B"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="C"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="D"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="E"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="F"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="G"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="H"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="I"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="J"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="K"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="L"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="M"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="N"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="O"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="P"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="Q"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="R"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="S"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="T"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="U"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="V"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="W"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="X"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="Y"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="Z"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="1"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="2"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="3"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="4"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="5"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="6"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="7"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="8"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="9"}]
        [{include file="widget/d3extsearch/d3_ext_search_filter.tpl" d3fparam="0"}]
    </div>
[{/if}]