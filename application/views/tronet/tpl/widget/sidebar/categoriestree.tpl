[{if $categories && $oView->getClassName() != 'start'}]
<div class="categoryBox">
    <ul class="tree" id="tree">
    [{assign var="level1counter" value="1"}]
    [{defun name="tree" categories=$categories}]
        [{assign var="deepLevel" value=$deepLevel+1}]
        [{assign var="oContentCat" value=$oView->getContentCategory() }]
        [{foreach from=$categories item=_cat}]
          [{*if $deepLevel == 1}]
            [{assign var="level1counter" value=$level1counter+1}]
            [{if $categories|@count ==$level1counter}]
              [{assign var="lastelement" value="1"}]
            [{/if}]
          [{/if*}]
            [{if $_cat->getIsVisible() }]
                [{* CMS category *}]
                [{if $_cat->getContentCats() && $deepLevel > 1 }]
                    [{foreach from=$_cat->getContentCats() item=_oCont}]
                    <li class="[{if $oContentCat && $oContentCat->getId()==$_oCont->getId() }] active [{else}] end [{/if}]" >
                        <a href="[{$_oCont->getLink()}]">[{ $_oCont->oxcontents__oxtitle->value }]</a>
                    </li>
                    [{/foreach}]
                [{/if }]
                [{* subcategories *}]
                [{if $_cat->oxcategories__oxtitle->value}]
                  <li class="[{if $level1counter}]first [{/if}][{if !$oContentCat && $act && $act->getId()==$_cat->getId() }]active[{elseif $_cat->expanded}]exp[{/if}][{if !$_cat->hasVisibleSubCats}] end[{/if}]">
                  [{assign var="indent" value=$deepLevel*8}]
                    <a href="[{$_cat->getLink()}]" [{if $_cat->expanded && $deepLevel == 1}]class="mainnav"[{/if}]>
                      [{$_cat->oxcategories__oxtitle->value}] [{ if $oView->showCategoryArticlesCount() && ($_cat->getNrOfArticles() > 0) }] ([{$_cat->getNrOfArticles()}])[{/if}]
                    </a>
                    [{if $_cat->getSubCats() && $_cat->expanded}]
                        <ul>[{fun name="tree" categories=$_cat->getSubCats() }]</ul>
                    [{/if}]
                  </li>
                [{/if}]
                [{assign var="level1counter" value="0"}]
            [{/if}]
        [{/foreach}]
    [{/defun}]
    </ul>
    [{*if $oView->showTags() && $oView->getTagCloudManager() }]
        <div class="categoryTagsBox">
            [{assign var="oTagsManager" value=$oView->getTagCloudManager() }]
            <h3>[{ oxmultilang ident="WIDGET_TAGS_HEADER" }]</h3>
            <div class="categoryTags">
                [{foreach from=$oTagsManager->getCloudArray() item=iCount key=sTagTitle }]
                    <a class="tagitem_[{ $oTagsManager->getTagSize($sTagTitle) }]" href="[{ $oTagsManager->getTagLink($sTagTitle) }]">[{ $oTagsManager->getTagTitle($sTagTitle) }]</a>
                [{/foreach}]
                [{if $oView->isMoreTagsVisible()}]
                    <br>
                    <a href="[{ oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=tags" }]" class="readMore">[{ oxmultilang ident="WIDGET_TAGS_LINKMORE" }]</a>
                [{/if}]
            </div>
        </div>
    [{/if*}]
</div>
[{/if}]