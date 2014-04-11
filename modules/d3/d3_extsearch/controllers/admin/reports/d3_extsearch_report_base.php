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

class d3_extsearch_report_base extends report_base
{
    public $aStatParams = array('type' => 'mostsearches');
    public $sTimeFrom;
    public $sTimeType = 'month';
    public $aFilters;

    /**
     * @param $sFrom
     * @return string
     */
    public function getLogSubQuery($sFrom)
    {
        $sTmpTableName = 'LogTable';

        $sSelect = "
                    SELECT
                        $sTmpTableName.oxparameter,";
        if ($this->sTimeType == 'month')
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime,'%d.') as searchdate,";
        }
        else
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime,'%m.') as searchdate,";
        }
        if ($this->aStatParams['type'] == 'mosthits')
        {
            $sSelect .= "
                        $sTmpTableName.d3count as counter, ";
        }
        $sSelect .= "
                        $sTmpTableName.oxtime
                    FROM
                        $sFrom as $sTmpTableName
                    WHERE
                        ($sTmpTableName.oxclass = 'search') AND";

        if ($this->aStatParams['type'] == 'mosthits')
        {
            $sSelect .= "
                        $sTmpTableName.d3count != '0' AND ";
        }
        elseif ($this->aStatParams['type'] == 'hitless')
        {
            $sSelect .= "
                        $sTmpTableName.d3count = '0' AND ";
        }
        $sSelect .= "
                        $sTmpTableName.oxparameter = " .
            oxDb::getDb()->quote(oxRegistry::getConfig()->getRequestParameter('searchword')) . " AND";
        if ($this->sTimeType == 'month')
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime,'%Y%m') = " . oxDb::getDb()->quote($this->sTimeFrom) . " AND";
        }
        else
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime,'%Y') = " . oxDb::getDb()->quote($this->sTimeFrom) . " AND";
        }
        $sSelect .= "
                        $sTmpTableName.oxshopid = " . oxDb::getDb()->quote(oxRegistry::getConfig()->getShopId()) . "
                ";

        return $sSelect;
    }

    /**
     * @param $sFrom
     * @return string
     */
    public function getD3LogSubQuery($sFrom)
    {
        $sTmpTableName   = 'LogTmpTable';
        $sD3LogTableName = getViewName('d3log');

        $sSelect = "
                    SELECT
                        $sTmpTableName.*,
                        $sD3LogTableName.oxtext
                    FROM
                    (
                        ".$sFrom."
                    ) as $sTmpTableName
                    LEFT JOIN
                        $sD3LogTableName
                    ON
                        $sTmpTableName.oxtime = $sD3LogTableName.oxaction
                        AND $sD3LogTableName.oxclass = 'd3_ext_search'
                    WHERE
                ";
        if ($this->aFilters)
        {
            $sSelect .= "
                        $sD3LogTableName.oxtext = " . oxDb::getDb()->quote($this->aFilters);
        }
        else
        {
            $sSelect .= "
                        $sD3LogTableName.oxtext IS NULL";
        }

        return $sSelect;
    }

    /**
     * @param $sFrom
     * @return string
     */
    public function getFinalGroupSelect($sFrom)
    {
        $sTmpTableName = 'CombiTmpTable';

        $sSelect = "
                    SELECT";
        if ($this->aStatParams['type'] == 'hitless' || $this->aStatParams['type'] == 'mostsearches')
        {
            $sSelect .= "
                        count($sTmpTableName.oxparameter) as counter, ";
        }
        $sSelect .= "
                        $sTmpTableName.*
                    FROM
                    (
                        $sFrom
                    ) as $sTmpTableName
                    WHERE
                        1
                    GROUP BY";
        if ($this->sTimeType == 'month')
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime, '%Y%m%d'),";
        }
        else
        {
            $sSelect .= "
                        date_format($sTmpTableName.oxtime, '%Y%m'),";
        }
        $sSelect .= "
                        $sTmpTableName.oxparameter,
                        $sTmpTableName.oxtext
                    ORDER BY
                        counter DESC,
                        $sTmpTableName.oxparameter ASC
                ";

        return $sSelect;
    }

    /**
     * @param $sSelect
     * @param $iLines
     * @return array
     */
    protected function _getDataArray($sSelect, $iLines)
    {
        $aTemp = array();
        for ($i = 1; $i <= $iLines; $i++)
        {
            $aTemp[date("d.", mktime(23, 59, 59, 01, $i, 1970))] = 0;
        }

        $aRecords = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($sSelect);
        if ($aRecords && is_array($aRecords) && count($aRecords)) {
            foreach ($aRecords as $aRecord) {
                $aRecord = array_change_key_case($aRecord, CASE_UPPER);
                if ($aRecord['COUNTER'])
                {
                    $aTemp[$aRecord['SEARCHDATE']] = (int)$aRecord['COUNTER'];
                }
            }
        }

        return $aTemp;
    }

    /**
     * @return int
     */
    protected function _getLineCount()
    {
        $iCount = 0;

        if ($this->sTimeType == 'month')
        {
            $iCount =
                date("t", mktime(23, 59, 59, substr($this->sTimeFrom, 4, 2), 01, substr($this->sTimeFrom, 0, 4)));
        }
        elseif ($this->sTimeType == 'year')
        {
            $iCount = 12;
        }

        return $iCount;
    }

    /**
     * @param $aDataX
     * @return int
     */
    protected function _getMaxValue($aDataX)
    {
        $iMax = 0;
        foreach ($aDataX as $sValue)
        {
            if ($iMax < (int)$sValue)
            {
                $iMax = (int)$sValue;
            }
        }

        return $iMax;
    }

    /**
     * @param $iMax
     * @return mixed
     */
    protected function _getAligns($iMax)
    {
        $aPoints      = array();
        $aPoints["0"] = 0;
        $aAligns["0"] = 'report_searchstrings_scale_aligns_left"';
        $iTenth       = strlen($iMax) - 1;
        if ($iTenth < 1)
        {
            $aPoints["" . (round(($iMax / 2))) . ""] = $iMax / 2;
            $aAligns["" . (round(($iMax / 2))) . ""] =
                'report_searchstrings_scale_aligns_center" width="' . (720 / 3) . '"';
            $aPoints["" . $iMax . ""]                = $iMax;
            $aAligns["" . $iMax . ""]                =
                'report_searchstrings_scale_aligns_right" width="' . (720 / 3) . '"';
        }
        else
        {
            $iScaleMax = $iMax;
            $ctr       = 0;
            for ($iCtr = 10; $iCtr > 0; $iCtr--)
            {
                $aPoints["" . (round(($ctr))) . ""] = $ctr += $iScaleMax / 10;
                $aAligns["" . (round(($ctr))) . ""] =
                    'report_searchstrings_scale_aligns_center" width="' . (720 / 10) . '"';
            }
            $aAligns["" . (round(($ctr))) . ""] = 'report_searchstrings_scale_aligns_right" width="' . (720 / 10) . '"';
        }

        $aAligns["0"] .= ' width="' . (720 / count($aAligns)) . '"';

        return $aAligns;
    }

    /**
     * @param $aDataX
     * @param $aDataY
     * @return array
     */
    protected function _getDataVals($aDataX, $aDataY)
    {
        $iMax      = $this->_getMaxValue($aDataX);
        $aDataVals = array();

        for ($iCtr = 0; $iCtr < count($aDataY); $iCtr++)
        {
            $aDataVals[$aDataY[$iCtr]] = round($aDataX[$iCtr] / $iMax * 100);
        }

        foreach ($aDataX as $sKey => $sValue)
            $aDataVals{$sKey} = round($sValue / $iMax * 100);

        return $aDataVals;
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
                        $oPreparedFilter->desc  =
                            oxRegistry::getLang()->translateString('D3_EXTSEARCH_STAT_TYPES_PRICE');
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
     * @param $aFilters
     * @return string
     */
    protected function FilterToString($aFilters)
    {
        $aFilters        = $this->_extractFilters($aFilters);
        $aPreparedFilter = array();

        if (!isset($aFilters) || !is_array($aFilters) || !count($aFilters))
        {
            return '';
        }

        foreach ($aFilters as $aFilter)
        {
            $aPreparedFilter[] = $aFilter->desc . ': ' . $aFilter->value;
        }

        return implode(', ', $aPreparedFilter);
    }
}