<?php
require_once 'access.php';
$id = $_POST['number'];
$tag = $_POST['tag'];
if ($tag == 'ravno') $tag = "ЛинияПрослушалПриветствие";
if ($tag == 'plus') $tag = "ПрослушалПриветствие";
if ($tag == 'minus') $tag = "ПрослушалМеню";
if ($tag == 'vzal') $tag = "ВзялТрубку";
if ($tag == 'del') $tag = "ЛинияПрослушалМеню";
if ($tag == 'neb') $tag = "НеВыбралВариант";
if ($tag == 'actnow') $tag = "АктуальноСейчас";
if ($tag == 'actlate') $tag = "АктуальноПозже";
if ($tag == 'noact') $tag = "НеАктуально";
$data = [
    [

        "id" => (int)$id,
        "_embedded" => [
            "tags" =>[
                [
                    "name" => $tag
             ]
            ],
        ],
        "custom_fields_values" => [
            [
                "field_code" => 'UTM_SOURCE',
                "values" => [
                    [
                        "value" => $tag
                    ]
                ]
            ]
       ] 
    ]
];
$method = "/api/v4/leads";

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int) $code;
$errors = [
    301 => 'Amo Moved permanently.',
    400 => 'Amo  Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.',
    401 => 'Amo  Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.',
    403 => 'Amo  The account is blocked, for repeatedly exceeding the number of requests per second.',
    404 => 'Amo  Not found.',
    500 => 'Amo  Internal server error.',
    502 => 'Amo Bad gateway.',
    503 => 'Amo Service unavailable.'
];
