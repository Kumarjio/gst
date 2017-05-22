<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends Admin_Controller{
	public $_table_names = 'content';
	public $_subView = 'admin/content/';
	public $_redirect = '/content';
    public $_current_revision_id;
	
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'Content Management';
        $this->load->model(array('content_model'));

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
        
		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_content==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');
	}
    
    public function index()
	{
		$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],181);
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		//$this->data['table'] = true;
		$this->db->order_by('id','asc');
		$this->data['all_data'] = $this->comman_model->get_lang($this->_table_names,$this->data['adminLangSession']['lang_id'],NULL,array('enabled'=>1),'content_id',false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}
	
    public function edit($id = NULL){

		$data = array();
	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

			$this->data['page'] = $this->content_model->get_lang($id, FALSE, $this->data['content_language_id']);
            count($this->data['page']) || $this->data['errors'][] = 'User could not be found';
            
        }
        else{
			redirect($this->data['_cancel']);
        }
        

        
        // Fetch all files by repository_id

        // Set up the form
        $rules = $this->content_model->rules;
        $this->form_validation->set_rules($this->content_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
            $data_lang = $this->content_model->array_from_post($this->content_model->get_lang_post_fields());
            if($id != NULL){
                $data['date'] = date('Y-m-d H:i:s');
			}
			
			if (!empty($_FILES['logo']['name'])){					
				$result =$this->comman_model->do_upload('logo','./assets/uploads/contents');
				if($result[0]=='error'){
					$this->session->set_flashdata('error',$result[1]); 
				}
				else if($result[0]=='success'){
					$data['image'] = $result[1];
				}
			}	
			else{
				 if($id != NULL)$data['image'] = $this->data['page']->image;
			}

            $id = $this->content_model->save_with_lang($data, $data_lang, $id);
			$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            redirect($this->data['_cancel'].'/edit/'.$id);
        }
        
/*            echo '<pre>';
			print_r($this->data);die;*/
        // Load the view
		$this->data['subview'] = $this->_subView.'/edit';
        $this->load->view('admin/_layout_main', $this->data);
	}

	public function edits($id = NULL){
		$data = array();
	    // Fetch a page or set a new one
	    if($id){
			$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],254);
			$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
			$this->db->where('type','home');
			$this->data['page'] = $this->content_model->get_lang($id, FALSE, $this->data['content_language_id']);
			if(!$this->data['page']){
				redirect($this->data['_cancel']);
			}
            
        }
        else{
			redirect($this->data['_cancel']);
        }
        

        
        // Fetch all files by repository_id

        // Set up the form
        $rules = $this->content_model->rules;
        $this->form_validation->set_rules($this->content_model->get_all_rules());

        // Process the form
        if($this->form_validation->run() == TRUE){
			$this->load->library('image_lib');
            $data_lang = $this->content_model->array_from_post($this->content_model->get_lang_post_fields());
            if($id != NULL){
                $data['date'] = date('Y-m-d H:i:s');
			}
			
			if (!empty($_FILES['image']['name'])){					
                $config['upload_path']      = 'assets/uploads/contents/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '600000';
                $config['max_width']        = '50000';
                $config['max_height']       = '50000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image'))
                {
                    if($_FILES['logo']['error'] != 4){
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
                $data['image']  = $this->data['page']->image;
            }      
			$this->image_lib->clear();

			if (!empty($_FILES['image2']['name'])){					
                $config['upload_path']      = 'assets/uploads/contents/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '600000';
                $config['max_width']        = '50000';
                $config['max_height']       = '50000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image2'))
                {
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else
                {
                    $upload_data    = $this->upload->data();
                //    $this->session->set_flashdata('message', 'Your file has been successfully uploaded.');
                    $data['image2']  = $upload_data['file_name'];

                }

            }else{
                $data['image2']  = $this->data['page']->image2;
            }      
			$this->image_lib->clear();

			if (!empty($_FILES['image3']['name'])){					
                $config['upload_path']      = 'assets/uploads/contents/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '600000';
                $config['max_width']        = '50000';
                $config['max_height']       = '50000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('image3'))
                {
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else
                {
                    $upload_data    = $this->upload->data();
                //    $this->session->set_flashdata('message', 'Your file has been successfully uploaded.');
                    $data['image3']  = $upload_data['file_name'];

                }

            }else{
                $data['image3']  = $this->data['page']->image3;
            }      
			$this->image_lib->clear();
			
            $id = $this->content_model->save_with_lang($data, $data_lang, $id);
			$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],296));
            redirect($this->data['_cancel'].'/edits/'.$id);
        }
        
/*            echo '<pre>';
			print_r($this->data);die;*/
        // Load the view
		$this->data['subview'] = $this->_subView.'/edits';
        $this->load->view('admin/_layout_main', $this->data);
	}
    
    
	
    
}