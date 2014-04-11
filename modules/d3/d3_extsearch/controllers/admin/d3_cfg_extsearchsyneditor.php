<?php

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright (C) D3 Data Development (Inh. Thomas Dartsch)
 * @author    D3 Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_cfg_extsearchsyneditor extends d3_cfg_mod_
{
    protected $_hasListItems = TRUE;

    /**
     * @return string
     */
    public function render()
    {
        $this->addTplParam('sListClass', 'd3_cfg_extsearchsyneditor_list');
        $this->addTplParam('sMainClass', 'd3_cfg_extsearchsyneditor_main');
        return parent::render();
    }
}