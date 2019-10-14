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
|	https://codeigniter.com/user_guide/general/routing.html
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

#users routes
$route['users/search_results'] = 'users/execute_search';
$route['users/logout'] = 'users/users_logout';
$route['users/index'] = 'users/users_index';
$route['users/sign_up'] = 'users/users_sign_up';
$route['users/login'] = 'users/users_login';

#admin routes
$route['admin/search_results'] = 'admins/execute_search';
$route['download/(:any)'] = 'download/$1';
$route['admin/delete/(:any)'] = 'admins/delete/$1';
$route['admin/view/(:any)'] = 'admins/view/$1';
$route['admin/change/(:any)'] = 'admins/change/$1';
$route['admin/update/(:any)'] = 'admins/update_song/$1';
$route['admin/save'] = 'admins/save_song';
$route['admin/logout'] = 'admins/admin_logout';
$route['admin/create'] = 'admins/create_song';
$route['admin'] = 'admins/admin_index';
$route['admin/sign_up'] = 'admins/admin_sign_up';
$route['admin/login'] = 'admins/admin_login';

$route['default_controller'] = 'users/users_index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
