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
								<h2>Verifikasi Permohonan Pengujian Alat Keselamatan Baru</h2>
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
					<div class="invoice-header">
						<?php
						$data = $this->session->flashdata('sukses');
						if ($data != '') {
							?>
							<div class="alert alert-success">
								<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
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
								<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
								<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
								<?=$data2; ?>
							</div>
							<?php
						}
						?>
						<div id="accordion-icon-right" class="accordion">
							<div class="widget has-shadow">
								<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne"
								aria-expanded="true">
								<div class="card-title w-100"> <b>1. Data Pemohon</b></div>
							</a>
							<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="1">
											<label for="1">Jenis Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->nama_jabatan?></div>
								</div>
								<div class="form-group row mb-5">

									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="2">
											<label for="2">Nama Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->nama_perusahaan?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required>
											<?php
											$alamat_pt_detail = $this->WorkshopM->detail_alamat($pengujian->id_kel_perusahaan)->row();
											?>
											<label for="3">Alamat Instansi </label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="4">
											<label for="4">Telepon Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->no_tlp?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="5">
											<label for="5">Fax Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->fax?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="5">
											<label for="5">Email Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->email_perusahaan?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="6">
											<label for="6">Nomor Telepon Pemohon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->no_hp?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="7">
											<label for="7">Jabatan Pemohon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->jabatan_pengguna?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="8">
											<label for="8">Email Pemohon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->email_pengguna?></div>
								</div>

							</div>
							<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
								<div class="card-title w-100">2. Data Perangkat</div>
							</a>
							<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Nama Alat</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->nama_alat?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Merk</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->merk?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Model/Tipe</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->tipe?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Negara Pembuat</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->negara_asal?></div>
								</div>
								<?php
								if($pengujian->negara_asal == 'Indonesia' || $pengujian->negara_asal == 'indonesia'){
									$alamat_p_detail = $this->WorkshopM->detail_alamat($pengujian->id_kel_pabrikan)->row();
									?>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="50">
												<label for="50">Alamat Pabrikan</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->alamat_pabrikan.'<br>'.$alamat_p_detail->nama_kelurahan.', '.$alamat_p_detail->nama_kecamatan.', '.$alamat_p_detail->nama_kabupaten_kota.', '.$alamat_p_detail->nama_propinsi;?></div>
									</div>
									<?php
								}else{
									?>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="50">
												<label for="50">Alamat Pabrikan</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->alamat_pabrikan?></div>
									</div>
									<?php
								}
								?>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Pabrik Pembuat</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->pabrikan?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Telepon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->telepon?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Email</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->email_pabrikan?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Fax</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $pengujian->fax_pabrikan?></div>
								</div>
							</div>
							<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
								<div class="card-title w-100">3. Hasil Survey</div>
							</a>
							<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
								<div class="form-group row mb-5">
									<div class="col-xl-8">
										<div class="form-group">
											<label for="upload">Dokumen Hasil Survey</label><br>
											<a class="btn btn-md btn-primary" href="<?php echo base_url().'assets/img/hasil_uji/'.$pengujian->file_hasil_pengujian?>" target="_BLANK">Lihat Dokumen</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<form action="<?php echo site_url('verifikasi_akhir')?>" method="POST">
							<div>
								<input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna');?>">
								<input type="hidden" name="id_pengujian" value="<?php echo $pengujian->id_pengujian;?>">
								<input type="hidden" name="keterangan" value="Verifikasi Akhir Lengkap">
								<input type="hidden" name="status" value="diterima">
							</div>
							<div class="text-right">
								<a href="" id="btn-tidak-lengkap" class="btn btn-danger mr-1 mb-2" data-toggle="modal" data-target="#izin_berkas">Tidak Lolos</a>
								<input type="submit" name="submit" value="Lolos" class="btn btn-success mr-1 mb-2" onClick="return confirm('Anda yakin telah menyetujui ini?')">
							</div>
						</form>
					</div>
				</div>
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
			<form action="<?php echo site_url('verifikasi_akhir')?>" method="post">
				<div class="modal-body">
					<label for="keterangan" class="label">Keterangan : </label>
					<textarea name="keterangan" value="" class="form-control" placeholder="keterangan" required="required"></textarea>
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>">
					<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $pengujian->id_pengujian; ?>">
					<input type="hidden" name="status" class="form-control" placeholder="status" value="ditolak" required="required">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
				</div>
			</form>
		</div>
	</div>
</div>
