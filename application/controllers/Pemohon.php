<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Pemohon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('user/Login_v');
    }

    public function feedbackemail()
    {
        $this->load->view('user/feedbackemail_v');
    }

    public function homeuser()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('user/Home_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('user/Layout', $data);
    }

    public function perizinanbaru()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('workshop/Perizinanbaru_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('workshop/Layout', $data);
    }

    public function dataperizinan()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('user/dataperizinan_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('user/Layout', $data);
    }

    public function detailperizinan()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('workshop/detailperizinan_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('workshop/Layout', $data);
    }

    public function datareinspeksi()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('user/datareinspeksi_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('user/Layout', $data);
    }

    public function pelaporan()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('user/pelaporan_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('user/Layout', $data);
    }
}
