<?php /* Smarty version 2.6.26, created on 2014-03-18 13:53:39
         compiled from language_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'language_list.tpl', 1, false),array('modifier', 'oxaddslashes', 'language_list.tpl', 102, false),array('function', 'oxmultilang', 'language_list.tpl', 54, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'box' => 'list')));
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
window.onload = function ()
{
    top.reloadEditFrame();
    <?php if ($this->_tpl_vars['updatelist'] == 1): ?>
        top.oxid.admin.updateList('<?php echo $this->_tpl_vars['oxid']; ?>
');
    <?php endif; ?>
}
//-->
</script>

<div id="liste">


<form name="search" id="search" action="<?php echo $this->_tpl_vars['oViewConf']->getSelfLink(); ?>
" method="post">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "_formparams.tpl", 'smarty_include_vars' => array('cl' => 'language_list','lstrt' => $this->_tpl_vars['lstrt'],'actedit' => $this->_tpl_vars['actedit'],'oxid' => $this->_tpl_vars['oxid'],'fnc' => "",'language' => $this->_tpl_vars['actlang'],'editlanguage' => $this->_tpl_vars['actlang'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <colgroup>
        
            <col width="4%">
            <col width="5%">
            <col width="90%">
            <col width="1%">
        
    </colgroup>
    <tr class="listitem">
        
            <td valign="top" class="listfilter first" align="center">
                <div class="r1"><div class="b1">
                </div></div>
            </td>
            <td valign="top" class="listfilter">
                <div class="r1"><div class="b1">
                </div></div>
            </td>
            <td valign="top" class="listfilter" colspan="2">
                <div class="r1"><div class="b1">
                </div></div>
            </td>
       
    </tr>

    <tr>
        
            <td class="listheader first" height="15" align="center"><a href="Javascript:top.oxid.admin.setSorting( document.forms.search, '', 'active', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ARTICLE_OXACTIVE'), $this);?>
</a></td>
            <td class="listheader" height="15"><a href="Javascript:top.oxid.admin.setSorting( document.forms.search, '', 'abbr', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_ABBERVATION'), $this);?>
</a></td>
            <td class="listheader" height="15" colspan="2"><a href="Javascript:top.oxid.admin.setSorting( document.forms.search, '', 'name', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_LANGUAGE_NAME'), $this);?>
</a></td>
        
    </tr>

<?php $this->assign('blWhite', ""); ?>
<?php $this->assign('_cnt', 0); ?>
<?php $_from = $this->_tpl_vars['mylist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['listitem']):
?>
    <?php $this->assign('_cnt', $this->_tpl_vars['_cnt']+1); ?>
    <tr id="row.<?php echo $this->_tpl_vars['_cnt']; ?>
">
        
            <?php if ($this->_tpl_vars['listitem']->blacklist == 1): ?>
                <?php $this->assign('listclass', 'listitem3'); ?>
            <?php else: ?>
                <?php $this->assign('listclass', "listitem".($this->_tpl_vars['blWhite'])); ?>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['listitem']->oxid == $this->_tpl_vars['oxid']): ?>
                <?php $this->assign('listclass', 'listitem4'); ?>
            <?php endif; ?>
            <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
<?php if ($this->_tpl_vars['listitem']->active == 1): ?> active<?php endif; ?>" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxid; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
">
             &nbsp;
            </a></div></td>
            <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
" height="15"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxid; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->abbr; ?>
</a></div></td>
            <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
" height="15"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxid; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php if ($this->_tpl_vars['listitem']->default): ?><b><?php endif; ?><?php echo $this->_tpl_vars['listitem']->name; ?>
<?php if ($this->_tpl_vars['listitem']->default): ?></b><?php endif; ?></a></div></td>
            <td align="right" class="<?php echo $this->_tpl_vars['listclass']; ?>
">
            <?php if (! $this->_tpl_vars['readonly'] && ! $this->_tpl_vars['listitem']->default): ?>
            <a href="Javascript:top.oxid.admin.deleteThis('<?php echo $this->_tpl_vars['listitem']->oxid; ?>
');" class="delete" id="del.<?php echo $this->_tpl_vars['_cnt']; ?>
" title="" <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "help.tpl", 'smarty_include_vars' => array('helpid' => 'item_delete')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>></a>
            <?php endif; ?>
            </td>
        
    </tr>
<?php if ($this->_tpl_vars['blWhite'] == '2'): ?>
<?php $this->assign('blWhite', ""); ?>
<?php else: ?>
<?php $this->assign('blWhite', '2'); ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagenavisnippet.tpl", 'smarty_include_vars' => array('colspan' => '5')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>
</form>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "pagetabsnippet.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
if (parent.parent)
{   parent.parent.sShopTitle   = "<?php echo ((is_array($_tmp=$this->_tpl_vars['actshopobj']->oxshops__oxname->getRawValue())) ? $this->_run_mod_handler('oxaddslashes', true, $_tmp) : smarty_modifier_oxaddslashes($_tmp)); ?>
";
    parent.parent.sMenuItem    = "<?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_LIST_MENUITEM'), $this);?>
";
    parent.parent.sMenuSubItem = "<?php echo smarty_function_oxmultilang(array('ident' => 'LANGUAGE_LIST_MENUSUBITEM'), $this);?>
";
    parent.parent.sWorkArea    = "<?php echo $this->_tpl_vars['_act']; ?>
";
    parent.parent.setTitle();
}
</script>
</body>
</html>