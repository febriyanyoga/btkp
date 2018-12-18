<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Re-Inspeksi</h2>
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
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								aria-selected="true">Konfirmasi Permohonan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								aria-selected="false">Kode Billing</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
								aria-selected="false">Validasi Pembayaran</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
								aria-selected="false">Penerbitan</a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach ($data_inspeksi as $ins) {
												$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
												// $alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_perusahaan)->row();
												$progress_tu = $this->GeneralM->get_array_progress_inspeksi($ins->id_inspeksi)->num_rows();
												if($progress_tu == 0){
													?>
													<tr>
														<td><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan?></td>
														<td class="text-center"><?php echo $ins->nama_alat?></td>
														<td class="text-center"><?php echo $ins->nama_kapal?></td>
														<td class="text-center">
															<a href="<?php echo site_url('verifikasiawalinspeksi/'.$ins->id_inspeksi); ?>" class="btn btn-success mr-1 mb-2"><i class="la la-pencil"></i>Konfirmasi</i>
															</a>
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
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
								<div class="table-responsive">
									<table id="myTable2" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
												<th class="text-center">Hasil</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											foreach ($data_inspeksi as $ins) {
												$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
												// $alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_perusahaan)->row();
												$progress_tu = $this->GeneralM->get_array_progress_inspeksi($ins->id_inspeksi)->num_rows();
												if($progress_tu > 0 && $ins->file_hasil_survey != "" && $ins->kode_billing ==""){
													?>
													<tr>
														<td><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan?></td>
														<td class="text-center"><?php echo $ins->nama_alat?></td>
														<td class="text-center"><?php echo $ins->nama_kapal?></td>
														<td class="text-center">
															<a href="<?php echo base_url().'assets/upload/'.$ins->file_hasil_survey;?>" target="_BLANK" class="btn btn-primary btn-md"><i class="la la-pencil" title="Lihat dokumen hasil survey"></i>Dokumen</i></a>
														</td>
														<td class="text-center">
															<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling-<?php echo $ins->id_inspeksi; ?>"><i class="la la-pencil"></i>Kode Billing</i></a>
														</td>
													</tr>

													<div class="modal" id="kode_biling-<?php echo $ins->id_inspeksi;?>">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Masukkan Kode Billing</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																<form action="<?php echo site_url('post_kode_inspeksi'); ?>" method="post">
																	<div class="modal-body">
																		<label for="kode_billing" class="label">Kode Billing : </label>
																		<input type="number" name="kode_billing" value="" class="form-control" placeholder="Masukkan kode billing" required="required">
																		<label for="bank_btkp" class="label">Bank BTKP : </label>
																		<select class="form-control" name="id_bank_btkp">
																			<option value="">---Pilih Bank---</option>
																			<?php
																			foreach ($bank_btkp as $bank ) {
																				?>
																				<option value="<?php echo $bank->id_bank_btkp?>"><?php echo $bank->nama_bank?></option>
																				<?php
																			}
																			?>
																		</select>
																		<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
																		<label for="jumlah_tagihan" class="label">Jumlah Tagihan: </label>
																		<input type="number" name="jumlah_tagihan" value="" class="form-control" placeholder="Masukkan Jumlah Tagihan" required="required">
																		<label for="masa_berlaku_billing" class="label">Masa Berlaku Sampai: </label>
																		<input type="date" name="masa_berlaku_billing" value="" class="form-control" placeholder="Masukkan Masa Berlaku" required="required">
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																		<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin Kode billing yang dimasukkan sudah benar?')">
																	</div>
																</form>
															</div>
														</div>
													</div>
													<?php
													$i++;
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
								<div class="table-responsive">
									<table id="myTable3" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($data_inspeksi as $ins) {
												if($ins->foto_bukti_trf != "" && $ins->status_pembayaran == 'unpaid'){
													$i++;
													$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
													?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan;?></td>
														<td class="text-center"><?php echo $ins->nama_alat;?></td>
														<td class="text-center"><?php echo $ins->nama_kapal;?></td>
														<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
														<td class="text-center">
															<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#validasi-<?php echo $ins->id_inspeksi?>"><i class="la la-pencil"></i>Validasi</i>
															</a>
														</td>
													</tr>

													<div class="modal" id="validasi-<?php echo $ins->id_inspeksi?>">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Validasi Pembayaran</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>

																<form action="<?php echo site_url('validasi_ins'); ?>" method="post">
																	<div class="modal-body">
																		<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
																		<label for="nama_bank" class="label">Bank Transfer : </label>
																		<input type="text" name="nama_bank" value="<?php echo $ins->nama_bank; ?>" class="form-control" required="required" readonly>
																		<label for="atas_nama" class="label">Atas Nama : </label>
																		<input type="text" name="atas_nama" value="<?php echo $ins->atas_nama; ?>" class="form-control" required="required" readonly>
																		<label for="" class="label">Foto Bukti Transfer : </label><br>
																		<img style="max-width: 470px;" src="<?php echo base_url().'assets/upload/'.$ins->foto_bukti_trf;?>"><br>
																		<label for="status_pembayaran" class="label">Status Pembayaran : </label>
																		<select class="form-control" name="status_pembayaran">
																			<option value="paid">Telah Dibayar</option>
																			<option value="unpaid">Belum Dibayar</option>
																		</select>
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																		<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin akan validasi pembayaran ini?')">
																	</div>
																</form>
															</div>
														</div>
													</div>
													<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
								<div class="table-responsive">
									<table id="myTable4" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($data_inspeksi as $ins) {
												if($ins->foto_bukti_trf != "" && $ins->status_pembayaran == 'paid'){
													$i++;
													$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
													?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan;?></td>
														<td class="text-center"><?php echo $ins->nama_alat;?></td>
														<td class="text-center"><?php echo $ins->nama_kapal;?></td>
														<?php 
														if($ins->no_spk != ""){
															?>
															<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
															<td class="text-center">-</td>
															<?php
														}else{
															?>
															<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterbitkan</span></span></td>
															<td class="text-center">
																<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#penerbitan-<?php echo $ins->id_inspeksi?>"><i class="la la-pencil"></i>Penerbitan</i>
																</a>
															</td>
															<?php
														}
														?>
													</tr>

													<div class="modal" id="penerbitan-<?php echo $ins->id_inspeksi;?>">
														<div class="modal-dialog modal-md">
															<div class="modal-content">
																<div class="modal-header">
																	<h4 class="modal-title">Penerbitan</h4>
																	<button type="button" class="close" data-dismiss="modal">&times;</button>
																</div>
																<form action="<?php echo site_url('penerbitan_ins'); ?>" method="post">
																	<div class="modal-body">
																		<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
																		<label for="keterangan" class="label">Tanggal Terbit  : </label>
																		<input type="date" name="tgl_terbit" value="" class="form-control" required="required">
																		<label for="keterangan" class="label">Tanggal Expired  : </label>
																		<input type="date" name="tgl_expired" value="" class="form-control" required="required">
																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																		<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin akan menerbitkan perizinan ini?')">
																	</div>
																</form>
															</div>
														</div>
													</div>
													<?php
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
