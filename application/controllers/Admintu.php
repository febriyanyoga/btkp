<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TataUsaha extends CI_Controller {

	public function index(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('admintu/dashboardV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('admintu/Layout', $data);
	}

	public function dataperizinan(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('user/Perizinan_baru',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('user/Layout', $data);
	}

}
