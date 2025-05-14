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
 //$uri = $this->uri->segment('1');
 //$route[$uri] = 'admin/'.$uri;
$route['default_controller'] = 'pages';
	
$route['admin'] = 'Admin/index';
$route['api'] = 'Api/index';
$route['dashboard'] = 'Admin/dashboard';
$route['user'] = 'Admin/user';
$route['center'] = 'Admin/center';
$route['student'] = 'Admin/student';
$route['reg_stu'] = 'Admin/regular_student';
$route['liv_stu'] = 'Admin/online_student';
$route['student_ledger'] = 'Admin/ledger';
$route['payment_receipt'] = 'Admin/payment_slip';
$route['registration_receipt'] = 'Admin/registration_slip';

$route['print_certificate'] = 'Admin/print_certificate';
$route['print_markssheet'] = 'Admin/print_markssheet';


$route['results'] = 'Admin/results';
$route['ctet'] = 'Admin/ctet_application';
$route['frenchise_app'] = 'Admin/frenchise_application';
$route['admission'] = 'Admin/admission';
$route['print_marksheet/(:num)'] = 'Admin/print_marksheet';
$route['print_certificate/(:num)'] = 'Admin/print_certificate';
$route['course'] = 'Admin/course';
$route['videoclass'] = 'Admin/video_class';
$route['attachment'] = 'Admin/study_material';
$route['fee'] = 'Admin/fee';
$route['collection'] = 'Admin/collection';
$route['notice'] = 'Admin/admin_notice';
$route['gallery'] = 'Admin/admin_gallery';
$route['query'] = 'Admin/enquiry';
$route['fee_list'] = 'Admin/fee_list';
$route['facilitators'] = 'Admin/facilitators';
$route['logout'] = 'Admin/logout';
$route['signout'] = 'Admin/signout';

$route['save_ctet'] = 'Admin/save_ctet';
$route['enquiry'] = 'pages/enquiry';
$route['(:any)'] = 'pages/view/';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;









