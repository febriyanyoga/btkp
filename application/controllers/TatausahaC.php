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
        $data['isi'] = $this->load->view('admintu/dashboard_v', $this->data, true);
        $this->load->view('admintu/Layout', $data);
    }

    public function perizinan()
    {
        $data['title'] = 'BTKP - Data Perizinan';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['perizinan'] = $this->TatausahaM->get_all_perizinan_by_id_pengguna()->result();
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
