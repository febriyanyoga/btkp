<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PimpinanC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		pimpinan_access();
		$this->load->model(['LoginM', 'GeneralM','WorkshopM','TatausahaM','AdminM']);
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
		$this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
		$this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
		$data['isi'] = $this->load->view('pimpinan/Dashboard_v',$this->data, TRUE);
		$this->load->view('pimpinan/Layout', $data);
	}

	public function profile()
    {
        $id_pengguna = $this->session->userdata('id_pengguna');
        $data['title'] = 'BTKP - Profil';
        $this->data['provinsi'] = $this->GeneralM->get_all_provinsi();
        $this->data['profil'] = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
        $data['isi'] = $this->load->view('pimpinan/Profile_v', $this->data, true);
        $this->load->view('pimpinan/Layout', $data);
    }

    public function perizinan()
    {
        $data['title'] = 'BTKP - Data Perizinan';
        $id_pengguna = $this->session->userdata('id_pengguna');
        $this->data['perizinan'] = $this->TatausahaM->get_all_perizinan_by_id_pengguna()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['izin_tolak']   = $this->WorkshopM->get_perizinan_ditolak($id_pengguna)->result();
        $data['isi'] = $this->load->view('pimpinan/Data_perizinan.php', $this->data, true);
        $this->load->view('pimpinan/Layout', $data);
    }

    public function pengujian()
    {
        $data['title'] = 'BTKP - Sertifikasi';
        $this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
        $this->data['pengujian_tolak'] = $this->TatausahaM->get_all_pengujian_with_status()->result();
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $data['isi'] = $this->load->view('pimpinan/Data_pengujian', $this->data, true);
        $this->load->view('pimpinan/Layout', $data);
    }

    public function reinspeksi()
    {
        $data['title'] = 'BTKP - Reinspeksi';
        $this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
        $this->data['data_inspeksi']     = $this->WorkshopM->get_inspeksi_all()->result();
        $data['isi'] = $this->load->view('pimpinan/Data_reinspeksi', $this->data, true);
        $this->load->view('pimpinan/Layout', $data);
    }

     // post
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
}