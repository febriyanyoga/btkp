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

	public function insert_billing_ujian($id_pengujian, $data){
		$this->db->where('id_pengujian', $id_pengujian);
		$this->db->update('pengujian',$data);
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

	public function get_bank_btkp(){
		return $this->db->get('bank_btkp');
	}

	public function get_last_izin_terbit($tgl){
		$this->db->select('*');
		$this->db->from('perizinan');
		$this->db->where('DATE(tgl_terbit) <= ',$tgl);
		$this->db->where('status_pembayaran = "Paid"');
		$this->db->where('no_spk != ""');
		$this->db->order_by('id_perizinan','DESC');
		$this->db->limit('1');

		return $this->db->get();
	}

	public function get_last_ins_terbit($tgl){
		$this->db->select('*');
		$this->db->from('inspeksi');
		$this->db->where('DATE(tgl_terbit) <= ',$tgl);
		$this->db->where('status_pembayaran = "Paid"');
		$this->db->where('no_spk != ""');
		$this->db->order_by('id_inspeksi','DESC');
		$this->db->limit('1');

		return $this->db->get();
	}

	public function get_last_ujian_terbit($tgl){
		$this->db->select('*');
		$this->db->from('pengujian');
		$this->db->where('DATE(tgl_terbit) <= ',$tgl);
		$this->db->where('status_pembayaran_1 = "paid" AND status_pembayaran_2 = "paid"');
		$this->db->where('no_spk != ""');
		$this->db->order_by('id_pengujian','DESC');
		$this->db->limit('1');

		return $this->db->get();
	}

	public function get_berkas_by_id2($id_berkas){
		$this->db->where('id_berkas_perizinan', $id_berkas);
		return $this->db->get('berkas_perizinan');
	}

	public function get_all_pengujian(){
		$this->db->select('*');
		$this->db->from('pengujian');
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = pengujian.id_jenis_alat');
		$this->db->join('pengguna','pengguna.id_pengguna = pengujian.id_pengguna');
		$this->db->join('perusahaan','perusahaan.id_pengguna = pengguna.id_pengguna');
		return $this->db->get();
	}

	public function get_all_pengujian_with_status(){
		$this->db->select('*');
		$this->db->from('pengujian');
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = pengujian.id_jenis_alat');
		$this->db->join('pengguna','pengguna.id_pengguna = pengujian.id_pengguna');
		$this->db->join('pengguna_pengujian','pengguna_pengujian.id_pengujian = pengujian.id_pengujian','left');
		$this->db->join('perusahaan','perusahaan.id_pengguna = pengguna.id_pengguna');
		$this->db->where('pengguna_pengujian.status = "ditolak"');
		return $this->db->get();
	}

	public function get_pengujian_by_id($id_pengujian){
		$this->db->select('*');
		$this->db->from('pengujian');
		$this->db->join('jenis_alat_keselamatan','jenis_alat_keselamatan.id_jenis_alat = pengujian.id_jenis_alat');
		$this->db->join('pengguna','pengguna.id_pengguna = pengujian.id_pengguna');
		$this->db->join('perusahaan','perusahaan.id_pengguna = pengguna.id_pengguna');
		$this->db->join('jabatan','jabatan.id_jabatan = pengguna.id_jabatan');
		$this->db->where('pengujian.id_pengujian',$id_pengujian);
		return $this->db->get();
	}




	public function reqKodeBilling($data){
		$input_xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:sim="http://SimponiBRI_Service">
					   <soapenv:Header/>
					   <soapenv:Body>
					      <sim:PaymentRequest>
					         <appsId>'.$data['appID'].'</appsId>
					         <invoiceNo>'.$data['invoiceNo'].'</invoiceNo>
					         <routeId>'.$data['routeID'].'</routeId>
					         <data>
					            <PaymentHeader>
					               <TrxId>'.$data['trxID'].'</TrxId>
					               <UserId>'.$data['userID'].'</UserId>
					               <Password>'.$data['password'].'</Password>
					               <ExpiredDate>'.$data['expDate'].'</ExpiredDate>
					               <DateSent>'.$data['dateSent'].'</DateSent>
					               <KodeKL>'.$data['kodeKL'].'</KodeKL>
					               <KodeEselon1>'.$data['kodeEselon1'].'</KodeEselon1>
					               <KodeSatker>'.$data['kodeSatket'].'</KodeSatker>
					               <JenisPNBP>'.$data['jenisPNPB'].'</JenisPNBP>
					               <KodeMataUang>'.$data['kodeMataUang'].'</KodeMataUang>
					               <TotalNominalBilling>'.$data['totalNominalBilling'].'</TotalNominalBilling>
					               <NamaWajibBayar>'.$data['namaWajibBayar'].'</NamaWajibBayar>
					            </PaymentHeader>
					            <PaymentDetails>
					               <PaymentDetail>
					                  <NamaWajibBayar>'.$data['detNamaWajibBayar'].'</NamaWajibBayar>
					                  <KodeTarifSimponi>'.$data['kodeTarifSimponi'].'</KodeTarifSimponi>
					                  <KodePPSimponi>'.$data['kodePPSimponi'].'</KodePPSimponi>
					                  <KodeAkun>'.$data['kodeAkun'].'</KodeAkun>
					                  <TarifPNBP>'.$data['tarifPNPB'].'</TarifPNBP>
					                  <Volume>'.$data['volume'].'</Volume>
					                  <Satuan>'.$data['satuan'].'</Satuan>
					                  <TotalTarifPerRecord>'.$data['totalTarifPerRecord'].'</TotalTarifPerRecord>
					               </PaymentDetail>
					            </PaymentDetails>
					         </data>
					      </sim:PaymentRequest>
					   </soapenv:Body>
					</soapenv:Envelope>';

					$type = 'application/xml';

					$headers = array(
                        'Content-type:'. $type,
                        'Accept: text/xml',
                        'Cache-Control: no-cache',
                        'Pragma: no-cache',
                        'SOAPAction: http://soadev.dephub.go.id:7800/SimponiBRI_Service', 
                        'Content-length: '.strlen($input_xml),
                    );


					$url = "http://soadev.dephub.go.id:7800/SimponiBRI_Service";

		            $ch = curl_init();
		            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
		            curl_setopt($ch, CURLOPT_URL, $url);
		            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		            curl_setopt($ch, CURLOPT_USERPWD, $data['userID'].":".$data['password']);
		            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		            curl_setopt($ch, CURLOPT_TIMEOUT, 300);
		            curl_setopt($ch, CURLOPT_POST, true);
		            curl_setopt($ch, CURLOPT_POSTFIELDS, $input_xml);
		            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		            $response = curl_exec($ch); 
		            curl_close($ch);

		            $parser = htmlspecialchars($response);
		            return $parser;
					
	}

}