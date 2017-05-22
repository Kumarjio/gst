<?php
function flight_data() {
    $varApiKey = '?apiKey=611940632879189787393385358451';
    $country_code = 'IR';
    $originplace = 'LON';
    $curency = 'EUR';
    $destination = 'DXB';
    $start_date = date('Y-m-d');
    $dateOneMonth = strtotime($start_date);
//$end_date = date("Y-m-d", strtotime("+1 month", $dateOneMonth));
    $end_date = '';
    $audult = '1';
    $cabinclass = 'Economy';
    $locationschema = 'iata';
    $grouppricing = $preferDirects = 'true';

    $query = "&country=" . $country_code;
    $query .= "&currency=" . $curency;
    $query .= "&locale=en-IE";
    $query .= "&originplace=" . $originplace;
    $query .= "&destinationplace=" . $destination;
    $query .= "&inbounddate=" . $end_date;
    $query .= "&outbounddate=" . $start_date;
    $query .= "&adults=" . $audult;
    $query .="&locationschema=" . $locationschema;
    $query .="&cabinclass=" . $cabinclass;
    $query .="&preferDirects=" . $preferDirects;
    $query .="&grouppricing=" . $grouppricing;

	echo '<br><br>query: '.$query;
	echo '<br><br>url : ';
    echo $apiParamsUrl = "http://partners.api.skyscanner.net/apiservices/pricing/v1.0/" . $varApiKey . $query . "";
	echo '<br><br>';

    $apiParamsStr = parse_url($apiParamsUrl, PHP_URL_QUERY); // get the query string parametures
    parse_str($apiParamsStr, $apiParamsArray); // parse into an array
// the api url. First we need to request for a session
    $apiSessionUrl = 'http://partners.api.skyscanner.net/apiservices/pricing/v1.0';

//open connection
    $ch = curl_init();

//set the url, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $apiSessionUrl);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Accept: application/json')); // make api return json data
    curl_setopt($ch, CURLOPT_POST, count($apiParamsArray)); // set how many fiels
    curl_setopt($ch, CURLOPT_POSTFIELDS, $apiParamsStr);    // set the fields
// caputre the headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);

//execute post
    $response = curl_exec($ch);

// get the headers
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header = substr($response, 0, $header_size);
    $body = substr($response, $header_size);

//close connection
    curl_close($ch);
    print_r($response);
    die();
// get the api session url
    preg_match('~Location: ([^\s]+)~', $header, $matches);
    $apiSessionUrl = $matches[1];

// add on the api key for the session
    $apiSessionUrl .= $varApiKey;

// get the json data
    $data = file_get_contents($apiSessionUrl);

// decode the json
    $array = json_decode($data, true);

// dump json array`enter code here`
    printf('<pre>Poll Data  %s</pre>', print_r($array, true));
}

flight_data();