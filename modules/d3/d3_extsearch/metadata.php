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
    'id'          => 'd3_extsearch',
    'title'       =>
        (class_exists('d3utils') ? d3utils::getInstance()->getD3Logo() : 'D&sup3;') . ' Erweiterte Suche / Extended Search',
    'description' => array(
        'de' => 'Stellt fehlertolerante Suche und weitere Filterm&ouml;glichkeiten zur Verf&uuml;gung.<br>Aktivieren Sie die Moduleintr&auml;ge bitte immer und steuern Sie die Modulaktivit&auml;t ausschlie&szlig;lich im Adminbereich des Moduls.',
        'en' => '',
    ),
    'thumbnail'   => 'picture.png',
    'version'     => '5.2.0.0',
    'author'      => 'D&sup3; Data Development (Inh.: Thomas Dartsch)',
    'email'       => 'support@shopmodule.com',
    'url'         => 'http://www.oxidmodule.com/',
    'extend'      => array(
        'article_list'  => 'd3/d3_extsearch/modules/controllers/admin/d3_article_list_extsearch',
        'oxarticle'     => 'd3/d3_extsearch/modules/models/d3_oxarticle_phonetic',
        'oxarticlelist' => 'd3/d3_extsearch/modules/models/d3_oxarticlelist_extsearch',
        'oxcmp_basket'  => 'd3/d3_extsearch/modules/components/d3_oxcmp_basket_extsearch',
        'oxcmp_utils'   => 'd3/d3_extsearch/modules/components/d3_oxcmp_utils_extsearch',
        'oxlocator'     => 'd3/d3_extsearch/modules/controllers/d3_oxlocator_extsearch',
        'oxrssfeed'     => 'd3/d3_extsearch/modules/models/d3_oxrssfeed_extsearch',
        'oxsearch'      => 'd3/d3_extsearch/modules/models/d3_oxsearch_extsearch',
        'search'        => 'd3/d3_extsearch/modules/controllers/d3_ext_search',
        'oxutilsview'   => 'd3/d3_extsearch/modules/core/d3_oxutilsview_extsearch',
    ),
    'files'       => array(
        'd3_extsearch_response'            => 'd3/d3_extsearch/controllers/d3_extsearch_response.php',
        'd3_extsearch_synset'              => 'd3/d3_extsearch/models/d3_extsearch_synset.php',
        'd3_extsearch_term'                => 'd3/d3_extsearch/models/d3_extsearch_term.php',
        'd3_extsearch_update'              => 'd3/d3_extsearch/models/d3_extsearch_update.php',
        'd3_oxutils_extsearch'             => 'd3/d3_extsearch/models/d3_oxutils_extsearch.php',
        'd3_search'                        => 'd3/d3_extsearch/models/d3_search.php',
        'd3_search_generator'              => 'd3/d3_extsearch/models/d3_search_generator.php',
        'd3_semantic'                      => 'd3/d3_extsearch/models/d3_semantic.php',
        'd3_cfg_extsearch'                 => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch.php',
        'd3_cfg_extsearch_licence'         => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_licence.php',
        'd3_cfg_extsearch_list'            => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_list.php',
        'd3_cfg_extsearch_main'            => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_main.php',
        'd3_cfg_extsearch_navigation'      => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_navigation.php',
        'd3_cfg_extsearch_plugins'         => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_plugins.php',
        'd3_cfg_extsearch_quicksearch'     => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_quicksearch.php',
        'd3_cfg_extsearch_statistik'       => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearch_statistik.php',
        'd3_cfg_extsearchstat'             => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchstat.php',
        'd3_cfg_extsearchstat_list'        => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchstat_list.php',
        'd3_cfg_extsearchsyneditor'        => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor.php',
        'd3_cfg_extsearchsyneditor_family' => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor_family.php',
        'd3_cfg_extsearchsyneditor_list'   => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor_list.php',
        'd3_cfg_extsearchsyneditor_main'   => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor_main.php',
        'd3_cfg_extsearchsyneditor_manage' => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor_manage.php',
        'd3_cfg_extsearchsyneditor_synset' => 'd3/d3_extsearch/controllers/admin/d3_cfg_extsearchsyneditor_synset.php',
        'd3_extsearch_report_base'         => 'd3/d3_extsearch/controllers/admin/reports/d3_extsearch_report_base.php',
        'd3_extsearch_report_hitless'      => 'd3/d3_extsearch/controllers/admin/reports/d3_extsearch_report_hitless.php',
        'd3_extsearch_report_mostsearches' => 'd3/d3_extsearch/controllers/admin/reports/d3_extsearch_report_mostsearches.php',
    ),
    'templates'   => array(
        'd3_cfg_extsearch_main.tpl'            => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearch_main.tpl',
        'd3_cfg_extsearch_navigation.tpl'      => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearch_navigation.tpl',
        'd3_cfg_extsearch_plugins.tpl'         => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearch_plugins.tpl',
        'd3_cfg_extsearch_quicksearch.tpl'     => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearch_quicksearch.tpl',
        'd3_cfg_extsearch_statistik.tpl'       => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearch_statistik.tpl',
        'd3_cfg_extsearchsyneditor_family.tpl' => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearchsyneditor_family.tpl',
        'd3_cfg_extsearchsyneditor_list.tpl'   => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearchsyneditor_list.tpl',
        'd3_cfg_extsearchsyneditor_main.tpl'   => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearchsyneditor_main.tpl',
        'd3_cfg_extsearchsyneditor_manage.tpl' => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearchsyneditor_manage.tpl',
        'd3_cfg_extsearchsyneditor_synset.tpl' => 'd3/d3_extsearch/views/admin/tpl/d3_cfg_extsearchsyneditor_synset.tpl',
        'd3_extsearch_report_hitless.tpl'      => 'd3/d3_extsearch/views/admin/tpl/reports/d3_extsearch_report_hitless.tpl',
        'd3_extsearch_report_mostsearches.tpl' => 'd3/d3_extsearch/views/admin/tpl/reports/d3_extsearch_report_mostsearches.tpl',
    ),
    'events'      => array(
        'onActivate' => 'd3install::checkUpdateStart',
    ),
    'settings' => array(
        //array('group' => 'main', 'name' => 'dMaxPayPalDeliveryAmount', 'type' => 'str',  'value' => '30'),
    ),
    'blocks'      => array(
        array(
            'template'  => 'page/search/search.tpl',
            'block'     => 'search_results',
            'file'      => 'views/blocks/page/search/d3_inc_ext_search.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'layout/base.tpl',
            'block'     => 'head_css',
            'file'      => 'views/blocks/layout/d3_extsearch_css.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'layout/base.tpl',
            'block'     => 'base_js',
            'file'      => 'views/blocks/layout/d3_extsearch_js.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/header/search.tpl',
            'block'     => 'widget_header_search_form',
            'file'      => 'views/blocks/widget/header/d3_extsearch_headersearch.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/header/search.tpl',
            'block'     => 'header_search_field',
            'file'      => 'views/blocks/widget/header/d3_extsearch_searchfield.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/product/listitem_infogrid.tpl',
            'block'     => 'widget_product_listitem_infogrid_titlebox',
            'file'      => 'views/blocks/widget/product/d3_extsearch_listiteminfogrid_title.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/product/listitem_grid.tpl',
            'block'     => 'widget_product_listitem_grid',
            'file'      => 'views/blocks/widget/product/d3_extsearch_listitemgrid_title.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/product/listitem_line.tpl',
            'block'     => 'widget_product_listitem_line_selections',
            'file'      => 'views/blocks/widget/product/d3_extsearch_listitemline_selections.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'widget/product/listitem_line.tpl',
            'block'     => 'widget_product_listitem_line_description',
            'file'      => 'views/blocks/widget/product/d3_extsearch_listitemline_description.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'content_main.tpl',
            'block'     => 'admin_content_main_form',
            'file'      => 'views/admin/blocks/d3_extsearch_content_main.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'attribute_main.tpl',
            'block'     => 'admin_attribute_main_form',
            'file'      => 'views/admin/blocks/d3_extsearch_attribute_main.tpl',
            'position'  => 1,
        ),
        array(
            'template'  => 'article_extend.tpl',
            'block'     => 'admin_article_extend_form',
            'file'      => 'views/admin/blocks/d3_extsearch_article_extend.tpl',
            'position'  => 1,
        ),
    )
);