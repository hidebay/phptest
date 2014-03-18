[{ if !$az_ipayment_blActive }]
    [{* If the ipayment module has been deactivated then return the unmodified parent block: *}]
	[{ $smarty.block.parent }]
[{ else }]

	[{* Close the form of the previous payment type (or the original form of the payment template: *}]
	</form>

[{ if $paymentmethod->blExtPayment }]
	[{* Add a form for an ipayment payment method (needed because ipayment data must be submitted directly to the ipayment server): *}]
	<form method="post" action="[{$ipayment_posturl}]" id="payform_[{$sPaymentID}]">
        <input type="hidden" name="trxuser_id" value="[{$ipayment_user}]">
        <input type="hidden" name="trxpassword" value="[{$ipayment_pw}]">
        <input type="hidden" name="trx_paymenttyp" value="[{$paymentmethod->sPaymentType}]">
        <input type="hidden" name="trx_amount" value="[{$ipayment_orderprice}]">
        <input type="hidden" name="trx_currency" value="[{$currency->name}]">
        <input type="hidden" name="trx_typ" value="[{$ipayment_transtype}]">
        [{if $ipayment_security}]<input type="hidden" name="trx_securityhash" value="[{$ipayment_security}]">[{/if}]
        <input type="hidden" name="silent" value="1">
        <input type="hidden" name="silent_error_url" value="[{ $oViewConf->getSslSelfLink()|oxaddparams:$ipayment_serrorrurl}]">
        [{*<input type="hidden" name="hidden_trigger_url" value="[{ $oViewConf->getSslSelfLink()|oxaddparams:$ipayment_htriggerurl }]">*}]
        <input type="hidden" name="redirect_url" value="[{ $oViewConf->getSslSelfLink()|oxaddparams:$ipayment_redirecturl }]">
        <input type="hidden" name="noparams_on_redirect_url" value="0">
        <input type="hidden" name="addr_street" value="[{$oxcmp_user->oxuser__oxstreet->value }] [{$oxcmp_user->oxuser__oxstreetnr->value }]">
        <input type="hidden" name="addr_city" value="[{$oxcmp_user->oxuser__oxcity->value }]">
        <input type="hidden" name="addr_zip" value="[{$oxcmp_user->oxuser__oxzip->value }]">
        <input type="hidden" name="addr_country" value="[{ $ipayment_country }]">
        <input type="hidden" name="addr_state" value="[{ $ipayment_state }]">
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
[{ else }]
	[{* Add a form for a non-ipayment payment method: *}]
    <form action="[{ $oViewConf->getSslSelfLink() }]" name="order" method="post" id="payform_[{$sPaymentID}]">
        [{ $oViewConf->getHiddenSid() }]
        [{ $oViewConf->getNavFormParams() }]
        <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
        <input type="hidden" name="fnc" value="validatepayment">
[{/if }]

[{* Show the original template block (replace the original dynvalue input names with the ipayment input names): *}]
[{ capture name="az_ipayment_parent_payment_block" }]
	[{ $smarty.block.parent }]
[{/capture }]

[{ if $paymentmethod->blExtPayment }]
    [{ $smarty.capture.az_ipayment_parent_payment_block|replace:"dynvalue[kktype]":"cc_typ"|replace:"dynvalue[kknumber]":"cc_number"|replace:"dynvalue[kkname]":"addr_name"|replace:"dynvalue[kkmonth]":"cc_expdate_month"|replace:"dynvalue[kkyear]":"cc_expdate_year"|replace:"dynvalue[kkpruef]":"cc_checkcode"|replace:"dynvalue[lsbankname]":"bank_name"|replace:"dynvalue[lsblz]":"bank_code"|replace:"dynvalue[lsktonr]":"bank_accountnumber"|replace:"dynvalue[lsktoinhaber]":"addr_name"|replace:'value="mcd"':'value="MasterCard"'|replace:'value="vis"':'value="VisaCard"'|replace:'value="amx"':'value="AmexCard"'|replace:'value="dsc"':'value="DiscoverCard"'|replace:'value="dnc"':'value="DinersClubCard"'|replace:'value="jcb"':'value="JCBCard"'|replace:'value="swi"':'value="SwitchCard"' }]
[{ else }]
    [{ $smarty.capture.az_ipayment_parent_payment_block }]
[{ /if }]

[{* Register the payment menthod form, so that the radio buttons work across the forms and the correct form is submitted when the "next" button is clicked: *}]
<script type="text/javascript">
<!--
addPaymentForm( "[{$sPaymentID}]", document.getElementById( "payform_[{$sPaymentID}]" ) );
//-->
</script>

[{* Offer a submit button for each payment method form if javascript is not available: *}]
<noscript>
    <div class="clear">
		<input type="hidden" name="paymentid" value="[{$sPaymentID}]">
		<button type="submit" name="userform" class="submitButton nextStep largeButton" id="paymentNextStepBottom_[{$sPaymentID}]">[{ "AZ_IPAYMENT_SELECT_PAYMENT"|oxmultilangassign|replace:"%PAYMENTMETHOD%":$paymentmethod->oxpayments__oxdesc->value }]</button>
    </div>
</noscript>

[{* Close the last payment method form and open a new form for the submit button: *}]
[{ if $smarty.foreach.PaymentSelect.last }]
	</form>
	[{* Make the form after the payment method forms hidden by default and show it using javascript later on: *}]
    <form action="[{ $oViewConf->getSslSelfLink() }]" class="oxValidate" id="azSubmitPayment" name="order" method="post">
        <div>
            [{ $oViewConf->getHiddenSid() }]
            [{ $oViewConf->getNavFormParams() }]
            <input type="hidden" name="cl" value="[{ $oViewConf->getActiveClassName() }]">
            <input type="hidden" name="fnc" value="validatepayment">
        </div>
[{/if }]

[{/if }]