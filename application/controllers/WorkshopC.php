<?php

defined('BASEPATH') or exit('No direct script access allowed');
class WorkshopC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        workshop_access();
        $this->load->model(['LoginM','GeneralM','WorkshopM']);
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $data['isi'] = $this->load->view('workshop/Home_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function data_perizinan()
    {
        $data['title'] = 'BTKP - Data Perizinan';
        $data['isi'] = $this->load->view('workshop/dataperizinan_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function data_reinspeksi()
    {
        $data['title'] = 'BTKP - Data Reinspeksi';
        $data['isi'] = $this->load->view('workshop/datareinspeksi_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function pelaporan()
    {
        $data['title'] = 'BTKP - Data Pelaporan';
        $data['isi'] = $this->load->view('workshop/pelaporan_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function perizinan_baru_1()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->num_rows() > 0){
            $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan;
            if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_jenis_alat  != ""){
                redirect('izin_baru2');
            }elseif ($this->WorkshopM->get_berkas_by_id($id_perizinan)->num_rows() > 0 ){
                redirect('izin_baru3');
            }
        }else{
            $data['title'] = 'BTKP - Perizinan Baru';
            $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
            $this->data['jenis_alat']   = $this->GeneralM->get_jenis_alat()->result();
            $data['isi'] = $this->load->view('workshop/Perizinanbaru_v1', $this->data, true);
            $this->load->view('workshop/Layout', $data);
        }
    }
    public function perizinan_baru_2()
    {
        $data['title'] = 'BTKP - Perizinan Baru';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $data['isi'] = $this->load->view('workshop/Perizinanbaru_v2', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }
    public function perizinan_baru_3()
    {
        $data['title'] = 'BTKP - Perizinan Baru';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $data['isi'] = $this->load->view('workshop/Perizinanbaru_v3', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function perizinan_perpanjang()
    {
        $data['title'] = 'BTKP - Perizinan Baru';
        $data['isi'] = $this->load->view('workshop/Perizinanperpanjang_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function type_approval()
    {
        $data['title'] = 'BTKP - Type Approval';
        $data['isi'] = $this->load->view('workshop/Typeapproval_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function feedbackemail()
    {
        $this->load->view('user/feedbackemail_v');
    }



    // alamat
    public function get_kabupaten_kota(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kabupaten_kota($postData);
        echo json_encode($data);
    }

    public function get_kecamatan(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kecamatan($postData);
        echo json_encode($data);
    }

    public function get_kelurahan(){
        $postData = $this->input->post();
        $data = $this->GeneralM->get_kelurahan($postData);
        echo json_encode($data);
    }

    // post
    public function post_izin_baru1(){
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');  
        $this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'required');  
        $this->form_validation->set_rules('kelurahan_pt', 'Kelurahan Perusahaan', 'required');
        $this->form_validation->set_rules('kelurahan_ws', 'Kelurahan Workshop','required');  
        $this->form_validation->set_rules('alamat_workshop', 'Alamat Workshop','required');  
        $this->form_validation->set_rules('akta_perusahaan', 'Akta Perusahaan','required');  
        $this->form_validation->set_rules('email_perusahaan', 'Email Perusahaan');  
        $this->form_validation->set_rules('nama_pimpinan', 'Nama Pimpinan','required');  
        $this->form_validation->set_rules('npwp', 'NPWP','required');  
        $this->form_validation->set_rules('no_tlp', 'Nomor Telfon'); 
        $this->form_validation->set_rules('jenis_alat', 'jenis alat','required');  
        $this->form_validation->set_rules('jenis_perizinan', 'jenis izin','required');  
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $data = array(
                'id_pengguna'               =>  $this->session->userdata('id_pengguna'),
                'nama_perusahaan'           => $this->input->post('nama_perusahaan'), 
                'alamat_perusahaan'         => $this->input->post('alamat_perusahaan'), 
                'id_kel_perusahaan'         => $this->input->post('kelurahan_pt'), 
                'alamat_workshop'           => $this->input->post('alamat_workshop'), 
                'id_kel_workshop'           => $this->input->post('kelurahan_ws'), 
                'akta_perusahaan'           => $this->input->post('akta_perusahaan'), 
                'email_perusahaan'          => $this->input->post('email_perusahaan'), 
                'nama_pimpinan'             => $this->input->post('nama_pimpinan'), 
                'npwp'                      => $this->input->post('npwp'), 
                'no_tlp'                    => $this->input->post('no_tlp')
            );

            $data_izin = array(
                'id_jenis_alat'         =>  $this->input->post('jenis_alat'),
                'id_pengguna'           =>  $this->session->userdata('id_pengguna'),
                'id_jenis_perizinan'    =>  $this->input->post('jenis_perizinan')
            );

            if($insert_id = $this->WorkshopM->insert_perusahaan($data)){
                if($this->WorkshopM->insert_perizinan($data_izin)){
                    $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                    redirect('izin_baru2');
                }else{
                    $this->WorkshopM->hapus_perusahaan($id_perusahaan);
                    $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                    redirect_back();
                }
            }
        }
    }
}
