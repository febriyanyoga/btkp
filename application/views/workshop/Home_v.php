<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-xl-11">
			<div class="row">
				<div class="col-xl-12 widget-29">
					<div class="widget no-bg">
						<div class="widget-body pt-0">
							<div class="widget29 owl-carousel">
								<?php
								if ($this->session->userdata('id_jabatan') == '5') {
									?>
									<div class="item" data-toggle="modal" data-target="#perizinan">
										<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/1.jpg" alt="...">
									</div>
									<?php
								} else {
									?>
									<a href="<?php echo site_url('izin_baru'); ?>">
										<div class="item" >
											<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/1.jpg" alt="...">
										</div>
									</a>
									<?php
								}
								?>
								<div class="item"><a href="<?php echo site_url('type_approval'); ?>">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/2.jpg" alt="..."></a>
								</div>
								<!-- dinggo kapal -->
								<div class="item"><a href="<?php echo site_url('pilihworkshop1'); ?>">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/3.jpg" alt="..."></a>
								</div>
								<!-- dinggo workshop -->
								<div class="item"><a href="<?php echo site_url('data_reinspeksi'); ?>">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/3.jpg" alt="..."></a>
								</div>

								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/4.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/5.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/6.jpg" alt="...">
								</div>
								<div class="item" data-toggle="modal" data-target="#inspeksi">
									<img class="img-fluid" src="<?php echo base_url(); ?>assets/app/img/menu/7.jpg" alt="...">
								</div>
							</div>
						</div>
					</div>
					<?php
					$data = $this->session->flashdata('sukses');
					if ($data != '') {
						?>
						<div class="alert alert-success">
							<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
								aria-hidden="true"></span></button>
								<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
								<?=$data; ?>
							</div>
							<?php
						}
						?>
						<?php
						$data2 = $this->session->flashdata('error');
						if ($data2 != '') {
							?>
							<div class="alert alert-danger">
								<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
									aria-hidden="true"></span></button>
									<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
									<?=$data2; ?>
								</div>
								<?php
							}
							?>
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
								<?php
								if ($this->session->userdata('id_jabatan') == '5'){
									?>
									<div class="widget-header d-flex align-items-center">
										<h2>Permohonan SPK</h2>
									</div>
									<div class="widget-body sliding-tabs">
										<ul class="nav nav-tabs" id="example-one" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">SPK</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Inspeksi </a>
											</li>
										</ul>
									</div>
									<?php
								}else{
									?>
									<div class="widget-header d-flex align-items-center">
										<h2>Permohonan Pengujian</h2>
									</div>
									<?php
								}
								?>
								<!-- End Widget Header -->
								<div class="widget-body">
									<div class="table-responsive">
										<?php
										if ($this->session->userdata('id_jabatan') == '5') {
											?>
											<div class="tab-content pt-3">
												<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
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
																if ($per->status_pengajuan == 'selesai') {
																	$ada_status = $this->TatausahaM->cek_status($per->id_perizinan)->num_rows();
                                                                    if ($ada_status > 0) { //ada progress
                                                                    	if ($per->status_pembayaran == 'unpaid') {
                                                                    		$status = $this->TatausahaM->cek_status($per->id_perizinan)->row()->status;
                                                                    		if ($status != 'ditolak'){
                                                                    			?>
                                                                    			<tr>
                                                                    				<td class="text-center"><span class="text-primary">
                                                                    					<?php echo $per->id_perizinan; ?></span></td>
                                                                    					<td class="text-left">
                                                                    						<?php echo $per->nama_alat; ?>
                                                                    					</td>
                                                                    					<?php
                                                                    					$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin)); ?>
                                                                    					<td class="text-center">
                                                                    						<?php echo date_indo($tgl_pengajuan); ?>
                                                                    					</td>
                                                                    					<td class="text-center">
                                                                    						<?php
                                                                    						$status = $this->TatausahaM->cek_status($per->id_perizinan)->row()->status;
                                                                    						$ket = $this->TatausahaM->cek_status($per->id_perizinan)->row()->keterangan;
                                                                    						if ($status == 'ditolak') {
                                                                    							?>
                                                                    							<span style="width:100px;" title="<?php echo $ket; ?>"><span class="badge-text badge-text-small danger">Ditolak</span></span>
                                                                    							<?php
                                                                    						} else {
                                                                    							if ($per->kode_billing != '') {
                                                                    								if ($per->foto_bukti_trf != '') {
                                                                    									?>
                                                                    									<span style="width:100px; " title="pembayaran sedang diverifikasi"><span style="color: black;" class="badge-text badge-text-small warning">Menunggu
                                                                    									verifikasi</span></span>
                                                                    									<?php
                                                                    								} else {
                                                                    									?>
                                                                    									<span style="width:100px; " title="silahkan lakukan pembayaran dan konfirmasi">
                                                                    										<span style="color: black;" class="badge-text badge-text-small warning">Menunggu Pembayaran</span>
                                                                    									</span><hr>
                                                                    									<a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan; ?>" class="btn btn-sm btn-info" target="_BLANK"><i class="la la-print"></i> Invoice</a>
                                                                    									<?php
                                                                    								}
                                                                    							} else {
                                                                    								$progress_tu = $this->GeneralM->get_array_progress_setuju($per->id_perizinan)->num_rows();
                                                                    								if($progress_tu > 0){
                                                                    									if($per->file_hasil_survey == ""){
                                                                    										?>
                                                                    										<span style="width:100px; " title="Menunggu file survey diUnggah"><span style="color: black;" class="badge-text badge-text-small warning">Menunggu File Survey</span></span>
                                                                    										<?php
                                                                    									}else{
                                                                    										?>
                                                                    										<span style="width:100px; " title="dalam proses persetujuan/verifikasi"><span style="color: black;" class="badge-text badge-text-small warning">Proses</span></span>
                                                                    										<?php
                                                                    									}
                                                                    								}else{
                                                                    									?>
                                                                    									<span style="width:100px; " title="dalam proses persetujuan/verifikasi"><span style="color: black;" class="badge-text badge-text-small warning">Proses</span></span>
                                                                    									<?php
                                                                    								}
                                                                    							}
                                                                    						}
                                                                    						?>
                                                                    					</td>
                                                                    					<td class="text-center">
                                                                    						<?php
                                                                    						if ($status == 'ditolak') {
                                                                    							echo '-';
                                                                    						} else {
                                                                    								if ($per->kode_billing != '') {// sudah ada kode billing
                                                                                                    	if ($per->foto_bukti_trf != '') { //ada foto
                                                                                                    		?>
                                                                                                    		<span style="width:100px;" title="Menunggu verifikasi pembayran"><span class="badge-text badge-text-small info">
                                                                                                    		Menunggu Verifikasi</span></span>
                                                                                                    		<?php
                                                                                                    	} else {
                                                                                                    		?>
                                                                                                    		<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#konfirmasi-<?php echo $per->id_perizinan; ?>">Konfirmasi
                                                                                                    		Pembayaran</i></a>
                                                                                                    		<?php
                                                                                                    	}
                                                                                                    }else {
                                                                                                    	$progress_tu = $this->GeneralM->get_array_progress_setuju($per->id_perizinan)->num_rows();
                                                                                                    	if($progress_tu>0){
                                                                                                    		if($per->file_hasil_survey == ""){
                                                                                                    			?>
                                                                                                    			<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#file_survey-<?php echo $per->id_perizinan; ?>">Upoad file survey</i></a>
                                                                                                    			<?php
                                                                                                    		}else{
                                                                                                    			echo "-";
                                                                                                    		}
                                                                                                    	}else{
                                                                                                    		echo "-";
                                                                                                    	}
                                                                                                    }
                                                                                                }
                                                                                                ?>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <div class="modal" id="konfirmasi-<?php echo $per->id_perizinan; ?>">
                                                                                        	<div class="modal-dialog modal-md">
                                                                                        		<div class="modal-content">
                                                                                        			<div class="modal-header">
                                                                                        				<h4 class="modal-title">Konfirmasi Pembayaran</h4>
                                                                                        				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        			</div>
                                                                                        			<form action="<?php echo site_url('konfirmasi'); ?>" enctype="multipart/form-data" method="post">
                                                                                        				<div class="modal-body">
                                                                                        					<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $per->id_perizinan; ?>">
                                                                                        					<label for="nama_bank" class="label">Nama Bank : </label>
                                                                                        					<input type="text" name="nama_bank" value="" class="form-control" placeholder="Masukkan Nama Bank Anda"
                                                                                        					required="required">

                                                                                        					<label for="atas_nama" class="label">Atas Nama : </label>
                                                                                        					<input type="text" name="atas_nama" value="" class="form-control" placeholder="Masukkan atas nama bank anda"
                                                                                        					required="required">

                                                                                        					<label for="foto_bukti_trf" class="label">Unggah Bukti: </label>
                                                                                        					<input type="file" name="foto_bukti_trf" value="" class="form-control" required="required">
                                                                                        				</div>
                                                                                        				<div class="modal-footer">
                                                                                        					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                                                                        					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin data yang dimasukkan sudah benar?')">
                                                                                        				</div>
                                                                                        			</form>
                                                                                        		</div>
                                                                                        	</div>
                                                                                        </div>

                                                                                        <div class="modal" id="file_survey-<?php echo $per->id_perizinan; ?>">
                                                                                        	<div class="modal-dialog modal-md">
                                                                                        		<div class="modal-content">
                                                                                        			<div class="modal-header">
                                                                                        				<h4 class="modal-title">Unggah file survey</h4>
                                                                                        				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        			</div>
                                                                                        			<form action="<?php echo site_url('file_survey'); ?>" enctype="multipart/form-data" method="post">
                                                                                        				<div class="modal-body">
                                                                                        					<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $per->id_perizinan; ?>">
                                                                                        					<label for="nama_bank" class="label">Unggah File : </label>
                                                                                        					<input type="file" name="file_hasil_survey" value="" class="form-control"
                                                                                        					required="required">
                                                                                        				</div>
                                                                                        				<div class="modal-footer">
                                                                                        					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                                                                        					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin data yang dimasukkan sudah benar?')">
                                                                                        				</div>
                                                                                        			</form>
                                                                                        		</div>
                                                                                        	</div>
                                                                                        </div>
                                                                                        <?php
                                                                                    }
                                                                                }
                                                                            } else {
                                                                            	?>
                                                                            	<tr>
                                                                            		<td class="text-center"><span class="text-primary">
                                                                            			<?php echo $per->id_perizinan; ?></span>
                                                                            		</td>
                                                                            		<td class="text-left">
                                                                            			<?php echo $per->nama_alat; ?>
                                                                            		</td>
                                                                            		<?php
                                                                            		$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin));
                                                                            		?>
                                                                            		<td class="text-center">
                                                                            			<?php echo date_indo($tgl_pengajuan); ?>
                                                                            		</td>
                                                                            		<td class="text-center">
                                                                            			<span style="width:100px; " title="dalam proses persetujuan/verifikasi"><span style="color: black;" class="badge-text badge-text-small warning">Proses</span></span>
                                                                            		</td>
                                                                            		<td class="text-center">-</td>
                                                                            	</tr>
                                                                            	<?php
                                                                            }
                                                                        }
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                                                        	<table id="myTable2" class="table mb-0">
                                                        		<thead>
                                                        			<tr>
                                                        				<th class="text-center">No</th>
                                                        				<th class="text-center">No. Permohonan</th>
                                                        				<th class="text-center">Tanggal Pengajuan</th>
                                                        				<th class="text-center">Status</th>
                                                        				<th class="text-center">Actions</th>
                                                        			</tr>
                                                        		</thead>
                                                        		<tbody>
                                                        			<tr>
                                                        				<td></td>
                                                        				<td></td>
                                                        				<td></td>
                                                        				<td></td>
                                                        				<td></td>
                                                        			</tr>
                                                        		</tbody>
                                                        	</table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            } else {
                                            	?>
                                            	<table id="myTable3" class="table mb-0">
                                            		<thead>
                                            			<tr>
                                            				<th class="text-center">No.</th>
                                            				<th class="text-center">No. Permohonan</th>
                                            				<th class="text-center">Nama Alat</th>
                                            				<th class="text-center">Tipe/Model Alat</th>
                                            				<th class="text-center">Tanggal Pengajuan</th>
                                            				<th class="text-center">Status</th>
                                            				<th class="text-center">Actions</th>
                                            			</tr>
                                            		</thead>
                                            		<tbody>
                                            			<?php
                                            			$i=0;
                                            			$j=0;
                                            			foreach ($data_pengujian as $ujian) {
                                            				if($ujian->status_pengajuan == 'selesai'){
                                            					$ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
                                            					$tgl_pengajuan_p = date('Ymd', strtotime($ujian->created_at_ujian));
                                            					if($ada_status > 0){
                                            						$status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row()->status;
                                            						if($status != 'ditolak'){
                                            							$i++;
                                            							?>
                                            							<tr>
                                            								<td class="text-center"><?php echo $i;?></td>
                                            								<td class="text-center"><?php echo $ujian->id_pengujian.'/'.$tgl_pengajuan_p?></td>
                                            								<td class="text-center"><?php echo $ujian->nama_alat?></td>
                                            								<td class="text-center"><?php echo $ujian->tipe?></td>
                                            								<?php
                                            								$tgl_pengajuan_u = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                            								?>
                                            								<td class="text-center"><?php echo date_indo($tgl_pengajuan_u)?></td>
                                            								<td class="text-center">
                                            									<?php
                                            									if($ujian->foto_bukti_trf_1 != ""){
                                            										if($ujian->status_pembayaran_1 == "paid"){
                                            											if($ujian->file_hasil_pengujian != ""){
                                            												?>
                                            												<span style="width:100px;"><span class="badge-text badge-text-small default">Proses</span></span>
                                            												<?php
                                            											}else{
                                            												?>
                                            												<span style="width:100px; "><span class="badge-text badge-text-small default" style="color: black;">Verifikasi Pembayaran Berhasil</span></span>
                                            												<?php
                                            											}
                                            										}else{
                                            											?>
                                            											<span style="width:100px; "><span class="badge-text badge-text-small default" style="color: black;">Menunggu Verifikasi Pembayaran</span></span>
                                            											<?php
                                            										}
                                            									}else{
                                            										?>
                                            										<span style="width:100px; "><span class="badge-text badge-text-small default" style="color: black;">Menunggu Pembayaran</span></span>
                                            										<hr>
                                            										<a href="<?php echo site_url('cetak_invoice_ujian/').$ujian->id_pengujian; ?>" class="btn btn-sm btn-info" target="_BLANK"><i class="la la-print"></i> Invoice</a>
                                            										<?php
                                            									}
                                            									?>
                                            								</td>
                                            								<td class="text-center">
                                            									<?php
                                            									if($ujian->foto_bukti_trf_1 != ""){
                                            										echo "-";
                                            									}else{
                                            										?>
                                            										<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#konfirmasi-<?php echo $ujian->id_pengujian; ?>">Konfirmasi</a>
                                            										<?php
                                            									}
                                            									?>
                                            								</td>
                                            							</tr>

                                            							<div class="modal" id="konfirmasi-<?php echo $ujian->id_pengujian; ?>">
                                            								<div class="modal-dialog modal-md">
                                            									<div class="modal-content">
                                            										<div class="modal-header">
                                            											<h4 class="modal-title">Konfirmasi Pembayaran</h4>
                                            											<button type="button" class="close" data-dismiss="modal">&times;</button>
                                            										</div>
                                            										<form action="<?php echo site_url('konfirmasi_ujian_1'); ?>" enctype="multipart/form-data" method="post">
                                            											<div class="modal-body">
                                            												<input type="text" name="id_pengujian" class="form-control" required="required" value="<?php echo $ujian->id_pengujian; ?>">
                                            												<label for="nama_bank" class="label">Nama Bank : </label>
                                            												<input type="text" name="nama_bank" value="" class="form-control" placeholder="Masukkan Nama Bank Anda"
                                            												required="required">

                                            												<label for="atas_nama" class="label">Atas Nama : </label>
                                            												<input type="text" name="atas_nama" value="" class="form-control" placeholder="Masukkan atas nama bank anda"
                                            												required="required">

                                            												<label for="foto_bukti_trf" class="label">Unggah Bukti: </label>
                                            												<input type="file" name="foto_bukti_trf" value="" class="form-control" required="required">
                                            											</div>
                                            											<div class="modal-footer">
                                            												<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                            												<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin data yang dimasukkan sudah benar?')">
                                            											</div>
                                            										</form>
                                            									</div>
                                            								</div>
                                            							</div>
                                            							<?php
                                            						}
                                            					}elseif($ada_status == 0){
                                            						$j++;
                                            						?>
                                            						<tr>
                                            							<td class="text-center"><?php echo $j;?></td>
                                            							<td class="text-center"><?php echo $ujian->id_pengujian.'/'.$tgl_pengajuan_p?></td>
                                            							<td class="text-center"><?php echo $ujian->nama_alat?></td>
                                            							<td class="text-center"><?php echo $ujian->tipe?></td>
                                            							<?php
                                            							$tgl_pengajuan_u = date('Y-m-d', strtotime($ujian->created_at_ujian));?>
                                            							<td class="text-center"><?php echo date_indo($tgl_pengajuan_u)?></td>
                                            							<td class="text-center">
                                            								<span style="width:100px;"><span class="badge-text badge-text-small default">Proses</span></span>
                                            							</td>
                                            							<td class="text-center">-</td>
                                            						</tr>
                                            						<?php
                                            					}
                                            				}
                                            			}
                                            			?>
                                            		</tbody>
                                            	</table>
                                            	<?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            								<a href="<?php echo site_url('data_perizinan'); ?>"><img src="<?php echo base_url(); ?>assets/app/img/menu/perpanjang.jpg"
            									class="img-fluid rounded" alt="..."></a>
            								</div>
            							</div>
            						</div>
            						<br>
            						<div class="row">
            							<div class="col-xl-12">
            								<div class="room-image">
            									<a href="<?php echo site_url('data_perizinan'); ?>"><img src="<?php echo base_url(); ?>assets/app/img/menu/dataspk.jpg"
            										class="img-fluid rounded" alt="..."></a>
            									</div>
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

		<div id="pilihworkshop" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Pilih Workshop</h4>
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
