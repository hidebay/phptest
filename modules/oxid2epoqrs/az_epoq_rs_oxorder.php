<?php
/**
 * epoq oxorder module.
 *
 * @extend oxOrder
 *
 * @author anzido GmbH <info@anzido.com>
 * @copyright anzido GmbH
 * @link http://www.anzido.com
 */
class az_epoq_rs_oxorder extends az_epoq_rs_oxorder_parent
{
    /**
     * Notifies the epoq Recommendation Service when a user finished an order.
     * 
     * @extend finalizeOrder
     * 
     * @param $oBasket basket object
     * @param $oUser user object
     * @param $blRecalculatingOrder recalculation flag
     * @return int result code
     */
	public function finalizeOrder ( oxBasket $oBasket, $oUser, $blRecalculatingOrder = false )
	{
		$iResult = parent::finalizeOrder( $oBasket, $oUser, $blRecalculatingOrder );
		if ( $iResult == 1 )
		{
            $oEpoq = az_epoq::getInstance();
            if ( $oEpoq && $oEpoq->isActive() )
                $oEpoq->onOrder( $this );
		}
		return $iResult;
	}
}
