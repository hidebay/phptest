<?php /* Smarty version 2.6.26, created on 2014-04-09 09:13:53
         compiled from page/details/inc/morepics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'page/details/inc/morepics.tpl', 6, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>page/details/inc/morepics.tpl</div><!-- page/details/inc/morepics.tpl template start --><?php if ($this->_tpl_vars['oView']->morePics()): ?>
<div class="otherPictures" id="morePicsContainer">
    <div class="shadowLine"></div>
    <ul class="clear">
    <?php echo smarty_function_oxscript(array('add' => "var aMorePic=new Array();"), $this);?>

    <?php $_from = $this->_tpl_vars['oView']->getIcons(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['sMorePics'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['sMorePics']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['iPicNr'] => $this->_tpl_vars['oArtIcon']):
        $this->_foreach['sMorePics']['iteration']++;
?>
        <li>
            <a id="morePics_<?php echo $this->_foreach['sMorePics']['iteration']; ?>
" rel="useZoom: 'zoom1', smallImage: '<?php echo $this->_tpl_vars['oPictureProduct']->getPictureUrl($this->_tpl_vars['iPicNr']); ?>
' " class="cloud-zoom-gallery" href="<?php echo $this->_tpl_vars['oPictureProduct']->getMasterZoomPictureUrl($this->_tpl_vars['iPicNr']); ?>
">
                <span class="marker"></span>
                <span class="artIcon"><img src="<?php echo $this->_tpl_vars['oPictureProduct']->getIconUrl($this->_tpl_vars['iPicNr']); ?>
" alt=""></span>
            </a>
        </li>
    <?php endforeach; endif; unset($_from); ?>
    </ul>
    </div>
<?php endif; ?>
<?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmorepictures.js",'priority' => 10), $this);?>

<?php echo smarty_function_oxscript(array('add' => "$('#morePicsContainer').oxMorePictures();"), $this);?>
<!-- page/details/inc/morepics.tpl template end -->