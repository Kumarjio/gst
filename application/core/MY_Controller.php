<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	public $data = array();
	function __construct()
	{
		parent::__construct();
        $this->data['site_name'] = config_item('site_name');
    }
} 

class Admin_Controller extends MY_Controller{
	public function __construct(){
    	parent::__construct();
		//date_default_timezone_set("Asia/Kolkata"); 
		date_default_timezone_set('GMT');		
//		date_default_timezone_set("Europe/London"); 
		$this->load->helper(array('url','date','form','cms','front','custom','language'));	
		$this->load->library(array('form_validation','session','cart'));
		$this->load->model(array('account_model','comman_model','admin_model','language_model','settings_model','custom_model'));
		$this->clear_cache();
        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');


        $this->data['settings'] = $this->settings_model->get_fields();
		$this->data['set_meta'] = '';	
		$this->data['name'] = '';	
		$this->data['active'] = 'home';	
		$this->data['active_sub'] = '';	
		$this->lang->load("admin","english");
		//seo _data
       	$this->data['seo_title'] = $this->data['settings']['meta_title'];
       	$this->data['seo_keywords'] = $this->data['settings']['keywords'];
       	$this->data['seo_description'] = $this->data['settings']['meta_description'];

		$this->data['title'] =$this->data['settings']['site_name'];

//		$this->data['admin_link'] = 'gadmin123';	
		$this->data['admin_link'] = $this->data['settings']['admin_link'];	


        $this->data['session_data'] = $this->session->all_userdata();
        if(isset($this->data['session_data']['admin_session']['id'])){
            $this->data['admin_details'] =  $this->comman_model->get_by('admin',array('id'=>$this->data['session_data']['admin_session']['id']),FALSE,FALSE,TRUE);
        }
		

		if(!isset($this->data['session_data']['adminLangSession'])){
			$lang_code = $this->language_model->get_default();
			$lang_id = $this->language_model->get_id($lang_code);
			$this->session->set_userdata('adminLangSession',array('lang_code'=>$lang_code,'lang_id'=>$lang_id));
		}
		else{
			$this->data['adminLangSession'] = $this->data['session_data']['adminLangSession'];
		}
		
		$exception_uris = array(
			$this->data['admin_link'].'/account/login', 
			$this->data['admin_link'].'/account/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			$logged_in = $this->session->userdata('admin_session');
			if((!isset($logged_in['loggedin']) || $logged_in['loggedin'] != true)){
				redirect($this->data['admin_link'].'/account/login','refresh');
			}
		}

        $this->data['print_lang_menu'] = $this->comman_model->get_query_array('SELECT * FROM language WHERE enabled=1');

    }

	
	function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
		
    }
} 


class Frontend_Controller extends MY_Controller{
	public function __construct(){
    	parent::__construct();
		//date_default_timezone_set("Asia/Kolkata"); 
		//date_default_timezone_set("Asia/Dubai"); 
		date_default_timezone_set("GMT"); 
		$this->load->library(array('form_validation','session','cart'));
        // Load stuff
        $this->load->model(array('comman_model','page_model','pages_model','language_model','settings_model','category_model','custom_model'));
		$this->load->helper(array('url','form','date','language','text','front','custom'));	
		$this->load->library(array('form_validation','session'));
        // Fetch navigation


        $this->data['session_data'] = $this->session->all_userdata();
		if(isset($this->data['session_data']['lang_sess_data'])){
            $this->data['lang_id'] = $this->data['session_data']['lang_sess_data']['lang_id'];
			
		}
		else{
            $this->data['lang_id'] = $this->language_model->get_default('id');
			$ses_lang = array('lang_id' => $this->data['lang_id']);
			//$total = $login['bonus_balance']+10;
			$this->session->sess_expiration = '14400'; 
			$this->session->set_userdata('lang_sess_data',$ses_lang);					

		}

        $this->data['lang_code'] = '';
        $this->data['lang_currency'] = $this->language_model->get_currency1($this->data['lang_id']);
		$this->data['lang_unit'] = $this->language_model->get_unit1($this->data['lang_id']);

        $this->data['settings'] = $this->settings_model->get_fields();

		if($this->data['settings']['website_active']==0){
			redirect('/offline/');
		}        

		
		$this->data['set_home_background'] = 'image';
		$this->data['home_background'] = $this->comman_model->get_by('home_setting',array('id'=>1),false,false,true);
		if($this->data['home_background'])
			$this->data['set_home_background'] = $this->data['home_background']->type;


		//menu
        //$this->data['top_menu'] = $this->pages_model->get_topmenu($this->data['lang_id']);		
		/*--- banner ---*/
		$this->data['top_banner'] = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'top'),'banner_id',true);
		$this->data['bottom_banner'] = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'bottom'),'banner_id',false);
		$this->data['right_banner'] = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'right'),'banner_id',false);
		$this->data['left_banner'] = $this->comman_model->get_lang('banners',$this->data['lang_id'],NULL,array('template'=>'left'),'banner_id',false);
		/*end of banner*/

		$this->db->order_by('order','asc');
		$this->data['top_menu'] = $this->comman_model->get_lang('page',$this->data['lang_id'],NULL,array('parent_id'=>0,'top_menu'=>1),'page_id',false);

		$this->db->order_by('order','asc');
		$this->data['bottom_menu'] = $this->comman_model->get_lang('page',$this->data['lang_id'],NULL,array('parent_id'=>0,'bottom_menu'=>1),'page_id',false);

		$this->db->order_by('order','asc');
        $this->data['sliders'] = $this->comman_model->get('sliders',false);		


        $this->data['print_lang_menu'] = $this->comman_model->get_query_array('SELECT * FROM language WHERE enabled=1');
