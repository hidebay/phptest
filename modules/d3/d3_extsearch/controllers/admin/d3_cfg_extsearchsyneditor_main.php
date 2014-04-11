<?php

//TODO: _getMultiLangFieldNames testet auch MultiLang-Felder mit _X
//TODO: SQLs mglw. auslagern

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

class d3_cfg_extsearchsyneditor_Main extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_extsearchsyneditor_main.tpl';
    protected $_sModId = 'd3_extsearch';
    protected $_aNonIndexedFields = array('oxartnum');
    protected $_sSavedId = NULL;
    protected $_blUseOwnOxid = TRUE;
    public $sSearchTerm;
    public $sAction;
    public $sSynsetId;
    public $aSynList;
    protected $_aNaviItems = array(
        'new' => array(
            'sScript' => 'top.oxid.admin.editThis( -1 );return false;',
            'sTranslationId' => 'D3_EXTSEARCH_SYNED_MAIN_NEWWORD',
        ),
    );

    /**
     * @return null
     */
    public function init()
    {
        $this->sSearchTerm = oxRegistry::getConfig()->getRequestParameter('searchterm');
        $this->sAction     = oxRegistry::getConfig()->getRequestParameter('action');
        $this->sSynsetId   = oxRegistry::getConfig()->getRequestParameter('synsetid');
        return parent::init();
    }

    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        $oTerm = new stdClass;

        if ($this->hasSemanticLexicon())
        {
            /** @var $oTerm d3_extsearch_term */
            $oTerm = oxNew('d3_extsearch_term');
            $this->addTplParam('edit', $oTerm);
        }
        else
        {
            $this->_aNaviItems = array();
        }

        if (method_exists($this, 'getEditObjectId'))
        {
            $soxId = $this->getEditObjectId();
        }
        else
        {
            $soxId = oxRegistry::getConfig()->getRequestParameter("oxid");
            $this->addTplParam("oxid", $soxId);

            // check if we right now saved a new entry
            if ($this->_sSavedId)
            {
                $soxId = $this->_sSavedId;
                $this->addTplParam("oxid", $soxId);

                // for reloading upper frame
                $this->addTplParam("updatelist", "1");
            }
        }

        if ($soxId && $soxId != "-1")
        {
            // load object
            if (!$oTerm instanceof d3_extsearch_term && !($oTerm->load($soxId)))
            {
                $soxId = '-1';
                $this->addTplParam('oxid', $soxId);
            }
            else
            {
                $oTerm->load($soxId);
            }
        }

        return $sRet;
    }

    /**
     * @return bool
     */
    public function hasSemanticLexicon()
    {
        $oDataBase = d3database::getInstance();
        return $oDataBase->checkTableExist('d3_extsearch_term');
    }

    public function save()
    {
        if (method_exists($this, 'getEditObjectId'))
        {
            $soxId = $this->getEditObjectId();
        }
        else
        {
            $soxId = oxRegistry::getConfig()->getRequestParameter("oxid");
        }

        $aParams = oxRegistry::getConfig()->getRequestParameter("editval");

        // default values
        $aParams = $this->addDefaultValues($aParams);

        $oTerm = oxNew("d3_extsearch_term");
        $oTerm->setLanguage($this->_iEditLang);

        if ($soxId != "-1")
        {
            $oTerm->loadInLang($this->_iEditLang, $soxId);
        }
        else
        {
            $aParams['d3_extsearch_term__oxid']      = NULL;
            $aParams['d3_extsearch_term__synset_id'] = $this->getNextSynsetId();
        }

        $oTerm->setLanguage(0);

        //triming spaces from article title (M:876)
        $aParams['d3_extsearch_term__word']            = trim($aParams['d3_extsearch_term__word']);
        $aParams['d3_extsearch_term__normalized_word'] = trim($aParams['d3_extsearch_term__normalized_word']);

        $oTerm->assign($aParams);
        $oTerm->setLanguage($this->_iEditLang);
        $oTerm->save();

        if (method_exists($this, 'setEditObjectId'))
        {
            $this->setEditObjectId($oTerm->getId());
        }
        elseif ($soxId == "-1")
        {
            $this->_sSavedId = $oTerm->getId();
        }
    }

    /**
     * @param $aParams
     * @return mixed
     */
    public function addDefaultValues($aParams)
    {
        $aParams['d3_extsearch_term__version'] = 0;
        if (is_null($aParams['d3_extsearch_term__level_id']))
        {
            $aParams['d3_extsearch_term__level_id'] = '';
        }

        return $aParams;
    }

    /**
     * @return mixed
     */
    public function getLanguageList()
    {
        $oSemantic = oxNew('d3_semantic');
        return $oSemantic->getLanguageList();
    }

    /**
     * @return mixed
     */
    public function getGrammarList()
    {
        /** @var $oSemantic d3_semantic */
        $oSemantic = oxNew('d3_semantic');
        return $oSemantic->getGrammarList();
    }

    /**
     * @return mixed
     */
    public function getLevelList()
    {
        $oSemantic = oxNew('d3_semantic');
        return $oSemantic->getLevelList();
    }

    /**
     * @return mixed
     */
    public function getNextSynsetId()
    {
        $oSemantic = oxNew('d3_semantic');
        return $oSemantic->getNextSynsetId();
    }

    /**
     * @param $binValue
     * @return int
     */
    public function convertBin2Int($binValue)
    {
        return ord($binValue);
    }

    public function searchSynonymLists()
    {
        $oSemantic      = oxNew('d3_semantic');
        $this->aSynList = $oSemantic->getSynonymListsForWord($this->sSearchTerm);
    }

    /**
     * @return mixed
     */
    public function getSynonymLists()
    {
        return $this->aSynList;
    }

    /**
     * @return mixed
     */
    public function getSearchTerm()
    {
        return $this->sSearchTerm;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->sAction;
    }

    /**
     * @return mixed
     */
    public function getSynsetId()
    {
        return $this->sSynsetId;
    }

    /**
     * @param bool $sSynsetId
     * @param bool $sTerm
     */
    public function doAddTerm($sSynsetId = FALSE, $sTerm = FALSE)
    {
        $sSynsetId = $sSynsetId ? $sSynsetId : oxRegistry::getConfig()->getRequestParameter('SynsetId');
        $sNewTerm  = $sTerm ? $sTerm : oxRegistry::getConfig()->getRequestParameter('newTerm');

        $oSemantic = oxNew('d3_semantic');
        $oSemantic->addTermToSynset($sSynsetId, $sNewTerm);
    }

    public function doAddSynset()
    {
        $sBaseTerm = oxRegistry::getConfig()->getRequestParameter('newBaseTerm');

        $oSemantic = oxNew('d3_semantic');
        $sSynsetId = $oSemantic->addSynset();

        foreach (explode(',', $sBaseTerm) as $sTerm)
            $this->doAddTerm($sSynsetId, $sTerm);
    }
}