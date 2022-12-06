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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'DashboardCtrl';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'DashboardCtrl';

/* user profile */
$route['profile']['get'] = 'Profile/index';
$route['profile']['post'] = 'Profile/store';

$route['change_password']['get'] = 'Profile/cp';
$route['change_password']['post'] = 'Profile/cp_store';

/* user route */
$route['users'] = 'UserCtrl/index';
$route['users/add']['get'] = 'UserCtrl/create';
$route['users/store']['post'] = 'UserCtrl/store';
$route['users/edit/(:num)'] = 'UserCtrl/update/$1';
$route['users/delete/(:num)'] = 'UserCtrl/destroy/$1';


/* Auth route */
$route['register']['get'] = 'AuthCtrl/register';
$route['register']['post'] = 'AuthCtrl/store';
$route['login']['get'] = 'AuthCtrl/login';
$route['login']['post'] = 'AuthCtrl/login_check';

$route['logout']['get'] = 'AuthCtrl/logout';
$route['lock']['get'] = 'AuthCtrl/lock';

/* member_information */
$route['member_information'] = 'Member_informationCtrl/index';
$route['member_information/add'] = 'Member_informationCtrl/create';
$route['member_information/store'] = 'Member_informationCtrl/store';
$route['member_information/edit/(:num)'] = 'Member_informationCtrl/update/$1';
$route['member_information/delete/(:num)'] = 'Member_informationCtrl/destroy/$1';

/* Daily Expense */
$route['daily_exp'] = 'Daily_expCtrl/index';
$route['daily_exp/add'] = 'Daily_expCtrl/create';
$route['daily_exp/store'] = 'Daily_expCtrl/store';
$route['daily_exp/edit/(:num)'] = 'Daily_expCtrl/update/$1';
$route['daily_exp/delete/(:num)'] = 'Daily_expCtrl/destroy/$1';

/* Member Record */
$route['mem_rec'] = 'Mem_recCtrl/index';
$route['mem_rec/get_member_list'] = 'Mem_recCtrl/get_member_list';
$route['mem_rec/add'] = 'Mem_recCtrl/create';
$route['mem_rec/get_member'] = 'Mem_recCtrl/get_member';
$route['mem_rec/store'] = 'Mem_recCtrl/store';
$route['mem_rec/update'] = 'Mem_recCtrl/update';

/* Member Payment */
$route['mem_pay'] = 'Mem_payCtrl/index';
$route['mem_pay/add'] = 'Mem_payCtrl/create';
$route['mem_pay/store'] = 'Mem_payCtrl/store';
$route['mem_pay/edit/(:num)'] = 'Mem_payCtrl/update/$1';
$route['mem_pay/delete/(:num)'] = 'Mem_payCtrl/destroy/$1';

/* Meal Expense */
$route['meal_exp'] = 'MealCountCtrl/index';
$route['meal_exp/get_meal_list'] = 'MealCountCtrl/get_meal_list';
$route['meal_exp/add'] = 'MealCountCtrl/create';
$route['meal_exp/get_meal'] = 'MealCountCtrl/get_meal';
$route['meal_exp/store'] = 'MealCountCtrl/store';
$route['meal_exp/edit/(:num)'] = 'MealCountCtrl/update/$1';
$route['meal_exp/delete/(:num)'] = 'MealCountCtrl/destroy/$1';


/* block magic route */
$route['(.+)']="Error_page/page_missing";