<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Dashboard</h2>
			</div>
		</div>
	</div>
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Begin Widget 07 -->
			<!-- Sorting -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h2>Permohonan Perizinan</h2>
				</div>
				<div class="widget-body">
					<div class="table-responsive">
						<table id="sorting-table" class="table mb-0">
							<thead>
								<tr>
									<th class="text-center">No</th>
									<th class="text-center">Jenis Izin</th>
									<th class="text-center">Perusahaan</th>
									<th class="text-center"> Jenis SPK</th>
									<th class="text-center">Tanggal Permohonan</th>
									<th class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>

								<tr>
									<td class="text-center">1</td>
									<td class="text-center">Baru</td>
									<td class="text-center">PT. ABC</td>
									<td class="text-center">Life Boat</td>
									<td class="text-center">11 November 2018</td>
									<td class="text-center">
										<a href="<?php echo site_url('admintu/verifikasi'); ?>">
											<button type="button" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</button>
											</i></a>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- End Sorting -->
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Begin Row -->
	<div class="row flex-row">
		<div class="col-xl-12 col-md-6">
			<!-- Begin Widget 09 -->
			<div class="widget widget-09 has-shadow">
				<!-- Begin Widget Header -->
				<div class="widget-header d-flex align-items-center">
					<h2>Delivered Orders</h2>
					<div class="widget-options">
						<button type="button" class="btn btn-shadow">View all</button>
					</div>
				</div>
				<!-- End Widget Header -->
				<!-- Begin Widget Body -->
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-10 col-12 no-padding">
							<div>
								<canvas id="orders"></canvas>
							</div>
						</div>
						<div class="col-xl-2 col-12 d-flex flex-column my-auto no-padding text-center">
							<div class="new-orders">
								<div class="title">New Orders</div>
								<div class="circle-orders">
									<div class="percent-orders"></div>
								</div>
							</div>
							<div class="some-stats mt-5">
								<div class="title">Total Delivered</div>
								<div class="number text-blue">856</div>
							</div>
							<div class="some-stats mt-3">
								<div class="title">Total Estimated</div>
								<div class="number text-blue">297</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Widget 09 -->
		</div>
	</div>
	<!-- End Row -->


	<!-- End Widget Body -->
</div>
<!-- End Widget 07 -->
</div>
</div>
</div>
<!-- End Container -->
