<?php /* Smarty version 2.6.26, created on 2014-03-18 13:53:39
         compiled from language_main.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'language_main.tpl', 1, false),array('function', 'oxmultilang', 'language_main.tpl', 48, false),array('function', 'oxinputhelp', 'language_main.tpl', 52, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<!--
window.onload = function ()
{
    <?php if ($this->_tpl_vars['updatelist'] == 1): ?>
        top.oxid.admin.updateList('<?php echo $this->_tpl_vars['oxid']; ?>
');
    <?php endif; ?>
    var oField = top.oxid.admin.getLockTarget();
    oField.onchange = oField.onkeyup = oField.onmouseout = top.oxid.admin.unlockSave;
}
//-->
</script>

<?php if ($this->_tpl_vars['readonly']): ?>
    <?php $this->assign('readonly', 'readonly disabled'); ?>
<?php else: ?>
    <?php $this->assign('readonly', ""); ?>
<?php endif; ?>

<form name="transfer" id="transfer" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="oxidCopy" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="cl" value="language_main">
    <input type="hidden" name="language" value="<?php echo $this->_tpl_vars['actlang']; ?>
">
</form>

<form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
<?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

<input type="hidden" name="cl" value="language_main">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="voxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="editval[oxid]" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="language" value="<?php echo $this->_tpl_vars['actlang']; ?>
">


<table cellspacing="0" cellpadding="0" border="0" width="98%">
<tr>
    <td valign="top" class="edittext">

        <table cellspacing="0" cellpadding="0" border="0">
        
            <tr>
                <td class="edittext" width="120">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_ACTIVE'), $this);?>

                </td>
                <td class="edittext">
                <input class="edittext" type="checkbox" name="editval[active]" value='1' <?php if ($this->_tpl_vars['edit']['active'] == 1): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_ACTIVE'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_ABBERVATION'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="5" maxlength="10" id="oLockTarget" name="editval[abbr]" value="<?php echo $this->_tpl_vars['edit']['abbr']; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_ABBERVATION'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_DESCRIPTION'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="40" maxlength="50" name="editval[desc]" value="<?php echo $this->_tpl_vars['edit']['desc']; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_DESCRIPTION'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_DEFAULT'), $this);?>

                </td>
                <td class="edittext">
                <input class="edittext" type="checkbox" name="editval[default]" value='1' <?php if ($this->_tpl_vars['edit']['default']): ?>checked<?php endif; ?> <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_DEFAULT'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_BASEURL'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="40" maxlength="255" name="editval[baseurl]" value="<?php echo $this->_tpl_vars['edit']['baseurl']; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_BASEURL'), $this);?>

                </td>
            </tr>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_BASESSLURL'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="40" maxlength="255" name="editval[basesslurl]" value="<?php echo $this->_tpl_vars['edit']['basesslurl']; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_LANGUAGE_BASESSLURL'), $this);?>

                </td>
            </tr>
            <?php if ($this->_tpl_vars['oxid'] != -1): ?>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_LANGUAGEID'), $this);?>

                </td>
                <td class="edittext">
                    <?php echo $this->_tpl_vars['edit']['baseId']; ?>

                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td class="edittext">
                <?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SORT'), $this);?>

                </td>
                <td class="edittext">
                <input type="text" class="editinput" size="5" maxlength="5" name="editval[sort]" value="<?php echo $this->_tpl_vars['edit']['sort']; ?>
" <?php echo $this->_tpl_vars['readonly']; ?>
>
                <?php echo smarty_function_oxinputhelp(array('ident' => 'HELP_GENERAL_SORT'), $this);?>

                </td>
            </tr>
        
        <tr>
            <td class="edittext"><br><br>
            </td>
            <td class="edittext"><br><br>
            <input type="submit"  <?php if (! $this->_tpl_vars['edit']['abbr']): ?>disabled<?php endif; ?> class="edittext" id="oLockButton" name="saveArticle" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SAVE'), $this);?>
" onClick="Javascript:document.myedit.fnc.value='save'"" <?php echo $this->_tpl_vars['readonly']; ?>
><br>
            </td>
        </tr>
        </table>
    </td>

    </tr>
</table>

</form>

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