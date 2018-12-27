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
                <h3 class="text-themecolor">Tahap Registrasi Ulang</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Tahap Registrasi Ulang</li>
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
                                            <a><span class="step">1</span>Info VA dan Pembayaran</a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a><span class="step">2</span>Lengkapi Biodata</a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a><span class="step">3</span>Upload Berkas</a>
                                        </li>
                                        <li role="tab" class="current" aria-disabled="true">
                                            <a><span class="step">4</span>Validasi Registrasi Ulang</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
                                            <a><span class="step">5</span>Pemberian NIM dan Bukti Registrasi</a>
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
                                <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{ Auth::user()->cama_nama }}</h4>
                                <h6 class="card-subtitle">{{ Auth::user()->cama_email }}</h6>
                                <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalBiodata">
                                    <i class="mdi mdi-account"></i>
                                    Lihat Biodata
                                </a>
                            </center>
                            <hr>
                            <center>
                                @if(isset($daftar->prodi))
                                    <small class="text-muted">Fakultas</small>
                                    <h4>{{ $daftar->prodi->fakultas->nama_fakultas }}</h4>
                                    <small class="text-muted">Program Studi</small>
                                    <h4>{{ $daftar->prodi->nama_prodi }}</h4>
                                @endif
                                <small class="text-muted">Periode</small>
                                <h4>{{ $daftar->periode->nama_periode }}</h4>
                                <small class="text-muted">Jalur Masuk</small>
                                <h4>{{ $daftar->jalur->nama_jalur }}</h4>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Validasi Registrasi Ulang</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center m-t-40">
                            @if($daftar->baa_valid == 0)
                                    <i class="ti-light-bulb" style="font-size: 100px; display: block;"></i>
                                    <h2 class="m-t-20">Anda Belum Mendapatkan Validasi</h2>
                                    <h6 class="text-mute">Biodata dapat dirubah dan berkas registrasi dapat di-upload kembali sebelum divalidasi</h6>
                            @else
                                <i class="ti-check text-primary" style="font-size: 100px; display: block;"></i>
                                <h1 class="m-t-20">Anda Sudah Mendapatkan Validasi</h1>
                                <h5 class="text-mute">Biodata dan berkas anda dinyatakan valid pada tanggal {{ $daftar->tgl_baavalid }}</h5>
                            @endif
                            </div>
                            <hr class="m-t-40">
                            <div class="text-right">
                                @if($daftar->baa_valid == 0)
                                    <form method="POST" action="/registrasi_ulang/kembali/tahap9" style="display: inline-block;">
                                        @csrf
                                        <button class="btn btn-danger" type="submit">
                                            <i class="mdi mdi-arrow-left-bold m-r-5"></i> Tahap Sebelumnya 
                                        </button>
                                    </form>
                                @else
                                     <form method="POST" action="/registrasi_ulang/tahap10" style="display: inline-block;">
                                        @csrf
                                        <button class="btn btn-info" type="submit">
                                            Tahap Selanjutnya <i class="mdi mdi-arrow-right-bold m-l-5"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
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

<!-- MODAL Upload foto -->
<div id="modalFotoProfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Atur Foto Profil</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div style="width: 300px; height: 300px; margin: 0 auto">
                            <div id="image_croppie"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-content-save"></i></span>Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL BIODATA -->
<div id="modalBiodata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Biodata</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="control-label col-md-4"><b>Nama</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_nama }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>NIS Nasional</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_nisn }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Email</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_email }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Tempat Lahir</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_tempatlahir }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Tanggal Lahir</b></label>
                    <div class="col-md-8">
                        <p>: {{ Date::parse(Auth::user()->cama_tgllahir)->format('l, d F Y') }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Agama</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->agama->agama_nama }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Tempat Tinggal</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_alamat }}</p>
                    </div>
                </div>
                 <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>No Telepon</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_telepon }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Kecamatan</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->kecamatan->kec_nama }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Kode Pos</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->cama_kodepos }}</p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Asal Sekolah</b></label>
                    <div class="col-md-8">
                        <p>: 
                            @if(Auth::user()->sekolah)
                                {{ Auth::user()->sekolah->sekolah_nama }}
                            @else
                                {{ Auth::user()->cama_des_sekolah }}
                            @endif
                        </p>
                    </div>
                </div>
                <hr class="m-t-0">
                <div class="row">
                    <label class="control-label col-md-4"><b>Jurusan</b></label>
                    <div class="col-md-8">
                        <p>: {{ Auth::user()->jurusansma->jursma_nama }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="/biodata/edit" class="btn btn-info">
                    <span class="btn-label"><i class="mdi mdi-account-edit"></i></span> Edit Biodata
                </a>
            </div>
        </div>
    </div>
</div>


@endsection


@section('css')
<link rel="stylesheet" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/plugins/croppie/croppie.js') }}"></script>
<script>
    $image_crop = $("#image_croppie").croppie({
        enforceBoundary: true,
        enableExif: true,
        mouseWheelZoom: false,
        enableZoom: true,
        viewport: {
            width: 200,
            height: 200,
            type: "circle"
        },
        boundary: {
            width: 250,
            height: 250
        }
    });

    $("#upload_image").on('change', function(){
        var reader = new FileReader();
        
        reader.onload = function(event){
            $image_crop.croppie('bind', {
                url: event.target.result
            });
        }
        reader.readAsDataURL(this.files[0]);
        $("#modalFotoProfil").modal('show');
    });
</script>
@endsection