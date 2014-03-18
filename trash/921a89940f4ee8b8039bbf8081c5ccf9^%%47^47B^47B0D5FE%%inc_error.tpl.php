<?php /* Smarty version 2.6.26, created on 2014-02-24 12:09:22
         compiled from inc_error.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'inc_error.tpl', 9, false),)), $this); ?>
<?php ob_start(); ?>
    <?php if (count ( $this->_tpl_vars['Errors']['default'] ) > 0): ?>
    <div class="errorbox">
        <?php $_from = $this->_tpl_vars['Errors']['default']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
            <p><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <?php endif; ?>
<?php $this->_smarty_vars['capture']['_dbg_blocks'] = ob_get_contents(); ob_end_clean(); ?><?php echo smarty_function_math(array('equation' => "rand()",'assign' => '_dbg_block_idr1'), $this);?>
<?php echo smarty_function_math(array('equation' => "rand()",'assign' => '_dbg_block_idr2'), $this);?>
<hr style="visibility:hidden;height:0;margin:0;padding:0;border:0;line-height:0;font-size:0;" class="debugBlocksStart" id="block_1947143276_<?php echo $this->_tpl_vars['_dbg_block_idr1']; ?>
<?php echo $this->_tpl_vars['_dbg_block_idr2']; ?>
" title="inc_error.tpl-&gt;admin_inc_error"><?php echo $this->_smarty_vars['capture']['_dbg_blocks']; ?>
<hr style="visibility:hidden;height:0;margin:0;padding:0;border:0;line-height:0;font-size:0;" class="debugBlocksEnd" title="block_1947143276_<?php echo $this->_tpl_vars['_dbg_block_idr1']; ?>
<?php echo $this->_tpl_vars['_dbg_block_idr2']; ?>
">