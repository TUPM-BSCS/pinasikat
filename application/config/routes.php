<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'pinasikat';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'pinasikat/admin';
$route['adminlogin'] = 'pinasikat/adminlogin';
$route['adminlogout'] = 'pinasikat/adminlogout';
$route['inspect/(:any)'] = 'pinasikat/inspect/$1';
$route['reject/(:any)'] = 'pinasikat/reject/$1';
$route['approve/(:any)'] = 'pinasikat/approve/$1';
$route['hold/(:any)'] = 'pinasikat/hold/$1';

$route['search?(:any)'] = 'pinasikat/search';

$route['login'] = 'pinasikat/login';
$route['register'] = 'pinasikat/register';
$route['logout'] = 'pinasikat/logout';

$route['dashboard'] = 'pinasikat/profile';
$route['registration'] = 'pinasikat/registration';
$route['article/new'] = 'pinasikat/uploadform';
$route['article/create'] = 'pinasikat/upload';

$route['article/(:any)'] = 'pinasikat/view/$1';

$route['restaurants/(:num)'] = 'pinasikat/category/restaurants/$1';
$route['restaurants'] = 'pinasikat/category/restaurants/1';

$route['resorts/(:num)'] = 'pinasikat/category/resorts/$1';
$route['resorts'] = 'pinasikat/category/resorts/1';

$route['nature/(:num)'] = 'pinasikat/category/nature/$1';
$route['nature'] = 'pinasikat/category/nature/1';

$route['themeparks/(:num)'] = 'pinasikat/category/themeparks/$1';
$route['themeparks'] = 'pinasikat/category/themeparks/1';

$route['(:num)'] = 'pinasikat/index/$1';

$route['load_comments'] = 'pinasikat/load_comments';
$route['count_comments'] = 'pinasikat/count_comments';
$route['submit_comment'] = 'pinasikat/submit_comment';
$route['has_commented'] = 'pinasikat/has_commented';

