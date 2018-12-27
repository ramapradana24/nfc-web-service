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
                                        <li role="tab" class="current" aria-disabled="true">
                                            <a><span class="step">3</span>Upload Berkas</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
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
                                @if(isset($prodi))
                                    <small class="text-muted">Fakultas</small>
                                    <h4>{{ $prodi->fakultas->nama_fakultas }}</h4>
                                    <small class="text-muted">Program Studi</small>
                                    <h4>{{ $prodi->nama_prodi }}</h4>
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
                            <h3 class="m-b-0 text-white text-center">Upload Berkas</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/registrasi_ulang/tahap9">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        @csrf
                                        @if(count($jenisberkas) > 0)
                                        {{-- tabel jenis berkas --}}
                                        <h5 class="text-muted">Silahkan upload jenis berkas yang diperlukan untuk pendaftaran pada jalur <b>{{ $daftar->jalur->nama_jalur }}</b>.</b></h5>
                                        <table class="table table-bordered m-t-20">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Berkas</th>
                                                    <th class="text-center">Status Upload</th>
                                                    <th>Operasi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($jenisberkas as $i => $row)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $row->nama_berkas }}</td>
                                                    <td class="text-center">
                                                    @if($row->uploadberkas_count > 0)
                                                        <label class="label label-success">Sudah</label>
                                                    @else
                                                        <label class="label label-danger">Belum</label>
                                                    @endif
                                                    </td>
                                                    <td>
                                                        <a href="/registrasi_ulang/jenisberkas/{{ $row->jenisberkas_id }}" class="btn btn-primary">
                                                            @if($row->uploadberkas_count > 0)
                                                                <span class="btn-label"><i class="mdi mdi-reload"></i></span>
                                                                Upload Ulang
                                                            @else 
                                                                <span class="btn-label"><i class="mdi mdi-upload"></i></span>
                                                                Upload Berkas
                                                            @endif
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        @else
                                        {{-- pemberitahuan jika tidak perlu upload berkas --}}
                                        <div class="text-center">
                                            <i class="ti-check-box" style="font-size: 100px"></i>
                                            <h3 class="m-t-20">Upload Berkas tidak diperlukan pada <br><b>Jalur {{ $daftar->jalur->nama_jalur }}</b></h3>
                                            <h5 class="text-muted">Silahkan untuk menlanjutkan ke tahap selanjutnya</h5>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <button class="btn btn-info" type="submit">
                                        Tahap Selanjutnya <i class="mdi mdi-arrow-right-bold m-l-5"></i>
                                    </button>
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
    <link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/crud.js') }}"></script>
    @include('admin.inc.sweetalert');
@endsection