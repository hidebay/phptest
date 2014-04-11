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

class d3_cfg_extsearchsyneditor_synset extends d3_cfg_mod_main
{
    protected $_sThisTemplate = 'd3_cfg_extsearchsyneditor_synset.tpl';
    protected $_sModId = 'd3_extsearch';
    protected $_aNonIndexedFields = array('oxartnum');
    protected $_blUseOwnOxid = TRUE;
    public $sSearchTerm;
    public $sAction;
    public $sSynsetId;
    protected $_sSavedId;
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

        $oTerm = oxNew('d3_extsearch_term');
        if ($soxId && $soxId != "-1")
        {
            $oTerm->load($soxId);
        }

        $oSynset = oxNew('oxbase');
        $oSynset->init('d3_extsearch_synset');

        if ($soxId && $soxId != "-1")
        {
            $oSynset->load($oTerm->getFieldData('synset_id'));
        }

        $oSyn2Cat = oxNew('oxbase');
        $oSyn2Cat->init('d3_extsearch_category_link');
        $oSemantic = oxNew('d3_semantic');

        $aS2CIds = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($oSemantic->addCategory2SynsetTable(
            "SELECT " . oxDb::getDb()->quote($oSynset->getId()) . " as synsetid"));

        if ($aS2CIds[0][0] != '' AND $aS2CIds[0][0] !== NULL)
        {
            $oSyn2Cat->load($aS2CIds[0][0]);
        }

        $this->addTplParam('edit', $oTerm);
        $this->addTplParam('synset', $oSynset);
        $this->addTplParam('syn2cat', $oSyn2Cat);

        return $sRet;
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

        $oSynset2Category = oxNew('oxbase');
        $oSynset2Category->init('d3_extsearch_category_link');

        $oSemantic = oxNew('d3_semantic');
        $aS2CIds   = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($oSemantic->addCategory2SynsetTable(
            "SELECT " . oxDb::getDb()->quote($aParams['d3_extsearch_category_link__synset_id']) . " as synsetid"));

        if ($aS2CIds[0][0] != '' AND $aS2CIds[0][0] !== NULL)
        {
            $oSynset2Category->load($aS2CIds[0][0]);
        }
        else
        {
            $oSynset2Category->setId();
        }

        $oSynset2Category->assign($aParams);
        $oSynset2Category->save();

        $oSynset = oxNew('d3_extsearch_synset');
        if ($aParams['d3_extsearch_category_link__synset_id'])
        {
            $oSynset->load($aParams['d3_extsearch_category_link__synset_id']);
        }
        else
        {
            $oSynset->setId();
        }

        $oSynset->assign($aParams);
        $oSynset->save();

        if (method_exists($this, 'setEditObjectId'))
        {
            $this->setEditObjectId($oSynset->getId());
        }
        elseif ($soxId == "-1")
        {
            $this->_sSavedId = $oSynset->getId();
        }
    }

    /**
     * @param $aParams
     * @return mixed
     */
    public function addDefaultValues($aParams)
    {
        return $aParams;
    }

    /**
     * @return mixed
     */
    public function getCategoryList()
    {
        $oSemantic = oxNew('d3_semantic');
        return $oSemantic->getCategoryList();
    }

    /**
     * @param $binValue
     * @return int
     */
    public function convertBin2Int($binValue)
    {
        return ord($binValue);
    }
}