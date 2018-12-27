<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Aplikasi Absensi</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta content="" name="keywords">
	<meta content="" name="description">

	<!-- Favicons -->
	<link href="{{ asset('regna/img/favicon.png') }}" rel="icon">
	<link href="{{ asset('regna/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet">

	<!-- Bootstrap CSS File -->
	<link href="{{asset('regna/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

	<!-- Libraries CSS Files -->
	<link href="{{asset('regna/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('regna/lib/animate/animate.min.css')}}" rel="stylesheet">

	<!-- Main Stylesheet File -->
	<link href="{{asset('regna/css/style.css')}}" rel="stylesheet">

	<!-- =======================================================
    Theme Name: Regna
    Theme URL: https://bootstrapmade.com/regna-bootstrap-onepage-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

	<!--==========================
  Header
  ============================-->
	<header id="header">
		<div class="container">

			<div id="logo" class="pull-left">
				<a href="#hero">
					{{-- <img src="regna/img/logo.png" alt="" title="" /></img> --}}
				</a>
				<!-- Uncomment below if you prefer to use a text logo -->
				<h1><a href="#hero">NFC</a></h1>
			</div>

			<nav id="nav-menu-container">
				<ul class="nav-menu">
					<li class="menu-active">
						<a href="#hero">Home</a>
					</li>
					<li>
						<a href="#about">Login</a>
					</li>
				</ul>
			</nav>
			<!-- #nav-menu-container -->
		</div>
	</header>
	<!-- #header -->

	<!--==========================
    Hero Section
  ============================-->
	<section id="hero">
		<div class="hero-container">
			<h1>NFC ABSENT</h1>
			<h2>Teknologi Absensi Berbasis IOT dengan NFC</h2>
			<a href="#portfolio" class="btn-get-started">Get Started</a>
		</div>
	</section>
	<main id="main">
		<section id="portfolio">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<h3 class="section-title">MATA KULIAH</h3>
					<p class="section-description">Daftar mata kuliah yang ada</p>
				</div>
				<div class="row">

					<div class="col-lg-12">
						<ul id="portfolio-flters">
							<li data-filter=".filter-1, .filter-2, .filter-3, .filter-3, .filter-4, .filter-5" class="filter-active">All</li>
							<li data-filter=".filter-1">Senin</li>
							<li data-filter=".filter-2">Selasa</li>
							<li data-filter=".filter-3">Rabu</li>
							<li data-filter=".filter-4">Kamis</li>
							<li data-filter=".filter-5">Jumat</li>
						</ul>
					</div>
				</div>

				<div class="row" id="portfolio-wrapper">
					@if(count($data_jadwal))
						@foreach($data_jadwal as $jadwal)
							<div class="col-md-3 col-sm-12 jadwal filter-{{ $jadwal->hari }}">
								<a href="/jadwal/kehadiran/{{ $jadwal->id_jadwal }}">
									<div class="img-jadwal"></div>
									<div class="detail">
										<h5>{{ $jadwal->kelas->nama }}</h5>
										<p class="ruangan">{{ $jadwal->ruangan->nama }}</p>
										<span class="waktu">{{ $hari[$jadwal->hari] }}, {{$jadwal->mulai}} - {{ $jadwal->selesai }}</span>
										<p class="dosen"><span class="fa fa-user-circle-o"></span> {{$jadwal->kelas->dosen->nama}}</p>
									</div>
								</a>
							</div>
						@endforeach
					@endif
				</div>

			</div>
		</section>
		{{-- <section id="team">
			<div class="container wow fadeInUp">
				<div class="section-header">
					<h3 class="section-title">Team</h3>
					<p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="member">
							<div class="pic">
								<img src="regna/img/team-1.jpg" alt="">
							</div>
							<h4>Walter White</h4>
							<span>Chief Executive Officer</span>
							<div class="social">
								<a href="">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="member">
							<div class="pic">
								<img src="regna/img/team-2.jpg" alt="">
							</div>
							<h4>Sarah Jhinson</h4>
							<span>Product Manager</span>
							<div class="social">
								<a href="">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="member">
							<div class="pic">
								<img src="regna/img/team-3.jpg" alt="">
							</div>
							<h4>William Anderson</h4>
							<span>CTO</span>
							<div class="social">
								<a href="">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
					</div>

					<div class="col-lg-3 col-md-6">
						<div class="member">
							<div class="pic">
								<img src="regna/img/team-4.jpg" alt="">
							</div>
							<h4>Amanda Jepson</h4>
							<span>Accountant</span>
							<div class="social">
								<a href="">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="">
									<i class="fa fa-google-plus"></i>
								</a>
								<a href="">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</section> --}}

	</main>

	<!--==========================
    Footer
  ============================-->
	<footer id="footer">
		<div class="footer-top">
			<div class="container">

			</div>
		</div>

		<div class="container">
			<div class="copyright">
				&copy; Copyright
				<strong>Regna</strong>. All Rights Reserved
			</div>
			<div class="credits">
				Bootstrap Templates by
				<a href="https://bootstrapmade.com/">BootstrapMade</a>
			</div>
		</div>
	</footer>
	<!-- #footer -->

	<a href="#" class="back-to-top">
		<i class="fa fa-chevron-up"></i>
	</a>

	<!-- JavaScript Libraries -->
	<script src="{{asset('regna/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('regna/lib/jquery/jquery-migrate.min.js')}}"></script>
	<script src="{{asset('regna/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('regna/lib/easing/easing.min.js')}}"></script>
	<script src="{{asset('regna/lib/wow/wow.min.js')}}"></script>
	<script src="{{asset('regna/lib/waypoints/waypoints.min.js')}}"></script>
	<script src="{{asset('regna/lib/counterup/counterup.min.js')}}"></script>
	<script src="{{asset('regna/lib/superfish/hoverIntent.js')}}"></script>
	<script src="{{asset('regna/lib/superfish/superfish.min.js')}}"></script>
	<!-- Template Main Javascript File -->
	<script src="{{asset('regna/js/main.js')}}"></script>

</body>

</html>
