<h3 class="sectionHead">[{ oxmultilang ident="TRO_MANUFACTURERS" }]</h3>
[{capture name="slides"}]
    [{foreach from=$oView->getManufacturerForSlider() item=oManufacturer}]
        [{if $oManufacturer->oxmanufacturers__oxicon->value }]
        [{counter assign="slideCount"}]
            <li>
                [{*}]<a href="[{ $oManufacturer->getLink() }]" class="viewAllHover">
                    <span>[{ oxmultilang ident="WIDGET_MANUFACTURERS_SLIDER_VIEWALL" }]</span>
                </a>
                <a class="sliderHover" href="[{ $oManufacturer->getLink() }]"></a>[{*}]
                <a href="[{ $oManufacturer->getLink() }]"><img src="[{ $oManufacturer->getIconUrl() }]" alt="[{ $oManufacturer->oxmanufacturers__oxtitle->value }]"></a>
            </li>
        [{/if}]
    [{/foreach}]
[{/capture}]

    [{*oxscript include="js/libs/jcarousellite.js"}]
    [{oxscript include="js/widgets/oxmanufacturerslider.js" priority=10 }]
    [{oxscript add="$( '#manufacturerSlider' ).oxManufacturerSlider();"*}]
    <div class="itemSlider">
        [{if $slideCount > 20 && false }]
        <div class="leftHolder">            
            <div class="titleBlock slideNav"><strong>[{ oxmultilang ident="WIDGET_MANUFACTURERS_SLIDER_OURBRANDS" }]</strong></div>
            <a class="prevItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&laquo;</span><span class="slideBg"></span></a>
        </div>
        <a class="nextItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&raquo;</span><span class="slideBg"></span></a>
        [{/if}]
        <div id="manufacturerSlider">
            <ul>
                [{$smarty.capture.slides}]
            </ul>
        </div>
    </div>  
