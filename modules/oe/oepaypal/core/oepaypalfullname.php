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
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eSales PayPal PE
 */

/**
 * Class for splitting name.
 *
 * @package core
 */
class oePayPalFullName
{
    private $_sFirstName = '';
    private $_sLastName = '';

    function __construct( $sFullName )
    {
        $this->_split( $sFullName );
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_sFirstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_sLastName;
    }

    protected function _split( $sFullName )
    {
        $aNames = explode(" ", trim($sFullName), 2 );

        $this->_sFirstName = trim($aNames[0]);
        $this->_sLastName = trim($aNames[1]);
    }
}