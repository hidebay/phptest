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

class d3_oxcmp_basket_extsearch extends d3_oxcmp_basket_extsearch_parent
{
    /**
     * @return string
     */
    protected function _getRedirectUrl()
    {
        $sUrl       = parent::_getRedirectUrl();
        $aParamList = array('d3searchlike', 'd3searchis', 'filterparam', 'priceselector', 'd3searchattrib');
        $sAdd       = '';

        foreach ($aParamList as $sParam) {
            $mTransferParam = oxRegistry::getConfig()->getRequestParameter($sParam, true);
            if ($mTransferParam) {
                if (is_array($mTransferParam)) {
                    foreach ($mTransferParam as $key => $value) {
                        $sAdd .= $sParam . '[' . $key . ']=' . $value . '&';
                    }
                } else {
                    $sAdd .= $sParam . '=' . oxRegistry::getConfig()->getRequestParameter($sParam, true) . "&";
                }
            }
        }

        $sUrl .= $sAdd;

        return $sUrl;
    }
}