<?php /* Smarty version 2.6.26, created on 2014-03-18 12:02:33
         compiled from widget/header/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/search.tpl', 4, false),array('function', 'oxmultilang', 'widget/header/search.tpl', 10, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/header/search.tpl</div><!-- widget/header/search.tpl template start -->
<?php if ($this->_tpl_vars['oView']->showSearch()): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxinnerlabel.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#searchParam' ).oxInnerLabel();"), $this);?>

    <form class="search" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="get" name="search" id="search">
     <?php  $iso_lang = oxLang::getInstance()->getLanguageAbbr(); $this->assign('iso_lang', $iso_lang); ?>            
        <div class="searchBox" lang="<?php echo $this->_tpl_vars['iso_lang']; ?>
">
            <div class="searchLabel"><?php echo smarty_function_oxmultilang(array('ident' => 'TRO_SEARCH_LABEL'), $this);?>
</div>
            <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

            <input type="hidden" name="cl" value="search">
            
            
                                                            <label for="searchParam" class="innerLabel"><?php echo smarty_function_oxmultilang(array('ident' => 'SEARCH_TITLE'), $this);?>
</label>
                    <input class="textbox" type="text" id="searchParam" name="searchparam" value="<?php echo $this->_tpl_vars['oView']->getSearchParamForHtml(); ?>
">
                                        
            <input class="searchSubmit" type="submit" value="">
        </div>
    </form>
<?php endif; ?>    
<!-- widget/header/search.tpl template end -->