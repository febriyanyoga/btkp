<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BTKP - Masuk</title>
	<meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Google Fonts -->
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
	<script>
		WebFont.load({
        google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
    });
</script> -->
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/app/img/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/app/img/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/app/img/favicon-16x16.png">
<!-- Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/vendors/css/base/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/vendors/css/base/elisyam-1.5.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/animate/animate.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/lineawesome/css/line-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/themify/css/themify-icons.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/meteocons/css/meteocons.min.css">
<style type="text/css">
.error {
	color: red;
	display: none;
}
</style>
</head>

<body style="background:url(<?php echo base_url(); ?>assets/bgauth.jpg); background-size: cover;">
	<!-- Begin Preloader -->
	<div id="preloader">
		<div class="canvas">
			<img src="<?php echo base_url(); ?>assets/app/img/logo.png" alt="logo" class="loader-logo">
			<div class="spinner"></div>
		</div>
	</div>
	<!-- End Preloader -->
	<!-- Begin Container -->
	<div class="container-fluid no-padding h-100">
		<div class="row flex-row h-100">
			<!-- Begin Left Content -->
			<div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12">
				<div class="elisyam-bg background-01">
					<div class="elisyam-overlay overlay-08"></div>
					<div class="authentication-col-content-2 mx-auto text-center">
						<div class="logo-centered">
							<a href="db-default.html">
								<img src="<?php echo base_url(); ?>assets/app/img/logo.png" alt="logo">
							</a>
						</div>
						<h1>Aplikasi</h1> <br>
						<h2 style="color:white;">
							Keselamatan Pelayaran
						</h2>
						<ul class="login-nav nav nav-tabs mt-5 justify-content-center" role="tablist" id="animate-tab">
							<li><a class="active" data-toggle="tab" href="#singin" role="tab" id="singin-tab" data-easein="zoomInUp">Masuk</a></li>
							<li><a data-toggle="tab" href="#signup" role="tab" id="signup-tab" data-easein="zoomInRight">Daftar</a></li>
						</ul>
						<br>
						<ul class="login-nav nav nav-tabs mt-5 justify-content-center" role="tablist" id="animate-tab">
							<li><a class="active" data-toggle="tab" href="#singin">Bahasa Indonesia</a></li>
							<li><a data-toggle="tab" href="#signup">English</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- End Left Content -->
			<!-- Begin Right Content -->
			<div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
				<!-- Begin Form -->
				<div class="authentication-form-2 mx-auto">
					<div class="tab-content" id="animate-tab-content">
						<!-- Begin Sign In -->
						<div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
							<?php
                            $data = $this->session->flashdata('sukses');
                            if ($data != '') {
                                ?>
								<div class="alert alert-success" id="alert-success">
									<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
										aria-hidden="true"></span></button>
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
									<div class="alert alert-danger" id="alert-danger">
										<button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span
											aria-hidden="true"></span></button>
											<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
											<?=$data2; ?>
										</div>
										<?php
                                }
                                    ?>

									<div class="widget has-shadow">
										<div class="widget-header">
											<h1 class="text-center">Form Login</h1> <br>
										</div>
										<div class="widget-body">
											<form action="<?php echo site_url('login'); ?>" method="post">
												<div>
													<label class="form-control-label" >Email<span class="text-danger ml-2">*</span></label>
													<input class="form-control" type="email" id="email" name="email_login" required placeholder="Email">
												</div>
												<br>
												<div>
													<label class="form-control-label" >Password<span class="text-danger ml-2">*</span></label>
													<input class="form-control" type="password" name="password_login" required placeholder="Password">
												</div>
												<br>
												<div class="group material-input">
													<center>
														<?=$cap_img; ?>
													</center>
												</div>
												<div>
													<!-- <label>Masukkan captcha</label> -->
													<input class="form-control" type="text" id="captcha" name="captcha" required placeholder="Masukkan captcha">
												</div>
												<div class="row">
													<div class="col text-right">
														<a href="#">Lupa Password ?</a>
													</div>
												</div>
												<div class="sign-btn text-center">
													<input type="submit" name="submit" value="Masuk" class="btn btn-lg btn-gradient-01">
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- End Sign In -->
								<!-- Begin Sign Up -->
								<div role="tabpanel" class="tab-pane" id="signup" aria-labelledby="signup-tab">
									<div class="widget has-shadow">
										<div class="widget-header">
											<h3 class="text-center">Form Registrasi</h3>
										</div>
										<div class="widget-body">
											<form action="<?php echo site_url('daftar'); ?>" method="post" id="signupForm">
											<div class="form-group row mb-3">
											<div class="col-xl-6 mb-3">
													<input class="form-control" type="text" id="nama_pengguna" name="nama_pengguna" placeholder="Nama">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="nama_pengguna" class="error"></label>
												</div>
												<div class="col-xl-6 mb-3">
													<input class="form-control" type="email" id="email_pengguna" name="email_pengguna" placeholder="Alamat Email">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="email_pengguna" class="error"></label>
												</div>
												</div>
												<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<select class="form-control" id="id_jabatan" name="id_jabatan" required="required">
														<option value="">----- Pilih Instansi -----</option>
														<?php
                                                        foreach ($jabatan as $jab) {
                                                            if ($jab->id_jabatan > 4) {
                                                                ?>
																<option value="<?php echo $jab->id_jabatan; ?>">
																	<?php echo $jab->nama_jabatan; ?>
																</option>
																<?php
                                                            }
                                                        }
                                                        ?>
													</select>
													<label for="id_jabatan" class="error"></label>
												</div>
											<div class="col-xl-6 mb-3">
													<input class="form-control" type="number" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="no_hp" class="error"></label>
												</div>
												</div>
												<div class="form-group row mb-3">
												<div class="col-xl-6 mb-3">
													<input class="form-control" type="password" id="password" name="password" placeholder="Password">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="password" class="error"></label>
												</div>
												<div class="col-xl-6 mb-3">
													<input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Konfrimasi Password">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="confirm_password" class="error"></label>
												</div>
												</div>
												<!-- <div>
													<input class="form-control" type="text" id="jabatan_pengguna" name="jabatan_pengguna" placeholder="Jabatan Pengguna">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="jabatan_pengguna" class="error"></label>
												</div> -->
												<div>
													<center>
														<?= $cap_img; ?>
													</center>
												</div> <br>
												<div>
													<input class="form-control" type="text" id="captcha2" name="captcha2" placeholder="Masukkan captcha">
													<span class="highlight"></span>
													<span class="bar"></span>
													<label for="captcha2" class="error"></label>
												</div>
												<div class="row mt-3">
													<div class="col text-left">
														<div class="styled-checkbox">
															<input type="checkbox" name="agree" id="agree" value="setuju">
															<label for="agree">Saya Menerima <a href="#" data-toggle="modal" data-target="#syarat">Syarat dan Ketentuan</a></label>
														</div>
														<label for="agree" class="error"></label>
													</div>
												</div>
												<div class="sign-btn text-center">
													<input type="submit" name="submit" value="Daftar" class="btn btn-lg btn-gradient-01">
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- End Sign Up -->
							</div>
						</div>
						<!-- End Form -->
					</div>
				<!-- </div> -->
				<!-- End Right Content -->
			</div>
			<!-- End Row -->
		</div>

		<!-- modal syarat dan ketentuan -->
		<div class="modal fade" id="syarat" tabindex="-1" role="dialog" aria-labelledby="editskpa">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="exampleModalLabel1">Syarat dan Ketentuan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<h5>Syarat</h5>
						<ol type="1">
							<li>1. Syarat 1</li>
							<li>2. Syarat 2</li>
							<li>3. Syarat 3</li>
							<li>4. Syarat 4</li>
							<li>5. Syarat 5</li>

						</ol>
						<br>
						<h5>Ketentuan</h5>
						<ol type="1">
							<li>1. Ketentuan 1</li>
							<li>2. Ketentuan 2</li>
							<li>3. Ketentuan 3</li>
							<li>4. Ketentuan 4</li>
							<li>5. Ketentuan 5</li>

						</ol>
					</div>
					<div class="modal-footer">

					</div>
				</div>
			</div>
		</div>
	<!-- End Container -->
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
	<!-- Begin Vendor Js -->
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/core.min.js"></script>
	<!-- End Vendor Js -->
	<!-- Begin Page Vendor Js -->
	<!-- <script src="<?php echo base_url(); ?>assets/app/vendors/js/app/app.min.js"></script> -->
	<!-- End Page Vendor Js -->
	<!-- Begin Page Snippets -->
	<script src="<?php echo base_url(); ?>assets/app/js/components/tabs/animated-tabs.min.js"></script>
	<script type="text/javascript">
		$(window).on("load", function () {
			$(".loader").fadeOut();
			$("#preloader").delay(350).fadeOut("slow");
		});
	</script>
	<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery-3.1.1.js"></script>
	<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/app/js/validate/jquery.validate.js"></script>
	<script type="text/javascript">
		$().ready(function () {
			$("#alert-success").fadeTo(2000, 500).slideUp(500, function(){
				$("#alert-success").slideUp(500);
			});
			$("#alert-danger").fadeTo(2000, 500).slideUp(500, function(){
				$("#alert-danger").slideUp(500);
			});
			$('#signupForm').validate({
				rules: {
					nama_pengguna: 'required',
					no_hp: 'required',
					captcha2 :'required',
					password: {
						required: true,
						minlength: 6
					},
					confirm_password: {
						required: true,
						minlength: 6,
						equalTo: '#password'
					},
					email_pengguna: {
						required: true,
						email: true
					},
					jabatan_pengguna: {
						required: true,
					},
					agree: 'required',
					id_jabatan: 'required'
				},
				messages: {
					nama_pengguna: 'Silahkan isi Nama Anda',
					no_hp: 'Silahkan isi nomor telfon Anda',
					password: {
						required: 'Silahkan isi password Anda',
						minlength: 'Silahkan isi password Anda minimal 6 karakter'
					},
					confirm_password: {
						required: 'Silahkan isi password Anda',
						minlength: 'Silahkan isi password Anda minimal 6 karakter',
						equalTo: 'Kata sandi tidak cocok'
					},
					email_pengguna: {
						required: 'Silahkan isi alamat email anda',
						email: 'Alamat email tidak valid',
					},
					jabatan_pengguna: {
						required: 'Silahkan isi jabatan anda anda',
					},
					agree: 'Silahkan setujui syarat dan ketentuan kami',

					id_jabatan: 'Silahkan Pilih jenis user',
					captcha2 : 'Silahkan masukkan kode Captcha'

				}
			});
		});
	</script>
				<!-- End Page Snippets -->
	<!-- End Page Snippets -->
</body>

</html>
