<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Perizinan</h2>
			</div>
		</div>
	</div>
	<!-- End Page Header -->
	<div class="row">
		<div class="col-xl-12">
			<!-- Sorting -->
			<div class="widget has-shadow">
				<!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
					<!-- <input type="button" name="tambah" value="Tambah" class="btn btn-md btn-info"> -->
					<!-- <h4>Sorting</h4> -->
					<!-- </div> -->
					<div class="widget-body">
						<div class="widget-body sliding-tabs"><?php
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
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Verifikasi <span id="verifikasi_izin_kasie"></span></a>
							</li>
								<!-- <li class="nav-item">
									<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Kode Billing</a>
								</li> -->
								<!-- <li class="nav-item">
									<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Validasi Pembayaran</a>
								</li> -->
								<li class="nav-item">
									<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Data SPK <span id="data_spk_izin_kasie"></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Perizinan Ditolak <span id="izin_ditolak_kasie"></span></a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
									<div class="table-responsive">
										<table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No. Permohonan</th>
													<th class="text-center">Jenis Izin</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Alat SPK</th>
													<th class="text-center">Tanggal Permohonan</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												$verifikasi_izin_kasie=0;
												$id_pengguna = $this->session->userdata('id_pengguna');
												foreach ($perizinan as $per){
													$own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();

													$progress_tu = $this->GeneralM->get_array_progress_setuju($per->id_perizinan)->num_rows();
													$progress_kasie = $this->GeneralM->get_progress_kasie($per->id_perizinan)->num_rows();
													if($progress_tu > 0){
														if($progress_kasie == 0){
															if($per->file_hasil_survey != ""){
																$i++;
																$verifikasi_izin_kasie+=1;
																?>
																<tr>
																	<td class="text-center"><span class="text-primary">
																		<?php echo $per->id_perizinan.'/'.date('Ymd', strtotime($per->created_at_izin)); ?></span>
																	</td>
																	<td class="text-center"><?php echo $per->nama_jenis_izin?></td>
																	<td class="text-center"><?php echo $per->nama_perusahaan;?></td>
																	<td class="text-center"><?php echo $per->nama_alat?></td>
																	<?php
																	// $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin));
																	$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin));
																	?>
																	<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>

																	<td class="text-center">
																		<a href="<?php echo site_url('verifikasi_kasie/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																		</a>
																	</td>
																</tr>
																<?php
															}
														}
													}
												}
												?>
												<input type="hidden" name="verifikasi_izin_kasie_bawah" id="verifikasi_izin_kasie_bawah" value="<?php echo $verifikasi_izin_kasie?>">
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
									<div class="table-responsive">
										<table id="myTable4" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No. Permohonan</th>
													<th class="text-center">No. Sertifikat</th>
													<th class="text-center">Jenis Izin</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Alat SPK</th>
													<th class="text-center">Tanggal Permohonan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Masa Aktif</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=0;
												$data_spk_izin_kasie=0;
												foreach ($perizinan as $per) {
													$id_pengguna = $this->session->userdata('id_pengguna');
													if($per->status_pembayaran == 'paid'){
														$i++;
														$data_spk_izin_kasie+=1;
														?>
														<tr>
															<td class="text-center"><span class="text-primary">
																<?php echo $per->id_perizinan.'/'.date('Ymd', strtotime($per->created_at_izin)); ?></span>
															</td>
															<td class="text-center"><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan;?></td>
															<td class="text-center"><?php echo $per->nama_alat?></td>
															<?php
															// $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin));
															$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin));
															$tgl_terbit 	= date('Y-m-d', strtotime($per->tgl_terbit));
															$tgl_expired 	= date('Y-m-d', strtotime($per->tgl_expired));
															?>
															<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
															<?php
															$tgl_expired 	= date('Y-m-d', strtotime($per->tgl_expired));
															$sekarang 		= date('Y-m-d');
															if($sekarang <= $tgl_expired){
																?>
																<td class="text-center">
																	<span style="width:100px;" title="perizinan aktif"><span class="badge-text badge-text-small success"> Aktif</span></span>
																</td>
																<?php
															}else{
																?>
																<td class="text-center">
																	<span style="width:100px;" title="perizinan tidak aktif"><span class="badge-text badge-text-small danger">Tidak Aktif</span></span>
																</td>
																<?php
															}
															?>
															<td class="text-center">
																<?php echo date_indo($tgl_terbit).' <br><b>sampai</b><br> '.date_indo($tgl_expired);?>
															</td>
														</tr>
														<?php
													}
												}
												?>
												<input type="hidden" name="data_spk_izin_kasie_bawah" id="data_spk_izin_kasie_bawah" value="<?php echo $data_spk_izin_kasie;?>">
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade show" id="tab-5" role="tabpanel" aria-labelledby="base-tab-5">
									<div class="table-responsive">
										<table id="myTable5" class="table mb-0">
											<thead>
												<tr class="text-center">
													<th>No. Permohonan</th>
													<th>Nama Alat</th>
													<th>Tanggal Permohonan</th>
													<th><span style="width:100px;">Status</span></th>
													<th><span style="width:100px;">Keterangan</span></th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=1;
												$izin_ditolak_kasie=0;
												foreach ($izin_tolak as $tolak) {
													$izin = date('Y-m-d', strtotime($tolak->created_at_izin));
													$nama_alat = $this->WorkshopM->get_perizinan_by_id_perizinan($tolak->id_perizinan)->row()->nama_alat;
													?>
													<tr>
														<td class="text-center"><span class="text-primary">
															<?php echo $tolak->id_perizinan.'/'.date('Ymd', strtotime($tolak->created_at_izin)); ?></span>
														</td>
														<td class="text-center"><?php echo $nama_alat?></td>
														<td class="text-center"><?php echo date_indo($izin)?></td>
														<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small danger"><?php echo $tolak->status?></span></span></td>
														<td style="text-align: justify-all;"><?php echo $tolak->keterangan?></td>
													</tr>
													<?php
													$i++;
													$izin_ditolak_kasie+=1;
												}
												?>
												<input type="hidden" name="izin_ditolak_kasie_bawah" id="izin_ditolak_kasie_bawah" value="<?php echo $izin_ditolak_kasie;?>">
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