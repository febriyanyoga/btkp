<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | BTKP</title>

    <!-- ====Favicons==== -->
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">


    <!-- ====Google Font Stylesheet==== -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900' rel='stylesheet' type='text/css'>

    <!-- ====Font Awesome Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/font-awesome.min.css" rel="stylesheet">

    <!-- ====Bootstrap Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/bootstrap.min.css" rel="stylesheet">

    <!-- ====Owl Carousel Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/owl.carousel.min.css" rel="stylesheet">

    <!-- ====bxSlider Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/jquery.bxslider.min.css" rel="stylesheet">

    <!-- ====Main Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/style.css" rel="stylesheet">

    <!-- ====Responsive Stylesheet==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/responsive-style.css" rel="stylesheet">

    <!-- ====Main Color Scheme CSS==== -->
    <link href="<?php echo base_url(); ?>assets/website/css/main-color-2.css" rel="stylesheet" type='text/css' id="mainColorScheme">

    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <!-- Preloader Start -->
    <div id="preloader">
        <div class="preloader--bounce">
            <div class="preloader-bouncer--1"></div>
            <div class="preloader-bouncer--2"></div>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Navigation Area Start -->
        <nav id="navigation">
            <div class="contact-bar">
                <div class="container">
                    <div class="social-icons pull-left">
                        <ul class="nav nav-tabs">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div>
                    <div class="contact-bar--text pull-left">
                        <p><a href="mailto:support@btkp.com"><i class="fa fm fa-envelope-o"></i>support@btkp.com</a></p>
                    </div>
                    <div class="contact-bar--text pull-left">
                        <p><a href="tel:+444000000000"><i class="fa fm fa-phone"></i>+62-xxx-xxx-xxx</a></p>
                    </div>
                    <div class="contact-bar--text text-capitalize pull-right">
                        <p><a href="<?php echo site_url('website/login'); ?>"><i class="fa fm fa-user"></i>login</a><span class="slash">/</span><a href="http://billing.ywhmcs.com/register.php?systpl=OrDomain"><i class="fa fm fa-user-plus"></i>signup</a></p>
                    </div>
                </div>
            </div>
            <div class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Logo Start -->
                        <a href="<?php echo base_url(); ?>" class="navbar-brand"><span><i class="fa fa-globe"></i> B</span>TKP</a>
                        <!-- Logo End -->
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-right reset-padding">
                        <!-- Navigation Links Start -->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo base_url(); ?>">Beranda</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pelayanan <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="shared-hosting.html">Perizinan</a></li>
                                    <li><a href="reseller-hosting.html">Pengujian</a></li>
                                    <li><a href="#"><i>Slot Pelayanan 3</i></a></li>
                                    <li><a href="#"><i>Slot Pelayanan 4</i></a></li>
																		<li><a href="#"><i>Slot Pelayanan 5</i></a></li>
																		<li><a href="#"><i>Slot Pelayanan 6</i></a></li>
																		<li><a href="#"><i>Slot Pelayanan 7</i></a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo site_url('website/tentang'); ?>">Tentang Kami</a></li>

                            <li><a href="<?php echo site_url('website/kontak'); ?>">Kontak</a></li>
                        </ul>
                        <!-- Navigation Links End -->
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navigation Area End -->
        <!-- Service Area Start -->
  <?php echo $isi; ?>
    <!-- Footer Area Start -->
        <div id="footer">

            <!-- Copyright Start -->
            <div class="copyright">
                <div class="container">
                    <p>Copyright 2018 &copy; <a href="#">Soepomo 86</a>. All Rights Reserved.</p>
                </div>
            </div>
            <!-- Copyright End -->
        </div>
        <!-- Footer Area End -->
        <!-- Back To Top Button Start -->
        <div class="back-to-top">
            <button><i class="fa fa-angle-up"></i></button>
        </div>
        <!-- Back To Top Button End -->
    </div>
    <!-- Wrapper End -->

    <!-- ====jQuery Core Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/jquery-2.2.2.min.js"></script>

    <!-- ====Bootstrap Core Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/bootstrap.min.js"></script>

    <!-- ====jQuery Validation Plugin Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/jquery.validate.min.js"></script>

    <!-- ====Owl Carousel Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/owl.carousel.min.js"></script>

    <!-- ====bxSlider Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/jquery.bxslider.min.js"></script>

    <!-- ====jQuery Waypoints Plugin Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/jquery.waypoints.min.js"></script>

    <!-- ====jQuery Counter Up Plugin Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/jquery.counterup.min.js"></script>

    <!-- ====Isotope Plugin Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/isotope.min.js"></script>

    <!-- ====Twitter Widget==== -->
    <script src="https://platform.twitter.com/widgets.js"></script>

    <!-- ====RetinaJS JavaScript==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/retina.min.js"></script>

    <!-- ====Main Script==== -->
    <script src="<?php echo base_url(); ?>assets/website/js/main.js"></script>
</body>
</html>
