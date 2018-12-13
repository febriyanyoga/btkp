<?php

defined('BASEPATH') or exit('No direct script access allowed');
class AdminC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        admin_access();
        $this->load->model(['LoginM','GeneralM']);
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $data['isi'] = $this->load->view('admin/dashboard_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function masterdata()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('admin/masterdata_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function datauser()
    {
        $data['title'] = 'BTKP - Data User';
        $data['isi'] = $this->load->view('admin/datauser_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function datapegawai()
    {
        $data['title'] = 'BTKP - Data Pegawai';
        $data['isi'] = $this->load->view('admin/datapegawai_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function dataalat_v()
    {
        $data['title'] = 'BTKP - Data Pegawai';
        $data['isi'] = $this->load->view('admin/datapegawai_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }
}
