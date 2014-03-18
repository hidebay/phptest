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
 * @version   SVN: $Id: oxwminibasket.php 47624 2012-07-23 07:54:44Z vaidas.matulevicius $
 */

/**
 * Cookie note widget
 */
class oxwCookieNote extends oxWidget
{

    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'widget/header/cookienote.tpl';

    /**
     * Executes parent::render(). Check if need to hide cookie note.
     * Returns name of template file to render.
     *
     * @return  string  current template file name
     */
    public function render()
    {
        parent::render();
        return $this->_sThisTemplate;
    }

    /**
     * Return if cookie notification is enabled by config.
     *
     * @return boolean
     */
    function isEnabled()
    {
        if ( $this->getConfig()->getConfigParam( 'blShowCookiesNotification' ) ) {
            return true;
        }

        return false;
    }
}
