<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
    public $rules_password =  array(
              'old_password'=> array(
                     'field'   => 'old_password',
                     'label'   => 'Old Password',
                     'rules'   => 'trim|required|callback__check_old_password'
                  ),
              'password'=> array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required'
                  ),
              'password_confirm'=> array(
                     'field'   => 'password_confirm',
                     'label'   => 'Confirm Password',
                     'rules'   => 'trim|required|matches[password]'
                  ));

    public $update_rules = array(
			//'username' =>array('field'=>'username','label'=>'Userame','rules'=>'trim|required|callback__unique_user'),
			'first_name' =>array('field'=>'first_name','label'=>'First Name','rules'=>'trim|required'),
			'last_name' =>array('field'=>'last_name','label'=>'Last Name','rules'=>'trim|required'),
			'phone' =>array('field'=>'phone','label'=>'Phone','rules'=>'trim|required|integer'),
			'address' =>array('field'=>'address','label'=>'Address','rules'=>'trim|required'),
   );


    public $update_service_user_rules = array(
			//'username' =>array('field'=>'username','label'=>'Userame','rules'=>'trim|required|callback__unique_user'),
			'first_name' =>array('field'=>'first_name','label'=>'First Name','rules'=>'trim|required'),
			'last_name' =>array('field'=>'last_name','label'=>'Last Name','rules'=>'trim|required'),
			'phone' =>array('field'=>'phone','label'=>'Phone','rules'=>'trim|required|integer'),
			'address' =>array('field'=>'address','label'=>'Address','rules'=>'trim|required'),

   );
						
    public $update_customer_rules = array(
			'username' =>array('field'=>'username','label'=>'Userame','rules'=>'trim|required|callback__unique_user'),
			'first_name' =>array('field'=>'first_name','label'=>'First Name','rules'=>'trim|required'),
			'last_name' =>array('field'=>'last_name','label'=>'Last Name','rules'=>'trim|required'),
			'phone' =>array('field'=>'phone','label'=>'Phone','rules'=>'trim|required|integer'),
			'address' =>array('field'=>'address','label'=>'Address','rules'=>'trim|required'),

			'api_username' =>array('field'=>'api_username','label'=>'Api username','rules'=>'trim|required'),
			'api_signature' =>array('field'=>'api_signature','label'=>'Api signature','rules'=>'trim|required'),
			'api_password' =>array('field'=>'address','label'=>'Api Password','rules'=>'trim|required'),
			'bank_name' =>array('field'=>'bank_name','label'=>'Bank Name','rules'=>'trim|required'),
			'bank_account' =>array('field'=>'bank_account','label'=>'Bank Account','rules'=>'trim|required'),
   );


    public $create_user_rules = array(
        'first_name' => array('field'=>'first_name', 'label'=>'Name', 'rules'=>'trim|required'),
        'last_name' => array('field'=>'last_name', 'label'=>'Surname', 'rules'=>'trim|required'),
		'email' =>array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]'),
        'password' => array('field'=>'password', 'label'=>'password', 'rules'=>'trim|required'),
        //'email' => array('field'=>'email', 'label'=>'email', 'rules'=>'trim|required|max_length[100]|callback__unique_email|xss_clean'),
   );


    function __construct(){
        parent::__construct();
    }

	function get_user_new(){
        $users = new stdClass();
        //$tags->parent_id = 0;
        $users->first_name	 	= '';
        $users->last_name		= '';
        $users->password		= '';
        $users->email 			= '';
/*        $users->is_ = '';*/
        
        return $users;
	}   

    
}



/* End of file super_admin_model.php */
/* Location: ./system/application/models/super_admin_model.php */
?>