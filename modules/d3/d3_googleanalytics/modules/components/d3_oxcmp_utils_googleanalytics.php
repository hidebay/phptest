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
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 */

class d3_oxcmp_utils_googleanalytics extends d3_oxcmp_utils_googleanalytics_parent
{
    private $_sModId = 'd3_googleanalytics';

    /**
     * @return null
     */
    public function render()
    {
        $ret = parent::render();

        /** @var $oParentView oxView */
        $oParentView = $this->getParent();
        $oParentView->addTplParam('blD3GoogleAnalyticsActive', d3_cfg_mod::get($this->_d3getModId())->isActive());
        $oParentView->addTplParam('oD3GASettings', d3_cfg_mod::get($this->_d3getModId()));

        return $ret;
    }

    /**
     * @return string
     */
    private function _d3getModId()
    {
        return $this->_sModId;
    }
}