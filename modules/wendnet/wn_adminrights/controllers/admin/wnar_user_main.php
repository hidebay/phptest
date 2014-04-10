<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_user_main extends wnar_user_main_parent{public function render(){$ob9700c473=$this->ob383446c4();$ob5120aebc=parent::render();$obb01e62e9=$this->getUser();$ob5abfa39d=array();if($obf78c10d4=$obb01e62e9->oxuser__wnrestrict->value)$ob5abfa39d=explode(',',$obf78c10d4);if($ob9700c473==$obb01e62e9->getId()){$obcba355fc=$this->_aViewData["rights"];unset($obcba355fc[0]);$this->_aViewData["rights"]=$obcba355fc;}elseif(in_array('noeditadmin',$ob5abfa39d)){$obcba355fc=$this->_aViewData["rights"];unset($obcba355fc[1]);$this->_aViewData["rights"]=$obcba355fc;}return$ob5120aebc;}protected function ob383446c4(){if(version_compare(oxConfig::getInstance()->getVersion(),'4.5.0','>='))return$this->getEditObjectId();if(null===($ob3a942e4a=$this->_sEditObjectId)){if(null===($ob3a942e4a=oxConfig::getParameter("oxid"))){$ob3a942e4a=oxSession::getVar("saved_oxid");}}return$ob3a942e4a;}}