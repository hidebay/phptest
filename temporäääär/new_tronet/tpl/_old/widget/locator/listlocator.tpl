[{include file="widget/locator/attributes.tpl"}]
<div class="refineParams clear[{if $place eq "bottom"}] bottomParams[{/if}]">
    <div class="sorter">
      [{if $sort }]
          [{include file="widget/locator/sort.tpl"}]
      [{/if}]
      [{if $itemsPerPage }]
          [{include file="widget/locator/itemsperpage.tpl"}]
      [{/if}]
    </div>
    [{if $locator}]
        [{include file="widget/locator/paging.tpl" pages=$locator place=$place}]
    [{/if}]
    [{*if $listDisplayType }]
        [{include file="widget/locator/listdisplaytype.tpl"}]
    [{/if*}]
</div>
