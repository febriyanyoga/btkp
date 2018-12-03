<?php
defined('BASEPATH') or exit('No direct script access allowed');
class HomeC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		$this->load->model('LoginM');

	}

	public function index(){
		$data['jabatan'] = $this->LoginM->get_jabatan()->result();
		$data['cap_img'] = $this->LoginM->make_captcha();
		$this->load->view('Login_v', $data);
	}

	public function post_daftar(){
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
		$this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required|valid_email|is_unique[pengguna.email_pengguna]');  
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirm_password]');

		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|max_length[10]'); 
		$this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error','Data anda tidak berhasil disimpan, silahkan cek kembali data yang anda masukkan');
			redirect_back();
		}else{
			$data = array(
				'nama_pengguna' 	=> $this->input->post('nama_pengguna'),
				'email_pengguna' 	=> $this->input->post('email_pengguna'),
				'no_hp' 			=> $this->input->post('no_hp'),
				'id_jabatan' 		=> $this->input->post('id_jabatan'),
				'password' 			=> md5($this->input->post('password')),
			);

			if($this->LoginM->insert('pengguna', $data)){
				// $this->send($email_akun, $email_encryption);
				$this->session->set_flashdata('sukses','Data anda berhasil disimpan, cek email konfirmasi untuk mengaktifkan akun. Jika email tidak ada dikotak masuk, silahkan cek folder spam Anda.');
				redirect('home');

			}else{
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
				redirect_back();
			}
		}
	}
}
