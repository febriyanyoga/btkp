<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Perizinan</h2>
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
							<ul class="nav nav-tabs" id="example-one" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Verifikasi</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Kode Billing</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Penerbitan</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Data SPK</a>
								</li>
							</ul>
							<div class="tab-content pt-3">
								<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
									<div class="table-responsive">
										<table id="myTable" class="table mb-0">
											<thead>
												<tr>
													<th class="text-center">No</th>
													<th class="text-center">Jenis Izin</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Alat SPK</th>
													<th class="text-center">Tanggal Permohonan</th>
													<!-- <th class="text-center">Status</th> -->
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i = 0;
												foreach ($perizinan as $per) {
													$id_pengguna = $this->session->userdata('id_pengguna');
													$own_progress = $this->GeneralM->get_own_progress($id_pengguna, $per->id_perizinan)->num_rows();
													if ($own_progress == 0 && $per->status_pengajuan == 'selesai') {
														++$i; ?>
														<tr>
															<td class="text-center"><?php echo $i; ?></td>
															<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
															<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
															<td class="text-center"><?php echo $per->nama_alat; ?></td>
															<?php
                                                            // $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin));
															$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin)); ?>
															<td class="text-center"><?php echo date_indo($tgl_pengajuan); ?></td>
															<!-- <td class="text-center">
															</td> -->
															<td class="text-center">
																<a href="<?php echo site_url('verifikasi/'.$per->id_perizinan); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
																</a>
															</td>
														</tr>
														<?php
													} ?>
													<?php
												}
												?>
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
													<th class="text-center">Jenis Izin</th>
													<th class="text-center">Perusahaan</th>
													<th class="text-center">Alat SPK</th>
													<th class="text-center">Tanggal Permohonan</th>
													<th class="text-center">Status</th>
													<th class="text-center">Aksi</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$i = 0;
                                                $id_pengguna = $this->session->userdata('id_pengguna'); //id pengguna
                                                    $id_pengguna_kasie = $this->GeneralM->get_kasie()->result(); //ambil id nya kasi
                                                    foreach ($perizinan as $per) {
                                                        $progress_kasie = $this->GeneralM->get_array_progress($per->id_perizinan)->num_rows(); //jumlah perizinan yang di acc kasie
                                                        if ($progress_kasie > 0) {
                                                        	$status = $this->TatausahaM->cek_status($per->id_perizinan)->row()->status;
                                                        	if ($per->foto_bukti_trf == '') {
                                                        		if ($status != 'ditolak') {
                                                        			++$i; ?>
                                                        			<tr>
                                                        				<td class="text-center"><?php echo $i; ?></td>
                                                        				<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
                                                        				<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
                                                        				<td class="text-center"><?php echo $per->nama_alat; ?></td>
                                                        				<?php
                                                        				$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin)); ?>
                                                        				<td class="text-center"><?php echo date_indo($tgl_pengajuan); ?></td>
                                                        				<td class="text-center">
                                                        					<?php
                                                        					if ($status == 'diterima') {
                                                        						if ($per->kode_billing != '') {
                                                        							?>
                                                        							<span style="width:100px;"><span class="badge-text badge-text-small default" style="color: black;">Menunggu pembayaran</span></span>
                                                        							<?php
                                                        						} else {
                                                        							?>
                                                        							<span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span>
                                                        							<?php
                                                        						}
                                                        					} else {
                                                        						?>
                                                        						<span style="width:100px;"><span class="badge-text badge-text-small danger">Ditolak</span></span>
                                                        						<?php
                                                        					} ?>
                                                        				</td>
                                                        				<td class="text-center">
                                                        					<?php
                                                        					if ($status == 'ditolak') {
                                                        						?>
                                                        						<span style="width:100px;" title="tidak bisa input billing"><span class="badge-text badge-text-small danger"><i class="la la-close"></i></span></span>
                                                        						<?php
                                                        					} else {
                                                        						if ($per->kode_billing != '') {
                                                        							?>
                                                        							<span style="width:100px;" title="Sudah input billing"><span class="badge-text badge-text-small success"><i class="la la-check"></i></span></span>
                                                        							<?php
                                                        						} else {
                                                        							?>
                                                        							<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling-<?php echo $per->id_perizinan; ?>"><i class="la la-plus"></i>Kode Billing</i>
                                                        							</a>
                                                        							<?php
                                                        						}
                                                        					} ?>
                                                        				</td>
                                                        			</tr>
                                                        			<div class="modal" id="kode_biling-<?php echo $per->id_perizinan; ?>">
                                                        				<div class="modal-dialog modal-md">
                                                        					<div class="modal-content">
                                                        						<div class="modal-header">
                                                        							<h4 class="modal-title">Masukkan Kode Billing</h4>
                                                        							<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        						</div>
                                                        						<form action="<?php echo site_url('kode_billing'); ?>" method="post">
                                                        							<div class="modal-body">
                                                        								<label for="kode_billing" class="label">Kode Billing : </label>
                                                        								<input type="number" name="kode_billing" value="" class="form-control" placeholder="Masukkan kode billing" required="required">
                                                                                        <label for="bank_btkp" class="label">Bank BTKP : </label>
                                                                                        <select class="form-control" name="id_bank_btkp">
                                                                                            <option value="">---Pilih Bank---</option>
                                                                                            <?php
                                                                                            foreach ($bank_btkp as $bank ) {
                                                                                                ?>
                                                                                                <option value="<?php echo $bank->id_bank_btkp?>"><?php echo $bank->nama_bank?></option>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </select>
                                                                                        
                                                        								<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $per->id_perizinan; ?>">
                                                                                        <label for="jumlah_tagihan" class="label">Jumlah Tagihan: </label>
                                                                                        <input type="number" name="jumlah_tagihan" value="" class="form-control" placeholder="Masukkan Jumlah Tagihan" required="required">
                                                                                        <label for="masa_berlaku_billing" class="label">Masa Berlaku Sampai: </label>
                                                                                        <input type="date" name="masa_berlaku_billing" value="" class="form-control" placeholder="Masukkan Masa Berlaku" required="required">
                                                                                        
                                                        							</div>
                                                        							<div class="modal-footer">
                                                        								<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                                        								<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin Kode billing yang dimasukkan sudah benar?')">
                                                        							</div>
                                                        						</form>
                                                        					</div>
                                                        				</div>
                                                        			</div>
                                                        			<?php
                                                        		}
                                                        	}
                                                        } ?>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
                                    	<div class="table-responsive">
                                    		<table id="myTable3" class="table mb-0">
                                    			<thead>
                                    				<tr>
                                    					<th class="text-center">No</th>
                                    					<th class="text-center">Jenis Izin</th>
                                    					<th class="text-center">Perusahaan</th>
                                    					<th class="text-center">Alat SPK</th>
                                    					<th class="text-center">Tanggal Permohonan</th>
                                    					<th class="text-center">Status</th>
                                    					<th class="text-center">Aksi</th>
                                    				</tr>
                                    			</thead>
                                    			<tbody>
                                    				<?php
                                    				$i = 0;
                                    				foreach ($perizinan as $per) {
                                    					$id_pengguna = $this->session->userdata('id_pengguna');
                                    					if ($per->kode_billing != '') {
                                    						if ($per->foto_bukti_trf != '') {
                                    							if ($per->status_pembayaran != 'paid') {
                                    								++$i; ?>
                                    								<tr>
                                    									<td class="text-center"><?php echo $i; ?></td>
                                    									<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
                                    									<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
                                    									<td class="text-center"><?php echo $per->nama_alat; ?></td>
                                    									<?php
                                                                // $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin));
                                    									$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin)); ?>
                                    									<td class="text-center"><?php echo date_indo($tgl_pengajuan); ?></td>
                                    									<td class="text-center">
                                    										<?php
                                                                    if ($per->kode_billing != '') { //ada kode billing
                                                                        if ($per->foto_bukti_trf != '') { //ada foto
                                                                        	?>
                                                                        	<span style="width:100px;" title="Sudah input billing"><span class="badge-text badge-text-small info"> Sudah dibayar</span></span>
                                                                        	<?php
                                                                        } else {
                                                                        	?>
                                                                        	<span style="width:100px;" title="Sudah input billing"><span class="badge-text badge-text-small default" style="color: black;"> Menunggu Pembayaran</span></span>
                                                                        	<?php
                                                                        }
                                                                    } ?>
                                                                </td>
                                                                <td class="text-center">
                                                                	<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#penerbitan-<?php echo $per->id_perizinan; ?>"><i class="la la-plus"></i>Penerbitan</i>
                                                                	</a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal" id="penerbitan-<?php echo $per->id_perizinan; ?>">
                                                            	<div class="modal-dialog modal-md">
                                                            		<div class="modal-content">
                                                            			<div class="modal-header">
                                                            				<h4 class="modal-title">Penerbitan</h4>
                                                            				<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            			</div>
                                                            			<form action="<?php echo site_url('penerbitan'); ?>" method="post">
                                                            				<div class="modal-body">
                                                            					<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $per->id_perizinan; ?>">
                                                            					<label for="keterangan" class="label">Bank Transfer : </label>
                                                            					<input type="text" name="nama_bank" value="<?php echo $per->nama_bank; ?>" class="form-control" required="required" readonly>
                                                            					<label for="keterangan" class="label">Atas Nama : </label>
                                                            					<input type="text" name="atas_nama" value="<?php echo $per->atas_nama; ?>" class="form-control" required="required" readonly>
                                                            					<label for="" class="label">Foto Bukti Transfer : </label>
                                                            					<img style="max-width: 470px;" src="<?php echo base_url().'assets/upload/'.$per->foto_bukti_trf; ?>">
                                                            					<label for="status_pembayaran" class="label">Status Pembayaran  : </label>
                                                            					<select class="form-control" name="status_pembayaran">
                                                            						<option value="paid">Telah Dibayar</option>
                                                            						<option value="unpaid">Belum Dibayar</option>
                                                            					</select>
                                                            					<!-- <label for="keterangan" class="label">Nomor SPK : </label>
                                                            					<input type="text" name="nomor_spk" value="" class="form-control" placeholder="Masukkan nomor SPK" required="required"> -->
                                                            					<label for="keterangan" class="label">Tanggal Terbit  : </label>
                                                            					<input type="date" name="tgl_terbit" value="" class="form-control" required="required">
                                                            					<label for="keterangan" class="label">Tanggal Expired  : </label>
                                                            					<input type="date" name="tgl_expired" value="" class="form-control" required="required">
                                                            				</div>
                                                            				<div class="modal-footer">
                                                            					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
                                                            					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin akan menerbitkan perizinan ini?')">
                                                            				</div>
                                                            			</form>
                                                            		</div>
                                                            	</div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
                            	<div class="table-responsive">
                            		<table id="myTable4" class="table mb-0">
                            			<thead>
                            				<tr>
                            					<th class="text-center">No</th>
                            					<th class="text-center">Jenis Izin</th>
                            					<th class="text-center">Perusahaan</th>
                            					<th class="text-center">Alat SPK</th>
                            					<th class="text-center">Tanggal Permohonan</th>
                            					<th class="text-center">Status</th>
                            					<th class="text-center">Masa Aktif</th>
                            				</tr>
                            			</thead>
                            			<tbody>
                            				<?php
                            				$i = 0;
                            				foreach ($perizinan as $per) {
                            					$id_pengguna = $this->session->userdata('id_pengguna');
                            					if ($per->status_pembayaran == 'paid') {
                            						++$i; ?>
                            						<tr>
                            							<td class="text-center"><?php echo $i; ?></td>
                            							<td class="text-center"><?php echo $per->nama_jenis_izin; ?></td>
                            							<td class="text-center"><?php echo $per->nama_perusahaan; ?></td>
                            							<td class="text-center"><?php echo $per->nama_alat; ?></td>
                            							<?php
                                                            // $tgl_pengajuan = date('d/m/Y H:i:s', strtotime($per->created_at_izin));
                            							$tgl_pengajuan = date('Y-m-d', strtotime($per->created_at_izin));
                            							$tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                            							$tgl_expired = date('Y-m-d', strtotime($per->tgl_expired)); ?>
                            							<td class="text-center"><?php echo date_indo($tgl_pengajuan); ?></td>
                            							<td class="text-center">
                            								<span style="width:100px;" title="Sudah input billing"><span class="badge-text badge-text-small success"> Aktif</span></span>
                            							</td>
                            							<td class="text-center">
                            								<?php echo date_indo($tgl_terbit).' <b>sampai</b> '.date_indo($tgl_expired); ?>
                            							</td>
                            						</tr>
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
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>