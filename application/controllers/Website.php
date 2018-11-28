<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function index()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('website/HomeV', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('website/Layout', $data);
    }

    public function tentang()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('website/tentangV', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('website/Layout', $data);
    }

    public function kontak()
    {
        $this->data['lele'] = 'lel';
        $data['isi'] = $this->load->view('website/kontakV', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('website/Layout ', $data);
    }

    public function login()
    {
        $this->load->view('website/loginV');
    }
}
