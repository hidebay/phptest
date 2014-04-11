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
 * @package   smarty_plugins
 * @copyright (C) OXID eSales AG 2003-2011
 * @version OXID eShop PE
 * @version   SVN: $Id: function.oxcontent.php 29602 2010-08-31 14:03:21Z sarunas $
 */

/**
 * Smarty plugin
 * -------------------------------------------------------------
 * File: insert.oxid_content.php
 * Type: string, html
 * Name: oxid_content
 * Purpose: Output content snippet
 * add [{ insert name="oxid_content" ident="..." }] where you want to display content
 * -------------------------------------------------------------
 *
 * @param array  $params  params
 * @param Smarty &$smarty clever simulation of a method
 *
 * @return string
 */
function smarty_function_d3getArticleFromOrderArticle( $params, &$smarty )
{
    $sArtId = $params['aid'];
    $oArticle = oxNew('oxarticle');
    $oArticle->Load($sArtId);

    if( isset( $params['assign']) && $params['assign'])
        $smarty->assign($params['assign'], $oArticle);
    else
        return "use assign param";

}
