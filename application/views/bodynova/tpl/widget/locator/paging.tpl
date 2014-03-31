[{*}]<!--[{if $pages->changePage}]
    [{if $place neq "bottom"}]
      <div class="infopager">[{oxmultilang ident="WIDGET_PAGE"}] [{$pages->actPage}] / [{$pages->NrOfPages}]</div>
    [{/if}]
    <div class="pager [{if $place eq "bottom"}] lineBox[{/if}]" id="itemsPager[{$place}]">
    [{if $pages->previousPage}]
        <a class="prev" href="[{$pages->previousPage}]">
          &lt;
          [{if $place eq "bottom"}]
            [{oxmultilang ident="WIDGET_PAGE_PREV"}]
          [{/if}]
        </a>
    [{/if}]
    
      [{if $place eq "bottom"}]
          <a href="[{$pages->previousPage}]">&lt;</a>
      [{/if}]     
      [{if $pages->NrOfPages > 0}]|[{/if}]
          [{assign var="i" value=1}]
          [{foreach key=iPage from=$pages->changePage item=page}]
              [{ if $iPage == $i }]
                <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
                [{assign var="i" value=$i+1}]
              [{ elseif $iPage > $i }]
                ...
                <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
                [{assign var="i" value=$iPage+1}]
              [{ elseif $iPage < $i }]
                <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
                ...
                [{assign var="i" value=$iPage+1}]
              [{/if}]
          [{/foreach}]        
      [{if $pages->NrOfPages > 0}]|[{/if}]
      [{if $place eq "bottom"}]
          <a href="[{$pages->nextPage}]">&gt;</a>
      [{/if}] 
    [{if $place eq "bottom"}]
      <div class="sorter">
    [{/if}]
    [{if $pages->nextPage}]
        <a class="next" href="[{$pages->nextPage}]">          
          [{if $place eq "bottom"}]
            [{oxmultilang ident="WIDGET_PAGE_NEXT"}]
          [{/if}]
          &gt;
        </a>
    [{/if}]
    [{if $place eq "bottom"}]
      <a class="top" href="#">&gt; [{oxmultilang ident="WIDGET_PAGE_TOP"}]</a> 
    [{/if}]
    [{if $place eq "bottom"}]
      </div>
    [{/if}]
   </div>
[{/if}]-->[{*}]
[{if $pages->changePage}]
    <div class="pager [{if $place eq "bottom"}] lineBox[{/if}]" id="itemsPager[{$place}]">
    [{if $pages->previousPage }]
        <a class="prev" rel="prev" href="[{$pages->previousPage}]">[{oxmultilang ident="PREVIOUS"}]</a>
    [{/if}]
        [{assign var="i" value=1}]
        [{foreach key=iPage from=$pages->changePage item=page}]
            [{ if $iPage == $i }]
               <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
               [{assign var="i" value=$i+1}]
            [{ elseif $iPage > $i }]
               ...
               <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
               [{assign var="i" value=$iPage+1}]
            [{ elseif $iPage < $i }]
               <a href="[{$page->url}]" class="page[{if $iPage == $pages->actPage }] active[{/if}]">[{$iPage}]</a>
               ...
               [{assign var="i" value=$iPage+1}]
            [{/if}]
        [{/foreach}]
    [{if $pages->nextPage }]
        <a class="next" rel="next" href="[{$pages->nextPage}]">[{oxmultilang ident="NEXT"}]</a>
    [{/if}]
     </div>
[{/if}]
