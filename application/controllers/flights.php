<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class flights extends Frontend_Controller {

	public $_subView = 'templates/';
	public function __construct(){
		parent::__construct();
		$this->load->library(array('travelpayouts_lib','skyscanner_lib'));
		//$this->load->library(array('test_travelpayouts_lib'));
		$logged_in = $this->session->userdata('user_session');
		$this->load->model(array('search_model'));
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}
		$this->data['set_meta'] = 'search';
		$this->data['active'] = 'Search Flight';
	}

	public function index(){
		$this->data['name'] = show_static_text($this->data['lang_id'],335);
		$this->data['title'] = $this->data['name']." | ".$this->data['settings']['site_name'];
		$this->data['search'] ='';
		$this->data['more_d'] = false;

/*		if($_GET){
			$this->ajax('template');
		}
		else{
			$this->data['products'] = array();
		}*/
		if($_GET){
			$this->ajax('template');
			$this->load->view('templates/search/index',$this->data);
		}
		else{
			$this->data['products'] = array();
			$this->load->view('templates/search/main',$this->data);
		}
	}
	
	function ajax($page_type=false){	
	
	
		$output = array();
		$output['result']= 'error';
		$this->data['more_d'] = $output['more_d'] = false;

		//$msg = 0;
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		
		$NewFPlace = $from_place = $this->input->get('from_place');
		$ToFPlace = $to_place = $this->input->get('to_place');

		$trip_type = $this->input->get('trip_type');
		
		$s_d_date = $d_date = $this->input->get('d_date');
		$s_r_date = $r_date = $this->input->get('r_date');


		$max_price = $this->input->get('max_price');
		$min_price = $this->input->get('min_price');

		$adults = $this->input->get('adults');
		$children = $this->input->get('children');

		$FID = $this->input->get('fId');
		$TID = $this->input->get('tId');

		if($d_date){
			$d_date =h_dateFormat($d_date,'Y-m-d');
		}
		else{
			$d_date ='anytime';
		}

		if($r_date){
			$r_date =h_dateFormat($r_date,'Y-m-d');
		}
		else{
			$r_date ='anytime';
		}

		$url = site_url().'flights?';
		$where_clause = "";

		
		$url.='from_place='.$from_place.'&to_place='.$to_place.'&';
		$url.='tId='.$TID.'&fId='.$FID.'&';
		$url.='d_date='.$s_d_date.'&r_date='.$s_r_date.'&';
		$url.='min_price='.$min_price.'&max_price='.$max_price.'&';
		$url.='trip_type='.$trip_type.'&';
		$url.='adults='.$adults.'&';
		$url.='children='.$children.'&';

		//type
		$where_clause = rtrim($where_clause,'and');
		//echo ''.$where_clause;
		$products =array();

		$output['content'] = '';
		if($FID){
			$NewFPlace = print_value('airports',array('id'=>$FID),'cityCode',$from_place);
		}
		if($TID){
			$ToFPlace = print_value('airports',array('id'=>$TID),'cityCode',$to_place);
		}
		
		if($_REQUEST){
			//browseroutes

//					$IP =$this->input->ip_address();
					$IP ='127.0.0.1';
					
					$post_data = array('adults'=>$adults,'f_place'=>$NewFPlace,'to_place'=>$ToFPlace,'d_date'=>$d_date,'trip_tpye'=>'Y','IP'=>$IP);
					$results = $this->travelpayouts_lib->get_flight($post_data);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}


/*					$post_data = array('adults'=>$adults,'f_place'=>$NewFPlace,'to_place'=>$ToFPlace,'d_date'=>$d_date,'trip_tpye'=>'Y','IP'=>$IP);
					$results = $this->test_travelpayouts_lib->get_flight($post_data);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}*/



/*					$results = $this->travelpayouts_lib->get_cheap($NewFPlace,$ToFPlace,$d_date,$trip_type);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}*/
					
					
					

/*					$results = $this->travelpayouts_lib->get_data($NewFPlace,$ToFPlace,$d_date,$trip_type);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}*/

					$post_data = array(
										'f_place'=>$NewFPlace,
										't_place'=>$ToFPlace,
										'd_date'=>$d_date,
										'r_date'=>$r_date,
										);
										
					if($trip_type=='one-way-trip'){
						$post_data['r_date'] = '';
					}

					$results = $this->skyscanner_lib->get_data($post_data);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}

/*			echo '<pre>';
			print_r($products);
				
*/

			$this->data['products'] = $products;
			$output['content'] = $this->load->view('templates/search/ajax_search',$this->data,true);
			if(empty($output['content'])){
				$output['content'] ='';
			}
			$output['counts'] = count($products);
		}
		else{
			$output['content'] = '';
		}

		$output['url']= $url;
		
		/*echo '<pre>';		
		print_r($output);
*/
		if($page_type=='template'){
		}
		else{
			echo json_encode($output);
		}
		//echo $msg;	
	}
	
	function save(){
		$output = array();
		$output['status']= 'error';
		$output['msge']= 'Please login first!!';
		$total = 0;
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		//$items = $this->input->get('item');
		$url = $this->input->post('url');
/*		echo '<pre>';
		print_r($items);*/
		if(isset($this->data['user_details'])){
			if($url){
				$output['status'] = 'ok';
				$this->comman_model->save('search_saved',array('user_id'=>$this->data['user_details']->id,'type'=>'Flight','url'=>$url,'on_date'=>date('Y-m-d')));
				$output['msge']= 'Search has successfully saved!!';
				
			}
			else{
				$output['msge']= 'There are no url!!';
			}
		}
		
		echo json_encode($output);
	}

	function get_travelpaout_direct(){
		if (!$this->input->is_ajax_request()) {
		 //  exit('No direct script access allowed');
		}

		$output = array();
		$output['status']= 'error';
		$output['msge']= 'Please login first!!';
		$url = $this->input->post('url');
		$search_id = $this->input->post('search_id');

/*		$url = '3700000';
		$search_id ='304e0f35-a875-4488-b6d7-2fcc231f5ee6';*/
		
		$url = $this->travelpayouts_lib->get_tr_url($url,$search_id);
		if($url){
			$output['status'] = 'ok';
			$output['s_url'] = $url;
		}
		else{
			$output['msge']= 'There is some problem!!';
		}
		echo json_encode($output);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */