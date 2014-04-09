<?php
/**
 * Reports basket changes to the epoq Recommendation Service.
 *
 * @extend oxBasket
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxbasket extends az_epoq_rs_oxbasket_parent
{
    /**
     * Returns recommendations for this basket.
     * 
     * @return az_epoq_recommendation_list basket recommendations or null if there are no recommendations
     */
	public function azEpoqGetBasketRecommendations ()
    {
        $oEpoq = az_epoq::getInstance();
        if ( !$oEpoq || !$oEpoq->isActive() ) {
        	return null;
        }
    	return $oEpoq->getBasketRecommendations( $this );
    }

    /**
     * Notifies the epoq Recommendation Service about changes in the basket.
     * 
     * @extend calculateBasket
     * 
     * @param boolean $blForceUpdate set this parameter to TRUE to force basket recalculation
     * 
     * @return null
     */
    public function calculateBasket ( $blForceUpdate = false )
    {
        parent::calculateBasket( $blForceUpdate );
        
        $oEpoq = az_epoq::getInstance();
        if ( $oEpoq && $oEpoq->isActive() ) {
            $oEpoq->onBasketChanged( $this );
        }
    }

    /**
     * Notifies the epoq Recommendation Service about changes in the basket.
     * 
     * @extend deleteBasket
     * 
     * @return null
     */
    public function deleteBasket ()
	{
		parent::deleteBasket();
		
        $oEpoq = az_epoq::getInstance();
		if ( $oEpoq && $oEpoq->isActive() ) {
			$oEpoq->onBasketChanged( $this );
		}
	}
}
