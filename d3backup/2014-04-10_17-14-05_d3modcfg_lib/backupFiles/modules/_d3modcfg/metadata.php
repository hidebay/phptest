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
    'id'          => 'd3modcfg_lib',
    'title'       => '<img src="../modules/_d3modcfg/public/d3logo.php?cl=' . $_REQUEST['cl'] .
        '" alt="D&sup3;" title="D&sup3; Data Development"> Connector - Modulkonfiguration / Module Configuration',
    'description' => array(
        'de' => 'Speichert Moduleintr&auml;ge sicher und einfach editierbar und stellt verschiedene Assistenten zur Verf&uuml;gung.',
        'en' => 'Stores module configurations safe and easy editable and makes different wizzards accessible.',
    ),
    'lang'        => 'de',
    'thumbnail'   => 'picture.png',
    'version'     => '3.10.0.1',
    'author'      => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com',
    'extend'      => array(
        'oxmodule'      => '_d3modcfg/modules/models/d3_oxmodule_activecheck',
        'oxshopcontrol' => '_d3modcfg/modules/controllers/d3_oxshopcontrol_modcfg_extension',
        'oxutilsview'   => '_d3modcfg/modules/core/d3_oxutilsview_modcfg',
        # see EE check under $aModules definition for further extensions
    ),
    'files'       => array(
        'd3_cfg_mod'         => '_d3modcfg/models/d3_cfg_mod.php',
        'd3modprofile'       => '_d3modcfg/models/d3modprofile.php',
        'd3modprofilelist'   => '_d3modcfg/models/d3modprofilelist.php',
        'd3_cfg_mod_key'     => '_d3modcfg/models/d3_cfg_mod_key.php',
        'd3_cfg_mod_update'  => '_d3modcfg/models/d3_cfg_mod_update.php',
        'd3feeds'            => '_d3modcfg/models/d3feeds.php',
        'd3modcfg_cleanup'   => '_d3modcfg/models/d3modcfg_cleanup.php',
        'd3pagenavigation'   => '_d3modcfg/models/d3pagenavigation.php',
        'd3tickercontrol'    => '_d3modcfg/models/d3tickercontrol.php',
        'd3counter'          => '_d3modcfg/models/d3counter.php',
        'd3utils'            => '_d3modcfg/models/d3utils.php',
        'd3_cfg_mod_'        => '_d3modcfg/controllers/admin/d3_cfg_mod_.php',
        'd3_cfg_mod_licence' => '_d3modcfg/controllers/admin/d3_cfg_mod_licence.php',
        'd3_cfg_mod_list'    => '_d3modcfg/controllers/admin/d3_cfg_mod_list.php',
        'd3_cfg_mod_main'    => '_d3modcfg/controllers/admin/d3_cfg_mod_main.php',
        'd3cfgitems'         => '_d3modcfg/controllers/admin/d3cfgitems.php',
        'd3mod_status'       => '_d3modcfg/controllers/admin/d3mod_status.php',
        'd3modext'           => '_d3modcfg/controllers/admin/d3modext.php',
        'd3modext_list'      => '_d3modcfg/controllers/admin/d3modext_list.php',
        'd3modext_status'    => '_d3modcfg/controllers/admin/d3modext_status.php',
        'd3modext_new'       => '_d3modcfg/controllers/admin/d3modext_new.php',
        'd3moditems'         => '_d3modcfg/controllers/admin/d3moditems.php',
        'd3modlib'           => '_d3modcfg/controllers/admin/d3modlib.php',
        'd3modlib_list'      => '_d3modcfg/controllers/admin/d3modlib_list.php',
        'd3modlib_status'    => '_d3modcfg/controllers/admin/d3modlib_status.php',
        'd3modlib_support'   => '_d3modcfg/controllers/admin/d3modlib_support.php',
        'd3sysitems'         => '_d3modcfg/controllers/admin/d3sysitems.php',
        'd3sysitems_list'    => '_d3modcfg/controllers/admin/d3sysitems_list.php',
        'd3mod_activation'   => '_d3modcfg/controllers/admin/d3mod_activation.php',
        'd3maintenance'      => '_d3modcfg/controllers/admin/d3maintenance.php',
    ),
    'blocks'      => array(),
    'settings'    => array(),
    'templates'   => array(
        'd3_cfg_mod_.tpl'        => '_d3modcfg/views/admin/tpl/d3_cfg_mod_.tpl',
        'd3_cfg_mod_inc.tpl'     => '_d3modcfg/views/admin/tpl/inc/d3_cfg_mod_inc.tpl',
        'd3_cfg_mod_bottom.tpl'  => '_d3modcfg/views/admin/tpl/inc/d3_cfg_mod_bottom.tpl',
        'd3_cfg_mod_active.tpl'  => '_d3modcfg/views/admin/tpl/inc/d3_cfg_mod_active.tpl',
        'd3_modprofile_actionbuttons.tpl'  => '_d3modcfg/views/admin/tpl/inc/d3_modprofile_actionbuttons.tpl',
        'd3_cfg_mod_licence.tpl' => '_d3modcfg/views/admin/tpl/d3_cfg_mod_licence.tpl',
        'd3_cfg_mod_list.tpl'    => '_d3modcfg/views/admin/tpl/d3_cfg_mod_list.tpl',
        'd3_cfg_mod_main.tpl'    => '_d3modcfg/views/admin/tpl/d3_cfg_mod_main.tpl',
        'd3cfgitems.tpl'         => '_d3modcfg/views/admin/tpl/d3cfgitems.tpl',
        'd3modcfg_lib_cfg.tpl'   => '_d3modcfg/views/admin/tpl/d3modcfg_lib_cfg.tpl',
        'd3moditems.tpl'         => '_d3modcfg/views/admin/tpl/d3moditems.tpl',
        'd3modlib_status.tpl'    => '_d3modcfg/views/admin/tpl/d3modlib_status.tpl',
        'd3mod_activation.tpl'   => '_d3modcfg/views/admin/tpl/d3mod_activation.tpl',
        'd3maintenance.tpl'      => '_d3modcfg/views/admin/tpl/d3maintenance.tpl',
        'd3pagenavigation.tpl'   => '_d3modcfg/views/admin/tpl/d3pagenavigation.tpl',
    ),
    'events'      => array(
        'onActivate'   => 'd3install::checkUpdateStart',
        'onDeactivate' => 'd3install::disableModCfg',
    ),
);

if (class_exists('roles_bemain'))
{
    $aModule['extend']['roles_bemain'] = '_d3modcfg/modules/controllers/admin/d3_roles_bemain_rolesrights';
}