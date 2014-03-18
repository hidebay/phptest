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
 * Current user password change form.
 * When user is logged in he may change his Billing and Shipping
 * information (this is important for ordering purposes).
 * Information as email, password, greeting, name, company, address,
 * etc. Some fields must be entered. OXID eShop -> MY ACCOUNT
 * -> Update your billing and delivery settings.
 */
class Account_Password extends Account
{
    /**
     * Current class template name.
     *
     * @var string
     */
    protected $_sThisTemplate = 'page/account/password.tpl';

    /**
     * Whether the password had been changed.
     *
     * @var bool
     */
    protected $_blPasswordChanged = false;

    /**
     * If user is not logged in - returns name of template account_user::_sThisLoginTemplate,
     * or if user is allready logged in additionally loads user delivery address
     * info and forms country list. Returns name of template account_user::_sThisTemplate
     *
     * @return string $_sThisTemplate current template file name
     */
    public function render()
    {

        parent::render();

        // is logged in ?
        $oUser = $this->getUser();
        if ( !$oUser ) {
            return $this->_sThisTemplate = $this->_sThisLoginTemplate;
        }

        return $this->_sThisTemplate;

    }

    /**
     * changes current user password
     *
     * @return null
     */
    public function changePassword()
    {
        $oUser = $this->getUser();
        if ( !$oUser ) {
            return;
        }

        $sOldPass  = oxConfig::getParameter( 'password_old', true );
        $sNewPass  = oxConfig::getParameter( 'password_new', true );
        $sConfPass = oxConfig::getParameter( 'password_new_confirm', true );

        if ( ( $oExcp = $oUser->checkPassword( $sNewPass, $sConfPass, true ) ) ) {
            switch ( $oExcp->getMessage() ) {
                case 'ERROR_MESSAGE_INPUT_EMPTYPASS':
                case 'ERROR_MESSAGE_PASSWORD_TOO_SHORT':
                    return oxRegistry::get("oxUtilsView")->addErrorToDisplay('ERROR_MESSAGE_PASSWORD_TOO_SHORT', false, true);
                default:
                    return oxRegistry::get("oxUtilsView")->addErrorToDisplay('ERROR_MESSAGE_PASSWORD_DO_NOT_MATCH', false, true);
            }
        }
        
        if ( !$sOldPass || !$oUser->isSamePassword( $sOldPass ) ) {
            return oxRegistry::get("oxUtilsView")->addErrorToDisplay('ERROR_MESSAGE_CURRENT_PASSWORD_INVALID', false, true);
        }

        // testing passed - changing password
        $oUser->setPassword( $sNewPass );
        if ( $oUser->save() ) {
            $this->_blPasswordChanged = true;
            // deleting user autologin cookies.
            oxRegistry::get("oxUtilsServer")->deleteUserCookie( $this->getConfig()->getShopId() );
        }
    }

    /**
     * Template variable getter. Returns true when password had been changed.
     *
     * @return bool
     */
    public function isPasswordChanged()
    {
        return $this->_blPasswordChanged;
    }

    /**
     * Returns Bread Crumb - you are here page1/page2/page3...
     *
     * @return array
     */
    public function getBreadCrumb()
    {
        $aPaths = array();
        $aPath = array();

        $aPath['title'] = oxRegistry::getLang()->translateString( 'MY_ACCOUNT', oxRegistry::getLang()->getBaseLanguage(), false );
        $aPath['link']  = oxRegistry::get("oxSeoEncoder")->getStaticUrl( $this->getViewConfig()->getSelfLink() . 'cl=account' );
        $aPaths[] = $aPath;

        $aPath['title'] = oxRegistry::getLang()->translateString( 'CHANGE_PASSWORD', oxRegistry::getLang()->getBaseLanguage(), false );
        $aPath['link']  = $this->getLink();
        $aPaths[] = $aPath;

        return $aPaths;
    }
}
