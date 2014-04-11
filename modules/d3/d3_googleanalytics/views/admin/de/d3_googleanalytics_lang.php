<?php

/**
 *    This module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further informations, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxidmodule.com
 * @link      http://www.shopmodule.com
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */

$sLangName = "Deutsch";

// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                                                      => 'ISO-8859-15',
    'd3mxgoogleanalytics'                                          => 'Google Analytics',
    'd3mxgoogleanalytics_settings'                                 => 'Einstellungen',
    'd3tbclgoogleanalytics_main'                                   => 'Analytics',
    'd3tbclgoogleanalytics_adwords'                                => 'Kampagnen (z.B. AdWords)',

    'D3_GOOGLEANALYTICS_CFG_TITLE'                                 => 'Google Analytics Schnittstelle - Einstellungen',

    'D3_GOOGLEANALYTICS_MAIN'                                      => 'Grundeinstellungen',
    'D3_GOOGLEANALYTICS_MAIN_GAID'                                 => 'Analyics-ID',
    'D3_GOOGLEANALYTICS_MAIN_GAID_DESC'                            => 'Fügen Sie hier die Google Analytics Konto-ID ein. Diese finden Sie in Ihrem GA-Konto und beginnt im Normalfall mit "UA-".',
    'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP'                          => 'IP-Adressen anonymisiert übertragen (dringend empfohlen)',
    'D3_GOOGLEANALYTICS_MAIN_ANONYMIZEIP_DESC'                     => 'Die IP-Adressen Ihrer Shopbesucher werden anonymisiert. Zwar werden dadurch die Gebietszuordnungen etwas ungenauer. Jedoch können Sie nur mit dieser Einstellung den Datenschutzvorschriften in Deutschland entsprechen.',
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME'                    => 'Seitenladezeit mit übertragen',
    'D3_GOOGLEANALYTICS_MAIN_TRACKPAGELOADTIME_DESC'               => 'Die Ladezeit Ihrer Seite ist, speziell auch in Hinblick auf verschiedene Länder, durchaus ein Faktor, der in das Ranking Ihrer Page einfliesst.',
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING'                       => 'Remarketing verwenden',
    'D3_GOOGLEANALYTICS_MAIN_USEREMARKETING_DESC'                  => 'Wenn Sie sich entschließen, Remarketing mit Google Analytics zu nutzen, setzen Sie diesen Haken. Nachdem Sie diese Änderung vorgenommen haben, erfasst und analysiert Google Analytics neben den üblichen Informationen auch das DoubleClick-Cookie, sofern vorhanden. Das DoubleClick-Cookie ermöglicht Remarketing im Google Display-Netzwerk für Produkte wie AdWords.',

    'D3_GOOGLEANALYTICS_ECOMMERCE'                                 => 'eCommerce-Einstellungen',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA'                        => 'eCommerce-Daten übertragen',
    'D3_GOOGLEANALYTICS_ECOMMERCE_SENDDATA_DESC'                   => 'Mit dieser Einstellung werden Warenkorbdaten Ihrer Kunden an Analytics übertragen. Damit können Sie z.B. die Produktleistung und Umsatzzahlen ermitteln.',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO'                        => 'Netto-Preise übertragen, wenn verfügbar',
    'D3_GOOGLEANALYTICS_ECOMMERCE_USENETTO_DESC'                   => 'Betreiben Sie einen B2B-Shop, übertragen Sie Ihre Artikelpreise netto an Analytics, wenn diese auch im Shop ohne Steuer zur Verfügung stehen. ',

    'D3_GOOGLEANALYTICS_DOMAIN'                                    => 'Multi-Domain-Einstellungen',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER'                     => 'Trackingdaten von unterschiedlichen Domains verwenden',
    'D3_GOOGLEANALYTICS_DOMAIN_SETALLOWLINKER_DESC'                => 'Cross Domain Tracking erlaubt das Sammeln von Trackinginformationen auch über verschiedene Domains hinweg. <br><br>Weitere Informationen finden Sie <a href="http://code.google.com/intl/de/apis/analytics/docs/tracking/asyncMigrationExamples.html" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME'                      => 'fixiert das Tracking-Cookie auf die angegebene Domain (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETDOMAINNAME_DESC'                 => 'Lassen Sie dieses Feld leer, ist das Tacking-Cookie für unterschiedliche Seiten gültig. Wenn Sie statt dessen eine Domain angeben, ist das gesetzte Cookie nur für Seiten unter dieser Domain gültig. Andere zu trackende Seiten setzen dann ein neues Cookie.<br><br>Der Eintrag sollte hier so aussehen: .yourDomainName.com<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/concepts/gaConceptsCookies.html#significanceOfName" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH'                      => 'Tracking nur auf ein Verzeichnis beschränken (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_SETCOOKIEPATH_DESC'                 => 'Ein Eintrag hier sollte so aussehen: /myStore/<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingSite.html" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY'                     => 'Cookie Informationen werden in das Verzeichnis der selben Domain kopiert (optional)',
    'D3_GOOGLEANALYTICS_DOMAIN_COOKIEPATHCOPY_DESC'                => 'Ein Eintrag hier sollte so aussehen: /myCart/<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingSite.html" target="gahelp">hier</a>.',

    'D3_GOOGLEANALYTICS_BROWSER'                                   => 'Browser-Daten',
    'D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO'                     => '<span style="font-weight: bold;">Deaktiviert</span> die Erkennung von Browserdaten (z.B. Name und Version)',
    'D3_GOOGLEANALYTICS_BROWSER_SETCLIENTINFO_DESC'                => 'Weitere Informationen finden Sie <a href="http://code.google.com/intl/de/apis/analytics/docs/gaJS/gaJSApiWebClient.html#_gat.GA_Tracker_._setClientInfo" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH'                    => '<span style="font-weight: bold;">Unterbindet</span> die Erkennung, ob beim Kunden das Flash-Plugin installiert ist.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTFLASH_DESC'               => 'Weitere Informationen finden Sie <a href="http://code.google.com/intl/de/apis/analytics/docs/gaJS/gaJSApiWebClient.html#_gat.GA_Tracker_._setDetectFlash" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE'                    => '<span style="font-weight: bold;">Verhindert</span> die Erkennung des Seitentitels.',
    'D3_GOOGLEANALYTICS_BROWSER_SETDETECTTITLE_DESC'               => 'Weitere Informationen finden Sie <a href="http://code.google.com/intl/de/apis/analytics/docs/gaJS/gaJSApiWebClient.html#_gat.GA_Tracker_._setDetectTitle" target="gahelp">hier</a>.',

    'D3_GOOGLEANALYTICS_CUSTOMVARS'                                => 'individuelle Daten',
    'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT'                       => 'individuelle Daten übertragen',
    'D3_GOOGLEANALYTICS_CUSTOMVARS_TRANSMIT_DESC'                  => 'Mit individuellen Daten können Sie Parameter übermitteln, die sonst im Rahmen des Trackingcodes nicht gesammelt werden. Ergänzen Sie den entsprechenden Abschnitt im Template "modules/d3/d3_googleanalytics/views/tpl/widget/d3_googleanalytics.tpl" um die gewünschten Daten. Als Beispiel ist die Übertragung des Kundengeschlechts angelegt.<br><br>Individuelle Daten können nicht mit jedem Tracking-Typ übertragen werden. Lesen Sie auf den Analytics-Hilfe-Seiten nach, ob und wann dies möglich ist. <br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/tracking/gaTrackingCustomVariables.html" target="gahelp">hier</a>.<br>Auf Anregung durch <a href="http://www.commodule.de/blog/tracking/zahlungsarten-in-google-analytics-tracken/" target="Commodule">Commodule-Blog</a> haben wir nun noch weitere Beispiele hinterlegt. Vielen Dank für diese Unterstützung!',

    'D3_GOOGLEANALYTICS_SECURITYINFORMATIONS'                      => 'Im CMS-Baustein "Analytics_Security_Informations" ist ein Text hinterlegt, den Sie Ihren Kunden unter Ihrer Datenschutzerklärung verfügbar machen sollten. Klären Sie jedoch bitte vor Verwendung von Google Analytics Tracking und diesem Hinweistext ab, ob beides mit den Datenschutzbestimmung Ihres Landes konform geht. Ausschließlich der Shopbetreiber haftet für Verstöße. Beraten Sie sich im Zweifel mit Ihrem Rechtsanwalt.<br><br>Nach Aktivierung des Tracking-Codes dauert es in der Regel ca. 24 Stunden, bis die ersten Tracking-Daten in Analytics zur Verfügung stehen.',
    // TODO: add content to package

    'D3_GOOGLEANALYTICS_ADWORDSGENERAL'                            => 'Kampagnen Grundeinstellungen',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK'              => 'Kampagnendaten <span style="font-weight: bold;">nicht</span> übertragen',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTRACK_DESC'         => 'Das Kampagnentracking ist im Standard aktiviert. Setzen Sie diesen Haken, um die Kampagnenübertragung zu deaktivieren.',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTHANKYOUONLY'       => 'Kampagnendaten nur in Bestellabschlussseite verwenden',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_SETCAMPAIGNTHANKYOUONLY_DESC'  => 'Ist dieser Haken nicht gesetzt, wird der Kampagnencode shopweit eingefügt. Das AdWords-Conversion Tracking erwartet die Daten jedoch nur bei Bestellabschluss. Ob diese Einstellung notwendig ist, erfahren Sie bei Ihrem Conversion Tracking Anbieter.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT'      => 'Kampagnenlaufzeit (optional, sonst 6 Monate)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_DESC' => 'Geben Sie hier eine optionale Laufzeit dieser Kampagne in Millisekunden an.<br><br>30 Tage = 2592000000<br>365 Tage = 31536000000',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPAIGNCOOKIETIMEOUT_MS'   => 'Millisekunden',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY'                  => 'zwingend verwendete Kampagne (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNOKEY_DESC'             => 'die hier festgelegte Kampagne wird zwingend verwendet, auch wenn die Cookie-Einstellungen schon eine andere Kampagne liefern.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/intl/de/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampNOKey" target="gahelp">hier</a>.',

    'D3_GOOGLEANALYTICS_ADWORDSCODE'                               => 'Kampagnen-Code',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_CODE'                          => 'AdWords-Code',
    'D3_GOOGLEANALYTICS_ADWORDSCODE_CODE_DESC'                     => 'Kopieren Sie hier den Kampagnen-Tracking-Code ein, den Sie auf Ihrer AdWords-Seite finden. Kopieren Sie auch das "script"-Tag mit.',

    'D3_GOOGLEANALYTICS_ADWORDSMAIN'                               => 'Individualisierung der Kampagnentrackings',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY'                => 'Kampagnenname (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPNAMEKEY_DESC'           => 'Unter diesem Namen sehen Sie die Auswertung der Daten aus dieser Shopkampagne in Analytics.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampNameKey" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY'              => 'Kampagnenmedium (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPMEDIUMKEY_DESC'         => 'Definieren Sie das Medium dieser Kampagne (z.B. Werbebanner, Mailkampagne oder auch Klickkampagne). Diese Einstellung finden Sie in der Kampagnenauswertung unter "Keywords".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampMediumKey" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY'              => 'Kampagnenquelle (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPSOURCEKEY_DESC'         => 'Benennen Sie hier die Quelle der Shopkampagne, vergeben Sie zum Beispiel den Webseiten-Name oder den Firmenname.<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampSourceKey" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY'                => 'Schlüsselwort(e) Ihrer Kampagne (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPTERMKEY_DESC'           => 'Auch diese Keywords erscheinen in Analytics unter "Keywords".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampTermKey" target="gahelp">hier</a>.',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY'             => 'Inhaltsbeschreibung der Kampagne (optional)',
    'D3_GOOGLEANALYTICS_ADWORDSMAIN_SETCAMPCONTENTKEY_DESC'        => 'Den beschrieben Inhalt finden Sie in der Auswertung als "Ad Content".<br><br>Weitere Informationen finden Sie <a href="http://code.google.com/apis/analytics/docs/gaJS/gaJSApiCampaignTracking.html#_gat.GA_Tracker_._setCampContentKey" target="gahelp">hier</a>.',

    'D3_GOOGLEANALYTICS_METADATA_TITLE'                            => 'Google Analytics Schnittstelle',
    'D3_GOOGLEANALYTICS_METADATA_DESC'                             => 'Dieses Modul stellt Ihnen die schnelle und unkomplizierte Einbindung Ihres Google-Analytics-Kontos in Ihren Shop zur Verfügung. Hierbei werden über standardisierte Schnittstellen die Besucherdaten und eCommerce-Daten zu Google übertragen.Ebenfalls übermittelt werden Daten der Website-Suche. Dem Modul liegen angepaßte Templates bei, mit denen auch die Trichter ordentlich protokolliert werden.',

);


/*

[{ oxmultilang ident="GENERAL_YOUWANTTODELETE" }]

*/
