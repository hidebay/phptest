<?php /* Smarty version 2.6.26, created on 2014-03-17 14:40:48
         compiled from layout/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'oxscript', 'layout/footer.tpl', 3, false),array('function', 'oxmultilang', 'layout/footer.tpl', 28, false),array('block', 'oxifcontent', 'layout/footer.tpl', 30, false),)), $this); ?>
<div style='position: absolute; z-index:9999;color:white;background: #789;
                 padding:0 15 0 15'>layout/footer.tpl</div><!-- layout/footer.tpl template start -->
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxequalizer.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$(function(){oxEqualizer.equalHeight($( '#panel dl' ));});"), $this);?>

    <div id="footer">
        <div>
                
                
                    <dl id="footerInformation">
                        <dt><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_INFORMATION'), $this);?>
</dt>
                        <dd>
                        <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'trofooterinfo','object' => 'oContent')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                          <?php echo $this->_tpl_vars['oContent']->oxcontents__oxcontent->value; ?>

                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                        </dd>
                    </dl>
                

                
                    <dl class="services" id="footerServices">
                  <!--<div--><dt id="service1"><!--<dt>--><strong><?php echo smarty_function_oxmultilang(array('ident' => 'FOOTER_SERVICES'), $this);?>
</strong>
                        </dt><!--</div>-->
                        <dd id="service2"><!--<dd>-->
                        <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'trofooterservice','object' => 'oContent')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
                          <?php echo $this->_tpl_vars['oContent']->oxcontents__oxcontent->value; ?>

                        <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
                                                <!--</dd>--></dd>
                    </dl>
                    
                
                
                <?php $this->_tag_stack[] = array('oxifcontent', array('ident' => 'trofooterprodukt','object' => 'oContent')); $_block_repeat=true;smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>          
                                        <dl id="mwst">
                        <dt id="footerrechtsueb"><!--<dt>--><strong><?php echo $this->_tpl_vars['oContent']->oxcontents__oxtitle->value; ?>
</strong><!--</dt>--></dt>
                        <dd id="footerrechts"><!--<dd>-->
                                                                            <?php echo $this->_tpl_vars['oContent']->oxcontents__oxcontent->value; ?>

                                                <!--</dd>--></dd>
                    </dl>
                <?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_oxifcontent($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>                    
                
				
            
            
                    </div>
            </div>

<?php if ($this->_tpl_vars['oView']->isRootCatChanged()): ?>
    <?php echo smarty_function_oxscript(array('include' => "js/widgets/oxmodalpopup.js",'priority' => 10), $this);?>

    <?php echo smarty_function_oxscript(array('add' => "$( '#scRootCatChanged' ).oxModalPopup({ target: '#scRootCatChanged', openDialog: true});"), $this);?>

    <div id="scRootCatChanged" class="popupBox corners FXgradGreyLight glowShadow">
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "form/privatesales/basketexcl.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </div>
<?php endif; ?>
<?php 
$date = getdate();
echo "Diese Seite haben wir am ".($date["mday"]-rand(1, 3)).".".$date["mon"].".".$date["year"]." um ";

if($date["hours"] > 12){
	echo ($date["hours"]-rand(1, 12));
}else{
	echo ($date["hours"] +rand(1,12));
}	
echo ":";
if($date["minutes"] > 29){
	echo ($date["minutes"]-rand(1, 19));
}else{
	echo ($date["minutes"] +rand(1,29));
}	
echo ":";
if($date["seconds"] > 29){
	echo ($date["seconds"]-rand(1, 19));
}else{
	echo ($date["seconds"] +rand(1,29));
}	
echo " aktualisiert. ";
$datei = fopen("counter.txt","r+");
$counterstand = fgets($datei, 10);
if($counterstand == "")
{
  $counterstand = 0;
}
$counterstand++;
echo "Seit dem 20.03.2013 hatten wir <div id='besucher'>".$counterstand." Besucher</div>";
rewind($datei);
fwrite($datei, $counterstand);
fclose($datei);
 ?>
<p>&copy; 1998-<?php  echo date("Y");  ?> All rights reserved</p>

<!-- layout/footer.tpl template end -->