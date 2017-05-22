<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
	$apikey = 'b8aahqackupgs6acbwj6pmpq';
	$params = http_build_query(array(
		'apikey' =>$apikey,
		"dest" =>'IDR',
		"startdate" => '05/19/2017',
		"enddate" =>'05/20/2017',
		'pickuptime'=>'09:30',
		'dropofftime'=>'14:30',
		"children" =>'0',
		"adults" => '1',
	));

	$url = 'http://api.hotwire.com/v1/search/car?'.$params;
	echo '<br>'.$url;
	$cSession = curl_init(); 
	//step2
	curl_setopt($cSession,CURLOPT_URL,$url);
	curl_setopt($cSession, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($cSession, CURLOPT_HEADER, FALSE);

	$result = curl_exec($cSession);
	echo '<pre>';
/*	print_r($result);*/

	$result = str_replace(array("\n", "\r", "\t"), '', $result);
	$result = trim(str_replace('"', "'", $result));
	$xml = simplexml_load_string($result);
	$json = json_encode($xml);
	$array = json_decode($json,TRUE);
	echo '<pre>';
	print_r($array);


?>
http://api.hotwire.com/v1/search/car?apikey=b8aahqackupgs6acbwj6pmpq&dest=LON&startdate=06/20/2017&enddate=06/23/2017&pickuptime=10:00&dropofftime=13:30