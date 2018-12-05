<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class WorkshopM extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function insert_perusahaan($data){
		$this->db->insert('perusahaan', $data);
		return $this->db->insert_id();
	}

	public function insert_perizinan($data){
		$this->db->insert('perizinan', $data);
		return TRUE;
	}

	public function hapus_perusahaan($id_perusahaan){
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->delete('perusahaan');
		return TRUE;
	}

	public function get_perizinan_by_id($id_pengguna){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->where('status_pengajuan', 'belum');
		return $this->db->get('perizinan');
	}

	public function get_berkas_by_id($id_perizinan){
		$this->db->where('id_perizinan', $id_perizinan);
		// $this->db->where('status_pengajuan', 'belum');
		return $this->db->get('detail_berkas_perizinan');
	}
}