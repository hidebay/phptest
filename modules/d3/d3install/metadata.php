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

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

$aModule = array(
    'id'          => 'd3install_lib',
    'title'       => '<img src="../modules/_d3modcfg/public/d3logo.php?cl=' . $_REQUEST['cl'] .
        '" alt="D&sup3;" title="D&sup3; Data Development"> Connector - Installationsassistent / installation wizzard',
    'description' => array(
        'de' => '',
        'en' => '',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => '2.6.1.0',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'navigation' => 'd3/d3install/modules/controllers/admin/d3_navigation_modcfgupdate',
    ),
    'files'       => array(
        'd3_mod_install'       => 'd3/d3install/controllers/admin/d3_mod_install.php',
        'd3_mod_update'        => 'd3/d3install/controllers/admin/d3_mod_update.php',
        'd3bit'                => 'd3/d3install/models/d3bit.php',
        'd3database'           => 'd3/d3install/models/d3database.php',
        'd3filesystem'         => 'd3/d3install/models/d3filesystem.php',
        'd3install'            => 'd3/d3install/models/d3install.php',
        'd3install_update'     => 'd3/d3install/models/d3install_update.php',
        'd3install_updatebase' => 'd3/d3install/models/d3install_updatebase.php',
        'd3simplexml'          => 'd3/d3install/models/d3simplexml.php',
        'd3str'                => 'd3/d3install/models/d3str.php',
        'd3stream'             => 'd3/d3install/models/d3stream.php',
        'd3webdav'             => 'd3/d3install/models/d3webdav.php',
    ),
    'templates'   => array(
        'd3_mod_install.tpl'    => 'd3/d3install/views/admin/tpl/d3_mod_install.tpl',
        'd3_mod_update.tpl'     => 'd3/d3install/views/admin/tpl/d3_mod_update.tpl',
        'd3install_lib_cfg.tpl' => 'd3/d3install/views/admin/tpl/d3install_lib_cfg.tpl',
    ),
    'events'      => array(
        'onActivate'   => 'd3install::checkUpdateStart',
        'onDeactivate' => 'd3install::disableModCfg',
    ),
);