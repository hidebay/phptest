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
 * @package   core
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 * @version   SVN: $Id: cron.php 25467 2010-02-01 14:14:26Z Arvydas $
 */


require_once dirname(__FILE__) . "/../bootstrap.php";

// initializes singleton config class
$myConfig = oxRegistry::getConfig();

// executing maintenance tasks..
oxNew( "oxmaintenance" )->execute();

// closing page, writing cache and so on..
$myConfig->pageClose();