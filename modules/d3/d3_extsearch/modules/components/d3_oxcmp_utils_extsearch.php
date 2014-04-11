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

class d3_oxcmp_utils_extsearch extends d3_oxcmp_utils_extsearch_parent
{
    private $_sModId = 'd3_extsearch';

    public $blIsComponent = true;

    protected $_sOldPluginName = 'se_browserinstall.xml';

    public $aArtExtendsFields = array('oxlongdesc', 'oxtags');

    protected $_d3SimilarQuickSearch;

    public $oD3SearchHandler;

    public $oD3oxSearchHandler;

    /**
     * constructor
     */
    public function __construct()
    {
        // required for parent class method check
        $this->setClassName('oxcmp_utils');

        $oD3Utils = oxRegistry::get('d3utils');
        if ($oD3Utils->hasParentClassMethod($this, '__construct')) {
            parent::__construct();
        }
    }

    public function init()
    {
        parent::init();

        if (!$this->isAdmin()) {
            if ($this->_d3GetSet()->isActive()) {
                /** @var $oParentView oxview */
                $oParentView = $this->getParent();
                $oParentView->addTplParam('blD3ShowIAS', $this->_d3GetSet()->getValue('blExtSearch_ShowIAS'));
                $oParentView->addTplParam('blD3EmptySearch', $this->_d3GetSet()->getValue('blExtSearch_emptySearch'));
                $oParentView->addTplParam('blD3ShowSearchPopup', $this->_d3GetSet()->getValue('blExtSearch_ShowPopup'));
                $oParentView->addTplParam('sSearchPluginURL', $this->_d3GetSearchPluginUrl());
                $oParentView->addTplParam('oD3ExtSearchCmpUtils', $this);
                // UID, um das Autoausfuellen durch die Browser zu verhindern
                if ($this->_d3GetSet()->getValue('blExtSearch_enableAjaxSearch')) {
                    $oParentView->addTplParam('sSearchFieldName', oxUtilsObject::getInstance()->generateUID());
                }
            }
        }
    }

    /**
     * @return mixed
     */
    public function render()
    {
        $ret = parent::render();

        if (!$this->isAdmin() && $this->_d3GetSet()->isActive()) {
            /** @var $oParentView oxview */
            $oParentView = $this->getParent();
            $oParentView->addTplParam(
                'blSearchPluginInstall',
                $this->_d3GetSet()->getValue('blExtSearch_enablePluginBrowserInstall')
            );
            $oParentView->addTplParam('blOwnFormFields', $this->_d3GetSet()->getValue('blExtSearch_ownFormFields'));
        }

        if (!$this->isAdmin() && $this->_d3GetSet()->isActive() && $this->_d3GetSet()->getValue(
            'blExtSearch_enableAjaxSearch'
        )
        ) {
            /** @var $oParentView oxview */
            $oParentView = $this->getParent();
            $oParentView->addTplParam('sD3QSWaitMessage', $this->_getD3SearchHandler()->suggestGetWaitMessage());
        }

        return $ret;
    }

    /**
     * @return d3_cfg_mod
     */
    private function _d3GetSet()
    {
        return d3_cfg_mod::get($this->_d3getModId());
    }

    /**
     * @return string
     */
    private function _d3getModId()
    {
        return $this->_sModId;
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

    /**
     * performance, use a class wide instance
     *
     * @return d3_oxsearch_extsearch
     */
    protected function d3GetSearchHandler()
    {
        if (!$this->oD3oxSearchHandler) {
            $this->oD3oxSearchHandler = oxNew('oxsearch');
        }

        return $this->oD3oxSearchHandler;
    }

    /**
     * @param $sFieldName
     *
     * @return bool
     */
    public function getOwnFormFieldIsValue($sFieldName)
    {
        return $this->_getOwnFormFieldValue(d3_ext_search::OWNFIELD_IS, $sFieldName);
    }

    /**
     * @param $sFieldName
     *
     * @return bool
     */
    public function getOwnFormFieldLikeValue($sFieldName)
    {
        return $this->_getOwnFormFieldValue(d3_ext_search::OWNFIELD_LIKE, $sFieldName);
    }

    /**
     * @param string $sType
     * @param        $sFieldName
     *
     * @return bool
     */
    protected function _getOwnFormFieldValue($sType = d3_ext_search::OWNFIELD_IS, $sFieldName)
    {
        if ($sType == d3_ext_search::OWNFIELD_IS)
        {
            $aOwnFormField = $this->d3GetSearchHandler()->getOwnFormFieldIs();
        }
        else
        {
            $aOwnFormField = $this->d3GetSearchHandler()->getOwnFormFieldLike();
        }

        if (array_key_exists($sFieldName, $aOwnFormField))
        {
            return implode(' ', $aOwnFormField[$sFieldName]);
        }

        return false;
    }

    /**
     * generates article list for browsers search engines
     */
    public function d3_browser_suggest()
    {
        // zwingend, um die Gültigkeit des Dokuments sicherzustellen
        // fängt Fehlausgaben anderer Module ab
        ob_end_clean();

        // we don't require a complete object
        $blOldFullObject = $this->_d3GetSet()->getValue('blExtSearch_QuickSearchLoadFullObject');
        $this->_d3GetSet()->setValue('blExtSearch_QuickSearchLoadFullObject', false);

        echo $this->_getD3SearchHandler()->browserSuggestGetContent();

        // restore setting
        $this->_d3GetSet()->setValue('blExtSearch_QuickSearchLoadFullObject', $blOldFullObject);

        oxRegistry::getConfig()->pageClose();
        die();
    }

    /**
     * @return bool|string
     */
    protected function _d3GetSearchPluginUrl()
    {
        $oShop = oxRegistry::getConfig()->getActiveShop();

        $oFS = oxNew('d3filesystem');
        if ($oFS->exists(
            $oFS->trailingslashit(oxRegistry::getConfig()->getConfigParam('sShopDir')) . $this->_sOldPluginName
        )
        ) {
            $sFileName = $this->_sOldPluginName;
        } else {
            $sPattern  = "[^a-zA-Z0-9]";
            $sFileName = 'searchplugin_' . strtolower(
                preg_replace('@' . $sPattern . '@', '_', $oShop->getFieldData('oxname'))
            ) . ".xml";
        }

        $sURI  = $oFS->trailingslashit(oxRegistry::getConfig()->getConfigParam('sShopURL')) . $sFileName;
        $sPath = $oFS->trailingslashit(oxRegistry::getConfig()->getConfigParam('sShopDir')) . $sFileName;

        if ($oFS->exists($sPath)) {
            return $sURI;
        }

        return false;
    }
}