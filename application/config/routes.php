<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "c_login";
$route['404_override'] = '';
$route['mod/([a-zA-Z_-]+)'] = "c_panel/getViewMod/$1";
$route['asist/search'] = "c_panel/getPractForDate";
$route['asist/set'] = "c_panel/setAsist";

$route['asist/upd'] = "c_panel/udpAsist";
$route['report'] = "c_panel/generarPDF";
$route['report/get'] = "c_panel/getPracticingPDF";
$route['report/asist/([0-9]+)'] = "c_panel/getReportAsiste/$1";

$route['area/set'] = "c_panel/setArea";
$route['area/update'] = "c_panel/updateArea";
$route['area/delete'] = "c_panel/deleteArea";

$route['inst/set'] = "c_panel/setInstituto";
$route['inst/update'] = "c_panel/updateInstituto"; 
$route['inst/delete'] = "c_panel/deleteInstituto";

$route['practicante/set'] = "c_panel/setPracticante";
$route['practicante/update'] = "c_panel/updatePracticante"; 
$route['practicante/delete'] = "c_panel/deletePracticante";