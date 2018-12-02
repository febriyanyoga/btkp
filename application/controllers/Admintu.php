<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admintu extends CI_Controller
{
    public function index()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('admintu/dashboard_v', $this->data, true);
        // $data['isi'] = "isi";
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
