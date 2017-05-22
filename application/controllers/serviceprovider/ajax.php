<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends Frontend_Controller{	
	public function __construct(){
		parent::__construct();
		$this->data['active_sub'] = '';	
		$this->data['name'] = 'Dashboard';	
        $this->load->model(array('users_model'));
	
        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');

		$this->data['_user_link'] = $this->data['lang_code'].'/stores';
	}

	function update_online(){
		$output['status'] ='ok';
		$this->chat_model->update($this->data['user_details']->id);
		echo json_encode($output);
	}


	function ajaxOrderChart(){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		$id = $this->input->post('type');
		$user_type = $this->input->post('user_type');
		//$user_type = 'ownner';

		$user_id = 'user_id';
//		$id = 'day';
		$array = array();
		if(isset($this->data['user_details'])){}
		if(empty($array)){
			$array[date('Y-m-d')] =0;
		}		
		$array = array('9-3-2017'=>4,'10-3-2017'=>6,'11-3-2017'=>2,'8-3-2017'=>5,'7-3-2017'=>4);
		
		echo json_encode($array);
	}
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */