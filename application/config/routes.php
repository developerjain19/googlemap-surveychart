<?php
defined('BASEPATH') or exit('No direct script access allowed');


$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['saveLocation'] = 'Home/saveLocation';
$route['user'] = 'Home/user';
$route['all-records'] = 'Admin_Dashboard/course';
