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

<body style="background: #efefef">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">NFC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="card-tb">
        <h3 class="text-center">{{$jadwal->kelas->nama}}</h3>
        <p class="text-center text-muted"><span class="fa fa-user-circle mr-1"></span> {{$jadwal->kelas->dosen->nama}}</p>
        <h6 class="text-center"><span class="ruangan">{{$jadwal->ruangan->nama}}</span>{{$hari[$jadwal->hari]}}, {{$jadwal->mulai}} - {{$jadwal->selesai}}</h6>
        <div class="table-responsive">
            <table class="table table-bordered table-stripped" id="tableKehadiran">
                <thead>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th class="text-center">Waktu Absen</th>
                </thead>
                <tbody>
                    <td colspan="10" class="text-center text-success"><span class="fa fa-spin fa-spinner mr-1" style="font-size: 20px"></span> Memproses Data...</td>
                </tbody>
                <tfoot>
                    <th colspan="3">Total Mahasiswa Absen</th>
                    <th class="text-center"><b id="totalAbsen">Tidak Ada</b></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>

    <script>
        let JADWAL_ID = {{ $jadwal->id_jadwal }}
    </script>
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
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/kehadiran.js')}}"></script>
</body>

</html>
