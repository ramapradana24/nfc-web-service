@extends('dashboard.app')

@section('content')

<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    @include('dashboard.inc.header')
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    @include('dashboard.inc.sidebar')
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-themecolor">Pengumunan Kelulusan</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Pengumuman Kelulusan</li>
                </ol>
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
            @if($status_lulus == 1)
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-outline-info">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white text-center">Anda Dinyatakan</h4>
                            </div>
                            <div class="card-body text-center">
                                <i class="ti-medall text-info" style="font-size: 100px"></i>
                                <h1 class="text-info">LULUS</h1>
                                <h3>Program Studi <b>{{ $prodi_lulus->nama_prodi }}</b></h3>
                                <h5>Dalam Penerimaan Mahasiswa Baru UNHI</h5>
                                <center class="m-t-20">
                                    <form method="POST" action="/registrasi_ulang/tahap6">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Lanjutkan <i class="mdi mdi-arrow-right-bold-circle-outline m-l-5"></i></button>
                                    </form>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($status_lulus == 2)
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-outline-danger">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white text-center">Anda Dinyatakan</h4>
                            </div>
                            <div class="card-body text-center">
                                <i class="ti-na text-danger" style="font-size: 100px"></i>
                                <h1 class="text-danger">TIDAK LULUS</h1>
                                <h5>Dalam Penerimaan Mahasiswa Baru UNHI</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-6">
                        <div class="card card-outline-inverse">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white text-center">Kelulusan PMB UNHI</h4>
                            </div>
                            <div class="card-body text-center">
                                <i class="ti-announcement" style="font-size: 100px"></i>
                                <h1>BELUM DIUMUMKAN</h1>
                                <h5>Mohon Menunggu Hingga Kelulusan Diumumkan</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
        @include('dashboard.inc.footer')
    </div>
</div>


@endsection

@section('css')
    <link href="../assets/plugins/wizard/steps.css" rel="stylesheet">
@endsection

@section('js')
@endsection