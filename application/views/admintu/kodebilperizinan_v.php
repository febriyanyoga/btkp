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

										Iki alure simponi pep
										<p></p>
										1. Nek wes sukses di generate tetep redirect ng halaman iki, gek form No.Billing, Tanggal Billing, Tanggal Kedaluarsa kan maune kosong kui dadi terisi pep <br>
										2. Terus button ngisor nek wes sukses berubah dadi tombol cetak karo kembali, kui wwes tak gaweke tombole, 
											nek cetak gek nampilke invoice, nek kembali linke bali ng gon datatabel. Dadi invoice ki ng admin tu ono, ng workshop yo ono. Kui apike nganggo sg cetak PDF kae yo?
											
										3.	http://localhost/btkp/perizinan tab pembayaran . gon kolom aksi . nek kode billing wis di generate kui muncul ikon cetak wae pep 
										
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">No. Billing</i> </label>
														<input type="text" disabled value="" class="form-control" id="no_billing" name="no_billing" required>
													</div>
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Nama Wajib Setor/Wajib Bayar</label>
														<input type="text" readonly value="BENDAHARA PENERIMAAN BTKP" class="form-control" id="nama_wajib_bayar" name="nama_wajib_bayar" required placeholder="">
													</div>
												</div>
							
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Tanggal Billing</label>
														<input type="date" readonly value="<?= date('d/m/Y'); ?>" class="form-control" id="tgl_billing_start" name="tgl_billing_start" required>
													</div>
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Tanggal Kadaluarsa</label>
														<input type="date" readonly value="" class="form-control" id="tgl_billing_exp" name="tgl_billing_exp" required>
													</div>
												</div>
											</div>
										</div>
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Kementerian/Lembaga</label>
														<input type="text" readonly="readonly" value="022 - KEMENTERIAN PERHUBUNGAN" class="form-control" id="kementrian_lembaga" name="kementrian_lembaga" required placeholder="022 - KEMENTERIAN PERHUBUNGAN">
														<input type="hidden" readonly="readonly" value="<?= $data_perizinan['id_perizinan']?>" class="form-control" id="id_perizinan" name="id_perizinan" required>
													</div>
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Unit Eselon 1</label>
														<input type="text" readonly="readonly" value="04 - DITJEN PERHUBUNGAN LAUT" class="form-control" id="unit_eselon_1" name="unit_eselon_1" required placeholder="04 - DITJEN PERHUBUNGAN LAUT">
													</div>
													<div class="col-xl-6 mb-3">
														<label class="form-control-label">Satuan Kerja</label>
														<input type="text" readonly="readonly" value="606301 - BALAI TEKNOLOGI KESELAMATAN PELAYARAN" class="form-control" id="satuan_kerja" name="satuan_kerja" required placeholder="413721 - BALAI TEKNOLOGI KESELAMATAN PELAYARAN">
													</div>
												</div>
											</div>
										</div>
										<!-- <div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-3 form-control-label">Kelompok PNBP</label>
															<div class="col-lg-6">
																<input type="text" value="F" class="form-control" id="pnpb" name="pnpb" required placeholder="" readonly="readonly">
															</div>
														</div>
													</div>
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-3 form-control-label">Mata Uang</label>
															<div class="col-lg-6">
																<input type="text" value="IDR" class="form-control" id="mata_uang" name="mata_uang" required placeholder="" readonly="readonly">
															</div>
														</div>
													</div>
												</div>
											</div>
										</div> -->
										<div class="widget widget-14 has-shadow">
											<div class="widget-body">
												<div class="form-group row mb-3">
													<div class="col-xl-10 mb-3">
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Nama Wajib Bayar</label>
															<div class="col-lg-6">
																<input type="text" value="<?= $data_perizinan['nama_perusahaan']?>" class="form-control" id="nama_wajib_bayar" name="nama_wajib_bayar" required placeholder="PT. Anugerah" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Jenis Penerimaan</label>
															<div class="col-lg-6">
																<input type="text" value="<?= $data_perizinan['jenis_penerimaan']?>" class="form-control" id="jenis_penerimaan" name="jenis_penerimaan" required placeholder="Surat Ijin Baru" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Jenis Alat Keselamatan</label>
															<div class="col-lg-6">
																<input type="text" value="<?= $data_perizinan['nama_alat']?>" class="form-control" id="jenis_alat_keselamatan" name="jenis_alat_keselamatan" required placeholder="Marine Evacuation System" readonly="readonly">
															</div>
														</div>
														<!-- <div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Akun</label>
															<div class="col-lg-6">
																<input type="text" value="" class="form-control" id="akun" name="akun" required placeholder="">
															</div>
														</div> -->
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Tarif</label>
															<div class="col-lg-6">
																<input type="number" value="<?= $data_perizinan['tarif']?>" class="form-control" id="tarif" name="tarif" required placeholder="" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Volume</label>
															<div class="col-lg-6">
																<input type="number" value="1" class="form-control" id="volume" name="volume" required placeholder="" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Satuan</label>
															<div class="col-lg-6">
																<input type="text" value="<?= $data_perizinan['satuan']?>" class="form-control" id="satuan" name="satuan" required placeholder="" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Jumlah</label>
															<div class="col-lg-6">
																<input type="number" value="<?= $data_perizinan['tarif']?>" class="form-control" id="jumlah" name="jumlah" required placeholder="" readonly="readonly">
															</div>
														</div>
														<div class="form-group row d-flex align-items-center mb-5">
															<label class="col-lg-6 form-control-label">Keterangan</label>
															<div class="col-lg-6">
																<textarea value="" class="form-control" id="keterangan" name="keterangan" required placeholder="Keterangan"></textarea>
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
										<ul class="pager wizard text-left">
											<li class="d-inline-block">
												<input type="submit" name="submit" class="btn btn-success" value="Cetak" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
												<input type="submit" name="submit" class="btn btn-gradient-01" value="Kembali" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
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
