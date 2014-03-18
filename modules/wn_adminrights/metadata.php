<?php
/**
 * Modul: wn_adminrights
 * Version: 1.0.0
 * (c) 2012 by Wendnet, Sascha Mahnecke
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';
 
/**
 * Module information
 */
$aModule = array(
    'id'           => 'wn_adminrights',
    'title'        => 'Wendnet-AdminRights',
    'description'  => array(
        'de' => 'Modul zur Beschr&auml;nkung der Benutzer-Adminrechte',
        'en' => 'Module to restrict the admin rights of users'
    ),
    'thumbnail'    => 'logo.gif',
    'version'      => '1.0.0',
    'author'       => 'Sascha Mahnecke',
    'email'        => 'wendnet@gmx.de',
    'extend'       => array(
        'oxnavigationtree' => 'wn_adminrights/admin/wn_oxnavigationtree',
        'user_list' => 'wn_adminrights/admin/wn_user_list',
        'user_main' => 'wn_adminrights/admin/wn_user_main'
    ),
    'files' => array(
        'wn_user_rights' => 'wn_adminrights/admin/wn_user_rights.php'
    ),
    'templates' => array(
        'wn_user_rights.tpl' => 'wn_adminrights/out/admin/tpl/wn_user_rights.tpl'
    )
);

?>