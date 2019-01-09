<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4>Pengujian</h4>
				</div>
				<div class="widget-body">
					<div class="row flex-row justify-content-center">
						<div class="col-xl-10">
							<div id="">
								<div class="step-container">
									<div class="step-wizard">
										<div class="progress" style="top:36px;">
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
											<h4>Konfirmasi</h4>
										</div>
										<div id="accordion-icon-right" class="accordion">
											<div class="widget has-shadow">
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne" aria-expanded="true"><div class="card-title w-100">1. Identitas Instansi</div></a>
												<div id="IconRightCollapseOne" class="card-body collapse show" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Instansi</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->nama_perusahaan?></div>
													</div>
													<div class="form-group row mb-5">
														<?php
														$alamat_pt_detail = $this->WorkshopM->detail_alamat($data_pengujian->id_kel_perusahaan)->row();
														?>
														<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Kantor Instansi</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
													</div>
												</div>
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo" aria-expanded="true">
													<div class="card-title w-100">2. Informasi Kontak Instansi</div>
												</a>
												<div id="IconRightCollapseTwo" class="card-body collapse show" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nomor Telepon Instansi</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->no_tlp?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Email Instansi</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->email_perusahaan?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Fax Instansi</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->fax?></div>
													</div>
												</div>
												<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseFour" aria-expanded="true">
													<div class="card-title w-100">3. Informasi Pengujian</div>
												</a>
												<div id="IconRightCollapseFour" class="card-body collapse show" data-parent="#accordion-icon-right">
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Alat</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->nama_alat?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Merk Alat</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->merk?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Tipe Alat</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->tipe?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Negara Asal</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->negara_asal?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Nama Pabrikan</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->pabrikan?></div>
													</div>
													<?php
													if($data_pengujian->negara_asal == 'Indonesia' || $data_pengujian->negara_asal == 'indonesia'){
														?>
														<div class="form-group row mb-5">
															<?php
															$alamat_p_detail = $this->WorkshopM->detail_alamat($data_pengujian->id_kel_pabrikan)->row();
															?>
															<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Pabrikan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->alamat_pabrikan.'<br>'.$alamat_p_detail->nama_kelurahan.', '.$alamat_p_detail->nama_kecamatan.', '.$alamat_p_detail->nama_kabupaten_kota.', '.$alamat_p_detail->nama_propinsi;?></div>
														</div>
														<?php
													}else{
														?>
														<div class="form-group row mb-5">
															<div class="col-sm-3 form-control-label d-flex align-items-center">Alamat Pabrikan</div>
															<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->alamat_pabrikan?></div>
														</div>
														<?php
													}
													?>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Telepon Pabrikan</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->telepon?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Fax Pabrikan</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->fax_pabrikan?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Email Pabrikan</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->email_pabrikan?></div>
													</div>
													<div class="form-group row mb-5">
														<div class="col-sm-3 form-control-label d-flex align-items-center">Catatan</div>
														<div class="col-sm-8 form-control-plaintext"><?php echo $data_pengujian->catatan?></div>
													</div>
												</div>
											</div>
										</div>
										<ul class="pager wizard text-right">
											<li class="next d-inline-block">
												<a href="<?php echo site_url('selesai_p/'.$data_pengujian->id_pengujian)?>" class="btn btn-gradient-01" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">Selesai</a>
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
