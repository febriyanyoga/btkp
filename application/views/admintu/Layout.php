<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>assets/app/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>assets/app/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/app/img/favicon-16x16.png">
	<!-- Stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/vendors/css/base/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/vendors/css/base/elisyam-1.5.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/lineawesome/css/line-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/themify/css/themify-icons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/icons/meteocons/css/meteocons.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/owl-carousel/owl.carousel.min.css">
	
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/jquery.ui.min.js"></script>

	<!-- tabel -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/app/css/datatables/datatables.min.css">

</head>
<body id="page-top">
	<!-- Begin Preloader -->
	<div id="preloader">
		<div class="canvas">
			<img src="<?php echo base_url(); ?>assets/logo.png" alt="logo" class="loader-logo">
			<div class="spinner"></div>
		</div>
	</div>
	<!-- End Preloader -->
	<div class="page db-social">
		<!-- Begin Header -->
		<header class="header">
			<nav class="navbar fixed-top">
				<!-- Begin Search Box-->
				<div class="search-box">
					<button class="dismiss"><i class="ion-close-round"></i></button>
					<form id="searchForm" action="#" role="search">
						<input type="search" placeholder="Search something ..." class="form-control">
					</form>
				</div>
				<!-- End Search Box-->
				<!-- Begin Topbar -->
				<div class="navbar-holder d-flex align-items-center align-middle justify-content-between">
					<!-- Begin Logo -->
					<div class="navbar-header">
						<a href="<?php echo site_url('tatausaha'); ?>" class="navbar-brand">
							<div class="brand-image brand-big">
								<img src="<?php echo base_url(); ?>assets/logo.png" alt="logo" style="width: 70px;" class="logo-big">
							</div>
							<div class="brand-image brand-small">
								<img src="<?php echo base_url(); ?>assets/logo.png" alt="logo" class="logo-small">
							</div>
						</a>
						<!-- Toggle Button -->
						<a id="toggle-btn" href="#" class="menu-btn active">
							<span></span>
							<span></span>
							<span></span>
						</a>
						<!-- End Toggle -->
					</div>
					<!-- End Logo -->
					<!-- Begin Navbar Menu -->
					<ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center pull-right">
						<li class="nav-item d-flex align-items-center"><a href="<?php echo site_url('tatausaha'); ?>"><i class="la la-home"></i></a></li>
						<!-- Search -->
						<!-- <li class="nav-item d-flex align-items-center"><a id="search" href="#"><i class="la la-search"></i></a></li> -->
						<!-- End Search -->
						<!-- Begin Notifications -->
						<!-- <li class="nav-item dropdown"><a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="la la-bell animated infinite swing"></i><span
							class="badge-pulse"></span></a>
							<ul aria-labelledby="notifications" class="dropdown-menu notification">
								<li>
									<div class="notifications-header">
										<div class="title">Notifications (4)</div>
										<div class="notifications-overlay"></div>
										<img src="<?php echo base_url(); ?>assets/app/img/notifications/01.jpg" alt="..." class="img-fluid">
									</div>
								</li>
								<li>
									<a href="#">
										<div class="message-icon">
											<i class="la la-user"></i>
										</div>
										<div class="message-body">
											<div class="message-body-heading">
												New user registered
											</div>
											<span class="date">2 hours ago</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="message-icon">
											<i class="la la-calendar-check-o"></i>
										</div>
										<div class="message-body">
											<div class="message-body-heading">
												New event added
											</div>
											<span class="date">7 hours ago</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="message-icon">
											<i class="la la-history"></i>
										</div>
										<div class="message-body">
											<div class="message-body-heading">
												Server rebooted
											</div>
											<span class="date">7 hours ago</span>
										</div>
									</a>
								</li>
								<li>
									<a href="#">
										<div class="message-icon">
											<i class="la la-twitter"></i>
										</div>
										<div class="message-body">
											<div class="message-body-heading">
												You have 3 new followers
											</div>
											<span class="date">10 hours ago</span>
										</div>
									</a>
								</li>
								<li>
									<a rel="nofollow" href="#" class="dropdown-item all-notifications text-center">View All Notifications</a>
								</li>
							</ul>
						</li> -->
						<!-- End Notifications -->
						<!-- User -->
						<li class="nav-item dropdown"><a id="user" rel="nofollow" data-target="#" href="#" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false" class="nav-link"><img src="<?php echo base_url(); ?>assets/app/img/avatar/images.png"
							alt="..." class="avatar rounded-circle"></a>
							<ul aria-labelledby="user" class="user-size dropdown-menu">
								<li class="welcome">
									<a href="<?php echo site_url('profile_t'); ?>" class="edit-profil"><i class="la la-gear"></i></a>
									<img src="<?php echo base_url(); ?>assets/app/img/avatar/images.png" alt="..." class="rounded-circle">
								</li>
								<li>
									<p class="dropdown-item" style="margin-bottom: auto;">Selamat Datang !<h5 class="dropdown-item"><?php echo $this->session->userdata('nama'); ?></h5></p>
								</li>
								<li>
									<a href="<?php echo site_url('profile_t'); ?>" class="dropdown-item">
										Profile
									</a>
								</li>
								<!-- <li>
									<a href="app-mail.html" class="dropdown-item">
										Messages
									</a>
								</li>
								<li>
									<a href="#" class="dropdown-item no-padding-bottom">
										Settings
									</a>
								</li>
								<li class="separator"></li>
								<li>
									<a href="pages-faq.html" class="dropdown-item no-padding-top">
										Faq
									</a>
								</li> -->
								<li><a rel="nofollow" href="<?php echo site_url('logout_admin'); ?>" class="dropdown-item logout text-center"><i class="ti-power-off"></i></a></li>
							</ul>
						</li>
						<!-- End User -->
					</ul>
					<!-- End Navbar Menu -->
				</div>
				<!-- End Topbar -->
			</nav>
		</header>
		<!-- End Header -->
		<!-- Begin Page Content -->
		<div class="page-content d-flex align-items-stretch">
			<div class="compact-sidebar light-sidebar has-shadow">
				<!-- Begin Side Navbar -->
				<nav class="side-navbar box-scroll sidebar-scroll">
					<!-- Begin Main Navigation -->
					<ul class="list-unstyled">
						<li>
							<a href="<?php echo site_url('tatausaha'); ?>">
								<i class="ion-home"></i><span> Dashboard</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('perizinan'); ?>">
								<i class="ion-clipboard"></i><span> Data Perizinan</span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('pengujian'); ?>">
								<i class="ti ti-write"></i><span> Data Pengujian </span>
							</a>
						</li>
						<li>
							<a href="<?php echo site_url('reinspeksi'); ?>">
								<i class="ti ti-notepad"></i><span> Data Re-inspeksi</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- End Left Sidebar -->
			<!-- Begin Content -->
			<div class="content-inner compact" style="background:url(<?php echo base_url(); ?>assets/bg.jpg); background-size: cover;">
				<!-- Begin Jumbotron -->

				<!-- End Jumbotron -->
				<?php echo $isi; ?>
				<!-- Begin Page Footer-->
				<footer class="main-footer">
					<div class="row">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
							<p class="text-gradient-02">Design By Soepomo 84</p>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-xl-end justify-content-lg-end justify-content-md-end justify-content-center">
							<ul class="nav">
								<li class="nav-item">
									<a class="nav-link" href="documentation.html">Bantuan</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>
				<!-- End Page Footer -->
				<a href="#" class="go-top"><i class="la la-arrow-up"></i></a>

			</div>
			<!-- End Content -->
		</div>
		<!-- End Page Content -->
	</div>

