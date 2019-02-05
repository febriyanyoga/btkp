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
						<ul class="nav nav-tabs" id="example-one" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Konfirmasi Permohonan <span id="konfirmasi_ins"></span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-6" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6"
								aria-selected="false">Hasil Inspeksi <span id="hasil_ins"></span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Penerbitan <span id="penerbitan_ins"></span></a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Data Inspeksi Ditolak <span id="tolak_ins"></span></a>
							</li>
						</ul>
						<div class="tab-content pt-3">
							<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
								<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Permohonan</th>
												<th class="text-center">Workshop</th>
												<th class="text-center">Alat</th>
												<th class="text-center">Kapal</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=1;
											$konfirmasi_ins=0;
											foreach ($data_inspeksi as $ins) {
												$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
												// $alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_perusahaan)->row();
												$progress_tu = $this->GeneralM->get_array_progress_inspeksi($ins->id_inspeksi)->num_rows();
												if($progress_tu == 0){
													?>
													<tr>
														<td><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ins->nama_perusahaan?></td>
														<td class="text-center"><?php echo $ins->nama_alat?></td>
														<td class="text-center"><?php echo $ins->nama_kapal?></td>
													</tr>
													<?php
													$i++;
													$konfirmasi_ins+=1;
												}
											}
											?>
											<input type="hidden" name="konfirmasi_ins_bawah" id="konfirmasi_ins_bawah" value="<?php echo $konfirmasi_ins;?>">
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="base-tab-6">
								<div class="widget-body">
									<div class="table-responsive">
										<table id="myTable6" class="table mb-0">
											<thead>
												<tr>
													<th>No.</th>
													<th class="text-center">Kapal</th>
													<th class="text-center">Flag</th>
													<th class="text-center">Imo No</th>
													<th class="text-center">Tanggal Permohonan</th>
													<th class="text-center">Tempat</th>
													<th class="text-center">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=1;
												$hasil_ins = 0;
												foreach ($data_inspeksi as $ins) {
													$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
													$alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_workshop)->row();
													$progress_tu = $this->GeneralM->get_array_progress_inspeksi_setuju($ins->id_inspeksi)->num_rows();
													if($progress_tu > 0 ){
														if($ins->status_pembayaran == 'unpaid'){
															?>
															<tr>
																<td><?php echo $i;?></td>
																<td class="text-center"><?php echo $ins->nama_kapal?></td>
																<td class="text-center"><?php echo $ins->flag?></td>
																<td class="text-center"><?php echo $ins->imo?></td>
																<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
																<td class="text-center"><?php echo $alamat_ws->nama_kabupaten_kota?></td>
																<td class="text-center">
																	<?php 
																	if($ins->file_hasil_survey == ""){
																		?>
																		<span class="badge-text badge-text-small danger">Menunggu Dokumen Hasil Inspeksi</span>
																		<?php
																	}elseif($ins->file_hasil_survey != ""){
																		if($ins->kode_billing != ""){
																			if($ins->foto_bukti_trf != ""){
																				?>
																				<span class="badge-text badge-text-small default" title="Menunggu validasi pembayaran dan penerbitan">Menunggu Validasi Pembayaran</span>
																				<?php
																			}else{
																				if($ins->ket_pembayaran != ""){
																					?>
																					<span>Pembayaran tidak tervalidasi</span>
																					<hr>
																					<span style="font-style: italic; color: red;"><?php echo $ins->ket_pembayaran?></span>
																					<?php
																				}else{
																					?>
																					<span class="badge-text badge-text-small default" title="Silahkan melakukan pembayaran sesuai tagihan">Menunggu Pembayaran</span>
																					<?php
																				}
																			}
																		}else{
																			?>
																			<span class="badge-text badge-text-small info" title="Menunggu Kode NTPN untuk pembayaran">Dokumen telah diunggah</span>
																			<?php
																		}
																	}
																	?>
																</td>
																
															</tr>
															<?php
															$i++;
															$hasil_ins+=1;
														}
													}
												}
												?>
												<input type="hidden" name="hasil_ins_bawah" id="hasil_ins_bawah" value="<?php echo $hasil_ins;?>">
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
								<div class="table-responsive">
									<table id="myTable4" class="table mb-0">
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
															?>
															<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterbitkan</span></span></td>
															<?php
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
							<div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="base-tab-5">
								<div class="widget-body">
									<div class="table-responsive">
										<table id="myTable5" class="table mb-0">
											<thead>
												<tr>
													<th>No.</th>
													<th class="text-center">Kapal</th>
													<th class="text-center">Jenis Alat</th>
													<th class="text-center">Tanggal Permohonan</th>
													<th class="text-center">Hasil</th>
													<th class="text-center">Keterangan</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i=1;
												$tolak_ins=0;
												foreach ($data_inspeksi as $ins) {
													$progress_tu = $this->GeneralM->get_array_progress_inspeksi_tolak($ins->id_inspeksi)->num_rows();
													$progress_all = $this->GeneralM->get_array_progress_inspeksi_all($ins->id_inspeksi)->num_rows();
													if($progress_all > 0 && $progress_tu > 0){
														$keterangan = $this->GeneralM->get_array_progress_inspeksi_all($ins->id_inspeksi)->row()->keterangan;

														$tgl_pengajuan = date('Y-m-d', strtotime($ins->created_at_inspeksi));
														?>
														<tr>
															<td><?php echo $i?></td>
															<td class="text-center"><?php echo $ins->nama_kapal?></td>
															<td class="text-center"><?php echo $ins->nama_alat?></td>
															<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
															<td class="text-center">
																<span style="width:100px;"><span class="badge-text badge-text-small danger">Ditolak</span></span>
															</td>
															<td class="text-center" style="font-weight: bold; color: black;">
																<?php echo $keterangan?>
															</td>
														</tr>
														<?php
														$i++;
														$tolak_ins+=1;
													}
												}
												?>
												<input type="hidden" name="tolak_ins_bawah" id="tolak_ins_bawah" value="<?php echo $tolak_ins;?>">
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
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#label_ket_pembayaran').hide();
		$('#input_ket_pembayaran').hide();

		$('#status_pembayaran').change(function(){
			var status = $("#status_pembayaran").val();
			if(status == 'unpaid'){
				$('#label_ket_pembayaran').show();
				$('#input_ket_pembayaran').show();
				$("#input_ket_pembayaran").prop("required", true);
			}else if(status == 'paid'){
				$('#label_ket_pembayaran').hide();
				$('#input_ket_pembayaran').hide();
				$("#input_ket_pembayaran").removeAttr("required");
			}
		});
	});
</script>