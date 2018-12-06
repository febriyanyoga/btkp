<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<!-- Begin Invoice -->
			<div class="invoice has-shadow">
				<!-- Begin Invoice COntainer -->
				<div class="invoice-container">
					<!-- Begin Invoice Top -->
					<div class="invoice-top">
						<div class="row d-flex align-items-center">
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
								<div class="actions dark">
									<div class="dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
											<i class="la la-ellipsis-h"></i>
										</button>
										<div class="dropdown-menu">
											<a href="<?php echo site_url('WorkshopC/print_perizinan/'.$detail_perizinan->id_perizinan)?>" class="dropdown-item" target="_BLANK">
												<i class="la la-print"></i>Print
											</a>
											<a href="#" class="dropdown-item">
												<i class="la la-download"></i>Download
											</a>
										</div>
									</div>
								</div>
							</div>
							<?php
							// print_r($detail_perizinan);
							?>
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 text-center">
								<h2>SURAT PERSETUJUAN KEWENANGAN PERAWATAN DAN PERBAIKAN <?php echo strtoupper($detail_perizinan->nama_alat);?> </h2>
								<h3>Berdasarkan UU No.17 Tahun 2008, PP No. 15 Tahun 2016 dan KM. 67 Tahun 2002, Resolusi MSC I / CIRC 1206,
									SOLAS 1974 Amandemen Manila 2010
								</h3>
								<span>Nomor : PK.005/ / /TKP-18</span>
							</div>
						</div>
					</div>
					<!-- End Invoice Top -->
					<!-- Begin Invoice Header -->
					<div class="invoice-header">
						<div class="row d-flex align-items-center">
							<div class="col-xl-12 col-md-2 col-sm-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
								<h4 class="text-justify">Berdasarkan surat permohonan Saudara Nomor : <b><?php echo $detail_perizinan->no_spk?></b> Tanggal <b>
									<?php 
									$tgl_terbit = date('Y-m-d', strtotime($detail_perizinan->tgl_terbit));
									$tgl_expired = date('Y-m-d', strtotime($detail_perizinan->tgl_expired));
									echo date_indo($tgl_terbit);
									?>
								</b> dan pemenuhan persyaratan administrasi serta teknis, maka diberikan perpanjangan izin Surat
								Persetujuan Kewenangan Perawatan dan Perbaikan
								<i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> kepada :</h4>
							</div>
							<div class="col-xl-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
								<div class="details">
									<div class="form-group row mb-5" style="color:black;">
										<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Perusahaan</div>
										<div class="col-sm-8"><b><?php echo $detail_perizinan->nama_perusahaan;?></b></div>
										<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Kantor Perusahaan</div>
										<?php
										$alamat_pt_detail = $this->WorkshopM->detail_alamat($detail_perizinan->id_kel_perusahaan)->row();
										?>
										<div class="col-sm-8"><b><?php echo $detail_perizinan->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></b></div>
										<div class="col-sm-3 form-control-label d-flex align-items-center">Akte Pendirian Perusahaan</div>
										<div class="col-sm-8"><b>Nomor <?php echo $detail_perizinan->akta_perusahaan?>, Tanggal 14 Desember 2016</b></div>
										<div class="col-sm-3 form-control-label d-flex align-items-center">Pemimpin/Penanggung Jawab</div>
										<div class="col-sm-8"><b><?php echo $detail_perizinan->nama_pimpinan?></b></div>
										<div class="col-sm-3 form-control-label d-flex align-items-center">Nomor Pokok Wajib Pajak</div>
										<div class="col-sm-8"><b><?php echo $detail_perizinan->npwp?></b></div>
										<div class="col-sm-3 form-control-label d-flex align-items-center">Wilayah </div>
										<div class="col-sm-8"><b>Timur</b></div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-md-2 col-sm-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
								<h4 class="text-justify"><b>Kewajiban pemegang Surat Persetujuan Kewenangan Perawatan dan Perbaikan ILR :</b></h4>
							</div>
							<div class="col-xl-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
								<div class="details">
									<div class="form-group row mb-5 text-justify" style="color:black;">
										<div class="col-sm-12 form-control-label">
											1. Pelaksanaan perawatan dan perbaikan <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> memperhatikan ketentuan Balai Teknologi
											Keselamatan Pelayaran Direktorat Jenderal Perhubungan Laut;
										</div>
										<div class="col-sm-12 form-control-label">
											2. Mengutamakan kebersihan ruangan bengkel dan peralatan penguji / peralatan kerja serta melaksanakan
											ketentuan-ketentuan yang menyangkut keselamatan dan kesehatan kerja;
										</div>
										<div class="col-sm-12 form-control-label">
											3. Pekerjaan perawatan dan perbaikan <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> dilakukan oleh tenaga ahli yang memiliki
											sertifikat dari pabrik pembuat yang masih berlaku;
										</div>
										<div class="col-sm-12 form-control-label">
											4. Pekerjaan perawatan dan perbaikan setiap unit alat keselamatan dilakukan di dalam service station yang
											dibuktikan dengan berita acara dan dokumentasi;
										</div>
										<div class="col-sm-12 form-control-label">
											5. Penggunaan suku cadang ataupun perlengkapan isi <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> dengan memperhatikan masa
											berlakunya;
										</div>
										<div class="col-sm-12 form-control-label">
											6. Menghadirkan Pejabat Pemeriksa Keselamatan Kapal (PPKK) dari Kantor Kesyahbandaran Utama, Kantor
											Kesyahbandaran dan Otoritas Pelabuhan (KSOP), Kantor Pelabuhan atau Kantor Unit Penyelenggara Pelabuhan
											(UPP) setempat untuk melakukan Pengawasan kegiatan perawatan dan perbaikan <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i>,
											dituangkan dalam bentuk Berita Acara yang ditandatangani Pejabat Pemeriksa Keselamatan Kapal (PPKK);
										</div>
										<div class="col-sm-12 form-control-label">
											7. Mengajukan permohonan perpanjangan SPK 1 (satu) bulan sebelum berakhirnya masa berlaku.
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 d-flex justify-content-xl-start justify-content-md-center justify-content-center mb-2">
								<div class="details">
									<div class="form-group row mb-5 text-justify" style="color:black;">

										<div class="col-sm-12 form-control-label">
											Surat Persetujuan Kewenangan Perawatan dan Perbaikan <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> ini dapat dicabut apabila
											terjadi Pelanggaran Kewajiban-kewajiban.
										</div>
										<div class="col-sm-12 form-control-label">
											Surat Persetujuan Kewenangan Perawatan dan Perbaikan <i><?php echo strtoupper($detail_perizinan->nama_alat);?></i> ini berlaku sejak tanggal
											dikeluarkan, sampai dengan tanggal :
											<span class="badge-text info"><?php echo date_indo($tgl_expired);?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
