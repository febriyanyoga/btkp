<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TatausahaC extends CI_Controller{
	var $data = array();
	public function __construct(){
		parent::__construct();  
		in_access();
		tu_access();
		$this->load->model('LoginM');
	}
	public function index(){
		$data['title'] = "BTKP - Home";
		$data['isi'] = $this->load->view('workshop/Home_v',$this->data, TRUE);
		$this->load->view('workshop/Layout', $data);
	}
}