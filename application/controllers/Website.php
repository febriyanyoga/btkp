<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {


	public function index(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('website/HomeV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('website/Layout', $data);
	}
	public function login ()
	{
		$this->load->view('website/LoginV');
	}
	public function daftar ()
	{
		$this->load->view('website/DaftarV');
	}
	public function perizinan()
	{
		$this->load->view('website/perizinanV');
	}
}
