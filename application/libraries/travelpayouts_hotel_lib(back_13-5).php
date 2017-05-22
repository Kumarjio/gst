<?php
	

class travelpayouts_hotel_lib{
	private $API_KEY	= "0e0a6ef0bea947285477e87e42663e22";
	private $API_Marker = "129036";

	public function __construct(){
		$this->CI =& get_instance();
	}

	
	function get_hotel1($city=false,$checkIn=false,$checkOut,$adult,$children,$IP) {
		$result  = array();
		$result['status'] = 'error';
		$pro =array();

		$id = $this->get_location($city);
		if($id){
			$search_data = $this->get_hotel_data($id,20);
			//echo '<pre>';
			//print_r($search_data);
			if($search_data&&isset($search_data->hotels)&&!empty($search_data->hotels)){
				$tmps = $search_data->hotels;
				$result['status'] = 'ok';
				//echo $result['status'];
				 foreach($tmps as $set_p){
					//print_r($set_p);
					$temp =array();
					$temp['id'] = $set_p->id;
					$temp['link'] = '';
					$temp['type'] = 'travelpayouts';
					$temp['stars'] =  $set_p->stars;
					$temp['rating'] =  $set_p->rating;
					$temp['price'] =  $set_p->pricefrom;
					$temp['photos'] =  '';
					if(isset($set_p->photos[0])&&!empty($set_p->photos[0])){
						$temp['photos'] =  $set_p->photos[0]->url;
					}
//					$temp['rating'] =  $set_p->;
					$temp['address'] = '';
					if(isset($set_p->address->en)&&!empty($set_p->address->en)){
						$temp['address'] = $set_p->address->en;
					}
					$temp['name'] = 'No-name';
					if(isset($set_p->name->en)&&!empty($set_p->name->en)){
						$temp['name'] = $set_p->name->en;
					}
					$temp['location'] = array('lon'=>$set_p->location->lon,'lat'=>$set_p->location->lat);
					$pro[] = $temp;
/*					echo '<br>temp: ';
					print_r($temp);*/
				 }
			}
		}
		//second search hotel
		//echo '<pre>';
	
		
		$result['pro'] = $pro;
/*		echo '<pre>';
		print_r($search_data);
		die;*/
	    return $result;
		
	}
	
	function get_location($string=false,$show=false){
		$ch = curl_init();
		$params = http_build_query(array(
				'limit' =>1,
				'lookFor'=>'city',
				'lang'=>'en',
				'query'	=> $string,
				'token' =>$this->API_KEY
				));
		
		$url ="http://engine.hotellook.com/api/v2/lookup.json?".$params;
		curl_setopt($ch, CURLOPT_URL,$url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
	//	curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:"));
		$response = curl_exec($ch);
		$res= json_decode($response);
		curl_close($ch);
/*		echo '<pre>';
		print_r($res);*/
		
		if($res->status='ok'){
			if($show){
/*				echo 'asd';*/
				if(isset($res->results->locations[0]->iata)&&isset($res->results->locations[0]->iata[0])){
					return $res->results->locations[0]->iata[0];
				}
				
			}
			else{
				if(isset($res->results->locations)&&!empty($res->results->locations)){
					return $res->results->locations[0]->id;
				}
			}
		}
		return 0;	
	}

	
	function get_hotel_data($loc_id,$limit=false){
			$ch = curl_init();
			$params = http_build_query(array(
					'locationId'=>$loc_id,
					'token' =>$this->API_KEY
					));
			$url ='http://engine.hotellook.com/api/v2/static/hotels.json?'.$params;
		//	$url ='http://engine.hotellook.com/api/v2/cache.json?location='.$string.'&lang=en&lookFor=both&limit='.$limit;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:cef8472114e959429c4886a246289a62"));
			$response = curl_exec($ch);
			curl_close($ch);
			
			$res = json_decode($response);
			return $res;
	}

	function get_hotel($city=false,$checkIn=false,$checkOut,$adult,$children,$IP) {
		$result  = array();
		$result['status'] = 'error';
		$pro =array();

		$id = $this->get_location($city,true);
	//	echo $id;die;
		if($id){
			$searchIDs = $this->get_search_id($id,$adult,$checkIn,$checkOut,$children,'USD',$IP,'en',20,0);
	//		$searchData = $this->get_search_data(58210,10,'price');
	/*		echo '<pre>';
			print_r($searchData);*/
			if($searchIDs&&$searchIDs->status=='ok'){
				$searchData = $this->get_search_data($searchIDs->searchId,10,'price');
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
							$temp['location'] = array('lon'=>$set_p->location->lon,'lat'=>$set_p->location->lat);
							$pro[] = $temp;
							//print_r($temp);
						 }
					}
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
	
	function get_search_data2($string,$limit){
			$ch = curl_init();
			$url ='http://engine.hotellook.com/api/v2/lookup.json?query='.$string.'&lang=en&lookFor=both&limit='.$limit.'&token='.$this->API_KEY;
		//	$url ='http://engine.hotellook.com/api/v2/cache.json?location='.$string.'&lang=en&lookFor=both&limit='.$limit;
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, FALSE);
			//curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:cef8472114e959429c4886a246289a62"));
			$response = curl_exec($ch);
			curl_close($ch);
			
			$res = json_decode($response);
			return $res;
	}
	
	function get_search_id($iata,$adult,$checkIn,$checkOut,$chlidrenCount,$currency,$IP,$lang,$timeout,$waitForResult){
		if($chlidrenCount){
			$chlidrenCount =$chlidrenCount;
		}
		else{
			$chlidrenCount =0;
		}

		//YourToken:YourMarker:adultsCount:checkIn:checkOut:childrenCount:currency:customerIP:iata:lang:timeout:waitForResult
		$hashCode = md5($this->API_KEY.':'.$this->API_Marker.':'.$adult.':'.$checkIn.':'.$checkOut.':'.$chlidrenCount.':'.$currency.':'.$IP.':'.$iata.':'.$lang.':'.$timeout.':'.$waitForResult);

		$string = 'iata='.$iata.'&checkIn='.$checkIn.'&checkOut='.$checkOut.'&adultsCount='.$adult.'&customerIP='.$IP.'&childrenCount='.$chlidrenCount.'&lang='.$lang."&currency=".$currency.'&timeout='.$timeout.'&waitForResult='.$waitForResult.'&marker='.$this->API_Marker.'&signature='.$hashCode;

		$ch = curl_init();

		$url= "http://engine.hotellook.com/api/v2/search/start.json?".$string;

/*		echo '<br>'.$hashCode;
		echo '<br>'.$url;
*/
		curl_setopt($ch, CURLOPT_URL, $url);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:".$this->API_KEY));
		$response = curl_exec($ch);
	
		curl_close($ch);
		
/*		echo '<pre>';
		print_r($response);
		die;*/
		$res= json_decode($response);
		return $res;

	}



}
?>
