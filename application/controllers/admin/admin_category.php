<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_category extends Admin_Controller {
	public $_table_names = 'admin_category';
	public $_subView = 'admin/admin_category/';
	public $_redirect = 'admin/admin_category';
	public $_msg_success = 'Category has successfully created.';
	public $_msg_update = 'Category has successfully updated.';
	public $_msg_delete = 'Category has successfully deleted.';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Employee Management';
        $this->load->model('admin_employee_model');

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        $this->data['_add'] = $this->_redirect.'/edit';
        $this->data['_edit'] = $this->_redirect.'/edit';
        $this->data['_view'] = $this->_redirect.'/view';
        $this->data['_cancel'] = $this->_redirect;
        $this->data['_delete'] = $this->_redirect.'/delete';

		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_employee==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect('admin/dashboard');
		}

        
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');
	}


	//  Landing page of admin section.
	function index(){
		$this->data['name'] = 'Category';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;
		$this->data['login'] = $this->session->all_userdata();	
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}


	
	public function edit($id = NULL){
	    // Fetch a page or set a new one
	    if($id){
            $this->data['categories'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			$this->data['name'] = 'Edit';
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
           	if(!$this->data['categories']){
				redirect($this->_redirect);
			}
        }
        else{
			$this->data['name'] = 'Create';
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->data['categories'] = $this->admin_employee_model->get_new_category();
        }
        
        
        // Process the form
        if($this->input->post('operation')){
            $data =array();
        	$data = $this->comman_model->array_from_post(array('name','desc'));
            if($id == NULL){
                $data['date'] = date('Y-m-d H:i:s');
			}
            if($id == NULL){
				$this->comman_model->save($this->_table_names,$data);
			}
			else{
				$this->comman_model->save($this->_table_names,$data,$id);
			}
            if($id == NULL)
				$this->session->set_flashdata('success',$this->_msg_success);
			else
				$this->session->set_flashdata('success',$this->_msg_update);				
			redirect($this->_redirect);
		}
        
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}
    

    public function _unique_email($str){
        
        $id = $this->uri->segment(4);
        $this->db->where('email', $this->input->post('email'));
        !$id || $this->db->where('id !=', $id);
        $categories = $this->comman_model->get('admin',false);        
        
        if(count($categories))
        {
            $this->form_validation->set_message('_unique_email', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }

    public function _unique_user($str){
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current categories
        
        $id = $this->uri->segment(4);
        $this->db->where('username', $this->input->post('username'));
        !$id || $this->db->where('id !=', $id);
        $categories = $this->comman_model->get('admin',false);        
        
        if(count($categories))
        {
            $this->form_validation->set_message('_unique_user', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }

	function delete($id = false){
		if(!$id){
			redirect($this->_redirect);
		}
		$checkEmployee = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
		if(!$checkEmployee){
			$this->session->set_flashdata('error','Sorry! You can not delete employee.'); 
			redirect($this->_redirect);		
		}
		$this->db->delete($this->_table_names,array('id'=>$id));
		$this->session->set_flashdata('success',$this->_msg_delete); 
		redirect($this->_redirect);		
	}
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */