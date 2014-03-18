<?php /* Smarty version 2.6.26, created on 2014-03-18 13:54:12
         compiled from voucherserie_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'voucherserie_main.tpl', 1, false),array('modifier', 'oxformdate', 'voucherserie_main.tpl', 65, false),array('function', 'oxmultilang', 'voucherserie_main.tpl', 44, false),array('function', 'oxinputhelp', 'voucherserie_main.tpl', 48, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['readonly']): ?>
    <?php $this->assign('readonly', 'readonly disabled'); ?>
<?php else: ?>
    <?php $this->assign('readonly', ""); ?>
<?php endif; ?>

<script type="text/javascript">
<!--
function changeFnc( fncName )
{
    var langvar = document.myedit.elements['fnc'];
    if (langvar != null )
        langvar.value = fncName;
}
//-->
</script>

<form name="transfer" id="transfer" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="cl" value="voucherserie_main">
</form>



<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext" width="355">

<form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
<?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

<input type="hidden" name="cl" value="voucherserie_main">
<input type="hidden" name="fnc" value="save">
<input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="editval[oxvoucherseries__oxid]" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="randomNr" value="true">

        <table cellspacing="2" cellpadding="0" border="0">
        
            <tr>
                <td class="edittext" width="160">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NAME'), $this);?>

                </td>
                <td class="edittext" width="195">
                <input class="editinput" type="text" size="36" name="editval[oxvoucherseries__oxserienr]" value="<?php echo $this->_tpl_vars['edit']->oxvoucherseries__oxserienr->value; ?>
" onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_NAME'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext" width="90">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_DESCRIPTION'), $this);?>

                </td>
                <td class="edittext">
                <input class="editinput" type="text" size="36" name="editval[oxvoucherseries__oxseriedescription]" value="<?php echo $this->_tpl_vars['edit']->oxvoucherseries__oxseriedescription->value; ?>
" onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_DESCRIPTION'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_BEGINDATE'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="27" name="editval[oxvoucherseries__oxbegindate]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['edit']->oxvoucherseries__oxbegindate)) ? $this->_run_mod_handler('oxformdate', true, $_tmp) : smarty_modifier_oxformdate($_tmp)); ?>
" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help.tpl", 'smarty_include_vars' => array('helpid' => 'article_vonbis')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_BEGINDATE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ENDDATE'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="27" name="editval[oxvoucherseries__oxenddate]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['edit']->oxvoucherseries__oxenddate)) ? $this->_run_mod_handler('oxformdate', true, $_tmp) : smarty_modifier_oxformdate($_tmp)); ?>
" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help.tpl", 'smarty_include_vars' => array('helpid' => 'article_vonbis')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_ENDDATE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_DISCOUNT'), $this);?>

                </td>
                <td class="edittext">
                <input class="editinput" type="text" size="15" name="editval[oxvoucherseries__oxdiscount]" value="<?php echo $this->_tpl_vars['edit']->oxvoucherseries__oxdiscount->value; ?>
" onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <select class="editinput" name="editval[oxvoucherseries__oxdiscounttype]" <?php echo $this->_tpl_vars['readonly']; ?>
>
                    <option value="absolute" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxdiscounttype->value == 'absolute'): ?>selected<?php endif; ?>>abs</option>
                    <option value="percent" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxdiscounttype->value == 'percent'): ?>selected<?php endif; ?>>%</option>
                </select>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_DISCOUNT'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_MINORDERPRICE'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="15" name="editval[oxvoucherseries__oxminimumvalue]" value="<?php echo $this->_tpl_vars['edit']->oxvoucherseries__oxminimumvalue->value; ?>
" onClick="this.select()" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_MINORDERPRICE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_ALLOWSAMESERIES'), $this);?>

                </td>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_YES'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowsameseries]" value="1" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxallowsameseries->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>&nbsp;&nbsp;
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NO'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowsameseries]" value="0" <?php if (! $this->_tpl_vars['edit']->oxvoucherseries__oxallowsameseries->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_ALLOWSAMESERIES'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_ALLOWOTHERSERIES'), $this);?>

                </td>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_YES'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowotherseries]" value="1" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxallowotherseries->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>&nbsp;&nbsp;
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NO'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowotherseries]" value="0" <?php if (! $this->_tpl_vars['edit']->oxvoucherseries__oxallowotherseries->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_ALLOWOTHERSERIES'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_SAMESEROTHERORDER'), $this);?>

                </td>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_YES'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowuseanother]" value="1" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxallowuseanother->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>&nbsp;&nbsp;
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NO'), $this);?>
&nbsp;<input type="radio" name="editval[oxvoucherseries__oxallowuseanother]" value="0" <?php if (! $this->_tpl_vars['edit']->oxvoucherseries__oxallowuseanother->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_SAMESEROTHERORDER'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_CALCULATEONCE'), $this);?>

                </td>
                <td class="edittext">
                <input type="hidden" name="editval[oxvoucherseries__oxcalculateonce]" value="0" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <input type="checkbox" name="editval[oxvoucherseries__oxcalculateonce]" value="1" <?php if ($this->_tpl_vars['edit']->oxvoucherseries__oxcalculateonce->value): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_CALCULATEONCE'), $this);?>

                </td>
            </tr>
        
        <tr>
            <td class="edittext">
            </td>
            <td class="edittext"><br>
            <input type="submit" class="edittext" name="save" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SAVE'), $this);?>
" <?php echo $this->_tpl_vars['readonly']; ?>
 onClick="Javascript:changeFnc('save');">
            </td>
        </tr>
        </table>

</form>

    </td>
    <td width="355" valign="top">

        <?php if ($this->_tpl_vars['oxid'] != "-1"): ?>

        <form name="myexport" id="myexport" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" target="dynexport_do" method="post">
        <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

        <input type="hidden" name="cl" value="">
        <input type="hidden" name="fnc" value="start">
        <input type="hidden" name="voucherid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">

        <fieldset title="<?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_VOUCHERSTATISTICS'), $this);?>
" style="padding-left: 5px; padding-right: 5px;">
            <legend><?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_VOUCHERSTATISTICS'), $this);?>
</legend>
            <iframe src="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
&cl=<?php echo $this->_tpl_vars['sClassDo']; ?>
&voucherid=<?php echo $this->_tpl_vars['oxid']; ?>
" width="100%" height="80" frameborder="0" name="dynexport_do" align="left"></iframe>
        </fieldset>
        <br>

        <table cellspacing="2" cellpadding="0" width="">
            
                <tr>
                    <td class="edittext" colspan="2">
                        <b><?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_NEWVOUCHER'), $this);?>
</b> (optional)<br><br>
                    </td>
                </tr>
                <tr>
                    <td class="edittext">
                        <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_RANDOMNUM'), $this);?>

                    </td>
                    <td>
                        <input type="radio" name="randomVoucherNr" value="1" checked <?php echo $this->_tpl_vars['readonly']; ?>
>
                        <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_RANDOMNUM'), $this);?>

                    </td>
                </tr>
                <tr>
                    <td class="edittext">
                        <?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_VOUCHERNUM'), $this);?>

                    </td>
                    <td>
                        <input type="radio" name="randomVoucherNr" id="randomVoucherNr" value="0" <?php echo $this->_tpl_vars['readonly']; ?>
>
                        <input class="editinput" size="29" type="text" name="voucherNr" <?php echo $this->_tpl_vars['readonly']; ?>
 onfocus="document.getElementById('randomVoucherNr').checked='true';">
                        <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_VOUCHERSERIE_MAIN_VOUCHERNUM'), $this);?>

                    </td>
                </tr>
                <tr>
                    <td class="edittext">
                        <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SUM'), $this);?>

                    </td>
                    <td>
                        <input type="text" size="29" class="editinput" name="voucherAmount" value="0" <?php echo $this->_tpl_vars['readonly']; ?>
>
                        <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_SUM'), $this);?>

                    </td>
                </tr>
            
            <tr>
                <td></td>
                <td><br>
                    <input type="submit" class="edittext" name="save" value="<?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_GENERATE'), $this);?>
" <?php echo $this->_tpl_vars['readonly']; ?>
 onClick="Javascript:document.myexport.cl.value='voucherserie_generate';">
                    <input type="submit" class="edittext" name="save" value="<?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_MAIN_EXPORT'), $this);?>
" <?php echo $this->_tpl_vars['readonly']; ?>
 onClick="Javascript:document.myexport.cl.value='voucherserie_export';">
                </td>
            </tr>
        </table>

        </form>
        <?php endif; ?>

    </td>
    </tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottomnaviitem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "bottomitem.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>