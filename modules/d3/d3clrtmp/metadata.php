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

/**
 * Module information
 */
$aModule = array(
    'id'          => 'd3clrtmp_lib',
    'title'       => '<img src="../modules/_d3modcfg/public/d3logo.php?cl=' . $_REQUEST['cl'] .
        '" alt="D&sup3;" title="D&sup3; Data Development"> Connector - TMP leeren / Clear TMP',
    'description' => array(
        'de' => 'Bietet komfortables Leeren des TMP-Ordners aus dem Adminbereich.',
        'en' => 'Makes comfortable clearing of TMP folder accessible.',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => '2.1.0.0',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'oxshopcontrol' => 'd3/d3clrtmp/modules/controllers/d3_oxshopcontrol_clrtmp'
    ),
    'files'       => array(
        'd3cleartmp'       => 'd3/d3clrtmp/controllers/admin/d3cleartmp.php',
        'd3clrtmp'         => 'd3/d3clrtmp/models/d3clrtmp.php',
        'd3clrtmp_cleanup' => 'd3/d3clrtmp/models/d3clrtmp_cleanup.php',
        'd3clrtmp_update'  => 'd3/d3clrtmp/models/d3clrtmp_update.php',
    ),
    'templates'   => array(
        'd3cleartmp.tpl'       => 'd3/d3clrtmp/views/admin/tpl/d3cleartmp.tpl',
        'd3clrtmp_lib_cfg.tpl' => 'd3/d3clrtmp/views/admin/tpl/d3clrtmp_lib_cfg.tpl',
    ),
    'events'      => array(
        'onActivate'   => 'd3install::checkUpdateStart',
        'onDeactivate' => 'd3install::disableModCfg',
    ),
);