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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/notfound';
$route['translate_uri_dashes'] = FALSE;

$route['verifyLogin'] = 'home/verifyLogin';
$route['logout'] = 'home/logout';

/** Masters routes */
$route['api/v1/category'] = 'master/category';
$route['api/v1/categoryList'] = 'master/categoryList';
$route['api/v1/subcategory'] = 'master/subcategory';
$route['api/v1/subcategoryList'] = 'master/subcategoryList';
$route['api/v1/brands'] = 'master/brand';
$route['api/v1/brandsList'] = 'master/brandsList';

$route['api/v1/colours'] = 'master/colour';
$route['api/v1/colourList'] = 'master/colourList';


/** File Upload */
$route['api/v1/uploadFile'] = 'master/uploadFile';

/** Products routes */
$route['api/v1/product_general'] = 'master/product_general';
$route['api/v1/product_detail'] = 'master/product_detail';
$route['api/v1/product_specs'] = 'master/product_specs';
$route['api/v1/product_specs_items'] = 'master/product_specs_items';
$route['api/v1/product/list'] = 'master/productList';
$route['api/v1/product/tableList'] = 'master/productTableList';
$route['api/v1/product'] = 'master/productData';
$route['api/v1/product/request'] = 'master/productRequest';
$route['api/v1/product/delete'] = 'master/productDelete';
$route['api/v1/account/password'] = 'master/passwordChange';
$route['api/v1/account/details'] = 'master/accountDetails';


//Admin portal Frontend
$route['admin'] = 'frontend/index';
$route['login'] = 'frontend/index';
$route['dashboard'] = 'frontend/dashboard';

$route['masters/category'] = 'frontend/category';
$route['masters/subcategory'] = 'frontend/subcategory';
$route['masters/brand'] = 'frontend/brand';
$route['masters/colour'] = 'frontend/colour';
$route['masters/product'] = 'frontend/product';
$route['masters/product_catalogue'] = 'frontend/product_catalogue';
$route['masters/product/create'] = 'frontend/productCreate';
$route['masters/product/edit'] = 'frontend/productEdit';
$route['masters/product/details'] = 'frontend/productView';

$route['profile/view'] = 'frontend/view';
$route['profile/account'] = 'frontend/account';