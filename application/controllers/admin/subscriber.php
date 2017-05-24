<?php
class subscriber extends Admin_Controller{
	public $_table_names = 'newsletters';
	public $_subView = 'admin/subscriber/';
	public $_redirect = '/subscriber';
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
		$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],187);
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];

		$this->data['table'] = true;
		$this->db->order_by('id','desc');
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);
        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}

	function delete($id = false){
		if(!$id){
			redirect($this->data['_cancel']);		
		}
		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));
		$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],297)); 
		redirect($this->data['_cancel']);		
	}
	
	function export(){
		
		$s_data = $this->comman_model->get('newsletters',false);
		if($s_data){
			header('Content-type: application/excel');
			$filename = 'excel_data.xls';
			header('Content-Disposition: attachment; filename='.$filename);

echo '<html xmlns:x="urn:schemas-microsoft-com:office:excel">
		<head>
			<!--[if gte mso 9]>
			<xml>
				<x:ExcelWorkbook>
					<x:ExcelWorksheets>
						<x:ExcelWorksheet>
							<x:Name>Sheet 1</x:Name>
							<x:WorksheetOptions>
								<x:Print>
									<x:ValidPrinterInfo/>
								</x:Print>
							</x:WorksheetOptions>
						</x:ExcelWorksheet>
					</x:ExcelWorksheets>
				</x:ExcelWorkbook>
			</xml>
			<![endif]-->
		</head>
		
		<body>';
?>
<table>
<thead>
<tr>
<th style="text-align:center">email</th>
</tr>
</thead>
<tbody>
<?php
	foreach($s_data as $setD){
?>
<tr>
    <td><?php echo $setD->email;?></td>
</tr>
<?php
}
?>


</tbody>
</table>
<?php
		}	
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
			$newUser = new stdClass();
			$newUser->email = '';

            $this->data['news'] = $newUser;
        }
        

        // Fetch all files by repository_id
        // Set up the form
		$rules = array(
                    'email' =>array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email'),
                    ); 
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            
            $data =array();
        	$data = $this->news_model->array_from_post(array('email'));
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
    
public function add(){
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
			$newUser = new stdClass();
			$newUser->email = '';

            $this->data['news'] = $newUser;
        }
        

        // Fetch all files by repository_id
        // Set up the form
		$rules = array(
                    'email' =>array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email'),
                    ); 
        $this->form_validation->set_rules($rules);

        // Process the form
        if($this->form_validation->run() == TRUE){
            
            $data =array();
        	$data = $this->news_model->array_from_post(array('email'));
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
}