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
 * PayPal oxBasketItem class
 */
class oePayPalOxBasketItem extends oePayPalOxBasketItem_parent
{
    /**
     * Checks if validation should be skipped when getting article object.
     * This is done only when PayPal finalizes order.
     *
     * @param bool   $blCheckProduct       checks if product is buyable and visible
     * @param string $sProductId           product id
     * @param bool   $blDisableLazyLoading disable lazy loading
     *
     * @throws oxArticleException, oxNoArticleException exception
     *
     * @return oxArticle
     */
    public function getArticle( $blCheckProduct = true, $sProductId = null, $blDisableLazyLoading = false )
    {
        $sFncName = $this->getConfig()->getActiveView()->getFncName();

        if ( $sFncName == "doExpressCheckoutPayment" ) {
            // disabling product validation checking if finalizing PayPal payment (#4271)
            return parent::getArticle( false, $sProductId, $blDisableLazyLoading );
        }

        return parent::getArticle( $blCheckProduct, $sProductId, $blDisableLazyLoading );
    }
}
