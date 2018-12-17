<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class TatausahaC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        tu_access();
        $this->load->model(['LoginM', 'TatausahaM', 'WorkshopM', 'GeneralM']);
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $data['isi'] = $this->load->view('admintu/dashboard_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function perizinan()
    {
        $data['title'] = 'BTKP - Data Perizinan';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['perizinan'] = $this->TatausahaM->get_all_perizinan_by_id_pengguna()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $data['isi'] = $this->load->view('admintu/dataperizinan_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function verifikasi($id_perizinan)
    {
        $data['title'] = 'BTKP - verifikasi';
        $this->data['id_perizinan'] = $id_perizinan;
        $this->data['detail_perizinan'] = $this->TatausahaM->get_all_perizinan_by_id($id_perizinan)->result();
        $data['isi'] = $this->load->view('admintu/verifikasi_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profil';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['profil']       = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
        $data['isi'] = $this->load->view('admintu/profile_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    // post
    public function post_update_password(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[konfirmasi_password_baru]');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','konfirmasi kata sandi baru tidak cocok');
            redirect_back();
        }else{
            $email_pengguna     = $this->input->post('email_pengguna');
            $password           = $this->input->post('password_lama');
            $this->db->select('*');
            $this->db->from('pengguna P');
            $this->db->where('email_pengguna', $email_pengguna);
            $this->db->where('password',  md5($password));
            $user = $this->db->get();

            if($user->num_rows() > 0){
                $data_update_password = array(
                    'password' => md5($this->input->post('password_baru')),
                );
                $id_pengguna = $this->input->post('id_pengguna');
                if($this->GeneralM->update_pengguna($id_pengguna, $data_update_password)){
                    $this->session->set_flashdata('sukses', 'Password berhasil diubah');
                    redirect_back();
                }else{
                    $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error','Password lama tidak sesuai');
                redirect_back();
            }

        }
    }

    public function persetujuan_tolak()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $keterangan=$this->input->post('keterangan');
            $ket="";
            $i=1;
            foreach($keterangan as $ket1){
                if($ket1!=""){
                    $nama = $this->TatausahaM->get_berkas_by_id2($i)->row()->nama_berkas;
                    $ket .= $nama.' : '.$ket1."<br>";
                }
                $i++;
            }

            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'id_perizinan' => $this->input->post('id_perizinan'),
                'keterangan' => $ket,
                'status' => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan($data)) {
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil');
                redirect('perizinan');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function persetujuan()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $keterangan=$this->input->post('keterangan');

            $data = array(
                'id_pengguna'   => $this->input->post('id_pengguna'),
                'id_perizinan'  => $this->input->post('id_perizinan'),
                'keterangan'    => $keterangan,
                'status'        => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan($data)) {
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil');
                redirect('perizinan');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function verifikasi_1_tolak(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $keterangan=$this->input->post('keterangan');

            $data = array(
                'id_pengguna'   => $this->input->post('id_pengguna'),
                'id_pengujian'  => $this->input->post('id_pengujian'),
                'keterangan'    => $keterangan,
                'status'        => $this->input->post('status'),
            );

            if ($this->GeneralM->insert_persetujuan_pengujian($data)) {
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil');
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function verifikasi_1_terima(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian');
        $this->form_validation->set_rules('keterangan', 'keterangan');
        $this->form_validation->set_rules('status', 'Status', 'required');

        $this->form_validation->set_rules('kode_billing', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing', 'Masa Berlaku Billing', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $keterangan=$this->input->post('keterangan');

            $data = array(
                'id_pengguna'   => $this->input->post('id_pengguna'),
                'id_pengujian'  => $this->input->post('id_pengujian'),
                'keterangan'    => $keterangan,
                'status'        => $this->input->post('status'),
            );

            $id_pengujian = $this->input->post('id_pengujian');
            $data_billing = array(
                'kode_billing_1'          => $this->input->post('kode_billing'),
                'id_bank_btkp_1'          => $this->input->post('id_bank_btkp'),
                'jumlah_tagihan_1'        => $this->input->post('jumlah_tagihan'),
                'masa_berlaku_billing_1'  => $this->input->post('masa_berlaku_billing'),
            );

            if ($this->GeneralM->insert_persetujuan_pengujian($data)) {
                $this->TatausahaM->insert_billing_ujian($id_pengujian, $data_billing);
                $this->session->set_flashdata('sukses', 'Verifikasi berhasil');
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function kode_billing_2(){
        $this->form_validation->set_rules('kode_billing_2', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp_2', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan_2', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing_2', 'Masa Berlaku Billing', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
            redirect_back();
        }else{

            $id_pengujian = $this->input->post('id_pengujian');
            $data_billing = array(
                'kode_billing_2'          => $this->input->post('kode_billing_2'),
                'id_bank_btkp_2'          => $this->input->post('id_bank_btkp_2'),
                'jumlah_tagihan_2'        => $this->input->post('jumlah_tagihan_2'),
                'masa_berlaku_billing_2'  => $this->input->post('masa_berlaku_billing_2'),
            );

            if ($this->TatausahaM->insert_billing_ujian($id_pengujian, $data_billing)) {
                $this->session->set_flashdata('sukses', 'Data berhasil disimpan');
                redirect('pengujian');
            } else {
                $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function validasi_1(){
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
        $this->form_validation->set_rules('status_pembayaran_1', 'Status Pembayaran','required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $id_pengujian = $this->input->post('id_pengujian');
            $data = array(
                'status_pembayaran_1' => $this->input->post('status_pembayaran_1'), 
            );
            if($this->WorkshopM->selesai_p($id_pengujian, $data)){
                $this->session->set_flashdata('sukses', 'Validasi berhasil');
                redirect_back();
            }else{
                $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }


    public function post_kode_billing(){
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan','required');
        $this->form_validation->set_rules('kode_billing', 'Kode Billing', 'required');
        $this->form_validation->set_rules('id_bank_btkp', 'Bank BTKP', 'required');
        $this->form_validation->set_rules('jumlah_tagihan', 'Jumlah Tagihan', 'required');
        $this->form_validation->set_rules('masa_berlaku_billing', 'Masa Berlaku Billing', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_perizinan = $this->input->post('id_perizinan');
            $data = array(
                'kode_billing'      => $this->input->post('kode_billing'),
                'id_bank_btkp'      => $this->input->post('id_bank_btkp'),
                'jumlah_tagihan'    => $this->input->post('jumlah_tagihan'),
                'masa_berlaku_billing' => $this->input->post('masa_berlaku_billing'),
            );

            if ($this->TatausahaM->insert_billing($id_perizinan, $data)) {
                $this->session->set_flashdata('sukses', 'Billing berhasil dimasukkan');
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Data tidak berhasil disimpan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function validasi_2(){
        $this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
        $this->form_validation->set_rules('status_pembayaran_2', 'Status Pembayaran','required');
        $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit','required');
        $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired','required');
        $this->form_validation->set_rules('no_awal', 'No Label Awal','required');
        $this->form_validation->set_rules('no_akhir', 'No Label Akhir','required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else{
            $id_pengujian = $this->input->post('id_pengujian');
            $th = date('Y');//th sekarang
            $tgl = $th.'12'.'31'; //tgl bandingin
            if($this->TatausahaM->get_last_ujian_terbit($tgl)->num_rows() > 0){
                $nomor_sblm = $this->TatausahaM->get_last_ujian_terbit($tgl)->row()->no_spk;
                $no_spk = $nomor_sblm+1;
            }else{
                $no_spk = 1;
            }

            $kode_alat = $this->WorkshopM->get_pengujian_by_id2($id_pengujian)->row()->kode_alat;
            if($no_spk < 10){
                $no_spk = '000'.$no_spk;
            }elseif($no_spk <= 100){
                $no_spk ='00'.$no_spk;
            }elseif($no_spk < 1000){
                $no_spk = '0'.$no_spk;
            }elseif($no_spk >= 1000) {
                $no_spk = $no_spk;
            }

            $no_awal    = $this->input->post('no_awal');
            $no_akhir   = $this->input->post('no_akhir');

            if($no_awal < 10){
                $no_awal = '000'.$no_awal;
            }elseif($no_awal <= 100){
                $no_awal ='00'.$no_spk;
            }elseif($no_awal < 1000){
                $no_awal = '0'.$no_awal;
            }elseif($no_awal >= 1000) {
                $no_awal = $no_awal;
            }

            if($no_akhir < 10){
                $no_akhir = '000'.$no_akhir;
            }elseif($no_akhir <= 100){
                $no_akhir ='00'.$no_akhir;
            }elseif($no_akhir < 1000){
                $no_akhir = '0'.$no_akhir;
            }elseif($no_akhir >= 1000) {
                $no_akhir = $no_akhir;
            }

            $barcode = $kode_alat.$no_spk.date('y');
            $data = array(
                'status_pembayaran_2'   => $this->input->post('status_pembayaran_2'), 
                'kode_barcode'          => $barcode, 
                'no_spk'                => $no_spk, 
                'tgl_terbit'            => $this->input->post('tgl_terbit'), 
                'tgl_expired'           => $this->input->post('tgl_expired'), 
                'no_awal'               => $no_awal, 
                'no_akhir'              => $no_akhir, 
            );

            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './application/cache/'; //string, the default is application/cache/
            $config['errorlog']     = './application/logs/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name=$barcode.'.png'; //buat name dari qr code sesuai dengan nim
            $params['data'] = $barcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            if($this->WorkshopM->selesai_p($id_pengujian, $data)){
                $this->session->set_flashdata('sukses', 'Validasi berhasil');
                redirect_back();
            }else{
                $this->session->set_flashdata('error', 'Validasi gagal, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }
    public function post_penerbitan(){
        $this->form_validation->set_rules('status_pembayaran', 'Status Pembayaran');
        // $this->form_validation->set_rules('nomor_spk', 'Nomor SPK', 'required');
        $this->form_validation->set_rules('tgl_terbit', 'Tanggal Terbit', 'required');
        $this->form_validation->set_rules('tgl_expired', 'Tanggal Expired', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Data Penerbitan berhasil dimasukkan, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $id_perizinan = $this->input->post('id_perizinan');
            $th = date('Y');//th sekarang
            $tgl = $th.'12'.'31'; //tgl bandingin

            if($this->TatausahaM->get_last_izin_terbit($tgl)->num_rows() > 0){
                $nomor_sblm = $this->TatausahaM->get_last_izin_terbit($tgl)->row()->no_spk;
                $no_spk = $nomor_sblm+1;
            }else{
                $no_spk = 1;
            }

            $kode_alat = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row()->kode_alat;
            if($no_spk < 10){
                $no_spk = '000'.$no_spk;
            }elseif($no_spk <= 100){
                $no_spk ='00'.$no_spk;
            }elseif($no_spk < 1000){
                $no_spk = '0'.$no_spk;
            }elseif($no_spk >= 1000) {
                $no_spk = $no_spk;
            }
            $barcode = $kode_alat.$no_spk.date('y');

            $data = array(
                'status_pembayaran' => $this->input->post('status_pembayaran'),
                'no_spk'            => $no_spk,
                'kode_barcode'      => $barcode,
                'tgl_terbit'        => $this->input->post('tgl_terbit'),
                'tgl_expired'       => $this->input->post('tgl_expired'),
            );
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE
            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './application/cache/'; //string, the default is application/cache/
            $config['errorlog']     = './application/logs/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/img/qrcode/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224,255,255); // array, default is array(255,255,255)
            $config['white']        = array(70,130,180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $image_name=$barcode.'.png'; //buat name dari qr code sesuai dengan nim
            $params['data'] = $barcode; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            if ($this->WorkshopM->selesai($id_perizinan, $data)) {

                $this->session->set_flashdata('sukses', 'Data Penerbitan berhasil dimasukkan');
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Data Penerbitan berhasil dimasukkan, cek kembali data yang anda masukkan');
                redirect_back();
            }
        }
    }

    public function reinspeksion()
    {
        $data['title'] = 'BTKP - reinspeksion';
        $data['isi'] = $this->load->view('admintu/datareinspeksi_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function pengujian()
    {
        $data['title'] = 'BTKP - Sertifikasi';
        $this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $data['isi'] = $this->load->view('admintu/pengujian/pengujian_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }
    public function verifikasiawal_pengujian($id_pengujian)
    {
        $data['title'] = 'BTKP - Verifikasi Permohonan Perizinan';
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['pengujian'] = $this->TatausahaM->get_pengujian_by_id($id_pengujian)->row();
        $data['isi'] = $this->load->view('admintu/pengujian/verifikasiawal_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function hasil_uji(){
        $upload = $this->upload_file('hasil_pengujian');
        if($upload['result'] == 'success'){
            $data = array(
                'file_hasil_pengujian' => $upload['file_name'],
            );
            $id_pengujian = $this->input->post('id_pengujian');
            if($this->WorkshopM->selesai_p($id_pengujian, $data)) {
                $this->session->set_flashdata('sukses', 'Dokumen hasil pengujian berhasil diunggah');
                redirect_back();
            } else {
                $this->session->set_flashdata('error', 'Dokumen hasil pengujian tidak berhasil diunggah');
                redirect_back();
            }
        }else{
            $this->session->set_flashdata('error', 'Dokumen hasil pengujian tidak berhasil diunggah');
            redirect_back();
        }
    }

    public function upload_file($input_name){
        $config['upload_path'] = './assets/img/hasil_uji/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx|png';
        $config['max_size'] = '5000'; // max_size in kb
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if(!empty($_FILES[$input_name]['name'])){
            if($this->upload->do_upload($input_name)){
                $gbr = $this->upload->data();
                $return = array('result' => 'success', 'file_name' => $gbr['file_name'], 'file_size' => $gbr['file_size'], 'error' => '');
                return $return;
            }
        }else{
            $return = array('result' => 'Error', 'file_name' => 'no file', 'error' => '');
            return $return;
            echo "Data yang diupload kosong";
        }
    }
}
