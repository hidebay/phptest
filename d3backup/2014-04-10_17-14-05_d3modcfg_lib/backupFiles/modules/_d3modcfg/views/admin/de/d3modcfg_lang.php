<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

$sLangName = "Deutsch";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                                  => 'ISO-8859-15',
    'd3mxd3modules'                            => '<img src="../modules/_d3modcfg/public/d3logo.php" alt="D�" title="D� Data Development"> Module',
    'd3mxcfg'                                  => 'Modul-Connector',
    'd3mxcfgmod_settings'                      => 'Einstellungen',
    'd3mxextensions'                           => 'Modulverwaltung',
    'd3tbclext_installation'                   => 'Modulinstallation',
    'd3tbclext_status'                         => 'installierte Module',
    'd3tbclext_new'                            => 'verf�gbare Module',
    'd3mxlibs'                                 => 'Bibliotheken',
    'd3mxsysitems'                             => 'Systemeinstellungen',
    'd3tbclmoditems'                           => 'Moduleintr�ge',
    'd3tbclcfgitems'                           => 'Config-Eintr�ge',
    'd3tbclmaintenance'                        => 'Shop-Wartung',
    'd3tbclcfglibs'                            => 'Bibliothekseinstellungen',
    'd3tbcllib_status'                         => 'Status',
    'd3tbcllib_syscheck'                       => 'Systempr�fung',
    'd3tbcllib_support'                        => 'Support',

    'D3MODCFG_LIB_TRANSL'                      => 'Modul-Konfiguration',
    'D3MODCFG_LIB_HELPLINK'                    => 'Modul-Connector/Modul-Konfiguration/',

    'D3MODCFG_LIB_HELPLINK_STATUS'             => 'Update/',
    'D3MODCFG_LIB_HELPLINK_SUPPORT'            => 'Support/',
    'D3MODCFG_EXT_HELPLINK_STATUS'             => 'Extensions/',
    'D3MODCFG_EXT_HELPLINK_SUPPORT'            => 'Support/',

    'D3_MOD_LIB_INSTALLED'                     => 'installierte Bibliotheken',
    'D3_MOD_EXT_INSTALLED'                     => 'installierte Module',
    'D3_CFG_LIB_GETLIBLIST'                    => 'erneut auf Updates pr�fen',
    'D3_CFG_LIB_GETDETAILS'                    => 'Details anzeigen / Einstellungen',
    'D3_CFG_LIB_GETNEWLIBLIST'                 => 'erneut auf Updates pr�fen',
    'D3_CFG_LIB_CONNECTERROR'                  => 'Der Shop kann sich nicht mit dem Connector-Updater verbinden.\n\nBitte stellen Sie sicher, dass curl-Verbindungen oder server�bergreifende Dateiverbindungen m�glich sind.',
    'D3_CFG_LIB_VERSION'                       => 'Version',
    'D3_CFG_LIB_REVISION'                      => 'Rev.',
    'D3_CFG_LIB_SHOPVERSION'                   => 'f�r Shopversion',
    'D3_CFG_LIB_INSTALLDATE'                   => 'installiert am',
    'D3_CFG_LIB_NOTINSTALLED'                  => 'nicht installiert',
    'D3_CFG_LIB_INSTALLED'                     => 'installierte Version',
    'D3_CFG_LIB_INSTALLEDVERSIONNOTCONGRUENT'  => 'Die Versionsangaben des Moduls stimmen nicht �berein. M�glicherweise ist die Installation fehlerhaft.',
    'D3_CFG_LIB_AVAILABLE'                     => 'verf�gbare Version',
    'D3_MOD_LIB_AVAIL_REMOTELIBS'              => 'verf�gbare Bibliotheken',
    'D3_MOD_LIB_NOACTION'                      => 'kein Update notwendig',
    'D3_MOD_LIB_INSTALL'                       => 'Modul installieren',
    'D3_MOD_LIB_REFRESH'                       => 'Modul aktualisieren',
    'D3_MOD_EXT_REFRESH'                       => 'F�r das Modul ist ein Update verf�gbar',
    'D3_MOD_LIB_NOUPDATEINFO'                  => 'keine Updateinformationen f�r das Modul verf�gbar',
    'D3_MOD_LIB_NODOWNLOAD'                    => 'kein Download f�r das Modul verf�gbar',
    'D3_MOD_LIB_NOINSTALL'                     => 'keine Installation f�r das Modul verf�gbar',
    'D3_MOD_LIB_OVERWRITE'                     => '�berschreiben',
    'D3_MOD_LIB_DOWNLOAD'                      => 'als Datei herunterladen',
    'D3_MOD_LIB_BETA'                          => '(Beta)',
    'D3_CFG_LIB_VERSIONUNKNOWN'                => 'unbekannt',
    'D3_CFG_LIB_FORMERVERSION'                 => 'letzte Version',
    'D3_CFG_LIB_USEABLETO'                     => 'gepr�ft bis Shop',
    'D3_CFG_LIB_STATUS'                        => 'Status',
    'D3_CFG_LIB_LIBRARY'                       => 'Bibliothek',
    'D3_CFG_LIB_EXTENSION'                     => 'Modul',
    'D3_CFG_LIB_INFO'                          => 'Info',
    'D3_CFG_LIB_INSTALLATION'                  => 'Install.',
    'D3_CFG_LIB_DOWNLOADIT'                    => 'Downl.',
    'D3_CFG_LIB_UPDATE'                        => 'Update',
    'D3_CFG_LIB_MAINTENANCEMODE'               => 'Auf Grund von Wartungs- und Update-Arbeiten steht Ihnen die Aktualisierung leider kurzzeitig nicht zur Verf�gung. Bitte versuchen Sie es zu einem sp�teren Zeitpunkt erneut. Vielen Dank f�r Ihr Verst�ndnis.',

    'd3tbcl_licence'                           => 'Support',
    'D3_CFG_MOD_LIST_SETTLANG'                 => 'Einstellungen f�r Sprache',

    'D3_CFG_MOD_GENERAL_MODULEACTIVE'          => 'Modul aktiv',
    'D3_CFG_MOD_GENERAL_MODULEACTIVE_DESC'     => 'Diese Einstellung kontrolliert, ob dieses Modul �berhaupt aktiv sein darf und �nderungen an Daten oder Verhalten hervorrufen soll.',
    'D3_CFG_MOD_GENERAL_DEBUGACTIVE'           => 'Debug aktiv',
    'D3_CFG_MOD_GENERAL_DEBUGACTIVE_DESC'      => 'Aktivieren Sie mit dem Schalter den Debugmodus. Dieser bietet im Regelfall Hilfe bei der Modulentwicklung und Fehlersuche. Welche Funktionen im Einzelnen mit dem Debugmodus zur Verf�gung stehen, steht m�glicherweise in der Moduldokumentation bzw. kann Ihnen der Modulautor erkl�ren. Deaktivieren Sie den Debugmodus bitte unbedingt f�r den Livebetrieb.',
    'D3_CFG_MOD_GENERAL_TESTMODEACTIVE'        => 'Testmodus aktiv',
    'D3_CFG_MOD_GENERAL_TESTMODEACTIVE_DESC'   => 'Der Testmodus stellt im �blichen Sinne die Funktion des Moduls in testf�higer Version zur Verf�gung. Je nach Modul kann dies sein, dass z.B. Aktionen nicht live ausgef�hrt werden oder andere Zugangsdaten verwendet werden. Wenden Sie sich f�r genauere Informationen zum Umfang des Testmodus bitte an den Modulautor. Deaktivieren Sie den Testmodus bitte unbedingt f�r den Livebetrieb.',
    'D3_CFG_MOD_GENERAL_MODULELOGGING'         => 'Logging',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_NONE'    => 'kein Protokoll (Standard)',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_ALL'     => 'Alles protokollieren ',
    'D3_CFG_MOD_GENERAL_MODULELOGGING_ERRORS'  => 'Fehler mitschreiben',
    'D3_CFG_MOD_GENERAL_NOCONFIG_DESC'         => 'F�r diese Sprache konnte keine Konfiguration geladen werden.',
    'D3_CFG_MOD_GENERAL_NOCONFIG_BTN'          => 'Konfiguration anlegen',
    'D3_CFG_MOD_GENERAL_SAVE'                  => 'Speichern',
    'D3_CFG_MOD_GENERAL_CLRTMP'                => 'Bitte leeren Sie den TMP-Ordner Ihres Shops.',

    'D3_CFG_MOD'                               => 'Support',
    'D3_CFG_MOD_VERSION'                       => 'Version',
    'D3_CFG_MOD_VERSION_TEXT1'                 => 'Modul "',
    'D3_CFG_MOD_VERSION_TEXT2'                 => '", f�r OXID eShop',
    'D3_CFG_MOD_VERSION_INSTALLEDV'            => 'Installierte Modulversion:',
    'D3_CFG_MOD_VERSION_RESULT'                => 'Ergebnis der Updatepr�fung:',
    'D3_CFG_MOD_VERSION_AVAILVERSION'          => 'F�r Ihren Shop verf�gbare Modulversion:',
    'D3_CFG_MOD_VERSION_NEWESTVERSION'         => 'Aktuellste Modulversion:',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_1'  => 'Diese Modulversion ist verf�gbar, jedoch nicht f�r Ihre Shopversion freigegeben. Aktualisieren Sie Ihren Shop mindestens auf Version ',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_NOTE_2'  => ', um auch diese Modulversion einsetzen zu k�nnen.',
    'D3_CFG_MOD_VERSION_NEWESTVERSION_LIC'     => 'Diese Modulversion ist nicht in Ihrer Lizenz enthalten. Kontaktieren Sie uns, um Ihre Lizenz daf�r erweitern zu lassen.',
    'D3_CFG_MOD_VERSION_MODINFO'               => 'Weitere Informationen finden Sie hier.',
    'D3_CFG_MOD_VERSION_REV'                   => 'Rev.',
    'D3_CFG_MOD_VERSION_UPDLOAD1'              => 'Dieses Update k�nnen Sie',
    'D3_CFG_MOD_VERSION_UPDLOAD2'              => 'HIER',
    'D3_CFG_MOD_VERSION_UPDLOAD3'              => 'herunterladen',
    'D3_CFG_MOD_VERSION_UPDLOAD4'              => ' oder ',
    'D3_CFG_MOD_VERSION_UPDLOAD5'              => 'automatisch installieren',
    'D3_CFG_MOD_VERSION_CHECKTXT'              => 'Pr�fen Sie, ob Sie die aktuellste Version des Moduls einsetzen.',
    'D3_CFG_MOD_VERSION_STARTCHECK'            => 'Auf aktuelle Version pr�fen',
    'D3_CFG_MOD_VERSION_NONEWVERSION'          => 'Es ist keine neue Version f�r Ihren Shop verf�gbar.',
    'D3_CFG_MOD_VERSION_INSTALLSTATUS'         => 'Installationsfortschritt',

    'D3_CFG_MOD_SUPPORT'                       => 'Unterst�tzung',
    'D3_CFG_MOD_SUPPORT_1'                     => 'Bei Fragen oder Anregungen stehen wir Ihnen mit folgenden Kontaktm�glichkeiten gern zur Verf�gung:',
    'D3_CFG_MOD_SUPPORT_2'                     => 'Telefon: 03721-268090',
    'D3_CFG_MOD_SUPPORT_3'                     => 'Fax: 03721-265234',
    'D3_CFG_MOD_SUPPORT_4'                     => 'E-Mail:',
    'D3_CFG_MOD_SUPPORT_MAIL'                  => 'support@shopmodule.com',
    'D3_CFG_MOD_SUPPORT_5'                     => 'Die h�ufigsten Fragen zu diesem und anderen Modulen haben wir in unserer Online-FAQ zusammengestellt. Diese finden Sie unter <a href="http://faq.oxidmodule.de" target="_blank" alt="Modul-FAQ">http://faq.oxidmodule.de</a>.',
    'D3_CFG_MOD_SUPPORT_6'                     => 'Unsere FAQ wird st�ndig erweitert. Gern nehmen wir auch von Ihnen gew�nschte Antworten mit auf. Schreiben Sie uns!',

    'D3_CFG_MOD_DEV'                           => 'Anbieterkennzeichnung',
    'D3_CFG_MOD_DEV_TEXT1'                     => 'Dieses Modul wird entwickelt und vertrieben von:',
    'D3_CFG_MOD_DEV_ADR1'                      => 'Fa. D� Data Development',
    'D3_CFG_MOD_DEV_ADR2'                      => 'Inhaber Thomas Dartsch',
    'D3_CFG_MOD_DEV_ADR3'                      => 'Stollberger Stra�e 23',
    'D3_CFG_MOD_DEV_ADR4'                      => '09380 Thalheim / Erzgeb.',
    'D3_CFG_MOD_DEV_ADR5'                      => 'Deutschland',
    'D3_CFG_MOD_DEV_WEBLINK'                   => 'Homepage: <a href="http://www.shopmodule.com/" target="_blank" alt="D� Data Development">http://www.shopmodule.com</a>',
    'D3_CFG_MOD_DEV_MAILLINK'                  => 'E-Mail:<a href="mailto:info@shopmodule.com" alt="info@shopmodule.com">info@shopmodule.com</a>',
    'D3_CFG_MOD_DEV_MODULELINK'                => 'Eine �bersicht �ber alle unsere Module finden Sie unter <a href="http://www.oxidmodule.de/" target="_blank" alt="D� Data Development"><strong>http://www.oxidmodule.de</strong></a>',

    'D3_CFG_MOD_CHANGEKEY'                     => 'Lizenzschl�ssel tauschen',
    'D3_CFG_MOD_ADDKEY'                        => 'Lizenz aktivieren / aktualisieren',
    'D3_CFG_MOD_SHOWKEY'                       => 'Lizenzdetails anzeigen',
    'D3_CFG_MOD_ACTIVATE'                      => 'Aktivierung',
    'D3_CFG_MOD_ACTIVATE_1'                    => 'Lizenzschl�ssel:',
    'D3_CFG_MOD_ACTIVATE_2'                    => 'Lizenz speichern',
    'D3_CFG_MOD_LICDETAILS'                    => 'Lizenzdetails',
    'D3_CFG_MOD_LICDETAILS_GENERALVALID'       => 'Lizenzstatus:',
    'D3_CFG_MOD_LICDETAILS_VALIDDOMAIN'        => 'g�ltig f�r Domain:',
    'D3_CFG_MOD_LICDETAILS_VALIDLOCAL'         => 'in lokalem Testshop verwendbar:',
    'D3_CFG_MOD_LICDETAILS_VALID_YES'          => 'ja',
    'D3_CFG_MOD_LICDETAILS_VALIDLOCAL_DESC'    => "Das Modul ist neben der lizensierten Domain auch unter der IP \"127.0.0.1\" oder \"::1\" oder der Domain \"localhost\" als Testinstallation einsetzbar. K�nnen Sie die M�glichkeiten aus technischen Gr�nden nicht verwenden, richten Sie sich einfach die lizensierte Domain auf Ihrem Host ein.",
    'D3_CFG_MOD_LICDETAILS_VALIDFROMDATE'      => 'g�ltig ab:',
    'D3_CFG_MOD_LICDETAILS_VALIDTODATE'        => 'g�ltig bis:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORMODID'      => 'g�ltig f�r:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORMODVERSION' => 'Modulversion:',
    'D3_CFG_MOD_LICDETAILS_VALIDFORSHOPID'     => 'Shop-ID:',
    'D3_CFG_MOD_LICDETAILS_ISTEST'             => 'Testversion:',

    'D3_CFG_MOD_TRYORBUY'                      => 'Testen oder Kaufen?',
    'D3_CFG_MOD_TRYORBUY_1'                    => 'Demo-Schl�ssel anfordern',
    'D3_CFG_MOD_TRYORBUY_2'                    => 'Live-Schl�ssel anfordern',

    'D3_CFG_MOD_STAYINFORMED'                  => 'Informiert bleiben!',
    'D3_CFG_MOD_STAYINFORMED_1'                => 'Ich m�chte automatisch Informationen zu neuen Updates dieses Moduls erhalten.',
    'D3_CFG_MOD_STAYINFORMED_2'                => 'E-Mail-Adresse:',
    'D3_CFG_MOD_SAVE'                          => 'Speichern',

    'D3_CFG_MOD_SYS_CHECK'                     => 'Systempr�fung',
    'D3_CFG_MOD_SYS_REVOK'                     => 'Die Revisionsnummer des Shops pa�t zur Shopversion.',
    'D3_CFG_MOD_SYS_REVNOK'                    => 'Die Revisionsnummer des Shops pa�t nicht zur Shopversion. Bitte kontrollieren Sie dies, da die Module sich an der Revisionsnummer orientieren.',
    'D3_CFG_MOD_SYS_REVHIGHER'                 => 'Die Revisionsnummer des Shops kann aktuell nicht gepr�ft werden. M�glicherweise haben Sie eine neue Shopversion installiert, die noch nicht hinterlegt ist. Bitte versuchen Sie es in K�rze erneut.',
    'D3_CFG_MOD_SYS_REVUNDEF'                  => 'Die Revisionsnummer des Shops kann aktuell nicht gepr�ft werden. M�glicherweise ist diese Shopversion ein "nightly build".',
    'D3_CFG_MOD_SYS_CURLNOK'                   => 'Die CURL PHP Erweiterung ist nicht verf�gbar. Manche Module erfordern diese. Details dazu entnehmen Sie bitte den jeweiligen Modulbeschreibungen.',
    'D3_CFG_MOD_SYS_CURLOK'                    => 'Die CURL PHP Erweiterung ist verf�gbar.',
    'D3_CFG_MOD_SYS_CURLREQ'                   => 'Die CURL PHP Erweiterung ist nicht verf�gbar. Dieses Modul erfordert diese jedoch zwingend. Aktivieren Sie die Erweiterung, dass das Modul fehlerfrei funktionieren kann.',
    'D3_CFG_MOD_NEWVERSION_1'                  => 'Es ist eine neue Version verf�gbar: ',
    'D3_CFG_MOD_NEWVERSION_2'                  => 'Laden Sie sich diese hier herunter: ',
    'D3_CFG_MOD_NEWVERSION_3'                  => 'oder kontaktieren Sie uns f�r die Installation des Updates.',
    'D3_CFG_MOD_NEWVERSION_4'                  => 'Es ist keine neue Version verf�gbar.',

    'D3_CFG_MOD_MODHEALTH'                     => 'Modulpr�fung',
    'D3_CFG_MOD_MODHEALTH_ITEMSNOK'            => 'folgende Moduleintr�ge sind nicht gesetzt:',
    'D3_CFG_MOD_MODHEALTH_ITEMSOK'             => 'Moduleintr�ge sind vollst�ndig gesetzt.',
    'D3_CFG_MOD_MODHEALTH_DBNOK'               => 'folgende Datenbank�nderungen sind nicht gesetzt:',
    'D3_CFG_MOD_MODHEALTH_DBOK'                => 'Datenbank�nderungen sind vollst�ndig gesetzt.',
    'D3_CFG_MOD_MODHEALTH_DBTABLE'             => 'Tabelle',
    'D3_CFG_MOD_MODHEALTH_DBFIELD'             => 'Feld',
    'D3_CFG_MOD_MODHEALTH_MISSING'             => 'fehlt',
    'D3_CFG_MOD_MODHEALTH_FIELDTYPE'           => 'Fehler im Feldtyp',
    'D3_CFG_MOD_MODHEALTH_VARTYPE'             => 'Fehler im Variablentyp',
    'D3_CFG_MOD_MODHEALTH_CONTENT'             => 'fehlerhafter Inhalt',
    'D3_CFG_MOD_MODHEALTH_CONFIGNOK'           => 'folgende Konfigurationseinstellungen sind nicht oder unzureichend gesetzt:',
    'D3_CFG_MOD_MODHEALTH_CONFIGOK'            => 'Konfigurationseinstellungen sind vollst�ndig gesetzt.',
    'D3_CFG_MOD_MODHEALTH_CONFIGNAME'          => 'Einstellung',
    'D3_CFG_MOD_MODHEALTH_SEEMANUAL'           => 'F�r weitere Informationen konsultieren Sie die Installationsanleitung.',
    'D3_CFG_MOD_MODHEALTH_PROBLEM'             => 'F�r das Modul wurden Installationsprobleme gefunden, die vor der Verwendung behoben werden sollten. Weitere Informationen finden Sie unter dem Support-Tab.',

    'D3_CFG_MOD_NEWS_NEWS'                     => 'Neuigkeiten und Aktuelles',
    'D3_CFG_MOD_NEWS_FURTHER1'                 => 'Diese und weitere Informationen finden Sie in unserem Oxidmodule-Blog unter',
    'D3_CFG_MOD_NEWS_FURTHER2'                 => 'Aktuelle Informationen zu uns und unseren Modulen finden Sie in unserem Oxidmodule-Blog unter',

    'D3_CFG_MODITEM_NEWITEMS'                  => 'Neueintr�ge',
    'D3_CFG_MODITEM_PREV'                      => '<b>Editor</b> (Klick auf den Eintrag f�r Optionen)',
    'D3_CFG_MODITEM_PREVIEW'                   => 'Vorschau generieren',
    'D3_CFG_MODITEM_SAVE'                      => 'Modulliste (und Sicherung) speichern',
    'D3_CFG_MODITEM_ACTIONFOR'                 => 'Aktion f�r',
    'D3_CFG_MODITEM_DEACTIVE'                  => 'deaktivieren',
    'D3_CFG_MODITEM_DEACTIVEALLCLASS'          => 'alle Eintr�ge dieser Klasse deaktivieren',
    'D3_CFG_MODITEM_ACTIVE'                    => 'aktivieren',
    'D3_CFG_MODITEM_ACTIVEALLCLASS'            => 'alle Eintr�ge dieser Klasse aktivieren',
    'D3_CFG_MODITEM_ACTIVEALLMOD'              => 'alle Eintr�ge dieses Moduls aktivieren',
    'D3_CFG_MODITEM_DEACTIVEALLMOD'            => 'alle Eintr�ge dieses Moduls deaktivieren',
    'D3_CFG_MODITEM_DELETE'                    => 'l�schen',
    'D3_CFG_MODITEM_DELMSG'                    => 'Soll der Moduleintrag wirklich gel�scht werden?',
    'D3_CFG_MODITEM_TOFIRST'                   => 'nach vorn',
    'D3_CFG_MODITEM_TOLAST'                    => 'nach hinten',
    'D3_CFG_MODITEM_CANCEL'                    => 'abbrechen',
    'D3_CFG_MODITEM_LEGEND'                    => 'Legende',
    'D3_CFG_MODITEM_LEGEND_EXISTS'             => 'Modul oder Klasse ist vorhanden',
    'D3_CFG_MODITEM_LEGEND_NOTEXISTS'          => 'Modul oder Klasse konnte nicht geladen werden',
    'D3_CFG_MODITEM_LEGEND_INACTIVE'           => 'vorhandenes Modul oder Klasse ist deaktiviert',
    'D3_CFG_MODITEM_LEGEND_NEW'                => 'neues Modul',
    'D3_CFG_MODITEM_LEGEND_NEWPROBLEM'         => 'neues Modul, jedoch Pr�fung erforderlich',

    'D3_CFG_CFGITEM_WRITEPROTECTED'            => '- schreibgesch�tzt',
    'D3_CFG_CFGITEM_NOTWRITEPROTECTED'         => '- nicht schreibgesch�tzt',
    'D3_CFG_CFGITEM_EDITABLE'                  => '- bearbeitbar ',
    'D3_CFG_CFGITEM_EDITABLE_QUESTION'         => 'ACHTUNG!\\n\\n�nderungen an dieser Datei k�nnen gef�hrlich f�r die Erreichbarkeit, Funktionalit�t und Sicherheit dieses Shops sein. Sie sollten nur forfahren, wenn Sie genau wissen, was Sie tun.',
    'D3_CFG_CFGITEM_SAVE_QUESTION'             => 'Sollen die �nderungen wirklich gespeichert werden?',
    'D3_CFG_CFGITEM_SAVE'                      => 'Schutz kurzzeitig entfernen und speichern',
    'D3_CFG_CFGITEM_SAVEWOPROTECTION'          => 'Datei speichern',
    'D3_CFG_CFGITEM_EDIT'                      => 'Datei bearbeiten',
    'D3_CFG_CFGITEM_DEMOTEXT'                  => "\r\r// Da dies ein Demoshop ist, werden Ihnen die Dateiinhalte hier nicht angezeigt.\r// Because of demoshop mode you can\'t see the file content here.",

    'D3_CFG_MAINTENANCE_MODULES'               => "Module",
    'D3_CFG_MAINTENANCE_REPAIRMODULES'         => "repariere Moduleintr�ge in Datenbank",

    'D3_CFG_CFGLIBS_CHOOSE'                    => 'Bitte Bibliothek w�hlen',
    'D3_CFG_CFGLIBS_NOLIBAVAIL'                => 'keine Bibliothekseinstellungen verf�gbar',

    'D3_CFG_MODCFG_CFG_HIDEADMINHOMEINFO'      => 'Modulinformationen auf der Admin-Startseite <b>nicht</b> zeigen',
    'D3_CFG_MODCFG_CFG_HIDEEXTSUPPORTINFO'     => 'D3 News auf Modul-Support-Seiten <b>nicht</b> zeigen',

    'SHOP_SYSTEM_MODULES'                      => 'Installierte Module in Ihrem eShop, <br>bequemes Hinzuf�gen / Bearbeiten im <input type="button" onclick="document.getElementById(\'myedit\').target = \'basefrm\'; document.getElementById(\'myedit\').fnc.value=\'\';document.getElementById(\'myedit\').cl.value=\'d3moditems\';document.getElementById(\'myedit\').submit();" value="Modul-Connector">',
    'D3_CFG_MSG_NONEWITEM'                     => 'Keinen neuen Moduleintr�ge zum Speichern vorhanden',

    'D3_MOD_LIB_METADATA_AUTHOR'               => 'D� Data Development',
    'D3_MOD_LIB_METADATA_LOGO'                 => '<img src="../modules/_d3modcfg/public/d3logo.php" alt="D�" title="D� Data Development">',
    'D3_MOD_LIB_METADATA_SUPPORTMAIL'          => 'support@shopmodule.com',
    'D3_MOD_LIB_METADATA_INFOURL'              => 'http://www.oxidmodule.com/',

    'D3_CFG_MOD_EXC_MODCFGNOTCALLABLE'         => 'Modulkonfiguration ist mangels (unpr�fbarer) Datenbanktabelle nicht verf�gbar',
    'D3_CFG_MOD_EXC_NOMODCFGITEM'              => 'keine Modulkonfiguration f�r diese ID vorhanden [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/keine-Modulkonfiguration-fuer-diese-ID-vorhanden.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_LICENSERESULT'             => 'Lizenzpr�fung ergibt: %s [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Lizenzpruefung-ergibt.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_NOCONFKEY'                 => 'keine Basiskonfiguration f�r das Modul vorhanden [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/keine-Basiskonfiguration-fuer-das-Modul-vorhanden.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_UNKNOWNCONFKEY'            => 'Basiskonfiguration passt nicht zum Modul (ModId, ModVersion) [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Basiskonfiguration-passt-nicht-zum-Modul-ModId-ModVersion.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_NOLICKEYFORCHECK'          => 'fehlender Lizenzschl�ssel: Lizenzaktivierung erforderlich [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/fehlender-Lizenzschluessel.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_NOCONFKEYID'               => 'Basiskonfiguration kann nicht gelesen werden [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Basiskonfiguration-kann-nicht-gelesen-werden.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_NOSERIALID'                => 'Lizenzschl�ssel kann nicht gelesen werden [<a href="http://faq.oxidmodule.com/Modul-Connector/Fehlermeldungen/Lizenzschluessel-kann-nicht-gelesen-werden.html" target="faq">mehr Infos</a>]',
    'D3_CFG_MOD_EXC_ACTIVATED'                 => 'Durch diese Aktion wurde das Modul auch gleichzeitig aktiviert. Pr�fen Sie die Einstellungen im moduleigenen Konfigurationsbereich im Adminpanel Ihres Shops.',
    'D3_CFG_MOD_EXC_DEACTIVATED'               => 'Um Fehler in Ihrem Shop zu vermeiden, wurde mit dieser Aktion auch das Modul deaktiviert. Bearbeiten Sie diese Einstellung bitte immer auch im moduleigenen Konfigurationsbereich im Adminpanel Ihres Shops.',

    'D3_CFG_MOD_ACTIVATION_TYPE_HEADLINE'      => 'Dieser Assistent f�hrt Sie durch die Modulaktivierung. Bitte w�hlen Sie:',
    'D3_CFG_MOD_ACTIVATION_TYPE_OXIDMODULE'    => 'Sie haben das Modul bereits im Oxidmodule.com-Shop gekauft und / oder einen Aktivierungsident vorliegen',
    'D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN'       => 'Sie haben das Modul bereits bei einem anderen Anbieter gekauft (z.B. bei OXID Exchange)',
    'D3_CFG_MOD_ACTIVATION_TYPE_FOREIGN_DESC'  => 'F�r alle Modulk�ufe, die nicht �ber den Oxidmodule-Shop durchgef�hrt wurden, ist es erforderlich, das wir Ihren Kauf registrieren. Nur dann ist eine Aktivierung m�glich.',
    'D3_CFG_MOD_ACTIVATION_TYPE_HASLICENCE'    => 'Sie haben bereits den mehrzeiligen Lizenzschl�ssel vorliegen',
    'D3_CFG_MOD_ACTIVATION_TYPE_DEMO'          => 'Sie m�chten das Modul kostenfrei als Testversion verwenden',
    'D3_CFG_MOD_ACTIVATION_TYPE_DEMO_DESC'     => 'Die Lizenz f�r die Testversion ist ab der Aktivierung 30 Tage g�ltig. Danach wird das Modul automatisch deaktiviert. Ihr Shop wird auch dann noch genauso wie vor der Aktivierung bedienbar sein.',
    'D3_CFG_MOD_ACTIVATION_TYPE_BUY'           => 'Sie m�chten das Modul kaufen',
    'D3_CFG_MOD_ACTIVATION_TYPE_BUY_DESC'      => 'Sie werden direkt in unseren Modulshop weitergeleitet. Im Shop sehen Sie Details zu diesem Modul und k�nnen es auch erwerben. Mit sofort buchbaren Zahlarten (z.B. Paypal oder Kreditkarte) erhalten Sie direkt im Anschluss den Aktivierungsident.',
    'D3_CFG_MOD_ACTIVATION_TYPE_NOTLISTED'     => 'Ihre gew�nschte Aktion ist hier nicht aufgef�hrt',
    'D3_CFG_MOD_ACTIVATION_DATA_HEADLINE'      => 'F�r die Aktivierung werden folgende Daten verwendet und �bertragen:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODULE'        => 'Modul:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODULE_DESC'   => 'Das Modul wird fest in der zuk�nftigen Lizenz vermerkt. Verwenden Sie daher bitte auch nur den Aktivierungsident des dazu geh�renden Moduls. Beachten Sie, dass Ihr Modulkauf auch f�r die richtige Shopedition erfolgt sein muss. Andernfalls k�nnen Sie dieses Modul nicht aktivieren. M�chten Sie die Aktivierung f�r ein anderes Modul durchf�hren, verlassen Sie bitte diesen Assistent und rufen diesen in dem zu aktivierenden Modul auf.',
    'D3_CFG_MOD_ACTIVATION_DATA_MODVERSION'    => 'Modulversion:',
    'D3_CFG_MOD_ACTIVATION_DATA_MODVERSION_DESC'=> 'Die Modulversion wird fest in der zuk�nftigen Lizenz vermerkt. Neben dem Ablaufdatum entscheidet die Modulversion, welche zuk�nftigen Updates / Upgrades Sie mit dieser Lizenz verwenden k�nnen. Planen Sie kurzfristig eine Modulaktualisierung, kl�ren Sie bitte mit uns die Vorgehensweise.',
    'D3_CFG_MOD_ACTIVATION_DATA_DOMAIN'        => 'Domain:',
    'D3_CFG_MOD_ACTIVATION_DATA_DOMAIN_DESC'   => 'Die Domain wird fest in der zuk�nftigen Lizenz vermerkt. Ausschlag gebend ist hier die Shophauptdomain, die in der Konfigurationsdatei des Shops eingetragen ist. Sprach- und mandantenabh�ngige Domains sowie Subdomains werden bei der Lizenz nicht ber�cksichtigt. M�chten Sie dieses Modul in einem Shop unter einer anderen Domain einsetzen, f�hren Sie dessen Aktivierung bitte nur dort durch.',
    'D3_CFG_MOD_ACTIVATION_DATA_SHOP'          => 'Shop-Mandant:',
    'D3_CFG_MOD_ACTIVATION_DATA_SHOP_DESC'     => 'Der Shopmandant wird fest in der zuk�nftigen Lizenz vermerkt. Der Shoptitel wird f�r Sie nur informatorisch angezeigt. <br>F�r Shopinhaber der Enterprise-Edition: M�chten Sie dieses Modul f�r einen anderen Mandanten aktivieren, wechseln Sie diesen bitte und f�hren Sie die Aktivierung bitte nur dort durch.',
    'D3_CFG_MOD_ACTIVATION_DATA_EDITION'       => 'Shop-Edition:',
    'D3_CFG_MOD_ACTIVATION_DATA_EDITION_DESC'  => 'Die Shop-Edition ben�tigen wir, um das richtige Modul zu Ihrer Aktivierung zuordnen zu k�nnen.',
    'D3_CFG_MOD_ACTIVATION_DATA_VOUCHER'       => 'Aktivierungsident:',
    'D3_CFG_MOD_ACTIVATION_DATA_VOUCHER_DESC'  => 'Den Ident erhalten Sie von uns beim Kauf Ihres Moduls in unserem Shop oder bei manueller Registrierung und besteht aus 32 Zeichen. Er sagt nur aus, dass Sie dieses Modul erworben haben. Daran ist jedoch noch kein Shop gebunden. Erst durch die Aktivierung wird dieser Kauf auf Ihren Shop fixiert.',
    'D3_CFG_MOD_ACTIVATION_DATA_DEMO_DESC'     => 'Diese hier erstellte Testlizenz ist maximal 30 Tage g�ltig. Danach wird das Modul automatisch deaktiviert. Ihr Shop wird auch dann noch genauso wie vor der Aktivierung bedienbar sein.',
    'D3_CFG_MOD_ACTIVATION_FOREIGN_HEADLINE'   => 'Kontaktieren Sie uns bitte...',
    'D3_CFG_MOD_ACTIVATION_FOREIGN_DESC'       => 'Senden Sie uns bitte Ihren Kaufbeleg. (Unsere Kontaktdaten finden Sie im oben stehenden "Support"-Tab.) Sie erhalten dann von uns den Ident, mit dem Sie Ihr Modul �ber diesen Assistenten aktivieren k�nnen. Haben Sie den Ident schon vorliegen, w�hlen Sie in der folgenden Auswahl den ersten Punkt.',
    'D3_CFG_MOD_ACTIVATION_HASSERIAL_HEADLINE' => 'Tragen Sie bitte hier Ihren Lizenzschl�ssel ein:',
    'D3_CFG_MOD_ACTIVATION_BUY_HEADLINE'       => 'Sie haben sich f�r dieses Modul entschieden?',
    'D3_CFG_MOD_ACTIVATION_BUY_DESC_1'         => '�ber den folgenden Link kommen Sie in unseren Shop, in dem Sie das Modul bestellen k�nnen. Bei Auswahl einer sofort buchbaren Zahlart (z.B. Paypal oder Kreditkarte) erhalten Sie direkt im Anschluss den Aktivierungsident, mit dem Sie die Aktivierung fertigstellen k�nnen.<p style="text-align: center;"><a href="',
    'D3_CFG_MOD_ACTIVATION_BUY_DESC_2'         => '" style="font-weight: bold; text-decoration: underline;" target="oxidmodule">Oxidmodule Shop</a></p> Vielen Dank f�r Ihre Bestellung. Haben Sie mit dem Bestellabschluss einen Aktivierungsident erhalten, w�hlen Sie zum Abschluss in der folgenden Auswahl den ersten Punkt.',
    'D3_CFG_MOD_ACTIVATION_NOTLISTED_HEADLINE' => 'Kontaktieren Sie uns bitte...',
    'D3_CFG_MOD_ACTIVATION_NOTLISTED_DESC'     => 'Unsere Kontaktdaten finden Sie im oben stehenden "Support"-Tab. Wir nehmen uns Ihrer Anfrage gern pers�nlich an. <br>Sind wir m�glicherweise gerade nicht erreichbar, hilft es Ihnen vielleicht, das Modul vorab als Testversion zu aktivieren.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_NEXT'        => 'Weiter',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_ACTNOW'      => 'Modul jetzt aktivieren',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_BACK'        => 'Zur�ck zur �bersicht',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SERIAL'      => 'Lizenzschl�ssel jetzt austauschen',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SETDEMO'     => 'Testversion jetzt aktivieren',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_HL'  => 'Die Aktivierung wurde erfolgreich durchgef�hrt.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_NOEXP' => 'Die Modullizenz ist unbegrenzt ',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_1'   => 'Die Modullizenz ist bis zum ',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_SUCCESS_2'   => ' g�ltig und wurde schon am Modul hinterlegt. Kopieren Sie sich den Lizenzschl�ssel bitte f�r Ihre Unterlagen. Wir w�nschen Ihnen mit dem Modul viel Erfolg.',
    'D3_CFG_MOD_ACTIVATION_SUBMIT_NSUCCESS_HL' => 'Die Aktivierung konnte leider nicht durchgef�hrt werden.',
    'D3_CFG_MOD_ACTIVATION_ERRMISSINGPARAMS'   => 'Der Lizenzschl�ssel kann wegen fehlender Informationen nicht abgerufen werden. Kontaktieren Sie uns bitte. Unsere Kontaktdaten finden Sie im oben stehenden "Support"-Tab.',
    'D3_CFG_MOD_ACTIVATION_ERRUNKNOWNMODULE'   => 'Das Modul ist in dieser Version (noch) nicht aktivierbar. Kontaktieren Sie uns bitte. Unsere Kontaktdaten finden Sie im oben stehenden "Support"-Tab.',
    'D3_CFG_MOD_ACTIVATION_ERRTOMUCHTESTLIC'   => 'F�r dieses Modul wurden in diesem Shop schon Testversionen erstellt. F�r eine erneuten Modultest kontaktieren Sie uns bitte. Unsere Kontaktdaten finden Sie im oben stehenden "Support"-Tab.',
    'D3_CFG_MOD_ACTIVATION_ERRNOORDER'         => 'Zu Ihrem Aktivierungsident konnte keine passende Bestellung oder kein passendes Modul gefunden werden. Aktivieren Sie das Modul bitte ausschlie�lich mit dem dazugeh�rigen Ident.',
    'D3_CFG_MOD_ACTIVATION_ERRWRONGEDITION'    => 'Das erworbene Modul kann unter dieser Shopedition nicht aktiviert und betrieben werden. Kontaktieren Sie uns bitte.',
    'D3_CFG_MOD_ACTIVATION_ERRDIFFERENTSHOPS'  => 'F�r das Modul erhielten Sie mehrere Aktivierungsidents. Diese sind zum Beispiel f�r verschiedene Mandanten n�tig. Einer dieser Idents wurde schon in einer anderen Shopinstallation aktiviert. M�chten Sie dieses Modul in unterschiedlichen Shops einsetzen, kontaktieren Sie uns bitte.',
    'D3_CFG_MOD_ACTIVATION_SAVESERIALSUCC'     => 'Der Lizenzschl�ssel wurde erfolgreich eingetragen. Wir w�nschen Ihnen mit dem Modul viel Erfolg.',

    'D3_CFG_MOD_NOTACTIVE'                     => 'Das Modul ist nicht aktiv. Pr�fen Sie die Einstellungen in der Modulverwaltung.',

    'D3_CFG_MOD_STATUS_OK'                     => 'Die Lizenz ist g�ltig.',
    'D3_CFG_MOD_STATUS_TMINUS'                 => 'Die Lizenz ist erst zuk�nftig g�ltig.',
    'D3_CFG_MOD_STATUS_EXPIRED'                => 'Die Lizenz ist abgelaufen.',
    'D3_CFG_MOD_STATUS_EXPIRES_IN'             => 'Die Lizenz l�uft in %s ab.',
    'D3_CFG_MOD_STATUS_NEVER_EXPIRES'          => 'Die Lizenz l�uft nicht ab.',
    'D3_CFG_MOD_STATUS_ILLEGAL'                => 'Die Lizenz ist nicht g�ltig. M�glicherweise wurde diese f�r eine andere Domain erstellt.',
    'D3_CFG_MOD_STATUS_ILLEGAL_LOCAL'          => 'Die Lizenz ist nicht f�r die lokale Nutzung vorgesehen.',
    'D3_CFG_MOD_STATUS_ILLEGAL_INVALID'        => 'Die Lizenz kann nicht gelesen werden.',
    'D3_CFG_MOD_STATUS_WRONG_MODULE'           => 'Die Lizenz ist nicht f�r dieses Modul vorgesehen.',
    'D3_CFG_MOD_STATUS_WRONG_MODVERSION'       => 'Die Lizenz ist nicht f�r diese Modulversion vorgesehen.',
    'D3_CFG_MOD_STATUS_WRONG_SHOPID'           => 'Die Lizenz ist nicht f�r diesen Shopmandanten aktiviert.',
    'D3_CFG_MOD_STATUS_EMPTY'                  => 'Die Lizenz enth�lt keine Informationen.',
    'D3_CFG_MOD_STATUS_CORRUPT'                => 'Die Lizenz wurde nicht vom authentifizierten Autor erstellt.',
    'D3_CFG_MOD_STATUS_404'                    => 'Die Lizenz ist nicht vorhanden.',

    'D3_CFG_MOD_NEVER'                         => 'nie',
    'D3_CFG_MOD_SECOND'                        => 'Sekunde',
    'D3_CFG_MOD_SECONDS'                       => 'Sekunden',
    'D3_CFG_MOD_MINUTE'                        => 'Minute',
    'D3_CFG_MOD_MINUTES'                       => 'Minuten',
    'D3_CFG_MOD_HOUR'                          => 'Stunde',
    'D3_CFG_MOD_HOURS'                         => 'Stunden',
    'D3_CFG_MOD_DAY'                           => 'Tag',
    'D3_CFG_MOD_DAYS'                          => 'Tagen',
    'D3_CFG_MOD_MONTH'                         => 'Monat',
    'D3_CFG_MOD_MONTHS'                        => 'Monaten',
    'D3_CFG_MOD_YEAR'                          => 'Jahr',
    'D3_CFG_MOD_YEARS'                         => 'Jahren',

    'D3_MODPROFILE_MAIN_ACTIVE'                => 'Aktiv',
    'D3_MODPROFILE_MAIN_ACTIVE_DESC'           => 'nur aktive Profile k�nnen verwendet werden',
    'D3_MODPROFILE_MAIN_ACTIVFROMTILL'         => 'Oder aktiv',
    'D3_MODPROFILE_MAIN_ACTIVEFROM'            => 'von',
    'D3_MODPROFILE_MAIN_ACTIVETO'              => 'bis',
    'D3_MODPROFILE_MAIN_TITLE'                 => 'Titel',
    'D3_MODPROFILE_MAIN_NOFOLDER'              => 'kein Ordner gew�hlt',
    'D3_GENERAL_MODPROFILE_TITLE'              => 'Titel',
    'D3_GENERAL_MODPROFILE_SORT'               => 'Reihenfolge',
    'D3_GENERAL_MODPROFILE_SAVE'               => 'Speichern',
    'D3_GENERAL_MODPROFILE_COPY'               => 'identische Kopie anlegen',
    'D3_GENERAL_MODPROFILE_EXPORT'             => 'Profil als SQL exportieren',
    'D3_MODPROFILE_MAIN_SORT'                  => 'Reihenfolge',
    'D3_MODPROFILE_MAIN_FOLDER'                => 'Ordner',
    'D3_MODPROFILE_FOLDER_ALL'                 => 'kein Ordner gew�hlt',
    'D3_GENERAL_MODPROFILE_COPY_PREFIX'        => 'Kopie von ',
);