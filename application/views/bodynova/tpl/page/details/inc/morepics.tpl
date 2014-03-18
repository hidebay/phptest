[{if $oView->morePics()}]
<div class="otherPictures" id="morePicsContainer">
    <div class="shadowLine"></div>
    <ul class="clear">
    [{oxscript add="var aMorePic=new Array();"}]
    [{foreach from=$oView->getIcons() key=iPicNr item=oArtIcon name=sMorePics}]
        <li>
            <a id="morePics_[{$smarty.foreach.sMorePics.iteration}]" rel="useZoom: 'zoom1', smallImage: '[{$oPictureProduct->getPictureUrl($iPicNr)}]' " class="cloud-zoom-gallery" href="[{$oPictureProduct->getMasterZoomPictureUrl($iPicNr)}]">
                <span class="marker"></span>
                <span class="artIcon"><img src="[{$oPictureProduct->getIconUrl($iPicNr)}]" alt="[{$oPictureProduct->oxarticles__oxtitle->value|strip_tags}] [{$oPictureProduct->oxarticles__oxvarselect->value|strip_tags}]"></span>
            </a>
        </li>
    [{/foreach}]
    </ul>
    </div>
[{/if}]
[{oxscript include="js/widgets/oxmorepictures.js" priority=10}]
[{oxscript add="$('#morePicsContainer').oxMorePictures();"}]