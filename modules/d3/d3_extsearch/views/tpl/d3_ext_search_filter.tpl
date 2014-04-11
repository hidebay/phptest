[{if $oView->isHitForIndexLetter($d3fparam)}]
    <div class="indexlink_usable[{if $d3filterparam == $d3fparam}] active[{/if}] letter_[{$d3fparam}]">
        <a href="[{oxgetseourl ident=$oView->generatePageNavigationUrl()|oxaddparams:"filterparam=$d3fparam"}]" onclick="d3_extsearch_popup.popup.load();">[{if $d3fdesc}][{$d3fdesc}][{else}][{$d3fparam}][{/if}]</a>
    </div>
[{else}]
    <div class="indexlink letter_[{$d3fparam}]">
        [{if $d3fdesc}][{$d3fdesc}][{else}][{$d3fparam}][{/if}]
    </div>
[{/if}]