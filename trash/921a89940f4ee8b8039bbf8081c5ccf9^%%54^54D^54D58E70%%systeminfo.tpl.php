<?php /* Smarty version 2.6.26, created on 2014-02-24 12:09:22
         compiled from systeminfo.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'systeminfo.tpl', 1, false),array('function', 'oxmultilang', 'systeminfo.tpl', 6, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'box' => ' ')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
    if(top)
    {
        top.sMenuItem    = "<?php echo smarty_function_oxmultilang(array('ident' => 'SYSTEMINFO_MENUITEM'), $this);?>
";
        top.sMenuSubItem = "<?php echo smarty_function_oxmultilang(array('ident' => 'SYSTEMINFO_MENUSUBITEM'), $this);?>
";
        top.sWorkArea    = "<?php echo $this->_tpl_vars['_act']; ?>
";
        top.setTitle();
    }
</script>

<form name="transfer" id="transfer" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
    <?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

    <input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="oxidCopy" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
    <input type="hidden" name="cl" value="article_main">
    <input type="hidden" name="w" value="main">
</form>

<form name="myedit" id="myedit" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
<?php echo $this->_tpl_vars['oViewConf']->getHiddenSid(); ?>

<input type="hidden" name="cl" value="article_main">
<input type="hidden" name="fnc" value="">
<input type="hidden" name="oxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="voxid" value="<?php echo $this->_tpl_vars['oxid']; ?>
">
<input type="hidden" name="oxparentid" value="<?php echo $this->_tpl_vars['oxparentid']; ?>
">
<input type="hidden" name="editval[oxarticles__oxid]" value="<?php echo $this->_tpl_vars['oxid']; ?>
">

</form><br /><br />
<div class="center">

<?php if ($this->_tpl_vars['isdemo']): ?>
    <h1><?php echo smarty_function_oxmultilang(array('ident' => 'SYSTEMINFO_DEMOMODE'), $this);?>
</h1>
<?php endif; ?>

<table border="0" cellpadding="3" width="600">
<tr class="h">
    <th><?php echo smarty_function_oxmultilang(array('ident' => 'SYSTEMINFO_VARIABLE'), $this);?>
</th>
    <th><?php echo smarty_function_oxmultilang(array('ident' => 'SYSTEMINFO_VALUE'), $this);?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['aSystemInfo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['value']):
?>
<tr>
    <td class="e"><?php echo $this->_tpl_vars['name']; ?>
</td>
    <td class="v"><?php echo $this->_tpl_vars['value']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>
</div>