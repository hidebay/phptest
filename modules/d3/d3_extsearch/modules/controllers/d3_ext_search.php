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

/**
 * extends the OXID default search by adding error tolerance and further filters
 */
class d3_ext_search extends d3_ext_search_parent
{
    const OWNFIELD_IS = 'is';
    const OWNFIELD_LIKE = 'like';

    // default log type
    private $_sModId = 'd3_extsearch'; // in ModCfg used module ident
    protected $_iAllArtCnt = 0;

    protected $_iCntPages = null;

    protected $_sD3AdditionalParams = null;

    public $oD3SearchHandler = null;

    public $oD3OwnSearchHandler = null;

    public $aPriceSteps;

    public $oRegularyArtList;

    /** @var oxCategoryList */
    public $oSearchCatList;

    protected $_aBlockRedirectParams = array();

    public $aPriceSelector;

    public $sPriceSelector;

    protected $_aSortColumns;

    public $aSearchContentList;

    public $aSearchVendorList = array();

    public $aSearchManufacturerList = array();

    public $aSearchAttribList;

    public $aSearchAttributeList;

    /** @var oxVendorList */
    public $oSearchVendorList;

    /** @var oxManufacturerList */
    public $oSearchManufacturerList;

    public $blSearchFilterParam;

    public $sFilterParam;

    public $oIndexList;

    protected $_aD3AdditionalSearchParams = array('filterparam');

    /**
     * Search title
     * @var string
     */
    protected $_sSearchTitle = null;

    /** @var  d3_oxarticlelist_extsearch */
    protected $_aArticleList;

