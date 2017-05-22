<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Restaurant_history extends Admin_Controller {
	public $_table_names = 'stores';
	public $_subView = 'admin/order/';
	public $_redirect = '/restaurant_history';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Order Management';

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
    	$this->load->model(array('order_model'));

		
		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_order==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
			$this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}

	}

	function checkPremission($type=false){
		$redirect = false;
		
		if($this->data['admin_details']->default=='0'){
			if($type=='is_order'){
				if($this->data['admin_details']->is_order==1){}
				else{
					$redirect = true;
				}
			}
			else if($type =='is_payment'){
				if($this->data['admin_details']->is_payment==1){}
				else{
					$redirect = true;
				}
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
	}

	//  Landing page of admin section.
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1520).'Booking History';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index_restaurant';	
		$this->load->view('admin/_layout_main',$this->data);
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */