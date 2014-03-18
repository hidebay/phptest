<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.0.0
 * @author Sascha Mahnecke
 * @copyright 2012 by Wendnet
 */
class wn_user_list extends wn_user_list_parent{public function _prepareWhereQuery($ob9dc42b77,$obf3accf8f){$ob5dd8f085=parent::_prepareWhereQuery($ob9dc42b77,$obf3accf8f);$obab60702e=$this->getUser();$oba56d7763=array();if($oba69caa77=$obab60702e->oxuser__wnrestrict->value)$oba56d7763=explode(',',$oba69caa77);if(in_array('noeditadmin',$oba56d7763)){$obcc4eb94e=$obab60702e->getId();$ob5dd8f085.=" AND( oxuser.oxid = '".$obcc4eb94e."' OR oxuser.oxrights != 'malladmin' ) ";}return$ob5dd8f085;}}