<?php
	

class skyscanner_lib{
//	private $API_KEY= "te322860777186702713801180715595";
	private $API_KEY= "go887255673018406987697689523463";

	public function __construct(){
		$this->CI =& get_instance();
	}


	function get_data($data) {
		$result  = array();
		$result['status'] = 'error';
		$skyscanner_data = json_decode($this->hash_call('http://partners.api.skyscanner.net/apiservices/browseroutes/v1.0/IN/USD/en-GB/'.$data['f_place'].'/'.$data['t_place'].'/'.$data['d_date'].'/'.$data['r_date'].'?apiKey='.$this->API_KEY));

		//echo '<pre>';

/*		echo '<pre>';
		print_r($skyscanner_data);*/
		
		$pro =array();
		$places = $carriers = array();
		$products =array();
		if($skyscanner_data&&!isset($skyscanner_data->ValidationErrors)){
			$result['status'] = 'ok';
			if(isset($skyscanner_data->Carriers)&&!empty($skyscanner_data->Carriers)){
		/*						foreach($skyscanner_data->Carriers as $set_cas){
					$carriers[] = array('CarrierId'=>$set_cas->CarrierId,'Name'=>$set_cas->Name);
				}*/
				//or get object
		//						$carriers = $skyscanner_data;
				$carriers =  object_to_array($skyscanner_data->Carriers);
			}
			if(isset($skyscanner_data->Places)&&!empty($skyscanner_data->Places)){
				$places =  object_to_array($skyscanner_data->Places);
			}
			$sa  = h_array_search_inner ($places ,'PlaceId',42989);
			if(isset($skyscanner_data->Quotes)&&!empty($skyscanner_data->Quotes)){
				 foreach($skyscanner_data->Quotes as $set_p){
					//print_r($set_p);
					$temp =array();
					if(isset($set_p->media->images[0])){
						$temp['image'] = $set_p->media->images[0]->thumbnailHdUrl;
					}
					$temp['id'] = $set_p->QuoteId;
					$temp['link'] = '';
					$temp['type'] = 'skyscanner';
					$temp['price'] = $set_p->MinPrice;
					$temp['Direct'] = $set_p->Direct;
					$temp['Outbound']=array();
					$temp['Inbound']=array();
					
					if(isset($set_p->OutboundLeg)&&!empty($set_p->OutboundLeg)){
						if(isset($set_p->OutboundLeg->CarrierIds[0])&&!empty($set_p->OutboundLeg->CarrierIds[0])){
							$temp['Outbound']=array(
										'f_place' 		=> h_array_search_inner ($places ,'PlaceId',$set_p->OutboundLeg->OriginId),
										't_place'		=> h_array_search_inner ($places ,'PlaceId',$set_p->OutboundLeg->DestinationId),
										'Carrieres'		=> h_array_search_inner($carriers,'CarrierId',$set_p->OutboundLeg->CarrierIds[0]),
										'CarrierIds'	=> $set_p->OutboundLeg->CarrierIds[0],
										'OriginId'		=> $set_p->OutboundLeg->OriginId,
										'DestinationId' => $set_p->OutboundLeg->DestinationId,
										'DepartureDate' => $set_p->OutboundLeg->DepartureDate);
							}
					}

					if(isset($set_p->InboundLeg)&&!empty($set_p->InboundLeg)){
						if(isset($set_p->InboundLeg->CarrierIds[0])&&!empty($set_p->InboundLeg->CarrierIds[0])){
							$temp['Inbound'] = array(
									'f_place'		=> h_array_search_inner ($places ,'PlaceId',$set_p->InboundLeg->OriginId),
									't_place'	 	=> h_array_search_inner ($places ,'PlaceId',$set_p->InboundLeg->DestinationId),
									'CarrierIds' 	=> $set_p->InboundLeg->CarrierIds[0],
									'Carrieres'		=> h_array_search_inner($carriers,'CarrierId',$set_p->InboundLeg->CarrierIds[0]),
									'OriginId' 		=> $set_p->InboundLeg->OriginId,
									'DestinationId' => $set_p->InboundLeg->DestinationId,
									'DepartureDate'	=> $set_p->InboundLeg->DepartureDate);
						}
					}
					$temp['dateTime']  = $set_p->QuoteDateTime;
					$products[] = $temp;
					//print_r($temp);
				 }
			}
			$result['pro'] = $products;
		}
/*		echo '<pre>';
		print_r($result['pro']);*/
		
	    return $result;
	}
	function hash_call($url){
		$options = array(
			CURLOPT_RETURNTRANSFER => true,     // return web page
			CURLOPT_HEADER         => false,    // don't return headers
			CURLOPT_FOLLOWLOCATION => true,     // follow redirects
			CURLOPT_ENCODING       => "",       // handle all encodings
			CURLOPT_USERAGENT      => "", // who am i
			CURLOPT_AUTOREFERER    => true,     // set referer on redirect
			CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
			CURLOPT_TIMEOUT        => 120,      // timeout on response
			CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
			CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
		);
	
		$ch      = curl_init( $url );
		curl_setopt_array( $ch, $options );
		$content = curl_exec( $ch );
		$err     = curl_errno( $ch );
		$errmsg  = curl_error( $ch );
		$header  = curl_getinfo( $ch );
		curl_close( $ch );
	
		$header['errno']   = $err;
		$header['errmsg']  = $errmsg;
		$header['content'] = $content;
		return $header['content'];
	}

}
?>
