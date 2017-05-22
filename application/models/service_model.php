<?php

class service_model extends MY_Model {
    
    protected $_table_name = 'services';
    protected $_order_by = 'parent_id, order, id';
    public $rules = array(
        'parent_id' => array('field'=>'parent_id', 'label'=>'lang:Parent', 'rules'=>'trim|intval'),
        'language_id' => array('field'=>'language_id', 'label'=>'lang:Language', 'rules'=>'trim|intval'),
//        'name' => array('field'=>'name', 'label'=>'Name', 'rules'=>'trim|'),
        'name' => array('field'=>'name', 'label'=>'Slug', 'rules'=>'trim|required|max_length[100]|url_title|xss_clean'),
        'description' => array('field'=>'description', 'label'=>'Description', 'rules'=>'trim|reuqired'),
   );

    public $feedback_rules = array(
        'title' => array('field'=>'title', 'label'=>'Title', 'rules'=>'trim|required|max_length[100]'),
        'description' => array('field'=>'description', 'label'=>'description', 'rules'=>'trim|required'),
   );

    public $case_rules = array(
        'parent_id' => array('field'=>'parent_id', 'label'=>'lang:Parent', 'rules'=>'trim|intval'),
        'language_id' => array('field'=>'language_id', 'label'=>'lang:Language', 'rules'=>'trim|intval'),
        'name' => array('field'=>'name', 'label'=>'Name', 'rules'=>'trim|required'),
        'open_date' => array('field'=>'open_date', 'label'=>'Open date', 'rules'=>'trim'),
        //'billing_type' => array('field'=>'billing_type', 'label'=>'Bill Type', 'rules'=>'trim'),
        'number' => array('field'=>'number', 'label'=>'Number', 'rules'=>'trim|reuqired'),
        'description' => array('field'=>'description', 'label'=>'Description', 'rules'=>'trim'),
   );

    public $u_service_rules = array(
        'name' => array('field'=>'name', 'label'=>'Name', 'rules'=>'trim|required'),
        'price' => array('field'=>'price', 'label'=>'Price', 'rules'=>'trim|numerice|required'),
        'description' => array('field'=>'description', 'label'=>'Description', 'rules'=>'trim'),
   );
   
   public $rules_lang = array();
   
	public function __construct(){
		parent::__construct();
        $this->languages = $this->language_model->get_form_dropdown('language', FALSE, FALSE);
        $this->languages_icon = $this->language_model->get_form_dropdown('image', FALSE, FALSE);
                                  
        //Rules for languages
        foreach($this->languages as $key=>$value){
            $this->rules_lang["title_$key"] = array('field'=>"title_$key", 'label'=>'lang:Title', 'rules'=>'trim|required|xss_clean');
			$this->rules_lang["body_$key"] = array('field'=>"body_$key", 'label'=>'lang:Body', 'rules'=>'trim');
		}
	}

    public function get_new_feedback(){
        $feedback = new stdClass();
        $feedback->description = '';
        $feedback->title = '';
        $feedback->rate = '';
       // $feedback->company_name = '';
        
        return $feedback;
	}

    public function get_new()
	{
        $categories = new stdClass();
		$categories->parent_id = 0;
        $categories->category_id = 0;
        $categories->language_id = 0;
        $categories->type = '';
        $categories->name = '';
        $categories->description = '';
        $categories->field_name = '';
        $categories->enabled = '';
        //Add language parameters
        foreach($this->languages as $key=>$value)
        {
            $categories->{"title_$key"} = '';
            //$page->{"slug_$key"} = '';
            $categories->{"body_$key"} = '';
            //$tags->{"kampaign_$key"} = '';
            //$tags->{"short_description_$key"} = '';
            //$tags->{"keywords_$key"} = '';
        }

        return $categories;
	}

    public function get_new_user()
	{
        $categories = new stdClass();
        $categories->parent_id = 0;
        $categories->s_id = 0;
        $categories->price = 0;
        $categories->type = '';
        $categories->service_id = '';
        $categories->name = '';
        $categories->open_date = date('d-m-Y');
        $categories->number = '';
        $categories->description = '';
        $categories->field_name = '';
        $categories->enabled = '';

        return $categories;
	}




