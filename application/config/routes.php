<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "front";
$route['admin/'] = 'admin/dashboard/index';
$route['front'] = 'front/index';
//$route['404_override'] = 'front';

 
// '/en' and '/fr' -> use default controller
require_once( BASEPATH .'database/DB'. EXT );
$db =& DB();

	$route['$'] = $route['default_controller'];
	$route['front'] = 'front/index';
	$route['front/active'] = 'front/active';
	//$route['front/(:any)'] = 'front/index/$1';
//	$route['pages/(:any)'] = 'pages/index/$1';

$query12 = $db->get('services');
$result12 = $query12->result();
if($result12){
	foreach( $result12 as $row1 ){
		$route[$row1->name] = 'searchs/l/'.$row1->id;
	//	$route[''.$row1->slug.'/(.+)$'] = 'searcheng'.$row1->slug.'/$1';
	}
}

$query = $db->get('page');
$result = $query->result();
if($result){
	foreach( $result as $row1 ){
    	$route[$row1->slug] = 'pages/index/'.$row1->slug;
	}
}


	$route['(.+)$'] = "$1";

$route['testapi'] = 'front/hotelapi';
$route['hotelapi'] = 'front/hotelapilist';
/* End of file routes.php */
/* Location: ./application/config/routes.php */