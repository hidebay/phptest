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

class d3_cfg_extsearch_Main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_extsearch_main.tpl';

    protected $_sModId = 'd3_extsearch';

    protected $_blUseModCfgStdObject = true;

    public $blSearchColsSet = false;

    public $aSearchCols = array();

    protected $_blHasDebugSwitch = true;

    protected $_blHasTestModeSwitch = false;

    protected $_sDebugHelpTextIdent = 'D3_EXTSEARCH_MAIN_DEBUGACTIVE_DESC';

    protected $_iUnindexedArticles = false;

    public $oD3Generator;

    /**
     * constructor
     */
    public function __construct()
    {
        startProfile(__METHOD__);
        if (oxRegistry::getConfig()->getRequestParameter('extlogin')) {
            // fake sToken
            $_GET['stoken'] = oxRegistry::getSession()->getSessionChallengeToken();
            $oLogin         = oxNew('login');
            $oLogin->checklogin();
        }

        stopProfile(__METHOD__);

        return parent::__construct();
    }

    /**
     * @return string
     */
    public function getIndexStatus()
    {
        if ($this->_iUnindexedArticles === false) {
            $this->_iUnindexedArticles = 0;
            startProfile(__METHOD__);

            $this->d3getGenerator()->setGetNewArticlesOnly(TRUE);
            $this->_iUnindexedArticles = $this->d3getGenerator()->getMaxUpdatePos();
            $this->d3getGenerator()->setGetNewArticlesOnly(FALSE);

            stopProfile(__METHOD__);
        }

        return $this->_iUnindexedArticles;
    }

    /**
     * @return string
     */
    public function render()
    {
        startProfile(__METHOD__);

        $aConfBools = false;

        $sRet = parent::render();
// ToDo: move this to business logic
        // stellt Konfigdaten zur Ausgabe von Hinweismeldungen zur Fehlkonfigurationen bereit
        $sSelect = "select oxvarname, oxvartype, DECODE( oxvarvalue, '" . oxRegistry::getConfig()->getConfigParam(
            'sConfigKey'
        ) . "') as oxvarvalue from oxconfig where oxshopid = '" . oxRegistry::getConfig()->getShopId() . "'";
        $aRecords = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($sSelect);

        if ($aRecords && is_array($aRecords) && count($aRecords)) {
            foreach ($aRecords as $aRecord) {
                $aRecord = array_change_key_case($aRecord, CASE_UPPER);

                $sVarName = $aRecord['OXVARNAME'];
                $sVarType = $aRecord['OXVARTYPE'];
                $sVarVal  = $aRecord['OXVARVALUE'];

                if ($sVarType == "bool") {
                    $aConfBools[$sVarName] = ($sVarVal == "true" || $sVarVal == "1");
                }
            }
        }

        $this->addTplParam("confbools", $aConfBools);

        stopProfile(__METHOD__);

        return $sRet;
    }

    /**
     * @return d3_search_generator
     */
    public function d3getGenerator()
    {
        if (!$this->oD3Generator)
        {
            $this->oD3Generator = oxNew('d3_search_generator');
        }

        return $this->oD3Generator;
    }

    /**
     * Generiert aus jedem Artikel auf Grundlage der zu verwendenden Felder den phonetischen Code
     */
    public function generatePhoneticStrings()
    {
        startProfile(__METHOD__);

        /** @var d3utils $oD3Utils */
        $oD3Utils = oxRegistry::get('d3utils');

        $iArtPos = $this->d3getGenerator()->getArtPos();

        // bestimmt die maximal zu updatende Anzahl Artikel
        $iMaxPos = oxRegistry::getConfig()->getRequestParameter('iMaxPos');
        if (!$iMaxPos) {
            // nicht betroffene Artikel auf aktuelles Datum setzen
            $iMaxPos = $this->d3getGenerator()->getMaxUpdatePos();
        }

        $iProcessedArticles = $this->d3getGenerator()->updateArticles();

        if ($iProcessedArticles > 0) {
            $iNewPos = $iArtPos + $iProcessedArticles;

            $aParams = array(
                'cl'      => __CLASS__,
                'fnc'     => __FUNCTION__,
                'iArtPos' => $iNewPos,
                'iMaxPos' => $iMaxPos,
                'type'    => oxRegistry::getConfig()->getRequestParameter('type')
            );
            $sURL    = $oD3Utils->getAdminClassUrl($aParams);

            $this->showProcessingInfos($iArtPos, $iMaxPos, $sURL);
        } else {
            echo "<html><head><title>Finished!</title></head><body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'><br><br>$iArtPos article(s) processed<br>Finished!<br><a href='#' onClick='window.close();'>close window</a></body></html>";
        }

        oxRegistry::getConfig()->pageClose();
        stopProfile(__METHOD__);
        die();
    }

    /**
     * there is no ticker
     */
    public function generatePhoneticStringsExt()
    {
        startProfile(__METHOD__);

        ignore_user_abort(true);
        $iTimeLimit = oxRegistry::getConfig()->getRequestParameter('iTimeLimit') ?
            oxRegistry::getConfig()->getRequestParameter('iTimeLimit') :
            30;
        @set_time_limit($iTimeLimit);

        $blMsg      = oxRegistry::getConfig()->getRequestParameter('blMsg');
        $iProcessedArticles = $this->d3getGenerator()->updateArticles(0, TRUE);

        if (strtoupper($blMsg) == 'TRUE') {
            echo <<<OUTPUT
                <html>
                    <head>
                        <title>Finished!</title>
                    </head>
                    <body>
                        <br>
                        <br>
                        $iProcessedArticles article(s) processed<br>
                        Finished!<br>
                        <a href='#' onClick='window.close();'>close window</a>
                    </body>
                </html>
OUTPUT;
        }

        oxRegistry::getConfig()->pageClose();
        stopProfile(__METHOD__);
        die();
    }


    /**
     * @param $sArtPos
     * @param $iMaxPos
     * @param $sURL
     */
    public function showProcessingInfos($sArtPos, $iMaxPos, $sURL)
    {
        startProfile(__METHOD__);

        $iProcessedPercent = 0;
        if ($sArtPos > 0) {
            $iPercent          = 100 / $iMaxPos * $sArtPos;
            $iProcessedPercent = floor($iPercent);
        }

        stopProfile(__METHOD__);

        echo <<<OUTPUT
        <html>
        <head>
        <title>Processing
OUTPUT;
        if ($sArtPos > 0) {
            echo " ".$iProcessedPercent . "%";
        }
        echo <<<OUTPUT
        </title>
        <meta http-equiv="refresh" content="0; URL=$sURL">
        </head>
        <body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'>
        <br>
        <br>
        Processing: $sArtPos / $iMaxPos article(s)<br>
OUTPUT;
        if ($sArtPos > 0) {
            echo <<<OUTPUT
            <br>
            <div style='position: relative; background-color:#B4D2F5; border:1px solid #000000; height:15px; margin:auto auto auto 10px; width:100px;'>
OUTPUT;
            echo "<div style='background-color:#1A4782; height:15px; width:".$iProcessedPercent."px;'></div>";
            echo <<<OUTPUT
            <div style='border-style: none; color: white; line-height:15px; position:absolute; text-align:center; top:0; width:100px;'>$iProcessedPercent % finished</div>
            </div>
OUTPUT;
        }
        echo <<<OUTPUT
        <br><span style='font-weight: bold;'>Please wait...</span>
        </body></html>
OUTPUT;
        stopProfile(__METHOD__);
    }

    /**
     * Generiert aus jedem Semantic-Lexikoneintrag den phonetischen Code
     */
    public function generatePhoneticSemantic()
    {
        startProfile(__METHOD__);

        /** @var d3utils $oD3Utils */
        $oD3Utils = oxRegistry::get('d3utils');

        $iTermPos  = oxRegistry::getConfig()->getRequestParameter('iTermPos');
        if (!$iTermPos) {
            $iTermPos = 0;
        }

        $iMaxPos = oxRegistry::getConfig()->getRequestParameter('iMaxPos');
        if (!$iMaxPos) {
            $iMaxPos = $this->d3getGenerator()->getMaxSemanticUpdatePos();
        }

        $iProcessedTerms = $this->d3getGenerator()->updateSemantics($iTermPos);

        if ($iProcessedTerms > 0) {
            $iNewPos = $iTermPos + $iProcessedTerms;

            $aParams = array(
                'cl'       => __CLASS__,
                'fnc'      => __FUNCTION__,
                'iTermPos' => $iNewPos,
                'iMaxPos'  => $iMaxPos,
            );
            $sURL    = $oD3Utils->getAdminClassUrl($aParams);

            $this->showProcessingSemanticInfos($iTermPos, $iMaxPos, $sURL);

        } else {
            echo "<html><head><title>Finished!</title></head><body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'><br><br>$iTermPos term(s) processed<br>Finished!<br><a href='#' onClick='window.close();'>close window</a></body></html>";
        }

        oxRegistry::getConfig()->pageClose();
        stopProfile(__METHOD__);
        die();
    }

    /**
     * @param $iTermPos
     * @param $iMaxPos
     * @param $sURL
     */
    public function showProcessingSemanticInfos($iTermPos, $iMaxPos, $sURL)
    {
        $iProcessedPercent = 0;
        if ($iTermPos > 0) {
            $iPercent          = 100 / $iMaxPos * $iTermPos;
            $iProcessedPercent = floor($iPercent);
        }

        echo <<<OUTPUT
        <html>
        <head>
        <title>Processing
OUTPUT;
        if ($iTermPos > 0) {
            echo " ".$iProcessedPercent . "%";
        }
        echo <<<OUTPUT
            </title>
            <meta http-equiv="refresh" content="0; URL=$sURL">
            </head>
            <body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'>
                <br><br>Processing: $iTermPos / $iMaxPos term(s)<br>
OUTPUT;
        if ($iTermPos > 0) {
            echo <<<OUTPUT
                <br>
                <div style='position: relative; background-color:#B4D2F5; border:1px solid #000000; height:15px; margin:auto auto auto 10px; width:100px;'>
OUTPUT;
            echo "<div style='background-color:#1A4782; height:15px; width:".$iProcessedPercent."px;'></div>";
            echo <<<OUTPUT
                <div style='border-style: none; color: white; line-height:15px; position:absolute; text-align:center; top:0; width:100px;'>$iProcessedPercent % finished</div>
                </div>
OUTPUT;
        }
        echo <<<OUTPUT
        <br><span style='font-weight: bold;'>Please wait...</span>
        </body></html>
OUTPUT;
    }

    public function startSortAnalysis()
    {
        $aParams = array(
            'cl'       => __CLASS__,
            'fnc'      => __FUNCTION__,
        );
        $sURL    = d3utils::getInstance()->getAdminClassUrl($aParams);
        $sHiddenSid = $this->getViewConfig()->getHiddenSid();
        $sClass = __CLASS__;
        $sFnc = __FUNCTION__;
        $sSearchParam = oxRegistry::getConfig()->getRequestParameter('searchparam');
        $sHeadline = oxRegistry::getLang()->translateString('D3_EXTSEARCH_MAIN_SORTDEBUG');
        $sSubmit = oxRegistry::getLang()->translateString('D3_EXTSEARCH_MAIN_SORTDEBUG_START');
        $sDesc = oxRegistry::getLang()->translateString('D3_EXTSEARCH_MAIN_SORTDEBUG_DESC');

        echo <<<OUTPUT
            <html>
                <head>
                    <title>$sHeadline</title>
                </head>
                <body style='font: 12px Trebuchet MS,Tahoma,Verdana,Arial,Helvetica,sans-serif;'>
            <form action="$sURL" style="float: left; margin-right: 5px;">
                $sHiddenSid
                <input type="hidden" name="cl" value="$sClass">
                <input type="hidden" name="fnc" value="$sFnc">
                <input type="text" name="searchparam" value="$sSearchParam"> <input type="submit" value="$sSubmit">
            </form>
            $sDesc
            <hr style="clear: both; float: none;">
OUTPUT;

        if (oxRegistry::getConfig()->getRequestParameter('searchparam'))
        {
            /** @var d3_oxsearch_extsearch $oSearch */
            $oSearch = oxNew('oxsearch');
            $aAllList = $oSearch->d3GetPriorityDebugArticleList();
            $aAllKeys = array_keys($aAllList);
            $aAllowedFields = array('oxartnum', 'oxtitle', 'oxvarselect', 'd3push', 'd3priority');
            $aUsedFields = array();

            if (count($aAllList))
            {
                foreach ($aAllList[$aAllKeys[0]] as $sFieldName => $sFieldsContent)
                {
                    if (in_array(strtolower($sFieldName), $aAllowedFields) || strstr($sFieldName, '_IN_'))
                    {
                        $aUsedFields[] = $sFieldName;
                    }
                }
            }

            echo <<<OUTPUT
                <table cellspacing='0' style='font-size: 10px; border: 1px solid silver;'>
                <tr>
                    <td style='font-weight: bold; padding: 2px; border: 1px solid black; '>No:</td>
OUTPUT;
            foreach ($aUsedFields as $sUsedField)
            {
                echo "<td style='font-weight: bold; padding: 2px; border: 1px solid black; '>".$sUsedField."</td>";
            }
            echo "</tr>";
            $iLineCount = 1;
            foreach ($aAllList as $aItem)
            {
                echo "<tr>";
                echo "<td style='border: 1px solid silver;'>$iLineCount</td>";
                foreach ($aItem as $sKey => $sItem)
                {
                    if (in_array($sKey, $aUsedFields))
                    {
                        if (!$sItem)
                        {
                            $sItem = "&nbsp;";
                        }
                        echo "<td style='border: 1px solid silver;'>$sItem</td>";
                    }
                }
                echo "</tr>";
                $iLineCount++;

                if ($iLineCount % 20 == 0)
                {
                    echo "<td style='font-weight: bold; padding: 2px; border: 1px solid black; '>No:</td>";
                    foreach ($aUsedFields as $sUsedField)
                    {
                        echo "<td style='font-weight: bold; padding: 2px; border: 1px solid black; '>".$sUsedField."</td>";
                    }
                }
            }
            echo "</table>";
        }

        echo "</body></html>";
        oxRegistry::getConfig()->pageClose();
        die();
    }

    /**
     * @return bool
     */
    public function hasSemanticLexicon()
    {
        startProfile(__METHOD__);

        $oDataBase    = d3database::getInstance();
        $blTableExist = $oDataBase->checkTableExist('d3_extsearch_term');

        stopProfile(__METHOD__);

        return $blTableExist;
    }

    public function save()
    {
        startProfile(__METHOD__);

        parent::save();

        $myConfig = oxRegistry::getConfig();
        $sShopId  = oxRegistry::getConfig()->getShopId();

        $aConfVars = oxRegistry::getConfig()->getRequestParameter('confbools');

        if (is_array($aConfVars)) {
            foreach ($aConfVars as $sName => $sValue) {
                $myConfig->saveShopConfVar(
                    'bool',
                    $sName,
                    $sValue,
                    $sShopId
                );
            }
        }

        stopProfile(__METHOD__);
    }

    /**
     * @return int
     */
    public function getArticleCountPerTick()
    {
        return $this->d3getGenerator()->getArticleCountPerTick();
    }

    /**
     * @return array
     */
    public function getPhoneticLanguages()
    {
        return $this->d3getGenerator()->getPhoneticLanguages();
    }
}