    public function get_templates($template_prefix)
    {
        $CI =& get_instance();
        
        $templates = array();

        $templates = array(
							'string' => 'String',
							'text' => 'Textarea',
							'date' => 'Date',
							);
        return $templates;
    }

	function get_product_options($product_id,$level=false){		
		$this->db->where('service_id',$product_id); 
		if($level){
			$this->db->where('level',$level); 
		}
		$this->db->order_by('order', 'ASC');
		
		$result	= $this->db->get('services_attr');
		
		$return = array();
		foreach($result->result() as $option)
		{
			$return[]	= $option;
		}
		return $return;
	}

	function copy_process($oldProcess,$newProcess){
		$this->db->where(array('service_id'=>$oldProcess));
		$check_new = $this->db->get('services_attr')->result();
		if($check_new){
			foreach($check_new as $value){
				$option =array(
								'service_id'=>$newProcess,
								'level'=>$value->level,
								'name'=>$value->name,
								'order'=>$value->order,
								'order'=>$value->order,
								'type'=>$value->type,
								'values'=>$value->values,
								'user_type'=>$value->user_type,
								'editable'=>$value->editable,
								'is_visible'=>$value->is_visible,
								'created_by'=>'user',
								);
				$this->db->insert('services_attr', $option);
				$this->db->insert_id();
			}
		}
		
/*		die;*/
	}

	function save_case_lawyer($lawyer,$rates,$billing_type,$service_id,$workflow,$id,$owner){
/*		echo '<pre>';
		print_r($lawyer);*/
		if($lawyer){
			foreach($lawyer as $key=>$value){
				$option =array(
								'user_id'=>$value,
								'rate'=>$rates[$key],
								'service_id'=>$service_id[$key],
								'workflow'=>$workflow[$key],
								'owner_id'=>$owner,
								'case_id'=>$id,
								'billing_type'=>$billing_type[$key],
								);
				
				$this->db->where(array('user_id'=>$value,'case_id'=>$id,'owner_id'=>$owner,'service_id'=>$service_id[$key],));
				$check_uptdate = $this->db->get('cases_user')->row();
				if($check_uptdate){
					$this->db->where(array('user_id'=>$value,'case_id'=>$id,'owner_id'=>$owner,'service_id'=>$service_id[$key],));
					$this->db->update('cases_user', array('user_id'=>$value,'rate'=>$rates[$key],'billing_type'=>$billing_type[$key],'service_id'=>$service_id[$key],'workflow'=>$workflow[$key]));
					//$this->comman_model->save('notifications',array('type'=>'case_add','user_id'=>$option['user_id'],'sender'=>$this->data['user_details']->id,'page_id'=>$id));
				}
				else{
					$this->db->insert('cases_user', $option);
					$ids = $this->db->insert_id();
					//$this->comman_model->save('notifications',array('type'=>'case_add','user_id'=>$option['user_id'],'sender'=>$this->data['user_details']->id,'page_id'=>$ids));
				}

			}
		}
		
	}

	function save_case_lawyer12($lawyer,$rates,$billing_type,$service_id,$workflow,$id,$owner){
/*		echo '<pre>';
		print_r($lawyer);*/
		if($lawyer){
			foreach($lawyer as $key=>$value){
				$option =array(
								'user_id'=>$key,
								'rate'=>$rates[$key],
								'service_id'=>$service_id[$key],
								'workflow'=>$workflow[$key],
								'owner_id'=>$owner,
								'case_id'=>$id,
								'billing_type'=>$billing_type[$key],
								);

				$this->db->where(array('user_id'=>$key,'case_id'=>$id,'owner_id'=>$owner));
				$check_uptdate = $this->db->get('cases_user')->row();
				if($check_uptdate){
					$this->db->where(array('user_id'=>$key,'case_id'=>$id,'owner_id'=>$owner));
					$this->db->update('cases_user', array('user_id'=>$key,'rate'=>$rates[$key],'billing_type'=>$billing_type[$key],'service_id'=>$service_id[$key],'workflow'=>$workflow[$key]));
				}
				else{
					$this->db->insert('cases_user', $option);
					$this->db->insert_id();
				}

			}
		}
		
/*		die;*/
	}

