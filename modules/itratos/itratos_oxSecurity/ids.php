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

//error_reporting(0);
class ids extends oxShopControl{

	function start() {
		$myConfig 			= $this->getConfig();
		$itratos_IDS_Dir	= $myConfig->getConfigParam( 'sShopDir' ).'modules/itratos/itratos_oxSecurity/';
		$itratos_IDS_TMP_Dir	= $myConfig->getConfigParam( 'sShopDir' ).'tmp/';
		$itratos_IDS_LOG_Dir	= $myConfig->getConfigParam( 'sShopDir' ).'log/';
		$itratos_conf 		= parse_ini_file('ids_config.ini');
		
		define( 'IDS_PATH', dirname(__FILE__)."/" );
        set_include_path( get_include_path() . PATH_SEPARATOR . IDS_PATH . 'lib' );
        
        if($itratos_conf["debug"] == "true"){
			print_r(set_include_path( get_include_path() . PATH_SEPARATOR . IDS_PATH . 'lib' ));
		}
		
		
		require_once 'IDS/Init.php';
                    
        $request = array(
			'REQUEST' => $_REQUEST,
			'GET' => $_GET,
			'POST' => $_POST,
			'COOKIE' => $_COOKIE
			);
			
		$init = IDS_Init::init($itratos_IDS_Dir.'lib/IDS/Config/Config.ini.php');
		
		$init->config['General']['filter_type'] = 'xml';
		$init->config['General']['base_path'] = $itratos_IDS_Dir.'lib/IDS/';
		$init->config['General']['use_base_path'] = false;
		
		$init->config['General']['exceptions'][]    = 'COOKIE./.*_pk_ref.*/i';
		$init->config['General']['exceptions'][]    = 'COOKIE.phpxref-xrefsearch';
		$init->config['General']['exceptions'][]    = 'REQUEST.phpxref-xrefsearch';
		
		
		$init->config['General']['filter_path'] = $itratos_IDS_Dir.'lib/IDS/default_filter.xml';
		$init->config['General']['tmp_path'] = $itratos_IDS_TMP_Dir;
		$init->config['General']['scan_keys'] = false;

		$init->config['General']['HTML_Purifier_Path'] = $itratos_IDS_Dir.'lib/IDS/vendors/htmlpurifier/HTMLPurifier.auto.php';
		$init->config['General']['HTML_Purifier_Cache'] = $itratos_IDS_TMP_Dir;
		
		$init->config['Caching']['caching'] = 'none';
		
		$init->config['Logging']['path'] = $itratos_IDS_LOG_Dir.'phpids_log.txt';
		$init->config['Logging']['recipients'][] = $itratos_conf["email"];
		$init->config['Logging']['safemode'] = true;
		$init->config['Logging']['urlencode'] = true;
		$init->config['Logging']['allowed_rate'] = 15;
		
		$init->config['Logging']['wrapper']    = "mysql:host=".$myConfig->getConfigParam('dbHost').";port=3306;dbname=".$myConfig->getConfigParam('dbName')."";
    	$init->config['Logging']['user']       = $myConfig->getConfigParam( 'dbUser' );
    	$init->config['Logging']['password']   = $myConfig->getConfigParam( 'dbPwd' );
    	$init->config['Logging']['table']      = 'itr_oxSecurity_intrusions';
    	
				
		
		
		//echo $init->config['General']['base_path'];
				
		$ids = new IDS_Monitor($request, $init);
		$result = $ids->run();
		
		require_once 'IDS/Log/Composite.php';
		
		if($itratos_conf["log_file"] == "true"){
			require_once 'IDS/Log/File.php';
		}
		if($itratos_conf["send_email"] == "true"){
			require_once 'IDS/Log/Email.php';
		}
		if($itratos_conf["log_db"] == "true"){
			require_once 'IDS/Log/Database.php';
		}
		
		
		if($itratos_conf["log_file"] == "true" || $itratos_conf["send_email"] == "true" || $itratos_conf["log_db"] == "true" && $result->getImpact() >= $itratos_conf["level_1"]){
		
			$compositeLog = new IDS_Log_Composite();
		
			if($itratos_conf["log_file"] == "true" && $result->getImpact() >= $itratos_conf["level_1"]){		
				$compositeLog->addLogger(IDS_Log_File::getInstance($init));
				}
			if($itratos_conf["log_db"] == "true" && $result->getImpact() >= $itratos_conf["level_1"]){
				$compositeLog->addLogger(IDS_Log_Database::getInstance($init));
				}
			if($itratos_conf["send_email"] == "true" && $result->getImpact() >= $itratos_conf["level_2"]){
				$compositeLog->addLogger(IDS_Log_Email::getInstance($init));
				}
		
			$compositeLog->execute($result);
			
			if($result->getImpact() >= $itratos_conf["level_block"]){
				$myConfig = oxConfig::getInstance();
                oxUtils::getInstance()->redirect( '/Benutzer-geblockt' );
				}
		
		}
		
	parent::start();
	}
   
}
?>