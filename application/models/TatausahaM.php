<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class TatausahaM extends CI_Model{
	public function __construct(){
		parent::__construct();
	}

	public function get_all_perizinan_by_id_pengguna(){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		$this->db->join('perusahaan S', 'U.id_pengguna = S.id_pengguna','left');
		// $this->db->join('pengguna_perizinan L', 'P.id_perizinan = L.id_perizinan','left');
		return $this->db->get();
	}

	// detail perizinan
	public function get_all_perizinan_by_id($id_perizinan){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		$this->db->join('perusahaan S', 'U.id_pengguna = S.id_pengguna','left');
		$this->db->where('P.id_perizinan', $id_perizinan);
		return $this->db->get();
	}

	public function get_berkas_by_id($id_perizinan){
		$this->db->select('*');
		$this->db->from('detail_berkas_perizinan D');
		$this->db->join('berkas_perizinan B','D.id_berkas_perizinan = B.id_berkas_perizinan','left');
		$this->db->join('perizinan P','P.id_perizinan = D.id_perizinan','left');
		$this->db->where('P.id_perizinan', $id_perizinan);
		return $this->db->get();
	}
	public function insert_billing($id_perizinan, $data){
		$this->db->where('id_perizinan', $id_perizinan);
		$this->db->update('perizinan',$data);
		return TRUE;
	}

	public function cek_status($id_perizinan){
		$this->db->select('*');
		$this->db->from('pengguna_perizinan');
		$this->db->where('id_perizinan', $id_perizinan);
		$this->db->order_by('id_pengguna_izin','DESC');
		$this->db->limit('1');
		return $this->db->get();
	}
}