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
				<!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
				<!-- <input type="button" name="tambah" value="Tambah" class="btn btn-md btn-info"> -->
				<!-- <h4>Sorting</h4> -->
				<!-- </div> -->
				<div class="widget-body">
					<div class="widget-body">
						<!-- <ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								 aria-selected="true">Tatausaha</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								 aria-selected="false">Kasie RB</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
								 aria-selected="false">Kepala</a>
							</li>
						</ul> -->
						<div class="tab-content pt-3">

								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Nama</th>
												<th class="text-center">Email</th>
												<th class="text-center">Hak Akses</th>
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
													<a href="<?php echo site_url('verifikasi'); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Edit</i>
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
			<!-- End Sorting -->
		</div>
	</div>
	<!-- End Row -->
</div>