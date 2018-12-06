<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<!-- Begin Invoice -->
			<div class="invoice has-shadow">
				<!-- Begin Invoice COntainer -->
				<div class="invoice-container">
					<!-- Begin Invoice Top -->
					<div class="invoice-top">
						<div class="row d-flex align-items-center">
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 d-flex justify-content-end">
								<div class="actions dark">
									<div class="dropdown">
										<button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
											<i class="la la-ellipsis-h"></i>
										</button>
										<div class="dropdown-menu">
											<a href="#" class="dropdown-item">
												<i class="la la-print"></i>Print
											</a>
											<a href="#" class="dropdown-item">
												<i class="la la-download"></i>Download
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-12 col-md-6 col-sm-6 col-6 text-center">
								<h2>Permohonan Perizinan Surat Persetujuan Kewenangan (SPK)</h2>
							</div>
						</div>
					</div>
					<!-- End Invoice Top -->
					<!-- Begin Invoice Header -->
					<div class="invoice-header">
						<form action="" method="post" id="form-input-acc">
							<div id="accordion-icon-right" class="accordion">
								<?php
								foreach ($detail_perizinan as $per) {
									?>

									<div class="widget has-shadow">
										<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne"
										aria-expanded="true">
										<div class="card-title w-100"> <b>1. Identitas Service Station</b></div>
									</a>
									<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="1">
													<label for="1">Nama Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<?php
											$alamat_pt_detail = $this->WorkshopM->detail_alamat($per->id_kel_perusahaan)->row();
											$alamat_ws_detail = $this->WorkshopM->detail_alamat($per->id_kel_workshop)->row();
											?>
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="2">
													<label for="2">Alamat Kantor Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="3">
													<label for="3">Alamat Workshop/Service Station </label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->alamat_workshop.'<br>'.$alamat_ws_detail->nama_kelurahan.', '.$alamat_ws_detail->nama_kecamatan.', '.$alamat_ws_detail->nama_kabupaten_kota.', '.$alamat_ws_detail->nama_propinsi;?> </div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="4">
													<label for="4">Akta Pendirian Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->akta_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="5">
													<label for="5">Pemimpin/Penanggung Jawab</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_pimpinan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="6">
													<label for="6">Nomor Telepon Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->no_tlp?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="7">
													<label for="7">Email Perusahaan</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->email_perusahaan?></div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="8">
													<label for="8">NPWP</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->npwp?></div>
										</div>

									</div>
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
										<div class="card-title w-100">2. Permohonan SPK</div>
									</a>
									<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" name="checkbox" id="9">
													<label for="9">Jenis SPK</label>
												</div>
											</div>
											<div class="col-xl-8"><?php echo $per->nama_alat?></div>
										</div>
										<?php
										if($per->nama_jenis_izin == "Perpanjang"){
											?>
											<div class="form-group row mb-5">
												<div class="col-xl-4">
													<div class="styled-checkbox">
														<input type="checkbox" name="checkbox" id="10">
														<label for="10">Nomor SPK Lama</label>
													</div>
												</div>
												<div class="col-xl-8">BHSJADKTYUIO</div>
											</div>
											<?php
										}
										?>

									</div>
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseThree">
										<div class="card-title w-100">3. Dokumen Pendukung</div>
									</a>
									<div id="IconRightCollapseThree" class="card-body collapse" data-parent="#accordion-icon-right">
										<?php
										$detail_berkas = $this->TatausahaM->get_berkas_by_id($per->id_perizinan)->result();
									// print_r($detail_berkas);
										$i=11;
										foreach ($detail_berkas as $ber) {
											?>
											<div class="form-group row mb-5">
												<div class="col-xl-4">
													<div class="styled-checkbox">
														<input type="checkbox" name="checkbox" id="<?php echo $i?>">
														<label for="<?php echo $i?>"><?php echo $ber->nama_berkas?></label>
													</div>
												</div>
												<div class="col-xl-8">
													<a target="_blank" href="<?php echo base_url().'assets/upload/'.$ber->nama_file;?>" class="btn btn-primary btn-sm mr-1 mb-2"><i class="la la-eye"></i>Lihat Dokumen</i></a>
												</div>
											</div>
											<?php
											$i++;
										}
										?>
									</div>
									<div class="text-right">
										<input type="submit" name="submit" id="btn-lengkap" class="btn btn-danger mr-1 mb-2" value="Tidak Lengkap">
										<input type="submit" name="submit" id="btn-lengkap" class="btn btn-success mr-1 mb-2" value="Lengkap">
									</div>

									<?php
								}
								?>
							</div>
						</form>
					</div>
				</div>
				<!-- End Invoice Header -->
				<!-- End Table -->
			</div>
			<!-- End Invoice Container -->
			<!-- Begin Invoice Footer -->
			<!-- End Invoice Footer -->
		</div>
	</div>
</div>
</div>
<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery-3.1.1.js"></script>
<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery.validate.js"></script>
<!-- <script type="text/javascript">
	$().ready(function(){
		$('#form-input-acc').validate({
			rules : {
				checkbox : 'required'
			},
			messages : {
				checkbox : 'Harus diisi'
			}
		});
	});
</script> -->
<script type="text/javascript">
	$('#btn-lengkap').click(function(){
		$('#form-input-acc').get(0).submit();
	});
</script>
