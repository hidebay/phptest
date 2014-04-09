<?php
/**
 * Adds the recommendable flag to the product catalog.
 * 
 * @extend az_epoq_catalog
 * 
 * @author Robert Rosendahl, anzido GmbH <entwicklung@anzido.com>
 * @copyright 2011 anzido GmbH
 */
class az_epoq_rs_az_epoq_catalog extends az_epoq_rs_az_epoq_catalog_parent
{
    /**
     * Adds the recommendable flag to the product data.
     * 
     * @extend _azGetArticleTagsFromArticleData
     * 
     * @param oxArticle $oArticle product
     * @param object    $oData    product data
     * @return product data
     */
    protected function _azGetArticleTagsFromArticleData( $oArticle, $oData )
    {
        $aTags = parent::_azGetArticleTagsFromArticleData( $oArticle, $oData );
        
        if ( is_array( $aTags ) ) {
            // add recommendable flag:
            $aTags[ 'e:recommendable' ] = $oArticle->azEpoqIsRecommendable() ? 'true' : 'false';
        }
        
        return $aTags;
    }
}