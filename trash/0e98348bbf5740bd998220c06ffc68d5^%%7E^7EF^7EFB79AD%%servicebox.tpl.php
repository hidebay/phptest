<?php /* Smarty version 2.6.26, created on 2014-02-25 17:28:45
         compiled from widget/header/servicebox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'widget/header/servicebox.tpl', 10, false),array('function', 'oxscript', 'widget/header/servicebox.tpl', 11, false),array('function', 'oxgetseourl', 'widget/header/servicebox.tpl', 15, false),array('function', 'oxmultilang', 'widget/header/servicebox.tpl', 15, false),array('modifier', 'cat', 'widget/header/servicebox.tpl', 15, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/header/servicebox.tpl</div><!-- widget/header/servicebox.tpl template start --><div>
    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('noticeListCount', $this->_tpl_vars['oxcmp_user']->getNoticeListArtCnt()); ?>
        <?php $this->assign('wishListCount', $this->_tpl_vars['oxcmp_user']->getWishListArtCnt()); ?>
    <?php else: ?>
        <?php $this->assign('noticeListCount', '0'); ?>
        <?php $this->assign('wishListCount', '0'); ?>
    <?php endif; ?>
    <?php echo smarty_function_math(array('equation' => "a+b+c",'a' => $this->_tpl_vars['oView']->getCompareItemsCnt(),'b' => $this->_tpl_vars['noticeListCount'],'c' => $this->_tpl_vars['wishListCount'],'assign' => 'notificationsCounter'), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxflyoutbox.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#servicesTrigger' ).oxFlyOutBox();"), $this);?>

    <?php ob_start(); ?>
        <p id="servicesTrigger" class="<?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?>hasNotifications<?php endif; ?>">
            <a href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSslSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account"))), $this);?>
" rel="nofollow"><span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_SERVICES_ACCOUNT'), $this);?>
</span></a><?php if ($this->_tpl_vars['notificationsCounter'] > 0): ?><span class="counter FXgradOrange"><?php echo $this->_tpl_vars['notificationsCounter']; ?>
</span><?php endif; ?>
        </p>
            <?php $this->_smarty_vars['capture']['_dbg_blocks'] = ob_get_contents(); ob_end_clean(); ?><?php echo smarty_function_math(array('equation' => "rand()",'assign' => '_dbg_block_idr1'), $this);?>
<?php echo smarty_function_math(array('equation' => "rand()",'assign' => '_dbg_block_idr2'), $this);?>
<hr style="visibility:hidden;height:0;margin:0;padding:0;border:0;line-height:0;font-size:0;" class="debugBlocksStart" id="block_2521238370_<?php echo $this->_tpl_vars['_dbg_block_idr1']; ?>
<?php echo $this->_tpl_vars['_dbg_block_idr2']; ?>
" title="widget/header/servicebox.tpl-&gt;widget_header_servicebox_flyoutbox"><?php echo $this->_smarty_vars['capture']['_dbg_blocks']; ?>
<hr style="visibility:hidden;height:0;margin:0;padding:0;border:0;line-height:0;font-size:0;" class="debugBlocksEnd" title="block_2521238370_<?php echo $this->_tpl_vars['_dbg_block_idr1']; ?>
<?php echo $this->_tpl_vars['_dbg_block_idr2']; ?>
">
 </div><!-- widget/header/servicebox.tpl template end -->