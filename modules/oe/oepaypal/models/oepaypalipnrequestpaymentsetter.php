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
 * PayPal IPN request payment setter class
 */
class oePayPalIPNRequestPaymentSetter
{
    /**
     * Sandbox mode parameter name.
     * @var string
     */
    const PAYPAL_SANDBOX = 'test_ipn';

    /**
     * String PayPal payment status parameter name.
     * @var string
     */
    const PAYPAL_PAYMENT_STATUS = 'payment_status';

    /**
     * String PayPal transaction id.
     * @var string
     */
    const PAYPAL_TRANSACTION_ID = 'txn_id';

    /**
     * String PayPal whole price including payment and shipment.
     * @var string
     */
    const MC_GROSS = 'mc_gross';

    /**
     * String PayPal payment currency.
     * @var string
     */
    const MC_CURRENCY = 'mc_currency';

    /**
     * @var oePayPalRequest
     */
    protected $_oRequest = null;

    /**
     * @var oePayPalOrderPayment
     */
    protected $_oRequestOrderPayment = null;

    /**
     * Sets request object to get params for IPN request.
     * @param oePayPalRequest $oRequest
     */
    public function setRequest( $oRequest )
    {
        $this->_oRequest = $oRequest;
    }

    /**
     * Gets request object to get params for IPN request.
     * @return oePayPalRequest
     */
    public function getRequest()
    {
        return $this->_oRequest;
    }

    /**
     * @param oePayPalOrderPayment $oOrderPayment
     */
    public function setRequestOrderPayment( $oOrderPayment )
    {
        $this->_oRequestOrderPayment = $oOrderPayment;
    }

    /**
     * @return oePayPalOrderPayment
     */
    public function getRequestOrderPayment()
    {
        $this->_prepareOrderPayment( $this->_oRequestOrderPayment );
        return $this->_oRequestOrderPayment;
    }

    /**
     * Prepare PayPal payment. Fill up with request values.
     *
     * @param oePayPalOrderPayment $oRequestOrderPayment order to set params.
     */
    protected function _prepareOrderPayment( $oRequestOrderPayment )
    {
        $oRequest = $this->getRequest();

        $oRequestOrderPayment->setStatus( $oRequest->getRequestParameter( self::PAYPAL_PAYMENT_STATUS ) );
        $oRequestOrderPayment->setTransactionId( $oRequest->getRequestParameter( self::PAYPAL_TRANSACTION_ID ) );
        $oRequestOrderPayment->setCurrency( $oRequest->getRequestParameter( self::MC_CURRENCY ) );
        $oRequestOrderPayment->setAmount( $oRequest->getRequestParameter( self::MC_GROSS ) );
    }
}