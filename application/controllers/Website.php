<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {


	public function index(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('website/HomeV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('website/Layout', $data);
	}

	public function tentang(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('website/tentangV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('website/tentang', $data);
	}

	public function kontak(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('website/tentangV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('website/tentang', $data);
	}

	public function pengujian(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('website/tentangV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('website/tentang', $data);
	}

	
}
