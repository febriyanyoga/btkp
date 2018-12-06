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
											<div class="progressbar" style="width: 67%;"></div>
										</div>
										<ul>
											<li>
												<a href="">
													<span class="step">1</span>
													<span class="title">Step 1</span>
												</a>
											</li>
											<li>
												<a href="" class="active show">
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
										<div class="section-title mt-5 mb-5">
											<h4>Lampiran Dokumen Pendukung</h4>
										</div>
										<form action="<?php echo site_url('post_berkas')?>" enctype="multipart/form-data" method="post">
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
											<div class="form-group row mb-3">
												<?php 
												$i=0;
												foreach ($berkas as $ber) {
													$i++;
													?>
													<!-- <input type="hidden" name="id_perizinan" id="id_perizinan" value="<?php echo $id_perizinan?>"> -->
													<input type="hidden" name="id_berkas_perizinan<?php echo $i;?>" id="id_berkas_perizinan<?php echo $i;?>" value="<?php echo $ber->id_berkas_perizinan;?>">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label"><?php echo $ber->nama_berkas?><span class="text-danger ml-2">*</span></label>
														<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Akta Pendirian Perusahaan harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya" data-original-title="" title="">
															Syarat
														</i>
														<div class="custom-file">
															<!-- <input type="file" class="custom-file-input" id="files<?php echo $i?>" name="files<?php echo $i?>"> -->
															<input type="file" name="files<?php echo $i?>" class="form-control" required>
															<!-- <label class="custom-file-label" for="files<?php echo $i?>">Pilih berkas</label> -->
														</div>
													</div>
													<?php
												}
												?>
												<!-- <div class="col-xl-6 mb-3">
													<label class="form-control-label">Akta Pendirian Perusahaan <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Akta Pendirian Perusahaan harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya" data-original-title="" title="">
														Syarat
													</i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Surat Ijin Perdagangan (SIUP) <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Surat Ijin Perdagangan (SIUP) harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya;" data-original-title="" title="">
														Syarat
													</i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Tanda Daftar Perusahaan (TDP) <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Tanda Daftar Perusahaan (TDP) harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya (bila Perusahaan Cabang : TDP CABANG yang dilampirkan)" data-original-title="" title="">
														Syarat
													</i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Nomor Pokok Wajib Pajak (NPWP) <span class="text-danger ml-2">*</span></label>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Surat Keterangan Domisili Perusahaan <span class="text-danger ml-2">*</span></label>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Sertifikat Tenaga Teknisi <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Sertifikat Tenaga Teknisi dari pabrikan alat keselamatan pelayaran (ILR, PMK, Lifeboat, EPIRB dan MES)" data-original-title="" title="">
														Syarat
													</i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Denah bengkel  <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Denah bengkel pemeliharaan untuk Inflatable Liferaft (ILR), Pemadam Kebakaran (PMK) Portable & CO2 System & Lifeboat & Davit" data-original-title="" title="">
														Syarat
													</i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Daftar Peralatan Kerja <span class="text-danger ml-2">*</span></label>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Surat Kepemilikan Workshop  <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content=
													"Surat Kepemilikan Workshop •Milik Sendiri (Sertifikat), •Sewa/Kontrak (Surat Perjanjian)" data-original-title="" title=""></i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Surat Rekomendasi  <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content=
													"Surat Rekomendasi dari Syahbandar Utama/KSOP/KANPEL/Kepala UPP setempat (Khusus SPK Baru);" data-original-title="" title=""></i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div>
												<div class="col-xl-6 mb-3">
													<label class="form-control-label">Foto-foto   <span class="text-danger ml-2">*</span></label>
													<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Foto-foto (Ruang service, Administrasi, Peralatan dan gedung)" data-original-title="" title=""></i>
													<div class="custom-file">
														<input type="file" class="custom-file-input" id="customFile">
														<label class="custom-file-label" for="customFile">Choose file</label>
													</div>
												</div> -->
											</div>
											<ul class="pager wizard text-right">
												<!-- <li class="previous d-inline-block">
													<button onclick="window.location.href='<?php echo site_url('izin_baru')?>'" type="button" name="back" class="btn btn-rounded btn-secondary ripple">Kembali</button>
												</li> -->
												<li class="next d-inline-block">
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
		<!-- End Form -->
	</div>
</div>
</div>
<!-- End Row -->
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tab1').addClass('active show');
		// $("#progressbar").addClass('panjang');
	});
</script>
