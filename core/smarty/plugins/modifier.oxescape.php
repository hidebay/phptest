<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link      http://www.oxid-esales.com
 * @package   smarty_plugins
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 * @version   SVN: $Id: modifier.oxlower.php 25466 2010-02-01 14:12:07Z alfonsas $
 */

/**
 * Include the {@link modifier.escape.php} plugin
 */
require_once $smarty->_get_plugin_filepath( 'modifier', 'escape' );

/**
 * Smarty escape modifier plugin
 *
 * Type:     modifier<br>
 * Name:     escape<br>
 * Purpose:  Escape the string according to escapement type
 *
 * @param string $sString  string to escape
 * @param string $sEscType escape type "html|htmlall|url|quotes|hex|hexentity|javascript" [optional]
 * @param string $sCharSet charset [optional]
 *
 * @return string
 */
function smarty_modifier_oxescape( $sString, $sEscType = 'html', $sCharSet = null )
{
    $sCharSet = $sCharSet ? $sCharSet : oxRegistry::getConfig()->getActiveView()->getCharSet();
    return smarty_modifier_escape( $sString, $sEscType, $sCharSet );
}