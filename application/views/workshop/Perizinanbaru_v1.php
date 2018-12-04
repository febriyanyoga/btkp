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
							<div id="rootwizard">
								<div class="step-container">
									<div class="step-wizard">
										<div class="progress">
											<div class="progressbar" id="progressbar"></div>
										</div>
										<ul>
											<li>
												<a href="<?php echo site_url('izin_baru')?>">
													<span class="step">1</span>
													<span class="title">Step 1</span>
												</a>
											</li>
											<li>
												<a href="<?php echo site_url('izin_baru2')?>">
													<span class="step">2</span>
													<span class="title">Step 2</span>
												</a>
											</li>
											<li>
												<a href="<?php echo site_url('izin_baru3')?>">
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
										<form action="<?php echo site_url('post_izin_baru1')?>" method="post">
											<div class="section-title mt-5 mb-5">
												<h4>IDENTITAS SERVICE STATION</h4>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-12 mb-3">
													<label class="form-control-label"><b>NAMA PERUSAHAAN</b> <i>(PUSAT / CABANG)</i><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
												</div>
												<div class="col-xl-12 mb-3">
													<label class="form-control-label"><b>ALAMAT KANTOR PERUSAHAAN</b><span class="text-danger ml-2">*</span></label>
													<textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" rows="3" cols="50" required ></textarea>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>PROPINSI</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="propinsi_pt" name="propinsi_pt" required >
														<option>-----Pilih Provinsi-----</option>
														<?php
														foreach ($provinsi as $prov) {
															?>
															<option value="<?php echo $prov['id_propinsi']?>"><?php echo $prov['nama_propinsi'];?></option>
															<?php
														}
														?>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KABUPATEN/KOTA</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kab_pt" name="kab_pt" required >
														<option>-----Pilih Kabupaten/Kota-----</option>
														
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KECAMATAN</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kecamatan_pt" name="kecamatan_pt" required >
														<option>-----Pilih Kecamatan-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KELURAHAN</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kelurahan_pt" name="kelurahan_pt" required >
														<option>-----Pilih Kelurahan-----</option>
													</select>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-12 mb-3">
													<label class="form-control-label"><b>ALAMAT WORKSHOP / SERVICE STATION</b> <span class="text-danger ml-2">*</span></label>
													<textarea class="form-control" rows="3" cols="50" id="alamat_workshop" name="alamat_workshop" required ></textarea>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>PROPINSI</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="propinsi_ws" name="propinsi_ws" required >
														<option>-----Pilih Provinsi-----</option>
														<?php
														foreach ($provinsi as $prov) {
															?>
															<option value="<?php echo $prov['id_propinsi']?>"><?php echo $prov['nama_propinsi'];?></option>
															<?php
														}
														?>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KABUPATEN/KOTA</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kab_ws" name="kab_ws" required >
														<option>-----Pilih Kabupaten/Kota-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KECAMATAN</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kecamatan_ws" name="kecamatan_ws" required >
														<option>-----Pilih Kecamatan-----</option>
													</select>
												</div>
												<div class="col-xl-3 mb-3">
													<label class="form-control-label"><b>KELURAHAN</b><span class="text-danger ml-2">*</span></label>
													<select class="form-control" id="kelurahan_ws" name="kelurahan_ws" required >
														<option>-----Pilih Kelurahan-----</option>
													</select>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>AKTA PENDIRIAN PERUSAHAAN </b><i>(Nomor / Tanggal)</i> <span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="akta_perusahaan" name="akta_perusahaan" required >
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>PEMIMPIN / PENANGGUNG JAWAB </b><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="nama_pimpinan" name="nama_pimpinan" required >
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>NOMOR POKOK WAJIB PAJAK </b><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="npwp" name="npwp" required >
												</div>
											</div>
											<div class="section-title mt-5 mb-5">
												<h4>Kontak</h4>
											</div>
											<div class="form-group row mb-5">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">NOMOR HP</label>
													<div class="input-group">
														<span class="input-group-addon addon-secondary">
															<i class="la la-phone"></i>
														</span>
														<input type="number" class="form-control" value="" id="no_tlp" name="no_tlp">
													</div>
												</div>
												<div class="col-xl-6">
													<label class="form-control-label">ALAMAT E-MAIL<span class="text-danger ml-2">*</span></label>
													<input type="email" value="" class="form-control" id="email_perusahaan" name="email_perusahaan" required >
												</div>
											</div>
											<div class="section-title mt-5 mb-5">
												<h4>Jenis Permohonan Izin SPK</h4>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6">
													<label class="form-control-label">Jenis Perizinan Alat Keselamatan<span class="text-danger ml-2">*</span></label>
													<select class="custom-select form-control" id="jenis_alat" name="jenis_alat" required >
														<?php
														foreach ($jenis_alat as $alat) {
															?>
															<option value="<?php echo $alat->id_jenis_alat?>"><?php echo $alat->nama_alat?></option>
															<?php
														}
														?>
													</select>
												</div>
												<input type="hidden" value="1" class="form-control" id="jenis_perizinan" name="jenis_perizinan" required >
											</div>
											<ul class="pager wizard text-right">
												<li class="d-inline-block">
													<input type="submit" name="submit" class="btn btn-gradient-01" value="Simpan">
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
.panjang{
	width: 33.333%;
}
</style>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tab1').addClass('active show');
		$("#progressbar").addClass('panjang');
	});
</script>