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
										<div class="progressbar"></div>
									</div>
									<ul>
										<li>
											<a href="#tab1" data-toggle="tab">
												<span class="step">1</span>
												<span class="title">Step 1</span>
											</a>
										</li>
										<li>
											<a href="#tab2" data-toggle="tab">
												<span class="step">2</span>
												<span class="title">Step 2</span>
											</a>
										</li>
										<li>
											<a href="#tab3" data-toggle="tab">
												<span class="step">3</span>
												<span class="title">Step 3</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="tab-content">
								<div class="tab-pane" id="tab1">
									<div class="section-title mt-5 mb-5">
										<h4>Identitas Service Station</h4>
									</div>
									<div class="form-group row mb-3">
										<div class="col-xl-12 mb-3">
											<label class="form-control-label"><b>NAMA PERUSAHAAN</b> <i>(PUSAT / CABANG)</i><span class="text-danger ml-2">*</span></label>
											<input type="text" value="PT. SURYA SEGARA SAFETY MARINE" class="form-control">
										</div>
										<div class="col-xl-12 mb-3">
											<label class="form-control-label"><b>ALAMAT KANTOR PERUSAHAAN</b><span class="text-danger ml-2">*</span></label>
											<input type="text" value="Jl. Ir. Sutami Pergudangan Tamalanrea Blok. A2 No. 6 Kel. Parang Loe, Kec. Tamalanrea, Kota Makassar, Sulawesi Selatan"
											 class="form-control">
										</div>
										<div class="col-xl-12 mb-3">
											<label class="form-control-label"><b>ALAMAT WORKSHOP / SERVICE STATION</b> <span class="text-danger ml-2">*</span></label>
											<input type="text" value="" class="form-control">
										</div>
										<div class="col-xl-6 mb-3">
											<label class="form-control-label"><b>AKTA PENDIRIAN PERUSAHAAN </b><i>(Nomor / Tanggal)</i> <span class="text-danger ml-2">*</span></label>
											<input type="text" value="" class="form-control">
										</div>
										<div class="col-xl-6 mb-3">
											<label class="form-control-label"><b>PEMIMPIN / PENAGGUNG JAWAB </b><span class="text-danger ml-2">*</span></label>
											<input type="text" value="" class="form-control">
										</div>
										<div class="col-xl-6 mb-3">
											<label class="form-control-label"><b>NOMOR POKOK WAJIB PAJAK </b><span class="text-danger ml-2">*</span></label>
											<input type="text" value="" class="form-control">
										</div>
									</div>
									<div class="section-title mt-5 mb-5">
										<h4>Kontak</h4>
									</div>
									<div class="form-group row mb-5">
										<div class="col-xl-6 mb-3">
											<label class="form-control-label">NOMOR HP</label>
											<div class="input-group">
												<span class="input-group-addon addon-secondary">
													<i class="la la-phone"></i>
												</span>
												<input type="text" class="form-control" value="0812345678">
											</div>
										</div>
										<div class="col-xl-6">
											<label class="form-control-label">ALAMAT E-MAIL<span class="text-danger ml-2">*</span></label>
											<input type="email" value="ff@gmmail.com" class="form-control">
										</div>
									</div>
									<div class="section-title mt-5 mb-5">
										<h4>Jenis Permohonan Izin SPK</h4>
									</div>
									<div class="form-group row mb-3">
										<div class="col-xl-6">
											<label class="form-control-label">Jenis Perizinan<span class="text-danger ml-2">*</span></label>
											<select name="country" class="custom-select form-control">
												<option value="">Select</option>
												<option value="GB">Inflatable Liferaft (ILR)</option>
												<option value="US" selected>Lifeboat & Davit</option>
												<option value="UM">Pemadam Kebakaran (PMK) Portable & CO2 System</option>
											</select>
										</div>
									</div>
									<!-- <div class="form-group row mb-3">
                                                                <div class="col-xl-4 mb-3">
                                                                    <label class="form-control-label">City<span class="text-danger ml-2">*</span></label>
                                                                    <input type="text" value="Los Angeles" class="form-control">
                                                                </div>
                                                                <div class="col-xl-4 mb-5">
                                                                    <label class="form-control-label">State<span class="text-danger ml-2">*</span></label>
                                                                    <input type="email" value="CA" class="form-control">
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <label class="form-control-label">Zip<span class="text-danger ml-2">*</span></label>
                                                                    <input type="email" value="90045" class="form-control">
                                                                </div>
                                                            </div> -->
									<ul class="pager wizard text-right">
										<li class="previous d-inline-block">
											<a href="javascript:;" class="btn btn-secondary ripple">Kembali</a>
										</li>
										<li class="next d-inline-block">
											<a href="javascript:;" class="btn btn-gradient-01">Lanjut</a>
										</li>
									</ul>
								</div>
								<div class="tab-pane" id="tab2">
									<div class="section-title mt-5 mb-5">
										<h4>Lampiran Dokumen Pendukung</h4>
									</div>
									<div class="form-group row mb-3">
										<div class="col-xl-6 mb-3">
											<label class="form-control-label">Akta Pendirian Perusahaan <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Akta Pendirian Perusahaan harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Surat Ijin Perdagangan (SIUP) <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Surat Ijin Perdagangan (SIUP) harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya;" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Tanda Daftar Perusahaan (TDP) <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Tanda Daftar Perusahaan (TDP) harus mencantumkan kalimat “Jasa Perbaikan alat keselamatan pelayaran” pada bidang usahanya (bila Perusahaan Cabang : TDP CABANG yang dilampirkan)" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Nomor Pokok Wajib Pajak (NPWP) <span class="text-danger ml-2">*</span></label>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Surat Keterangan Domisili Perusahaan <span class="text-danger ml-2">*</span></label>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
										</div>
										<div class="col-xl-6 mb-3">
											<label class="form-control-label">Sertifikat Tenaga Teknisi <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Sertifikat Tenaga Teknisi dari pabrikan alat keselamatan pelayaran (ILR, PMK, Lifeboat, EPIRB dan MES)" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Denah bengkel  <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Denah bengkel pemeliharaan untuk Inflatable Liferaft (ILR), Pemadam Kebakaran (PMK) Portable & CO2 System & Lifeboat & Davit" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Daftar Peralatan Kerja <span class="text-danger ml-2">*</span></label>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Surat Kepemilikan Workshop  <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content=
                                            "Surat Kepemilikan Workshop •Milik Sendiri (Sertifikat), •Sewa/Kontrak (Surat Perjanjian)" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Surat Rekomendasi  <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content=
                                            "Surat Rekomendasi dari Syahbandar Utama/KSOP/KANPEL/Kepala UPP setempat (Khusus SPK Baru);" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
											<label class="form-control-label">Foto-foto   <span class="text-danger ml-2">*</span></label>
                                            <i class="ion-information-circled" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Foto-foto (Ruang service, Administrasi, Peralatan dan gedung)" data-original-title="" title="">
                                                Syarat
                                            </i>
                                            <div class="custom-file">
												<input type="file" class="custom-file-input" id="customFile">
												<label class="custom-file-label" for="customFile">Choose file</label>
											</div>
                                        </div>
									</div>
									<ul class="pager wizard text-right">
										<li class="previous d-inline-block">
											<a href="javascript:;" class="btn btn-secondary ripple">Kembali</a>
										</li>
										<li class="next d-inline-block">
											<a href="javascript:;" class="btn btn-gradient-01">Lanjut</a>
										</li>
									</ul>
								</div>
								<div class="tab-pane" id="tab3">
									<div class="section-title mt-5 mb-5">
										<h4>Confirmation</h4>
									</div>
									<div id="accordion-icon-right" class="accordion">
										<div class="widget has-shadow">
											<a class="card-header collapsed d-flex align-items-center" data-toggle="collapse" href="#IconRightCollapseOne"
											 aria-expanded="true">
												<div class="card-title w-100">1. Identitas Service Station</div>
											</a>
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
											<a href="javascript:void(0)" class="btn btn-secondary ripple">Kembali</a>
										</li>
										<li class="next d-inline-block">
											<a href="javascript:void(0)" class="finish btn btn-gradient-01" data-toggle="modal">Selesai</a>
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
<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
</script>
