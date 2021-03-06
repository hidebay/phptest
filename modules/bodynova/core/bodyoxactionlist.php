<?php

class bodyoxactionlist extends bodyoxactionlist_parent
{
 	/**
     * load active shop banner list
     * BODYNOVA -> banner could now be used on start and category pages
     * 
     * this function lists all banners for the start page (categoryId = oxrootid)
     *
     * @return null
     */
    public function loadBanners()
    { 
        $oBaseObject = $this->getBaseObject();
        $oViewName = $oBaseObject->getViewName();
        $sQ = "select * from {$oViewName} where oxtype=3 and " . $oBaseObject->getSqlActiveSnippet()
            . " and oxshopid='" . $this->getConfig()->getShopId() . "' " . $this->_getUserGroupFilter()
            . " and bodycat='oxrootid'"
            . " order by oxsort";
        $this->selectString( $sQ );
    }
    
 	/**
     * load active shop banner list
     * BODYNOVA -> banner could now be used on start and category pages
     * 
     * this function lists all banners for the current category-page
     *
     * @param $sCurrentCat current categoryId
     * @return null
     */
    public function loadCatBanners($sCurrentCat)
    {
        $oBaseObject = $this->getBaseObject();
        $oViewName = $oBaseObject->getViewName();
        $sQ = "select * from {$oViewName} where oxtype=3 and " . $oBaseObject->getSqlActiveSnippet()
            . " and oxshopid='" . $this->getConfig()->getShopId() . "' " . $this->_getUserGroupFilter()
            . " and bodycat='".$sCurrentCat."'"
            . " order by oxsort";
        $this->selectString( $sQ );
    }
}

?>