	function save_option($data,$level,$id){
		//delete
		if(!empty($data)){
			$deleteArray = array();
			foreach($data as $set_option){
				if(isset($set_option['id'])&&!empty($set_option['id'])){
					$deleteArray[] =$set_option['id'];
				}
			}
			if($deleteArray){
				$this->db->where_not_in('id',$deleteArray);
				$this->db->where('level',$level);
				$this->db->where('service_id',$id);
				$this->db->delete('services_attr');
			}
		}

		//echo '<pre>';
		//print_r($deleteArray);
		//print_r($data);
		$count = 1;
		foreach ($data as $option)
		{
			$option['service_id'] = $id;
			$option['order'] = $count;
			$option['level'] = $level;
			if(isset($option['values'])&&!empty($option['values'])){
				$option['values'] = implode(',',$option['values']);
			}
			
			if(isset($option['id'])&&!empty($option['id'])){
				$this->db->where('id', $option['id']);
				$this->db->update('services_attr', $option);
			}
			else{
				unset($option['id']);
				$this->db->insert('services_attr', $option);
				$this->db->insert_id();
			}
			$count++;
		}
	}

	function save_workflow($data,$level,$id){

		//delete
		if(!empty($data)){
			$deleteArray = array();
			foreach($data as $set_option){
				if(isset($set_option['id'])&&!empty($set_option['id'])){
					$deleteArray[] =$set_option['id'];
				}
			}
			if($deleteArray){
				$this->db->where_not_in('id',$deleteArray);
				$this->db->where('service_id',$id);
				$this->db->where('level',$level);
				$this->db->delete('services_attr');
			}
		}

		//echo '<pre>';
		//print_r($data);
		$count = 1;
		foreach ($data as $option){
			$arry =array(
						'service_id'=>$id,
						'order'=>$count,
						'level'=>$level,
						'name'=>$option['name'],
						'id'=>$option['id'],
						'type'=>$option['type'],
						'user_type'=>$option['user_type'],
						);
			if(isset($option['category'])){
				$arry['employee_id'] = implode(',',$option['category']);
			}
			
			if(isset($option['id'])&&!empty($option['id'])){
				$this->db->where('id', $option['id']);
				$this->db->update('services_attr', $arry);
			}
			else{
				unset($arry['id']);
				$this->db->insert('services_attr', $arry);
				$this->db->insert_id();
			}
			$count++;
		}
	}
	
	function save_services_attribute($data,$id){
		$count = 1;
		foreach ($data as $option){
			$arry =array(
						'service_id'=>$id,
						'editable'=>$option['editable'],
						'is_visible'=>$option['is_visible'],
						);
			if(isset($option['id'])&&!empty($option['id'])){
				$this->db->where('id', $option['id']);
				$this->db->update('services_attr', $arry);
			}
			$count++;
		}
	}


	function save_option_value($data,$level,$id,$service_id){
		$count = 1;
/*		echo '<pre>';
		print_r($_FILES);
		echo '<pre>';
			print_r($data);*/

        // There was errors, we have to delete the uploaded files
		foreach ($data as $option=>$value){
			$array = array(
						's_id'=>$id,
						'service_id'=>$service_id,
						'field_id'=>$option,
						'value'=>$value,
						'level'=>$level,
						);
			if(is_array($value)){
				$array['value'] =  implode(',',$value['mult']);
			}
			else{
				$array['value'] =  $value;
			}

			$checkDate = 	h_isDate($value);
			
			if (DateTime::createFromFormat('d-m-Y', $value) !== FALSE) {
			  // it's a date
				$array['v_date'] = h_dateFormat($value,'Y-m-d');
			}		
			else if($checkDate){
				$array['v_datetime'] = h_dateFormat($value,'Y-m-d H:i:s');
			}
			//print_r($array);

			$this->db->where(array('s_id'=>$array['s_id'],'level'=>$level,'field_id'=>$array['field_id']));
			$check_uptdate = $this->db->get('u_services_value')->row();
			

			if($check_uptdate){
				$array['modified']=time();				
				$this->db->where(array('s_id'=>$array['s_id'],'level'=>$level,'field_id'=>$array['field_id']));
				$this->db->update('u_services_value', $array);
			}
			else{
				$array['date']		= date('Y-m-d H:i:s');
				$array['created']	= time();
				$array['modified']	= time();				
				$this->db->insert('u_services_value', $array);
			}
			$count++;
		}
	}
    
