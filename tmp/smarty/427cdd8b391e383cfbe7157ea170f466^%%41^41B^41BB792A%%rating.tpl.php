<?php /* Smarty version 2.6.26, created on 2014-04-09 09:13:53
         compiled from widget/reviews/rating.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'widget/reviews/rating.tpl', 2, false),array('function', 'math', 'widget/reviews/rating.tpl', 6, false),array('function', 'oxgetseourl', 'widget/reviews/rating.tpl', 25, false),array('function', 'oxmultilang', 'widget/reviews/rating.tpl', 38, false),array('modifier', 'oxmultilangassign', 'widget/reviews/rating.tpl', 9, false),array('modifier', 'cat', 'widget/reviews/rating.tpl', 25, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>widget/reviews/rating.tpl</div><!-- widget/reviews/rating.tpl template start --><?php echo smarty_function_oxscript(array('include' => "js/widgets/oxrating.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$( '#itemRating' ).oxRating();"), $this);?>


<ul id="itemRating" class="rating">
    <?php echo smarty_function_math(array('equation' => "x*y",'x' => 20,'y' => $this->_tpl_vars['oView']->getRatingValue(),'assign' => 'iRatingAverage'), $this);?>


    <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='MESSAGE_LOGIN_TO_RATE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php elseif (! $this->_tpl_vars['oView']->canRate()): ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='MESSAGE_ALREADY_RATED')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php else: ?>
        <?php $this->assign('_star_title', ((is_array($_tmp='MESSAGE_RATE_THIS_ARTICLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
    <?php endif; ?>

    <li class="currentRate" style="width: <?php echo $this->_tpl_vars['iRatingAverage']; ?>
%;">
        <a title="<?php echo $this->_tpl_vars['_star_title']; ?>
"></a>
        <span title="<?php echo $this->_tpl_vars['iRatingAverage']; ?>
"></span>
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
            <a  class="<?php if ($this->_tpl_vars['oView']->canRate()): ?>ox-write-review<?php endif; ?> ox-rateindex-<?php echo $this->_sections['star']['index']; ?>
" rel="nofollow"
                <?php if (! $this->_tpl_vars['oxcmp_user']): ?>
                    <?php $this->assign('sAnid', $this->_tpl_vars['oView']->getArticleNId()); ?>
                    href="<?php echo smarty_function_oxgetseourl(array('ident' => ((is_array($_tmp=$this->_tpl_vars['oViewConf']->getSelfLink())) ? $this->_run_mod_handler('cat', true, $_tmp, "cl=account") : smarty_modifier_cat($_tmp, "cl=account")),'params' => ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp="anid=".($this->_tpl_vars['sAnid']))) ? $this->_run_mod_handler('cat', true, $_tmp, "&amp;sourcecl=") : smarty_modifier_cat($_tmp, "&amp;sourcecl=")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getTopActiveClassName()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getTopActiveClassName())))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oViewConf']->getNavUrlParams()))), $this);?>
"
                <?php elseif ($this->_tpl_vars['oView']->canRate()): ?>
                    href="#review"
                <?php endif; ?>
                title="<?php echo $this->_tpl_vars['_star_title']; ?>
">
            </a>
         </li>
    <?php endfor; endif; ?>
    <li class="ratingValue">
        <a id="itemRatingText" class="rates" rel="nofollow" <?php if ($this->_tpl_vars['sRateUrl']): ?>href="<?php if (! $this->_tpl_vars['oxcmp_user']): ?><?php echo smarty_function_oxgetseourl(array('ident' => $this->_tpl_vars['sRateUrl'],'params' => $this->_tpl_vars['sRateUrlParams']), $this);?>
<?php else: ?><?php echo $this->_tpl_vars['sRateUrl']; ?>
<?php endif; ?>#review"<?php endif; ?>>
            <?php if ($this->_tpl_vars['oView']->getRatingCount()): ?>
                (<?php echo $this->_tpl_vars['oView']->getRatingCount(); ?>
)
            <?php else: ?>
                <?php echo smarty_function_oxmultilang(array('ident' => 'NO_RATINGS'), $this);?>

            <?php endif; ?>
        </a>
    </li>
</ul>
<?php echo smarty_function_oxscript(array('widget' => $this->_tpl_vars['oView']->getClassName()), $this);?>



<!-- widget/reviews/rating.tpl template end -->