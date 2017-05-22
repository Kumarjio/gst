<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax_product extends CI_Controller {
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
	
	function api1(){
		$output = array();
		$output['status']= 'ok';
		if (!$this->input->is_ajax_request()) {
		  // exit('No direct script access allowed');
		}
		$key = $this->input->get('query');
		$array = array();
		if($key){
//			echo "select cityName from airports where cityName like '%".$key."%'";
			$data = $this->comman_model->get_query("select cityName from airports where cityName like '%".$key."%'",false);
			if($data){
				foreach($data as $set_data){
					$array[] = $set_data->cityName;
				}
			}
		}
		echo json_encode ($array); //Return the JSON Array
	}

	function api(){
		$output = array();
		$output['status']= 'ok';
		if (!$this->input->is_ajax_request()) {
		  // exit('No direct script access allowed');
		}
		$key = $this->input->get('query');
		$array = array();
		if($key){
//			echo "select cityName from airports where cityName like '%".$key."%'";
			$data = $this->comman_model->get_query("select id,cityName, countryName,code from airports where cityName like '".$key."%'",false);
			if($data){
				foreach($data as $set_data){
					$array[] = array('id'=>$set_data->id,'text'=>$set_data->id,'value'=>'<div class="row no-margin"><span class="pull-left">'.$set_data->cityName.', '.$set_data->countryName.'</span><span class="pull-right"> ('.$set_data->code.')</span></div>');
					//$array[] = $set_data->cityName;
				}
			}
		}
		$output['results'] =$array;
		echo json_encode ($output); //Return the JSON Array
		//echo json_encode ($array); //Return the JSON Array
	}
	


	function airport(){
		$output = array();
		$output['status']= 'ok';
		if (!$this->input->is_ajax_request()) {
		  // exit('No direct script access allowed');
		}
		$array = array();
//			echo "select cityName from airports where cityName like '%".$key."%'";
		$data = $this->comman_model->get_query_array("select * from airports ",false);
		if($data){
			foreach($data as $set_data){
				$array[] = $set_data;
				//$array[] = $set_data->cityName;
			}
		}
		echo json_encode ($array); //Return the JSON Array
		//echo json_encode ($array); //Return the JSON Array
	}
	function set_like(){
		$msge = array();
		$msge['result']= 'error';
		$msge['msg']= 'login_error';		
		//$msg = 0;
		$id = $this->input->post('productID');
		$type = $this->input->post('type');
		$user_data = $this->session->all_userdata();
		if(isset($this->data['user_details'])){
			$check = $this->comman_model->get_by('products_like',array('user_id'=>$this->data['user_details']->id,'product_id'=>$id),false,false,false);
			if(count($check)==0){
				$this->comman_model->save('products_like',array('user_id'=>$this->data['user_details']->id,'ip_address'=>$this->input->ip_address(),'type'=>$type,'product_id'=>$id));
				//$msg =1;
				$count =$this->comman_model->get_by('products_like',array('product_id'=>$id),false,false,false);
				//$msge['result'] = 'success';				
				$msge['result'] = 'success';				
				$msge['msg']= 1;		
				$msge['like_count'] =count($this->comman_model->get_by('products_like',array('type'=>'like','product_id'=>$id),false,false,false));
				$msge['dilike_count'] =count($this->comman_model->get_by('products_like',array('type'=>'dislike','product_id'=>$id),false,false,false));
			}
			else{						
				$msge['result']= 'error';
				$msge['msg']= 'already_set';		
			}
		}
		else{
			$msge['result']= 'error';
			$msge['msg']= 'login_error';		
		}
		echo json_encode($msge);
		//echo $msg;
	
	}

	function set_wishlist(){
		$msge = array();
		$msge['result']= 'error';
		$msge['msg']= 'login_error';		
		//$msg = 0;
		$id = $this->input->post('productID');
		$user_data = $this->session->all_userdata();
		if(isset($this->data['user_details'])){
			if($this->data['user_details']->account_type=='B'){
				$check =$this->comman_model->get_by('product_wishlist',array('user_id'=>$this->data['user_details']->id,'product_id'=>$id),false,false,false);
				if(count($check)==0){
					$this->comman_model->save('product_wishlist',array('user_id'=>$this->data['user_details']->id,'product_id'=>$id));
					//$msg =1;
					$count =$this->comman_model->get_by('product_wishlist',array('product_id'=>$id),false,false,false);
					//$msge['result'] = 'success';				
					$msge['result'] = 'success';				
					$msge['msg']= 1;		
					$msge['count'] =count($count);
				}
				else{
					$this->comman_model->delete('product_wishlist',array('user_id'=>$this->data['user_details']->id,'product_id'=>$id));
					$msg = 2;
					$count =$this->comman_model->get_by('product_wishlist',array('product_id'=>$id),false,false,false);
					$msge['result'] = 'success';
					$msge['msg']= 2;		
					$msge['count'] =count($count);
/*					$msge['result'] = 'error';				
					$msge['msg']= 'already_set';*/							
				}
			}			
		}
		echo json_encode($msge);
		//echo $msg;
	
	}
	
	function delete_wishlist(){		
		$msg = 0;
		$id = $this->input->post('id');
		$user_data = $this->session->all_userdata();
		if(isset($this->data['user_details'])){
			if($this->data['user_details']->account_type=="B"){
				$check =$this->comman_model->get_by('products_like',array('user_id'=>$this->data['user_details']->id,'id'=>$id),false,false,true);
				if($check){
					$this->comman_model->delete('products_like',array('user_id'=>$this->data['user_details']->id,'id'=>$id));
					$msg =1;
				}
			}			
		}
		echo $msg;		
	}

	function ajaxProductList(){
		$msge = array();
		$msge['status']= 'ok';
		$id = $this->input->post('id');
		$lang_id = $this->input->post('lang_id');

/*		$id = 1;
		$lang_id = 1;*/
		$option = '<option value="">Select</option>';
		if($id){
			$this->db->order_by('title','asc');
			
//			$where = "FIND_IN_SET('".$searchterm."', columnName)";  
			$where = "find_in_set('".$id."',airport) <>0";

			$this->db->where( $where ); 
			$result = $this->comman_model->get_lang('products',$lang_id,NULL,array('enabled'=>1),'product_id',false);
			if($result){
				foreach($result as $set_result){
					$option .='<option value="'.$set_result->id.'">'.$set_result->title.'</option>';
				}
			}
		}
		$msge['msge'] = $option;
		echo json_encode($msge);
	}

	function getUser(){		
		$msge = array();
		$msge['status']= 'ok';
		$date = $this->input->post('date');
		$time = $this->input->post('u_time');
		$p_id = $this->input->post('p_id');
/*		$date = '01-06-2016';
		$p_id = 6;
		$time = '9:00';*/
		$STime = strtotime($time);
		$option = '<option value="0">Select</option>';
		if($date&&$p_id&&$time){
			$day = date('l',strtotime($date));
			if($day=='Monday'){
				$this->db->where('is_mon',1);
			}
			else if($day=='Tuesday'){
				$this->db->where('is_tue',1);
			}
			else if($day=='Wednesday'){
				$this->db->where('is_wed',1);
			}
			else if($day=='Thursday'){
				$this->db->where('is_thr',1);
			}
			else if($day=='Friday'){
				$this->db->where('is_fri',1);
			}
			else if($day=='Saturday'){
				$this->db->where('is_sat',1);
			}
			else {
				$this->db->where('is_sun',1);
			}
//			$query = "select * from users_datetime where find_in_set('".$day."',day) <> 0 and user_id =".$p_id;
			$result = $this->comman_model->get_by('users_datetime',array('user_id'=>$p_id),false,false,false);
			//echo $this->db->last_query();
			if($result){

				foreach($result as $set_result){
					$uTimeS = ''; 
					$uTimeE = ''; 					
					if($day=='Monday'){
						if($set_result->mon_s_time&&$set_result->mon_e_time){
							$uTimeS = strtotime($set_result->mon_s_time); 
							$uTimeE = strtotime($set_result->mon_e_time); 
						}
					}
					else if($day=='Tuesday'){
						if($set_result->tue_s_time&&$set_result->tue_e_time){
							$uTimeS = strtotime($set_result->tue_s_time); 
							$uTimeE = strtotime($set_result->tue_e_time); 
						}
					}
					else if($day=='Wednesday'){
						if($set_result->wed_s_time&&$set_result->wed_e_time){
							$uTimeS = strtotime($set_result->wed_s_time); 
							$uTimeE = strtotime($set_result->wed_e_time); 
						}
					}
					else if($day=='Thursday'){
						if($set_result->thr_s_time&&$set_result->thr_e_time){
							$uTimeS = strtotime($set_result->thr_s_time); 
							$uTimeE = strtotime($set_result->thr_e_time); 
						}
					}
					else if($day=='Friday'){
						if($set_result->fri_s_time&&$set_result->fri_e_time){
							$uTimeS = strtotime($set_result->fri_s_time); 
							$uTimeE = strtotime($set_result->fri_e_time); 
						}
					}
					else if($day=='Saturday'){
						if($set_result->sat_s_time&&$set_result->sat_e_time){
							$uTimeS = strtotime($set_result->sat_s_time); 
							$uTimeE = strtotime($set_result->sat_e_time); 
						}
					}
					else {
						if($set_result->sun_s_time&&$set_result->sun_e_time){
							$uTimeS = strtotime($set_result->sun_s_time); 
							$uTimeE = strtotime($set_result->sun_e_time); 
						}
					}
					if($uTimeE&&$uTimeS){
						if($STime>=$uTimeS&&$uTimeE>=$STime){
							//echo 'asd';
							$user_data = $this->comman_model->get_by('users',array('id'=>$set_result->staff_id),false,false,true);
							if($user_data){
								$is_leave = false;
								$checkLeave = $this->comman_model->get_by('users_leave',array('staff_id'=>$set_result->staff_id),false,false,false);
								if(!$checkLeave){
								}
								else{
									foreach($checkLeave as $set_l){
										$lDate = strtotime($set_l->s_date);
										$cDate = strtotime($date);
										if($cDate==$lDate){
											$is_leave = true;
										}
									}
								}
								if($is_leave==false){
									$option .='<option value="'.$user_data->id.'">'.$user_data->first_name.' '.$user_data->last_name.'</option>';
								}
							}
						}
					}
				}
			}
		}
		$msge['msge'] = $option;
		echo json_encode($msge);
	}

	function getUser_back(){	
		$msge = array();
		$msge['status']= 'ok';
		$date = $this->input->post('date');
		$p_id = $this->input->post('p_id');
/*		$date = '01-06-2016';
		$p_id = 6;*/
		$option = '<option value="0">Select</option>';
		if($date&&$p_id){
			$day = date('l',strtotime($date));
			$query = "select * from users_datetime where find_in_set('".$day."',day) <> 0 and user_id =".$p_id;
			$result = $this->comman_model->get_query($query,false);
			if($result){
				foreach($result as $set_result){
					$user_data = $this->comman_model->get_by('users',array('id'=>$set_result->staff_id),false,false,true);
					if($user_data){
						$is_leave = false;
						$checkLeave = $this->comman_model->get_by('users_leave',array('staff_id'=>$set_result->staff_id),false,false,false);
						if(!$checkLeave){
						}
						else{
							foreach($checkLeave as $set_l){
								$lDate = strtotime($set_l->s_date);
								$cDate = strtotime($date);
								if($cDate==$lDate){
									$is_leave = true;
								}
							}
						}
						if($is_leave==false){
							$option .='<option value="'.$user_data->id.'">'.$user_data->first_name.' '.$user_data->last_name.'</option>';
						}
					}
				}
			}
		}
		$msge['msge'] = $option;
		echo json_encode($msge);
	}
	
	function check_users(){
		$nowtime =time();
		$checkMembership =  $this->comman_model->get_by('users',array('plan_id !='=>0),FALSE,FALSE,false);
		if($checkMembership){
			foreach($checkMembership as $set_mem){
				if($set_mem->plan_month<120){
					$userPlan = strtotime('+'.$set_mem->plan_month.' month',strtotime($set_mem->plan_date));	
					//echo '<br>Now: '.date('d-m-Y H:i:s',$nowtime);	
					//echo '<br>user: '.date('d-m-Y H:i:s',$userPlan);	
					if($nowtime>$userPlan){
						//echo 'asd';
						$this->db->where('id', $set_mem->id);
						$this->db->set('plan_date',NULL, TRUE);
						$this->db->set('plan_datetime',NULL, TRUE);
						$this->db->set('plan_id',0, TRUE);
						$this->db->update('users');
					}
				}
			}
		}
		echo 'ok';
	}


}
