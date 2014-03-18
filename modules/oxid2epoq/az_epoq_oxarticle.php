<?php
/**
 * Support methods / fixes for the epoq product catalog export.
 * 
 * @extend oxArticle
 * 
 * @author Robert Rosendahl, anzido GmbH <entwicklung@anzido.com>
 * @copyright 2011 anzido GmbH
 */
class az_epoq_oxarticle extends az_epoq_oxarticle_parent
{
    /**
     * Epoq product catalog export flag
     * @see getParentArticle
     * @var boolean
     */
    public $blAzIsEpoqCatalogExport;

    /**
     * Cached parent products for the epoq product catalog export
     * @see getParentArticle
     * @var array
     */
    protected static $_aAzEpoqLoadedParents = array();


    /**
     * Returns the parent article.
     * If this is called from within the epoq catalog export, then this method is fixed to return the parent article in the same language as the variant article.
     * 
     * @extend getParentArticle
     * 
     * @return oxArticle parent article
     */
    public function getParentArticle()
    {
        if ( $this->blAzIsEpoqCatalogExport ) {
            $sParentId = $this->oxarticles__oxparentid->value;
            $iLanguage = (int)$this->getLanguage();
            $sParentCacheKey = $sParentId . '##' . $iLanguage;
            if ( !isset( self::$_aAzEpoqLoadedParents[$sParentCacheKey] ) ) {
                // load and cache parent article in same language as this article:
                self::$_aAzEpoqLoadedParents[$sParentCacheKey] = oxNew( 'oxarticle' );
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->blAzIsEpoqCatalogExport = true;
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->setLanguage( $this->getLanguage() );
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->_blSkipAbPrice  = true;
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->_blLoadPrice    = false;
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->_blLoadVariants = false;
                self::$_aAzEpoqLoadedParents[$sParentCacheKey]->load( $sParentId );
            }
            return self::$_aAzEpoqLoadedParents[$sParentCacheKey];
        }
        
        return parent::getParentArticle();
    }
}