//        $this->data['print_lang_menu'] = $this->language_model->get_array();

       	$this->data['seo_title'] = $this->data['settings']['meta_title'];
       	$this->data['seo_keywords'] = $this->data['settings']['keywords'];
       	$this->data['seo_description'] = $this->data['settings']['meta_description'];
		$this->data['title'] = $this->data['settings']['site_name'];	
		$this->data['set_meta'] = '';	
		$this->data['active'] = '';
		$this->data['search_home'] = false;
/*		echo '<pre>';
		print_r($this->data['session_data']);
		die;
*/

		
		if(isset($this->data['session_data']['user_session'])){
			$this->data['user_session'] = $this->data['session_data']['user_session'];
			if(isset($this->data['session_data']['user_session']['loginType'])){
				if($this->data['session_data']['user_session']['loginType']=='user'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$this->data['session_data']['user_session']['id']),FALSE,FALSE,TRUE);
					if(!$this->data['user_details']){
						$this->session->unset_userdata('user_session');						
					}
				}
			}
        }

		if(isset($this->data['session_data']['session_currency'])){
			$this->data['lang_currency'] = $this->data['session_data']['session_currency'];

        }

		if(isset($this->data['session_data']['chat_session'])){
			$this->data['user_chat'] = $this->data['session_data']['chat_session'];
		}	

    }

	function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");		
    }


} 

class User_Controller extends MY_Controller{
	public function __construct(){
    	parent::__construct();
		date_default_timezone_set("GMT"); 
		$this->load->library(array('form_validation','session','cart'));
        // Load stuff
        $this->load->model(array('comman_model','page_model','pages_model','language_model','settings_model','category_model'));
		$this->load->helper(array('url','form','date','language','text','front','custom'));	
		$this->load->library(array('form_validation','session'));
        // Fetch navigation
        $this->data['session_data'] = $this->session->all_userdata();
        $this->data['session_data'] = $this->session->all_userdata();
		if(isset($this->data['session_data']['lang_sess_data'])){
            $this->data['lang_id'] = $this->data['session_data']['lang_sess_data']['lang_id'];
			
		}
		else{
            $this->data['lang_id'] = $this->language_model->get_default('id');
			$ses_lang = array('lang_id' => $this->data['lang_id']);
			//$total = $login['bonus_balance']+10;
			$this->session->sess_expiration = '14400'; 
			$this->session->set_userdata('lang_sess_data',$ses_lang);					

		}

        $this->data['lang_code'] = '';
        $this->data['lang_currency'] = $this->language_model->get_currency1($this->data['lang_id']);
		$this->data['lang_unit'] = $this->language_model->get_unit1($this->data['lang_id']);

        $this->data['settings'] = $this->settings_model->get_fields();

		if($this->data['settings']['website_active']==0){
			redirect('/offline/');
		}        

		//static text
		$this->db->order_by('id','asc');
		$this->data['static_text'] = $this->comman_model->get_lang('static_text',$this->data['lang_id'],NULL,false,'static_text_id',false);


       	$this->data['seo_title'] = $this->data['settings']['meta_title'];
       	$this->data['seo_keywords'] = $this->data['settings']['keywords'];
       	$this->data['seo_description'] = $this->data['settings']['meta_description'];
		$this->data['title'] = $this->data['settings']['site_name'];	
		$this->data['set_meta'] = '';	
		$this->data['active'] = '';
		$this->data['table_jquery'] = false;

		$redirect = false;
		if(isset($this->data['session_data']['user_session'])){
			if(isset($this->data['session_data']['user_session']['loginType'])){
				if($this->data['session_data']['user_session']['loginType']=='user'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$this->data['session_data']['user_session']['id']),FALSE,FALSE,TRUE);
				}
				else{
					$redirect =true;
				}
				
			}
			else{
				$redirect =true;
			}
        }
		else{
			$redirect =true;
		}
		if($redirect){
			redirect('secure/login');
		}
    }

	function clear_cache(){
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");		
    }


}

?>