<?php
class Backup extends Admin_Controller{
	public $_table_names = '';
	public $_subView = 'admin/backup/';
	public $_redirect = '/backup';
    public $_current_revision_id;
	public function __construct(){
		parent::__construct();
        $this->data['active']= 'General Settings';
        $this->load->model(array('backup_model'));
        // Get language for content id to show in administration

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
	}
    
	
	function index(){
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],1700).'Backup';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['all_data'] = $this->backup_model->get_files('sql');
/*		echo '<pre>';
		print_r($this->data['all_data']);
		die;*/

        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);

	}

	function export(){
		$this->load->dbutil();
		
		/*        $prefs = array(     
				'format'      => 'zip',             
				'filename'    => 'my_db_backup.sql'
			  );
		
		*/
		$prefs = array(
			'format'      => 'txt',             // gzip, zip, txt
			'filename'    => 'mybackup.sql',    // File name - NEEDED ONLY WITH ZIP FILES
			'newline'     => "\n"               // Newline character used in backup file
		  );
		
		$backup =& $this->dbutil->backup($prefs); 
		
		$db_name = 'db-'. date("d-m-Y-h-i") .'.sql';
		$save = 'assets/backup/'.$db_name;
		
		$this->load->helper('file');
/*		if (!is_dir('backup')) {
 		   mkdir('backup', 0777, TRUE);
		}
*/
		if ( !write_file($save, $backup)){
			$this->session->set_flashdata('success','There is some problem!!');
			 //echo 'Unable to write the file';
		}
		else{
			$this->session->set_flashdata('success','Data has successfully export.');
			 //echo 'File written!';
		}			
            redirect($this->data['_cancel']);
	}

    public function delete($id=false){		
		$file_dir ='assets/backup/'.$id.'.sql'; 
		if(is_file($file_dir)){
			unlink($file_dir);
		}
		redirect($this->data['_cancel']);
	}

	function download($id = false){
		$this->load->helper('download');
		if(!$id){
			redirect($this->data['_cancel']);
		}
		$file_name =$id.'.sql'; 
		$file_dir ='assets/backup/'.$id.'.sql'; 
		if(is_file($file_dir)){
			//$this->comman_model->save('files',array('download_count'=>$download_file->download_count+1),$download_file->id);
			$data = file_get_contents($file_dir);
			force_download($file_name,$data); 
		}
		else{
			redirect($this->data['_cancel']);
		}
	}    


}