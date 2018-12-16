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
		return $this->db->insert_id();
	}

	public function insert_pengujian($data){
		$this->db->insert('pengujian', $data);
		return $this->db->insert_id();
	}

	public function hapus_perusahaan($id_perusahaan){
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->delete('perusahaan');
		return TRUE;
	}

	// tabel perizinan
	public function get_perizinan_by_id($id_pengguna){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->where('status_pengajuan', 'belum');
		return $this->db->get('perizinan');
	}

	public function get_pengujian_by_id($id_pengguna){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->where('status_pengajuan', 'belum');
		return $this->db->get('pengujian');
	}

	public function get_pengujian_by_id2($id_pengujian){
		$this->db->where('id_pengujian', $id_pengujian);
		$this->db->join('pengguna','pengguna.id_pengguna = pengujian.id_pengguna');
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = pengujian.id_jenis_alat');
		$this->db->join('perusahaan','perusahaan.id_pengguna = pengguna.id_pengguna');

		// $this->db->where('status_pengajuan', 'belum');
		return $this->db->get('pengujian');
	}

	public function cek_bank_btkp($id_bank_btkp){
		$this->db->where('id_bank_btkp',$id_bank_btkp);
		return $this->db->get('bank_btkp');
	}

	public function cek_status($id_pengujian){
		$this->db->select('*');
		$this->db->from('pengguna_pengujian');
		$this->db->where('id_pengujian', $id_pengujian);
		$this->db->order_by('id_pengguna_pengujian','DESC');
		$this->db->limit('1');
		return $this->db->get();
	}

	public function get_pengujian($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengujian');
		$this->db->join('pengguna','pengguna.id_pengguna = pengujian.id_pengguna');
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = pengujian.id_jenis_alat');
		$this->db->join('perusahaan','perusahaan.id_pengguna = pengguna.id_pengguna');
		$this->db->where('pengujian.id_pengguna', $id_pengguna);
		return $this->db->get();
	}

	// detail perizinan
	public function get_all_perizinan_by_id($id_perizinan){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('bank_btkp Z', 'Z.id_bank_btkp = P.id_bank_btkp','left');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		$this->db->join('perusahaan S', 'U.id_pengguna = S.id_pengguna','left');
		$this->db->where('P.id_perizinan', $id_perizinan);
		return $this->db->get();
	}

	// detail perizinan
	public function get_all_perizinan_by_id_pengguna($id_pengguna){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		// $this->db->join('perusahaan S', 'U.id_pengguna = S.id_pengguna','left');
		$this->db->where('U.id_pengguna', $id_pengguna);
		return $this->db->get();
	}

	// detail alamat
	public function detail_alamat($id_kelurahan){
		$this->db->select('*');
		$this->db->from('kelurahan L');
		$this->db->join('kecamatan C','L.id_kecamatan = C.id_kecamatan','left');
		$this->db->join('kabupaten_kota B','C.id_kabupaten_kota = B.id_kabupaten_kota','left');
		$this->db->join('propinsi G','G.id_propinsi = B.id_propinsi','left');
		$this->db->where('id_kelurahan', $id_kelurahan);
		return $this->db->get();
	}

	public function get_berkas_by_id($id_perizinan){
		$this->db->where('id_perizinan', $id_perizinan);
		// $this->db->where('status_pengajuan', 'belum');
		return $this->db->get('detail_berkas_perizinan');
	}

	public function get_berkas_all(){
		$this->db->where('status = "tampil"');
		$this->db->where('jenis = "baru"');
		return $this->db->get('berkas_perizinan');
	}

	public function get_berkas_all_p(){
		$this->db->where('status = "tampil"');
		$this->db->where('jenis = "perpanjang"');
		return $this->db->get('berkas_perizinan');
	}

	public function get_berkas_all_by_id($id_perizinan, $id_jenis_alat){
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('detail_berkas_perizinan D','P.id_perizinan = D.id_perizinan');
		$this->db->join('berkas_perizinan B','D.id_berkas_perizinan = B.id_berkas_perizinan');
		$this->db->where('P.id_perizinan', $id_perizinan);
		$this->db->where('P.id_jenis_alat', $id_jenis_alat);
		return $this->db->get();
	}

	public function insert_detail_berkas($data){
		$this->db->insert('detail_berkas_perizinan', $data);
		return $this->db->insert_id();
	}

	public function selesai($id_perizinan, $data){
		$this->db->where('id_perizinan', $id_perizinan);
		$this->db->update('perizinan', $data);
		return TRUE;
	}

	public function selesai_p($id_pengujian, $data){
		$this->db->where('id_pengujian', $id_pengujian);
		$this->db->update('pengujian', $data);
		return TRUE;
	}

	public function get_data_pengguna_by_id($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('jabatan J','P.id_jabatan = J.id_jabatan','left');
		$this->db->join('perusahaan U','U.id_pengguna = P.id_pengguna','left');
		$this->db->where('P.id_pengguna',$id_pengguna);
		return $this->db->get();
	}


	// pengujian

	public function get_data_pengguna_pengujian_by_id($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('perusahaan U','U.id_pengguna = P.id_pengguna','left');
		$this->db->where('P.id_pengguna',$id_pengguna);
		return $this->db->get();
	}

	public function get_alat_yg_aktif($id_pengguna){
		$now = date('Y-m-d');
		$this->db->select('*');
		$this->db->from('perizinan P');
		$this->db->join('pengguna U', 'P.id_pengguna = U.id_pengguna','left');
		$this->db->join('jenis_alat_keselamatan J','P.id_jenis_alat = J.id_jenis_alat','left');
		$this->db->join('jenis_perizinan K','P.id_jenis_perizinan = K.id_jenis_perizinan','left');
		$this->db->where('U.id_pengguna', $id_pengguna);
		$this->db->where('P.status_pembayaran = "Paid"');
		$this->db->where('date(P.tgl_expired) >=', $now);
		return $this->db->get();
	}

	public function get_all_alat(){
		return $this->db->get('jenis_alat_keselamatan');
	}

	public function get_perizinan_ditolak($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('pengguna_perizinan R','P.id_pengguna = R.id_pengguna','left');
		$this->db->join('perizinan Z','R.id_perizinan = Z.id_perizinan','left');
		// $this->db->join('jenis_alat_keselamatan K','K.id_jenis_alat = Z.id_jenis_alat','left');
		$this->db->where('R.status = "ditolak"');
		return $this->db->get();
	}

	public function get_perizinan_by_id_perizinan($id_perizinan){
		$this->db->where('id_perizinan', $id_perizinan);
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = perizinan.id_jenis_alat');
		return $this->db->get('perizinan');
	}
}