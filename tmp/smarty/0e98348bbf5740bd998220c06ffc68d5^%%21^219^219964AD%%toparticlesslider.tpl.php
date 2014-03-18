<?php /* Smarty version 2.6.26, created on 2014-03-17 14:40:48
         compiled from widget/toparticlesslider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'widget/toparticlesslider.tpl', 5, false),array('function', 'counter', 'widget/toparticlesslider.tpl', 8, false),array('function', 'oxmultilang', 'widget/toparticlesslider.tpl', 24, false),array('function', 'oxscript', 'widget/toparticlesslider.tpl', 71, false),array('block', 'oxhasrights', 'widget/toparticlesslider.tpl', 32, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/toparticlesslider.tpl</div><!-- widget/toparticlesslider.tpl template start --><?php if ($this->_tpl_vars['toparticlelist']): ?>
  <?php ob_start(); ?>
    <?php $this->assign('aTopArticles', $this->_tpl_vars['toparticlelist']); ?>
    <?php $this->assign('iNumOfArticles', count($this->_tpl_vars['aTopArticles'])); ?>
    <?php $_from = $this->_tpl_vars['aTopArticles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oArticle']):
?>
        
        <?php echo smarty_function_counter(array('assign' => 'slideCount'), $this);?>

			
		
		
            <li>
			
				
                <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
                <?php if ($this->_tpl_vars['showMainLink']): ?>
                    <?php $this->assign('_productLink', $this->_tpl_vars['oArticle']->getMainLink()); ?>
                <?php else: ?>
                    <?php $this->assign('_productLink', $this->_tpl_vars['oArticle']->getLink()); ?>
                <?php endif; ?>

				
                <a id="<?php echo $this->_tpl_vars['testid']; ?>
" itemprop="url" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="imageBlock title fn" title="<?php echo $this->_tpl_vars['oArticle']->oxarticles__oxtitle->value; ?>
" style="z-index: 1"><img src="<?php echo $this->_tpl_vars['oArticle']->getThumbnailUrl(); ?>
" alt="<?php echo $this->_tpl_vars['oArticle']->oxarticles__oxtitle->value; ?>
"></a>
				<span class="artno"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_ARTNO'), $this);?>
: <?php echo $this->_tpl_vars['oArticle']->oxarticles__oxartnum->value; ?>
</span>
                <a id="<?php echo $this->_tpl_vars['testid']; ?>
" itemprop="url" href="<?php echo $this->_tpl_vars['_productLink']; ?>
" class="titleBlock title fn" title="<?php echo $this->_tpl_vars['oArticle']->oxarticles__oxtitle->value; ?>
" style="z-index: 1">
                     <span class="title" itemprop="name"><?php echo $this->_tpl_vars['oArticle']->oxarticles__oxtitle->value; ?>
</span></a>

                    <div class="priceBlock" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <div class="content">
                                   
                                    
                                        <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                                            <?php if ($this->_tpl_vars['oArticle']->getFTPrice() > $this->_tpl_vars['oArticle']->getFPrice()): ?>
                                                <?php $this->assign('strich', "strich.png"); ?>                    
                                                <p class="priceOld">
                                                    <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl(); ?>
strich.png">
                                                                                                        <?php echo $this->_tpl_vars['oArticle']->getFTPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>

                                                </p>
                                            <?php endif; ?>
                                            
                                                <?php if ($this->_tpl_vars['oArticle']->getFPrice()): ?>
                                                    <span class="price"><span itemprop="price"><?php echo $this->_tpl_vars['oArticle']->getFPrice(); ?>
</span> <?php echo $this->_tpl_vars['currency']->sign; ?>
 * <meta itemprop="priceCurrency" content="<?php echo $this->_tpl_vars['currency']->name; ?>
"></span>
                                                <?php endif; ?>
                                            
                                            <?php if ($this->_tpl_vars['oArticle']->getPricePerUnit()): ?>
                                                <div id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                                                    <?php echo $this->_tpl_vars['oArticle']->oxarticles__oxunitquantity->value; ?>
 <?php echo $this->_tpl_vars['oArticle']->oxarticles__oxunitname->value; ?>
 | <?php echo $this->_tpl_vars['oArticle']->getPricePerUnit(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['product']->oxarticles__oxunitname->value; ?>

                                                </div>
                                            <?php elseif ($this->_tpl_vars['oArticle']->oxarticles__oxweight->value): ?>
                                                <span id="productPricePerUnit_<?php echo $this->_tpl_vars['testid']; ?>
" class="pricePerUnit">
                                                    <span title="weight"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT'), $this);?>
</span>
                                                    <span class="value"><?php echo $this->_tpl_vars['oArticle']->oxarticles__oxweight->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_PRODUCT_ARTWEIGHT2'), $this);?>
</span>
                                                </span>
                                            <?php endif; ?>
                                            <span class="mwst"></span>
                                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                    
                                </div>
                       </div>
					   
					
            </li>
		
       
    <?php endforeach; endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['slides'] = ob_get_contents(); ob_end_clean(); ?>
    <h2 class="sectionHead clear">
        <span><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_MORE_PRODUCTS'), $this);?>
</span>		
    </h2>
    <?php echo smarty_function_oxscript(array('include' => "js/libs/jcarousellite.js"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/trotoparticlesslider.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#toparticlesSlider' ).troTopArticlesSlider();"), $this);?>

    <div class="itemSlider">
        <div class="leftHolder">
           <?php if ($this->_tpl_vars['iNumOfArticles'] > 4): ?> 
              <a class="prevItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&lt;&laquo;</span><span class="slideBg">&lt;</span></a>
           <?php else: ?>
              <div class="noSlideDiv"><span class="noSlideLeft"></span></div>
           <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['iNumOfArticles'] > 4): ?> 
            <a class="nextItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&raquo;</span><span class="slideBg">&gt;</span></a>
        <?php else: ?>
            <div class="noSlideDiv"><span class="noSlideRight"></span></div>
        <?php endif; ?>
        <div id="toparticlesSlider">
            <ul>
                <?php echo $this->_smarty_vars['capture']['slides']; ?>

            </ul>
        </div>
    </div>  
<?php endif; ?><!-- widget/toparticlesslider.tpl template end -->