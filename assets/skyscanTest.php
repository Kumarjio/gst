<?php

/*	$depart_date = $_GET['depart_date'];
	$return_date = $_GET['return_date'];
	$origin =  $_GET['origin'];
	$destination =  $_GET['destination'];*/
	$apikey = 'go611940632879189787393385358451';
	$params = http_build_query(array
	(
		"currency" => 'USD',
		"country" => 'GB',
		"locale" =>'en-GB',
		"originPlace" => 'LON',
		"destinationPlace" => 'DXB',
		"outbounddate" => '2017-06-20',
		"inbounddate" => '2017-06-25',
		"cabinclass" => 'Economy',
		"adults" => 1,
		'apikey' =>$apikey
	));
	
	echo '<br>param: '.$params;
	$cSession = curl_init(); 
	echo '<br>Url: '.$url = "http://partners.api.skyscanner.net/apiservices/pricing/v1.0?apikey=".$apikey;
	//step2
	curl_setopt($cSession,CURLOPT_URL,$url);
	curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($cSession, CURLOPT_POST, true);
	curl_setopt($cSession,CURLOPT_HEADER, true);
	curl_setopt($cSession, CURLOPT_VERBOSE, 1);
	curl_setopt($cSession, CURLOPT_POSTFIELDS, $params); 
	

	curl_setopt($cSession,CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Accept: application/json'));
	//step3
	$result = curl_exec($cSession);
	echo '<pre>';
	print_r($result);
