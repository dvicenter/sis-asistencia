<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "c_login";
$route['404_override'] = '';
$route['mod/([a-zA-Z_-]+)'] = "c_panel/getViewMod/$1";
$route['asist/search'] = "c_panel/getPractForDate";
$route['asist/set'] = "c_panel/setAsist";
