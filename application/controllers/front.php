<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends Frontend_Controller {
	public $_subView = 'templates/';
	public function __construct(){
		parent::__construct();
		$this->load->helper('cookie');
/*		$logged_in = $this->session->userdata('user_session');
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}*/
	}


	
	function visitor(){
		$ip_address = $this->input->ip_address();
		$time = time();
		$check = $this->comman_model->get_by('visitor_activity',array('ip_address'=>$ip_address,'visit_date >='=>strtotime(date('d-m-Y 00:00:00',time())),'visit_date <='=>strtotime(date('d-m-Y 23:59:59',time()))),false,false,false);
		//echo $this->db->last_query();
		if(!count($check)){
			$this->comman_model->save('visitor_activity',array('visit_date'=>$time,'ip_address'=>$ip_address));
		}
		//var_dump($check);
	}


	public function index($id = false){
		//$this->visitor();
		$this->data['set_meta'] = 'home';
		$this->data['active'] = 'home';
		$this->data['slider'] = 'home';
		$this->data['search_home'] = true;
        //$this->data['subview'] = $this->_subView.'index';	
		$this->data['title'] = $this->data['settings']['site_name'];
		$this->load->view($this->_subView.'index',$this->data);
	}

	function active(){
		$this->data['title'] = $this->data['settings']['site_name'];
		$this->load->view($this->_subView.'active',$this->data);
	}
	function hotelapi(){
		//echo 77; die('here');
		$username = "gosearchtr";
		$password = "gosearchtrapi";
		$handle=curl_init('https://distribution-xml.booking.com/json/bookings.getHotels?countrycodes=in');
		curl_setopt($handle, CURLOPT_USERPWD, $username . ":" . $password);  
		curl_setopt($handle, CURLOPT_VERBOSE, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		$content = curl_exec($handle);
		$results = json_decode($content, true);
		echo '<pre>';print_r($results);
	}
	function hotelapilist(){
		$username = "gosearchtr";
		$password = "gosearchtrapi";
		$handle=curl_init('https://distribution-xml.booking.com/json/bookings.getHotels?countrycodes=in');
		curl_setopt($handle, CURLOPT_USERPWD, $username . ":" . $password);  
		curl_setopt($handle, CURLOPT_VERBOSE, true);
		curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		$content = curl_exec($handle);
		$results = json_decode($content, true);
		?>
		<table>
				<th>Hotel Name</th>
				<th>City Name</th>
				<th>Country Code</th>
				<th>Min Rate</th>
				<th>Max Rate</th>
				<th>Address</th>
				<th>url</th>
			
			<?php
		foreach($results as $detail){
			?>
			<tr>
			<td><?php echo $detail['name'];?></td>
			<td><?php echo $detail['city'];?></td>
			<td><?php echo $detail['countrycode'];?></td>
			<td><?php echo $detail['minrate'];?></td>
			<td><?php echo $detail['maxrate'];?></td>
			<td><?php echo $detail['address'];?></td>
			<td><?php echo $detail['url'];?></td>
			</tr>
			<?php
			
		}
		?>
		</table>
		<?php
	}
	function apirecord(){
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,"http://partners.api.skyscanner.net/apiservices/reference/v1.0/countries/az-AZ?apiKey=go743168210373036977748833709559");
		// Execute
		$result=curl_exec($ch);
		// Closing
		curl_close($ch);
		$results = json_decode($result, true);
		//echo '<pre>';print_r($results);
		foreach($results['Countries'] as $detail){
		?>
		<table>
		<tr>
			<th>Code</th>
			<th>Country Name</th>
		</tr>
		<tr>
			<td><?php echo $detail['Code']?></td>
			<td><?php echo $detail['Name']?></td>
		</tr>
		</table>
		<?php
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */