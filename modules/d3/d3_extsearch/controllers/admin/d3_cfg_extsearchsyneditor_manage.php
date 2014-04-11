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

class d3_cfg_extsearchsyneditor_manage extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_extsearchsyneditor_manage.tpl';
    protected $_sModId = 'd3_extsearch';
    protected $_aNonIndexedFields = array('oxartnum');
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

        /** @var $oTerm d3_extsearch_term */
        $oTerm = oxNew('d3_extsearch_term');

        if (method_exists($this, 'getEditObjectId'))
        {
            $soxId = $this->getEditObjectId();
        }
        else
        {
            $soxId = oxRegistry::getConfig()->getRequestParameter("oxid");
        }

        if ($soxId && $soxId != "-1")
        {
            // load object
            $oTerm->load($soxId);
        }

        $this->addTplParam('aSynList', $oTerm->getSynonymArrayForSynsetId());
        $this->addTplParam('edit', $oTerm);

        return $sRet;
    }

    public function save()
    {
        $soxId   = $this->getEditObjectId();
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

        $this->setEditObjectId($oTerm->getId());
    }

    public function savesynonym()
    {
        $oTerm = oxNew('d3_extsearch_term');
        $oTerm->assign(oxRegistry::getConfig()->getRequestParameter('editval'));
        $oTerm->save();

        $this->addTplParam('updatelist', 1);
    }

    public function deletesynonym()
    {
        $oTerm = oxNew('d3_extsearch_term');
        $oTerm->delete(oxRegistry::getConfig()->getRequestParameter('deloxid'));

        $this->addTplParam('updatelist', 1);
    }

    /**
     * @param $aParams
     * @return mixed
     */
    public function addDefaultValues($aParams)
    {
        $aParams['d3_extsearch_term__version'] = 0;

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

    public function getSynonymLists()
    {
        return $this->aSynList;
    }

    public function getSearchTerm()
    {
        return $this->sSearchTerm;
    }

    public function getAction()
    {
        return $this->sAction;
    }

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