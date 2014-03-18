<?php


$sLangName  = "Français";
$iLangNr    = 2;
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
'charset'                                   => 'ISO-8859-15',

'D3_EXTSEARCH_FIELD_NOTICE'                 => 'Terme de recherche',
'D3_EXTSEARCH_FIELD_NOTICE'                 => 'Entrez le terme recherché svp !',

'D3_EXTSEARCH_QUICK_HITS'                   => 'résultats pour',
'D3_EXTSEARCH_QUICK_SIMILARHITS'            => 'résultats similaires pour',
'D3_EXTSEARCH_QUICK_TOBASKET'               => 'Dans le panier',
'D3_EXTSEARCH_QUICK_SEARCH'                 => 'Recherche ...',
'D3_EXTSEARCH_QUICK_NOHIT'                  => 'Malheureusement aucun article n\'a pu être trouvé.',
'D3_EXTSEARCH_QUICK_TOMUCHHITS'             => 'Trop de résultats correspondent à cette recherche. <br>Cliquez ici pour afficher une liste.',
'D3_EXTSEARCH_QUICK_STARTSEARCH'            => 'Continuer la recherche ...',

'D3_EXTSEARCH_EXT_NOARTMSG'                 => 'Malheureusement aucun article ne correspond au terme de recherche donné. Nous avons trouvé des articles similaires pour cette recherche :',
'D3_EXTSEARCH_EXT_LESSARTMSG'               => 'Malheureusement très peu d\'articles correspondent à votre recherche. Nous avons complété la recherche avec des articles similaires.',
'D3_EXTSEARCH_EXT_PLUGINHEADLINE'           => 'Rechercher plus vite, trouver plus vite ...',
'D3_EXTSEARCH_EXT_PLUGINBROWSERERROR'       => 'L\'extension de cette fonction de recherche n\'est actuellement possible qu\'avec Mozilla Firefox à partir de la version 2.0 ou bien avec Microsoft Internet Explorer à partir de la version 7.',
'D3_EXTSEARCH_EXT_PLUGININSTALLMSG'         => 'Installez notre extension gratuite de recherche ! Vous pourrez ainsi ajouter notre shop aux fonctions de recherche de votre navigateur web (en haut à droite). Vous trouverez ce que vous cherchez à tout moment, où que vous soyez.<br>(avec Mozilla Firefox à partir de la version 2.0 ou bien avec Microsoft Internet Explorer à partir de la version 7)',
'D3_EXTSEARCH_EXT_PLUGININSTALLBTN'         => 'Installer l\'extension de recheche',

'D3_EXTSEARCH_EXT_SEARCHBOX'                => 'Réduire la recherche',
'D3_EXTSEARCH_EXT_YOUMEAN'                  => 'Vouliez-vous dire :',
'D3_EXTSEARCH_EXT_CHOOSECAT'                => 'Choisissez une catégorie',
'D3_EXTSEARCH_EXT_HITSINCAT'                => 'résultats dans',
'D3_EXTSEARCH_EXT_THISCAT'                  => 'cette catégorie :',
'D3_EXTSEARCH_EXT_ALLCATHITS'               => 'Montrer les résultats de toutes les catégories',
'D3_EXTSEARCH_EXT_CATEGORIES'               => 'Catégories :',
'D3_EXTSEARCH_EXT_SEARCHINCATEGORIES'       => 'Recherche dans toutes les catégories',
'D3_EXTSEARCH_EXT_HITSINVENDOR'             => 'résultats',
'D3_EXTSEARCH_EXT_THISVENDORS'              => 'pour les fournisseurs correspondants :',
'D3_EXTSEARCH_EXT_VENDORS'                  => 'Fournisseurs :',
'D3_EXTSEARCH_EXT_SEARCHINVENDORS'          => 'Rechercher parmi tous les fournisseurs',
'D3_EXTSEARCH_EXT_ALLVENDORHITS'            => 'Montrer les résultats pour tous les fournisseurs',
'D3_EXTSEARCH_EXT_CHOOSEVENDOR'             => 'Choisissez un fournisseur',
'D3_EXTSEARCH_EXT_HITSINMANUFACTURER'       => 'résultats pour',
'D3_EXTSEARCH_EXT_THISMANUFACTURERS'        => 'fabricants correspondants :',
'D3_EXTSEARCH_EXT_MANUFACTURERS'            => 'Fabricants :',
'D3_EXTSEARCH_EXT_SEARCHINMANUFACTURERS'    => 'Rechercher parmi tous les fabricants',
'D3_EXTSEARCH_EXT_ALLMANUFACTURERHITS'      => 'Montrer les résultats de tous les fabricants',
'D3_EXTSEARCH_EXT_CHOOSEMANUFACTURER'       => 'Choisissez un fabricant !',
'D3_EXTSEARCH_EXT_HITSATTRIBS'              => 'Caractéristiques des résultats',
'D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION1'      => '',
'D3_EXTSEARCH_EXT_ATTRIBSNOSELECTION2'      => 'Choisir',
'D3_EXTSEARCH_EXT_ATTRIBSDESELECT1'         => '',
'D3_EXTSEARCH_EXT_ATTRIBSDESELECT2'         => 'Annuler la séléction',
'D3_EXTSEARCH_EXT_SHOWALL'                  => 'Tout montrer',
'D3_EXTSEARCH_EXT_SHOWLESS'                 => 'Montrer moins',
'D3_EXTSEARCH_EXT_START_SEARCH'             => 'Commencer la recherche',
'D3_EXTSEARCH_EXT_ALL'                      => 'Tout',
'D3_EXTSEARCH_EXT_CHOOSEPRICE'              => 'Choisissez une échelle de prix',
'D3_EXTSEARCH_EXT_DESELECTPRICE'            => 'Montrer tous les prix',
'D3_EXTSEARCH_EXT_PRICECATS'                => 'Les échelles de prix',
'D3_EXTSEARCH_EXT_PRICEFROM'                => 'de',
'D3_EXTSEARCH_EXT_PRICETO'                  => 'à',
'D3_EXTSEARCH_EXT_SIMILAR'                  => '(similaire)',
'D3_EXTSEARCH_EXT_CATHIT'                   => '(résultats de la catégorie)',
'D3_EXTSEARCH_EXT_CMSHEADLINE'              => 'Informations',

'D3_EXTSEARCH_IAS_SEARCH'                   => 'Recherche',
'D3_EXTSEARCH_IAS_STARTSEARCH'              => 'Rechercher',

'D3_EXTSEARCH_RSS_ATTRIBS'                  => '| Eigenschaften: %s',
'D3_EXTSEARCH_RSS_INDEXFILTER'              => '| Index: %s',

'D3_EXTSEARCH_ORDER_BYPRIO'                 => 'Priorität',

'D3_EXTSEARCH_SEARCHINPROGRESS'             => 'Suche wird ausgeführt',

'D3_EXTSEARCH_DEBUG_UNABLE_QUERY'           => 'Query kann auf Grund gestellter Bedingungen nicht generiert werden.',
'D3_EXTSEARCH_DEBUG_UNABLE_DIRECTSHOW'      => 'Im Debug-Mode kann nicht auf Detailseite gewechselt werden:',
);


/*

[{ oxmultilang ident="GENERAL_YOUWANTTODELETE" }]


*/
