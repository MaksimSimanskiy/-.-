<?php
require_once 'access.php';
$id = $_POST['number'];
$tag = $_POST['tag'];
$auto = $_POST['tag'];
$context = $_POST['context'];
 if($context == "dialer"){$status = 54105814;};
  if($context == "dialer_act_avto"){            $status = 56024562;};
 if($context == "dialer_act_gruz"){ $status = 61864610;};

function onecall($context,$num,$db) {
    $query = "SELECT COUNT(*) AS count 
FROM telephone 
WHERE lid = '$num' AND LOWER(status) = LOWER('недозвон') AND dialplan = '$context'";
    $result = pg_query($db, $query);

    if (!$result) {
    echo "Ошибка при выполнении запроса.";
    } else {
    $row = pg_fetch_assoc($result);
    if ($row['count'] == 0) {
        return 1;
    } else {
        return $row['count'];
    }
    }

    //pg_close($db);
    };
    $db = pg_connect("host=pg3.sweb.ru dbname=maksimsima user=maksimsima password=Maks1999");
    $numnedozvon = onecall($context,$id,$db);
    if($context == "dialer"){
if ($tag == 'yes') {$tag = "АктуальноСейчас";$status = 52897594;};
if ($tag == 'yes_q') {$tag = "АктуальноСейчас";$status = 52897594;};
if ($tag == 'talk') {$tag = "АктуальноУжеЗвонили";$status = 52897594;};
if ($tag == 'late') {$tag = "АктуальноПозже";$status = 52897598;}
if ($tag == 'no'){ $tag = "НеАктуально" ;$status = 54105814;};
if ($tag == 'no_q'){ $tag = "НеАктуально" ;$status = 54105814;};
if ($tag == 'brosil') {$tag = "ВзялТрубку";$status = 54105814;};
if ($tag == 'hour') {$tag = "Перезвонить";$status = 54105814;};
if ($tag == 'tomorrow') {$tag = "ПерезвонитьПозже";$status = 54105814;};
if ($tag == 'undefined') {$tag = "НеОпределенно";$status = 54105814;};
if ($tag == 'auto') {$tag = "Недозвон".$numnedozvon;$status = 54105814;};
if ($tag == 'office') {$tag = "Офис";$status = 53875046;};
if ($tag == '') {$tag = "Промолчал";$status = 54105814;};
    };
        if($context == "dialer_act_avto"){
            $status = 56024562;
if ($tag == 'yes') {$tag = "АктуальноСейчас";$status = 54943978;};
if ($tag == 'yes_q') {$tag = "АктуальноСейчас";$status = 54943978;};
if ($tag == 'talk') {$tag = "АктуальноУжеЗвонили";$status = 56024562;};
if ($tag == 'late') {$tag = "АктуальноПозже";$status = 56024562;}
if ($tag == 'no'){ $tag = "НеАктуально" ;$status = 56024562;};
if ($tag == 'no_q'){ $tag = "НеАктуально" ;$status = 56024562;};
if ($tag == 'brosil') {$tag = "ВзялТрубку";$status = 56024562;};
if ($tag == 'hour') {$tag = "Перезвонить";$status = 56024562;};
if ($tag == 'tomorrow') {$tag = "ПерезвонитьПозже";$status = 56024562;};
if ($tag == 'undefined') {$tag = "НеОпределенно";$status = 56024562;};
if ($tag == 'auto') {$tag = "Недозвон".$numnedozvon;$status = 56024562;};
if ($tag == 'office') {$tag = "Офис";$status = $status = 56024562;};
if ($tag == 'pozhe') {$tag = "АктуальноПозже";$status = 54943978;};
if ($tag == 'poka_net') {$tag = "АктуальноПозже";$status = 52897598;};
if ($tag == 'cheap') {$tag = "Дешево";$status = 54943978;};
if ($tag == 'fixcar') {$tag = "Поломка";$status = 52897598;};
if ($tag == 'malo') {$tag = "Мало денег";$status = 54943978;};
if ($tag == 'nextweek') {$tag = "ВыйдетПозже";$status = 54943978;};
if ($tag == 'podrabotka') {$tag = "Подработка";$status = 54943978;};
if ($tag == 'sick') {$tag = "Болен";$status = 52897598;};
if ($tag == '') {$tag = "Промолчал";$status = $status = 54734214;};
    };
    if($context == "dialer_act_gruz"){
        $status = 61864610;
if ($tag == 'yes') {$tag = "АктуальноСейчас";$status = 54943978;};
if ($tag == 'yes_q') {$tag = "АктуальноСейчас";$status = 54943978;};
if ($tag == 'talk') {$tag = "АктуальноУжеЗвонили";$status = 61864610;};
if ($tag == 'late') {$tag = "АктуальноПозже";$status = 54943978;}
if ($tag == 'no'){ $tag = "НеАктуально" ;$status = 61864610;};
if ($tag == 'no_q'){ $tag = "НеАктуально" ;$status = 61864610;};
if ($tag == 'brosil') {$tag = "ВзялТрубку";$status = 61864610;};
if ($tag == 'hour') {$tag = "Перезвонить";$status = 61864610;};
if ($tag == 'tomorrow') {$tag = "ПерезвонитьПозже";$status = 61864610;};
if ($tag == 'undefined') {$tag = "НеОпределенно";$status = 61864610;};
if ($tag == 'auto') {$tag = "Недозвон".$numnedozvon;$status = 61864610;};
if ($tag == 'office') {$tag = "Офис";$status = 54943978;};
if ($tag == 'pozhe') {$tag = "АктуальноПозже";$status = 54943978;};
if ($tag == 'poka_net') {$tag = "АктуальноПозже";$status = 52897598;};
if ($tag == 'cheap') {$tag = "Дешево";$status = 54943978;};
if ($tag == 'fixcar') {$tag = "Поломка";$status = 52897598;};
if ($tag == 'malo') {$tag = "Мало денег";$status = 54943978;};
if ($tag == 'nextweek') {$tag = "ВыйдетПозже";$status = 54943978;};
if ($tag == 'podrabotka') {$tag = "Подработка";$status = 54943978;};
if ($tag == 'sick') {$tag = "Болен";$status = 52897598;};
if ($tag == '') {$tag = "Промолчал";$status = "";};
    };
$data = [
    [
        //"responsible_user_id" => (int) $user_amo,
        //"created_at" => strtotime(date("Y-m-d H:i:s")),
        //"pipeline_id" => (int) $pipeline_id,
        "status_id" => (int)$status,
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

function callstatus($auto,$status, $lid) {
    if ($auto == 'auto') {
        $status = "недозвон";
    };
    $db = pg_connect("host=pg3.sweb.ru dbname=maksimsima user=maksimsima password=Maks1999"); // Укажите свои данные для подключения к базе данных

if (!$db) {
        die("Error connecting to database");
    }
    
    $query = "UPDATE telephone SET status = '$status' WHERE lid = '$lid' AND id = (SELECT id FROM telephone WHERE lid = '$lid' ORDER BY id DESC LIMIT 1)";
    $result = pg_query($db, $query);
    
    if (!$result) {
        die("Error executing query");
    }
    
   pg_close($db);
}
callstatus($auto,$tag, $id);
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
curl_setopt($curl, CURLOPT_COOKIEFILE, '../amo/cookie.txt');
curl_setopt($curl, CURLOPT_COOKIEJAR, '../amo/cookie.txt');
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
require_once 'taskcall.php';

//echo array_values($Response)[0]['id'];
