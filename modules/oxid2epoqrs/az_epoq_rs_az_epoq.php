<?php
/**
 * Adds the recommendable flag to the product data.
 * 
 * @extend az_epoq
 * 
 * @author Robert Rosendahl, anzido GmbH <entwicklung@anzido.com>
 * @copyright 2011 anzido GmbH
 */
class az_epoq_rs_az_epoq extends az_epoq_rs_az_epoq_parent
{
	/**
	 * Cached previous recommendations. This is used to remember the recommendation id if the user clicks on a recommendation.
	 * @var az_epoq_recommendation_list
	 */
	protected static $_oPreviousRecommendations = null;

	/**
	 * URL of the epoq Recommendation Service's REST API.
	 * @var string
	 */
    protected static $_sEpoqRsRestUrl = 'http://rs1.epoq.de/inbound-servletapi/';

	/**
	 * URL of the epoq Recommendation Service's web API.
	 * @var string
	 */
    protected static $_sEpoqRsWebUrl = 'http://rs.epoq.de/web-api/epoq.js';

	/**
	 * URL of the epoq Recommendation Service's SSL web API.
	 * @var string
	 */
    protected static $_sEpoqRsWebSecureUrl = 'https://rs.epoq.de/web-api/epoq.js';

    /**
     * PHP SoapClient instance used to connect to the EPOQ RS webservice.
     * @var SoapClient
     */
    protected $_oSoapClient;

    /**
     * Cached article recommendations (cached in memory during one script execution).
     * @var array
     */
    protected static $_aCachedArticleRecommendations = array();

    /**
     * Cached basket recommendations (cached in memory during one script execution).
     * @var array
     */
    protected static $_aCachedBasketRecommendations = array();

    /**
     * Cached user recommendations (cached in memory during one script execution).
     * @var array
     */
    protected static $_aCachedUserRecommendations = array();


    /**
     * Adds the recommendable flag to the product data.
     * 
     * @extend getArticleData
     * 
     * @param oxArticle $oArticle product
     * @return object stdClass object with product data
     */
    public function getArticleData ( $oArticle )
    {
        $oData = parent::getArticleData( $oArticle );
        
        // add recommendable flag:
        if ( $oData ) {
            $oData->blIsRecommendable = $oArticle->azEpoqIsRecommendable() ? 'true' : 'false';
        }
        
        return $oData;
    }

    /**
     * Returns a soap client instance for communication with the epoq Recommendation Service.
     * 
     * @return SoapClient soap client for the recommendation service
     */
    protected function _getSoapClient ()
    {
    	if ( !$this->_oSoapClient ) {
    		$this->_oSoapClient = new SoapClient( $this->_sEpoqRsWsdlUrl );
    	}
    	return $this->_oSoapClient;
    }

    /**
     * Returns true if the module for the epoq Recommendation Service is active and the tenant id has been set.
     * 
     * @return boolean true if the recommendation module is active, false otherwise
     */
    public function isActive ()
    {
    	if ( !$this->getTenantId() ) {
    		return false;
    	}
    	return $this->getConfig()->getShopConfVar( 'az_epoq_blActive' ) ? true : false;
    }

    /**
     * Returns true if the oxoutput module should be used, false if it should not be used (if the header snippets have been added manually).
     * If the oxoutput module should not be used, you need to set the config variable 'az_epoq_blNoOxOutput' to true (e.g. in the config.inc.php file).
     * 
     * @return boolean oxoutput usage flag
     */
    public function isUseOxOutput ()
    {
        return $this->getConfig()->getShopConfVar( 'az_epoq_blNoOxOutput' ) ? false : true;
    }

    /**
     * Returns the epoq Recommendation Service web api url.
     * 
     * @return string web api url
     */
    public function getWebApiUrl ()
    {
        if ( $this->getConfig()->isSsl() ) {
            return self::$_sEpoqRsWebSecureUrl;
        }
        else {
    	    return self::$_sEpoqRsWebUrl;
        }
    }

    /**
     * Returns the html head snippet for inclusion of the epoq Recommendation Service javascript.
     * 
     * @return string html head snippet
     */
    public function getHeaderSnippet ()
    {
        if ( $this->isAdmin() || !$this->isActive() ) {
            return '';
        }
        return '<script type="text/javascript" src="' . $this->getWebApiUrl() . '"></script>';
    }

    /**
     * Returns the html snippet for inclusion of the epoq Ajax Recommendation Service.
     *
     * @return string html snippet
     */
    public function getAjaxFooterSnippet ( $oProduct )
    {
        if ( $this->isAdmin() || !$this->isActive() ) {
            return '';
        }

        if ( $this->getConfig()->getShopConfVar( 'az_epoq_blAjax' ))
        {
            $iIntegrationMode = $this->getConfig()->getShopConfVar( 'az_epoq_iArtRecIntegr' );

            if ( $iIntegrationMode > 0 && $iIntegrationMode < 4)
            {
                return '<script type="text/javascript">' . "\n" . '$(document).ready(function() {
    $("#cross .js-articleBox.featuredList").load( "' . $this->getConfig()->getShopUrl() . 'index.php?cl=az_ajax&fnc=az_get_cross&anid=' . $oProduct->getId() . '");
});' . "\n</script>";
            }
            if ( $iIntegrationMode > 3 && $iIntegrationMode < 7)
            {
                return '<script type="text/javascript">' . "\n" . '$(document).ready(function() {
    $("#alsoBought").load( "' . $this->getConfig()->getShopUrl() . 'index.php?cl=az_ajax&fnc=az_get_also_bought&anid=' . $oProduct->getId() . '");
});' . "\n</script>";
            }
        }
    }

    /**
     * Returns the html head snippet for the details page (for inclusion of the epoq Recommendation Service javascript).
     * 
     * @param string $oProduct product of the details page
     * @return string html head snippet
     */
    public function getDetailsSnippet ( $oProduct )
    {
        if ( $this->isAdmin() || !is_object( $oProduct ) || !$this->isActive() ) {
            return '';
        }
        
        $oData = $this->getArticleData( $oProduct );
        if ( !is_object( $oData ) ) {
            return '';
        }
        
        $sSnippet = '<script type="text/javascript">';
        $sSnippet .= 'epoq_name="' . $this->quoteForString( $oData->sTitle ) . '";';
        if ( $oData->sShortDesc ) {
            $sSnippet .= 'epoq_description="' . $this->quoteForString( strip_tags( $oData->sShortDesc ) ) . '";';
        }
        $sSnippet .= 'epoq_price="' . $this->quoteForString( $oData->dPrice ) . '";';
        $sSnippet .= 'epoq_productId="' . $this->quoteForString( $oData->sArticleId ) . '";';
        if ( $oData->sParentId ) {
            $sSnippet .= 'epoq_variantOf="' . $this->quoteForString( $oData->sParentId ) . '";';
        }
        $sSnippet .= 'epoq_productUrl="' . $this->quoteForString( $oData->sLink ) . '";';
        $sSnippet .= 'epoq_inStock="' . $this->quoteForString( $oData->sInStock ) . '";';
        $sSnippet .= 'epoq_smallImage="' . $this->quoteForString( $oData->sThumbnailUrl ) . '";';
        if ( $oData->sPictureUrl ) {
            $sSnippet .= 'epoq_largeImage="' . $this->quoteForString( $oData->sPictureUrl ) . '";';
        }
        if ( is_array( $oData->aAttributes ) ) {
            foreach ( $oData->aAttributes as $sAttributeName => $sAttributeValue ) {
                $sSnippet .= 'epoq_attributes["' . $this->quoteForString( $sAttributeName ) . '"]="' . $this->quoteForString( $sAttributeValue ) . '";';
            }
        }
        $sSnippet .= 'epoq_tenantId="' . $this->quoteForString( $oData->sTenantId ) . '";';
        $sSnippet .= 'epoq_sessionId="' . $this->quoteForString( $oData->sSessionId ) . '";';
        if ( $oData->sCustomerId ) {
            $sSnippet .= 'epoq_customerId="' . $this->quoteForString( $oData->sCustomerId ) . '";';
        }
        
        if ( isset( $oData->blIsRecommendable ) ) {
            $sSnippet .= 'epoq_recommendable="' . $this->quoteForString( $oData->blIsRecommendable ) . '";';
        }
        
        $sRecommendationId = $this->getCurrentRecommendationId();
        if ( $sRecommendationId ) {
            $sSnippet .= 'epoq_recommendationId="' . $this->quoteForString( $sRecommendationId ) . '";';
        }
        
        $sSnippet .= 'epoq_viewItem();';
        $sSnippet .= '</script>';
        
        return $sSnippet;
    }

    /**
     * Returns the current recommendation id (from the request param 'azrec').
     * 
     * @return string recommendation id
     */
    public function getCurrentRecommendationId ()
    {
        return $this->getConfig()->getParameter( 'azrec' );
    }

    /**
     * Quotes a string for inclusion into a javascript string (enclosed in quotation marks).
     * This replaces all quotation marks in the string by apostrophes.
     * 
     * @param string $sString string
     * @return string quoted string
     */
    public function quoteForString ( $sString )
    {
        $sString = str_replace( array( '"', "\r", "\n" ), array( "'", '', '' ), $sString );
        $sString = strip_tags( $sString );
        return $sString;
    }

    /**
     * Fetches product recommendations from the epoq Recommendation Service.
     * 
     * @param oxArticle $oArticle product for which to fetch the recommendations
     * @return az_epoq_recommendation_list recommendations or null if no recommendations are available
     */
    public function getArticleRecommendations ( $oArticle )
    {
        if ( !$oArticle || !$oArticle->getId() ) {
    		return null;
        }
    	
        if ( isset( self::$_aCachedArticleRecommendations[ $oArticle->getId() ] ) ) {
            return self::$_aCachedArticleRecommendations[ $oArticle->getId() ];
    	}
    	
        $aParams = array( array( 'productId' => $oArticle->getId() ) );
        $iDemo = $this->_getNrDemoRecommendations();
        if ( $iDemo ) {
        	$aParams[] = array( 'demo' => $iDemo );
        }
        $aResult = $this->_request( 'getRecommendationsForItem', $aParams );
        $iMaxCount = $this->getConfig()->getShopConfVar( 'az_epoq_iMaxArtRec' );
        $oRecommendations = $this->_getRecommendationsFromRequestResult( $aResult, $iMaxCount );
        
        self::$_aCachedArticleRecommendations[ $oArticle->getId() ] = $oRecommendations;
        return $oRecommendations;
    }

    /**
     * Fetches basket recommendations from the epoq Recommendation Service.
     * 
     * @param oxBasket $oBasket basket for which to fetch the recommendations
     * @return az_epoq_recommendation_list recommendations or null if no recommendations are available
     */
    public function getBasketRecommendations ( $oBasket )
    {
        $aParams = $this->_getBasketRequestParams( $oBasket );
        
        // build a cache key for this basket to fetch any subsequent requests for this basket from memory (instead of a new soap call):
        $sCacheKey = '#';
        foreach ( $aParams as $aParam ) {
            foreach ( $aParam as $sParam => $sValue ) {
                $sCacheKey .= $sValue . '#';
            }
        }
        $sCacheKey = md5( $sCacheKey );
    	if ( isset( self::$_aCachedBasketRecommendations[ $sCacheKey ] ) ) {
    	    return self::$_aCachedBasketRecommendations[ $sCacheKey ];
    	}
        
        $aParams[] = array( 'updateCart' => null );
        $iDemo = $this->_getNrDemoRecommendations();
        if ( $iDemo ) {
        	$aParams[] = array( 'demo' => $iDemo );
        }
        $aResult = $this->_request( 'getRecommendationsForCart', $aParams );
        $iMaxCount = $this->getConfig()->getShopConfVar( 'az_epoq_iMaxBskRec' );
        $oRecommendations = $this->_getRecommendationsFromRequestResult( $aResult, $iMaxCount );
        
        self::$_aCachedBasketRecommendations[ $sCacheKey ] = $oRecommendations;
        return $oRecommendations;
    }

    /**
     * Fetches user recommendations for the current user from the epoq Recommendation Service.
     * 
     * @return az_epoq_recommendation_list recommendations or null if no recommendations are available
     */
    public function getUserRecommendations ()
    {
        $sCustomerId = $this->_getCustomerId();
        if ( ! $sCustomerId ) {
            return null;
        }
        
    	if ( isset( self::$_aCachedUserRecommendations[ $sCustomerId ] ) ) {
    	    return self::$_aCachedUserRecommendations[ $sCustomerId ];
    	}
        
        $aParams = array();
        $iDemo = $this->_getNrDemoRecommendations();
        if ( $iDemo ) {
        	$aParams[] = array( 'demo' => $iDemo );
        }
        $aResult = $this->_request( 'getRecommendationsForCustomer', $aParams );
        $iMaxCount = $this->getConfig()->getShopConfVar( 'az_epoq_iMaxUsrRec' );
        
        $oRecommendations = $this->_getRecommendationsFromRequestResult( $aResult, $iMaxCount );
        
        self::$_aCachedUserRecommendations[ $sCustomerId ] = $oRecommendations;
        return $oRecommendations;
    }

    /**
     * Returns previous recommendations (from a previous call to the recommendation service).
     * 
     * @return az_epoq_recommendation_list previous recommendations or null if none are available
     */
    public function getPreviousRecommendations ()
    {
    	if ( !self::$_oPreviousRecommendations ) {
    		$oSession = $this->getSession();
    		self::$_oPreviousRecommendations = $oSession->getVar( 'az_epoq_oRecommendations' );
    		$oSession->deleteVar( 'az_epoq_oRecommendations' );
    		if ( self::$_oPreviousRecommendations ) {
    		    self::$_oPreviousRecommendations = unserialize( self::$_oPreviousRecommendations );
    		}
    	}
        return self::$_oPreviousRecommendations;
    }

    /**
     * Called when the basket contents might have changed (sends an 'updateCart' request to the epoq Recommendation Service).
     * 
     * @param oxBasket $oBasket basket
     * @return null
     */
    public function onBasketChanged ( $oBasket )
    {
        $aBasketChanges = $this->_getBasketChanges( $oBasket );
        if ( !$aBasketChanges ) {
            return;
        }
        
        $this->getSession()->setVar( 'az_epoq_aBasket', $this->_getBasketData( $oBasket ) );
        
        $aParams = $this->_getBasketRequestParams( $oBasket );
        
        if ( !is_array( $aParams ) || count( $aParams ) == 0 ) {
            return;
        }
        
        // if articles have been added, then try to get a recommendation id for them:
        if ( is_array( $aBasketChanges ) ) {
            $oRecommendations = $this->getPreviousRecommendations();
            foreach ( $aBasketChanges as $sArticleId ) {
                if ( $oRecommendations && $sArticleId && $oRecommendations->azHasArticleId( $sArticleId ) ) {
                    $aParams[] = array( 'recommendationId' => $oRecommendations->azGetRecommendationId() );
                    break;
                }
            }
        }
        
        $this->_request( 'updateCart', $aParams );
    }

    /**
     * Called when an order has been completed (sends a 'processCart' request to the epoq Recommendation Service).
     * 
     * @param oxOrder $oOrder order
     * @return null
     */
    public function onOrder ( $oOrder )
    {
        $aParams = $this->_getOrderRequestParams( $oOrder );
        $this->_request( 'processCart', $aParams );
        
        //TODO customer profile service disabled until privacy issue has been discussed:
        //$this->sendCustomerProfile();
    }

    /**
     * Called when a search has been performed in the shop (sends a 'search' request to the epoq Recommendation Service).
     * 
     * @param string $sSearchParam search item
     * @return null
     */
    public function onSearch ( $sSearchParam )
    {
        if ( !$sSearchParam ) {
            return;
        }
        $aParams = array( array( 'query' => $sSearchParam ) );
        $this->_request( 'search', $aParams );
    }

    /**
     * Returns the recommended products from a recommendation response of the epoq Recommendation Service.
     * 
     * @param array $aResult   result array
     * @param int   $iMaxCount max number of recommendations
     * @return az_epoq_recommendation_list recommendations
     */
	protected function _getRecommendationsFromRequestResult ( $aResult, $iMaxCount = null )
	{
        if ( !is_array( $aResult ) || !$aResult['recommendationId'] || !is_array( $aResult['productId'] ) ) {
            return null;
        }
        
        $oRecommendations = oxNew( 'az_epoq_recommendation_list' );
        $sRecommendationId = $aResult['recommendationId'];
        if ( is_array( $sRecommendationId) ) {
            $sRecommendationId = $sRecommendationId[ 0 ];
        }
        if ( !$sRecommendationId ) {
            return null;
        }
        $oRecommendations->azSetRecommendationId( $sRecommendationId );
        $aArticleIds = $aResult['productId'];
        if ( $iMaxCount ) {
        	$aArticleIds = array_slice( $aArticleIds, 0, $iMaxCount );
        }
        $oRecommendations->azSetArticleIds( $aArticleIds );
        
        // fetch previous recommendations from session before overwriting them:
        $this->getPreviousRecommendations();
        
        $this->getSession()->setVar( 'az_epoq_oRecommendations', serialize( $oRecommendations ) );
        
        return $oRecommendations;
	}

	/**
	 * Returns the number of demo recommendations to return (if they have been activated in the admin settings).
	 * 
	 * @return int number of demo recommendations
	 */
	protected function _getNrDemoRecommendations ()
	{
		$oConfig = $this->getConfig();
		if ( !$oConfig->getShopConfVar( 'az_epoq_blDemoRec' ) ) {
			return 0;
		}
		
    	return $oConfig->getShopConfVar( 'az_epoq_iDemoRec' );
	}

	/**
	 * Returns the request params for a basket object.
	 * 
	 * @param oxBasket $oBasket basket
	 * @return array basket request params
	 */
    protected function _getBasketRequestParams ( $oBasket )
    {
        if ( !is_object( $oBasket ) ) {
            return null;
        }
        
        $aArticles = array();
        $aVariantOfs = array();
        $aAmounts = array();
        $aPrices = array();
        
        foreach ( $oBasket->getContents() as $oBasketItem ) {
            $sArticleId = $oBasketItem->getProductId();
            $oArticle = oxNewArticle( $sArticleId );
        	if ( !$oArticle->load( $sArticleId ) ) {
        		continue;
        	}
        	$oPrice = $oBasketItem->getUnitPrice();
        	if ( !$oPrice ) {
            	continue;
        	}
            $aArticles[] = $sArticleId;
            $aVariantOfs[] = $oArticle->oxarticles__oxparentid->value;
            $aAmounts[] = $oBasketItem->getAmount();
            $aPrices[] = $oPrice->getBruttoPrice();
        }
        
        $aParams = array();
        foreach ( $aArticles as $sArticleId ) {
            $aParams[] = array( 'productId' => $sArticleId );
        }
        foreach ( $aVariantOfs as $sVariantOf ) {
            $aParams[] = array( 'variantOf' => $sVariantOf );
        }
        foreach ( $aAmounts as $dAmount ) {
            $aParams[] = array( 'quantity' => $dAmount );
        }
        foreach ( $aPrices as $dPrice ) {
            $aParams[] = array( 'unitPrice' => $dPrice );
        }
        
        return $aParams;
    }

    /**
     * Returns the request params for an order.
     * 
     * @param oxOrder $oOrder order
     * @return array order request params
     */
    protected function _getOrderRequestParams ( $oOrder )
    {
        $aArticles = array();
        $aVariantOfs = array();
        $aAmounts = array();
        $aPrices = array();
        
        foreach ( $oOrder->getOrderArticles() as $oOrderArticle ) {
        	if ( !$oOrderArticle->oxorderarticles__oxartid->value )
        		continue;
            $aArticles[] = $oOrderArticle->oxorderarticles__oxartid->value;
            $oArticle = oxNewArticle( $oOrderArticle->oxorderarticles__oxartid->value );
            $oArticle->load( $oOrderArticle->oxorderarticles__oxartid->value );
            $aVariantOfs[] = $oArticle->oxarticles__oxparentid->value;
            $aAmounts[] = $oOrderArticle->oxorderarticles__oxamount->value;
            $aPrices[] = (double)$oOrderArticle->oxorderarticles__oxbrutprice->value / (double)$oOrderArticle->oxorderarticles__oxamount->value;
        }
        
        $aParams = array();
        foreach ( $aArticles as $sArticleId ) {
            $aParams[] = array( 'productId' => $sArticleId );
        }
        foreach ( $aVariantOfs as $sVariantOf ) {
            $aParams[] = array( 'variantOf' => $sVariantOf );
        }
        foreach ( $aAmounts as $dAmount ) {
            $aParams[] = array( 'quantity' => $dAmount );
        }
        foreach ( $aPrices as $dPrice ) {
            $aParams[] = array( 'unitPrice' => $dPrice );
        }
        
        return $aParams;
    }

    /**
     * Returns basket data (for comparing baskets to determine changes).
     * 
     * @param oxBasket $oBasket basket
     * @return array basket data
     */
    protected function _getBasketData ( $oBasket )
    {
        if ( !( $oBasket instanceof oxBasket ) ) {
            return array();
        }
        
        $aBasketContents = $oBasket->getContents();
        if ( !is_array( $aBasketContents ) ) {
            return array();
        }
        
        $aBasketData = array();
        foreach ( $aBasketContents as $sItemKey => $oBasketItem ) {
            $dAmount = $oBasketItem->getAmount();
            if ( $dAmount > 0 ) {
                $aBasketData[ $sItemKey ] = array( $dAmount, $oBasketItem->getProductId() );
            }
        }
        
        return $aBasketData;
    }

    /**
     * Returns basket changes since the last request.
     * 
     * @param oxBasket $oBasket current basket
     * @return array changes of the current basket compared to the basket from the last request
     */
    protected function _getBasketChanges ( $oBasket )
    {
        $aBasketData = $this->_getBasketData( $oBasket );
        
        $aOldBasketData = $this->getSession()->getVar( 'az_epoq_aBasket' );
        if ( !is_array( $aOldBasketData ) ) {
            $aOldBasketData = array();
        }
        
        // check for added or changed articles:
        $aChanges = array();
        foreach ( $aBasketData as $sItemKey => $aItem ) {
            if ( !is_array( $aItem ) || count( $aItem ) < 2 ) {
                continue;
            }
            
            $dAmount = $aItem[ 0 ];
            $sArticleId = $aItem[ 1 ];
            
            if ( !isset( $aOldBasketData[ $sItemKey ] ) ) {
                $aChanges[] = $sArticleId;
            }
            else {
                $aOldItem = $aOldBasketData[ $sItemKey ];
                if ( !is_array( $aOldItem ) || count( $aOldItem ) < 2 ) {
                    $aChanges[] = $sArticleId;
                }
                else {
                    $dOldAmount = $aOldItem[ 0 ];
                    $sOldArticleId = $aOldItem[ 1 ];
                    
                    if ( $dOldAmount != $dAmount || $sOldArticleId != $sArticleId ) {
                        $aChanges[] = $sArticleId;
                    }
                }
            }
        }
        $aChanges = array_unique( $aChanges );
        
        // if articles have been added or changed, then return their ids:
        if ( count( $aChanges ) > 0 ) {
            return $aChanges;
        }
        
        // if no articles have been added or changed, check for removed articles:
        foreach ( $aOldBasketData as $sOldItemKey => $aOldItem ) {
            if ( !is_array( $aOldItem ) || count( $aOldItem ) < 2 ) {
                continue;
            }
            
            $dOldAmount = $aOldItem[ 0 ];
            $sOldArticleId = $aOldItem[ 1 ];
            
            if ( !isset( $aBasketData[ $sOldItemKey ] ) ) {
                return true;
            }
            else {
                $aNewItem = $aBasketData[ $sOldItemKey ];
                if ( !is_array( $aNewItem ) || count( $aNewItem ) < 2 ) {
                    return true;
                }
                else {
                    $dNewAmount = $aNewItem[ 0 ];
                    $sNewArticleId = $aNewItem[ 1 ];
                    
                    if ( $dNewAmount != $dOldAmount || $sNewArticleId != $sOldArticleId ) {
                        return true;
                    }
                }
            }
        }
        
        // there are no changes in the basket:
        return false;
    }

    /**
     * Returnst a user's gender (m/f) by checking the user's salutation.
     * 
     * @param oxUser $oUser user
     * @return string user gender or null if the gender cannot be determined from the saluation
     */
    protected function _getUserGender ( $oUser )
    {
        if ( !is_object( $oUser ) || !$oUser->oxuser__oxsal->value ) {
            return null;
        }
        
        $oLang = oxLang::getInstance();
        foreach ( $oLang->getLanguageIds() as $iLang ) {
            $sSalutationMale = $oLang->translateString( 'USER_MR', $iLang );
            if ( $sSalutationMale && $oUser->oxuser__oxsal->value == $sSalutationMale ) {
                return 'm';
            }
            $sSalutationFemale = $oLang->translateString( 'USER_MRS', $iLang );
            if ( $sSalutationFemale && $oUser->oxuser__oxsal->value == $sSalutationFemale ) {
                return 'f';
            }
        }
        
        return null;
    }

    /**
     * Returns a user's phone number.
     * 
     * @param oxUser $oUser user
     * @return string user's phone number or null if the phone number cannot be determined
     */
    protected function _getUserPhone ( $oUser )
    {
        if ( !is_object( $oUser ) ) {
            return null;
        }
        if ( $oUser->oxuser__oxfon->value ) {
            return $oUser->oxuser__oxfon->value;
        }
        if ( $oUser->oxuser__oxmobfon->value ) {
            return $oUser->oxuser__oxmobfon->value;
        }
        if ( $oUser->oxuser__oxprivfon->value ) {
            return $oUser->oxuser__oxprivfon->value;
        }
        
        return null;
    }

    /**
     * Returns a user's billing country iso alpha 2 code.
     * 
     * @param oxUser $oUser user
     * @return string user country's iso alpha 2 code or null if it cannot be determined
     */
    protected function _getUserCountry ( $oUser )
    {
        if ( !is_object( $oUser ) || !$oUser->oxuser__oxcountryid->value ) {
            return null;
        }
        $oCountry = oxNew( 'oxcountry' );
        if ( !$oCountry->load( $oUser->oxuser__oxcountryid->value ) ) {
            return null;
        }
        
        return $oCountry->oxcountry__oxisoalpha2->value;
    }

    /**
     * Sends a user's customer profile to the epoq Recommendation Service.
     * Note: this method is currently never called because it has been deactivated for privacy reasons
     * 
     * @param oxUser $oUser user
     * @return null
     */
    public function sendCustomerProfile ( $oUser = null )
    {
        if ( !is_object( $oUser ) ) {
            $oUser = $this->getUser();
        }
        
        $aData = array();
        $aData[ 'firstName' ] = $oUser->oxuser__oxfname->value;
        $aData[ 'lastName' ] = $oUser->oxuser__oxlname->value;
        $aData[ 'sex' ] = $this->_getUserGender( $oUser );
        $aData[ 'title' ] = $oUser->oxuser__oxsal->value;
        $aData[ 'street' ] = $oUser->oxuser__oxstreet->value;
        $aData[ 'house' ] = $oUser->oxuser__oxstreetnr->value;
        $aData[ 'city' ] = $oUser->oxuser__oxcity->value;
        $aData[ 'zip' ] = $oUser->oxuser__oxzip->value;
        $aData[ 'phone' ] = $this->_getUserPhone( $oUser );
        $aData[ 'country' ] = $this->_getUserCountry( $oUser );
        
        $this->_request( 'setAddress', $aData, true );
    }

    /**
     * Sends a request to the epoq Recommendation Service web api.
     * 
     * @param string  $sFunction     web api function
     * @param array   $aParams       function call parameters
     * @param boolean $blPostRequest true if a POST request should be made, false for a GET request
     * @return array response values or null if the request failed
     */
    public function _request ( $sFunction, $aParams = null, $blPostRequest = false )
    {
        $sRequestUrl = $this->_getRequestUrl( $sFunction, $aParams, $blPostRequest );
        if ( !$sRequestUrl ) {
            return null;
        }
        if ( $blPostRequest ) {
            $sResult = $this->_performRequest( $sRequestUrl, $aParams );
        }
        else {
            $sResult = $this->_performRequest( $sRequestUrl );
        }
        
        return $this->_parseRequestResult( $sResult );
    }

    /**
     * Returns the standard request params for an epoq Recommendation Service request (e.g. tenant id and session id).
     * 
     * @return array standard request params
     */
    protected function _getStandardRequestParams ()
    {
        $aStandardParams = array();
        
        $sTenantId = $this->getTenantId();
        if ( $sTenantId ) {
            $aStandardParams[ 'tenantId' ] = $sTenantId;
        }
        
        $sSessionId = $this->_getSessionId();
        if ( $sSessionId ) {
            $aStandardParams[ 'sessionId' ] = $sSessionId;
        }
        
        $sCustomerId = $this->_getCustomerId();
        if ( $sCustomerId ) {
            $aStandardParams[ 'customerId' ] = $sCustomerId;
        }
        
        return $aStandardParams;
    }

    /**
     * Returns the url for an epoq Recommendation Service web api request.
     * 
     * @param string  $sFunction     web api function
     * @param array   $aParams       function call parameters
     * @param boolean $blPostRequest true if a POST request should be made, false for a GET request
     * @return string request url or null if the request data is invalid (e.g. function is empty)
     */
    protected function _getRequestUrl ( $sFunction, $aParams = null, $blPostRequest = false )
    {
        if ( !$sFunction ) {
            return null;
        }
        
        $oConfig = $this->getConfig();
        $sRequestUrl = self::$_sEpoqRsRestUrl;
        $aStandardParams = $this->_getStandardRequestParams();
        if ( !$sRequestUrl || !$aStandardParams['tenantId'] || !$aStandardParams['sessionId'] ) {
            return null;
        }
        
        if ( $sRequestUrl[ strlen($sRequestUrl) - 1 ] != '/' ) {
            $sRequestUrl .= '/';
        }
        $sRequestUrl .= $sFunction . '?tenantId=' . $aStandardParams['tenantId'] . '&';
        
        // POST requests don't include additional data in the URL:
        if ( $blPostRequest ) {
            return $sRequestUrl;
        }
        
        foreach ( $aStandardParams as $sParam => $sValue ) {
            if ( $sParam == 'tenantId' ) {
                continue;  // already included in URL
            }
            $sRequestUrl .= $sParam . '=' . $sValue . '&';
        }
        $sRequestUrl .= 'widgetTheme=xml&';
        if ( is_array( $aParams ) ) {
            foreach ( $aParams as $aParam ) {
                foreach ( $aParam as $sKey => $sValue ) {
                    if ( !$sKey ) {
                        continue;
                    }
                    $sRequestUrl .= $sKey;
                    if ( $sValue !== null ) {
                        $sRequestUrl .= '=' . $sValue;
                    }
                    $sRequestUrl .= '&';
                }
            }
        }
        
        return $sRequestUrl;
    }

    /**
     * Sends a request to the epoq Recommendation Service web api (using cURL).
     * 
     * @param string $sRequestUrl request url
     * @param array  $aPostData   POST data (if a POST request should be sent)
     * @return array response values or null if the request failed
     */
    protected function _performRequest ( $sRequestUrl, $aPostData = null )
    {
        if ( !$sRequestUrl ) {
            return null;
        }
        
        $iTimeout = (int)$this->getConfig()->getShopConfVar( 'az_epoq_iTimeout' );
        if ( !$iTimeout ) {
            $iTimeout = 30;
        }
        
        $oCurl = curl_init( $sRequestUrl );
        curl_setopt( $oCurl, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $oCurl, CURLOPT_FAILONERROR, true );
        curl_setopt( $oCurl, CURLOPT_TIMEOUT, $iTimeout );
        curl_setopt( $oCurl, CURLOPT_CONNECTTIMEOUT, $iTimeout );
        
        // POST request:
        if ( is_array( $aPostData ) ) {
            $aStandardParams = $this->_getStandardRequestParams();
            foreach ( $aStandardParams as $sParam => $sValue ) {
                if ( !$aPostData[ $sParam ] ) {
                    $aPostData[ $sParam ] = $sValue;
                }
            }
            curl_setopt( $oCurl, CURLOPT_POST, true );
            curl_setopt( $oCurl, CURLOPT_POSTFIELDS, $aPostData );
        }
        $sResult = curl_exec( $oCurl );
        curl_close( $oCurl );
        
        //error_log( "\n[" . date('Y-m-d H:i:s') . "] REQUEST:\n  URL: " . $sRequestUrl . ( is_array($aPostData) ? "\n  POST: " . var_export($aPostData,true) : "" ) . "\n", 3, getShopBasePath().'az_epoq.log' );
        //error_log( "\n[" . date('Y-m-d H:i:s') . "] REQUEST:\n  URL: " . $sRequestUrl . ( is_array($aPostData) ? "\n  POST: " . var_export($aPostData,true) : "" ) . "\n  RESULT: " . $sResult . "\n", 3, getShopBasePath().'az_epoq.log' );
        
        return $sResult;
    }

    /**
     * Parses the response values from an epoq Recommendation Service web api response.
     * 
     * @param string $sResult web api response string
     * @return array response values or null if the response is invalid (e.g. if the request failed)
     */
    protected function _parseRequestResult ( $sResult )
    {
        if ( !is_string( $sResult ) || substr_compare( '<?XML', $sResult, 0, 5, true ) !== 0 ) {
            return null;
        }
        
        $oParser = xml_parser_create();
        xml_parser_set_option( $oParser, XML_OPTION_CASE_FOLDING, 0 );
        xml_parser_set_option( $oParser, XML_OPTION_SKIP_WHITE, 1 );
        xml_parse_into_struct( $oParser, $sResult, $aXmlData );
        $iXmlError = xml_get_error_code( $oParser );
        xml_parser_free( $oParser );
        
        if ( $iXmlError ) {
            return null;
        }
        
        $aXmlValues = array();
        foreach ( $aXmlData as $aXmlTag ) {
            if ( $aXmlTag['type'] != 'complete' ) {
                continue;
            }
            $sTag = $aXmlTag['tag'];
            if ( !isset( $aXmlValues[ $sTag ] ) ) {
                $aXmlValues[ $sTag ] = array( $aXmlTag['value'] );
            }
            else {
                $aXmlValues[ $sTag ][] = $aXmlTag['value'];
            }
        }
        
        return $aXmlValues;
    }
}