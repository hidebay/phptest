<?php /* Smarty version 2.6.26, created on 2014-04-11 14:46:52
         compiled from page/details/inc/productmain.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'page/details/inc/productmain.tpl', 8, false),array('modifier', 'strip_tags', 'page/details/inc/productmain.tpl', 59, false),array('modifier', 'oxmultilangassign', 'page/details/inc/productmain.tpl', 257, false),array('modifier', 'strip', 'page/details/inc/productmain.tpl', 351, false),array('modifier', 'escape', 'page/details/inc/productmain.tpl', 351, false),array('function', 'oxscript', 'page/details/inc/productmain.tpl', 15, false),array('function', 'oxmultilang', 'page/details/inc/productmain.tpl', 58, false),array('function', 'oxprice', 'page/details/inc/productmain.tpl', 241, false),array('block', 'oxhasrights', 'page/details/inc/productmain.tpl', 31, false),)), $this); ?>
<?php $this->assign('aVariantSelections', $this->_tpl_vars['oView']->getVariantSelections()); ?>

<?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['rawselections']): ?>
    <?php $this->assign('_sSelectionHashCollection', ""); ?>
    <?php $_from = $this->_tpl_vars['aVariantSelections']['rawselections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oSelectionList']):
?>
        <?php $this->assign('_sSelectionHash', ""); ?>
        <?php $_from = $this->_tpl_vars['oSelectionList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iPos'] => $this->_tpl_vars['oListItem']):
?>
            <?php $this->assign('_sSelectionHash', ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['_sSelectionHash'])) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['iPos']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['iPos'])))) ? $this->_run_mod_handler('cat', true, $_tmp, ":") : smarty_modifier_cat($_tmp, ":")))) ? $this->_run_mod_handler('cat', true, $_tmp, $this->_tpl_vars['oListItem']['hash']) : smarty_modifier_cat($_tmp, $this->_tpl_vars['oListItem']['hash'])))) ? $this->_run_mod_handler('cat', true, $_tmp, "|") : smarty_modifier_cat($_tmp, "|"))); ?>
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['_sSelectionHash']): ?>
            <?php if ($this->_tpl_vars['_sSelectionHashCollection']): ?><?php $this->assign('_sSelectionHashCollection', ((is_array($_tmp=$this->_tpl_vars['_sSelectionHashCollection'])) ? $this->_run_mod_handler('cat', true, $_tmp, ",") : smarty_modifier_cat($_tmp, ","))); ?><?php endif; ?>
            <?php $this->assign('_sSelectionHashCollection', ((is_array($_tmp=$this->_tpl_vars['_sSelectionHashCollection'])) ? $this->_run_mod_handler('cat', true, $_tmp, "'".($this->_tpl_vars['_sSelectionHash'])."'") : smarty_modifier_cat($_tmp, "'".($this->_tpl_vars['_sSelectionHash'])."'"))); ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php echo smarty_function_oxscript(array('add' => "oxVariantSelections  = [".($this->_tpl_vars['_sSelectionHashCollection'])."];"), $this);?>


    <form class="js-oxWidgetReload" action="<?php echo $this->_tpl_vars['oView']->getWidgetLink(); ?>
" method="get">
        <div>
            <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

            <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

            <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oView']->getClassName(); ?>
">
            <input type="hidden" name="oxwparent" value="<?php echo $this->_tpl_vars['oViewConf']->getTopActiveClassName(); ?>
">
            <input type="hidden" name="listtype" value="<?php echo $this->_tpl_vars['oView']->getListType(); ?>
">
            <input type="hidden" name="nocookie" value="1">
            <input type="hidden" name="cnid" value="<?php echo $this->_tpl_vars['oView']->getCategoryId(); ?>
">
            <input type="hidden" name="anid" value="<?php if (! $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value): ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
<?php else: ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value; ?>
<?php endif; ?>">
            <input type="hidden" name="actcontrol" value="<?php echo $this->_tpl_vars['oViewConf']->getTopActiveClassName(); ?>
">
        </div>
    </form>
<?php endif; ?>
<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    <form class="js-oxProductForm" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfActionLink(); ?>
" method="post">
        <div>
            <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

            <?php echo $this->_tpl_vars['oViewConf']->getNavFormParams(); ?>

            <input type="hidden" name="cl" value="<?php echo $this->_tpl_vars['oViewConf']->getTopActiveClassName(); ?>
">
            <input type="hidden" name="aid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
">
            <input type="hidden" name="anid" value="<?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxnid->value; ?>
">
            <input type="hidden" name="parentid" value="<?php if (! $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value): ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxid->value; ?>
<?php else: ?><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxparentid->value; ?>
<?php endif; ?>">
            <input type="hidden" name="panid" value="">
            <?php if (! $this->_tpl_vars['oDetailsProduct']->isNotBuyable()): ?>
                <input type="hidden" name="fnc" value="tobasket">
            <?php endif; ?>
        </div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<div class="detailsInfo clear">
        
        <?php echo smarty_function_oxscript(array('include' => "js/libs/cloudzoom.js",'priority' => 10), $this);?>

        <?php if ($this->_tpl_vars['oView']->showZoomPics()): ?>
            <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js",'priority' => 10), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('#zoomTrigger').oxModalPopup({target:'#zoomModal'});"), $this);?>

            <a id="zoomTrigger" rel="nofollow" href="#">Zoom</a>
            <?php echo smarty_function_oxscript(array('add' => "$('#zoom1').attr( 'rel', $('#zoom1').attr('data-zoomparams'));"), $this);?>

            <?php echo smarty_function_oxscript(array('add' => "$('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();"), $this);?>

            <div class="picture">
                <a href="<?php echo $this->_tpl_vars['oPictureProduct']->getMasterZoomPictureUrl(1); ?>
" class="cloud-zoom" id="zoom1" rel='' data-zoomparams="adjustY:-2, zoomWidth:'354', fixZoomWindow:'390', trImg:'<?php echo $this->_tpl_vars['oViewConf']->getImageUrl('dot.png'); ?>
', loadingText:'<?php echo smarty_function_oxmultilang(array('ident' => 'LOADING'), $this);?>
'">
                    <img src="<?php echo $this->_tpl_vars['oView']->getActPicture(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxvarselect->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
                </a>
            </div>
        <?php else: ?>
            <div class="picture">
                <img src="<?php echo $this->_tpl_vars['oView']->getActPicture(); ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxtitle->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['oPictureProduct']->oxarticles__oxvarselect->value)) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)); ?>
">
            </div>
        <?php endif; ?>
    

        <div class="information">

        <?php $this->assign('oManufacturer', $this->_tpl_vars['oView']->getManufacturer()); ?>
        <div class="productMainInfo<?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?> hasBrand<?php endif; ?>">

                        
                <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticleactionlinksselect.js",'priority' => 10), $this);?>

                <?php echo smarty_function_oxscript(array('add' => "$( '#productTitle' ).oxArticleActionLinksSelect();"), $this);?>

                <h1 id="productTitle"><span><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxtitle->value; ?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxvarselect->value; ?>
</span></h1>
            

                        <div id="showLinksOnce"></div>
            
                        
                <span id="productArtnum" class="itemCode"><?php echo smarty_function_oxmultilang(array('ident' => 'PRODUCT_NO','suffix' => 'COLON'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxartnum->value; ?>
</span>
            

                        <?php if ($this->_tpl_vars['oView']->ratingIsActive()): ?>
            
                <div class="rating clear">
                    <?php if ($this->_tpl_vars['oxcmp_user']): ?>
                        <?php $this->assign('force_sid', $this->_tpl_vars['oView']->getSidForWidget()); ?>
                    <?php endif; ?>
                    </div>
            
            <?php endif; ?>
        </div>

        
            <?php if ($this->_tpl_vars['oManufacturer']->oxmanufacturers__oxicon->value): ?>
                <img src="<?php echo $this->_tpl_vars['oManufacturer']->getIconUrl(); ?>
" alt="<?php echo $this->_tpl_vars['oManufacturer']->oxmanufacturers__oxtitle->value; ?>
">
            <?php endif; ?>
        

                
            <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWSHORTDESCRIPTION')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxshortdesc->value): ?>
                    <div class="shortDescription description" id="productShortdesc"><?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxshortdesc->value; ?>
</div>
                <?php endif; ?>
            <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
        

        <?php $this->assign('blCanBuy', true); ?>
                
            <?php if ($this->_tpl_vars['aVariantSelections'] && $this->_tpl_vars['aVariantSelections']['selections']): ?>
                <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxajax.js",'priority' => 10), $this);?>

                <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxarticlevariant.js",'priority' => 10), $this);?>

                <?php echo smarty_function_oxscript(array('add' => "$( '#variants' ).oxArticleVariant(); "), $this);?>

                <?php $this->assign('blCanBuy', $this->_tpl_vars['aVariantSelections']['blPerfectFit']); ?>
                <div id="variants" class="selectorsBox js-fnSubmit clear">
                    <?php $this->assign('blHasActiveSelections', false); ?>
                    <?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['iKey'] => $this->_tpl_vars['oList']):
?>
                        <?php if ($this->_tpl_vars['oList']->getActiveSelection()): ?>
                            <?php $this->assign('blHasActiveSelections', true); ?>
                        <?php endif; ?>
                        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'iKey' => $this->_tpl_vars['iKey'],'blInDetails' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                    <?php endforeach; endif; unset($_from); ?>
                </div>

                <?php if ($this->_tpl_vars['blHasActiveSelections']): ?>
                    <div class="variantReset">
                                                <a href="" class="reset"><?php echo smarty_function_oxmultilang(array('ident' => 'RESET_SELECTION'), $this);?>
</a>

                                                <label><?php echo smarty_function_oxmultilang(array('ident' => 'SELECTED_COMBINATION','suffix' => 'COLON'), $this);?>
</label>
                        <?php $this->assign('sSelectionSep', ""); ?>
                        <?php echo ''; ?><?php $_from = $this->_tpl_vars['aVariantSelections']['selections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['variantselections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['variantselections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oSelectionList']):
        $this->_foreach['variantselections']['iteration']++;
?><?php echo ''; ?><?php $this->assign('oActiveSelection', $this->_tpl_vars['oSelectionList']->getActiveSelection()); ?><?php echo ''; ?><?php if ($this->_tpl_vars['oActiveSelection']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['sSelectionSep']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['oActiveSelection']->getName(); ?><?php echo ''; ?><?php $this->assign('sSelectionSep', ", "); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>

                    </div>
                <?php else: ?>
                    <?php if (! $this->_tpl_vars['blCanBuy'] && ! $this->_tpl_vars['oDetailsProduct']->isParentNotBuyable()): ?>
                        <?php $this->assign('blCanBuy', true); ?>
                    <?php endif; ?>
                <?php endif; ?>
                    <?php if (! $this->_tpl_vars['blCanBuy']): ?>
                        <div class="variantMessage"><?php echo smarty_function_oxmultilang(array('ident' => 'DETAILS_CHOOSEVARIANT'), $this);?>
</div>
                    <?php endif; ?>

            <?php endif; ?>
        

                
            <?php if ($this->_tpl_vars['oViewConf']->showSelectLists()): ?>
                <?php $this->assign('oSelections', $this->_tpl_vars['oDetailsProduct']->getSelections()); ?>
                <?php if ($this->_tpl_vars['oSelections']): ?>
                    <div class="selectorsBox js-fnSubmit clear" id="productSelections">
                        <?php $_from = $this->_tpl_vars['oSelections']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['selections'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['selections']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['oList']):
        $this->_foreach['selections']['iteration']++;
?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/product/selectbox.tpl", 'smarty_include_vars' => array('oSelectionList' => $this->_tpl_vars['oList'],'sFieldName' => 'sel','iKey' => ($this->_foreach['selections']['iteration']-1),'blHideDefault' => true,'sSelType' => 'seldrop')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        

        <div class="tobasket">

                        
                <?php if ($this->_tpl_vars['oView']->isPersParam()): ?>
                    <div class="persparamBox clear">
                        <label for="persistentParam"><?php echo smarty_function_oxmultilang(array('ident' => 'LABEL','suffix' => 'COLON'), $this);?>
</label><input type="text" id="persistentParam" name="persparam[details]" value="<?php echo $this->_tpl_vars['oDetailsProduct']->aPersistParam['text']; ?>
" size="35">
                    </div>
                <?php endif; ?>
            

            
                <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                    <?php if ($this->_tpl_vars['oDetailsProduct']->getTPrice()): ?>
                        <p class="oldPrice">
                            <strong><?php echo smarty_function_oxmultilang(array('ident' => 'REDUCED_FROM_2'), $this);?>
 <del><?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oDetailsProduct']->getTPrice(),'currency' => $this->_tpl_vars['currency']), $this);?>
</del></strong>
                        </p>
                    <?php endif; ?>
                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
            

            <div class="tobasketFunction clear">
                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'SHOWARTICLEPRICE')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if ($this->_tpl_vars['oDetailsProduct']->getPrice()): ?>
                            <label id="productPrice" class="price">
                                <?php $this->assign('sFrom', ""); ?>
                                <?php $this->assign('oPrice', $this->_tpl_vars['oDetailsProduct']->getPrice()); ?>
                                <?php if ($this->_tpl_vars['oDetailsProduct']->isParentNotBuyable()): ?>
                                    <?php $this->assign('oPrice', $this->_tpl_vars['oDetailsProduct']->getVarMinPrice()); ?>
                                    <?php if ($this->_tpl_vars['oDetailsProduct']->isRangePrice()): ?>
                                        <?php $this->assign('sFrom', ((is_array($_tmp='PRICE_FROM')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp))); ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <strong >
                                    <span><?php echo $this->_tpl_vars['sFrom']; ?>
 <?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oPrice'],'currency' => $this->_tpl_vars['currency']), $this);?>
</span>
                                    <?php if ($this->_tpl_vars['oView']->isVatIncluded()): ?>
                                    <span>*</span>
                                    <?php endif; ?>
                                </strong>
                            </label>
                        <?php endif; ?>
                        <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxamountpriceselect.js",'priority' => 10), $this);?>

                        <?php if ($this->_tpl_vars['oDetailsProduct']->loadAmountPriceInfo()): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/priceinfo.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                

                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if (! $this->_tpl_vars['oDetailsProduct']->isNotBuyable()): ?>
                            <input id="amountToBasket" type="text" name="am" value="1" size="3" autocomplete="off" class="textbox">
                            <button id="toBasket" type="submit" <?php if (! $this->_tpl_vars['blCanBuy']): ?>disabled="disabled"<?php endif; ?> class="submitButton largeButton"><?php echo smarty_function_oxmultilang(array('ident' => 'TO_CART'), $this);?>
</button>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                
            </div>
           
			            
                        <div class="additionalInfo clear">
                
                    <?php if ($this->_tpl_vars['oDetailsProduct']->getUnitPrice()): ?>
                        <span id="productPriceUnit"><?php echo $this->_tpl_vars['oDetailsProduct']->getUnitQuantity(); ?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->getUnitName(); ?>
 | <?php echo smarty_function_oxprice(array('price' => $this->_tpl_vars['oDetailsProduct']->getUnitPrice()), $this);?>
 <?php echo $this->_tpl_vars['currency']->sign; ?>
/<?php echo $this->_tpl_vars['oDetailsProduct']->getUnitName(); ?>
 </span>
                    <?php endif; ?>
                
                
                                        <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__bnflagbestand->value == 2): ?>
                        <span class="stockFlag notOnStock">
                            <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxnostocktext->value): ?>
                                <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxnostocktext->value; ?>

                            <?php elseif ($this->_tpl_vars['oViewConf']->getStockOffDefaultMessage()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'MESSAGE_NOT_ON_STOCK'), $this);?>

                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['oDetailsProduct']->getDeliveryDate()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'AVAILABLE_ON'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->getDeliveryDate(); ?>

                            <?php endif; ?>
                        </span>
                                        <?php elseif ($this->_tpl_vars['oDetailsProduct']->oxarticles__bnflagbestand->value == 1): ?>
                        <span class="stockFlag lowStock">
                            <?php echo smarty_function_oxmultilang(array('ident' => 'LOW_STOCK'), $this);?>

                        </span>
                                        <?php elseif ($this->_tpl_vars['oDetailsProduct']->oxarticles__bnflagbestand->value == 0): ?>
                        <span class="stockFlag">
                            <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxstocktext->value): ?>
                                <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxstocktext->value; ?>

                            <?php elseif ($this->_tpl_vars['oViewConf']->getStockOnDefaultMessage()): ?>
                                <?php echo smarty_function_oxmultilang(array('ident' => 'READY_FOR_SHIPPING'), $this);?>

                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                
                
                    <?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                        <?php if ($this->_tpl_vars['oDetailsProduct']->isBuyable()): ?>
                            <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/deliverytime.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                        <?php endif; ?>
                    <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                

                
                    <?php if ($this->_tpl_vars['oDetailsProduct']->oxarticles__oxweight->value): ?>
                        <span id="productWeight"><?php echo smarty_function_oxmultilang(array('ident' => 'WEIGHT','suffix' => 'COLON'), $this);?>
 <?php echo $this->_tpl_vars['oDetailsProduct']->oxarticles__oxweight->value; ?>
 <?php echo smarty_function_oxmultilang(array('ident' => 'KG'), $this);?>
</span>
                    <?php endif; ?>
                

            </div>

            
                <div class="social">
                    <?php if (( $this->_tpl_vars['oView']->isActive('FbShare') || $this->_tpl_vars['oView']->isActive('FbLike') && $this->_tpl_vars['oViewConf']->getFbAppId() )): ?>
                        <?php if ($this->_tpl_vars['oView']->isActive('FacebookConfirm') && ! $this->_tpl_vars['oView']->isFbWidgetVisible()): ?>
                            <div class="socialButton" id="productFbShare">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/share.tpl",'ident' => "#productFbShare")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                                <?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/like.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('fbfile', ob_get_contents()); ob_end_clean();
 ?>
                                <?php $this->assign('fbfile', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['fbfile'])) ? $this->_run_mod_handler('strip', true, $_tmp) : smarty_modifier_strip($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : smarty_modifier_escape($_tmp, 'url'))); ?>
                                <?php echo smarty_function_oxscript(array('add' => "oxFacebook.buttons['#productFbLike']={html:'".($this->_tpl_vars['fbfile'])."',script:''};"), $this);?>

                            </div>
                            <div class="socialButton" id="productFbLike"></div>
                        <?php else: ?>
                            <div class="socialButton" id="productFbShare">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/share.tpl",'ident' => "#productFbShare")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                            <div class="socialButton" id="productFbLike">
                                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "widget/facebook/enable.tpl", 'smarty_include_vars' => array('source' => "widget/facebook/like.tpl",'ident' => "#productFbLike")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            
        </div>
    </div>
</div>

<?php $this->_tag_stack[] = array('oxhasrights', array('ident' => 'TOBASKET')); $_block_repeat=true;smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
    </form>

<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxhasrights($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/morepics.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "page/details/inc/zoompopup.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>