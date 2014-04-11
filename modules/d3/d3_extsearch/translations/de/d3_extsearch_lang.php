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
    'charset'                                => 'ISO-8859-15',

    'D3_EXTSEARCH_FIELD_NOTICE'              => 'Suchbegriff',

    'D3_EXTSEARCH_QUICK_HITS'                => 'Treffer für',
    'D3_EXTSEARCH_QUICK_SIMILARHITS'         => 'ähnliche Treffer für',
    'D3_EXTSEARCH_QUICK_MULTIPLEHITS'        => 'Vorschläge für Ihre Suche',
    'D3_EXTSEARCH_QUICK_TOBASKET'            => 'in den Warenkorb',
    'D3_EXTSEARCH_QUICK_SEARCH'              => 'Suche ...',
    'D3_EXTSEARCH_QUICK_NOHIT'               => 'Leider wurden keine Artikel gefunden.',
    'D3_EXTSEARCH_QUICK_TOMUCHHITS'          => 'Für die Ergebnisliste wurden zu viele Treffer gefunden. <br>Klicken Sie hier für die Listenansicht.',
    'D3_EXTSEARCH_QUICK_STARTSEARCH'         => 'weiter suchen...',
    'D3_EXTSEARCH_QUICK_ARTICLE'             => 'Artikel',
    'D3_EXTSEARCH_QUICK_CATEGORY'            => 'Kategorie',
    'D3_EXTSEARCH_QUICK_MANUFACTURER'        => 'Marke',
    'D3_EXTSEARCH_QUICK_VENDOR'              => 'Lieferant',
    'D3_EXTSEARCH_QUICK_CONTENT'             => 'Information',
    'D3_EXTSEARCH_QUICK_CLOSE'               => 'Suchfenster schliessen',

    'D3_EXTSEARCH_EXT_NOARTMSG'              => 'Zu Ihrem Begriff wurde leider kein Artikel gefunden. Wir haben daher ähnliche Artikel für Sie mit folgender Suche gezeigt:',
    'D3_EXTSEARCH_EXT_LESSARTMSG'            => 'Zu Ihrem Begriff wurde leider nur sehr wenige Artikel gefunden. Wir haben die Liste mit ähnlichen Artikel aufgefüllt.',
    'D3_EXTSEARCH_EXT_PLUGINHEADLINE'        => 'Schneller suchen, schneller finden...',
    'D3_EXTSEARCH_EXT_PLUGINBROWSERERROR'    => 'Diese Sucherweiterung funktioniert derzeit leider nur mit Mozilla Firefox ab Version 2.0 oder Microsoft Internet Explorer ab Version 7.',
    'D3_EXTSEARCH_EXT_PLUGININSTALLMSG'      => 'Installieren Sie unsere kostenlose Sucherweiterung. Damit fügen Sie unseren Shop zur Suchfunktion Ihres Browsers (rechts oben) hinzu. So werden Sie jederzeit und von jeder Stelle aus sofort fündig.<br>(verfügbar im Mozilla Firefox ab Version 2 und Microsoft Internet Explorer ab Version 7)',
    'D3_EXTSEARCH_EXT_PLUGININSTALLBTN'      => 'Sucherweiterung installieren',

    'D3_EXTSEARCH_EXT_SEARCHBOX'             => 'Suche einschränken',
    'D3_EXTSEARCH_EXT_YOUMEAN'               => 'Meinten Sie etwa:',
    'D3_EXTSEARCH_EXT_CHOOSECAT'             => 'wählen Sie eine Kategorie',
    'D3_EXTSEARCH_EXT_HITSINCAT'             => 'Treffer in',
    'D3_EXTSEARCH_EXT_THISCAT'               => 'diesen Kategorien:',
    'D3_EXTSEARCH_EXT_ALLCATHITS'            => 'zeige Treffer aller Kategorien',
    'D3_EXTSEARCH_EXT_CATEGORIES'            => 'Kategorien:',
    'D3_EXTSEARCH_EXT_SEARCHINCATEGORIES'    => 'suche in allen Kategorien',
    'D3_EXTSEARCH_EXT_HITSINVENDOR'          => 'Treffer von',
    'D3_EXTSEARCH_EXT_THISVENDORS'           => 'dazugehörige Lieferanten:',
    'D3_EXTSEARCH_EXT_VENDORS'               => 'Lieferanten:',
    'D3_EXTSEARCH_EXT_SEARCHINVENDORS'       => 'suche in allen Lieferanten',
    'D3_EXTSEARCH_EXT_ALLVENDORHITS'         => 'zeige Treffer aller Lieferanten',
    'D3_EXTSEARCH_EXT_CHOOSEVENDOR'          => 'wählen Sie einen Lieferant',
    'D3_EXTSEARCH_EXT_HITSINMANUFACTURER'    => 'Treffer von',
    'D3_EXTSEARCH_EXT_HITSINMANUFACTURER'    => 'Treffer von',
    'D3_EXTSEARCH_EXT_THISMANUFACTURERS'     => 'dazugehörige Marken:',
    'D3_EXTSEARCH_EXT_MANUFACTURERS'         => 'Marken:',
    'D3_EXTSEARCH_EXT_SEARCHINMANUFACTURERS' => 'suche in allen Marken',
    'D3_EXTSEARCH_EXT_ALLMANUFACTURERHITS'   => 'zeige Treffer aller Marken',
    'D3_EXTSEARCH_EXT_CHOOSEMANUFACTURER'    => 'wählen Sie eine Marke',
    'D3_EXTSEARCH_EXT_HITSATTRIBS'           => 'Eigenschaften der Treffer',
    'D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION1'   => '',
    'D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION2'   => 'wählen',
    'D3_EXTSEARCH_EXT_ATTRIBSDESELECT1'      => '',
    'D3_EXTSEARCH_EXT_ATTRIBSDESELECT2'      => 'abwählen',
    'D3_EXTSEARCH_EXT_ATTRIB_NOASSIGN'       => 'zu "%s" nicht zugeordnete Artikel',
    'D3_EXTSEARCH_EXT_SHOWALL'               => 'alle anzeigen',
    'D3_EXTSEARCH_EXT_SHOWLESS'              => 'weniger anzeigen',
    'D3_EXTSEARCH_EXT_START_SEARCH'          => 'Suche starten',
    'D3_EXTSEARCH_EXT_ALL'                   => 'Alle',
    'D3_EXTSEARCH_EXT_CHOOSEPRICE'           => 'wählen Sie eine Preisspanne',
    'D3_EXTSEARCH_EXT_DESELECTPRICE'         => 'alle Preise anzeigen',
    'D3_EXTSEARCH_EXT_PRICECATS'             => 'Preisspannen',
    'D3_EXTSEARCH_EXT_PRICEFROM'             => 'von',
    'D3_EXTSEARCH_EXT_PRICETO'               => 'bis',
    'D3_EXTSEARCH_EXT_SIMILAR'               => '(ähnlich)',
    'D3_EXTSEARCH_EXT_CATHIT'                => '(Treffer aus Kategorie)',
    'D3_EXTSEARCH_EXT_CMSHEADLINE'           => 'Informationen',

    'D3_EXTSEARCH_IAS_SEARCH'                => 'Suche',
    'D3_EXTSEARCH_IAS_STARTSEARCH'           => 'Suchen',

    'D3_EXTSEARCH_RSS_ATTRIBS'               => '| Eigenschaften: %s',
    'D3_EXTSEARCH_RSS_INDEXFILTER'           => '| Index: %s',
    'D3_EXTSEARCH_RSS_PRICEFILTER'           => '| Preis: %s',

    'D3_EXTSEARCH_ORDER_BYPRIO'              => 'Relevanz',
    'WIDGET_LOCATOR_SORT_D3PRIORITY'         => 'Relevanz',
    'D3PRIORITY'                             => 'Relevanz',

    'D3_EXTSEARCH_SEARCHINPROGRESS'          => 'Suche wird ausgeführt',

    'D3_EXTSEARCH_DEBUG_UNABLE_QUERY'        => 'Query kann auf Grund gestellter Bedingungen nicht generiert werden.',
    'D3_EXTSEARCH_DEBUG_UNABLE_DIRECTSHOW'   => 'Im Debug-Mode kann nicht auf Detailseite gewechselt werden:',
);


/*

[{oxmultilang ident="GENERAL_YOUWANTTODELETE"}]


*/
