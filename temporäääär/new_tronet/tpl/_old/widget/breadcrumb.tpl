[{strip}]
<div id="breadCrumb">
    <a href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"><img src="[{$oViewConf->getImageUrl()}]icon_breadcrumb_home.png" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"></a>
    [{if $oView->getClassName() == "start"}]
        &nbsp;[{ oxmultilang ident="TRO_BREADCRUMB_HOMEPAGE" }] &gt;
    [{else}]
        [{foreach from=$oView->getBreadCrumb() item=sCrum name="breadcrumb"}]
            &nbsp;&gt;&nbsp;
            <span class="[{if $smarty.foreach.breadcrumb.last}]last[{/if}]">
              [{if $sCrum.link }]<a href="[{ $sCrum.link }]" title="[{ $sCrum.title|escape:'html'}]">[{/if}][{$sCrum.title}][{if $sCrum.link }]</a>[{/if}]
            </span>
        [{/foreach}]
    [{/if}]
</div>
[{/strip}]
