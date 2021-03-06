<?php
/*
* "itratos_oxSecurity" - phpIDS for oxid ce/pe Shop;  *
*
* @copyright       Copyright, itratos (www.itratos.de) / Autoren Herr Dr.-Ing. Mario Heiderich, Herr Christian Matthies, Herr Lars H. Strojny, Herr Rene Ettling
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
/**
 * Module information
 */
$aModule = array(
    // module id has to be equal to the folder name
    'id' => 'itratos_oxSecurity',
    
    // the title will be shown in the module list in backend, you can also use html to drive some shop admins crazy
    'title' => 'ITRATOS oxSecurity',
    
    // here you can place some description or funny things like images and iframes
    'description' => 'Intrusiondetectionsystem auf Basis von PHP IDS',
    
    // just picture on the left side of module description
    'thumbnail' => 'picture.jpg',
    'version' => '1.0.1',
    'author' => 'Team itratos - Autoren Herr Dr.-Ing. Mario Heiderich, Herr Christian Matthies, Herr Lars H. Strojny, Herr Rene Ettling',
    'email' => 'shop.security@itratos.org',
    'url' => 'http://www.itratos.de',

    'extend' => array(
    	'oxshopcontrol' => 'itratos/itratos_oxSecurity/ids'
    ),

    'files' => array(
        'shopids_reports' => 'itratos/itratos_oxSecurity/admin/shopids_reports.php',
        //'shopids' => 'itratos/itratos_oxSecurity/admin/shopids.php',
    ),
    
    'templates' => array(
        'shopids_reports.tpl' => 'itratos/itratos_oxSecurity/out/admin/tpl/shopids_reports.tpl',
        //'shopids.tpl' => 'itratos/itratos_oxSecurity/out/admin/tpl/shopids.tpl',
    ),
    
);
