<?php /* Smarty version 2.6.26, created on 2014-03-17 14:40:48
         compiled from widget/sidebar/zahlung.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxifcontent', 'widget/sidebar/zahlung.tpl', 2, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/sidebar/zahlung.tpl</div><!-- widget/sidebar/zahlung.tpl template start --><?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'zahlung','object' => 'oContent')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>          
<div class="manuslider">
	<h3 class="sectionHead"><?php echo $this->_tpl_vars['oContent']->oxcontents__oxtitle->value; ?>
</h3>
                        <ul><?php echo $this->_tpl_vars['oContent']->oxcontents__oxcontent->value; ?>
</ul>
                                             </div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><!-- widget/sidebar/zahlung.tpl template end -->