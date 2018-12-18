<div class="container-fluid">
	<div class="col-xl-12">
		<!-- Tabs Dropdown -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4>Data Re-Inspeksi</h4>
			</div>
			<div class="widget-body sliding-tabs">
				<ul class="nav nav-tabs" id="example-one" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
						 aria-selected="true">Permohonan Inspeksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
						 aria-selected="false">Hasil Inspeksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
						 aria-selected="false">Master Data Inspeksi</a>
					</li>
				</ul>
				<div class="tab-content pt-3">
					<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">


						<div class="widget-body">
							<p class="text-right">
								<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#tambahinspeksi"><i class="la la-pencil"></i>Tambah
									Permohonan</i>
								</a> <br>
							</p>

							<div class="table-responsive">
								<table id="myTable" class="table mb-0">
									<thead>
										<tr>
											<th>No.</th>
											<th class="text-center">Kapal</th>
											<th class="text-center">Flag</th>
											<th class="text-center">Imo No</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Tempat</th>
											<th class="text-center">Status</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>1</td>
											<td class="text-center">PERTAMINA</td>
											<td class="text-center">Indonesia</td>
											<td class="text-center">13</td>
											<td class="text-center">10 Oktober 2018</td>
											<td class="text-center">Semarang</td>
											<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small danger">
														Verifikasi</span></span></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
						<div class="widget-body">
							<div class="table-responsive">
								<table id="myTable2" class="table mb-0">
									<thead>
										<tr>
											<th>No.</th>
											<th class="text-center">Kapal</th>
											<th class="text-center">Flag</th>
											<th class="text-center">Imo No</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Tempat</th>
											<th class="text-center">Status</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>1</td>
											<td class="text-center">PERTAMINA</td>
											<td class="text-center">Indonesia</td>
											<td class="text-center">13</td>
											<td class="text-center">10 Oktober 2018</td>
											<td class="text-center">Semarang</td>
											<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small danger">Belum
														Diproses</span></span></td>
											<td class="text-center">
												<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#proses"><i class="la la-pencil"></i>Proses</i>
												</a>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
						<div class="widget-body">
							<div class="table-responsive">
								<table id="myTable3" class="table mb-0">
									<thead>
										<tr>
											<th>No.</th>
											<th>No.Sertifikat</th>
											<th class="text-center">Kapal</th>
											<th class="text-center">Jenis Alat</th>
											<th class="text-center">Tanggal</th>
											<th class="text-center">Hasil</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>1</td>
											<td>189-01-RU</td>
											<td class="text-center">PERTAMINA</td>
											<td class="text-center">Life Boat</td>
											<td class="text-center">13 November 2011</td>
											<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Remark</span></span></td>
											<td class="text-center">
												<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#lihat"><i class="la la-eye"></i>Lihat</i>
												</a>
												<a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#cetak"><i class="la la-print"></i>Cetak</i>
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
<div id="proses" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Proses Re-Inspeksi</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="exampleFormControlSelect1">Hasil</label>
						<select class="form-control" id="jenisalat">
							<option>Remark</option>
							<option>Condamm</option>
						</select>
					</div>
					<div class="form-group">
						<label for="upload"> Upload Dokumen Hasil Re-Inspeksi</label>
						<input type="file" name="hasil_survey" class="form-control" required="">
					</div>
					<div class="form-group">
						<label for="exampleFormControlTextarea1">Catatan</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
</div>
<div id="lihat" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hasil Re-Inspeksi</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="exampleFormControlInput1">Kapal</label>
						<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
					</div>

					<div class="form-group">
						<label for="exampleFormControlTextarea1">Catatan</label>
						<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
</div>
<div id="tambahinspeksi" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Permohonan Re-Inspeksi</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="section-title mt-5 mb-3">
						<h4 class="text-center">DATA KAPAL</h4>
						<hr>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Nama Kapal<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Flag<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
						</div>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Imo No<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
						</div>
						<div class="col-xl-6 mb-3">
							<!-- telepone akun -->
							<label class="form-control-label">Telepon<span class="text-danger ml-2">*</span></label>
							<input type="number" value="" class="form-control" id="no_tlp" name="no_tlp" required>
						</div>
					</div>
					<div class="section-title mt-5 mb-3">
						<h4 class="text-center">DATA ALAT</h4>
						<hr>
					</div>
					<div class="form-group row mb-3">
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Alat Keselamatan<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_jabatan" name="nama_jabatan" required>
						</div>
						<div class="col-xl-6 mb-3">
							<label class="form-control-label">Jumlah<span class="text-danger ml-2">*</span></label>
							<input type="text" value="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
</div>
