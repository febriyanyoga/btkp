<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4>Perizinan Baru</h4>
				</div>
				<div class="widget-body">
					<div class="row flex-row justify-content-center">
						<div class="col-xl-10">
							<div>
								<div class="step-container">
									<div class="step-wizard">
										<div class="progress" style="top:36px;">
											<div class="progressbar" id="progressbar" style="width: 33%;"></div>
										</div>
										<ul>
											<li>
												<a href="" class="active show">
													<span class="step">1</span>
													<span class="title">Step 1</span>
												</a>
											</li>
											<li>
												<a href="">
													<span class="step">2</span>
													<span class="title">Step 2</span>
												</a>
											</li>
											<li>
												<a href="">
													<span class="step">3</span>
													<span class="title">Step 3</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div>
									<div id="tab1" class="">
										<?php
										$data=$this->session->flashdata('sukses');
										if($data!=""){ 
											?>
										<div class="alert alert-success">
											<button style="position: relative;" type="button" class="close"
												data-dismiss="alert" aria-label="Close"> <span
													aria-hidden="true"></span></button>
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
											<button style="position: relative;" type="button" class="close"
												data-dismiss="alert" aria-label="Close"> <span
													aria-hidden="true"></span></button>
											<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
											<?=$data2;?>
										</div>
										<?php 
										} 
										?>
										<form action="<?php echo site_url('post_izin_baru1')?>" method="post">
											<div class="section-title mt-5 mb-5">
												<h4 class="text-center">IDENTITAS SERVICE STATION</h4>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-12 mb-3">
													<label class="form-control-label">1. NAMA PERUSAHAAN <i>(PUSAT /
															CABANG)</i><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control"
														id="nama_perusahaan" name="nama_perusahaan" required
														placeholder="Contoh : PT Perusahaan, CV Perusahaan">
												</div>
												<div class="col-xl-12 mb-3">
													<label class="form-control-label">2. ALAMAT KANTOR PERUSAHAAN<span
															class="text-danger ml-2">*</span></label>
													<textarea class="form-control" id="alamat_perusahaan"
														name="alamat_perusahaan" rows="3" cols="50" required
														placeholder="Contoh : Jalan Ir. Soekarno No. 11, RT01/RW07; Maksimal : 60 Karakter"
														maxlength="60"></textarea>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">PROPINSI<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="propinsi_pt" name="propinsi_pt"
														required>
														<option>-----Pilih Provinsi-----</option>
														<?php
														foreach ($provinsi as $prov) {
															?>
														<option value="<?php echo $prov['id_propinsi']?>">
															<?php echo $prov['nama_propinsi'];?></option>
														<?php
														}
														?>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KABUPATEN/KOTA<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kab_pt" name="kab_pt" required>
														<option>-----Pilih Kabupaten/Kota-----</option>

													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KECAMATAN<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kecamatan_pt" name="kecamatan_pt"
														required>
														<option>-----Pilih Kecamatan-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KELURAHAN<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kelurahan_pt" name="kelurahan_pt"
														required>
														<option>-----Pilih Kelurahan-----</option>
													</select>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-12 mb-3">
													<label class="form-control-label">3. ALAMAT WORKSHOP / SERVICE
														STATION <span class="text-danger ml-2">*</span></label>
													<div class="col-xl-4">
														<div class="styled-checkbox">
															<input type="checkbox" name="checkbox" id="sama">
															<label for="sama"><strong>Sama dengan alamat
																	perusahaan</strong> <i>(Silahkan Checklist jika
																	alamat sama)</i></label>
														</div>
													</div>
													<textarea class="form-control" rows="3" cols="50"
														id="alamat_workshop" name="alamat_workshop" required
														placeholder="Contoh : Jalan Moh. Hatta No. 11, RT01/RW07; Maksimal : 60 Karakter"
														maxlength="60"></textarea>
												</div>
											</div>
											<div class="form-group row mb-3" id="all_alamat_ws">
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">PROPINSI<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="propinsi_ws" name="propinsi_ws"
														required>
														<option>-----Pilih Provinsi-----</option>
														<?php
														foreach ($provinsi as $prov) {
															?>
														<option value="<?php echo $prov['id_propinsi']?>">
															<?php echo $prov['nama_propinsi'];?></option>
														<?php
														}
														?>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KABUPATEN/KOTA<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kab_ws" name="kab_ws" required>
														<option>-----Pilih Kabupaten/Kota-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KECAMATAN<span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kecamatan_ws" name="kecamatan_ws"
														required>
														<option>-----Pilih Kecamatan-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label">KELURAHAN><span
															class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kelurahan_ws" name="kelurahan_ws"
														required>
														<option>-----Pilih Kelurahan-----</option>
													</select>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">4. AKTA PENDIRIAN
														PERUSAHAAN<i>(Nomor / Tanggal)</i> <span
															class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control"
														id="akta_perusahaan" name="akta_perusahaan" required
														placeholder="Contoh : 001/01-01-1991">
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">5. PEMIMPIN / PENANGGUNG JAWAB
														<span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="nama_pimpinan"
														name="nama_pimpinan" required>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">6. NOMOR POKOK WAJIB PAJAK <span
															class="text-danger ml-2">*</span></label>
													<input type="number" value="" class="form-control" id="npwp"
														name="npwp" required placeholder="Contoh : 1234567890">
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">7. NOMOR TDP <span
															class="text-danger ml-2">*</span></label>
													<input type="number" value="" class="form-control" id="no_tdp"
														name="no_tdp" required placeholder="Contoh : 1234567890">
												</div>
											</div>
											<div class="section-title mt-5 mb-5">
												<h4 class="text-center">KONTAK</h4>
											</div>
											<div class="form-group row mb-5">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">8. NOMOR HP</label>
													<div class="input-group">
														<span class="input-group-addon addon-secondary">
															<i class="la la-phone"></i>
														</span>
														<input type="number" class="form-control" value="" id="no_tlp"
															name="no_tlp" placeholder="Contoh : 08123456789">
													</div>
												</div>
												<div class="col-xl-6">
													<label class="form-control-label">9. ALAMAT E-MAIL<span
															class="text-danger ml-2">*</span></label>
													<div class="input-group">
														<span class="input-group-addon addon-secondary">
															<i class="la la-envelope"></i>
														</span>
														<input type="email" value="" class="form-control"
															id="email_perusahaan" name="email_perusahaan" required
															placeholder="Contoh : contoh@mail.com">
													</div>
												</div>
											</div>
											<ul class="pager wizard text-right">
												<li class="d-inline-block">
													<input type="submit" name="submit" class="btn btn-gradient-01"
														value="Simpan"
														onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
												</li>
											</ul>
										</form>
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
<!-- End Form -->
</div>
</div>
</div>
<!-- End Row -->
<style type="text/css">
	.panjang {
		width: 33.333%;
	}

</style>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#tab1').addClass('active show');
		$("#progressbar").addClass('panjang');
	});

</script>
