<?php 
require_once 'access.php';
    $db = pg_connect("host=pg3.sweb.ru dbname=maksimsima user=maksimsima password=Maks1999"); // Укажите свои данные для подключения к базе данных
    $dialplan = $_GET['dialplan'];
function onecall($num,$db,$dialplan) {
    $query = "SELECT COUNT(*) AS count FROM telephone WHERE phone = '$num' AND dialplan = '$dialplan'";
    $result = pg_query($db, $query);

    if (!$result) {
    echo "Ошибка при выполнении запроса.";
    } else {
    $row = pg_fetch_assoc($result);
    if ($row['count'] == 0) {
        return 0;
    } else {
        return $row['count'];
    }
    }

    //pg_close($db);
    };
    
    $id = serialize($_POST);
    
    preg_match('/([0-9]{7,8}+)/',$id,$matches);
    $id = $matches[0];
    echo $id;
    //if(isset($_POST['leads']['add'][0]['id'])) {
    //$id = $_POST['leads']['add'][0]['id'];
    //echo $id;
    //};
 // Вывод значения id
	$headers = [
		"Accept: application/json",
		'Authorization: Bearer ' . $access_token,
	];

	$link="https://$subdomain.amocrm.ru/api/v4/leads/$id?";
    $link .= http_build_query(['with' => 'contacts']);
	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_HEADER, "With:contacts");
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out=curl_exec($curl);
	echo $out;
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	curl_close($curl);
	$Response=json_decode($out,true);
//	$Response=json_decode($out,true)-> ;
	$contact_id = $Response['_embedded']['contacts'][0]['id'];
	$una = serialize($Response);
	$link="https://$subdomain.amocrm.ru/api/v4/contacts/$contact_id";
	$curl = curl_init(); //Сохраняем дескриптор сеанса cURL
	curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
	curl_setopt($curl,CURLOPT_URL, $link);
	curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl,CURLOPT_HEADER, false);
	curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
	curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
	$out=curl_exec($curl);
	echo $out;
	$code=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	echo $code;
	curl_close($curl);
	$Response=json_decode($out,true);
		foreach ($Response['custom_fields_values'] as $field) {
    if ($field['field_code'] === 'PHONE') {
        $phoneNumber = $field['values'][0]['value'];
        break;
        }
    };
    foreach ($Response['custom_fields_values'] as $field) {
    if ($field['field_code'] === 'CITIZENSHIP') {
        $citizenship = $field['values'][0]['value'];
        break;
        }
    };

	$Response = preg_replace('[-]','',$Response);
	$Response = preg_replace('[ ]','',$Response);
	$phoneNumber = ltrim($phoneNumber, '+');

	$number =  $phoneNumber;
	
	
	if(onecall("$number",$db,$dialplan) != 0){
	    $text = "По номеру в этой сделке уже звонил робот, это дубль";
	    require_once 'common_note.php';
	    exit('Уже звонили');
	};
    $strHost = "94.228.114.20"; #адрес сервера asterisk
    $strUser = "callback"; #логин для подключения к ami
    $strSecret = "m@ks1999"; 
    $strChannel = "SIP/megafon"; 
    $strWaitTime = "30";
    $strPriority = "1";
    $strMaxRetry = "3";
    $strExten = $number;
    require_once 'rec.php';
    #specify the caller id for the call
    $strCallerId = "Web Call <$strExten>";
    $length = strlen($strExten);
    $oSocket = fsockopen($strHost, 5038, $errnum,$errstr,10);
    fputs($oSocket, "Action: Login\r\n");
    fputs($oSocket, "Events: off\r\n");
    fputs($oSocket, "Username: $strUser\r\n");
    fputs($oSocket, "CallerId: $strCallerId\r\n");
    fputs($oSocket, "Secret: $strSecret\r\n\r\n");
    fputs($oSocket, "Action: Command\r\n");
    echo $citizenship.$id;
    fputs($oSocket, "Command: channel originate SIP/megafon/$strExten extension $id@$dialplan \r\n");
  
    
    sleep (1);
    fputs($oSocket, "Action: Logoff\r\n\r\n");
    fclose($oSocket);

    
function insertData($phone, $data, $dialplan,$id,$db) {

    $phone = pg_escape_string($phone);
    $data = pg_escape_string($data);
    
    $dialplan = pg_escape_string($dialplan);
    $id = pg_escape_string($id);

    $query = "INSERT INTO telephone (phone, data, time,dialplan,lid,status) VALUES ('$phone', '$data', now(),'$dialplan','$id','недозвон')";

    $result = pg_query($db, $query);

    if (!$result) {
        echo "Ошибка при выполнении запроса.";
    } else {
        echo "Данные успешно добавлены в таблицу telephone.";
    }

    pg_close($db);
}

// Использование функции
insertData($strExten, $citizenship,$dialplan,$id,$db);


$nedo = 1; 
$nedotag = "Недозвон";
$count_calls = 5;
$nedonum = "ПятьЗвонков";
require_once '../patch.php';
require_once '../note.php';
?>
