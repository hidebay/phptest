<?php /* Smarty version 2.6.26, created on 2014-03-31 21:05:32
         compiled from widget/facebook/init.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/facebook/init.tpl', 4, false),array('function', 'oxmultilang', 'widget/facebook/init.tpl', 10, false),array('block', 'oxifcontent', 'widget/facebook/init.tpl', 11, false),array('modifier', 'oxmultilangassign', 'widget/facebook/init.tpl', 19, false),array('modifier', 'oxaddparams', 'widget/facebook/init.tpl', 20, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/facebook/init.tpl</div><!-- widget/facebook/init.tpl template start --><?php if ($this->_tpl_vars['oViewConf']->getFbAppId()): ?>
    <div id="fb-root"></div>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxfacebook.js"), $this);?>

    <?php if ($this->_tpl_vars['oView']->isActive('FacebookConfirm') && ! $this->_tpl_vars['oView']->isFbWidgetVisible()): ?>
        <div id="fbinfo" class="fbInfoPopup popupBox corners FXgradGreyLight glowShadow">
            <img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('x.png'); ?>
" alt="" class="closePop">
            <div class="wrappingIntro clear">
                <h3><?php echo smarty_function_oxmultilang(array('ident' => 'FACEBOOK_ENABLE_INFOTEXTHEADER'), $this);?>
</h3>
                <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'oxfacebookenableinfotext','object' => 'oCont')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                    <?php echo $this->_tpl_vars['oCont']->oxcontents__oxcontent->value; ?>

                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            </div>
        </div>
        <?php ob_start(); ?>
            <?php echo smarty_function_oxscript(array('include' => "js/libs/cookie/jquery.cookie.js"), $this);?>

            <?php $this->assign('sFbAppId', $this->_tpl_vars['oViewConf']->getFbAppId()); ?>
            <?php $this->assign('sLocale', ((is_array($_tmp='FACEBOOK_LOCALE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
            <?php $this->assign('sLoginUrl', ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "fblogin=1") : smarty_modifier_oxaddparams($_tmp, "fblogin=1"))); ?>
            <?php $this->assign('sLogoutUrl', $this->_tpl_vars['oViewConf']->getLogoutLink()); ?>
            <?php echo smarty_function_oxscript(array('add' => "$('.oxfbenable').click( function() { oxFacebook.showFbWidgets('".($this->_tpl_vars['sFbAppId'])."','".($this->_tpl_vars['sLocale'])."','".($this->_tpl_vars['sLoginUrl'])."','".($this->_tpl_vars['sLogoutUrl'])."'); return false;});"), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('.oxfbinfo').oxModalPopup({ target: '#fbinfo',width: '490px'});"), $this);?>

        <?php $this->_smarty_vars['capture']['facebookInit'] = ob_get_contents(); ob_end_clean(); ?>
    <?php else: ?>
        <?php ob_start(); ?>
            oxFacebook.fbInit("<?php echo $this->_tpl_vars['oViewConf']->getFbAppId(); ?>
", "<?php echo smarty_function_oxmultilang(array('ident' => 'FACEBOOK_LOCALE'), $this);?>
", "<?php echo ((is_array($_tmp=$this->_tpl_vars['oView']->getLink())) ? $this->_run_mod_handler('oxaddparams', true, $_tmp, "fblogin=1") : smarty_modifier_oxaddparams($_tmp, "fblogin=1")); ?>
", "<?php echo $this->_tpl_vars['oViewConf']->getLogoutLink(); ?>
");
        <?php $this->_smarty_vars['capture']['facebookInit'] = ob_get_contents(); ob_end_clean(); ?>
    <?php endif; ?>
    <?php echo smarty_function_oxscript(array('add' => ($this->_smarty_vars['capture']['facebookInit'])), $this);?>

<?php endif; ?><!-- widget/facebook/init.tpl template end -->