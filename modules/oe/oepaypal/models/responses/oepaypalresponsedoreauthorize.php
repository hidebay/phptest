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
 * PayPal response class for do reauthorize
 */
class oePayPalResponseDoReAuthorize extends oePayPalResponse
{

    /**
     * Return authorization id
     *
     * @return string
     */
    public function getAuthorizationId()
    {
        return $this->_getValue('AUTHORIZATIONID');
    }


    /**
     * Return payment status
     *
     * @return string
     */
    public function getPaymentStatus()
    {
        return $this->_getValue('PAYMENTSTATUS');
    }

    /**
     * Return transaction id
     *
     * @return string
     */
    public function getCorrelationId()
    {
        return $this->_getValue('CORRELATIONID');
    }
}