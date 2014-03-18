<?php /* Smarty version 2.6.26, created on 2014-03-18 13:46:46
         compiled from layout/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'oxifcontent', 'layout/header.tpl', 7, false),array('function', 'oxmultilang', 'layout/header.tpl', 10, false),array('function', 'oxgetseourl', 'layout/header.tpl', 12, false),array('function', 'oxid_include_dynamic', 'layout/header.tpl', 30, false),array('modifier', 'cat', 'layout/header.tpl', 11, false),array('modifier', 'oxtruncate', 'layout/header.tpl', 16, false),)), $this); ?>
<div id="header" class="clear">
      
      <?php $this->assign('slogoImg', "logo.png"); ?>
      <a id="logo" href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" title="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl($this->_tpl_vars['slogoImg']); ?>
" alt="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
"></a>

      <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'troheadercenter','object' => '_cont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
          <div id="headercenter">
            <?php if ($this->_tpl_vars['oxcmp_user']->oxuser__oxpassword->value): ?>
              <?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_LOGINBOX_GREETING'), $this);?>

              <?php $this->assign('fullname', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['oxcmp_user']->oxuser__oxfname->value)) ? $this->_run_mod_handler('cat', true, $_tmp, ' ') : smarty_modifier_cat($_tmp, ' ')))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oxcmp_user']->oxuser__oxlname->value) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oxcmp_user']->oxuser__oxlname->value))); ?>
              <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
">
              <?php if ($this->_tpl_vars['fullname']): ?>
                  <?php echo $this->_tpl_vars['fullname']; ?>

              <?php else: ?>
                  <?php echo ((is_array($_tmp=$this->_tpl_vars['oxcmp_user']->oxuser__oxusername->value)) ? $this->_run_mod_handler('oxtruncate', true, $_tmp, 25, "...", true) : smarty_modifier_oxtruncate($_tmp, 25, "...", true)); ?>

              <?php endif; ?>
              </a>
            <?php endif; ?>
            <?php echo $this->_tpl_vars['_cont']->oxcontents__oxcontent->value; ?>

          </div>
      <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

      <div id="header_basket">
          <ul id="topMenu">
            <li class="login flyout<?php if ($this->_tpl_vars['oxcmp_user']->oxuser__oxpassword->value): ?> logged<?php endif; ?>">
               <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/loginbox.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
            </li>
            <li>
                <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/header/servicebox.tpl"), $this);?>

            </li>
            <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
                <li><a id="registerLink" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSslSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=register") : smarty_modifier_cat($_tmp, "cl=register"))), $this);?>
" title="<?php echo smarty_function_oxmultilang(array('ident' => 'REGISTER'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'REGISTER'), $this);?>
</a></li>
            <?php endif; ?>
          </ul>

          <?php $this->assign('currency', $this->_tpl_vars['oView']->getActCurrency()); ?>
          <div id="basketTotals"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_HEADER_BASKET'), $this);?>
<br><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_HEADER_BASKET_TOTALS'), $this);?>
 <?php echo $this->_tpl_vars['oxcmp_basket']->getFProductsPrice(); ?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
</div>

          <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/languages.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </div>

      <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/minibasket/minibasket.tpl"), $this);?>

      <?php echo smarty_function_oxid_include_dynamic(array('file' => "widget/minibasket/minibasketmodal.tpl"), $this);?>

</div>
<div id="lowerHeader" class="clear">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/topcategories.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/header/search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'trotelefon','object' => '_cont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
        <div id="telefonnummer"><?php echo $this->_tpl_vars['_cont']->oxcontents__oxcontent->value; ?>
</div>
    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

    <?php if (! $this->_tpl_vars['blHideBreadcrumb']): ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/breadcrumb.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>

</div>