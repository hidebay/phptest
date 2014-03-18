<?php /* Smarty version 2.6.26, created on 2014-03-18 13:51:36
         compiled from widget/product/listitem_grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxhasrights', 'widget/product/listitem_grid.tpl', 14, false),array('modifier', 'default', 'widget/product/listitem_grid.tpl', 33, false),array('modifier', 'oxaddparams', 'widget/product/listitem_grid.tpl', 184, false),array('function', 'oxmultilang', 'widget/product/listitem_grid.tpl', 103, false),)), $this); ?>

    <?php if ($this->_tpl_vars['showMainLink']): ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getMainLink()); ?>
    <?php else: ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getLink()); ?>
    <?php endif; ?>
  <form name="tobasket<?php echo $this->_tpl_vars['testid']; ?>
" <?php if ($this->_tpl_vars['blShowToBasket']): ?>action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post"<?php else: ?>action="<?php echo $this->_tpl_vars['_productLink']; ?>
" method="get"<?php endif; ?>>
    <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="pgNr" value="<?php echo $this->_tpl_vars['oView']->getActPage(); ?>
">
    <?php if ($this->_tpl_vars['recommid']): ?>
        <input type="hidden" name="recommid" value="<?php echo $this->_tpl_vars['recommid']; ?>
">
    <?php endif; ?>
    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <?php if ($this->_tpl_vars['blShowToBasket']): ?>
            <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
            <?php if ($this->_tpl_vars['owishid']): ?>
                <input type="hidden" name="owishid" value="<?php echo $this->_tpl_vars['owishid']; ?>
">
            <?php endif; ?>
            <?php if ($this->_tpl_vars['toBasketFunction']): ?>
                <input type="hidden" name="fnc" value="<?php echo $this->_tpl_vars['toBasketFunction']; ?>
">
            <?php else: ?>
              <input type="hidden" name="fnc" value="tobasket">
            <?php endif; ?>
            <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['product']->oxarticles__oxid->value; ?>
">
            <?php if ($this->_tpl_vars['altproduct']): ?>
                <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['altproduct']; ?>
">
            <?php else: ?>
                <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['product']->oxarticles__oxnid->value; ?>
">
            <?php endif; ?>
            <input type="hidden" name="am" value="1">
        <?php endif; ?>
      <input type="hidden" id="varse<?php echo $this->_tpl_vars['testid']; ?>
" name="<?php echo ((is_array($_tmp=@$this->_tpl_vars['sFieldName'])) ? $this->_run_mod_handler('default', true, $_tmp, 'varselid') : smarty_modifier_default($_tmp, 'varselid')); ?>
[<?php echo $this->_tpl_vars['iKey']; ?>
]" value="">
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
  <div class="shortinfo">
    <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
    <?php $this->assign('blShowToBasket', true); ?>     <?php if ($this->_tpl_vars['blDisableToCart'] || $this->_tpl_vars['product']->isNotBuyable() || ( $this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections'] ) || $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariants()): ?>
        <?php $this->assign('blShowToBasket', false); ?>
    <?php endif; ?>
    <?php ob_start(); ?>
        
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php if ($this->_tpl_vars['product']->oxarticles__bodyshowprice == '1'): ?>
                    <?php $this->assign('tprice', $this->_tpl_vars['product']->getTPrice()); ?>
                    <?php $this->assign('price', $this->_tpl_vars['product']->getPrice()); ?>
                    <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                  
                    <?php $this->assign('strich', "strich.png"); ?>                    
                    <p class="priceOld">
                        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl(); ?>
strich.png" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
                                                <?php echo $this->_tpl_vars['product']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>

                    </p>
                    <?php endif; ?>
                    
                        <?php if ($this->_tpl_vars['product']->getFPrice()): ?>
                            <strong><span itemprop="price"><?php echo $this->_tpl_vars['product']->getFPrice(); ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>
 <meta itemprop="priceCurrency" content="<?php echo $this->_tpl_vars['currency']->name; ?>
">
                             *</strong>
                        <?php endif; ?>
                    
                    <?php if ($this->_tpl_vars['product']->getPricePerUnit()): ?>
                        <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                            <?php echo $this->_tpl_vars['product']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxunitname->value; ?>
 | <?php echo $this->_tpl_vars['product']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['product']->oxarticles__oxunitname->value; ?>

                        </span>
                                        <?php endif; ?>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        
    <?php $this->_smarty_vars['capture']['product_price'] = ob_get_contents(); ob_end_clean(); ?>
   
    <?php $this->assign('aVariantSelections', $this->_tpl_vars['product']->getVariantSelections(null,null,1)); ?> 
    <meta itemprop='productID' content='sku:<?php echo $this->_tpl_vars['product']->oxarticles__oxartnum->value; ?>
'>
    <a itemprop="url" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="titleBlock title fn" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
           <div class="gridPicture">
            <img itemprop="image" src="<?php echo $this->_tpl_vars['product']->getThumbnailUrl(); ?>
" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
        </div>
        <span itemprop="name">
                  </span> 
        <span class="shortdesc">
          <?php echo $this->_tpl_vars['product']->oxarticles__oxshortdesc->value; ?>

        </span>
    </a>
    
        <div class="priceBlock" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php echo $this->_smarty_vars['capture']['product_price']; ?>

                <span class="mwst"></span>
                <span class="artno"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_ARTNO'), $this);?>
: <?php echo $this->_tpl_vars['product']->oxarticles__oxartnum->value; ?>
</span>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
   
  </div>
  
  <div class="detailinfo">
    <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
    <?php if ($this->_tpl_vars['showMainLink']): ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getMainLink()); ?>
    <?php else: ?>
        <?php $this->assign('_productLink', $this->_tpl_vars['product']->getLink()); ?>
    <?php endif; ?>
    <?php $this->assign('blShowToBasket', true); ?>     <?php if ($this->_tpl_vars['blDisableToCart'] || $this->_tpl_vars['product']->isNotBuyable() || ( $this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections'] ) || $this->_tpl_vars['product']->hasMdVariants() || ( $this->_tpl_vars['oViewConf']->showSelectListsInList() && $this->_tpl_vars['product']->getSelections(1) ) || $this->_tpl_vars['product']->getVariants()): ?>
        <?php $this->assign('blShowToBasket', false); ?>
    <?php endif; ?>
    <?php ob_start(); ?>
        
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php if ($this->_tpl_vars['product']->oxarticles__troshowprice == '1'): ?>
                    <?php $this->assign('tprice', $this->_tpl_vars['product']->getTPrice()); ?>
                    <?php $this->assign('price', $this->_tpl_vars['product']->getPrice()); ?>
                    <?php if ($this->_tpl_vars['tprice'] && $this->_tpl_vars['tprice']->getBruttoPrice() > $this->_tpl_vars['price']->getBruttoPrice()): ?>
                                        <p class="priceOld">
                        <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl(); ?>
strich.png" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
                                                <?php echo $this->_tpl_vars['product']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>

                    </p>
                    <?php endif; ?>
                    
                        <?php if ($this->_tpl_vars['product']->getFPrice()): ?>
                            <strong><span itemprop="price"><?php echo $this->_tpl_vars['product']->getFPrice(); ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>
 <meta itemprop="priceCurrency" content="<?php echo $this->_tpl_vars['currency']->name; ?>
">
                            *</strong>
                        <?php endif; ?>
                    
                    <?php if ($this->_tpl_vars['product']->getPricePerUnit()): ?>
                        <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                            <?php echo $this->_tpl_vars['product']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['product']->oxarticles__oxunitname->value; ?>
 | <?php echo $this->_tpl_vars['product']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['product']->oxarticles__oxunitname->value; ?>

                        </span>
                                        <?php endif; ?>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        
    <?php $this->_smarty_vars['capture']['product_price'] = ob_get_contents(); ob_end_clean(); ?>
    <meta itemprop='productID' content='sku:<?php echo $this->_tpl_vars['product']->oxarticles__oxartnum->value; ?>
'>
    <a itemprop="url" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="titleBlock title fn" title="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
            <div class="gridPicture">
            <img itemprop="image" src="<?php echo $this->_tpl_vars['product']->getThumbnailUrl(); ?>
" alt="<?php echo $this->_tpl_vars['product']->oxarticles__oxtitle->value; ?>
">
        </div>
        <span itemprop="name">
                    </span> 
        <span class="shortdesc">
          <?php echo $this->_tpl_vars['product']->oxarticles__oxshortdesc->value; ?>

        </span>
    </a>
    
        <div class="priceBlock" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php echo $this->_smarty_vars['capture']['product_price']; ?>
            
                <span class="mwst"></span>
                <span class="artno"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_ARTNO'), $this);?>
: <?php echo $this->_tpl_vars['product']->oxarticles__oxartnum->value; ?>
</span>
                <?php $this->assign('listType', $this->_tpl_vars['oView']->getListType()); ?>
                <?php if (! $this->_tpl_vars['product']->isNotBuyable() && ! $this->_tpl_vars['aVariantSelections']['selections']): ?>
                  <a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "listtype=".($this->_tpl_vars['listType'])."&amp;fnc=tobasket&amp;aid=".($this->_tpl_vars['product']->oxarticles__oxid->value)."&amp;am=1") : smarty_modifier_oxaddparams($_tmp, "listtype=".($this->_tpl_vars['listType'])."&amp;fnc=tobasket&amp;aid=".($this->_tpl_vars['product']->oxarticles__oxid->value)."&amp;am=1")); ?>
" class="submitButton button" title="<?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ADDTOCART'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ADDTOCART'), $this);?>
</a>
                <?php else: ?>
                    <?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections']): ?>
                    <div class="selectorsBox js-fnSubmit clear" id="compareVariantSelections_<?php echo $this->_tpl_vars['testid']; ?>
">
                        <?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oSelectionList']):
?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/listselectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oSelectionList'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>            
                  <?php endif; ?>
                <?php endif; ?>
                <a href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="submitButton button"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_MOREINFO'), $this);?>
</a>
             <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        </div>
   
  </div>
</form>