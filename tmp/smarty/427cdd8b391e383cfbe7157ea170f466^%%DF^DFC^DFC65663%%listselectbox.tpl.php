<?php /* Smarty version 2.6.26, created on 2014-04-10 15:55:08
         compiled from widget/product/listselectbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/listselectbox.tpl', 1, false),array('function', 'oxmultilang', 'widget/product/listselectbox.tpl', 17, false),array('modifier', 'default', 'widget/product/listselectbox.tpl', 15, false),)), $this); ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxdropdown.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('div.dropDown p').oxDropDown();"), $this);?>

<div class="dropDown js-fnSubmit">
    <p class="selectorLabel underlined <?php if ($this->_tpl_vars['editable'] === false): ?> js-disabled<?php endif; ?>">
        <label><?php echo $this->_tpl_vars['oSelectionList']->getLabel(); ?>
:</label>
        <?php $this->assign('oActiveSelection', $this->_tpl_vars['oSelectionList']->getActiveSelection()); ?>
        <?php if ($this->_tpl_vars['oActiveSelection']): ?>
            <span><?php echo $this->_tpl_vars['oActiveSelection']->getName(); ?>
</span>
                <?php endif; ?>
    </p>
    <?php if ($this->_tpl_vars['editable'] !== false): ?>
                <ul class="drop <?php echo ((is_array($_tmp=@$this->_tpl_vars['sSelType'])) ? $this->_run_mod_handler('default', true, $_tmp, 'vardrop') : smarty_modifier_default($_tmp, 'vardrop')); ?>
 FXgradGreyLight shadow">
            <?php if ($this->_tpl_vars['oActiveSelection'] && ! $this->_tpl_vars['blHideDefault']): ?>
                <li><a rel=""><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_PRODUCT_ATTRIBUTES_PLEASECHOOSE'), $this);?>
</a></li>
            <?php endif; ?>
            <?php $_from = $this->_tpl_vars['oSelectionList']->getSelections(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oSelection']):
?>
                <li class="<?php if ($this->_tpl_vars['oSelection']->isDisabled()): ?>js-disabled disabled<?php endif; ?>">
                    <a data-seletion-id="<?php echo $this->_tpl_vars['oSelection']->getValue(); ?>
" class="<?php if ($this->_tpl_vars['oSelection']->isActive()): ?>selected<?php endif; ?>"><?php echo $this->_tpl_vars['oSelection']->getName(); ?>
</a>
                </li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>
    <?php endif; ?>
</div>