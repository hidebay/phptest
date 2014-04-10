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
    'title'        => 'dre_category Navigationsleiste vollständig laden', 
    'description'  => 'Der ganze Kategoriebaum soll geladen werden, nicht nur die Unterkategorien des aktiven Zweigs', 
    'extend'       => array( 
            'oxcategorylist' => 'dre_category/dre_oxcategorylist', 
    ), 
);