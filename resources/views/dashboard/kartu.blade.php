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
                <h3 class="text-themecolor">Kartu Calon Mahasiswa</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Kartu Calon Mahasiswa</li>
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
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-4">
                    {{-- <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Kartu Calon Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <center>
                                <div class="img-foto foto-kartu" style="background-image: url(img/user/{{ Auth::user()->cama_foto }});"></div>
                                <h4 class="card-title m-t-10">{{ Auth::user()->cama_nama }}</h4>
                                <h6 class="card-subtitle">NISN : {{ Auth::user()->cama_nisn }}</h6>
                                <hr>
                                <small class="text-muted">Periode</small>
                                <h4>{{ $daftar->nama_periode }}</h4>
                                <small class="text-muted">Jalur Masuk</small>
                                <h4>{{ $daftar->nama }}</h4>
                                @if(count($daftarprodi) > 0)
                                    <small class="text-muted">Pilihan Prodi</small>
                                    @foreach($daftarprodi as $row)
                                        <h4>{{ $row->nama_prodi }}</h4>
                                    @endforeach
                                @endif
                                <small class="text-muted">Ruang Ujian</small>
                                @if(Auth::user()->ruang_id)
                                    <h4>{{ Auth::user()->ruang->deskripsi }}</h4>
                                @else
                                    <h4 class="text-danger">Ruang Ujian belum ditentukan</h4>
                                @endif
                            </center>
                        </div>
                        @if(Auth::user()->ruang_id)
                        <div class="card-footer">
                            <center>
                                <a href="#" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> Download PDF</a>
                            </center>
                        </div>
                        @endif
                        
                    </div> --}}
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Kartu</h3>
                        </div>
                        <div class="card-body">
                            <center class="m-t-30">
                                <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" class="img-circle" width="150" />
                                <h4 class="card-title m-t-10">{{ Auth::user()->cama_nama }}</h4>
                                <h6 class="card-subtitle">No. Pendaftaran {{ $daftar->no_pendaftaran }}</h6>
                            </center>
                            <hr>
                            <center>
                                <small class="text-muted">PERIODE</small>
                                <h4>{{ $daftar->periode->nama_periode }}</h4>
                                <small class="text-muted">JALUR MASUK</small>
                                <h4>{{ $daftar->jalur->nama_jalur }}</h4>
                                @if(count($daftarprodi) > 0)
                                    <small class="text-muted">PILIHAN PRODI</small>
                                    @foreach($daftarprodi as $prodi)
                                    <h4 class="m-t-5">{{ $prodi->nama_prodi }}</h4>
                                    @endforeach
                                @endif
                                <small class="text-muted">JADWAL TES</small>
                                <div class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#modalTes" class="btn btn-danger"> Lihat Jadwal Tes</a>
                                </div>
                            </center>
                        </div>
                        @if(Auth::user()->ruang_id)
                        {{-- <div class="card-footer">
                            <center>
                                <a href="#" class="btn btn-danger"><i class="mdi mdi-file-pdf"></i> Download PDF</a>
                            </center>
                        </div> --}}
                        @endif
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
<div id="modalTes" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xlg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Jadwal Tes</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
            @if(count($jadwaltes) > 0)
                @if(count($ruangpeserta) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <th>Jenis Tes</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Ruangan</th>
                            <th>Gedung</th>
                        </thead>
                        <tbody>
                        @foreach($ruangpeserta as $row)
                            <tr>
                                <td>{{ $row->jadwalruang->jadwaltes->tes->nama_tes }}</td>
                                <td>{{ Date::parse($row->jadwalruang->jadwaltes->tanggal)->format('l, d F Y') }}</td>
                                <td>{{ Date::parse($row->jadwalruang->jadwaltes->waktu_mulai)->format('H:i') }} - {{ Date::parse($row->jadwalruang->jadwaltes->waktu_selesai)->format('H:i') }}</td>
                                <td>
                                    {{ $row->jadwalruang->ruangan->nama_ruangan }}
                                </td>
                                <td>{{ $row->jadwalruang->ruangan->gedung->nama_gedung }}, {{ $row->jadwalruang->ruangan->gedung->prodi->nama_prodi }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <th>Jenis Tes</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Ruangan</th>
                        </thead>
                        <tbody>
                        @foreach($jadwaltes as $row)
                            <tr>
                                <td>{{ $row->tes->nama_tes }}</td>
                                <td>{{ Date::parse($row->tanggal)->format('l, d F Y') }}</td>
                                <td>{{ Date::parse($row->waktu_mulai)->format('H:i') }} - {{ Date::parse($row->waktu_selesai)->format('H:i') }}</td>
                                <td>
                                    Belum ditentukan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            @else
                <h5>Jalur pada Periode ini tidak memiliki Tes</h5>
            @endif
            </div>
        </div>
    </div>
</div>


@endsection
