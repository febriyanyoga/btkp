<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class WorkshopC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        workshop_access();
        $this->load->model(['LoginM','GeneralM','WorkshopM','TatausahaM']);
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id_pengguna($id_pengguna)->result();
        $data['isi'] = $this->load->view('workshop/Home_v', $this->data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function data_perizinan()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Data Perizinan';
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id_pengguna($id_pengguna)->result();
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

    public function detailperizinan($id_perizinan)
    {
        $data['detail_perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $data['title'] = 'BTKP - Surat Pelimpahan Kewenangan';
        $data['isi'] = $this->load->view('workshop/detailperizinan_v', $data, true);
        $this->load->view('workshop/Layout', $data);
    }

    public function print_perizinan($id_perizinan){
        $this->data['title'] = "BTKP - Surat Pelimpahan Kewenangan";
        $this->data['detail_perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $this->load->view('workshop/print_perizinan_v', $this->data);
    }

    public function perizinan_baru_1($id_pengguna = null)
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->num_rows() > 0){ //ada perizinan yg belum selesai
            $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan; //ambil id nya
            if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_jenis_alat  != ""){ //kalo jenis alat blm disii
                $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan;
                redirect('izin_baru2/'.$id_perizinan); //ke tab 2
            }elseif ($this->WorkshopM->get_berkas_by_id($id_perizinan)->num_rows() > 0 ){
                redirect('izin_baru3/'.$id_perizinan);
            }
        }else{
            if($this->WorkshopM->get_data_pengguna_by_id($id_pengguna)->row()->nama_perusahaan == ""){
                $data['title'] = 'BTKP - Perizinan Baru';
                $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
                $data['isi'] = $this->load->view('workshop/Perizinanbaru_v1', $this->data, true);
                $this->load->view('workshop/Layout', $data);
            }else{
                redirect('izin_baru22/'."");
            }
        }
    }
    public function perizinan_baru_2($id_perizinan="")
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        if($this->WorkshopM->get_perizinan_by_id($id_pengguna)->num_rows() > 0){
            $id_perizinan = $this->WorkshopM->get_perizinan_by_id($id_pengguna)->row()->id_perizinan;
            if($this->WorkshopM->get_berkas_by_id($id_perizinan)->num_rows() > 0 ){
                redirect('izin_baru3/'.$id_perizinan);
            }
        }else{
            $data['title'] = 'BTKP - Perizinan Baru';
            $this->data['berkas']       = $this->WorkshopM->get_berkas_all()->result();
            $this->data['jenis_alat']   = $this->GeneralM->get_jenis_alat()->result();
            $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
            $data['isi'] = $this->load->view('workshop/Perizinanbaru_v2', $this->data, true);
            $this->load->view('workshop/Layout', $data);
        }
    }
    public function perizinan_baru_3($id_perizinan = null)
    {
        $this->data['id_perizinan'] = $id_perizinan;
        $data['title'] = 'BTKP - Perizinan Baru';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['perizinan']    = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->result();
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
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, periksa kembali data yang anda masukkan');
            redirect_back();
        }else{
            $data = array(
                'id_pengguna'               => $this->session->userdata('id_pengguna'),
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
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan');
                redirect('izin_baru22');
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_berkas(){
        $jumlah_file = $this->WorkshopM->get_berkas_all()->num_rows();
        $data_izin = array(
            'id_jenis_alat'         =>  $this->input->post('jenis_alat'),
            'id_pengguna'           =>  $this->session->userdata('id_pengguna'),
            'id_jenis_perizinan'    =>  $this->input->post('jenis_perizinan')
        );
        if($id_perizinan = $this->WorkshopM->insert_perizinan($data_izin)){
            for ($i=1; $i <= $jumlah_file; $i++){
                $input_name     = 'files'.$i;
                $id_berkas_perizinan = 'id_berkas_perizinan'.$i;
                $namaFile   = $this->upload_file($input_name);
                if($namaFile['result'] == 'success'){
                    $data = array(
                        'id_perizinan'          => $id_perizinan, 
                        'id_berkas_perizinan'   => $this->input->post($id_berkas_perizinan), 
                        'nama_file'             => $namaFile['file_name'], 
                        'ukuran_berkas'         => $namaFile['file_size'], 
                    );
                    if($this->WorkshopM->insert_detail_berkas($data)){
                        $this->session->set_flashdata('sukses','Data berhasil diupload');
                    }else{
                        $this->session->set_flashdata('error','Gagal diupload');
                    }
                }else{
                    $this->session->set_flashdata('error','Gagal diupload');
                }
            }
            redirect('izin_baru3/'.$id_perizinan);   
        }
    }

    public function konfirmasi_pembayaran(){
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required');
        $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
            redirect_back();
        }else {
            $upload = $this->upload_file('foto_bukti_trf');
            if($upload['result'] == 'success'){
                $data = array(
                    'nama_bank'      => $this->input->post('nama_bank'),
                    'atas_nama'      => $this->input->post('atas_nama'),
                    'foto_bukti_trf' => $upload['file_name'],
                );
                $id_perizinan = $this->input->post('id_perizinan');
                if($this->WorkshopM->selesai($id_perizinan, $data)) {
                    $this->session->set_flashdata('sukses', 'Konfirmasi pembayaran berhasil diunggah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Konfirmasi tidak pembayaran berhasil diunggah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error', 'Konfirmasi tidak pembayaran berhasil diunggah');
                redirect_back();
            }
        }
    }

    public function upload_file($input_name){
        $config['upload_path'] = './assets/upload/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
        $config['max_size'] = '5000'; // max_size in kb
        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if(!empty($_FILES[$input_name]['name'])){
            if($this->upload->do_upload($input_name)){
                $gbr = $this->upload->data();
                $return = array('result' => 'success', 'file_name' => $gbr['file_name'], 'file_size' => $gbr['file_size'], 'error' => '');
                return $return;
            }
        }else{
            $return = array('result' => 'Error', 'file_name' => 'no file', 'error' => '');
            return $return;
            echo "Data yang diupload kosong";
        }
    }

    public function selesai($id_perizinan){
        $data = array('status_pengajuan' => 'selesai');
        if($this->WorkshopM->selesai($id_perizinan, $data)){
            $this->session->set_flashdata('sukses', 'Permohonan perizinan berhasil disimpan');
            redirect('workshop');
        }else{
            $this->session->set_flashdata('error', 'Gagal menyelesaikan Permohonan perizinan');
            redirect_back();
        }
    }
    public function cetak_produk($id_perizinan){
        $this->data['perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $this->load->view('workshop/invoice_v',$this->data);
    }
    
    public function print_surat($id_perizinan){
        // $data['perizinan'] = $this->WorkshopM->get_all_perizinan_by_id($id_perizinan)->row();
        $data['produk'] = 'print';
        $this->load->view('workshop/print_surat', $data);
    }
}
