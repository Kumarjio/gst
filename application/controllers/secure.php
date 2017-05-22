<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Secure extends Frontend_Controller{
	public $_subView = 'templates/account/';
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','date','string'));	
		$this->load->library(array('pagination','recaptcha'));
		$this->load->model(array('register_model'));
	}



	function checkValidateLogin(){
		$logged_in = $this->session->userdata('logged_in');
		if((isset($logged_in) || $logged_in == true)&& $logged_in == "user"){
			return true;
		}
		else{
			return false;
		}
	}

	function validateLogin(){
		$logged_in = $this->session->userdata('logged_in');
		if((isset($logged_in) || $logged_in == true)&& $logged_in != "user"){
			$this->session->set_flashdata('error', 'Please Login First.');
			redirect('secure/login','refresh');
		}
	}

	public function index(){
		redirect('/');
		
		$this->data['title'] = "Login | ".$this->data['site_name']->value;
		$this->data['active'] = "login";
		$this->data['login'] = $this->session->all_userdata();
		//$data['message'] = $this->session->flashdata('success');
        $this->data['subview'] = $this->_subView.'login';	
		$this->load->view('templates/_layout_main',$this->data);
	}

	
	function register(){
		$photos = array();
        $this->data['widget'] = $this->recaptcha->getWidget();
        $this->data['script'] = $this->recaptcha->getScriptTag();

		$this->data['set_meta'] = 'register';
		$this->data['active'] = "register";
		$this->data['title'] = show_static_text($this->data['lang_id'],1).' | '.$this->data['settings']['site_name'];
//		$this->data['country_data'] = array('United Kingdom');
		$this->data['country_data'] = $this->custom_model->get_country_name();
		$this->db->select('id, name');
		$this->data['cities_data'] = $this->comman_model->get('cities',false);
		$this->load->library('form_validation');

		$this->data['userTypes']= array('Customer','Company');
		
		$rules = $this->register_model->register;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('matches',show_static_text($this->data['lang_id'],213));
		$this->form_validation->set_message('is_unique',show_static_text($this->data['lang_id'],220));
		$this->form_validation->set_message('integer',show_static_text($this->data['lang_id'],221));
		$this->form_validation->set_message('required', show_static_text($this->data['lang_id'],219));
		
		if ($this->input->post('operation')){
			if ($this->form_validation->run() == FALSE){}
			else{
				$post_data = $this->comman_model->array_from_post(array('username','first_name','last_name','email','password','address','city','country','type'));
	    		$post_data['user_url'] = url_title($this->input->post('username'), 'dash', true);
				$post_data['dob']=$this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');

				$post_data['account_type'] = 'U';

				$dynamic_code =  random_string('alnum', 16);  
				$post_data['status'] = 1;
				$post_data['confirm'] = $dynamic_code;
/*				echo '<pre>';
				print_r($post_data);
				die;*/
				$checkEmail = $this->comman_model->get_by('users',array('email'=>$post_data['email']),false,false,false);
				if($checkEmail){
					$this->session->set_flashdata('error','Sorry! Email already exist.');
					redirect('secure/register');
				}
				$registerForm = $this->comman_model->save('users',$post_data);
				$email_data = $this->comman_model->get_by('email',array('id'=>1),false,false,true);
							
				$email_data->subject = str_replace('{site_name}', $this->data['settings']['site_name'], $email_data->subject);
				$email_data->subject = str_replace('{site_email}', $this->data['settings']['site_name'], $email_data->subject);

				$email_data->message = str_replace('{user_name}', $post_data['first_name'].' '.$post_data['last_name'], $email_data->message);
				$email_data->message = str_replace('{site_name}', $this->data['settings']['site_name'], $email_data->message);
				$email_data->message = str_replace('{site_email}', $this->data['settings']['site_email'], $email_data->message);
				$email_data->message = str_replace('{site_link}', base_url().'verify/user/'.$dynamic_code.'/'.md5($registerForm), $email_data->message);
				//$email_data-> = str_replace('{site_email}', $this->data['site_name']->value, $email_data->);

				$this->load->library('email');
				$config = array (
					  'mailtype' => 'html',
					  'charset'  => 'utf-8',
					  'priority' => '1'
					   );
				$this->email->initialize($config);
				$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
				$this->email->to($post_data['email']);
				$this->email->subject($email_data->subject);
				$this->email->message($email_data->message);
				$this->email->send();
				$this->session->unset_userdata('user_reg');
				$this->session->set_flashdata('success', show_static_text($this->data['lang_id'],216).'<br>'.show_static_text($this->data['lang_id'],217).'<br>('.show_static_text($this->data['lang_id'],218).')');

				redirect('secure/register');
			}
		}
        $this->data['subview'] = $this->_subView.'register';	
		//$this->load->view('templates/_layout_main',$this->data);
		$this->load->view($this->_subView.'register',$this->data);
	}


	function login(){
		$this->data['set_meta'] = 'login';
		$this->data['active'] = "login";
		$this->data['login'] = $this->session->all_userdata();
		$this->data['title'] = show_static_text($this->data['lang_id'],2).' | '.$this->data['settings']['site_name'];
		//$data['message'] = $this->session->flashdata('success');

        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');
		$rules = $this->register_model->page_login;
		$this->form_validation->set_rules($rules);
		if ($this->input->post('operation')){
			if ($this->form_validation->run() == TRUE){
			$send = array('email' => $this->input->post('email'),'password'=>$this->input->post('password'));
			$login = $this->comman_model->get_by('users',$send,false,false,true);
			if(!empty($login)){
				if($login->confirm!='confirm'){
					$this->session->set_flashdata('error',show_static_text($this->data['lang_id'],222));
					redirect('secure/login');
				}
				else if($login->status!=1){
					$this->session->set_flashdata('error',show_static_text($this->data['lang_id'],223));
					redirect('secure/login');
				}
				else if($login->admin_confirm!=1){
					$this->session->set_flashdata('error', 'Your email ID has not verified by admin.');
					redirect('secure/login');
				}
				else{
					$session_data = array(
							'loginType' => 'user',
						  	'loggedin' => true,				   
						   	'name' =>$login->username,
						   	'email' =>$login->email,
						   	'id' =>$login->id);				
					//$total = $login['bonus_balance']+10;
					$this->session->sess_expiration = '14400'; 
					$this->session->set_userdata('user_session',$session_data);					
/*					$this->session->set_flashdata('success', 'welcome To '.$login->username);*/
					if($login->account_type=='S'){
						redirect('serviceprovider','refresh');
				
					}
					else if($login->account_type=='U'){
						redirect('user','refresh');
				
					}
					else {
						redirect('/','refresh');
				
					}
				}
			}
			else{
				$this->session->set_flashdata('error', show_static_text($this->data['lang_id'],224));
				redirect('secure/login');
			}
			}
		}
        $this->data['subview'] = $this->_subView.'login';	
		//$this->load->view('templates/_layout_main',$this->data);
		$this->load->view($this->_subView.'login',$this->data);
	}

	

	function forgot(){	
		$this->data['active'] = "Forgot Password";
		$this->data['title'] = "Forgot Password | ".$this->data['settings']['site_name'];
		if($this->input->post('operation')){ 
			$send = array('email' => $this->input->post('email'));
			$login = $this->comman_model->get_by('users',$send,false,false,TRUE);
			if(!empty($login)){
				if($login->confirm!='confirm'){
					$this->session->set_flashdata('success', show_static_text($this->data['lang_id'],222));
					redirect('secure/forgot');
				}
				else{
					$your_message = 'Hello '.$login->first_name.' '.$login->last_name.' Your password is '.$login->password;
	
					$this->load->library('email');
					$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
					$this->email->to($this->input->post('email'));
					$this->email->subject("Forgot Password");			
					$this->email->message($your_message);
					$this->email->send();
					//end varify
					$this->session->set_flashdata('success',show_static_text($this->data['lang_id'],225));
					redirect('secure/forgot');
				}
			}
			else{
				$this->session->set_flashdata('error',show_static_text($this->data['lang_id'],226));
				redirect('secure/forgot');
			}
		}
        $this->data['subview'] = $this->_subView.'forgot';	
		$this->load->view('templates/account/forgot',$this->data);
	}
	

    public function _check_code($str){
		$recaptcha = $this->input->post('g-recaptcha-response');
		if (!empty($recaptcha)) {
			$response = $this->recaptcha->verifyResponse($recaptcha);
			if (isset($response['success']) and $response['success'] === true) {
	            return true;
			}
		}
            $this->form_validation->set_message('_check_code', 'Field required');
            return FALSE;
    }

/*    public function _check_code($str){
		@session_start();
		$check = $this->input->post('code');
		if(empty($_SESSION['6_letters_code'])||strcasecmp($_SESSION['6_letters_code'], $this->input->post('code')) != 0){
            $this->form_validation->set_message('_check_code', 'The captcha code does not match');
            return FALSE;
        }
            return true;
    }*/

    public function _unique_user($str){
        $this->db->where('username', $this->input->post('username'));
        $categories = $this->comman_model->get('users',true);        
        if(count($categories)){
            $this->form_validation->set_message('_unique_user', '%s already exist');
            return FALSE;
        }
        
        return TRUE;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */