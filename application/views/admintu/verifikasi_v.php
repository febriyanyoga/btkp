<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<!-- Begin Invoice -->
			<div class="invoice has-shadow">
				<!-- Begin Invoice COntainer -->
				<div class="invoice-container">
					<!-- Begin Invoice Top -->
					<div class="invoice-top">
						<div class="row d-flex align-items-center">
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
								<div class="actions dark">
									<div class="dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
											<i class="la la-ellipsis-h"></i>
										</button>
										<div class="dropdown-menu">
											<a href="#" class="dropdown-item">
												<i class="la la-print"></i>Print
											</a>
											<a href="#" class="dropdown-item">
												<i class="la la-download"></i>Download
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 text-center">
								<h2>Permohonan Perizinan Surat Persetujuan Kewenangan (SPK)</h2>
							</div>
						</div>
					</div>
					<!-- End Invoice Top -->
					<!-- Begin Invoice Header -->
					<div class="invoice-header">
						<?php
						print_r($id_perizinan);
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
						<form action="<?php echo site_url('persetujuan')?>" method="post" id="form-input-acc">
							<div id="accordion-icon-right" class="accordion">
								<?php
								foreach ($detail_perizinan as $per) {
									?>

									<div class="widget has-shadow">
										<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne"
										aria-expanded="true">
										<div class="card-title w-100"> <b>1. Identitas Service Station</b></div>
									</a>
									<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="1">
													<label for="1">Nama Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<?php
											$alamat_pt_detail = $this->WorkshopM->detail_alamat($per->id_kel_perusahaan)->row();
											$alamat_ws_detail = $this->WorkshopM->detail_alamat($per->id_kel_workshop)->row();
											?>
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="2">
													<label for="2">Alamat Kantor Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="3">
													<label for="3">Alamat Workshop/Service Station </label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->alamat_workshop.'<br>'.$alamat_ws_detail->nama_kelurahan.', '.$alamat_ws_detail->nama_kecamatan.', '.$alamat_ws_detail->nama_kabupaten_kota.', '.$alamat_ws_detail->nama_propinsi;?> </div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="4">
													<label for="4">Akta Pendirian Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->akta_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="5">
													<label for="5">Pemimpin/Penanggung Jawab</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_pimpinan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" <?php if($per->no_tlp!=""){echo 'checked';}?> name="checkbox" required id="6">
													<label for="6">Nomor Telepon Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->no_tlp?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="7">
													<label for="7">Email Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->email_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="8">
													<label for="8">NPWP</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->npwp?></div>
										</div>

									</div>
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
										<div class="card-title w-100">2. Permohonan SPK</div>
									</a>
									<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Jenis SPK</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_alat?></div>
										</div>
										<?php
										if($per->nama_jenis_izin == "Perpanjang"){
											?>
											<div class="form-group row mb-5">
												<div class="col-xl-4">
													<div class="styled-checkbox">
														<input type="checkbox" checked name="checkbox" required id="10">
														<label for="10">Nomor SPK Lama</label>
													</div>
												</div>
												<div class="col-xl-8">BHSJADKTYUIO</div>
											</div>
											<?php
										}
										?>

									</div>
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
										<div class="card-title w-100">3. Dokumen Pendukung</div>
									</a>
									<div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
										<?php
										$detail_berkas = $this->TatausahaM->get_berkas_by_id($per->id_perizinan)->result();
									// print_r($detail_berkas);
										$i=11;
										foreach ($detail_berkas as $ber) {
											?>
											<div class="form-group row mb-5">
												<div class="col-xl-4">
													<div class="styled-checkbox">
														<input type="checkbox" name="checkbox" required checked="" id="<?php echo $i?>">
														<label for="<?php echo $i?>"><?php echo $ber->nama_berkas?></label>
													</div>
												</div>
												<div class="col-xl-8">
													<a target="_blank" href="<?php echo base_url().'assets/upload/'.$ber->nama_file;?>" class="btn btn-primary btn-sm mr-1 mb-2"><i class="la la-eye"></i>Lihat Dokumen</i></a>
												</div>
											</div>
											<?php
											$i++;
										}
										?>
									</div>
									<div style="display: none;">
										<input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna');?>">
										<input type="hidden" name="id_perizinan" value="<?php echo $per->id_perizinan;?>">
										<input type="hidden" name="keterangan" value="Berkas Lengkap">
										<input type="hidden" name="status" value="diterima">
									</div>
									<div class="text-right">
										<a href="" id="btn-tidak-lengkap" class="btn btn-danger mr-1 mb-2" data-toggle="modal" data-target="#izin_berkas">Tidak Lengkap</a>
										<input type="submit" name="submit" id="btn-lengkap" class="btn btn-success mr-1 mb-2" value="Lengkap" onClick="return confirm('Anda berkas yang dibutuhkan sudah lengkap?')">
									</div>
									<?php
								}
								?>
							</div>
						</form>
					</div>
				</div>
				<!-- End Invoice Header -->
				<!-- End Table -->
			</div>
			<!-- End Invoice Container -->
			<!-- Begin Invoice Footer -->
			<!-- End Invoice Footer -->
		</div>
	</div>
</div>
</div>

<div class="modal" id="izin_berkas">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Persetujuan Perizinan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('persetujuan')?>" method="post">
				<div class="modal-body">
					<label for="keterangan" class="label">Keterangan : </label>
					<input type="text" name="keterangan" value="" class="form-control" placeholder="keterangan" required="required">
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna');?>" >
					<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $id_perizinan;?>">
					<input type="hidden" name="status" class="form-control" placeholder="keterangan" value="ditolak" required="required">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
				</div>
			</form>
		</div>
	</div>
</div>