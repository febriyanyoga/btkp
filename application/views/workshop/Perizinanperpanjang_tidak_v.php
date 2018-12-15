<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4>Perizinan Perpanjang</h4>
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
										<form action="<?php echo site_url('post_berkas_perpanjang_tidak')?>" enctype="multipart/form-data" method="post">
											<div class="section-title mt-5 mb-5">
												<h4>Jenis Permohonan Izin SPK</h4>
											</div>
											<div class="form-group row mb-3">
												<div class="col-xl-6">
													<label class="form-control-label">Jenis Perizinan Alat Keselamatan<span class="text-danger ml-2">*</span></label>
													<input type="text" class="custom-select form-control" id="" name="" required readonly value="<?php echo $perizinan->nama_alat?>">
													<input type="hidden" class="custom-select form-control" id="id_jenis_alat" name="id_jenis_alat" required readonly value="<?php echo $perizinan->id_jenis_alat?>">
													<input type="hidden" value="2" class="form-control" id="jenis_perizinan" name="jenis_perizinan" required >
												</div>
											</div>
											<div class="section-title mt-5 mb-5">
												<h4>Lampiran Dokumen Pendukung</h4>
											</div>
											<div class="form-group row mb-3">
												<?php 
												$i=1;
												foreach ($berkas as $ber) {
													?>
													<div class="col-xl-6 mb-3">
														<label class="form-control-label"><?php echo $ber->nama_berkas?></label>
														<div class="custom-file">
															<a href="<?php echo base_url('assets/upload/'.$ber->nama_file)?>" target="_BLANK" class="btn btn-sm btn-success">Lihat Dokumen</a>
															<input type="hidden" name="id_berkas_perizinan<?php echo $i;?>" id="id_berkas_perizinan<?php echo $i;?>" value="<?php echo $ber->id_berkas_perizinan;?>">
															<input type="hidden" name="nama_file<?php echo $i;?>" id="nama_file<?php echo $i;?>" value="<?php echo $ber->nama_file;?>">
															<input type="hidden" name="ukuran_berkas<?php echo $i;?>" id="ukuran_berkas<?php echo $i;?>" value="<?php echo $ber->ukuran_berkas;?>">
														</div>
													</div>
													<?php
													$i++;
												}
												?>
											</div>
											<div class="section-title mt-5 mb-5">
												<h4>Berkas Tambahan Perpanjang</h4>
											</div>
											<div class="form-group row mb-3">
												<?php 
												$j=$i;
												foreach ($berkas_perpanjang as $ber_p) {
													?>
													<input type="hidden" name="id_berkas_perizinan<?php echo $j;?>" id="id_berkas_perizinan<?php echo $j;?>" value="<?php echo $ber_p->id_berkas_perizinan;?>">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label"><?php echo $ber_p->nama_berkas?></label>
														<div class="custom-file">
															<input type="file" name="files<?php echo $j?>" class="form-control">
														</div>
													</div>
													<?php
													$j++;
												}
												?>
											</div>
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