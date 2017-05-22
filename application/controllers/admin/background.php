<?php
class Background extends Admin_Controller{
	public $_table_names = 'home_images';
	public $_subView = 'admin/default_image/';
	public $_redirect = '/background';
	public function __construct(){
		parent::__construct();
		$this->data['active'] = 'General Settings';

        // Get language for content id to show in administration
        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
		$this->checkPermissions('general_setting');
	}

	function index(){
		$this->checkPermissions('general_setting');
		$this->load->library('image_lib');
        $this->data['name'] = 'Background Image';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';
		if ($this->input->post('operation')){
            //$data = $this->settings_model->array_from_post($this->settings_model->get_post_from_rules($rules)+array('footer_text','phone','address'));
            $data = array();
	        $data = $this->settings_model->array_from_post(array('background_b1_c'));

/*            if(!empty($_FILES['logo']['name'])){
                $config['upload_path']      = 'assets/images/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
                $config['max_size']         = '60000';
                $config['max_width']        = '5000';
                $config['max_height']       = '5000';
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('logo')){
                    if($_FILES['logo']['error'] != 4){
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    }
                }
                else{
                    $upload_data    = $this->upload->data();
                    $data['background']  = $upload_data['file_name'];
					$this->image_lib->clear();
                }

            }else{
                $data['background']  = $this->data['settings']['background'];
            }      */

			$media_image = $this->input->post('m_background_client');
			if($media_image){
				$data['background_client']  = $media_image;
			}
			else{
				if(!empty($_FILES['logo']['name'])){
					$config['upload_path']      = 'assets/images/';
					$config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
					$config['max_size']         = '60000';
					$config['max_width']        = '5000';
					$config['max_height']       = '5000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('logo')){
						if($_FILES['logo']['error'] != 4){
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}
					}
					else{
						$upload_data    = $this->upload->data();
						$data['background_client']  = $upload_data['file_name'];
						$this->image_lib->clear();
					}
	
				}else{
					$data['background_client']  = $this->data['settings']['background_client'];
				}      
			}

			//login image
			$media_image = $this->input->post('m_background_b1');
			if($media_image){
				$data['background_b1']  = $media_image;
			}
			else{
				if(!empty($_FILES['background_b1']['name'])){
					$config['upload_path']      = 'assets/images/';
					$config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
					$config['max_size']         = '60000';
					$config['max_width']        = '5000';
					$config['max_height']       = '5000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('background_b1')){
						if($_FILES['background_b1']['error'] != 4){
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}
					}
					else{
						$upload_data    = $this->upload->data();
						$data['background_b1']  = $upload_data['file_name'];
						$this->image_lib->clear();
					}
	
				}else{
					$data['background_b1']  = $this->data['settings']['background_b1'];
				}      
			}

			//login image
			$media_image = $this->input->post('m_background_service');
			if($media_image){
				$data['background_service_search']  = $media_image;
			}
			else{
				if(!empty($_FILES['background_service_search']['name'])){
					$config['upload_path']      = 'assets/images/';
					$config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
					$config['max_size']         = '60000';
					$config['max_width']        = '5000';
					$config['max_height']       = '5000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('background_service_search')){
						if($_FILES['background_service_search']['error'] != 4){
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}
					}
					else{
						$upload_data    = $this->upload->data();
						$data['background_service_search']  = $upload_data['file_name'];
						$this->image_lib->clear();
					}
	
				}else{
					$data['background_service_search']  = $this->data['settings']['background_service_search'];
				}      
			}

			//background_hotel_search
			$media_image = $this->input->post('m_background_hotel');
			if($media_image){
				$data['background_hotel_search']  = $media_image;
			}
			else{
				if(!empty($_FILES['background_hotel_search']['name'])){
					$config['upload_path']      = 'assets/images/';
					$config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
					$config['max_size']         = '60000';
					$config['max_width']        = '5000';
					$config['max_height']       = '5000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('background_hotel_search')){
						if($_FILES['background_hotel_search']['error'] != 4){
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}
					}
					else{
						$upload_data    = $this->upload->data();
						$data['background_hotel_search']  = $upload_data['file_name'];
						$this->image_lib->clear();
					}
	
				}else{
					$data['background_hotel_search']  = $this->data['settings']['background_hotel_search'];
				}      
			}
			
			//background_flight_search
			$media_image = $this->input->post('m_background_flight');
			if($media_image){
				$data['background_flight_search']  = $media_image;
			}
			else{
				if(!empty($_FILES['background_flight_search']['name'])){
					$config['upload_path']      = 'assets/images/';
					$config['allowed_types']    = 'gif|jpg|png|jpeg|bmp|GIF|JPG|PNG|JEPG|BMP';
					$config['max_size']         = '60000';
					$config['max_width']        = '5000';
					$config['max_height']       = '5000';
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('background_flight_search')){
						if($_FILES['background_flight_search']['error'] != 4){
							$this->session->set_flashdata('error', $this->upload->display_errors());
						}
					}
					else{
						$upload_data    = $this->upload->data();
						$data['background_flight_search']  = $upload_data['file_name'];
						$this->image_lib->clear();
					}
	
				}else{
					$data['background_flight_search']  = $this->data['settings']['background_flight_search'];
				}      
			}
/*			echo '<pre>';
			print_r($data);die;*/
	        $this->settings_model->save_settings($data);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
            redirect($this->data['admin_link'].'/background');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/background/index';
        $this->load->view('admin/_layout_main',$this->data);       
	}


    public function remove_image(){
		$id = $this->input->get('id');
		if($id){
			$this->db->where(array('field'=>$id));
			$this->db->update('setting', array('value'=>''));
/*			echo $this->db->last_query();
			echo 'sdf';*/
		}
		redirect($this->data['_cancel']);
	}


  	function checkPermissions($type= false,$is_redirect=false){
		$redirect = 0;
		if($this->data['admin_details']->default=='0'){
			$redirect = checkPermission('admin_permission',array('user_id'=>$this->data['admin_details']->id,'type'=>$type,'value'=>1));	
		}
		else{
			$redirect = 1;
		}
		
		if($redirect==0){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			if($redirect){
				redirect($redirect);
			}
			redirect($this->data['admin_link'].'');
		}		
	}

    
}