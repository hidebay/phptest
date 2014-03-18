[{block name="checkout_steps_main"}]
    <ul class="checkoutSteps clear">
        [{if $oxcmp_basket->getProductsCount() }]
            [{assign var=showStepLinks value=true}]
        [{/if}]

        [{block name="checkout_steps_basket"}]
            <li class="step1[{ if $active == 1}] active [{elseif $active > 1}] passed [{/if}]">
                <div>
                    [{if $showStepLinks}]<a rel="nofollow" href="[{ oxgetseourl ident=$oViewConf->getBasketLink() }]">[{/if}]
                    [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_BASKET" }]
                    [{if $showStepLinks}]</a>[{/if}]
                </div>
                <div class="substep">
                  [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_BASKET_SUB" }]
                </div>
            </li>
        [{/block}]

        [{assign var=showStepLinks value=false}]
        [{if !$oView->isLowOrderPrice() && $oxcmp_basket->getProductsCount() }]
            [{assign var=showStepLinks value=true}]
        [{/if}]

        [{block name="checkout_steps_send"}]
            <li class="step2[{ if $active == 2}] active [{elseif $active > 2}] passed [{/if}]">
                <div>
                    [{if $showStepLinks}]<a rel="nofollow" href="[{ oxgetseourl ident=$oViewConf->getOrderLink() }]">[{/if}]
                    [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_SEND" }]
                    [{if $showStepLinks}]</a>[{/if}]
                </div>
                <div class="substep">
                  [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_SEND_SUB" }]
                </div>
            </li>
        [{/block}]

        [{assign var=showStepLinks value=false}]
        [{if $active != 1 && $oxcmp_user && !$oView->isLowOrderPrice() && $oxcmp_basket->getProductsCount() }]
            [{assign var=showStepLinks value=true}]
        [{/if}]

        [{block name="checkout_steps_pay"}]
            <li class="step3[{ if $active == 3}] active [{elseif $active > 3}] passed [{/if}]">
                <div>
                    [{if $showStepLinks}]<a rel="nofollow" [{if $oViewConf->getActiveClassName() == "user"}]id="paymentStep"[{/if}] href="[{ oxgetseourl ident=$oViewConf->getPaymentLink() }]">[{/if}]
                    [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_PAY" }]
                    [{if $showStepLinks}]</a>[{/if}]
                </div>
                <div class="substep">
                  [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_PAY_SUB" }]
                </div>
            </li>
        [{/block}]

        [{assign var=showStepLinks value=false}]
        [{if $active != 1 && $oxcmp_user && $oxcmp_basket->getProductsCount() && $oView->getPaymentList() && !$oView->isLowOrderPrice()}]
            [{assign var=showStepLinks value=true}]
        [{/if}]

        [{block name="checkout_steps_order"}]
            <li class="step4[{ if $active == 4}] active [{elseif $active > 4}] passed [{/if}]">
                <div>
                    [{if $showStepLinks}]<a rel="nofollow" [{if $oViewConf->getActiveClassName() == "payment"}]id="orderStep"[{/if}] href="[{ if $oViewConf->getActiveClassName() == "payment"}]javascript:document.forms.order.submit();[{else}][{ oxgetseourl ident=$oViewConf->getOrderConfirmLink() }][{/if}]">[{/if}]
                    [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_ORDER" }]
                    [{if $showStepLinks}]</a>[{/if}]
                </div>
                <div class="substep">
                  [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_ORDER_SUB" }]
                </div>
            </li>
        [{/block}]

        [{block name="checkout_steps_laststep"}]
            <li class="step5[{ if $active == 5}] activeLast [{else}] defaultLast [{/if}] ">
                <div>
                    [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_LASTSTEP" }]
                </div>
                <div class="substep">
                  [{ oxmultilang ident="TRO_PAGE_CHECKOUT_STEPS_LASTSTEP_SUB" }]
                </div>
            </li>
        [{/block}]
    </ul>
[{/block}]