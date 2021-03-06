<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class PusditjenC extends CI_Controller
{
    public $data = array();

    public function __construct()
    {
        parent::__construct();
        in_access();
        pusditjen_access();
        $this->load->model(['GeneralM', 'PusditjenM','TatausahaM','GeneralM','WorkshopM']);
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['title'] = 'BTKP - Home';
        $this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['user'] = $this->GeneralM->get_jumlah_workshop()->result();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['perizinan'] = $this->GeneralM->get_jumlah_perizinan()->result();
        $this->data['jumlah_kapal'] = $this->GeneralM->get_jumlah_kapal()->num_rows();
        $this->data['kapal'] = $this->GeneralM->get_jumlah_kapal()->result();
        $this->data['jumlah_pengujian'] = $this->GeneralM->get_jumlah_pengujian()->num_rows();
        $this->data['jumlah_inspeksi'] = $this->GeneralM->get_jumlah_inspeksi()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
        $this->data['produk'] = $this->GeneralM->get_jumlah_produk()->result();
        $data['isi'] = $this->load->view('pusditjen/dashboard_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_perusahaan()
    {
        $data['title'] = 'BTKP - Laporan Perusahaan';
        $this->data['perusahaan'] = $this->GeneralM->get_perusahaan_all()->result();
        $data['isi'] = $this->load->view('pusditjen/laporanperusahaan_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_perizinan()
    {
        $data['title'] = 'BTKP - Laporan Perizinan';
        $this->data['perizinan'] = $this->GeneralM->get_jumlah_perizinan()->result();
        $data['isi'] = $this->load->view('pusditjen/laporanperizinan_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_sertifikasi()
    {
        $data['title'] = 'BTKP - Laporan Sertifikasi';
        $this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
        $this->data['pengujian_tolak'] = $this->TatausahaM->get_all_pengujian_with_status()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $data['isi'] = $this->load->view('pusditjen/Data_pengujian_v.php', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function laporan_inspeksi()
    {
        $data['title'] = 'BTKP - Laporan Inspeksi';
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_all()->result();
        $data['isi'] = $this->load->view('pusditjen/Data_reinspeksi_v.php', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profil';
        $this->data['provinsi'] = $this->GeneralM->get_all_provinsi();
        $this->data['profil'] = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
        $data['isi'] = $this->load->view('pusditjen/Profile_v', $this->data, true);
        $this->load->view('pusditjen/Layout', $data);
    }

    public function post_update_password()
    {
        $this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'trim|required|matches[konfirmasi_password_baru]');
        $this->form_validation->set_rules('konfirmasi_password_baru', 'Konfirmasi Password Baru', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', 'konfirmasi kata sandi baru tidak cocok');
            redirect_back();
        } else {
            $email_pengguna = $this->input->post('email_pengguna');
            $password = $this->input->post('password_lama');
            $this->db->select('*');
            $this->db->from('pengguna P');
            $this->db->where('email_pengguna', $email_pengguna);
            $this->db->where('password', md5($password));
            $user = $this->db->get();

            if ($user->num_rows() > 0) {
                $data_update_password = array(
                    'password' => md5($this->input->post('password_baru')),
                );
                $id_pengguna = $this->input->post('id_pengguna');
                if ($this->GeneralM->update_pengguna($id_pengguna, $data_update_password)) {
                    $this->session->set_flashdata('sukses', 'Password berhasil diubah');
                    redirect_back();
                } else {
                    $this->session->set_flashdata('error', 'Password tidak berhasil diubah');
                    redirect_back();
                }
            } else {
                $this->session->set_flashdata('error', 'Password lama tidak sesuai');
                redirect_back();
            }
        }
    }

    public function print_laporan_perusahaan(){
        $this->data['perusahaan'] = $this->GeneralM->get_perusahaan_all()->result();
        $this->load->view('pusditjen/cetak/print_laporan_perusahaan',$this->data);
    }

    public function print_laporan_perizinan(){
        $this->data['perizinan'] = $this->GeneralM->get_jumlah_perizinan()->result();
        $this->load->view('pusditjen/cetak/print_laporan_perizinan',$this->data);
    }

    public function print_laporan_pengujian(){
        $this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
        $this->load->view('pusditjen/cetak/print_laporan_pengujian',$this->data);
    }

    public function print_laporan_reinspeksi(){
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_all()->result();
        $this->load->view('pusditjen/cetak/print_laporan_reinspeksi',$this->data);
    }
}
