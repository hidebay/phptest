<div [{if $test_Cntr}]id="test_cntr_[{$test_Cntr}]_[{$product->oxarticles__oxartnum->value}]"[{/if}] class="product hproduct[{if $head}] head[{/if}] [{$size|default:''}] [{$class|default:''}]">

    <!-- Ueberschrift -->
    <div class="boxhead"><h1 id="test_catTitle">[{$product->oxarticles__oxtitle->value}] [{$product->oxarticles__oxvarselect->value}]</h1></div>

    <!-- Kurzbeschreibung -->
    <div id="test_product_shortdesc">[{ $product->oxarticles__oxshortdesc->value }]</div>

    <!-- mehr Bilder -->
    <div class="morepics">
    [{if $product->getIconUrl() }]
        [{assign var=i value=0}]
        
        [{assign var=aPics value=$product->getPictureGallery()}]
                
        [{foreach from=$aPics.Icons key=picnr item=ArtIcon name=MorePics}]
            [{ if $i < 6 }]
                <div class="pic"><a id="test_MorePics_[{$smarty.foreach.MorePics.iteration}]" rel="nofollow" href="[{ $product->getLink()|oxaddparams:"actpicid=`$picnr`" }]" onclick="oxid.image('product_img_','[{$product->getPictureUrl($picnr)}]');oxid.changeZoomlink('[{$oViewConf->getImageUrl()}]', '[{$product->getZoomPictureUrl($picnr)}]'); return false;"><img src="[{$ArtIcon}]" alt=""></a></div>
            [{/if}]
            [{assign var=i value=$i+1}]
        [{/foreach}]
    [{/if}]
    </div>

    <!-- Hauptbild -->
    <div class="productPicture">
      <img src="[{ $product->getPictureUrl(1) }]" id="product_img_" class="photo" alt="[{ $product->oxarticles__oxtitle->value|strip_tags }] [{ $product->oxarticles__oxvarselect->value|default:'' }]">

        <!-- Zoom Hauptbild -->
        <div class="zoom">                                
        [{if $aPics.ZoomPics }]
            [{assign var="aZoomPics" value=$aPics.ZoomPics }]
            [{assign var="iZoomPic" value=1 }]
            [{assign var="sZoomPopup" value="inc/popup_zoom.tpl" }]
            <span id="wrap_zoom_link"><a id="test_zoom" rel="nofollow" href="[{$product->getMoreDetailLink()}]" onmouseover="" onclick="oxid.image('zoom_img','[{$aZoomPics[$iZoomPic].file}]');oxid.popup.zoom();return false;"><img src="[{$oViewConf->getImageUrl()}]trans.gif" alt="" width="33" height="33"></a></span>
        [{/if}]
        </div>
    </div>

   [{if 1 != $noVariants }]
   <form name="tobasket.[{$testid}]" action="[{ $oViewConf->getSelfActionLink() }]" method="post">
   [{/if}]
        [{ $oViewConf->getHiddenSid() }]
        [{ $oViewConf->getNavFormParams() }]
        <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
        <input type="hidden" name="fnc" value="tobasket">
        <input type="hidden" name="anid" value="[{ $product->oxarticles__oxnid->value }]">
        <input type="hidden" name="aid" value="[{ $product->oxarticles__oxnid->value }]">
        <input type="hidden" name="am" value="1">
    
        [{oxhasrights ident="SHOWARTICLEPRICE"}]
            <div class="preis" style="right:7px;">
                <div class="artnum" style="font-size: 16px">[{ oxmultilang ident="INC_PRODUCTITEM_ARTNOMBER2" }] [{ $product->oxarticles__oxartnum->value }]</div>
                [{if $product->getFPrice() }]
                    <big class="price pricerange" id="test_product_price">[{ $product->getFPrice() }] [{ $currency->sign}]</big>
                [{/if}]
            </div>
        [{/oxhasrights}]
        
        [{oxhasrights ident="TOBASKET"}]
            [{ if !$product->isNotBuyable() && !$product->hasMdVariants() }]	
                <div class="warenkorb" style="bottom:-102px;right:7px;"><input id="test_toBasket_[{$testid}]" type="submit" value="[{oxmultilang ident="INC_PRODUCTITEM_ADDTOCARD2"}]" onclick="oxid.popup.load();"></div>
            [{/if}]
        [{/oxhasrights}]

   [{if 1 != $noVariants }]
    </form>
   [{/if}]

</div>
