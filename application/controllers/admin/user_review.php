<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_review extends Admin_Controller {
	public $_table_names = 'feedback';
	public $_subView = 'admin/reviews/';
	public $_redirect = '/user_review';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'User Management';
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
		$this->data['lang_id'] = $this->data['adminLangSession']['lang_id'];
	}
	

	//  Landing page of admin section.
	function index(){
		$this->data['title'] = 'Review | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->data['name'] = 'Review';
		$this->data['login'] = $this->session->all_userdata();	
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}



	function set_value(){

		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$value = $this->input->post('value');
		$check_data = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if($check_data){
			if($type=='enabled'){
				if($check_data->enabled==1){
					$post_data = array('enabled'=>0);
				}
				elseif($check_data->enabled==0){
					$post_data = array('enabled'=>1);
				}
				else{
					$post_data = array('enabled'=>1);
				}
				$result = $this->comman_model->save($this->_table_names,$post_data,$id);				
			}
			
		}
	}

	function get_status(){
		$id = $this->input->post('id');
		$post_data = array('enabled'=>$this->input->post('status'));
		$result = $this->comman_model->save($this->_table_names,$post_data,$id);
	}

	

	function delete($id = false){
		if(!$id){
			redirect($this->_redirect);
		}

		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));
		$this->session->set_flashdata('success','Review has successfully deleted.'); 
		redirect($this->_redirect);		

	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */