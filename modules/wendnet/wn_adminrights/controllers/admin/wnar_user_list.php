<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_user_list extends wnar_user_list_parent{public function _prepareWhereQuery($oba4fa63a3,$ob455e8c45){$obe800f1e9=parent::_prepareWhereQuery($oba4fa63a3,$ob455e8c45);$obb01e62e9=$this->getUser();if(($obf78c10d4=$obb01e62e9->oxuser__wnrestrict->value)&&strpos($obf78c10d4,'noeditadmin')!==false)$obe800f1e9.=" AND ( oxuser.oxid = '".$obb01e62e9->getId()."' OR oxuser.oxrights != 'malladmin' ) ";return$obe800f1e9;}}