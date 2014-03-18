<?php
class troactions_main extends troactions_main_parent
{
    /**
     * Loads article actionss info, passes it to Smarty engine and
     * returns name of template file "actions_main.tpl".
     *
     * @return string
     */
    public function render()
    {
    	$myConfig  = $this->getConfig();
        oxAdminDetails::render();

        // check if we right now saved a new entry
        $soxId = $this->_aViewData["oxid"] = $this->getEditObjectId();
        if ( $soxId != "-1" && isset( $soxId)) {
            // load object
            $oAction = oxNew( "oxactions" );
            $oAction->loadInLang( $this->_iEditLang, $soxId);

            $oOtherLang = $oAction->getAvailableInLangs();
            if (!isset($oOtherLang[$this->_iEditLang])) {
                // echo "language entry doesn't exist! using: ".key($oOtherLang);
                $oAction->loadInLang( key($oOtherLang), $soxId );
            }

            $this->_aViewData["edit"] =  $oAction;
            
			$this->_getCategoryTree( "cattree", "", "", true, $myConfig->getShopId());
            
			// remove already created languages
            $aLang = array_diff ( oxLang::getInstance()->getLanguageNames(), $oOtherLang );

            if ( count( $aLang))
                $this->_aViewData["posslang"] = $aLang;

            foreach ( $oOtherLang as $id => $language) {
                $oLang= new oxStdClass();
                $oLang->sLangDesc = $language;
                $oLang->selected = ($id == $this->_iEditLang);
                $this->_aViewData["otherlang"][$id] = clone $oLang;
            }
        }
        $aColumns = array();

        if ( oxConfig::getParameter("aoc") ) {
            // generating category tree for select list
            $sChosenArtCat = oxConfig::getParameter( "artcat");
            $sChosenArtCat = $this->_getCategoryTree( "artcattree", $sChosenArtCat, $soxId);

            include_once 'inc/actions_main.inc.php';
            $this->_aViewData['oxajax'] = $aColumns;

            return "popups/actions_main.tpl";
        }


        if ( ( $oPromotion = $this->getViewDataElement( "edit" ) ) ) {
            if ( ($oPromotion->oxactions__oxtype->value == 2) || ($oPromotion->oxactions__oxtype->value == 3) ) {
                if ( $iAoc = oxConfig::getParameter( "oxpromotionaoc" ) ) {
                    $sPopup = false;
                    switch( $iAoc ) {
                        case 'article':
                            // generating category tree for select list
                            $sChosenArtCat = oxConfig::getParameter( "artcat");
                            $sChosenArtCat = $this->_getCategoryTree( "artcattree", $sChosenArtCat, $soxId);

                            if ($oArticle = $oPromotion->getBannerArticle()) {
                                $this->_aViewData['actionarticle_artnum'] = $oArticle->oxarticles__oxartnum->value;
                                $this->_aViewData['actionarticle_title']  = $oArticle->oxarticles__oxtitle->value;
                            }

                            $sPopup = 'actions_article';
                            break;
                        case 'groups':
                            $sPopup = 'actions_groups';
                            break;
                    }

                    if ( $sPopup ) {
                        $aColumns = array();
                        include_once "inc/{$sPopup}.inc.php";
                        $this->_aViewData['oxajax'] = $aColumns;
                        return "popups/{$sPopup}.tpl";
                    }
                } else {
                    if ( $oPromotion->oxactions__oxtype->value == 2) {
                        $this->_aViewData["editor"] = $this->_generateTextEditor( "100%", 300, $oPromotion, "oxactions__oxlongdesc", "details.tpl.css" );
                    }
                }
            }
            // TRONET -> Fields added for type 3 (banner)
            // Banner has three new fields:
            // - categoryId (show banner on category list)
            // - height (configure height of slider)
            // - effect (configure slide-effect)
            // here are all slide effects listed as an array
            if ( $oPromotion->oxactions__oxtype->value == 3) {
            	$aBannerEffect = array();
            	$aBannerEffect[] = "linear";
            	$aBannerEffect[] = "swing";
            	$aBannerEffect[] = "easeInQuad";
            	$aBannerEffect[] = "easeOutQuad";
            	$aBannerEffect[] = "easeInOutQuad";
            	$aBannerEffect[] = "easeInCubic";
            	$aBannerEffect[] = "easeOutCubic";
            	$aBannerEffect[] = "easeInOutCubic";
            	$aBannerEffect[] = "easeInQuart";
            	$aBannerEffect[] = "easeOutQuart";
            	$aBannerEffect[] = "easeInOutQuart";
            	$aBannerEffect[] = "easeInQuint";
            	$aBannerEffect[] = "easeOutQuint";
            	$aBannerEffect[] = "easeInOutQuint";
            	$aBannerEffect[] = "easeInSine";
            	$aBannerEffect[] = "easeOutSine";
            	$aBannerEffect[] = "easeInOutSine";
            	$aBannerEffect[] = "easeInExpo";
            	$aBannerEffect[] = "easeOutExpo";
            	$aBannerEffect[] = "easeInOutExpo";
            	$aBannerEffect[] = "easeInCirc";
            	$aBannerEffect[] = "easeOutCirc";
            	$aBannerEffect[] = "easeInOutCirc";
            	$aBannerEffect[] = "easeInElastic";
            	$aBannerEffect[] = "easeOutElastic";
            	$aBannerEffect[] = "easeInOutElastic";
            	$aBannerEffect[] = "easeInBack";
            	$aBannerEffect[] = "easeOutBack";
            	$aBannerEffect[] = "easeInOutBack";
            	$aBannerEffect[] = "easeInBounce";
            	$aBannerEffect[] = "easeOutBounce";
            	$aBannerEffect[] = "easeInOutBounce";            	
            	$this->_aViewData["aBannerEffect"] = $aBannerEffect;
            }
        }
        return "actions_main.tpl";
    }

