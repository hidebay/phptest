<?php /* Smarty version 2.6.26, created on 2014-03-18 12:02:33
         compiled from widget/header/servicebox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxgetseourl', 'widget/header/servicebox.tpl', 15, false),array('function', 'oxmultilang', 'widget/header/servicebox.tpl', 15, false),array('modifier', 'cat', 'widget/header/servicebox.tpl', 15, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/header/servicebox.tpl</div><!-- widget/header/servicebox.tpl template start --><div>
    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('noticeListCount', $this->_tpl_vars['oxcmp_user']->getNoticeListArtCnt()); ?>
        <?php $this->assign('wishListCount', $this->_tpl_vars['oxcmp_user']->getWishListArtCnt()); ?>
    <?php else: ?>
        <?php $this->assign('noticeListCount', '0'); ?>
        <?php $this->assign('wishListCount', '0'); ?>
    <?php endif; ?>
            
        <p id="servicesTrigger" class="<?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?>hasNotifications<?php endif; ?>">
            <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSslSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'ACCOUNT'), $this);?>
</span></a><?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['notificationsCounter']; ?>
</span><?php endif; ?>
        </p>
            
 </div>
<!-- widget/header/servicebox.tpl template end -->