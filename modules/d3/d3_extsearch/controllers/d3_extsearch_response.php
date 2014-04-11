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

class d3_extsearch_response extends oxView
{
    private $_sModId = 'd3_extsearch';

    public $oD3SearchHandler;

    public function init()
    {
        startProfile(__METHOD__);

        oxRegistry::getConfig()->setActiveView( $this );

        $mArgs = func_get_args();
        $mArgs = $mArgs[0];

        header("Content-Type: text/html; charset=" . oxRegistry::getLang()->translateString('charset'));
        echo $this->_getD3SearchHandler()->suggestGetContent($mArgs['searchParam']);

        stopProfile(__METHOD__);

        $this->_addProfiling();
    }

    /**
     * performance, use a class wide instance
     *
     * @return d3_search
     */
    protected function _getD3SearchHandler()
    {
        if (!$this->oD3SearchHandler) {
            $this->oD3SearchHandler = oxNew('d3_search');
        }

        return $this->oD3SearchHandler;
    }

    protected function _addProfiling()
    {
        d3_cfg_mod::get($this->_sModId)->d3getLog()->d3GetProfiling();
    }
}