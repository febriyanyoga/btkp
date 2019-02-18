<?php

defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'HomeC';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// index
$route['daftar'] = 'HomeC/post_daftar';
$route['home'] = 'HomeC';
$route['login_admin'] = 'HomeC/login_admin';
$route['login'] = 'HomeC/post_login_user';
$route['post_login_admin'] = 'HomeC/post_login_admin';
$route['logout'] = 'HomeC/logout';
$route['logout_admin'] = 'HomeC/logout_admin';
$route['konfirmasi/(:any)'] = 'HomeC/konfirmasi/$1';
// $route['tentang'] = 'website/tentang';

// workshop
$route['workshop'] = 'WorkshopC';
$route['tampil/(:any)'] = 'WorkshopC/aktif/$1';
$route['tidak/(:any)'] = 'WorkshopC/non_aktif/$1';
$route['post_maker'] = 'WorkshopC/post_maker';
$route['post_edit_maker'] = 'WorkshopC/post_edit_maker';
$route['data_perizinan'] = 'WorkshopC/data_perizinan';
$route['profile_w'] = 'WorkshopC/profile';
$route['data_reinspeksi'] = 'WorkshopC/data_reinspeksi';
$route['pelaporan'] = 'WorkshopC/pelaporan';
$route['izin_baru'] = 'WorkshopC/perizinan_baru_1';
$route['izin_baru22'] = 'WorkshopC/perizinan_baru_2';
$route['izin_baru2/(:num)'] = 'WorkshopC/perizinan_baru_2/$1';
$route['izin_baru3/(:num)'] = 'WorkshopC/perizinan_baru_3/$1';
$route['selesai/(:num)'] = 'WorkshopC/selesai/$1';
$route['konfirmasi'] = 'WorkshopC/konfirmasi_pembayaran';
$route['konfirmasi_ujian_1'] = 'WorkshopC/konfirmasi_pembayaran_1';
$route['konfirmasi_ujian_2'] = 'WorkshopC/konfirmasi_pembayaran_2';
$route['file_survey'] = 'WorkshopC/post_file_survey';

$route['detailperizinan/(:num)'] = 'WorkshopC/detailperizinan/$1';
$route['cetak_invoice/(:num)'] = 'WorkshopC/cetak_produk/$1';
$route['cetak_invoice_ujian/(:num)'] = 'WorkshopC/cetak_invoice_ujian/$1';
$route['cetak_invoice_ujian2/(:num)'] = 'WorkshopC/cetak_invoice_ujian2/$1';
$route['cetak_tagihan_ins/(:num)'] = 'WorkshopC/cetak_tagihan_ins/$1';
$route['cetak_bukti_bayar_ins/(:num)'] = 'WorkshopC/cetak_bukti_bayar_ins/$1';
$route['print_surat/(:num)'] = 'WorkshopC/print_surat/$1';
$route['print_sertifikat_pengujian/(:num)'] = 'WorkshopC/print_sertifikat_pengujian/$1';
$route['print_label/(:num)'] = 'WorkshopC/print_label/$1';
$route['cetak_label_ins/(:num)'] = 'WorkshopC/cetak_label_ins/$1';
$route['update_password'] = 'WorkshopC/post_update_password';
$route['update_perusahaan'] = 'WorkshopC/post_update_perusahaan';

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
$route['post_berkas_w'] = 'WorkshopC/post_berkas';
$route['post_berkas_perpanjang'] = 'WorkshopC/post_berkas_perpanjang';
$route['post_berkas_perpanjang_tidak'] = 'WorkshopC/post_berkas_perpanjang_tidak';

$route['pilihworkshop1'] = 'WorkshopC/pilihworkshop1';
$route['pilihworkshop2'] = 'WorkshopC/pilihworkshop2';
$route['pilihworkshop3'] = 'WorkshopC/pilihworkshop3';
$route['post_proses'] = 'WorkshopC/post_proses_reinspeksi';
$route['post_inspeksi'] = 'WorkshopC/post_inspeksi';
$route['konfirmasi_ins'] = 'WorkshopC/konfirmasi_ins';
$route['cetak_ins/(:num)'] = 'WorkshopC/cetak_ins/$1';

