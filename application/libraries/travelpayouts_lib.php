<?php
	

class travelpayouts_lib{
	private $API_KEY	= "0e0a6ef0bea947285477e87e42663e22";
	private $API_Marker = "129036";

	public function __construct(){
		$this->CI =& get_instance();
	}

	function get_flight($array_data){
		$result  = array();
		$result['status'] = 'error';
		$pro =array();
		$search_id = $this->get_flight_search_id($array_data);
//die;
		//$search_id ='dec7b323-6fa7-4d3e-8db6-aeecab776712';
		if($search_id){
			//$search_id ='bada9053-e7cb-4352-aa32-93a4222f9491';
			$result_data = $this->get_flight_dat_by_search_id($search_id);
	///		echo '<pre>';
			//print_r($result_data[0]->proposals);
//			print_r($result_data[0]->proposals);
			if($result_data){
				foreach($result_data as $set_data){
					if(isset($set_data->proposals)&&!empty($set_data->proposals)){
						//echo 'yess';
						$proposals_data =$set_data->proposals;
						foreach($proposals_data as $set_proposals){
							$price= 0;
							$url_price = '';
							$max_stop = $set_proposals->max_stops;
							if(!empty($set_proposals->terms)){
								//print_r($set_proposals->term);
								$price_data  = object_to_array($set_proposals->terms);
								$first_data  = returns_first_data($price_data);
								if($first_data){
									if(isset($first_data['price'])){
											$price = $first_data['price'];
									}
									if(isset($first_data['url'])){
										$url_price = $first_data['url'];
									}
								}
							}
	
							if(isset($set_proposals->segment[0]->flight)&&!empty($set_proposals->segment[0]->flight)){
								$result['status'] = 'ok';
								$segments_data =$set_proposals->segment[0]->flight;
								foreach($segments_data as $set_seg){
									$temp = array();
									$temp =object_to_array($set_seg);
									$temp['max_stop'] 		= $max_stop;
									$temp['link']			= '';
									$temp['type']			= 'travelpayouts';
									$temp['airline']  		= '';
									$temp['search_id']		= $search_id;
									$temp['price']  		= $price;
									$temp['url_price']  		= $url_price;
									if(isset($set_proposals->carriers[0])&&!empty($set_proposals->carriers[0])){
										$temp['airline']  		= $set_proposals->carriers[0];
									}
	/*								$temp['id']		 		= $set_seg->number;
									$temp['link']			= '';
									$temp['type']			= 'travelpayouts';
									$temp['price']			= $set_p->price;
									$temp['origin'] 		= $set_seg->arrival;
									$temp['destination'] 	= $set_seg->departure;
									$temp['arrival_time']	= $set_seg->arrival_time;
									
									$$temp['transfers'] = '';
									$temp['flight_number'] = $set_p->flight_number;
									$temp['departure_at'] = $set_p->departure_at;
									$temp['return_at'] = $set_p->return_at;
									$temp['expires_at'] = $set_p->expires_at;*/
									$pro[] = $temp;
									//print_r($temp);
								 
								}
							}
						}
					}
				}
			}
		}
		
		$result['pro'] = $pro;
/*		echo '<pre>';
		print_r($pro);
		die;*/
	    return $result;
		
	}

	function get_flight_dat_by_search_id($id){
		
		$ch = curl_init();
		$url = "http://api.travelpayouts.com/v1/flight_search_results?uuid=".$id;
		curl_setopt($ch, CURLOPT_URL, $url);
		//
		//curl_setopt($ch, CURLOPT_URL, "http://api.travelpayouts.com/v1/prices/direct?currency=IDR&origin=BOM&destination=HKT&depart_date=2017-05-03");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept-Encoding: deflate'));
		$response = json_decode(curl_exec($ch));
		curl_close($ch);
		return $response;
 		
	}
	
