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
	function post_login(){
		$email_pengguna   	= $this->input->post('email_login');
		$password   		= $this->input->post('password_login');
        // query chek users
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('jabatan J','P.id_jabatan = J.id_jabatan');
		$this->db->where('email_pengguna', $email_pengguna);
		$this->db->where('password',  md5($password));
		$user = $this->db->get();

		if($this->LoginM->check_captcha() == TRUE){
			if($user->num_rows()>0){
				if($user->row()->status == 'aktif'){
					$userData       = array(
						'nama'  		=> $user->row()->nama_pengguna,
						'jabatan'   	=> $user->row()->nama_jabatan,
						'id_jabatan'	=> $user->row()->id_jabatan,
						'status'    	=> $user->row()->status,
						'id_pengguna'  	=> $user->row()->id_pengguna,
						'logged_in' 	=> TRUE,
					);
					$this->session->set_userdata($userData);
					if($user->row()->id_jabatan == 1){
						redirect('admin');
					}elseif ($user->row()->id_jabatan == 2){
						redirect('tatausaha');
					}elseif($user->row()->id_jabatan == 3){
						redirect('kasie');
					}elseif ($user->row()->id_jabatan == 4) {
						redirect('pimpinan');
					}elseif ($user->row()->id_jabatan == 5) {
						redirect('workshop');
					}
				}else{
					$this->session->set_flashdata('error','akun anda belum aktif');
					redirect('home');
				}
			}else{
				$this->session->set_flashdata('error','email atau password yang anda input salah');
				redirect('home');
			}
		}else{
			$this->session->set_flashdata('error','Captcha salah');
			redirect('home');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
		redirect('home');
	}
}
