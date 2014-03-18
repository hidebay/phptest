<?php

/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link      http://www.oxid-esales.com
 * @package   views
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 */

/**
 * Recomendation list.
 * Forms recomendation list.
 */
class oxwRecommendation extends oxWidget
{
    /**
     * Names of components (classes) that are initiated and executed
     * before any other regular operation.
     * User component used in template.
     * @var array
     */
    protected $_aComponentNames = array( 'oxcmp_cur' => 1 );

    /**
     * Current class template name.
     * @var string
     */
    protected $_sThisTemplate = 'widget/sidebar/recommendation.tpl';

    /**
     * Returns similar recommendation list.
     *
     * @return array
     */
    function getSimilarRecommLists()
    {
        $aArticleIds = $this->getViewParameter( "aArticleIds" );

        $oRecommList = oxNew( 'oxrecommlist' );
        $aRecommList = $oRecommList->getRecommListsByIds( $aArticleIds );

        return $aRecommList;
    }

    /**
     * Return recomm list object.
     *
     * @return object
     */
    function getRecommList()
    {
        $oRecommList = oxNew( 'recommlist' );

        return $oRecommList;
    }
}