	public function save_order ($data)
	{
		if (count($data)) {
			foreach ($data as $order => $categories) {
				if ($categories['item_id'] != '') {
					$data = array('parent_id' => (int) $categories['parent_id'], 'order' => $order);
					$this->db->set($data)->where($this->_primary_key, $categories['item_id'])->update($this->_table_name);
				}
			}
		}
	}
    
	public function get_with_parent ($id = NULL, $single = FALSE)
	{
		$this->db->select('categories.*, p.slug as parent_slug, p.title as parent_title');
		$this->db->join('categories as p', 'categories.parent_id=p.id', 'left');
		return parent::get($id, $single);
	}
    
    
	public function get_lang1($id = NULL, $single = FALSE, $lang_id=1){    	
		$this->db->select('*');
		$this->db->from($this->_table_name.'_lang');
		$lang_result = $this->db->get()->result_array();
		foreach ($lang_result as $row)
		{
			foreach ($row as $key=>$val)
			{
				$result->{$key.'_'.$row['language_id']} = $val;
			}
		}
		
		foreach($this->languages as $key_lang=>$val_lang)
		{
			foreach($this->rules_lang as $r_key=>$r_val)
			{
				if(!isset($result->{$r_key}))
				{
					$result->{$r_key} = '';
				}
			}
		}
		
		return $result;
    }
    
	public function get_lang($id = NULL, $single = FALSE, $lang_id=1)
    {
        if($id != NULL)
        {
            $result = $this->get($id);
            
            $this->db->select('*');
            $this->db->from($this->_table_name.'_lang');
            $this->db->where('service_id', $id);
            $lang_result = $this->db->get()->result_array();
            foreach ($lang_result as $row)
            {
                foreach ($row as $key=>$val)
                {
                    $result->{$key.'_'.$row['language_id']} = $val;
                }
            }
            
            foreach($this->languages as $key_lang=>$val_lang)
            {
                foreach($this->rules_lang as $r_key=>$r_val)
                {
                    if(!isset($result->{$r_key}))
                    {
                        $result->{$r_key} = '';
                    }
                }
            }
            
            return $result;
        }
        
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->where('language_id', $lang_id);
        
        if($single == TRUE)
        {
            $method = 'row';
        }
        else
        {
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby))
        {
            $this->db->order_by($this->_order_by);
        }
        
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

  
    public function get_lang_array($id = NULL, $single = FALSE, $lang_id=1)
    {

        if($id != NULL)
        {
            $result = $this->db
                    ->select($this->_table_name.'.* ,'.$this->_table_name.'.id, '.$this->_table_name.'_lang.*')
                    ->from($this->_table_name)
                    ->where(array('categories_lang.language_id'=>$lang_id,'categories.id'=>$id))
                    ->join('categories_lang','categories.id = categories_lang.service_id')
                    
                    ->get()->result_array();
            //echo $this->db->last_query();
            return $result;  
        }
        
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->where('language_id', $lang_id);
        
        if($single == TRUE)
        {
            $method = 'row';
        }
        else
        {
            $method = 'result';
        }
        
        if(!count($this->db->ar_orderby))
        {
            $this->db->order_by($this->_order_by);
        }
        
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
    
    public function save_with_lang($data, $data_lang, $id = NULL)
    {
        // Set timestamps
        if($this->_timestamps == TRUE)
        {
            $now = date('Y-m-d H:i:s');
            $id || $data['created'] = $now;
            $data['modified'] = $now;
        }

        // Insert
        if($id === NULL)
        {
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else
        {
            $filter = $this->_primary_filter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }
        
        // Save lang data
        $this->db->delete($this->_table_name.'_lang', array('service_id' => $id));
        
        foreach($this->languages as $lang_key=>$lang_val)
        {
            if(is_numeric($lang_key))
            {
                $curr_data_lang = array();
                $curr_data_lang['language_id'] = $lang_key;
                $curr_data_lang['service_id'] = $id;
                
                foreach($data_lang as $data_key=>$data_val)
                {
                    $pos = strrpos($data_key, "_");
                    if(substr($data_key,$pos+1) == $lang_key)
                    {
                        $curr_data_lang[substr($data_key,0,$pos)] = $data_val;
                    }
                }
                $this->db->set($curr_data_lang);
                $this->db->insert($this->_table_name.'_lang');
				//echo $this->db->last_query();
            }
        }

        return $id;
    }
    
    public function get_no_parents($lang_id=1)
	{
        // Fetch pages without parents
        $this->db->select('*');
        $this->db->where('parent_id', 0);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->where('language_id', $lang_id);
        $categories = parent::get();
        
        // Return key => value pair array
        $array = array(0 => 'Select');
        //$array = array(0 => lang('No parent'));
        if(count($categories))
        {
            foreach($categories as $n)
            {
                $array[$n->id] = $n->title;
            }
        }
        
        return $array;
	}
    
    public function get_sitemap()
	{
        // Fetch pages without parents
        $this->db->select('*');
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $categories = parent::get();
                
        return $categories;
	}
    
    public function get_first ()
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->order_by($this->_order_by);
        $this->db->limit(1);
        
		$categories = $this->db->get()->result();
        
        if(count($categories) > 0)
        {
            return $categories[0];
        }
        
        return '';
    }
    
    public function get_id_by_name ($service_id)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->order_by($this->_order_by);
		$categories = $this->db->get()->result_array();
        
		foreach ($categories as $n) {
		  if(url_title_cro($n['title'], '-', TRUE) == $service_id)  
          {
            return $n['id'];
          }
		}
        
        return $service_id;
    }    
 
