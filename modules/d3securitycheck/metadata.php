<?php
/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

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
 * @package ModCfg
 * @name Modul Configuration
 * @author D³ Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link http://www.oxidmodule.com
 */
$aModule = array(
    'id'           => 'd3seccheck',
    'title'        => oxLang::getInstance()->translateString('D3_MOD_SECCHECK_METADATA_TITLE'),
    'description'  => oxLang::getInstance()->translateString('D3_MOD_SECCHECK_METADATA_DESC'),
    'thumbnail'    => 'picture.png',
    'version'      => '1.2.2',
    'author'       => oxLang::getInstance()->translateString('D3_MOD_LIB_METADATA_AUTHOR'),
    'email'        => 'support@shopmodule.com',
    'url'          => 'http://www.oxidmodule.com/',
    'extend'       => array(
    )
);