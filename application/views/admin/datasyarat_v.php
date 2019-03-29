<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Syarat</h2>
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
								<a href="#" data-toggle="modal" data-target="#tambah_berkas" class="btn btn-md btn-primary"><i class="la la-plus"></i> Tambah</a>
							</div> <br>
							<div class="table-responsive">
								<table id="myTable" class="table mb-0">
									<thead>
										<tr>
											<th class="text-center">No</th>
											<th class="text-center">Nama Persyaratan</th>
											<th class="text-center">Ketentuan</th>
											<th class="text-center">Jenis Pengajuan</th>
											<th class="text-center">Status</th>
											<th class="text-center" style="width: 120px;">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$j=1;
										foreach ($berkas as $ber) {
											?>
											<tr>
												<td><?php echo $j;?></td>
												<td><?php echo $ber->nama_berkas;?></td>
												<td><?php echo $ber->syarat_berkas;?></td>
												<td class="text-center"><?php echo $ber->jenis;?></td>
												<td class="text-center">
													<?php
													if($ber->status == 'tampil'){
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small success" ><?php echo $ber->status?></span></span>
														<?php
													}else{
														?>
														<span style="width:100px;"><span class="badge-text badge-text-small danger" ><?php echo $ber->status?></span></span>
														<?php
													}
													?>
												</td>
												<td class="text-center">
													<a href="#" data-toggle="modal" data-target="#edit_berkas-<?php echo $ber->id_berkas_perizinan?>" class="btn btn-success btn-sm" title="edit"><i class="la la-pencil"></i></i></a>
													<?php
													if($ber->status == 'tidak'){
														?>
														<a href="<?php echo site_url('aktif_berkas/'.$ber->id_berkas_perizinan)?>" class="btn btn-info btn-sm" title="Tampilkan"><i class="la la-check"></i></i></a>
														<?php
													}elseif ($ber->status == 'tampil') {
														?>
														<a href="<?php echo site_url('non_aktif_berkas/'.$ber->id_berkas_perizinan)?>" class="btn btn-danger btn-sm" title="Sembunyikan"><i class="la la-power-off"></i></i></a>
														<?php
													}
													?>
												</td>
											</tr>

											<div id="edit_berkas-<?php echo $ber->id_berkas_perizinan?>" class="modal fade">
												<div class="modal-dialog modal-md">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">Edit syarat</h4>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">×</span>
																<span class="sr-only">close</span>
															</button>
														</div>
														<form action="<?php echo site_url('post_edit_berkas')?>" method="POST">
															<div class="modal-body">
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Nama Persyaratan<span class="text-danger ml-2">*</span></label>
																	<input type="text" value="<?php echo $ber->nama_berkas?>" class="form-control" id="nama_berkas" name="nama_berkas" required>
																	<input type="hidden" value="<?php echo $ber->id_berkas_perizinan?>" class="form-control" id="id_berkas_perizinan" name="id_berkas_perizinan" required>
																</div>
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Ketentuan<span class="text-danger ml-2">*</span></label>
																	<textarea class="form-control" id="syarat_berkas" name="syarat_berkas" required><?php echo $ber->syarat_berkas?></textarea>
																</div>
																<div class="col-xl-12 mb-3">
																	<label class="form-control-label">Jenis Pengajuan<span class="text-danger ml-2">*</span></label>
																	<select class="form-control" name="jenis" id="jenis">
																		<?php
																		if($ber->jenis == 'baru'){
																			?>
																			<option selected="" value="baru">Pengajuan Baru</option>
																			<option value="perpanjang">Pengajuan Perpanjang</option>
																			<?php
																		}else{
																			?>
																			<option value="baru">Pengajuan Baru</option>
																			<option selected="" value="perpanjang">Pengajuan Perpanjang</option>
																			<?php
																		}
																		?>
																	</select>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-shadow" data-dismiss="modal">Batal</button>
																<input type="submit" name="submit" class="btn btn-success" value="Simpan" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php
											$j++;
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

<div id="tambah_berkas" class="modal fade">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah syarat</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<form action="<?php echo site_url('post_berkas')?>" method="POST">
				<div class="modal-body">
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Nama Persyaratan<span class="text-danger ml-2">*</span></label>
						<input type="text" value="" class="form-control" id="nama_berkas" name="nama_berkas" required>
					</div>
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Ketentuan<span class="text-danger ml-2">*</span></label>
						<textarea class="form-control" id="syarat_berkas" name="syarat_berkas" required></textarea>
					</div>
					<div class="col-xl-12 mb-3">
						<label class="form-control-label">Jenis Pengajuan<span class="text-danger ml-2">*</span></label>
						<select class="form-control" name="jenis" id="jenis">
							<option value="baru">Pengajuan Baru</option>
							<option value="perpanjang">Pengajuan Perpanjang</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-shadow" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" class="btn btn-success" value="Simpan" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
				</div>
			</form>
		</div>
	</div>
</div>