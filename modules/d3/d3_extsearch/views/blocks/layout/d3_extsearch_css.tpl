[{$smarty.block.parent}]

[{d3modcfgcheck modid="d3_extsearch"}]
    [{oxstyle include=$oViewConf->getModuleUrl('d3_extsearch', 'out/src/css/d3_ext_search.css')}]

    [{if $blSearchPluginInstall == '1' && $sSearchPluginURL}]
        <link rel="search" type="application/opensearchdescription+xml" title="[{$oxcmp_shop->oxshops__oxname->value}]" href="[{$sSearchPluginURL}]" />
    [{/if}]
[{/d3modcfgcheck}]