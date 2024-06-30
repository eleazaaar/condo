<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Dashboard</title>
	<meta content="" name="description">
	<meta content="" name="keywords">

	<!-- Favicons -->
	<link href="<?=base_url()?>/assets-admin/img/favicon.png" rel="icon">
	<link href="<?=base_url()?>/assets-admin/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.gstatic.com" rel="preconnect">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

	<!-- Vendor CSS Files -->
	<link href="<?=base_url()?>/assets-admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/quill/quill.snow.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/quill/quill.bubble.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="<?=base_url()?>/assets-admin/vendor/simple-datatables/style.css" rel="stylesheet">

	<!-- Template Main CSS File -->
	<link href="<?=base_url()?>/assets-admin/css/style.css" rel="stylesheet">

	<!-- =======================================================
	* Template Name: NiceAdmin
	* Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
	* Updated: Apr 20 2024 with Bootstrap v5.3.3
	* Author: BootstrapMade.com
	* License: https://bootstrapmade.com/license/
	======================================================== -->
</head>

<body>

	<!-- ======= Header ======= -->
	<header id="header" class="header fixed-top d-flex align-items-center">

		<div class="d-flex align-items-center justify-content-between">
			<a href="index.html" class="logo d-flex align-items-center">
				<img src="<?=base_url()?>/assets-admin/img/logo.png" alt="">
				<span class="d-none d-lg-block">NiceAdmin</span>
			</a>
			<i class="bi bi-list toggle-sidebar-btn"></i>
		</div><!-- End Logo -->

		<nav class="header-nav ms-auto">
			<ul class="d-flex align-items-center">

				<li class="nav-item d-block d-lg-none">
					<a class="nav-link nav-icon search-bar-toggle " href="#">
						<i class="bi bi-search"></i>
					</a>
				</li><!-- End Search Icon-->

				<li class="nav-item dropdown pe-3">

					<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
						<img src="<?=base_url()?>/assets-admin/img/profile-img.jpg" alt="Profile" class="rounded-circle">
						<span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
					</a><!-- End Profile Iamge Icon -->

					<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
						<li class="dropdown-header">
							<h6>Kevin Anderson</h6>
							<span>Web Designer</span>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
								<i class="bi bi-person"></i>
								<span>My Profile</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="users-profile.html">
								<i class="bi bi-gear"></i>
								<span>Account Settings</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<i class="bi bi-question-circle"></i>
								<span>Need Help?</span>
							</a>
						</li>
						<li>
							<hr class="dropdown-divider">
						</li>

						<li>
							<a class="dropdown-item d-flex align-items-center" href="#">
								<i class="bi bi-box-arrow-right"></i>
								<span>Sign Out</span>
							</a>
						</li>

					</ul><!-- End Profile Dropdown Items -->
				</li><!-- End Profile Nav -->

			</ul>
		</nav><!-- End Icons Navigation -->

	</header><!-- End Header -->

	<!-- ======= Sidebar ======= -->
	<aside id="sidebar" class="sidebar">

		<ul class="sidebar-nav" id="sidebar-nav">

			<li class="nav-item">
				<a class="nav-link " href="#" id="dashboard">
					<i class="bi bi-grid"></i>
					<span>Dashboard</span>
				</a>
			</li><!-- End Dashboard Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
					<i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
				</a>
				<ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
					<li>
						<a href="icons-bootstrap.html">
							<i class="bi bi-circle"></i><span>Bootstrap Icons</span>
						</a>
					</li>
					<li>
						<a href="icons-remix.html">
							<i class="bi bi-circle"></i><span>Remix Icons</span>
						</a>
					</li>
					<li>
						<a href="icons-boxicons.html">
							<i class="bi bi-circle"></i><span>Boxicons</span>
						</a>
					</li>
				</ul>
			</li><!-- End Icons Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#" id="units">
					<i class="bi bi-person"></i>
					<span>Units</span>
				</a>
			</li><!-- End Profile Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-question-circle"></i>
					<span>F.A.Q</span>
				</a>
			</li><!-- End F.A.Q Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-envelope"></i>
					<span>Contact</span>
				</a>
			</li><!-- End Contact Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-card-list"></i>
					<span>Register</span>
				</a>
			</li><!-- End Register Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-box-arrow-in-right"></i>
					<span>Login</span>
				</a>
			</li><!-- End Login Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-dash-circle"></i>
					<span>Error 404</span>
				</a>
			</li><!-- End Error 404 Page Nav -->

			<li class="nav-item">
				<a class="nav-link collapsed" href="#">
					<i class="bi bi-file-earmark"></i>
					<span>Blank</span>
				</a>
			</li><!-- End Blank Page Nav -->

		</ul>

	</aside><!-- End Sidebar-->


	<!-- Page Content -->
	<main id="main" class="main">

	</main><!-- End #main -->

	<!-- ======= Footer ======= -->
	<footer id="footer" class="footer">
		<div class="copyright">
			&copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
		</div>
		<div class="credits">
			<!-- All the links in the footer should remain intact. -->
			<!-- You can delete the links only if you purchased the pro version. -->
			<!-- Licensing information: https://bootstrapmade.com/license/ -->
			<!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
			Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
		</div>
	</footer><!-- End Footer -->

	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

	<!-- Vendor JS Files -->
	<script src="<?=base_url()?>/assets-admin/vendor/apexcharts/apexcharts.min.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/chart.js/chart.umd.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/echarts/echarts.min.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/quill/quill.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/simple-datatables/simple-datatables.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/tinymce/tinymce.min.js"></script>
	<script src="<?=base_url()?>/assets-admin/vendor/php-email-form/validate.js"></script>

	<!-- Template Main JS File -->
	<script src="<?=base_url()?>/assets-admin/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		var loader = '<div class="loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';

		$(function() {
			function loadView(view='dashboard') {
				$.ajax({
					url: '<?=site_url('Page/')?>'+view,
					beforeSend: function() {
						$("#main").html(loader)
					},
					success: function(data) {
						$("#main").html(data)
					}
				})
			}

			loadView();

			$("#dashboard").unbind().click(function() {
				loadView();
			})

			$("#units").unbind().click(function() {
				loadView('units');
			})
		})
	</script>
</body>

</html>