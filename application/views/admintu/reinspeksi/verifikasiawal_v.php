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
								<h2>Verifikasi Permohonan Re Inspeksi</h2>
							</div>
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
								<div class="card-title w-100"> 1. Data Workshop</div>
							</a>
							<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">

								<div class="form-group row mb-5">

									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="2">
											<label for="2">Nama Instansi</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->nama_perusahaan?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="3">
											<label for="3">Alamat Instansi </label>
										</div>
									</div>
									<?php
									$alamat_ws = $this->WorkshopM->detail_alamat($ins->id_kel_workshop)->row();
									?>
									<div class="col-xl-8"><?php echo $ins->alamat_perusahaan.'<br>'.$alamat_ws->nama_kelurahan.', '.$alamat_ws->nama_kecamatan.', '.$alamat_ws->nama_kabupaten_kota.', '.$alamat_ws->nama_propinsi;?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="4">
											<label for="4">Telepon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->no_tlp?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="5">
											<label for="5">email</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->email_perusahaan?></div>
								</div>
							</div>
							<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
								<div class="card-title w-100">2. Data Kapal</div>
							</a>
							<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9"><?php echo $ins->nama_kapal?></label>
										</div>
									</div>
									<div class="col-xl-8"> asd</div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Flag</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->flag?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">IMO No</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->imo?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Telepon</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->telp_kapal?></div>
								</div>
							</div>

							<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapse3">
								<div class="card-title w-100">3. Data Alat</div>
							</a>
							<div id="IconRightCollapse3" class="card-body collapse" data-parent="#accordion-icon-right">
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Alat Keselamatan</label>
										</div>
									</div>
									<div class="col-xl-8"> <?php echo $ins->nama_alat?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="9">
											<label for="9">Jumlah</label>
										</div>
									</div>
									<div class="col-xl-8"><?php echo $ins->jumlah_alat?></div>
								</div>
								<div class="form-group row mb-5">
									<div class="col-xl-4">
										<div class="styled-checkbox">
											<input type="checkbox" checked name="checkbox" required id="10">
											<label for="10">Surat Permohonan</label>
										</div>
									</div>
									<div class="col-xl-8">
										<a target="_blank" href="<?php echo base_url().'assets/upload/'.$ins->file_permohonan;?>" class="btn btn-primary btn-sm mr-1 mb-2"><i class="la la-eye"></i>Lihat Dokumen</i></a>
									</div>
								</div>
							</div>
							<form action="<?php echo site_url('post_verif_ins')?>" method="post" id="form-input-acc">
								<input type="hidden" name="keterangan" value="Lengkap Lolos" class="form-control" placeholder="keterangan">
								<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>">
								<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
								<input type="hidden" name="status" class="form-control" placeholder="keterangan" value="diterima" required="required">


								<input type="hidden" name="nomor" value="<?php echo 'RI'.$ins->id_inspeksi.$ins->kode_alat;?>">
								<input type="hidden" name="email_pengguna" value="<?php echo $ins->email_pengguna;?>">
								<input type="hidden" name="nama_pengguna" value="<?php echo $ins->nama_pengguna;?>">

								<div class="text-right">
									<a href="" id="btn-tidak-lengkap" class="btn btn-danger mr-1 mb-2" data-toggle="modal" data-target="#izin_berkas">Tolak</a>
									<input type="submit" name="submit" id="btn-lengkap" class="btn btn-success mr-1 mb-2" value="Konfirmasi" onClick="return confirm('Anda yakin berkas yang dibutuhkan sudah lengkap?')">
								</div>
							</form>
						</div>
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
			<form action="<?php echo site_url('post_verif_ins')?>" method="post">
				<div class="modal-body">
					<label for="keterangan" class="label">Keterangan</label>
					<input type="text" name="keterangan" value="" class="form-control" placeholder="keterangan">
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>">
					<input type="hidden" name="id_inspeksi" class="form-control" required="required" value="<?php echo $ins->id_inspeksi; ?>">
					<input type="hidden" name="status" class="form-control" placeholder="keterangan" value="ditolak" required="required">

					<input type="hidden" name="nomor" value="<?php echo 'RI'.$ins->id_inspeksi.$ins->kode_alat;?>">
					<input type="hidden" name="email_pengguna" value="<?php echo $ins->email_pengguna;?>">
					<input type="hidden" name="nama_pengguna" value="<?php echo $ins->nama_pengguna;?>">

				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
				</div>
			</form>
		</div>
	</div>
</div>