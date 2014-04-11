<div class="titleBox">
    <a id="[{$testid}]" href="[{$_productLink}]" class="title" title="[{$product->oxarticles__oxtitle->value}] [{$product->oxarticles__oxvarselect->value}]">
        <span>[{d3_extsearch_highlight text=$product->oxarticles__oxtitle->value}] [{d3_extsearch_highlight text=$product->oxarticles__oxvarselect->value}]</span>
    </a>

    [{d3modcfgcheck modid="d3_extsearch"}]
        [{if $product->blIsSimilar}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_SIMILAR"}]</span>[{/if}]
        [{if $product->isD3CatHit}]<span id='similar'>[{oxmultilang ident="D3_EXTSEARCH_EXT_CATHIT"}]</span>[{/if}]
    [{/d3modcfgcheck}]
</div>