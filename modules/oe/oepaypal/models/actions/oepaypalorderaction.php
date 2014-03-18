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
 * PayPal order action class
 */
abstract class oePayPalOrderAction
{
    /**
     * Action name
     *
     * @var string
     */
    protected $_sActionName = null;

    /**
     * Request object
     *
     * @var oePayPalRequest
     */
    protected $_oRequest = null;

    /**
     *
     *
     * @var oePayPalRequest
     */
    protected $_oOrder = null;

    /**
     * @var string
     */
    protected $_sOrderStatus = null;

    /**
     * @var string
     */
    protected $_sAuthorizationId = null;

    /**
     * @var string
     */
    protected $_sComment = null;

    /**
     * @var oePayPalService
     */
    protected $_oPayPalService = null;

    /**
     * PayPal order
     *
     * @var oePayPalPayPalOrder
     */
    protected $_oPayPalRequestBuilder = null;

    /**
     * Sets request object
     *
     * @param oePayPalRequest $oRequest
     */
    public function setRequest( $oRequest )
    {
        $this->_oRequest = $oRequest;
    }

    /**
     * Returns request object
     *
     * @return oePayPalRequest
     */
    public function getRequest()
    {
        return $this->_oRequest;
    }

    /**
     * Sets order object
     *
     * @param oePayPalPayPalOrder $oOrder
     */
    public function setOrder( $oOrder )
    {
        $this->_oOrder = $oOrder;
    }

    /**
     * Returns order object
     *
     * @return oePayPalPayPalOrder
     */
    public function getOrder()
    {
        return $this->_oOrder;
    }

    /**
     * Sets order status
     *
     * @param string $sOrderStatus
     */
    public function setOrderStatus( $sOrderStatus )
    {
        $this->_sOrderStatus = $sOrderStatus;
    }

    /**
     * Returns order status
     *
     * @return string
     */
    public function getOrderStatus()
    {
        if ( $this->_sOrderStatus === null ) {
            $sStatus = $this->getRequest()->getRequestParameter( 'order_status' );
            $this->setOrderStatus( $sStatus );
        }
        return $this->_sOrderStatus;
    }

    /**
     * Sets order status to PayPal order
     */
    protected function _changeOrderStatus()
    {
        $sStatus = $this->getOrderStatus();
        $this->getOrder()->setPaymentStatus( $sStatus );
    }

    /**
     * Returns authorization id
     *
     * @return string
     */
    public function getAuthorizationId()
    {
        return $this->_sAuthorizationId;
    }

    /**
     * Sets authorization id
     *
     * @param string $sAuthorizationId
     */
    public function setAuthorizationId( $sAuthorizationId )
    {
        $this->_sAuthorizationId = $sAuthorizationId;
    }

    /**
     * Sets PayPal request builder
     *
     * @param oePayPalPayPalRequestBuilder $oBuilder
     */
    public function setPayPalRequestBuilder( $oBuilder )
    {
        $this->_oPayPalRequestBuilder = $oBuilder;
    }

    /**
     * Returns PayPal request builder
     *
     * @return oePayPalPayPalRequestBuilder
     */
    public function getPayPalRequestBuilder()
    {
        if ( $this->_oPayPalRequestBuilder === null ) {
            $this->_oPayPalRequestBuilder = oxNew( 'oePayPalPayPalRequestBuilder' );
        }
        return $this->_oPayPalRequestBuilder;
    }

    /**
     * Sets PayPal service
     *
     * @param oePayPalService $oService
     */
    public function setPayPalService( $oService )
    {
        $this->_oPayPalService = $oService;
    }

    /**
     * Returns PayPal service
     *
     * @return oePayPalService
     */
    public function getPayPalService()
    {
        if ( $this->_oPayPalService === null ) {
            $this->_oPayPalService = oxNew( 'oePayPalService' );
        }
        return $this->_oPayPalService;
    }

    /**
     * Returns formatted date
     *
     * @return string
     */
    public function getDate()
    {
        return date( 'Y-m-d H:i:s', oxRegistry::get("oxUtilsDate")->getTime() );
    }

    /**
     * Sets action comment
     *
     * @param string $sComment
     */
    public function setComment( $sComment )
    {
        $this->_sComment = $sComment;
    }

    /**
     * Returns action comment
     *
     * @return string
     */
    public function getComment()
    {
        if ( is_null( $this->_sComment ) ) {
            $sComment = $this->getRequest()->getRequestParameter( 'action_comment' );
            $this->setComment( $sComment );
        }
        return $this->_sComment;
    }

    /**
     * Processes PayPal action
     */
    abstract public function process();
}