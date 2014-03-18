<div [{if $test_Cntr}]id="test_cntr_[{$test_Cntr}]_[{$product->oxarticles__oxartnum->value}]"[{/if}] class="productlist hproduct[{if $head}] head[{/if}] [{$size|default:''}] [{$class|default:''}]">
    [{if $showMainLink}]
        [{assign var='_productLink' value=$product->getMainLink()}]
    [{else}]
        [{assign var='_productLink' value=$product->getLink()}]
    [{/if}]

    [{if $head}]
        <strong id="test_smallHeader[{if $testHeader}]_[{$testHeader}][{/if}]" class="h4 [{$size|default:''}]">
            [{if $head_link}]<a id="test_headerTitleLink_[{$testid}]" href="[{$head_link}]"[{if $oView->noIndex() }] rel="nofollow"[{/if}]>[{/if}]
            [{$head}]
            [{if $head_link}]</a>[{/if}]
            [{if $head_desc}] <small id="test_headerDesc_[{$testid}]">[{ "$head_desc"|strip_tags}]</small>[{/if}]
        </strong>
    [{/if}]

    <a id="test_pic_[{$testid}]" href="[{ $_productLink }]" class="picture url" rel="product[{if $oView->noIndex() }] nofollow[{/if}]">
      <img class="photo" src="[{if $size=='big'}][{$product->getPictureUrl(1) }][{elseif $size=='thinest'}][{$product->getIconUrl() }][{else}][{ $product->getThumbnailUrl() }][{/if}]" alt="[{ $product->oxarticles__oxtitle->value|strip_tags }] [{ $product->oxarticles__oxvarselect->value|default:'' }]">
    </a>

    <strong class="h3">
        <a id="test_title_[{$testid}]" class="fn" href="[{ $_productLink }]" rel="product[{if $oView->noIndex() }] nofollow[{/if}]">[{ d3_extsearch_highlight text=$product->oxarticles__oxtitle->value}] [{ d3_extsearch_highlight text=$product->oxarticles__oxvarselect->value}]</a>
        [{if $product->blIsSimilar}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_SIMILAR"}]</span>[{/if}]
        [{if $product->isD3CatHit}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_CATHIT"}]</span>[{/if}]
        <br>
        <tt class="identifier" id="test_no_[{$testid}]">
            [{if $product->oxarticles__oxweight->value }]
            <span class="type" title="weight">[{ oxmultilang ident="INC_PRODUCTITEM_ARTWEIGHT" }]</span>
            <span class="value">[{ $product->oxarticles__oxweight->value }] [{ oxmultilang ident="INC_PRODUCTITEM_ARTWEIGHT2" }]</span>
            [{else}]
            <span class="type" title="sku">[{ oxmultilang ident="INC_PRODUCTITEM_ARTNOMBER2" }]</span>
            <span class="value">[{ d3_extsearch_highlight text=$product->oxarticles__oxartnum->value }]</span>
            [{/if}]
        </tt>

        [{if $size=='thin' || $size=='thinest'}]
        <span class="flag [{if $product->getStockStatus() == -1}]red[{elseif $product->getStockStatus() == 1}]orange[{elseif $product->getStockStatus() == 0}]green[{/if}]">&nbsp;</span>
        [{/if}]
    </strong>

    [{if $recommid }]
      <div id="test_text_[{$testid}]" class="desc">[{ d3_extsearch_highlight text=$product->text }]</div>
    [{/if}]
    [{oxhasrights ident="SHOWSHORTDESCRIPTION"}]
      [{if $size=='big' || $size=='thin'}]
        <div id="test_shortDesc_[{$testid}]" class="desc description">[{ d3_extsearch_highlight text=$product->oxarticles__oxshortdesc->value }]</div>
      [{/if}]
    [{/oxhasrights}]

    <div [{if $test_Cntr}]id="test_cntr_[{$test_Cntr}]"[{/if}] class="actions">
        <a id="test_details_[{$testid}]" href="[{ $_productLink }]"[{if $oView->noIndex() }] rel="nofollow"[{/if}]>[{ oxmultilang ident="INC_PRODUCTITEM_MOREINFO2" }]</a>
        [{if $isfiltering && $oViewConf->getShowCompareList()}]
            [{oxid_include_dynamic file="dyn/compare_links.tpl" testid="_`$testid`" type="compare" aid=$product->oxarticles__oxid->value anid=$altproduct in_list=$product->blIsOnComparisonList page=$pageNavigation->actPage-1 text_to_id="INC_PRODUCTITEM_COMPARE2" text_from_id="INC_PRODUCTITEM_REMOVEFROMCOMPARELIST2"}]
        [{/if}]
    </div>

    <form name="tobasket.[{$testid}]" action="[{ $oViewConf->getSelfActionLink() }]" method="post">
    [{ $oViewConf->getHiddenSid() }]
    [{ $oViewConf->getNavFormParams() }]
    <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
    <input type="hidden" name="fnc" value="tobasket">
    <input type="hidden" name="anid" value="[{ $product->oxarticles__oxnid->value }]">
    <input type="hidden" name="aid" value="[{ $product->oxarticles__oxnid->value }]">
    <input type="hidden" name="am" value="1">

    [{*capture name=product_price*}]
    [{oxhasrights ident="SHOWARTICLEPRICE"}]
        <div id="test_price_[{$testid}]" class="cost">
            [{if $product->getFTPrice() && $size=='big' }]
                <b class="old">[{ oxmultilang ident="DETAILS_REDUCEDFROM" }] <del>[{ $product->getFTPrice()}] [{ $currency->sign}]</del></b>
                <span class="desc">[{ oxmultilang ident="DETAILS_REDUCEDTEXT" }]</span><br>
                <sub class="only">[{ oxmultilang ident="DETAILS_NOWONLY" }]</sub>
            [{/if}]
            [{if $product->getFPrice()}]
              <big class="price">[{ $product->getFPrice() }] [{ $currency->sign}]</big><sup class="dinfo"><a href="#delivery_link" rel="nofollow">*</a></sup>
            [{else}]
              <big>&nbsp;</big>
            [{/if}]
        </div>
    [{/oxhasrights}]
    [{*/capture*}]

    [{oxhasrights ident="TOBASKET"}]
        [{ if !$product->isNotBuyable() && !$product->hasMdVariants() }]

        [{if $size=='thin' || $size=='thinest'}]
        <div class="amount">
            <label>[{ oxmultilang ident="DETAILS_QUANTITY" }]</label><input id="test_am_[{$testid}]" type="text" name="am" value="1" size="3">
        </div>
        [{/if}]
        <div class="tocart"><input id="test_toBasket_[{$testid}]" type="submit" value="[{if $size=='small'}][{oxmultilang ident="INC_PRODUCTITEM_ADDTOCARD3" }][{else}][{oxmultilang ident="INC_PRODUCTITEM_ADDTOCARD2"}][{/if}]" onclick="oxid.popup.load();"></div>
        [{/if}]
    [{/oxhasrights}]

    [{if $product->hasMdVariants() }]
    <span class="btn moreinfo">
        <a id="test_variantMoreInfo_[{$testid}]" class="" href="[{ $_productLink }]" onclick="oxid.mdVariants.getMdVariantUrl('mdVariant_[{$testid}]'); return false;">[{ oxmultilang ident="INC_PRODUCT_VARIANTS_MOREINFO" }]</a>
    </span>
    [{/if}]

    </form>

    [{if $removeFunction && (($owishid && ($owishid==$oxcmp_user->oxuser__oxid->value)) || (($wishid==$oxcmp_user->oxuser__oxid->value))) }]
    <form action="[{ $oViewConf->getSelfActionLink() }]" method="post">
      <div>
          [{ $oViewConf->getHiddenSid() }]
          <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
          <input type="hidden" name="fnc" value="[{$removeFunction}]">
          <input type="hidden" name="aid" value="[{$product->oxarticles__oxid->value}]">
          <input type="hidden" name="am" value="0">
          <input type="hidden" name="itmid" value="[{$product->getItemKey()}]">
      </div>
      <div class="fromlist">
          <input id="test_remove_[{$testid}]" type="submit" value="[{ oxmultilang ident="INC_NOTICE_PRODUCT_ITEM_REMOVE" }]">
      </div>
    </form>
    [{/if}]

    [{if $removeFunction && $recommid }]
    <form action="[{ $oViewConf->getSelfActionLink() }]" method="post">
      <div>
          [{ $oViewConf->getHiddenSid() }]
          <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
          <input type="hidden" name="fnc" value="[{$removeFunction}]">
          <input type="hidden" name="aid" value="[{$product->oxarticles__oxid->value}]">
          <input type="hidden" name="recommid" value="[{$recommid}]">
      </div>
      <div class="fromlist">
          <input id="test_remove_[{$testid}]" type="submit" value="[{ oxmultilang ident="INC_RECOMM_PRODUCT_ITEM_REMOVE" }]">
      </div>
    </form>
    [{/if}]

</div>
