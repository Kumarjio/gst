<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Review extends Frontend_Controller{	
	public $_redirect = '/user/review'; //url name

	public $_table_names = 'feedback';	//table name

	public $_subView = 'user/reviews/'; 		//view subfolder name file 
	public $_mainView = 'user/_layout_main'; 	//view main dashboad file
	public function __construct(){
		parent::__construct();
		$this->data['active_sub'] = '';	
        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');

		$this->data['active'] = 'My Review';		

		$this->data['_user_link'] = $this->data['lang_code'].'/user';

        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_add'] = $this->data['lang_code'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['lang_code'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['lang_code'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_delete'] = $this->data['lang_code'].$this->_redirect.'/delete';
		$this->_checkUser();
	}


	function index(){
        $this->data['name'] = show_static_text($this->data['lang_id'],36);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$checkOrder =$this->comman_model->get_by('feedback',array('user_id'=>$this->data['user_details']->id),false,false,true);
		if($checkOrder){
	        $this->session->set_flashdata('success','You have already gave!!');
			redirect($this->data['_user_link'].'/account');
		}
        $this->form_validation->set_rules('comment','Comment','trim|required');
        $this->form_validation->set_rules('rate','Rate','trim');

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();
			$post1 =array('comment','rate');
        	$post_data = $this->comman_model->array_from_post($post1);

			$post_data['name']= $this->data['user_details']->first_name.' '.$this->data['user_details']->last_name;

			$post_data['user_id'] 	= $this->data['user_details']->id;
			$post_data['on_date'] 	= date('Y-m-d');
			$post_data['enabled'] 	= 0;
			$post_data['created'] 	= time();
			$post_data['modified'] 	= time();
			//file1

			$this->comman_model->save($this->_table_names,$post_data);
	        $this->session->set_flashdata('success','Thank you for submit your review!');

			redirect($this->data['_user_link'].'/account');
        }

		//$this->data['all_data'] = $this->comman_model->get_by('orders',array('payment'=>1),false,false,false);
        $this->data['subview'] = $this->_subView.'review';			
		$this->load->view($this->_mainView,$this->data);
	}

	function _checkUser(){
		$redirect = false;
		if(isset($this->data['user_details'])){	
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
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */