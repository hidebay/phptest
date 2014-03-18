<?php /* Smarty version 2.6.26, created on 2014-03-18 12:02:33
         compiled from widget/header/loginbox.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/loginbox.tpl', 2, false),array('function', 'oxmultilang', 'widget/header/loginbox.tpl', 18, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/header/loginbox.tpl</div><!-- widget/header/loginbox.tpl template start --><?php echo smarty_function_oxscript(array('include' => "js/widgets/oxloginbox.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#loginBoxOpener' ).oxLoginBox();"), $this);?>

<?php $this->assign('bIsError', 0); ?>
<?php ob_start(); ?>
    <?php $_from = $this->_tpl_vars['Errors']['loginBoxErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['oEr']):
?>
        <p id="errorBadLogin" class="errorMsg"><?php echo $this->_tpl_vars['oEr']->getOxMessage(); ?>
</p>
        <?php $this->assign('bIsError', 1); ?>
    <?php endforeach; endif; unset($_from); ?>
<?php $this->_smarty_vars['capture']['loginErrors'] = ob_get_contents(); ob_end_clean(); ?>
<?php if (! $this->_tpl_vars['oxcmp_user']->oxuser__oxpassword->value): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#forgotPasswordOpener' ).oxModalPopup({ target: '#forgotPassword'});"), $this);?>

    <div id="forgotPassword" class="popupBox corners FXgradGreyLight glowShadow">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form/forgotpwd_email.tpl", 'smarty_include_vars' => array('idPrefix' => 'Popup')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
    <a href="#" id="loginBoxOpener" title="<?php echo smarty_function_oxmultilang(array('ident' => 'LOGIN'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'LOGIN'), $this);?>
</a>
    <form id="login" name="login" action="<?php echo $this->_tpl_vars['oViewConf']->getSslSelfLink(); ?>
" method="post">
        <div id="loginBox" class="loginBox" <?php if ($this->_tpl_vars['bIsError']): ?>style="display: block;"<?php endif; ?>>
            <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

            <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

            <input type="hidden" name="fnc" value="login_noredirect">
            <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getActiveClassName(); ?>
">
            <input type="hidden" name="pgNr" value="<?php echo $this->_tpl_vars['oView']->getActPage(); ?>
">
            <input type="hidden" name="CustomError" value="loginBoxErrors">
            <?php if ($this->_tpl_vars['oView']->getProduct()): ?>
                <?php $this->assign('product', $this->_tpl_vars['oView']->getProduct()); ?>
                <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['product']->oxarticles__oxnid->value; ?>
">
            <?php endif; ?>
            <div class="loginForm corners">
                <h4><?php echo smarty_function_oxmultilang(array('ident' => 'LOGIN'), $this);?>
</h4>
                <p>
                    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxinnerlabel.js",'priority' => 10), $this);?>

                    <?php echo smarty_function_oxscript(array('add' => "$( '#loginEmail' ).oxInnerLabel();"), $this);?>

                    <label for="loginEmail" class="innerLabel"><?php echo smarty_function_oxmultilang(array('ident' => 'EMAIL_ADDRESS'), $this);?>
</label>
                    <input id="loginEmail" type="text" name="lgn_usr" value="" class="textbox">
                </p>
                <p>
                    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxinnerlabel.js",'priority' => 10), $this);?>

                    <?php echo smarty_function_oxscript(array('add' => "$( '#loginPasword' ).oxInnerLabel();"), $this);?>

                    <label for="loginPasword" class="innerLabel"><?php echo smarty_function_oxmultilang(array('ident' => 'PASSWORD'), $this);?>
</label>
                    <input id="loginPasword" type="password" name="lgn_pwd" class="textbox passwordbox" value=""><strong><a id="forgotPasswordOpener" href="#" title="<?php echo smarty_function_oxmultilang(array('ident' => 'FORGOT_PASSWORD'), $this);?>
">?</a></strong>
                </p>
                <?php echo $this->_smarty_vars['capture']['loginErrors']; ?>

                <p class="checkFields clear">
                    <input type="checkbox" class="checkbox" value="1" name="lgn_cook" id="remember"><label for="remember"><?php echo smarty_function_oxmultilang(array('ident' => 'REMEMBER_ME'), $this);?>
</label>
                </p>
                <p class="checkFields clear">
                  <input type="hidden" name="blnewssubscribed" value="0">
                  <input id="subscribeNewsletter" class="checkbox" type="checkbox" name="blnewssubscribed" value="1">                  
                  <label for="subscribeNewsletter"><?php echo smarty_function_oxmultilang(array('ident' => 'FORM_FIELDSET_USER_SUBSCRIBENEWSLETTER'), $this);?>
</label>
                </p>
                <button type="submit" class="submitButton loginButton"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_OK'), $this);?>
</button>                
            </div>
            <?php if ($this->_tpl_vars['oViewConf']->getShowFbConnect()): ?>
                <div class="altLoginBox corners clear">
                    <span><?php echo smarty_function_oxmultilang(array('ident' => 'WIDGET_LOGINBOX_WITH'), $this);?>
</span>
                    <fb:login-button size="medium" autologoutlink="true" length="short"></fb:login-button>
                </div>
            <?php endif; ?>
        </div>
    </form>
<?php else: ?>
    
    </a>
    <a id="logoutLink" class="logoutLink" href="<?php echo $this->_tpl_vars['oViewConf']->getLogoutLink(); ?>
" title="<?php echo smarty_function_oxmultilang(array('ident' => 'LOGOUT'), $this);?>
"><?php echo smarty_function_oxmultilang(array('ident' => 'LOGOUT'), $this);?>
</a>
<?php endif; ?>
<!-- widget/header/loginbox.tpl template end -->