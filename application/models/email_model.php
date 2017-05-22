<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {
    public $email_rules = array(
                    'subject' =>array('field'=>'subject','label'=>'Subject','rules'=>'trim|required'),
                    'message' =>array('field'=>'message','label'=>'Message','rules'=>'trim|required'),                    
                    ); 

					
	function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
	
	
	    
//  Function to verify the user login credentials.
	function verifyUserLogin($user_name, $user_password)
	{
		
		 $query = $this->db->get_where('admin',array('adminname'=>$user_name ,'password'=>md5($user_password), 'status'=>1));
		//echo $this->db->last_query();die;
		return $query->row_array();
	}

	function update_password($old_pass,$new_pass,$id){
		$array = array('id' =>$id,'password'=>md5($old_pass));
		$update = array('password'=>md5($new_pass));
		$query = $this->db->get_where('admin',$array);
		//echo $this->db->last_query();die;
		if($query->row_array()){
			$this->db->where('id', $id);
			$this->db->update('admin', $update); 
			return 'yes';
		}
		else{
			return 'no';
		}
	}
	
						
}

// END Admin_model Class

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */