<?php /* Smarty version 2.6.26, created on 2014-03-18 13:54:12
         compiled from voucherserie_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'oxmultilangassign', 'voucherserie_list.tpl', 1, false),array('modifier', 'oxaddslashes', 'voucherserie_list.tpl', 121, false),array('function', 'oxmultilang', 'voucherserie_list.tpl', 62, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "headitem.tpl", 'smarty_include_vars' => array('title' => ((is_array($_tmp='GENERAL_ADMIN_TITLE')) ? $this->_run_mod_handler('oxmultilangassign', true, $_tmp) : smarty_modifier_oxmultilangassign($_tmp)),'box' => 'list')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $this->assign('where', $this->_tpl_vars['oView']->getListFilter()); ?>

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
$this->_smarty_include(array('smarty_include_tpl_file' => "_formparams.tpl", 'smarty_include_vars' => array('cl' => 'voucherserie_list','lstrt' => $this->_tpl_vars['lstrt'],'actedit' => $this->_tpl_vars['actedit'],'oxid' => $this->_tpl_vars['oxid'],'fnc' => "",'language' => $this->_tpl_vars['actlang'],'editlanguage' => $this->_tpl_vars['actlang'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<table cellspacing="0" cellpadding="0" border="0" width="100%">
    <colgroup>
        
            <col width="39%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="15%">
            <col width="1%">
        
    </colgroup>
    <tr class="listitem">
    
        <td valign="top" class="listfilter first" height="20">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="30" maxlength="128" name="where[oxvoucherseries][oxserienr]" value="<?php echo $this->_tpl_vars['where']['oxvoucherseries']['oxserienr']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="15" maxlength="128" name="where[oxvoucherseries][oxdiscount]" value="<?php echo $this->_tpl_vars['where']['oxvoucherseries']['oxdiscount']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="15" maxlength="128" name="where[oxvoucherseries][oxbegindate]" value="<?php echo $this->_tpl_vars['where']['oxvoucherseries']['oxbegindate']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter">
            <div class="r1"><div class="b1">
            <input class="listedit" type="text" size="15" maxlength="128" name="where[oxvoucherseries][oxenddate]" value="<?php echo $this->_tpl_vars['where']['oxvoucherseries']['oxenddate']; ?>
">
            </div></div>
        </td>
        <td valign="top" class="listfilter" colspan="2">
            <div class="r1"><div class="b1">
            <div class="find"><input class="listedit" type="submit" name="submitit" value="<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_SEARCH'), $this);?>
"></div>
            <input class="listedit" type="text" size="15" maxlength="128" name="where[oxvoucherseries][oxminimumvalue]" value="<?php echo $this->_tpl_vars['where']['oxvoucherseries']['oxminimumvalue']; ?>
">
            </div></div>
        </td>
    
</tr>

<tr>
    
        <td class="listheader first" height="15">&nbsp;<a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxvoucherseries', 'oxserienr', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_LIST_SERIALNUM'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxvoucherseries', 'oxdiscount', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_DISCOUNT'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxvoucherseries', 'oxbegindate', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_BEGINDATE'), $this);?>
</a></td>
        <td class="listheader"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxvoucherseries', 'oxenddate', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_ENDDATE'), $this);?>
</a></td>
        <td class="listheader" colspan="2"><a href="Javascript:top.oxid.admin.setSorting( document.search, 'oxvoucherseries', 'oxminimumvalue', 'asc');document.search.submit();" class="listheader"><?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_LIST_MINVALUE'), $this);?>
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
        <?php if ($this->_tpl_vars['listitem']->oxvoucherseries__oxid->value == $this->_tpl_vars['oxid']): ?>
            <?php $this->assign('listclass', 'listitem4'); ?>
        <?php endif; ?>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
" height="15"><div class="listitemfloating">&nbsp;<a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php if (! $this->_tpl_vars['listitem']->oxvoucherseries__oxserienr->value): ?>-<?php echo smarty_function_oxmultilang(array('ident' => 'GENERAL_NONAME'), $this);?>
-<?php else: ?><?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxserienr->value; ?>
<?php endif; ?></a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxdiscount->value; ?>
<?php if ($this->_tpl_vars['listitem']->oxvoucherseries__oxdiscounttype->value == 'percent'): ?> %<?php endif; ?></a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxbegindate->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxenddate->value; ?>
</a></div></td>
        <td valign="top" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><div class="listitemfloating"><a href="Javascript:top.oxid.admin.editThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
');" class="<?php echo $this->_tpl_vars['listclass']; ?>
"><?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxminimumvalue->value; ?>
</a></div></td>
        <td class="<?php echo $this->_tpl_vars['listclass']; ?>
">
          <?php if (! $this->_tpl_vars['readonly']): ?>
              <a href="Javascript:top.oxid.admin.deleteThis('<?php echo $this->_tpl_vars['listitem']->oxvoucherseries__oxid->value; ?>
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
$this->_smarty_include(array('smarty_include_tpl_file' => "pagenavisnippet.tpl", 'smarty_include_vars' => array('colspan' => '6')));
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
    parent.parent.sMenuItem    = "<?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_LIST_MENUITEM'), $this);?>
";
    parent.parent.sMenuSubItem = "<?php echo smarty_function_oxmultilang(array('ident' => 'VOUCHERSERIE_LIST_MENUSUBITEM'), $this);?>
";
    parent.parent.sWorkArea    = "<?php echo $this->_tpl_vars['_act']; ?>
";
    parent.parent.setTitle();
}
</script>
</body>
</html>