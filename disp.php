<?php 
require_once 'access.php';

  function payment($id,$id_park,$api){
       $data = [
            "account" => [
        "balance_limit" ,
        "payment_service_id" ,
        "type"
        
    ],
    'order_provider' => [
                'partner' ,
                'platform' ,
            ],
    "person" => [
        "contact_info" => [
            
            "phone" ,
            "password",
            "payment_service_id"
        ],
        "driver_license_experience" =>[],	
        "driver_license" => [
            "country" ,
            "expiry_date" ,
            "issue_date" ,
            "number" 
        ],

        "full_name" => [
            "first_name",
            "last_name",
            "middle_name"
        ],
        "profile" => [
            "hire_date",
            "work_status"
        ]
    ]
    ];
    $headers_ya = array(
        "X-Client-ID: taxi/park/$id_park",
         "X-Park-ID: $id_park",
        "X-API-Key: $api",
        'Content-Type: application/json');
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fleet-api.taxi.yandex.net/v2/parks/contractors/driver-profile?contractor_profile_id=$id",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => $headers_ya,
    ));
    $resp = curl_exec($curl);
   $data = json_decode($resp, true);
   return $data['account']['payment_service_id'];
  };
  function amolid($status_id,$company,$phone,$born,$name,$url,$error,$subdomain,$access_token){


$utm_source   = 'Штатник';
$utm_medium   = '';
$utm_term     = '';
$data = [
    [
        "name" => $name,
        "status_id"=> $status_id,
        "responsible_user_id" => (int) $user_amo,
        "created_at" => strtotime(date("Y-m-d H:i:s")),
        "pipeline_id" => (int) $pipeline_id,
        "_embedded" => [
            "contacts" => [
                [
                    "first_name" => $name,
                    "custom_fields_values" => [
                        [
                            "field_code" => "PHONE",
                            "values" => [
                                [
                                    "enum_code" => "WORK",
                                    "value" => $phone
                                ]
                            ]
                        ],
                                           
                        [
                            "field_id" => 284265,
                            "values" => [
                                [
                                    "value" => "Штатник"
                                ]
                            ]
                        ],
                                                [
                            "field_id" => 995453,
                            "values" => [
                                [
                                    "value" => $url
                                ]
                            ]
                        ],
                        [
                            "field_id" => 548467,
                            "values" => [
                                [
                                    "value" => $born
                                ]
                            ]
                        ],
                        [
                            "field_id" => 548463,
                            "values" => [
                                [
                                    "value" => $name
                                ]
                            ]
                        ],

                    ]
                ]    
            ],
            "companies" => [
                [
                    "name" => $company
                ]
            ]
        ],
        "custom_fields_values" => [
            [
                "field_code" => 'UTM_SOURCE',
                "values" => [
                    [
                        "value" => $utm_source
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_CONTENT',
                "values" => [
                    [
                        "value" => $utm_content
                    ]
                ]
            ],

            [
                "field_code" => 'UTM_CAMPAIGN',
                "values" => [
                    [
                        "value" => $error
                    ]
                ]
            ],
            [
                "field_code" => 'UTM_TERM',
                "values" => [
                    [
                        "value" => $company
                    ]
                ]
            ],
        ],
    ]
];
$method = "/api/v4/leads/complex";
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
//amobackup($data,$out);
  };
  
  function edit($data,$api,$id_park,$driver)
  {
   $headers_ya = array(
        "X-Park-ID: $id_park",
        "X-Client-ID: taxi/park/$id_park",
        "X-API-Key: $api",
        'Content-Type: application/json');
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fleet-api.taxi.yandex.net/v2/parks/contractors/driver-profile?contractor_profile_id=$driver",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'PUT',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => $headers_ya,
    ));
  };
    
function execute($id_park,$api,$status_id,$company,$work_rule,$subdomain,$access_token){
 $data = [
      "fields" => [
            "account" => [
        "balance_limit" ,
        
    ],
    "park" => [],
    "car" => [
        "id"
        ],
    "person" => [
        "contact_info" => [
            
            "phone" ,
            "password",
            "payment_service_id"
        ],
        "driver_license" => [
            "country" ,
            "expiry_date" ,
            "issue_date" ,
            "number" 
        ],
        "driver_profile" =>[
            "created_date"
            ],
        "full_name" => [
            "first_name",
            "last_name",
            "middle_name"
        ],
        "profile" => [
            "hire_date",
            "work_status"
        ]
    ]
    ],
        "limit" => 50,
        "query"=> [
            "park"=> [
                "driver_profile" => [
                    "work_rule_id" => $work_rule_id
                    
                    ],
               
                "id" => $id_park,
            ]
        ]
    ];
    $headers_ya = array(
        "X-Client-ID: taxi/park/$id_park",
        "X-API-Key: $api",
        'Content-Type: application/json');
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://fleet-api.taxi.yandex.net/v1/parks/driver-profiles/list",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => $headers_ya,
    ));
    $resp = curl_exec($curl);
   $data = json_decode($resp, true);
// Создание нового массива для хранения значений "id"

$modified_driver_profiles = [];

if (isset($data['driver_profiles']) && is_array($data['driver_profiles'])) {
    foreach ($data['driver_profiles'] as $driver_profile) {
        $created_date = strtotime($driver_profile['driver_profile']['created_date']);
        echo $created_date;
        $current_time = time();
        $one_hour_ago = $current_time - 3600;

        if ($created_date >= $one_hour_ago && $created_date <= $current_time) {

        $account = $driver_profile['accounts'][0];
        $person = $driver_profile['driver_profile'];
        $driver = $driver_profile['driver_profile']['id'];
        echo 'АЙДИ'.$driver_profile['car']['id'];

        $expiry_date = new DateTime($person['driver_license']['expiration_date']);
        $issue_date = new DateTime($person['driver_license']['issue_date']);
        $hire_date = new DateTime($person['hire_date']);
        $modified_driver_profiles = [
            'account' => [
                'balance_limit' => '5',
                'work_rule_id' => "$work_rule",
                'payment_service_id' => payment($driver,$id_park,$api)
            ],
            'car_id' =>  $driver_profile['car']['id'],
            'order_provider' => [
                'partner' => true,
                'platform' => true,
            ],
            'person' => [
                'contact_info' => [
                    'phone' => $person['phones'][0]
                ],
                'driver_license' => [
                    'country' => $person['driver_license']['country'],
                    'expiry_date' =>  $expiry_date->format('Y-m-d'),
                    'issue_date' => $issue_date->format('Y-m-d'),
                    'number' => $person['driver_license']['number']
                ],
                'full_name' => [
                    'first_name' => $person['first_name'],
                    'last_name' => $person['last_name'],
                    'middle_name' => $person['middle_name']
                ]
                ],
                'profile' => [
                    'hire_date' => $hire_date->format('Y-m-d') ,
                    'work_status' => $person['work_status']
                ]
            
        ];
        $url = "https://fleet.yandex.ru/drivers/$driver/details?park_id=$id_park";
        $name =  $person['last_name'].' '.$person['first_name'].' '.$person['middle_name'];
        $born = $hire_date->format('Y-m-d');
        $error = edit($modified_driver_profiles,$api,$id_park,$driver);
        amolid($status_id,$company,$person['phones'][0],$born,$name,$url,$error,$subdomain,$access_token);
    }
        else{
        echo 'более часа назад';
    }
}
}
};
execute($id_park,$api,$cd,$cd_name,$work_rule,$subdomain,$access_token);
?>
