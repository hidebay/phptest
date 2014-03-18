[{if $blShowNoScript}]
[{if $inptcounter > -1 && $inptcounter < ($paymencnt-1) }]
<noscript>
                  </table>
                </div>
                [{if $oView->isLowOrderPrice()}]
                  <div class="bar prevnext order">
                    <div class="minorderprice">[{ oxmultilang ident="BASKET_MINORDERPRICE" }] [{ $oView->getMinOrderPrice() }] [{ $currency->sign }]</div>
                  </div>
                [{else}]
                  <div class="bar prevnext">
                    <div class="right arrowright">
                        <input id="test_PaymentNextStepBottom" name="userform" type="submit" value="[{ oxmultilang ident="PAYMENT_NEXTSTEP" }]" onclick="javascript:submitActiveForm();return false;">
                    </div>
                  </div>
                [{/if}]
                <div class="box info">
                  <table class="form" style="width:92%">
</noscript>
[{/if}]
[{else}]
  [{if $payment->blExtPayment}]
    <form method="post" action="[{$ipayment_posturl}]" id="payform_[{$sPaymentID}]">
    <input type="hidden" name="trxuser_id" value="[{$ipayment_user}]">
    <input type="hidden" name="trxpassword" value="[{$ipayment_pw}]">
    <input type="hidden" name="trx_paymenttyp" value="[{$payment->sPaymentType}]">
    <input type="hidden" name="trx_amount" value="[{$ipayment_orderprice}]">
    <input type="hidden" name="trx_currency" value="[{$currency->name}]">
    <input type="hidden" name="trx_typ" value="[{$ipayment_transtype}]">
    [{if $ipayment_security}]<input type="hidden" name="trx_securityhash" value="[{$ipayment_security}]">[{/if}]
    <input type="hidden" name="silent" value="1">
    <input type="hidden" name="silent_error_url" value="[{$shop->sslselflink}][{$ipayment_serrorrurl}]">
    [{*<input type="hidden" name="hidden_trigger_url" value="[{$shop->sslselflink}][{$ipayment_htriggerurl}]">*}]
    <input type="hidden" name="redirect_url" value="[{$shop->sslselflink}][{$ipayment_redirecturl}]">
    <input type="hidden" name="noparams_on_redirect_url" value="0">
    <input type="hidden" name="addr_street" value="[{$oxcmp_user->oxuser__oxstreet->value }] [{$oxcmp_user->oxuser__oxstreetnr->value }]">
    <input type="hidden" name="addr_city" value="[{$oxcmp_user->oxuser__oxcity->value }]">
    <input type="hidden" name="addr_zip" value="[{$oxcmp_user->oxuser__oxzip->value }]">
    <input type="hidden" name="addr_country" value="[{$oxcmp_user->oCountry->oxcountry__oxisoalpha2->value }]">
    [{if $oxcmp_user->oState}]<input type="hidden" name="addr_state" value="[{$oxcmp_user->oState->oxstates__oxisoalpha2->value }]">[{/if}]
    <input type="hidden" name="addr_telefon" value="[{$oxcmp_user->oxuser__oxfon->value }]">
    <input type="hidden" name="addr_email" value="[{$oxcmp_user->oxuser__oxusername->value}]">
    <input type="hidden" name="send_confirmation_email" value="1">
    <input type="hidden" name="order_id" value="">
    <input type="hidden" name="shopper_id" value="OXID">
    <input type="hidden" name="check_fraudattack" value="1">
    <input type="hidden" name="from_ip" value="[{$ipayment_userip}]">
    <input type="hidden" name="use_datastorage" value="1">
    <input type="hidden" name="use_payment_authentication" value="1">
    <input type="hidden" name="client_name" value="[{$ipayment_client_name}]">
    <input type="hidden" name="client_version" value="[{$ipayment_client_version}]">
    <input type="hidden" name="ppcbedc" value="[{$ipayment_ppcbedc}]">
    <input type="hidden" name="datastorage_expirydate" value="[{$ipayment_datastorage_expirydate}]">
    <input type="hidden" name="error_lang" value="[{$ipayment_error_lang}]">
    [{if $ipayment_return_paymentdata}]<input type="hidden" name="return_paymentdata_details" value="1">[{/if}]
  [{else}]  
    <form action="[{$shop->sslselflink}]" name="order" method="post" id="payform_[{$sPaymentID}]">
    [{ $shop->hiddensid }]
    <input type="hidden" name="cl" value="[{$shop->cl}]">
    <input type="hidden" name="fnc" value="validatepayment">
    <input type="hidden" name="cnid" value="[{$shop->cnid}]">
  [{/if}]
  <script type="text/javascript">
  <!--
  addPaymentForm( "[{$sPaymentID}]", document.getElementById("payform_[{$sPaymentID}]") );
  -->
  </script>
[{/if}]