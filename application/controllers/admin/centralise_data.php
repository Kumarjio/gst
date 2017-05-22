<?php
class centralise_data extends Admin_Controller{
	public $_table_names = 'settings_images';
	public $_subView = 'admin/settings_images/';
	public $_redirect = '/centralise_data';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Media';
        $this->load->model(array('home_model'));
        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
	}

	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],17800).'Media';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;

		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}


    public function remove_image($page,$id){
		$file_name = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if(!empty($file_name)){
			if($page=='image1'){
				$file_dir ='assets/uploads/home/'.$file_name->image; 
				if(is_file($file_dir)){
					unlink($file_dir);
				}
				$this->comman_model->save($this->_table_names,array('image'=>NULL),$id);		
			}
			if($page=='image2'){
				$file_dir ='assets/uploads/home/'.$file_name->image1; 
				if(is_file($file_dir)){
					unlink($file_dir);
				}
				$this->comman_model->save($this->_table_names,array('image1'=>NULL),$id);		
			}
			
		}
		redirect($this->_redirect.'/edit_image/'.$id);
	}

    public function remove_video($page,$id){
		$file_name = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if(!empty($file_name)){
			if($page=='video'){
				$file_dir ='assets/uploads/home/'.$file_name->video; 
				if(is_file($file_dir)){
					unlink($file_dir);
				}
				$this->comman_model->save($this->_table_names,array('video'=>NULL),$id);		
			}
			else if($page=='image'){
				$file_dir ='assets/uploads/home/'.$file_name->image; 
				if(is_file($file_dir)){
					unlink($file_dir);
				}
				$this->comman_model->save($this->_table_names,array('image'=>NULL),$id);		
			}
		}
		redirect($this->_redirect.'/edit_video/'.$id);
	}



	public function create(){
		$this->data['name'] = 'Create';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        		
        // Set up the form
        $rules = $this->home_model->rules;
        $this->form_validation->set_rules($this->home_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE)
        {
            $data =array();
        	$data = $this->home_model->array_from_post(array('name','is_active','video_link'));


			if (!empty($_FILES['logo']['name'])){
                $config['upload_path']      = 'assets/uploads/home/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '60000';
                $config['max_width']        = '5000';
                $config['max_height']       = '5000';
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('logo')){
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['image']  = $upload_data['file_name'];
                }

            }	
			else{
			}

			//second image
			if (!empty($_FILES['logo1']['name'])){
                $config['upload_path']      = 'assets/uploads/home/';
                $config['allowed_types']    = '*';
                $config['max_size']         = '100000';
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('logo1')){
                    if($_FILES['logo1']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['video']  = $upload_data['file_name'];
                }

            }	
			else{
			}

			$data['type'] = 'video';
			if($data['is_active']==1){
				$this->db->set(array('is_active'=>'0'));
				$this->db->update($this->_table_names);
			}
			
			$this->comman_model->save($this->_table_names,$data);

			if(empty($this->data['products']->id)){
	            $this->session->set_flashdata('success','Data has successfully created.');
			}
			else
	            $this->session->set_flashdata('success','Data has successfully updated.');			
           redirect($this->data['_cancel']);
        }
        
		$this->data['subview'] = $this->_subView.'create';
        $this->load->view('admin/_layout_main', $this->data);	
	}
	
	public function edit($id = NULL){
	    // Fetch a page or set a new one
		if(!$id){
			redirect($this->data['_cancel']);
		}
		$this->data['products'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id,'type'=>'video'),FALSE, FALSE,TRUE);
		if(!$this->data['products']){
			redirect($this->data['_cancel']);
		}
		
		$this->data['name'] = 'Edit';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

        		
        // Set up the form
        $rules = $this->home_model->rules;
        $this->form_validation->set_rules($this->home_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE)
        {
            $data =array();
        	$data = $this->home_model->array_from_post(array('name','is_active','video_link'));

            if($id == NULL)$data['order'] = $this->home_model->max_order()+1;

			if (!empty($_FILES['logo']['name'])){
                $config['upload_path']      = 'assets/uploads/home/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '60000';
                $config['max_width']        = '5000';
                $config['max_height']       = '5000';
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('logo')){
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['image']  = $upload_data['file_name'];
                }

            }	
			else{
	            if($id != NULL)
					$data['image'] = $this->data['products']->image;
			}

			//second image
			if (!empty($_FILES['logo1']['name'])){
                $config['upload_path']      = 'assets/uploads/home/';
                $config['allowed_types']    = '*';
                $config['max_size']         = '100000';
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
                if (!$this->upload->do_upload('logo1')){
                    if($_FILES['logo1']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['video']  = $upload_data['file_name'];
                }

            }	
			else{
	            if($id != NULL)
					$data['video'] = $this->data['products']->video;
			}

			$data['type'] = 'video';
			
			if($data['is_active']==1){
				$this->db->set(array('is_active'=>'0'));
				$this->db->update($this->_table_names);
			}
			
			$this->comman_model->save($this->_table_names,$data,$id);

			if(empty($this->data['products']->id)){
	            $this->session->set_flashdata('success','Data has successfully created.');
			}
			else
	            $this->session->set_flashdata('success','Data has successfully updated.');			
           redirect($this->data['_cancel']);
        }
        
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);	
	}
    
    public function delete($id){       
		if($id){
			$check = $this->comman_model->get_by($this->_table_names,array('id'=>$id),FALSE, FALSE,TRUE);
			if($check){
				if($check->is_active!=1){
					$this->db->where('id', $id);
					$this->db->delete($this->_table_names);
				}
				else{
		            $this->session->set_flashdata('error','Sorry!! you can not delete');
				}
			}
			else{
				$this->session->set_flashdata('error','There is no data.');
			}
	
		}
		else{
			$this->session->set_flashdata('error','There is no data.');
		}

        redirect($this->data['_cancel']);
	}
    
    
}