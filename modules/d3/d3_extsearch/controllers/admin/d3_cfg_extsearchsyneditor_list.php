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

class d3_cfg_extsearchsyneditor_list extends d3_cfg_mod_list
{
    protected $_blD3ShowLangSwitch = TRUE;
    protected $_sThisTemplate = 'd3_cfg_extsearchsyneditor_list.tpl';
    protected $_sListClass = 'd3_extsearch_term';
    /** @var oxlist */
    protected $_oList;
    protected $_blEmployMultilanguage;
    protected $_sDefSortField = 'normalized_word';
    protected $_sDefSortOrder = 'asc';

    /**
     * @return null|string
     */
    public function render()
    {
        if ($this->hasSemanticLexicon())
        {
            $sRet = parent::render();
        }
        else
        {
            $sRet = $this->_sThisTemplate;
        }

        $this->addTplParam("default_edit", "d3_cfg_extsearchsyneditor_main");
        // assign our list
        //$this->addTplParam('mylist', $this->getItemList());
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

    /**
     * @param array  $aWhere
     * @param string $sSql
     * @return string
     */
    protected function _prepareWhereQuery($aWhere, $sSql)
    {
        $sSql = parent::_prepareWhereQuery($aWhere, $sSql);

        if (method_exists($this, 'getItemListBaseObject'))
        {
            $sSql .= " AND (" . $this->getItemListBaseObject()->getCoreTableName() . ".word != '') ";
        }
        else
        {
            $sSql .= " AND (" . $this->_oList->getBaseObject()->getCoreTableName() . ".word != '') ";
        }

        return $sSql;
    }
}