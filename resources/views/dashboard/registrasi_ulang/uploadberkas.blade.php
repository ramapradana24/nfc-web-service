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
                <h3 class="text-themecolor">Tahap Registrasi</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Tahap Registrasi</li>
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
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body wizard-content">
                            <form action="#" class="tab-wizard wizard-circle wizard clearfix" role="application" id="steps-uid-0">
                                <div class="steps clearfix">
                                    <ul class="ul-form-wizard" role="tablist">
                                        <li role="tab" class="done" aria-disabled="false" aria-selected="true">
                                            <a href="/registrasi_ulang/tahap7"><span class="step">1</span>Info VA dan Pembayaran</a>
                                        </li>
                                        <li role="tab"
                                            @if(Auth::user()->tahap >= 8) class="done" @else class="disabled" @endif
                                            aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 8) href="/registrasi_ulang/tahap8"  @endif>
                                                <span class="step">2</span>Lengkapi Biodata
                                            </a>
                                        </li>
                                        <li role="tab"
                                            @if(Auth::user()->tahap >= 8) class="current" @else class="disabled" @endif
                                            aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 8) href="/registrasi_ulang/tahap9"  @endif>
                                                <span class="step">3</span>Upload Berkas
                                            </a>
                                        </li>
                                        <li role="tab"
                                            @if(Auth::user()->tahap >= 9) class="current" @else class="disabled" @endif
                                            aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 9) href="/registrasi_ulang/tahap10"  @endif>
                                                <span class="step">4</span>Validasi BAA
                                            </a>
                                        </li>
                                        <li role="tab"
                                            @if(Auth::user()->tahap >= 10) class="current" @else class="disabled" @endif
                                            aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 10) href="/registrasi_ulang/tahap11"  @endif>
                                                <span class="step">4</span>Bukti Registasi Ulang
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Profil Pendaftar</h3>
                        </div>
                        <div class="card-body">
                            <center class="m-t-30">
                                <img src="{{ asset('img/user/'.Auth::user()->cama_foto) }}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{ Auth::user()->cama_nama }}</h4>
                                <h6 class="card-subtitle">{{ Auth::user()->cama_email }}</h6>
                            </center>
                            <hr>
                            <center>
                                <small class="text-muted">NIS NASIONAL</small>
                                <h4>{{ Auth::user()->cama_nisn }}</h4>
                                <small class="text-muted">PERIODE</small>
                                <h4>{{ $daftar->periode->nama_periode }}</h4>
                                <small class="text-muted">JALUR MASUK</small>
                                <h4>{{ $daftar->jalur->nama_jalur }}</h4>
                                <small class="text-muted">PROGRAM STUDI</small>
                                <h4>{{ $daftar->prodi->nama_prodi }}</h4>
                            </center>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Pemilihan Jalur</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/registrasi_ulang/uploadberkas" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        @csrf
                                        <h4 class="card-title">Jenis Berkas : {{ $jenisberkas->nama_berkas }}</h4>
                                        @if($jenisberkas->max_upload > 1)
                                            <h6 class="card-subtitle">Anda dapat mengupload berkas ini maksimal sebanyak <b>
                                                {{ $jenisberkas->max_upload }}</b> buah</h6>
                                            <h5 class="m-t-20">Total Diupload : <b>{{ $jml_berkas }}/{{ $jenisberkas->max_upload }}</b></h5>
                                        @endif
                                        <div class="form-group m-t-20">
                                            <input type="hidden" name="jenisberkas_id" value="{{ $jenisberkas->jenisberkas_id }}">
                                            <label class="label-control">Berkas</label>
                                            <input type="file" name="berkas" class="form-control" required>
                                            @if($errors->has('berkas'))
                                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('berkas') }}</div>
                                            @endif
                                        </div>
                                        @if($jenisberkas->isi_deskripsi)
                                            <label class="label-control">Deskripsi tentang berkas</label>
                                            <textarea name="deskripsi" class="form-control" required placeholder="Contoh: Piagam Penghargaan Juara I Basket Tingkat Provinsi"></textarea> 
                                            @if($errors->has('deskripsi'))
                                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('deskripsi') }}</div>
                                            @endif
                                        @endif
                                        <button type="submit" class="btn btn-info waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-upload"></i></span>Upload</button>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <a href="/registrasi/tahap3" class="btn btn-primary waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-check"></i></span> Simpan dan Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    @include('admin.inc.sweetalert');
@endsection