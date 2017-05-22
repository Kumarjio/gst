<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax extends Frontend_Controller{	
	public function __construct(){
		parent::__construct();
		$this->data['active_sub'] = '';	
		$this->data['name'] = 'Dashboard';	
        $this->load->model(array('users_model'));
	
        $this->form_validation->set_error_delimiters('<p class="alert alert-block alert-danger fade in" style="margin-bottom:2px;padding:5px 10px">', '</p>');

		$this->data['_user_link'] = $this->data['lang_code'].'/stores';
	}

	function update_online(){
		$output['status'] ='ok';
		$this->chat_model->update($this->data['user_details']->id);
		echo json_encode($output);
	}


	function ajaxOrderChart(){
		if (!$this->input->is_ajax_request()) {
		 	exit('No direct script access allowed');
		}

		$id = $this->input->post('type');
		$user_type = $this->input->post('user_type');
		//$user_type = 'ownner';
		$nowTime = time();
		$user_id = 'user_id';
//		$id = 'day';
		$array = array();
		if(isset($this->data['user_details'])){
		if($id=='month'){
			$query = "SELECT on_date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM search_saved where user_id =".$this->data['user_details']->id." GROUP BY Y,m ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->m)){
						if($set_data->m==1){
							$array['Jan'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==2){
							$array['Feb'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==3){
							$array['Mar'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==4){
							$array['Apr'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==5){
							$array['May'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==6){
							$array['Jun'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==7){
							$array['Jul'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==8){
							$array['Aug'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==9){
							$array['Sep'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==10){
							$array['Oct'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==11){
							$array['Nov'] =(int)$set_data->problem_count;
						}
						else if($set_data->m==12){
							$array['Dec'] =(int)$set_data->problem_count;
						}
					}				
				}
			}
		}
		else if($id=='year'){
				$query = "SELECT on_date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM search_saved where YEAR(on_date)='".date('Y')."' and user_id =".$this->data['user_details']->id." GROUP BY Y ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->Y)){
						$array[$set_data->Y] =(int)$set_data->problem_count;
					}				
				}
			}
		}
		else{
			$s_date = date('Y-m-d',strtotime('-30 day', $nowTime));
			$e_date = date('Y-m-d',$nowTime);

			$query = "SELECT on_date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM search_saved where user_id =".$this->data['user_details']->id." and on_date >= '".$s_date."' and on_date <= '".$e_date."' GROUP BY Y,m,d ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->on_date)){
						$array[$set_data->on_date] =(int)$set_data->problem_count;
					}				
				}
			}
		}
		
		}
		if(empty($array)){
			$array[date('Y-m-d')] =0;
		}		
	//	$array = array('9-3-2017'=>4,'10-3-2017'=>6,'11-3-2017'=>2,'8-3-2017'=>5,'7-3-2017'=>4);
		
		echo json_encode($array);
	}
}


/* End of file user.php */
/* Location: ./application/controllers/user.php */