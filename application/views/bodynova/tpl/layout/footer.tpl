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
                        <dt>[{oxmultilang ident="INFORMATION" }]</dt>
                        <dd>
                        [{oxifcontent ident="trofooterinfo" object="oContent"}]
                          [{ $oContent->oxcontents__oxcontent->value }]
                        [{/oxifcontent}]
                        [{*include file="widget/footer/info.tpl"*}]</dd>
                    </dl>
                [{/block}]

                [{block name="footer_services"}]
                    <dl class="services" id="footerServices">
                  <!--<div--><dt id="service1"><!--<dt>--><strong>[{oxmultilang ident="SERVICES" }]</strong>
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
                [{/oxifcontent}]
                    
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
<div id="owncounter">
[{php}]
// holt das aktuelle Datum und speichert es als Array 
// mday = Tag 1-31
// mon = Monat 1-12
// year = Jahr yyyy
// hours = Stunde 1-24
// minutes = Minuten 1-60
// seconds = Sekunden 1-60 
$date = getdate();

// zum testen den Tag auf 1 gesetzt, da es am Anfang des Monats ein Berechnungsproblem gab.
// $date["mday"] = 1;

// Berechnet den Tag und setzt am Monatsanfang diesen einen zurück.
if($date["mday"] >= 3 ){
$day = $date["mday"]-rand(1, 3);
}else{
$day = rand(22,27);
$date["mon"] = $date["mon"]-1; 
}

// Gibt den ersten Teil des Satzes aus bis zum Datum.
echo "Diese Seite haben wir am ".$day.".".$date["mon"].".".$date["year"]." um ";

// Berechnung der Stunde.
if($date["hours"] >= 12){
	echo ($date["hours"]-rand(1, 12));
}else{
	echo ($date["hours"] +rand(1,12));
}

// Trenner	
echo ":";

// Berechnung der Minute.
if($date["minutes"] > 29){
	echo ($date["minutes"]-rand(1, 19));
}else{
	echo ($date["minutes"] +rand(1,29));
}

// Trenner	
echo ":";

// Berechnung der Sekunden
if($date["seconds"] > 29){
	echo ($date["seconds"]-rand(1, 19));
}else{
	echo ($date["seconds"] +rand(1,29));
}

// Zeitstempel ende.	
echo " aktualisiert. ";

// öffnet die Datei Counter.
$datei = fopen("counter.txt","r+");

// liest 7 Zeichen von rechts
$counterstand = fgets($datei, 7);

// falls die Datei, leer sein sollte oder nicht existiert, gibt er 0 anstatt einer Fehlermeldung zurück
if($counterstand == "")
{
  $counterstand = 0;
}

// die Anzahl der Besuche, erhöht sich jeweils um 1
$counterstand++;

// Die Anzahl der Besuche seit einem Festen Datum wird ausgegeben.
echo "Seit dem 20.03.2013 hatten wir <div id='besucher'>".$counterstand." Besucher</div>";

// setzt den Zeiger auf den Anfang des Datei inhaltes
rewind($datei);

// schreibt die aktuelle Zahl in die Datei.
fwrite($datei, $counterstand);

// schließt selbige wieder.
fclose($datei);

[{/php}]

<p>&copy; 1998-[{php}] echo date("Y"); [{/php}] All rights reserved</p>
</div>

[{* D3 MOD START * GoogleAnalytics}]
    [{d3modcfgcheck modid="d3_googleanalytics"}]
        [{include file="widget/d3googleanalytics/d3GoogleAnalytics.tpl"}]
    [{/d3modcfgcheck}]
[{D3 MOD END * GoogleAnalytics*}]