<?php
function travelpayouts_date($date,$format){
	$temp = explode('T',$date);
	$time = trim($temp[1],'Z');
	$ndate = $temp[0];
/*	echo '<pre>';
	print_r($temp);*/
//	echo '<br>ns: '.$ndate.' '.$time;
	$new_date = date($format,strtotime($ndate.' '.$time));
	return $new_date;
	
}

function h_dateFormat2($date,$format){
	$new_date = date($format,strtotime($date));
	return $new_date;
}

function returns_first_data($array){
	foreach($array as $key=>$val){
		return $val;
	}
}