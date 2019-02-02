<?php

defined('BASEPATH') or exit('No direct script access allowed');
class PusditjenC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        // in_access();
        // admin_access();
        // $this->load->model(['LoginM', 'GeneralM', 'AdminM']);
        $this->load->model(['GeneralM', 'PusditjenM']);
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['jumlah_kapal'] = $this->GeneralM->get_jumlah_kapal()->num_rows();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['jumlah_pengujian'] = $this->GeneralM->get_jumlah_pengujian()->num_rows();
        $this->data['jumlah_inspeksi'] = $this->GeneralM->get_jumlah_inspeksi()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $data['isi'] = $this->load->view('pusditjen/dashboard_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_perusahaan()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('pusditjen/laporanperusahaan_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_perizinan()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('pusditjen/laporanperizinan_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_sertifikasi()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('pusditjen/laporansertifikasi_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_inspeksi()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('pusditjen/laporaninspeksi_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }
}
