<?php /* Smarty version 2.6.26, created on 2014-04-10 12:32:07
         compiled from page/details/inc/fullproductinfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'page/details/inc/fullproductinfo.tpl', 67, false),array('modifier', 'colon', 'page/details/inc/fullproductinfo.tpl', 67, false),array('function', 'oxmultilang', 'page/details/inc/fullproductinfo.tpl', 71, false),array('function', 'oxid_include_widget', 'page/details/inc/fullproductinfo.tpl', 76, false),)), $this); ?>
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

        
        <?php if ($this->_tpl_vars['oView']->getAlsoBoughtTheseProducts()): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => 'grid','listId' => 'alsoBought','header' => 'light','head' => ((is_array($_tmp=((is_array($_tmp='CUSTOMERS_ALSO_BOUGHT')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('colon', true, $_tmp) : smarty_modifier_colon($_tmp)),'products' => $this->_tpl_vars['oView']->getAlsoBoughtTheseProducts())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['oView']->isReviewActive()): ?>
        <div class="widgetBox reviews">
            <h4><?php echo smarty_function_oxmultilang(array('ident' => 'WRITE_PRODUCT_REVIEW'), $this);?>
</h4>
            <?php $this->assign('product', $this->_tpl_vars['oView']->getProduct()); ?>
            <?php if ($this->_tpl_vars['oxcmp_user']): ?>
                <?php $this->assign('force_sid', $this->_tpl_vars['oView']->getSidForWidget()); ?>
            <?php endif; ?>
            <?php echo smarty_function_oxid_include_widget(array('cl' => 'oxwReview','nocookie' => 1,'force_sid' => $this->_tpl_vars['force_sid'],'_parent' => $this->_tpl_vars['oViewConf']->getTopActiveClassName(),'type' => 'oxarticle','anid' => $this->_tpl_vars['product']->oxarticles__oxnid->value,'aid' => $this->_tpl_vars['product']->oxarticles__oxid->value,'canrate' => $this->_tpl_vars['oView']->canRate(),'skipESIforUser' => 1), $this);?>

        </div>
        <?php endif; ?>
    </div>
    </div>