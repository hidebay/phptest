<?php /* Smarty version 2.6.26, created on 2014-03-18 13:46:46
         compiled from widget/sidebar/katalogbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxifcontent', 'widget/sidebar/katalogbox.tpl', 1, false),)), $this); ?>
<?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'katalogbox','object' => 'oContent')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>          
<div class="manuslider">
	<h3 class="sectionHead"><?php echo $this->_tpl_vars['oContent']->oxcontents__oxtitle->value; ?>
</h3>
                        <ul><?php echo $this->_tpl_vars['oContent']->oxcontents__oxcontent->value; ?>
</ul>
                                             </div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>