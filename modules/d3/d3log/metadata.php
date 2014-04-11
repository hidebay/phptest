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
 * @author        D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link          http://www.oxidmodule.com
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'          => 'd3log_lib',
    'title'       => '<img src="../modules/_d3modcfg/public/d3logo.php?cl=' . $_REQUEST['cl'] . '" alt="D&sup3;" title="D&sup3; Data Development"> Connector - Logging',
    'description' => array(
        'de' => 'Stellt umfangreiche Logging-Funktionen zur Verf&uuml;gung.',
        'en' => 'Makes extended logging accessible.',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => '2.4.1.0',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'oxshopcontrol' => 'd3/d3log/modules/controllers/d3_oxshopcontrol_errorhandler',
        //'oxemail' => 'd3/d3log/modules/core/d3_oxemail_log',
    ),
    'files'       => array(
        'd3_cfg_log'                                     => 'd3/d3log/controllers/admin/d3_cfg_log.php',
        'd3_cfg_log_cleanup'                             => 'd3/d3log/controllers/admin/d3_cfg_log_cleanup.php',
        'd3_cfg_log_export'                              => 'd3/d3log/controllers/admin/d3_cfg_log_export.php',
        'd3_cfg_log_list'                                => 'd3/d3log/controllers/admin/d3_cfg_log_list.php',
        'd3_cfg_log_main'                                => 'd3/d3log/controllers/admin/d3_cfg_log_main.php',
        'd3log'                                          => 'd3/d3log/models/d3log.php',
        'd3log_cleanup'                                  => 'd3/d3log/models/d3log_cleanup.php',
        'd3log_update'                                   => 'd3/d3log/models/d3log_update.php',
        'd3transactionlog'                               => 'd3/d3log/models/d3transactionlog.php',
        'd3transactionloglist'                           => 'd3/d3log/models/d3transactionloglist.php',
        'd3_d3log_models_transactionlog_reader_abstract' => 'd3/d3log/models/transactionlog/reader/abstract.php',
        'd3_d3log_models_oxobject2d3transactionlog'      => 'd3/d3log/models/oxobject2d3transactionlog.php',
    ),
    'templates'   => array(
        'd3_cfg_log_cleanup.tpl' => 'd3/d3log/views/admin/tpl/d3_cfg_log_cleanup.tpl',
        'd3_cfg_log_export.tpl'  => 'd3/d3log/views/admin/tpl/d3_cfg_log_export.tpl',
        'd3_cfg_log_list.tpl'    => 'd3/d3log/views/admin/tpl/d3_cfg_log_list.tpl',
        'd3_cfg_log_main.tpl'    => 'd3/d3log/views/admin/tpl/d3_cfg_log_main.tpl',
        'd3log_lib_cfg.tpl'      => 'd3/d3log/views/admin/tpl/d3log_lib_cfg.tpl',
        'd3loglevel_form.tpl'    => 'd3/d3log/views/admin/tpl/inc/d3loglevel_form.tpl',
    ),
    'events'      => array(
        'onActivate'   => 'd3install::checkUpdateStart',
        'onDeactivate' => 'd3install::disableModCfg',
    ),
);
