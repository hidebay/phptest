<?php

class trooxorder extends trooxorder_parent
{
    public function finalizeOrder( oxBasket $oBasket, $oUser, $blRecalculatingOrder = false )
    {
        // check if this order is already stored
        $sGetChallenge = oxSession::getVar( 'sess_challenge' );
        if ( $this->_checkOrderExist( $sGetChallenge ) ) {
            oxUtils::getInstance()->logger( 'BLOCKER' );
            // we might use this later, this means that somebody klicked like mad on order button
            return self::ORDER_STATE_ORDEREXISTS;
        }

        // if not recalculating order, use sess_challenge id, else leave old order id
        if ( !$blRecalculatingOrder ) {
            // use this ID
            $this->setId( $sGetChallenge );

            // validating various order/basket parameters before finalizing
            if ( $iOrderState = $this->validateOrder( $oBasket, $oUser ) ) {
                return $iOrderState;
            }
        }

        // copies user info
        $this->_setUser( $oUser );

        // copies basket info
        $this->_loadFromBasket( $oBasket );

        // payment information
        $oUserPayment = $this->_setPayment( $oBasket->getPaymentId() );

        // set folder information, if order is new
        // #M575 in recalcualting order case folder must be the same as it was
        if ( !$blRecalculatingOrder ) {
            $this->_setFolder();
        }

        //saving all order data to DB
        $this->save();

        // executing payment (on failure deletes order and returns error code)
        // in case when recalcualting order, payment execution is skipped
        if ( !$blRecalculatingOrder ) {
            $blRet = $this->_executePayment( $oBasket, $oUserPayment );
            if ( $blRet !== true ) {
                return $blRet;
            }
        }

        // executing TS protection
        if ( !$blRecalculatingOrder && $oBasket->getTsProductId()) {
            $blRet = $this->_executeTsProtection( $oBasket );
            if ( $blRet !== true ) {
                return $blRet;
            }
        }

        // deleting remark info only when order is finished
        oxSession::deleteVar( 'ordrem' );
        oxSession::deleteVar( 'stsprotection' );

        // updating order trans status (success status)
        $this->_setOrderStatus( 'OK' );

        // store orderid
        $oBasket->setOrderId( $this->getId() );

        // updating wish lists
        $this->_updateWishlist( $oBasket->getContents(), $oUser );

        // updating users notice list
        $this->_updateNoticeList( $oBasket->getContents(), $oUser );

        // marking vouchers as used and sets them to $this->_aVoucherList (will be used in order email)
        // skipping this action in case of order recalculation
        if ( !$blRecalculatingOrder ) {
            $this->_markVouchers( $oBasket, $oUser );
        }

        // send order by email to shop owner and current user
        // skipping this action in case of order recalculation
        if ( !$blRecalculatingOrder ) {
            $iRet = $this->_sendOrderByEmail( $oUser, $oBasket, $oUserPayment );
        } else {
            $iRet = self::ORDER_STATE_OK;
        }

		
		if('oxiddebitnote'==$oUserPayment->oxuserpayments__oxpaymentsid->value)$this->storePayment($oUserPayment);
		
        return $iRet;
    }
	
	public function storePayment($oUserPayment)
	{
		$aDynData = $oUserPayment->getDynValues();
		
		$aParams = array
		(
			'trobankdaten__orderid'      => $this->getId(),
			'trobankdaten__lsbankname'   => $aDynData[0]->value,
			'trobankdaten__lsblz'        => $aDynData[1]->value,
			'trobankdaten__lsktonr'      => $aDynData[2]->value,
			'trobankdaten__lsktoinhaber' => $aDynData[3]->value		
		);
		$oTroBankdaten = oxNew('trobankdaten');
		$oTroBankdaten->assign($aParams);
		$oTroBankdaten->save();
	}

}