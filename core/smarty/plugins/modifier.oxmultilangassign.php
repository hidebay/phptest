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
 * Purpose: Modifies provided language constant with it's translation
 * usage: [{ $val|oxmultilangassign}]
 * -------------------------------------------------------------
 *
 * @param string $sIdent language constant ident
 * @param mixed  $args   for constants using %s notations
 *
 * @return string
 */
function smarty_modifier_oxmultilangassign( $sIdent, $args = null )
{
    if ( !isset( $sIdent ) ) {
        $sIdent = 'IDENT MISSING';
    }

    $oLang = oxRegistry::getLang();
    $iLang = $oLang->getTplLanguage();

    if ( !isset( $iLang ) ) {
        $iLang = $oLang->getBaseLanguage();
        if ( !isset( $iLang ) ) {
            $iLang = 0;
        }
    }

    try {
        $sTranslation = $oLang->translateString( $sIdent, $iLang, $oLang->isAdmin() );
    } catch ( oxLanguageException $oEx ) {
        // is thrown in debug mode and has to be caught here, as smarty hangs otherwise!
    }

    if ( $sTranslation == $sIdent ) {
        $sTranslation = '<b>ERROR : Translation for '.$sIdent.' not found!</b>';
    }
    if ( $args ) {
        if ( is_array( $args ) ) {
            $sTranslation = vsprintf( $sTranslation, $args );
        } else {
            $sTranslation = sprintf( $sTranslation, $args );
        }
    }
    return $sTranslation;
}
