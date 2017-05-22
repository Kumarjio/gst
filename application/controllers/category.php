<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Frontend_Controller {
	public $_subView = 'templates/';
	public function __construct(){
		parent::__construct();
		$logged_in = $this->session->userdata('user_session');
		if((isset($logged_in['loggedin']) || $logged_in['loggedin'] == true)){
			if($logged_in['loginType']=='user'){
				$detail = $this->session->all_userdata();
				$this->data['user_details'] =  $this->comman_model->get_by('users',array('id'=>$detail['user_session']['id']),FALSE,FALSE,TRUE);
			}
		}
	
	}


	public function index($id = false,$page= false){
		$this->data['active'] = 'category_menu';
		if(!$id){
			redirect($this->data['lang_code'].'/front');
		}
		$cateId = '';

/*		
$cateId = '';
		$getCat = $this->input->get('cat');
		if($getCat){
			$cateId = $getCat;
			$this->data['getCat'] = $getCat;
		}*/

		$category = $this->comman_model->get_lang('categories',$this->data['lang_id'],NULL,array('slug'=>$id),'category_id',true);
		if(empty($category)){
			redirect($this->data['lang_code'].'/front');
		}
		
		//seo data

/*		$this->db->select('product_id');
		$check_product = $this->comman_model->get_by('product_category',array('category_id'=>$category->id),false,false,false);
		$product_arr =array();
		if($check_product){
			foreach($check_product as $set_pro){
				$product_arr[] =$set_pro->product_id;
			}
		}*/
		
		if($cateId){
			$postCat = $cateId.','.$category->id;
		}
		else{
			$postCat = $category->id;
		}
		

		$offset = $this->input->get('page');
		if (!empty($offset)) {
			$item_page = 1+$offset;
		}
		else{
			$item_page = 1;
			$offset = 0;
		}

	if($this->input->get('sorting')){
		$name = $this->input->get('sorting');
		if($name=='price_desc'){
			$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `price` desc",false));
		}
		else if($name=='price_asc'){
			$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `price` asc",false));
		}
		else if($name=='upcoming'){
			$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 AND `products`.`section`='upcoming' ORDER BY `id` desc",false));
		}
		else if($name=='new'){
			$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 AND `products`.`section`='new' ORDER BY `id` desc",false));
		}
		else{
			$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc",false));
		}
		$this->data['totalProduct'] = $count;
		$perpage = 20;
		if ($count > $perpage) {
				$this->load->library('pagination');
				$config['base_url'] = site_url($this->data['lang_code'].'/category/'.$id.'?sorting='.$name);
				//$config['base_url'] = site_url('searchengine/search?q='.$name);
				$config['query_string_segment'] = 'page';
				$config['page_query_string'] = true;
				$config['total_rows'] = $count;
				$config['per_page'] = $perpage;
				$config['uri_segment'] = $offset;
	
				//stylish pagination
				$config['first_link'] = 'Next';
				$config['last_link'] = 'Previous';
				$config['full_tag_open'] = "<ul class='pagination'>";
				$config['full_tag_close'] ="</ul>";
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
				$config['cur_tag_close'] = "</a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tagl_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tagl_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tagl_close'] = "</li>";
	
				$this->pagination->initialize($config);
				$this->data['pagination'] = $this->pagination->create_links();
			}
			else {
				$this->data['pagination'] = '';
			}
			if($offset!=0){
				$limitString  = "LIMIT ".$perpage.", ".$offset;
			}
			else{
				$limitString  = "LIMIT ".$perpage;
			}

			if($name=='price_desc'){
				$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `price` desc ".$limitString,false);
			}
			else if($name=='price_asc'){
				$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `price` asc ".$limitString,false);
			}
			else if($name=='upcoming'){
				$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 AND `products`.`section`='upcoming'  ORDER BY `price` asc ".$limitString,false);
			}
			else if($name=='new'){
				$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 AND `products`.`section`='new'  ORDER BY `price` asc ".$limitString,false);
			}
			else{
				$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc ".$limitString,false);
			}
/*					$this->db->where_in('id',$product_arr);
			$this->data['products'] = $this->comman_model->get_lang('products',$this->data['lang_id'],NULL,array('enabled'=>1),'product_id',false);*/
		}
	else if($this->input->get('limit')){
		$this->data['pagination'] = '';
		$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc ",false);
		$this->data['totalProduct'] = count($this->data['products']);
	}
	else{
/*				$this->db->order_by('id','desc');	
		$this->db->where_in('id',$product_arr);
		$count= count($this->comman_model->get_lang('products',$this->data['lang_id'],NULL,array('enabled'=>1),'product_id',false));*/
		//$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` = '".$category->id."' OR `sub_category_id` = '".$category->id."') AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc",false));
		$count= count($this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc",false));		
		$this->data['totalProduct'] = $count;
		$perpage = 20;
		if ($count > $perpage) {
			//echo 'yes';die;
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->data['lang_code'].'/category/'.$id.'?sorting=');
			$config['query_string_segment'] = 'page';
			$config['page_query_string'] = true;
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = $offset;

			//stylish pagination
			$config['full_tag_open'] = "<ul class='pagination'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a>";
			$config['cur_tag_close'] = "</a></li>";
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Previous';
			
			$config['next_tag_open'] = "<li class='next'>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li class='previous'>";
			$config['prev_tagl_close'] = "</li>";
/*			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";*/

			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
/*				$this->db->limit($perpage, $offset);
		$this->db->order_by('id','desc');	
		$this->db->where_in('id',$product_arr);
		$this->data['products'] = $this->comman_model->get_lang('products',$this->data['lang_id'],NULL,array('enabled'=>1),'product_id',false);*/
		if($offset!=0){
			$limitString  = "LIMIT ".$perpage.", ".$offset;
		}
		else{
			$limitString  = "LIMIT ".$perpage;
		}
		$this->data['products'] = $this->comman_model->get_query("SELECT * FROM (`products`) JOIN `products_lang` ON `products`.`id` = `products_lang`.`product_id` WHERE (`category_id` IN (".$postCat.") OR `sub_category_id` IN(".$postCat.")) AND `language_id` = '".$this->data['lang_id']."' AND `enabled` = 1 ORDER BY `id` desc ".$limitString,false);
		//echo $this->db->last_query();
	}




		//$this->data['products'] = $this->comman_model->get_lang('products',$this->data['lang_id'],NULL,false,'product_id',false);
		//echo $this->db->last_query();die;
		$this->data['category'] =  $category;
		$this->data['setCategory'] =  $category->id;
		$this->data['category_title'] =  $this->data['category']->title;
		if($category->parent_id!=0){
			$this->data['parent_category'] = $this->comman_model->get_lang('categories',$this->data['lang_id'],NULL,array('id'=>$category->parent_id),'category_id',true);
			
		}
		$this->data['categories'] =  $this->comman_model->get_by('categories',array('status'=>1,'parent_id'=>0),false,false,false);
		//$this->data['subview'] = $this->_subView.'category';	
		$this->load->view('templates/category',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */