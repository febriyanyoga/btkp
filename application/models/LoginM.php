<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class LoginM extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

    public function make_captcha(){ //membuat captcha
    	$this->load->helper('captcha');
    	$vals = array(
    		'img_path' 		=> './/assets/img/captcha/',
    		'img_url' 		=> base_url().'/assets/img/captcha/',
    		'img_width' 	=> '250',
    		'img_height' 	=> '50',
    		'pool' 			=> '0123456789',
    		'font_path' 	=> '../system/fonts/texb.ttf',
    		'expiration' 	=> 3600,
    	);

    	$cap = create_captcha($vals);

    	if($cap){
    		$data = array(
    			'captcha_id' 	=> '',
    			'captcha_time' 	=> $cap['time'],
    			'ip_address' 	=> $this->input->ip_address(),
    			'word' 			=> $cap['word'],
    		);
    		$query = $this->db->insert_string('captcha', $data);
    		$this->db->query($query);
    	}else{
    		return 'captcha not work';
    	}
    	return $cap['image'];
    }

    public function check_captcha(){  //post captcha
    	$expiration = time() - 3600;
    	$sql = 'DELETE FROM captcha WHERE captcha_time < ?';
    	$binds = array($expiration);
    	$query = $this->db->query($sql, $binds);

    	$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
    	$binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    	$query = $this->db->query($sql, $binds);
    	$row = $query->row();

    	if ($row->count > 0) {
    		return true;
    	}
    	return false;
    }

    public function check_captcha2(){  //post captcha
        $expiration = time() - 3600;
        $sql = 'DELETE FROM captcha WHERE captcha_time < ?';
        $binds = array($expiration);
        $query = $this->db->query($sql, $binds);

        $sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
        $binds = array($_POST['captcha2'], $this->input->ip_address(), $expiration);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count > 0) {
            return true;
        }
        return false;
    }

    // ambil nama jabatan untuk register
    public function get_jabatan(){
    	$this->db->select('*');
    	$this->db->from('jabatan');
    	return $this->db->get();
    }
    // untuk insert ke table
    public function insert($table, $data){
    	$this->db->insert($table, $data);
    	return TRUE;
    }
}
