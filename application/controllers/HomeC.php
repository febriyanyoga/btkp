<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class HomeC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		$this->load->model(['LoginM','GeneralM']);
	}
	public function index(){
		$data['jabatan'] = $this->LoginM->get_jabatan()->result();
		$data['cap_img'] = $this->LoginM->make_captcha();
		$this->load->view('Login_v', $data);
	}
	public function login_admin(){
		$data['jabatan'] = $this->LoginM->get_jabatan()->result();
		$data['cap_img'] = $this->LoginM->make_captcha();
		$this->load->view('Login_admin', $data);
	}
	public function post_daftar(){
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');  
		$this->form_validation->set_rules('no_hp', 'Nomor Handphone', 'required');  
		$this->form_validation->set_rules('email_pengguna', 'Email Pengguna', 'required|valid_email|is_unique[pengguna.email_pengguna]');  
		$this->form_validation->set_rules('id_jabatan', 'Jabatan Pengguna', 'required');  
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[confirm_password]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|min_length[6]|max_length[10]'); 
		$this->form_validation->set_message('is_unique', 'Data %s sudah dipakai'); 
		if($this->LoginM->check_captcha2() == TRUE){
			if($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error','Data anda tidak berhasil disimpan, alamat email sudah dipakai');
				redirect_back();
			}else{
				$data = array(
					'nama_pengguna' 	=> $this->input->post('nama_pengguna'),
					'email_pengguna' 	=> $this->input->post('email_pengguna'),
					'no_hp' 			=> $this->input->post('no_hp'),
					'id_jabatan' 		=> $this->input->post('id_jabatan'),
					'password' 			=> md5($this->input->post('password')),
				);
				if($id = $this->LoginM->insert('pengguna', $data)){
					$data_email = array(
						'nama' 				=> $this->input->post('nama_pengguna'),
						'key' 				=> md5($id),
					);
					$subject	= 'Konfirmasi akun email';
					$to			= $this->input->post('email_pengguna');
					$isi 		= $this->load->view('email/Konfirmasi_email2', $data_email, TRUE);
					$this->GeneralM->send_email($subject, $to, $isi);
					$this->GeneralM->send_email_2($subject, $to, $isi);
					$this->session->set_flashdata('sukses','Data anda berhasil disimpan, cek email konfirmasi untuk mengaktifkan akun. Jika email tidak ada dikotak masuk, silahkan cek folder spam Anda.');
					redirect('home');
				}else{
					$this->session->set_flashdata('error','Data anda tidak berhasil disimpan');
					redirect_back();
				}
			}
		}else{
			$this->session->set_flashdata('error','Captcha salah');
			redirect_back();
		}
	}
	function post_login_user(){
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
				if($user->row()->status_akun == 'aktif'){
					$userData       = array(
						'nama'  			=> $user->row()->nama_pengguna,
						'jabatan'   		=> $user->row()->nama_jabatan,
						'id_jabatan'		=> $user->row()->id_jabatan,
						'status'    		=> $user->row()->status_akun,
						'jabatan_pemohon'  	=> $user->row()->jabatan_pemohon,
						'id_pengguna'  		=> $user->row()->id_pengguna,
						'logged_in' 		=> TRUE,
					);
					$this->session->set_userdata($userData);
					if($user->row()->id_jabatan > 4 && $user->row()->id_jabatan < 10){
						redirect('workshop');
					}else{
						$this->session->set_flashdata('error','Silahkan Login dihalaman admin');
						redirect('home');
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
	function post_login_admin(){
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
				if($user->row()->status_akun == 'aktif'){
					$userData       = array(
						'nama'  			=> $user->row()->nama_pengguna,
						'jabatan'   		=> $user->row()->nama_jabatan,
						'id_jabatan'		=> $user->row()->id_jabatan,
						'status'    		=> $user->row()->status_akun,
						'jabatan_pemohon'  	=> $user->row()->jabatan_pemohon,
						'id_pengguna'  		=> $user->row()->id_pengguna,
						'logged_in' 		=> TRUE,
					);
					$this->session->set_userdata($userData);
					if($user->row()->id_jabatan == 1){
						redirect('admin');
					}elseif ($user->row()->id_jabatan == 2){
						redirect('tatausaha');
					}elseif($user->row()->id_jabatan == 3){
						redirect('kasie');
					}elseif ($user->row()->id_jabatan == 4){
						redirect('pimpinan');
					}elseif ($user->row()->id_jabatan == 10){
						redirect('pusditjen');
					}elseif($user->row()->id_jabatan > 4 && $user->row()->id_jabatan < 10){
						$this->session->set_flashdata('error','Silahkan Login dihalaman Login User');
						redirect('home');
					}
				}else{
					$this->session->set_flashdata('error','akun anda belum aktif');
					redirect('login_admin');
				}
			}else{
				$this->session->set_flashdata('error','email atau password yang anda input salah');
				redirect('login_admin');
			}
		}else{
			$this->session->set_flashdata('error','Captcha salah');
			redirect('login_admin');
		}
	}
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
		redirect('home');
	}
	function logout_admin(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('status_login','Anda sudah berhasil keluar dari aplikasi');
		redirect('login_admin');
	}
	public function konfirmasi($key){  //post link konfirmasi
		if($this->GeneralM->verifyemail($key)){  
			$this->session->set_flashdata('sukses','Email anda berhasil dikonfirmasi. Silahkan masuk...');
			redirect('home');
		}else{  
			$this->session->set_flashdata('error','Email anda belum berhasil dikonfirmasi. Silahkan mencoba kembali...');
			redirect('home');
		}  
	}
	public function reset_password()
    {
        $data['title'] = 'BTKP - Reset Password';
        $this->load->view('resetpassword_v', $data);
    }

    public function post_reset_password(){
		$this->form_validation->set_rules('email', 'Email', 'required');  
    	if($this->form_validation->run() == FALSE){
    		$this->session->set_flashdata('error','Silahkan lengkapi data.');
    		redirect_back();
    	}else{

    		$email = $this->input->post('email');
    		$cek_email 	= $this->GeneralM->cek_email($email);
    		if($cek_email->num_rows() > 0){
    			if($cek_email->row()->status_email != 'aktif'){
    				$this->session->set_flashdata('error','Email anda belum berhasil dikonfirmasi');
    				redirect_back();
    			}elseif($cek_email->row()->status_akun != 'aktif'){
    				$this->session->set_flashdata('error','Akun anda belum aktif');
    				redirect_back();
    			}else{
    				$date_create_token = date("Y-m-d H:i");
    				$date_expired_token = date('Y-m-d H:i',strtotime('+2 hour',strtotime($date_create_token)));

    				$tokenstring = md5(sha1($cek_email->row()->id_pengguna.$date_create_token));

					$data_token = array(
						'token'			=>$tokenstring,
						'id_pengguna'	=>$cek_email->row()->id_pengguna,
						'created'		=>$date_create_token,
						'expired'		=>$date_expired_token
					);

					$data_email = array(
						'nama' 				=> $cek_email->row()->nama_pengguna,
						'token' 			=> $tokenstring,
					);
					$subject	= 'Atur ulang kata sandi';
					$to			= $email;
					$isi 		= $this->load->view('email/Reset_password', $data_email, TRUE);

					if($this->GeneralM->insert_token($data_token)){
						$this->GeneralM->send_email($subject, $to, $isi);
						$this->GeneralM->send_email_2($subject, $to, $isi);
						$this->session->set_flashdata('sukses', 'Link atur ulang password telah dikirim. Silahkan cek email anda.');
						redirect_back();
					}else{
						$this->session->set_flashdata('error','Link atur ulang password tidak dapat dikirim.');
						redirect_back();
					}
    			}
    		}else{
    			$this->session->set_flashdata('error','Data email anda tidak tersedia. Silahkan cek kembali data yang anda masukkan.');
    			redirect_back();
    		}

    	}

    }

    public function reset_password_2($token){
    	$data['title'] = 'BTKP - Reset Password';

    	if($this->GeneralM->cek_token($token)->num_rows() > 0){
    		$data 			= $this->GeneralM->cek_token($token)->row();
			$tokenExpired 	= $data->expired;
			$timenow 		= date("Y-m-d H:i:s");

			if ($timenow < $tokenExpired){
				$data2['id_pengguna'] = $this->GeneralM->cek_token($token)->row()->id_pengguna;
				$this->load->view('Reset_password_2', $data2);
			}else{
				$this->session->set_flashdata('error','Token sudah kadaluwarsa. Silahkan ulangi proses atur ulang password.');
				redirect('reset_password');	
			}

    	}else{
    		$this->session->set_flashdata('error','Token tidak ditemukan.');
    		redirect('reset_password');
    	}
    }

    public function post_atur_ulang(){
		$this->form_validation->set_rules('password_baru', 'Password baru', 'trim|required|min_length[6]|max_length[50]|matches[ulangi_password_baru]');  
		$this->form_validation->set_rules('ulangi_password_baru', 'Ulangi password baru', 'trim|required|min_length[6]|max_length[50]'); 

    	if($this->form_validation->run() == FALSE){
    		$this->session->set_flashdata('error','Data tidak dapat disimpan. Silahkan lengkapi data.');
    		redirect_back();
    	}else{
    		$data_reset = array(
    			'password' => md5($this->input->post('password_baru')),
    		);
    		$id_pengguna = $this->input->post('id_pengguna');

    		if($this->GeneralM->update_pengguna($id_pengguna, $data_reset)){
    			$this->session->set_flashdata('sukses','Password berhasil diubah. Silahkan login kembali.');
    			redirect('home');
    		}else{
    			$this->session->set_flashdata('error','Password tidak berhasil diubah.');
    			redirect_back();
    		}
    	}
    }
}