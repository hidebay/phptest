<?php /* Smarty version 2.6.26, created on 2014-04-09 09:13:54
         compiled from ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxgetseourl', 'ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0', 3, false),array('function', 'oxmultilang', 'ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0', 3, false),array('modifier', 'cat', 'ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0', 3, false),array('block', 'oxhasrights', 'ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0', 7, false),array('block', 'oxifcontent', 'ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0', 21, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0</div><!-- ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0 template start -->                          <ul class="list services">
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=contact") : smarty_modifier_cat($_tmp, "cl=contact"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'CONTACT'), $this);?>
</a></li>
<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => $this->_tpl_vars['oViewConf']->getBasketLink()), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_TITLE_BASKET'), $this);?>
</a></li>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'ACCOUNT'), $this);?>
</a></li>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_noticelist") : smarty_modifier_cat($_tmp, "cl=account_noticelist"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'PAGE_TITLE_ACCOUNT_NOTICELIST'), $this);?>
</a></li>
<?php if ($this->_tpl_vars['oViewConf']->getShowWishlist()): ?>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account_wishlist") : smarty_modifier_cat($_tmp, "cl=account_wishlist"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'MY_GIFT_REGISTRY'), $this);?>
</a></li>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=wishlist") : smarty_modifier_cat($_tmp, "cl=wishlist")),'params' => ((is_array($_tmp="wishid=")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oView']->getWishlistUserId()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oView']->getWishlistUserId()))), $this);?>
" rel="nofollow"><?php echo smarty_function_oxmultilang(array('ident' => 'PUBLIC_GIFT_REGISTRIES'), $this);?>
</a></li>
<?php endif; ?>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=guestbook") : smarty_modifier_cat($_tmp, "cl=guestbook"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'GUESTBOOK'), $this);?>
</a></li>
<?php if ($this->_tpl_vars['oView']->isActive('Invitations')): ?>
<li>- <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=invite") : smarty_modifier_cat($_tmp, "cl=invite"))), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'INVITEFRIENDS'), $this);?>
</a></li>
<?php endif; ?>
<li>&nbsp;</li>
<?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'f139583994ebdc5faf15a7efa06026e4','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<li>- <a href="<?php echo $this->_tpl_vars['oCont']->getLink(); ?>
"><?php echo $this->_tpl_vars['oCont']->oxcontents__oxtitle->value; ?>
</a></li>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></ul>
                        <!-- ox:trofooterservice00c5fa68e6014f2b44f6291ed2421f8c0 template end -->