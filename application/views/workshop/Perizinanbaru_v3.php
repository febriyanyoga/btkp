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
											<div class="progressbar" style="width: 100%;"></div>
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
								<div class="">
									<div class="" id="tab1" class="">
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
											<h4>Confirmation</h4>
										</div>
										<div id="accordion-icon-right" class="accordion">
											<div class="widget has-shadow">
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne" aria-expanded="true"><div class="card-title w-100">1. Identitas Service Station</div></a>
												<div id="IconRightCollapseOne" class="card-body collapse show" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Perusahaan</div>
														<div class="col-sm-8 form-control-plaintext">PT. SURYA SEGARA SAFETY MARINE</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Kantor Perusahaan</div>
														<div class="col-sm-8 form-control-plaintext">Jl. Ir. Sutami Pergudangan Tamalanrea Blok. A2 No. 6 Kel. Parang Loe, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Workshop/Service Station</div>
														<div class="col-sm-8 form-control-plaintext"></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Akta Pendirian Perusahaan</div>
														<div class="col-sm-8 form-control-plaintext">012345 - 13 Mei 1990</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Pemimpin/Penanggung Jawab</div>
														<div class="col-sm-8 form-control-plaintext">TEUKU NASER</div>
													</div>
												</div>
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
													<div class="card-title w-100">2. Informasi Kontak</div>
												</a>
												<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nomor Telepon Perusahaan</div>
														<div class="col-sm-8 form-control-plaintext">02123333345</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Email Perusahaan</div>
														<div class="col-sm-8 form-control-plaintext">tes@gmail.com</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">NPWP</div>
														<div class="col-sm-8 form-control-plaintext">01.440.926.2-801.001</div>
													</div>
												</div>
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
													<div class="card-title w-100">3. Jenis SPK & Masa Berlaku</div>
												</a>
												<div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Jenis SPK</div>
														<div class="col-sm-8 form-control-plaintext">Life Boat</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nomor SPK Lama</div>
														<div class="col-sm-8 form-control-plaintext">BHSJADKTYUIO</div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-xl-12">
															<div class="styled-checkbox">
																<input type="checkbox" name="checkbox" id="agree">
																<label for="agree">I Accept <a href="#">Terms and Conditions</a></label>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<ul class="pager wizard text-right">
											<li class="previous d-inline-block">
												<input type="button" name="back" class="btn btn-secondary ripple" value="Kembali">
											</li>
											<li class="next d-inline-block">
												<input type="submit" name="submit" class="btn btn-gradient-01" value="Selesai">
											</li>
										</ul>
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
