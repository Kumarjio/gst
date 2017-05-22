<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_analysis extends Admin_Controller {
	public $_table_names = 'stores';
	public $_subView = 'admin/analysis/';
	public $_redirect = '/hotel_analysis';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Product Management';
        $this->load->model(array('store_model'));
        // Get language for content id to show in administration

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_product==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
    }
	

	function index(){
		$this->data['name'] = 'Hotels Analysis';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['all_data'] = '';		
		$this->data['hotel_data'] = $this->comman_model->get($this->_table_names,false);

		if($this->input->get('hotel_id')){
			$totalRoom =0;
			$this->data['s_hotel_data'] = $this->comman_model->get_by($this->_table_names,array('id'=>$this->input->get('hotel_id')),false,false,true);
/*			echo '<pre>';
			print_r($this->data['s_hotel_data']);*/
			if($this->data['s_hotel_data']){
				if($this->data['s_hotel_data']->{'default'}==1){
						$totalRoom =$this->data['s_hotel_data']->total_room;
				}
				else{
					$store_manage = $this->comman_model->get_by('stores_manage',array('store_id'=>$this->data['s_hotel_data']->id),false,false,false);
					$totalRoom  = count($store_manage);
				}
			}
			$this->data['totalRoom']= $totalRoom;
			$query = "SELECT YEAR(on_date) AS Y FROM stores_booking WHERE MONTH(on_date) = 1 GROUP BY Y ORDER BY Y ASC";
			$this->data['years_data'] = $this->comman_model->get_query($query);
		}
		if($this->input->get('type')){
			if($this->input->get('type')=='price_analysis'){
		        $this->data['subview'] = $this->_subView.'index_price';	
			}
			else{
		        $this->data['subview'] = $this->_subView.'index';	
			}			
		}
		else{
	        $this->data['subview'] = $this->_subView.'index';	
		}
		$this->load->view('admin/_layout_main',$this->data);

	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */