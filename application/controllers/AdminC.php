<?php
defined('BASEPATH') or exit('No direct script access allowed');
class AdminC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		admin_access();
		$this->load->model('LoginM');
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$data['isi'] = $this->load->view('admin/dashboard_v',$this->data, TRUE);
		$this->load->view('admin/Layout', $data);
	}
}