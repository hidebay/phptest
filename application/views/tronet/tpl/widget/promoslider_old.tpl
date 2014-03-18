[{assign var=oBanners value=$oView->getBanners() }]
[{assign var="currency" value=$oView->getActCurrency()}]
[{if $oBanners}]
    [{oxstyle include="css/libs/anythingslider.css"}]
    [{oxscript include="js/libs/anythingslider.js"}]
    [{oxscript include="js/jquery.easing.1.2.js"}]
    [{oxscript include="js/widgets/oxslider.js" priority=10 }]
    [{foreach from=$oBanners item=oBanner }]
    	[{if first}]
    		[{assign var=sBannerOptionHeight value=$oBanner->getBannerHeight()}]
    		[{assign var=sBannerOptionEffect value=$oBanner->getBannerEffect()}]
    	[{/if}]
   	[{/foreach}]
    
    [{assign var=sBannerOption value="easing:'"|cat:$sBannerOptionEffect|cat:"',height:"|cat:$sBannerOptionHeight}]
    
	[{oxscript add="$( '#promotionSlider' ).oxSlider({$sBannerOption});"}]

    [{*}]
    <img src="[{$oViewConf->getImageUrl('promo-shadowleft.png')}]" height="220" width="7" class="promoShadow" alt="">
    <img src="[{$oViewConf->getImageUrl('promo-shadowright.png')}]" height="220" width="7" class="promoShadow shadowRight" alt="">
    [{*}]
    <ul id="promotionSlider">
        [{foreach from=$oBanners item=oBanner }]
        [{assign var=oArticle value=$oBanner->getBannerArticle() }]
        <li>
        	<div class="[{$oBanner->getBannerId()}]">
            [{assign var=sBannerLink value=$oBanner->getBannerLink() }]
            [{if $sBannerLink }]
            <a href="[{ $sBannerLink }]">
            [{/if}]
            [{if $oArticle }]
            <span class="promoBox">
                <strong class="promoPrice">[{ $oArticle->getFPrice() }] [{ $currency->sign}]</strong>
                <strong class="promoTitle">[{ $oArticle->oxarticles__oxtitle->value }]</strong>
            </span>
            [{/if }]
            [{assign var=sBannerPictureUrl value=$oBanner->getBannerPictureUrl() }]
            [{if $sBannerPictureUrl }]
                [{if $oBanner->isFlash() }]
                    <object type="application/x-shockwave-flash" data="[{ $sBannerPictureUrl }]" title="Flashbanner" width="738" height="[{$sBannerOptionHeight}]">
                        <param name="movie" value="[{ $sBannerPictureUrl }]" />
                        <param name="wmode" value="opaque" />
                        <param name="bgcolor" value="#FFFFFF" />
                        <a href="[{ $sBannerPictureUrl }]" ><img src="" width="436" height="394" border="0" alt="" title="" /></a>
                    </object>
                [{else}]
                    <img src="[{ $sBannerPictureUrl }]" height="219" width="738" alt="[{$oBanner->oxactions__oxtitle->value}]">
                [{/if}]
            [{/if }]
            [{if $sBannerLink }]
            </a>
            [{/if}]
            </div>
        </li>
        [{/foreach }]
    </ul>
	    
[{/if }]