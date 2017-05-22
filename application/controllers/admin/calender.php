<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calender extends Admin_Controller {
	public $_table_names = 'user_order_items';
	public $_subView = 'admin/calender/';
	public $_redirect = '/calender';
	public function __construct(){
    	parent::__construct();
		$this->data['active'] = 'Calender';

        $this->data['_add'] = $this->data['admin_link'].$this->_redirect.'/create';
        $this->data['_edit'] = $this->data['admin_link'].$this->_redirect.'/edit';
        $this->data['_view'] = $this->data['admin_link'].$this->_redirect.'/view';
        $this->data['_cancel'] = $this->data['admin_link'].$this->_redirect;
        $this->data['_delete'] = $this->data['admin_link'].$this->_redirect.'/delete';
        $this->data['_appointment'] = $this->data['admin_link'].$this->_redirect.'/ajax_appointment';

        $this->data['content_language_id'] = $this->language_model->get_defualt_lang();
    	$this->load->model(array('order_model'));

		
		$redirect = false;
		if($this->data['admin_details']->default=='0'){
			if($this->data['admin_details']->is_order==1){}
			else{
				$redirect = true;
			}
		}
		if($redirect){
			$this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}

	}

	function checkPremission($type=false){
		$redirect = false;
		
		if($this->data['admin_details']->default=='0'){
			if($type=='is_order'){
				if($this->data['admin_details']->is_order==1){}
				else{
					$redirect = true;
				}
			}
			else if($type =='is_payment'){
				if($this->data['admin_details']->is_payment==1){}
				else{
					$redirect = true;
				}
			}
		}
		if($redirect){
            $this->session->set_flashdata('error','Sorry ! You have no permission.');
			redirect($this->data['admin_link'].'/dashboard');
		}
	}

	//  Landing page of admin section.
	function index(){
		//$this->data['table'] = true;
        $this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],15200).'Calender';
        $this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['all_data'] = $this->comman_model->get($this->_table_names,false);

		$all_orders = $this->comman_model->get_by('user_orders',array('payment'=>1), FALSE, FALSE,false);
		$this->data['all_items'] = 0;
		$this->data['cancel_count'] = 0;
		$this->data['done_count'] = 0;
		if($all_orders){
			foreach($all_orders as $set_order){
				$check_item = $this->comman_model->get_by('user_order_items',array('order_id'=>$set_order->id),false,false,false);
				if($check_item){
					foreach($check_item as $set_data){
						if($set_data->type=='Service'){
							$this->data['all_items']++;
							if($set_data->is_done==2){
								$this->data['cancel_count']++;
							}
							else if($set_data->is_done==1){
								$this->data['done_count']++;
							}						
						}
					}
				}		
			}
						
		}

        $this->data['subview'] = $this->_subView.'index';	
		$this->load->view('admin/_layout_main',$this->data);
	}




	function view($id=false){
	    if(!$id){
			redirect($this->data['_cancel']);				
		}
		$this->data['name'] = show_static_text($this->data['adminLangSession']['lang_id'],2540).'View';
		$this->data['title'] = $this->data['name'].' | '.$this->data['settings']['site_name'];
		$this->data['order_items'] = $this->comman_model->get_by($this->_table_names,array('id'=>$id,), FALSE, FALSE, true);
		if(!$this->data['order_items']){
			echo 'asd';
		//    redirect($this->data['_cancel']);				
		}
		$this->data['orders'] = $this->comman_model->get_by('user_orders',array('id'=>$this->data['order_items']->order_id,'payment'=>1), FALSE, FALSE, true);
		if(!$this->data['orders']){
			echo 'asdas';
		   // redirect($this->data['_cancel']);				
		}
		$this->data['product'] = $this->comman_model->get_lang('products',$this->data['adminLangSession']['lang_id'],NULL,array('id'=>$this->data['order_items']->product_id),'product_id',true);
		if(!$this->data['product']){
			echo 'asdasjak';
		//	redirect($this->data['_cancel']);				
		}
		$options = unserialize($this->data['order_items']->order_content);
		$this->data['date'] = $options['user_date'].' '.$options['user_time'];
		$this->data['member'] = $this->data['order_items']->quantity;

		$this->data['trainer'] = $this->comman_model->get_by('users',array('id'=>$this->data['orders']->user_id), FALSE, FALSE, true);
		$this->data['provider'] = $this->comman_model->get_by('users',array('id'=>$this->data['orders']->store_id), FALSE, FALSE, true);


        $this->data['subview'] = $this->_subView.'/view';			
		$this->load->view('admin/_layout_main',$this->data);
	}




	function get_status(){
		$id = $this->input->post('id');
		$post_data = array('status'=>$this->input->post('status'));
		$result = $this->comman_model->save($this->_table_names,$post_data,$id);
	}

	function ajax_appointment(){
		$appointments =array();
		$check_orders = $this->comman_model->get_by('user_orders',array('payment'=>1),false,false,false);
		if($check_orders){
			foreach($check_orders  as $set_order){
				$check_item = $this->comman_model->get_by('user_order_items',array('order_id'=>$set_order->id),false,false,false);
				$user_data = $this->comman_model->get_by('users',array('id'=>$set_order->user_id),false,false,true);
				$productName = '-';
				if($user_data){
					$productName = '<b>User:</b> '.$user_data->username.'<br>';
				}
				else{
					$productName = '';
				}

				$user_data = $this->comman_model->get_by('users',array('id'=>$set_order->store_id),false,false,true);
				if($user_data){
					$productName .= '<b>Provider:</b> '.$user_data->username.'<br>';
				}
				if($check_item){
				//echo 'asd';
					foreach($check_item as $set_data){
						$options = unserialize($set_data->order_content);
						if($options['product_type']=='Service'){
							$product_data = $this->comman_model->get_lang('products',$this->data['adminLangSession']['lang_id'],NULL,array('id'=>$set_data->product_id),'product_id',true);
							if($product_data){
								$productName .= ' ('.$product_data->title.')';
							}
							else{
								$productName .= ' ('.$options['productName'].')';
							}
							$color = '#5cb85c';
							if($set_data->is_done==2){
								$color = '#C00';
							}

							$appointments[] = array('title'=>$productName,'start'=>date("Y-m-d", strtotime($options['user_date'])),'url'=>$this->data['_view'].'/'.$set_data->id,'color' =>$color);
						}
					}
				}		
			}
		}
		echo json_encode($appointments);
	}
	
	function ajax_appointmentqw(){
		$appointments =array();
	
			$check_orders = $this->comman_model->get_by('user_orders',array('store_id'=>$this->data['user_details']->id),false,false,false);
		if($check_orders){
			foreach($check_orders  as $set_pro){
				$html = $set_pro->name;
				if($set_pro->user_id!=0){
					$user_data = $this->comman_model->get_by('users',array('id'=>$set_pro->ownner_id),false,false,true);
					if($user_data){
						$html .= '<br><b>Trainer:</b> '.$user_data->first_name.' '.$user_data->last_name;
					}
				}
				if($set_pro->user_id!=0){
					$user_data = $this->comman_model->get_by('users',array('id'=>$set_pro->user_id),false,false,true);
					if($user_data){
						$html .= '<br><b>Username:</b> '.$user_data->first_name.' '.$user_data->last_name;
					}
				}
				
				$appointments[] = array('title'=>$html.'<br>','start'=>date('Y-m-d',strtotime($set_pro->{'date'})),'url'=>$this->data['_cancel'].'/view/'.$set_pro->id,'description'=>$html);

			}
		
		
/*				$query = "SELECT * FROM stores_excel WHERE store_id= ".$id." AND YEAR(date)=".date('Y')." order by date desc";
			$newExcel= $this->comman_model->get_query($query,true);
			if($newExcel){
				$query = "SELECT * FROM stores_booking WHERE store_id= ".$id." AND file_id=".$newExcel->id;
				$date_file_data = $this->comman_model->get_query($query,false);
				if($date_file_data){
					$i=0;
					foreach($date_file_data as $set_file_data){
						$html = '<b>Room:</b> '.$totalRoom.'<br><b>Booked:</b> '.$set_file_data->room.'<br><b>Price:</b> €'.round($set_file_data->price,2);
						$appointments[] = array('title'=>$html,'start'=>date("Y-m-d", strtotime($set_file_data->on_date)),'description'=>$html,'color' =>'#F48024');
						$i++;
					}
				}
			}*/
		
	}
	echo json_encode($appointments);		
}

	function delete($id = false){
		if(!$id){
			redirect($this->data['_cancel']);
		}
		$this->comman_model->delete_by_id($this->_table_names,array('id'=>$id));

		$this->session->set_flashdata('success',show_static_text($this->data['adminLangSession']['lang_id'],297)); 
		redirect($this->data['_cancel']);		

	}
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */