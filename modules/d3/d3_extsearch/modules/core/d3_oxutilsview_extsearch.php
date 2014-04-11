<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_oxutilsview_extsearch extends d3_oxutilsview_extsearch_parent
{
    /**
     * @param smarty $oSmarty
     *
     * @return null|void
     */
    protected function _fillCommonSmartyProperties($oSmarty)
    {
        parent::_fillCommonSmartyProperties($oSmarty);

        $oSmarty->plugins_dir[] = oxRegistry::getConfig()->getActiveView()->getViewConfig()->getModulePath(
            'd3_extsearch'
        ) . 'core/smarty/plugins';
    }
}