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
		$data['isi'] = $this->load->view('kasie/dashboard_v',$this->data, TRUE);
		$this->load->view('kasie/Layout', $data);
	}

	public function perizinan()
	{
		$data['title'] = "BTKP - Data Perizinan";
		$id_pengguna = $this->session->userdata('id_pengguna');
		$this->data['perizinan'] = $this->GeneralM->get_all_perizinan_by_id_pengguna()->result();
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
			$upload = $this->upload_file('hasil_survey');
			if($upload['result'] == 'success'){
				$data = array(
					'id_pengguna' 		=> $this->input->post('id_pengguna'),
					'id_perizinan' 		=> $this->input->post('id_perizinan'),
					'keterangan' 		=> $this->input->post('keterangan'),
					'status' 			=> $this->input->post('status'),
					'file_hasil_survey' => $upload['file_name'],
				);
				if($this->GeneralM->insert_persetujuan($data)) {
					$this->session->set_flashdata('sukses', 'Verifikasi berhasil');
					redirect('izin_kasie');
				} else {
					$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan 1');
					redirect_back();
				}
			}else{
				$this->session->set_flashdata('error', 'Verifikasi gagal, cek kembali data yang anda masukkan 2');
				redirect_back();
			}
		}
	}

	public function upload_file($input_name){
        $config['upload_path'] = './assets/upload_survey/'; //path folder
        $config['allowed_types'] = 'jpg|jpeg|pdf|doc|docx';
        $config['max_size'] = '1000'; // max_size in kb
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
}