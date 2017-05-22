<?php
class Service extends Admin_Controller{
	public $_table_names = 'services';
	public $_subView = 'admin/services/';
	public $_redirect = '/service';
	public $_msg_success = 'Attribute has successfully created.';
	public $_msg_update = 'Attribute has successfully updated.';
	public $_msg_delete = 'Attribute has successfully deleted.';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Service Management';
        $this->load->model('service_model');

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
		$this->data['lang_id'] =$this->data['adminLangSession']['lang_id'];
        
	}

	function get_active(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$value = $this->input->post('value');
		$check_data = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if($check_data){
			if($type=='confirm'){
				if($check_data->confirm==1){
					$post_data = array('confirm'=>0);
				}
				elseif($check_data->confirme==0){
					$post_data = array('confirm'=>1);
				}
				else{
					$post_data = array('confirm'=>1);
				}
				$result = $this->comman_model->save($this->_table_names,$post_data,$id);				
			}
		}
	}

    
    public function index()
	{
	    // Fetch all pages
		$this->data['name'] = 'Service';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->db->order_by('id','asc');
        $this->data['all_data'] =$this->service_model->get_lang(NULL,false,$this->data['content_language_id']);

        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}

    public function search_ajax(){
        // Save order from ajax call
		$title = $this->input->post('title');
        if (isset($_POST['sortable'])) {
            $this->service_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
		$this->db->like('title',$title);
        $this->data['pages'] = $this->service_model->get_search_data($this->data['content_language_id']);

        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }


    public function order_ajax(){
        // Save order from ajax call
        if (isset($_POST['sortable'])) {
            $this->service_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
        $this->data['pages'] = $this->service_model->get_nested($this->data['content_language_id']);
        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }

    
    public function order()
    {
		$this->data['sortable'] = TRUE;
        
        // Load view
		$this->data['subview'] = $this->_subView.'order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function update_ajax($filename = NULL)
    {
        // Save order from ajax call
        if(isset($_POST['sortable']) && $this->config->item('app_type') != 'demo')
        {
            $this->service_model->save_order($_POST['sortable']);
        }
        
        $data = array();
        $length = strlen(json_encode($data));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        
        exit();
    }
    
    public function create(){
	    // Fetch a page or set a new one
		$this->data['title'] = 'Create | '.$this->data['settings']['site_name'];
		$this->data['name'] = 'Name Your Process';
		$this->data['set_level'] = '1';
		$this->data['categories'] = $this->service_model->get_new();
        
       
	   	$this->db->order_by('title','asc');
        $this->data['categories_data'] = $this->comman_model->get_lang('c_categories',$this->data['content_language_id'],NULL,array('parent_id'=>0),'category_id',false);

//        $this->data['templates'] = $this->service_model->get_templates('page_');
        
        // Set up the form
        $rules = $this->service_model->rules;
        $this->form_validation->set_rules($this->service_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();
			$data = $this->service_model->array_from_post(array('name'));

  			$data['order'] = $this->service_model->max_order()+1;
            $data_lang = $this->service_model->array_from_post($this->service_model->get_lang_post_fields());


            $data['date'] = date('Y-m-d H:i:s');
/*			echo '<pre>';
			print_r($data_lang);die;*/
            $id = $this->service_model->save_with_lang($data, $data_lang);
//            $id = $this->comman_model->save($this->_table_names,$data);
/*			if(empty($this->data['categories']->id))
	            $this->session->set_flashdata('success',$this->_msg_success);
			else
	            $this->session->set_flashdata('success',$this->_msg_update);*/			
            redirect($this->data['_cancel'].'/step2/'.$id);
        }
        
		$this->data['subview'] = $this->_subView.'create';
        $this->load->view('admin/_layout_main', $this->data);
	
	}
	

	public function step2($id = NULL){
	    // Fetch a page or set a new one
		$this->data['title'] = 'Design Form | '.$this->data['settings']['site_name'];
		$this->data['name'] = 'Design Form';
		$this->data['set_level']	= 2;
	    if($id){
            $this->data['proccess'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			if(empty($this->data['proccess'])){
	            redirect($this->data['_cancel'].'/create/');
			}
        }
        else{
            redirect($this->data['_cancel'].'/create/');
		}

        // Process the form
        if($this->input->post('operation'))
        {
			$options	= array();
			if($this->input->post('option'))
			{
				foreach ($this->input->post('option') as $option)
				{
					$options[]	= $option;
				}

			}	


			
			// save product 
			$product_id	= $this->service_model->save_option($options,$this->data['set_level'],$id);
            redirect($this->data['_cancel'].'/step3/'.$id);
        }
        
		$this->data['id'] = $id;
		$this->data['product_options']	= $this->service_model->get_product_options($id,2);


		$this->data['subview'] = $this->_subView.'design_form';
        $this->load->view('admin/_layout_main', $this->data);
	}


	public function step3($id = NULL){
	    // Fetch a page or set a new one
		$this->data['set_level']	= 3;

		$this->data['name'] = 'Search View';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
	    if($id){
            $this->data['proccess'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			if(empty($this->data['proccess'])){
	            redirect($this->data['_cancel'].'/create/');
			}
        }
        else{
            redirect($this->data['_cancel'].'/create/');
		}

        // Process the form
        if($this->input->post('operation')){
			$options	= array();
			if($this->input->post('option')){
				foreach ($this->input->post('option') as $option){
					$options[]	= $option;
				}
			}	
			
			// save product 
			$product_id	= $this->service_model->save_services_attribute($options,$id);
            redirect($this->data['_cancel'].'/step4/'.$id);
        }
        
		$this->db->order_by('order','asc');
		$this->data['form_data'] = $this->comman_model->get_by($this->_table_names.'_attr',array('service_id'=>$id,'level !='=>3), FALSE, FALSE, false);
        

		$this->data['id'] = $id;
		$this->data['product_options']	= $this->service_model->get_product_options($id,$this->data['set_level']);


		$this->data['subview'] = $this->_subView.'view_form';
        $this->load->view('admin/_layout_main', $this->data);
	}

	public function step4($id = NULL){
	    // Fetch a page or set a new one
		$this->data['set_level']	= 4;
		$this->data['title'] = 'Final Step | '.$this->data['settings']['site_name'];
		$this->data['name'] = 'Final Step';
	    if($id){
            $this->data['proccess'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			if(empty($this->data['proccess'])){
	            redirect($this->data['_cancel'].'/create/');
			}
        }
        else{
            redirect($this->data['_cancel'].'/create/');
		}

        // Process the form
        if($this->input->post('operation'))
        {
            redirect($this->data['_cancel']);
        }

		$this->db->order_by('order','asc');
		$this->data['form_data'] = $this->comman_model->get_by($this->_table_names.'_attr',array('service_id'=>$id), FALSE, FALSE, false);

		$this->data['id'] = $id;
		$this->data['product_options']	= $this->service_model->get_product_options($id,$this->data['set_level']);

		$this->data['subview'] = $this->_subView.'final_step';
        $this->load->view('admin/_layout_main', $this->data);
	}
	
	
	
	
	public function edit($id = NULL){
	    // Fetch a page or set a new one
		$this->data['set_level']	= '1';
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['categories'] = $this->service_model->get_lang($id, FALSE, $this->data['lang_id']);
			if(!$this->data['categories']){
	            redirect($this->data['_cancel']);				
			}
        }
        else
        {
            redirect($this->data['_cancel']);
		}
        

       
	   	$this->db->order_by('title','asc');
        $this->data['categories_data'] = $this->comman_model->get_lang('c_categories',$this->data['content_language_id'],NULL,array('parent_id'=>0),'category_id',false);

        $this->data['templates'] = $this->service_model->get_templates('page_');
        
        // Set up the form
        // Set up the form
        $rules = $this->service_model->rules;
        $this->form_validation->set_rules($this->service_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();
			$data = $this->service_model->array_from_post(array('name'));

  			$data['order'] = $this->service_model->max_order()+1;
            $data_lang = $this->service_model->array_from_post($this->service_model->get_lang_post_fields());
            $id = $this->service_model->save_with_lang($data, $data_lang,$id);
            redirect($this->data['_cancel'].'/step2/'.$id);
        }

        
        // Load the view
/*		echo '<pre>';
		print_r($this->data);
		die;
*/
		$this->data['id']					= '';
		$this->data['product_options']	= $this->service_model->get_product_options($id,$this->data['set_level']);


		$this->data['subview'] = $this->_subView.'create';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    
    public function delete($id){

		$check_casae = $this->comman_model->get_by('cases',array('service_id'=>$id),false,false,false);
		if($check_casae){
			foreach($check_casae as $set_case){
			$this->db->delete('appointments', array('case_id'=>$set_case->id));
			$this->db->delete('cases_complete', array('case_id'=>$set_case->id));
			$this->db->delete('cases_expense', array('case_id'=>$set_case->id));
			$this->db->delete('cases_user', array('case_id'=>$set_case->id));
			$this->db->delete('tasks', array('case_id'=>$set_case->id));
			$this->db->delete('files', array('case_id'=>$set_case->id));
			$this->db->delete('tasks', array('case_id'=>$set_case->id));			
			$this->db->delete('cases', array('id'=>$set_case->id));
			$this->db->delete('cases_value', array('case_id'=>$set_case->id));
			}
		}

		$this->db->delete($this->_table_names, array('id'=>$id));
		$this->db->delete($this->_table_names.'_attr', array('service_id'=>$id));
        redirect($this->data['_cancel']);
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current categories
        
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        
        $categories = $this->service_model->get();
        
        if(count($categories))
        {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }
    
	function view($id=NULL){
	    // Fetch a page or set a new one
		$this->data['name'] = 'View';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
	    if($id){
            $this->data['process'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
            if(!$this->data['process']){
		        redirect($this->data['_cancel']);
			}
			$this->db->order_by('order','asc');
            $this->data['form_data'] = $this->comman_model->get_by($this->_table_names.'_attr',array('service_id'=>$id), FALSE, FALSE, false);
        }
        else
        {
		        redirect($this->data['_cancel']);
        }
        

		$this->data['category'] = $this->comman_model->get_lang('categories',$this->data['content_language_id'],NULL,array('id'=>$this->data['process']->category_id),'category_id',true);



		$this->data['subview'] = $this->_subView.'view';
        $this->load->view('admin/_layout_main', $this->data);
	
	}
	
}