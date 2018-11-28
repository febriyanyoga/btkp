<!DOCTYPE html>
<html lang="en">
	<head>

		<title>Home | BTKP</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="author" content="Erilisdesign.com">

		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/bootstrap.min.css">
		 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/style.css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/utilities.css">

		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/custom.css">

		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/jquery.fullpage.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/slick.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/vegas.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/magnific-popup.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/animate.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/fontawesome-all.min.css" type="text/css">
		<link rel="stylesheet" href="<?php echo base_url()?>assets/landing-page/css/themify-icons.css" type="text/css">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,300i,400,400i,700,700i%7CMontserrat:100,200,300,400,500,700">

		<link rel="shortcut icon" href="<?php echo base_url()?>assets/landing-page/icon/favicon.ico">

		<script src="<?php echo base_url()?>assets/landing-page/js/modernizr-custom.js"></script>

	</head>
	<body class="layout-wide slideshow-background">

		<div id="preloader" class="preloader preloader-dark">
			<div class="loader-status">
				<div class="circle-side"></div>
			</div>
		</div>

		<div class="site-container">

			<div id="top"></div>
		
			<!-- Site header -->
			<header class="site-header header-mobile-light header-content-light header-content-mobile-dark">
				<div class="header-brand">
					<!-- Logo -->
					<a class="logo" href="#">
						<!-- <img class="logo-light" src="<?php echo base_url()?>assets/landing-page/images/logo.png" alt=""> -->
						<img class="logo-dark" src="<?php echo base_url()?>assets/landing-page/images/logo-dark.png" alt="">
						<img class="logo-light" style="max-height: 115px; margin-left: 80px;" src="<?php echo base_url()?>assets/landing-page/images/logo-btkp-glow.png" alt="">
						<!-- <img class="logo-dark" src="<?php echo base_url()?>assets/landing-page/images/logo-btkp.png" alt=""> -->
					</a>
					<button type="button" id="navigation-toggle" class="nav-toggle">
						<span></span>
						<span></span>
						<span></span>
					</button>
				</div>
				<div class="header-collapse">
					<div class="header-collapse-inner">
						<nav class="site-nav">
							<ul id="navigation">
								<li data-menuanchor="home">
									<a href="#home">Beranda</a>
								</li>
								<!-- <li data-menuanchor="our-mission">
									<a href="#our-mission">Pelayanan</a>
								</li> -->
								<li data-menuanchor="what-we-do">
									<a href="#about">Tentang Kami</a>
								</li>
								<!-- <li data-menuanchor="our-solutions">
									<a href="#our-solutions">Our solutions</a>
								</li>
								<li data-menuanchor="subscribe">
									<a href="#subscribe">Subscribe</a>
								</li>
								<li data-menuanchor="our-work">
									<a href="#our-work">Our work</a>
								</li> -->
								<li data-menuanchor="contact">
									<a href="#contact">Kontak</a>
								</li>
								<li>
									<div class="dropdown">
									  	<button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
									    	Pelayanan
									  	</button>
									  	<div class="dropdown-menu">
									    	<a style="color: black;" class="dropdown-item" href="#perijinan">Perijinan</a>
									    	<a style="color: black;" class="dropdown-item" href="#pengujian">Pengujian</a>
									  	</div>
									</div>
								</li>
								<li data-menuanchor="our-work">
									<a href="<?php echo site_url('Home/login')?>">
										<button style="margin-top: -4px;" class="btn btn-primary btn-sm">Login</button>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</header>

			<!-- Back To Top Button -->
			<a href="#top" class="backtotop">
				<span>Kembali ke atas</span>
				<i class="fas fa-angle-up"></i>
			</a>

			<!-- Global overlay -->
			<div class="global-overlay">
				<div class="overlay-inner bg-image-holder bg-cover">
					<img src="<?php echo base_url()?>assets/landing-page/demo/images/image-4.jpg" alt="background">
				</div>
				<div class="overlay-inner overlay-video">
					<div class="video-wrapper">
						<video autoplay muted loop data-keepplaying>
							<!-- <source src="demo/video/work.webm" type="video/webm"> -->
							<source src="<?php echo base_url()?>assets/landing-page/demo/video/back.mp4" type="video/mp4">
							<!-- <source src="demo/video/work.ogv" type="video/ogg"> -->
						</video>
					</div>
				</div>
				<div class="overlay-inner bg-dark opacity-50"></div>
			</div>

			<!-- Scroll progress -->
			<div class="scroll-progress">
				<div class="sp-left">
					<div class="sp-inner"></div>
					<div class="sp-inner progress"></div>
				</div>
				<div class="sp-right">
					<div class="sp-inner"></div>
					<div class="sp-inner progress"></div>
				</div>
			</div>

			<!-- Page content -->
			<div class="ln-fullpage" data-navigation="true">

				<section class="ln-section d-lg-flex fullscreen-lg" data-anchor="home" data-tooltip="Home" data-overlay-color="#00050e" data-overlay-opacity="1">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-lg-center" style="margin-top: 100px;">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-12 col-lg-8 col-md-12 text-center">
							<h1 class="text-white mb-5 animated" data-animation="fadeInUp" data-animation-delay="150"><b>SELAMAT DATANG DI SISTEM INFORMASI</b></h1>
								<h2 class="text-white mb-5 animated" data-animation="fadeInUp" data-animation-delay="150"><b>Balai Teknologi Keselamatan Pelayaran</b></h2>
								<a href="<?php echo site_url('Home/daftar')?>" class="btn btn-primary text-center" data-animation="fadeInUp" data-animation-delay="300">Daftar</a>

							</div>
							<div class="col-lg-2"></div>
						</div>
					</div>
				</section>

				<section class="ln-section d-xl-flex" data-anchor="about" data-tooltip="About" data-overlay-color="#00050e" data-overlay-opacity="60">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">

						<div class="row">
							<div class="col-12 col-xl-12">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp" data-animation-delay="150">Tentang Kami</h2>
								<p style="text-align: justify;" class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">Balai Teknologi Keselamatan Pelayaran (BTKP) merupakan salah satu unit
								kerja yang berada di bawah Direktorat Jenderal Perhubungan Laut dengan
								cakupan wilayah kerja seluruh Indonesia sehingga untuk mewujudkan capaian
								kinerja di atas terutama penurunan jumlah kecelakaan yang disebabkan oleh
								teknis dan lain-lain sesuai dengan Tugas Pokok dan Fungsi Balai Teknologi
								Keselamatan Pelayaran (BTKP) untuk melaksanakan penilaian, pengujian,
								rancang bangun, pembuatan alat-alat dan bahan-bahan keselamatan pelayaran
								serta penyiapan standarisasi dan sertifikasi alat-alat serta bahan-bahan
								keselamatan pelayaran dan pemberitaan keselamatan pelayaran.</p>
								<p style="text-align: justify;" class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">
								Tugas Pokok dan Fungsi Balai Teknologi Keselamatan Pelayaran (BTKP)
								adalah menjamin semua alat keselamatan pelayaran berfungsi dengan baik,
								sehubungan dengan itu stakeholder terkait wajib melaksanakan tugasnya masing-
								masing anatar lain perawatan dan pemeliharaan alat keselamatan pelayaran
								dengan baik. Untuk itu BTKP perlu membangun sistem aplikasi pelayaran dan
								pengujian alat keselamatan pelayaran secara online untuk memonitor semua
								kegiatan para stakeholder.
								</p>
								<p style="text-align: justify;" class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">
								Sebagai Unit Pelaksana Teknis Direktorat Jenderal Perhubungan Laut yang
								melaksanakan Tugas Pokok dan Fungsi Penilaian, Pengujian serta Rancang
								Bangun dan Pembuatan Peralatan Keselamatan Pelayaran, serta Penyiapan
								Standarisasi dan Sertifikasi Peralatan Keselamatan pelayaran serta survey dan
								pemberitaan keselamatan pelayaran dapat terwujud.
								</p>
							</div>
						</div>
						
					</div>
				</section>

				<section class="ln-section d-xl-flex" data-anchor="what-we-do" data-tooltip="What we do" data-overlay-color="#2d5aec" data-overlay-opacity="60">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">

						<div class="row">
							<div class="col-12 col-xl-5 mb-5 mb-xl-0">
								<h2 class="text-white animated mb-4" data-animation="fadeInUp">Pelayanan</h2>
								<p class="text-white animated" data-animation="fadeInUp" data-animation-delay="150" style="text-align: justify;"><span>Melaksanakan penilaian, pengujian, rancang bangun, pembuatan alat-alat dan bahan-bahan keselamatan pelayaran serta penyiapan standarisasi dan sertifikasi alat-alat dan bahan-bahan keselamatan pelayaran serta survei dan pemberitaan keselamatan pelayaran.</span></p>
							</div>
							<div class="col-12 col-xl-6 offset-xl-1">
								<div class="row">

									<div class="col-md-6 col-sm-6">
										<div class="feature-block mb-5 animated" data-animation="fadeInUp">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-timer"></i>
												</div>
											</div>
											<a href="#perijinan"><h3 class="h4 text-white">Perijinan</h3></a>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="feature-block mb-5 animated" data-animation="fadeInUp" data-animation-delay="150">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-brush-alt"></i>
												</div>
											</div>
											<h3 class="h4 text-white">Pengujian</h3>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="feature-block mb-5 animated" data-animation="fadeInUp" data-animation-delay="300">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-book"></i>
												</div>
											</div>
											<h3 class="h4 text-white">Pelayanan3</h3>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="feature-block mb-5 animated" data-animation="fadeInUp" data-animation-delay="450">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-layers"></i>
												</div>
											</div>
											<h3 class="h4 text-white">Pelayanan4</h3>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="feature-block mb-5 mb-sm-0 animated" data-animation="fadeInUp" data-animation-delay="600">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-settings"></i>
												</div>
											</div>
											<h3 class="h4 text-white">Pelayanan5</h3>
										</div>
									</div>

									<div class="col-md-6 col-sm-6">
										<div class="feature-block animated" data-animation="fadeInUp" data-animation-delay="750">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-headphone-alt"></i>
												</div>
											</div>
											<h3 class="h4 text-white">Pelayanan6</h3>
										</div>
									</div>

								</div>
							</div>
						</div>
						
					</div>
				</section>

				<section class="ln-section d-xl-flex" data-anchor="perijinan" data-tooltip="Perijinan" data-overlay-color="#00050e" data-overlay-opacity="60">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">
						<div class="row mb-5">
							<div class="col-12 col-xl-12">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp">Perijinan</h2>
								<p class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">BTKP melayani permohonan perijinan Workshop untuk melakukan perawatan dan perbaikan peralatan keselamatan kapal.</p>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-md-12">
								<img style="max-height: 400px;" src="<?php echo base_url()?>assets/landing-page/images/info-grafis.jpg">
							</div>
						</div>
						<div class="row text-center">
							<div class="col-md-12">
								<a href="<?php echo site_url('Home/daftar')?>" class="btn btn-lg btn-primary mt-5">Perijinan Baru</a>
							</div>
						</div>
					</div>
				</section>

				<section class="ln-section d-xl-flex" data-anchor="pengujian" data-tooltip="Pengujian" data-overlay-color="#2d5aec" data-overlay-opacity="90">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">
						<div class="row mb-5">
							<div class="col-12 col-xl-12">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp">Pengujian</h2>
								<p class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">BTKP melayani permohonan pengujian Workshop untuk melakukan perawatan dan perbaikan peralatan keselamatan kapal.</p>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-md-12">
								<img style="max-height: 400px;" src="<?php echo base_url()?>assets/landing-page/images/info-grafis.jpg">
							</div>
						</div>
						<div class="row text-center">
							<div class="col-md-12">
								<a href="<?php echo site_url('Home/daftar')?>" class="btn btn-lg btn-warning mt-5">Pengujian</a>
							</div>
						</div>
					</div>
				</section>


			<!-- 	<section class="ln-section d-xl-flex" data-anchor="subscribe" data-tooltip="Subscribe" data-overlay-color="#2d5aec" data-overlay-opacity="90">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">
						<div class="row">
							<div class="col-12 col-xl-6">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp">Get our latest content in your inbox</h2>
								<p class="text-white mb-5 animated" data-animation="fadeInUp" data-animation-delay="150">Pellentesque consequat at justo quis vulputate. Maecenas elementum metus eu maximus auctor. Morbi ultrices quam rhoncus purus bibendum ornare.</p>
								<div class="subscribe-form animated" data-animation="fadeInUp" data-animation-delay="300">
									<form class="text-white mb-0" id="sf" name="sf" action="include/subscribe.php" method="post">
										<div class="row">

											<div class="form-process"></div>

											<div class="form-process"></div>

											<div class="col-12 col-md-9">
												<div class="form-group text-white">
													<input type="email" id="sf-email" name="sf-email" placeholder="Enter Your Email Address" class="form-control fc-bordered fc-light required">
												</div>
											</div>

											<div class="col-12 d-none">
												<input type="text" id="sf-botcheck" name="sf-botcheck" value="" class="form-control" />
											</div>

											<div class="col-12 col-md-3">
												<button class="btn btn-white" type="submit" id="sf-submit" name="sf-submit">Notify Me</button>
											</div>

										</div>
									</form>
									<div class="subscribe-form-result pt-2 text-white"></div>
								</div>
							</div>
						</div>
					</div>
				</section> -->

				<!-- <section class="ln-section d-xl-flex" data-anchor="our-work" data-tooltip="Our work" data-overlay-color="#00050e" data-overlay-opacity="80">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-xl-center">
						<div class="row mb-5">
							<div class="col-12 col-xl-6">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp">Our Work</h2>
								<p class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">Donec sollicitudin libero vitae massa placerat tempor. Duis rutrum nisl eu ipsum varius, nec feugiat tortor vulputate. Integer pellentesque leo id metus dictum, a tristique tellus faucibus.</p>
							</div>
						</div>
						<div class="slider dots-light animated" data-animation="fadeInUp" data-animation-delay="300" data-slick='{"dots": true}'>

							<div>
								<div class="portfolio-item mb-5">
									<div class="row">
										<div class="col-12 col-lg-7">
											<div class="item-media">
												<a href="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-6.jpg" class="mfp-image">
													<div class="media-container">
														<div class="bg-image-holder bg-cover">
															<img src="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-6-min.jpg" alt="">
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-12 col-lg-5">
											<div class="item-details">
												<div class="divider divider-alt bg-white mt-0 mb-5 d-none d-lg-block"></div>
												<h4 class="h3 item-title text-white">Mountains</h4>
												<p class="item-cat text-white">Web Design</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div>
								<div class="portfolio-item mb-5">
									<div class="row flex-lg-row-reverse">
										<div class="col-12 col-lg-7">
											<div class="item-media">
												<a href="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-1.jpg" class="mfp-image">
													<div class="media-container">
														<div class="bg-image-holder bg-cover">
															<img src="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-1-min.jpg" alt="">
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-12 col-lg-5 d-lg-flex justify-content-lg-end text-lg-right">
											<div class="item-details">
												<div class="divider divider-alt bg-white mt-0 mb-5 ml-auto mr-0 d-none d-lg-block"></div>
												<h4 class="h3 item-title text-white">Love</h4>
												<p class="item-cat text-white">Web Design</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div>
								<div class="portfolio-item mb-5">
									<div class="row">
										<div class="col-12 col-lg-7">
											<div class="item-media">
												<a href="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-2.jpg" class="mfp-image">
													<div class="media-container">
														<div class="bg-image-holder bg-cover">
															<img src="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-2-min.jpg" alt="">
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-12 col-lg-5">
											<div class="item-details">
												<div class="divider divider-alt bg-white mt-0 mb-5 d-none d-lg-block"></div>
												<h4 class="h3 item-title text-white">Beautiful Girl</h4>
												<p class="item-cat text-white">Brand</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div>
								<div class="portfolio-item mb-5">
									<div class="row flex-lg-row-reverse">
										<div class="col-12 col-lg-7">
											<div class="item-media">
												<a href="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-3.jpg" class="mfp-image">
													<div class="media-container">
														<div class="bg-image-holder bg-cover">
															<img src="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-3-min.jpg" alt="">
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-12 col-lg-5 d-lg-flex justify-content-lg-end text-lg-right">
											<div class="item-details">
												<div class="divider divider-alt bg-white mt-0 mb-5 ml-auto mr-0 d-none d-lg-block"></div>
												<h4 class="h3 item-title text-white">Future City</h4>
												<p class="item-cat text-white">Web Design</p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div>
								<div class="portfolio-item">
									<div class="row">
										<div class="col-12 col-lg-7">
											<div class="item-media">
												<a href="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-4.jpg" class="mfp-image">
													<div class="media-container">
														<div class="bg-image-holder bg-cover">
															<img src="<?php echo base_url()?>assets/landing-page/demo/images/portfolio/project-4-min.jpg" alt="">
														</div>
													</div>
												</a>
											</div>
										</div>
										<div class="col-12 col-lg-5">
											<div class="item-details">
												<div class="divider divider-alt bg-white mt-0 mb-5 d-none d-lg-block"></div>
												<h4 class="h3 item-title text-white">Golden Gate Bridge</h4>
												<p class="item-cat text-white">Design</p>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</section> -->

				<section class="ln-section d-xl-flex" data-anchor="contact" data-tooltip="Contact" data-overlay-color="#00050e" data-overlay-opacity="90">
					<div class="overlay has-mobile-overlay">
						<div class="overlay-inner"></div>
					</div>
					<div class="container align-self-center">
						<div class="row mb-5">
							<div class="col-12 col-xl-6">
								<h2 class="text-white mb-4 animated" data-animation="fadeInUp">Kontak Kami</h2>
								<p class="text-white animated" data-animation="fadeInUp" data-animation-delay="150">Anda dapat menghubungi kami terkait pelayan dan keluhan melalui beberapa cara berikut ini.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-12 col-lg-5 mb-5 mb-lg-0">
								<div class="row">
									<div class="col-12 col-md-4 col-lg-6 mb-5 mb-md-0 mb-lg-5 animated" data-animation="fadeInUp" data-animation-delay="150">
										<div class="feature-block">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-mobile"></i>
												</div>
											</div>
											<p class="text-white">(021) 4356767<br/>
											(021) 4356767</p>
										</div>
									</div>
									<div class="col-12 col-md-4 col-lg-6 mb-5 mb-md-0 mb-lg-5 animated" data-animation="fadeInUp" data-animation-delay="150">
										<div class="feature-block">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-location-pin"></i>
												</div>
											</div>
											<p class="text-white">Jl. Raya Ancol Baru No. 1, Kota Tua, Tanjung Priok, Pademangan, Kota Jakarta Utara, Jakarta 14310<br/>
											Indonesia</p>
										</div>
									</div>
									<div class="col-12 col-md-4 col-lg-6 animated" data-animation="fadeInUp" data-animation-delay="150">
										<div class="feature-block">
											<div class="feature-icon mb-4 text-white">
												<div>
													<i class="ti-email"></i>
												</div>
											</div>
											<p class="text-white">support@btkp.com<br/>
											hello@btkp.com</p>
										</div>
									</div>
								</div>
							</div>
							<div class="col-12 col-lg-6 offset-lg-1 animated" data-animation="fadeInUp" data-animation-delay="150">
								<div class="contact-form">
									<form class="text-white mb-0" id="cf" name="cf" action="include/sendemail.php" method="post">
										<div class="row">

											<div class="form-process"></div>

											<div class="col-12 col-md-6">
												<div class="form-group error-text-white">
													<input type="text" id="cf-name" name="cf-name" placeholder="Masukkan nama anda" class="form-control fc-bordered fc-light required">
												</div>
											</div>

											<div class="col-12 col-md-6">
												<div class="form-group error-text-white">
													<input type="email" id="cf-email" name="cf-email" placeholder="masukkan alamat email anda" class="form-control fc-bordered fc-light required">
												</div>
											</div>

											<div class="col-12">
												<div class="form-group error-text-white">
													<input type="text" id="cf-subject" name="cf-subject" placeholder="Subjek (Pilihan/tambahan)" class="form-control fc-bordered fc-light">
												</div>
											</div>

											<div class="col-12 mb-4">
												<div class="form-group error-text-white">
													<textarea name="cf-message" id="cf-message" placeholder="Tulis pesan disini" class="form-control fc-bordered fc-light required" rows="7"></textarea>
												</div>
											</div>

											<div class="col-12 d-none">
												<input type="text" id="cf-botcheck" name="cf-botcheck" value="" class="form-control fc-bordered fc-light" />
											</div>

											<div class="col-12">
												<button class="btn btn-white" type="submit" id="cf-submit" name="cf-submit">Kirim pesan</button>
											</div>

										</div>
									</form>
									<div class="contact-form-result pt-1"></div>
								</div>
							</div>
						</div>
					</div>
				</section>

			</div>

			<!-- Site footer -->
			<footer class="site-footer footer-content-light footer-mobile-content-light">
				<div class="overlay">
					<div class="overlay-inner bg-white"></div>
				</div>
				<div class="container socials-container">
					<nav class="socials-icons">
						<ul class="mx-auto">
							<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#"><i class="fab fa-pinterest"></i></a></li>
						</ul>
					</nav>
				</div>
				<div class="container copyright-container">
					<p>© 2018 BTKP - All Rights Reserved</p>
				</div>
			</footer>

		</div>

		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.easing.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/scrolloverflow.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.fullpage.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.waypoints.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.smooth-scroll.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.form.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.magnific-popup.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.countdown.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/imagesloaded.pkgd.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/granim.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/slick.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/vegas.min.js"></script>
		<script src="<?php echo base_url()?>assets/landing-page/js/jquery.mb.YTPlayer.js"></script>

		<script src="<?php echo base_url()?>assets/landing-page/js/main.js"></script>

	</body>
</html>