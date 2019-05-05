<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengguna Aplikasi</h2>
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
				<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"></span></button>
				<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
				<?= $data; ?>
			</div>
			<?php
			}

			$data2 = $this->session->flashdata('error');
			if ($data2 != '') {
				?>
			<div class="alert alert-danger">
				<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true"></span></button>
				<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
				<?= $data2; ?>
			</div>
			<?php
			}
			?>
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="widget-body">
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab"
									aria-controls="tab-1" aria-selected="true">Pegawai</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab"
									aria-controls="tab-2" aria-selected="false">User</a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel"
								aria-labelledby="base-tab-1">
								<div class="text-right">
									<a href="#" data-toggle="modal" data-target="#tambahpegawai"
										class="btn btn-md btn-primary"><i class="la la-plus"></i> Tambah</a>
									<!-- 	<input type="button" data-toggle="modal" data-target="#tambahpegawai" name="tambah" value="Tambah" class="btn btn-md btn-info"> -->
								</div> <br>
								<!-- <?php echo print_r($data_pengguna)?> -->
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
											<?php
											$no=0;
											foreach ($data_pengguna as $pengguna) {
												if($pengguna->id_jabatan <= 4 || $pengguna->id_jabatan == 10){
													$no++;
													?>
											<tr>
												<td class="text-center"><?php echo $no;?></td>
												<td><?php echo $pengguna->nama_pengguna?></td>
												<td><?php echo $pengguna->email_pengguna?></td>
												<td><?php echo $pengguna->nama_jabatan?></td>
												<td class="text-center">
													<?php
															if($pengguna->status_akun == 'aktif'){
																?>
													<span style="width:100px;"><span
															class="badge-text badge-text-small success"><?php echo $pengguna->status_akun?></span></span>
													<?php
															}else{
																?>
													<span style="width:100px;"><span
															class="badge-text badge-text-small danger"><?php echo $pengguna->status_akun?></span></span>
													<?php
															}
															?>
												</td>
												<td class="text-center">
													<a href="#" data-toggle="modal"
														data-target="#edit-<?php echo $pengguna->id_pengguna?>"
														class="btn btn-success btn-sm" title="Ubah"><i
															class="la la-pencil"></i></i></a>
													<!-- <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="la la-trash"></i></i></a> -->
													<?php
															if($pengguna->status_akun == 'non-aktif' || $pengguna->status_email == 'non-aktif'){
																?>
													<a href="<?php echo site_url('aktif_admin/'.$pengguna->id_pengguna)?>"
														class="btn btn-info btn-sm" title="aktif"><i
															class="la la-check"></i></i></a>
													<?php
															}elseif ($pengguna->status_akun == 'aktif') {
																?>
													<a href="<?php echo site_url('non_aktif_admin/'.$pengguna->id_pengguna)?>"
														class="btn btn-danger btn-sm" title="non-aktif"><i
															class="la la-power-off"></i></i></a>
													<?php
															}
															?>
												</td>
											</tr>

											<div id="edit-<?php echo $pengguna->id_pengguna?>" class="modal fade">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">Edit Pegawai</h4>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">×</span>
																<span class="sr-only">close</span>
															</button>
														</div>
														<form action="<?php echo site_url('edit_pengguna')?>"
															method="POST" enctype="multipart/form-data">
															<div class="modal-body">
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Nama
																			pengguna<span
																				class="text-danger ml-2">*</span></label>
																		<input type="text"
																			value="<?php echo $pengguna->nama_pengguna?>"
																			class="form-control"
																			name="nama_pengguna" required>
																		<input type="hidden"
																			value="<?php echo $pengguna->id_pengguna?>"
																			class="form-control"
																			name="id_pengguna" required>
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Alamat
																			email<span
																				class="text-danger ml-2">*</span></label>
																		<input type="email"
																			value="<?php echo $pengguna->email_pengguna?>"
																			class="form-control" name="email_pengguna" required>
																	</div>
																</div>
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Jabatan<span
																				class="text-danger ml-2">*</span></label>
																		<select class="form-control" name="id_jabatan" required="required"
																			title="pilih jenis user">
																			<?php
																					foreach ($jabatan as $jab) {
																						if ($jab->id_jabatan <= 4 || $jab->id_jabatan == 10) {
																							if($jab->id_jabatan == $pengguna->id_jabatan){
																								?>
																			<option selected=""
																				value="<?php echo $jab->id_jabatan; ?>">
																				<?php echo $jab->nama_jabatan; ?>
																			</option>
																			<?php
																							}else{
																								?>
																			<option
																				value="<?php echo $jab->id_jabatan; ?>">
																				<?php echo $jab->nama_jabatan; ?>
																			</option>
																			<?php
																							}
																						}
																					}
																					?>
																		</select>
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Nomor
																			Handphone<span
																				class="text-danger ml-2">*</span></label>
																		<input type="number"
																			value="<?php echo $pengguna->no_hp?>"
																			class="form-control" name="no_hp"
																			required>
																	</div>
																</div>
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Password<span
																				class="text-danger ml-2">*</span></label>
																		<input type="password" value=""
																			class="form-control"
																			name="password">
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Konfirmasi
																			password<span
																				class="text-danger ml-2">*</span></label>
																		<input type="password" value="" class="form-control" name="confirm_password">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-shadow"
																	data-dismiss="modal">Close</button>
																<input type="submit" name="submit"
																	class="btn btn-primary" value="Save"
																	onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php
												}
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
								<div class="table-responsive">
									<table id="myTable2" class="table mb-0">
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
											<?php
											$i=0;
											foreach ($data_pengguna as $pengguna) {
												if($pengguna->id_jabatan > 4 && $pengguna->id_jabatan < 10){
													$i++;
													?>
											<tr>
												<td class="text-center"><?php echo $i;?></td>
												<td><?php echo $pengguna->nama_pengguna?></td>
												<td><?php echo $pengguna->email_pengguna?></td>
												<td><?php echo $pengguna->nama_jabatan?></td>
												<td class="text-center">
													<?php
															if($pengguna->status_akun == 'aktif'){
																?>
													<span style="width:100px;"><span
															class="badge-text badge-text-small success"><?php echo $pengguna->status_akun?></span></span>
													<?php
															}else{
																?>
													<span style="width:100px;"><span
															class="badge-text badge-text-small danger"><?php echo $pengguna->status_akun?></span></span>
													<?php
															}
															?>
												</td>
												<td class="text-center">
													<a href="#" data-toggle="modal"
														data-target="#edit-<?php echo $pengguna->id_pengguna?>"
														class="btn btn-success btn-sm" title="Ubah"><i
															class="la la-pencil"></i></i></a>
													<!-- <a href="#" class="btn btn-danger btn-sm" title="Hapus"><i class="la la-trash"></i></i></a> -->
													<?php
															if($pengguna->status_akun == 'non-aktif' || $pengguna->status_email == 'non-aktif'){
																?>
													<a href="<?php echo site_url('aktif_admin/'.$pengguna->id_pengguna)?>"
														class="btn btn-info btn-sm" title="aktif"><i
															class="la la-check"></i></i></a>
													<?php
															}elseif ($pengguna->status_akun == 'aktif') {
																?>
													<a href="<?php echo site_url('non_aktif_admin/'.$pengguna->id_pengguna)?>"
														class="btn btn-danger btn-sm" title="non-aktif"><i
															class="la la-power-off"></i></i></a>
													<?php
															}
															?>
												</td>
											</tr>

											<div id="edit-<?php echo $pengguna->id_pengguna?>" class="modal fade">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title">Edit Pegawai</h4>
															<button type="button" class="close" data-dismiss="modal">
																<span aria-hidden="true">×</span>
																<span class="sr-only">close</span>
															</button>
														</div>
														<form action="<?php echo site_url('edit_pengguna')?>"
															method="POST" enctype="multipart/form-data">
															<div class="modal-body">
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Nama
																			pengguna<span
																				class="text-danger ml-2">*</span></label>
																		<input type="text"
																			value="<?php echo $pengguna->nama_pengguna?>"
																			class="form-control"
																			name="nama_pengguna" required>
																		<input type="hidden"
																			value="<?php echo $pengguna->id_pengguna?>"
																			class="form-control"
																			name="id_pengguna" required>
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Alamat
																			email<span
																				class="text-danger ml-2">*</span></label>
																		<input type="email"
																			value="<?php echo $pengguna->email_pengguna?>"
																			class="form-control"
																			name="email_pengguna" required>
																	</div>
																</div>
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Jabatan<span
																				class="text-danger ml-2">*</span></label>
																		<select class="form-control"
																			name="id_jabatan" required="required"
																			title="pilih jenis user">
																			<?php
																					foreach ($jabatan as $jab) {
																						if ($jab->id_jabatan > 4) {
																							if($jab->id_jabatan == $pengguna->id_jabatan){
																								?>
																			<option selected=""
																				value="<?php echo $jab->id_jabatan; ?>">
																				<?php echo $jab->nama_jabatan; ?>
																			</option>
																			<?php
																							}else{
																								?>
																			<option
																				value="<?php echo $jab->id_jabatan; ?>">
																				<?php echo $jab->nama_jabatan; ?>
																			</option>
																			<?php
																							}
																						}
																					}
																					?>
																		</select>
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Nomor
																			Handphone<span
																				class="text-danger ml-2">*</span></label>
																		<input type="number"
																			value="<?php echo $pengguna->no_hp?>"
																			class="form-control" name="no_hp"
																			required>
																	</div>
																</div>
																<div class="form-group row mb-3">
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Password<span
																				class="text-danger ml-2">*</span></label>
																		<input type="password" value=""
																			class="form-control"
																			name="password">
																	</div>
																	<div class="col-xl-6 mb-3">
																		<label class="form-control-label">Konfirmasi
																			password<span
																				class="text-danger ml-2">*</span></label>
																		<input type="password" value=""
																			class="form-control"
																			name="confirm_password">
																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-shadow"
																	data-dismiss="modal">Close</button>
																<input type="submit" name="submit"
																	class="btn btn-primary" value="Save"
																	onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php
												}
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



<div id="tambahpegawai" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pegawai</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<form action="<?php echo site_url('daftar_admin')?>" method="POST">
				<div class="modal-body">
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Nama pengguna<span
									class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_pengguna" name="nama_pengguna"
								required>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Alamat email<span
									class="text-danger ml-2">*</span></label>
							<input type="email" value="" class="form-control" id="email_pengguna" name="email_pengguna"
								required>
						</div>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Jabatan<span class="text-danger ml-2">*</span></label>
							<select class="form-control" id="id_jabatan" name="id_jabatan" required="required"
								title="pilih jenis user">
								<?php
								foreach ($jabatan as $jab) {
									if ($jab->id_jabatan <= 4 || $jab->id_jabatan == 10) {
										?>
								<option value="<?php echo $jab->id_jabatan; ?>">
									<?php echo $jab->nama_jabatan; ?>
								</option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Nomor Handphone<span
									class="text-danger ml-2">*</span></label>
							<input type="number" value="" class="form-control" id="no_hp" name="no_hp" required>
						</div>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Password<span class="text-danger ml-2">*</span></label>
							<input type="password" value="" class="form-control" id="password" name="password" required>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Konfirmasi password<span
									class="text-danger ml-2">*</span></label>
							<input type="password" value="" class="form-control" id="confirm_password"
								name="confirm_password" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-shadow" data-dismiss="modal">Batal</button>
					<input type="submit" name="submit" class="btn btn-success" value="Simpan"
						onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
				</div>
			</form>
		</div>
	</div>
</div>
</div>