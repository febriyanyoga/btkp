$(document).ready(function(){
	// pengujian diterima manufaktur
	var jumlah_diterima = $('#jumlah_1').val();
	if(jumlah_diterima != 0){
		$('#jumlah_diterima').html('<span class="btn btn-sm btn-success btn-rounded">' + jumlah_diterima + ' </span>');
	}

	// pengujian ditolak manufaktur
	var jumlah_ditolak = $('#jumlah').val();
	if(jumlah_ditolak != 0){
		$('#jumlah_ditolak').html('<span class="btn btn-sm btn-danger btn-rounded">' + jumlah_ditolak + ' </span>');
	}

	// jumlah spk manufaktur
	var spk = $('#spk_bawah').val();
	if(spk != 0){
		$('#spk').html('<span class="btn btn-sm btn-info btn-rounded">' + spk + ' </span>');
	}

	// jumlah inspeksi manufaktur
	var inspeksi = $('#inspeksi_bawah').val();
	if(inspeksi != 0){
		$('#inspeksi').html('<span class="btn btn-sm btn-info btn-rounded">' + inspeksi + ' </span>');
	}

	// jumlah izin aktif manufaktur
	var aktif = $('#aktif_bawah').val();
	if(aktif != 0){
		$('#izin_aktif').html('<span class="btn btn-sm btn-info btn-rounded">' + aktif + ' </span>');
	}

	// jumlah izin tidak aktif manufaktur
	var tidak_aktif = $('#tidak_aktif_bawah').val();
	if(tidak_aktif != 0){
		$('#izin_tidak_aktif').html('<span class="btn btn-sm btn-danger btn-rounded">' + tidak_aktif + ' </span>');
	}

	// jumlah izin ditolak manufaktur
	var izin_tolak = $('#izin_tolak_bawah').val();
	if(izin_tolak != 0){
		$('#izin_tolak').html('<span class="btn btn-sm btn-success btn-rounded">' + izin_tolak + ' </span>');
	}	

	// jumlah permohonan ins manufaktur
	var mohon = $('#permohonan_ins_bawah').val();
	if(mohon != 0){
		$('#permohonan_ins').html('<span class="btn btn-sm btn-info btn-rounded">' + mohon + ' </span>');
	}	

	// jumlah hasil ins manufaktur
	var hasil_ins = $('#hasil_ins_bawah').val();
	if(hasil_ins != 0){
		$('#hasil_ins').html('<span class="btn btn-sm btn-primary btn-rounded">' + hasil_ins + ' </span>');
	}	

	// jumlah data ins manufaktur
	var data_ins = $('#data_ins_bawah').val();
	if(data_ins != 0){
		$('#data_ins').html('<span class="btn btn-sm btn-success btn-rounded">' + data_ins + ' </span>');
	}	

	// jumlah ins ditolak manufaktur
	var ins_ditolak = $('#ins_ditolak_bawah').val();
	if(ins_ditolak != 0){
		$('#ins_ditolak').html('<span class="btn btn-sm btn-danger btn-rounded">' + ins_ditolak + ' </span>');
	}	




	// ========admin tu ========
	// jumlah verifikasi izin TU
	var inspeksi_teknis = $('#inspeksi_teknis_bawah').val();
	if(inspeksi_teknis != 0){
		$('#inspeksi_teknis').html('<span class="btn btn-sm btn-primary btn-rounded">' + inspeksi_teknis + ' </span>');
	}	

	var verifikasi_izin = $('#verifikasi_izin_bawah').val();
	if(verifikasi_izin != 0){
		$('#verifikasi_izin').html('<span class="btn btn-sm btn-success btn-rounded">' + verifikasi_izin + ' </span>');
	}	

	// jumlah kode billing izin TU
	var kode_billing_izin = $('#kode_billing_izin_bawah').val();
	if(kode_billing_izin != 0){
		$('#kode_billing_izin').html('<span class="btn btn-sm btn-info btn-rounded">' + kode_billing_izin + ' </span>');
	}

	// jumlah penerbitan izin TU
	var penerbitan_izin = $('#penerbitan_izin_bawah').val();
	if(penerbitan_izin != 0){
		$('#penerbitan_izin').html('<span class="btn btn-sm btn-success btn-rounded">' + penerbitan_izin + ' </span>');
	}	

	// jumlah data spk izin TU
	var data_spk_izin = $('#data_spk_izin_bawah').val();
	if(data_spk_izin != 0){
		$('#data_spk_izin').html('<span class="btn btn-sm btn-info btn-rounded">' + data_spk_izin + ' </span>');
	}	

	// jumlah izin tolak TU
	var izin_tolak = $('#izin_tolak_bawah').val();
	if(izin_tolak != 0){
		$('#izin_ditolak').html('<span class="btn btn-sm btn-danger btn-rounded">' + izin_tolak + ' </span>');
	}	


	// jumlah verifikasi ujian TU
	var verifikasi_ujian = $('#verifikasi_ujian_bawah').val();
	if(verifikasi_ujian != 0){
		$('#verifikasi_ujian').html('<span class="btn btn-sm btn-success btn-rounded">' + verifikasi_ujian + ' </span>');
	}	

	// jumlah validasi 1 ujian TU
	var validasi_1_ujian = $('#validasi_1_ujian_bawah').val();
	if(validasi_1_ujian != 0){
		$('#validasi_1_ujian').html('<span class="btn btn-sm btn-info btn-rounded">' + validasi_1_ujian + ' </span>');
	}	

	// jumlah pengujian ujian TU
	var pengujian_ujian = $('#pengujian_ujian_bawah').val();
	if(pengujian_ujian != 0){
		$('#pengujian_ujian').html('<span class="btn btn-sm btn-primary btn-rounded">' + pengujian_ujian + ' </span>');
	}	

	// jumlah pembayaran 2 ujian TU
	var pembayaran_2_ujian = $('#pembayaran_2_ujian_bawah').val();
	if(pembayaran_2_ujian != 0){
		$('#pembayaran_2_ujian').html('<span class="btn btn-sm btn-success btn-rounded">' + pembayaran_2_ujian + ' </span>');
	}	

	// jumlah validasi 2 ujian TU
	var validasi_2_ujian = $('#validasi_2_ujian_bawah').val();
	if(validasi_2_ujian != 0){
		$('#validasi_2_ujian').html('<span class="btn btn-sm btn-info btn-rounded">' + validasi_2_ujian + ' </span>');
	}	

	// jumlah sertifikasi ujian TU
	var sertifikasi_ujian = $('#sertifikasi_ujian_bawah').val();
	if(sertifikasi_ujian != 0){
		$('#sertifikasi_ujian').html('<span class="btn btn-sm btn-primary btn-rounded">' + sertifikasi_ujian + ' </span>');
	}

	// jumlah  ujian ditolak TU
	var ujian_ditolak = $('#ujian_ditolak_bawah').val();
	if(ujian_ditolak != 0){
		$('#ujian_ditolak').html('<span class="btn btn-sm btn-danger btn-rounded">' + ujian_ditolak + ' </span>');
	}	

	// jumlah konfirmasi permohonan ins TU
	var konfirmasi_ins = $('#konfirmasi_ins_bawah').val();
	if(konfirmasi_ins != 0){
		$('#konfirmasi_ins').html('<span class="btn btn-sm btn-success btn-rounded">' + konfirmasi_ins + ' </span>');
	}	

	// jumlah kode billing ins TU
	var kode_billing_ins = $('#kode_billing_ins_bawah').val();
	if(kode_billing_ins != 0){
		$('#kode_billing_ins').html('<span class="btn btn-sm btn-info btn-rounded">' + kode_billing_ins + ' </span>');
	}	

	// jumlah validasi ins TU
	var validasi_ins = $('#validasi_ins_bawah').val();
	if(validasi_ins != 0){
		$('#validasi_ins').html('<span class="btn btn-sm btn-primary btn-rounded">' + validasi_ins + ' </span>');
	}

	// jumlah validasi ins TU
	var penerbitan_ins = $('#penerbitan_ins_bawah').val();
	if(penerbitan_ins != 0){
		$('#penerbitan_ins').html('<span class="btn btn-sm btn-success btn-rounded">' + penerbitan_ins + ' </span>');
	}	

	// jumlah validasi ins TU
	var tolak_ins = $('#tolak_ins_bawah').val();
	if(tolak_ins != 0){
		$('#tolak_ins').html('<span class="btn btn-sm btn-danger btn-rounded">' + tolak_ins + ' </span>');
	}	


	// ========Kasie RB ========
	// jumlah verifikasi izin KASIE
	var verifikasi_izin_kasie = $('#verifikasi_izin_kasie_bawah').val();
	if(verifikasi_izin_kasie != 0){
		$('#verifikasi_izin_kasie').html('<span class="btn btn-sm btn-info btn-rounded">' + verifikasi_izin_kasie + ' </span>');
	}	

	// jumlah data SPK izin KASIE
	var data_spk_izin_kasie = $('#data_spk_izin_kasie_bawah').val();
	if(data_spk_izin_kasie != 0){
		$('#data_spk_izin_kasie').html('<span class="btn btn-sm btn-success btn-rounded">' + data_spk_izin_kasie + ' </span>');
	}	

	// jumlah izin ditolak Kasie
	var izin_ditolak_kasie = $('#izin_ditolak_kasie_bawah').val();
	if(izin_ditolak_kasie != 0){
		$('#izin_ditolak_kasie').html('<span class="btn btn-sm btn-danger btn-rounded">' + izin_ditolak_kasie + ' </span>');
	}	


	// jumlah verifikasi ujian Kasie
	var verifikasi_ujian_kasie = $('#verifikasi_ujian_kasie_bawah').val();
	if(verifikasi_ujian_kasie != 0){
		$('#verifikasi_ujian_kasie').html('<span class="btn btn-sm btn-success btn-rounded">' + verifikasi_ujian_kasie + ' </span>');
	}	

	// jumlah data pengujian ujian Kasie
	var data_pengujian_kasie = $('#data_pengujian_kasie_bawah').val();
	if(data_pengujian_kasie != 0){
		$('#data_pengujian_kasie').html('<span class="btn btn-sm btn-info btn-rounded">' + data_pengujian_kasie + ' </span>');
	}	

	// jumlah data pengujian ditolak Kasie
	var pengujian_ditolak_kasie = $('#pengujian_ditolak_kasie_bawah').val();
	if(pengujian_ditolak_kasie != 0){
		$('#pengujian_ditolak_kasie').html('<span class="btn btn-sm btn-danger btn-rounded">' + pengujian_ditolak_kasie + ' </span>');
	}


	$(function() {
		$('#nama_perusahaan').keydown(function(e) {
			if (e.shiftKey || e.ctrlKey || e.altKey) {
				e.preventDefault();
			} else {
				var key = e.keyCode;
				if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
					e.preventDefault();
				}
			}
		});
	});	

	$(document).ready(function(){
		$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
			localStorage.setItem('activeTab', $(e.target).attr('href'));
		});
		var activeTab = localStorage.getItem('activeTab');
		if(activeTab){
			$('#example-one a[href="' + activeTab + '"]').tab('show');
		}
	});

});
