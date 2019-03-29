<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Admintu extends CI_Controller
{
    public function index()
    {
        $this->data['lele'] = 'lel';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['jumlah_kapal'] = $this->GeneralM->get_jumlah_kapal()->num_rows();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['jumlah_pengujian'] = $this->GeneralM->get_jumlah_pengujian()->num_rows();
        $this->data['jumlah_inspeksi'] = $this->GeneralM->get_jumlah_inspeksi()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $data['isi'] = $this->load->view('admintu/dashboard_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function verifikasi()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('admintu/verifikasi_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('admintu/Layout', $data);
    }

    public function perizinan()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('admintu/dataperizinan_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('admintu/Layout', $data);
    }
}
