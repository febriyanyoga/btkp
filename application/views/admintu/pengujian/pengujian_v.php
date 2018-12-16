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
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								aria-selected="true">Verifikasi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								aria-selected="false">Validasi Pembayaran 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
								aria-selected="false">Pengujian</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
								aria-selected="false">Pembayaran 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5"
								aria-selected="false">Validasi Pembayaran 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-6" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6"
								aria-selected="false">Penerbitan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-7" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6"
								aria-selected="false">Data Sertifikasi</a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Instansi</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($pengujian as $ujian) {
												if($ujian->status_pengajuan == 'selesai'){
													$i++;
													$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
													?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ujian->nama_alat?></td>
														<td class="text-center"><?php echo $ujian->merk?></td>
														<td class="text-center"><?php echo $ujian->tipe?></td>
														<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
														<td class="text-center">
															<a href="<?php echo site_url('verifikasiawal/'.$ujian->id_pengujian); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
															</a>
														</td>
													</tr>
													<?php
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
												<th class="text-center">Tanggal Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Perusahaan</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td class="text-center">1</td>
												<td class="text-center">21 November 2018</td>
												<td class="text-center">Life Jacket</td>
												<td class="text-center">Samsung</td>
												<td class="text-center">67A</td>
												<td class="text-center">PT. AAA</td>
												<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
												<td class="text-center">
													Note
													<!-- modal validasi podo karo pengujian
														nek oke langsung next neng kasie -->
														<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-pencil"></i>Validasi</i>
														</a>
													</td>
												</tr>
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
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center">1</td>
													<td class="text-center">21 November 2018</td>
													<td class="text-center">Life Jacket</td>
													<td class="text-center">Samsung</td>
													<td class="text-center">67A</td>
													<td class="text-center">PT. AAA</td>
													<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
													<td class="text-center">
														modal upload dokumen
														<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-plus"></i>Hasil Pengujian</i>
														</a>
													</td>
												</tr>
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
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td class="text-center">1</td>
													<td class="text-center">21 November 2018</td>
													<td class="text-center">Life Jacket</td>
													<td class="text-center">Samsung</td>
													<td class="text-center">67A</td>
													<td class="text-center">PT. AAA</td>
													<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
													<td class="text-center">
														input kode biling podo karo sg pengujian
														<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-plus"></i>Kode Billing</i>
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="base-tab-5">
									<div class="table-responsive">
										<table id="myTable5" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>

												<tr>
													<td class="text-center">1</td>
													<td class="text-center">21 November 2018</td>
													<td class="text-center">Life Jacket</td>
													<td class="text-center">Samsung</td>
													<td class="text-center">67A</td>
													<td class="text-center">PT. AAA</td>
													<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
													<td class="text-center">
														modal validasi podo karo pengujian
														<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-pencil"></i>Validasi</i>
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="base-tab-6">
									<div class="table-responsive">
										<table id="myTable6" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>

												<tr>
													<td class="text-center">1</td>
													<td class="text-center">21 November 2018</td>
													<td class="text-center">Life Jacket</td>
													<td class="text-center">Samsung</td>
													<td class="text-center">67A</td>
													<td class="text-center">PT. AAA</td>
													<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
													<td class="text-center">
														modal penerbitan podo karo pengujian
														ditambah 2 field = no.mulai , no. akhir
														<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-pencil"></i>Penerbitan</i>
														</a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="base-tab-7">
									<div class="table-responsive">
										<table id="myTable7" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
													<th class="text-center">Merk</th>
													<th class="text-center">Tipe</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Masa Berlaku</th>
												</tr>
											</thead>
											<tbody>

												<tr>
													<td class="text-center">1</td>
													<td class="text-center">21 November 2018</td>
													<td class="text-center">Life Jacket</td>
													<td class="text-center">Samsung</td>
													<td class="text-center">67A</td>
													<td class="text-center">PT. AAA</td>
													<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
													<td class="text-center">
														22 Desember 2018- 22 Desember 2019
													</td>
												</tr>
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
