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
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_workshop; ?></div>
							<div class="total-visitors">Jumlah User</div>
							<a href="<?php echo site_url('tatausaha'); ?>">
								<a href="" data-toggle="modal" data-target="#detail_user" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_perizinan; ?></div>
							<div class="total-visitors">Jumlah Perizinan</div>
							<a href="#">
								<a href="<?php echo site_url('laporan_perizinan')?>" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_kapal?></div>
							<div class="total-visitors">Jumlah Kapal</div>
							<a href="<?php echo site_url('tatausaha'); ?>">
								<a href="" data-toggle="modal" data-target="#detail_kapal" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_pengujian;?></div>
							<div class="total-visitors">Jumlah Pengujian</div>
							<a href="#">
								<a href="<?php echo site_url('laporan_sertifikasi')?>" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_produk; ?></div>
							<div class="total-visitors">Jumlah Product</div>
							<a href="<?php echo site_url('tatausaha'); ?>">
								<a href="" data-toggle="modal" data-target="#detail_produk" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
			<div class="widget widget-17 has-shadow">
				<div class="widget-body">
					<div class="row">
						<div class="col-xl-12 d-flex flex-column justify-content-center align-items-center">
							<div class="counter"><?php echo $jumlah_inspeksi;?></div>
							<div class="total-visitors">Jumlah Inspeksi</div>
							<a href="#">
								<a href="<?php echo site_url('laporan_inspeksi')?>" class="btn btn-gradient-03 mr-1 mb-2">Detail</a>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- End Widget Body -->
</div>


<!-- modal detail user -->
<div class="modal" id="detail_user">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"><center>Detail User</center></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table id="myTable" class="table mb-0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama User</th>
								<th class="text-center">Jenis User</th>
							</tr>						
						</thead>
						<tbody>
							<?php
							$i=0;
							foreach ($user as $us) {
								$i++;
								?>
								<tr>
									<td class="text-center"><?php echo $i;?></td>
									<td><?php echo $us->nama_pengguna?></td>
									<td><?php echo $us->nama_jabatan?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal detail user -->

<!-- modal detail Kapal -->
<div class="modal" id="detail_kapal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"><center>Detail Kapal</center></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table id="myTable2" class="table mb-0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Kapal</th>
								<th class="text-center">IMO number</th>
								<th class="text-center">Negara</th>
							</tr>						
						</thead>
						<tbody>
							<?php
							$j=0;
							foreach ($kapal as $kap) {
								$j++;
								?>
								<tr>
									<td class="text-center"><?php echo $j;?></td>
									<td><?php echo $kap->nama_kapal?></td>
									<td><?php echo $kap->imo?></td>
									<td><?php echo $kap->flag?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal detail kapal -->

<!-- modal detail produk -->
<div class="modal" id="detail_produk">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-center"><center>Detail Produk</center></h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<div class="table-responsive">
					<table id="myTable3" class="table mb-0">
						<thead>
							<tr>
								<th class="text-center">No</th>
								<th class="text-center">Nama Kapal</th>
								<th class="text-center">Kode</th>
							</tr>						
						</thead>
						<tbody>
							<?php
							$k=0;
							foreach ($produk as $pro) {
								$k++;
								?>
								<tr>
									<td class="text-center"><?php echo $k;?></td>
									<td><?php echo $pro->nama_alat?></td>
									<td><?php echo $pro->kode_alat?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
<!-- end modal detail produk -->