<?php
class deal extends Admin_Controller{
	public $_table_names = 'deals';
	public $_subView = 'admin/deals/';
	public $_redirect = '/deal';
    public $_current_revision_id;
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Deal Management';
        $this->load->model(array('deal_model'));

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
		$this->data['lang_id'] =$this->data['adminLangSession']['lang_id'];
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
	}
    
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1700).'Deal';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['table'] = true;
		$this->data['service_type'] = array('Automatic'=>'Automatic','Manual'=>'Manual');
		$this->db->order_by('id','asc');
        $this->data['all_data'] =$this->deal_model->get_lang(NULL,false,$this->data['content_language_id']);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}

    public function edit($id = NULL){
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['products'] = $this->deal_model->get_lang($id, FALSE, $this->data['lang_id']);
			if(!$this->data['products']){
	            redirect($this->data['_cancel']);				
			}

        }
        else
        {
			$this->data['name'] = show_static_text($this->data['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['products'] = $this->deal_model->get_new();
        }
        

        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['adminLangSession']['lang_id'],219));

        $rules = $this->deal_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();
			$post1 =array('price','city','link');
        	$data = $this->deal_model->array_from_post($post1);

            if($id == NULL)$data['order'] = $this->deal_model->max_order()+1;
            $data_lang = $this->deal_model->array_from_post($this->deal_model->get_lang_post_fields());
            if($id == NULL){
				$data['created_by'] = 'admin';
                $data['on_date'] = date('Y-m-d');
                $data['enabled'] = 1;
                $data['created'] = time();
                $data['modified'] = time();
			}
			else{
                $data['modified'] = time();
			}
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

	    // Fetch a page or set a new one

            $id = $this->deal_model->save_with_lang($data, $data_lang, $id);

			if(empty($this->data['products']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            
			$this->session->unset_userdata('image_session');
            redirect($this->data['_cancel'].'/edit/'.$id);
        }

		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
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
			if($type=='status'){
				if($check_data->status==1){
					$post_data = array('status'=>0);
				}
				elseif($check_data->status==0){
					$post_data = array('status'=>1);
				}
				else{
					$post_data = array('status'=>1);
				}
				$result = $this->comman_model->save($this->_table_names,$post_data,$id);				
			}

			if($type=='is_feature'){
				if($check_data->is_feature==1){
					$post_data = array('is_feature'=>0);
				}
				elseif($check_data->is_feature==0){
					$post_data = array('is_feature'=>1);
				}
				else{
					$post_data = array('is_feature'=>1);
				}
				$result = $this->comman_model->save($this->_table_names,$post_data,$id);				
			}
			if($type=='type'){
				$post_data = array('type'=>$value);
				$result = $this->comman_model->save($this->_table_names,$post_data,$id);
				
			}
			
		}
	}



    public function delete($id){       
		$this->deal_model->delete($id);		
        redirect($this->data['_cancel']);
	}

    
}