<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BTKP - Login Admin</title>
	<meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
								<button style="position: relative;" type="button" class="close" data-dismiss="alert"
									aria-label="Close"> <span aria-hidden="true"></span></button>
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
								<button style="position: relative;" type="button" class="close" data-dismiss="alert"
									aria-label="Close"> <span aria-hidden="true"></span></button>
								<h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
								<?=$data2; ?>
							</div>
							<?php
									}
									?>

							<div class="widget has-shadow">
								<div class="widget-header"><br>
									<h1 class="text-center">Form Login Admin</h1>
								</div>
								<div class="widget-body">
									<form action="<?php echo site_url('post_login_admin'); ?>" method="post">
										<div>
											<label class="form-control-label">Email<span
													class="text-danger ml-2">*</span></label>
											<input class="form-control" type="email" id="email" name="email_login"
												required placeholder="Email">
										</div>
										<br>
										<div>
											<label class="form-control-label">Password<span
													class="text-danger ml-2">*</span></label>
											<input class="form-control" type="password" name="password_login" required
												placeholder="Password">
										</div>
										<br>
										<div class="group material-input">
											<center>
												<?=$cap_img; ?>
											</center>
										</div>
										<div>
											<!-- <label>Masukkan captcha</label> -->
											<input class="form-control" type="text" id="captcha" name="captcha" required
												placeholder="Masukkan captcha">
										</div>
										<div class="row">
											<div class="col text-right">
												<a href="#">Lupa Password ?</a>
											</div>
										</div>
										<div class="sign-btn text-center">
											<input type="submit" name="submit" value="Masuk"
												class="btn btn-lg btn-success">
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

	<!-- End Container -->
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
	<!-- Begin Vendor Js -->
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/core.min.js"></script>
	<!-- End Vendor Js -->
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
			$("#alert-success").fadeTo(4000, 500).slideUp(500, function () {
				$("#alert-success").slideUp(500);
			});
			$("#alert-danger").fadeTo(4000, 500).slideUp(500, function () {
				$("#alert-danger").slideUp(500);
			});
			$('#signupForm').validate({
				rules: {
					nama_pengguna: 'required',
					no_hp: 'required',
					captcha2: 'required',
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
					captcha2: 'Silahkan masukkan kode Captcha'

				}
			});
		});

	</script>
	<!-- End Page Snippets -->
	<!-- End Page Snippets -->
</body>

</html>
