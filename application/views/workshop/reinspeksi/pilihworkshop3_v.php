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
											<div class="progressbar" id="progressbar" style="width: 100%;"></div>
										</div>
										<ul>
											<li>
												<a href="">
													<span class="step">1</span>
													<span class="title">Step 1</span>
												</a>
											</li>
											<li>
												<a href="" >
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
										<form action="<?php echo site_url('')?>" method="post">
											<div class="section-title mt-5 mb-3">
												<h4 class="text-center">DATA WORSKSHOP</h4>
												<hr>
											</div>
											<div class="table-responsive">
									<table id="myTable" class="table mb-0">
										<thead>
											<tr>
												<th class="text-center">No</th>
												<th class="text-center">Nama Workshop</th>
												<th class="text-center">Jenis Workshop</th>
												<th class="text-center">Alamat</th>
												<th class="text-center">Izin Perbaikan Alat</th>
												<th class="text-center">Telepon</th>
												<th class="text-center">Aksi</th>
											</tr>
										</thead>
										<tbody>
												<tr>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center"></td>
													<td class="text-center">
														<a href="<?php echo site_url('pilihworkshop3'); ?>" class="btn btn-primary mr-1 mb-2"><i class="la la-pencil"></i>Pilih</i>
														</a>
													</td>
												</tr>

										</tbody>
									</table>
								</div>
            </div>

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
</style>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tab1').addClass('active show');
		// $("#progressbar").addClass('panjang');
	});
</script>