	public function get_search_data($lang_id=2,$limit=false)
	{
        if($limit){
            $this->db->limit($limit);
        }
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->where('language_id', $lang_id);
        $this->db->order_by($this->_order_by);
		$regions = $this->db->get()->result_array();
		
		$array = array();
		foreach ($regions as $n) {         
			$array[$n['id']] = $n;
		}
		return $array;
	}


	public function get_nested($lang_id=2,$limit=false){

        if($limit){
            $this->db->limit($limit);
        }
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->order_by($this->_order_by);
		$categories = $this->db->get()->result_array();
		
		$array = array();
		foreach ($categories as $n) {         
			if (! $n['parent_id']) {
				// This page has no parent
				$array[$n['id']] = $n;
			}
			else {
				// This is a child page
				$array[$n['parent_id']]['children'][] = $n;
			}
		}
		return $array;
	}
	public function get_nested1($lang_id=2,$limit=false){
        if($limit){
            $this->db->limit($limit);
        }
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join($this->_table_name.'_lang', $this->_table_name.'.id = '.$this->_table_name.'_lang.service_id');
        $this->db->where('language_id', $lang_id);
        $this->db->order_by($this->_order_by);
		$categories = $this->db->get()->result_array();
		
		$array = array();
		foreach ($categories as $n) {         
			if (! $n['parent_id']) {
				// This page has no parent
				$array[$n['id']] = $n;
			}
			else {
				// This is a child page
				$array[$n['parent_id']]['children'][] = $n;
			}
		}
		return $array;
	}


	function get_employee_case($id = false){
		if($id){
		}
		else{
			$this->db->select('case_id');
			$check_product = $this->comman_model->get_by('case_id',array('store_id'=>$id,),false,false);
			if($check_product){
				foreach($check_product as $set_pro){
					$product_arr[] =$set_pro->product_id;
				}
			}
			if($product_arr){
				$this->db->where_in('id',$product_arr);
				$this->data['products'] = $this->comman_model->get_lang('products',$this->data['lang_id'],NULL,array('enabled'=>1),'product_id',false);
			}	
		}
	}


    public function delete($id){
		//$this->db->delete('categories_lang', array('service_id' => $id)); 
		$this->db->delete($this->_table_name, array('id'=>$id));
    }

}


