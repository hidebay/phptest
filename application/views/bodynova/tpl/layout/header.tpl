[{if $oView->showBetaNote()}]
    [{oxid_include_widget cl="oxwBetaNote" noscript=1 nocookie=1}]
[{/if}]
[{if $oViewConf->getTopActionClassName() != 'clearcookies' && $oViewConf->getTopActionClassName() != 'mallstart'}]
    [{oxid_include_widget cl="oxwCookieNote" _parent=$oView->getClassName() nocookie=1}]
[{/if}]
<div id="header" class="clear">
  [{oxid_include_widget cl="oxwLanguageList" lang=$oViewConf->getActLanguageId() _parent=$oView->getClassName() nocookie=1 _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]
  [{oxid_include_widget cl="oxwCurrencyList" cur=$oViewConf->getActCurrency() _parent=$oView->getClassName() nocookie=1 _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]

  [{if $oxcmp_user || $oView->getCompareItemCount() || $Errors.loginBoxErrors}]
      [{assign var="blAnon" value=0}]
      [{assign var="force_sid" value=$oView->getSidForWidget()}]
  [{else}]
      [{assign var="blAnon" value=1}]
  [{/if}]

  [{oxid_include_widget cl="oxwServiceMenu" _parent=$oView->getClassName() force_sid=$force_sid nocookie=$blAnon _navurlparams=$oViewConf->getNavUrlParams() anid=$oViewConf->getActArticleId()}]

  [{assign var="sLogoImg" value=$oViewConf->getShopLogo()}]
  <a id="logo" href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"><img src="[{$oViewConf->getImageUrl($sLogoImg)}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"></a>
    [{oxifcontent ident="troheadercenter" object="_cont"}]
          <div id="headercenter">
            [{if $oxcmp_user->oxuser__oxpassword->value}]
              [{ oxmultilang ident="WIDGET_LOGINBOX_GREETING" }]
              [{assign var="fullname" value=$oxcmp_user->oxuser__oxfname->value|cat:" "|cat:$oxcmp_user->oxuser__oxlname->value }]
              <a href="[{ oxgetseourl ident=$oViewConf->getSelfLink()|cat:"cl=account"}]">
              [{if $fullname}]
                  [{ $fullname }]
              [{else}]
                  [{ $oxcmp_user->oxuser__oxusername->value|oxtruncate:25:"...":true }]
              [{/if}]
              </a>
            [{/if}]
            [{$_cont->oxcontents__oxcontent->value}]
          </div>
      [{/oxifcontent}]
    [{oxid_include_widget cl="oxwCategoryTree" cnid=$oView->getCategoryId() sWidgetType="header" _parent=$oView->getClassName() nocookie=1}]

      [{if $oxcmp_basket->getProductsCount()}]
          [{assign var="blAnon" value=0}]
          [{assign var="force_sid" value=$oView->getSidForWidget()}]
      [{else}]
          [{assign var="blAnon" value=1}]
      [{/if}]
    <div id="minibasket_container">
      [{oxid_include_widget cl="oxwMiniBasket" nocookie=$blAnon force_sid=$force_sid}]
    </div>
    [{include file="widget/header/search.tpl"}]
</div>
[{if $oView->getClassName()=='start' && $oView->getBanners()|@count > 0 }]
    <div class="oxSlider">
        [{include file="widget/promoslider.tpl" }]
    </div>
[{/if}]
[{debug}]
<div id="test">
<br/>
$oView->getCompareItemCount() = [{$oView->getCompareItemCount()}]<br/>
$oViewConf->getHelpLink() = [{$oViewConf->getHelpLink()}] <br/>
</div>
