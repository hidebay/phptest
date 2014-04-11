<?php

/**
 *    This module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further informations, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxidmodule.com
 * @link      http://www.shopmodule.com
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.1';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'd3_googleanalytics',
    'title'        => (class_exists('d3utils')?d3utils::getInstance()->getD3Logo():'D&sup3;').' Google Analytics Schnittstelle',
    'description'  => array(
            'de'   => 'Dieses Modul stellt Ihnen die schnelle und unkomplizierte Einbindung Ihres Google-Analytics-Kontos in Ihren Shop zur Verf&uuml;gung.
                       Hierbei werden &uuml;ber standardisierte Schnittstellen die Besucherdaten und eCommerce-Daten zu Google &uuml;bertragen.
                       Ebenfalls &uuml;bermittelt werden Daten der Website-Suche.
                       Dem Modul liegen angepa&szlig;te Templates bei, mit denen auch die Trichter ordentlich protokolliert werden.',
            'en'   => 'Provides a quick and easy integration with your Google Analytics account to your shop.',
    ),
    'thumbnail'    => 'picture.png',
    'version'      => '3.0.0.2',
    'author'       => 'D&sup3; Data Development (Inh. Thomas Dartsch)',
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'oxcmp_utils' => 'd3/d3_googleanalytics/modules/components/d3_oxcmp_utils_googleanalytics',
        'oxorder'     => 'd3/d3_googleanalytics/modules/models/d3_oxorder_googleanalytics',
        'order'       => 'd3/d3_googleanalytics/modules/controllers/d3_order_googleanalytics',
        'oxutilsview' => 'd3/d3_googleanalytics/modules/core/d3_oxutilsview_googleanalytics',
        'thankyou'    => 'd3/d3_googleanalytics/modules/controllers/d3_thankyou_googleanalytics',
    ),
    'files' => array(
        'd3_cfg_googleanalytics'           => 'd3/d3_googleanalytics/controllers/admin/d3_cfg_googleanalytics.php',
        'd3_cfg_googleanalytics_campaigns' => 'd3/d3_googleanalytics/controllers/admin/d3_cfg_googleanalytics_campaigns.php',
        'd3_cfg_googleanalytics_licence'   => 'd3/d3_googleanalytics/controllers/admin/d3_cfg_googleanalytics_licence.php',
        'd3_cfg_googleanalytics_list'      => 'd3/d3_googleanalytics/controllers/admin/d3_cfg_googleanalytics_list.php',
        'd3_cfg_googleanalytics_main'      => 'd3/d3_googleanalytics/controllers/admin/d3_cfg_googleanalytics_main.php',
        'd3_googleanalytics_update'        => 'd3/d3_googleanalytics/models/d3_googleanalytics_update.php',
    ),
    'templates' => array(
        'd3_googleanalytics.tpl'                => 'd3/d3_googleanalytics/views/tpl/widget/d3_googleanalytics.tpl',
        'd3_cfg_googleanalytics_main.tpl'       => 'd3/d3_googleanalytics/views/admin/tpl/d3_cfg_googleanalytics_main.tpl',
        'd3_cfg_googleanalytics_campaigns.tpl'  => 'd3/d3_googleanalytics/views/admin/tpl/d3_cfg_googleanalytics_campaigns.tpl',
    ),
    'events'       => array(
        'onActivate'                      => 'd3install::checkUpdateStart',
    ),
	'blocks' => array(
        array(  'template' => 'layout/base.tpl',
                'block'=>'head_css',
                'file'=>'/views/blocks/layout/d3_base_googleanalytics.tpl'),
    ),
);