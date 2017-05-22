<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Partner extends Admin_Controller{
	public $_table_names = 'partners';
	public $_subView = 'admin/partners/';
	public $_redirect = 'admin/partner';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Partners';
        $this->load->model('partner_model');

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_content_lang();
	}
    
    public function index(){
		$this->data['title'] = 'Partners | '.$this->data['settings']['site_name'];
		$this->data['name'] = 'Partners';
		$this->data['all_data'] = $this->partner_model->get_lang();
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}
    
    public function order()
    {
		$this->data['sortable'] = TRUE;
        
        // Load view
		$this->data['subview'] = 'admin/partner/order';
        $this->load->view('admin/_layout_main', $this->data);
    }
    
    public function update_ajax($filename = NULL)
    {
        // Save order from ajax call
        if(isset($_POST['sortable']) && $this->config->item('app_type') != 'demo')
        {
            $this->partner_model->save_order($_POST['sortable']);
        }
        
        $data = array();
        $length = strlen(json_encode($data));
        header('Content-Type: application/json; charset=utf8');
        header('Content-Length: '.$length);
        echo json_encode($data);
        
        exit();
    }
    
    public function edit($id = NULL)
	{
		$data = array();
	    // Fetch a page or set a new one
	    if($id)
        {
            $this->data['partner'] = $this->partner_model->get_lang($id, FALSE, $this->data['content_language_id']);
			$this->data['title'] = 'Edit | '.$this->data['settings']['site_name'];
            count($this->data['partner']) || $this->data['errors'][] = 'User could not be found';
        }
        else
        {
			$this->data['title'] = 'Create | '.$this->data['settings']['site_name'];
            $this->data['partner'] = $this->partner_model->get_new();
        }
        

       
		// Pages for dropdown
        $this->data['pages_no_parents'] = $this->partner_model->get_no_parents($this->data['content_language_id']);
        $this->data['page_languages'] = $this->language_model->get_form_dropdown('language');
        $this->data['templates_page'] = $this->partner_model->get_templates('page_');
        
        // Fetch all files by repository_id
        
        // Set up the form
        $rules = $this->partner_model->rules;
        $this->form_validation->set_rules($this->partner_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
			$data = $this->partner_model->array_from_post(array('first_name', 'page_id','last_name'));
            
            if($id == NULL)$data['order'] = $this->partner_model->max_order()+1;
            $data_lang = $this->partner_model->array_from_post($this->partner_model->get_lang_post_fields());
            if($id == NULL)
                $data['date'] = date('Y-m-d H:i:s');
           
            if(!empty($_FILES['logo'])){
                $config['upload_path']      = 'assets/uploads/partners/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp';
                $config['max_size']         = '4000';
                $config['max_width']        = '1024';
                $config['max_height']       = '1768';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo'))
                {
                    if($_FILES['logo']['error'] != 4)
                    {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else
                {
                    $upload_data    = $this->upload->data();
                //    $this->session->set_flashdata('message', 'Your file has been successfully uploaded.');
                    $data['image']  = $upload_data['file_name'];

                }

            }else{
                $data['image']  = $this->data['page']->icon;
            }      
			
			//print_r($data);
			
			//$data_lang['body_1']=htmlentities($data_lang['body_1']);
			//print_r($data_lang);
			
			//exit;
			
            $id = $this->partner_model->save_with_lang($data, $data_lang, $id);
            
            redirect($this->_redirect.'/edit/'.$id);
        }
        
/*            echo '<pre>';
			print_r($this->data);die;*/
        // Load the view
		$this->data['subview'] = $this->_subView.'edit';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    private function generate_sitemap()
    {
        $this->load->model('estate_m');
        
        $sitemap = $this->partner_model->get_sitemap();
        $properties = $this->estate_m->get_sitemap();
        
        $content = '';
        $content.= '<?xml version="1.0" encoding="UTF-8"?>'."\n".
                   '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"'."\n".
                   '  	xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"'."\n".
                   '  	xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9'."\n".
                   '			    http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n";
        
        
        foreach($sitemap as $page_obj)
        {
            $content.= '<url>'."\n".
                    	'	<loc>'.site_url($this->language_model->get_code($page_obj->language_id).'/'.$page_obj->id.'/'.url_title_cro($page_obj->navigation_title, '-', TRUE)).'</loc>'."\n".
                    	//'	<lastmod>'.$page_obj->date.'</lastmod>'.
                    	'	<changefreq>weekly</changefreq>'."\n".
                    	'	<priority>0.5</priority>'."\n".
                    	'</url>'."\n";
        }
        
        foreach($properties as $estate_obj)
        {
            $langs = $this->language_model->get_array();
            
            foreach($langs as $lang_code=>$lang)
            {
            $content.= '<url>'."\n".
                    	'	<loc>'.site_url('frontend/property/'.$estate_obj->id.'/'.$lang['code']).'</loc>'."\n".
                    	//'	<lastmod>'.$page_obj->date.'</lastmod>'.
                    	'	<changefreq>weekly</changefreq>'."\n".
                    	'	<priority>0.5</priority>'."\n".
                    	'</url>'."\n";
            }
        }

        $content.= '</urlset>';
        
        $fp = fopen(FCPATH.'sitemap.xml', 'w');
        fwrite($fp, $content);
        fclose($fp);
    }
    
    public function delete($id)
	{
        if($this->config->item('app_type') == 'demo')
        {
            $this->session->set_flashdata('error', 
                    lang('Data editing disabled in demo'));
            redirect($this->_redirect);
            exit();
        }
       
		$this->partner_model->delete($id);
        redirect($this->_redirect);
	}
    
    public function _unique_slug($str)
    {
        // Do NOT validate if slug alredy exists
        // UNLESS it's the slug for the current page
        
        $id = $this->uri->segment(4);
        $this->db->where('slug', $this->input->post('slug'));
        !$id || $this->db->where('id !=', $id);
        
        $page = $this->partner_model->get();
        
        if(count($page))
        {
            $this->form_validation->set_message('_unique_slug', '%s should be unique');
            return FALSE;
        }
        
        return TRUE;
    }
    
}