<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
			</div>
			<?php
			$data=$this->session->flashdata('sukses');
			if($data!=""){ 
				?>
				<div class="alert alert-success">
					<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
					<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
					<?=$data;?>
				</div>
				<?php 
			} 
			?>
			<?php 
			$data2=$this->session->flashdata('error');
			if($data2!=""){ 
				?>
				<div class="alert alert-danger">
					<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
					<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
					<?=$data2;?>
				</div>
				<?php 
			} 
			?>
		</div>
	</div>
	<!-- End Page Header -->
	<div class="row">
		<div class="col-xl-12">
			<!-- Sorting -->
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="widget-body sliding-tabs">
						<div class="text-right mt-3">
							<a class="btn btn-md btn-info text-right" href="<?php echo base_url('print_laporan_pengujian')?>" target="_blank"><i class="la la-print"></i> Cetak</a>
							<br>
							<br>
						</div>
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link" id="base-tab-6" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Data Pengujian <span id="sertifikasi_ujian"></span></a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-6" role="tabpanel" aria-labelledby="base-tab-6">
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No. Permohonan</th>
												<th class="text-center">No. Sertifikat</th>
												<th class="text-center">Tgl Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Instansi</th>
												<th class="text-center">Status</th>
												<th class="text-center" style="width: 250px;">Masa Berlaku</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											$i=0;
											$sertifikasi_ujian=0;
											foreach ($pengujian as $ujian) {
												if($ujian->status_pembayaran_1 == "paid" && $ujian->status_pembayaran_2 == 'paid'){
													$i++;
													$sertifikasi_ujian+=1;
													$tgl_pengajuan 	= date('Y-m-d', strtotime($ujian->created_at_ujian));
													$tgl_terbit 	= date('Y-m-d', strtotime($ujian->tgl_terbit));
													$tgl_expired 	= date('Y-m-d', strtotime($ujian->tgl_expired));
													?>
													<tr>
														<td class="text-center"><span class="text-primary">
															<?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat; ?></span>
														</td>
														<td class="text-center"><span class="text-primary">
															<?php echo $ujian->kode_alat.'/BTKP/'.$ujian->no_spk; ?></span>
														</td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ujian->nama_alat?></td>
														<td class="text-center"><?php echo $ujian->merk?></td>
														<td class="text-center"><?php echo $ujian->tipe?></td>
														<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
														<td class="text-center">
															<?php
															$tgl_expired = date('Y-m-d', strtotime($ujian->tgl_expired));
															$sekarang = date('Y-m-d');
															if($sekarang > $tgl_expired){
																?>
																<span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
																<?php
															}else{
																?>
																<span style="width:100px;"><span class="badge-text badge-text-small info">aktif</span></span>
																<?php
															}
															?>
														</td>
														<td class="text-center">
															<?php echo date_indo($tgl_terbit).' <br><b>Sampai</b><br> '.date_indo($tgl_expired);?>
														</td>
													</tr>
													<?php
												}
											}
											?>
											<input type="hidden" name="sertifikasi_ujian_bawah" id="sertifikasi_ujian_bawah" value="<?php echo $sertifikasi_ujian;?>">
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Sorting -->
		</div>
	</div>
	<!-- End Row -->
</div>

