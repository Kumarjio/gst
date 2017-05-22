<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dir extends Admin_Controller {
	public function __construct(){
		parent::__construct();
        $this->data['active']= 'General Settings';

	}
	
    public function index(){
		$this->checkPremission('is_general');
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],162);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';
		$this->form_validation->set_rules('admin_link', 'admin link', 'required');
        if($this->form_validation->run()==TRUE){
            //$data = $this->settings_model->array_from_post($this->settings_model->get_post_from_rules($rules)+array('footer_text','phone','address'));
            $data = $this->settings_model->array_from_post(array('admin_link'));
			if($this->data['admin_link']!=$data['admin_link']){
				$path = FCPATH;
				//$path = rtrim(FCPATH,'public_html/');
				$oldDir = $path.'/application/controllers/'.$this->data['admin_link'];
				$newDir = $path .'/application/controllers/'.$data['admin_link'];
				if(is_dir($oldDir)){
					if(rename($oldDir, $newDir)){
						$this->settings_model->save_settings($data);
			            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
					}
				}
				else{
					$this->session->set_flashdata('error',$this->data['admin_link'].' directory does not exist');
				}
				
			}
			else{
					$this->session->set_flashdata('error','Please insert another directory name.');
			}
            redirect('/admin_dir');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/dashboard/edit_dir';        
        $this->load->view('admin/_layout_main',$this->data);          	        
    }
	
	function checkPremission($type=false){
		$redirect = false;
		
		if($this->data['admin_details']->default=='0'){
			if($type=='is_general'){
				if($this->data['admin_details']->is_general==1){}
				else{
					$redirect = true;
				}
			}
			else if($type =='is_payment'){
				if($this->data['admin_details']->is_payment==1){}
				else{
					$redirect = true;
				}
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
	}


	

	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */