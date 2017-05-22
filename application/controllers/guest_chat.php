<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Guest_chat extends CI_Controller {
	public $_subView = 'templates/';
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('form','language'));
		$this->load->helper(array('url','date','form','cms'));	
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('comman_model'));
        $detail = $this->session->all_userdata();
		if(isset($detail['chat_session'])){
			$this->data['user_chat'] = $detail['chat_session'];
		}	
		date_default_timezone_set("Asia/Dubai"); 

	}


	


	public function index(){
		if(!isset($this->data['user_chat']))
			redirect($this->data['lang_code'].'/chat/contact');
			
		$this->data['title'] = "".$this->data['settings']['site_name'];
		$this->data['active'] = 'home';
		$this->data['search'] ='';
		$this->load->view('templates/chat',$this->data);
	}

	public function chat_login(){
		$msge = array();
		$msge['result']= 'error';
		$msge['msg']= 'error';
		if($this->input->post('operation')){
			$post_data = array(
							'last_active_time'=>date('Y-m-d h:i:s',time()),
							'status'=>0,
							'user_name'=>$this->input->post('name'),
/*							'email'=>$this->input->post('email'),*/
							'user_type'=>'user');
			
			$id = $this->comman_model->save('user_online',$post_data);
			$session_data = array(
					'name' =>$this->input->post('name'),
/*					'email' =>$this->input->post('email'),*/
					'id' =>$id);				
			$this->session->set_userdata('chat_session',$session_data);					
			$msge['result']= 'success';
			$msge['msg']= 'open';
		}
		echo json_encode($msge);
	}

	function views($id = false){	
		$detail = $this->session->all_userdata();
		if(isset($detail['chat_session'])){
			$user_chat = $detail['chat_session'];
			$this->db->where('`to` ='.$user_chat['id'].' or `from` ='.$user_chat['id']);
			$new_data = $this->comman_model->get('public_chat',false);
			//echo $this->db->last_query();die;
			foreach($new_data as $row){
				$time = date("Y-m-d",strtotime($row->sent));
				$now = date("Y-m-d");
				if ($time == $now) {
					$hourAndMinutes = date("h:i A", strtotime($row->sent));
				}else{
					$hourAndMinutes = date("Y-m-d", strtotime($row->sent));
				}
				if($row->from!=$user_chat['id']){
					$image = 'assets/uploads/profile.jpg';
					echo '<div class="row msg_container base_receive">
							<div class="col-md-2 col-xs-2 avatar" style="padding:0px">
								<img src="'.$image.'" class=" img-responsive ">
							</div>
							<div class="col-md-10 col-xs-10">
								<div class="messages msg_receive">
									<p>'.$row->message.'</p>
									<time datetime="2009-11-13T20:00">'.$row->from_name.' • '.$hourAndMinutes.'</time>
								</div>
							</div>
						</div>';
				}
				else{
					$image = 'assets/uploads/profile.jpg';
					echo'<div class="row msg_container base_sent">
							<div class="col-md-10 col-xs-10"><div class="messages msg_sent">'.$row->message.'</p>
								<time datetime="2009-11-13T20:00">'.$row->from_name.' •'.$hourAndMinutes.'</time></div></div>
							<div class="col-md-2 col-xs-2 avatar" style="padding:0px">
								<img src="'.$image.'" class=" img-responsive ">
							</div>
						</div>';
				}
			}
		}
	}

	function send_chat(){
		if(isset($this->data['user_chat'])){
			$post_data = array(
							'`from`'=>$this->data['user_chat']['id'],
							'`from_name`'=>$this->data['user_chat']['name'],
							'`to`'=>0,
							'`to_name`'=>'admin',
							'`sent`'=>date("Y-m-d h:i:s", time()),
							'`message`'=>$this->input->post('message'),
						);
			//print_r($post_data);			
			$this->comman_model->save('public_chat',$post_data);
		}
	}

	function get_online(){
		$show_status= 'off';
		$result = $this->comman_model->get_by('user_online',array('user_type'=>'admin','last_active_time >'=>date("Y-m-d h:i:s", strtotime('-7 second', time()))),false,false,false);
		
		if($result){
			$show_status ='on';
		}		
		echo $show_status;
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */