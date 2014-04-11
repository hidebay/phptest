[{if $oView->getUserMessages()}]
    <script type="text/javascript">
        [{strip}]alert("
        [{foreach from=$oView->getUserMessages() item="sMessage"}]
            - [{$sMessage}]\n
        [{/foreach}]
            ");[{/strip}]
    </script>
[{/if}]

[{if !$blHideLinkBar}]
    <style type="text/css">
        div.box{background: white url('[{$oView->getBGLogoUrl()}]') no-repeat bottom right;}
    </style>
[{/if}]

[{oxstyle include=$oViewConf->getModuleUrl('d3modcfg_lib', 'out/admin/src/d3_mod_cfg.css')}]
[{oxstyle}]

[{if !$blHideLinkBar}]
    [{include file="d3_cfg_mod_bottom.tpl"}]
[{/if}]

[{php}]
    $oView = $this->get_template_vars('oView');
    $this->assign('blChangeTitle', method_exists($oView, 'd3GetMenuItemTitle') ? true : false);
[{/php}]

[{if $blChangeTitle}]
    <script type="text/javascript">
        if (parent.parent)
        {
            parent.parent.sShopTitle   = "[{$actshopobj->oxshops__oxname->getRawValue()|oxaddslashes}]";
            parent.parent.sMenuItem    = "[{oxmultilang ident=$oView->d3GetMenuItemTitle()}]";
            parent.parent.sMenuSubItem = "[{oxmultilang ident=$oView->d3GetMenuSubItemTitle()}]";
            parent.parent.sWorkArea    = "[{$_act}]";
            parent.parent.setTitle();
        }
    </script>
[{/if}]