<?php
/**
 * Module: wn_adminrights
 * Version: 1.2.0
 * (c) 2012-2014 by Wendnet
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
    'version'      => '1.2.0',
    'author'       => 'Sascha Mahnecke',
    'email'        => 'wendnet@gmx.de',
    'extend'       => array(
        'oxarticle'        => 'wendnet/wn_adminrights/models/wnar_oxarticle',
        'oxnavigationtree' => 'wendnet/wn_adminrights/controllers/admin/wnar_oxnavigationtree',
        'article_list'     => 'wendnet/wn_adminrights/controllers/admin/wnar_article_list',
        'article_main'     => 'wendnet/wn_adminrights/controllers/admin/wnar_article_main',
        'list_user'        => 'wendnet/wn_adminrights/controllers/admin/wnar_list_user',
        'user_list'        => 'wendnet/wn_adminrights/controllers/admin/wnar_user_list',
        'user_main'        => 'wendnet/wn_adminrights/controllers/admin/wnar_user_main'
    ),
    'files' => array(
        'wnar_user_rights' => 'wendnet/wn_adminrights/controllers/admin/wnar_user_rights.php'
    ),
    'templates' => array(
        'wnar_article_list.tpl' => 'wendnet/wn_adminrights/out/admin/tpl/wnar_article_list.tpl',
        'wnar_user_rights.tpl'  => 'wendnet/wn_adminrights/out/admin/tpl/wnar_user_rights.tpl'
    ),
    'settings' => array(
        array( 'group' => 'wnar_main', 'name' => 'blWnArShowArticleOwner', 'type' => 'bool', 'value' => 'false', 'position' => 1 )
    ),
    'events' => array(
        'onActivate' => 'wnar_user_rights::onActivate'
    )
);

?>