<?php declare(strict_types=1);

require_once './bootstrap.php';

const ADMIN_USERNAME = 'o@x.id';
const ADMIN_PASSWORD = '7cd6cf60785b';
const SHOP_ID = 1;
const LANGUAGE_ID = 0;
const WSDL_URL = 'https://af.oxid.academy/index.php?cl=erpservice&wsdl&version=2.16.0&shp=1';
const OXID = '066e3ce119c43c81cc0e46d4f1681eed'; // oxarticles.oxid


// Login
$credentials = [
    [
        'sUserName' => ADMIN_USERNAME,
        'sPassword' => ADMIN_PASSWORD,
        'iShopID' => SHOP_ID,
        'iLanguage' => LANGUAGE_ID
    ]
];

try {
    $soapClient = new SoapClient(WSDL_URL, ['cache_wsdl' => WSDL_CACHE_NONE]);
    $soapCallResult = $soapClient->__soapCall('OXERPLogin', $credentials);
    $session = $soapCallResult->OXERPLoginResult->sMessage; // Returns the created session id
} catch (SoapFault $e) {
    echo 'Exception abgefangen: ' .  $e->getMessage() . "\n";
}


// Get article
$getArticle = [
    [
        'sSessionID' => $session,
        'sArticleID' => OXID
    ]
];
$article = $soapClient->__soapCall('OXERPGetArticle', $getArticle);


// output
var_dump($article);