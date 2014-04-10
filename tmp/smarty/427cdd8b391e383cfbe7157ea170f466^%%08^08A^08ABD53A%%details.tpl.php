<?php /* Smarty version 2.6.26, created on 2014-04-10 12:32:06
         compiled from page/details/details.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxid_include_widget', 'page/details/details.tpl', 6, false),)), $this); ?>
<?php ob_start(); ?>
    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('force_sid', $this->_tpl_vars['oView']->getSidForWidget()); ?>
    <?php endif; ?>
    <div id="details_container">
        <?php echo smarty_function_oxid_include_widget(array('cl' => 'oxwArticleDetails','_parent' => $this->_tpl_vars['oView']->getClassName(),'nocookie' => 1,'force_sid' => $this->_tpl_vars['force_sid'],'_navurlparams' => $this->_tpl_vars['oViewConf']->getNavUrlParams(),'_object' => $this->_tpl_vars['oView']->getProduct(),'anid' => $this->_tpl_vars['oViewConf']->getActArticleId(),'iPriceAlarmStatus' => $this->_tpl_vars['oView']->getPriceAlarmStatus(),'sorting' => $this->_tpl_vars['oView']->getSortingParameters(),'skipESIforUser' => 1), $this);?>

    </div>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array('sidebar' => 'Left')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>