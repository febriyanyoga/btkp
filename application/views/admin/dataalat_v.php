<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Alat Keselamatan</h2>
			</div>
		</div>
	</div>
	<!-- End Page Header -->
	<div class="row">
		<div class="col-xl-12">
			<!-- Sorting -->
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
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="widget-body">
						<div class="tab-content pt-3">
							<div class="text-right">
								<a href="#" data-toggle="modal" data-target="#tambah_alat" class="btn btn-md btn-primary"><i class="la la-plus"></i> Tambah</a>
							</div> <br>
							<!-- <?php echo print_r($alat)?> -->
							<div class="table-responsive">
								<table id="myTable" class="table mb-0">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Nama Alat</th>
											<th class="text-center">Kode Alat</th>
											<th class="text-center">Keterangan</th>
											<th class="text-center">Status</th>
											<th class="text-center" style="width: 70px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i=0;
										foreach ($alat as $al) {
											$i++;
											?>
											<tr>
												<td class="text-center"><?php echo $i;?></td>
												<td><?php echo $al->nama_alat;?></td>
												<td><?php echo $al->kode_alat;?></td>
												<td><?php echo $al->keterangan;?></td>
												<td class="text-center">
													<?php
													if($al->status == 'aktif'){
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small success" ><?php echo $al->status?></span></span>
														<?php
													}else{
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small danger" ><?php echo $al->status?></span></span>
														<?php
													}
													?>
												</td>
												<td class="text-center">
													<a href="#" data-toggle="modal" data-target="#edit_alat-<?php echo $al->id_jenis_alat?>" class="btn btn-success btn-sm" title="edit"><i class="la la-pencil"></i></i></a>
													<?php
													if($al->status == 'non-aktif'){
														?>
														<a href="<?php echo site_url('aktif_alat/'.$al->id_jenis_alat)?>" class="btn btn-info btn-sm" title="aktif"><i class="la la-check"></i></i></a>
														<?php
													}elseif ($al->status == 'aktif') {
														?>
														<a href="<?php echo site_url('non_aktif_alat/'.$al->id_jenis_alat)?>" class="btn btn-danger btn-sm" title="non-aktif"><i class="la la-power-off"></i></i></a>
														<?php
													}
													?>
												</td>
											</tr>

											<div id="edit_alat-<?php echo $al->id_jenis_alat?>" class="modal fade">
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">Edit Alat Keselamatan</h4>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">×</span>
																<span class="sr-only">close</span>
															</button>
														</div>
														<form action="<?php echo site_url('edit_alat')?>" method="POST">
															<div class="modal-body">
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Nama Alat Keselamatan<span class="text-danger ml-2">*</span></label>
																	<input type="text" value="<?php echo $al->nama_alat?>" class="form-control" id="nama_alat" name="nama_alat" required>
																	<input type="hidden" value="<?php echo $al->id_jenis_alat?>" class="form-control" id="id_jenis_alat" name="id_jenis_alat" required>
																</div>
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Kode Alat Keselamatan<span class="text-danger ml-2">*</span></label>
																	<input type="text" value="<?php echo $al->kode_alat?>" class="form-control" id="kode_alat" name="kode_alat" required>
																</div>
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Keterangan<span class="text-danger ml-2">*</span></label>
																	<textarea class="form-control" id="keterangan" name="keterangan" required><?php echo $al->keterangan?></textarea>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
																<input type="submit" name="submit" class="btn btn-primary" value="Save" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
															</div>
														</form>
													</div>
												</div>
											</div>
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
	</div>
</div>

<div id="tambah_alat" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Alat Keselamatan</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<form action="<?php echo site_url('daftar_alat')?>" method="POST">
				<div class="modal-body">
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Nama Alat Keselamatan<span class="text-danger ml-2">*</span></label>
						<input type="text" value="" class="form-control" id="nama_alat" name="nama_alat" required>
					</div>
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Kode Alat Keselamatan<span class="text-danger ml-2">*</span></label>
						<input type="text" value="" class="form-control" id="kode_alat" name="kode_alat" required>
					</div>
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Keterangan<span class="text-danger ml-2">*</span></label>
						<textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" class="btn btn-primary" value="Save" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
				</div>
			</form>
		</div>
	</div>
</div>

