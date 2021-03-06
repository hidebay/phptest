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
 * PayPal order payment comment list class
 */
class oePayPalOrderPaymentCommentList extends oePayPalList
{
    /**
     * Data base gateway
     *
     * @var oePayPalPayPalDbGateway
     */
    protected $_oDbGateway = null;


    protected $_sPaymentId = null;

    public function setPaymentId( $sPaymentId )
    {
        $this->_sPaymentId = $sPaymentId;
    }

    public function getPaymentId()
    {
        return $this->_sPaymentId;
    }

    protected function _getDbGateway() {
        if ( is_null( $this->_oDbGateway ) ) {
            $this->_setDbGateway( oxNew( 'oePayPalOrderPaymentCommentDbGateway' ) );
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
     * @param string $sPaymentId order id
     *
     */
    public function load( $sPaymentId )
    {
        $this->setPaymentId( $sPaymentId );

        $aComments = array();
        $aCommentsData = $this->_getDbGateway()->getList( $this->getPaymentId() ) ;
        if( is_array( $aCommentsData ) && count( $aCommentsData ) ){
            $aComments = array();
            foreach ($aCommentsData as $aData ){
                $oComment = oxNew( 'oePayPalOrderPaymentComment' );
                $oComment->setData( $aData );
                $aComments[] = $oComment;
            }
        }

        $this->setArray( $aComments );
    }

    /**
     * Add comment
     */
    public function addComment( $oComment )
    {
        $oComment->setPaymentId( $this->getPaymentId() );
        $oComment->save();

        $this->load( $this->getPaymentId() );

        return $oComment;
    }
}