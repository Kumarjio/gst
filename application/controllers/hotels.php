<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('max_execution_time', 0); 

class hotels extends Frontend_Controller {
	public $_subView = 'templates/search_hotel/';
	public function __construct(){
		parent::__construct();
		$this->load->library(array('travelpayouts_hotel_lib','skyscanner_lib','test_hotel_lib','hotwire_lib'));
		$logged_in = $this->session->userdata('user_session');
		$this->load->model(array('search_model'));
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}
		$this->data['set_meta'] = 'search';
		$this->data['active'] = 'Search Hotel';
	}

	public function index(){
		$this->data['name'] = show_static_text($this->data['lang_id'],336);
		$this->data['title'] = $this->data['name']." | ".$this->data['settings']['site_name'];
		$this->data['search'] ='';
		$this->data['more_d'] = false;
			$this->data['products'] = array();
/*		if($_GET){
			$this->ajax('template');
		}
		else{
		}*/
		if($_GET){
			$this->load->view($this->_subView.'index',$this->data);
		}
		else{
			$this->load->view($this->_subView.'main',$this->data);
		}
	}
	
	function ajax($page_type=false){
		
		$output = array();
		$output['result']= 'error';
		$this->data['more_d'] = $output['more_d'] = false;

		//$msg = 0;
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		
		$city = $this->input->get('city');
		$adult = $this->input->get('adult');
		$children = $this->input->get('children');

		$s_d_date = $d_date = $this->input->get('in_date');
		$s_r_date = $r_date = $this->input->get('out_date');

		if($d_date){
			$d_date =h_dateFormat($d_date,'Y-m-d');
		}
		else{
			$d_date =date('Y-m-d');
		}

		if($r_date){
			$r_date =h_dateFormat($r_date,'Y-m-d');
		}
		else{
			$r_date =date('Y-m-d');
		}

		$url = site_url().'hotels?';
		$where_clause = "";

		
		$url.='city='.$city.'&';
		$url.='in_date='.$s_d_date.'&out_date='.$s_r_date.'&';

		//type
		$where_clause = rtrim($where_clause,'and');
		//echo ''.$where_clause;
		$products =array();

		$output['content'] = '';

		if($_REQUEST){
			//browseroutes
				$IP =$this->input->ip_address();
				$IP ='127.0.0.1';
//				$results = $this->test_hotel_lib->test_data1(2931155,$city,$d_date,$r_date,$adult,$children,$IP);

				$results = $this->travelpayouts_hotel_lib->get_hotel($city,$d_date,$r_date,$adult,$children,$IP);
				if($results['status']=='ok'){
					$output['result']= 'ok';
					foreach($results['pro'] as $set_pr){
						$products[] = $set_pr;
					}
				}



				$results = $this->hotwire_lib->get_hotel($city,$d_date,$r_date,1,$adult,$children,$IP);
				if($results['status']=='ok'){
					$output['result']= 'ok';
					foreach($results['pro'] as $set_pr){
						$products[] = $set_pr;
					}
				}

/*			echo '<pre>';
			print_r($products);
die;				*/

			$this->data['products'] = $products;
			$output['content'] = $this->load->view($this->_subView.'ajax_search',$this->data,true);
			if(empty($output['content'])){
				$output['content'] ='';
			}
			$output['content_map'] = $this->load->view($this->_subView.'ajax_map',$this->data,true);
			if(empty($output['content_map'])){
				$output['content_map'] ='';
			}
			
			
		}
		else{
			$output['content'] = '';
			$output['content_map'] = '';
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
	
	function ajax2($page_type=false){	
		$output = array();
		$output['result']= 'error';
		$this->data['more_d'] = $output['more_d'] = false;

		//$msg = 0;
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		
		$city = $this->input->get('city');
		$adult = $this->input->get('adult');
		$children = $this->input->get('children');

		$s_d_date = $d_date = $this->input->get('in_date');
		$s_r_date = $r_date = $this->input->get('out_date');

		if($d_date){
			$d_date =h_dateFormat($d_date,'Y-m-d');
		}
		else{
			$d_date =date('Y-m-d');
		}

		if($r_date){
			$r_date =h_dateFormat($r_date,'Y-m-d');
		}
		else{
			$r_date =date('Y-m-d');
		}

		$url = site_url().'hotels?';
		$where_clause = "";

		
		$url.='city='.$city.'&';
		$url.='in_date='.$s_d_date.'&out_date='.$s_r_date.'&';

		//type
		$where_clause = rtrim($where_clause,'and');
		//echo ''.$where_clause;
		$products =array();

		$output['content'] = '';

		if($_REQUEST){
			//browseroutes
				$IP =$this->input->ip_address();
					$results = $this->travelpayouts_hotel_lib->get_hotel1($city,$d_date,$r_date,$adult,$children,$IP);
					if($results['status']=='ok'){
						$output['result']= 'ok';
						foreach($results['pro'] as $set_pr){
							$products[] = $set_pr;
						}
					}

/*			echo '<pre>';
			print_r($products);
die;				*/

			$this->data['products'] = $products;
			$output['content'] = $this->load->view($this->_subView.'ajax_search',$this->data,true);
			if(empty($output['content'])){
				$output['content'] ='';
			}

			$output['content_map'] = $this->load->view($this->_subView.'ajax_search',$this->data,true);
			if(empty($output['content_map'])){
				$output['content_map'] ='';
			}
			
		}
		else{
			$output['content'] = '';
			$output['content_map'] ='';
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
				$this->comman_model->save('search_saved',array('user_id'=>$this->data['user_details']->id,'type'=>'Hotel','url'=>$url,'on_date'=>date('Y-m-d')));
				$output['msge']= 'Search has successfully saved!!';
				
			}
			else{
				$output['msge']= 'There are no url!!';
			}
		}
		
		echo json_encode($output);
	}

	function test(){
		$get= $this->input->get('address');
		$data = $this->test_hotel_lib->get_location_g1($get);
		echo '<pre>';
		print_r($data);
		
	}

	function test_location(){
		$get= $this->input->get('address');
		$data = $this->travelpayouts_hotel_lib->get_location($get,true);
		echo '<pre>';
		print_r($data);
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */