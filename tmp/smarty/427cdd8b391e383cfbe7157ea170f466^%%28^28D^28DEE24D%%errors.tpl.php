<?php /* Smarty version 2.6.26, created on 2014-03-18 12:03:09
         compiled from message/errors.tpl */ ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>message/errors.tpl</div><!-- message/errors.tpl template start --><?php if (count ( $this->_tpl_vars['Errors'] ) > 0 && count ( $this->_tpl_vars['Errors']['default'] ) > 0): ?>
<div class="status error corners">
    <?php $_from = $this->_tpl_vars['Errors']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
        <p><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>
    <?php endforeach; endif; unset($_from); ?>
</div>
<?php endif; ?><!-- message/errors.tpl template end -->