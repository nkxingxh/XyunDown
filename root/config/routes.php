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

$route['default_controller'] = 'simple';
$route['(:num)'] = 'simple/catalogue/all/$1';
$route['404_override'] = '';
//$route['(:any)/(:num)'] = 'simple/index/$1/$2';
$route['view/(:num)'] = 'simple/view/$1';
//$route['upload'] = 'simple/upload';
//$route['reg'] = 'simple/reg';
$route['edit'] = 'upload/do_upload';
$route['down/(:num)'] = 'simple/down/$1';
$route['catalogue/(:any)'] = 'simple/catalogue/$1';
$route['search/(:any)'] = 'simple/search/$1';
$route['search'] = 'simple';
$route['tag/(:any)'] = 'simple/tag/$1';
$route['tag'] = 'simple';
$route['del/(:num)'] = 'simple/del/$1';
$route['fav/(:num)'] = 'simple/fav/$1';
$route['top/(:num)'] = 'simple/top/$1';
$route['untop/(:num)'] = 'simple/untop/$1';
$route['unfav/(:num)'] = 'simple/unfav/$1';
$route['usercen/(:num)'] = 'usercen/index/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */