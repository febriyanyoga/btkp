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
        $this->load->model(['LoginM', 'GeneralM', 'AdminM']);
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

    public function datapengguna()
    {
        $data['title'] = 'BTKP - Data User';
        $this->data['jabatan'] = $this->LoginM->get_jabatan()->result();
        $this->data['data_pengguna'] = $this->AdminM->get_pengguna()->result();
        $data['isi'] = $this->load->view('admin/datapengguna_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function dataalat()
    {
        $data['title'] = 'BTKP - Data Alat Keselamatan';
        $this->data['alat'] = $this->AdminM->get_alat()->result();
        $data['isi'] = $this->load->view('admin/dataalat_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function datasyarat()
    {
        $data['title'] = 'BTKP - Data Berkas Pengajuan';
        $this->data['berkas'] = $this->AdminM->get_berkas()->result();
        $data['isi'] = $this->load->view('admin/datasyarat_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function datapelayanan()
    {
        $data['title'] = 'BTKP - Data Pegawai';
        $data['isi'] = $this->load->view('admin/datapelayanan', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profil';
        $this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
        $this->data['profil']       = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
        $data['isi'] = $this->load->view('admin/profile_v', $this->data, true);
        $this->load->view('admin/Layout', $data);
    }

    public function post_update_password(){
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[konfirmasi_password_baru]');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','konfirmasi kata sandi baru tidak cocok');
            redirect_back();
        }else{
            $email_pengguna     = $this->input->post('email_pengguna');
            $password           = $this->input->post('password_lama');
            $this->db->select('*');
            $this->db->from('pengguna P');
            $this->db->where('email_pengguna', $email_pengguna);
            $this->db->where('password',  md5($password));
            $user = $this->db->get();

            if($user->num_rows() > 0){
                $data_update_password = array(
                    'password' => md5($this->input->post('password_baru')), 
                );
                $id_pengguna = $this->input->post('id_pengguna');
                if($this->GeneralM->update_pengguna($id_pengguna, $data_update_password)){
                    $this->session->set_flashdata('sukses', 'Password berhasil diubah');
                    redirect_back();
                }else{
                    $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                    redirect_back();
                }
            }else{
                $this->session->set_flashdata('error','Password lama tidak sesuai');
                redirect_back();
            }

        }
    }

    public function post_daftar(){
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');  
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required|valid_email|is_unique[pengguna.email_pengguna]');  
        $this->form_validation->set_rules('id_jabatan', 'Jabatan Pengguna', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|max_length[10]'); 
        $this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, alamat email sudah dipakai');
            redirect_back();
        }else{
            $data = array(
                'nama_pengguna'     => $this->input->post('nama_pengguna'),
                'email_pengguna'    => $this->input->post('email_pengguna'),
                'no_hp'             => $this->input->post('no_hp'),
                'id_jabatan'        => $this->input->post('id_jabatan'),
                'password'          => md5($this->input->post('password')),
            );
            if($id = $this->LoginM->insert('pengguna', $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_edit_pengguna(){
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');  
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');  
        $this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');  
        $this->form_validation->set_rules('id_jabatan', 'Jabatan Pengguna', 'required'); 
        if($this->input->post('password') != ''){
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirm_password]');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|max_length[10]'); 
        }
        // $this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan, alamat email sudah dipakai');
            redirect_back();
        }else{
            if($this->input->post('password') != ''){
                $data = array(
                    'nama_pengguna'     => $this->input->post('nama_pengguna'),
                    'email_pengguna'    => $this->input->post('email_pengguna'),
                    'no_hp'             => $this->input->post('no_hp'),
                    'id_jabatan'        => $this->input->post('id_jabatan'),
                    'password'          => md5($this->input->post('password')),
                );
            }else{
                $data = array(
                    'nama_pengguna'     => $this->input->post('nama_pengguna'),
                    'email_pengguna'    => $this->input->post('email_pengguna'),
                    'no_hp'             => $this->input->post('no_hp'),
                    'id_jabatan'        => $this->input->post('id_jabatan'),
                );
            }
            $id_pengguna =  $this->input->post('id_pengguna');
            if($id = $this->AdminM->update($id_pengguna, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function non_aktif_admin($id_pengguna){
        $data = array(
            'status_email'  => 'non-aktif', 
            'status_akun'   => 'non-aktif', 
        );

        if($id = $this->AdminM->update($id_pengguna, $data)){
            $this->session->set_flashdata('sukses','Akun berhasil di non-aktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Akun tidak berhasil di non-aktifkan.');
            redirect_back();
        }
    }

    public function aktif_admin($id_pengguna){
        $data = array(
            'status_email'  => 'aktif', 
            'status_akun'   => 'aktif', 
        );

        if($id = $this->AdminM->update($id_pengguna, $data)){
            $this->session->set_flashdata('sukses','Akun berhasil diaktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Akun tidak berhasil diaktifkan.');
            redirect_back();
        }
    }

    public function post_alat(){
        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');  
        $this->form_validation->set_rules('kode_alat', 'Kode Alat', 'required');  
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
            redirect_back();
        }else{
            $data = array(
                'nama_alat'     => $this->input->post('nama_alat'),
                'kode_alat'     => $this->input->post('kode_alat'),
                'keterangan'    => $this->input->post('keterangan'),
            );
            if($id = $this->LoginM->insert('jenis_alat_keselamatan', $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_edit_alat(){
        $this->form_validation->set_rules('id_jenis_alat', 'ID Alat', 'required');  
        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');  
        $this->form_validation->set_rules('kode_alat', 'Kode Alat', 'required');  
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
            redirect_back();
        }else{
            $data = array(
                'nama_alat'     => $this->input->post('nama_alat'),
                'kode_alat'     => $this->input->post('kode_alat'),
                'keterangan'    => $this->input->post('keterangan'),
            );
            $id_jenis_alat = $this->input->post('id_jenis_alat');
            if($id = $this->AdminM->update_alat($id_jenis_alat, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function non_aktif_alat($id_jenis_alat){
        $data = array(
            'status'  => 'non-aktif', 
        );

        if($id = $this->AdminM->update_alat($id_jenis_alat, $data)){
            $this->session->set_flashdata('sukses','Alat Keselamatan berhasil di non-aktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Alat Keselamatan tidak berhasil di non-aktifkan.');
            redirect_back();
        }
    }

    public function aktif_alat($id_jenis_alat){
        $data = array(
            'status'  => 'aktif', 
        );

        if($id = $this->AdminM->update_alat($id_jenis_alat, $data)){
            $this->session->set_flashdata('sukses','Alat Keselamatan berhasil diaktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Alat Keselamatan tidak berhasil diaktifkan.');
            redirect_back();
        }
    }

    public function post_berkas(){
        $this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'required');  
        $this->form_validation->set_rules('jenis', 'Jenis Berkas', 'required');  
        $this->form_validation->set_rules('syarat_berkas', 'Syarat Berkas', 'required'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
            redirect_back();
        }else{
            $data = array(
                'nama_berkas'       => $this->input->post('nama_berkas'),
                'jenis'             => $this->input->post('jenis'),
                'syarat_berkas'     => $this->input->post('syarat_berkas'),
            );
            if($id = $this->LoginM->insert('berkas_perizinan', $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function post_edit_berkas(){
        $this->form_validation->set_rules('id_berkas_perizinan', 'ID Berkas', 'required');  
        $this->form_validation->set_rules('nama_berkas', 'Nama Berkas', 'required');  
        $this->form_validation->set_rules('jenis', 'Jenis Berkas');  
        $this->form_validation->set_rules('syarat_berkas', 'Syarat Berkas', 'required'); 
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
            redirect_back();
        }else{
            $data = array(
                'nama_berkas'       => $this->input->post('nama_berkas'),
                'jenis'             => $this->input->post('jenis'),
                'syarat_berkas'     => $this->input->post('syarat_berkas'),
            );
            $id_berkas_perizinan = $this->input->post('id_berkas_perizinan');
            if($id = $this->AdminM->update_berkas($id_berkas_perizinan, $data)){
                $this->session->set_flashdata('sukses','Data anda berhasil disimpan.');
                redirect_back();
            }else{
                $this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
                redirect_back();
            }
        }
    }

    public function non_aktif_berkas($id_berkas_perizinan){
        $data = array(
            'status'  => 'tidak', 
        );

        if($id = $this->AdminM->update_berkas($id_berkas_perizinan, $data)){
            $this->session->set_flashdata('sukses','Syarat Pengajuan berhasil di non-aktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Syarat Pengajuan tidak berhasil di non-aktifkan.');
            redirect_back();
        }
    }

    public function aktif_berkas($id_berkas_perizinan){
        $data = array(
            'status'  => 'tampil', 
        );

        if($id = $this->AdminM->update_berkas($id_berkas_perizinan, $data)){
            $this->session->set_flashdata('sukses','Syarat Pengajuan berhasil diaktifkan.');
            redirect_back();
        }else{
            $this->session->set_flashdata('error','Syarat Pengajuan tidak berhasil diaktifkan.');
            redirect_back();
        }
    }
}
