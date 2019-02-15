<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Re-Inspeksi</h2>
			</div>
			<?php
			$data=$this->session->flashdata('sukses');
			if($data!=""){ 
				?>
				<div class="alert alert-success">
					<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
					<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
					<?=$data;?>
				</div>
				<?php 
			} 
			?>
			<?php 
			$data2=$this->session->flashdata('error');
			if($data2!=""){ 
				?>
				<div class="alert alert-danger">
					<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
					<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
					<?=$data2;?>
				</div>
				<?php 
			} 
			?>
		</div>
	</div>
	<!-- End Page Header -->
	<div class="row">
		<div class="col-xl-12">
			<!-- Sorting -->
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="widget-body sliding-tabs">
						<div class="text-right mt-3">
							<a class="btn btn-md btn-info text-right" href="<?php echo base_url('print_laporan_reinspeksi')?>" target="_blank"><i class="la la-print"></i> Cetak</a>
							<br>
							<br>
						</div>
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Data Reinspeksi <span id="penerbitan_ins"></span></a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
												<th class="text-center">Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											$penerbitan_ins=0;
											foreach ($data_inspeksi as $ins) {
												if($ins->foto_bukti_trf != "" && $ins->status_pembayaran == 'paid'){
													$i++;
													$penerbitan_ins+=1;
													$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
													?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan;?></td>
														<td class="text-center"><?php echo $ins->nama_alat;?></td>
														<td class="text-center"><?php echo $ins->nama_kapal;?></td>
														<?php 
														if($ins->no_spk != ""){
															if($ins->pengesahan == 'tidak'){
																?>
																<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small white">Menunggu pengesahan</span></span></td>
																<td class="text-center">-</td>
																<?php
															}else{
																?>
																<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterbitkan</span></span></td>
																<td class="text-center">-</td>
																<?php
															}
														}else{
															?>
															<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small info">Menunggu Penerbitan</span></span></td>
															<?php
														}
														?>
													</tr>
													<?php
												}
											}
											?>
											<input type="hidden" name="penerbitan_ins_bawah" id="penerbitan_ins_bawah" value="<?php echo $penerbitan_ins;?>">
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
</div>