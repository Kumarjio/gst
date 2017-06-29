<?php
class media extends Admin_Controller{
	public $_table_names = 'media';
	public $_subView = 'admin/media/';
	public $_redirect = '/media';
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
		//echo "hello world"; die;
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],17800).'Media';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->data['all_data'] = $this->comman_model->get_media($this->_table_names,false);
		//$all=$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
		//echo "<pre>";print_r($all);die;
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}


	function ajax_modal(){
		$output = array();
		$output['status']= 'error';
		$output['msge']= 'Please login first!!';
		$total = 0;
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$type = $this->input->post('type');
		
		if($type=='image'){
			
			$output['status']= 'ok';
			$output['msge']= '';
			$this->data['products'] = $this->comman_model->get_query("select * from media where type='jpg' or type='jpeg' or type='png' or type='gif'");
			
			$output['content'] = $this->load->view('admin/media/ajax_modal',$this->data,true);
			if(empty($output['content'])){
				$output['content'] ='';
			}
			
		}
		echo json_encode($output);
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
        	$data = $this->home_model->array_from_post(array('name'));


			//second image
			if (!empty($_FILES['logo1']['name'])){
                $config['upload_path']      = 'assets/images/';
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
                    $data['files']  = $upload_data['file_name'];
					$data['type']	 = $upload_data['image_type'];
                }

            }	
			else{
			}

/*			echo '<pre>';
			print_r($data);
			die;*/
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
	
		public function upload_media(){
					echo "hello world"; 
     
	}
	

	public function download($id = NULL){
		$this->load->helper('download');
		if(!$id){
			redirect($this->data['_cancel']);
		}
		$check = $this->comman_model->get_by($this->_table_names,array('id'=>$id),FALSE, FALSE,TRUE);
		if(!$check){
			redirect($this->data['_cancel']);
		}
		$data = file_get_contents('assets/images/'.$check->files);
		force_download($check->files,$data); 
		
	}
    
    public function delete($id){       
		if($id){
			$check = $this->comman_model->get_by($this->_table_names,array('id'=>$id),FALSE, FALSE,TRUE);
			if($check){
				$this->db->where('id', $id);
				$this->db->delete($this->_table_names);
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