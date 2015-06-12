<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'processes';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'processes/register';
$route['login'] = 'processes/login';
$route['logout'] = 'processes/logout';
?>