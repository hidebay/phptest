<?php /* Smarty version 2.6.26, created on 2014-04-10 12:32:07
         compiled from widget/product/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'widget/product/details.tpl', 4, false),array('modifier', 'oxmultilangassign', 'widget/product/details.tpl', 16, false),array('function', 'assign_adv', 'widget/product/details.tpl', 10, false),array('function', 'oxmultilang', 'widget/product/details.tpl', 46, false),array('function', 'oxscript', 'widget/product/details.tpl', 64, false),array('insert', 'oxid_tracker', 'widget/product/details.tpl', 63, false),)), $this); ?>
<?php $this->assign('oDetailsProduct', $this->_tpl_vars['oView']->getProduct()); ?>
<?php $this->assign('oPictureProduct', $this->_tpl_vars['oView']->getPicturesProduct()); ?>
<?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
<?php $this->assign('sPageHeadTitle', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oDetailsProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value))); ?>

<?php if ($this->_tpl_vars['oView']->getPriceAlarmStatus() == 1): ?>
<?php $this->assign('shop_name', $this->_tpl_vars['oxcmp_shop']->oxshops__oxname->value); ?>
<?php $this->assign('bid_price', $this->_tpl_vars['oView']->getBidPrice()); ?>
<?php $this->assign('currency_sign', $this->_tpl_vars['currency']->sign); ?>
<?php echo smarty_function_assign_adv(array('var' => 'message_vars','value' => "array
    (
     '0' => '".($this->_tpl_vars['shop_name'])."',
     '1' => '".($this->_tpl_vars['bid_price'])."',
     '2' => '".($this->_tpl_vars['currency_sign'])."'
    )"), $this);?>

<?php $this->assign('_statusMessage', ((is_array($_tmp='PRICE_ALERT_THANK_YOU_MESSAGE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp, $this->_tpl_vars['message_vars']) : smarty_modifier_oxmultilangassign($_tmp, $this->_tpl_vars['message_vars']))); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/success.tpl", 'smarty_include_vars' => array('statusMessage' => ($this->_tpl_vars['_statusMessage']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['oView']->getPriceAlarmStatus() == 2): ?>
<?php $this->assign('_statusMessage', ((is_array($_tmp='MESSAGE_WRONG_VERIFICATION_CODE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/error.tpl", 'smarty_include_vars' => array('statusMessage' => $this->_tpl_vars['_statusMessage'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php elseif ($this->_tpl_vars['oView']->getPriceAlarmStatus() === 0): ?>
<?php $this->assign('_statusMessage1', ((is_array($_tmp=((is_array($_tmp='MESSAGE_NOT_ABLE_TO_SEND_EMAIL')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))) ? $this->_run_mod_handler('cat', true, $_tmp, "<br> ") : smarty_modifier_cat($_tmp, "<br> "))); ?>
<?php $this->assign('_statusMessage2', ((is_array($_tmp='MESSAGE_VERIFY_YOUR_EMAIL')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "message/error.tpl", 'smarty_include_vars' => array('statusMessage' => ($this->_tpl_vars['_statusMessage1']).($this->_tpl_vars['_statusMessage2']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>

<div id="details">
    <?php if ($this->_tpl_vars['oView']->getSearchTitle()): ?>
        <?php $this->assign('detailsLocation', $this->_tpl_vars['oView']->getSearchTitle()); ?>
    <?php else: ?>
        <?php $_from = $this->_tpl_vars['oView']->getCatTreePath(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['detailslocation'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['detailslocation']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oCatPath']):
        $this->_foreach['detailslocation']['iteration']++;
?>
            <?php if (($this->_foreach['detailslocation']['iteration'] == $this->_foreach['detailslocation']['total'])): ?>
                <?php $this->assign('detailsLocation', $this->_tpl_vars['oCatPath']->oxcategories__oxtitle->value); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>


        <?php $this->assign('actCategory', $this->_tpl_vars['oView']->getActiveCategory()); ?>
    <div class="pageHead">
    
    <!--class="pageHead"-->    <!--class="detailsParams listRefine bottomRound"-->        <div class="pager refineParams clear" id="detailsItemsPager">
            <?php if ($this->_tpl_vars['actCategory']->prevProductLink): ?><a id="linkPrevArticle" class="prev" href="<?php echo $this->_tpl_vars['actCategory']->prevProductLink; ?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PREVIOUS_PRODUCT'), $this);?>
</a><?php endif; ?>
            <span class="page">
               <?php echo smarty_function_oxmultilang(array('ident' => 'PRODUCT'), $this);?>
 <?php echo $this->_tpl_vars['actCategory']->iProductPos; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'OF'), $this);?>
 <?php echo $this->_tpl_vars['actCategory']->iCntOfProd; ?>

            </span>
            <?php if ($this->_tpl_vars['actCategory']->nextProductLink): ?><a id="linkNextArticle" href="<?php echo $this->_tpl_vars['actCategory']->nextProductLink; ?>
" class="next"><?php echo smarty_function_oxmultilang(array('ident' => 'NEXT_PRODUCT'), $this);?>
</a><?php endif; ?>
        
                <a href="<?php echo $this->_tpl_vars['actCategory']->toListLink; ?>
" class="overviewLink">><?php echo smarty_function_oxmultilang(array('ident' => 'BACK_TO_OVERVIEW'), $this);?>
</a>
    </div>    </div>

        <div id="productinfo">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/fullproductinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
</div>
<?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker', 'title' => ((is_array($_tmp='PRODUCT_DETAILS')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)), 'product' => $this->_tpl_vars['oDetailsProduct'], 'cpath' => $this->_tpl_vars['oView']->getCatTreePath())), $this); ?>

<?php echo smarty_function_oxscript(array('widget' => $this->_tpl_vars['oView']->getClassName()), $this);?>
