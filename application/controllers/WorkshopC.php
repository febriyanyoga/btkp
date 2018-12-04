<?php
defined('BASEPATH') or exit('No direct script access allowed');
class WorkshopC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		workshop_access();
		$this->load->model('LoginM');
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$data['isi'] = $this->load->view('workshop/Home_v',$this->data, TRUE);
		$this->load->view('workshop/Layout', $data);
	}
	public function data_perizinan(){
		$data['title'] = "BTKP - Data Perizinan";
		$data['isi'] = $this->load->view('workshop/dataperizinan_v', $this->data, true);
		$this->load->view('workshop/Layout', $data);
	}
	public function data_reinspeksi(){
		$data['title'] = "BTKP - Data Reinspeksi";
		$data['isi'] = $this->load->view('workshop/datareinspeksi_v', $this->data, true);
		$this->load->view('workshop/Layout', $data);
	}
	public function pelaporan(){
		$data['title'] = "BTKP - Data Pelaporan";
		$data['isi'] = $this->load->view('workshop/pelaporan_v', $this->data, true);
		$this->load->view('workshop/Layout', $data);
	}
	public function perizinan_baru(){
		$data['title'] = "BTKP - Perizinan Baru";
		$data['isi'] = $this->load->view('workshop/Perizinanbaru_v', $this->data, true);
		$this->load->view('workshop/Layout', $data);
	}
	public function perizinan_perpanjang(){
		$data['title'] = "BTKP - Perizinan Baru";
		$data['isi'] = $this->load->view('workshop/Perizinanperpanjang_v', $this->data, true);
		$this->load->view('workshop/Layout', $data);
	}
	public function feedbackemail(){
		$this->load->view('user/feedbackemail_v');
	}
}