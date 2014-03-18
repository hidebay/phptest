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
 * @copyright (C) OXID eSales AG 2003-2013
 * @version OXID eSales PayPal PE
 */

// -------------------------------
// RESOURCE IDENTIFIER = STRING
// -------------------------------
$aLang = array(
    'charset'                                            => 'ISO-8859-15',
    'SHOP_MODULE_GROUP_oepaypal_display'                 => 'Display on PayPal payment page',
    'SHOP_MODULE_GROUP_oepaypal_checkout'                => 'PayPal integration',
    'SHOP_MODULE_GROUP_oepaypal_payment'                 => 'Shopping cart on PayPal payment page',
    'SHOP_MODULE_GROUP_oepaypal_transaction'             => 'Capture',
    'SHOP_MODULE_GROUP_oepaypal_api'                     => 'API authorization',
    'SHOP_MODULE_GROUP_oepaypal_development'             => 'Development settings',

    'SHOP_MODULE_sOEPayPalBrandName'                     => 'Name of the shop',
    'HELP_SHOP_MODULE_sOEPayPalBrandName'                => 'Please enter the name of your shop that shall appear on the PayPal payment page.',
    'SHOP_MODULE_sOEPayPalBorderColor'                   => 'Cart Area Color on the PayPal payment page',
    'HELP_SHOP_MODULE_sOEPayPalBorderColor'              => 'Please enter the hexadecimal code of the color that shall be used on the PayPal payment page.',

    'SHOP_MODULE_blOEPayPalStandardCheckout'             => 'PayPal Basis',
    'HELP_SHOP_MODULE_blOEPayPalStandardCheckout'        => 'PayPal will be offered as a payment method at the end of the checkout process. If the customer chooses PayPal, he has to confirm his purchase at the PayPal payment page and will be redirected back to the shop.',
    'SHOP_MODULE_blOEPayPalExpressCheckout'              => 'PayPal Express',
    'HELP_SHOP_MODULE_blOEPayPalExpressCheckout'         => 'When pushing the PayPal Express button the customer will be led directly to the PayPal payment page, where he has to confirm his purchase. Once this is done he\'ll be redirected to the shop again, and all relevant data for the order will be handed over from PayPal to the shop.',
    'SHOP_MODULE_blOEPayPalGuestBuyRole'                 => 'Enable guest buy role',
    'HELP_SHOP_MODULE_blOEPayPalGuestBuyRole'            => 'The customer has the option to check out without a PayPal account. He can complete the payment first, and then decides if to save his data in a PayPal account for future purchases.',

    'SHOP_MODULE_blOEPayPalSendToPayPal'                 => 'Show shopping cart on PayPal site',
    'HELP_SHOP_MODULE_blOEPayPalSendToPayPal'            => 'After logging in the content of the shopping cart appears in PayPal including product information, prices and shipping costs. During the checkout process the customer can choose if this data should be transferred.',
    'SHOP_MODULE_blOEPayPalDefaultUserChoice'            => 'Preset customer confirmation',
    'HELP_SHOP_MODULE_blOEPayPalDefaultUserChoice'       => 'During the checkout process the customer has to confirm explicitly that all shopping cart information including products, prices and shipping costs, shall be transferred to PayPal. You can activate the presetting here that the customer confirms data transfer by default.',

    'SHOP_MODULE_sOEPayPalLogoImageOption'               => 'Shop logo on the PayPal payment page',
    'HELP_SHOP_MODULE_sOEPayPalLogoImageOption'          => 'You can set a shop logo to be shown on the PayPal payment page. It is possible to send a default shop logo, defined in shop\'s configuration file, or send a custom logo file. The logo size should not be bigger than 190px*60px (width*height). Bigger images will be resized and renamed with the file name prefix "resized_". For each different used theme, the logo file has to be located in the /out/{theme}/img directory. If the logo is not shown, please check if the provided filename is correct and if the file exists in the required directory. For the default shop logo, check the "sShopLogo" setting in the config.inc.php file. Add the setting if needed.',

    'SHOP_MODULE_sOEPayPalCustomShopLogoImage'           => 'Custom shop logo for the PayPal payment page',
    'HELP_SHOP_MODULE_sOEPayPalCustomShopLogoImage'      => 'You can use a custom shop logo on the PayPal payment page. You have to save the logo in your shop\'s image directory(/out/{theme}/img) and provide the file name here. For each different used theme, the logo file has to be located in an appropriate directory.',

    'SHOP_MODULE_sOEPayPalLogoImageOption_noLogo'        => 'Don\'t send any shop logo',
    'SHOP_MODULE_sOEPayPalLogoImageOption_shopLogo'      => 'Send default shop logo ',
    'SHOP_MODULE_sOEPayPalLogoImageOption_customLogo'    => 'Send custom shop logo',

    'SHOP_MODULE_sOEPayPalTransactionMode'               => 'Time of money transfer',
    'HELP_SHOP_MODULE_sOEPayPalTransactionMode'          => 'Select the time when money should be transferred. You\'ll have the option to capture the value on PayPal site immediately automated during the purchase (SALE) or manually shortly before the shipping of the products (AUTH). You can also decide that the time of money transfer is automatically handled by the shop depending on the stock amount of the ordered products (AUTOMATIC).',
 
    'SHOP_MODULE_sOEPayPalTransactionMode_Automatic'     => 'AUTOMATIC - depending on the stock amount of the ordered products',
    'SHOP_MODULE_sOEPayPalTransactionMode_Sale'          => 'SALE - immediately automated',
    'SHOP_MODULE_sOEPayPalTransactionMode_Authorization' => 'AUTH - manually before the shipment',
    'SHOP_MODULE_sOEPayPalEmptyStockLevel'               => 'Remaining stock',
    'HELP_SHOP_MODULE_sOEPayPalEmptyStockLevel'          => 'This value applies to AUTOMATIC and influences, whether AUTH or SALE is used as the time of money transfer. It is checked after an order, whether the stock of one of the products is lower than the defined remaining stock. In this case AUTH is used as the transfer method, otherwise SALE.',

    'SHOP_MODULE_sOEPayPalUserEmail'                     => 'E-mail address of PayPal user',
    'SHOP_MODULE_sOEPayPalUsername'                      => 'API user name',
    'SHOP_MODULE_sOEPayPalPassword'                      => 'API password',
    'SHOP_MODULE_sOEPayPalSignature'                     => 'Signature',

    'SHOP_MODULE_blOEPayPalSandboxMode'                  => 'Activate sandbox mode',
    'SHOP_MODULE_sOEPayPalSandboxUserEmail'              => 'Sandbox: E-mail address of PayPal user',
    'SHOP_MODULE_sOEPayPalSandboxUsername'               => 'Sandbox: API user name',
    'SHOP_MODULE_sOEPayPalSandboxPassword'               => 'Sandbox: API password',
    'SHOP_MODULE_sOEPayPalSandboxSignature'              => 'Sandbox: Signature',

    'SHOP_MODULE_blPayPalLoggerEnabled'                  => 'Activate PayPal logging',

    'SHOP_MODULE_blOEPayPalECheckoutInMiniBasket'        => 'Show Express Checkout in the mini cart',
    'HELP_SHOP_MODULE_blOEPayPalECheckoutInMiniBasket'   => 'If PayPal Express is enabled, the PayPal Express button will be displayed in the mini cart.',

    'SHOP_MODULE_blOEPayPalECheckoutInDetails'           => 'Show Express Checkout in the products detail page',
    'HELP_SHOP_MODULE_blOEPayPalECheckoutInDetails'      => 'If PayPal Express is enabled, the PayPal Express button will be displayed in the products detail page.',
);