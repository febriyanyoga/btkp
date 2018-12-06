<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-11">
			<div class="row">
				<div class="col-xl-12 widget-29">
					<div class="widget no-bg">
						<div class="widget-body pt-0">
							<div class="widget29 owl-carousel">
								<div class="item" data-toggle="modal" data-target="#perizinan">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/perizinan.jpg" alt="...">
								</div>
								<div class="item"><a href="<?php echo site_url('type_approval'); ?>">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/type.jpg" alt="..."></a>
								</div>
								<div class="item"><a href="<?php echo site_url('data_reinspeksi'); ?>">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/reinspeksi.jpg" alt="..."></a>
								</div>

								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/pemeriksaan.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/monitoring.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/penyewaan.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/pelatihan.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Row -->
			<!-- Begin Row -->
			<div class="row flex-row">
				<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="widget-30 widget-image bg-image">
						<div class="widget-body">
							<!-- Begin House Members -->
							<div class="row align-items-center">
								<div class="col-xl-12">
									<h2 class="text-center">Kalender</h2>
								</div>
							</div>
							<!-- End House Members -->
						</div>
						<div class="overlay"></div>
						<div class="content text-center">
							<div id="events-day"></div>
							<div id="events-date"></div>
							<div id="events-year"></div>
						</div>
						<div class="real-time text-center">
							<div id="events-time"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-8 col-lg-6 col-md-6 col-sm-6 col-12">
					<div class="widget widget-25 has-shadow">
						<!-- Begin Widget Header -->
						<div class="widget-header d-flex align-items-center">
							<h2>Permohonan SPK</h2>
						</div>
						<!-- End Widget Header -->
						<div class="widget-body">
							<div class="table-responsive">
								<table id="myTable" class="table mb-0">
									<thead>
										<tr>
											<th class="text-center">No. Permohonan</th>
											<th class="text-center">Jenis SPK</th>
											<th class="text-center">Tanggal Pengajuan</th>
											<th class="text-center">Status</th>
											<th class="text-center">Actions</th>
										</tr>
									</thead>
									<tbody>
										<?php
                                        foreach ($perizinan as $per) {
                                            ?>
											<tr>
												<td class="text-center"><span class="text-primary"><?php echo $per->id_perizinan; ?></span></td>
												<td class="text-left"><?php echo $per->nama_alat; ?></td>
												<?php
                                                $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin)); ?>
												<td class="text-center"><?php echo $tgl_pengajuan; ?></td>
												<td class="text-center" style="color:red;">
													<b>Proses</b>
												</td>

												<td class="text-center">
													<!-- <a href="#"><i class="ion-eye"></i></a> -->
												</td>
											</tr>
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
			<!-- End Row -->
		</div>
		<!-- End Col -->
	</div>
	<!-- End Row -->
</div>
<!-- End Container -->
<!-- Begin Living Room Modal -->
<div id="perizinan" class="modal fade">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content room-details">
			<div class="modal-header border-0">
				<h2 class="modal-title">PERIZINAN</h2>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xl-12">
						<div class="room-image">
							<a href="<?php echo site_url('izin_baru'); ?>"><img src="<?php echo base_url(); ?>assets/app/img/menu/perizinanbaru.jpg"
								class="img-fluid rounded" alt="..."></a>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xl-12">
							<div class="room-image">
								<a href="<?php echo site_url('izin_perpanjang'); ?>"><img src="<?php echo base_url(); ?>assets/app/img/menu/perpanjang.jpg"
									class="img-fluid rounded" alt="..."></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Living Room Modal -->

		<div id="bayartagihan" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Form cetak sertifikat</h4>
						<button type="button" class="close" data-dismiss="modal">
							<span aria-hidden="true">×</span>
							<span class="sr-only">close</span>
						</button>
					</div>
					<div class="modal-body">

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
