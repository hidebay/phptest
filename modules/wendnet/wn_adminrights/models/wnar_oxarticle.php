<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_oxarticle extends wnar_oxarticle_parent{protected$obe38b35b8=null;public function getArtOwner($ob83556840=null){if($this->obe38b35b8===null){$this->obe38b35b8=false;if($ob93802ffa=$this->oxarticles__wnuserid->value){$obb01e62e9=oxNew('oxuser');if($obb01e62e9->load($ob93802ffa))$this->obe38b35b8=$obb01e62e9;}}if($this->obe38b35b8&&$ob83556840)return$this->obe38b35b8->getFieldData($ob83556840);return$this->obe38b35b8;}}