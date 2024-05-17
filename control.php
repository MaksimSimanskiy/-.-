<?php
require_once 'access.php';
sleep(mt_rand(1, 20));
$id = serialize($_POST);
preg_match('/([0-9]{7,8}+)/', $id, $matches);
$id = $matches[0];
$headers = ["Accept: application/json", 'Authorization: Bearer ' . $access_token, ];

$link = "https://$subdomain.amocrm.ru/api/v4/leads/$id?";
$link .= http_build_query(['with' => 'contacts']);
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, "With:contacts");
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$Response = json_decode($out, true);
$contact_id = $Response['_embedded']['contacts'][0]['id'];
$una = serialize($Response);
$link = "https://$subdomain.amocrm.ru/api/v4/contacts/$contact_id";
$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-oAuth-client/1.0');
curl_setopt($curl, CURLOPT_URL, $link);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
$Response = json_decode($out, true);
$Response = serialize($Response);
$Response = preg_replace('[-]', '', $Response);

preg_match_all('/[a-z0-9]{32}/', $Response, $matches, PREG_SET_ORDER);

$id_vod = $matches[0][0];
$id_park = $matches[1][0];
$api = "";
if ($id_park == "6a3124c0d5b74e75a24d85e279bfaad6")
{
    $api = "KLgMxNKIJWDtbYhAEfUXqyRRjuVeOWHiVDT";
};
if ($id_park == "9cb05b8548b24e7b8f1ba1e9d478d9a8")
{
    $api = "WtgebpJXvGpFjpdijgcPHmebgphSUhcHkbRrbXM";
};
if ($id_park == "2e7101221f7b41e783a7d5a320bfd044")
{
    $api = "GiiidwniHyaSDkoJVJbuNBIztVoHUYNfiVOVeFyC";
};
if ($id_park == "6f3eb4bc6c574fe586fc86b1aa2b7e7c")
{
    $api = "LBOFSdnoLUywjCFIVlynVywLDePyaaPn";
};
if ($id_park == "2ee4ba7f185f4ae28183ca298b8886e6")
{
    $api = "eocElbEecmEPAGuWXGsMlWNBnYJGtVypTpN";
};

function v4_UUID()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff) , mt_rand(0, 0xffff) , mt_rand(0, 0xffff) , mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff) , mt_rand(0, 0xffff) , mt_rand(0, 0xffff));
};
$from = date('c', time() - 604800);
$to = date('c', time());
$data = ["limit" => 30, "query" => ["park" => ["driver_profile" => ["id" => $id_vod, ], "id" => $id_park, "order" => ["ended_at" => ["from" => $from, "to" => $to], "statuses" => ["complete"], ]]]];
$headers_ya = array(
    "X-Client-ID: taxi/park/$id_park",
    "X-API-Key: $api",
    'Content-Type: application/json'
);
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fleet-api.taxi.yandex.net/v1/parks/orders/list",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($data) ,
    CURLOPT_HTTPHEADER => $headers_ya,
));
$resp = curl_exec($curl);
$resp = serialize($resp);
$count = substr_count($resp, "ended_at");
//Note
if ($count > 0)
{
    $from = date('d-m-Y', strtotime($from));
    $to = date('d-m-Y', strtotime($to));
    $data = [["entity_id" => (int)$id, "note_type" => "common", "params" => ["text" => "В период с $from по $to Выполнил заказы в количестве - " . $count, ]]];
    $method = "/api/v4/leads/notes";
    $headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token, ];
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

    $data = [[

    "pipeline_id" => 6107622, 'status_id' => 55305830, "id" => (int)$id, "_embedded" => ["tags" => [["name" => "ВышелНаЛинию"]], ], "custom_fields_values" => [["field_code" => 'UTM_SOURCE', "values" => [["value" => "Автопроверка"]]]]]];
    $method = "/api/v4/leads";

    $headers = ['Content-Type: application/json', 'Authorization: Bearer ' . $access_token, ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
    curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru" . $method);
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
    $code = (int)$code;
};
?>
