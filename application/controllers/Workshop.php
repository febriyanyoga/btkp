<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends CI_Controller {

	public function dashboard(){
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

	public function perpanjangan ()
	{
		$this->data['lele'] = 'lel';
		$data->['isi'] = $this->load->view('workshop/perpanjangan' $this->data, TRUE);
    $this->load->view('workshop/Layout', $data);
	}

}
