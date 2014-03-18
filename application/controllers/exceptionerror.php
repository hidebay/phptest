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
 * @version   SVN: $Id: news.php 35529 2011-05-23 07:31:20Z arunas.paskevicius $
 */

/**
 * Displays exception errors
 */
class ExceptionError extends oxUBase
{
    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'message/exception.tpl';

    /**
     * Sets exception errros to template
     *
     * @return null
     */
    public function displayExceptionError()
    {
        $aViewData = $this->getViewData();

        //add all exceptions to display
        $aErrors = $this->_getErrors();
        
        if ( is_array( $aErrors ) && count( $aErrors ) ) {
            oxRegistry::get("oxUtilsView")->passAllErrorsToView( $aViewData, $aErrors );
        }

        $oSmarty = oxRegistry::get("oxUtilsView")->getSmarty();
        $oSmarty->assign_by_ref( "Errors", $aViewData["Errors"] );

        // resetting errors from session
        oxSession::setVar( 'Errors', array() );
    }

    /**
     * return page errors array
     *
     * @return array
     */
    protected function _getErrors()
    {
        $aErrors = oxSession::getVar( 'Errors' );

        if (null === $aErrors) {
            $aErrors = array();
        }

        return $aErrors;
    }
}
