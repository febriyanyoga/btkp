<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
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
								<a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1"
								aria-selected="true">Verifikasi</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2"
								aria-selected="false">Validasi Pembayaran 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3"
								aria-selected="false">Pengujian</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4"
								aria-selected="false">Pembayaran 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5"
								aria-selected="false">Validasi Pembayaran 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-6" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6"
								aria-selected="false">Penerbitan</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="base-tab-7" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6"
								aria-selected="false">Data Sertifikasi</a>
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
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Instansi</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($pengujian as $ujian) {
												$progress_tu = $this->GeneralM->get_array_progress_ujian($ujian->id_pengujian)->num_rows();
												if($ujian->status_pengajuan == 'selesai' && $progress_tu == 0){
													$i++;
													$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
													?>
													<tr>
														<td class="text-center"><?php echo $i;?></td>
														<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
														<td class="text-center"><?php echo $ujian->nama_alat?></td>
														<td class="text-center"><?php echo $ujian->merk?></td>
														<td class="text-center"><?php echo $ujian->tipe?></td>
														<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
														<td class="text-center">
															<a href="<?php echo site_url('verifikasiawal/'.$ujian->id_pengujian); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Verifikasi</i>
															</a>
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
							<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
								<div class="table-responsive">
									<table id="myTable2" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Tanggal Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Perusahaan</th>
												<!-- <th class="text-center">Status</th> -->
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($pengujian as $ujian) {
												$ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
												if($ada_status > 0){
													if($ujian->foto_bukti_trf_1 != "" && $ujian->status_pembayaran_1 == ""){
														// $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row();
														$i++;
														$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
														?>
														<tr>
															<td class="text-center"><?php echo $i;?></td>
															<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
															<td class="text-center"><?php echo $ujian->nama_alat?></td>
															<td class="text-center"><?php echo $ujian->merk?></td>
															<td class="text-center"><?php echo $ujian->tipe?></td>
															<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
															<!-- <td class="text-center">status</td> -->
															<td class="text-center">
																<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling-<?php echo $ujian->id_pengujian?>"><i class="la la-pencil"></i>Validasi</i></a>
															</td>
														</tr>

														<div class="modal" id="kode_biling-<?php echo $ujian->id_pengujian?>">
															<div class="modal-dialog modal-md">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Validasi Pembayaran</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<form action="<?php echo site_url('validasi_1'); ?>" method="post">
																		<div class="modal-body">
																			<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $ujian->id_pengujian; ?>">
																			<label for="keterangan" class="label">Bank Transfer : </label>
																			<input type="text" name="nama_bank" value="<?php echo $ujian->nama_bank_1; ?>" class="form-control" required="required" readonly>
																			<label for="keterangan" class="label">Atas Nama : </label>
																			<input type="text" name="atas_nama" value="<?php echo $ujian->atas_nama_1; ?>" class="form-control" required="required" readonly>
																			<label for="" class="label">Foto Bukti Transfer : </label><br>
																			<img style="max-width: 470px;" src="<?php echo base_url().'assets/upload/'.$ujian->foto_bukti_trf_1;?>"><br>
																			<label for="status_pembayaran" class="label">Status Pembayaran : </label>
																			<select class="form-control" name="status_pembayaran_1">
																				<option value="paid">Telah Dibayar</option>
																				<option value="unpaid">Belum Dibayar</option>
																			</select>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																			<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin akan validasi pembayaran ini?')">
																		</div>
																	</form>
																</div>
															</div>
														</div>
														<?php
													}
												}
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
												<th class="text-center">Tanggal Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Perusahaan</th>
												<!-- <th class="text-center">Status</th> -->
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($pengujian as $ujian) {
												$ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
												if($ada_status > 0){
													if($ujian->foto_bukti_trf_1 != "" && $ujian->status_pembayaran_1 != "" && $ujian->file_hasil_pengujian == ""){
														// $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row();
														$i++;
														$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
														?>
														<tr>
															<td class="text-center"><?php echo $i;?></td>
															<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
															<td class="text-center"><?php echo $ujian->nama_alat?></td>
															<td class="text-center"><?php echo $ujian->merk?></td>
															<td class="text-center"><?php echo $ujian->tipe?></td>
															<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
															<!-- <td class="text-center">status</td> -->
															<td class="text-center">
																<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#hasil_uji-<?php echo $ujian->id_pengujian?>"><i class="la la-plus"></i>Hasil Pengujian</i>
																</a>
															</td>
														</tr>

														<div class="modal" id="hasil_uji-<?php echo $ujian->id_pengujian?>">
															<div class="modal-dialog modal-md">
																<div class="modal-content">
																	<div class="modal-header">
																		<h4 class="modal-title">Hasil Pengujian</h4>
																		<button type="button" class="close" data-dismiss="modal">&times;</button>
																	</div>
																	<form action="<?php echo site_url('hasil_uji'); ?>" method="post" enctype="multipart/form-data">
																		<div class="modal-body">
																			<label for="hasil_pengujian" class="label">Unggah Hasil Pengujian : </label>
																			<input type="file" name="hasil_pengujian" value="" class="form-control" required="required">
																			<input type="hidden" name="id_pengujian" value="<?php echo $ujian->id_pengujian?>" class="form-control" required="required">
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
																			<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin akan mengunggah hasil pengujian ini?')">
																		</div>
																	</form>
																</div>
															</div>
														</div>
														<?php
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
												<th class="text-center">Tanggal Pengajuan</th>
												<th class="text-center">Nama Alat</th>
												<th class="text-center">Merk</th>
												<th class="text-center">Tipe</th>
												<th class="text-center">Perusahaan</th>
												<th class="text-center">Status</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i=0;
											foreach ($pengujian as $ujian) {
												$ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
												if($ada_status > 0){
													if($ujian->foto_bukti_trf_1 != "" && $ujian->status_pembayaran_1 != "" && $ujian->file_hasil_pengujian != "" && $ujian->kode_billing_2 == ""){
														// $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row();
                                                        $progress_kasie = $this->GeneralM->get_array_progress_ujian_kasie($ujian->id_pengujian)->num_rows(); //jumlah perizinan yang di acc kasie
                                                        if($progress_kasie > 0){
                                                        	$status_kasie = $this->GeneralM->get_array_progress_ujian_kasie($ujian->id_pengujian)->row()->status;
                                                        	if($status_kasie == 'diterima'){
                                                        		$i++;
                                                        		$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                        		?>
                                                        		<tr>
                                                        			<td class="text-center"><?php echo $i;?></td>
                                                        			<td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
                                                        			<td class="text-center"><?php echo $ujian->nama_alat?></td>
                                                        			<td class="text-center"><?php echo $ujian->merk?></td>
                                                        			<td class="text-center"><?php echo $ujian->tipe?></td>
                                                        			<td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
                                                        			<td class="text-center">status</td>
                                                        			<td class="text-center">
                                                        				<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling2-<?php echo $ujian->id_pengujian; ?>"><i class="la la-plus"></i>Kode Billing</i>
                                                        				</a>
                                                        			</td>
                                                        		</tr>

                                                        		<div class="modal" id="kode_biling2-<?php echo $ujian->id_pengujian; ?>">
                                                        			<div class="modal-dialog modal-md">
                                                        				<div class="modal-content">
                                                        					<div class="modal-header">
                                                        						<h4 class="modal-title">Masukkan Kode Billing</h4>
                                                        						<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        					</div>
                                                        					<form action="<?php echo site_url('kode_billing_2'); ?>" method="post">
                                                        						<div class="modal-body">
                                                        							<label for="kode_billing_2" class="label">Kode Billing : </label>
                                                        							<input type="number" name="kode_billing_2" value="" class="form-control" placeholder="Masukkan kode billing" required="required">
                                                        							<label for="bank_btkp_2" class="label">Bank BTKP : </label>
                                                        							<select class="form-control" name="id_bank_btkp_2">
                                                        								<option value="">---Pilih Bank---</option>
                                                        								<?php
                                                        								foreach ($bank_btkp as $bank ) {
                                                        									?>
                                                        									<option value="<?php echo $bank->id_bank_btkp?>"><?php echo $bank->nama_bank?></option>
                                                        									<?php
                                                        								}
                                                        								?>
                                                        							</select>

                                                        							<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $ujian->id_pengujian; ?>">
                                                        							<label for="jumlah_tagihan" class="label">Jumlah Tagihan: </label>
                                                        							<input type="number" name="jumlah_tagihan2" value="" class="form-control" placeholder="Masukkan Jumlah Tagihan" required="required">
                                                        							<label for="masa_berlaku_billing_2" class="label">Masa Berlaku Sampai: </label>
                                                        							<input type="date" name="masa_berlaku_billing_2" value="" class="form-control" placeholder="Masukkan Masa Berlaku" required="required">

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
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="base-tab-5">
                            	<div class="table-responsive">
                            		<table id="myTable5" class="table mb-0">
                            			<thead>
                            				<tr>
                            					<th class="text-center">No</th>
                            					<th class="text-center">Tanggal Pengajuan</th>
                            					<th class="text-center">Nama Alat</th>
                            					<th class="text-center">Merk</th>
                            					<th class="text-center">Tipe</th>
                            					<th class="text-center">Perusahaan</th>
                            					<th class="text-center">Status</th>
                            					<th class="text-center">Aksi</th>
                            				</tr>
                            			</thead>
                            			<tbody>

                            				<tr>
                            					<td class="text-center">1</td>
                            					<td class="text-center">21 November 2018</td>
                            					<td class="text-center">Life Jacket</td>
                            					<td class="text-center">Samsung</td>
                            					<td class="text-center">67A</td>
                            					<td class="text-center">PT. AAA</td>
                            					<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
                            					<td class="text-center">
                            						modal validasi podo karo pengujian
                            						<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-pencil"></i>Validasi</i>
                            						</a>
                            					</td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            </div>
                            <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="base-tab-6">
                            	<div class="table-responsive">
                            		<table id="myTable6" class="table mb-0">
                            			<thead>
                            				<tr>
                            					<th class="text-center">No</th>
                            					<th class="text-center">Tanggal Pengajuan</th>
                            					<th class="text-center">Nama Alat</th>
                            					<th class="text-center">Merk</th>
                            					<th class="text-center">Tipe</th>
                            					<th class="text-center">Perusahaan</th>
                            					<th class="text-center">Status</th>
                            					<th class="text-center">Aksi</th>
                            				</tr>
                            			</thead>
                            			<tbody>

                            				<tr>
                            					<td class="text-center">1</td>
                            					<td class="text-center">21 November 2018</td>
                            					<td class="text-center">Life Jacket</td>
                            					<td class="text-center">Samsung</td>
                            					<td class="text-center">67A</td>
                            					<td class="text-center">PT. AAA</td>
                            					<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
                            					<td class="text-center">
                            						modal penerbitan podo karo pengujian
                            						ditambah 2 field = no.mulai , no. akhir
                            						<a href="" class="btn btn-primary btn-md" data-toggle="modal" data-target="#kode_biling"><i class="la la-pencil"></i>Penerbitan</i>
                            						</a>
                            					</td>
                            				</tr>
                            			</tbody>
                            		</table>
                            	</div>
                            </div>
                            <div class="tab-pane fade" id="tab-7" role="tabpanel" aria-labelledby="base-tab-7">
                            	<div class="table-responsive">
                            		<table id="myTable7" class="table mb-0">
                            			<thead>
                            				<tr>
                            					<th class="text-center">No</th>
                            					<th class="text-center">Tanggal Pengajuan</th>
                            					<th class="text-center">Nama Alat</th>
                            					<th class="text-center">Merk</th>
                            					<th class="text-center">Tipe</th>
                            					<th class="text-center">Perusahaan</th>
                            					<th class="text-center">Status</th>
                            					<th class="text-center">Masa Berlaku</th>
                            				</tr>
                            			</thead>
                            			<tbody>

                            				<tr>
                            					<td class="text-center">1</td>
                            					<td class="text-center">21 November 2018</td>
                            					<td class="text-center">Life Jacket</td>
                            					<td class="text-center">Samsung</td>
                            					<td class="text-center">67A</td>
                            					<td class="text-center">PT. AAA</td>
                            					<td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small success">Diterima</span></span></td>
                            					<td class="text-center">
                            						22 Desember 2018- 22 Desember 2019
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
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>