    /**
     *
     */
    public function __construct()
    {
        // prepare standard differed parameters, because AJAX search use permanent a new fieldname to avoid the browsers auto fill
        $sFieldName = str_replace('.', '_', oxRegistry::getConfig()->getRequestParameter('searchfieldname'));
        if (!oxRegistry::getConfig()->getRequestParameter('searchparam')) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST['searchparam'] = html_entity_decode(
                    trim(oxRegistry::getConfig()->getRequestParameter($sFieldName))
                );
            } else {
                $_GET['searchparam'] = html_entity_decode(
                    trim(oxRegistry::getConfig()->getRequestParameter($sFieldName))
                );
            }
        }

        $oD3Utils = oxRegistry::get('d3utils');
        if ($oD3Utils->hasParentClassMethod($this, '__construct')) {
            parent::__construct();
        }
    }

    /**
     * @return null
     */
    public function init()
    {
        $this->_d3CheckEmptySearchParam();

        // contains the default search calls
        $sRet = parent::init();

        if ($this->d3GetSet()->isActive()) {
            // if search string is empty and empty string is allowed
            if ($this->isEmptySearch() == true && $sRet == false && $this->d3GetSet()->getValue(
                    'blExtSearch_emptySearch'
                )
            ) {
                $this->_d3PerformEmptySearch();
            }

            $this->_d3AddAllTplParams();

            // writes search items into oxlog table, if set
            $this->_handleLogging();

            // get related CMS contents and write log
            if ($this->d3GetSet()->getValue('blExtSearch_showContentList')) {
                $this->_getCMSList();
            }

            // check for one hit, then redirect to article page
            $this->_directShowCheck();

            // handle all own form fields
            $this->_getOwnFormField();

            // handle all basic parameters
            $this->_setD3AdditionalSearchParams();

            // get all index bar related values
            if ($this->d3GetSet()->getValue('blExtSearch_showFilterParam') && $this->_iAllArtCnt) {
                $this->_getIndexLetters();
            }

            // calculate price steps
            if ($this->d3GetSet()->getValue('blExtSearch_showPriceSelector') && $this->_iAllArtCnt) {
                $this->_getPriceSteps();
            }

            // get all hits assigned categories and it's informations
            if ($this->_d3CheckForCategoryList()) {
                $this->_getCategoryList();
            }

            // generate vendor list by hits, if vendors are enabled and search filter activated
            if ($this->d3GetSet()->getValue('blExtSearch_showVendorList') && $this->_iAllArtCnt) {
                $this->_getVendorList();
            }

            // generate manufacturer list by hits, if manufactures are enabled and search filter activated
            if ($this->d3GetSet()->getValue('blExtSearch_showManufacturerList') && oxRegistry::getConfig(
                )->getConfigParam('bl_perfLoadManufacturerTree') && $this->_iAllArtCnt
            ) {
                $this->_getManufacturerList();
            }

            // build attribute list by hits
            if ($this->d3GetSet()->getValue('blExtSearch_showAttributeList') && $this->_iAllArtCnt) {
                $this->_getAttributeFilters();
                $this->_getAttributeList();
            }
        }

        $this->_sThisAction = "search";

        return $sRet;
    }

    protected function _d3CheckEmptySearchParam()
    {
        if ($this->d3GetSet()->isActive()) {
            // performance: disable imposible SEO generating from search url, must set before parent::init()
            $this->_aBlockRedirectParams[] = 'searchparam';

            // if searchstr is description text
            if ($this->getSearchParam() == oxRegistry::getLang()->translateString('D3_EXTSEARCH_FIELD_NOTICE')) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $_POST['searchparam'] = '';
                } else {
                    $_GET['searchparam'] = '';
                }
            }
        }
    }

    /**
     * @return bool
     */
    protected function _d3CheckForCategoryList()
    {
        if ($this->d3GetSet()->getValue('blExtSearch_showCatList') && ($this->_iAllArtCnt || ($this->d3GetSet(
                    )->getValue('blExtSearch_emptySearch') && $this->d3GetSet()->getValue(
                        'blExtSearch_catSearch'
                    ) && $this->d3GetSet()->getValue('sExtSearch_showCatArticles') == 'catinlist'))
        ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * restart the search methods
     */
    protected function _d3PerformEmptySearch()
    {
        /** @var $oSearchList oxarticlelist */
        $oSearchList = $this->_d3GetSearchHandler()->getSearchArticles(
            $this->getSearchParam(),
            $this->getSearchCatId(),
            $this->getSearchVendor(),
            $this->getSearchManufacturer(),
            $this->getSortingSql($this->getSortIdent())
        );

        // skip count calculation if no articles in list found
        if ($oSearchList->count()) {
            $this->_iAllArtCnt = $this->_d3GetSearchHandler()->getSearchArticleCount(
                $this->getSearchParam(),
                $this->getSearchCatId(),
                $this->getSearchVendor(),
                $this->getSearchManufacturer()
            );
        } else {
            $this->_iAllArtCnt = 0;
        }

        // list of found articles ... and it's counter
        $this->_aArticleList = $oSearchList;

        // calculate the page navigation values
        $iNrofCatArticles = (int)oxRegistry::getConfig()->getConfigParam('iNrofCatArticles');
        $iNrofCatArticles = $iNrofCatArticles ? $iNrofCatArticles : 1;
        $this->_iCntPages = round($this->_iAllArtCnt / $iNrofCatArticles + 0.49);
    }

    protected function _d3AddAllTplParams()
    {
        // set TPL paramter, if category and vendor selectlists on frontends left side shouldn't changed
        if (oxRegistry::getConfig()->getRequestParameter('isextsearch') == 'true') {
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . '&isextsearch=true'
            );
            $this->addTplParam('isextsearch', 'true');
        }

        // set price selection params
        $this->d3GetPriceSelectors();

        // add price selectors parameter to url variables
        if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                $this->aPriceSelector
            )
        ) {
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . "&amp;priceselector=" . urlencode(
                    implode('-', $this->aPriceSelector)
                )
            );
        } elseif ($this->sPriceSelector) {
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . "&amp;priceselector=" . urlencode($this->sPriceSelector)
            );
        }

        // send browser plugin status to smarty
        $this->addTplParam('blSearchPluginLink', $this->d3GetSet()->getValue('blExtSearch_enablePluginLink'));
    }

    /**
     * @return d3_cfg_mod
     */
    public function d3GetSet()
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
     * @return array
     */
    public function getSortColumns()
    {
        $this->_aSortColumns = parent::getSortColumns();
        $aPriorityAlias      = array();

        if (method_exists($this->_d3GetSearchHandler(), 'd3getPriorityAlias')) {
            $aPriorityAlias = $this->_d3GetSearchHandler()->d3getPriorityAlias();
        }

        if ($this->d3GetSet()->isActive() && $this->d3GetSet()->getValue('blExtSearch_orderByPriority') && !in_array(
                $aPriorityAlias['sortby'],
                $this->_aSortColumns
            )
        ) {
            $this->_aSortColumns[] = $aPriorityAlias['sortby'];
        }

        return $this->_aSortColumns;
    }

    /**
     * @param $oSearchHandler
     */
    public function d3SetSearchHandler($oSearchHandler)
    {
        $this->oD3SearchHandler = $oSearchHandler;
    }

    /**
     * performance, use a class wide instance
     *
     * @return d3_oxsearch_extsearch
     */
    protected function _d3GetSearchHandler()
    {
        if (!$this->oD3SearchHandler) {
            $this->oD3SearchHandler = oxNew('oxsearch');
        }

        return $this->oD3SearchHandler;
    }

    /**
     * performance, use a class wide instance
     *
     * @return d3_search
     */
    protected function _d3GetOwnSearchHandler()
    {
        if (!$this->oD3OwnSearchHandler) {
            $this->oD3OwnSearchHandler = oxNew('d3_search');
        }

        return $this->oD3OwnSearchHandler;
    }

    /**
     * adds modul generated log items
     * there is no oxlogs core class
     */
    protected function _handleLogging()
    {
        startProfile('extSearch::logging');

        $sUpdate = null;
        $sTime   = null;
        $aParams = array();
        $sShopID = oxRegistry::getConfig()->getShopId();
        $sSid    = oxRegistry::getSession()->getId();

        // set new log items
        if (($this->d3GetSet()->getValue('blExtSearch_generallyLogForSearch')) || $this->d3GetSet()->getValue(
                'blExtSearch_logHitless'
            ) && $this->_iAllArtCnt === 0
        ) {
            $sTime     = date('Y-m-d H:i:s');
            $sUserID   = oxRegistry::getSession()->getVariable('usr');
            $sCnid     = oxRegistry::getConfig()->getRequestParameter('cnid');
            $iArtCount = $this->_d3GetSearchHandler()->getSearchRegularyArticleCount(
                $this->getSearchParam(),
                $this->getSearchCatId(),
                $this->getSearchVendor(),
                $this->getSearchManufacturer(),
                $this->getSortingSql($this->getSortIdent())
            );

            if ($this->getSearchCatId()) {
                $aParams['cat'] = $this->getSearchCatId();
            }
            if ($this->getSearchVendor()) {
                $aParams['vnd'] = $this->getSearchVendor();
            }
            if ($this->getSearchManufacturer()) {
                $aParams['mnf'] = $this->getSearchManufacturer();
            }
            if ($this->_d3GetSearchHandler()->getOwnFormFieldLike()) {
                $aParams['ownlike'] = $this->_d3GetSearchHandler()->getOwnFormFieldLike();
            }
            if ($this->_d3GetSearchHandler()->getOwnFormFieldIs()) {
                $aParams['ownis'] = $this->_d3GetSearchHandler()->getOwnFormFieldIs();
            }
            if ($this->_d3GetSearchHandler()->getAttributeFilters()) {
                $aParams['attr'] = $this->_d3GetSearchHandler()->getAttributeFilters();
            }
            if (oxRegistry::getConfig()->getRequestParameter('filterparam')) {
                $aParams['lttr'] = oxRegistry::getConfig()->getRequestParameter('filterparam');
            }
            if (oxRegistry::getConfig()->getRequestParameter('priceselector')) {
                $aParams['price'] = oxRegistry::getConfig()->getRequestParameter('priceselector');
            }

            $sUpdate = "INSERT INTO oxlogs (oxtime, oxshopid, oxuserid, oxsessid, oxclass, oxcnid, d3count, oxparameter) VALUES ('" . $sTime . "', '" . $sShopID . "', '" . $sUserID . "', '" . $sSid . "', 'search', '" . $sCnid . "','" . $iArtCount . "', " . oxDb::getDb(
                )->quote(urldecode($this->getSearchParam())) . ");";
        }

        if ($sUpdate) {
            oxDb::getDb()->Execute($sUpdate);

            if ($this->d3GetSet()->d3getLog() && count($aParams)) {
                $iOldLogType = $this->d3GetSet()->d3getLog()->getLogType();
                $this->d3GetSet()->d3getLog()->setLogType($this->d3GetSet()->d3getLog()->addLogType(d3log::INFO));
                $this->d3GetSet()->d3getLog()->log(
                    d3log::INFO,
                    __CLASS__,
                    __FUNCTION__,
                    __LINE__,
                    $sTime,
                    serialize($aParams)
                );
                $this->d3GetSet()->d3getLog()->setLogType($iOldLogType);
            }
        }

        stopProfile('extSearch::logging');
    }

    /**
     * check for one hit, then redirect to articles details page
     */
    protected function _directShowCheck()
    {
        if (oxRegistry::getConfig()->getRequestParameter('d3avoiddirectshow') == 1) {
            return;
        }

        if ($this->d3GetSet()->getValue('blExtSearch_goToUniqueHit') && $this->_iAllArtCnt == 1 && !count(
                $this->aSearchContentList
            )
        ) {
            // get key list to detect the first (and once) article in list
            $aArticleList = $this->_aArticleList->getArray();
            $aKeys = $this->_getKeyList($aArticleList);
            // get SEO url for redirect
            /** @var $oArticle oxarticle */
            $oArticle = $aArticleList[$aKeys[0]];
            $this->_d3GetOwnSearchHandler()->performDirectShow(NULL, NULL, $oArticle);
        } elseif ($this->d3GetSet()->getValue('blExtSearch_goToUniqueHit') && !$this->_iAllArtCnt && is_array(
                $this->aSearchContentList
            ) && count($this->aSearchContentList) == '1'
        ) {
            $aKeys = $this->_getKeyList($this->aSearchContentList);
            // get SEO url for redirect
            /** @var $oContent oxcontent */
            $oContent = $this->aSearchContentList[$aKeys[0]];
            $this->_d3GetOwnSearchHandler()->performDirectShow(NULL, NULL, $oContent);
        } elseif ($this->d3GetSet()->getValue(
                'blExtSearch_goToUniqueHit'
            ) && !$this->_iAllArtCnt && $this->_getSearchVendorList() && count($this->aSearchVendorList) == '1'
        ) {
            $aKeys = $this->_getKeyList($this->aSearchVendorList);
            $this->_d3GetOwnSearchHandler()->performDirectShow($this->aSearchVendorList[$aKeys[0]], 'oxvendor');
        } elseif ($this->d3GetSet()->getValue(
                'blExtSearch_goToUniqueHit'
            ) && !$this->_iAllArtCnt && $this->_getSearchManufacturerList() && count(
                $this->aSearchManufacturerList
            ) == '1'
        ) {
            $aKeys = $this->_getKeyList($this->aSearchManufacturerList);
            $this->_d3GetOwnSearchHandler()->performDirectShow($this->aSearchManufacturerList[$aKeys[0]], 'oxmanufacturer');
        }
    }

    /**
     * defines the presentment type, disabled in admin panel
     *
     * @return string
     */
    public function getSearchViewListType()
    {
        if ($this->d3GetSet()->getValue('sExtSearch_ListType')) {
            return $this->d3GetSet()->getValue('sExtSearch_ListType');
        }

        return 'dropdown';
    }

    /**
     * generates a hit related category list and its further informations (counters etc.)
     */
    protected function _getCategoryList()
    {
        // if not all categories were shown, set state in session (shop wide access required)
        if (oxRegistry::getConfig()->getRequestParameter('showall_categories') == '1') {
            oxRegistry::getSession()->setVariable('showall_categories', '1');
        } elseif (oxRegistry::getConfig()->getRequestParameter('showall_categories') == '0') {
            oxRegistry::getSession()->setVariable('showall_categories', '0');
        }

        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating category list"
            );
        }

        // calls database query execution
        $this->oSearchCatList = $this->_d3GetSearchHandler()->getSearchCategories($this->oRegularyArtList);

        // decides, if an "extend" button (or a "less" button) is required for category list view
        if ($this->getSearchViewListType() == 'linklist' && $this->oSearchCatList && $this->oSearchCatList->count(
            ) == $this->d3GetSet()->getValue('iExtSearch_smallListItems')
        ) {
            // "more" button required
            $this->addTplParam('limitedCatSearch', true);
        } elseif ($this->getSearchViewListType() == 'linklist' && $this->oSearchCatList && $this->oSearchCatList->count(
            ) > $this->d3GetSet()->getValue('iExtSearch_smallListItems')
        ) {
            // "less" button required
            $this->addTplParam('limitedCatButton', true);
        }

        // get category name, if one is selected
        if ($this->getSearchCatId()) {
            $this->addTplParam(
                'sSelectedCat',
                $this->_d3GetOwnSearchHandler()->getCategoryTitle($this->getSearchCatId())
            );
            $this->addTplParam('sSelectedCatId', $this->getSearchCatId());
        }
    }

    /**
     * Template variable getter. Returns hits related category list (generating in $this->_getCategoryList())
     *
     * @return oxcategorylist
     */
    public function d3GetCategoryList()
    {
        if (isset($this->oSearchCatList) && $this->oSearchCatList && $this->oSearchCatList instanceof oxCategoryList && $this->oSearchCatList->count(
            )
        ) {
            return $this->oSearchCatList;
        }

        $oCatList = oxNew('oxcategorylist');

        return $oCatList;
    }

    /**
     * generates a hit related attribute list
     */
    protected function _getAttributeList()
    {
        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating attribute list"
            );
        }

        // calls database query execution
        $this->aSearchAttribList = $this->_d3GetSearchHandler()->getSearchAttributes($this->oRegularyArtList);
    }

    /**
     * Template variable getter. Returns hits related attribute list (generating in $this->_getAttributeList())
     *
     * @return array
     */
    public function d3GetAttributeList()
    {
        if (isset($this->aSearchAttribList) && $this->aSearchAttribList && count($this->aSearchAttribList)) {
            return $this->aSearchAttribList;
        }

        return array();
    }

    /**
     * generates a hit related vendor list and its further informations (counters etc.)
     */
    protected function _getVendorList()
    {
        // if not all vendors were shown, set state in session (shop wide access required)
        if (oxRegistry::getConfig()->getRequestParameter('showall_vendors') == '1') {
            oxRegistry::getSession()->setVariable('showall_vendors', '1');
        } elseif (oxRegistry::getConfig()->getRequestParameter('showall_vendors') == '0') {
            oxRegistry::getSession()->setVariable('showall_vendors', '0');
        }

        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getValue('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating vendor list"
            );
        }

        // calls database query execution
        $this->oSearchVendorList = $this->_d3GetSearchHandler()->getSearchVendors($this->oRegularyArtList);

        // decides, if an "extend" button (or a "less" button) is required for vendor list view
        if ($this->getSearchViewListType() == 'linklist' && $this->oSearchVendorList && $this->oSearchVendorList->count(
            ) == $this->d3GetSet()->getValue('iExtSearch_smallListItems')
        ) {
            // "more" button required
            $this->addTplParam('limitedVendorSearch', true);
        } elseif ($this->getSearchViewListType(
            ) == 'linklist' && $this->oSearchVendorList && $this->oSearchVendorList->count() > $this->d3GetSet(
            )->getValue(
                'iExtSearch_smallListItems'
            )
        ) {
            // "less" button required
            $this->addTplParam('limitedVendorButton', true);
        }

        // get vendors name, if one is selected
        if ($this->getSearchVendor()) {
            $this->addTplParam(
                'sSelectedVendor',
                $this->_d3GetOwnSearchHandler()->getVendorTitle($this->getSearchVendor())
            );
            $this->addTplParam('sSelectedVendorId', $this->getSearchVendor());
        }
    }

    /**
     * Template variable getter. Returns hits related vendor list (generating in $this->_getVendorList() above)
     *
     * @return oxvendorlist
     */
    public function d3GetVendorList()
    {
        if (isset($this->oSearchVendorList) && $this->oSearchVendorList && $this->oSearchVendorList instanceof oxVendorList && $this->oSearchVendorList->count(
            )
        ) {
            return $this->oSearchVendorList;
        }

        $oVendorList = oxNew('oxvendorlist');

        return $oVendorList;
    }

    /**
     * generates a hit related manufacturer list and its further informations (counters etc.)
     */
    protected function _getManufacturerList()
    {
        // if not all manufacturers were shown, set state in session (shop wide access required)
        if (oxRegistry::getConfig()->getRequestParameter('showall_manufacturers') == '1') {
            oxRegistry::getSession()->setVariable('showall_manufacturers', '1');
        } elseif (oxRegistry::getConfig()->getRequestParameter('showall_manufacturers') == '0') {
            oxRegistry::getSession()->setVariable('showall_manufacturers', '0');
        }

        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating manufacturer list"
            );
        }

        // calls database query execution
        $this->oSearchManufacturerList = $this->_d3GetSearchHandler()->getSearchManufacturers($this->oRegularyArtList);

        // decides, if an "extend" button (or a "less" button) is required for manufacturer list view
        if ($this->getSearchViewListType(
            ) == 'linklist' && $this->oSearchManufacturerList && $this->oSearchManufacturerList->count(
            ) == $this->d3GetSet()->getValue('iExtSearch_smallListItems')
        ) {
            // "more" button required
            $this->addTplParam('limitedManufacturerSearch', true);
        } elseif ($this->getSearchViewListType(
            ) == 'linklist' && $this->oSearchManufacturerList && $this->oSearchManufacturerList->count(
            ) > $this->d3GetSet()->getValue('iExtSearch_smallListItems')
        ) {
            // "less" button required
            $this->addTplParam('limitedManufacturerButton', true);
        }

        // get manufacturers name, if one is selected
        if ($this->getSearchManufacturer()) {
            $this->addTplParam(
                'sSelectedManufacturer',
                $this->_d3GetOwnSearchHandler()->getManufacturerTitle($this->getSearchManufacturer())
            );
            $this->addTplParam(
                'sSelectedManufacturerId',
                $this->getSearchManufacturer()
            );
        }
    }

    /**
     * Template variable getter.  Returns hits related manufacturer list (generating in $this->_getManufacturerList() above)
     *
     * @return oxmanufacturerlist
     */
    public function d3GetManufacturerList()
    {
        if (isset($this->oSearchManufacturerList) && $this->oSearchManufacturerList && $this->oSearchManufacturerList instanceof oxManufacturerList && $this->oSearchManufacturerList->count(
            )
        ) {
            return $this->oSearchManufacturerList;
        }

        $oManufacturerList = oxNew('oxmanufacturerlist');

        return $oManufacturerList;
    }

    /**
     * generates a content list by given search parameter
     */
    protected function _getCMSList()
    {
        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(d3log::INFO, __CLASS__, __FUNCTION__, __LINE__, "", "generating CMS list");
        }

        // calls database query execution
        $this->aSearchContentList = $this->_d3GetSearchHandler()->getSearchContents();
    }

    /**
     * generates a vendor list by given search parameter
     */
    protected function _getSearchVendorList()
    {
        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating vendor list"
            );
        }

        // calls database query execution
        $this->aSearchVendorList = $this->_d3GetSearchHandler()->getVendorNameHits();

        return true;
    }

    /**
     * generates a manufacturer list by given search parameter
     */
    protected function _getSearchManufacturerList()
    {
        if ($this->d3GetSet()->d3getLog() && $this->d3GetSet()->getFieldData('oxismodulelog')) {
            $this->d3GetSet()->d3getLog()->log(
                d3log::INFO,
                __CLASS__,
                __FUNCTION__,
                __LINE__,
                "",
                "generating manufacturer list"
            );
        }

        // calls database query execution
        $this->aSearchManufacturerList = $this->_d3GetSearchHandler()->getManufacturerNameHits();

        return true;
    }

    /**
     * Template variable getter. Returns searched content list (generated in $this->_getCMSList() above)
     *
     * @return array
     */
    public function d3GetCMSList()
    {
        if (isset($this->aSearchContentList) && is_array($this->aSearchContentList) && count(
                $this->aSearchContentList
            )
        ) {
            return $this->aSearchContentList;
        }

        return array();
    }

    /**
     * extracts article list keys (articles oxId) from given list
     *
     * @param array $aList
     *
     * @return array
     */
    protected function _getKeyList($aList = array())
    {
        $aKeys = array();

        if (count($aList)) {
            foreach (array_keys($aList) as $key) {
                $aKeys[] = $key;
            }
        }

        return $aKeys;
    }

    /**
     * @return array
     */
    public function d3GetPriceSelectors()
    {
        $mPriceSelectors = oxRegistry::getConfig()->getRequestParameter('priceselector');

        if (is_array($mPriceSelectors)) {
            $this->aPriceSelector = $mPriceSelectors;
            foreach ($this->aPriceSelector as $sKey => $sValue) {
                $this->aPriceSelector[$sKey] = str_replace(',', '.', $sValue);
            }
        } else {
            $this->sPriceSelector = str_replace(',', '.', $mPriceSelectors);
        }

        $this->_setPriceSelectorValues();

        return array(
            'sPriceSelector' => $this->sPriceSelector,
            'aPriceSelector' => $this->aPriceSelector
        );
    }

    /**
     * set url extensions and smarty variables, if own form fields are used
     */
    protected function _getOwnFormField()
    {
        $this->_getOwnFormFieldLike();
        $this->_getOwnFormFieldIs();
    }

    /**
     * get "like" based form fields
     */
    protected function _getOwnFormFieldLike()
    {
        $aOwnFormFieldLike = $this->_d3GetSearchHandler()->getOwnFormFieldLike();

        foreach ($aOwnFormFieldLike as $key => $value) {
            if ($value) {
                if (is_array($value)) {
                    $value                   = implode(' ', $value);
                    $aOwnFormFieldLike[$key] = $value;
                }
                $sAddStr = "&amp;d3searchlike[$key]=" . urlencode($value);
                $this->_sD3AdditionalParams .= $sAddStr;
                $this->addTplParam('additionalparams', $this->getViewDataElement('additionalparams') . $sAddStr);
            }
        }
    }

    /**
     * get "is" based form fields
     */
    protected function _getOwnFormFieldIs()
    {
        $aOwnFormFieldIs = $this->_d3GetSearchHandler()->getOwnFormFieldIs();

        foreach ($aOwnFormFieldIs as $key => $value) {
            if ($value) {
                if (is_array($value)) {
                    $value                 = implode(' ', $value);
                    $aOwnFormFieldIs[$key] = $value;
                }
                $sAddStr = "&amp;d3searchis[$key]=" . urlencode($value);
                $this->_sD3AdditionalParams .= $sAddStr;
                $this->addTplParam('additionalparams', $this->getViewDataElement('additionalparams') . $sAddStr);
            }
        }
    }

    /**
     * set url extensions and smarty variables, if attributes are used
     */
    protected function _getAttributeFilters()
    {
        $aSelectedAttributes = $this->_d3GetSearchHandler()->getAttributeFilters();

        foreach ($aSelectedAttributes as $key => $value) {
            if (trim($value)) {
                $sAddStr = "&amp;d3searchattrib[$key]=" . urlencode(trim($value));
                $this->_sD3AdditionalParams .= $sAddStr;
                $this->addTplParam('additionalparams', $this->getViewDataElement('additionalparams') . $sAddStr);
            }
        }

        $this->addTplParam('aD3AttribFilters', $aSelectedAttributes);
    }

    /**
     * set url extensions and smarty variables, if index letter is chosen
     */
    protected function _setFilterParamValues()
    {
        $this->blSearchFilterParam = $this->d3GetSet()->getValue('blExtSearch_showFilterParam');

        $this->sFilterParam = oxRegistry::getConfig()->getRequestParameter('filterparam');
        if ($this->sFilterParam) {
            $this->addTplParam('d3filterparam', $this->sFilterParam);
            $this->_sD3AdditionalParams .= "&amp;filterparam=" . urlencode($this->sFilterParam);
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . "&amp;filterparam=" . urlencode($this->sFilterParam)
            );
        }
    }

    protected function _setD3AdditionalSearchParams()
    {
        if (is_array($this->getD3AdditionalSearchParamList()) && count($this->getD3AdditionalSearchParamList())) {
            foreach ($this->getD3AdditionalSearchParamList() as $sAddSearchParam) {
                if ($sAddSearchParam != 'filterparam') // has got a special handling
                {
                    $sParamValue = oxRegistry::getConfig()->getRequestParameter($sAddSearchParam);
                    if ($sParamValue) {
                        $this->addTplParam($sAddSearchParam, $sParamValue);
                        $this->_sD3AdditionalParams .= "&amp;" . $sAddSearchParam . "=" . urlencode($sParamValue);
                        $this->addTplParam(
                            'additionalparams',
                            $this->getViewDataElement(
                                'additionalparams'
                            ) . "&amp;" . $sAddSearchParam . "=" . urlencode($sParamValue)
                        );
                    }
                }
            }
        }
    }

    /**
     * set url extensions and smarty variables, if price selector is chosen
     */
    protected function _setPriceSelectorValues()
    {
        if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                $this->aPriceSelector
            )
        ) {
            $this->addTplParam(
                'submpriceselectors',
                array('min' => $this->aPriceSelector['min'] * 100, 'max' => $this->aPriceSelector['max'] * 100)
            );
            $this->addTplParam('priceselector', implode('-', $this->aPriceSelector));
            $this->_sD3AdditionalParams .= "&amp;priceselector=" . urlencode(implode('-', $this->aPriceSelector));
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . "&amp;priceselector=" . urlencode(
                    implode('-', $this->aPriceSelector)
                )
            );
        } elseif ($this->sPriceSelector) {
            $this->addTplParam('priceselector', $this->sPriceSelector);
            $this->_sD3AdditionalParams .= "&amp;priceselector=" . urlencode($this->sPriceSelector);
            $this->addTplParam(
                'additionalparams',
                $this->getViewDataElement('additionalparams') . "&amp;priceselector=" . urlencode($this->sPriceSelector)
            );
        }
    }

    /**
     * defines, if filter params are generated and it contains min. one
     */
    public function hasFilterParams()
    {
        if ($this->blSearchFilterParam && $this->oIndexList) {
            return true;
        }

        return false;
    }

    /**
     * gets first letters in database field of all hits
     */
    protected function _getIndexLetters()
    {
        $this->_setFilterParamValues();
        //        $this->_setPriceSelectorValues();
        $this->oIndexList = $this->_d3GetSearchHandler()->getIndexLetter(
            $this->getSearchParam(),
            $this->getSearchCatId(),
            $this->getSearchVendor(),
            $this->getSearchManufacturer(),
            $this->getSortingSql($this->getSortIdent()),
            $this->oRegularyArtList
        );
    }

    /**
     * checks, if commited letter is containing in generated indexlist (contains first letter occurence)
     *
     * @param string $sLetter
     *
     * @return bool
     */
    public function isHitForIndexLetter($sLetter)
    {
        if (is_array($this->oIndexList) && in_array(strtoupper($sLetter), $this->oIndexList) || $sLetter == 'all') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * extends all navigation URLs with modul specific parameters
     *
     * @param bool $blAddPageNr
     *
     * @return string
     */
    protected function _getRequestParams($blAddPageNr = true)
    {
        $sURL = parent::_getRequestParams($blAddPageNr);

        if ($this->d3GetSet()->isActive()) {
            // set filter params (index bar), if available
            $sFilterParam = oxRegistry::getConfig()->getRequestParameter('filterparam');
            if ($sFilterParam) {
                $sURL .= "&amp;filterparam=" . urlencode($sFilterParam);
            }

            // if own form fields are actived and used ("like" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldLike() as $key => $value) {
                if ($value) {
                    $sURL .= "&amp;d3searchlike[$key]=" . urlencode(implode(' ', $value));
                }
            }

            // if own form fields are actived and used ("is" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldIs() as $key => $value) {
                if ($value) {
                    $sURL .= "&amp;d3searchis[$key]=" . urlencode(implode(' ', $value));
                }
            }

            foreach ($this->_d3GetSearchHandler()->getAttributeFilters() as $key => $value) {
                if ($value) {
                    $sURL .= "&amp;d3searchattrib[$key]=" . urlencode($value);
                }
            }

            // adds used price selector values
            if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                    $this->aPriceSelector
                )
            ) {
                $sURL .= "&amp;priceselector=" . urlencode(implode('-', $this->aPriceSelector));
            } elseif ($this->sPriceSelector) {
                $sURL .= "&amp;priceselector=" . urlencode($this->sPriceSelector);
            }

            if (is_array($this->getD3AdditionalSearchParamList()) && count($this->getD3AdditionalSearchParamList())) {
                foreach ($this->getD3AdditionalSearchParamList() as $sAddSearchParam) {
                    $sParamValue = oxRegistry::getConfig()->getRequestParameter($sAddSearchParam);
                    if ($sParamValue) {
                        $sURL .= "&amp;" . $sAddSearchParam . "=" . urlencode($sParamValue);
                    }
                }
            }
        }

        return $sURL;
    }

    /**
     * Returns additional URL parameters which must be added to list products urls
     *
     * @return string
     */
    public function getAddUrlParams()
    {
        $sAddParams = parent::getAddUrlParams();

        $sAddParams .= $this->_d3AddBaseUrlParams();

        return $sAddParams;
    }

    /**
     * Returns array of params => values which are used in hidden forms and as additional url params
     *
     * @return array
     */
    public function getNavigationParams()
    {
        $aParams = parent::getNavigationParams();

        if ($this->d3GetSet()->isActive()) {
            $aParams['searchparam'] = htmlspecialchars(
                html_entity_decode(oxRegistry::getConfig()->getRequestParameter('searchparam'))
            );

            // if own form fields are actived and used ("like" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldLike() as $key => $value) {
                if ($value) {
                    if (is_array($value)) {
                        $value = implode(' ', $value);
                    }
                    $aParams['d3searchlike[' . $key . ']'] = urlencode($value);
                }
            }

            // if own form fields are actived and used ("is" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldIs() as $key => $value) {
                if ($value) {
                    if (is_array($value)) {
                        $value = implode(' ', $value);
                    }
                    $aParams['d3searchis[' . $key . ']'] = urlencode($value);
                }
            }

            // adds used price selector values
            if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                    $this->aPriceSelector
                )
            ) {
                $aParams['priceselector'] = implode('-', $this->aPriceSelector);
            } elseif ($this->sPriceSelector) {
                $aParams['priceselector'] = $this->sPriceSelector;
            }

            foreach ($this->_d3GetSearchHandler()->getAttributeFilters() as $key => $value) {
                if ($value) {
                    $aParams['d3searchattrib[' . $key . ']'] = urlencode($value);
                }
            }

            if (is_array($this->getD3AdditionalSearchParamList()) && count($this->getD3AdditionalSearchParamList())) {
                foreach ($this->getD3AdditionalSearchParamList() as $sAddSearchParam) {
                    $sParamValue = oxRegistry::getConfig()->getRequestParameter($sAddSearchParam);
                    if ($sParamValue) {
                        $aParams[$sAddSearchParam] = urlencode($sParamValue);
                    }
                }
            }
        }

        return $aParams;
    }

    /**
     * @return string
     */
    public function getAdditionalParams()
    {
        $this->_sAdditionalParams = parent::getAdditionalParams();

        if ($this->d3GetSet()->isActive()) {
            $this->_sAdditionalParams .= $this->_sD3AdditionalParams;

            if (!strstr($this->_sAdditionalParams, '&amp;isextsearch=true')) {
                $this->_sAdditionalParams .= '&amp;isextsearch=true';
            }
        }

        return $this->_sAdditionalParams;
    }

    /**
     * returns additional url params for dynamic url building
     *
     * @return string
     */
    public function getDynUrlParams()
    {
        $sRet = parent::getDynUrlParams();

        $sRet .= $this->_d3AddBaseUrlParams();

        return $sRet;
    }

    /**
     * @return string
     */
    protected function _d3AddBaseUrlParams()
    {
        $sRet = '';
        if ($this->d3GetSet()->isActive()) {
            // if own form fields are actived and used ("like" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldLike() as $key => $value) {
                if ($value) {
                    if (is_array($value)) {
                        $value = implode(' ', $value);
                    }
                    $sRet .= "&amp;d3searchlike[$key]=" . urlencode($value);
                }
            }

            // if own form fields are actived and used ("is" based search)
            foreach ($this->_d3GetSearchHandler()->getOwnFormFieldIs() as $key => $value) {
                if ($value) {
                    if (is_array($value)) {
                        $value = implode(' ', $value);
                    }
                    $sRet .= "&amp;d3searchis[$key]=" . urlencode($value);
                }
            }

            // adds used price selector values
            if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                    $this->aPriceSelector
                )
            ) {
                $sRet .= "&amp;priceselector=" . urlencode(implode('-', $this->aPriceSelector));
            } elseif ($this->sPriceSelector) {
                $sRet .= "&amp;priceselector=" . urlencode($this->sPriceSelector);
            }

            foreach ($this->_d3GetSearchHandler()->getAttributeFilters() as $key => $value) {
                if ($value) {
                    $sRet .= "&amp;d3searchattrib[$key]=" . urlencode($value);
                }
            }

            if (is_array($this->getD3AdditionalSearchParamList()) && count($this->getD3AdditionalSearchParamList())) {
                foreach ($this->getD3AdditionalSearchParamList() as $sAddSearchParam) {
                    $sParamValue = oxRegistry::getConfig()->getRequestParameter($sAddSearchParam);
                    if ($sParamValue) {
                        $sRet .= "&amp;" . $sAddSearchParam . "=" . urlencode($sParamValue);
                    }
                }
            }
        }

        return $sRet;
    }

    /**
     * @return array
     */
    public function getD3AdditionalSearchParamList()
    {
        return $this->_aD3AdditionalSearchParams;
    }

    /**
     * @param $sCnid
     *
     * @return array
     */
    public function getSorting($sCnid)
    {
        $aSorting = parent::getSorting($sCnid);

        if ($this->d3GetSet()->isActive() && !count($aSorting) && $this->d3GetSet()->getValue(
                'blExtSearch_orderByPriority'
            )
        ) {
            $aSorting = $this->_d3GetSearchHandler()->d3GetPriorityAlias();
        }

        if ($aSorting) {
            if (method_exists($this, 'setListOrderBy')) {
                $this->setListOrderBy($aSorting['sortby']);
            } else {
                $this->_sListOrderBy = $aSorting['sortby'];
            }

            if (method_exists($this, 'setListOrderDirection')) {
                $this->setListOrderDirection($aSorting['sortdir']);
            } else {
                $this->_sListOrderDir = $aSorting['sortdir'];
            }
        }

        return $aSorting;
    }

    /**
     * generates a hit related price step list
     */
    protected function _getPriceSteps()
    {
        $iArtListCount     = null;
        $this->aPriceSteps = $this->_d3GetSearchHandler()->getPriceSteps();
        // adds used price selector values
        if ($this->d3GetSet()->getValue('sExtSearch_PriceSelectorsDispType') == 'jqslider' && is_array(
                $this->aPriceSelector
            )
        ) {
            $this->addTplParam('sSelectedPriceStep', implode('-', $this->aPriceSelector));
        } elseif ($this->sPriceSelector) {
            $this->addTplParam('sSelectedPriceStep', $this->sPriceSelector);
        }
    }

    /**
     * Template variable getter. Returns price selector list (generated in $this->_getPriceSteps() above)
     *
     * @return array
     */
    public function d3getPriceSteps()
    {
        if (count($this->aPriceSteps)) {
            return $this->aPriceSteps;
        }

        return array();
    }

    /**
     * @return string
     */
    public function getPriceSliderInputMinValue()
    {
        $dMin               = 0;
        $aPriceSteps        = $this->d3getPriceSteps();
        $aSubmPriceSelector = $this->getViewParameter('submpriceselectors');
        if (count($aSubmPriceSelector) && $aSubmPriceSelector['min']) {
            $dMin = $aSubmPriceSelector['min'];
        } elseif (count($aPriceSteps)) {
            $dMin = $aPriceSteps[0];
        }

        $dMin = sprintf('%.2f', $dMin / 100);

        return $dMin;
    }

    /**
     * @return string
     */
    public function getPriceSliderInputMaxValue()
    {
        $dMax               = 0;
        $aPriceSteps        = $this->d3getPriceSteps();
        $aSubmPriceSelector = $this->getViewParameter('submpriceselectors');

        // per Formular gesetzte Werte
        if (count($aSubmPriceSelector) && $aSubmPriceSelector['max']) {
            $dMax = $aSubmPriceSelector['max'];
        } elseif (count($aPriceSteps)) {
            $dMax = $aPriceSteps[1];
        }

        $dMax = sprintf('%.2f', $dMax / 100);

        return $dMax;
    }

    /**
     * @return string
     */
    public function getPriceSliderInfoMinValue()
    {
        $dMin        = 0;
        $aPriceSteps = $this->d3getPriceSteps();
        if (count($aPriceSteps)) {
            $dMin = $aPriceSteps[0];
        }

        $dMin = sprintf('%.2f', $dMin / 100);

        return $dMin;
    }

    /**
     * @return string
     */
    public function getPriceSliderInfoMaxValue()
    {
        $dMax        = 0;
        $aPriceSteps = $this->d3getPriceSteps();

        if (count($aPriceSteps)) {
            $dMax = $aPriceSteps[1];
        }

        $dMax = sprintf('%.2f', $dMax / 100);

        return $dMax;
    }

    /**
     * set, if only similar hits are related or a combined article list (regular and similar articles) is returned
     *
     * @return bool|string
     */
    public function getSearchResultStatusMessage()
    {
        $blSimilar = false;
        $blRegular = false;

        if ($this->d3GetSet()->isActive()) {
            if ($this->_aArticleList) {
                foreach ($this->_aArticleList->getArray() as $oArticle) {
                    if ($oArticle->blIsSimilar) {
                        $blSimilar = true;
                    } else {
                        $blRegular = true;
                    }
                }
            }

            // if regular and similar articles (combined mode)
            if ($blRegular && $blSimilar) {
                return 'combined';
            } elseif ($blSimilar) {
                return 'similar';
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //TODO: while search for "Baterie" (wrong spelled "Batterie") is getFilteredSearchArray not filled
    /**
     * @return array|string
     */
    public function getUsedParams()
    {
        if (is_array($this->_d3GetSearchHandler()->getFilteredSearchArray())) {
            return implode(" ", $this->_d3GetSearchHandler()->getFilteredSearchArray());
        } elseif (is_string($this->_d3GetSearchHandler()->getFilteredSearchArray())) {
            return $this->_d3GetSearchHandler()->getFilteredSearchArray();
        }

        return '';
    }

    /**
     * @return bool
     */
    public function d3HasjQuerySlider()
    {
        if ($this->d3GetSet()->getValue('blExtSearch_showPriceSelector') && $this->d3GetSet()->getValue(
                'sExtSearch_PriceSelectorsDispType'
            ) == 'jqslider'
        ) {
            return true;
        }

        return false;
    }

    /**
     * @return array
     */
    public function d3getPriceLimits()
    {
        return $this->_d3GetSearchHandler()->getPriceLimits();
    }

    /**
     * @return string
     */
    public function _getSearchParamForHtml()
    {
        return htmlspecialchars_decode(parent::getSearchParamForHtml(), ENT_QUOTES);
    }

    /**
     * Returns page sort indentificator. It is used as intentificator in session variable aSorting[ident]
     *
     * @return string
     */
    public function getSortIdent()
    {
        if ($this->d3GetSet()->isActive()) {
            return 'd3extsearch';
        } else {
            return parent::getSortIdent();
        }
    }

    /**
     * Returns search title. It will be setted in oxLocator
     *
     * @return string
     */
    public function getSearchTitle()
    {
        return $this->_sSearchTitle;
    }

    /**
     * Returns search title setter
     *
     * @param string $sTitle search title
     *
     * @return null
     */
    public function setSearchTitle( $sTitle )
    {
        $this->_sSearchTitle = $sTitle;
    }
}