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

$sLangName = "English";
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(

//Navigation
    'charset'                              => 'ISO-8859-15',
    'd3mxd3cleartmp'                       => 'clear TMP',

    'D3_CFG_CLRTMP_ALL'                    => 'Clear <span style="font-weight: bold;">all</span>',
    'D3_CFG_CLRTMP_TPL'                    => 'Clear <span style="font-weight: bold;">template</span> cache',
    'D3_CFG_CLRTMP_DB'                     => 'Clear <span style="font-weight: bold;">datenbase</span> cache',
    'D3_CFG_CLRTMP_LANG'                   => 'Clear <span style="font-weight: bold;">language</span> cache',
    'D3_CFG_CLRTMP_MENU'                   => 'Clear <span style="font-weight: bold;">menu</span> cache',
    'D3_CFG_CLRTMP_CLASSPATH'              => 'Clear <span style="font-weight: bold;">classpath</span> cache',
    'D3_CFG_CLRTMP_STRUCTURE'              => 'Clear <span style="font-weight: bold;">structure</span> cache (categories, manufacturers, vendors)',
    'D3_CFG_CLRTMP_TAGCLOUD'               => 'Clear <span style="font-weight: bold;">tagcloud</span> cache',
    'D3_CFG_CLRTMP_SEO'                    => 'Clear <span style="font-weight: bold;">SEO</span> cache',
    'D3_CFG_CLRTMP_MODULE'                 => 'Clear <span style="font-weight: bold;">Module</span> cache',
    'D3_CFG_CLRTMP_VIEWS'                  => 'update <span style="font-weight: bold;">view</span> tables',
    'D3_CFG_CLRTMP_TPLBLOCKS'              => 'Remove <span style="font-weight: bold;">template blocks</span>',
    'D3_CFG_CLRTMP_TPLBLOCKS_REQUACT'      => 'requires module reactivation',
    'D3_CFG_CLRTMP_SUBMIT'                 => 'Clear TMP',
    'D3_CFG_CLRTMP_OR'                     => 'or',
    'D3_CFG_CLRTMP_MSG1'                   => 'TMP will cleared.',
    'D3_CFG_CLRTMP_MSG2'                   => 'Please wait...',

    'D3CLRTMP_LIB_TRANSL'                  => 'clear TMP',
    'D3CLRTMP_LIB_HELPLINK'                => 'Modul-Connector/TMP-leeren/',

    'D3_CFG_CLRTMP_STAT'                   => 'Statistic',
    'D3_CFG_CLRTMP_PATH'                   => 'Path:',
    'D3_CFG_CLRTMP_COUNT'                  => 'File count:',
    'D3_CFG_CLRTMP_SIZE'                   => 'Physical size:',
    'D3_CFG_CLRTMP_DELFOLDER'              => 'Foreign folders will deleted:',
    'D3_CFG_CLRTMP_CREATEHTA'              => '.htaccess will created:',
    'D3_CFG_CLRTMP_UPDATEVIEW'             => 'update view tables:',
    'D3_CFG_CLRTMP_CFG_TICKERTHRESHOLD'    => 'From this count of tmp files delete process will tickered:',
    'D3_CFG_CLRTMP_NO'                     => 'no',
    'D3_CFG_CLRTMP_YES'                    => 'yes',
    'D3_CFG_CLRTMP_SET_DESC'               => 'These settings can changed in admin panel in "Module Connector -> libraries".',
    'D3_CFG_CLRTMP_USETICKER'              => 'use ticker from',
    'D3_CFG_CLRTMP_USETICKERFILES'         => ' files',

    'D3_CFG_CLRTMP_DEV_LEGEND'             => 'Development Mode',
    'D3_CFG_CLRTMP_DEV_DESC'               => 'Der Entwicklermodus verhindert, dass Inhalte im TMP-Verzeichnis abgelegt werden. Damit lassen sich Template-Änderungen und auch Sprachanpassungen schnell kontrollieren. Beachten Sie jedoch unbedingt, dass damit eine wichtige Performance-Optimierung des Shops deaktiviert ist. Verwenden Sie den Entwicklermodus daher nicht grundlos.<span style="font-weight: bold;">Die Verwendung verursacht längere Seitenladezeiten.</span><br>Aus diesem Grund funktioniert der Entwicklermodus auch nur mit <span style="font-weight: bold;">deaktiviertem Produktivmodus</span> des Shops.<br>Während der Verwendung des Entwicklermodus können keine Updates des D3 Modul Connectors und seinen Bibliotheken durchgeführt werden.',
    'D3_CFG_CLRTMP_DEV_BTNACT'             => 'activate development mode',
    'D3_CFG_CLRTMP_DEV_BTNDEACT'           => 'deactivate development mode',
    'D3_CFG_CLRTMP_DEV_DEACTPRODUCTIVE'    => 'Deaktivieren Sie für den Entwicklermodus zwingend den Produktivmodus des Shops.',

    'D3_CFG_CLRTMP_MODULELOGGING'          => 'Logging',
    'D3_CFG_CLRTMP_CFG_CREATE_NOHTACCESS'  => '<span style="font-weight: bold;">don\'t</span> create a .htaccess file',
    'D3_CFG_CLRTMP_CFG_REMOVEFOLDERS'      => '<span style="font-weight: bold;">don\'t</span> delete included foreign folders',
    'D3_CFG_CLRTMP_CFG_NOUPDATEVIEWS'      => '<span style="font-weight: bold;">don\'t</span> update view tables',
    'D3_CFG_CLRTMP_CFG_USERACTION_1'       => 'userdefined action 1:',
    'D3_CFG_CLRTMP_CFG_USERACTION_2'       => 'userdefined action 2:',
    'D3_CFG_CLRTMP_CFG_USERACTION_NAME'    => 'name',
    'D3_CFG_CLRTMP_CFG_USERACTION_PATTERN' => 'regexp pattern (without delimiter)',
    'D3_CFG_CLRTMP_CFG_SAVE'               => 'save',

    'D3_CFG_CLRTMP_SUCCESS'                => 'The TMP folder was cleared.',
    'D3_CFG_CLRTMP_VIEWUPDATESUCCESS'      => 'View tables were updated.',
    'D3_CFG_CLRTMP_NOVALIDFSCLASS'         => 'Unable to clear the TMP folder - please update the install library!',

);
