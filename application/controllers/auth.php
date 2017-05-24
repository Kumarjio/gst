<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library(array('google_api/google','facebook','session'));
		$this->load->model('comman_model');
		$this->load->model('language_model');
        $this->load->helper('url');
        // To use site_url and redirect on this controller.
        $this->data['lang_code'] = $this->language_model->get_default();
        $this->data['lang_id'] = $this->language_model->get_id($this->data['lang_code']);

	}
	
	public function index(){
		//$this->session->sess_destroy();
		$google_oauthV2 = $this->google->Google_Oauth2Service();
		$token = $this->session->userdata('token');
		if(isset($token)&&!empty($token)){
			$this->google->setAccessToken($token);
		}
		if($this->google->getAccessToken()){
			  //For logged in user, get details from google using access token
			$user_profile = $google_oauthV2->userinfo->get();
			$check_user = $this->comman_model->get_by('users',array('email'=>$user_profile['email']),false,false,true);
			if(count($check_user)){
				$session_data = array(
						'loginType' => 'user',
						'loggedin' => true,				   
						'name' =>$check_user->username,
						'email' =>$check_user->email,
						'id' =>$check_user->id);				
				//$total = $login['bonus_balance']+10;
				$this->session->set_userdata('user_session',$session_data);					
			}
			else{
				$register = array(
								'first_name'=>$user_profile['given_name'],
								'last_name'=>$user_profile['family_name'],
								'username'=>$user_profile['name'],
								'email'=>$user_profile['email'],
							   	'status' =>1,
							   	'user_type' =>'free',
							   	'confirm' =>'confirm',
								);
				$user_id = $this->comman_model->add('users',$register);
				$login = $this->comman_model->get_by('users',array('id'=>$user_id),false,false,true);	
				$session_data = array(
						'loginType' => 'user',
						'loggedin' => true,				   
						'name' =>$login->username,
						'email' =>$login->email,
						'id' =>$login->id);				
				//$total = $login['bonus_balance']+10;
				$this->session->set_userdata('user_session',$session_data);					
			}
			redirect($this->data['lang_code'].'/user/','refresh');
		}
	}
	
	public function google_session(){
		$this->google->Google_Oauth2Service();
        if($this->input->get('code')){
			$this->google->authenticate($this->input->get('code'));
			$token = $this->google->getAccessToken();
			$this->session->set_userdata('token',$token);
			redirect('auth');
        }
        else
        {
			$authUrl = $this->google->createAuthUrl();
			redirect($authUrl);	
		}
	}

	public function fb_session(){
		$user = $this->facebook->getUser();        
        if ($user) {
            try {
                $user_profile = $this->facebook->api('/me');
            } catch (FacebookApiException $e) {
                $user = null;
            }
			$check_user = $this->comman_model->get_by('users',array('email'=>$user_profile['email']),false,false,true);
			if(count($check_user)){
				$session_data = array(
						'loginType' => 'user',
						'loggedin' => true,				   
						'name' =>$check_user->username,
						'email' =>$check_user->email,
						'id' =>$check_user->id);				
				//$total = $login['bonus_balance']+10;
				$this->session->set_userdata('user_session',$session_data);					
			}
			else{
				$register = array(
								'first_name'=>$user_profile['first_name'],
								'last_name'=>$user_profile['last_name'],
								'username'=>$user_profile['name'],
								'email'=>$user_profile['email'],
							   	'user_type' =>'free',
							   	'status' =>1,
							   	'confirm' =>'confirm',
								);
				$user_id = $this->comman_model->add('users',$register);
				$login = $this->comman_model->get_by('users',array('id'=>$user_id),false,false,true);	
				$session_data = array(
						'loginType' => 'user',
						'loggedin' => true,				   
						'name' =>$login->username,
						'email' =>$login->email,
						'id' =>$login->id);				
				//$total = $login['bonus_balance']+10;
				$this->session->set_userdata('user_session',$session_data);					
			}
			redirect($this->data['lang_code'].'/user/');
        }else{
            $this->facebook->destroySession();
        }
		if(!$user){
			$authUrl = $this->facebook->getLoginUrl(array(
				'redirect_uri' => site_url('auth/fb_session'), 
				'scope' => array("email") // permissions here
			));
			redirect($authUrl);
		}
	}
}

