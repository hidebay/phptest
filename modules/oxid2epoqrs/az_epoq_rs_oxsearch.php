<?php
/**
 * epoq oxsearch module.
 *
 * @extend oxSearch
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxsearch extends az_epoq_rs_oxsearch_parent
{
    /**
     * Notifies the epoq Recommendation Service when the user initiates a search in the shop.
     * The search result is not modified by this module.
     * 
     * @extend getSearchArticles
     * 
     * @param $sSearchParamForQuery search query text
     * @param $sInitialSearchCat search category
     * @param $sInitialSearchVendor search vendor
     * @param $sInitialSearchManufacturer search manufacturer
     * @param $sSortBy sort option
     * @return oxArticleList search results
     */
	public function getSearchArticles ( $sSearchParamForQuery = false, $sInitialSearchCat = false, $sInitialSearchVendor = false, $sInitialSearchManufacturer = false, $sSortBy = false )
	{
		$oArticleList = parent::getSearchArticles( $sSearchParamForQuery, $sInitialSearchCat, $sInitialSearchVendor, $sInitialSearchManufacturer, $sSortBy );
		
        $oEpoq = az_epoq::getInstance();
        if ( $oEpoq && $oEpoq->isActive() )
            $oEpoq->onSearch( $sSearchParamForQuery );
        
		return $oArticleList;
	}
}
