<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.

 * @link      http://www.oxid-esales.com
 * @copyright (C) OXID eSales AG 2003-2013
 */

/**
 * Starting shop page.
 * Shop starter, manages starting visible articles, etc.
 */
class oeThemeSwitcherStart extends oeThemeSwitcherStart_parent
{

    /**
     * Returns view ID (for template engine caching).
     *
     * @return string   $this->_sViewId view id
     */
    public function getViewId()
    {
        $oUBase = oxNew( 'oxUBase' );
        $sViewId = $oUBase->getViewId();
        $sViewId .= $this->getConfig()->oeThemeSwitcherGetActiveThemeId();

        return $sViewId;
    }

}
