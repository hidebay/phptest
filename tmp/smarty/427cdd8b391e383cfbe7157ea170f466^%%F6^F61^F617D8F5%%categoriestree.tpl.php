<?php /* Smarty version 2.6.26, created on 2014-03-18 13:46:46
         compiled from widget/sidebar/categoriestree.tpl */ ?>
<?php if ($this->_tpl_vars['categories'] && $this->_tpl_vars['oView']->getClassName() != 'start'): ?>
<div class="categoryBox">
    <ul class="tree" id="tree">
    <?php $this->assign('level1counter', '1'); ?>
    <?php if (!function_exists('smarty_fun_tree')) { function smarty_fun_tree(&$smarty, $params) { $_fun_tpl_vars = $smarty->_tpl_vars; $smarty->assign($params);  ?>
        <?php $smarty->assign('deepLevel', $smarty->_tpl_vars['deepLevel']+1); ?>
        <?php $smarty->assign('oContentCat', $smarty->_tpl_vars['oView']->getContentCategory()); ?>
        <?php $_from = $smarty->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $smarty->_tpl_vars['_cat']):
?>
                      <?php if ($smarty->_tpl_vars['_cat']->getIsVisible()): ?>
                                <?php if ($smarty->_tpl_vars['_cat']->getContentCats() && $smarty->_tpl_vars['deepLevel'] > 1): ?>
                    <?php $_from = $smarty->_tpl_vars['_cat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $smarty->_tpl_vars['_oCont']):
?>
                    <li class="<?php if ($smarty->_tpl_vars['oContentCat'] && $smarty->_tpl_vars['oContentCat']->getId() == $smarty->_tpl_vars['_oCont']->getId()): ?> active <?php else: ?> end <?php endif; ?>" >
                        <a href="<?php echo $smarty->_tpl_vars['_oCont']->getLink(); ?>
"><?php echo $smarty->_tpl_vars['_oCont']->oxcontents__oxtitle->value; ?>
</a>
                    </li>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                                <?php if ($smarty->_tpl_vars['_cat']->oxcategories__oxtitle->value): ?>
                  <li class="<?php if ($smarty->_tpl_vars['level1counter']): ?>first <?php endif; ?><?php if (! $smarty->_tpl_vars['oContentCat'] && $smarty->_tpl_vars['act'] && $smarty->_tpl_vars['act']->getId() == $smarty->_tpl_vars['_cat']->getId()): ?>active<?php elseif ($smarty->_tpl_vars['_cat']->expanded): ?>exp<?php endif; ?><?php if (! $smarty->_tpl_vars['_cat']->hasVisibleSubCats): ?> end<?php endif; ?>">
                  <?php $smarty->assign('indent', $smarty->_tpl_vars['deepLevel']*8); ?>
                    <a href="<?php echo $smarty->_tpl_vars['_cat']->getLink(); ?>
" <?php if ($smarty->_tpl_vars['_cat']->expanded && $smarty->_tpl_vars['deepLevel'] == 1): ?>class="mainnav"<?php endif; ?>>
                      <?php echo $smarty->_tpl_vars['_cat']->oxcategories__oxtitle->value; ?>
 <?php if ($smarty->_tpl_vars['oView']->showCategoryArticlesCount() && ( $smarty->_tpl_vars['_cat']->getNrOfArticles() > 0 )): ?> (<?php echo $smarty->_tpl_vars['_cat']->getNrOfArticles(); ?>
)<?php endif; ?>
                    </a>
                    <?php if ($smarty->_tpl_vars['_cat']->getSubCats() && $smarty->_tpl_vars['_cat']->expanded): ?>
                        <ul><?php smarty_fun_tree($smarty, array('categories'=>$smarty->_tpl_vars['_cat']->getSubCats()));  ?></ul>
                    <?php endif; ?>
                  </li>
                <?php endif; ?>
                <?php $smarty->assign('level1counter', '0'); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    <?php  $smarty->_tpl_vars = $_fun_tpl_vars; }} smarty_fun_tree($this, array('categories'=>$this->_tpl_vars['categories']));  ?>
    </ul>
    </div>
<?php endif; ?>