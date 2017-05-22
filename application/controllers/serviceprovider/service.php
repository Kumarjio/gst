<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service extends Frontend_Controller{	
	public $_redirect = '/serviceprovider/service';

	public $_subView = 'serviceprovider/services/';
	public $_s_table_names = 'services';
	public $_table_names = 'u_services';
	public $_mainView = 'serviceprovider/_layout_main';
	public function __construct(){
		parent::__construct();
		$this->data['active_sub'] = '';	
		$this->data['active'] = 'Service';		
        $this->load->model(array('service_model'));
		
        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');
	
		$this->data['_user_link'] = $this->data['lang_code'].'/serviceprovider';
        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_add'] = $this->data['lang_code'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['lang_code'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['lang_code'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['lang_code'].$this->_redirect;
        $this->data['_delete'] = $this->data['lang_code'].$this->_redirect.'/delete';

		$this->_checkUser();
//		$this->_checkPaidUser();
	}

	function index(){
		//var_dump($this->session->all_userdata());
        $this->data['name'] = show_static_text($this->data['lang_id'],600).'Service';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;

		$this->data['all_data'] = $this->comman_model->get_by($this->_table_names,array('user_id'=>$this->data['user_details']->id),false,false,false);

		
/*		echo '<pre>';
		print_r($this->data['all_data']);
		die;*/
		//$this->load->view('user/orders',$this->data);
        $this->data['subview'] = $this->_subView.'index';			
		$this->load->view($this->_mainView,$this->data);
	}

	
	public function edit($id = NULL){

	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

			$this->data['products'] = $checkProduct = $this->comman_model->get_by($this->_table_names,array('id'=>$id,'user_id'=>$this->data['user_details']->id),false,false,true);
			if(!$checkProduct){
				redirect($this->data['_cancel']);				
			}

        }
        else{
			$this->data['name'] = show_static_text($this->data['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['products'] = $this->service_model->get_new_user();
        }

		$this->db->order_by('title','asc');
    	$this->data['services_data'] = $this->comman_model->get_lang('services',$this->data['lang_id'],NULL,array('parent_id'=>0),'service_id',false);

        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['lang_id'],219));

        $rules = $this->service_model->u_service_rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data 	= array();
			$post1 	= array('name','s_id','price','description');
        	$data = $this->service_model->array_from_post($post1);
			$data['user_id'] = $this->data['user_details']->id;
//	    	$data['slug'] = url_title($data['code'], 'dash', true);

			//file1

			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/services');
				if($result[0]=='error'){
					$this->session->set_flashdata('error',$result[1]); 
				}
				else if($result[0]=='success'){
					$data['image'] = $result[1];
				}
			}	
			else{
				 if($id != NULL)$data['image'] = $this->data['products']->image;
			}




			$id = $this->comman_model->save($this->_table_names,$data,$id);


/*
			if(empty($this->data['product']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],296));*/
            
			//redirect($this->data['_cancel']);
			redirect($this->data['_cancel'].'/fill/'.$id);
        }

        $this->data['subview'] = $this->_subView.'edit';			
		$this->load->view($this->_mainView,$this->data);
	}
	
	public function fill($id = NULL){
	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

			$this->data['products'] = $checkProduct = $this->comman_model->get_by($this->_table_names,array('id'=>$id,'user_id'=>$this->data['user_details']->id),false,false,true);
			if(!$checkProduct){
				redirect($this->data['_cancel']);				
			}

        }
        else{
			redirect($this->data['_cancel']);				
        }

		$this->data['form_data'] = $this->comman_model->get_by('services_attr',array('service_id'=>$this->data['products']->s_id), FALSE, FALSE, false);



        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['lang_id'],219));

        $rules = $this->service_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->input->post('operation')){
			$options	= array();
			if($this->input->post('field')){
				foreach ($this->input->post('field') as $option=>$value)
				{
					$options[$option]	= $value;
				}

			}	
	
	        //for upload files
			foreach($_FILES as $key => $value){            
				$config =array();
				$config['upload_path'] = 'assets/uploads/services/files/';
				$config['allowed_types'] = '*';
				$config['max_size']      = '800000000';
				$this->load->library('upload', $config);

				if( ! empty($value['name'])){
					if( ! $this->upload->do_upload($key)){                                           
					  // echo $key.':'. $error['upload_error'] = $this->upload->display_errors("<span class='error'>", "</span>");
					}
					else{
						$arryName = explode('-',$key);
						// Build a file array from all uploaded files
						$filesArray = $this->upload->data();;
						$options[$arryName[1]] = $filesArray['file_name'];
					}
				}
			}
			$product_id	= $this->service_model->save_option_value($options,1,$id,$this->data['products']->s_id);
			if(empty($this->data['product']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],296));
//			redirect($this->data['_cancel'].'/fill/'.$id);
			redirect($this->data['_cancel']);
        }


        $this->data['subview'] = $this->_subView.'edit_field';			
		$this->load->view($this->_mainView,$this->data);
	}





	function ajax_upload(){		
		$this->load->helper('string');
		$id = $this->input->post('id');
		$ret =array();		
		$config['upload_path'] = './assets/uploads/products';
		$config['allowed_types'] = '*';
		
		//$config['allowed_types'] = config_item('allow_data_type');
		$config['max_size']	= '200000';
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('myfile')){
			$ret['result']= 'error';
			$ret['msg']= $this->upload->display_errors();
			//redirect('admin/add_coach');
		}
		else{
			$upload_info = $this->upload->data();
			$ret['result']= 'success';
			$ret['msg']= $upload_info['file_name'];
			
		}
	    echo json_encode($ret);		
	}

	function refresh(){
		$id = $this->input->post('id');
	   echo '<div class="product-item col-md-3" style="padding:4px;margin:5px;width:23%" >
        <div class="pi-img-wrapper">
	        <img style="height:100px;width:100%" alt="" class="img-responsive" src="assets/uploads/products/'.$id.'"></a>
        </div></div>';
	}

	function delete_image(){
		$id = $this->input->post('id');
		$check_image = $this->comman_model->get_by('product_files',array('id'=>$id),false,false,true);
		if($check_image){
			$this->comman_model->delete('product_files',array('id'=>$id));
			$image = 'assets/uploads/products/'.$check_image->filename;
			if(is_file($image))
    	    	unlink($image);
		}
	}

	function delete($id=false){
		if(!$id){
			redirect($this->data['_cancel']);			
		}
		$check_product = $this->comman_model->get_by($this->_table_names,array('id'=>$id,'user_id'=>$this->data['user_details']->id),FALSE,FALSE,TRUE);
		if(!$check_product){
			$this->session->set_flashdata('error','Sorry!! You can not delete.');
			redirect($this->data['_cancel']);			
		}
		$this->db->delete($this->_table_names, array('id'=>$id,'user_id'=>$this->data['user_details']->id)); 
		redirect($this->data['_cancel']);			
	}
		
	function _checkUser(){
		$redirect = false;
		if(!empty($this->data['user_details'])){
			if($this->data['user_details']->account_type!='S'){
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

	function _checkPaidUser(){
		if($this->data['user_details']->plan_id!=0){}
		else{
			$this->session->set_flashdata('error','Please Upgrade Your Membership!!'); 
			redirect($this->data['_user_link']);
		}
		if($this->data['user_details']->total_point>0){
		}
		else{
			$this->session->set_flashdata('error','Please Upgrade Your Membership!!'); 
			redirect($this->data['_user_link'].'/account');
		}
	}
	

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */