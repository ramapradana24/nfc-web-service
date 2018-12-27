<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
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
	<link rel="stylesheet" href="{{asset('assets/custom/style.css')}}">

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

@yield('content')

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
