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
					<div class="table-responsive">
						<table id="myTable" class="table mb-0">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Jenis Izin</th>
									<th class="text-center">Perusahaan</th>
									<th class="text-center">Alat SPK</th>
									<th class="text-center">Tanggal Permohonan</th>
									<th class="text-center">Status</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">1</td>
									<td class="text-center">Baru</td>
									<td class="text-center">PT. ABC</td>
									<td class="text-center">ILR</td>
									<td class="text-center">10 Oktober 2018 </td>
									<td class="text-center">Belum Diverifikasi</td>
									<td class="text-center">
										<a href="<?php echo site_url('admintu/verifikasi'); ?>">
											<button type="button" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</button>
											</i>
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