</body>

</html>
<!-- Begin Vendor Js -->
<script src="<?php echo base_url(); ?>assets/app/vendors/js/custom.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/base/core.min.js"></script>
<!-- End Vendor Js -->
<!-- Begin Page Vendor Js -->
<script src="<?php echo base_url(); ?>assets/app/vendors/js/bootstrap-wizard/bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/js/components/wizard/form-wizard.min.js"></script>

<script src="<?php echo base_url(); ?>assets/app/vendors/js/nicescroll/nicescroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/progress/circle-progress.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/app/app.min.js"></script>
<!-- End Page Vendor Js -->
<!-- Begin Page Snippets -->
<script src="<?php echo base_url(); ?>assets/app/vendors/js/chart/chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/js/dashboard/db-default.js"></script>
<!-- End Page Snippets -->
<script src="<?php echo base_url(); ?>assets/app/js/components/tables/tables.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/app/vendors/js/datatables/buttons.print.min.js"></script>
<!-- End Page Vendor Js -->

<script>
	$.noConflict();
	jQuery(document).ready(function ($) {
		$('#myTable').DataTable();
		$('#myTable2').DataTable();
		$('#myTable3').DataTable();
		$('#myTable4').DataTable();
		$('#myTable5').DataTable();
		$('#myTable6').DataTable();
		$('#myTable7').DataTable();
		$('#myTable8').DataTable();
	});


</script>
<!-- Popover -->
<script>

	$(function () {
		$('[data-toggle="popover"]').popover()
	})

</script>


