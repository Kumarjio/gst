<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_manage extends Admin_Controller {
	public $_table_names = 'stores_manage';
	public $_subView = 'admin/store_manage/';
	public $_redirect = '/store_manage';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Product Management';
        $this->load->model(array('store_manage_model'));
        // Get language for content id to show in administration

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect.'/manage';
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
	

	//  Landing page of admin section.
	function manage($id=false){
		if(!$id){
			redirect($this->data['admin_link'].'/store');
		}
		$this->data['name'] = 'Hotel Management';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->data['store_id'] = $id;

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/edit/'.$id;
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit/'.$id;
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view/'.$id;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete/'.$id;
		$this->data['all_data'] = $this->comman_model->get_by($this->_table_names,array('store_id'=>$id),false,false,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}



	function edit($page=false,$id= NULL){
		if(!$page){
			redirect($this->data['admin_link'].'/store');
		}
	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['stores'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);

            if(!$this->data['stores']){
	            redirect($this->data['_cancel'].'/'.$page);
			}
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['stores'] = $this->store_manage_model->get_new();
        }

	   	$this->db->order_by('title','asc');
        $this->data['tag_data'] = $this->comman_model->get_lang('tags',$this->data['content_language_id'],NULL,false,'tag_id',false);


		$this->data['products_file'] = $this->comman_model->get_by('stores_files',array('store_id'=>$id),false,false,false);

        $this->data['time_data'] = $this->comman_model->get_time_hour();
        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['adminLangSession']['lang_id'],219));
        $rules = $this->store_manage_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
			//$user_post =array('first_name','last_name','email','password');
			$store_post =array('room','price','description','default');
        	//$userData = $this->store_manage_model->array_from_post($user_post);
        	$storeData = $this->store_manage_model->array_from_post($store_post);

        	$storeData['store_id'] = $page;


			if($this->input->post('tag_id')){
					$storeData['tag_id'] = implode(',',$this->input->post('tag_id'));
			}


          	//$this->comman_model->save('users',$userData,$this->data['stores']->user_id);

			if($storeData['default'] == 1){
				$this->db->set(array('default'=>'0'));
				$this->db->where('store_id', $page);
				$this->db->update($this->_table_names);
			}
            $this->comman_model->save($this->_table_names,$storeData,$id);


			$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            redirect($this->data['_cancel'].'/'.$page);
			//die;
        }

        $this->data['_cancel'] = $this->data['_cancel'].'/'.$page;
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}	



	function delete($page= false,$id = false){
		if(!$page){
			redirect($this->data['admin_link'].'/store');
		}
		if(!$id){
            redirect($this->data['_cancel'].'/'.$page);
		}
		$check = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if(!$check){
			$this->session->set_flashdata('error','There is no store.'); 
            redirect($this->data['_cancel'].'/'.$page);
		}

		//$this->comman_model->update('categories',array('parent_id'=>0),array('parent_id'=>$id));

		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));
		$this->session->set_flashdata('success','data has successfully deleted.'); 
		redirect($this->data['_cancel'].'/'.$page);
	}



}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */