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
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eSales PayPal PE
 */

/**
 * PayPal order action factory class
 */
class oePayPalOrderActionFactory
{

    /**
     * Creates action object by given action name
     */
    public function createAction( $sAction )
    {
        $oAction = null;

        switch( $sAction ) {
            case 'capture':
                $oAction = oxNew( 'oePayPalOrderActionCapture' );
                break;
            case 'refund':
                $oAction = oxNew( 'oePayPalOrderActionRefund' );
                break;
            case 'void':
                $oAction = oxNew( 'oePayPalOrderActionVoid' );
                break;
            case 'reauthorize':
                $oAction = oxNew( 'oePayPalOrderActionReauthorize' );
                break;
            default:
                throw oxNew( 'oePayPalInvalidActionException' );
        }

        return $oAction;
    }

}