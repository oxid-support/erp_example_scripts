<?php declare(strict_types=1);

define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin');
define('SHOP_ID', 1);
define('LANGUAGE_ID', 0);
define('WSDL_URL', 'http://localhost/modules/erp/oxerpservice.php?wsdl&version=2.15.0');
define('OXID', '7d090db46a124f48cb7e6836ceef3f66'); // oxorder.oxid


// Login
$credentials = [
    [
        'sUserName' => ADMIN_USERNAME,
        'sPassword' => ADMIN_PASSWORD,
        'iShopID' => SHOP_ID,
        'iLanguage' => LANGUAGE_ID
    ]
];

$soapClient = new SoapClient(WSDL_URL, ['cache_wsdl' => WSDL_CACHE_NONE]);
$soapCallResult = $soapClient->__soapCall('OXERPLogin', $credentials);
$session = $soapCallResult->OXERPLoginResult->sMessage; // Returns the created session id


// Executing the actual ERP query
$query = [
    [
        'sSessionID' => $session,
        'sOrderID' => OXID
    ]
];
$oxErpResult = $soapClient->__soapCall('OXERPGetOrderArticle', $query);


// Debug output
echo '<pre>';
print_r($oxErpResult);
echo '</pre>';
