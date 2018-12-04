<div class="col-xl-12">
	<!-- Tabs Dropdown -->
	<div class="widget has-shadow">
		<div class="widget-header bordered no-actions d-flex align-items-center">
			<h4>Data Re-Inspeksi</h4>
		</div>
		<div class="widget-body">
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="drop-tab-1" data-toggle="tab" href="#d-tab-1" role="tab" aria-selected="true">ILR</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="drop-tab-2" data-toggle="tab" href="#d-tab-2" role="tab" aria-selected="false">PMK</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
					 aria-expanded="false">
						Pemadam
						<i class="ion-android-arrow-dropdown"></i>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" id="nav-dropdown1-tab" href="#nav-dropdown1" role="tab" data-toggle="tab">Dropdown 1</a>
						<a class="dropdown-item" id="nav-dropdown2-tab" href="#nav-dropdown2" role="tab" data-toggle="tab">Dropdown 2</a>
					</div>
				</li>
			</ul>
			<div class="tab-content pt-3">
				<div class="tab-pane fade show active" id="d-tab-1" role="tabpanel" aria-labelledby="drop-tab-1">
					<div class="text-right">
						<button type="button" class="btn btn-gradient-03 mr-1 mb-2" data-toggle="modal" data-target="#cetaksertifikat">Cetak
							Sertifikat</button>
					</div>
					<button type="button" class="btn btn-gradient-04 mr-1 mb-2">Tambah Data</button>
					<div class="widget-body">
						<div class="table-responsive">
							<table id="sorting-table" class="table mb-0">
								<thead>
									<tr>
										<th>No.</th>
										<th>No.Sertifikat</th>
										<th>Kapal</th>
										<th>Tanggal Mulai</th>
										<th>Tanggal Berakhir</th>
										<th><span style="width:100px;">Hasil</span></th>
										<th>Dilaporkan</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>

									<tr>
										<td>1</td>
										<td><span class="text-primary">189-01-RU</span></td>
										<td>PERTAMINA</td>
										<td>08/12/2017</td>
										<td>08/12/2018</td>
										<td>Condamn</span></td>
										<td><span style="width:100px;"><span class="badge-text badge-text-small success">Sudah</span></span></td>
										<td class="td-actions">
											<a href="#"><i class="ion-share"></i></a>
										</td>
									</tr>
									<tr>
										<td>2</td>
										<td><span class="text-primary">092-06-FR</span></td>
										<td>PERTAMINA</td>
										<td>08/12/2018</td>
										<td>08/12/2019</td>
										<td>Lolos</td>
										<td><span style="width:100px;"><span class="badge-text badge-text-small danger">Belum</span></span></td>
										<td class="td-actions">
											<a href="#"><i class="ion-share"></i></a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="d-tab-2" role="tabpanel" aria-labelledby="drop-tab-2">
				</div>
				<div class="tab-pane fade" id="nav-dropdown1" role="tabpanel" aria-labelledby="nav-dropdown1-tab">
					Deserunt officia id Lorem nostrud aute id commodo elit eiusmod enim irure amet eiusmod qui reprehenderit nostrud
					tempor. Fugiat ipsum excepteur in aliqua non et quis aliquip ad irure in labore cillum elit enim. Consequat
					aliquip incididunt ipsum et minim laborum laborum laborum et cillum labore.
				</div>
				<div class="tab-pane fade" id="nav-dropdown2" role="tabpanel" aria-labelledby="nav-dropdown2-tab">
					Proident incididunt esse qui ea nisi ullamco aliquip nostrud velit sint duis. Aute culpa aute cillum sit
					consectetur mollit minim non reprehenderit tempor. Occaecat amet consectetur aute esse ad ullamco ad commodo
					mollit reprehenderit esse in consequat.
				</div>
			</div>
		</div>
	</div>
	<!-- End Tabs Dropdown -->
</div>

<div id="cetaksertifikat" class="modal fade">
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
				<p>
					Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt
					justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non
					convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia
					Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save</button>
			</div>
		</div>
	</div>
</div>
