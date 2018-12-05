<?php
defined('BASEPATH') or exit('No direct script access allowed');
class KasieC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		kasie_access();
		$this->load->model('LoginM');
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$data['isi'] = $this->load->view('admintu/dashboard_v',$this->data, TRUE);
		$this->load->view('admintu/Layout', $data);
	}

	public function perizinan()
    {
		$data['title'] = "BTKP - Data Perizinan";
        $data['isi'] = $this->load->view('admintu/dataperizinan_v', $this->data, true);
        // $data['isi'] = "isi";
        $this->load->view('admintu/Layout', $data);
    }
}