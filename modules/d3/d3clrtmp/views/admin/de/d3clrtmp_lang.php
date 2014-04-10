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
    'charset'                              => 'ISO-8859-15',
    'd3mxd3cleartmp'                       => 'TMP leeren',

    'D3_CFG_CLRTMP_ALL'                    => '<span style="font-weight: bold;">komplett</span> leeren',
    'D3_CFG_CLRTMP_TPL'                    => '<span style="font-weight: bold;">Template</span>-Cache leeren',
    'D3_CFG_CLRTMP_DB'                     => '<span style="font-weight: bold;">Datenbank</span>-Cache leeren',
    'D3_CFG_CLRTMP_LANG'                   => '<span style="font-weight: bold;">Language</span>-Cache leeren',
    'D3_CFG_CLRTMP_MENU'                   => '<span style="font-weight: bold;">Menu</span>-Cache leeren',
    'D3_CFG_CLRTMP_CLASSPATH'              => '<span style="font-weight: bold;">ClassPath</span>-Cache leeren',
    'D3_CFG_CLRTMP_STRUCTURE'              => '<span style="font-weight: bold;">Struktur</span>-Cache (Kategorien, Hersteller, Lieferanten) leeren',
    'D3_CFG_CLRTMP_TAGCLOUD'               => '<span style="font-weight: bold;">Tagcloud</span>-Cache leeren',
    'D3_CFG_CLRTMP_SEO'                    => '<span style="font-weight: bold;">SEO</span>-Cache leeren',
    'D3_CFG_CLRTMP_MODULE'                 => '<span style="font-weight: bold;">Modul</span>-Cache leeren',
    'D3_CFG_CLRTMP_VIEWS'                  => '<span style="font-weight: bold;">View-Tabellen</span> aktualisieren',
    'D3_CFG_CLRTMP_TPLBLOCKS'              => '<span style="font-weight: bold;">Template-Block</span>-Einträge entfernen',
    'D3_CFG_CLRTMP_TPLBLOCKS_REQUACT'      => 'erfordert Neuaktivierung des Moduls',
    'D3_CFG_CLRTMP_SUBMIT'                 => 'TMP leeren',
    'D3_CFG_CLRTMP_OR'                     => 'oder',
    'D3_CFG_CLRTMP_MSG1'                   => 'TMP wird geleert.',
    'D3_CFG_CLRTMP_MSG2'                   => 'Bitte warten...',

    'D3CLRTMP_LIB_TRANSL'                  => 'TMP leeren',
    'D3CLRTMP_LIB_HELPLINK'                => 'Modul-Connector/TMP-leeren/',

    'D3_CFG_CLRTMP_STAT'                   => 'Statistik',
    'D3_CFG_CLRTMP_PATH'                   => 'Pfad:',
    'D3_CFG_CLRTMP_COUNT'                  => 'Dateianzahl:',
    'D3_CFG_CLRTMP_SIZE'                   => 'physikalische Größe:',
    'D3_CFG_CLRTMP_DELFOLDER'              => 'shopfremde Ordner werden gelöscht:',
    'D3_CFG_CLRTMP_CREATEHTA'              => '.htaccess wird erstellt:',
    'D3_CFG_CLRTMP_UPDATEVIEW'             => 'View-Tabellen aktualisieren:',
    'D3_CFG_CLRTMP_CFG_TICKERTHRESHOLD'    => 'ab dieser Anzahl TMP-Dateien wird das Löschen getickert:',
    'D3_CFG_CLRTMP_NO'                     => 'nein',
    'D3_CFG_CLRTMP_YES'                    => 'ja',
    'D3_CFG_CLRTMP_SET_DESC'               => 'Diese Einstellung können Sie unter "Modul-Connector -> Bibliotheken" verändern.',
    'D3_CFG_CLRTMP_USETICKER'              => 'Tickerverwendung ab:',
    'D3_CFG_CLRTMP_USETICKERFILES'         => ' Dateien',

    'D3_CFG_CLRTMP_DEV_LEGEND'             => 'Entwicklermodus',
    'D3_CFG_CLRTMP_DEV_DESC'               => 'Der Entwicklermodus verhindert, dass Inhalte im TMP-Verzeichnis abgelegt werden. Damit lassen sich Template-Änderungen und auch Sprachanpassungen schnell kontrollieren. Beachten Sie jedoch unbedingt, dass damit eine wichtige Performance-Optimierung des Shops deaktiviert ist. Verwenden Sie den Entwicklermodus daher nicht grundlos.<span style="font-weight: bold;">Die Verwendung verursacht längere Seitenladezeiten.</span><br>Aus diesem Grund funktioniert der Entwicklermodus auch nur mit <span style="font-weight: bold;">deaktiviertem Produktivmodus</span> des Shops.<br>Während der Verwendung des Entwicklermodus können keine Updates des D3 Modul Connectors und seinen Bibliotheken durchgeführt werden.',
    'D3_CFG_CLRTMP_DEV_BTNACT'             => 'Entwicklermodus aktivieren',
    'D3_CFG_CLRTMP_DEV_BTNDEACT'           => 'Entwicklermodus deaktivieren',
    'D3_CFG_CLRTMP_DEV_DEACTPRODUCTIVE'    => 'Deaktivieren Sie für den Entwicklermodus zwingend den Produktivmodus des Shops.',

    'D3_CFG_CLRTMP_MODULELOGGING'          => 'Logging',
    'D3_CFG_CLRTMP_CFG_CREATE_NOHTACCESS'  => '<span style="font-weight: bold;">keine</span> .htaccess-Datei erstellen',
    'D3_CFG_CLRTMP_CFG_REMOVEFOLDERS'      => 'enthaltene shopfremde Ordner <span style="font-weight: bold;">nicht</span> löschen',
    'D3_CFG_CLRTMP_CFG_NOUPDATEVIEWS'      => 'View-Tabellen <span style="font-weight: bold;">nicht</span> aktualisieren',
    'D3_CFG_CLRTMP_CFG_USERACTION_1'       => 'benutzerdefinierte Löschaufgabe 1:',
    'D3_CFG_CLRTMP_CFG_USERACTION_2'       => 'benutzerdefinierte Löschaufgabe 2:',
    'D3_CFG_CLRTMP_CFG_USERACTION_NAME'    => 'Name',
    'D3_CFG_CLRTMP_CFG_USERACTION_PATTERN' => 'RegExp-Pattern (ohne Delimiter)',
    'D3_CFG_CLRTMP_CFG_SAVE'               => 'Speichern',

    'D3_CFG_CLRTMP_SUCCESS'                => 'Das TMP-Verzeichnis wurde geleert.',
    'D3_CFG_CLRTMP_VIEWUPDATESUCCESS'      => 'Die View-Tabellen wurden aktualisiert.',
    'D3_CFG_CLRTMP_NOVALIDFSCLASS'         => 'TMP leeren nicht möglich - bitte aktualisieren Sie die Install-Bibliothek!',

);
