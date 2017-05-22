<?php
	

class test_hotel_lib{
	private $API_KEY	= "0e0a6ef0bea947285477e87e42663e22";
	private $API_Marker = "129036";

	public function __construct(){
		$this->CI =& get_instance();
	}


	function test_data1($id,$city=false,$checkIn=false,$checkOut,$adult,$children,$IP) {
		$result  = array();
		$result['status'] = 'error';
		$pro =array();

		$searchData = $this->get_search_data($id,20,'price');
/*			echo '<pre>';
			print_r($searchData);*/

			if($searchData&&$searchData->status=='ok'){
				$tmp = $searchData->result;
				if(isset($tmp)&&!empty($tmp)){
					$result['status'] = 'ok';
					//echo $result['status'];
					 foreach($tmp as $key=>$set_p){
						$temp =array();
						$temp['id'] = $set_p->id;
						$temp['link'] = $set_p->fullUrl;
						$temp['stars'] =  $set_p->stars;
						$temp['rating'] =  $set_p->rating;
						$temp['type'] = 'travelpayouts';
						$temp['address'] = $set_p->address;
						$temp['price'] = $set_p->price;
						$temp['maxPrice'] = $set_p->maxPrice;
						$temp['name'] = $set_p->name;
						$temp['photos'] = 'http://cdn.photo.hotellook.com/image_v2/crop/h'.$set_p->id.'/640/480.jpg';

						$temp['location'] = array('lon'=>$set_p->location->lon,'lat'=>$set_p->location->lat);
						$pro[] = $temp;
						//print_r($temp);
					 }
				}
			}
		
		
		$result['pro'] = $pro;
/*		echo '<pre>';
		print_r($search_data);
		die;
*/
	    return $result;
	}
	
	function get_search_data($searchId,$limit,$price){
			$ch = curl_init();
			
			$string2 = md5($this->API_KEY.':'.$this->API_Marker.':'.$limit.':0:0:'.$searchId.':1:'.$price);
			$params = http_build_query(array(
				'searchId' 		=> $searchId,
				'limit'			=> $limit,
				'sortBy'		=> $price,
				'sortAsc'		=> 1,
				'roomsCount'	=> 0,
				'offset'		=> 0,
				'marker'		=> $this->API_Marker,
				'signature' 	=> $string2
			));

			//$url ='http://engine.hotellook.com/api/v2/search/getResult.json?searchId='.$searchId.'&limit='.$limit.'&sortBy='.$price.'&sortAsc=1&roomsCount=0&offset=0&marker='.$this->API_Marker.'&signature='.$string2;
			$url ='http://engine.hotellook.com/api/v2/search/getResult.json?'.$params;
			curl_setopt($ch, CURLOPT_URL, $url);
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:cef8472114e959429c4886a246289a62"));
			$response = curl_exec($ch);
			curl_close($ch);
			
			$res = json_decode($response);
			return $res;
	}
	
	function get_location_g1($dlocation){
     // Get lat and long by address         
        $address = $dlocation; // Google HQ
        $prepAddr = str_replace(' ','+',$address);
		
		$ch = curl_init();
		$params = http_build_query(array(
				'address' =>$prepAddr,
				'sensor'=>'false',
				));
		
		$url ="https://maps.google.com/maps/api/geocode/json?".$params;
		curl_setopt($ch, CURLOPT_URL,$url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
	//	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:"));
		$response = curl_exec($ch);
		$output = json_decode($response);
		curl_close($ch);

      //  $geocode=file_get_contents($string);
/*		echo '<pre>';
		print_r($output);*/

		if ($output->status == 'OK') {
    	   	echo '<br>Lat: '. $latitude = $output->results[0]->geometry->location->lat;
			echo '<br>lang: '.$longitude = $output->results[0]->geometry->location->lng;
			$ch = curl_init();	
			$url ="http://iatageo.com/getCode/".$latitude.'/'.$longitude;
			curl_setopt($ch, CURLOPT_URL,$url);
			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:"));
			$response = curl_exec($ch);
			$res= json_decode($response);
			curl_close($ch);
			echo '<pre>';
			echo $res->IATA;
			print_r($res);
			if(!empty($res)&&isset($res->IATA)){
				return $res->IATA;
			}
		}
		return 0;
	}


}
?>
