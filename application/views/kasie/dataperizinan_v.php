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
						<div class="widget-body sliding-tabs">
							<ul class="nav nav-tabs" id="example-one" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Verifikasi</a>
								</li>
								<!-- <li class="nav-item">
									<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Kode Billing</a>
								</li> -->
								<!-- <li class="nav-item">
									<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Validasi Pembayaran</a>
								</li> -->
								<li class="nav-item">
									<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Penerbitan</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
									<div class="table-responsive">
										<table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
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
												$id_pengguna = $this->session->userdata('id_pengguna');
												foreach ($perizinan as $per){
													$own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
													$progress_tu = $this->GeneralM->get_array_progress_setuju($per->id_perizinan)->num_rows();
													if($progress_tu > 0){
														if($own_progress == 0){
															$i++;
															?>
															<tr>
																<td class="text-center"><?php echo $i;?></td>
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
													?>
													<?php
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
												foreach ($perizinan as $per) {
													$id_pengguna = $this->session->userdata('id_pengguna');
													if($per->status_pembayaran == 'paid'){
														$i++;
														?>
														<tr>
															<td class="text-center"><?php echo $i;?></td>
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
															<td class="text-center">
																<span style="width:100px;" title="Sudah input billing"><span class="badge-text badge-text-small success"> Aktif</span></span>
															</td>
															<td class="text-center">
																<?php echo date_indo($tgl_terbit).' sampai '.date_indo($tgl_expired);?>
															</td>
														</tr>
														<?php
													}
													?>
													<?php
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
				<!-- End Sorting -->
			</div>
		</div>
		<!-- End Row -->
	</div>
