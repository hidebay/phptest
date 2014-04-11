<?PHP

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

class d3_article_list_extsearch extends d3_article_list_extsearch_parent
{
    private $_sModId = 'd3_extsearch';

    /**
     * @return string
     */
    public function render()
    {
        $sRet = parent::render();

        if ($this->_d3GetSet()->getValue('blExtSearch_adminShowVariants')) {
            if (!in_array('oxvarselect', $this->getViewDataElement("pwrsearchfields"))) {
                $aSearchFields   = $this->getViewDataElement("pwrsearchfields");
                $aSearchFields[] = 'oxvarselect';
                $this->addTplParam("pwrsearchfields", $aSearchFields);
            }
        }

        return $sRet;
    }

    /**
     * @return d3_cfg_mod
     */
    protected function _d3GetSet()
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
     * @param oxarticle $oListObject
     *
     * @return mixed|string
     */
    protected function _buildSelectString($oListObject = NULL)
    {
        $sSql = parent::_buildSelectString($oListObject);

        // wenn für Admin Variantensuche
        if ($this->_d3GetSet()->isActive() && $this->_d3GetSet()->getValue(
            'blExtSearch_adminShowVariants'
        ) && $this->_d3IsSearch()
        ) {
            $sReplSearch = array(
                'from ' . $oListObject->getViewName(),
                ", " . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxtitle',
                    '',
                    $oListObject
                ),
                ", " . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxvarselect',
                    '',
                    $oListObject
                )
            );

            $sReplReplacement = array(
                'from ' . $oListObject->getViewName() . ' LEFT JOIN ' . $oListObject->getViewName(
                ) . ' oxp ON ' . $oListObject->getViewName() . '.oxparentid = oxp.oxid',
                ', if(' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxparentid',
                    '',
                    $oListObject
                ) . ', CONCAT(oxp.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxtitle',
                    '',
                    $oListObject
                ) . '," ",' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxvarselect',
                    '',
                    $oListObject
                ) . '),' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxtitle',
                    '',
                    $oListObject
                ) . ') as oxtitle',
                ', if(' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxparentid',
                    '',
                    $oListObject
                ) . ', CONCAT(oxp.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxtitle',
                    '',
                    $oListObject
                ) . '," ",' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxvarselect',
                    '',
                    $oListObject
                ) . '),' . $oListObject->getViewName() . '.' . oxRegistry::get('d3utils')->getMultiLangFieldName(
                    'oxvarselect',
                    '',
                    $oListObject
                ) . ') as oxvarselect'
            );

            $sSql = str_replace($sReplSearch, $sReplReplacement, $sSql);
        }

        return $sSql;
    }

    /**
     * Adding empty parent check
     *
     * @param array  $aWhere SQL condition array
     * @param string $sQ     SQL query string
     *
     * @return mixed|string
     */
    protected function _prepareWhereQuery($aWhere, $sQ)
    {
        $sQ = parent::_prepareWhereQuery($aWhere, $sQ);

        // wenn für Admin Variantensuche
        if ($this->_d3GetSet()->isActive() && $this->_d3GetSet()->getValue(
            'blExtSearch_adminShowVariants'
        ) && $this->_d3IsSearch()
        ) {
            $oArticle         = oxNew('oxarticle');
            $aReplSearch      = array(" and " . getViewName('oxarticles') . ".oxparentid = '' ");
            $aReplReplacement = array('');

            $sSearchKey    = strtolower(getViewName('oxarticles')) . '.' . oxRegistry::get(
                'd3utils'
            )->getMultiLangFieldName('oxtitle', '', $oArticle);
            $aLowerWhere   = array_change_key_case($aWhere);
            $aKeys         = array_keys($aLowerWhere);
            $aOrgKeys      = array_keys($aWhere);
            $sIdent        = array_search($sSearchKey, $aKeys);
            $sOrgSearchKey = $aOrgKeys[$sIdent];

            if (in_array($sSearchKey, $aKeys)) {
                $aReplSearch[]      = '( ' . $sOrgSearchKey . "  like '" . $aWhere[$sOrgSearchKey] . "'  )";
                $aReplReplacement[] = '( ' . $sOrgSearchKey . " like '" . $aWhere[$sOrgSearchKey] . "' OR oxp." . oxRegistry::get(
                    'd3utils'
                )->getMultiLangFieldName('oxtitle', '', $oArticle) . " LIKE '" . $aWhere[$sOrgSearchKey] . "' )";
            }

            $sQ = str_replace($aReplSearch, $aReplReplacement, $sQ);
        }

        return $sQ;
    }

    /**
     * Sets articles sorting by category.
     *
     * @param string $sSql  sql string
     *
     * @return string
     */
    protected function _changeselect($sSql)
    {
        $sSql = parent::_changeselect($sSql);

        $sType  = false;
        $sValue = false;

        // wenn für Admin Variantensuche
        if ($this->_d3GetSet()->isActive() && $this->_d3GetSet()->getValue(
                'blExtSearch_adminShowVariants'
            ) && $this->_d3IsSearch()
        ) {
            $sArtCat = oxRegistry::getConfig()->getRequestParameter("art_category");
            if ($sArtCat && strstr($sArtCat, "@@") !== false) {
                list($sType, $sValue) = explode("@@", $sArtCat);
            } elseif ($sArtCat) {
                $sValue = $sArtCat;
                $sType  = 'cat';
            }

            $sTable = getViewName("oxarticles");

            // D3 pattern changed
            $sPattern = "from\s+$sTable\s+(.*?)\s{0,1}where";

            switch ($sType) {
                // add category
                case 'cat':
                    /** @var $oStr oxStrMb */
                    $oStr     = getStr();
                    $sO2CView = getViewName("oxobject2category");
                    // d3 sumatch added again (\\1)
                    $sLJAdd = strstr(
                        $sSql,
                        $sO2CView
                    ) ? '' : " LEFT JOIN $sO2CView ON $sTable.oxid = $sO2CView.oxobjectid ";
                    // 2012-07-04 changed to lowercase, because OXID regexp doesn't match uppercase :(
                    $sInsert = "from $sTable \\1 $sLJAdd where $sO2CView.oxcatnid = " . oxDb::getDb()->quote(
                        $sValue
                    ) . " AND ";
                    // D3 pattern changed
                    $sSql = $oStr->preg_replace("/$sPattern/i", $sInsert, $sSql);
                    break;
                // add category
                case 'mnf':
                    $sSql .= " and $sTable.oxmanufacturerid = " . oxDb::getDb()->quote($sValue);
                    break;
                // add vendor
                case 'vnd':
                    $sSql .= " and $sTable.oxvendorid = " . oxDb::getDb()->quote($sValue);
                    break;
            }
        }

        return $sSql;
    }

    /**
     * @return bool
     */
    protected function _d3IsSearch()
    {
        if ($this->_d3GetSet()->getFieldData('oxactive') && $aWhere = oxRegistry::getConfig()->getRequestParameter(
            'where'
        )
        ) {
            if (is_array($aWhere)) {
                $aWhere = $aWhere['oxarticles'];

                foreach ($aWhere as $sValue) {
                    if ($sValue && is_string($sValue) && strlen($sValue)) {
                        return true;
                    }
                }
            }

            return false;
        } else {
            return false;
        }
    }
}