    /**
     * Saves Promotions
     *
     * @return mixed
     */
    public function save()
    {
        $myConfig  = $this->getConfig();

        $soxId   = $this->getEditObjectId();
        $aParams = oxConfig::getParameter( "editval");
        $aUpdateParams = oxConfig::getParameter( "editval");
        //unset($aParams['oxactions__oxtype']);
        
        $oPromotion = oxNew( "oxactions" );
        if ( $soxId != "-1" ) {
            $oPromotion->load( $soxId );
		    oxUtilsPic::getInstance()->overwritePic( $oPromotion, 'oxactions', 'oxpic', 'PROMO', oxUtilsFile::PROMO_PICTURE_DIR, $aParams, $myConfig->getPictureDir(false));
        } else {
            $aParams['oxactions__oxid']   = null;
        }
        if ( !$aParams['oxactions__oxactive'] ) {
            $aParams['oxactions__oxactive'] = 0;
        }
        $oPromotion->setLanguage( 0 );
        $oPromotion->assign( $aParams );
        $oPromotion->setLanguage( $this->_iEditLang );
        $oPromotion = oxUtilsFile::getInstance()->processFiles( $oPromotion );
        $oPromotion->save();
		
        // Update all banner options
        $this->updateAllBannerOptions($aUpdateParams);
        
        // set oxid if inserted
        $this->setEditObjectId( $oPromotion->getId() );
    }

    /*
     * TRONET
     * function updateAllBannerOptions
     * 
     * the effects and the height of the slider couldn't be set for all single slides
     * so this function updates height and effect for all slides assigned the same category
     */
    private function updateAllBannerOptions($aParams)
    {
    	$retVal = 0;
    	if (3 == $aParams['oxactions__oxtype'])
    	{
    		$oDb = oxDb::getDb(true);
    		$sUpdateBannerOptions = "UPDATE oxactions SET troheight='".$aParams['oxactions__troheight']."', troeffect='".$aParams['oxactions__troeffect']."' WHERE trocat='".$aParams['oxactions__trocat']."' and oxtype=3"; 
	        $oDb->execute( $sUpdateBannerOptions );	
	        $retVal = $oDb->affected_Rows();
    	}
    	return $retVal;
    }
}