<?php
 class trooxarticle extends trooxarticle_parent {

    public function isBuyable()
    {
        if ($this->oxarticles__troshowprice == '0')
        {
            return false;
        }
        if ($this->_blNotBuyableParent)
        {
            return false;
        }

        return !$this->_blNotBuyable;
    }

    public function isNotBuyable()
    {
        if ($this->oxarticles__troshowprice == '0')
        {
            return true;
        }
        return $this->_blNotBuyable;
    }

    /**
     * Loads and returns article category object. First tries to load
     * assigned category and is such category does not exist, tries to
     * load category by price
     *
     * @return oxcategory
     */
    public function getPromoCategory()
    {
        $oCategory = oxNew( 'oxcategory' );
        $oCategory->setLanguage( $this->getLanguage() );

        // variant handling
        $sOXID = $this->getId();
        if ( isset( $this->oxarticles__oxparentid->value ) && $this->oxarticles__oxparentid->value ) {
            $sOXID = $this->oxarticles__oxparentid->value;
        }

        if ( $sOXID ) {
            // if the oxcategory instance of this article is not cached
            if ( !isset( $this->_aCategoryCache[ $sOXID ] ) ) {
                startPRofile( 'getCategory' );
                $oStr = getStr();
                $sWhere   = $oCategory->getSqlActiveSnippet();

				//if('93.184.60.4'==$_SERVER['REMOTE_ADDR'])
				//{				
					// MANTIS 6734: get hidden category for Promotion	
					$sCatTable = $oCategory->getViewName();
					$sWhere =  str_replace("$sCatTable.oxhidden = '0'",'1',$sWhere);
					//var_dump($sWhere); 
				//}
				
                $sSelect  = $this->_generateSearchStr( $sOXID );
                $sSelect .= ( $oStr->strstr( $sSelect, 'where' )?' and ':' where ') . $sWhere . " order by oxobject2category.oxtime limit 1"; 
				
				

                // category not found ?
                if ( !$oCategory->assignRecord( $sSelect ) ) {

                    $sSelect  = $this->_generateSearchStr( $sOXID, true );
                    $sSelect .= ( $oStr->strstr( $sSelect, 'where' )?' and ':' where ') . $sWhere . " limit 1";

                    // looking for price category
                    if ( !$oCategory->assignRecord( $sSelect ) ) {
                        $oCategory = null;
                    }
                }
                // add the category instance to cache
                $this->_aCategoryCache[ $sOXID ] = $oCategory;
                stopPRofile( 'getCategory' );
            } else {
               // if the oxcategory instance is cached
               $oCategory = $this->_aCategoryCache[ $sOXID ];
            }
        }

        return $oCategory;
    }
	
	

 }
?>
