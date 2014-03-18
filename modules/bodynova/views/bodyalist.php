<?php

class bodyalist extends bodyalist_parent
{
    public function getBanners()
    {
	$oActCat = $this->getActCategory();
    	$sActCatId = $oActCat->oxcategories__oxid->value;
    	
	$oBannerList = null;
        if ( $this->getConfig()->getConfigParam('bl_perfLoadAktion') ) {
	        $oBannerList = oxNew('oxActionList');
	        $oBannerList->loadCatBanners($sActCatId);
        }

        return $oBannerList;
    }
}
