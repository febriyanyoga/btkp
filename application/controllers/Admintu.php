<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index(){
		$this->load->view('landing_page/HomeV');
	}

	public function login(){
		$this->load->view('landing_page/LoginV');
	}

	public function daftar(){
		$this->load->view('landing_page/DaftarV');
	}

	public function dashboard_perizinan(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('user/Perizinan_dashboard',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('user/Layout', $data);
	}

	public function perizinan_baru(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('user/Perizinan_baru',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('user/Layout', $data);
	}

}
