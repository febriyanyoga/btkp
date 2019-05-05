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
		$this->db->where('status = "aktif"');
		return $this->db->get('jenis_alat_keselamatan');
	}

	public function insert_persetujuan($data){
		$this->db->insert('pengguna_perizinan', $data);
		return TRUE;
	}

	public function insert_persetujuan_pengujian($data){
		$this->db->insert('pengguna_pengujian', $data);
		return TRUE;
	}

	public function insert_persetujuan_inspeksi($data){
		$this->db->insert('pengguna_inspeksi', $data);
		return TRUE;
	}

	public function insert_ttd($data){
		$this->db->insert('ttd', $data);
		return TRUE;
	}

	public function get_own_progress($id_pengguna, $id_perizinan){ //perizinan yang di verifikasi kasie
		$this->db->select('*');
		$this->db->from('pengguna_perizinan');
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_perizinan',$id_perizinan);
		return $this->db->get();
	}

	public function get_own_progress_pengujian($id_pengguna, $id_pengujian){ //perizinan yang di verifikasi kasie
		$this->db->select('*');
		$this->db->from('pengguna_pengujian');
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_pengujian',$id_pengujian);
		return $this->db->get();
	}

	public function get_own_progress_inspeksi($id_pengguna, $id_inspeksi){ //perizinan yang di verifikasi kasie
		$this->db->select('*');
		$this->db->from('pengguna_inspeksi');
		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->where('id_inspeksi',$id_inspeksi);
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

	public function get_array_progress_inspeksi($id_inspeksi){
		$this->db->select('*');
		$this->db->from('pengguna_inspeksi P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_inspeksi', $id_inspeksi);
		// $this->db->where('P.status = "diterima"');
		return $this->db->get();
	}

	public function get_array_progress_inspeksi_all($id_inspeksi){
		$this->db->select('*');
		$this->db->from('pengguna_inspeksi P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('P.id_inspeksi', $id_inspeksi);
		return $this->db->get();
	}

	public function get_array_progress_inspeksi_setuju($id_inspeksi){
		$this->db->select('*');
		$this->db->from('pengguna_inspeksi P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_inspeksi', $id_inspeksi);
		$this->db->where('P.status = "diterima"');
		return $this->db->get();
	}

	public function get_array_progress_inspeksi_tolak($id_inspeksi){
		$this->db->select('*');
		$this->db->from('pengguna_inspeksi P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_inspeksi', $id_inspeksi);
		$this->db->where('P.status = "ditolak"');
		return $this->db->get();
	}

	public function get_array_progress_ujian($id_pengujian){
		$this->db->select('*');
		$this->db->from('pengguna_pengujian P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "2"'); //tu
		$this->db->where('P.id_pengujian', $id_pengujian);
		// $this->db->where('P.status = "diterima"');
		return $this->db->get();
	}

	public function get_array_progress_ujian_kasie($id_pengujian){
		$this->db->select('*');
		$this->db->from('pengguna_pengujian P');
		$this->db->join('pengguna U','P.id_pengguna = U.id_pengguna','left');
		$this->db->where('U.id_jabatan = "3"'); //kasie
		$this->db->where('P.id_pengujian', $id_pengujian);
		// $this->db->where('P.status = "diterima"');
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
		$this->db->select('*');
		$this->db->from('pengguna');
		$this->db->join('jabatan','jabatan.id_jabatan = pengguna.id_jabatan');
		$this->db->where('pengguna.id_jabatan > "4" AND pengguna.id_jabatan < "10"');
		return $this->db->get();
	}

	public function get_jumlah_kapal(){
		$this->db->select('*');
		$this->db->from('inspeksi');
		$this->db->where('nama_kapal != ""');
		$this->db->where('status_pembayaran = "paid"');
		return $this->db->get();
	}

	public function get_jumlah_perizinan(){
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = perizinan.id_jenis_alat');
		$this->db->where('status_pembayaran = "paid"');
		$this->db->where('pengesahan = "sah"');
		return $this->db->get('perizinan');
	}

	public function get_jumlah_pengujian(){
		$this->db->where('status_pembayaran_1 = "paid"');
		$this->db->where('status_pembayaran_2 = "paid"');
		return $this->db->get('pengujian');
	}

	public function get_jumlah_inspeksi(){
		$this->db->where('status_pembayaran = "paid"');
		return $this->db->get('inspeksi');
	}

	public function get_jumlah_produk(){
		$this->db->where('status = "aktif"');
		return $this->db->get('jenis_alat_keselamatan');
	}

	public function get_pengguna($id_pengguna){
		$this->db->select('*');
		$this->db->from('pengguna P');
		$this->db->join('jabatan J','J.id_jabatan = P.id_jabatan','left');
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

	public function get_perusahaan($id_pengguna){
		$this->db->where('id_pengguna', $id_pengguna);
		return $this->db->get('perusahaan');
	}

	public function get_maker_by_id_perusahaan($id_perusahaan){
		$this->db->where('id_perusahaan', $id_perusahaan);
		return $this->db->get('maker');
	}

	public function get_maker_by_id_maker($id_maker){
		$this->db->where('id_maker', $id_maker);
		return $this->db->get('maker');
	}

	public function send_email($subject, $to, $isi){  
		$config = Array(  
			'protocol' 	=> 'smtp',  
			'smtp_host' => 'ssl://smtp.googlemail.com',  
			'smtp_port' => 465,  
			'smtp_user' => 'aplikasibtkp@gmail.com',   
			'smtp_pass' => 'Btkpjaya2018',   
			'mailtype' 	=> 'html',   
			'charset' 	=> 'iso-8859-1'  
		);  
		$this->load->library('email', $config);  
		$this->email->set_newline("\r\n");  
		$this->email->from('no-reply@btkp.com', 'Admin BTKP');   
		$this->email->to($to);   
		$this->email->subject($subject);
		$this->email->message($isi);  
		$this->email->send();
	}  

	public function send_email_2($subject, $to, $isi){  
		$from = "no-reply@btkp.com";
		$to = $to;
		$subject 	= $subject;
		$message 	= $isi;
		$headers    = 'MIME-Version: 1.0' . "\r\n";
		$headers    .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers 	.= "From:" . $from;
		mail($to,$subject,$message, $headers);
	}  

	public function verifyemail($key){  //post konfirmasi email ubah value status_email jadi 1 (aktif)
		$data = array(
			'status_email' => 'aktif',
			'status_akun' => 'aktif',
		);  
		$this->db->where('md5(id_pengguna)', $key);
		return $this->db->update('pengguna', $data);  
	}

	public function get_perusahaan_all()
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('pengguna','pengguna.id_pengguna = perusahaan.id_pengguna');
		$this->db->where('pengguna.id_jabatan = "5"');
		return $this->db->get();
	}

	public function get_ttd(){
		$this->db->select('*');
		$this->db->from('ttd');
		$this->db->order_by('kode_ttd','DESC');
		return $this->db->get();
	}

	public function cek_email($email){
		$this->db->where('email_pengguna', $email);
		return $this->db->get('pengguna');

	}

	public function insert_token($data){
		$this->db->insert('token', $data);
		return TRUE;
	}

	public function cek_token($token){
		$this->db->where('token', $token);
		return $this->db->get('token');
	}

	public function update_password($id_pengguna, $data){
		$this->db->where('id_pengguna', $id_pengguna);
		$this->db->update('pengguna', $data);
		return TRUE;
	}
}