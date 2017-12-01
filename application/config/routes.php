<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
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

$route['default_controller'] = "home";
$route['404_override'] = 'override_404';
$route['seo/sitemap\.xml'] = "seo/sitemap";
$route['logout']							=	'home/logout';

$route['demo/homepage'] = "home/demo_homepage";
$route['demo/product'] = "home/demo_product";

//Admin route
$route['admin/login']                   	=   'admin/main/loginAdmin';
$route['admin/logout']                  	=   'admin/main/logoutAdmin';
$route['admin/access_denied']               =   'admin/main/access_denied';
$route['admin']                         	=   'admin/admin/index';
$route['admin/admins/(:num)']           	=   'admin/admins/index/$1';
$route['admin/customers/(:num)']           	=   'admin/customers/index/$1';
$route['admin/users/(:num)']            	=   'admin/users/index/$1';
$route['admin/salary/(:num)']            	=   'admin/salary/index/$1';
$route['admin/products/(:num)']         	=   'admin/products/index/$1';
$route['admin/userscart/(:num)']         	=   'admin/userscart/index/$1';
$route['admin/usersgoods/(:num)']         	=   'admin/usersgoods/index/$1';
$route['admin/device/(:num)']         		=   'admin/device/index/$1';
$route['admin/devicecategory/(:num)']       =   'admin/devicecategory/index/$1';
$route['admin/devicetag/(:num)']         	=   'admin/devicetag/index/$1';
$route['admin/qrcode/(:num)']         		=   'admin/qrcode/index/$1';
$route['admin/warehouse/(:num)']         	=   'admin/warehouse/index/$1';
$route['admin/orders/(:num)']            	=   'admin/orders/index/$1';
$route['admin/piw/(:num)']         			=   'admin/piw/index/$1';
$route['admin/profile']         			=   'admin/users/profile';

$route['khach-hang/(:any)'] 				=	'customer/maincustomer/index/$1'; 
$route['customer/ho-so/(:any)'] 			=	'customer/MainCustomer/editprofile/$1'; 
/* End of file routes.php */
/* Location: ./application/config/routes.php */
