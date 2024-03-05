<?php declare(strict_types=1);

require_once './bootstrap.php';

const ADMIN_USERNAME = 'o@x.id';
const ADMIN_PASSWORD = '7cd6cf60785b';
const SHOP_ID = 1;
const LANGUAGE_ID = 0;
const WSDL_URL = 'https://af.oxid.academy/index.php?cl=erpservice&wsdl&version=2.16.0&shp=1';

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
    echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
}

$id = ['OXID', 'new_product_3'];
$artnum = ['OXARTNUM', '1234567'];
$title = ['OXTITLE', 'created by me'];

// Create article
$createArticle = [
    [
        'sSessionID' => $session,
        'aArticle' => [
            (object) [
                'aResult' => [
                    $id,
                    $artnum,
                    $title,
                ],
                'blResult' => true,
                'sMessage' => ''
            ]
        ]
    ]
];
print_r($createArticle);
$newArticle = $soapClient->__soapCall('OXERPSetArticle', $createArticle);


// Show created article
$getArticle = [
    [
        'sSessionID' => $session,
        'sArticleID' => $id[1]
    ]
];
$article = $soapClient->__soapCall('OXERPGetArticle', $getArticle);

// output
var_dump($newArticle);