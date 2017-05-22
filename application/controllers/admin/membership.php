<?php

class Membership extends Admin_Controller
{
	public $_table_names = 'memberships';
	public $_subView = 'admin/memberships/';
	public $_redirect = '/membership';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Membership Management';
        $this->load->model(array('comman_model','membership_model'));

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
	}
    
    public function index()
	{
	    // Fetch all pages
		$this->data['title'] = 'Membership Plan | '.$this->data['settings']['site_name'];
		$this->data['name'] = 'Membership Plan ';
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
		$this->data['table'] = true;
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}

    public function order_ajax(){
        // Save order from ajax call
        if (isset($_POST['sortable'])) {
            $this->membership_model->save_order($_POST['sortable']);
        }
        
        // Fetch all pages
        $this->data['pages'] = $this->membership_model->get_nested($this->data['content_language_id']);
        
        // Load view
        $this->load->view($this->_subView.'order_ajax', $this->data);
    }

    
    public function order()
    {
		$this->data['sortable'] = TRUE;
        
        // Load view
		$this->data['subview'] = $this->_subView.'order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function edit($id = NULL){
	    // Fetch a page or set a new one
	    if($id){
            $this->data['categories'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id), FALSE, FALSE, true);			
			$this->data['title'] = 'Edit | '.$this->data['settings']['site_name'];
			$this->data['name'] = 'Edit';
            count($this->data['categories']) || $this->data['errors'][] = 'User could not be found';
        }
        else
        {
			$this->data['title'] = 'Create | '.$this->data['settings']['site_name'];
			$this->data['name'] = ' Create ';
            $this->data['categories'] = $this->membership_model->get_new();
        }
        
		$this->data['userTypes']= array(
				'Hair Salons','Nail Salons','Beauty Salons','Tanning Salons','Waxing Salons',
				'Spas','Massage Therapy','Barber Shop','Brow Bar','Gym & Fitness','Makeup Studio',
				'Mobile Therapy','Pilates Studio','Yoga Studio','Acupuncture','Art Therapy','Audiology',
				'Bowen Therapy Chiropody','Chiropractic','Dietetics','Foot Health','Herbalism','Independent',
				'Nursing Kinesiology','Massage Therapy','NLP Practitioners','Nutritional Counselling','Oriental Medicine',
				'Orthoptics','Occupational Therapy Orthotics','Osteopathy','Physiotherapy','Physical Therapy','Psychology',
				'Psychotherapy','Prosthetics','Reflexology','Speech and Language Therapy Sports Therapy','Others'
		);

		$this->data['month']= array(
								'1'=>'1 Month',
								'3'=>'3 Months',
								'6'=>'6 Months',
								'12'=>'1 years',
								'60'=>'5 years',
								'120'=>'10+ years',
		);
       
		$this->data['member_data']= array(
								'1'=>'1 Staff',
								'5'=>'5 Staff',
								'10'=>'10 Staff',
								'15'=>'15 Staff',
								'50'=>'50+ Staff',
		);
        // Set up the form
        $rules = $this->membership_model->rules;
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE)
        {
            $data =array();
            $data = $this->comman_model->array_from_post(array('name','price','month','c_point','desc','type','member'));
            if($id == NULL)$data['order'] = $this->membership_model->max_order()+1;
            if($id == NULL){
                $data['created'] = time();
                $data['modified'] = time();
			}
			else{
                $data['modified'] = time();
			}
            
            $id = $this->comman_model->save($this->_table_names,$data, $id);
			if(empty($this->data['categories']->id))
	            $this->session->set_flashdata('success','Plan has successfully created.');
			else
	            $this->session->set_flashdata('success','Plan has successfully updated.');			
            redirect($this->data['_cancel']);
        }
        
        // Load the view
/*		echo '<pre>';
		print_r($this->data);
		die;
*/
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    
    public function delete($id)
	{
       
		$this->membership_model->delete($id);
            redirect($this->data['_cancel']);
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current categories
        
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        
        $categories = $this->membership_model->get();
        
        if(count($categories))
        {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }
    
}