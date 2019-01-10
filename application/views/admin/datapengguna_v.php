<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pegawai</h2>
			</div>
		</div>
	</div>
	<!-- End Page Header -->
	<div class="row">
		<div class="col-xl-12">
			<!-- Sorting -->
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="widget-body">
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								 aria-selected="true">Pegawai</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								 aria-selected="false">User</a>
							</li>
						</ul>
						<div class="tab-content pt-3">
						<div class="text-right">
						<input type="button" data-toggle="modal" data-target="#tambahpegawai" name="tambah" value="Tambah" class="btn btn-md btn-info">
						</div> <br>
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Email</th>
												<th class="text-center">Jabatan</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center">1</td>
												<td class="text-center">Erika</td>
												<td class="text-center">erika@gmail.com</td>
												<td class="text-center">Admin TU</td>
												<td class="text-center">aktif</td>
												<td class="text-center">
													<a href="" class="btn btn-success mr-1 mb-2"><i class="la la-pencil"></i>Edit</i>
													<a href="" class="btn btn-danger mr-1 mb-2"><i class="la la-pencil"></i>Hapus</i>
													</a>
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
	</div>
</div>

