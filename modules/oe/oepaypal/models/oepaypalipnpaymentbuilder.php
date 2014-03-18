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
 * PayPal IPN payment builder class
 */
class oePayPalIPNPaymentBuilder
{
    /**
     * @var oePayPalRequest
     */
    protected $_oRequest = null;

    /**
     * @var oePayPalIPNRequestPaymentSetter
     */
    protected $_oPayPalIPNPaymentSetter = null;

    /**
     * @var oePayPalOrderPayment
     */
    protected $_oOrderPayment = null;

    /**
     * @var oePayPalIPNPaymentValidator
     */
    protected $_oPayPalIPNPaymentValidator = null;

    /**
     * @var oxLang
     */
    protected $_oLang = null;

    /**
     * @param oePayPalIPNRequestPaymentSetter $oPayPalIPNPaymentSetter
     */
    public function setOrderPaymentSetter( $oPayPalIPNPaymentSetter )
    {
        $this->_oPayPalIPNPaymentSetter = $oPayPalIPNPaymentSetter;
    }

    /**
     * @return oePayPalIPNRequestPaymentSetter
     */
    public function getOrderPaymentSetter()
    {
        if ( is_null( $this->_oPayPalIPNPaymentSetter ) ) {
            $oPayPalIPNPaymentSetter = oxNew( 'oePayPalIPNRequestPaymentSetter' );
            $this->setOrderPaymentSetter( $oPayPalIPNPaymentSetter );
        }
        return $this->_oPayPalIPNPaymentSetter;
    }

    /**
     * @param oePayPalIPNPaymentValidator $oPayPalIPNPaymentValidator
     */
    public function setOrderPaymentValidator( $oPayPalIPNPaymentValidator )
    {
        $this->_oPayPalIPNPaymentValidator = $oPayPalIPNPaymentValidator;
    }

    /**
     * @return oePayPalIPNPaymentValidator
     */
    public function getOrderPaymentValidator()
    {
        if ( is_null( $this->_oPayPalIPNPaymentValidator ) ) {
            $oPayPalIPNPaymentValidator = oxNew( 'oePayPalIPNPaymentValidator' );
            $this->setOrderPaymentValidator( $oPayPalIPNPaymentValidator );
        }
        return $this->_oPayPalIPNPaymentValidator;
    }

    /**
     * @param oePayPalRequest $oRequest
     */
    public function setRequest( $oRequest )
    {
        $this->_oRequest = $oRequest;
    }

    /**
     * @return oePayPalRequest
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
     * Create payment from given request.
     *
     * @return oePayPalOrderPayment|null
     */
    public function buildPayment()
    {
        // Setter forms request payment from request parameters.
        $oRequestOrderPayment = $this->_prepareRequestOrderPayment();

        // Create order payment from database to check if it match created from request.
        $oOrderPayment = $this->_loadOrderPayment( $oRequestOrderPayment->getTransactionId() );

        // Only need validate if there is order in database.
        // If request payment do not have matching payment with order return null.
        if ( $oOrderPayment->getOrderId() ) {
            // Validator change request payment by adding information if it is valid.
            $oOrderPayment = $this->_addPaymentValidationInformation( $oRequestOrderPayment, $oOrderPayment );
            $oOrderPayment = $this->_changePaymentStatusInfo( $oRequestOrderPayment, $oOrderPayment );
            $oOrderPayment->save();
        } else {
            $oOrderPayment = null;
        }

        return $oOrderPayment;
    }

    /**
     * Load order payment from transaction id.
     *
     * @param string $sTransactionId transaction id to load object.
     *
     * @return oePayPalOrderPayment|null
     */
    protected function _loadOrderPayment( $sTransactionId )
    {
        $oOrderPayment = oxNew( 'oePayPalOrderPayment' );
        $oOrderPayment->loadByTransactionId( $sTransactionId );
        return $oOrderPayment;
    }

    /**
     * Wrapper to set parameters to order payment from request.
     *
     * @return oePayPalOrderPayment
     */
    protected function _prepareRequestOrderPayment()
    {
        $oRequestOrderPayment = oxNew( 'oePayPalOrderPayment' );
        $oRequest = $this->getRequest();

        $oRequestPaymentSetter = $this->getOrderPaymentSetter();
        $oRequestPaymentSetter->setRequest( $oRequest );
        $oRequestPaymentSetter->setRequestOrderPayment( $oRequestOrderPayment );

        $oRequestOrderPayment = $oRequestPaymentSetter->getRequestOrderPayment();
        return $oRequestOrderPayment;
    }

    /**
     * @param oePayPalOrderPayment $oRequestOrderPayment
     * @param oePayPalOrderPayment $oOrderPayment
     *
     * @return oePayPalOrderPayment
     */
    protected function _addPaymentValidationInformation( $oRequestOrderPayment, $oOrderPayment )
    {
        $oLang = $this->getLang();

        $oPaymentValidator = $this->getOrderPaymentValidator();
        $oPaymentValidator->setRequestOrderPayment( $oRequestOrderPayment );
        $oPaymentValidator->setOrderPayment( $oOrderPayment );
        $oPaymentValidator->setLang( $oLang );

        $blPaymentIsValid = $oPaymentValidator->isValid();
        if ( !$blPaymentIsValid ) {
            $oOrderPayment->setIsValid( $blPaymentIsValid );
            $oComment = oxNew('oePayPalOrderPaymentComment');
            $oComment->setComment( $oPaymentValidator->getValidationFailureMessage() );
            $oOrderPayment->addComment( $oComment );
        }

        return $oOrderPayment;
    }
    /**
     * Add Payment Status information to object from database from object created from from PayPal request.
     *
     * @param oePayPalOrderPayment $oRequestOrderPayment
     * @param oePayPalOrderPayment $oOrderPayment
     *
     * @return oePayPalOrderPayment
     */
    protected function _changePaymentStatusInfo( $oRequestOrderPayment, $oOrderPayment )
    {
        $oOrderPayment->setStatus( $oRequestOrderPayment->getStatus() );
        return $oOrderPayment;
    }

}