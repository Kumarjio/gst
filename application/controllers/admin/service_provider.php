<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Service_provider extends Admin_Controller {
	public $_table_names = 'users';
	public $_subView = 'admin/service_provider/';
	public $_redirect = '/service_provider';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Service Provider';
        $this->load->model(array('users_model'));
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
		$this->data['services_data'] = array('Hotel'=>'Hotel' , 'Flight'=>'Flight' , 'Car Hire'=>'Car Hire' , 'Holiday'=>'Holiday' , 'Hajj'=>'Hajj' , 'Umrah'=>'Umrah');

		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_user==1){}
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
	

	//  Landing page of admin section.
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1708).'Service Provider';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;

		$this->data['all_data'] = $this->comman_model->get_by($this->_table_names,array('account_type'=>"S"),false,false,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}

	function set_user($id){
		if(!$id)
			redirect($this->data['_cancel']);

		$this->comman_model->save($this->_table_names,array('confirm'=>'confirm'),$id);
		redirect($this->data['_cancel']);		
	}




	function get_status(){
		$id = $this->input->post('id');
		$post_data = array('status'=>$this->input->post('status'));
		$result = $this->comman_model->save($this->_table_names,$post_data,$id);
	}

	
	function create(){
		$this->data['name'] = show_static_text($this->data['lang_id'],257);
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
	
			$tags = new stdClass();
			//$tags->parent_id = 0;
			$tags->first_name 		= '';
			$tags->last_name 		= '';
			$tags->username			= '';
			$tags->type = '';
			$tags->email = '';
			$tags->address = '';
			$tags->city = '';
			$tags->country = '';
			$tags->phone =$tags->services = '';
			$tags->password = '';
			$tags->gps = '51.5074, 0.1278';
			$this->data['users'] =$tags;

		


		$this->data['country_data'] = $this->custom_model->get_country_name();


		$this->form_validation->set_rules('first_name', 'Name', 'trim|required|');
		$this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

        if($this->form_validation->run()==TRUE){

            $post_data =$this->comman_model->array_from_post(array('first_name','last_name','type','email','address','phone','password','city','country','gps')); 
//			$post_data['user_url'] = url_title($this->input->post('username'), 'dash', true);
			$post_data['account_type'] = 'S';

			$post_data['username'] = $post_data['first_name'].' '.$post_data['last_name'];

			$gpsEx = explode(', ',$post_data['gps']);
			if($gpsEx){
		    	$post_data['lat'] = $gpsEx[0];
		    	$post_data['lng'] = $gpsEx[1];
			}


			if($this->input->post('services')){
				$post_data['services']= implode(', ',$this->input->post('services'));
			}
			else{
				$post_data['services']= '';
			}

			$post_data['created_by'] ='admin';
			$post_data['status'] = 1;
			$post_data['confirm'] ='confirm';
/*			echo '<pre>';
			print_r($post_data);
			die;*/
            $this->comman_model->save('users',$post_data);
            $this->session->set_flashdata('success','User has successfully created.');
            redirect($this->data['_cancel']);
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = $this->_subView.'create';        
        $this->load->view('admin/_layout_main',$this->data);       
   	}
	
	function edit($id=NULL){
		$this->data['name'] = show_static_text($this->data['lang_id'],254);
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
	    if(!$id){
            redirect($this->data['_cancel']);
		}
		$this->data['users'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id,'account_type'=>'S'), FALSE, FALSE, true);
	    if(!$this->data['users'] ){
            redirect($this->data['_cancel']);
        }
		


		$this->data['country_data'] = $this->custom_model->get_country_name();


		$this->form_validation->set_rules('first_name', 'Name', 'trim|required|');
		$this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run()==TRUE){

            $post_data =$this->comman_model->array_from_post(array('first_name','last_name','address','phone','password','city','country','gps')); 

			$post_data['username'] = $post_data['first_name'].' '.$post_data['last_name'];
			$gpsEx = explode(', ',$post_data['gps']);
			if($gpsEx){
		    	$post_data['lat'] = $gpsEx[0];
		    	$post_data['lng'] = $gpsEx[1];
			}


			if($this->input->post('services')){
				$post_data['services']= implode(', ',$this->input->post('services'));
			}
			else{
				$post_data['services']= '';
			}

/*			echo '<pre>';
			print_r($post_data);
			die;*/
            $this->comman_model->save('users',$post_data,$id);
            $this->session->set_flashdata('success','User has successfully updated.');
            redirect($this->data['_cancel'].'/edit/'.$id);
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = $this->_subView.'edit';        
        $this->load->view('admin/_layout_main',$this->data);       
   	}

	
	
	function delete($id = false){
		if(!$id){
			redirect($this->data['_cancel']);
		}

		//$this->comman_model->update('categories',array('parent_id'=>0),array('parent_id'=>$id));
		$this->comman_model->delete_by_id('problems',array('user_id'=>$id));
		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));

		$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],297)); 
		redirect($this->data['_cancel']);		

	}
	//function send_mail(){}
	function send_mail($id =false){
		if(!$id){
            redirect($this->data['_cancel']);			
		}
		
	
		$checkUser = $this->comman_model->get_by('users',array('id'=>$id),false,false,true);
		if(!$checkUser){
			$this->session->set_flashdata('error','There is no user!!');
            redirect($this->data['_cancel']);			
			
		}

		$email_data = $this->comman_model->get_by('email',array('id'=>3),false,false,true);
				
		$email_data->subject = str_replace('{site_name}', $this->data['settings']['site_name'], $email_data->subject);
		$email_data->subject = str_replace('{site_email}', $this->data['settings']['site_name'], $email_data->subject);
		
		$email_data->message = str_replace('{user_name}', $checkUser->first_name.' '.$checkUser->last_name, $email_data->message);
		$email_data->message = str_replace('{user_email}', $checkUser->email, $email_data->message);
		$email_data->message = str_replace('{password}', $checkUser->password, $email_data->message);
		$email_data->message = str_replace('{site_name}', $this->data['settings']['site_name'], $email_data->message);
		$email_data->message = str_replace('{site_email}', $this->data['settings']['site_email'], $email_data->message);
		$email_data->message = str_replace('{login_link}', base_url(), $email_data->message);
		//$email_data-> = str_replace('{site_email}', $this->data['site_name']->value, $email_data->);
		//echo $checkUser->email.' '.$this->data['settings']['site_email'];die;
		//echo $email_data->message;die;
		$this->load->library('email');
		$config12 = array (
		  'mailtype' => 'html',
		  'charset'  => 'utf-8',
		  'priority' => '1'
		   );
		$this->email->initialize($config12);
		//echo $email_data->subject;

		$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
		$this->email->to($checkUser->email);
		$this->email->subject($email_data->subject);
		$this->email->message($email_data->message);
		
/*		$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
		$this->email->to('pvsysgroup01@gmail.com');
		$this->email->subject('asdasdas');
		$this->email->message($email_data->message);*/

		if($this->email->send()){
			$this->session->set_flashdata('success','mail has successfully sent!!');
		}
		else{
			$this->session->set_flashdata('error','There is some problem to sent mail!!');
		}
		redirect($this->data['_cancel']);			
	}
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

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */