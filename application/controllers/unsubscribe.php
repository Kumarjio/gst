<?php

class unsubscribe extends Frontend_Controller{

	public $_table_names = 'news';

	public $_subView = 'unsubscribe/';

	public $_redirect = 'https://www.gosearchtravel.com';

	public function __construct(){

		parent::__construct();

		$this->data['active'] = 'Newsletter Management';

        $this->load->model('comman_model');

        $this->load->model('news_model');



        //$this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;

     


        // Get language for content id to show in administration

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();

        

        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');

	}

    

    public function index(){

			//echo $_GET['email']; die;

			if(!empty($_POST))

			{

				//echo "Hello ".$_POST['email']; die;

				$em=$_POST['email'];

				$delete_success=$this->comman_model->delete_subscriber($em);

			 if($delete_success)

			 { 
				//return "<script>alert(Unsubscription Successfully);</script>";
//echo 'Unsubscription Successfully'; //die;
				redirect($_redirect.'/unsubscribe/thankyou');
			 }				 
else
			 { 
				echo  "<script>alert('Unsubscription UnSuccess. Try Again');</script>";
//echo 'Unsubscription Successfully'; //die;
				//redirect($this->data['_cancel']);	
			 }	
			}


		$this->load->view($this->_subView.'index',$this->data);

	}


    public function thankyou(){
  //echo "Thankyoue="; die;
			
		$this->load->view($this->_subView.'thank',$this->data);

	}



	

}