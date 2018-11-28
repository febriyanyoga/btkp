<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tatausaha extends CI_Controller
{
    public function index()
    {
        $this->load->view('tatausaha/LoginV');
    }

    public function dashboard()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('tatausaha/dashboardV', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('tatausaha/Layout', $data);
    }

    public function perizinan()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('tatausaha/Perizinan_baru', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('user/Layout', $data);
    }
}

