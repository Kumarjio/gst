<?php
class Newsletter extends Admin_Controller{
	public $_table_names = 'news';
	public $_subView = 'admin/newsletters/';
	public $_redirect = '/newsletter';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Newsletter Management';
        $this->load->model('comman_model');
        $this->load->model('news_model');

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');
	}
    
    public function index(){
		//$this->data['table'] = true;
		$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],9);
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['table'] = true;

		$this->data['all_data'] = $this->comman_model->get('news',false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}

	
    public function send_mail($id=false){
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],25400).'Send';
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['news'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			if(!$this->data['news']){
	            redirect($this->data['_cancel'].'');
			}
        }
        else
        {
			redirect($this->data['_cancel'].'');
        }
        
		
	    // Fetch a page or set a new one
		$this->data['name'] = 'News Data';
		$this->data['title'] = 'Edit | '.$this->data['settings']['site_name'];
        // Set up the form
        $rules = $this->news_model->email_rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){            
            $data =array();
        	$data = $this->news_model->array_from_post(array('subject','desc'));
			$user_email = $this->input->post('email');
			$this->load->library('email');
			$config = array (
				  'mailtype' => 'html',
				  'charset'  => 'utf-8',
				  'priority' => '1'
				   );
			$this->email->initialize($config);
			$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
			$this->email->to($user_email);
			$this->email->subject($data['subject']);
			$this->email->message($data['desc']);
			if($this->email->send()){
				$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],298));
			}
			else{
				$this->session->set_flashdata('error',show_static_text($this->data['adminLangSession']['lang_id'],200));
			}
            redirect($this->data['_cancel'].'/send_mail/'.$id);
		}
        
        // Load the view
		$this->data['subview'] = $this->_subView.'send_mail';
        $this->load->view('admin/_layout_main', $this->data);	
	}
	
	
    public function test_email($id=false){
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],25400).'Send';
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
            $this->data['news'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
			if(!$this->data['news']){
	            redirect($this->data['_cancel'].'');
			}
        }
        else
        {
			redirect($this->data['_cancel'].'');
        }
        
		
	    // Fetch a page or set a new one
		$this->data['name'] = 'Test';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        // Set up the form

		$rules = array(
                    'email' =>array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email'),
                    ); 
        $this->form_validation->set_rules($rules);

        if($this->form_validation->run() == TRUE){            
            $data =array();
        	$data = $this->news_model->array_from_post(array('subject','desc'));
			$user_email = $this->input->post('email');
			$this->load->library('email');
			$config = array (
				  'mailtype' => 'html',
				  'charset'  => 'utf-8',
				  'priority' => '1'
				   );
			$this->email->initialize($config);
			$this->email->from($this->data['settings']['site_email'], $this->data['settings']['site_name']);
			$this->email->to($user_email);
			$this->email->subject($data['subject']);
			$this->email->message($data['desc']);
			if($this->email->send()){
				$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],298));
			}
			else{
				$this->session->set_flashdata('error',show_static_text($this->data['adminLangSession']['lang_id'],200));
			}
            redirect($this->data['_cancel'].'/test_email/'.$id);
		}
        
        // Load the view
		$this->data['subview'] = $this->_subView.'test_email';
        $this->load->view('admin/_layout_main', $this->data);	
	}

	public function duplicate($id = NULL){

	    // Fetch a page or set a new one
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['news'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
            count($this->data['news']) || $this->data['errors'][] = 'User could not be found';            
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['news'] = $this->news_model->get_new();
        }
        

       
		// Pages for dropdown
        $this->data['pages_no_parents'] = $this->news_model->get_no_parents($this->data['content_language_id']);
        $this->data['page_languages'] = $this->language_model->get_form_dropdown('language');
        $this->data['templates_page'] = $this->news_model->get_templates('page_');
        
        // Fetch all files by repository_id
        // Set up the form
        $rules = $this->news_model->email_rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            
            $data =array();
        	$data = $this->news_model->array_from_post(array('subject','desc'));
			$user_email = $this->input->post('email');
		//	$data['user_id']= serialize($this->input->post('email'));
        //    $data = $this->news_model->array_from_post(array('template', 'parent_id','menu_location'));
			$data['order'] = $this->news_model->max_order()+1;


            $id = $this->comman_model->save($this->_table_names,$data);
			
			if(empty($this->data['news']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            
            redirect($this->data['_cancel'].'/');
        }
        
        // Load the view
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}

	public function edit($id = NULL){
	    // Fetch a page or set a new one
	    if($id)
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['news'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);
            count($this->data['news']) || $this->data['errors'][] = 'User could not be found';            
        }
        else
        {
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],257);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

            $this->data['news'] = $this->news_model->get_new();
        }
        

       
		// Pages for dropdown
        $this->data['pages_no_parents'] = $this->news_model->get_no_parents($this->data['content_language_id']);
        $this->data['page_languages'] = $this->language_model->get_form_dropdown('language');
        $this->data['templates_page'] = $this->news_model->get_templates('page_');
        
        // Fetch all files by repository_id
        // Set up the form
        $rules = $this->news_model->email_rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            
            $data =array();
        	$data = $this->news_model->array_from_post(array('subject','desc'));
			$user_email = $this->input->post('email');
		//	$data['user_id']= serialize($this->input->post('email'));
        //    $data = $this->news_model->array_from_post(array('template', 'parent_id','menu_location'));
            if($id == NULL)$data['order'] = $this->news_model->max_order()+1;


            $id = $this->comman_model->save($this->_table_names,$data,$id);
			
			if(empty($this->data['news']->id)){
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],295));
			}
			else
	            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            
            redirect($this->data['_cancel'].'/');
        }
        
        // Load the view
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    public function delete($id){
       
		$this->comman_model->delete($this->_table_names,array('id'=>$id));
        redirect($this->data['_cancel']);
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current news
        
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        
        $news = $this->news_model->get();
        
        if(count($news))
        {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }
    
}