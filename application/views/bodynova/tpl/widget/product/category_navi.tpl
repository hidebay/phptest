[{*}]<!-- [{ details locator  }]-->[{*}]

    [{assign var="actCategory" value=$oView->getActiveCategory()}]

[{*}]<!--    
	<div id="overviewLink">
        <a href="[{ $actCategory->toListLink }]" class="overviewLink">[{ oxmultilang ident="BACK_TO_OVERVIEW" }]</a>
    </div> 
-->[{*}]


	<div class="pageHead">


[{*}]<!--<h2 class="pageHead">-->[{*}]	
			<span style="float:left;">
				[{$sPageHeadTitle|truncate:80}]
			</span>

[{*}]<!--	<div class="detailsParams listRefine bottomRound">-->[{*}]

	        <span style="float:right;">
	        	<div class="pager refineParams clear" id="detailsItemsPager">
            		[{if $actCategory->prevProductLink}]
            			<a id="linkPrevArticle" class="prev" href="[{$actCategory->prevProductLink}]">
            				[{oxmultilang ident="PREVIOUS_PRODUCT"}]
            			</a>
            		[{/if}]
[{*}]<!--<span class="page">-->[{*}]
               			[{oxmultilang ident="PRODUCT"}] 
               			[{$actCategory->iProductPos}] 
               			[{oxmultilang ident="OF"}] 
               			[{$actCategory->iCntOfProd}]

[{*}]<!--</span>-->[{*}]
            			[{if $actCategory->nextProductLink}]
            				<a id="linkNextArticle" href="[{$actCategory->nextProductLink}]" class="next">
            					[{oxmultilang ident="NEXT_PRODUCT"}]
            				</a>
            			[{/if}]
            			<span style="margin-left:15px;">
        				<a href="[{ $actCategory->toListLink }]" class="overviewLink"> > 
        					[{ oxmultilang ident="BACK_TO_OVERVIEW" }]
        				</a></span>
[{*}]<!--</div>-->[{*}]
    			</div>
    		</span>
    [{*}]<!--</h2>-->[{*}]
	</div>