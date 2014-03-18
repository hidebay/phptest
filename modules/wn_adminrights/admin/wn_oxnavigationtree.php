<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.0.0
 * @author Sascha Mahnecke
 * @copyright 2012 by Wendnet
 */
class wn_oxnavigationtree extends wn_oxnavigationtree_parent{public function getDomXml($oba46c62a6=false){if($oba46c62a6||$this->_oDom===null){$this->_oDom=clone$this->_getInitialDom();$this->_checkGroups($this->_oDom);$this->_checkRights($this->_oDom);$this->_checkDemoShopDenials($this->_oDom);if(!$oba46c62a6)$this->ob4fcb25ea($this->_oDom);$this->_cleanEmptyParents($this->_oDom,'//SUBMENU[@id][@list]','TAB');$this->_cleanEmptyParents($this->_oDom,'//MAINMENU[@id]','SUBMENU');}return$this->_oDom;}protected function ob4fcb25ea($obd660a8bc){$ob392198fe=new DomXPath($obd660a8bc);$ob96c50fe0=$ob392198fe->query("//MAINMENU[@id] | //SUBMENU[@id] | //SUBMENU/TAB[@id] | //SUBMENU/BTN[@id]");$oba56d7763=array();if($oba69caa77=$this->getUser()->oxuser__wnrestrict->value)$oba56d7763=explode(',',$oba69caa77);foreach($ob96c50fe0 as$ob78efa4e7){$obed3eb65c=$ob78efa4e7->getAttribute('id');if($obed3eb65c&&in_array($obed3eb65c,$oba56d7763))$ob78efa4e7->parentNode->removeChild($ob78efa4e7);}}}