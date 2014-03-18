<?php
/*
* "itratos_oxSecurity" - phpIDS for oxid ce/pe Shop;  *
*
* @copyright       Copyright, itratos (www.itratos.de) / Rene Ettling (www.ecomdev.de)
* @license         itratos - Commercial Software Lizenz
*
*				   Agentur itratos Ltd & Co. KG
*				   Coburger Strasse 43
*				   D-96052 Bamberg
*
*                  ITRATOS-C;  
* @link            http://www.itratos.de
* @package         oxid
* @version         1.0.0;  
* @lastmodified    $Date: rene 06/02/2013 $
*/
class shopids_reports  extends oxAdminView{
    	protected $_sThisTemplate = 'shopids_reports.tpl';
        
        public function render()
	{
		// display php errors
		ini_set('display_errors', true);

		parent::render();
		
		$oSmarty = oxUtilsView::getInstance()->getSmarty();
		$oSmarty->assign( "oViewConf", $this->_aViewData["oViewConf"]);
		$oSmarty->assign( "shop", $this->_aViewData["shop"]);
                
                
                if($_GET['ip']){
                    $oSmarty->assign( "attacks", $this->getList($_GET['ip']));

                    $oSmarty->assign( "geoinfo", unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_GET['ip'])));
                }else{

		    $oDb = oxDb::getDb();
                    $result = $oDb->SelectLimit("SELECT * FROM `itr_oxSecurity_intrusions` ORDER BY created DESC LIMIT 0, 1000");
		        while ( !$result->EOF ) {
		                $oxid[] = array_map('htmlspecialchars',$result->fields);
		                $result->moveNext();
		        }

			$total = count($oxid);
			$pages = ceil($total/10);

			for($i = 1; $i < $pages; $i++){
                            if($_GET['page'] == $i){
				$paginator[] = ' <a style="background-color: #ccc;" href="/admin/index.php?stoken='.oxSession::getSessionChallengeToken().'&cl=shopids_reports&page='.$i.'">'.$i.'</a> ';
                            }else{
				$paginator[] = ' <a href="/admin/index.php?stoken='.oxSession::getSessionChallengeToken().'&cl=shopids_reports&page='.$i.'">'.$i.'</a> ';                                
                            }
			}

                    $oSmarty->assign( "attacks", $this->getList());
		    $oSmarty->assign( "attacks_total", count($oxid));
		    $oSmarty->assign( "attacks_per_page", 10);
		    $oSmarty->assign( "paginator", @join("&nbsp;|&nbsp;",$paginator));
		
                }
	 			 	
		return $this->_sThisTemplate;
	}
        
        public function getList($search = false){
                $oDb = oxDb::getDb();

                if($search){
                    $result = $oDb->SelectLimit("SELECT * FROM `itr_oxSecurity_intrusions` WHERE ip = '$search' ORDER BY created DESC LIMIT 0, 1000");
                }else{
		    if(@$_GET['page']){
			if($_GET['page'] == 1)
				$start = 0;
			else
				$start = $_GET['page']*10;

			$stop = ($_GET['page']+1)*10;
		    }else{
			$start = 0;
			$stop = 10;
		    }
                    $result = $oDb->SelectLimit("SELECT * FROM `itr_oxSecurity_intrusions` ORDER BY created DESC LIMIT $start, $stop");
                }
                                
                while ( !$result->EOF ) {
                        $oxid[] = array_map('htmlspecialchars',$result->fields);
                        $result->moveNext();
                }
                
                return $oxid;
        }
        
        public function delete(){
            
            $oDb = oxDb::getDb();
            $delete = $_POST['delete'];
            foreach($delete as $key => $value){
                 $oDb->Execute("DELETE FROM itr_oxSecurity_intrusions WHERE id = '$value'");
            }
            
                $myConfig = oxConfig::getInstance();
                oxUtils::getInstance()->redirect( 'index.php?stoken='.$_POST['stoken'].'&cl=shopids_reports' );
        }
}
?>
