<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_chart extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url','form','date','front'));	
		$this->load->library(array('form_validation','session'));
		$this->load->model(array('comman_model','language_model','settings_model'));
		$this->data['set_meta'] = '';	
        $this->data['settings'] = $this->settings_model->get_fields();
		date_default_timezone_set('GMT');		
		//date_default_timezone_set("Asia/Dubai"); 
		//date_default_timezone_set("Asia/Kolkata"); 

/*		$this->data['lang_code'] = (string) $this->uri->segment(1);
        if(empty($this->data['lang_code']))
        {
            $this->data['lang_code'] = $this->language_model->get_default();
        }
        $this->data['lang_id'] = $this->language_model->get_id($this->data['lang_code']);*/

        $detail = $this->session->all_userdata();
		if(isset($detail['user_session'])){
			$this->data['user_session'] = $detail['user_session'];
			if(isset($detail['user_session']['loginType'])){
				if($detail['user_session']['loginType']=='user'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
				}
				if($detail['user_session']['loginType']=='reseller'){
		            $this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
				}
			}
        }

	}
	

	function ajaxOrderChartD(){
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		$id = $this->input->post('type');
		$user_type = $this->input->post('user_type');
		//$user_type = 'ownner';

		$user_id = 'user_id';
//		$id = 'day';
		$array = array();
		if(isset($this->data['user_details'])){}
		if(empty($array)){
			$array[date('Y-m-d')] =0;
		}		
		$array = array('9-3-2017'=>4,'10-3-2017'=>6,'11-3-2017'=>2,'8-3-2017'=>5,'7-3-2017'=>4);
		
		echo json_encode($array);
	}


	function chart(){
		$id = $this->input->post('type');
		$array = array();
		if(isset($this->data['user_details'])){
			if($id=='day'){
				if($this->data['user_details']->account_type=='C'){
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where customer_id='".$this->data['user_details']->id."' GROUP BY Y,m,d ORDER BY  on_date ASC";
				}
				else{
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where user_id='".$this->data['user_details']->id."' GROUP BY Y,m,d ORDER BY  on_date ASC";
				}
				$result = $this->comman_model->get_query($query);
				if(!empty($result)){
					foreach($result as $set_data){
						if(!empty($set_data->date)){
							$array[$set_data->date] =(int)$set_data->problem_count;
						}				
					}
				}
			}
			else if($id=='month'){
				if($this->data['user_details']->account_type=='C'){
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where customer_id='".$this->data['user_details']->id."' GROUP BY Y,m ORDER BY  on_date ASC";
				}
				else{
				$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where user_id='".$this->data['user_details']->id."' GROUP BY Y,m ORDER BY  on_date ASC";
				}
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
				if($this->data['user_details']->account_type=='C'){
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where customer_id='".$this->data['user_details']->id."' GROUP BY Y ORDER BY  on_date ASC";
				}
				else{
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where user_id='".$this->data['user_details']->id."' GROUP BY Y ORDER BY  on_date ASC";
				}
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
				if($this->data['user_details']->account_type=='C'){
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where customer_id='".$this->data['user_details']->id."' GROUP BY Y,m,d ORDER BY  on_date ASC";
				}
				else{
					$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where user_id='".$this->data['user_details']->id."' GROUP BY Y,m,d ORDER BY  on_date ASC";
				}
				$result = $this->comman_model->get_query($query);
				if(!empty($result)){
					foreach($result as $set_data){
						if(!empty($set_data->date)){
							$array[$set_data->date] =(int)$set_data->problem_count;
						}				
					}
				}
			}
		}
///		echo $query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";

/*		$array = array('9-3-2016'=>4,'10-3-2016'=>6,'11-3-2016'=>2,'8-3-2016'=>5,'7-3-2016'=>4);*/
		echo json_encode($array);
	}

	function ajax_company_chart(){
		$id = $this->input->post('type');
		//$id = 'company';
		$array = array();
		if($id=='company'){
			//$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";
			$company = $this->comman_model->get_by('users',array('id'=>$this->data['user_details']->id),false,false,true);
			if(!empty($company)){
				$check = count($this->comman_model->get_by('problems',array('status'=>'Completed','done_user'=>'user','customer_id'=>$company->id),false,false,false));
/*				$array[$company->company_name] =(int)$check;*/
				$totalcheck = count($this->comman_model->get_by('problems',array('customer_id'=>$company->id),false,false,false));
				$array[$company->company_name] =(int)(($check*100)/$totalcheck);
			}
		}
		else if($id=='admin'){
			//$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";
			$company = $this->comman_model->get_by('users',array('id'=>$this->data['user_details']->id),false,false,true);
			if(!empty($company)){
				$check = count($this->comman_model->get_by('problems',array('status'=>'Completed','done_user'=>'admin','customer_id'=>$company->id),false,false,false));
				$totalcheck = count($this->comman_model->get_by('problems',array('customer_id'=>$company->id),false,false,false));
				$array[$company->company_name] =(int)(($check*100)/$totalcheck);
/*					$array[$company->company_name] =(int)$check;*/
			}
		}

///		echo $query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";

/*		$array = array('9-3-2016'=>4,'10-3-2016'=>6,'11-3-2016'=>2,'8-3-2016'=>5,'7-3-2016'=>4);*/
		echo json_encode($array);
	}

	function ajax_booking_chart(){

		$id = $this->input->post('type');
		$user_type = $this->input->post('user_type');
		//$user_type = 'ownner';
		$user_id = 'user_id';
		if($user_type=='ownner'){
			$user_id = 'ownner_id';
		}
		//$id = 'day';
		$array = array();
		if($id=='day'){
			$query = "SELECT on_date,  COUNT(user_orders.id) as user_orders_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ".$user_id."='".$this->data['user_details']->id."' GROUP BY Y ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query,false);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->on_date)){
						$array[$set_data->on_date] =(int)$set_data->user_orders_count;
					}				
				}
			}
		}
		else if($id=='month'){
			$query = "SELECT on_date,  COUNT(user_orders.id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ".$user_id."='".$this->data['user_details']->id."' GROUP BY Y,m ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query,false);
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
			$query = "SELECT on_date,  COUNT(user_orders.id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ".$user_id."='".$this->data['user_details']->id."' GROUP BY Y ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query,false);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->Y)){
						$array[$set_data->Y] =(int)$set_data->problem_count;
					}				
				}
			}
		}
		else{
			$query = "SELECT on_date,  COUNT(user_orders.id) as user_orders_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y FROM (`user_order_items`) JOIN `user_orders` ON `user_orders`.`id` = `user_order_items`.`order_id` WHERE payment=1 AND ".$user_id."='".$this->data['user_details']->id."' GROUP BY Y ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query,false);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->on_date)){
						$array[$set_data->on_date] =(int)$set_data->user_orders_count;
					}				
				}
			}
		}
		echo json_encode($array);
	}
}
