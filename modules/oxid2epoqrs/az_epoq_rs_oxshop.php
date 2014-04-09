<?php
/**
 * epoq oxshop module.
 * This module doesn't override any standard methods, it just offers a method for getting the core epoq module object.
 *
 * @extend oxshop
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxshop extends az_epoq_rs_oxshop_parent
{
    /**
     * Returns a list of articles recommended by the epoq Recommendation Service for a specific article.
     *
     * @param oxArticle $oArticle article for which to get the recommendations
     * @return az_epoq_recommendation_list article list of recommended articles, or null if the module is not active or a problem occurred
     */
    public function azEpoqGetArticleRecommendations ( $oArticle )
    {
        if ( !is_object( $oArticle ) )
            return null;
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return null;
    	return $oEpoq->getArticleRecommendations( $oArticle );
    }

    /**
     * Returns an HTML snippet for including the epoq Recommendation Service web API javascript in the HTML header.
     * This is usually done automatically by the az_epoq_oxoutput module, but if you deactivate that module, you need to add
     * the snippet manually by using this function.
     *
     * @return string epoq header snippet, or an empty string if the module is not active
     */
    public function azEpoqGetHeaderSnippet ()
    {
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return '';
    	return $oEpoq->getHeaderSnippet( $oArticle );
    }

    /**
     * Returns an HTML snippet for including the epoq Recommendation Service web API javascript for sending article data to epoq.
     * This is usually done automatically by the az_epoq_oxoutput module, but if you deactivate that module, you need to add
     * the snippet manually by using this function. This snippet should be included on the product details page only.
     *
     * @return string epoq product details snippet, or an empty string if the module is not active
     */
    public function azEpoqGetDetailsSnippet ( $oArticle )
    {
        if ( !is_object( $oArticle ) )
            return '';
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return '';
    	return $oEpoq->getDetailsSnippet( $oArticle );
    }
}
