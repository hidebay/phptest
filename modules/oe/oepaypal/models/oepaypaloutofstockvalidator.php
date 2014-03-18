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
 * PayPal out of stock validator class
 */
class oePayPalOutOfStockValidator {

    /**
     * Basket object
     *
     * @var mixed
     */
    private $_oBasket;

    /**
     * Level of empty stock level
     *
     * @var integer
     */
    private $_iEmptyStockLevel;

    /**
     * @param mixed $iEmptyStockLevel
     */
    public function setEmptyStockLevel( $iEmptyStockLevel )
    {
        $this->_iEmptyStockLevel = $iEmptyStockLevel;
    }

    /**
     * @return mixed
     */
    public function getEmptyStockLevel()
    {
        return $this->_iEmptyStockLevel;
    }

    /**
     * @param mixed $oBasket
     */
    public function setBasket( $oBasket )
    {
        $this->_oBasket = $oBasket;
    }

    /**
     * @return mixed
     */
    public function getBasket()
    {
        return $this->_oBasket;
    }

    /**
     * Checks if basket has Articles that are out of stock
     */
    public function hasOutOfStockArticles()
    {
        $blResult = false;

        $aBasketContents = $this->getBasket()->getContents();

        foreach ( $aBasketContents as $oBasketItem ) {
                $oArticle = $oBasketItem->getArticle();
                if ( ( $oArticle->getStockAmount() - $oBasketItem->getAmount() ) < $this->getEmptyStockLevel() ) {
                    $blResult = true;
                    break;
                }
        }

        return $blResult;
    }

}