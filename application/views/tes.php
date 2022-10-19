<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>includes/assets/images/favicon.png">
	<title>Xtreme admin Template - The Ultimate Multipurpose admin template</title>
	<!-- Custom CSS -->
	<link href="<?php echo base_url() ?>includes/dist/css/style.min.css" rel="stylesheet">
	<!-- This Page CSS -->
	<link href="<?php echo base_url() ?>includes/assets/libs/morris.js/morris.css" rel="stylesheet">
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
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper">
		<!-- ============================================================== -->
		<!-- Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<div class="page-breadcrumb">
			<div class="row">
				<div class="col-5 align-self-center">
					<h4 class="page-title">Morris Chart</h4>
					<div class="d-flex align-items-center">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Library</li>
							</ol>
						</nav>
					</div>
				</div>
				<div class="col-7 align-self-center">
					<div class="d-flex no-block justify-content-end align-items-center">
						<div class="m-r-10">
							<div class="lastmonth"></div>
						</div>
						<div class=""><small>LAST MONTH</small>
							<h4 class="text-info m-b-0 font-medium">$58,256</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- ============================================================== -->
		<!-- End Bread crumb and right sidebar toggle -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">
			<!-- ============================================================== -->
			<!-- Start Page Content -->
			<!-- ============================================================== -->
			<div class="row">
				<!-- column -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Product line Chart</h4>
							<ul class="list-inline text-right">
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-inverse"></i>iPhone</h5>
								</li>
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-info"></i>iPad</h5>
								</li>
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-success"></i>iPod</h5>
								</li>
							</ul>
							<div id="morris-area-chart"></div>
						</div>
					</div>
				</div>
				<!-- column -->
				<!-- column -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Site visit Chart</h4>
							<ul class="list-inline text-right">
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-info"></i>Site A View</h5>
								</li>
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-inverse"></i>Site B View</h5>
								</li>
							</ul>
							<div id="morris-area-chart2"></div>
						</div>
					</div>
				</div>
				<!-- column -->
				<!-- column -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Line Chart</h4>
							<div id="morris-line-chart"></div>
						</div>
					</div>
				</div>
				<!-- column -->
				<!-- column -->
				<div class="col-lg-6">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Donute Chart</h4>
							<div id="morris-donut-chart"></div>
						</div>
					</div>
				</div>
				<!-- column -->
				<!-- column -->
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Bar Chart</h4>
							<div id="morris-bar-chart"></div>
						</div>
					</div>
				</div>
				<!-- column -->
				<!-- column -->
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h4 class="card-title">Extra Area Chart</h4>
							<ul class="list-inline text-center m-t-40">
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-info"></i>Site A</h5>
								</li>
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-inverse"></i>Site B</h5>
								</li>
								<li class="list-inline-item">
									<h5><i class="fa fa-circle m-r-5 text-success"></i>Site C</h5>
								</li>
							</ul>
							<div id="extra-area-chart"></div>
						</div>
					</div>
				</div>
				<!-- column -->
			</div>
			<!-- ============================================================== -->
			<!-- End PAge Content -->
			<!-- ============================================================== -->
			<!-- ============================================================== -->
			<!-- Right sidebar -->
			<!-- ============================================================== -->
			<!-- .right-sidebar -->
			<!-- ============================================================== -->
			<!-- End Right sidebar -->
			<!-- ============================================================== -->
		</div>
		<!-- ============================================================== -->
		<!-- End Container fluid  -->
		<!-- ============================================================== -->
		<!-- ============================================================== -->
		<!-- footer -->
		<!-- ============================================================== -->
		<footer class="footer text-center">
			All Rights Reserved by Xtreme admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
		</footer>
		<!-- ============================================================== -->
		<!-- End footer -->
		<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Page wrapper  -->
	<!-- ============================================================== -->
	</div>
	<!-- ============================================================== -->
	<!-- End Wrapper -->
	<!-- ============================================================== -->

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
	<!-- This Page JS -->
	<!--Morris JavaScript -->
	<script src="<?php echo base_url() ?>includes/assets/libs/raphael/raphael.min.js"></script>
	<script src="<?php echo base_url() ?>includes/assets/libs/morris.js/morris.min.js"></script>
	<script src="<?php echo base_url() ?>includes/dist/js/pages/morris/morris-data.js"></script>
</body>

</html>