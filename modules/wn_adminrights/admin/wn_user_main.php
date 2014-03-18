<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.0.0
 * @author Sascha Mahnecke
 * @copyright 2012 by Wendnet
 */
class wn_user_main extends wn_user_main_parent{public function render(){$ob54442385=$this->ob38104b29();$ob454306ec=parent::render();$obab60702e=$this->getUser();$oba56d7763=array();if($oba69caa77=$obab60702e->oxuser__wnrestrict->value)$oba56d7763=explode(',',$oba69caa77);if(in_array('noeditadmin',$oba56d7763)&&$ob54442385!=$obab60702e->getId()){$ob05408296=$this->_aViewData["rights"];unset($ob05408296[1]);$this->_aViewData["rights"]=$ob05408296;}return$ob454306ec;}protected function ob38104b29(){if(version_compare(oxConfig::getInstance()->getVersion(),'4.5.0')>=0){return$this->getEditObjectId();}else{if(null===($ob41a59b9e=oxConfig::getParameter("oxid"))){$ob41a59b9e=oxSession::getVar("saved_oxid");}return$ob41a59b9e;}}}