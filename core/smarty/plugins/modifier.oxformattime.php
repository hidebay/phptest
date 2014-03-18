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
 * @version   SVN: $Id: modifier.oxformattime.php 25466 2010-02-01 14:12:07Z sarunas $
 */

/**
 * Smarty modifier
 * -------------------------------------------------------------
 * Name:     smarty_modifier_oxformattime<br>
 * Purpose:  Converts integer (seconds) type value to time (hh:mm:ss) format
 * Example:  {$seconds|oxformattime}
 * -------------------------------------------------------------
 *
 * @param int $iSeconds timespan in seconds
 *
 * @return string
 */
function smarty_modifier_oxformattime( $iSeconds )
{
        $iHours = floor($iSeconds / 3600);
        $iMins  = floor($iSeconds % 3600 / 60);
        $iSecs  = $iSeconds % 60;

        return sprintf("%02d:%02d:%02d", $iHours, $iMins, $iSecs);
}

/* vim: set expandtab: */
