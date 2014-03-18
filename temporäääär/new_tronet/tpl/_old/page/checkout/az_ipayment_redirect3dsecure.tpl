[{oxstyle include="css/checkout.css"}]
[{capture append="oxidBlock_content"}]
[{* ordering steps *}]
[{include file="page/checkout/inc/steps.tpl" active=4 }]
[{assign var="currency" value=$oView->getActCurrency() }]

<div class="text az_ipayment_iframe_container">
	[{ if $az_ipayment_s3dSecureIframeUrl }]
	    <iframe src="[{ $az_ipayment_s3dSecureIframeUrl }]" width="390" height="450" frameborder="0" class="az_ipayment_iframe">
	    </iframe>
	[{ elseif $az_ipayment_s3dSecureHtml }]
    	[{ $az_ipayment_s3dSecureHtml }]
    	<p>
    		<a href="[{ oxgetseourl ident=$oViewConf->getPaymentLink() }]">[{ oxmultilang ident="AZ_IPAYMENT_BACK_TO_SHOP" }]</a>.
    	</p>
        [{ if $az_ipayment_bl3dSecureJavascript }]
        <script type="text/javascript"><!--
        	document.payauthForm.submit();
        //--></script>
        [{/if }]
    [{/if }]
</div>

[{insert name="oxid_tracker" title=$template_title }]
[{/capture}]
[{include file="layout/page.tpl"}]