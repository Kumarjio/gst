<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_category extends Admin_Controller {
	public $_table_names = 'stores_category';
	public $_subView = 'admin/stores_category/';
	public $_redirect = '/store_category';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Store Management';
        $this->load->model(array('store_category_model'));
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
	

    public function index()
	{
	    // Fetch all pages
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],167);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['all_data'] = $this->store_category_model->get_lang();
/*		$count = count($this->data['all_data']);
		$r_from = $page <= 1 ? 1 : ($page -1) * $config["per_page"]+1; //RANGE STARTS FROM 
		$r_to   = $r_from + $count - 1;    //RANGE ENDS TO
		$this->data['range'] = $count? "Showing ".$r_from." to ".$r_to." of ".$config["total_rows"]:'';*/
		//echo $this->db->last_query();die;
		//die;
        $this->data['subview'] = $this->_subView.'index_order';	
		$this->load->view('admin/_layout_main',$this->data);
	}

    public function search_ajax(){
        // Save order from ajax call
		$title = $this->input->post('title');
        if (isset($_POST['sortable'])) {
            $this->store_category_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
		$this->db->like('title',$title);
        $this->data['pages'] = $this->store_category_model->get_search_data($this->data['content_language_id']);

        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }


    public function order_ajax(){
        // Save order from ajax call
        if (isset($_POST['sortable'])) {
            $this->store_category_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
        $this->data['pages'] = $this->store_category_model->get_nested($this->data['content_language_id']);
        
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
            $this->store_category_model->save_order($_POST['sortable']);
        }
        
        $data = array();
        $length = strlen(json_encode($data));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        
        exit();
    }


	function edit($id= NULL){
	    // Fetch a page or set a new one
	    if($id)
        {
            $this->data['categories'] = $this->store_category_model->get_lang($id, FALSE, $this->data['content_language_id']);
            count($this->data['categories']) || $this->data['errors'][] = 'User could not be found';
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['categories'] = $this->store_category_model->get_new();
        }
        

       
		// Pages for dropdown
        $this->data['pages_no_parents'] = $this->store_category_model->get_no_parents($this->data['content_language_id']);
        $this->data['page_languages'] = $this->language_model->get_form_dropdown('language');
        $this->data['templates_page'] = $this->store_category_model->get_templates('page_');
        // Fetch all files by repository_id
        
        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['adminLangSession']['lang_id'],219));

        $rules = $this->store_category_model->rules;
        $this->form_validation->set_rules($this->store_category_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE)
        {
            $data =array();
            $data = $this->store_category_model->array_from_post(array('slug','parent_id'));
            if($id == NULL)$data['order'] = $this->store_category_model->max_order()+1;
            $data_lang = $this->store_category_model->array_from_post($this->store_category_model->get_lang_post_fields());
            if($id == NULL){
                $data['date'] = date('Y-m-d H:i:s');
                $data['created'] = time();
                $data['modified'] = time();
			}
			else{
                $data['modified'] = time();
			}
            
			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/categories');
				if($result[0]=='error'){
					$this->session->set_flashdata('error',$result[1]); 
				}
				else if($result[0]=='success'){
					$data['image'] = $result[1];
				}
			}	
			else{
				if($id != NULL)
					$data['image'] = $this->data['categories']->image;
			}
            $id = $this->store_category_model->save_with_lang($data, $data_lang, $id);
			if(empty($this->data['categories']->id))
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],295));
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
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

	function delete($id = false){
		if(!$id){
			redirect($this->data['_cancel']);
		}

		//$this->comman_model->update('categories',array('parent_id'=>0),array('parent_id'=>$id));

		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));

		$this->session->set_flashdata('success','Category has successfully deleted.'); 
		redirect($this->data['_cancel']);		

	}

 	public function remove_file($type=false,$id=false){
		if(!$type){
            redirect($this->data['_cancel']);
		}
		if(!$id){
            redirect($this->data['_cancel']);
		}
        $check = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
		if(!$check){
            redirect($this->data['_cancel'].'/edit/'.$id);
		}
		if($type=='image'){
			$this->db->where(array('id'=>$id));
			$this->db->update($this->_table_names, array('image'=>NULL));
			$file_dir ='assets/uploads/posts/full/'.$check->image; 
			if(is_file($file_dir)){
				unlink($file_dir);
			}
			$file_dir ='assets/uploads/posts/small/'.$check->image; 
			if(is_file($file_dir)){
				unlink($file_dir);
			}
			$file_dir ='assets/uploads/posts/thumbnails/'.$check->image; 
			if(is_file($file_dir)){
				unlink($file_dir);
			}
		}
		redirect($this->data['_cancel'].'/edit/'.$id);

	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */