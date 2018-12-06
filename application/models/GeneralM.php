<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class GeneralM extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	// get provinsi
	public function get_all_provinsi(){
		$response = array();
		$this->db->select('*');
		$this->db->from('propinsi');
		$this->db->order_by('nama_propinsi');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}
	// get kabupaten_kota by prop
	public function get_kabupaten_kota($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kabupaten_kota');
		$this->db->where('id_propinsi', $postData['id_propinsi']);
		$this->db->order_by('nama_kabupaten_kota');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}
	// get kec by kab
	public function get_kecamatan($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kecamatan');
		$this->db->where('id_kabupaten_kota', $postData['id_kabupaten_kota']);
		$this->db->order_by('nama_kecamatan');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}
	// get kel by kec
	public function get_kelurahan($postData){
		$response = array();
		$this->db->select('*');
		$this->db->from('kelurahan');
		$this->db->where('id_kecamatan', $postData['id_kecamatan']);
		$this->db->order_by('nama_kelurahan');
		$query = $this->db->get();
		$response = $query->result_array();
		return $response;
	}

	// get all jenis alat
	public function get_jenis_alat(){
		return $this->db->get('jenis_alat_keselamatan');
	}

	public function insert_persetujuan($data){
		$this->db->insert('pengguna_perizinan', $data);
		return TRUE;
	}

	public function get_own_progress($id_pengguna, $id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan');
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_array_progress($array, $id_pengguna, $id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan');
		$this->db->where_in($id_pengguna, $array);
		$this->db->where('id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_kasie(){
		$this->db->select('id_pengguna');
		$this->db->from('pengguna');
		$this->db->join('jabatan','pengguna.id_jabatan = jabatan.id_jabatan');
		$this->db->where('jabatan.id_jabatan = "3"');
		return $this->db->get();
	}
}