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
                                            <a href="/registrasi/tahap1"><span class="step">1</span>Lengkapi Biodata</a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 1) href="/registrasi/tahap2"  @endif>
                                                <span class="step">2</span>Pemilihan Jalur
                                            </a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 2) href="/registrasi/tahap3"  @endif>
                                                <span class="step">3</span>Upload Berkas
                                            </a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a @if(Auth::user()->tahap >= 3) href="/registrasi/tahap4"  @endif>
                                                <span class="step">4</span>Pemilihan Program Studi
                                            </a>
                                        </li>
                                        @if(Auth::user()->jenis_mhs == 1)
                                            <li role="tab" class="current" aria-disabled="true">
                                                <a><span class="step">5</span>Info VA dan Pembayaran</a>
                                            </li>
                                        @else
                                            <li role="tab" class="current" aria-disabled="true">
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
                                <small class="text-muted">Periode</small>
                                <h4>{{ $daftar->periode->nama_periode }}</h4>
                                <small class="text-muted">Jalur Masuk</small>
                                <h4>{{ $daftar->jalur->nama_jalur }}</h4>
                                @if(count($daftarprodi) > 0)
                                    <small class="text-muted">PILIHAN PRODI</small>
                                    @foreach($daftarprodi as $row)
                                    <h4 class="m-t-5">{{ $row->proditawar->prodi->nama_prodi }}</h4>
                                    @endforeach
                                @endif
                            </center>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Info VA dan Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="text-muted">Nomor Pendaftaran Anda</h6>
                                <h2>{{ $daftar->no_pendaftaran }}</h2>
                                @if($sudah_bayar)
                                    <i class="ti-check-box text-info" style="font-size: 100px"></i>
                                    <h5 class="m-t-20">Anda sudah membayar biaya pendaftaran sebesar</h5>
                                    <h1><b>Rp. {{ number_format($daftar->total_bayar, 2, ',', '.') }}</b></h1>
                                    <hr class="m-t-20">
                                    <form method="POST" action="/registrasi/tahap5">
                                        @csrf
                                        <button type="submit" class="btn btn-info">Lanjutkan <i class="mdi mdi-arrow-right-bold m-l-5"></i></button>
                                    </form>
                                @else
                                    <i class="ti-shopping-cart" style="font-size: 100px"></i>
                                    <h6 class="m-t-20">Total Biaya Pendaftaran</h6>
                                    <h1><b>Rp. {{ number_format($daftar->total_bayar, 2, ',', '.') }}</b></h1>
                                    <h6 class="m-t-20">Nomor VA</h6>
                                    @if($daftar->va_id)
                                            <h2>{{ $daftar->va_id }}</h2>
                                    @else
                                        <h2>Anda belum mempunyai Nomor VA</h2>
                                    @endif
                                    @if(count($kuitansi) > 0)
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalKuitansi">
                                            <i class="mdi mdi-format-list-numbers"></i>
                                            Lihat Detail Pembayaran
                                        </a>
                                    @endif
                                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#modalProfil">
                                        <i class="mdi mdi-format-list-numbers"></i>
                                        Lihat Detail Biaya Kuliah
                                    </a>
                                @endif
                            </div>
                            @if($sudah_bayar == false)
                                <hr>
                                <div class="text-right">
                                    <a href="javascript:void(0)" id="btnKembali" class="btn btn-danger">
                                        <i class="mdi mdi-arrow-left-bold m-l-5"></i> Tahap Sebelumnya
                                    </a>
                                    <form id="formKembali" method="POST" action="/registrasi/kembali/tahap4">@csrf</form>
                                </div>
                            @endif
                            
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

<!-- MODAL KUITANSI -->
<div id="modalKuitansi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Detail Pembayaran</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
            @if(count($kuitansi) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Batas Waktu Pembayaran</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($kuitansi as $i => $row)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>
                                    @if(isset($row->itemmaster))
                                        {{ $row->itemmaster->nama_item }}
                                    @else
                                        {{ $row->nama_item }}
                                    @endif
                                </td>
                                <td>
                                    {{ Date::parse($row->tanggal_start)->format('d F Y') }} 
                                    -
                                    {{ Date::parse($row->tanggal_end)->format('d F Y') }}
                                </td>
                                <td>Rp. {{ number_format($row->nominal, 2, ',', '.') }}</td>
                             </tr>
                             @php
                                $total += $row->nominal;
                             @endphp
                        @endforeach
                        <tr>
                            <td colspan="3"><b>Total Bayar</b></td>
                            <td><b>Rp. {{ number_format($total, 2, ',', '.') }}</b></td>
                        </tr>
                    </tbody>
                </table>
            @endif
            </div>
        </div>
    </div>
</div>

<!-- MODAL PROFIL -->
<div id="modalProfil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xlg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Detail Biaya Kuliah</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
            @if(count($arr_profilmaster))
                @foreach($arr_profilmaster as $profilmaster)
                    <h5>{{ $profilmaster->prodi->nama_prodi }}</h5>
                    <table class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Nama Item</th>
                            <th>Nominal</th>
                            <th>Berulang Setiap Semester</th>
                            <th>Dapat Dicicil</th>
                            <th>Minimum Cicilan</th>
                        </thead>
                        <tbody>
                            @if(count($profilmaster->profildetail))
                                @foreach($profilmaster->profildetail as $i => $profildetail)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $profildetail->itemmaster->nama_item }}</td>
                                    <td>Rp. {{ number_format($profildetail->nominal, 2, ',', '.') }}</td>
                                    <td class="text-center">
                                        @if($profildetail->diulang)
                                            <h6><label class="label label-success">YA</label></h6>
                                        @else
                                            <h6><label class="label label-danger">TIDAK</label></h6>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($profildetail->dicicil)
                                            <h6><label class="label label-success">YA</label></h6>
                                        @else
                                            <h6><label class="label label-danger">TIDAK</label></h6>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($profildetail->minimum_cicilan, 2, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <hr>
                @endforeach
            @endif
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
    @include('admin.inc.sweetalert')
@endsection