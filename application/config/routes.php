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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Login']='welcome/login';

$route['AdminCodiga']='AdminCodiga/Admin';

$route['activate'] = 'welcome/activateAccount';
$route['reset'] = 'welcome/resetSetSession';

$route['TuInformacion']='welcome/Inf';
$route['Mapa']='CotrollersMapa/Controller_geolocalizacion/mapa';
$route['Eliminar/(:any)'] = "CotrollersMapa/Controller_geolocalizacion/delete_Point/$1";
$route['Insertar'] = "CotrollersMapa/Controller_geolocalizacion/insert_Point";

$route['AltaTickets']='ControllersTickets/Tickets/AltaTickets';
$route['MonitoreoTickets']='ControllersTickets/Tickets/MonitoreoTickets';
$route['MonitoreoTickets/(:num)'] = 'ControllersTickets/Tickets/MonitoreoTickets/$1';


$route['AltaAnimales']='ControllersTrazabilidad/Trazabilidad/Alta';
$route['AdministracionVacunas']='ControllersTrazabilidad/Trazabilidad/AdministracionVacunas';
$route['AdministracionVacunas/(:num)'] = 'ControllersTrazabilidad/Trazabilidad/AdministracionVacunas/$1';

$route['AdministracionProduccion']='ControllersTrazabilidad/Trazabilidad/AdministracionProduccion';
$route['AdministracionProduccion/(:num)'] = 'ControllersTrazabilidad/Trazabilidad/AdministracionProduccion/$1';

$route['AdministracionReproduccion']='ControllersTrazabilidad/Trazabilidad/AdministracionReproduccion';
$route['AdministracionReproduccion/(:num)'] = 'ControllersTrazabilidad/Trazabilidad/AdministracionReproduccion/$1';

$route['BajaAnimales']='ControllersTrazabilidad/Trazabilidad/Baja';
$route['Reportes']='ControllersTrazabilidad/Trazabilidad/Reportes';

$route['ReporteVacunas']='ControllersTrazabilidad/Trazabilidad/ReporteVacunas';
$route['ReporteVacunas/(:num)']='ControllersTrazabilidad/Trazabilidad/ReporteVacunas/$1';

$route['ReporteProduccion']='ControllersTrazabilidad/Trazabilidad/ReporteProduccion';
$route['ReporteProduccion/(:num)']='ControllersTrazabilidad/Trazabilidad/ReporteProduccion/$1';

$route['ReporteReproduccion']='ControllersTrazabilidad/Trazabilidad/ReporteReproduccion';
$route['ReporteReproduccion/(:num)']='ControllersTrazabilidad/Trazabilidad/ReporteReproduccion/$1';


$route['PayPal']='ControllersTrazabilidad/Trazabilidad/paycuenta';
$route['PayPal/cancel']='ControllersTrazabilidad/Trazabilidad/paypalcancel';
$route['PayPal/accomplishment']='ControllersTrazabilidad/Trazabilidad/accomplishment';


$route['SoporteUsuarios']='AdminCodiga/Admin';
$route['SoporteUsuarios/(:num)']='AdminCodiga/Admin/$1';

$route['SoporteTicket']='AdminCodiga/SoporteTickets';
$route['SoporteTicket/(:num)']='AdminCodiga/SoporteTickets/$1';

$route['CambiarAdmin']='AdminCodiga/AdminSuperUser';

$route['AddUserSoporte']='AdminCodiga/AddSoporte';
$route['AddUserSoporte/(:num)']='AdminCodiga/AddSoporte/$1';

$route['SoporteUsuariosSP']='AdminUserSoporte/Admin';
$route['SoporteUsuariosSP/(:num)']='AdminUserSoporte/Admin/$1';

$route['SoporteTicketSP']='AdminUserSoporte/SoporteTickets';
$route['SoporteTicketSP/(:num)']='AdminUserSoporte/SoporteTickets/$1';
