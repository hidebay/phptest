<?php /* Smarty version 2.6.26, created on 2014-03-18 15:51:36
         compiled from page/details/inc/fullproductinfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/details/inc/fullproductinfo.tpl', 11, false),array('function', 'oxgetseourl', 'page/details/inc/fullproductinfo.tpl', 17, false),array('modifier', 'cat', 'page/details/inc/fullproductinfo.tpl', 17, false),array('modifier', 'oxmultilangassign', 'page/details/inc/fullproductinfo.tpl', 24, false),array('modifier', 'count', 'page/details/inc/fullproductinfo.tpl', 39, false),)), $this); ?>

<div id="detailsMain">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/productmain.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div id="detailsRelated" class="detailsRelated clear">
    <div class="relatedInfo<?php if (! $this->_tpl_vars['oView']->getSimilarProducts() && ! $this->_tpl_vars['oView']->getCrossSelling() && ! $this->_tpl_vars['oView']->getAccessoires()): ?> relatedInfoFull<?php endif; ?>">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/tabs.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <div class="detailsParams listRefine bottomRound">
        <div class="pager refineParams clear" id="detailsItemsPager">
          <span class="forward">
            <?php if ($this->_tpl_vars['actCategory']->prevProductLink): ?><a id="linkPrevArticle" class="prev" href="<?php echo $this->_tpl_vars['actCategory']->prevProductLink; ?>
">&lt; <?php echo smarty_function_oxmultilang(array('ident' => 'TRO_DETAILS_LOCATOR_PREVIUOSPRODUCT'), $this);?>
</a><?php endif; ?>  
          </span>
          <span class="backward">
            <?php if ($this->_tpl_vars['actCategory']->nextProductLink): ?><a id="linkNextArticle" href="<?php echo $this->_tpl_vars['actCategory']->nextProductLink; ?>
" class="next"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_LOCATOR_NEXTPRODUCT'), $this);?>
 &gt;</a><?php endif; ?>
          </span>    
          <span class="suggest">
            <a id="suggest" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=suggest") : smarty_modifier_cat($_tmp, "cl=suggest")),'params' => ((is_array($_tmp="anid=".($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_PAGE_DETAILS_RECOMMEND'), $this);?>
</a>
          </span>
                
        </div>    
      </div>  
        <?php if ($this->_tpl_vars['oView']->getAlsoBoughtTheseProducts()): ?>
            <h2 class="sectionHead clear normal"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT'), $this);?>
</h2>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => 'grid','listId' => 'alsoBought','header' => 'light','head' => ((is_array($_tmp='PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'products' => $this->_tpl_vars['oView']->getAlsoBoughtTheseProducts())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
        <div class="widgetBox reviews" style="display: none;">
            <h4><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_PRODUCTREVIEW'), $this);?>
</h4>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/reviews/reviews.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
    </div>
    
      <?php if ($this->_tpl_vars['oView']->getCrossSelling()): ?>
        <h2 class="sectionHead clear normal"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_RELATED_PRODUCTS_CROSSSELING_HEADER'), $this);?>
</h2>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => 'grid','listId' => 'crossSelling','header' => 'light','head' => ((is_array($_tmp='PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'products' => $this->_tpl_vars['oView']->getCrossSelling())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
    
    
    
      <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getSimilarProducts())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
        <h2 class="sectionHead clear normal"><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_RELATED_PRODUCTS_SIMILAR_HEADER'), $this);?>
</h2>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => 'grid','listId' => 'crossSelling','header' => 'light','head' => ((is_array($_tmp='PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'products' => $this->_tpl_vars['oView']->getSimilarProducts())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php endif; ?>
    
    
    
      <?php if (((is_array($_tmp=$this->_tpl_vars['oView']->getAccessoires())) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
        <div id="zubehoer">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/accessoires.tpl", 'smarty_include_vars' => array('type' => 'grid','listId' => 'crossSelling','header' => 'light','head' => ((is_array($_tmp='PAGE_DETAILS_CUSTOMERS_ALSO_BOUGHT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'products' => $this->_tpl_vars['oView']->getAccessoires())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
      <?php endif; ?>
    
    
    </div>
