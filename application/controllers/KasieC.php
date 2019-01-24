<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class KasieC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		kasie_access();
		$this->load->model(['LoginM','GeneralM','TatausahaM','WorkshopM']);
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$this->data['jumlah_workshop'] = $this->GeneralM->get_jumlah_workshop()->num_rows();
        $this->data['jumlah_kapal'] = $this->GeneralM->get_jumlah_kapal()->num_rows();
        $this->data['jumlah_perizinan'] = $this->GeneralM->get_jumlah_perizinan()->num_rows();
        $this->data['jumlah_pengujian'] = $this->GeneralM->get_jumlah_pengujian()->num_rows();
        $this->data['jumlah_inspeksi'] = $this->GeneralM->get_jumlah_inspeksi()->num_rows();
        $this->data['jumlah_produk'] = $this->GeneralM->get_jumlah_produk()->num_rows();
		$data['isi'] = $this->load->view('kasie/dashboard_v',$this->data, TRUE);
		$this->load->view('kasie/Layout', $data);
	}

	public function perizinan()
	{
		$data['title'] = "BTKP - Data Perizinan";
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->data['perizinan'] = $this->GeneralM->get_all_perizinan_by_id_pengguna()->result();
		$this->data['izin_tolak']   = $this->WorkshopM->get_perizinan_ditolak($id_pengguna)->result();
		$data['isi'] = $this->load->view('kasie/dataperizinan_v', $this->data, true);
		$this->load->view('kasie/Layout', $data);
	}

	public function verifikasi($id_perizinan)
	{
		$data['title'] = 'BTKP - verifikasi';
		$this->data['id_perizinan'] = $id_perizinan;
		$this->data['detail_perizinan'] = $this->TatausahaM->get_all_perizinan_by_id($id_perizinan)->result();
		$data['isi'] = $this->load->view('kasie/verifikasi_v', $this->data, true);
		$this->load->view('kasie/Layout', $data);
	}

	public function profile()
	{
		$id_pengguna = $this->session->userdata('id_pengguna');
		$data['title'] = 'BTKP - Profil';
		$this->data['provinsi']     = $this->GeneralM->get_all_provinsi();
		$this->data['profil']       = $this->GeneralM->get_pengguna_only($id_pengguna)->row();
		$data['isi'] = $this->load->view('kasie/profile_v', $this->data, true);
		$this->load->view('kasie/Layout', $data);
	}

     // post
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

	public function persetujuan()
	{
		$this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
		$this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
			redirect_back();
		}else {
			$data = array(
				'id_pengguna' 		=> $this->input->post('id_pengguna'),
				'id_perizinan' 		=> $this->input->post('id_perizinan'),
				'keterangan' 		=> $this->input->post('keterangan'),
				'status' 			=> $this->input->post('status'),
			);
			if($this->GeneralM->insert_persetujuan($data)) {
				$data_email = array(
					'nama'                  => $this->input->post('nama_pengguna'),
					'nomor'                 => $this->input->post('nomor'),
				);
				$subject    = 'Pemberitahuan';
				$to         = $this->input->post('email_pengguna');
				$isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

				$this->GeneralM->send_email($subject, $to, $isi);
				$this->GeneralM->send_email_2($subject, $to, $isi);
				$this->session->set_flashdata('sukses', 'Permohonan di proses ketahap selanjutnya.');
				redirect('izin_kasie');
			} else {
				$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
				redirect_back();
			}
		}
	}
	public function persetujuan2(){
		$this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
		$this->form_validation->set_rules('id_perizinan', 'ID Perizinan');
		$this->form_validation->set_rules('keterangan', 'keterangan');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == false) {
			$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
			redirect_back();
		}else {
			$upload = $this->upload_file('hasil_survey');
			
			$keterangan=$this->input->post('keterangan');  
			$ket="";  
			$i=1;
			foreach($keterangan as $ket1){
				if($ket1!=""){
					$nama = $this->TatausahaM->get_berkas_by_id2($i)->row()->nama_berkas;
					$ket .= $nama.' : '.$ket1."<br>";  
				}
				$i++;
			} 
			$data = array(
				'id_pengguna' 		=> $this->input->post('id_pengguna'),
				'id_perizinan' 		=> $this->input->post('id_perizinan'),
				'keterangan' 		=> $ket,
				'status' 			=> $this->input->post('status'),
			);
			if($this->GeneralM->insert_persetujuan($data)) {
				$data_email = array(
					'nama'                  => $this->input->post('nama_pengguna'),
					'nomor'                 => $this->input->post('nomor'),
				);
				$subject    = 'Pemberitahuan';
				$to         = $this->input->post('email_pengguna');
				$isi        = $this->load->view('email/Notifikasi_email', $data_email, TRUE);

				$this->GeneralM->send_email($subject, $to, $isi);
				$this->GeneralM->send_email_2($subject, $to, $isi);
				$this->session->set_flashdata('sukses', 'Anda telah menolak permohonan ini.');
				redirect('izin_kasie');
			} else {
				$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
				redirect_back();
			}
		}
	}

	public function upload_file($input_name){
        $config['upload_path'] = './assets/upload_survey/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
        $config['max_size'] = '5000'; // max_size in kb
        $config['encrypt_name'] = true; //Enkripsi nama yang terupload

        $this->upload->initialize($config);
        if (!empty($_FILES[$input_name]['name'])) {
        	if ($this->upload->do_upload($input_name)) {
        		$gbr = $this->upload->data();
        		$return = array('result' => 'success', 'file_name' => $gbr['file_name'], 'file_size' => $gbr['file_size'], 'error' => '');

        		return $return;
        	}
        } else {
        	$return = array('result' => 'Error', 'file_name' => 'no file', 'error' => '');

        	return $return;
        	echo 'Data yang diupload kosong';
        }
    }

    // Pengujian
    public function pengujiankasie()
    {
    	$data['title'] = 'BTKP - Sertifikasi';
    	$this->data['pengujian'] = $this->TatausahaM->get_all_pengujian()->result();
    	$this->data['pengujian_tolak'] = $this->TatausahaM->get_all_pengujian_with_status()->result();
    	$data['isi'] = $this->load->view('kasie/pengujian/pengujian_v', $this->data, true);
    	$this->load->view('kasie/Layout', $data);
    }

    public function verifikasiakhir_pengujian($id_pengujian)
    {
    	$data['title'] = 'BTKP - Verifikasi Permohonan Perizinan';
    	$this->data['bank_btkp'] = $this->TatausahaM->get_bank_btkp()->result();
    	$this->data['pengujian'] = $this->TatausahaM->get_pengujian_by_id($id_pengujian)->row();
    	$data['isi'] = $this->load->view('kasie/pengujian/verifikasiakhir_v', $this->data, true);
    	$this->load->view('kasie/Layout', $data);
    }

    public function verifikasi_akhir(){
    	$this->form_validation->set_rules('id_pengguna', 'ID Pengguna', 'required');
    	$this->form_validation->set_rules('id_pengujian', 'ID Pengujian','required');
    	$this->form_validation->set_rules('keterangan', 'keterangan');
    	$this->form_validation->set_rules('status', 'Status', 'required');
    	if ($this->form_validation->run() == false) {
    		$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
    		redirect_back();
    	}else{
    		$keterangan=$this->input->post('keterangan');

    		$data = array(
    			'id_pengguna'   => $this->input->post('id_pengguna'),
    			'id_pengujian'  => $this->input->post('id_pengujian'),
    			'keterangan'    => $keterangan,
    			'status'        => $this->input->post('status'),
    		);

    		if ($this->GeneralM->insert_persetujuan_pengujian($data)) {
    			if($this->input->post('status') == 'diterima'){
    				$data_email = array(
    					'nama'                  => $this->input->post('nama_pengguna'),
    					'nomor'                 => $this->input->post('nomor'),
    					'salam'                 => 'Selamat . . .',
    					'isi'                   => '<b>Telah berhasil</b> di verifikasi oleh Kasie Balai Teknologi Kelautan dan Pelayaran (BTKP). Silahkan masuk ke aplikasi untuk melakukan tahapan selanjutnya yaitu pembayaran dan konfirmasi pembayaran.<br> Terimakasih.',
    				);
    				$subject    = 'Pemberitahuan';
    				$to         = $this->input->post('email_pengguna');
    				$isi        = $this->load->view('email/Notifikasi_verifikasi', $data_email, TRUE);

    				$this->session->set_flashdata('sukses', 'Permohonan di proses ketahap selanjutnya.');
    			}else{
    				$data_email = array(
    					'nama'                  => $this->input->post('nama_pengguna'),
    					'nomor'                 => $this->input->post('nomor'),
    					'salam'                 => 'Mohon maaf. . .',
    					'isi'                   => '<b>Belum berhasil</b> di verifikasi oleh Kasie Balai Teknologi Kelautan dan Pelayaran (BTKP) Silahkan masuk ke aplikasi untuk melihat detail permohonan.<br> Terimakasih.',
    				);
    				$subject    = 'Pemberitahuan';
    				$to         = $this->input->post('email_pengguna');
    				$isi        = $this->load->view('email/Notifikasi_verifikasi', $data_email, TRUE);
    				$this->session->set_flashdata('sukses', 'Anda telah menolak permohonan  ini.');
    			}
    				  // kirim email
    			$this->GeneralM->send_email($subject, $to, $isi);
    			$this->GeneralM->send_email_2($subject, $to, $isi);
               		 // end kirim email
    			redirect('pengujiankasie');
    		} else {
    			$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan');
    			redirect('pengujiankasie');
    			// redirect_back();
    		}
    	}
    }
}
