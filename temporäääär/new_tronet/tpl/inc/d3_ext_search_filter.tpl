[{if $oView->isHitForIndexLetter($d3fparam)}]
    <div class="indexlink_usable[{if $d3filterparam == $d3fparam}] active[{/if}]">
        <a href="[{ oxgetseourl ident=$oViewConf->getSelfLink()}][{$oView->getAdditionalParams()}]&amp;filterparam=[{$d3fparam}]" onclick="d3_extsearch_popup.popup.load();">[{if $d3fdesc}][{$d3fdesc}][{else}][{$d3fparam}][{/if}]</a>
    </div>
[{else}]
    <div class="indexlink">
        [{if $d3fdesc}][{$d3fdesc}][{else}][{$d3fparam}][{/if}]
    </div>
[{/if}]