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
								<h2>Verifikasi Permohonan Re Inspeksi</h2>
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
										<div class="card-title w-100"> 1. Data Workshop</div>
									</a>
									<div id="IconRightCollapseOne" class="card-body collapse show" style="color:black;" data-parent="#accordion-icon-right">

										<div class="form-group row mb-5">

											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="2">
													<label for="2">Nama Instansi</label>
												</div>
											</div>
											<div class="col-xl-8">PT. ABA</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="3">
													<label for="3">Alamat Instansi </label>
												</div>
											</div>
											<div class="col-xl-8">JL.ancil</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="4">
													<label for="4">Telepon</label>
												</div>
											</div>
											<div class="col-xl-8">0987654</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="5">
													<label for="5">email</label>
												</div>
											</div>
											<div class="col-xl-8">aa@gmail.com</div>
										</div>
									</div>
									<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseTwo">
										<div class="card-title w-100">2. Data Kapal</div>
									</a>
									<div id="IconRightCollapseTwo" class="card-body collapse" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Nama Kapal</label>
												</div>
											</div>
											<div class="col-xl-8"> asd</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Flag</label>
												</div>
											</div>
											<div class="col-xl-8">ESD</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">IMO No</label>
												</div>
											</div>
											<div class="col-xl-8">y567</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Telepon</label>
												</div>
											</div>
											<div class="col-xl-8">0987</div>
										</div>
										</div>

										<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapse3">
										<div class="card-title w-100">3. Data Alat</div>
									</a>
									<div id="IconRightCollapse3" class="card-body collapse" data-parent="#accordion-icon-right">
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Alat Keselamatan</label>
												</div>
											</div>
											<div class="col-xl-8"> asd</div>
										</div>
										<div class="form-group row mb-5">
											<div class="col-xl-4">
												<div class="styled-checkbox">
													<input type="checkbox" checked name="checkbox" required id="9">
													<label for="9">Jumlah</label>
												</div>
											</div>
											<div class="col-xl-8">ESD</div>
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

<div class="modal" id="izin_berkas">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Persetujuan Perizinan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form action="" method="post">
				<div class="modal-body">
					<!-- <?php
foreach ($detail_berkas as $key) {
    ?> -->
						<label for="<?php echo $key->nama_berkas; ?>" class="label"><?php echo $key->nama_berkas; ?> : </label>
						<input type="text" name="keterangan[]" value="" class="form-control" placeholder="keterangan">
						<?php
}
?>
					<!-- <label for="keterangan" class="label">Keterangan : </label>
					<input type="text" name="keterangan" value="" class="form-control" placeholder="keterangan" required="required"> -->
					<input type="hidden" name="id_pengguna" class="form-control" required="required" value="<?php echo $this->session->userdata('id_pengguna'); ?>" >
					<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $id_perizinan; ?>">
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
                                                        							<h4 class="modal-title">Masukkan Kode Billing</h4>
                                                        							<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        						</div>
                                                        						<form action="<?php echo site_url('kode_billing'); ?>" method="post">
                                                        							<div class="modal-body">
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

                                                        								<input type="hidden" name="id_perizinan" class="form-control" required="required" value="<?php echo $per->id_perizinan; ?>">
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