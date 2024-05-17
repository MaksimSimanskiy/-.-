<?php
require_once 'access.php';
require_once 'yandex_post.php';

if ($contractor == 'duplicate_driver_license')
{
    require_once 'mail_error.php';
    header($end);

};
if ($contractor == 'duplicate_phone')
{
    require_once 'mail_error.php';
    $end = "Location:../error.php";
    header($end);
    die();

};

$name = $_POST['fame'] . ' ' . $_POST['name'] . ' ' . $_POST['otc'];
$phone = $_POST['number'];
$custom_field_value = $_POST['cityname'];
$custom_field_value2 = $_POST['working'];
$custom_field_value3 = $_POST['dateb'];
$target = 'Заполнили форму';
$company = $_POST['feed'];
if ($company == "По рекомендации")
{
    $company = $_POST['rec'];
    if ($len = strlen($company) < 3)
    {
        $company = "Не указано";
    };
};
if ($len = strlen($company) < 3)
{
    $company = "Не указано";
};
$custom_field_id = 548461;

$custom_field_id2 = 284265;

$custom_field_id3 = 548467;

$ip = '1.2.3.4';
$domain = 'site.ua';
$pipeline_id = 6107622;
$user_amo = 8887046;
$status_id = 52897606;

$utm_source = 'Интеграция';
$utm_content = $custom_field_value2;
$utm_medium = $contractor;
$utm_campaign = $_POST['otc'];
$utm_term = '';
$utm_referrer = $_POST['refer'];
$data = [["name" => $name, "status_id" => $status_id, "responsible_user_id" => (int)$user_amo, "created_at" => strtotime(date("Y-m-d H:i:s")) , "pipeline_id" => (int)$pipeline_id, "_embedded" => ["contacts" => [["first_name" => $name, "custom_fields_values" => [["field_code" => "PHONE", "values" => [["enum_code" => "WORK", "value" => $phone]]], ["field_id" => (int)$custom_field_id, "values" => [["value" => $custom_field_value]]], ["field_id" => 284265, "values" => [["value" => $custom_field_value2]]], ["field_id" => 995453, "values" => [["value" => $url]]], ["field_id" => 548467, "values" => [["value" => $custom_field_value3]]], ["field_id" => 548463, "values" => [["value" => $name]]], ["field_id" => 1019301, "values" => [["value" => $custom_field_value4]]]]]], "companies" => [["name" => $company]]], "custom_fields_values" => [["field_code" => 'UTM_SOURCE', "values" => [["value" => $utm_source]]], ["field_code" => 'UTM_CONTENT', "values" => [["value" => $utm_content]]], ["field_code" => 'UTM_MEDIUM', "values" => [["value" => $utm_medium]]], ["field_code" => 'UTM_CAMPAIGN', "values" => [["value" => $utm_campaign]]], ["field_code" => 'UTM_TERM', "values" => [["value" => $utm_term]]], ["field_code" => 'UTM_REFERRER', "values" => [["value" => $utm_referrer]]], ], ]];
$method = "/api/v4/leads/complex";

$headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token, ];
echo json_encode($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_COOKIEFILE, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, 'amo/cookie.txt');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$code = (int)$code;
$Response = json_decode($out, true);

//отслеживание ошибки
$errors = [301 => 'Amo Moved permanently.', 400 => 'Amo  Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.', 401 => 'Amo  Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.', 403 => 'Amo  The account is blocked, for repeatedly exceeding the number of requests per second.', 404 => 'Amo  Not found.', 500 => 'Amo  Internal server error.', 502 => 'Amo Bad gateway.', 503 => 'Amo Service unavailable.'];

$_POST = array();
header($end);

