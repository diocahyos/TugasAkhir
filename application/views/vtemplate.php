<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Sistem Rekomendasi Makanan</title>
	<!-- This page plugin CSS -->
	<link href="<?php echo base_url() ?>includes/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
	<!-- Custom CSS -->
	<link href="<?php echo base_url() ?>includes/dist/css/style.min.css" rel="stylesheet">

	<link href="<?php echo base_url() ?>includes/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>includes/dist/js/pages/chartist/chartist-init.css" rel="stylesheet">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!-- [if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif] -->
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
			<nav class="navbar top-navbar navbar-expand-md navbar-dark">
				<div class="navbar-header">
					<!-- This is for the sidebar toggle which is visible on mobile only -->
					<a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
					<!-- ============================================================== -->
					<!-- Logo -->
					<!-- ============================================================== -->
					<a class="navbar-brand" href="<?php echo base_url('homepage') ?>">
						<h1>SiReMa</h1>
					</a>
					<!-- ============================================================== -->
					<!-- End Logo -->
					<!-- ============================================================== -->
					<!-- ============================================================== -->
					<!-- Toggle which is visible on mobile only -->
					<!-- ============================================================== -->
					<a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
				</div>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
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
						<li class="sidebar-item"> <a class="sidebar-link waves-dark" href="<?= base_url('makanan/data_makanan/1') ?>" aria-expanded="false"><i class="mdi mdi-table-edit"></i><span class="hide-menu">Makanan </span></a></li>
						<li class="sidebar-item"> <a class="sidebar-link waves-dark" href="<?= base_url('rekomendasimakanan') ?>" aria-expanded="false"><i class="ti-clipboard"></i><span class="hide-menu">Rekomendasi </span></a></li>
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
		<!-- Page wrapper  -->
		<!-- ============================================================== -->
		<div class="page-wrapper">
			<!-- ============================================================== -->
			<!-- Container fluid  -->
			<!-- ============================================================== -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 align-self-center">
						<h3 class="page-title"><?= $title ?></h3>
						<!-- Content here -->
						<?php
						if (isset($content)) {
							$this->load->view($content);
						}
						?>
					</div>
					<!-- ============================================================== -->
					<!-- ============================================================== -->
				</div>
				<!-- ============================================================== -->
				<!-- End Page wrapper  -->
				<!-- ============================================================== -->
			</div>
		</div>

		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- customizer Panel -->
		<!-- ============================================================== -->
		<aside class="customizer">
			<a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
			<div class="customizer-body">
				<div class="tab-content" id="pills-tabContent">
					<!-- Tab 1 -->
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<div class="p-15 border-bottom">
							<!-- Sidebar -->
							<h5 class="font-medium m-b-10 m-t-10">Pengaturan Layout</h5>
							<div class="custom-control custom-checkbox m-t-10">
								<input type="checkbox" class="custom-control-input" name="theme-view" id="theme-view">
								<label class="custom-control-label" for="theme-view">Dark Theme</label>
							</div>
							<div class="custom-control custom-checkbox m-t-10">
								<input type="checkbox" class="custom-control-input" name="sidebar-position" id="sidebar-position">
								<label class="custom-control-label" for="sidebar-position">Fixed Navbar</label>
							</div>
							<div class="custom-control custom-checkbox m-t-10">
								<input type="checkbox" class="custom-control-input" name="header-position" id="header-position">
								<label class="custom-control-label" for="header-position">Fixed Topbar</label>
							</div>
							<div class="custom-control custom-checkbox m-t-10">
								<input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
								<label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
							</div>
						</div>
						<div class="p-15 border-bottom">
							<!-- Topbar BG -->
							<h5 class="font-medium m-b-10 m-t-10">Topbar Backgrounds</h5>
							<ul class="theme-color">
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin1" data-navbarbg="skin1"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2" data-navbarbg="skin2"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3" data-navbarbg="skin3"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4" data-navbarbg="skin4"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5" data-navbarbg="skin5"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6" data-navbarbg="skin6"></a></li>
							</ul>
							<!-- Topbar BG -->
						</div>
						<div class="p-15 border-bottom">
							<!-- Navbar BG -->
							<h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
							<ul class="theme-color">
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
								<li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
							</ul>
							<!-- Navbar BG -->
						</div>
					</div>
				</div>
			</div>
		</aside>

		<div class="chat-windows"></div>
		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="<?php echo base_url() ?>includes/assets/libs/jquery/dist/jquery.min.js"></script>
		<!-- Bootstrap tether Core JavaScript -->
		<script src="<?php echo base_url() ?>includes/assets/libs/popper.js/dist/umd/popper.min.js"></script>
		<script src="<?php echo base_url() ?>includes/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- apps -->
		<script src="<?php echo base_url() ?>includes/dist/js/app.min.js"></script>
		<script src="<?php echo base_url() ?>includes/dist/js/app.init.horizontal-fullwidth.js"></script>
		<script src="<?php echo base_url() ?>includes/dist/js/app-style-switcher.horizontal.js"></script>
		<!-- slimscrollbar scrollbar JavaScript -->
		<script src="<?php echo base_url() ?>includes/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
		<script src="<?php echo base_url() ?>includes/assets/extra-libs/sparkline/sparkline.js"></script>
		<!--Wave Effects -->
		<script src="<?php echo base_url() ?>includes/dist/js/waves.js"></script>
		<!--Menu sidebar -->
		<script src="<?php echo base_url() ?>includes/dist/js/sidebarmenu.js"></script>
		<!--Custom JavaScript -->
		<script src="<?php echo base_url() ?>includes/dist/js/custom.min.js"></script>

		<?php
		if (isset($js)) {
			$this->load->view($js);
		}
		?>


</body>

</html>