<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/app/images/favicon.png">
    <title>BTKP</title>
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/app/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/app/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/app/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/app/dist/css/style.min.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/app/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/app/libs/jquery-steps/steps.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" style="background-color: #4798e8">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                        <i class="ti-menu ti-close"></i>
                    </a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">

                        <!-- Logo text -->
                        <span class="logo-text">
                             
                            <!-- Light Logo text -->
                          <h3 class="dark-logo" style="color:#fff;">BTKP Apps</h3>
                            <img src="<?php echo base_url()?>assets/app/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti-more"></i>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: #4798e8;">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar">
                                <i class="sl-icon-menu font-20"></i>
                            </a>
                        </li>

                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="ti-search font-16"></i>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter">
                                <a class="srh-btn">
                                    <i class="ti-close"></i>
                                </a>
                            </form>
                        </li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="flag-icon flag-icon-us font-18"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-us"></i> English</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-fr"></i> French</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-es"></i> Spanish</a>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-de"></i> German</a>
                            </div>
                        </li>

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <img src="<?php echo base_url()?>assets/app/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow">
                                    <span class="bg-primary"></span>
                                </span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class="">
                                        <img src="<?php echo base_url()?>assets/app/images/users/1.jpg" alt="user" class="img-circle" width="60">
                                    </div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0">Nama Workshop</h4>
                                        <p class=" m-b-0">workshop@gmail.com</p>
                                    </div>
                                </div>
                            
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                                <div class="p-l-30 p-10">
                                    <a href="javascript:void(0)" class="btn btn-sm btn-success btn-rounded">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile dropdown m-t-20">
                                <div class="user-pic">
                                    <img src="<?php echo base_url()?>assets/app/images/users/agent2.jpg" alt="users" class="rounded-circle img-fluid" />
                                </div>
                                <div class="user-content hide-menu m-t-10">
                                    <h5 class="m-b-10 user-name font-medium">Nama Workshop</h5>
                                    <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-settings"></i>
                                    </a>
                                    <a href="javascript:void(0)" title="Logout" class="btn btn-circle btn-sm">
                                        <i class="ti-power-off"></i>
                                    </a>
                                    <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-wallet m-r-5 m-l-5"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-email m-r-5 m-l-5"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)">
                                            <i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                        <!-- User Profile-->
                        <li class="nav-small-cap">
                            <i class="mdi mdi-dots-horizontal"></i>
                            <span class="hide-menu">Menu User</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/dashboard_perizinan')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Dashboards </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/perizinan_baru')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Perizinan Baru </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/perpanjangan')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Perpanjangan </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/tagihan')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Tagihan </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/tagihan')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Pelaporan </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo site_url('Home/')?>" aria-expanded="false">
                                <i class="icon-Car-Wheel"></i>
                                <span class="hide-menu">Logout </span>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
       <?php echo $isi;?>
        <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
</div>

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->

    
<script src="<?php echo base_url()?>assets/app/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/app/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="<?php echo base_url()?>assets/app/dist/js/app.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/dist/js/app.init.light-sidebar.js"></script>
    <script src="<?php echo base_url()?>assets/app/dist/js/app-style-switcher.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/app/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/app/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/app/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/app/dist/js/custom.min.js"></script>
 
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="<?php echo base_url()?>assets/app/libs/chartist/dist/chartist.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 charts -->
    <script src="<?php echo base_url()?>assets/app/extra-libs/c3/d3.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/extra-libs/c3/c3.min.js"></script>
    <!--chartjs -->
    <script src="<?php echo base_url()?>assets/app/libs/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url()?>assets/app/libs/morris.js/morris.min.js"></script>

    <script src="<?php echo base_url()?>assets/app/dist/js/pages/dashboards/dashboard1.js"></script>

     
<script src="<?php echo base_url()?>assets/app/dist/js/custom.js"></script>
<script src="<?php echo base_url()?>assets/app/libs/jquery-steps/build/jquery.steps.min.js"></script>
<script src="<?php echo base_url()?>assets/app/libs/jquery-validation/dist/jquery.validate.min.js"></script>


    <script>

    //Custom design form example
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onFinished: function(event, currentIndex) {
            swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");

        }
    });


    var form = $(".validation-wizard").show();

    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function(event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function(event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function(event, currentIndex) {
            swal("Form Submitted!", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed.");
        }
    }), $(".validation-wizard").validate({
        ignore: "input[type=hidden]",
        errorClass: "text-danger",
        successClass: "text-success",
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass)
        },
        errorPlacement: function(error, element) {
            error.insertAfter(element)
        },
        rules: {
            email: {
                email: !0
            }
        }
    })
    </script>

    
</body>
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by BTKP. Designed and Developed by
                <a href="https://wrappixel.com">Soepomo 86</a>.
            </footer>
            <!-- ============================================================== -->
</html>
