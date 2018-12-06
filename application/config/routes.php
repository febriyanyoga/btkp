<?php

defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'HomeC';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// index
$route['daftar'] = 'HomeC/post_daftar';
$route['home'] = 'HomeC';
$route['login'] = 'HomeC/post_login';
$route['logout'] = 'HomeC/logout';
// $route['tentang'] = 'website/tentang';

// workshop
$route['workshop'] = 'WorkshopC';
$route['data_perizinan'] = 'WorkshopC/data_perizinan';
$route['data_reinspeksi'] = 'WorkshopC/data_reinspeksi';
$route['pelaporan'] = 'WorkshopC/pelaporan';
$route['izin_baru'] = 'WorkshopC/perizinan_baru_1';
$route['izin_baru22'] = 'WorkshopC/perizinan_baru_2';
$route['izin_baru2/(:num)'] = 'WorkshopC/perizinan_baru_2/$1';
$route['izin_baru3/(:num)'] = 'WorkshopC/perizinan_baru_3/$1';
$route['selesai/(:num)'] = 'WorkshopC/selesai/$1';
$route['konfirmasi'] = "WorkshopC/konfirmasi_pembayaran";
$route['detailperizinan/(:num)'] = "WorkshopC/detailperizinan/$1";

// $route['izin_baru3'] = 'WorkshopC/perizinan_baru_3';
$route['izin_perpanjang'] = 'WorkshopC/perizinan_perpanjang';
$route['type_approval'] = 'WorkshopC/type_approval';

$route['post_izin_baru1'] = 'WorkshopC/post_izin_baru1';
$route['post_berkas'] = 'WorkshopC/post_berkas';

// admin
$route['admin'] = 'AdminC';

// tatausaha
$route['tatausaha'] = 'TatausahaC';
$route['perizinan'] = 'TatausahaC/perizinan';
$route['verifikasi/(:num)'] = 'TatausahaC/verifikasi/$1';
$route['reinspeksi'] = 'TatausahaC/reinspeksion';
$route['pengujian'] = 'TatausahaC/pengujian';
$route['persetujuan'] = 'TatausahaC/persetujuan';
$route['kode_billing'] = 'TatausahaC/post_kode_billing';
$route['penerbitan'] = 'TatausahaC/post_penerbitan';

// kasie
$route['kasie'] = 'KasieC';
$route['izin_kasie'] = 'KasieC/perizinan';
$route['verifikasi_kasie/(:num)'] = 'KasieC/verifikasi/$1';
$route['persetujuan_kasie'] = 'KasieC/persetujuan';
$route['persetujuan_kasie2'] = 'KasieC/persetujuan2';


// pimpinan
$route['pimpinan'] = 'PimpinanC';
