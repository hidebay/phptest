<?php /* Smarty version 2.6.26, created on 2014-03-31 21:05:32
         compiled from layout/sidebar.tpl */ ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>layout/sidebar.tpl</div><!-- layout/sidebar.tpl template start --><div id="sidebar_content">
<?php $_from = $this->_tpl_vars['oxidBlock_sidebar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['_block']):
?>
    <?php echo $this->_tpl_vars['_block']; ?>

<?php endforeach; endif; unset($_from); ?>

    
        <?php if ($this->_tpl_vars['oView']->isDemoShop()): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/adminbanner.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
    
    
      <?php if ($this->_tpl_vars['oView']->getClassName() != 'search' && ! preg_match ( '/^account/' , $this->_tpl_vars['oView']->getClassName() )): ?>
        <?php if ($this->_tpl_vars['oxcmp_categories']): ?>
            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/categoriestree.tpl", 'smarty_include_vars' => array('categories' => $this->_tpl_vars['oxcmp_categories']->getArray(),'act' => $this->_tpl_vars['oxcmp_categories']->getClickCat(),'deepLevel' => 0)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php endif; ?>
      <?php endif; ?>
    
          
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/manufacturerssliderall.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      
      
      
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/katalogbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      
      
      
          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/sidebar/zahlung.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      
      
        

</div><!-- layout/sidebar.tpl template end -->