<?php
class Product extends Admin_Controller{
	public $_table_names = 'products';
	public $_subView = 'admin/products/';
	public $_mainView = 'admin/_layout_main';
	public $_redirect = '/product';
    public $_current_revision_id;
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Product Management';
        $this->load->model(array('category_model','product_model'));
		$this->load->library(array('csvimport'));
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
		$this->data['lang_id'] = $this->data['adminLangSession']['lang_id'];
	}
    
	
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],170);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['section'] = $this->product_model->get_section();

		if($this->input->get('q')){
			if($this->data['admin_details']->default=='0'){
				$this->data['search'] = $this->input->get('q');
				$query = "SELECT * FROM (products) JOIN products_lang ON products.id = products_lang.product_id WHERE language_id = '".$this->data['content_language_id']."' AND (title LIKE '%".$this->input->get('q')."%') AND admin_id='".$this->data['admin_details']->id."' ORDER BY id desc";
			}
			else{
				$this->data['search'] = $this->input->get('q');
				$query = "SELECT * FROM (products) JOIN products_lang ON products.id = products_lang.product_id WHERE language_id = '".$this->data['content_language_id']."' AND (title LIKE '%".$this->input->get('q')."%') ORDER BY id desc";
			}

			$this->data['all_data'] =  $this->db->query($query)->result();
				$this->data['pagination'] = '';
			//$this->data['product_data'] = $this->comman_model->get_lang('products',$this->data['lang_id'],NULL,array('user_id'=>$this->data['user_details']->id),'product_id',false);
			/*echo $this->db->last_query();
			echo '<pre>';
			print_r($this->data['product_data']);
			die;*/
		}
		else{
			if($this->data['admin_details']->default=='0'){
				$this->db->order_by('id','desc');	
				$count= count($this->comman_model->get_lang($this->_table_names,$this->data['content_language_id'],NULL,array('admin_id'=>$this->data['admin_details']->id),'product_id',false));
			}
			else{
				$this->db->order_by('id','desc');	
				$count= count($this->product_model->get_lang(NULL,false,$this->data['content_language_id']));				
			}
			$perpage = 50;
			if ($count > $perpage) {
				//echo 'yes';die;
				$this->load->library('pagination');
				$config['base_url'] = site_url($this->data['_cancel'].'/index');
				$config['total_rows'] = $count;
				$config['per_page'] = $perpage;
				$config['uri_segment'] = 4;
				
				//stylish pagination
				$config['full_tag_open'] = "<ul class='pagination pull-right'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li><span>";
				$config['cur_tag_close'] = "</span></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tag_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tag_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tag_close'] = "</li>";
	
				$this->pagination->initialize($config);
				$this->data['pagination'] = $this->pagination->create_links();
				$offset = $this->uri->segment(4);
			}
			else {
				$this->data['pagination'] = '';
				$offset = 0;
			}
			$this->db->limit($perpage, $offset);
			$this->db->order_by('id','desc');	
			if($this->data['admin_details']->default=='0'){
				$this->data['all_data'] = $this->comman_model->get_lang('products',$this->data['content_language_id'],NULL,array('admin_id'=>$this->data['admin_details']->id),'product_id',false);
			}
			else{
				$this->data['all_data'] = $this->product_model->get_lang(NULL,false,$this->data['content_language_id']);
			}
		}
		//echo $this->db->last_query();die;
