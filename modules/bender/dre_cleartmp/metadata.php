<?php
/**
 */

/**
 * Metadata version
 */
$sMetadataVersion = '0.1';

/**
 * Module information
 *	Dieses Modul erweitert den Head im Admin um den Cache zu leeren.
 */
$aModule = array(
    'id'           => 'dre_cleartmp',
    'title'        => '<img src="../modules/bodynova/img/favicon.ico" title="Bender Clear Temp Modul">Bender Clear Temp Modul',
    'description'  => array(
        'de' => 'Modul erweitert den Head im Admin um den Cache zu leeren.',
        'en' => 'Modul for cleaning the cache.',
    ),
    'thumbnail'    => '',
    'version'      => '0.1',
    'author'       => 'Andre Bender',
    'url'          => 'www.bodynova.de',
    'email'        => 'a.bender@bodynova.de',
    'extend'	   => array(
	'navigation'	=> 'bender/dre_cleartmp/controllers/admin/dre_cleartmp_navigation',
	'oxshopcontrol'	=> 'bender/dre_cleartmp/core/dre_cleartmp_oxshopcontrol',	
	),
    'templates'    => array(
	'dre_header.tpl'	=>	'bender/dre_cleartmp/views/admin/dre_header.tpl'
    ),
    
);
