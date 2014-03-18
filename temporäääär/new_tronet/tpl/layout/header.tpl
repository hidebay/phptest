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
[{*alt}]
[{assign var="slogoImg" value="logo.png"}]
      <a id="logo" href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"><img src="[{$oViewConf->getImageUrl($slogoImg)}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"></a>
[{alt*}]
[{*neu*}] 
<a id="logo" href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"><img src="[{$oViewConf->getImageUrl($sLogoImg)}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"></a>
    [{oxid_include_widget cl="oxwCategoryTree" cnid=$oView->getCategoryId() sWidgetType="header" _parent=$oView->getClassName() nocookie=1}]
[{*neu-ende*}]
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

      <div id="header_basket">
          <ul id="topMenu">
            <li class="login flyout[{if $oxcmp_user->oxuser__oxpassword->value}] logged[{/if}]">
               [{include file="widget/header/loginbox.tpl"}]
            </li>
            <li>
                [{oxid_include_dynamic file="widget/header/servicebox.tpl"}]
            </li>
            [{if !$oxcmp_user}]
                <li><a id="registerLink" href="[{ oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=register" }]" title="[{oxmultilang ident="PAGE_ACCOUNT_REGISTER_REGISTER"}]">[{oxmultilang ident="PAGE_ACCOUNT_REGISTER_REGISTER"}]</a></li>
            [{/if}]
          </ul>

          [{assign var="currency" value=$oView->getActCurrency() }]
          <div id="basketTotals">[{oxmultilang ident="TRO_HEADER_BASKET"}]<br>[{oxmultilang ident="TRO_HEADER_BASKET_TOTALS"}] [{ $oxcmp_basket->getFProductsPrice()}] [{ $currency->sign}]</div>

          [{include file="widget/header/languages.tpl"}]
      </div>

      [{oxid_include_dynamic file="widget/minibasket/minibasket.tpl"}]
      [{oxid_include_dynamic file="widget/minibasket/minibasketmodal.tpl"}]
</div>
<div id="lowerHeader" class="clear">
    [{include file="widget/header/topcategories.tpl"}]
    [{include file="widget/header/search.tpl"}]

    [{oxifcontent ident="trotelefon" object="_cont"}]
        <div id="telefonnummer">[{$_cont->oxcontents__oxcontent->value}]</div>
    [{/oxifcontent}]

    [{if !$blHideBreadcrumb}]
        [{ include file="widget/breadcrumb.tpl"}]
    [{/if}]

</div>
[{*if ($oView->getClassName()=='start' || $oView->getClassName()=='alist') && $oView->getBanners()|@count > 0 }]
    <div class="oxSlider">
        [{include file="widget/promoslider.tpl" }]
    </div>
[{/if*}]
