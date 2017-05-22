<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_list extends Admin_Controller {
	public $_table_names = 'users';
	public $_subView = 'admin/user/';
	public $_redirect = 'admin/users_list';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Users List';
    }
	

	//  Landing page of admin section.
	function index(){
		$this->data['title'] = 'Users | '.$this->data['site_name']->value;
		$this->data['name'] = 'Users';
		$this->data['login'] = $this->session->all_userdata();	
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}


	function add(){	
		$image = NULL;
		$this->data['name'] = 'Create User';
		$this->data['title'] = 'Create | '.$this->data['site_name']->value;

		$rules = $this->admin_model->user_rules;
		$this->form_validation->set_rules($rules);
		if ($this->input->post('operation')){
			if ($this->form_validation->run() == FALSE){}
			else{
				//upload photo
				$post_data= $this->comman_model->array_from_post(array('username','email','password'));
				$post_data['created_by'] = 'admin';
				$post_data['user_type'] = 'free_user';
				$post_data['confirm'] = 'confirm';
				
				if(!empty($_FILES['photo']['name'])){
					//echo $_FILES['photo'.$i]['name'];
					$result =$this->comman_model->do_upload('photo','./assets/uploads/users');
					if($result[0]=='error'){
						$this->session->set_flashdata('error',$result[1]); 
						redirect('admin/users/add');
					}
					else if($result[0]=='success'){
						$image = $result[1];
					}
				}			

				$post_data['image']= $image;
				$registerForm = $this->comman_model->save($this->_table_names,$post_data);
				$this->session->set_flashdata('success', 'User has successfully created.');
				redirect($this->_redirect);
			}
		}
		//$this->data['login'] = $this->session->all_userdata();
        $this->data['subview'] = $this->_subView.'add';
		$this->load->view('admin/_layout_main',$this->data);
	}

	function edit($id= false){
		$this->data['name'] = 'Edit';	
        if(!$id){
            redirect($this->_redirect);
           
        }
        $this->data['title'] ='Edit | '.$this->data['site_name']->value;
        
        $edit_data = $this->comman_model->get_by($this->_table_names,array('id'=>$id),FALSE,FALSE,TRUE);
        if(count($edit_data)==0){
           redirect($this->_redirect);
        }
		$this->form_validation->set_rules('username', 'Username', 'trim|required|');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
        if($this->form_validation->run()==TRUE){
			if (!empty($_FILES['photo']['name'])){					
				$result =$this->comman_model->do_upload('photo','./assets/uploads/users');
				if($result[0]=='error'){
					$this->session->set_flashdata('error',$result[1]); 
					redirect($this->_redirect.'/edit/'.$id);
				}
				else if($result[0]=='success'){
					$image = $result[1];
				}
			}	
			else{
				$image = $edit_data->image;
			}

            $post_data =$this->comman_model->array_from_post(array('username','password')); 
			$post_data['image']= $image;
            $this->comman_model->save($this->_table_names,$post_data,$id);
            $this->session->set_flashdata('success','User has successfully updated.');
            redirect($this->_redirect);
        }
        
        $this->data['edit_data'] =$edit_data;
		$this->data['categories'] = $this->comman_model->get_by('categories',array('parent_id'=>0),false,false,false);		
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = $this->_subView.'edit';        
        $this->load->view('admin/_layout_main',$this->data);       
    }	

	function get_status(){
		$id = $this->input->post('id');
		$post_data = array('status'=>$this->input->post('status'));
		$result = $this->comman_model->save($this->_table_names,$post_data,$id);
	}

	

	function delete($id = false){
		if(!$id){
			redirect($this->_redirect);
		}

		//$this->comman_model->update('categories',array('parent_id'=>0),array('parent_id'=>$id));
/*		$this->comman_model->delete_by_id('likes',array('user_id'=>$id));
		$this->comman_model->delete_by_id('comments',array('user_id'=>$id));
		$this->comman_model->delete_by_id('forums',array('user_id'=>$id));*/
		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));
		$this->comman_model->delete_by_id('coupon_save',array('user_id'=>$id));
		$this->comman_model->delete_by_id('website_favorite',array('user_id'=>$id));
		$this->comman_model->delete_by_id('website_rating',array('user_id'=>$id));
		$this->comman_model->delete_by_id('coupon_requests',array('user_id'=>$id));
		$this->comman_model->delete_by_id('coupon_comment',array('user_id'=>$id));

		$this->session->set_flashdata('success','User has successfully deleted.'); 
		redirect($this->_redirect);		

	}
	function send_mail(){		
		$this->data['name'] = 'Send Mail';	
        $this->data['title'] ='Send Mail | '.$this->data['site_name']->value;        

		//$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
        if($this->form_validation->run()==TRUE){
	        if ($this->input->post('operation')){
				$post_data= $this->comman_model->array_from_post(array('subject','message'));
				$post_data['email'] = serialize($this->input->post('email'));

				$this->load->library('email');
				$config = array (
					  'mailtype' => 'html',
					  'charset'  => 'utf-8',
					  'priority' => '1'
					   );
				$this->email->initialize($config);
				$this->email->from($this->data['site_email']->value, $this->data['site_name']->value);
				$this->email->to($this->input->post('email'));
				$this->email->subject($this->input->post('subject'));
				$this->email->message($this->input->post('message'));
				$this->email->send();
				$this->session->set_flashdata('success', 'Mail has successfully sent.');
				redirect($this->_redirect);
			}
		}
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = $this->_subView.'mail_form';        
        $this->load->view('admin/_layout_main',$this->data);       
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */