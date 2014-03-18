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
 * @version   SVN: $Id: details.php 42113 2012-02-09 15:05:26Z linas.kukulskis $
 */

/**
 * Special page for Credits
 * @package main
 */
class Credits extends Content
{
    /**
     * Content id.
     * @var string
     */
    protected $_sContentId = "oxcredits";

    /**
     * Returns active content id to load its seo meta info
     *
     * @return string
     */
    protected function _getSeoObjectId()
    {
        return $this->getContentId();
    }

    /**
     * Template variable getter. Returns active content
     *
     * @return object
     */
    public function getContent()
    {
        if ( $this->_oContent === null ) {
            $this->_oContent = false;
            $oContent = oxNew( 'oxcontent' );
            if ( $oContent->loadByIdent( $this->getContentId() ) ) {
                $this->_oContent = $oContent;
            }
        }

        return $this->_oContent;
    }
}