/*		$count = count($this->data['all_data']);
		$r_from = $page <= 1 ? 1 : ($page -1) * $config["per_page"]+1; //RANGE STARTS FROM 
		$r_to   = $r_from + $count - 1;    //RANGE ENDS TO
		$this->data['range'] = $count? "Showing ".$r_from." to ".$r_to." of ".$config["total_rows"]:'';*/
		//echo $this->db->last_query();die;
		//die;
        $this->data['subview'] = $this->_subView.'index_pagination';	
		$this->load->view('admin/_layout_main',$this->data);

	}

    public function edit($id = NULL){
	    // Fetch a page or set a new one
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['products'] = $this->product_model->get_lang($id, FALSE, $this->data['lang_id']);
			if(!$this->data['products']){
	            redirect($this->data['_cancel']);				
			}
			$this->data['products_file'] = $this->comman_model->get_by('product_files',array('product_id'=>$id),false,false,false);

        }
        else
        {
			$this->data['name'] = show_static_text($this->data['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['products'] = $this->product_model->get_new();
	
        }
		

		$this->data['product_type']= array('Product'=>'Product','Service'=>'Service');

	   	$this->db->order_by('title','asc');
        $this->data['categories_data'] = $this->comman_model->get_lang('categories',$this->data['lang_id'],NULL,array('parent_id'=>0),'category_id',false);

        // Set up the form
		$this->form_validation->set_message('required', '%s '.show_static_text($this->data['lang_id'],219));

        $rules = $this->product_model->rules;
        $this->form_validation->set_rules($this->product_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();
			$post1 =array('price','discount_price','category_id','sub_category_id',);
        	$data = $this->product_model->array_from_post($post1);

            if($id == NULL)$data['order'] = $this->product_model->max_order()+1;
            $data_lang = $this->product_model->array_from_post($this->product_model->get_lang_post_fields());
            if($id == NULL){
				$data['created_by'] = 'admin';
                $data['on_date'] = date('Y-m-d');
                $data['date_time'] = date('Y-m-d H:i:s');
                $data['enabled'] = 1;
                $data['status'] = 1;
                $data['created'] = time();
                $data['modified'] = time();
			}
			else{
                $data['modified'] = time();
			}
			//file1

			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/products');
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


            $id = $this->product_model->save_with_lang($data, $data_lang, $id);
			//$id = $this->comman_model->save($this->_table_names,$data, $id);
			$more_pic = $this->input->post('more_pic');
			if($more_pic){
				foreach($more_pic as $key=>$value){
		            $this->comman_model->save('product_files', array('product_id'=>$id,'filename'=>$value));					
				}
			}

			if(empty($this->data['product']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['lang_id'],296));
            
			//redirect($this->data['_cancel']);
			redirect($this->data['_cancel'].'/edit/'.$id);
        }

        $this->data['subview'] = $this->_subView.'edit';			
		$this->load->view($this->_mainView,$this->data);
	}

	function set_value(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$value = $this->input->post('value');
		if($type=='section'){
			$post_data = array('section'=>$value);
			$result = $this->comman_model->save($this->_table_names,$post_data,$id);
			
		}
		else if($type=='user_id'){
			$post_data = array('user_id'=>$value);
			$result = $this->comman_model->save($this->_table_names,$post_data,$id);					
		}	
	}

	function get_active(){
		$id = $this->input->post('id');
		$type = $this->input->post('type');
		$value = $this->input->post('value');
		$check_data = $this->comman_model->get_by('products',array('id'=>$id),false,false,true);
		if($check_data){
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
			if($type=='feature'){
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
		}
	}

    public function order_ajax(){
        // Save order from ajax call
        if (isset($_POST['sortable'])) {
            $this->product_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
        $this->data['pages'] = $this->product_model->get_nested($this->data['content_language_id']);
        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }

    public function search_ajax(){
        // Save order from ajax call
		$title = $this->input->post('title');
        if (isset($_POST['sortable'])) {
            $this->product_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
		$this->db->like('title',$title);
        $this->data['pages'] = $this->product_model->get_nested($this->data['content_language_id']);
		//echo $this->db->last_query();
        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }

	
	function get_status(){
		$id = $this->input->post('id');
		$post_data = array('enabled'=>$this->input->post('enabled'));
		$result = $this->comman_model->save($this->_table_names,$post_data,$id);
	}

    public function file_order($id){
        $data = array();
		$files = $this->comman_model->get_by('product_files',array('product_id' => $id),false,false,false);
		foreach($_POST['order'] as $order=>$filename){
			foreach($files as $file)
			{
				if($filename == $file->filename){
					$this->comman_model->save('product_files',array('order' => $order,),$file->id);
					break;
				}
			}
		}
        echo json_encode($data);
	}

    
    public function order()
    {
		$this->data['sortable'] = TRUE;
        
        // Load view
		$this->data['subview'] = $this->_subView.'order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    

    public function update_link(){
        $post = array();
        $post['id'] = $this->input->post('id');
        $post['link'] = $this->input->post('links');
        $id = $this->input->post('id');
        $link = $this->input->post('links');

       
        $id = $this->comman_model->save('product_files',array('link'=>$link),$id);
        if($id>0){
            $data['message'] = 'Success Updating Description';
            $data['status'] = true;
        }else{
            $data['message'] = 'Error Updating Description';
            $data['status'] = false;
        }
        $length = strlen(json_encode($post));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        exit();
    }


    public function update_ajax($filename = NULL)
    {
        // Save order from ajax call
        if(isset($_POST['sortable']) && $this->config->item('app_type') != 'demo')
        {
            $this->product_model->save_order($_POST['sortable']);
        }
        
        $data = array();
        $length = strlen(json_encode($data));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        
        exit();
    }
    
        
    public function upload($page_or_param = NULL, $model = 'pages_model'){	
        $modelinput = $this->input->post('model');
        if($modelinput){
            $model = $modelinput;
        }

        $this->load->model($model);        
        $page_id = NULL;        
        $repository_id = NULL;        
        if(is_numeric($page_or_param)){
            // Files for page
            $page_id = $page_or_param;
    	    // Fetch page
    		$page = $this->product_model->get($page_id, TRUE);
            // Fetch file repository
            $repository_id = $page->id;
        }

        /* +++ Security check for USER +++ */
        /* +++ End security check for USER +++ */
        // Upload Handler
        $this->load->library('uploadHandler3', array( 'options'=>array('script_url' => site_url($this->data['_cancel'].'/upload').'/',
                                                     'upload_dir' => dirname($_SERVER['SCRIPT_FILENAME']).'/files/'.$this->_current_revision_id.'/',
                                                     'upload_url' => base_url('/files/'.$this->_current_revision_id).'/'),
                                                     'initialize'=>false,
                                                     ));
        

        if($_SERVER['REQUEST_METHOD'] == 'DELETE')
        {
            $this->uploadhandler3->initialize(true);          
            
            if(substr($page_or_param, 0, 4) == 'rep_')
            {
                $repository_id = substr($page_or_param, 4);
                
                $file = $this->comman_model->get_by('product_files',array(
                    'filename' => $this->uploadhandler3->get_file_name_param(),
                    'product_id' => $repository_id
                ),false,false,TRUE);
                
                $this->comman_model->delete('product_files',array('id'=>$file->id));
            }

            exit();
        }
        else if($_SERVER['REQUEST_METHOD'] == 'GET')
        {
        }
        else if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $response = $this->uploadhandler3->initialize(false);
            
            if(isset($response['files']))
            {
                foreach($response['files'] as $file)
                {
                    
                    $file->thumbnail_url = base_url('assets/templates/images/icons/filetype/_blank.png');
                    $file->zoom_enabled = false;
                //    $filena = str_replace(" ", "_", $file->name);
                    $filena = $file->name;
                    $file->delete_url = site_url($this->data['_cancel'].'/upload/rep_'.$repository_id).'?file='.rawurlencode($filena);
					$this->load->library('image_lib');
					$config['image_library'] = 'GD2';
					$config['source_image'] = 'files/'.$file->name;
					$config['wm_type'] = 'overlay';
					$config['wm_vrt_alignment'] = 'top';
					$config['wm_hor_alignment'] = 'left';
					$config['wm_overlay_path'] = './assets/uploads/watermark1.png';//the overlay image
					$config['wm_opacity']=40;
					$this->image_lib->initialize($config);
					$this->image_lib->watermark();
					$this->image_lib->clear();

                    if(file_exists(FCPATH.'/files/'.$this->_current_revision_id.'/thumbnail/'.$file->name))
                    {
                        $file->thumbnail_url = base_url('files/'.$this->_current_revision_id.'/thumbnail/'.$filena);
                        $file->zoom_enabled = true;
                    }
                    else if(file_exists(FCPATH.'assets/templates/images/icons/filetype/'.get_file_extension($filena).'.png'))
                    {
                        $file->thumbnail_url = base_url('assets/templates/images/icons/filetype/'.get_file_extension($filena).'.png');
                    }
                    
                    $file->short_name = character_hard_limiter($filena, 20);
                    
                    $next_order = $this->comman_model->get_max_order('product_files')+1;
                    
                    $response['orders'][$filena] = $next_order;
                    
                    // Add file to repository
                    $file_id = $this->comman_model->save('product_files',array(
                        'product_id' => $repository_id,
                        'order' => $next_order,
                        'filename' => $filena,
                        'filetype' => $file->type
                    ));
    
                }
            }
            

            $this->uploadhandler3->generate_response($response);
        }
        exit();
    
	}
    public function delete($id){       
		if($this->data['admin_details']->default=='0'){
			$checkProduct = $this->comman_model->get_lang('products',$this->data['content_language_id'],NULL,array('id'=>$id,'admin_id'=>$this->data['admin_details']->id),'product_id',true);
			if($checkProduct){
				$this->product_model->delete($id);		
			}
			else{
	            $this->session->set_flashdata('error','Sorry ! You can not delete.');
			}
		}
		else{
			$this->product_model->delete($id);		
		}

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


	function import(){	
		$image = NULL;

		$this->data['name'] = 'Import';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$rules = $this->admin_model->product_rules;
		$this->form_validation->set_rules($rules);
		if ($this->input->post('operation')){
			$config['upload_path'] = 'assets/uploads/csv/';
			$config['allowed_types'] = 'csv';
	        $config['max_size'] = '30000';
			$this->load->library('upload', $config);
			// If upload failed, display error
			if (!$this->upload->do_upload()) {
				$this->session->set_flashdata('error',$this->upload->display_errors()); 
	            redirect($this->data['_cancel'].'/import');
			} 
			else {
				$file_data = $this->upload->data();
				$file_path =  './assets/uploads/csv/'.$file_data['file_name'];
				$many_lang = $this->comman_model->get('language',false);
				if ($this->csvimport->get_array($file_path)) {
					$csv_array = $this->csvimport->get_array($file_path);
					foreach($csv_array as $row){
						$post_data = array();
						$post_data['store_id'] = 0;
						$checkUser = $this->comman_model->get_by('users',array('email'=>$row['email']),false,false,true);
						if($checkUser){
							$checkStore = $this->comman_model->get_by('stores',array('user_id'=>$checkUser->id),false,false,true);
							if($checkStore){
								$post_data['store_id'] = $checkStore->id;
							}					
						}				
						$post_data['price'] 			= $row['price'];
						$post_data['discount_price']	= $row['discount'];
						$post_data['category_id'] 		= $row['category_id'];
						$post_data['sub_category_id']	= $row['sub_category_id'];
		
						$id = $this->comman_model->save('products',$post_data);
						if($many_lang){
							foreach($many_lang as $set_lang){		
								$post_lang_data = array(
										'product_id'=>$id,
										'language_id'=>$set_lang->id,
										'title'=>$row['name'],
										'body'=>$row['description']							
										);
										
								$this->comman_model->add('products_lang',$post_lang_data);
							}
						}
					}
					$this->session->set_flashdata('success','Data has successfully import'); 
			
				}				
				else {
					$this->session->set_flashdata('error','There is some problem in file.'); 
				}
	            redirect($this->data['_cancel'].'/import');
			}	
		}
		//$this->data['login'] = $this->session->all_userdata();
		
		$this->data['subview'] = $this->_subView.'upload_csv';
        $this->load->view('admin/_layout_main', $this->data);
	}

	function import2(){	
		$file_path =  'assets/1.csv';
		echo '<pre>';
		$many_lang = $this->comman_model->get('language',false);
		if ($this->csvimport->get_array($file_path)) {
			$csv_array = $this->csvimport->get_array($file_path);
			foreach($csv_array as $row){
				$post_data = array();
				$post_data['store_id'] = 0;
				$checkUser = $this->comman_model->get_by('users',array('email'=>$row['email']),false,false,true);
				if($checkUser){
					$checkStore = $this->comman_model->get_by('stores',array('user_id'=>$checkUser->id),false,false,true);
					if($checkStore){
						$post_data['store_id'] = $checkStore->id;
					}					
				}				
				$post_data['price'] 			= $row['price'];
				$post_data['discount_price']	= $row['discount'];
				$post_data['category_id'] 		= $row['category_id'];
				$post_data['sub_category_id']	= $row['sub_category_id'];

				$id = $this->comman_model->save('products',$post_data);
				if($many_lang){
					foreach($many_lang as $set_lang){		
						$post_lang_data = array(
								'product_id'=>$id,
								'language_id'=>$set_lang->id,
								'title'=>$row['name'],
								'body'=>$row['description']							
								);
								
						$this->comman_model->add('products_lang',$post_lang_data);
					}
				}
			}
		}
	}
}