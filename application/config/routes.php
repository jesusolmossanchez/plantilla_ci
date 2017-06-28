<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| FRONTEND Routing
| -------------------------------------------------------------------------
*/

$route['default_controller'] = 'app/home';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/*
| -------------------------------------------------------------------------
| BACKEND Routing
| -------------------------------------------------------------------------
*/


/* *************************************** */
/* ************** BACKEND **************** */
/* *************************************** */

/* Zona - Backend LOGIN / HOME */
$route['admin'] = 'admin/admin';
$route['admin/home'] = 'admin/home_admin';
$route['admin/login'] = 'admin/auth/login';
$route['admin/logout'] = 'admin/auth/logout';



$route['admin/slider'] = 'admin/slider_admin';

$route['admin/slider/reordena'] = 'admin/slider_admin/reordena';
$route['admin/desactiva_slide'] = 'admin/slider_admin/desactivar';
$route['admin/activa_slide'] = 'admin/slider_admin/activar';

$route['admin/slider/crear'] = 'admin/slider_admin/crear';
$route['admin/slider/(:any)'] = 'admin/slider_admin/editar/$1';
$route['admin/slider/borrar/(:any)'] = 'admin/slider_admin/borrar/$1';

$route['admin/guardar-slide'] = 'admin/slider_admin/guardar';

/*
| -------------------------------------------------------------------------
| API Routing
| -------------------------------------------------------------------------
*/

//Todo lo que no sea una ruta controlada, lanzo el controlador por defecto
$route['(:any)*'] = 'app/home';