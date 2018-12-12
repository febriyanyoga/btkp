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

    // post

    public function persetujuan()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        } else {
            $data = array(
                'id_pengguna' => $this->input->post('id_pengguna'),
                'id_perizinan' => $this->input->post('id_perizinan'),
                'keterangan' => $this->input->post('keterangan'),
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
            }elseif($no_spk >= 10){
                $no_spk ='00'.$no_spk;
            }elseif($no_spk >= 100){
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
        $data['title'] = 'BTKP - reinspeksion';
        $data['isi'] = $this->load->view('admintu/pengujian_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }
}
