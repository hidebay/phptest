[{if $oView->getVariantList() || $oView->drawParentUrl()}]
  
  <div style="display: none">

  [{foreach from=$oView->getVariantList() name=variants item=variant_product}]
    <div id=mdvariant_[{$variant_product->getId()}]>
      [{include file="inc/product2.tpl" product=$variant_product size="thinest" altproduct=$product->getId() isfiltering=false class=lastinlist testid="Variant_"|cat:$variant_product->oxarticles__oxid->value iteration=$smarty.foreach.variants.iteration}]
    </div>
  [{/foreach}]

    <div id=mdvariant_[{$product->getId()}]>
      [{include file="inc/product2.tpl" product=$product size="thinest" altproduct=$product->getId() isfiltering=false class=lastinlist testid="Variant_"|cat:$variant_product->oxarticles__oxid->value}]
    </div>
  </div>

  <div id="md_variant_box"> </div>

  <div class="amount"><label>[{ oxmultilang ident="DETAILS_QUANTITY" }]</label><br><input id="test_am_[{$testid}]" type="text" name="am" value="1" size="3" class="amount"></div>
  
  [{oxvariantselect value=$product->getMdVariants() separator=" " artid=$product->getId() parentVarName=$product->oxarticles__oxvarname->rawValue }]

  [{oxscript add="oxid.mdVariants.mdAttachAll();"}]
  [{oxscript add="oxid.mdVariants.showMdRealVariant();"}]

[{else}]

  <div id=mdvariant_[{$product->getId()}]>
      [{include file="inc/product2.tpl" product=$product size="thinest" altproduct=$product->getId() isfiltering=false class=lastinlist testid="Variant_"|cat:$variant_product->oxarticles__oxid->value noVariants=1 }]
  </div>

  <div class="amount"><label>[{ oxmultilang ident="DETAILS_QUANTITY" }]</label><br><input id="test_am_[{$testid}]" type="text" name="am" value="1" size="3" class="amount"></div>
  <div class="variants">&nbsp;</div>
[{/if}]