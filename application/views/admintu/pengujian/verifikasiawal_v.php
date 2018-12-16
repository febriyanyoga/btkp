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
								<h2>Verifikasi Permohonan Pengujian Alat Keselamatan Baru</h2>
							</div>
						</div>
					</div>
					<!-- End Invoice Top -->
					<!-- Begin Invoice Header -->
					<div class="invoice-header">
						<?php
						$data = $this->session->flashdata('sukses');
						if ($data != '') {
							?>
							<div class="alert alert-success">
								<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
								<h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
								<?=$data; ?>
							</div>
							<?php
						}
						?>
						<?php
						$data2 = $this->session->flashdata('error');
						if ($data2 != '') {
							?>
							<div class="alert alert-danger">
								<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
								<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
								<?=$data2; ?>
							</div>
							<?php
						}
						?>
						<form action="<?php echo site_url('persetujuan'); ?>" method="post" id="form-input-acc">
							<div id="accordion-icon-right" class="accordion">
								<div class="widget has-shadow">
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne"
									aria-expanded="true">
									<div class="card-title w-100"> <b>1. Data Pemohon</b></div>
								</a>
								<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="1">Jenis Instansi</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->nama_jabatan?></div>
									</div>
									<div class="form-group row mb-5">

										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="2">Nama Instansi</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->nama_perusahaan?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<?php
												$alamat_pt_detail = $this->WorkshopM->detail_alamat($pengujian->id_kel_perusahaan)->row();
												?>
												<label for="3">Alamat Instansi </label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->alamat_perusahaan.'<br>'.$alamat_pt_detail->nama_kelurahan.', '.$alamat_pt_detail->nama_kecamatan.', '.$alamat_pt_detail->nama_kabupaten_kota.', '.$alamat_pt_detail->nama_propinsi;?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="4">Telepon</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->no_tlp?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="5">Fax</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->fax?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="5">email</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->email_perusahaan?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" name="checkbox" required>
												<label for="6">Nomor Telepon Pemohon</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->no_hp?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="7">Jabatan Pemohon</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->jabatan_pengguna?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required>
												<label for="8">Email Pemohon</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->email_pengguna?></div>
									</div>

								</div>
								<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
									<div class="card-title w-100">2. Data Perangkat</div>
								</a>
								<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Nama Alat</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->nama_alat?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Merk</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->merk?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Model/Tipe</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->tipe?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Negara Pembuat</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->negara_asal?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Alamat Pabrikan</label>
												<?php
												$alamat_pabrik = $this->WorkshopM->detail_alamat($pengujian->id_kel_pabrikan)->row();
												?>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->alamat_pabrikan.'<br>'.$alamat_pabrik->nama_kelurahan.', '.$alamat_pabrik->nama_kecamatan.', '.$alamat_pabrik->nama_kabupaten_kota.', '.$alamat_pabrik->nama_propinsi;?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Pabrik Pembuat</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->pabrikan?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Telepon</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->telepon?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Email</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->email_pabrikan?></div>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-4">
											<div class="styled-checkbox">
												<input type="checkbox" checked name="checkbox" required id="9">
												<label for="9">Fax</label>
											</div>
										</div>
										<div class="col-xl-8"><?php echo $pengujian->fax_pabrikan?></div>
									</div>
								</div>
							</div>

							<div class="text-right">
								<a href="" id="btn-tidak-lengkap" class="btn btn-danger mr-1 mb-2" data-toggle="modal" data-target="#izin_berkas">Tidak Lolos</a>
								<a href="" id="btn-tidak-lengkap" class="btn btn-success mr-1 mb-2" data-toggle="modal" data-target="#inputtagihan">Lolos</a>
								<!-- <input type="submit" name="submit" id="btn-lengkap" class="btn btn-success mr-1 mb-2" value="Memenuhi" onClick="return confirm('Anda yakin berkas yang dibutuhkan sudah lengkap?')"> -->
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
<div class="modal" id="izin_berkas">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Persetujuan Perizinan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('verifikasi_1_tolak')?>" method="post">
				<div class="modal-body">
					<label for="keterangan" class="label">Keterangan : </label>
					<textarea type="text" name="keterangan"class="form-control" placeholder="Keterangan . . ." required="required"></textarea>
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>" >
					<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $pengujian->id_pengujian; ?>">
					<input type="hidden" name="status" class="form-control" placeholder="keterangan" value="ditolak" required="required">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal" id="inputtagihan">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Setujui dan Masukkan Kode Billing</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="<?php echo site_url('kode_billing'); ?>" method="post">
				<div class="modal-body">
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>" >
					<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $pengujian->id_pengujian; ?>">
					<input type="hidden" name="status" class="form-control" placeholder="" value="diterima" required="required">
					<input type="hidden" name="keterangan" class="form-control" value="Memenuhi Syarat" required="required">


					<label for="kode_billing" class="label">Kode Billing : </label>
					<input type="number" name="kode_billing" value="" class="form-control" placeholder="Masukkan kode billing" required="required">
					<label for="bank_btkp" class="label">Bank BTKP : </label>
					<select class="form-control" name="id_bank_btkp">
						<option value="">---Pilih Bank---</option>
						<?php
						foreach ($bank_btkp as $bank) {
							?>
							<option value="<?php echo $bank->id_bank_btkp; ?>"><?php echo $bank->nama_bank; ?></option>
							<?php
						}
						?>
					</select>
					<input type="hidden" name="id_pengujian" class="form-control" required="required" value="<?php echo $pengujian->id_pengujian; ?>">
					<label for="jumlah_tagihan" class="label">Jumlah Tagihan: </label>
					<input type="number" name="jumlah_tagihan" value="" class="form-control" placeholder="Masukkan Jumlah Tagihan" required="required">
					<label for="masa_berlaku_billing" class="label">Masa Berlaku Sampai: </label>
					<input type="date" name="masa_berlaku_billing" value="" class="form-control" placeholder="Masukkan Masa Berlaku" required="required">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
					<input type="submit" name="submit" value="Simpan" class="btn btn-md btn-success" onClick="return confirm('Anda yakin Kode billing yang dimasukkan sudah benar?')">
				</div>
			</form>
		</div>
	</div>
</div>
</div>