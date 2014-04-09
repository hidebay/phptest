[{if $sPaymentID == "trosofortueberweisung"}]
<dl>
    <dt>
        <input id="payment_[{$sPaymentID}]" type="radio" name="paymentid" value="[{$sPaymentID}]" [{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]checked[{/if}]>
        <label for="payment_[{$sPaymentID}]"><b>[{ $paymentmethod->oxpayments__oxdesc->value}] [{ if $paymentmethod->fAddPaymentSum }]([{ $paymentmethod->fAddPaymentSum }] [{ $currency->sign}])[{/if}]</b></label>
    </dt>
    <dd class="[{if $oView->getCheckedPaymentId() == $paymentmethod->oxpayments__oxid->value}]activePayment[{/if}]">
        <ul>
        [{foreach from=$paymentmethod->getDynValues() item=value name=PaymentDynValues}]
            <li>
                <label>[{ $value->name}]</label>
                <input id="[{$sPaymentID}]_[{$smarty.foreach.PaymentDynValues.iteration}]" type="text" class="textbox" size="20" maxlength="64" name="dynvalue[[{$value->name}]]" value="[{ $value->value}]">
            </li>
        [{/foreach}]
        </ul>

        <div class="desc">
			[{ $paymentmethod->oxpayments__oxlongdesc->getRawValue()}]
			<a href="https://www.sofortueberweisung.de/cms/index.php?plink=fuerkaeufer&fs="><img src="[{$oViewConf->getModuleUrl('trosofortueberweisung','out/img/logo_200x75.png')}]" alt="www.sofortueberweisung.de" title="www.sofortueberweisung.de"></a><br /> [{oxmultilang ident="TROSU_FASTENSUP"}].<br />
			<p>[{oxmultilang ident="TROSU_THISSERVICEIS"}]</p>
			<p>[{oxmultilang ident="TROSU_LEARNMORE"}] <a href="https://www.sofortueberweisung.de/cms/index.php?plink=fuerkaeufer&fs=" title="[{oxmultilang ident="TROSU_OPENSNEWPAGE"}]" target="_blank">http://www.sofortueberweisung.de</a>.</p>
        </div>
    </dd>
</dl>	
[{else}]
    [{$smarty.block.parent}]
[{/if}]