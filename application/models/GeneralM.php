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

	public function get_own_progress($id_pengguna, $id_perizinan){ //perizinan yang di verifikasi kasie
		$this->db->select('*');
		$this->db->from('pengguna_perizinan');
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_array_progress($id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "3"'); //kasie
		$this->db->where('P.id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_progress_tu($id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_progress_kasie($id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "3"'); //kasie
		$this->db->where('P.id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_array_progress_setuju($id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_perizinan', $id_perizinan);
		$this->db->where('P.status = "diterima"');
		return $this->db->get();
	}

	public function get_kasie(){
		$this->db->select('id_pengguna');
		$this->db->from('pengguna');
		$this->db->join('jabatan','pengguna.id_jabatan = jabatan.id_jabatan');
		$this->db->where('jabatan.id_jabatan = "3"');
		return $this->db->get();
	}

	public function get_tu(){
		$this->db->select('id_pengguna');
		$this->db->from('pengguna');
		$this->db->join('jabatan','pengguna.id_jabatan = jabatan.id_jabatan');
		$this->db->where('jabatan.id_jabatan = "2"');
		return $this->db->get();
	}

	public function get_all_perizinan_by_id_pengguna(){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		$this->db->join('perusahaan S', 'U.id_pengguna = S.id_pengguna','left');
		return $this->db->get();
	}

	public function get_jumlah_workshop(){
		return $this->db->get('perusahaan');
	}
	public function get_jumlah_perizinan(){
		return $this->db->get('perizinan');
	}
	public function get_jumlah_produk(){
		return $this->db->get('jenis_alat_keselamatan');
	}

	public function get_pengguna($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('perusahaan R','P.id_pengguna = R.id_pengguna','left');
		$this->db->join('kelurahan L','R.id_kel_perusahaan = L.id_kelurahan','left');
		$this->db->join('kecamatan C','L.id_kecamatan = C.id_kecamatan','left');
		$this->db->join('kabupaten_kota B','C.id_kabupaten_kota = B.id_kabupaten_kota','left');
		$this->db->join('propinsi G','B.id_propinsi = G.id_propinsi','left');
		$this->db->where('P.id_pengguna', $id_pengguna);
		return $this->db->get();
	}

	public function get_pengguna_only($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->where('P.id_pengguna', $id_pengguna);
		return $this->db->get();
	}

	public function update_pengguna($id_pengguna, $data){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}

	public function update_perusahaan($id_perusahaan, $data){
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->update('perusahaan', $data);
		return TRUE;
	}
}