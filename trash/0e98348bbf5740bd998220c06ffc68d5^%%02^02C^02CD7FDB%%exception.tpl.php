<?php /* Smarty version 2.6.26, created on 2014-02-25 17:38:07
         compiled from message/exception.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nl2br', 'message/exception.tpl', 9, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>message/exception.tpl</div><!-- message/exception.tpl template start --><?php ob_start(); ?>
    <div class="errorBox">
          <?php if (count ( $this->_tpl_vars['Errors'] ) > 0 && count ( $this->_tpl_vars['Errors']['default'] ) > 0): ?>
          <div class="status error corners">
              <?php $_from = $this->_tpl_vars['Errors']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
                  <p><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>

                  <p class="stackTrace"><?php echo ((is_array($_tmp=$this->_tpl_vars['oEr']->getStackTrace())) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
;</p>
              <?php endforeach; endif; unset($_from); ?>
          </div>
          <?php endif; ?>
    </div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_pageBody', ob_get_contents());ob_end_clean(); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/base.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><!-- message/exception.tpl template end -->