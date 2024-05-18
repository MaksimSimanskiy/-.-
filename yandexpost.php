<?php
$name = $_POST['name'];
$fame = $_POST['fame'];
$otc = $_POST['otc'];
$phone = $_POST['number'];
$city = $_POST['cityname'];
$city = trim($city);
$dateb = $_POST['dateb'];
$working = $_POST['working'];
$doc = $_POST['doc'];
$data_vu = $_POST['data_vu'];
$vu_do = $_POST['vu_do'];
$mode = $_POST['mode'];
$marka = $_POST['marka'];
$color_avto = $_POST['color_avto'];
$god_vip = (int)$_POST['god_vip'];
$gos_nom = $_POST['gos_nom'] . $_POST['gos_reg'];
$vin = $_POST['vin'];
$sts = $_POST['sts'];
$dlina = (int)$_POST['dlina'];
$shirina = (int)$_POST['shirina'];
$visota = (int)$_POST['visota'];
$ves = (int)$_POST['ves'];
$work_rule = "";
$first_name = $name;
$last_name = $fame;
$middle_name = ' ';
if ($otc != "")
{
    $middle_name = $otc;
};

$end = "Location:../endpage.php";

if ($working == 'Курьером на велосипеде/самокате')
{
    $working = 'Пешим курьером';
};
$iso_date = date('Y-m-d');
//поля для водителя
$order_provider = [
      "partner" => false,
      "platform"=> true
    ];
    $person = [
      "contact_info" => [
        "address"=> $city,
        "phone"=> $phone
      ],
      "driver_license"=> [
        "birth_date"=> $dateb,
        "country"=> "rus",
        "expiry_date"=>$vu_do ,
        "issue_date"=> $data_vu,
        "number"=> $doc
      ],
      "full_name" =>[
        "first_name"=>$first_name,
        "last_name"=>$last_name ,
        "middle_name"=>$middle_name
      ]
    ];
    $profile = [
      "hire_date"=> $iso_date
    ];
    $cargo = [
      "cargo_hold_dimensions"=> [
        "height"=> $visota ,
        "length"=> $dlina,
        "width"=> $shirina
      ],
      "cargo_loaders" => 1,
      "carrying_capacity"=>$ves
    ];
    $park_profile = [
      "callsign"=> $gos_nom,
      "categories" => ["express"],
      "is_park_property"=> false,
      "status"=> "working"
    ];
    $gruz_profile = [
      "callsign"=> $gos_nom,
      "categories" => ["cargo"],
      "is_park_property"=> false,
      "status"=> "working"
    ];
    $taxi_profile = [
      "callsign"=> $gos_nom,
      "categories" => ["econom","comfort","express"],
      "is_park_property"=> false,
      "status"=> "working"
    ];
    $vehicle_licenses = [
      "licence_plate_number"=> $gos_nom,
      "registration_certificate" => $sts
    ];
    $vehicle_specifications = [
      "brand"=>$mode,
      "color"=>$color_avto,
      "model"=>$marka,
      "transmission"=>"unknown",
      "vin"=>$vin,
      "year"=>$god_vip
    ];
    
    function moto_doc($doc,$phone){
      $moto_docs = ' ';
      if($doc == ''){
        $moto_docs = mb_substr($phone, 6);
        $moto_docs = "AA" . $moto_docs;
      }
      else{
        $moto_docs = $doc;
      }
      return $moto_docs;
    };
    function moto_sign($phone){
        $moto_docs = ' ';
        $moto_docs = mb_substr($phone, 6);
        $moto_docs = "AA" . $moto_docs;
        return $moto_docs;
    };
    $moto_specifications = [
      "brand"=>"Bike",
      "color"=>'Черный',
      "model"=>"Courier",
      "transmission"=>"unknown",
      "vin"=>"00000000000000000",
      "year"=>2021
    ];
    
    $moto_park_profile = [
      "callsign"=> moto_sign($phone),
      "categories" => ["express"],
      "is_park_property"=> false,
      "status"=> "working"
    ];
    
    $moto_licenses = [
      "licence_plate_number"=> "АА" . mb_substr($phone, 6),
      "registration_certificate" => "0000000000"
    ];
    
    $moto_person = [
      "contact_info"=> [
        "address"=> $city,
        "phone"=> $phone
      ],
      "driver_license"=> [
        "birth_date"=> $dateb,
        "country"=> "rus",
        "expiry_date"=> "2031-01-01",
        "issue_date"=> "2021-01-01",
        "number"=> moto_doc($doc,$phone)
      ],
      "full_name"=>[
        "first_name"=>$first_name,
        "last_name"=>$last_name ,
        "middle_name"=>$middle_name
      ]
    ];


