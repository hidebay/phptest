<?php /* Smarty version 2.6.26, created on 2014-04-09 09:13:53
         compiled from widget/reviews/reviews.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/reviews/reviews.tpl', 2, false),array('function', 'oxmultilang', 'widget/reviews/reviews.tpl', 20, false),array('function', 'oxid_include_dynamic', 'widget/reviews/reviews.tpl', 27, false),array('function', 'oxgetseourl', 'widget/reviews/reviews.tpl', 49, false),array('function', 'math', 'widget/reviews/reviews.tpl', 64, false),array('modifier', 'cat', 'widget/reviews/reviews.tpl', 49, false),array('modifier', 'date_format', 'widget/reviews/reviews.tpl', 61, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/reviews/reviews.tpl</div><!-- widget/reviews/reviews.tpl template start --><?php echo smarty_function_oxscript(array('include' => "js/widgets/oxrating.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#reviewRating' ).oxRating({openReviewForm: false, hideReviewButton: false});"), $this);?>

<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxreview.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#writeNewReview' ).oxReview();"), $this);?>

<div id="review">
    
        <?php if ($this->_tpl_vars['oxcmp_user']): ?>
            <form action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post" id="rating">
                <div id="writeReview">
                    <?php if ($this->_tpl_vars['oView']->canRate()): ?>
                        <input id="productRating" type="hidden" name="artrating" value="0">
                        <input id="recommListRating" type="hidden" name="recommlistrating" value="0">
                        <ul id="reviewRating" class="rating">
                            <li id="reviewCurrentRating" class="currentRate">
                                <a title="<?php echo $this->_tpl_vars['_star_title']; ?>
"></a>
                            </li>
                            <?php unset($this->_sections['star']);
$this->_sections['star']['name'] = 'star';
$this->_sections['star']['start'] = (int)1;
$this->_sections['star']['loop'] = is_array($_loop=6) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['star']['show'] = true;
$this->_sections['star']['max'] = $this->_sections['star']['loop'];
$this->_sections['star']['step'] = 1;
if ($this->_sections['star']['start'] < 0)
    $this->_sections['star']['start'] = max($this->_sections['star']['step'] > 0 ? 0 : -1, $this->_sections['star']['loop'] + $this->_sections['star']['start']);
else
    $this->_sections['star']['start'] = min($this->_sections['star']['start'], $this->_sections['star']['step'] > 0 ? $this->_sections['star']['loop'] : $this->_sections['star']['loop']-1);
if ($this->_sections['star']['show']) {
    $this->_sections['star']['total'] = min(ceil(($this->_sections['star']['step'] > 0 ? $this->_sections['star']['loop'] - $this->_sections['star']['start'] : $this->_sections['star']['start']+1)/abs($this->_sections['star']['step'])), $this->_sections['star']['max']);
    if ($this->_sections['star']['total'] == 0)
        $this->_sections['star']['show'] = false;
} else
    $this->_sections['star']['total'] = 0;
if ($this->_sections['star']['show']):

            for ($this->_sections['star']['index'] = $this->_sections['star']['start'], $this->_sections['star']['iteration'] = 1;
                 $this->_sections['star']['iteration'] <= $this->_sections['star']['total'];
                 $this->_sections['star']['index'] += $this->_sections['star']['step'], $this->_sections['star']['iteration']++):
$this->_sections['star']['rownum'] = $this->_sections['star']['iteration'];
$this->_sections['star']['index_prev'] = $this->_sections['star']['index'] - $this->_sections['star']['step'];
$this->_sections['star']['index_next'] = $this->_sections['star']['index'] + $this->_sections['star']['step'];
$this->_sections['star']['first']      = ($this->_sections['star']['iteration'] == 1);
$this->_sections['star']['last']       = ($this->_sections['star']['iteration'] == $this->_sections['star']['total']);
?>
                                <li class="s<?php echo $this->_sections['star']['index']; ?>
">
                                  <a class="ox-write-review ox-rateindex-<?php echo $this->_sections['star']['index']; ?>
" rel="nofollow" title="<?php echo $this->_sections['star']['index']; ?>
 <?php if ($this->_sections['star']['index'] == 1): ?><?php echo smarty_function_oxmultilang(array('ident' => 'STAR'), $this);?>
<?php else: ?><?php echo smarty_function_oxmultilang(array('ident' => 'STARS'), $this);?>
<?php endif; ?>"></a>
                                </li>
                            <?php endfor; endif; ?>
                        </ul>
                    <?php endif; ?>
                    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

                    <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

                    <?php echo smarty_function_oxid_include_dynamic(array('file' => "form/formparams.tpl"), $this);?>

                    <input type="hidden" name="fnc" value="savereview">
                    <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getTopActiveClassName(); ?>
">

                    <?php if ($this->_tpl_vars['oView']->getReviewType() == 'oxarticle'): ?>
                        <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['oView']->getArticleId(); ?>
">
                    <?php elseif ($this->_tpl_vars['oView']->getReviewType() == 'oxrecommlist'): ?>
                        <input type="hidden" name="recommid" value="<?php echo $this->_tpl_vars['oView']->getRecommListId(); ?>
">
                    <?php endif; ?>

                    <?php $this->assign('sReviewUserHash', $this->_tpl_vars['oView']->getReviewUserHash()); ?>
                    <?php if ($this->_tpl_vars['sReviewUserHash']): ?>
                        <input type="hidden" name="reviewuserhash" value="<?php echo $this->_tpl_vars['sReviewUserHash']; ?>
">
                    <?php endif; ?>

                    <textarea  rows="15" name="rvw_txt" class="areabox"></textarea><br>
                    <button id="reviewSave" type="submit" class="submitButton"><?php echo smarty_function_oxmultilang(array('ident' => 'SAVE_RATING_AND_REVIEW'), $this);?>
</button>
                </div>
            </form>
            <a id="writeNewReview" rel="nofollow"><b><?php echo smarty_function_oxmultilang(array('ident' => 'WRITE_REVIEW'), $this);?>
</b></a>
        <?php else: ?>
            <?php $this->assign('sArticleNId', $this->_tpl_vars['oView']->getArticleNId()); ?>
            <a id="reviewsLogin" rel="nofollow" href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['sArticleNId']))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getTopActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getTopActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"><b><?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_LOGIN_TO_WRITE_REVIEW'), $this);?>
</b></a>
        <?php endif; ?>
    

    <?php $this->assign('aReviews', $this->_tpl_vars['oView']->getReviews()); ?>
    <?php if ($this->_tpl_vars['aReviews']): ?>
        <?php $_from = $this->_tpl_vars['aReviews']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['ReviewsCounter'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['ReviewsCounter']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['review']):
        $this->_foreach['ReviewsCounter']['iteration']++;
?>
            <dl>
                
                    <dt id="reviewName_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
" class="clear item">
                        <span>
                            <span><?php echo $this->_tpl_vars['review']->oxuser__oxfname->value; ?>
</span> <?php echo smarty_function_oxmultilang(array('ident' => 'WRITES','suffix' => 'COLON'), $this);?>

                            <span><?php echo ((is_array($_tmp=$this->_tpl_vars['review']->oxreviews__oxcreate->value)) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d.%m.%Y") : smarty_modifier_date_format($_tmp, "%d.%m.%Y")); ?>
</span>
                        </span>
                        <?php if ($this->_tpl_vars['review']->oxreviews__oxrating->value): ?>
                            <?php echo smarty_function_math(array('equation' => "x*y",'x' => 20,'y' => $this->_tpl_vars['review']->oxreviews__oxrating->value,'assign' => 'iRatingAverage'), $this);?>

                            <ul class="rating">
                                <li class="currentRate" style="width: <?php echo $this->_tpl_vars['iRatingAverage']; ?>
%;"></li>
                            </ul>
                        <?php endif; ?>
                    </dt>
                    <dd>
                        <div id="reviewText_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
" class="description"><?php echo $this->_tpl_vars['review']->oxreviews__oxtext->value; ?>
</div>
                    </dd>
                
            </dl>
        <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
        <dl>
            <dt id="reviewName_<?php echo $this->_foreach['ReviewsCounter']['iteration']; ?>
">
                <?php echo smarty_function_oxmultilang(array('ident' => 'NO_REVIEW_AVAILABLE'), $this);?>

            </dt>
            <dd></dd>
        </dl>
    <?php endif; ?>

</div>
<?php echo smarty_function_oxscript(array('widget' => $this->_tpl_vars['oView']->getClassName()), $this);?>
<!-- widget/reviews/reviews.tpl template end -->