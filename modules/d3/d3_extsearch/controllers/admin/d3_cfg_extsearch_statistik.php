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

class d3_cfg_extsearch_Statistik extends d3_cfg_mod_main
{
    protected $_sThisTemplate = "d3_cfg_extsearch_statistik.tpl";
    protected $_sModId = 'd3_extsearch';
    public $aSearchwords = array();
    public $aStatParams = array();
    public $sSearchType;
    public $aD3OwnSearchHandler = array();

    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        $this->addTplParam('aTimes', $this->_getAvailableLogTime());
        $this->addTplParam('aParams', oxRegistry::getConfig()->getRequestParameter('statparams'));

        return $sRet;
    }

    /**
     * @return array
     */
    protected function _getAvailableLogTime()
    {
        $sTblName = getViewName('oxlogs');

        $aSearch  = array('January', 'February', 'March', 'May', 'June', 'July', 'October', 'December');
        $aReplace = array('Januar', 'Februar', 'Maerz', 'Mai', 'Juni', 'Juli', 'Oktober', 'Dezember');

        $sSelect =
            "SELECT date_format(".$sTblName.".oxtime,'%M') as month, date_format(".$sTblName.".oxtime,'%Y') as year, date_format($sTblName.oxtime,'%Y%m') as sorttime FROM $sTblName WHERE $sTblName.oxclass = 'search' AND oxparameter != '' GROUP BY sorttime ORDER BY sorttime DESC";

        $aRecords = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($sSelect);

        $aTimes = array();
        if ($aRecords && is_array($aRecords) && count($aRecords)) {
            foreach ($aRecords as $aRecord) {
                $aRecord = array_change_key_case($aRecord, CASE_UPPER);
                $aTmp     = array('output' => str_replace($aSearch, $aReplace, $aRecord['MONTH']) . " " . $aRecord['YEAR'],
                                  'value'  => $aRecord['SORTTIME']);
                $aTimes[] = $aTmp;
            }
        }

        return $aTimes;
    }

    public function generateStatList()
    {
        $sSelect = $this->_getStatistikSelect();
        $aRecords = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($sSelect);

        if ($aRecords && is_array($aRecords) && count($aRecords)) {
            foreach ($aRecords as $aRecord) {
                $aRecord = array_change_key_case($aRecord, CASE_UPPER);

                // simulate group function, because db can't join oxlogs and d3logs table in reason of heavy load time
                $sFilters   = $this->_getFilters($aRecord['OXTIME']);
                $sFilterKey = base64_encode($aRecord['OXPARAMETER']) . substr(base64_encode($sFilters), 0, 16) .
                    substr(base64_encode($sFilters), -16, 16);

                $oSearchWord                     = new stdClass();
                $oSearchWord->sWord              = $aRecord['OXPARAMETER'];
                $oSearchWord->iCount             = $aRecord['COUNTER'] + $this->aSearchwords[$sFilterKey]->iCount;
                $oSearchWord->blGraph            = $aRecord['GRAPH'];
                $oSearchWord->aFilters           = $this->_extractFilters($sFilters);
                $oSearchWord->sFilters           = $this->_exportFilters($sFilters);
                $this->aSearchwords[$sFilterKey] = $oSearchWord;
            }
        }
    }

    /**
     * @param $sTime
     * @return string
     */
    protected function _getFilters($sTime)
    {
        $sD3LogTblName = getViewName('d3log');

        $sSelect = "SELECT $sD3LogTblName.oxtext FROM $sD3LogTblName WHERE oxclass = 'd3_ext_search' AND oxshopid = " .
            oxdb::getDb()->quote(oxRegistry::getConfig()->getShopId()) . " AND oxtime = " .
            oxDb::getDb()->quote($sTime);

        return oxDb::getDb()->getOne($sSelect);
    }

    /**
     * @param $sFilters
     * @return string
     */
    protected function _exportFilters($sFilters)
    {
        $aFilters = unserialize($sFilters);
        if (is_array($aFilters))
        {
            return base64_encode($sFilters);
        }

        return '';
    }

    /**
     * @param $aFilters
     * @return array
     */
    protected function _extractFilters($aFilters)
    {
        $aFilters = unserialize($aFilters);

        $aPreparedFilters = array();

        if (is_array($aFilters))
        {
            foreach ($aFilters as $sType => $sValue)
            {
                $oPreparedFilter = new stdClass;

                switch ($sType)
                {
                    case "cat":
                        $oPreparedFilter->desc =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_CATEGORY');
                        /** @var $oCategory oxcategory */
                        $oCategory = oxNew('oxcategory');
                        $oCategory->load($sValue);
                        $oPreparedFilter->value = $oCategory->getFieldData('oxtitle') ?
                            '.../' . $oCategory->getParentCategory()->getFieldData('oxtitle') . '/' .
                                $oCategory->getFieldData('oxtitle') : $sValue;
                        break;
                    case "price":
                        $oPreparedFilter->desc =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_PRICE');
                        if (is_array($sValue))
                        {
                            $sValue = implode(' - ', $sValue);
                        }
                        $oPreparedFilter->value = $sValue;
                        break;
                    case "vnd":
                        $oPreparedFilter->desc =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_VENDOR');
                        $oVendor               = oxNew('oxvendor');
                        $oVendor->load($sValue);
                        $oPreparedFilter->value =
                            $oVendor->getFieldData('oxtitle') ? $oVendor->getFieldData('oxtitle') : $sValue;
                        break;
                    case "mnf":
                        $oPreparedFilter->desc =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_MANUFACTURER');
                        $oManufacturer         = oxNew('oxmanufacturer');
                        $oManufacturer->load($sValue);
                        $oPreparedFilter->value =
                            $oManufacturer->getFieldData('oxtitle') ? $oManufacturer->getFieldData('oxtitle') : $sValue;
                        break;
                    case "ownlike":
                        $oPreparedFilter->desc  =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_OWNLIKE');
                        $aFieldList = array();
                        if (is_array($sValue) && count($sValue))
                        {
                            foreach ($sValue as $sFieldName => $aFieldValue) {
                                if (count($aFieldValue) && strlen($aFieldValue[0])) {
                                    $aFieldList[] =
                                        sprintf(
                                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_OWNVALUE'),
                                            $sFieldName,
                                            implode(', ', $aFieldValue)
                                        );
                                }
                            }
                        }
                        $oPreparedFilter->value = implode(nl2br(', '.PHP_EOL.'&nbsp;&nbsp;&nbsp;'), $aFieldList);
                        break;
                    case "ownis":
                        $oPreparedFilter->desc  =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_OWNIS');
                        $aFieldList = array();
                        if (is_array($sValue) && count($sValue))
                        {
                            foreach ($sValue as $sFieldName => $aFieldValue) {
                                if (count($aFieldValue) && strlen($aFieldValue[0])) {
                                    $aFieldList[] =
                                        sprintf(
                                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_OWNVALUE'),
                                            $sFieldName,
                                            implode(', ', $aFieldValue)
                                        );
                                }
                            }
                        }
                        $oPreparedFilter->value = implode(nl2br(', '.PHP_EOL.'&nbsp;&nbsp;&nbsp;'), $aFieldList);
                        break;
                    case "attr":
                        $oPreparedFilter->desc =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_ATTRIBUTE');
                        if (is_array($sValue))
                        {
                            foreach ($sValue as $sAttrKey => $sAttribValue)
                            {
                                $oAttribute = oxNew('oxattribute');
                                $oAttribute->load($sAttrKey);
                                $oPreparedFilter->value .= $oAttribute->getFieldData('oxtitle') ? $oAttribute->getFieldData('oxtitle') : $sAttrKey;
                                $oPreparedFilter->value .= ': ' . $sAttribValue . "; ";
                            }
                        }
                        break;
                    case "lttr":
                        $oPreparedFilter->desc  =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_INDEXLETTER');
                        $oPreparedFilter->value = strtolower($sValue);
                        break;
                    default:
                        $oPreparedFilter->desc  =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_UNKNOWN');
                        $oPreparedFilter->value = $sValue;
                        break;
                }

                $aPreparedFilters[] = $oPreparedFilter;
            }
        }

        return $aPreparedFilters;
    }

    /**
     * @return array
     */
    public function getStatList()
    {
        return $this->aSearchwords;
    }

    /**
     * @return string
     */
    protected function _getStatistikSelect()
    {
        $this->aStatParams = oxRegistry::getConfig()->getRequestParameter('statparams');
        $this->sSearchType = $this->aStatParams['type'];

        $this->_d3GetOwnSearchHandler()->generatorReset();
        $this->getLogSubQuery();
        $this->getD3LogSubQuery();
        $this->getFinalGroupSelect();

        return $this->_d3GetOwnSearchHandler()->generatorBuildQuery();
    }

    public function getLogSubQuery()
    {
        $sLogTableAlias = $this->_d3GetOwnSearchHandler()->getTblAlias('oxlogs');

        $aSelect = array($sLogTableAlias.".oxparameter");
        if ($this->aStatParams['type'] == 'hitless' || $this->aStatParams['type'] == 'mostsearches')
        {
            $aSelect[] = "'1' as graph";
        }
        else
        {
            $aSelect[] = "'0' as graph";
        }
        if ($this->aStatParams['type'] == 'mosthits')
        {
            $aSelect[] = $sLogTableAlias.".d3count AS counter";
        }
        $aSelect[] = $sLogTableAlias.".oxtime";

        $aWhere = array($sLogTableAlias.".oxclass = 'search'");
        if ($this->aStatParams['type'] == 'mosthits')
        {
            $aWhere[] = $sLogTableAlias.".d3count != '0'";
        }
        elseif ($this->aStatParams['type'] == 'hitless')
        {
            $aWhere[] = $sLogTableAlias.".d3count = '0'";
        }
        $aWhere[] = $sLogTableAlias.".oxparameter != ''";
        $aWhere[] = "date_format(".$sLogTableAlias.".oxtime,'%Y%m') = " . oxDb::getDb()->quote($this->aStatParams['time']);
        $aWhere[] = $sLogTableAlias.".oxshopid = " . oxDb::getDb()->quote(oxRegistry::getConfig()->getShopId());

        $this->_d3GetOwnSearchHandler()->generatorAddPart('select', $aSelect, ', ');
        $this->_d3GetOwnSearchHandler()->generatorAddUniquePart('from', array(getViewName('oxlogs') . " AS ".$sLogTableAlias));
        $this->_d3GetOwnSearchHandler()->generatorAddPart('where', $aWhere, " AND ");
    }

    public function getD3LogSubQuery()
    {
        $sD3LogTableAlias = $this->_d3GetOwnSearchHandler()->getTblAlias('d3log');
        $sD3LogTableName = getViewName('d3log');
        $sLogTableAlias = $this->_d3GetOwnSearchHandler()->getTblAlias('oxlogs');

        $this->_d3GetOwnSearchHandler()->generatorAddPart('select', array($sD3LogTableAlias.".oxtext"), ", ");
        $this->_d3GetOwnSearchHandler()->generatorAddUniquePart('from', array($sD3LogTableName." AS ".$sD3LogTableAlias." ON ".$sLogTableAlias.".oxtime = ".$sD3LogTableAlias.".oxaction AND ".$sD3LogTableAlias.".oxclass = 'd3_ext_search'"), ' LEFT JOIN ');
    }

    public function getFinalGroupSelect()
    {
        $sLogTableAlias = $this->_d3GetOwnSearchHandler()->getTblAlias('oxlogs');
        $sD3LogTableAlias = $this->_d3GetOwnSearchHandler()->getTblAlias('d3log');

        if ($this->aStatParams['type'] == 'hitless' || $this->aStatParams['type'] == 'mostsearches')
        {
            $this->_d3GetOwnSearchHandler()->generatorAddPart('select', array("count(".$sLogTableAlias.".oxparameter) as counter"), ', ');
        }

        $aGroup = array(
            "date_format(".$sLogTableAlias.".oxtime, '%m%Y')",
            $sLogTableAlias.".oxparameter",
            $sD3LogTableAlias.".oxtext"
        );
        $aOrder = array(
            "counter DESC",
            $sLogTableAlias.".oxparameter ASC"
        );

        $this->_d3GetOwnSearchHandler()->generatorAddUniquePart('group', $aGroup, ", ");
        $this->_d3GetOwnSearchHandler()->generatorAddUniquePart('order', $aOrder, ", ");
    }

    /**
     * @return bool
     */
    public function checkReportBaseClass()
    {
        return class_exists('report_base');
    }

    public function generateStat()
    {
        $aStatparams = oxRegistry::getConfig()->getRequestParameter("statparams");
        $sTimeFrom   = substr($aStatparams['time'], 0, 4) . "-" . substr($aStatparams['time'], 4, 2) . "-01";
        $timestamp   = mktime(0, 0, 0, substr($aStatparams['time'], 4, 2), 1, substr($aStatparams['time'], 0, 4));
        $sTimeTo     =
            substr($aStatparams['time'], 0, 4) . "-" . substr($aStatparams['time'], 4, 2) . "-" . date('t', $timestamp);

        if ($sTimeFrom && $sTimeTo)
        {
            $sTimeFrom = oxRegistry::get("oxUtilsDate")->formatDBDate($sTimeFrom, TRUE);
            $sTimeFrom = date("Y-m-d", strtotime($sTimeFrom));
            $sTimeTo   = oxRegistry::get("oxUtilsDate")->formatDBDate($sTimeTo, TRUE);
            $sTimeTo   = date("Y-m-d", strtotime($sTimeTo));
        }
        else
        {
            $dDays     = oxRegistry::getConfig()->getRequestParameter("timeframe");
            $dNow      = time();
            $sTimeFrom = date("Y-m-d", mktime(0, 0, 0, date("m", $dNow), date("d", $dNow) - $dDays, date("Y", $dNow)));
            $sTimeTo   = date("Y-m-d", time());
        }

        /** @var $oSmarty smarty */
        $oSmarty = oxRegistry::get("oxUtilsView")->getSmarty();
        $oSmarty->assign("time_from", $sTimeFrom . " 23:59:59");
        $oSmarty->assign("time_to", $sTimeTo . " 23:59:59");
        $oSmarty->assign("searchfilters", $aStatparams['searchparams']);
        $oSmarty->assign("oViewConf", $this->getViewDataElement("oViewConf"));

        echo($oSmarty->fetch("report_pagehead.tpl"));

        $aAllreports = array('d3_extsearch_report_' . $aStatparams['type'] . '.php');

        foreach ($aAllreports as $file)
        {
            if (($file = trim($file)))
            {
                $sClassName = str_replace(".php", "", strtolower($file));

                $oReport = oxNew($sClassName);
                $oReport->setSmarty($oSmarty);

                $oSmarty->assign("oView", $oReport);
                echo($oSmarty->fetch($oReport->render()));
            }
        }

        oxRegistry::getUtils()->showMessageAndExit($oSmarty->fetch("report_bottomitem.tpl"));
    }

    /**
     * performance, use use case defined instance
     * @param string $sIdent
     *
     * @return d3_search
     */
    protected function _d3GetOwnSearchHandler($sIdent = 'basic')
    {
        if (!$this->aD3OwnSearchHandler[$sIdent]) {
            $this->aD3OwnSearchHandler[$sIdent] = oxNew('d3_search');
        }

        return $this->aD3OwnSearchHandler[$sIdent];
    }
}