<?php
/**
 * epoq oxarticle module.
 *
 * @extend oxArticle
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxarticle extends az_epoq_rs_oxarticle_parent
{
    /**
     * Epoq recommendation id
     * @var string
     */
    protected $_az_epoq_sRecommendationId = null;

    /**
     * Returns the product recommendations for this product.
     * 
     * @return az_epoq_recommendation_list recommendations
     */
	public function azEpoqGetArticleRecommendations ()
	{
        $oEpoq = az_epoq::getInstance();
        
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return null;
        
    	return $oEpoq->getArticleRecommendations( $this );
	}

	/**
	 * Return the crossselling articles assigned to this article in the shop (ignoring epoq recommendations).
	 * This just returns the parent::getCrossSelling().
	 * 
	 * @return oxArticleList default crossselling articles
	 */
	public function azGetDefaultCrossSelling ()
	{
	    return parent::getCrossSelling();
	}

	/**
	 * Depending on the module settings, epoq article recommendations are included in or replace the shop
	 * crossselling articles list.
	 * 
	 * @extend getCrossSelling
	 * 
	 * @return oxArticleList crossselling articles (might be replaced or extended by epoq article recommendations)
	 */
    public function getCrossSelling ()
    {
        $iIntegrationMode = $this->getConfig()->getShopConfVar( 'az_epoq_iArtRecIntegr' );
        if ( !$iIntegrationMode )  // no integration
            return $this->azGetDefaultCrossSelling();
        
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return $this->azGetDefaultCrossSelling();
        
        $oEpoqCrosssellingArticles = $oEpoq->getArticleRecommendations( $this );
        switch ( $iIntegrationMode )
        {
            case 1 : // replace crosssellings
                return $oEpoq->getArticleRecommendations( $this );
            
            case 2 : // epoq crosssellings before shop crosssellings
                $oCrosssellingArticles = $this->azGetDefaultCrossSelling();
                if ( !$oCrosssellingArticles )
                    return $oCrosssellingArticles;
                foreach ( $oCrosssellingArticles as $sKey => $oArticle )
                {
                    $oEpoqCrosssellingArticles[ $sKey ] = $oArticle;
                }
                return $oEpoqCrosssellingArticles;
                
            case 3 : // epoq crosssellings after shop crosssellings
                $oCrosssellingArticles = $this->azGetDefaultCrossSelling();
                if ( !$oCrosssellingArticles )
                    return $oCrosssellingArticles;
                foreach ( $oEpoqCrosssellingArticles as $sKey => $oArticle )
                {
                    $oCrosssellingArticles[ $sKey ] = $oArticle;
                }
                return $oCrosssellingArticles;
        }
        return $this->azGetDefaultCrossSelling();
    }

	/**
	 * Return the default customer-also-bought-these-products articles for this article in the shop (ignoring epoq recommendations).
	 * This just returns the parent::getCustomerAlsoBoughtThisProducts().
	 * 
	 * @return oxArticleList default crossselling articles
	 */
	public function azGetDefaultCustomerAlsoBoughtThisProducts ()
	{
	    return parent::getCustomerAlsoBoughtThisProducts();
	}

    /**
	 * Depending on the module settings, epoq article recommendations are included in or replace the shop
	 * "customer-also-bought-these-products" articles list.
	 * 
	 * @extend getCustomerAlsoBoughtThisProducts
	 * 
	 * @return oxArticleList customer-also-bought-these-products articles (might be replaced or extended by epoq article recommendations)
	 */
    public function getCustomerAlsoBoughtThisProducts ( $iIntegrationMode = null )
    {
        if ( $iIntegrationMode === null ) {
            $iIntegrationMode = $this->getConfig()->getShopConfVar( 'az_epoq_iArtRecIntegr' );
        }
        if ( !$iIntegrationMode )  // no integration
            return $this->azGetDefaultCustomerAlsoBoughtThisProducts();
        
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return $this->azGetDefaultCustomerAlsoBoughtThisProducts();
        
        $oEpoqCrosssellingArticles = $oEpoq->getArticleRecommendations( $this );
        switch ( $iIntegrationMode )
        {
            case 4 : // replace customer-also-bought-these-products
                return $oEpoq->getArticleRecommendations( $this );
            
            case 5 : // epoq crosssellings before shop customer-also-bought-these-products
                $oCrosssellingArticles = $this->azGetDefaultCustomerAlsoBoughtThisProducts();
                if ( !$oCrosssellingArticles )
                    return $oCrosssellingArticles;
                foreach ( $oCrosssellingArticles as $sKey => $oArticle )
                {
                    $oEpoqCrosssellingArticles[ $sKey ] = $oArticle;
                }
                return $oEpoqCrosssellingArticles;
                
            case 6 : // epoq crosssellings after shop customer-also-bought-these-products
                $oCrosssellingArticles = $this->azGetDefaultCustomerAlsoBoughtThisProducts();
                if ( !$oCrosssellingArticles )
                    return $oCrosssellingArticles;
                foreach ( $oEpoqCrosssellingArticles as $sKey => $oArticle )
                {
                    $oCrosssellingArticles[ $sKey ] = $oArticle;
                }
                return $oCrosssellingArticles;
        }
        return $this->azGetDefaultCustomerAlsoBoughtThisProducts();
    }

    /**
     * Returns the recommendable flag.
     * 
     * @return boolean true if the product is recommendable, false if it is not recommendable
     */
    public function azEpoqIsRecommendable ()
    {
        $oDb = oxDb::getDb();
        $sQuery = "SELECT COUNT(*) FROM az_epoq_unrecommendable WHERE az_objectid = " . $oDb->quote( $this->getId() ) . " AND az_type = 'oxarticle'";
        return oxDb::getDb()->getOne( $sQuery ) == 0;
    }

    /**
     * Sets the recommendable flag.
     * 
     * @param boolean $blRecommendable set to true if the product should be recommendable or to false if it should not be recommendable
     * @return null
     */
    public function azEpoqSetRecommendable ( $blRecommendable )
    {
        // check if the recommendable flag changed:
        $blIsRecommendable = $this->azEpoqIsRecommendable();
        if ( $blIsRecommendable == $blRecommendable ) {
            return;
        }
        
        $oDb = oxDb::getDb();
        if ( $blRecommendable ) {
            $sQuery = "DELETE FROM az_epoq_unrecommendable WHERE az_objectid = " . $oDb->quote( $this->getId() ) . " AND az_type = 'oxarticle'";
            $oDb->execute( $sQuery );
        }
        else {
            $sQuery = "INSERT INTO az_epoq_unrecommendable (oxid,az_objectid,az_type) VALUES(" . $oDb->quote( oxUtilsObject::getInstance()->generateUId() ) . "," . $oDb->quote( $this->getId() ) . ",'oxarticle')";
            $oDb->execute( $sQuery );
        }
    }

    /**
     * Sets the recommendation id for this product (if it has been returned as a recommendation).
     * 
     * @param string $sRecommendationId recommendation id
     * @return null
     */
    public function azSetRecommendationId ( $sRecommendationId )
    {
        $this->_az_epoq_sRecommendationId = $sRecommendationId;
    }

    /**
     * Returns this product's recommendation id (if it has been returned as a recommendation).
     * 
     * @return string recommendation id
     */
    public function azGetRecommendationId ()
    {
        return $this->_az_epoq_sRecommendationId;
    }

    /**
     * Appends the recommendation id to the product link.
     * 
     * @param int     $iLang  language id
     * @param boolean $blMain main link flag
     * @return string product link
     */
    public function getLink ( $iLang = null, $blMain = false  )
    {
        $sUrl = parent::getLink( $iLang, $blMain );
        
        return $this->_azAppendRecommendationIdToUrl( $sUrl );
    }

    /**
     * Appends the recommendation id to the product main link.
     * 
     * @param int $iLang language id
     * @return string product main link
     */
    public function getMainLink ( $iLang = null )
    {
        $sUrl = parent::getMainLink( $iLang );
        
        return $this->_azAppendRecommendationIdToUrl( $sUrl );
    }

    /**
     * Appends the recommendation id to a url (as a param called 'azrec').
     * 
     * @param string $sUrl url
     * @return string url with appended recommendation id
     */
    protected function _azAppendRecommendationIdToUrl ( $sUrl )
    {
        $sRecommendationId = $this->azGetRecommendationId();
        
        if ( !$sRecommendationId || !$sUrl || strpos( $sUrl, 'azrec=' ) !== false ) {
            return $sUrl;
        }
        
        if ( strpos( $sUrl, '?' ) === false ) {
            return $sUrl . '?azrec=' . $sRecommendationId;
        }
        else {
            return $sUrl . '&azrec=' . $sRecommendationId;
        }
    }
}