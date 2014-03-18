[{if $tree || $oView->getContentCategory() }]
[{assign var="oContentCat" value=$oView->getContentCategory() }]

[{defun name="themen" tree=$tree act=$act class=$class testSubCat=''}]
[{strip}]
    [{foreach from=$tree item=ocat key=catkey name=$test_catName}]

		[{if 1==$ocat->oxcategories__trotype->value}]

			[{if $ocat->getIsVisible() }]

                            [{if $ocat->oxcategories__oxthumb->value}]
                                    <div class="thema">
                                        <a id="test_BoxLeft_Cat_[{if $ocat->isTopCategory()}][{$ocat->oxcategories__oxid->value}]_[{$smarty.foreach.$test_catName.iteration}][{else}][{$testSubCat}]_sub[{$smarty.foreach.$test_catName.iteration}][{/if}]" href="[{$ocat->getLink()}]" class="[{if $ocat->isTopCategory()}]root [{/if}][{if $ocat->hasVisibleSubCats}][{if $ocat->expanded }]exp [{/if}]has [{else}]last [{/if}][{if isset($act) && $act->getId()==$ocat->getId() && !$oContentCat }]act [{/if}]">
                                            <div class="catTitle">[{$ocat->oxcategories__oxtitle->value}]</div>
                                            <div class="catThumb"><img src="[{$ocat->getPictureUrl()}]0/[{ $ocat->oxcategories__oxthumb->value }]"></div>
                                            <div class="catArrow"><img src="[{$oViewConf->getImageUrl()}]pfeil_orange.png" alt=""></div>
                                        </a>
                                    </div>
                            [{else}]
                                    <div class="thema">
                                        <a id="test_BoxLeft_Cat_[{if $ocat->isTopCategory()}][{$ocat->oxcategories__oxid->value}]_[{$smarty.foreach.$test_catName.iteration}][{else}][{$testSubCat}]_sub[{$smarty.foreach.$test_catName.iteration}][{/if}]" href="[{$ocat->getLink()}]" class="[{if $ocat->isTopCategory()}]root [{/if}][{if $ocat->hasVisibleSubCats}][{if $ocat->expanded }]exp [{/if}]has [{else}]last [{/if}][{if isset($act) && $act->getId()==$ocat->getId() && !$oContentCat }]act [{/if}]">
                                            <div class="catTitle">[{$ocat->oxcategories__oxtitle->value}]</div>
                                            <div class="catArrow"><img src="[{$oViewConf->getImageUrl()}]pfeil_orange.png" alt=""></div>
                                        </a>
                                    </div>
                            [{/if}]

                            [{*if $ocat->getSubCats() }]
                                [{fun name="themen" tree=$ocat->getSubCats() act=$act class="" testSubCat=$ocat->oxcategories__oxid->value }]
                            [{/if*}]
			[{/if}]
		[{/if}]
    [{/foreach}]
[{/strip}]
[{/defun}]
[{/if}]



