[{capture append="oxidBlock_content"}]
    
    [{* ordering steps *}]
    [{include file="page/checkout/inc/steps.tpl" active=1 }]

    [{block name="checkout_basket_main"}]
        [{assign var="currency" value=$oView->getActCurrency() }]
        [{if !$oxcmp_basket->getProductsCount()  }]
            [{block name="checkout_basket_emptyshippingcart"}]
                <div class="status corners error">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_EMPTYSHIPPINGCART" }]</div>
            [{/block}]
        [{else }]
            <div class="lineBox clear">
                [{if $oView->showBackToShop()}]
                    [{block name="checkout_basket_backtoshop_top"}]
                        <div class="backtoshop">
[{*** D3 MOD NEXT_LINE  * GoogleAnalytics ***}]
                            <form action="[{ $oViewConf->getSslSelfLink()|oxaddparams:"cl=basket" }]" method="post">                                
                            	[{ $oViewConf->getHiddenSid() }]
                                <input type="hidden" name="cl" value="basket">
                                <input type="hidden" name="fnc" value="backtoshop">
                                <button type="submit" class="submitButton largeButton">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_CONTINUESHOPPING" }]</button>
                            </form>
                        </div>
                    [{/block}]
                [{/if}]

                [{if $oView->isLowOrderPrice() }]
                    [{block name="checkout_basket_loworderprice_top"}]
                        <div>[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_MINORDERPRICE" }] [{ $oView->getMinOrderPrice() }] [{ $currency->sign }]</div>
                    [{/block}]
                [{else}]
                    [{block name="basket_btn_next_top"}]
[{*** D3 MOD NEXT_LINE  * GoogleAnalytics ***}]
                        <form action="[{ $oViewConf->getSslSelfLink()|oxaddparams:"cl=user" }]" method="post">                            
                        	[{ $oViewConf->getHiddenSid() }]
                            <input type="hidden" name="cl" value="user">
                            <button type="submit" class="submitButton largeButton nextStep">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_NEXTSTEP" }]</button>
                        </form>
                    [{/block}]
                [{/if}]
            </div>

            [{include file="page/checkout/inc/basketcontents.tpl" editable=true}]

            [{if $oViewConf->getShowVouchers()}]
                [{block name="checkout_basket_vouchers"}]
                    [{oxscript include="js/widgets/oxinputvalidator.js" priority=10 }]
                    [{oxscript add="$('form.js-oxValidate').oxInputValidator();"}]
[{*** D3 MOD NEXT_LINE  * GoogleAnalytics ***}]
                    <form name="voucher" action="[{ $oViewConf->getSelfActionLink()|oxaddparams:"cl=basket" }]" method="post" class="js-oxValidate">
                        <div class="couponBox" id="coupon">
                            [{foreach from=$Errors.basket item=oEr key=key}]
                                [{if $oEr->getErrorClassType() == 'oxVoucherException'}]
                                    <div class="inlineError">
                                        [{ oxmultilang ident="PAGE_CHECKOUT_BASKET_COUPONNOTACCEPTED1" }] <strong>&ldquo;[{ $oEr->getValue('voucherNr') }]&rdquo;</strong> [{ oxmultilang ident="PAGE_CHECKOUT_BASKET_COUPONNOTACCEPTED2" }]<br>
                                        <strong>[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_REASON" }]</strong>
                                        [{ $oEr->getOxMessage() }]
                                    </div>
                                [{/if}]
                            [{/foreach}]
                            <label>[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_ENTERCOUPONNUMBER" }]</label>
                            [{ $oViewConf->getHiddenSid() }]
                            <input type="hidden" name="cl" value="basket">
                            <input type="hidden" name="fnc" value="addVoucher">
                            <input type="text" size="20" name="voucherNr" class="textbox js-oxValidate js-oxValidate_notEmpty">
                            <button type="submit" class="couponbutton">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_SUBMITCOUPON" }]</button><br/><br/>
<!-- Gutschein zu bearbeiten-->
<!-- Eingeloggt-->
							[{if $oxcmp_user->oxuser__oxpassword->value}]
							<!--<p>Wie ich sehe sind Sie bereits eingeloggt...</p>-->
							
							[{else}]
							<p>[{ oxmultilang ident="VOUCHERMELDUNG" }]</p>
							[{/if}]
                            
<!-- Gutschein ende -->
                            <p class="oxValidateError">
                                <span class="js-oxError_notEmpty">[{ oxmultilang ident="EXCEPTION_INPUT_NOTALLFIELDS" }]</span>
                            </p>
                            <input type="hidden" name="CustomError" value='basket'>
                        </div>
                    </form>
                [{/block}]
            [{/if}]
            <div class="lineBox clear">
                [{if $oView->showBackToShop()}]
                    [{block name="checkout_basket_backtoshop_bottom"}]
[{*** D3 MOD NEXT_LINE  * GoogleAnalytics ***}]
                        <form action="[{ $oViewConf->getSslSelfLink()|oxaddparams:"cl=basket" }]" method="post">                            
                        	<div class="backtoshop">
                                [{ $oViewConf->getHiddenSid() }]
                                <input type="hidden" name="cl" value="basket">
                                <input type="hidden" name="fnc" value="backtoshop">
                                <button type="submit" class="submitButton largeButton">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_CONTINUESHOPPING" }]</button>
                            </div>
                        </form>
                    [{/block}]
                [{/if}]

                [{if $oView->isLowOrderPrice() }]
                    [{block name="checkout_basket_loworderprice_bottom"}]
                        <div>[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_MINORDERPRICE" }] [{ $oView->getMinOrderPrice() }] [{ $currency->sign }]</div>
                    [{/block}]
                [{else}]
                    [{block name="basket_btn_next_bottom"}]
[{*** D3 MOD NEXT_LINE  * GoogleAnalytics ***}]
                        <form action="[{ $oViewConf->getSslSelfLink()|oxaddparams:"cl=user" }]" method="post">                            
                        	[{ $oViewConf->getHiddenSid() }]
                            <input type="hidden" name="cl" value="user">
                            <button type="submit" class="submitButton largeButton nextStep">[{ oxmultilang ident="PAGE_CHECKOUT_BASKET_NEXTSTEP" }]</button>
                        </form>
                    [{/block}]
                [{/if}]
            </div>
        [{/if }]
        [{if $oView->isWrapping() }]
           [{include file="page/checkout/inc/wrapping.tpl"}]
        [{/if}]
    [{/block}]
    [{insert name="oxid_tracker" title=$template_title }]
[{/capture}]

[{include file="layout/page.tpl" sidebar="Left"}]
