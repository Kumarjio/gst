<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trip extends Frontend_Controller {
	public $_redirect = '/user/trip';

	public $_subView = 'user/trips/';
	public $_table_names = 'search_saved';
	public $_mainView = 'user/_layout_main';
	public function __construct(){
		parent::__construct();
		$this->data['active_sub'] = '';	
		$this->data['active'] = 'Search Saved';		
		
		$this->load->library(array('travelpayouts_lib','skyscanner_lib'));

        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');
	
		$this->data['_user_link'] = $this->data['lang_code'].'/user';
        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_add'] = $this->data['lang_code'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['lang_code'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['lang_code'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_delete'] = $this->data['lang_code'].$this->_redirect.'/delete';

		$this->_checkUser();
//		$this->_checkPaidUser();
	}


	public function index(){
        $this->data['name'] = show_static_text($this->data['lang_id'],142);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$this->data['search'] ='';
		$this->data['more_d'] = false;
		if($_GET){
			$this->ajax('template');
		}
		else{
			$this->data['products'] = array();
		}

        $this->data['subview'] = $this->_subView.'index';			
		$this->load->view($this->_mainView,$this->data);
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

		$url = site_url().$this->data['lang_code'].'/user/trip?';
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
					$results = $this->travelpayouts_lib->get_hotel($city,$d_date,$r_date,$adult,$children,$IP);
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

	function _checkUser(){
		$redirect = false;
		if(!empty($this->data['user_details'])){
			if($this->data['user_details']->account_type!='U'){
				$redirect =true;
			}
		}
		else{
			$redirect =true;
		}
		if($redirect){
			redirect($this->data['lang_code'].'/secure/login');
		}
		if($this->data['user_details']->parent_id!=0){
				redirect($this->data['lang_code'].'/user');
		}
	}


}

/* End of file user.php */
/* Location: ./application/controllers/user.php */