function v4_UUID()
{
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
    // 32 bits for the time_low
    mt_rand(0, 0xffff) , mt_rand(0, 0xffff) ,
    // 16 bits for the time_mid
    mt_rand(0, 0xffff) ,
    // 16 bits for the time_hi,
    mt_rand(0, 0x0fff) | 0x4000,

    // 8 bits and 16 bits for the clk_seq_hi_res,
    // 8 bits for the clk_seq_low,
    mt_rand(0, 0x3fff) | 0x8000,
    // 48 bits for the node
    mt_rand(0, 0xffff) , mt_rand(0, 0xffff) , mt_rand(0, 0xffff));
};
$end = "Location:../endpage.php";
$headers = array(
        "X-Client-ID: $client_id",
        "X-API-Key: $api_key",
        "X-Park-ID: $park_id",
        "X-Idempotency-Token: " . v4_UUID() ,
        "Content-Type: text/plain"
);
$walk = 'https://fleet-api.taxi.yandex.net/v2/parks/contractors/walking-courier-profile';
$avto_courier = 'https://fleet-api.taxi.yandex.net/v2/parks/contractors/auto-courier-profile';
$taxi = 'https://fleet-api.taxi.yandex.net/v2/parks/contractors/driver-profile';
$car = 'https://fleet-api.taxi.yandex.net/v2/parks/vehicles/car';
$account = ["balance_limit" => "5", "block_orders_on_balance_below_limit" => false, "work_rule_id" => $work_rule];
function walk_make($error_message, $city, $dateb, $first_name, $last_name, $middle_name, $phone, $work_rule, $walk, $headers)
{
    $data = ["birth_date" => $dateb, "city" => $city, "full_name" => ["first_name" => $first_name, "last_name" => $last_name, "middle_name" => $middle_name], "phone" => $phone, "registration_country_code" => "RU", "work_rule_id" => $work_rule];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $walk,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $errors = [301 => 'Moved permanently.', 400 => 'Wrong structure of the array of transmitted data, or invalid identifiers of custom fields.', 401 => 'Not Authorized. There is no account information on the server. You need to make a request to another server on the transmitted IP.', 403 => 'The account is blocked, for repeatedly exceeding the number of requests per second.', 404 => 'Not found.', 500 => 'Internal server error.', 502 => 'Bad gateway.', 503 => 'Service unavailable.'];
    $err_code = json_decode($response)->code;
    

    curl_close($curl);
    //$err_code = json_decode($response)->code;
    $err_code = json_decode($response)->code;
    $success = json_decode($response)->contractor_profile_id;
    return $success;
};

function taxi_make($error_message, $taxi_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers)
{
    $data = ["park_profile" => $taxi_profile, "vehicle_licenses" => $vehicle_licenses, "vehicle_specifications" => $vehicle_specifications];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $car,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;

    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;

    $contractor = json_decode($response)->vehicle_id;
    return $contractor;
};

function car_make($error_message, $park_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers)
{
    $data = ["park_profile" => $park_profile, "vehicle_licenses" => $vehicle_licenses, "vehicle_specifications" => $vehicle_specifications];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $car,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;

    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->vehicle_id;
    return $contractor;
};

function gruz_make($error_message, $cargo, $gruz_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers)
{
    $data = ["cargo" => $cargo, "park_profile" => $gruz_profile, "vehicle_licenses" => $vehicle_licenses, "vehicle_specifications" => $vehicle_specifications];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $car,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->vehicle_id;
    return $contractor;
};

function avto_courier_make($error_message, $car_id, $account, $order_provider, $person, $profile, $work_rule, $avto_courier, $headers)
{
    $data = ["account" => $account, "car_id" => $car_id, "order_provider" => $order_provider, "person" => $person, "profile" => $profile];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $avto_courier,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->contractor_profile_id;;
    return $contractor;
};

function avto_driver_make($error_message, $car_id, $account, $order_provider, $person, $profile, $work_rule, $taxi, $headers)
{
    $data = ["account" => $account, "car_id" => $car_id, "order_provider" => $order_provider, "person" => $person, "profile" => $profile];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $taxi,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->contractor_profile_id;;
    return $contractor;
};

function moto_make($error_message, $moto_park_profile, $moto_licenses, $moto_specifications, $work_rule, $car, $headers)
{
    $data = ["park_profile" => $moto_park_profile, "vehicle_licenses" => $moto_licenses, "vehicle_specifications" => $moto_specifications];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $car,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->vehicle_id;
    return $contractor;
};

function moto_courier_make($error_message, $car_id, $account, $order_provider, $moto_person, $profile, $work_rule, $avto_courier, $headers)
{
    $data = ["account" => $account, "car_id" => $car_id, "order_provider" => $order_provider, "person" => $moto_person, "profile" => $profile];

    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => $avto_courier,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($data) ,
        CURLOPT_HTTPHEADER => $headers,
    ));
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $code = (int)$code;
    $output = json_decode($response, true);
    curl_close($curl);
    $err_code = json_decode($response)->code;
    $message = json_decode($response)->message;
    $contractor = json_decode($response)->contractor_profile_id;
    return $contractor;
};

if (isset($_POST))
{
    if ($working == 'Курьером на авто')
    {
        $car_id = car_make($error_message, $park_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers);
        $contractor = avto_courier_make($error_message, $car_id, $account, $order_provider, $person, $profile, $work_rule, $avto_courier, $headers);
    };
    if ($working == 'Пешим курьером')
    {

        $contractor = walk_make($error_message, $city, $dateb, $first_name, $last_name, $middle_name, $phone, $work_rule, $walk, $headers);
        $car_id = $contractor;        
    };
    if ($working == 'Курьером на велосипеде/самокате')
    {

        $contractor = walk_make($error_message, $city, $dateb, $first_name, $last_name, $middle_name, $phone, $work_rule, $walk, $headers);
        $car_id = $contractor;
    };
    if ($working == 'Курьером на грузовом авто')
    {

        $car_id = gruz_make($error_message, $cargo, $gruz_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers);
        $contractor = avto_courier_make($error_message, $car_id, $account, $order_provider, $person, $profile, $work_rule, $avto_courier, $headers);
    };
    if ($working == 'Мотокурьером(мотоцикл/скутер)')
    {

        if ($city == 'Москва')
        {
            $contractor = 'мошенник_возможно';
            $_POST['otc'] = 'Мошенник?';
        }
        else
        {
            $car_id = moto_make($error_message, $moto_park_profile, $moto_licenses, $moto_specifications, $work_rule, $car, $headers);
            $contractor = moto_courier_make($error_message, $car_id, $account, $order_provider, $moto_person, $profile, $work_rule, $avto_courier, $headers);
        };
    };
    if ($working == 'Водителем такси')
    {
        $car_id = taxi_make($error_message, $taxi_profile, $vehicle_licenses, $vehicle_specifications, $work_rule, $car, $headers);
        $contractor = avto_driver_make($error_message, $car_id, $account, $order_provider, $person, $profile, $work_rule, $taxi, $headers);
    };
};
$url = "https://fleet.yandex.ru/contractors/$contractor/details?park_id=$park_id";

