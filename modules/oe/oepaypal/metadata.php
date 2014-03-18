<?php
/**
 * This Software is the property of OXID eSales and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * @link      http://www.oxid-esales.com
 * @package   main
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eShop PE
 */

/**
 * Metadata version
 */
$sMetadataVersion = '1.0';

/**
 * Module information
 */
$aModule = array(
    'id'           => 'oepaypal',
    'title'        => 'PayPal',
    'description'  => array(
        'de' => 'Modul für die Zahlung mit PayPal. Erfordert einen OXID eFire Account und die abgeschlossene Aktivierung des Portlets "PayPal".',
        'en' => 'Module for PayPal payment. An OXID eFire account is required as well as the finalized activation of the portlet "PayPal".',
    ),
    'thumbnail'    => 'logo.jpg',
    'version'      => '2.0.7',
    'author'       => 'OXID eSales AG',
    'url'          => 'http://www.oxid-esales.com',
    'email'        => 'info@oxid-esales.com',
    'extend'       => array(
        'order'        => 'oe/oepaypal/views/oepaypalorder',
        'payment'      => 'oe/oepaypal/views/oepaypalpayment',
        'wrapping'     => 'oe/oepaypal/views/oepaypalwrapping',
        'oxviewconfig' => 'oe/oepaypal/views/oepaypaloxviewconfig',
        'oxaddress'    => 'oe/oepaypal/core/oepaypaloxaddress',
        'oxuser'       => 'oe/oepaypal/core/oepaypaloxuser',
        'oxorder'      => 'oe/oepaypal/core/oepaypaloxorder',
        'oxbasket'     => 'oe/oepaypal/core/oepaypaloxbasket',
        'oxbasketitem' => 'oe/oepaypal/core/oepaypaloxbasketitem',
        'oxarticle'    => 'oe/oepaypal/core/oepaypaloxarticle',
        'oxcountry'    => 'oe/oepaypal/core/oepaypaloxcountry',
        'oxstate'      => 'oe/oepaypal/core/oepaypaloxstate',
    ),
    'files' => array(
        'oePayPalException'                 => 'oe/oepaypal/core/exception/oepaypalexception.php',
        'oePayPalCheckoutService'           => 'oe/oepaypal/core/oepaypalcheckoutservice.php',
        'oePayPalLogger'                    => 'oe/oepaypal/core/oepaypallogger.php',
        'oePayPalPortlet'                   => 'oe/oepaypal/core/oepaypalportlet.php',
        'oePayPalDispatcher'                => 'oe/oepaypal/views/oepaypaldispatcher.php',
        'oePayPalExpressCheckoutDispatcher' => 'oe/oepaypal/views/oepaypalexpresscheckoutdispatcher.php',
        'oePayPalStandardDispatcher'        => 'oe/oepaypal/views/oepaypalstandarddispatcher.php',
        'oePaypal_EblLogger'                => 'oe/oepaypal/core/oeebl/oepaypal_ebllogger.php',
        'oePaypal_EblPortlet'               => 'oe/oepaypal/core/oeebl/oepaypal_eblportlet.php',
        'oePaypal_EblSoapClient'            => 'oe/oepaypal/core/oeebl/oepaypal_eblsoapclient.php',
    ),
    'blocks' => array(
        array('template' => 'widget/sidebar/partners.tpl', 'block'=>'partner_logos',                     'file'=>'oepaypalpartnerbox.tpl'),
        array('template' => 'page/checkout/basket.tpl',    'block'=>'basket_btn_next_top',               'file'=>'oepaypalexpresscheckout.tpl'),
        array('template' => 'page/checkout/basket.tpl',    'block'=>'basket_btn_next_bottom',            'file'=>'oepaypalexpresscheckout.tpl'),
        array('template' => 'page/checkout/payment.tpl',   'block'=>'select_payment',                    'file'=>'oepaypalpaymentselector.tpl'),
    ),
   'settings' => array(
        array('group' => 'main', 'name' => 'dMaxPayPalDeliveryAmount', 'type' => 'str',  'value' => '30'),
        array('group' => 'main', 'name' => 'blPayPalLoggerEnabled',    'type' => 'bool', 'value' => 'false'),
    )
);