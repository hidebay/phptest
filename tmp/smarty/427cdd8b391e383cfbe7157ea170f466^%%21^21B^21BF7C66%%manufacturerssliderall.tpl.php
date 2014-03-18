<?php /* Smarty version 2.6.26, created on 2014-03-18 12:03:09
         compiled from widget/sidebar/manufacturerssliderall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxmultilang', 'widget/sidebar/manufacturerssliderall.tpl', 3, false),array('function', 'counter', 'widget/sidebar/manufacturerssliderall.tpl', 7, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/sidebar/manufacturerssliderall.tpl</div><!-- widget/sidebar/manufacturerssliderall.tpl template start --><div class="manuslider">
  <h3 class="sectionHead"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_MANUFACTURERS'), $this);?>
</h3>
  <?php ob_start(); ?>
      <?php $_from = $this->_tpl_vars['oView']->getManufacturerList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oManufacturer']):
?>
          <?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?>
          <?php echo smarty_function_counter(array('assign' => 'slideCount'), $this);?>

              <li>
                                    <a href="<?php echo $this->_tpl_vars['oManufacturer']->getLink(); ?>
"><img src="<?php echo $this->_tpl_vars['oManufacturer']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['oManufacturer']->oxmanufacturers__oxtitle->value; ?>
"></a>
              </li>
          <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
  <?php $this->_smarty_vars['capture']['slides'] = ob_get_contents(); ob_end_clean(); ?>

        <div class="itemSlider manufacturer">
        <?php if ($this->_tpl_vars['slideCount'] > 20 && false): ?>
        <div class="leftHolder">            
            <div class="titleBlock slideNav"><strong><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_MANUFACTURERS_SLIDER_OURBRANDS'), $this);?>
</strong></div>
            <a class="prevItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&laquo;</span><span class="slideBg"></span></a>
        </div>
        <a class="nextItem slideNav" href="#" rel="nofollow"><span class="slidePointer">&raquo;</span><span class="slideBg"></span></a>
        <?php endif; ?>
        <div id="manufacturerSlider">
            <ul>
                <?php echo $this->_smarty_vars['capture']['slides']; ?>

            </ul>
        </div>
    </div>  
</div><!-- widget/sidebar/manufacturerssliderall.tpl template end -->