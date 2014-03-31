<?php /* Smarty version 2.6.26, created on 2014-03-31 21:05:31
         compiled from page/list/list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/list/list.tpl', 2, false),array('function', 'oxeval', 'page/list/list.tpl', 17, false),array('function', 'oxmultilang', 'page/list/list.tpl', 106, false),array('modifier', 'count', 'page/list/list.tpl', 96, false),array('modifier', 'escape', 'page/list/list.tpl', 111, false),array('insert', 'oxid_tracker', 'page/list/list.tpl', 133, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>page/list/list.tpl</div><!-- page/list/list.tpl template start --><?php echo smarty_function_oxscript(array('add' => "$('a.js-external').attr('target', '_blank');"), $this);?>

<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticlebox.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#content' ).oxArticleBox();"), $this);?>

<?php ob_start(); ?>
        <?php $this->assign('actCategory', $this->_tpl_vars['oView']->getActiveCategory()); ?>
            
        <?php if ($this->_tpl_vars['actCategory']->oxcategories__oxthumb->value): ?>
            <?php if ($this->_tpl_vars['actCategory']->getThumbUrl()): ?>
                <img src="<?php echo $this->_tpl_vars['actCategory']->getThumbUrl(); ?>
" alt="<?php echo $this->_tpl_vars['actCategory']->oxcategories__oxtitle->value; ?>
" class="categoryPicture">
            <?php endif; ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['actCategory'] && $this->_tpl_vars['actCategory']->oxcategories__oxdesc->value): ?>
            <div class="categoryTopDescription" id="catDesc"><?php echo $this->_tpl_vars['actCategory']->oxcategories__oxdesc->value; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['actCategory']->oxcategories__oxlongdesc->value): ?>
            <div class="categoryTopLongDescription" id="catLongDesc"><?php echo smarty_function_oxeval(array('var' => $this->_tpl_vars['actCategory']->oxcategories__oxlongdesc), $this);?>
</div>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['oView']->hasVisibleSubCats()): ?>
            <?php $this->assign('iSubCategoriesCount', 0); ?>
            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxequalizer.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$(function(){oxEqualizer.equalHeight($( '.subcatList li .content' ));});"), $this);?>

            <ul class="subcatList clear">
                <li>
                <?php $_from = $this->_tpl_vars['oView']->getSubCatList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreSubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreSubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['category']):
        $this->_foreach['MoreSubCat']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['category']->getContentCats()): ?>
                        <?php $_from = $this->_tpl_vars['category']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ocont']):
        $this->_foreach['MoreCms']['iteration']++;
?>
                            <?php $this->assign('iSubCategoriesCount', $this->_tpl_vars['iSubCategoriesCount']+1); ?>
                            <div class="box">
                            <h3>
                                <a id="moreSubCms_<?php echo $this->_foreach['MoreSubCat']['iteration']; ?>
_<?php echo $this->_foreach['MoreCms']['iteration']; ?>
" href="<?php echo $this->_tpl_vars['ocont']->getLink(); ?>
"><?php echo $this->_tpl_vars['ocont']->oxcontents__oxtitle->value; ?>
</a>
                            </h3>
                            <ul class="content"></ul>
                            </div>
                        <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['iSubCategoriesCount']%4 == 0): ?>
                    </li><li>
                    <?php endif; ?>
                    <!--<?php if ($this->_tpl_vars['category']->getIsVisible()): ?>
                        <?php $this->assign('iSubCategoriesCount', $this->_tpl_vars['iSubCategoriesCount']+1); ?>
                        <?php $this->assign('iconUrl', $this->_tpl_vars['category']->getIconUrl()); ?>
                            <div class="box<?php if ($this->_tpl_vars['iSubCategoriesCount']%4 == 0): ?> last<?php endif; ?>">
                                <h3>
                                    <a id="moreSubCat_<?php echo $this->_foreach['MoreSubCat']['iteration']; ?>
" href="<?php echo $this->_tpl_vars['category']->getLink(); ?>
">
                                        <?php echo $this->_tpl_vars['category']->oxcategories__oxtitle->value; ?>
<?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['category']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['category']->getNrOfArticles(); ?>
)<?php endif; ?>
                                    </a>
                                </h3>
                                 <?php if ($this->_tpl_vars['category']->getHasVisibleSubCats()): ?>
                                    <ul class="content">
                                        <?php if ($this->_tpl_vars['iconUrl']): ?>
                                            <li class="subcatPic">
                                                <a href="<?php echo $this->_tpl_vars['category']->getLink(); ?>
">
                                                    <img src="<?php echo $this->_tpl_vars['category']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['category']->oxcategories__oxtitle->value; ?>
">
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php $_from = $this->_tpl_vars['category']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subcategory']):
?>
                                            <?php if ($this->_tpl_vars['subcategory']->getIsVisible()): ?>
                                                <?php $_from = $this->_tpl_vars['subcategory']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ocont']):
        $this->_foreach['MoreCms']['iteration']++;
?>
                                                    <li>
                                                        <a href="<?php echo $this->_tpl_vars['ocont']->getLink(); ?>
"><strong><?php echo $this->_tpl_vars['ocont']->oxcontents__oxtitle->value; ?>
</strong></a>
                                                    </li>
                                                <?php endforeach; endif; unset($_from); ?>
                                                <li>
                                                    <a href="<?php echo $this->_tpl_vars['subcategory']->getLink(); ?>
">
                                                        <strong><?php echo $this->_tpl_vars['subcategory']->oxcategories__oxtitle->value; ?>
</strong><?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['subcategory']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['subcategory']->getNrOfArticles(); ?>
)<?php endif; ?>
                                                    </a>
                                                </li>
                                             <?php endif; ?>
                                        <?php endforeach; endif; unset($_from); ?>
                                    </ul>
                                <?php else: ?>
                                    <div class="content catPicOnly">
                                        <div class="subcatPic">
                                        <?php if ($this->_tpl_vars['iconUrl']): ?>
                                            <a href="<?php echo $this->_tpl_vars['category']->getLink(); ?>
">
                                                <img src="<?php echo $this->_tpl_vars['category']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['category']->oxcategories__oxtitle->value; ?>
">
                                            </a>
                                         <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                    <?php endif; ?>-->
                <?php if ($this->_tpl_vars['iSubCategoriesCount']%4 == 0): ?>
                </li>
                <li>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </li>
            </ul>
        <?php endif; ?>

    <?php if (count($this->_tpl_vars['oView']->getArticleList()) > 0): ?>
        <h1 class="pageHead">             <?php $this->assign('rsslinks', $this->_tpl_vars['oView']->getRssLinks()); ?>
                                  <a href="<?php echo $this->_tpl_vars['oViewConf']->getHomeLink(); ?>
" title="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
" class="overviewLinky"><img src="<?php echo $this->_tpl_vars['oViewConf']->getImageUrl(); ?>
icon_breadcrumb_home.png" alt="<?php echo $this->_tpl_vars['oxcmp_shop']->oxshops__oxtitleprefix->value; ?>
"></a>
    <?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
        &nbsp;<?php echo smarty_function_oxmultilang(array('ident' => 'TRO_BREADCRUMB_HOMEPAGE'), $this);?>
 &gt;
    <?php else: ?>
        <?php $_from = $this->_tpl_vars['oView']->getBreadCrumb(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['breadcrumb'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['breadcrumb']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['sCrum']):
        $this->_foreach['breadcrumb']['iteration']++;
?>
            &nbsp;&gt;&nbsp;
            <span  class="overviewLinky">
              <?php if ($this->_tpl_vars['sCrum']['link']): ?><a href="<?php echo $this->_tpl_vars['sCrum']['link']; ?>
" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['sCrum']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"><?php endif; ?><?php echo $this->_tpl_vars['sCrum']['title']; ?>
<?php if ($this->_tpl_vars['sCrum']['link']): ?></a><?php endif; ?>
            </span>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
         </h1>
        <div class="listRefine clear bottomRound">
                    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/locator/listlocator.tpl", 'smarty_include_vars' => array('locator' => $this->_tpl_vars['oView']->getPageNavigationLimitedTop(),'attributes' => $this->_tpl_vars['oView']->getAttributes(),'listDisplayType' => true,'itemsPerPage' => true,'sort' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        </div>
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/list.tpl", 'smarty_include_vars' => array('type' => $this->_tpl_vars['oView']->getListDisplayType(),'listId' => 'productList','products' => $this->_tpl_vars['oView']->getArticleList())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/locator/listlocator.tpl", 'smarty_include_vars' => array('locator' => $this->_tpl_vars['oView']->getPageNavigationLimitedBottom(),'place' => 'bottom')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php endif; ?>
    <?php require_once(SMARTY_CORE_DIR . 'core.run_insert_handler.php');
echo smarty_core_run_insert_handler(array('args' => array('name' => 'oxid_tracker')), $this); ?>

<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('oxidBlock_content', ob_get_contents());ob_end_clean(); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "layout/page.tpl", 'smarty_include_vars' => array('sidebar' => 'Left','tree_path' => $this->_tpl_vars['oView']->getTreePath())));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><!-- page/list/list.tpl template end -->