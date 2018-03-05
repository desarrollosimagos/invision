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
$route['detail_projects'] = 'Welcome/detail_projects';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'CLogin/login/';
$route['logout'] = 'CLogin/logout/';
$route['home'] = 'Home/home/';
$route['admin'] = 'Welcome/admin/';

/* Perfiles */
$route['profile'] = 'CPerfil';
$route['profile_register'] = 'CPerfil/register';
$route['profile_edit/(:num)'] = 'CPerfil/edit/$1';
$route['profile_delete/(:num)'] = 'CPerfil/delete/$1';
/*   Users */
$route['users'] = 'CUser';
$route['users_register'] = 'CUser/register';
$route['users_edit/(:num)'] = 'CUser/edit/$1';
$route['change_passwd'] = 'CChangePasswd/index';
$route['update_passwd'] = 'CChangePasswd/update_passwd';
$route['update_session'] = 'CUser/transcurrido';
/*   Menús */
$route['menus'] = 'CMenus';
$route['menus/register'] = 'CMenus/register';
$route['menus/edit/(:num)'] = 'CMenus/edit/$1';
$route['menus/delete/(:num)'] = 'CMenus/delete/$1';
/*   Submenús */
$route['submenus'] = 'CSubMenus';
$route['submenus/register'] = 'CSubMenus/register';
$route['submenus/edit/(:num)'] = 'CSubMenus/edit/$1';
$route['submenus/delete/(:num)'] = 'CSubMenus/delete/$1';
/*   Acciones */
$route['acciones'] = 'CAcciones';
$route['acciones/register'] = 'CAcciones/register';
$route['acciones/edit/(:num)'] = 'CAcciones/edit/$1';
$route['acciones/delete/(:num)'] = 'CAcciones/delete/$1';
/*   Transacciones */
$route['transactions'] = 'CFondoPersonal';
$route['transactions/register/(:any)'] = 'CFondoPersonal/register/$1';
$route['transactions/edit/(:num)'] = 'CFondoPersonal/edit/$1';
$route['transactions/delete/(:num)'] = 'CFondoPersonal/delete/$1';
$route['transactions/validar'] = 'CFondoPersonal/validar_transaccion';
/*   Cuentas */
$route['accounts'] = 'CCuentas';
$route['accounts/register'] = 'CCuentas/register';
$route['accounts/edit/(:num)'] = 'CCuentas/edit/$1';
$route['accounts/delete/(:num)'] = 'CCuentas/delete/$1';
/*   Resumen */
$route['resumen'] = 'CResumen';
$route['resumen/register'] = 'CResumen/register';
$route['resumen/edit/(:num)'] = 'CResumen/edit/$1';
$route['resumen/delete/(:num)'] = 'CResumen/delete/$1';
$route['resumen/fondos_json'] = 'CResumen/fondos_json';
/*   Monedas */
$route['coins'] = 'CCoins';
$route['coins/register'] = 'CCoins/register';
$route['coins/edit/(:num)'] = 'CCoins/edit/$1';
$route['coins/delete/(:num)'] = 'CCoins/delete/$1';
/*   Asociaciones */
$route['relate_users'] = 'CRelateUsers';
$route['relate_users/register'] = 'CRelateUsers/register';
$route['relate_users/edit/(:num)'] = 'CRelateUsers/edit/$1';
$route['relate_users/delete/(:num)'] = 'CRelateUsers/delete/$1';
/* Grupos de Inversionistas */
$route['investor_groups'] = 'CInvestorGroups';
$route['investor_groups/register'] = 'CInvestorGroups/register';
$route['investor_groups/edit/(:num)'] = 'CInvestorGroups/edit/$1';
$route['investor_groups/delete/(:num)'] = 'CInvestorGroups/delete/$1';
/*   Proyectos */
$route['projects'] = 'CProjects';
$route['projects/register'] = 'CProjects/register';
$route['projects/edit/(:num)'] = 'CProjects/edit/$1';
$route['projects/delete/(:num)'] = 'CProjects/delete/$1';
/*   Público */
$route['start'] = 'Welcome/start';
$route['possibilities'] = 'Welcome/possibilities';
$route['investments'] = 'Welcome/investments';
$route['contacts'] = 'Welcome/contacts';


/*   Migraciones */
$route['migrar'] = 'CMigrations';

/*assets*/
$route['assets/(:any)'] = 'assets/$1';
