<?php /* Smarty version 2.6.26, created on 2014-02-25 17:18:57
         compiled from widget/d3extsearch/d3_extsearch_ajax.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 3, false),array('function', 'oxmultilang', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 29, false),array('modifier', 'oxmultilangassign', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 11, false),array('modifier', 'strip', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 12, false),array('modifier', 'escape', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 12, false),array('modifier', 'cat', 'widget/d3extsearch/d3_extsearch_ajax.tpl', 13, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/d3extsearch/d3_extsearch_ajax.tpl</div><!-- widget/d3extsearch/d3_extsearch_ajax.tpl template start --><?php if ($this->_tpl_vars['sSearchFieldName'] || ( $this->_tpl_vars['oViewConf']->getActiveClassName() == 'search' && $this->_tpl_vars['oView']->d3HasjQuerySlider() )): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/libs/jquery.min.js"), $this);?>

<?php endif; ?>

<?php if ($this->_tpl_vars['sSearchFieldName']): ?>
    <?php echo '<div id="xajax_resp" class="xajax_resp_cl"></div>'; ?><?php echo smarty_function_oxscript(array('include' => "js/d3_ext_search.js"), $this);?><?php echo ''; ?><?php $this->assign('sCharSet', ((is_array($_tmp='charset')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?><?php echo ''; ?><?php $this->assign('sWaitMessage', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['sD3QSWaitMessage'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'htmlall', $this->_tpl_vars['sCharSet']) : smarty_modifier_escape($_tmp, 'htmlall', $this->_tpl_vars['sCharSet']))); ?><?php echo '  '; ?><?php echo ''; ?><?php echo smarty_function_oxscript(array('add' => ((is_array($_tmp=((is_array($_tmp="var sD3ExtSearchWaitContent  = '")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sWaitMessage']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sWaitMessage'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "';") : smarty_modifier_cat($_tmp, "';"))), $this);?><?php echo ''; ?><?php echo smarty_function_oxscript(array('add' => ((is_array($_tmp=((is_array($_tmp="var sD3ExtSearchAjaxResponse = '")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getCurrentHomeDir()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getCurrentHomeDir())))) ? $this->_run_mod_handler('cat', true, $_tmp, "d3_extsearch_response.php?';") : smarty_modifier_cat($_tmp, "d3_extsearch_response.php?';"))), $this);?><?php echo ''; ?><?php if (! $this->_tpl_vars['blD3EmptySearch']): ?><?php echo ''; ?><?php $this->assign('sSBDefault', ((is_array($_tmp='D3_EXTSEARCH_FIELD_NOTICE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?><?php echo ''; ?><?php echo smarty_function_oxscript(array('add' => ((is_array($_tmp=((is_array($_tmp="var sD3SearchBoxDefault = '")) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['sSBDefault']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['sSBDefault'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "';") : smarty_modifier_cat($_tmp, "';"))), $this);?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo smarty_function_oxscript(array('add' => "var sD3SearchBoxDefault = '';"), $this);?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>

<?php endif; ?>

<?php if ($this->_tpl_vars['blD3ShowIAS']): ?>
    <div id="IAS_box" class="IAS_box">
        <div class="headline">
            <div class="closebtn" onClick="$('#IAS_box').css({'display' : 'none'});">X</div>
            <?php echo smarty_function_oxmultilang(array('ident' => 'D3_EXTSEARCH_IAS_SEARCH'), $this);?>

        </div>
        <form action="<?php echo $this->_tpl_vars['oViewConf']->getBaseDir(); ?>
index.php" method="get" >
            <div>
                <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                <input type="hidden" name="cl" value="search">
                <?php if ($this->_tpl_vars['sSearchFieldName']): ?>
                    <input type="hidden" name="searchfieldname" value="<?php echo $this->_tpl_vars['sSearchFieldName']; ?>
">
                    <input type="text" name="<?php echo $this->_tpl_vars['sSearchFieldName']; ?>
" value="" size="30" id="IAS_input">
                <?php else: ?>
                    <input id="IAS_input" type="text" size="30" value="" name="searchparam">
                <?php endif; ?>
                <span class="btn">
                    <input type="submit" class="btn" value="<?php echo smarty_function_oxmultilang(array('ident' => 'D3_EXTSEARCH_IAS_STARTSEARCH'), $this);?>
">
                </span>
            </div>
        </form>
    </div>
<?php endif; ?>


<?php if ($this->_tpl_vars['oViewConf']->getActiveClassName() == 'search' && $this->_tpl_vars['oView']->d3HasjQuerySlider()): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/jquery-ui.min.js"), $this);?>

    <?php echo smarty_function_oxscript(array('include' => "js/d3_ext_search_slider.js"), $this);?>

<?php endif; ?><!-- widget/d3extsearch/d3_extsearch_ajax.tpl template end -->