// admin
$route['admin'] = 'AdminC';
$route['perizinan_admin'] = 'AdminC/perizinan';
$route['pengujian_admin'] = 'AdminC/pengujian';
$route['reinspeksi_admin'] = 'AdminC/reinspeksi';
$route['profile'] = 'AdminC/profile';
$route['update_password_a'] = 'AdminC/post_update_password';
$route['datapengguna'] = 'AdminC/datapengguna';
$route['dataalat'] = 'AdminC/dataalat';
$route['datasyarat'] = 'AdminC/datasyarat';
$route['datapelayanan'] = 'AdminC/datapelayanan';
$route['daftar_admin'] = 'AdminC/post_daftar';
$route['daftar_alat'] = 'AdminC/post_alat';
$route['edit_pengguna'] = 'AdminC/post_edit_pengguna';
$route['post_berkas'] = 'AdminC/post_berkas';
$route['post_edit_berkas'] = 'AdminC/post_edit_berkas';
$route['edit_alat'] = 'AdminC/post_edit_alat';
$route['non_aktif_admin/(:any)'] = 'AdminC/non_aktif_admin/$1';
$route['aktif_admin/(:any)'] = 'AdminC/aktif_admin/$1';
$route['non_aktif_alat/(:any)'] = 'AdminC/non_aktif_alat/$1';
$route['aktif_alat/(:any)'] = 'AdminC/aktif_alat/$1';
$route['non_aktif_berkas/(:any)'] = 'AdminC/non_aktif_berkas/$1';
$route['aktif_berkas/(:any)'] = 'AdminC/aktif_berkas/$1';

// tatausaha
$route['validasi_ins'] = 'TatausahaC/validasi_ins';
$route['post_kode_inspeksi'] = 'TatausahaC/kode_billing_inspeksi';
$route['tatausaha'] = 'TatausahaC';
$route['perizinan'] = 'TatausahaC/perizinan';
$route['verifikasi/(:num)'] = 'TatausahaC/verifikasi/$1';
$route['reinspeksi'] = 'TatausahaC/reinspeksi';
$route['verifikasiawalinspeksi/(:num)'] = 'TatausahaC/verifikasiawalinspeksi/$1';
$route['pengujian'] = 'TatausahaC/pengujian';
$route['persetujuan'] = 'TatausahaC/persetujuan';
$route['persetujuan_tolak'] = 'TatausahaC/persetujuan_tolak';
$route['kode_billing'] = 'TatausahaC/post_kode_billing';
$route['kode_billing_2'] = 'TatausahaC/kode_billing_2';
$route['penerbitan'] = 'TatausahaC/post_penerbitan';
$route['penerbitan_lagi'] = 'TatausahaC/penerbitan';
$route['profile_t'] = 'TatausahaC/profile';
$route['update_password_t'] = 'TatausahaC/post_update_password';
$route['verifikasiawal/(:num)'] = 'TatausahaC/verifikasiawal_pengujian/$1';
$route['verifikasi_1_tolak'] = 'TatausahaC/verifikasi_1_tolak';
$route['verifikasi_1_terima'] = 'TatausahaC/verifikasi_1_terima';
$route['validasi_1'] = 'TatausahaC/validasi_1';
$route['validasi_2'] = 'TatausahaC/validasi_2';
$route['hasil_uji'] = 'TatausahaC/hasil_uji';
$route['post_verif_ins'] = 'TatausahaC/post_verif_ins';
$route['penerbitan_ins'] = 'TatausahaC/post_penerbitan_ins';

// KASIE
$route['kasie'] = 'KasieC';
// perizinan
$route['reinspeksi_kasie'] = 'KasieC/reinspeksi';
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
$route['profile_pimpinan'] = 'PimpinanC/profile';
$route['post_password_pimpinan'] = 'PimpinanC/post_update_password';
$route['perizinan_pimpinan'] = 'PimpinanC/perizinan';
$route['pengujian_pimpinan'] = 'PimpinanC/pengujian';
$route['reinspeksi_pimpinan'] = 'PimpinanC/reinspeksi';
$route['pengesahan'] = 'PimpinanC/pengesahan';
$route['post_ttd'] = 'PimpinanC/post_ttd';
$route['pengesahan_izin/(:any)'] = 'PimpinanC/pengesahan_izin/$1';
$route['pengesahan_ujian/(:any)'] = 'PimpinanC/pengesahan_ujian/$1';
$route['pengesahan_inspeksi/(:any)'] = 'PimpinanC/pengesahan_inspeksi/$1';

//pusditjen
$route['pusditjen'] = 'PusditjenC';
$route['profile_pusditjen'] = 'PusditjenC/profile';
$route['laporan_perusahaan'] = 'PusditjenC/laporan_perusahaan';
$route['laporan_perizinan'] = 'PusditjenC/laporan_perizinan';
$route['laporan_sertifikasi'] = 'PusditjenC/laporan_sertifikasi';
$route['laporan_inspeksi'] = 'PusditjenC/laporan_inspeksi';
$route['post_password_pusditjen'] = 'PusditjenC/post_update_password';
$route['print_laporan_perusahaan'] = 'PusditjenC/print_laporan_perusahaan';
$route['print_laporan_perizinan'] = 'PusditjenC/print_laporan_perizinan';
$route['print_laporan_pengujian'] = 'PusditjenC/print_laporan_pengujian';
$route['print_laporan_reinspeksi'] = 'PusditjenC/print_laporan_reinspeksi';
