[{if $oView->showZoomPics()}]
    [{assign var="aZoomPics" value=$oView->getZoomPics()}]
    [{assign var="iZoomPic" value=$oView->getActZoomPic()}]
    <div id="zoomModal" class="popupBox corners FXgradGreyLight glowShadow">
        <img src="[{$oViewConf->getImageUrl('x.png')}]" alt="" class="closePop">
        <div class="zoomHead">
            [{oxmultilang ident="PAGE_DETAILS_ZOOMPOP"}]
            <a href="#zoom"><span></span></a>
        </div>
        <div class="zoomed">
            <img src="[{$aZoomPics[$iZoomPic].file}]" alt="[{$oPictureProduct->oxarticles__oxtitle->value|strip_tags}] [{$oPictureProduct->oxarticles__oxvarselect->value|default:''}]" id="zoomImg">
        </div>
        [{if $aZoomPics|@count > 1}]
        [{assign var="i" value=1}]
        <div class="otherPictures" id="moreZoomPicsContainer">
          [{*<a class="pageleft">&lt;</a>*}]
          [{foreach from=$aZoomPics key=iPicNr item=_zoomPic}]
            [{assign var="_sZoomPic" value=$aZoomPics[$iPicNr].file}]
            <a class="numlink[{if $iPicNr == 1}] selected[{/if}]" href="[{$_sZoomPic}]">[{$_zoomPic.id}]</a>
            [{assign var="_sZoomPic" value=$aZoomPics[$iPicNr].file}]
          [{/foreach}]
          [{*<a class="pageright">&gt;</a>*}]
        </div>
        [{/if}]
    </div>
    [{oxscript include="js/widgets/oxzoompictures.js" priority=10}]
    [{oxscript add="$('#moreZoomPicsContainer').oxZoomPictures();"}]
[{/if}]