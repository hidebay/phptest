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

if (!class_exists("d3_extsearch_report_hitless"))
{
    /**
     *
      */
    class d3_extsearch_report_hitless extends d3_extsearch_report_base
    {
        protected $_sThisTemplate = "d3_extsearch_report_hitless.tpl";
        public $aStatParams = array('type' => 'hitless');
        public $sTimeFrom;
        public $sTimeType = 'month';
        public $aFilters;

        /**
         * @return string
         */
        public function render()
        {
            $oSmarty = $this->getSmarty();
            $oSmarty->assign("aStats", array());

            $this->hitlessmonth();
            $this->hitlessyear();

            return parent::render();
        }

        public function hitlessmonth()
        {
            $aDataX = array();
            $aDataY = array();

            $oSmarty         = $this->getSmarty();
            $this->sTimeFrom = date("Ym", strtotime($oSmarty->_tpl_vars['time_from']));
            $this->sTimeType = 'month';
            $this->aFilters  = base64_decode(oxRegistry::getConfig()->getRequestParameter('searchparams'));

            $sSelect =
                $this->getFinalGroupSelect($this->getD3LogSubQuery($this->getLogSubQuery(getViewName('oxlogs'))));
            $aTemp   = $this->_getDataArray($sSelect, $this->_getLineCount());

            foreach ($aTemp as $key => $value)
            {
                $aDataX[$key] = $value;
                $aDataY[]     = $key;
            }

            $iMax      = $this->_getMaxValue($aDataX);
            $aAligns   = $this->_getAligns($iMax);
            $aDataVals = $this->_getDataVals($aDataX, $aDataY);

            if (count($aDataY) > 0)
                $oSmarty->assign("drawStat", TRUE);
            else
            {
                $oSmarty->assign("drawStat", FALSE);
            }

            $aSmartyVars = array(
                'sHeadline'   => sprintf(
                    oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_STATDESC_HITLESS'),
                    date("M. Y", strtotime($oSmarty->_tpl_vars['time_from'])),
                    oxRegistry::getConfig()->getRequestParameter('searchword')
                ),
                'classes'     => array($aAligns),
                'allCols'     => count($aAligns) + 2,
                'cols'        => count($aAligns),
                'sSearchDate' => date("m.y", strtotime($oSmarty->_tpl_vars['time_from'])),
                'percents'    => array($aDataVals),
                'y'           => $aDataY,
                'sFilters'    => $this->FilterToString($this->aFilters),
            );

            $aStats = $oSmarty->_tpl_vars['aStats'];
            array_push($aStats, $aSmartyVars);
            $oSmarty->assign("aStats", $aStats);
        }

        public function hitlessyear()
        {
            $aDataX = array();
            $aDataY = array();

            $oSmarty         = $this->getSmarty();
            $this->sTimeFrom = date("Y", strtotime($oSmarty->_tpl_vars['time_from']));
            $this->sTimeType = 'year';
            $this->aFilters  = base64_decode(oxRegistry::getConfig()->getRequestParameter('searchparams'));

            $sSelect =
                $this->getFinalGroupSelect($this->getD3LogSubQuery($this->getLogSubQuery(getViewName('oxlogs'))));
            $aTemp   = $this->_getDataArray($sSelect, $this->_getLineCount());

            foreach ($aTemp as $key => $value)
            {
                $aDataX[$key] = $value;
                $aDataY[]     = $key;
            }

            $iMax      = $this->_getMaxValue($aDataX);
            $aAligns   = $this->_getAligns($iMax);
            $aDataVals = $this->_getDataVals($aDataX, $aDataY);

            if (count($aDataY) > 0)
                $oSmarty->assign("drawStat", TRUE);
            else
                $oSmarty->assign("drawStat", FALSE);

            $aSmartyVars = array(
                'sHeadline'   => sprintf(
                    oxRegistry::getLang()->translateString("D3_EXTSEARCH_STAT_STATDESC_HITLESS"),
                    date("Y", strtotime($oSmarty->_tpl_vars['time_from'])),
                    oxRegistry::getConfig()->getRequestParameter('searchword')
                ),
                'classes'     => array($aAligns),
                'allCols'     => count($aAligns) + 2,
                'cols'        => count($aAligns),
                'sSearchDate' => date("y", strtotime($oSmarty->_tpl_vars['time_from'])),
                'percents'    => array($aDataVals),
                'y'           => $aDataY,
                'sFilters'    => $this->FilterToString($this->aFilters),
            );

            $aStats = $oSmarty->_tpl_vars['aStats'];
            array_push($aStats, $aSmartyVars);
            $oSmarty->assign("aStats", $aStats);
        }
    }
}