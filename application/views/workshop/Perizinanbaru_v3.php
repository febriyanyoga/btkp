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
												<a href="">
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
												<a href="" class="active show">
													<span class="step">3</span>
													<span class="title">Step 3</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="">
									<div class="" id="tab1" class="active show">
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
											<?php
											foreach ($perizinan as $per) {
												?>
												<div class="widget has-shadow">
													<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne" aria-expanded="true"><div class="card-title w-100">1. Identitas Service Station</div></a>
													<div id="IconRightCollapseOne" class="card-body collapse show" data-parent="#accordion-icon-right">
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Perusahaan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->nama_perusahaan?></div>
														</div>
														<div class="form-group row mb-5">
															<?php
															$alamat_pt_detail = $this->WorkshopM->detail_alamat($per->id_kel_perusahaan)->row();
															$alamat_ws_detail = $this->WorkshopM->detail_alamat($per->id_kel_workshop)->row();
															?>
															<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Kantor Perusahaan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
														</div>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Workshop/Service Station</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->alamat_workshop.'<br>'.$alamat_ws_detail->nama_kelurahan.', '.$alamat_ws_detail->nama_kecamatan.', '.$alamat_ws_detail->nama_kabupaten_kota.', '.$alamat_ws_detail->nama_propinsi;?></div>
														</div>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Akta Pendirian Perusahaan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->akta_perusahaan?></div>
														</div>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Pemimpin/Penanggung Jawab</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->nama_pimpinan?></div>
														</div>
													</div>
													<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
														<div class="card-title w-100">2. Informasi Kontak</div>
													</a>
													<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Nomor Telepon Perusahaan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->no_tlp?></div>
														</div>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Email Perusahaan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->email_perusahaan?></div>
														</div>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">NPWP</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->npwp?></div>
														</div>
													</div>
													<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
														<div class="card-title w-100">3. Jenis SPK & Masa Berlaku</div>
													</a>
													<div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Jenis SPK</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $per->nama_alat?></div>
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
												<?php
											}
											?>
										</div>
										<ul class="pager wizard text-right">
											<!-- <li class="previous d-inline-block">
												<a href="<?php echo site_url('izin_baru2/'.$id_perizinan)?>" class="btn btn-secondary ripple">Kembali</a>
											</li> -->
											<li class="next d-inline-block">
												<a href="<?php echo site_url('selesai/'.$id_perizinan)?>" class="btn btn-gradient-01" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">Selesai</a>
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
