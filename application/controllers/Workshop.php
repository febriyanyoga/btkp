<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends CI_Controller {

	public function dashboard(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('workshop/dashboardV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('workshop/Layout', $data);
	}

	public function perizinan_baru(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('workshop/perizinan_baruV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('workshop/Layout', $data);
	}

	public function tagihan(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('workshop/tagihanV',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('workshop/Layout', $data);
	}

}
