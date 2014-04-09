<div id="header" class="clear">
      [{*include file="widget/header/currencies.tpl"*}]

      [{assign var="slogoImg" value="logo.png"}]
      <a id="logo" href="[{$oViewConf->getHomeLink()}]" title="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"><img src="[{$oViewConf->getImageUrl($slogoImg)}]" alt="[{$oxcmp_shop->oxshops__oxtitleprefix->value}]"></a>

      [{oxifcontent ident="troheadercenter" object="_cont"}]
          <div id="headercenter">
            [{if $oxcmp_user->oxuser__oxpassword->value}]
              [{ oxmultilang ident="GREETING" }]
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
                <li><a id="registerLink" href="[{ oxgetseourl ident=$oViewConf->getSslSelfLink()|cat:"cl=register" }]" title="[{oxmultilang ident="REGISTER"}]">[{oxmultilang ident="REGISTER"}]</a></li>
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
