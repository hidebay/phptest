<?php 

 /** 
 * Metadata version 
 */ 
$sMetadataVersion = '1.0'; 
  
 /** 
 * Module information 
 */ 
$aModule = array( 
    'id'           => 'dre_category', 
    'title'        => '<img src="../modules/bodynova/img/favicon.ico" title="Navileiste laden">Bender Navigationsleiste vollständig laden', 
    'description'  => 'Der ganze Kategoriebaum soll geladen werden, nicht nur die Unterkategorien des aktiven Zweigs', 
    'extend'       => array( 
            'oxcategorylist' => 'bender/dre_category/dre_oxcategorylist', 
    ), 
);
