<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_article_list extends wnar_article_list_parent{public function render(){$ob5120aebc=parent::render();if($this->getUser()->getId()=='oxdefaultadmin'&&$this->getConfig()->getConfigParam('blWnArShowArticleOwner'))return"wnar_article_list.tpl";return$ob5120aebc;}public function buildWhere(){$this->_aWhere=parent::buildWhere();$obb01e62e9=$this->getUser();$ob93802ffa=$obb01e62e9->getId();if($ob93802ffa!='oxdefaultadmin'&&($obf78c10d4=$obb01e62e9->oxuser__wnrestrict->value)&&strpos($obf78c10d4,'noforeignart')!==false){$this->_aWhere[getViewName("oxarticles").".wnuserid"]=$ob93802ffa;}return$this->_aWhere;}}