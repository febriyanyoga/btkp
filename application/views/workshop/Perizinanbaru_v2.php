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
										<form action="<?php echo site_url('post_berkas_w')?>" enctype="multipart/form-data" method="post">
											<div class="section-title mt-5 mb-5">
												<h4>Lampiran Dokumen Pendukung</h4>
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
												<div class="col-xl-6">
													<label class="form-control-label">Maker<span class="text-danger ml-2">*</span></label>
													<select class="custom-select form-control" id="id_maker" name="id_maker" required>
														<?php
														$id_pengguna	= $this->session->userdata('id_pengguna');
														$id_perusahaan 	= $this->GeneralM->get_perusahaan($id_pengguna)->row()->id_perusahaan;
														$maker 			= $this->GeneralM->get_maker_by_id_perusahaan($id_perusahaan)->result();
														foreach ($maker as $mak) {
															$tgl_awal 		= date('Y-m-d', strtotime($mak->tgl_mulai));
															$tgl_expired 	= date('Y-m-d', strtotime($mak->tgl_akhir));
															$sekarang = date('Y-m-d');
															if($sekarang < $tgl_expired){
																if($mak->status == 'tampil'){
																	?>
																	<option value="<?php echo $mak->id_maker?>"><?php echo $mak->nama.' --- '.date_indo($tgl_awal).' sampai '.date_indo($tgl_expired);?></option>
																	<?php
																}
															}
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
													<input type="hidden" name="id_berkas_perizinan<?php echo $i;?>" id="id_berkas_perizinan<?php echo $i;?>" value="<?php echo $ber->id_berkas_perizinan;?>">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label"><?php echo $ber->nama_berkas?><span class="text-danger ml-2">*</span></label>
														<i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="<?php echo $ber->syarat_berkas?>" data-original-title="" title="">Syarat</i>
														<div class="custom-file">
															<input type="file" name="files<?php echo $i?>" class="form-control" required>
														</div>
													</div>
													<?php
												}
												?>
											</div>
											<p><strong style="color: red;">Note : Berkas harus diunggah dengan ukuran maksimal 5 MB(5000 Kb)</strong></p>
											<ul class="pager wizard text-right">
												<li class="next d-inline-block">
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
