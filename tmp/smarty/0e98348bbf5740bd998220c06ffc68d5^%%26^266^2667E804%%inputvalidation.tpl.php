<?php /* Smarty version 2.6.26, created on 2014-03-18 12:02:33
         compiled from message/inputvalidation.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'message/inputvalidation.tpl', 3, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>message/inputvalidation.tpl</div><!-- message/inputvalidation.tpl template start --><?php $_from = $this->_tpl_vars['aErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oError']):
?>
  <span class="js-oxError_postError"><?php echo smarty_function_oxmultilang(array('ident' => $this->_tpl_vars['oError']->getMessage()), $this);?>
</span>
<?php endforeach; endif; unset($_from); ?><!-- message/inputvalidation.tpl template end -->