<?php
/**
 * epoq oxuser module.
 *
 * @extend oxUser
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxuser extends az_epoq_rs_oxuser_parent
{
    /**
     * Returns epoq article recommendations for this user.
     * 
     * @return az_epoq_recommendation_list
     */
    public function azEpoqGetUserRecommendations ()
    {
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() )
        	return null;
    	return $oEpoq->getUserRecommendations();
    }
}
