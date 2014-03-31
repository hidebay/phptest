<?php /* Smarty version 2.6.26, created on 2014-03-31 21:05:32
         compiled from widget/header/topcategories.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/header/topcategories.tpl', 2, false),array('function', 'oxstyle', 'widget/header/topcategories.tpl', 4, false),array('function', 'counter', 'widget/header/topcategories.tpl', 56, false),array('modifier', 'count', 'widget/header/topcategories.tpl', 20, false),array('modifier', 'ceil', 'widget/header/topcategories.tpl', 76, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/header/topcategories.tpl</div><!-- widget/header/topcategories.tpl template start --><?php echo smarty_function_oxscript(array('include' => "js/widgets/oxtopmenu.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('#navigation').oxTopMenu();"), $this);?>

<?php echo smarty_function_oxstyle(array('include' => "css/libs/superfish.css"), $this);?>

<?php $this->assign('homeSelected', 'false'); ?>
<?php if ($this->_tpl_vars['oView']->getClassName() == 'start'): ?>
    <?php $this->assign('homeSelected', 'true'); ?>
    <?php $this->assign('expandedCategory', $this->_tpl_vars['oView']->getActCategory()); ?>
    <?php if ($this->_tpl_vars['expandedCategory'] && $this->_tpl_vars['expandedCategory']->getExpanded()): ?>
        <?php $this->assign('homeSelected', 'false'); ?>
    <?php endif; ?> 
<?php endif; ?>
<?php $this->assign('oContentCat', $this->_tpl_vars['oView']->getContentCategory()); ?>

<ul id="navigation">
    
    <?php $this->assign('iAllCatCount', ((is_array($_tmp=$this->_tpl_vars['oxcmp_categories'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))); ?>
            <?php $this->assign('bHasMore', 'false'); ?>
        <?php $this->assign('iCatCnt', '0'); ?>
        <?php $this->assign('ebenecount', '0'); ?>
    <?php $_from = $this->_tpl_vars['oxcmp_categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['root'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['root']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['catkey'] => $this->_tpl_vars['ocat']):
        $this->_foreach['root']['iteration']++;
?>
      <?php if ($this->_tpl_vars['ocat']->getIsVisible()): ?>
        <?php $_from = $this->_tpl_vars['ocat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreTopCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreTopCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oTopCont']):
        $this->_foreach['MoreTopCms']['iteration']++;
?>
            <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
            <?php $this->assign('iAllCatCount', $this->_tpl_vars['iAllCatCount']+1); ?>
            <?php if (! $this->_tpl_vars['bHasMore'] && ( $this->_tpl_vars['iCatCnt'] >= $this->_tpl_vars['oView']->getTopNavigationCatCnt() )): ?>
                 <?php $this->assign('bHasMore', 'true'); ?>
                 <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
            <?php endif; ?>

            <?php if ($this->_tpl_vars['iCatCnt'] <= $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
                <li><a href="<?php echo $this->_tpl_vars['oTopCont']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
</a></li>
            <?php else: ?>
                <?php ob_start(); ?>
                    <li><a href="<?php echo $this->_tpl_vars['oTopCont']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['oTopCont']->oxcontents__oxtitle->value; ?>
</a></li>
                <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('moreLinks', ob_get_contents());ob_end_clean(); ?>
            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>

        <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
        <?php if (! $this->_tpl_vars['bHasMore'] && ( $this->_tpl_vars['iCatCnt'] >= $this->_tpl_vars['oView']->getTopNavigationCatCnt() )): ?>
                 <?php $this->assign('bHasMore', 'true'); ?>
                 <?php $this->assign('iCatCnt', $this->_tpl_vars['iCatCnt']+1); ?>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['iCatCnt'] <= $this->_tpl_vars['oView']->getTopNavigationCatCnt()): ?>
          <?php if ($this->_tpl_vars['ocat']->oxcategories__oxtitle->value): ?>
            <?php $this->assign('ebenecount', $this->_tpl_vars['ebenecount']+1); ?>
            <?php echo smarty_function_counter(array('print' => false,'assign' => 'countnum'), $this);?>

            <li class="ebene1_<?php echo $this->_tpl_vars['ebenecount']; ?>
 <?php if ($this->_tpl_vars['ocat']->expanded): ?>current<?php endif; ?>">
                <a  <?php if ($this->_tpl_vars['ocat']->expanded): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['ocat']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
<?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['ocat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['ocat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                <?php if ($this->_tpl_vars['ocat']->getSubCats()): ?>
                  <?php $this->assign('counter', '0'); ?>
                  <?php $this->assign('start', '0'); ?>
                  <?php $_from = $this->_tpl_vars['ocat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subcatkey'] => $this->_tpl_vars['osubcat']):
        $this->_foreach['SubCat']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                      <?php $this->assign('counter', $this->_tpl_vars['counter']+1); ?>
                      <?php $this->assign('start', '1'); ?>
                      <?php $_from = $this->_tpl_vars['osubcat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubSubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubSubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subsubcatkey'] => $this->_tpl_vars['osubsubcat']):
        $this->_foreach['SubSubCat']['iteration']++;
?>     
                        <?php if ($this->_tpl_vars['osubsubcat']->getIsVisible()): ?>                            
                          <?php $this->assign('counter', $this->_tpl_vars['counter']+1); ?>
                        <?php endif; ?>                                          
                      <?php endforeach; endif; unset($_from); ?>
                    <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?>
                  
                  <?php $this->assign('tmp', $this->_tpl_vars['counter']/4); ?>
                  <?php if ($this->_tpl_vars['tmp'] > 1.25): ?>
                    <?php $this->assign('max_cols', ((is_array($_tmp=$this->_tpl_vars['tmp'])) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>
                  <?php else: ?>
                    <?php $this->assign('max_cols', '4'); ?>
                  <?php endif; ?>
                  
                  <?php $this->assign('col_cnt', '0'); ?>
                  <?php $this->assign('row_counter', '1'); ?>
                  <?php $_from = $this->_tpl_vars['ocat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subcatkey'] => $this->_tpl_vars['osubcat']):
        $this->_foreach['SubCat']['iteration']++;
?>
                    <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                      <?php $this->assign('col_cnt', $this->_tpl_vars['col_cnt']+1); ?>
                      <?php $_from = $this->_tpl_vars['osubcat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubSubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubSubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subsubcatkey'] => $this->_tpl_vars['osubsubcat']):
        $this->_foreach['SubSubCat']['iteration']++;
?>     
                        <?php if ($this->_tpl_vars['osubsubcat']->getIsVisible()): ?>                            
                          <?php $this->assign('col_cnt', $this->_tpl_vars['col_cnt']+1); ?>
                        <?php endif; ?>                                          
                      <?php endforeach; endif; unset($_from); ?>
                      <?php if ($this->_tpl_vars['col_cnt'] > $this->_tpl_vars['max_cols']): ?>
                        <?php $this->assign('col_cnt', '0'); ?>
                        <?php $this->assign('row_counter', $this->_tpl_vars['row_counter']+1); ?>
                      <?php endif; ?>
                    <?php endif; ?>
                  <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                  <?php if ($this->_tpl_vars['start'] == 1 && $this->_tpl_vars['ocat']->getSubCats()): ?>
                    <ul><li>
                    <?php $this->assign('col_counter', '0'); ?>
                    <?php $_from = $this->_tpl_vars['ocat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subcatkey'] => $this->_tpl_vars['osubcat']):
        $this->_foreach['SubCat']['iteration']++;
?>
                      
                        <?php $this->assign('col_counter', $this->_tpl_vars['col_counter']+1); ?>
                        <?php if ($this->_foreach['SubCat']['iteration'] == 1): ?>
                        <?php $this->assign('cols', ((is_array($_tmp=$this->_foreach['SubCat']['total']/3)) ? $this->_run_mod_handler('ceil', true, $_tmp) : ceil($_tmp))); ?>
                          <div class="subCategories" style="width: <?php echo $this->_tpl_vars['row_counter']*150; ?>
px">
                            <ul>
                        <?php endif; ?>                         
                        <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                            <?php $_from = $this->_tpl_vars['osubcat']->getContentCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['MoreCms'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['MoreCms']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['ocont']):
        $this->_foreach['MoreCms']['iteration']++;
?>
                                <li><a href="<?php echo $this->_tpl_vars['ocont']->getLink(); ?>
"><?php echo $this->_tpl_vars['ocont']->oxcontents__oxtitle->value; ?>
</a></li>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php if ($this->_tpl_vars['osubcat']->getIsVisible()): ?>
                                <li<?php if ($this->_tpl_vars['osubcat']->expanded): ?> class="current"<?php endif; ?>>
                                    <a <?php if ($this->_tpl_vars['osubcat']->expanded): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['osubcat']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['osubcat']->oxcategories__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['osubcat']->oxcategories__oxtitle->value; ?>
 <?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['osubcat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['osubcat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                                    <?php if ($this->_tpl_vars['osubcat']->getSubCats()): ?>   
                                      <div class="sub">
                                        <ul>
                                        <?php $_from = $this->_tpl_vars['osubcat']->getSubCats(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['SubSubCat'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['SubSubCat']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['subsubcatkey'] => $this->_tpl_vars['osubsubcat']):
        $this->_foreach['SubSubCat']['iteration']++;
?> 
                                          <?php if ($this->_tpl_vars['osubsubcat']->getIsVisible()): ?>
                                            <?php $this->assign('col_counter', $this->_tpl_vars['col_counter']+1); ?>
                                            <li class="subsub">
                                              <a <?php if ($this->_tpl_vars['osubsubcat']->expanded): ?>class="current"<?php endif; ?> href="<?php echo $this->_tpl_vars['osubsubcat']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['osubsubcat']->oxcategories__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['osubsubcat']->oxcategories__oxtitle->value; ?>
 <?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['osubsubcat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['osubsubcat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                                            </li>
                                          <?php endif; ?>                                          
                                        <?php endforeach; endif; unset($_from); ?>
                                        </ul>
                                      </div>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                                                             
                            
                            <?php if ($this->_tpl_vars['col_counter'] > $this->_tpl_vars['max_cols']): ?>
                              <?php $this->assign('col_counter', '0'); ?>
                              </ul><ul>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </ul></div></li></ul>
                <?php endif; ?>              
            </li>
            <?php endif; ?>
        <?php else: ?>
            <?php ob_start(); ?>
               <li <?php if ($this->_tpl_vars['ocat']->expanded): ?>class="current"<?php endif; ?>>
                 <?php if ($this->_tpl_vars['ocat']->oxcategories__oxtitle->value): ?>
                    <a href="<?php echo $this->_tpl_vars['ocat']->getLink(); ?>
" title="<?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
"><?php echo $this->_tpl_vars['ocat']->oxcategories__oxtitle->value; ?>
<?php if ($this->_tpl_vars['oView']->showCategoryArticlesCount() && ( $this->_tpl_vars['ocat']->getNrOfArticles() > 0 )): ?> (<?php echo $this->_tpl_vars['ocat']->getNrOfArticles(); ?>
)<?php endif; ?></a>
                 <?php endif; ?>
               </li>
            <?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->append('moreLinks', ob_get_contents());ob_end_clean(); ?>
        <?php endif; ?>
      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php $this->assign('actCatregory', $this->_tpl_vars['oView']->getActiveCategory()); ?>
    
        
    </ul>
<!-- widget/header/topcategories.tpl template end -->