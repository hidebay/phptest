[{oxscript include="js/widgets/oxtopmenu.js" priority=10 }]
[{oxscript add="$('#navigation').oxTopMenu();"}]
[{oxstyle include="css/libs/superfish.css"}]
[{assign var="homeSelected" value="false"}]
[{if $oView->getClassName() == 'start'}]
    [{assign var="homeSelected" value="true"}]
    [{assign var="expandedCategory" value=$oView->getActCategory()}]
    [{if $expandedCategory && $expandedCategory->getExpanded()}]
        [{assign var="homeSelected" value="false"}]
    [{/if}] 
[{/if}]
[{assign var="oContentCat" value=$oView->getContentCategory() }]

<ul id="navigation">
    [{*}]
    <li [{if $homeSelected == 'true' }]class="current"[{/if}]><a [{if $homeSelected == 'true'}]class="current"[{/if}] href="[{$oViewConf->getHomeLink()}]">[{oxmultilang ident="TOP_CATEGORIES_HOME"}]</a></li>
    [{*}]

    [{assign var="iAllCatCount" value=$oxcmp_categories|count }]
    [{*if $iAllCatCount > $oView->getTopNavigationCatCnt() }]
        [{assign var="bHasMore" value="true"}]
        [{assign var="iCatCnt" value="1"}]
    [{else*}]
        [{assign var="bHasMore" value="false"}]
        [{assign var="iCatCnt" value="0"}]
    [{*/if*}]
    [{assign var="ebenecount" value="0"}]
    [{foreach from=$oxcmp_categories item=ocat key=catkey name=root}]
      [{if $ocat->getIsVisible() }]
        [{foreach from=$ocat->getContentCats() item=oTopCont name=MoreTopCms}]
            [{assign var="iCatCnt" value=$iCatCnt+1 }]
            [{assign var="iAllCatCount" value=$iAllCatCount+1 }]
            [{if !$bHasMore && ($iCatCnt >= $oView->getTopNavigationCatCnt()) }]
                 [{assign var="bHasMore" value="true"}]
                 [{assign var="iCatCnt" value=$iCatCnt+1}]
            [{/if}]

            [{if $iCatCnt <= $oView->getTopNavigationCatCnt()}]
                <li><a href="[{$oTopCont->getLink()}]" title="[{$oTopCont->oxcontents__oxtitle->value}]">[{$oTopCont->oxcontents__oxtitle->value}]</a></li>
            [{else}]
                [{capture append="moreLinks"}]
                    <li><a href="[{$oTopCont->getLink()}]" title="[{$oTopCont->oxcontents__oxtitle->value}]">[{$oTopCont->oxcontents__oxtitle->value}]</a></li>
                [{/capture}]
            [{/if}]
        [{/foreach}]

        [{assign var="iCatCnt" value=$iCatCnt+1 }]
        [{if !$bHasMore && ($iCatCnt >= $oView->getTopNavigationCatCnt()) }]
                 [{assign var="bHasMore" value="true"}]
                 [{assign var="iCatCnt" value=$iCatCnt+1}]
        [{/if}]
        [{if $iCatCnt <= $oView->getTopNavigationCatCnt()}]
          [{if $ocat->oxcategories__oxtitle->value}]
            [{assign var="ebenecount" value=$ebenecount+1}]
            [{counter print=false assign=countnum}]
            <li class="ebene1_[{$ebenecount}] [{if $ocat->expanded}]current[{/if}]">
                <a  [{if $ocat->expanded}]class="current"[{/if}] href="[{$ocat->getLink()}]" title="[{$ocat->oxcategories__oxtitle->value}]">[{$ocat->oxcategories__oxtitle->value}][{ if $oView->showCategoryArticlesCount() && ($ocat->getNrOfArticles() > 0) }] ([{$ocat->getNrOfArticles()}])[{/if}]</a>
                [{if $ocat->getSubCats()}]
                  [{assign var="counter" value="0"}]
                  [{assign var="start" value="0"}]
                  [{foreach from=$ocat->getSubCats() item=osubcat key=subcatkey name=SubCat}]
                    [{if $osubcat->getIsVisible()}]
                      [{assign var="counter" value=$counter+1}]
                      [{assign var="start" value="1"}]
                      [{foreach from=$osubcat->getSubCats() item=osubsubcat key=subsubcatkey name=SubSubCat}]     
                        [{if $osubsubcat->getIsVisible()}]                            
                          [{assign var="counter" value=$counter+1}]
                        [{/if}]                                          
                      [{/foreach}]
                    [{/if}]
                  [{/foreach}]
                  
                  [{assign var="tmp" value=$counter/4}]
                  [{if $tmp > 1.25}]
                    [{assign var="max_cols" value=$tmp|ceil}]
                  [{else}]
                    [{assign var="max_cols" value="4"}]
                  [{/if}]
                  
                  [{assign var="col_cnt" value="0"}]
                  [{assign var="row_counter" value="1"}]
                  [{foreach from=$ocat->getSubCats() item=osubcat key=subcatkey name=SubCat}]
                    [{if $osubcat->getIsVisible()}]
                      [{assign var="col_cnt" value=$col_cnt+1}]
                      [{foreach from=$osubcat->getSubCats() item=osubsubcat key=subsubcatkey name=SubSubCat}]     
                        [{if $osubsubcat->getIsVisible()}]                            
                          [{assign var="col_cnt" value=$col_cnt+1}]
                        [{/if}]                                          
                      [{/foreach}]
                      [{if $col_cnt > $max_cols}]
                        [{assign var="col_cnt" value="0"}]
                        [{assign var="row_counter" value=$row_counter+1}]
                      [{/if}]
                    [{/if}]
                  [{/foreach}]
                [{/if}]
                  [{if $start == 1 && $ocat->getSubCats()}]
                    <ul><li>
                    [{assign var="col_counter" value="0"}]
                    [{foreach from=$ocat->getSubCats() item=osubcat key=subcatkey name=SubCat}]
                      
                        [{assign var="col_counter" value=$col_counter+1}]
                        [{if $smarty.foreach.SubCat.iteration == 1}]
                        [{assign var="cols" value=$smarty.foreach.SubCat.total/3|ceil}]
                          <div class="subCategories" style="width: [{$row_counter*150}]px">
                            <ul>
                        [{/if}]                         
                        [{if $osubcat->getIsVisible() }]
                            [{foreach from=$osubcat->getContentCats() item=ocont name=MoreCms}]
                                <li><a href="[{$ocont->getLink()}]">[{$ocont->oxcontents__oxtitle->value}]</a></li>
                            [{/foreach}]
                            [{if $osubcat->getIsVisible() }]
                                <li[{if $osubcat->expanded}] class="current"[{/if}]>
                                    <a [{if $osubcat->expanded}]class="current"[{/if}] href="[{$osubcat->getLink()}]" title="[{$osubcat->oxcategories__oxtitle->value}]">[{$osubcat->oxcategories__oxtitle->value}] [{ if $oView->showCategoryArticlesCount() && ($osubcat->getNrOfArticles() > 0)}] ([{$osubcat->getNrOfArticles()}])[{/if}]</a>
                                    [{if $osubcat->getSubCats()}]   
                                      <div class="sub">
                                        <ul>
                                        [{foreach from=$osubcat->getSubCats() item=osubsubcat key=subsubcatkey name=SubSubCat}] 
                                          [{if $osubsubcat->getIsVisible() }]
                                            [{assign var="col_counter" value=$col_counter+1}]
                                            <li class="subsub">
                                              <a [{if $osubsubcat->expanded}]class="current"[{/if}] href="[{$osubsubcat->getLink()}]" title="[{$osubsubcat->oxcategories__oxtitle->value}]">[{$osubsubcat->oxcategories__oxtitle->value}] [{ if $oView->showCategoryArticlesCount() && ($osubsubcat->getNrOfArticles() > 0)}] ([{$osubsubcat->getNrOfArticles()}])[{/if}]</a>
                                            </li>
                                          [{/if}]                                          
                                        [{/foreach}]
                                        </ul>
                                      </div>
                                    [{/if}]
                                </li>
                            [{/if}]
                            [{*if $smarty.foreach.SubCat.total > 4 && $smarty.foreach.SubCat.total/4|round:0 == $smarty.foreach.SubCat.iteration}]</ul><ul>[{/if*}]
                            [{*if $smarty.foreach.SubCat.iteration%3 == 0*}]     
                            
                            [{if $col_counter > $max_cols}]
                              [{assign var="col_counter" value="0"}]
                              </ul><ul>
                            [{/if}]
                        [{/if}]
                    [{/foreach}]
                    </ul></div></li></ul>
                [{/if}]              
            </li>
            [{/if}]
        [{else}]
            [{capture append="moreLinks"}]
               <li [{if $ocat->expanded}]class="current"[{/if}]>
                 [{if $ocat->oxcategories__oxtitle->value}]
                    <a href="[{$ocat->getLink()}]" title="[{$ocat->oxcategories__oxtitle->value}]">[{$ocat->oxcategories__oxtitle->value}][{ if $oView->showCategoryArticlesCount() && ($ocat->getNrOfArticles() > 0)}] ([{$ocat->getNrOfArticles()}])[{/if}]</a>
                 [{/if}]
               </li>
            [{/capture}]
        [{/if}]
      [{/if}]
    [{/foreach}]
    [{assign var="actCatregory" value=$oView->getActiveCategory()}]
    
    <li class="last[{if $actCategory->oxcategories__oxtitle->value == 'ANGEBOTE'}]current[{/if}]">
      [{assign var="offerlink" value=$oViewConf->getSelfLink()|cat:"/Angebote"}]
      [{assign var="tmplink" value=$oViewConf->getSelfLink()}]
      [{assign var="splitti" value="?"|explode:$tmplink}]
      [{assign var="link" value=$splitti[0]}]
      [{assign var="param" value=$splitti[1]}]
      <!--<a href="[{$offerlink|replace:'/index.php?':''}]">[{$oViewConf->getSelfLink()}]</a>-->
      <!--<a href="[{$link|replace:'/index.php':''}]/ANGEBOTE?[{$param}]">&nbsp;</a>-->
      <a href="[{oxgetseourl ident=$oViewConf->getSelfLink()|cat:'cl=alist'|cat:'&amp;cnid=fc70cac08dba4163848d70cbab85d2dc'}]"></a>
    </li>
    
    [{*if $iAllCatCount > $oView->getTopNavigationCatCnt()}]
        <li>
            [{assign var="_catMoreUrl" value=$oView->getCatMoreUrl()}]
            <a href="[{ oxgetseourl ident="`$_catMoreUrl`&amp;cl=alist" }]">[{ oxmultilang ident="TOP_CATEGORIES_MORE" }]</a>
            <ul>
                [{foreach from=$moreLinks item=link}]
                   [{$link}]
                [{/foreach}]
            </ul>
        </li>
    [{/if*}]
</ul>
