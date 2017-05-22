<?php
class Hair_question extends Admin_Controller{
	public $_table_names = 'hairs_quest';
	public $_subView = 'admin/hair_question/';
	public $_redirect = '/hair_question';
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
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],17000).'All Question';
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
            $this->data['products_option'] = $this->comman_model->get_by($this->_table_names.'_option',array('hair_id'=>$id), FALSE, FALSE, false);
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['products'] = $this->step_model->get_new_2();
	
        }

		$this->data['type'] = array(
								'step2'=>'Natural Shade (Step 2)',
								'step3'=>'Color & Chemical Treatments (step 3)',
								'step4'=>'About You (step4)',
								'step6'=>'Dyeing Details (step6)',
								'step7'=>'Hairstyle & Length (step7)',
							);
		$this->data['user_type']	= $this->custom_model->get_user_type();

        $rules = $this->step_model->s_rules2;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data =array();

			$post1 =array('name','type','user_type');
        	$data = $this->step_model->array_from_post($post1);

            if($id == NULL){
                $data['admin_id'] 		= $this->data['admin_details']->id;
                $data['on_date']		= date('Y-m-d');
                $data['date_time']		= date('Y-m-d H:i:s');
                $data['created_by']		= 'admin';
			}
			//file1

			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/hairs');
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
			$options_name = $this->input->post('options_name');
			$options_id = $this->input->post('options_id');
			$this->step_model->save_options($options_name,$options_id,$id);

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
		$this->db->delete($this->_table_names.'_option', array('hair_id'=>$id)); 
        redirect($this->data['_cancel']);
	}
    
}