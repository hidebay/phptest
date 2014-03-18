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
 * PayPal order payment list class
 */
class oePayPalOrderPaymentList extends oePayPalList
{
    /**
     * Data base gateway
     *
     * @var oePayPalPayPalDbGateway
     */
    protected $_oDbGateway = null;


    protected $_sOrderId = null;

    public function setOrderId( $sOrderId )
    {
        $this->_sOrderId = $sOrderId;
    }

    public function getOrderId()
    {
        return $this->_sOrderId;
    }

    protected function _getDbGateway() {
        if ( is_null( $this->_oDbGateway ) ) {
            $this->_setDbGateway( oxNew( 'oePayPalOrderPaymentDbGateway' ) );
        }
        return $this->_oDbGateway;
    }

    /**
     * Set model database gateway
     *
     * @var object
     */
    protected function _setDbGateway( $oDbGateway )
    {
        $this->_oDbGateway = $oDbGateway;
    }

    /**
     * Selects and loads order payment history
     *
     * @param string $sOrderId order id
     *
     */
    public function load( $sOrderId )
    {
        $this->setOrderId( $sOrderId );

        $aPayments = array();
        $aPaymentsData = $this->_getDbGateway()->getList( $this->getOrderId() ) ;
        if( is_array( $aPaymentsData ) && count( $aPaymentsData ) ){
            $aPayments = array();
            foreach ($aPaymentsData as $aData ){
                $oPayment = oxNew( 'oePayPalOrderPayment' );
                $oPayment->setData( $aData );
                $aPayments[] = $oPayment;
            }
        }

        $this->setArray( $aPayments );
    }

    /**
     * Check if list has payment with defined status
     *
     * @param string $sStatus payment status
     *
     * @return bool
     */
    protected function _hasPaymentWithStatus( $sStatus )
    {
        $blHasStatus = false;
        $aPayments = $this->getArray();

        foreach ( $aPayments as $oPayment ){
            if( $sStatus == $oPayment->getStatus() ){
                $blHasStatus = true;
                break;
            }
        }

        return $blHasStatus;
    }

    /**
     * Check if list has pending payment
     *
     * @return bool
     */
    public function hasPendingPayment()
    {
        return $this->_hasPaymentWithStatus( 'Pending' );
    }

    /**
     * Check if list has failed payment
     *
     * @return bool
     */
    public function hasFailedPayment()
    {
        return $this->_hasPaymentWithStatus( 'Failed' );
    }

    /**
     * Returns not yet captured (remaining) order sum
     *
     * @param oePayPalOrderPayment $oPayment order payment
     *
     * @return oePayPalOrderPayment
     */
    public function addPayment( oePayPalOrderPayment $oPayment )
    {
        //order payment info
        if ( $this->getOrderId() ) {
            $oPayment->setOrderId( $this->getOrderId() );
            $oPayment->save();
        }

        $this->load( $this->getOrderId() );

        return $oPayment;
    }
}