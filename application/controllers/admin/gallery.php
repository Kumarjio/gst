<?php
class Gallery extends Admin_Controller{
	public $_table_names = 'gallery';
	public $_subView = 'admin/gallery/';
	public $_redirect = '/gallery';
    public $_current_revision_id;
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Gallery Management';
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
        $this->load->model(array('gallery_model'));
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
	}
    
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],176);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->data['all_data'] = $this->gallery_model->get_lang(NULL,false,$this->data['content_language_id']);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}

    
    public function edit($id = NULL){
		$all_session =$this->session->all_userdata();
	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['products'] = $this->gallery_model->get_lang($id, FALSE, $this->data['content_language_id']);
            $this->data['products_file'] = $this->comman_model->get_by($this->_table_names.'_files',array('gallery_id'=>$id),false,false,false);
            count($this->data['products']) || $this->data['errors'][] = 'User could not be found';
			if(!$this->data['products']){
				redirect($this->data['_cancel']);
			}
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['products'] = $this->gallery_model->get_new();
	
        }
        
		$this->db->order_by('order','asc');
		$files = $this->comman_model->get('gallery_files',false);

       // $this->data['tag_data'] = $this->tag_model->get_no_parents($this->data['content_language_id']);

        // Fetch all files by repository_id
        
        // Set up the form
        $rules = $this->gallery_model->rules;
        $this->form_validation->set_rules($this->gallery_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE)
        {
            $data =array();
			$post1 =array('slug',);
        	$data = $this->gallery_model->array_from_post($post1);
			
            if($id == NULL)$data['order'] = $this->gallery_model->max_order()+1;
            $data_lang = $this->gallery_model->array_from_post($this->gallery_model->get_lang_post_fields());
            if($id == NULL){
                $data['date'] = date('Y-m-d H:i:s');
                $data['enabled'] = 1;
                $data['created'] = time();
                $data['modified'] = time();
			}
			else{
                $data['modified'] = time();
			}
			//file1
			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/gallery');
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

            $id = $this->gallery_model->save_with_lang($data, $data_lang, $id);

			$more_pic = $this->input->post('more_pic');
			if($more_pic){
				foreach($more_pic as $key=>$value){
		            $this->comman_model->save('gallery_files', array('gallery_id'=>$id,'filename'=>$value));					
				}
			}

			if(empty($this->data['products']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            
			$this->session->unset_userdata('image_session');
            redirect($this->data['_cancel'].'/edit/'.$id);
        }
        
        // Load the view
/*		echo '<pre>';
		print_r($this->data);
		die;
*/
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    
    public function delete($id){       
		$this->gallery_model->delete($id);		
        redirect($this->data['_cancel']);
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current categories
        
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('code'));
        !$id || $this->db->where('id !=', $id);        
        $categories = $this->comman_model->get('products',false);        
	//	echo $this->db->last_query();die;
        if(count($categories))
        {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }
    
	function ajax_delete(){
		$id = $this->input->post('id');
		$check_image = $this->comman_model->get_by('gallery_files',array('id'=>$id),false,false,true);
		if($check_image){
			$this->comman_model->delete('gallery_files',array('id'=>$id));
			$image = 'assets/uploads/gallery/'.$check_image->filename;
			if(is_file($image))
    	    	unlink($image);
		}
	}
	
	function ajax_refresh(){
		$id = $this->input->post('id');
	   echo '<div class="product-item col-md-3" style="padding:4px;margin:5px;width:23%" >
        <div class="pi-img-wrapper">
	        <img style="height:100px;width:100%" alt="" class="img-responsive" src="assets/uploads/gallery/'.$id.'"></a>
        </div></div>';
	}

	function ajax_upload(){		
		$this->load->helper('string');
		$id = $this->input->post('id');
		$ret =array();		
		$config['upload_path'] = './assets/uploads/gallery';
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


    
}