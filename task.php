<?php
require_once 'access.php';
$id = $_POST['number'];
$tag = $_POST['tag'];
if ($tag == 'brosil'){ $taskid = 2767206; $time = 4800; $textline = "ОбзвонАктуальности - не дослушал/бросил/не дал ответа об актуальности";};
if ($tag == 'yes') {$taskid = 2767206; $time = 40000;$textline = "ОбзвонАктуальности - актуально";};
if ($tag == 'late') {$taskid = 2767206; $time = 604800;$textline = "ОбзвонАктуальности - актуально позже";};
if ($tag == 'no') {$taskid = 2842246; $time = 4800;$textline = "Не актуально - отправить в не актуальное";};
if ($tag == 'undefined') {$taskid = 2842246; $time = 4000;$textline = "Есть вопросы,робот не понял, позвонить узнать";};
if ($tag == '') {$taskid = 2767206; $time = 4000;$textline = "Что то пошло не так";};
if ($tag == 'tomorrow') {$taskid = 2767206; $time = 40000;$textline = "Попросили перезвонить позже";};
if ($tag == 'talk') {exit;};

$data = [
    
        //"responsible_user_id" => (int) $user_amo,
        //"created_at" => strtotime(date("Y-m-d H:i:s")),
        //"pipeline_id" => (int) $pipeline_id,
        //'status_id' => (int)$status,
        [
        "responsible_user_id" => 8887046,
        "task_type_id" => $taskid,
        "text" => $textline,
        "complete_till"=> strtotime(date("Y-m-d H:i:s")) + $time,
        "entity_id"=> (int)$id,
        "entity_type"=> "leads"
    ]
            
    
];
$method = "/api/v4/tasks";

$headers = [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $access_token,
];
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_USERAGENT, 'amoCRM-API-client/1.0');
curl_setopt($curl, CURLOPT_URL, "https://$subdomain.amocrm.ru".$method);
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
