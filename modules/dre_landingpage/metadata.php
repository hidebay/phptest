<?php

/**
 * This file is part of a OXID Cookbook project
 *
 * Version:    1.0
 * Author:     Andre Bender <andre@bender-andre.de>
 * Author URI: http://
 */

/**
 * Metadata version
 */
$sMetadataVersion = '0.1';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'dre_landingpage',
    'title'        => 'Bender :: Landingpage',
    'description'  => 'Add a new pagetype landingpage for action products',
    'thumbnail'    => 'logo.png',
    'version'      => '0.1',
    'author'       => 'Andre Bender',
    'url'          => 'http://www.bodynova.de',
    'email'        => 'a.bender@bodynova.de',
    'extend'       => array(
        'actions_main'  		=> 'dre_landingpage/controllers/admin/dre_landingpage_actions_main',
    ),
    'files'        => array(
        'dre_landingpage' 		=> 'dre_landingpage/controllers/dre_landingpage.php'
    ),
    'templates'    => array(
        'dre_landingpage.tpl' 	=> 'dre_landingpage/views/dre_landingpage.tpl'
    ),
    'blocks'       => array(
        array(
            'template'  => 'actions_main.tpl',
            'block'     => 'admin_actions_main_form',
            'file'      => '/views/blocks/admin_actions_main_form.tpl',
        ),
    )
);
