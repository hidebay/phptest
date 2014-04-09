<?php /* Smarty version 2.6.26, created on 2014-04-09 09:13:53
         compiled from page/details/inc/deliverytime.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'page/details/inc/deliverytime.tpl', 4, false),array('modifier', 'cat', 'page/details/inc/deliverytime.tpl', 12, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>page/details/inc/deliverytime.tpl</div><!-- page/details/inc/deliverytime.tpl template start --><?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxmindeltime->value || $this->_tpl_vars['oDetailsProduct']->oxarticles__oxmaxdeltime->value): ?>
<span id="productDeliveryTime">
<?php echo smarty_function_oxmultilang(array('ident' => 'DELIVERYTIME_DELIVERYTIME','suffix' => 'COLON'), $this);?>

<?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxmindeltime->value && $this->_tpl_vars['oDetailsProduct']->oxarticles__oxmindeltime->value != $this->_tpl_vars['oDetailsProduct']->oxarticles__oxmaxdeltime->value): ?>
    <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxmindeltime->value; ?>
 -
<?php endif; ?>
<?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxmaxdeltime->value): ?>
    <?php $this->assign('unit', $this->_tpl_vars['oDetailsProduct']->oxarticles__oxdeltimeunit->value); ?>
    <?php $this->assign('ident', "DELIVERYTIME_".($this->_tpl_vars['unit'])); ?>
    <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxmaxdeltime->value > 1): ?>
        <?php $this->assign('ident', ((is_array($_tmp=$this->_tpl_vars['ident'])) ? $this->_run_mod_handler('cat', true, $_tmp, 'S') : smarty_modifier_cat($_tmp, 'S'))); ?>
    <?php endif; ?>
    <?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['ident'],'args' => $this->_tpl_vars['oDetailsProduct']->oxarticles__oxmaxdeltime->value), $this);?>

<?php endif; ?>
</span>
<?php endif; ?><!-- page/details/inc/deliverytime.tpl template end -->