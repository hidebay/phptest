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
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 */

/**
 * Guest book entry manager class.
 * Manages guestbook entries, denies them, etc.
 */
class GuestbookEntry extends GuestBook
{
    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'page/guestbook/guestbookentry.tpl';

    /**
     * Guestbook form id, prevents double entry submit
     * @var string
     */
    protected $_sGbFormId = null;

    /**
     * Method applies validation to entry and saves it to DB.
     * On error/success returns name of action to perform
     * (on error: "guestbookentry?error=x"", on success: "guestbook").
     *
     * @return string
     */
    public function saveEntry()
    {
        $sReviewText = trim( ( string ) oxConfig::getParameter( 'rvw_txt', true ) );
        $sShopId     = $this->getConfig()->getShopId();
        $sUserId     = oxSession::getVar( 'usr' );

        // guest book`s entry is validated
        if ( !$sUserId ) {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'ERROR_MESSAGE_GUESTBOOK_ENTRY_ERR_LOGIN_TO_WRITE_ENTRY' );
            //return to same page
            return;
        }

        if ( !$sShopId ) {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'ERROR_MESSAGE_GUESTBOOK_ENTRY_ERR_UNDEFINED_SHOP' );
            return 'guestbookentry';
        }

        // empty entries validation
        if ( '' == $sReviewText ) {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'ERROR_MESSAGE_GUESTBOOK_ENTRY_ERR_REVIEW_CONTAINS_NO_TEXT' );
            return 'guestbookentry';
        }

        // flood protection
        $oEntrie = oxNew( 'oxgbentry' );
        if ( $oEntrie->floodProtection( $sShopId, $sUserId ) ) {
            oxRegistry::get("oxUtilsView")->addErrorToDisplay( 'ERROR_MESSAGE_GUESTBOOK_ENTRY_ERR_MAXIMUM_NUMBER_EXCEEDED' );
            return 'guestbookentry';
        }

        // double click protection
        if ( $this->canAcceptFormData() ) {
            // here the guest book entry is saved
            $oEntry = oxNew( 'oxgbentry' );
            $oEntry->oxgbentries__oxshopid  = new oxField($sShopId);
            $oEntry->oxgbentries__oxuserid  = new oxField($sUserId);
            $oEntry->oxgbentries__oxcontent = new oxField($sReviewText);
            $oEntry->save();
        }

        return 'guestbook';
    }
}
