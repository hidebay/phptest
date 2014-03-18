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
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 */

/**
 * Smarty function
 * -------------------------------------------------------------
 * Purpose: Output multilang string
 * add [{ oxmultilang ident="..." args=... }] where you want to display content
 * ident - language constant
 * args - array of argument that can be parsed to language constant threw %s
 * -------------------------------------------------------------
 *
 * @param array  $params  params
 * @param Smarty &$smarty clever simulation of a method
 *
 * @return string
*/
function smarty_function_oxmultilang( $params, &$smarty )
{
    startProfile("smarty_function_oxmultilang");
    $oLang = oxRegistry::getLang();
    $sIdent  = isset( $params['ident'] ) ? $params['ident'] : 'IDENT MISSING';
    $aArgs = isset( $params['args'] ) ? $params['args'] : 0 ;
    $sSuffix = isset( $params['suffix'] ) ? $params['suffix'] : 'NO_SUFFIX';

    $iLang   = null;
    $blAdmin = $oLang->isAdmin();

    if ( $blAdmin ) {
        $iLang = $oLang->getTplLanguage();
        if ( !isset( $iLang ) ) {
            $iLang = 0;
        }
    }

    try {
        $sTranslation = $oLang->translateString( $sIdent, $iLang, $blAdmin );
        if ( 'NO_SUFFIX' != $sSuffix ) {
            $sSuffixTranslation = $oLang->translateString( $sSuffix, $iLang, $blAdmin );
        }
    } catch ( oxLanguageException $oEx ) {
        // is thrown in debug mode and has to be caught here, as smarty hangs otherwise!
    }

    if ($blAdmin && $sTranslation == $sIdent && (!isset( $params['noerror']) || !$params['noerror']) ) {
        $sTranslation = '<b>ERROR : Translation for '.$sIdent.' not found!</b>';
    }

    if ( $sTranslation == $sIdent && isset( $params['alternative'] ) ) {
        $sTranslation = $params['alternative'];
    }

    if ( $aArgs ) {
        if ( is_array( $aArgs ) ) {
            $sTranslation = vsprintf( $sTranslation, $aArgs );
        } else {
            $sTranslation = sprintf( $sTranslation, $aArgs );
        }
    }

    stopProfile("smarty_function_oxmultilang");

    if ( 'NO_SUFFIX' != $sSuffix ) {
        $sTranslation .= $sSuffixTranslation;
    }
    return $sTranslation;
}
