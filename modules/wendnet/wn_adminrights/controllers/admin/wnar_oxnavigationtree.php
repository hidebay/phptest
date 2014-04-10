<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_oxnavigationtree extends wnar_oxnavigationtree_parent{public function getDomXml($ob3ad91887=false){if($ob3ad91887||$this->_oDom===null){$this->_oDom=clone$this->_getInitialDom();$this->_checkGroups($this->_oDom);$this->_checkRights($this->_oDom);$this->_checkDemoShopDenials($this->_oDom);if(!$ob3ad91887)$this->obe0227abd($this->_oDom);$this->_cleanEmptyParents($this->_oDom,'//SUBMENU[@id][@list]','TAB');$this->_cleanEmptyParents($this->_oDom,'//MAINMENU[@id]','SUBMENU');}return$this->_oDom;}protected function obe0227abd($ob275eaeea){$ob272324c6=new DomXPath($ob275eaeea);$ob627e0fc6=$ob272324c6->query("//MAINMENU[@id] | //SUBMENU[@id] | //SUBMENU/TAB[@id] | //SUBMENU/BTN[@id]");$obed63d5f5=array();if($obf78c10d4=$this->getUser()->oxuser__wnrestrict->value){if(strpos($obf78c10d4,'noeditadmin')!==false)$obf78c10d4.=($obf78c10d4?',':'').'tbcluser_rights';if(strpos($obf78c10d4,'noservicearea')!==false)$obf78c10d4.=($obf78c10d4?',':'').'dyn_menu';$obf78c10d4=preg_replace("/(noeditadmin|noservicearea|nodeltmp),?/",'',$obf78c10d4);$obed63d5f5=explode(',',$obf78c10d4);}foreach($ob627e0fc6 as$ob1c57eecd){$ob268a0c37=$ob1c57eecd->getAttribute('id');if($ob268a0c37&&in_array($ob268a0c37,$obed63d5f5))$ob1c57eecd->parentNode->removeChild($ob1c57eecd);}}}