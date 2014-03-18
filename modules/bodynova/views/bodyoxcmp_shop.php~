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
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop PE
 * @version   SVN: $Id: oxcmp_shop.php 38190 2011-08-17 11:05:30Z linas.kukulskis $
 */

/**
 * Translarent shop manager (executed automatically), sets
 * registration information and current shop object.
 * @subpackage oxcmp
 */
class trooxcmp_shop extends trooxcmp_shop_parent
{
    /**
     * Marking object as component
     * @var bool
     */
    protected $_blIsComponent = true;
    
    protected $_aTopArticleList;

    /**
     * Executes parent::render() and returns active shop object.
     *
     * @return  object  $this->oActShop active shop object
     */
    public function render()
    {
        parent::render();

        $myConfig = $this->getConfig();
            $sShopLogo = $myConfig->getConfigParam( 'sShopLogo' );
            if ( $sShopLogo && file_exists( $myConfig->getImageDir().'/'.$sShopLogo ) ) {
                $oParentView = $this->getParent();
                $oParentView->setShopLogo( $sShopLogo );
            }

        // is shop active?
        $oShop = $myConfig->getActiveShop();
        if ( !$oShop->oxshops__oxactive->value && 'oxstart' != $myConfig->getActiveView()->getClassName() && !$this->isAdmin() ) {
            $oEx = oxNew( 'oxShopException' );
            $oEx->setMessage( 'EXCEPTION_SHOP_NOTACTIVE' );
            throw $oEx;
        }
        $this -> getTopArticleList();
        return $oShop;
    }
    
    public function getTopArticleList()
    {
        $oParentView = $this->getParent();
        if ( $this->_aTopArticleList === null ) {
            $this->_aTopArticleList = false;
            $oArtList = oxNew( 'oxarticlelist' );
            $oArtList->loadAktionArticles( 'OXTOPSTART' );
            if ( $oArtList->count() ) {
              $this->_aTopArticleList = $oArtList;
            }            
        }
        $oParentView->_aViewData['toparticlelist'] = $this->_aTopArticleList;
        #return $this->_aTopArticleList;
    }
}
