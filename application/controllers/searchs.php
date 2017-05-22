<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Searchs extends Frontend_Controller {


	public $_subView = 'templates/service_search/';
	public function __construct(){
		parent::__construct();
		$this->load->library(array('travelpayouts_lib','skyscanner_lib'));
		$logged_in = $this->session->userdata('user_session');
		$this->load->model(array('search_model'));
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}
		$this->data['set_meta'] = 'search';
	}

	public function l($id=false){
		if(!$id){
			redirect($this->data['lang_code'].'/search');
		}

		$this->data['service_search'] = $category = $this->comman_model->get_lang('services',$this->data['lang_id'],NULL,array('id'=>$id),'service_id',true);
		if(empty($category)){
			redirect($this->data['lang_code'].'/search');
		}

		$this->data['service_search_form'] = $this->comman_model->get_by('services_attr',array('service_id'=>$category->id,'is_visible'=>1), FALSE, FALSE, false);

		$this->data['title'] = "Search | ".$this->data['settings']['site_name'];
		$this->data['active'] = 'Search '.$category->id;
		$this->data['search'] ='';
		$this->data['more_d'] = false;
		if($_GET){
			$this->ajax('template');
		}
		else{
			$this->data['products'] = array();
		}
		$this->load->view($this->_subView.'index',$this->data);
	}
	
	function ajax($page_type=false){	
	
	
		$output = array();
		$output['result']= 'error';
		$this->data['more_d'] = $output['more_d'] = false;

		//$msg = 0;
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		$set_limit = 12;
		if(!$limit){
			$limit= $set_limit;
		}
		if(!$offset){
			$offset= 0;
		}
		
		$max_price = $this->input->get('max_price');
		$min_price = $this->input->get('min_price');

		
		$service_id = $this->input->get('service_id');
		$s_url = print_value('services',array('id'=>$service_id),'name');
		$fields = $from_place = $this->input->get('field');
		$url = site_url().$this->data['lang_code'].'/'.$s_url.'?';
		$url.='min_price='.$min_price.'&max_price='.$max_price.'&';

		$where_clause = "";

		$userArr =array();
		$url.='service_id='.$service_id.'&';
		if($fields&&$service_id){
			foreach($fields as $key=>$value){
				$url.='field['.$key.']='.$value.'&';
				if(!empty($value)){
					if(h_isDate($value)){
						$stringQuery = "SELECT * FROM (`u_services_value`) WHERE field_id =".$key." and service_id=$service_id and (value like '%".$value."%' or v_date like '%".h_dateFormat($value,'Y-m-d')."%')";	
					}
					else{
						$stringQuery = "SELECT * FROM (`u_services_value`) WHERE field_id =".$key." and service_id=$service_id and (value like '%".$value."%')";	
					}
//					echo '<br>'.$stringQuery;
					$ids = $this->comman_model->get_query($stringQuery,false);
					if($ids){
						foreach($ids as $set_id){
							$userArr[] = $set_id->s_id;
						}
					}
					//echo '<br>'.$key.':'.$value;
				}
			}
		}
		
		if($userArr){
			$where_clause .= " id in (".trim(implode(',',$userArr),',').") and";
		}



		//type
		$where_clause = rtrim($where_clause,'and');
		//echo ''.$where_clause;
		$products =array();

		$output['content'] = '';
		
		if($_REQUEST){
			if($where_clause&&$service_id){
				if($min_price&&$max_price){
					$where_clause .= " and price between ".$min_price." and ".$max_price;
				}

				$output['result']= 'ok';
				$stringQuery = "SELECT * FROM (`u_services`) WHERE ";	
				$this->data['products'] = $this->comman_model->get_query($stringQuery.$where_clause." and s_id =".$service_id." limit $offset ,$limit",false);
				//echo $stringQuery.$where_clause." limit $offset ,$limit";
/*				echo $stringQuery.$where_clause." limit $offset ,$limit";
				echo $this->db->last_query();die;*/
				$output['content'] = $this->load->view($this->_subView.'ajax_search',$this->data,true);
				if(empty($output['content'])){
					$output['content'] ='';
				}

			$output['offset'] =$offset +12;
			$output['limit'] =$limit;

			}
			else{
				$output['content'] = '';
				$output['offset'] = 12;
				$output['limit'] = 12;
			}
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

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */