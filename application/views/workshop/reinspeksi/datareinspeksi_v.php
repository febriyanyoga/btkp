<div class="container-fluid">
	<div class="col-xl-12">
		<!-- Tabs Dropdown -->
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
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4>Data Re-Inspeksi</h4>
			</div>
			<div class="widget-body sliding-tabs">
				<ul class="nav nav-tabs" id="example-one" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
						aria-selected="true">Permohonan Inspeksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
						aria-selected="false">Hasil Inspeksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
						aria-selected="false">Master Data Inspeksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
						aria-selected="false">Data Inspeksi Ditolak</a>
					</li>
				</ul>
				<div class="tab-content pt-3">
					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">


						<div class="widget-body">
							<div class="text-right mb-3">
								<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahinspeksi"><i class="la la-pencil"></i>Tambah
								Permohonan</i>
							</a> <br>
						</div>
						<div class="table-responsive">
							<table id="myTable" class="table mb-0">
								<thead>
									<tr>
										<th>No.</th>
										<th class="text-center">Kapal</th>
										<th class="text-center">Flag</th>
										<th class="text-center">Imo No</th>
										<th class="text-center">Tanggal Permohonan</th>
										<th class="text-center">Tempat</th>
										<th class="text-center">Status</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($data_inspeksi as $ins) {
										$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
										$alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_workshop)->row();
										$progress_tu = $this->GeneralM->get_array_progress_inspeksi($ins->id_inspeksi)->num_rows();
										if($progress_tu == 0){
											?>
											<tr>
												<td><?php echo $i;?></td>
												<td class="text-center"><?php echo $ins->nama_kapal?></td>
												<td class="text-center"><?php echo $ins->flag?></td>
												<td class="text-center"><?php echo $ins->imo?></td>
												<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
												<td class="text-center"><?php echo $alamat_ws->nama_kabupaten_kota?></td>
												<td class="text-center">
													<span class="badge-text badge-text-small danger">Menunggu Persetujuan</span>
												</td>
											</tr>
											<?php
											$i++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
					<div class="widget-body">
						<div class="table-responsive">
							<table id="myTable2" class="table mb-0">
								<thead>
									<tr>
										<th>No.</th>
										<th class="text-center">Kapal</th>
										<th class="text-center">Flag</th>
										<th class="text-center">Imo No</th>
										<th class="text-center">Tanggal Permohonan</th>
										<th class="text-center">Tempat</th>
										<th class="text-center">Status</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($data_inspeksi as $ins) {
										$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
										$alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_workshop)->row();
										$progress_tu = $this->GeneralM->get_array_progress_inspeksi_setuju($ins->id_inspeksi)->num_rows();
										if($progress_tu > 0 ){
											if($ins->status_pembayaran == 'unpaid'){
												?>
												<tr>
													<td><?php echo $i;?></td>
													<td class="text-center"><?php echo $ins->nama_kapal?></td>
													<td class="text-center"><?php echo $ins->flag?></td>
													<td class="text-center"><?php echo $ins->imo?></td>
													<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
													<td class="text-center"><?php echo $alamat_ws->nama_kabupaten_kota?></td>
													<td class="text-center">
														<?php 
														if($ins->file_hasil_survey == ""){
															?>
															<span class="badge-text badge-text-small danger">Menunggu Dokumen Hasil Inspeksi</span>
															<?php
														}elseif($ins->file_hasil_survey != ""){
															if($ins->kode_billing != ""){
																if($ins->foto_bukti_trf != ""){
																	?>
																	<span class="badge-text badge-text-small default" title="Menunggu validasi pembayaran dan penerbitan">Menunggu Validasi Pembayaran</span>
																	<?php
																}else{
																	?>
																	<span class="badge-text badge-text-small default" title="Menunggu kode billing untuk pembayaran">Menunggu Pembayaran</span>
																	<?php
																}
															}else{
																?>
																<span class="badge-text badge-text-small info" title="Menunggu kode billing untuk pembayaran">Dokumen telah diunggah</span>
																<?php
															}
														}
														?>
													</td>
													<td class="text-center">
														<?php
														if($ins->file_hasil_survey == ""){
															?>
															<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#proses-<?php echo $ins->id_inspeksi?>"><i class="la la-pencil"></i>Proses</i>
															</a>
															<?php
														}else{
															if($ins->kode_billing != ""){
																if($ins->foto_bukti_trf != ""){
																	echo "-";
																}else{
																	?>
																	<a href="<?php echo site_url('cetak_tagihan_ins/'.$ins->id_inspeksi)?>" title="Cetak Sertifikat" target="_BLANK"><i class="la la-print" ></i> Cetak tagihan</i></a>
																	<hr>
																	<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#konfirmasi-<?php echo $ins->id_inspeksi?>"><i class="la la-pencil"></i>Konfirmasi Pembayaran</i>
																	</a>
																	<?php
																}
															}else{
																echo "-";
															}
														}
														?>
													</td>
												</tr>

												<div id="proses-<?php echo $ins->id_inspeksi?>" class="modal fade">
													<div class="modal-dialog modal-lg">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Proses Re-Inspeksi</h4>
																<button type="button" class="close" data-dismiss="modal">
																	<span aria-hidden="true">×</span>
																	<span class="sr-only">close</span>
																</button>
															</div>
															<form action="<?php echo site_url('post_proses')?>" method="POST" enctype="multipart/form-data">
																<div class="modal-body">
																	<div class="form-group">
																		<input type="hidden" name="id_inspeksi" class="form-control" value="<?php echo $ins->id_inspeksi;?>" required="">
																		<input type="hidden" name="status" class="form-control" id="status" value="diterima" required="">
																		<label for="exampleFormControlSelect1">Hasil</label>
																		<select name="hasil" class="form-control" id="hasil">
																			<option value="Remark">Remark</option>
																			<option value="Condamm">Condamm</option>
																		</select>
																	</div>
																	<div class="form-group">
																		<label for="upload"> Upload Dokumen Hasil Re-Inspeksi</label>
																		<input type="file" name="file_hasil_survey" class="form-control" required="">
																	</div>
																	<div class="form-group">
																		<label for="exampleFormControlTextarea1">Catatan</label>
																		<textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-shadow" data-dismiss="modal">Tutup</button>
																	<input type="submit" name="submit" class="btn btn-primary" value="Simpan" onClick="return confirm('Anda yakin berkas yang dibutuhkan sudah lengkap?')">
																</div>
															</form>
														</div>
													</div>
												</div>

												<div class="modal" id="konfirmasi-<?php echo $ins->id_inspeksi?>">
													<div class="modal-dialog modal-md">
														<div class="modal-content">
															<div class="modal-header">
																<h4 class="modal-title">Konfirmasi Pembayaran</h4>
																<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<form action="<?php echo site_url('konfirmasi_ins'); ?>" enctype="multipart/form-data" method="post">
																<div class="modal-body">
																	<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
																	<label for="nama_bank" class="label">Nama Bank : </label>
																	<input type="text" name="nama_bank" value="" class="form-control" placeholder="Masukkan Nama Bank Anda"
																	required="required">

																	<label for="atas_nama" class="label">Atas Nama : </label>
																	<input type="text" name="atas_nama" value="" class="form-control" placeholder="Masukkan atas nama bank anda"
																	required="required">

																	<label for="foto_bukti_trf" class="label">Unggah Bukti: </label>
																	<input type="file" name="foto_bukti_trf" value="" class="form-control" required="required">
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																	<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin data yang dimasukkan sudah benar?')">
																</div>
															</form>
														</div>
													</div>
												</div>
												<?php
												$i++;
											}
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
					<div class="widget-body">
						<div class="table-responsive">
							<table id="myTable3" class="table mb-0">
								<thead>
									<tr>
										<th>No.</th>
										<th>No.Sertifikat</th>
										<th class="text-center">Kapal</th>
										<th class="text-center">Jenis Alat</th>
										<th class="text-center">Tanggal Permohonan</th>
										<th class="text-center">Hasil</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($data_inspeksi as $ins) {
										if($ins->status_pembayaran == 'paid'){
											$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
											?>
											<tr>
												<td><?php echo $i?></td>
												<td>
													<?php
													if($ins->no_spk == ""){
														echo "-";
													}else{
														echo $ins->no_spk.'-'.$ins->kode_alat.'-'.date('Y', strtotime($ins->tgl_terbit));
													}
													?>

												</td>
												<td class="text-center"><?php echo $ins->nama_kapal?></td>
												<td class="text-center"><?php echo $ins->nama_alat?></td>
												<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
												<td class="text-center">
													<?php 
													if($ins->no_spk == ""){
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small default">Menunggu Penerbitan</span></span>

														<?php
													}else{
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span>
														<?php
													}
													?>
												</td>
												<td class="text-center">
													<?php
													if($ins->no_spk ==''){
														echo "-";
													}else{
														?>
														<!-- <a href="" class="btn btn-success btn-md"><i class="la la-eye"></i>Lihat</i></a> -->
														<a href="<?php echo site_url('cetak_bukti_bayar_ins/'.$ins->id_inspeksi)?>" title="Cetak Bukti Bayar" target="_BLANK"><i class="la la-print" ></i> Cetak Bukti bayar</i></a>
														<hr>
														<a href="<?php echo site_url('cetak_ins/'.$ins->id_inspeksi)?>" title="Cetak Sertifikat" target="_BLANK"><i class="la la-print" ></i> Cetak</i></a>
														<?php
													}
													?>
												</td>
											</tr>
											<?php
											$i++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
					<div class="widget-body">
						<div class="table-responsive">
							<table id="myTable4" class="table mb-0">
								<thead>
									<tr>
										<th>No.</th>
										<th class="text-center">Kapal</th>
										<th class="text-center">Jenis Alat</th>
										<th class="text-center">Tanggal Permohonan</th>
										<th class="text-center">Hasil</th>
										<th class="text-center">Keterangan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i=1;
									foreach ($data_inspeksi as $ins) {
										$progress_tu = $this->GeneralM->get_array_progress_inspeksi_tolak($ins->id_inspeksi)->num_rows();
										$progress_all = $this->GeneralM->get_array_progress_inspeksi_all($ins->id_inspeksi)->num_rows();
										if($progress_all > 0 && $progress_tu > 0){
											$keterangan = $this->GeneralM->get_array_progress_inspeksi_all($ins->id_inspeksi)->row()->keterangan;

											$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
											?>
											<tr>
												<td><?php echo $i?></td>
												<td class="text-center"><?php echo $ins->nama_kapal?></td>
												<td class="text-center"><?php echo $ins->nama_alat?></td>
												<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
												<td class="text-center">
													<span style="width:100px;"><span class="badge-text badge-text-small danger">Ditolak</span></span>
												</td>
												<td class="text-center" style="font-weight: bold; color: black;">
													<?php echo $keterangan?>
												</td>
											</tr>
											<?php
											$i++;
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div id="lihat" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hasil Re-Inspeksi</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kapal</label>
						<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Catatan</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>
<div id="tambahinspeksi" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Permohonan Re-Inspeksi</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<form action="<?php echo site_url('post_inspeksi')?>" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="section-title mt-5 mb-3">
						<h4 class="text-center">DATA KAPAL</h4>
						<hr>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Nama Kapal<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_kapal" name="nama_kapal" required>
							<input type="hidden" value="<?php echo $this->session->userdata('id_pengguna')?>" class="form-control" id="id_pengguna" name="id_pengguna" required>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Flag<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="flag" name="flag" required>
						</div>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Imo No<span class="text-danger ml-2">*</span></label>
							<input type="number" value="" class="form-control" id="imo" name="imo" required>
						</div>
						<div class="col-xl-6 mb-3">
							<!-- telepone akun -->
							<label class="form-control-label">Telepon<span class="text-danger ml-2">*</span></label>
							<input type="number" value="" class="form-control" id="telp_kapal" name="telp_kapal" required>
						</div>
					</div>
					<div class="section-title mt-5 mb-3">
						<h4 class="text-center">DATA ALAT</h4>
						<hr>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Alat Keselamatan<span class="text-danger ml-2">*</span></label>
							<select class="form-control" name="id_jenis_alat" required="required">
								<?php 
								foreach ($alat as $al) {
									?>
									<option value="<?php echo $al->id_jenis_alat?>"><?php echo $al->nama_alat?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Jumlah<span class="text-danger ml-2">*</span></label>
							<input type="number" value="" class="form-control" id="jumlah_alat" name="jumlah_alat" required>
						</div>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label for="upload"> Upload Surat Permohonan Re-Inspeksi</label>
							<input type="file" name="file_permohonan" class="form-control" required="">
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" class="btn btn-primary" value="Save" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
				</div>
			</form>
		</div>
	</div>
</div>
</div>
