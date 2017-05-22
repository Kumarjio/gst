<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax_admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model(array('comman_model','language_model','settings_model'));
		$this->data['set_meta'] = '';	
		$redirect = false;
        $detail = $this->session->all_userdata();
        if(isset($detail['admin_session']['id'])){
            $this->data['admin_details'] =  $this->comman_model->get_by('admin',array('id'=>$detail['admin_session']['id']),FALSE,FALSE,TRUE);
        }
        
        //$this->data['template_css'] = base_url('templates/'.$this->data['settings']['template']).'/'.config_item('default_template_css');
	}
    
	function notification(){
		$rel = array();
		$rel['status']= "error";
		$rel['msg']= '';
		$rel['sound'] = 0;
		$rel['order_count'] = 0;
		$rel['payapal_order_count'] = 0;
		if(isset($this->data['admin_details'])){
			$rel['status']= "ok";
			$orderSound  = $this->comman_model->get_by('user_orders',array('admin_sound'=>0,'payment'=>1),false,false,false);	
			if($orderSound){
				$this->db->where(array('payment'=>1));
				$this->db->set('admin_sound', '1', FALSE);
				$this->db->update('user_orders');
				$rel['sound'] = 1;
			}

			$deliveryOrderCount = count($this->comman_model->get_by('user_orders',array('admin_read'=>0,'payment'=>1),false,false,false));
			if($deliveryOrderCount){
				$rel['order_count'] = $deliveryOrderCount;
			}
		}		
		echo json_encode($rel);
	}    

	function ajax_chart_d(){
		$array = array('29-04-2017'=>4,'30-04-2017'=>6,'2-05-2017'=>2,'3-05-2017'=>5,'4-05-2017'=>4);
		echo json_encode($array);
	}

	function ajax_chart(){
		$id = $this->input->post('type');
		$array = array();
		if($id=='day'){
			$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";
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
			$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m ORDER BY  on_date ASC";
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
				$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems where YEAR(on_date)='".date('Y')."' GROUP BY Y ORDER BY  on_date ASC";
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
			$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";
			$result = $this->comman_model->get_query($query);
			if(!empty($result)){
				foreach($result as $set_data){
					if(!empty($set_data->date)){
						$array[$set_data->date] =(int)$set_data->problem_count;
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
			$company = $this->comman_model->get_by('users',array('account_type'=>'C'),false,false,false);
			if(!empty($company)){
				foreach($company as $set_data){
					$check = count($this->comman_model->get_by('problems',array('status'=>'Completed','done_user'=>'user','customer_id'=>$set_data->id),false,false,false));
					$array[$set_data->company_name] =(int)$check;
				}
			}
		}
		else if($id=='admin'){
			//$query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";
			$company = $this->comman_model->get_by('users',array('account_type'=>'C'),false,false,false);
			if(!empty($company)){
				foreach($company as $set_data){
					$check = count($this->comman_model->get_by('problems',array('status'=>'Completed','done_user'=>'admin','customer_id'=>$set_data->id),false,false,false));
					$array[$set_data->company_name] =(int)$check;
				}
			}
		}

///		echo $query = "SELECT date, COUNT(id) as problem_count, DAY(on_date)AS d, MONTH(on_date) AS m,YEAR(on_date) AS Y  FROM problems GROUP BY Y,m,d ORDER BY  on_date ASC";

/*		$array = array('9-3-2016'=>4,'10-3-2016'=>6,'11-3-2016'=>2,'8-3-2016'=>5,'7-3-2016'=>4);*/
		echo json_encode($array);
	}
	
}