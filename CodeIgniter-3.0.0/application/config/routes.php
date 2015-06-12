<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'processes';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['main'] = 'processes/index';
$route['register'] = 'processes/register';
$route['login'] = 'processes/login';
$route['logout'] = 'processes/logout';
$route['dashboard'] = 'processes/showDashboard';
$route['wish_items/create'] = 'processes/createWish';
$route['add'] = 'processes/addItem';
$route['addtowishlist/(:any)'] = 'processes/addtoWishlist/$1';
$route['wish_items/(:any)'] = 'processes/viewItem/$1';
$route['remove/(:any)'] = 'processes/removefromWishlist/$1';
$route['delete/(:any)'] = 'processes/deleteItem/$1';
?>