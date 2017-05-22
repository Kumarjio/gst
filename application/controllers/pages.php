<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Frontend_Controller {
	public $_subView = 'templates/pages/';
	public function __construct(){
		parent::__construct();
		$logged_in = $this->session->userdata('user_session');
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}
	}

	
	function visitor(){
		$ip_address = $this->input->ip_address();
		$time = time();
		$check = $this->comman_model->get_by('visitor_activity',array('ip_address'=>$ip_address,'visit_date >='=>strtotime(date('d-m-Y 00:00:00',time())),'visit_date <='=>strtotime(date('d-m-Y 23:59:59',time()))),false,false,false);
		//echo $this->db->last_query();
		if(!count($check)){
			$this->comman_model->save('visitor_activity',array('visit_date'=>$time,'ip_address'=>$ip_address));
		}
		//var_dump($check);
	}


	public function index($id = false){
		//$this->visitor();
		$this->data['set_meta'] = 'home';
		$this->data['active'] = $id;
		$this->data['slider'] = 'home';
        //$this->data['subview'] = $this->_subView.'index';	
		if($id){
			$this->data['page'] = $this->comman_model->get_lang('page',$this->data['lang_id'],NULL,array('slug'=>$id),'page_id',true);
			if(!$this->data['page']){
				show_404(current_url());
			}
			$this->data['active_page_id'] = $id;
			$this->data['title'] = $this->data['page']->title." | ".$this->data['settings']['site_name'];
			
			$this->data['seo_title'] = $this->data['page']->title;
			$this->data['seo_keywords'] = $this->data['page']->keywords;
			$this->data['seo_description'] = html_entity_decode($this->data['page']->short_description);
			$this->load->view($this->_subView.$this->data['page']->template,$this->data);
		}
		else{
			$this->data['title'] = $this->data['settings']['site_name'];
			$this->data['page'] = $this->pages_model->get_first();
			$this->load->view($this->_subView.'index',$this->data);
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */