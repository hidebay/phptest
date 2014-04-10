<?php
/**
 * OXID module: wn_adminrights
 *
 * @version 1.2.0
 * @author Sascha Mahnecke
 * @copyright 2012-2014 by Wendnet
 */
class wnar_article_main extends wnar_article_main_parent{public function addDefaultValues($obf02cec44){$obb01e62e9=$this->getUser();$ob93802ffa=$obb01e62e9->getId();if($ob93802ffa!='oxdefaultadmin'&&$this->getEditObjectId()=="-1"&&($obf78c10d4=$obb01e62e9->oxuser__wnrestrict->value)&&strpos($obf78c10d4,'noforeignart')!==false){$obf02cec44['oxarticles__wnuserid']=$ob93802ffa;}return$obf02cec44;}}