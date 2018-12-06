<div class="container-fluid">
	<div class="col-xl-12">
		<!-- Tabs Dropdown -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4>Data Pelaporan Re-Inspeksi</h4>
			</div>
			<div class="widget-body">
				<button type="button" class="btn btn-gradient-04 mr-1 mb-2" data-toggle="modal" data-target="#pelaporan">Tambah Data</button>
				<div class="table-responsive">
					<table id="sorting-table" class="table mb-0">
						<thead>
							<tr>
								<th>No.</th>
								<th>No.Sertifikat</th>
								<th class="text-center">Kapal</th>
								<th class="text-center">Jenis Alat</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Tempat</th>
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
								<td class="text-center">13</td>
								<td class="text-center">Di workshop</td>
								<td class="text-center">10 Oktober 2018</td>
								<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Lolos</span></span></td>
								<td class="text-center">
									<a class="ion-share" href="<?php echo site_url('pemohon/detailperizinan'); ?>"> Cetak</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="pelaporan" class="modal fade">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Pelaporan</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
			<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">No. Sertifikat</label>
	<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Kapal</label>
	<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Jenis Alat</label>
    <select class="form-control" id="jenisalat">
      <option>Life Boat</option>
      <option>ILR</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Jumlah</label>
	<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tempat</label>
	<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Tanggal</label>
	<input type="text" class="form-control" id="1" placeholder="No. Sertifikat">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Hasil</label>
    <select class="form-control" id="jenisalat">
      <option>Remark</option>
      <option>Condamm</option>
    </select>
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
