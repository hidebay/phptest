<?php /* Smarty version 2.6.26, created on 2014-03-18 13:46:45
         compiled from widget/product/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/product/list.tpl', 2, false),array('modifier', 'count', 'widget/product/list.tpl', 8, false),array('modifier', 'cat', 'widget/product/list.tpl', 11, false),)), $this); ?>
<?php if ($this->_tpl_vars['type'] == 'line' || $this->_tpl_vars['type'] == 'infogrid'): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxcenterelementonhover.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '.pictureBox' ).oxCenterElementOnHover();"), $this);?>

<?php endif; ?>

<?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>


<?php if (count($this->_tpl_vars['products']) > 0): ?>
    <ul class="<?php echo $this->_tpl_vars['type']; ?>
View <?php echo $this->_tpl_vars['clear']; ?>
" id="<?php echo $this->_tpl_vars['listId']; ?>
">
        <?php $_from = $this->_tpl_vars['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['productlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['productlist']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['_product']):
        $this->_foreach['productlist']['iteration']++;
?>
            <li class="productData" itemscope itemtype="http://schema.org/Product"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ((is_array($_tmp=((is_array($_tmp="widget/product/listitem_")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['type']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['type'])))) ? $this->_run_mod_handler('cat', true, $_tmp, ".tpl") : smarty_modifier_cat($_tmp, ".tpl")), 'smarty_include_vars' => array('product' => $this->_tpl_vars['_product'],'testid' => ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['listId'])) ? $this->_run_mod_handler('cat', true, $_tmp, '_') : smarty_modifier_cat($_tmp, '_')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_foreach['productlist']['iteration']) : smarty_modifier_cat($_tmp, $this->_foreach['productlist']['iteration'])),'blDisableToCart' => $this->_tpl_vars['blDisableToCart'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></li>
                    <?php endforeach; endif; unset($_from); ?>
    </ul>
<?php endif; ?>