<div class="container-fluid">
	<div class="row flex-row">
		<div class="col-xl-12">
			<!-- Form -->
			<div class="widget has-shadow">
				<br>
				<h2 class="text-center"> FORMULIR SERTIFIKASI</h2>
				<div class="widget-header bordered no-actions d-flex align-items-center">
				</div>
				<div class="widget-body">
					<div class="row flex-row justify-content-center">
						<div class="row"><h2> Data Pemohon</h2></div>	
						<!-- <?php print_r($alat);?>				 -->
						<div class="col-xl-12">
							<div class="form-group row mb-3">
								<div class="col-xl-6 mb-3">
									<!-- sesuai jenis user pas registrasi -->
									<label class="form-control-label">Jenis Instansi<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->nama_jabatan?>" class="form-control" readonly>
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Nama Instansi<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->nama_perusahaan?>" class="form-control" readonly>
								</div>
								<?php
								$alamat_pt_detail = $this->WorkshopM->detail_alamat($pengguna->id_kel_perusahaan)->row();
								?>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Alamat Perusahaan<span class="text-danger ml-2">*</span></label>
									<textarea class="form-control" readonly=""><?php echo $pengguna->alamat_perusahaan.', '.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></textarea>
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Telepon Perusahaan<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->no_tlp?>" class="form-control" readonly>
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Email Perusahaan<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->email_perusahaan?>" readonly class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Fax<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Nama Pemohon<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->nama_pengguna?>" readonly class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Jabatan Pemohon<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Telepon Pemohon<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->no_hp?>" readonly class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Email Pemohon<span class="text-danger ml-2">*</span></label>
									<input type="text" value="<?php echo $pengguna->email_pengguna?>" readonly class="form-control">
								</div>
							</div>
							<div class="row flex-row justify-content-center"><h2> Data Perangkat</h2></div>	
							<div class="form-group row mb-3">

								<div class="col-xl-6 mb-3">
									<!-- milih dari database -->
									<label class="form-control-label">Nama Alat<span class="text-danger ml-2">*</span></label>
									<select class="form-control">
										<option>----Pilih Alat----</option>
										<?php
										foreach ($alat as $al) {
											?>
											<option value="<?php echo $al->id_jenis_alat?>"><?php echo $al->nama_alat?></option>
											<?php
										}
										?>
									</select>
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Merk<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Model/Tipe<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Negara Pembuat<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Pabrikan Pembuat<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Alamat Pabrikan<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Telepon<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Email<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Fax<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
								<div class="col-xl-6 mb-3">
									<label class="form-control-label">Catatan<span class="text-danger ml-2">*</span></label>
									<input type="text" value="" class="form-control">
								</div>
							</div>
						</div>
						<!-- <div class="form-group row mb-3">
								<div class="col-xl-6">
									<label class="form-control-label">Jenis Perizinan<span class="text-danger ml-2">*</span></label>
									<select name="country" class="custom-select form-control">
										<option value="">Select</option>
										<option value="GB">Inflatable Liferaft (ILR)</option>
										<option value="US" selected>Lifeboat & Davit</option>
										<option value="UM">Pemadam Kebakaran (PMK) Portable & CO2 System</option>
									</select>
								</div>
							</div> -->
							<ul class="pager wizard text-right">
								<li class="next d-inline-block">
									<a href="#" class="btn btn-gradient-01">Submit</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
