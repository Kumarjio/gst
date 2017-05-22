<?php
class Update_lang extends Admin_Controller{
	public $_table_names = 'tags';
	public $_subView = 'admin/update/';
	public $_redirect = '/update_lang';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'General Settings';
        $this->load->model('comman_model');
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        // Get language for content id to show in administration
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');
	}
    
    public function index(){
	    // Fetch all pages
		$this->data['title'] = 'Update Data | '.$this->data['settings']['site_name'];
		//$this->data['table'] = true;
		$this->data['name'] = 'Update Data';
		if($this->input->post('operation')){
			$default_lang = $this->comman_model->get_by('language',array('default'=>1),false,false,true);
			if($default_lang){
				$many_lang = $this->comman_model->get_by('language',array('default'=>0),false,false,false);
				if($many_lang){
					foreach($many_lang as $set_lang){
						/*--for page--*/
						$product = $this->comman_model->get('page',false);
						if($product){
							foreach($product as $set_product){
								$product_lang = $this->comman_model->get_by('page_lang',array('page_id'=>$set_product->id,'language_id'=>$set_lang->id),false,false,true);
								if($product_lang){
								}
								else{
									$d_product_lang = $this->comman_model->get_by('page_lang',array('page_id'=>$set_product->id,'language_id'=>$default_lang->id),false,false,true);
									$post_data = array(
											'page_id'=>$set_product->id,
											'language_id'=>$set_lang->id,
											'title'=>$d_product_lang->title,
											'body'=>$d_product_lang->body
											);
									$this->comman_model->add('page_lang',$post_data);
								}
								
							}					
						}

	



	
					}
				}
				$this->session->set_flashdata('success','Lang Data has successfully updated.');
			}
			else{
				$this->session->set_flashdata('error','Please Select default language.');
			}
			redirect($this->data['_cancel']);			
			//die;
		}
        $this->data['subview'] = $this->_subView.'edit';	
		$this->load->view('admin/_layout_main',$this->data);
	}
    
    

    
    
    
    
    
}