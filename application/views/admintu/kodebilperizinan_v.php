<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<div class="widget-body">
					<div class="row flex-row justify-content-center">
						<div class="col-xl-10">
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
									<form action="<?php echo site_url('reqKodeBilling')?>" method="post">
										<div class="section-title mt-5 mb-5">
											<h4 class="text-center">PEMBUATAN BILLING</h4>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">No. Billing</i> </label>
														<input type="text" disabled value="" class="form-control" id="no_billing" name="no_billing" required>
													</div>
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Nama Wajib Setor/Wajib Bayar</label>
														<input type="text" readonly value="BENDAHARA PENERIMAAN BTKP" class="form-control" id="nama_wajib_bayar" name="nama_wajib_bayar" required placeholder="">
													</div>
												</div>
											</div>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Tanggal Billing</label>
														<input type="date" value="" class="form-control" id="tgl_billing_start" name="tgl_billing_start" required>
													</div>
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Tanggal Kadaluarsa</label>
														<input type="date" value="" class="form-control" id="tgl_billing_exp" name="tgl_billing_exp" required>
													</div>
												</div>
											</div>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Kementerian/Lembaga</label>
														<input type="text" readonly="readonly" value="022 - KEMENTERIAN PERHUBUNGAN" class="form-control" id="kementrian_lembaga" name="kementrian_lembaga" required placeholder="022 - KEMENTERIAN PERHUBUNGAN">
													</div>
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Unit Eselon 1</label>
														<input type="text" readonly="readonly" value="04 - DITJEN PERHUBUNGAN LAUT" class="form-control" id="unit_eselon_1" name="unit_eselon_1" required placeholder="04 - DITJEN PERHUBUNGAN LAUT">
													</div>
													<div class="col-xl-6 mb-3">
														<!-- Seko XML -->
														<label class="form-control-label">Satuan Kerja</label>
														<input type="text" readonly="readonly" value="413721 - BALAI TEKNOLOGI KESELAMATAN PELAYARAN" class="form-control" id="satuan_kerja" name="satuan_kerja" required placeholder="413721 - BALAI TEKNOLOGI KESELAMATAN PELAYARAN">
													</div>
												</div>
											</div>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
																<!-- Seko Form -->
															<label class="col-lg-3 form-control-label">Kelompok PNBP</label>
															<div class="col-lg-6">
																<div class="styled-radio">
																
																	<input type="radio" name="pnpb" value="F" id="rad-1">
																	<label for="rad-1">Fungsional</label>
																</div>
																<div class="styled-radio">
																	<input type="radio" name="pnpb" value="U" id="rad-2" checked="checked">
																	<label for="rad-2">Umum</label>
																</div>
															</div>
														</div>
													</div>
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
																<!-- Seko Form -->
															<label class="col-lg-3 form-control-label">Mata Uang</label>
															<div class="col-lg-6">
																<select name="mata_uang" class="custom-select form-control">
																	<option value="1">IDR</option>
																	<option value="2">USD</option>
																</select>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- Njupuk Jeneng PT ne sg rep bayar pep -->
															<label class="col-lg-3 form-control-label">Wajib Bayar</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="wajib_bayar" name="wajib_bayar" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- Ki kiro2 rep pie?
															1. iso njupuk seko database dewe gek di gawe kode2ne, dadi untuk jenis alat a wge ws otomatis nampilke kode nggo alat kui tarife sekian
															2. nggo kondisional tapi ra nggo database, if alat a value ne sekian.

															kayane aman sg nomor 1 pep dadi form akun, tarif, ro satuan yo wes otomatis ke isi. -->

															<label class="col-lg-3 form-control-label">Jenis Penerimaan</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="jenis_penerimaan" name="jenis_penerimaan" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-3 form-control-label">Akun</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="akun" name="akun" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-3 form-control-label">Tarif</label>
															<div class="col-lg-6">
																<input type="number" value="" class="form-control" id="tarif" name="tarif" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- seko form -->
															<label class="col-lg-3 form-control-label">Volume</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="volume" name="volume" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- seko form -->
															<label class="col-lg-3 form-control-label">Satuan</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="satuan" name="satuan" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- seko form ngango ajax wae tarifxvolume -->
															<label class="col-lg-3 form-control-label">Jumlah</label>
															<div class="col-lg-6">
																<input type="number" value="" class="form-control" id="jumlah" name="jumlah" required placeholder="">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<!-- seko form -->
															<label class="col-lg-3 form-control-label">Keterangan</label>
															<div class="col-lg-6">
																<textarea value="" class="form-control" id="keterangan" name="keterangan" required placeholder=""></textarea>
																<!-- <input type="text" value="" class="form-control" id="keterangan" name="keterangan" required placeholder=""> -->
															</div>
														</div>
													</div>
												</div>
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
