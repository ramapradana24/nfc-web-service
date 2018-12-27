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
                                            <a><span class="step">1</span>Lengkapi Biodata</a>
                                        </li>
                                        <li role="tab" class="current" aria-disabled="true">
                                            <a><span class="step">2</span>Pemilihan Jalur</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
                                            <a><span class="step">3</span>Upload Berkas</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
                                            <a><span class="step">4</span>Pemilihan Program Studi</a>
                                        </li>
                                        @if(Auth::user()->jenis_mhs == 1)
                                            <li role="tab" class="disabled" aria-disabled="true">
                                                <a><span class="step">5</span>Info VA dan Pembayaran</a>
                                            </li>
                                        @else
                                            <li role="tab" class="disabled" aria-disabled="true">
                                                <a><span class="step">5</span>Validasi Registrasi</a>
                                            </li>
                                        @endif
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
                                <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" width="140" height="140" alt="user" class="img-circle img-thumbnail" /><br>
                                <h4 class="card-title m-t-10">{{ Auth::user()->cama_nama }}</h4>
                                <h6 class="card-subtitle">{{ Auth::user()->cama_email }}</h6>
                                <a href="#" class="btn btn-primary" style="margin-top: 42px" data-toggle="modal" data-target="#modalBiodata">
                                    <i class="mdi mdi-account"></i>
                                    Lihat Biodata
                                </a>
                            </center>
                            
                            <center>
                            </center>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-8">
                    @if(Auth::user()->jenis_mhs == 1)
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-md-2 col-sm-12">
                                    <center>
                                        <span class="ti-announcement text-success" style="font-size: 98px"></span>
                                    </center>
                                </div>
                                <div class="col-md-10 col-sm-12">
                                    <div class="alert alert-success">
                                        Jika calon mahasiswa ingin memilih lebih dari satu jalur, maka harus mendaftarkan dengan akun yang berbeda dan biaya pendaftaran dihitung untuk satu jalur saja
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Pemilihan Jalur</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/registrasi/tahap2">
                                <div class="row justify-content-center">
                                    
                                    <div class="col-sm-12 col-md-10">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-3">Pilihan Jalur </label>
                                            <div class="col-sm-9">
                                                <select name="periodejalur_id" class="form-control selectpicker" data-live-search="true" autocomplete="off">
                                                @if(count($periode) > 0)
                                                    @foreach($periode as $row)
                                                        @if(count($row->periodejalur) > 0)
                                                            <optgroup label="{{ $row->nama_periode }}">
                                                            @foreach($row->periodejalur as $row_pj)
                                                                <option value="{{ $row_pj->periodejalur_id }}">
                                                                    {{ $row_pj->jalur->nama_jalur }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </optgroup>
                                                    @endforeach
                                                @else
                                                    <option disabled="" selected>Tidak Terdapat Jalur Masuk</option>
                                                @endif
                                                </select>
                                                @if($errors->has('periodejalur_id'))
                                                    <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('periodejalur_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <a href="javascript:void(0)" id="btnKembali" class="btn btn-danger">
                                        <i class="mdi mdi-arrow-left-bold m-l-5"></i> Tahap Sebelumnya
                                    </a>
                                    @if(count($periode))
                                    <button class="btn btn-info" type="submit">
                                        Tahap Selanjutnya <i class="mdi mdi-arrow-right-bold m-l-5"></i>
                                    </button>
                                    @endif
                                </div>
                            </form>
                            <form id="formKembali" method="POST" action="/registrasi/kembali/tahap1">@csrf</form>
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
                @if(Auth::user()->jenjangprodi_id == 1)
                    <hr class="m-t-0">
                    <div class="row">
                        <label class="control-label col-md-4"><b>NIS Nasional</b></label>
                        <div class="col-md-8">
                            <p>: {{ Auth::user()->cama_nisn }}</p>
                        </div>
                    </div>
                @endif
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
                        <p>: {{ Auth::user()->kecamatan->nama_kecamatan }}</p>
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
                    <label class="control-label col-md-4"><b>Bidang Ilmu</b></label>
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