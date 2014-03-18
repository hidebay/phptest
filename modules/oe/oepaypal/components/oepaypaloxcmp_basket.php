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
 * Basket component
 */
class oePayPalOxcmp_Basket extends oePayPalOxcmp_Basket_parent
{

    /**
     * Method returns URL to checkout products OR to show popup.
     *
     * @return string
     */
    public function actionExpressCheckoutFromDetailsPage()
    {
        $oValidator = $this->_getValidator();
        $oCurrentArticle = $this->_getCurrentArticle();
        $oValidator->setItemToValidate( $oCurrentArticle );
        $oValidator->setBasket( $this->getSession()->getBasket() );
        if( $oValidator->isArticleValid() ) {
            //Make express checkout
            $sRes = $this->actionAddToBasketAndGoToCheckout();
        } else {
            $sRes = $this->_getRedirectUrl();
            //redirect back to details page and display popup if amount is more than 0
            if ( $oCurrentArticle->getArticleAmount() > 0 ) {
                $sRes .= "&showECSPopup=1&ECSArticle={$this->_getSerializedCurrentArticleInfo()}&displayCartInPayPal=" . ( ( int ) $this->_getRequest()->getPostParameter( 'displayCartInPayPal' ) );
            }
        }

        return $sRes;
    }

    /**
     * Action method to add product to basket and return checkout URL.
     *
     * @return string
     */
    public function actionAddToBasketAndGoToCheckout()
    {
        parent::tobasket();
        return $this->_getExpressCheckoutUrl();
    }

    /**
     * Action method to return checkout URL.
     *
     * @return string
     */
    public function actionNotAddToBasketAndGoToCheckout()
    {
        return $this->_getExpressCheckoutUrl();
    }

    /**
     * Returns express checkout URL
     *
     * @return string
     */
    protected function _getExpressCheckoutUrl()
    {
        return 'oePayPalExpressCheckoutDispatcher&fnc=setExpressCheckout&displayCartInPayPal=' . ( int )$this->_getRequest()->getPostParameter( 'displayCartInPayPal' ) . '&oePayPalCancelURL=' . $this->_getPayPalCancelURL();
    }

    /**
     * Method returns serialized current article params.
     *
     * @return string
     */
    protected function _getSerializedCurrentArticleInfo()
    {
        $aProducts = $this->_getItems();
        $sCurrentArticleId = $this->getConfig()->getRequestParameter( 'aid' );
        $sSerializedParams = null;
        if ( !is_null( $aProducts[$sCurrentArticleId] ) ) {
            $sSerializedParams = serialize( $aProducts[$sCurrentArticleId] );
        }

        return $sSerializedParams;
    }

    /**
     * Method sets params for article and returns it's object.
     *
     * @return oePayPalArticleToExpressCheckoutCurrentItem
     */
    protected  function _getCurrentArticle()
    {
        $oCurrentItem = oxNew( 'oePayPalArticleToExpressCheckoutCurrentItem' );
        $sCurrentArticleId = $this->_getRequest()->getPostParameter( 'aid' );
        $aProducts = $this->_getItems();
        $aProductInfo = $aProducts[$sCurrentArticleId];
        $oCurrentItem->setArticleId( $sCurrentArticleId );
        $oCurrentItem->setSelectList( $aProductInfo['sel'] );
        $oCurrentItem->setPersistParam( $aProductInfo['persparam'] );
        $oCurrentItem->setArticleAmount( $aProductInfo['am'] );

        return $oCurrentItem;
    }

    /**
     * Method returns request object.
     *
     * @return oePayPalRequest
     */
    protected function _getRequest()
    {
        return oxNew( 'oePayPalRequest' );
    }

    /**
     * Method sets params for validator and returns it's object.
     *
     * @return oePayPalArticleToExpressCheckoutValidator
     */
    protected function _getValidator()
    {
        $oValidator = oxNew( 'oePayPalArticleToExpressCheckoutValidator' );

        return $oValidator;
    }

    /**
     * Changes oePayPalCancelURL by changing popup showing parameter.
     *
     * @return string
     */
    protected function _getPayPalCancelURL()
    {
        $sURL = $this->_getRequest()->getPostParameter( 'oePayPalCancelURL' );
        $sReplacedURL = str_replace( 'showECSPopup=1', 'showECSPopup=0', $sURL );

        return urlencode( $sReplacedURL );
    }
}