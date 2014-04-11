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

class d3_oxlocator_extsearch extends d3_oxlocator_extsearch_parent
{
    /** @var oxarticle */
    protected $_oNextProduct = null;

    /** @var oxarticle */
    protected $_oBackProduct = null;

    /** @var array */
    protected $_aD3Params = array();

    /**
     * @param d3_ext_search $oLocatorTarget
     * @param oxarticle $oCurrArticle
     *
     * @return null|void
     */
    protected function _setSearchLocatorData($oLocatorTarget, $oCurrArticle)
    {
        /** @var $oSearchCat oxcategory|stdClass */
        $oSearchCat = $oLocatorTarget->getActSearch();
        if ($oSearchCat) {
            // loading data for article navigation
            /** @var $oIdList oxarticlelist */
            $oIdList = oxNew('oxarticlelist');
            if ($oLocatorTarget->showSorting()) {
                $oLocatorTarget->getSorting($oLocatorTarget->getSortIdent());
                $oIdList->setCustomSorting($oLocatorTarget->getSortingSql($oLocatorTarget->getSortIdent()));
            }

            $oIdList->loadSearchIds(
                $this->_d3GetParamForSearch('searchparam', false),
                $this->_d3GetRawUrlParamForSearch('searchcnid'),
                $this->_d3GetRawUrlParamForSearch('searchvendor'),
                $this->_d3GetRawUrlParamForSearch('searchmanufacturer')
            );

            //page number
            $iPage = $this->_findActPageNumber($oLocatorTarget->getActPage(), $oIdList, $oCurrArticle);

            $sAddSearch = $this->_d3GetSearchUrlAdd();

            // setting product position in list, amount of articles etc
            $oSearchCat->iCntOfProd = $oIdList->count();
            $oSearchCat->iProductPos = $this->_getProductPos($oCurrArticle, $oIdList, $oLocatorTarget);

            $sPageNr = $this->_getPageNumber($iPage);
            $oSearchCat->toListLink =
                $this->_makeLink($oSearchCat->link, $sPageNr . ($sPageNr ? '&amp;' : '') . $sAddSearch);
            $oSearchCat->nextProductLink =
                $this->_oNextProduct ? $this->_makeLink($this->_oNextProduct->getLink(), $sAddSearch) : null;
            $oSearchCat->prevProductLink =
                $this->_oBackProduct ? $this->_makeLink($this->_oBackProduct->getLink(), $sAddSearch) : null;

            $sFormat = oxRegistry::getLang()->translateString('searchResult');
            $oLocatorTarget->setSearchTitle(sprintf($sFormat, $this->_d3GetParamForSearch('searchparam', true)));
            // for compatibility reasons for a while. will be removed in future
            $oLocatorTarget->addTplParam('sSearchTitle', $oLocatorTarget->getSearchTitle());

            if ($this->_d3GetRawUrlParamForSearch('searchparam')) {
                $oLocatorTarget->addTplParam('searchparam', $this->_d3GetRawUrlParamForSearch('searchparam'));
            }
            if ($this->_d3GetRawUrlParamForSearch('searchcnid')) {
                $oLocatorTarget->addTplParam('searchcnid', $this->_d3GetRawUrlParamForSearch('searchcnid'));
            }
            if ($this->_d3GetRawUrlParamForSearch('searchvendor')) {
                $oLocatorTarget->addTplParam('searchvendor', $this->_d3GetRawUrlParamForSearch('searchvendor'));
            }
            if ($this->_d3GetRawUrlParamForSearch('searchmanufacturer')) {
                $oLocatorTarget->addTplParam(
                    'searchmanufacturer',
                    $this->_d3GetRawUrlParamForSearch('searchmanufacturer')
                );
            }
            if ($this->_d3GetParamForSearch('searchparam', true)) {
                $oLocatorTarget->addTplParam('searchparamforhtml', $this->_d3GetParamForSearch('searchparam', true));
            }
            if ($this->_d3GetParamForSearch('d3searchlike', false)) {
                $oLocatorTarget->addTplParam(
                    'aD3OwnFormFieldsLike',
                    $this->_d3GetParamForSearch('d3searchlike', false)
                );
            }
            if ($this->_d3GetParamForSearch('d3searchis', false)) {
                $oLocatorTarget->addTplParam('aD3OwnFormFieldsIs', $this->_d3GetParamForSearch('d3searchis', false));
            }
            if ($this->_d3GetParamForSearch('filterparam', false)) {
                $oLocatorTarget->addTplParam('filterparam', $this->_d3GetParamForSearch('filterparam', false));
            }
            $oLocatorTarget->addTplParam('d3searchattribparam', '');

            $oSearchCat->toListLink = $oSearchCat->toListLink . '&amp;d3avoiddirectshow=1';

            $oLocatorTarget->setActiveCategory($oSearchCat);
            // for compatibility reasons for a while. will be removed in future
            $oLocatorTarget->addTplParam('actCategory', $oLocatorTarget->getActiveCategory());
        }
    }

    /**
     * @param      $sParamName
     * @param bool $blFormParam
     *
     * @return mixed
     */
    protected function _d3GetParamForSearch($sParamName, $blFormParam = false)
    {
        if (!$this->_aD3Params[$sParamName . $blFormParam]) {
            $this->_aD3Params[$sParamName . $blFormParam] = oxRegistry::getConfig()->getRequestParameter(
                $sParamName,
                $blFormParam
            );
        }

        return $this->_aD3Params[$sParamName . $blFormParam];
    }

    /**
     * @param $sParamName
     *
     * @return string
     */
    protected function _d3GetRawUrlParamForSearch($sParamName)
    {
        return rawurldecode($this->_d3GetParamForSearch($sParamName));
    }

    /**
     * @return string
     */
    protected function _d3GetSearchUrlAdd()
    {
        $sAddSearch = "searchparam=" . $this->_d3GetRawUrlParamForSearch('searchparam');
        if ($this->_d3GetRawUrlParamForSearch('searchcnid')) {
            $sAddSearch .= "&amp;searchcnid=" . $this->_d3GetRawUrlParamForSearch('searchcnid');
        }

        if ($this->_d3GetRawUrlParamForSearch('searchvendor')) {
            $sAddSearch .= "&amp;searchvendor=" . $this->_d3GetRawUrlParamForSearch('searchvendor');
        }

        if ($this->_d3GetRawUrlParamForSearch('searchmanufacturer')) {
            $sAddSearch .= "&amp;searchmanufacturer=" . $this->_d3GetRawUrlParamForSearch('searchmanufacturer');
        }

        if ($this->_d3GetParamForSearch('d3searchlike', false)) {
            foreach ($this->_d3GetParamForSearch('d3searchlike', false) as $key => $value) {
                $sAddSearch .= "&amp;d3searchlike[$key]=" . urlencode($value);
            }
        }

        if ($this->_d3GetParamForSearch('d3searchis', false)) {
            foreach ($this->_d3GetParamForSearch('d3searchis', false) as $key => $value) {
                $sAddSearch .= "&amp;d3searchis[$key]=" . urlencode($value);
            }
        }

        if ($this->_d3GetParamForSearch('filterparam', false)) {
            $sAddSearch .= "&amp;filterparam=" . $this->_d3GetParamForSearch('filterparam', false);
        }

        if ($this->_d3GetParamForSearch('d3searchattrib', false)) {
            foreach ($this->_d3GetParamForSearch('d3searchattrib', false) as $key => $value) {
                if ($value) {
                    $sAddSearch .= "&amp;d3searchattrib[$key]=" . urlencode($value);
                }
            }
        }

        return $sAddSearch;
    }
}