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
$route['profile'] = 'WorkshopC/profile';
$route['data_reinspeksi'] = 'WorkshopC/data_reinspeksi';
$route['pelaporan'] = 'WorkshopC/pelaporan';
$route['izin_baru'] = 'WorkshopC/perizinan_baru_1';
$route['izin_baru22'] = 'WorkshopC/perizinan_baru_2';
$route['izin_baru2/(:num)'] 	= 'WorkshopC/perizinan_baru_2/$1';
$route['izin_baru3/(:num)'] 	= 'WorkshopC/perizinan_baru_3/$1';
$route['selesai/(:num)'] 		= 'WorkshopC/selesai/$1';
$route['konfirmasi'] 			= 'WorkshopC/konfirmasi_pembayaran';
$route['konfirmasi_ujian_1'] 	= 'WorkshopC/konfirmasi_pembayaran_1';
$route['konfirmasi_ujian_2'] 	= 'WorkshopC/konfirmasi_pembayaran_2';
$route['file_survey'] 			= 'WorkshopC/post_file_survey';

$route['detailperizinan/(:num)'] 		= 'WorkshopC/detailperizinan/$1';
$route['cetak_invoice/(:num)']			= 'WorkshopC/cetak_produk/$1';
$route['cetak_invoice_ujian/(:num)'] 	= 'WorkshopC/cetak_invoice_ujian/$1';
$route['cetak_invoice_ujian2/(:num)'] 	= 'WorkshopC/cetak_invoice_ujian2/$1';
$route['print_surat/(:num)']			= 'WorkshopC/print_surat/$1';
$route['print_sertifikat_pengujian/(:num)']	= 'WorkshopC/print_sertifikat_pengujian/$1';
$route['print_label/(:num)']			= 'WorkshopC/print_label/$1';
$route['update_password'] 				= 'WorkshopC/post_update_password';
$route['update_perusahaan'] 			= 'WorkshopC/post_update_perusahaan';


// $route['izin_baru3'] = 'WorkshopC/perizinan_baru_3';
$route['izin_perpanjang/(:num)/(:any)'] = 'WorkshopC/perizinan_perpanjang/$1/$2';
$route['izin_perpanjang_tidak/(:num)/(:any)'] = 'WorkshopC/perizinan_perpanjang_tidak/$1/$2';
$route['type_approval'] = 'WorkshopC/type_approval';
$route['type_approval22'] = 'WorkshopC/type_approval2';
$route['type_approval2/(:num)'] = 'WorkshopC/type_approval2/$1';
$route['type_approval3/(:num)'] = 'WorkshopC/type_approval3/$1';
$route['selesai_p/(:num)'] = 'WorkshopC/selesai_p/$1';

$route['post_type_approval1'] = 'WorkshopC/post_type_approval1';
$route['post_pengujian'] = 'WorkshopC/post_pengujian';

$route['post_izin_baru1'] = 'WorkshopC/post_izin_baru1';
$route['post_berkas'] = 'WorkshopC/post_berkas';
$route['post_berkas_perpanjang'] = 'WorkshopC/post_berkas_perpanjang';
$route['post_berkas_perpanjang_tidak'] = 'WorkshopC/post_berkas_perpanjang_tidak';

$route['pilihworkshop1'] = 'WorkshopC/pilihworkshop1';
$route['pilihworkshop2'] = 'WorkshopC/pilihworkshop2';
$route['pilihworkshop3'] = 'WorkshopC/pilihworkshop3';

// admin
$route['admin'] = 'AdminC';
$route['datapegawai'] = 'AdminC/datapegawai';
$route['datauser'] = 'AdminC/datauser';

// tatausaha
$route['tatausaha'] = 'TatausahaC';
$route['perizinan'] = 'TatausahaC/perizinan';
$route['verifikasi/(:num)'] = 'TatausahaC/verifikasi/$1';
$route['reinspeksi'] = 'TatausahaC/reinspeksion';
$route['pengujian'] = 'TatausahaC/pengujian';
$route['persetujuan'] = 'TatausahaC/persetujuan';
$route['persetujuan_tolak'] = 'TatausahaC/persetujuan_tolak';
$route['kode_billing'] = 'TatausahaC/post_kode_billing';
$route['kode_billing_2'] = 'TatausahaC/kode_billing_2';
$route['penerbitan'] = 'TatausahaC/post_penerbitan';
$route['profile_t'] = 'TatausahaC/profile';
$route['update_password_t'] = 'TatausahaC/post_update_password';
$route['verifikasiawal/(:num)'] = 'TatausahaC/verifikasiawal_pengujian/$1';
$route['verifikasi_1_tolak'] = 'TatausahaC/verifikasi_1_tolak';
$route['verifikasi_1_terima'] = 'TatausahaC/verifikasi_1_terima';
$route['validasi_1'] 		= 'TatausahaC/validasi_1';
$route['validasi_2'] 		= 'TatausahaC/validasi_2';
$route['hasil_uji'] 		= 'TatausahaC/hasil_uji';
// KASIE
$route['kasie'] = 'KasieC';
// perizinan
$route['izin_kasie'] = 'KasieC/perizinan';
$route['verifikasi_kasie/(:num)'] = 'KasieC/verifikasi/$1';
$route['persetujuan_kasie'] = 'KasieC/persetujuan';
$route['persetujuan_kasie2'] = 'KasieC/persetujuan2';
$route['profil_k'] = 'KasieC/profile';
$route['update_password_k'] = 'KasieC/post_update_password';
// pengujian
$route['pengujiankasie'] = 'KasieC/pengujiankasie';
$route['verifikasiakhir/(:num)'] = 'KasieC/verifikasiakhir_pengujian/$1';
$route['verifikasi_akhir'] = 'KasieC/verifikasi_akhir';

// pimpinan
$route['pimpinan'] = 'PimpinanC';
