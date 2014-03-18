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
                        <div id="service1"><!--<dt>--><strong>[{oxmultilang ident="FOOTER_SERVICES" }]</strong>
                        <!--</dt>--></div>
                        <div id="service2"><!--<dd>-->
                        [{oxifcontent ident="trofooterservice" object="oContent"}]
                          [{ $oContent->oxcontents__oxcontent->value }]
                        [{/oxifcontent}]
                        [{*include file="widget/footer/services.tpl"*}]
                        <!--</dd>--></div>
                    </dl>
                [{/block}]    
                [{block name="footer_rechts"}]
                
                [{oxifcontent ident="trofooterprodukt" object="oContent"}]          
                    [{*oxifcontent ident="oxdeliveryinfo" object="oCont"*}]
                    <dl id="mwst">
                        <div id="footerrechtsueb"><!--<dt>--><strong>[{*oxmultilang ident="TRO_MWST_INFO"*}][{$oContent->oxcontents__oxtitle->value}]</strong><!--</dt>--></div>
                        <div id="footerrechts"><!--<dd>-->
                        [{*oxifcontent ident="foot" object="oCont"*}]
                          [{* $oCont->oxcontents__oxcontent->value *}]
                          [{$oContent->oxcontents__oxcontent->value}]
                        [{*/oxifcontent*}]
                        <!--</dd>--></div>
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
<!--<a href="#" onclick="hm_loadHeatmap();">Heatmap zeigen</a>-->

<!--Clicky 08.01.13 Testphase-->
[{*<a title="Web Statistics" href="http://clicky.com/100566466"><img alt="Web Statistics" src="//static.getclicky.com/media/links/badge.gif" border="0" /></a>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(100566466); }catch(e){}</script>
<noscript><p><img alt="Clicky" width="1" height="1" src="//in.getclicky.com/100566466ns.gif" /></p></noscript>*}]
<!--Clicky ende-->
<!-- Piwik --> 
<script type="text/javascript">
var pkBaseURL = (("https:" == document.location.protocol) ? "https://bodynova.de/analyse/" : "http://bodynova.de/analyse/");
document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
</script><script type="text/javascript">
try {
var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 1);
piwikTracker.trackPageView();
piwikTracker.enableLinkTracking();
} catch( err ) {}
</script><noscript><p><img src="http://bodynova.de/analyse/piwik.php?idsite=1" style="border:0" alt="" /></p></noscript>
<!-- End Piwik Tracking Code -->
<!-- Google Analytics-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  var pluginUrl = 
 '//www.google-analytics.com/plugins/ga/inpage_linkid.js';
_gaq.push(['_require', 'inpage_linkid', pluginUrl]);
  _gaq.push(['_setAccount', 'UA-39003869-1']);
  _gaq.push(['_setDomainName', 'bodynova.de']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--Google Analytics-->