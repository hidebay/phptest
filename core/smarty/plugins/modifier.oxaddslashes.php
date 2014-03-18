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
 */

/**
 * Smarty modifier
 * -------------------------------------------------------------
 * Name:     oxaddslashes<br>
 * Purpose:  Quote string with slashes
 * -------------------------------------------------------------
 *
 * @param string $string String to escape
 *
 * @return string
 */
function smarty_modifier_oxaddslashes( $string )
{
    return addslashes( $string );
}
