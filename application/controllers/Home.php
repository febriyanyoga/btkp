<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$this->load->view('landing_page/HomeV');
	}

	public function login(){
		$this->load->view('landing_page/LoginV');
	}

	public function daftar(){
		$this->load->view('landing_page/DaftarV');
	}

	public function index_user(){
		$this->data['lele'] = 'lel';
		$data['isi'] = $this->load->view('user/Index_user',$this->data, TRUE);
		// $data['isi'] = "isi";
		$this->load->view('user/Layout', $data);
	}

}
