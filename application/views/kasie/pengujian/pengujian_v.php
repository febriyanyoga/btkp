<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
			</div>
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
												<th class="text-center">Perusahaan</th>
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
												<td class="text-center">
													<a href="<?php echo site_url('verifikasiakhir'); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
													</a>
												</td>
											</tr>
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
