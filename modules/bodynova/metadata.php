<?php
/**
 */

/**
 * Metadata version
 */
$sMetadataVersion = '0.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'bodynova',
    'title'        => '<img src="../modules/bodynova/img/favicon.ico" title="Bodynova Modul">Bodynova Modul',
    'description'  => array(
        'de' => 'Bodynovas eigenes Modul zur erweiterung der verschiedenen Klassen die im Design Bodynova verwendet werden.',
        'en' => 'Bodynovas own modul for extending used classes in the theme bodynova.',
    ),
    'thumbnail'    => 'picture.png',
    'version'      => '0.0.1',
    'author'       => 'André Bender',
    'url'          => 'www.bodynova.de',
    'email'        => 'a.bender@bodynova.de',
    'extend'       => array(
    
	'oxorder'		=>	'bodynova/core/bodyoxorder',
	'oxarticle'		=>	'bodynova/core/bodyoxarticle',
	//'actions_main'	=>	'bodynova/admin/bodyactions_main',
	'alist'			=>	'bodynova/views/bodyalist',
	'oxactionlist'	=>	'bodynova/core/bodyoxactionlist',
	'oxactions'		=>	'bodynova/core/bodyoxactions',
	'oxcmp_shop'	=>	'bodynova/views/bodyoxcmp_shop',
	'oxbasket'		=>	'bodynova/core/bodyoxbasket',
	'content'		=>	'bodynova/views/bodycontent'
	
    ),
    
);
