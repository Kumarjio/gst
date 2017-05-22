<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends Admin_Controller {
	public function __construct(){
		parent::__construct();
        $this->data['active']= 'General Settings';

	}
    public function index(){
        $this->data['subview'] = 'admin/dashboard/index';
        $this->load->view('admin/_layout_main',$this->data);
        
    }
    

	function set_lang(){
		$msge = array();
		$msge['result']= 'error';
		$msge['msg']= 'login_error';		
		$id = $this->input->post('id');
		if($id){
			$check_lang = $this->comman_model->get_by('language',array('id'=>$id),false,false,true);
			if($check_lang){
				$this->session->set_userdata('adminLangSession',array('lang_code'=>$check_lang->code,'lang_id'=>$check_lang->id));
			}
		}
		echo json_encode($msge);
	}


    public function remove_image($id=false){
		$id = $this->input->post('id');
		
		$this->db->where(array('field'=>'logo'));
		$this->db->update('setting', array('value'=>''));
/*		$msge['result']= 'success';
		echo json_encode($msge);*/

		redirect($this->data['admin_link'].'/account/setting');
		/*$file_dir ='assets/uploads/home/'.$file_name->image; 
		if(is_file($file_dir)){
			unlink($file_dir);
		}
*/	}

	public function login(){
		$this->data['title'] = 'Admin Login';
	    $dashboard = $this->data['admin_link'].'/dashboard';
        $this->account_model->loggedin() == FALSE||redirect($dashboard);
        
		$rules = $this->account_model->rules;
		$this->form_validation->set_rules($rules);
		if($this->form_validation->run()==TRUE){
			if($this->account_model->login()==TRUE){
			    redirect($dashboard);			    
			}
            else{
                $this->session->set_flashdata('error','Invalid username or password.');
                redirect($this->data['admin_link'].'/account/login');
            }
		}
		$this->data['subview'] = 'admin/user/login';
		$this->load->view('admin/login',$this->data);
	}
	

	public function logout(){
	    $this->account_model->logout();
	    @session_start();
		session_destroy();
        redirect($this->data['admin_link'].'/account/login');		
	}
    

    public function _check_old_password($str){
		$login = $this->session->all_userdata();
		$check = $this->comman_model->get_by('admin',array('id'=>$login['admin_session']['id'],'password'=>md5($this->input->post('old_password'))),false,false,true);
        if(!count($check)){
            $this->form_validation->set_message('_check_old_password',show_static_text($this->data['adminLangSession']['lang_id'],212));
            return FALSE;                    
        }
        return TRUE;
    }



	public function change_password(){			
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],50);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active_sub']= 'email';
		$login = $this->session->all_userdata();

		$this->form_validation->set_message('matches',show_static_text($this->data['adminLangSession']['lang_id'],213));
		$rules = $this->account_model->rules_password;
		$this->form_validation->set_rules($rules);
		if ($this->form_validation->run()==TRUE){
			$this->comman_model->save('admin',array('password'=>md5($this->input->post('password'))),$login['admin_session']['id']);
			$this->session->set_flashdata('success', show_static_text($this->data['adminLangSession']['lang_id'],214)); 
			redirect($this->data['admin_link'].'/account/change_password');
		}
        $this->data['edit_data'] = $this->comman_model->get_by('admin',array('id'=>$login['admin_session']['id']),FALSE,FALSE,TRUE);

        $this->data['subview'] = 'admin/dashboard/password';
        $this->load->view('admin/_layout_main',$this->data);               
	}

	function dashboard(){
		$this->check_lang();		
		$this->validateLogin();
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],80);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['active'] = 'home';	
        $this->data['subview'] = 'admin/dashboard/index';	
		$this->load->view('admin/_layout_main',$this->data);
	}
	

	function background(){
		$this->checkPremission('is_general');
		$this->load->library('image_lib');
        $this->data['name'] = 'Background Image';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';
		if ($this->input->post('operation')){
            //$data = $this->settings_model->array_from_post($this->settings_model->get_post_from_rules($rules)+array('footer_text','phone','address'));
            $data = array();
            if(!empty($_FILES['logo']['name'])){
                $config['upload_path']      = 'assets/uploads/sites/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '60000';
                $config['max_width']        = '5000';
                $config['max_height']       = '5000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo')){
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['background']  = $upload_data['file_name'];
					$this->image_lib->clear();
                }

            }else{
                $data['background']  = $this->data['settings']['logo'];
            }      
	        $this->settings_model->save_settings($data);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
            redirect($this->data['admin_link'].'/account/background');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/dashboard/background';
        $this->load->view('admin/_layout_main',$this->data);       
	}
	
	function setting(){
		$this->checkPremission('is_general');
		$this->load->library('image_lib');
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],162);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';
        $rules = $this->settings_model->setting_rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==TRUE){
            //$data = $this->settings_model->array_from_post($this->settings_model->get_post_from_rules($rules)+array('footer_text','phone','address'));
            $data = $this->settings_model->array_from_post(array_merge($this->settings_model->get_post_from_rules($rules),array('phone','address','gps','website_active','website_desc','analytic_code')));
            if(!empty($_FILES['logo']['name'])){
                $config['upload_path']      = 'assets/uploads/sites/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '60000';
                $config['max_width']        = '5000';
                $config['max_height']       = '5000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo')){
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['logo']  = $upload_data['file_name'];
					$this->image_lib->clear();
                }

            }else{
                $data['logo']  = $this->data['settings']['logo'];
            }      
	        $this->settings_model->save_settings($data);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
            redirect($this->data['admin_link'].'/account/setting');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/dashboard/setting';        
        $this->load->view('admin/_layout_main',$this->data);       
    }

	function socialnetwork(){
		$this->checkPremission('is_general');
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],188);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';
		$this->form_validation->set_rules('google', 'Google', 'trim');
		$this->form_validation->set_rules('facebook', 'Facebook', 'trim');
		$this->form_validation->set_rules('twitter', 'twitter', 'trim');
		$this->form_validation->set_rules('instagram_url', 'Instagram', 'trim');
		$this->form_validation->set_rules('skype_id', 'Skype', 'trim');
		$this->form_validation->set_rules('linkedin', 'Linkedin', 'trim');
        if($this->form_validation->run()==TRUE){
	        $data = $this->settings_model->array_from_post(array('linkedin_url','youtube_url','twitter_url','facebook_url','google_plus','skype_id','instagram_url'));
	        $this->settings_model->save_settings($data);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            redirect($this->data['admin_link'].'/account/socialnetwork');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/dashboard/social';        
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

	function email(){
		$this->checkPremission('is_general');
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],163);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active_sub']= 'email';
        $this->data['all_data'] = $this->comman_model->get('email',FALSE);
        $this->data['subview'] = 'admin/email/index';        
        $this->load->view('admin/_layout_main',$this->data);               
    }
	
	function edit_email($id= false){
		$this->checkPremission('is_general');
		$this->load->model('email_model');
        $this->data['name']= 'Email Settings';
        $this->data['active_sub']= 'email';
        if(!$id){
            redirect($this->data['admin_link'].'/account/email');
           
        }
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        
        $edit_data = $this->comman_model->get_by('email',array('id'=>$id),FALSE,FALSE,TRUE);
        if(count($edit_data)==0){
           redirect($this->data['admin_link'].'/account/email');
        }
        $this->data['edit_data'] =$edit_data;
        $setting_rules = $this->email_model->email_rules;
        $this->form_validation->set_rules($setting_rules);
        if($this->form_validation->run()==TRUE){
            $post_data = array('value'=>$this->input->post(''));
            $post_data =$this->comman_model->array_from_post(array('subject','message')); 
            $this->comman_model->save('email',$post_data,$id);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            redirect($this->data['admin_link'].'/account/email');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/email/edit';        
        $this->load->view('admin/_layout_main',$this->data);       
    }	
	
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */