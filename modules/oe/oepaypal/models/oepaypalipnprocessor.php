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
 * PayPal IPN processor class
 */
class oePayPalIPNProcessor
{
    /**
     * PayPal request handler.
     * @var oePayPalRequest
     */
    protected $_oRequest = null;

    /**
     * @var oePayPalIPNPaymentBuilder
     */
    protected $_oPaymentBuilder = null;

    /**
     * @var oePayPalOrderManager
     */
    protected $_oOrderManager = null;

    /**
     * Set object oePayPalRequest.
     *
     * @param oePayPalRequest $oRequest object to set.
     */
    public function setRequest( $oRequest )
    {
        $this->_oRequest = $oRequest;
    }

    /**
     * Create object oePayPalRequest to get PayPal request information.
     *
     * @return oeRequest
     */
    public function getRequest()
    {
        return $this->_oRequest;
    }

    /**
     * @param oxLang $oLang
     */
    public function setLang( $oLang )
    {
        $this->_oLang = $oLang;
    }

    /**
     * @return oxLang
     */
    public function getLang()
    {
        return $this->_oLang;
    }

    /**
     * @param oePayPalIPNPaymentBuilder $oPaymentBuilder
     */
    public function setPaymentBuilder( $oPaymentBuilder )
    {
        $this->_oPaymentBuilder = $oPaymentBuilder;
    }

    /**
     * @return oePayPalIPNPaymentBuilder
     */
    public function getPaymentBuilder()
    {
        if ( is_null( $this->_oPaymentBuilder ) ) {
            $this->_oPaymentBuilder = oxNew( 'oePayPalIPNPaymentBuilder' );
        }
        return $this->_oPaymentBuilder;
    }

    /**
     * @param oePayPalOrderManager $oPayPalOrderManager
     */
    public function setOrderManager( $oPayPalOrderManager )
    {
        $this->_oOrderManager = $oPayPalOrderManager;
    }

    /**
     * @return oePayPalOrderManager
     */
    public function getOrderManager()
    {
        if ( is_null( $this->_oOrderManager ) ) {
            $this->_oOrderManager = oxNew( 'oePayPalOrderManager' );
        }
        return $this->_oOrderManager;
    }

    /**
     * Initiate payment status changes according to IPN information.
     *
     * @return null
     */
    public function process()
    {
        $oLang = $this->getLang();
        $oRequest = $this->getRequest();
        $oPaymentBuilder = $this->getPaymentBuilder();
        $oPayPalOrderManager = $this->getOrderManager();

        // Create Payment from Request.
        $oPaymentBuilder->setLang( $oLang );
        $oPaymentBuilder->setRequest( $oRequest );
        $oOrderPayment = $oPaymentBuilder->buildPayment();

        $oPayPalOrderManager->setOrderPayment( $oOrderPayment );
        $blProcessSuccess = $oPayPalOrderManager->updateOrderStatus();

        return $blProcessSuccess;
    }
}