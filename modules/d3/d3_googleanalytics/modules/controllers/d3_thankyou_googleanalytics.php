<?php

/**
 *    This module is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This module is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    For further informations, see <http://www.gnu.org/licenses/>.
 *
 * @link      http://www.oxidmodule.com
 * @link      http://www.shopmodule.com
 * @link      http://www.aikme.de
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch) & aikme GmbH
 */

class d3_thankyou_googleanalytics extends d3_thankyou_googleanalytics_parent
{
    private $_sModCfgId = 'd3_googleanalytics';

    /**
     * @return int
     */
    public function isNewCustomer()
    {
        $iIsNewCustomer = oxRegistry::getSession()->getVariable("iD3GANewCustomer");
        oxRegistry::getSession()->deleteVariable("iD3GANewCustomer");

        return $iIsNewCustomer;
    }

    /**
     * @param $sGACode
     */
    public function logCode($sGACode)
    {
        d3_cfg_mod::get($this->_sModCfgId)->getLog()->log(
            d3log::NOTICE, __CLASS__, __FUNCTION__, __LINE__, 'GA TrackingCode', $sGACode
        );
    }
}