	function get_flight_search_id($array_data){
		$hashString = "0e0a6ef0bea947285477e87e42663e22:flights.gosearchtravel.com:en:129036:".$array_data['adults'].":0:0:".$array_data['d_date'].":".$array_data['to_place'].":".$array_data['f_place'].":Y:".$array_data['IP'];
		
		//185.164.137.16
		$sgin = md5($hashString);

		$params ='{"signature":"'.$sgin.'","marker":"129036","host":"flights.gosearchtravel.com","user_ip":"'.$array_data['IP'].'","locale":"en","trip_class":"Y","passengers":{"adults":'.$array_data['adults'].',"children":0,"infants":0},"segments":[{"origin":"'.$array_data['f_place'].'","destination":"'.$array_data['to_place'].'","date":"'.$array_data['d_date'].'"}]}';
		$ch = curl_init('http://api.travelpayouts.com/v1/flight_search');                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));                                                                                                                   
		$result = curl_exec($ch);
		curl_close($ch);

		$res = json_decode($result);
		if($res&&isset($res->search_id)&&!empty($res->search_id)){
			return $res->search_id;
		}

		return 0;
	}

	function get_data($f_place=false,$t_place=false,$d_date=false,$trip_type=false) {

		$set_trip_type = false;
		if($trip_type=='one-way-trip'){
			$set_trip_type=true;
		}

		$result  = array();
		$result['status'] = 'error';
		$ch = curl_init();
		$url = "http://api.travelpayouts.com/v1/prices/calendar?currency=usd&depart_date=$d_date&origin=$f_place&destination=$t_place&calendar_type=departure_date&one_way=$set_trip_type&token=".$this->API_KEY;
		
		curl_setopt($ch, CURLOPT_URL, $url);
		//
		//curl_setopt($ch, CURLOPT_URL, "http://api.travelpayouts.com/v1/prices/direct?currency=IDR&origin=BOM&destination=HKT&depart_date=2017-05-03");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:".$this->API_KEY));
		$response = json_decode(curl_exec($ch));

/*		echo '<pre>';
		print_r($response);
		count($response->data);*/
		
		$pro =array();
		if(isset($response->success)&&$response->success==1){
			$tmp = (array) $response->data;
			if(isset($tmp)&&!empty($tmp)){
				$result['status'] = 'ok';
				//echo $result['status'];
				 foreach($response->data as $key=>$set_p){
					$temp =array();
					$temp['id'] = $key;
					$temp['link'] = '';
					$temp['type'] = 'travelpayouts';
					$temp['airline'] = $set_p->airline;
					$temp['price'] = $set_p->price;
					$temp['origin'] = $set_p->origin;
					$temp['destination'] = $set_p->destination;
					$temp['transfers'] = $set_p->transfers;
					$temp['flight_number'] = $set_p->flight_number;
					$temp['departure_at'] = $set_p->departure_at;
					$temp['return_at'] = $set_p->return_at;
					$temp['expires_at'] = $set_p->expires_at;
					$pro[] = $temp;
					//print_r($temp);
				 }
			}
			$result['pro'] = $pro;
		}

/*		echo '<pre>';
		print_r($result['pro']);*/
		
	    return $result;
	}
	
	
	function get_cheap($f_place=false,$t_place=false,$d_date=false,$trip_type=false) {
		$set_trip_type = false;
		if($trip_type=='one-way-trip'){
			$set_trip_type=true;
		}

		$result  = array();
		$result['status'] = 'error';
		
			$params = http_build_query(array(
					"currency" => 'usd',
					'origin' =>$f_place,
					'destination' =>$t_place,
					'depart_date'=>$d_date,
					'return_date'=>'',
					'token' =>$this->API_KEY
					));

		$ch = curl_init();
		$url = "http://api.travelpayouts.com/v1/prices/cheap?".$params;
		
		curl_setopt($ch, CURLOPT_URL, $url);
		//
		//curl_setopt($ch, CURLOPT_URL, "http://api.travelpayouts.com/v1/prices/direct?currency=IDR&origin=BOM&destination=HKT&depart_date=2017-05-03");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-Access-Token:".$this->API_KEY));
		$response = json_decode(curl_exec($ch));

/*		echo $t_place;
		echo '<pre>';
		print_r($response->data);*/
//		count($response->data);
		
		$pro =array();
		if(isset($response->success)&&$response->success==1){
			if(isset($response->data->$t_place)&&!empty($response->data->$t_place)){
			$tmp = (array) $response->data->$t_place;
			if(isset($tmp)&&!empty($tmp)){
				
				//print_r($tmp);
				//echo $result['status'];
					$result['status'] = 'ok';
					 foreach($tmp as $key=>$set_p){
						$temp =array();
						$temp['id'] = $key;
						$temp['link'] = '';
						$temp['type'] = 'travelpayouts';
						$temp['airline'] =$set_p->airline;
						$temp['price'] = $set_p->price;
						$temp['departure'] = $f_place;
						$temp['arrival'] = $t_place;
						$temp['transfers'] = '';
						$temp['flight_number'] = $set_p->flight_number;
						$temp['departure_time'] = travelpayouts_date($set_p->departure_at,'H:i');
						$temp['departure_date'] = travelpayouts_date($set_p->departure_at,'d-m-Y');

						$temp['arrival_time'] = travelpayouts_date($set_p->departure_at,'H:i');
						$temp['arrival_date'] = travelpayouts_date($set_p->departure_at,'d-m-Y');
						
						$temp['return_at'] = $set_p->return_at;
						$temp['expires_at'] = $set_p->expires_at;
						$pro[] = $temp;
						//print_r($temp);
					 }
				}
			}
			$result['pro'] = $pro;
		}

//		print_r($result['pro']);
		
	    return $result;
	}
	
	function get_hotel($city=false,$checkIn=false,$checkOut,$adult,$children,$IP) {
		$result  = array();
		$result['status'] = 'error';
		$pro =array();

		$searchIDs = $this->get_search($city,$adult,$checkIn,$checkOut,$children,'USD',$IP,'en',20,0);
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
		
		//second search hotel
		//echo '<pre>';
		$search_data = $this->get_search_data2($city,20);
	
		if($search_data&&$search_data->status=='ok'){
			if(isset($search_data->results)&&!empty($search_data->results)){
				if(isset($search_data->results->hotels)&&!empty($search_data->results->hotels)){
					$tmps = $search_data->results->hotels;
					$result['status'] = 'ok';
					//echo $result['status'];
					 foreach($tmps as $set_p){
						//print_r($set_p);
						$temp =array();
						$temp['id'] = $set_p->id;
						$temp['link'] = '';
						$temp['type'] = 'travelpayouts';
						$temp['address'] = $set_p->locationName;
						$temp['price'] = '';
						$temp['name'] = $set_p->fullName;
						$temp['location_id'] = $set_p->locationId;
						$temp['location'] = array('lon'=>$set_p->location->lon,'lat'=>$set_p->location->lat);
						$pro[] = $temp;
/*						echo '<br>temp: ';
						print_r($temp);*/
					 }
				}
			}
		}
		
		$result['pro'] = $pro;
/*		echo '<pre>';
		print_r($search_data);
		die;*/
	    return $result;
		
	}
	
	function get_search_data($searchId,$limit,$price){
			$ch = curl_init();
			
			$string2 = md5($this->API_KEY.':'.$this->API_Marker.':'.$limit.':0:0:'.$searchId.':1:'.$price);
			$url ='http://engine.hotellook.com/api/v2/search/getResult.json?searchId='.$searchId.'&limit='.$limit.'&sortBy='.$price.'&sortAsc=1&roomsCount=0&offset=0&marker='.$this->API_Marker.'&signature='.$string2;
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
	
	function get_search($iata,$adult,$checkIn,$checkOut,$chlidrenCount,$currency,$IP,$lang,$timeout,$waitForResult){
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
		
		$res= json_decode($response);
		return $res;

	}

	function get_tr_url($url,$search_id){
		$ch = curl_init();
		$url = "http://api.travelpayouts.com/v1/flight_searches/".$search_id."/clicks/".$url.".json";
		curl_setopt($ch, CURLOPT_URL, $url);
		//
		//curl_setopt($ch, CURLOPT_URL, "http://api.travelpayouts.com/v1/prices/direct?currency=IDR&origin=BOM&destination=HKT&depart_date=2017-05-03");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$response = json_decode(curl_exec($ch));
		curl_close($ch);
		if($response){
			if(isset($response->error)){
				return false;
			}
			elseif(isset($response->url)){
				return $response->url;
			}
		}
		return $response;
		
	}


}
?>
