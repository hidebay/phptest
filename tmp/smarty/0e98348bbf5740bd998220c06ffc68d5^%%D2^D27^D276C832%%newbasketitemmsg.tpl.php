<?php /* Smarty version 2.6.26, created on 2014-03-17 14:46:44
         compiled from widget/minibasket/newbasketitemmsg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxhasrights', 'widget/minibasket/newbasketitemmsg.tpl', 2, false),array('function', 'oxmultilang', 'widget/minibasket/newbasketitemmsg.tpl', 3, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/minibasket/newbasketitemmsg.tpl</div><!-- widget/minibasket/newbasketitemmsg.tpl template start --><?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <span id="newItemMsg"><?php echo smarty_function_oxmultilang(array('ident' => 'NEW_BASKET_ITEM_MSG'), $this);?>
</span>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?><!-- widget/minibasket/newbasketitemmsg.tpl template end -->