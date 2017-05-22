<?php
class Hair_desired extends Admin_Controller{
	public $_table_names = 'hair_image';
	public $_subView = 'admin/hair_desired/';
	public $_redirect = '/hair_desired';
    public $_current_revision_id;
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Step Management';
        $this->load->model(array('step_model'));
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
		$this->data['table'] = true;
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],17000)."Hair Desired Color";
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['all_data'] =$this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';
		$this->load->view('admin/_layout_main',$this->data);

	}

    public function edit($id = NULL){
		$all_session =$this->session->all_userdata();
	    // Fetch a page or set a new one
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

			$this->data['products']  = $this->comman_model->get_by($this->_table_names,array('id'=>$id),false,false,true);
			if(!$this->data['products']){
	            redirect($this->data['_cancel']);				
			}
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['products'] = $this->step_model->get_new_desired();
	
        }

		$this->db->order_by('name','asc');
		$this->data['hair_data'] = $this->comman_model->get('hair_profile',false);
		$this->data['hair_type'] = array(					
								"Light Blondes"		=> "Light Blondes",
								"Lightest Blondes"	=> "Lightest Blondes",
                                "Medium Blondes"	=> "Medium Blondes",
                                "Dark Blondes"		=> "Dark Blondes",                                
                                "Light Browns"		=> "Light Browns",
                                "Medium Browns"		=> "Medium Browns",
                                "Dark Browns"		=> "Dark Browns",
                                "Darkest Browns"	=> "Darkest Browns",                                
                                "Soft Blacks"		=> "Soft Blacks",
						);
        $rules = $this->step_model->s_rules4;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();

			$post1 =array('name','description','hair_id','hair_type');
        	$data = $this->step_model->array_from_post($post1);

            if($id == NULL){
                $data['admin_id'] 		= $this->data['admin_details']->id;
                $data['on_date']		= date('Y-m-d H:i:s');
                $data['on_datetime']	= date('Y-m-d');
                $data['created_by']		= 'admin';
			}
			//file1
			$this->load->library('image_lib');

			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/hair_image');
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
			$this->image_lib->clear();
			if (!empty($_FILES['s_image']['name'])){					
				$result =$this->comman_model->do_upload('s_image','./assets/uploads/hair_image');
				if($result[0]=='error'){
					$this->session->set_flashdata('error',$result[1]); 
				}
				else if($result[0]=='success'){
					$data['short_image'] = $result[1];
				}
			}	
			else{
				 if($id != NULL)$data['short_image'] = $this->data['products']->short_image;
			}
			
/*			echo '<pre>';
			print_r($data);
			die;*/

            $id = $this->comman_model->save($this->_table_names,$data,$id);	
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
        
    public function delete($id){       
		$this->db->delete($this->_table_names, array('id'=>$id)); 
        redirect($this->data['_cancel']);
	}
    
}