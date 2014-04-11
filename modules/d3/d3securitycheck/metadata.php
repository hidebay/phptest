<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module configuration base library
 *
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright © D³ Data Development, Thomas Dartsch
 * @author D³ Data Development - Daniel Seifert <support@shopmodule.com>
 * @link http://www.oxidmodule.com
 */
$aModule = array(
    'id'           => 'd3seccheck_lib',
    'title'        => '<img src="../modules/_d3modcfg/public/d3logo.php?cl='.$_REQUEST['cl'].'" alt="D&sup3;" title="D&sup3; Data Development"> Connector - Systempr&uuml;fung / system check',
    'description'  => '',
    'thumbnail'    => 'picture.png',
    'version'      => '2.1.0.0',
    'author'       => 'D&sup3; Data Development',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'extend'       => array(
    ),
    'files' => array(
        'd3_syscheck'                       => 'd3/d3securitycheck/controllers/admin/d3_syscheck.php',
        'd3_syscheck_list'                  => 'd3/d3securitycheck/controllers/admin/d3_syscheck_list.php',
        'd3_syscheck_mysql'                 => 'd3/d3securitycheck/controllers/admin/d3_syscheck_mysql.php',
        'd3seccheck'                        => 'd3/d3securitycheck/controllers/admin/d3seccheck.php',
        'd3seccheck_update'                 => 'd3/d3securitycheck/models/d3seccheck_update.php',
    ),
    'templates' => array(
        'd3_syscheck_mysql.tpl'             => 'd3/d3securitycheck/views/admin/tpl/d3_syscheck_mysql.tpl',
        'd3seccheck.tpl'                    => 'd3/d3securitycheck/views/admin/tpl/d3seccheck.tpl',
    ),
    'events' => array(
        'onActivate'                      => 'd3install::checkUpdateStart',
    ),
);