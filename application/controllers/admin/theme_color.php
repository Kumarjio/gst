<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Theme_color extends Admin_Controller {
	public $_table_names = 'theme_settings';
	public $_subView = 'admin/themes/';
	public $_redirect = '/theme_color';
	public function __construct(){
		parent::__construct();
        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
		$this->data['active'] = 'General Settings';

	}

    public function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1620).'Theme Color';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';

		$this->data['f_main']  = $this->comman_model->get_by($this->_table_names,array('id'=>1),false,false,true);
		$this->data['f_footer']  = $this->comman_model->get_by($this->_table_names,array('id'=>2),false,false,true);
		$this->data['f_menu']  = $this->comman_model->get_by($this->_table_names,array('id'=>3),false,false,true);
		$this->data['f_user_m']  = $this->comman_model->get_by($this->_table_names,array('id'=>4),false,false,true);
		$this->data['f_reg_m']  = $this->comman_model->get_by($this->_table_names,array('id'=>5),false,false,true);


        $this->data['font_data'] = $this->custom_model->font_family();

		$rules = array(
        'background_color' => array('field'=>'background_color', 'label'=>'Background Color', 'rules'=>'trim'),
        'footer_color' => array('field'=>'footer_color', 'label'=>'Footer  Color', 'rules'=>'trim'),
        'menu_color' => array('field'=>'menu_color', 'label'=>'Menu Color', 'rules'=>'trim'),
	   );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==TRUE){
        	$post_menu= $this->comman_model->array_from_post(array('main'));
			if($post_menu){
				$click_data = array('background'=>$post_menu['main']['background']) ;
				$this->comman_model->save($this->_table_names,$click_data,1);
			}

        	$post_footer= $this->comman_model->array_from_post(array('foot'));
			if($post_footer){
				$click_data = array('background'=>$post_footer['foot']['background']) ;
				$this->comman_model->save($this->_table_names,$click_data,2);
			}


        	$post_footer= $this->comman_model->array_from_post(array('menu'));
			if($post_footer){
				$click_data = array(
							'color'=>$post_footer['menu']['color'],
							'size'=>$post_footer['menu']['size'],
							'font'=>$post_footer['menu']['font'],
							'background'=>$post_footer['menu']['background'],
				);
				$this->comman_model->save($this->_table_names,$click_data,3);
			}

        	$post_footer= $this->comman_model->array_from_post(array('user'));
			if($post_footer){
				$click_data = array(
							'color'=>$post_footer['user']['color'],
							'size'=>$post_footer['user']['size'],
							'font'=>$post_footer['user']['font'],
							'background'=>$post_footer['user']['background'],
				);
				$this->comman_model->save($this->_table_names,$click_data,4);
			}


        	$post_footer= $this->comman_model->array_from_post(array('regi'));
			if($post_footer){
				$click_data = array(
							'color'=>$post_footer['regi']['color'],
							'size'=>$post_footer['regi']['size'],
							'font'=>$post_footer['regi']['font'],
							'background'=>$post_footer['regi']['background'],
				);
/*				echo '<pre>';
				print_r($click_data);
				die;*/
				$this->comman_model->save($this->_table_names,$click_data,5);
			}
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
            redirect($this->data['admin_link'].'/theme_color');
        }
        
        //var_dump($this->data['admin_details']);
		$this->data['subview'] = $this->_subView.'index';
        $this->load->view('admin/_layout_main', $this->data);
   	}
    
    public function index123(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1620).'Theme Color';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
        $this->data['active']= 'General Settings';
        $this->data['active_sub']= 'website';

		$rules = array(
	        'background_color' => array('field'=>'background_color', 'label'=>'Background Color', 'rules'=>'trim|required'),
    	    'footer_color' => array('field'=>'footer_color', 'label'=>'Footer  Color', 'rules'=>'trim|required'),
        	'menu_color' => array('field'=>'menu_color', 'label'=>'Menu Color', 'rules'=>'trim|required'),
	   );
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run()==TRUE){
            //$data = $this->settings_model->array_from_post($this->settings_model->get_post_from_rules($rules)+array('footer_text','phone','address'));
            $data = $this->settings_model->array_from_post(array('background_color','footer_color','menu_color'));
	        $this->settings_model->save_settings($data);
            $this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],294));
            redirect($this->data['admin_link'].'/theme_color');
        }
        
        //var_dump($this->data['admin_details']);
        $this->data['subview'] = 'admin/dashboard/background_color';        
        $this->load->view('admin/_layout_main',$this->data);       
   	}
    


}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */
/* End of file admin.php */
/* Location: ./application/controllers/admin.php */