[{capture append="oxidBlock_pageBody"}]

[{ if $az_ipayment_sBreakIframeUrl }]
	<br><br><br>
	<a href="[{ $az_ipayment_sBreakIframeUrl }]" target="_top">[{ oxmultilang ident="AZ_IPAYMENT_BREAK_IFRAME" }]</a>
	<script type="text/javascript"><!--
		window.top.location.href = "[{ $az_ipayment_sBreakIframeUrl }]";
	//--></script>
[{ else }]
	[{ $az_ipayment_s3dSecureHtml }]

	[{ if $az_ipayment_bl3dSecureJavascript }]
	<script type="text/javascript"><!--
		document.payauthForm.submit();
	//--></script>
	[{/if }]
[{/if }]

[{/capture}]
[{include file="layout/base.tpl"}]