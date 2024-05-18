<?php
require_once 'access.php';

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
preg_match('/((89|\+79)[0-9]{9})/', $Response, $matches);
if (strlen($matches[0]) > 8)
{
    //preg_match('/\+?([0-9]{11}+)/', $Response,$matches);
    $number = $matches[0];
    
    #specify the caller id for the call
    $strCallerId = "Web Call <$number>";
    $length = strlen($strExten);
    $oSocket = fsockopen($strHost, 5038, $errnum, $errstr, 10);
    fputs($oSocket, "Action: Login\r\n");
    fputs($oSocket, "Events: off\r\n");
    fputs($oSocket, "Username: $strUser\r\n");
    fputs($oSocket, "CallerId: $strCallerId\r\n");
    fputs($oSocket, "Secret: $strSecret\r\n\r\n");
    fputs($oSocket, "Action: Command\r\n");
    fputs($oSocket, "Command: channel originate SIP/megafon/$number extension $id@alisa_avto_act \r\n");

    fputs($oSocket, "Action: Logoff\r\n\r\n");
    fclose($oSocket);

    require_once 'note.php';
};

?>
