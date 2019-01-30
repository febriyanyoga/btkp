<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengesahan</h2>
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
						<div class="widget-body sliding-tabs" id="tabsss">
							<?php
							$data = $this->session->flashdata('sukses');
							if ($data != '') {
								?>
								<div class="alert alert-success">
									<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
									<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
									<?= $data; ?>
								</div>
								<?php
							}

							$data2 = $this->session->flashdata('error');
							if ($data2 != '') {
								?>
								<div class="alert alert-danger">
									<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
									<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
									<?= $data2; ?>
								</div>
								<?php
							}
							?>
							<ul class="nav nav-tabs" id="example-one" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Pengesahan Perizinan <span id="pengesahan_perizinan"></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Pengesahan Pengujian<span id="pengesahan_pengujian"></span></a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Pengesahan Reinspeksi<span id="pengesahan_Reinspeksi"></span></a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
									<div class="table-responsive">
										<table id="myTable1" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No. Permohonan</th>
													<th class="text-center">Jenis Izin</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Alat SPK</th>
													<th class="text-center">Tanggal Permohonan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$pengesahan_perizinan=0;
												foreach ($perizinan as $per) {
													if($per->status_pembayaran == 'paid'){
														?>
														<tr>
															<td class="text-center"><span class="text-primary"><?php echo 'SPK'.$per->id_perizinan.$per->kode_alat;?></span>
															</td>
															<td class="text-center"><?php echo $per->nama_jenis_izin?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan?></td>
															<td class="text-center"><?php echo $per->nama_alat?></td>
															<?php
															$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin));
															?>
															<td class="text-center"><?php echo $tgl_pengajuan?></td>
															<td>status</td>
															<td class="text-center">
																<a href="" class="btn btn-sm btn-info mr-1 mb-2"><i class="la la-check"></i>Pengesahan</i>
																</a>
															</td>
														</tr>
														<?php
														$pengesahan_perizinan+=1;
													}
												}
												?>
												<input type="hidden" name="pengesahan_perizinan" id="pengesahan_perizinan_bawah" value="<?php echo $pengesahan_perizinan?>">
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
									<div class="table-responsive">
										<table id="myTable2" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No. Permohonan</th>
													<th class="text-center">Tgl Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Instansi</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$pengesahan_pengujian=0;
												foreach ($pengujian as $ujian) {
													if($ujian->status_pembayaran_2 == 'paid'){
														?>
														<tr>
															<td class="text-center"><span class="text-primary"><?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat;?></span>
															</td>
															<?php
															$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
															?>
															<td class="text-center"><?php echo $tgl_pengajuan?></td>
															<td class="text-center"><?php echo $ujian->nama_alat?></td>
															<td class="text-center"><?php echo $ujian->merk?></td>
															<td class="text-center"><?php echo $ujian->tipe?></td>
															<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
															<td>status</td>
															<td class="text-center">
																<a href="" class="btn btn-sm btn-info mr-1 mb-2"><i class="la la-check"></i>Pengesahan</i>
																</a>
															</td>
														</tr>
														<?php
														$pengesahan_pengujian+=1;
													}
												}
												?>
												<input type="hidden" name="pengesahan_pengujian" id="pengesahan_pengujian_bawah" value="<?php echo $pengesahan_pengujian?>">
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
									<div class="table-responsive">
										<table id="myTable3" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No. Permohonan</th>
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
												$pengesahan_reinspeksi=0;
												foreach ($data_reinspeksi as $ins) {
													if($ujian->status_pembayaran == 'paid'){
														?>
														<tr>
															<td class="text-center"><span class="text-primary"><?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat;?></span>
															</td>
															<?php
															$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
															?>
															<td class="text-center"><?php echo $tgl_pengajuan?></td>
															<td class="text-center"><?php echo $ujian->nama_alat?></td>
															<td class="text-center"><?php echo $ujian->merk?></td>
															<td class="text-center"><?php echo $ujian->tipe?></td>
															<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
															<td>status</td>
															<td class="text-center">
																<a href="" class="btn btn-sm btn-info mr-1 mb-2"><i class="la la-check"></i>Pengesahan</i>
																</a>
															</td>
														</tr>
														<?php
														$pengesahan_reinspeksi+=1;
													}
												}
												?>
												<input type="hidden" name="pengesahan_reinspeksi" id="pengesahan_reinspeksi_bawah" value="<?php echo $pengesahan_reinspeksi?>">
											</tbody>
										</table>
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