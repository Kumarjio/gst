<?php
ini_set('max_execution_time', 0); 
	$apikey = '0e0a6ef0bea947285477e87e42663e22';
//	$hashString = '0e0a6ef0bea947285477e87e42663e22:gosearchtravel.com:ru:129036:1:0:0:2017-06-18:LED:MOW:2017-06-25:BER:LED:Y:127.0.0.1';
	//$sgin = md5($hashString);
	//$params = '{"signature":"'.$sgin.'","marker":"129036","host":"www.gosearchtravel.com","user_ip":"127.0.0.1","locale":"ru","trip_class":"Y","passengers":{"adults":1,"children":0,"infants":0},"segments":[{"origin":"MOW","destination":"LED","date":"2017-05-25"},{"origin":"LED","destination":"MOW","date":"2017-06-18"}]}';
	
//	$params = '{"signature":"'.$sgin.'","marker":"129036","host":"gosearchtravel.com","user_ip":"127.0.0.1","locale":"ru","trip_class":"Y","passengers":{"adults":1,"children":0,"infants":0},"segments":[{"origin":"MOW","destination":"LED","date":"2017-06-18"},{"origin":"LED","destination":"BER","date":"2017-06-25"}]}';



	//one_way
	$hashString = "0e0a6ef0bea947285477e87e42663e22:flights.gosearchtravel.com:en:129036:1:0:0:2017-06-18:DXB:LON:Y:185.164.137.16";
	$sgin = md5($hashString);

	$params ='{"signature":"'.$sgin.'","marker":"129036","host":"flights.gosearchtravel.com","user_ip":"185.164.137.16","locale":"en","trip_class":"Y","passengers":{"adults":1,"children":0,"infants":0},"segments":[{"origin":"LON","destination":"DXB","date":"2017-06-18"}]}';


	echo 'signature string : '.$hashString;
	echo '<br><br>md5 : '.$sgin;
	echo '<br><br>Param : '.$params;
/*	$cSession = curl_init(); 
	//step2
	curl_setopt($cSession,CURLOPT_URL,"http://api.travelpayouts.com/v1/flight_search");
	curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($cSession, CURLOPT_POST, true);
	curl_setopt($cSession,CURLOPT_HEADER, true);
	curl_setopt($cSession, CURLOPT_VERBOSE, 1);
	curl_setopt($cSession, CURLOPT_POSTFIELDS, $string); 
	curl_setopt($cSession,CURLOPT_HTTPHEADER, array('Content-Type: Content-type:application/json'));

	$result = curl_exec($cSession);
	$res = json_decode($result);*/
	
	
	
$ch = curl_init('http://api.travelpayouts.com/v1/flight_search');                                                                      
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   
                                                                                                                     
$result = json_decode(curl_exec($ch));
curl_close($ch);
echo '<br><br>Search ID: '.$result->search_id;

echo '<br><br>';

$ch = curl_init();
echo $url = "http://api.travelpayouts.com/v1/flight_search_results?uuid=".$result->search_id;
curl_setopt($ch, CURLOPT_URL, $url);
//
//curl_setopt($ch, CURLOPT_URL, "http://api.travelpayouts.com/v1/prices/direct?currency=IDR&origin=BOM&destination=HKT&depart_date=2017-05-03");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: deflate'));
$response = json_decode(curl_exec($ch));
curl_close($ch);
echo '<pre>';
//print_r($response);
print_r($response);

/*echo '<pre>';
print_r(json_decode($result));
	*/


