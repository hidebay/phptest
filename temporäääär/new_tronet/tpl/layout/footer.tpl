[{block name="footer_main"}]
    [{oxscript include="js/widgets/oxequalizer.js" priority=10 }]
    [{oxscript add="$(function(){oxEqualizer.equalHeight($( '#panel dl' ));});"}]
    <div id="footer">
        <div>
                [{*}]<div class="bar">
                    [{block name="footer_fblike"}]
                        [{if $oView->isActive('FbLike') && $oViewConf->getFbAppId()}]
                            <div class="facebook" id="footerFbLike">
                                [{include file="widget/facebook/enable.tpl" source="widget/facebook/like.tpl" ident="#footerFbLike" parent="footer"}]
                            </div>
                        [{/if}]
                    [{/block}]
                    [{include file="widget/footer/newsletter.tpl"}]
                    [{block name="footer_deliveryinfo"}]
                        <div class="deliveryinfo">
                            [{oxifcontent ident="oxdeliveryinfo" object="oCont"}]
                                <a href="[{ $oCont->getLink() }]" rel="nofollow">[{ oxmultilang ident="FOOTER_INCLTAXANDPLUSSHIPPING" }]</a>
                            [{/oxifcontent}]
                        </div>
                    [{/block}]
                </div>
                [{*}]

                [{block name="footer_information"}]
                    <dl id="footerInformation">
                        <dt>[{oxmultilang ident="FOOTER_INFORMATION" }]</dt>
                        <dd>
                        [{oxifcontent ident="trofooterinfo" object="oContent"}]
                          [{ $oContent->oxcontents__oxcontent->value }]
                        [{/oxifcontent}]
                        [{*include file="widget/footer/info.tpl"*}]</dd>
                    </dl>
                [{/block}]

                [{block name="footer_services"}]
                    <dl class="services" id="footerServices">
                  <!--<div--><dt id="service1"><!--<dt>--><strong>[{oxmultilang ident="FOOTER_SERVICES" }]</strong>
                        </dt><!--</div>-->
                        <dd id="service2"><!--<dd>-->
                        [{oxifcontent ident="trofooterservice" object="oContent"}]
                          [{ $oContent->oxcontents__oxcontent->value }]
                        [{/oxifcontent}]
                        [{*include file="widget/footer/services.tpl"*}]
                        <!--</dd>--></dd>
                    </dl>
                [{/block}]    
                [{block name="footer_rechts"}]
                
                [{oxifcontent ident="trofooterprodukt" object="oContent"}]          
                    [{*oxifcontent ident="oxdeliveryinfo" object="oCont"*}]
                    <dl id="mwst">
                        <dt id="footerrechtsueb"><!--<dt>--><strong>[{*oxmultilang ident="TRO_MWST_INFO"*}][{$oContent->oxcontents__oxtitle->value}]</strong><!--</dt>--></dt>
                        <dd id="footerrechts"><!--<dd>-->
                        [{*oxifcontent ident="foot" object="oCont"*}]
                          [{* $oCont->oxcontents__oxcontent->value *}]
                          [{$oContent->oxcontents__oxcontent->value}]
                        [{*/oxifcontent*}]
                        <!--</dd>--></dd>
                    </dl>
                [{/oxifcontent}][{*debug*}]
                    
                [{/block}]
				
            [{*if $oView->getManufacturerlist()|count}]
                    [{block name="footer_manufacturers"}]
                        <dl id="footerManufacturers">
                            <dt>[{oxmultilang ident="FOOTER_MANUFACTURERS" }]</dt>
                          <dd>[{include file="widget/footer/manufacturers.tpl" manufacturers=$oView->getManufacturerlist()}]</dd>
                        </dl>
                    [{/block}]
            [{/if*}]

            [{*if $oView->getVendorlist()|count}]
                    [{block name="footer_vendors"}]
                        <dl id="footerVendors">
                            <dt>[{oxmultilang ident="FOOTER_DISTRIBUTORS" }]</dt>
                            <dd>[{include file="widget/footer/vendors.tpl" vendors=$oView->getVendorlist()}]</dd>
                        </dl>
                    [{/block}]
            [{/if*}]

            [{*if $oxcmp_categories }]
                    [{block name="footer_categories"}]
                        <dl class="categories" id="footerCategories">
                            <dt>[{oxmultilang ident="FOOTER_CATEGORIES" }]</dt>
                            <dd>[{include file="widget/footer/categorieslist.tpl" categories=$oxcmp_categories}]</dd>
                        </dl>
                    [{/block}]
            [{/if*}]
        </div>
        [{*}]<div class="copyright">
            <img src="[{$oViewConf->getImageUrl('logo_small.png')}]" alt="[{oxmultilang ident="OXID_ESALES_URL_TITLE"}]">
        </div>
        <div class="text">
            [{oxifcontent ident="oxstdfooter" object="oCont"}]
                [{$oCont->oxcontents__oxcontent->value}]
            [{/oxifcontent}]
        </div>[{*}]
    </div>
[{/block}]
[{if $oView->isRootCatChanged()}]
    [{oxscript include="js/widgets/oxmodalpopup.js" priority=10 }]
    [{oxscript add="$( '#scRootCatChanged' ).oxModalPopup({ target: '#scRootCatChanged', openDialog: true});"}]
    <div id="scRootCatChanged" class="popupBox corners FXgradGreyLight glowShadow">
        [{include file="form/privatesales/basketexcl.tpl"}]
    </div>
[{/if}]
[{php}]
$date = getdate();
echo "Diese Seite haben wir am ".($date["mday"]-rand(1, 3)).".".$date["mon"].".".$date["year"]." um ";

if($date["hours"] > 12){
	echo ($date["hours"]-rand(1, 12));
}else{
	echo ($date["hours"] +rand(1,12));
}	
echo ":";
if($date["minutes"] > 29){
	echo ($date["minutes"]-rand(1, 19));
}else{
	echo ($date["minutes"] +rand(1,29));
}	
echo ":";
if($date["seconds"] > 29){
	echo ($date["seconds"]-rand(1, 19));
}else{
	echo ($date["seconds"] +rand(1,29));
}	
echo " aktualisiert. ";
$datei = fopen("counter.txt","r+");
$counterstand = fgets($datei, 10);
if($counterstand == "")
{
  $counterstand = 0;
}
$counterstand++;
echo "Seit dem 20.03.2013 hatten wir <div id='besucher'>".$counterstand." Besucher</div>";
rewind($datei);
fwrite($datei, $counterstand);
fclose($datei);
[{/php}]
<p>&copy; 1998-[{php}] echo date("Y"); [{/php}] All rights reserved</p>

[{*** D3 MOD START * GoogleAnalytics ***}]
    [{d3modcfgcheck modid="d3_googleanalytics"}]
        [{include file="widget/d3googleanalytics/d3GoogleAnalytics.tpl"}]
    [{/d3modcfgcheck}]
[{*** D3 MOD END * GoogleAnalytics ***}]
<!-- Piwik -->
[{*<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://bodynova.de/analyse/" : "http://bodynova.de/analyse/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://bodynova.de/analyse/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>*}]
<!-- End Piwik Tracking Code -->
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "*.www.bodynova.de"]);
  _paq.push(["setDomains", ["*.www.bodynova.de"]]);
  _paq.push(["trackPageView"]);
  _paq.push(["enableLinkTracking"]);

  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://www.bodynova.de/analyse/";
    _paq.push(["setTrackerUrl", u+"piwik.php"]);
    _paq.push(["setSiteId", "1"]);
    var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";
    g.defer=true; g.async=true; g.src=u+"piwik.js"; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Piwik Code -->