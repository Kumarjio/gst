<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lang extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','date','front'));	
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('comman_model','language_model','settings_model'));
		$this->data['set_meta'] = '';	
        $this->data['settings'] = $this->settings_model->get_fields();
        $detail = $this->session->all_userdata();
		if(isset($detail['user_session'])){
			$this->data['user_session'] = $detail['user_session'];
			if(isset($detail['user_session']['loginType'])){
				if($detail['user_session']['loginType']=='user'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
				}
				if($detail['user_session']['loginType']=='reseller'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
				}
			}
        }

	}
	
	function setCurrency(){
		$output = array();
		$output['status']= 'ok';
		if (!$this->input->is_ajax_request()) {
		 	exit('No direct script access allowed');
		}
		$key = $this->input->post('id');
		if($key){
			$this->session->set_userdata('session_currency',$key);
		}
		echo json_encode ($output); //Return the JSON Array
	}

	function setLang(){
		$output = array();
		$output['status']= 'ok';
		if (!$this->input->is_ajax_request()) {
		 	exit('No direct script access allowed');
		}
		$key = $this->input->post('id');
		if($key){
			$ses_lang = array('lang_id' => $key);				
			//$total = $login['bonus_balance']+10;
			$this->session->sess_expiration = '14400'; 
			$this->session->set_userdata('lang_sess_data',$ses_lang);					
		}
		echo json_encode ($output); //Return the JSON Array
	}

}
