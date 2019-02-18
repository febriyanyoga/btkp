<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
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
						<div class="widget-body sliding-tabs">
							<ul class="nav nav-tabs" id="example-one" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Verifikasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Kode NTPN</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Validasi Pembayaran</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Penerbitan</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
									<div class="table-responsive">
										<table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
                                                    <th class="text-center">Tahun Produksi</th>
                                                    <th class="text-center">Perusahaan</th>
                                                    <th class="text-center">Kode Produksi</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<!-- <?php
                                                $i = 0;
                                                foreach ($perizinan as $per) {
                                                    $id_pengguna = $this->session->userdata('id_pengguna');
                                                    $own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
                                                    if ($own_progress == 0) {
                                                        ++$i; ?> -->
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
															<td class="text-center"><?php echo $per->nama_alat; ?></td>
															<?php
                                                            $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin)); ?>
                                                            <td class="text-center"><?php echo $tgl_pengajuan; ?></td>
                                                            <td></td>
															<!-- <td class="text-center">
															</td> -->
															<td class="text-center">
                                                            <!-- 1. muncul tombol verifikasi karo tolak
                                                            2. nek di klik verifikasi lempar data neng kasie, eng pertanyaan anda yakin
                                                            3. nek tolak yo dinei alasan -->
																<a href="<?php echo site_url('verifikasi/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																</a>
															</td>
														</tr>
														<!-- <?php
                                                    } ?>
													<?php
                                                }
                                                ?> -->
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
									<div class="table-responsive">
                                    <table id="myTable2" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
                                                    <th class="text-center">Tahun Produksi</th>
                                                    <th class="text-center">Perusahaan</th>
                                                    <th class="text-center">Kode Produksi</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<!-- <?php
                                                $i = 0;
                                                foreach ($perizinan as $per) {
                                                    $id_pengguna = $this->session->userdata('id_pengguna');
                                                    $own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
                                                    if ($own_progress == 0) {
                                                        ++$i; ?> -->
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
															<td class="text-center"><?php echo $per->nama_alat; ?></td>
															<?php
                                                            $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin)); ?>
                                                            <td class="text-center"><?php echo $tgl_pengajuan; ?></td>
                                                            <td></td>
															<!-- <td class="text-center">
															</td> -->
															<td class="text-center">
                                                            <!-- 1. muncul tombol verifikasi karo tolak
                                                            2. nek di klik verifikasi lempar data neng kasie, eng pertanyaan anda yakin
                                                            3. nek tolak yo dinei alasan -->
																<a href="<?php echo site_url('verifikasi/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																</a>
															</td>
														</tr>
														<!-- <?php
                                                    } ?>
													<?php
                                                }
                                                ?> -->
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
									<div class="table-responsive">
                                    <table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
                                                    <th class="text-center">Tahun Produksi</th>
                                                    <th class="text-center">Perusahaan</th>
                                                    <th class="text-center">Kode Produksi</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<!-- <?php
                                                $i = 0;
                                                foreach ($perizinan as $per) {
                                                    $id_pengguna = $this->session->userdata('id_pengguna');
                                                    $own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
                                                    if ($own_progress == 0) {
                                                        ++$i; ?> -->
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
															<td class="text-center"><?php echo $per->nama_alat; ?></td>
															<?php
                                                            $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin)); ?>
                                                            <td class="text-center"><?php echo $tgl_pengajuan; ?></td>
                                                            <td></td>
															<!-- <td class="text-center">
															</td> -->
															<td class="text-center">
                                                            <!-- 1. muncul tombol verifikasi karo tolak
                                                            2. nek di klik verifikasi lempar data neng kasie, eng pertanyaan anda yakin
                                                            3. nek tolak yo dinei alasan -->
																<a href="<?php echo site_url('verifikasi/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																</a>
															</td>
														</tr>
														<!-- <?php
                                                    } ?>
													<?php
                                                }
                                                ?> -->
											</tbody>
										</table>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
									<div class="table-responsive">
                                    <table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Tanggal Pengajuan</th>
													<th class="text-center">Nama Alat</th>
                                                    <th class="text-center">Tahun Produksi</th>
                                                    <th class="text-center">Perusahaan</th>
                                                    <th class="text-center">Kode Produksi</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<!-- <?php
                                                $i = 0;
                                                foreach ($perizinan as $per) {
                                                    $id_pengguna = $this->session->userdata('id_pengguna');
                                                    $own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
                                                    if ($own_progress == 0) {
                                                        ++$i; ?> -->
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
															<td class="text-center"><?php echo $per->nama_alat; ?></td>
															<?php
                                                            $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin)); ?>
                                                            <td class="text-center"><?php echo $tgl_pengajuan; ?></td>
                                                            <td></td>
															<!-- <td class="text-center">
															</td> -->
															<td class="text-center">
                                                            <!-- 1. muncul tombol verifikasi karo tolak
                                                            2. nek di klik verifikasi lempar data neng kasie, eng pertanyaan anda yakin
                                                            3. nek tolak yo dinei alasan -->
																<a href="<?php echo site_url('verifikasi/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																</a>
															</td>
														</tr>
														<!-- <?php
                                                    } ?>
													<?php
                                                }
                                                ?> -->
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!-- End Sorting -->
			</div>
		</div>
		<!-- End Row -->
	</div>
