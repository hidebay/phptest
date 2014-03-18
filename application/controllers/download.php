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
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 * @version   SVN: $Id: details.php 39349 2011-10-13 08:48:54Z linas.kukulskis $
 */

/**
 * Article file download page.
 *
 * @package main
 */
class Download extends oxUBase
{
    /**
     * Prevents from loading any component as this controller
     * only returns file content if token is valid
     *
     * @return null
     */
    public function init()
    {
        // empty for performance reasons
    }

    /**
     * Checks if given token is valid, formats HTTP headers,
     * and outputs file to buffer.
     *
     * If token is not valid, redirects to start page.
     *
     * @return null
     */
    public function render()
    {
        $sFileOrderId = oxConfig::getParameter('sorderfileid');

        if ( $sFileOrderId ) {
            $oArticleFile = oxNew('oxFile');
            try {
                $oOrderFile = oxNew('oxOrderFile');
                if ( $oOrderFile->load($sFileOrderId) ) {
                    $sFileId = $oOrderFile->processOrderFile();
                    if ( $sFileId && $oArticleFile->load($sFileId) ) {
                        $oArticleFile->download();
                    } else {
                        $sError = "ERROR_MESSAGE_FILE_DOESNOT_EXIST";
                    }
                }
            } catch (oxException $oEx) {
                $sError = "ERROR_MESSAGE_FILE_DOWNLOAD_FAILED";
            }
        } else {
            $sError = "ERROR_MESSAGE_WRONG_DOWNLOAD_LINK";
        }
        if ( $sError ) {
            $oEx = new oxExceptionToDisplay();
            $oEx->setMessage( $sError );
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( $oEx, false );
            oxRegistry::getUtils()->redirect( oxRegistry::getConfig()->getShopUrl() . 'index.php?cl=start&showexceptionpage=1');
        }
    }
}
