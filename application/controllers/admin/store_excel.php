<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store_excel extends Admin_Controller {
	public $_table_names = 'stores_booking';
	public $_subView = 'admin/stores_excel/';
	public $_redirect = '/store_excel';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Product Management';
        $this->load->model(array('store_model'));
        // Get language for content id to show in administration

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect.'';
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
        //$this->data['content_language_id'] = $this->language_model->get_content_lang();
		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_product==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
    }
	

	function excel_data($id =false){	
	    // Fetch a page or set a new one
	    if($id){
			$this->data['stores'] = $this->comman_model->get_by('stores',array('id'=>$id),false,false,true);

            if(!$this->data['stores']){
	            redirect($this->data['admin_link'].'/store');
			}
        }
        else{
	            redirect($this->data['admin_link'].'/store');
        }

		$this->data['all_data'] = $this->comman_model->get_by('stores_booking',array('store_id'=>$id),false,false,false);
		$this->data['name'] = 'Excel Data';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		
		$this->data['storeID'] = $id;
		$this->data['subview'] = $this->_subView.'index_excel_data';
        $this->load->view('admin/_layout_main', $this->data);
	}

	function excel($id =false){	
	    // Fetch a page or set a new one
	    if($id){
			$this->data['stores'] = $this->comman_model->get_by('stores',array('id'=>$id),false,false,true);

            if(!$this->data['stores']){
	            redirect($this->data['admin_link'].'/store');
			}
        }
        else{
	            redirect($this->data['_cancel']);
        }
		$query = "SELECT date, DAY(DATE)AS d, MONTH(DATE) AS m,YEAR(DATE) AS Y  FROM stores_booking GROUP BY Y,m,d ORDER BY  Y,m,d asc";
		$this->data['all_data'] = $this->comman_model->get_query($query);

		$this->data['name'] = 'Excel';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		
		$this->data['storeID'] = $id;
		$this->data['subview'] = $this->_subView.'index_excel';
        $this->load->view('admin/_layout_main', $this->data);
	}

	function import($id =false){	
	
		require_once APPPATH . 'third_party/PHPExcel/IOFactory.php';
	    // Fetch a page or set a new one
	    if($id){
			$this->data['stores'] = $this->comman_model->get_by('stores',array('id'=>$id),false,false,true);
            if(!$this->data['stores']){
	            redirect($this->data['admin_link'].'/store');
			}
        }
        else{
	            redirect($this->data['admin_link'].'/store');
        }
		
		$checkData = $this->comman_model->get_by($this->_table_names,array('date'=>date('Y-m-d')),false,false,true);
		if($checkData){
			$this->session->set_flashdata('error','Sorry! You have already upload file.'); 
			redirect($this->data['_cancel'].'/excel/'.$id);
		}

		$this->data['name'] = 'Import';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$rules = $this->admin_model->product_rules;
		$this->form_validation->set_rules($rules);
		if ($this->input->post('operation')){
			$config['upload_path'] = 'assets/uploads/excel_booking/';
			$config['allowed_types'] = '*';
	        $config['max_size'] = '30000';
			$this->load->library('upload', $config);
			// If upload failed, display error
			if (!$this->upload->do_upload()) {
				$this->session->set_flashdata('error',$this->upload->display_errors()); 
	            redirect($this->data['_cancel'].'/import/'.$id);
			} 
			else {
				$file_data = $this->upload->data();
				$inputFileName =  'assets/uploads/excel_booking/'.$file_data['file_name'];				
				//$inputFileName = 'assets/excel.xls';		
				//  Read your Excel workbook
				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
				} catch(Exception $e) {
					die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
/*					$this->session->set_flashdata('error','Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage()); 
		            redirect($this->data['_cancel'].'/import/'.$id);*/
				}
				
				//  Get worksheet dimensions
				$sheet = $objPHPExcel->getSheet(0); 
				$highestRow = $sheet->getHighestRow(); 
				$highestColumn = $sheet->getHighestColumn();
				
				//  Loop through each row of the worksheet in turn
				$j=0;
				$totalRoom =0;
				$totalPrice =0;
				for ($row = 1; $row <= $highestRow; $row++){ 
					//  Read a row of data into an array
					$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,NULL,TRUE,FALSE);
					//print_r($rowData);
					if($j!=0){
						if(empty($rowData[0][2])||$rowData[0][2]==''||$rowData[0][2]==' '){
						}
						else{
							$date = explode(' ',$rowData[0][2]);
							$newDate = $date[2].'-'.$date[1].'-'.$date[0];
	
							if(empty($rowData[0][0])||$rowData[0][0]==''||$rowData[0][0]==' '){
								$totalRoom =0;
							}
							else{
								$totalRoom =$rowData[0][0];
							}
							if(empty($rowData[0][1])||$rowData[0][1]==''||$rowData[0][1]==' '){
								$totalPrice =0;
							}
							else{
								$totalPrice =$rowData[0][1];
							}
							$post_data = array('room'=>$totalRoom,'on_date'=>$newDate,'price'=>$totalPrice);
							$post_data['store_id'] = $id;
							$post_data['date'] = date('Y-m-d',time());
							//print_r($post_data);
							
							//printR($post_data);
							if(!empty($post_data['on_date'])){
								$this->comman_model->save('stores_booking',$post_data);
							}
						}
					}
					$j++;
					//  Insert row data array into database here using your own structure
				}

				$this->session->set_flashdata('success','Data has successfully import'); 
	            redirect($this->data['_cancel'].'/excel/'.$id);
			}	
		}
		//$this->data['login'] = $this->session->all_userdata();
		
		$this->data['subview'] = $this->_subView.'upload_excel';
        $this->load->view('admin/_layout_main', $this->data);
	}
	
	function delete($page =false,$id=false){	
	    // Fetch a page or set a new one
	    if($page){
			$this->data['stores'] = $this->comman_model->get_by('stores',array('id'=>$page),false,false,true);
            if(!$this->data['stores']){
	            redirect($this->data['admin_link'].'/store');
			}
        }
        else{
	            redirect($this->data['admin_link'].'/store');
        }
		$this->comman_model->delete_by_id($this->_table_names,array('date'=>$id));
		redirect($this->data['_cancel'].'/excel/'.$page);		
	}

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */