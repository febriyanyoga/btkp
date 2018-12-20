<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4>SERTIFIKASI</h4>
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
										<form action="<?php echo site_url('post_type_approval1')?>" method="post">
											<div class="section-title mt-5 mb-3">
												<h4 class="text-center">DATA PEMOHON</h4>
												<hr>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>JENIS INSTANSI</b><span class="text-danger ml-2">*</span></label>
													<input type="text" value="<?php echo $pengguna->nama_jabatan?>" class="form-control" id="nama_jabatan" name="nama_jabatan" required readonly>
													<input type="hidden" value="<?php echo $this->session->userdata('id_pengguna')?>" class="form-control" id="id_pengguna" name="id_pengguna" required readonly>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>NAMA INSTANSI</b><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>ALAMAT INSTANSI</b><span class="text-danger ml-2">*</span></label>
													<textarea class="form-control" id="alamat_perusahaan" name="alamat_perusahaan" rows="3" cols="50" required ></textarea>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>TELEPON INSTANSI</b><span class="text-danger ml-2">*</span></label>
													<input type="number" value="" class="form-control" id="no_tlp" name="no_tlp" required>
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
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>EMAIL INSTANSI</b><span class="text-danger ml-2">*</span></label>
													<input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" required >
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>FAX</b><span class="text-danger ml-2">*</span></label>
													<input type="number" value="" class="form-control" id="fax" name="fax" required>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>NAMA PEMOHON</b><span class="text-danger ml-2">*</span></label>
													<input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" required value="<?php echo $pengguna->nama_pengguna?>" readonly>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>JABATAN PEMOHON</b><span class="text-danger ml-2">*</span></label>
													<input type="text" value="" class="form-control" id="jabatan_pemohon" name="jabatan_pemohon" value="<?php echo $pengguna->jabatan_pemohon;?>" required>
												</div>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>TELEPON PEMOHON</b><span class="text-danger ml-2">*</span></label>
													<input type="number" class="form-control" id="no_hp" name="no_hp" required value="<?php echo $pengguna->no_hp?>" readonly>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label"><b>EMAIL PEMOHON</b><span class="text-danger ml-2">*</span></label>
													<input type="email" value="<?php echo $pengguna->email_pengguna?>" class="form-control" id="email_pengguna" name="email_pengguna" required readonly>
												</div>
											</div>
											<ul class="pager wizard text-right">
												<li class="d-inline-block">
													<input type="submit" name="submit" class="btn btn-gradient-01" value="Simpan" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
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