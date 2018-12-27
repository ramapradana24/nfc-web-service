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
                                        <li role="tab" class="current" aria-disabled="false" aria-selected="true">
                                            <a><span class="step">1</span>Info VA dan Pembayaran</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
                                            <a><span class="step">2</span>Lengkapi Biodata</a>
                                        </li>
                                        <li role="tab" class="disabled" aria-disabled="true">
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
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Info VA dan Pembayaran</h3>
                        </div>
                        <div class="card-body text">
                            <div class="text-center">
                                @if($sudah_bayar)
                                    <i class="ti-check-box text-info" style="font-size: 100px"></i>
                                    <h5 class="m-t-20">Anda sudah membayar biaya pendaftaran sebesar</h5>
                                    <h1><b>Rp. {{ number_format($total_bayar, 2, ',', '.') }}</b></h1>
                                @else
                                    <i class="ti-shopping-cart" style="font-size: 100px"></i>
                                    <h6 class="m-t-20">Total Biaya Pendaftaran</h6>
                                    <h1><b>Rp. {{ number_format($total_bayar-$total_terbayar, 2, ',', '.') }}</b></h1>
                                @endif
                                @if($sudah_bayar)
                                    <center class="m-t-20">
                                        <form method="POST" action="/registrasi_ulang/tahap7">
                                            @csrf
                                            <button type="submit" class="btn btn-info">Lanjutkan <i class="mdi mdi-arrow-right-bold m-l-5"></i></button>
                                        </form>
                                    </center>
                                    <hr class="m-t-20">
                                @endif
                                @if(count($kuitansi) > 0)
                                    <a class="btn btn-primary m-t-20" data-toggle="collapse" href="#collapse" aria-expanded="false" aria-controls="collapseExample">
                                        <i class="mdi mdi-format-list-numbers"></i>
                                        Lihat Detail Pembayaran
                                    </a>
                                @endif
                            </div>
                            <div class="collapse" id="collapse">
                                <hr>
                                @if(count($kuitansi) > 0)
                                <table class="table table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Keterangan</th>
                                            <th>Nomor VA</th>
                                            <th>Status</th>
                                            <th>Total Bayar</th>
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total = 0; @endphp
                                        @foreach($kuitansi as $i => $row)
                                            <tr>
                                                <td class="text-left">
                                                    @if(isset($row->itemmaster))
                                                        {{ $row->itemmaster->nama_item }}
                                                    @else
                                                        {{ $row->nama_item }}
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->va_id }}
                                                </td>
                                                <td class="text-center">
                                                    @if($row->status_bayar <= 1)
                                                        <h3><label class="label label-danger">Belum Lunas</label></h3> 
                                                    @elseif($row->status_bayar == 2)
                                                        <h3><label class="label label-warning">Terbayar Sebagian</label></h3>
                                                    @else
                                                        <h3><label class="label label-success">Terbayar Lunas</label></h3> 
                                                    @endif
                                                </td>
                                                <td class="text-right">Rp. {{ number_format($row->nominal, 2, ',', '.') }}</td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-detail"
                                                    @if(isset($row->itemmaster))
                                                        data-keterangan="{{ $row->itemmaster->nama_item }}"
                                                    @else
                                                        data-keterangan="{{ $row->nama_item }}"
                                                    @endif
                                                       data-start="{{ Date::parse($row->tanggal_start)->format('d F Y') }}"
                                                       data-end="{{ Date::parse($row->tanggal_end)->format('d F Y') }}" 
                                                       data-va="{{ $row->nim_va }}"
                                                       data-total="Rp. {{ number_format($row->total_bayar, 2, ',', '.') }}"
                                                       data-terbayar="Rp. {{ number_format($row->terbayar, 2, ',', '.') }}"
                                                       data-sisa="Rp. {{ number_format($row->total_bayar-$row->terbayar, 2, ',', '.') }}"
                                                    @if($row->status_bayar)
                                                        data-status="1"
                                                    @elseif($row->dicicil && $row->flag_bank)
                                                        data-status="2"
                                                    @else
                                                        data-status="0"
                                                    @endif
                                                    >
                                                        <i class="mdi mdi-magnify"></i>
                                                    </button>
                                                </td>
                                             </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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


<!-- MODAL DETAIL -->
<div id="modalDetail" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Detail Kuitansi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-sm-4 text-bold">Keterangan</label>
                    <p class="col-sm-6" id="keterangan"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Nomor Va</label>
                    <p class="col-sm-6" id="va"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Waktu Pelunasan</label>
                    <p class="col-sm-6" id="batasWaktu"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Total Bayar</label>
                    <p class="col-sm-6" id="totalBayar"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Terbayar</label>
                    <p class="col-sm-6" id="terbayar"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Belum Terbayar</label>
                    <p class="col-sm-6" id="belumTerbayar"></p>
                </div>
                <hr>
                <div class="row">
                    <label class="col-sm-4 text-bold">Status</label>
                    <p class="col-sm-6" id="status"></p>
                </div>
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
    <script>
            
        $(document).ready(function(){
            $('.btn-detail').click(function(){
                $("#keterangan").html( $(this).data('keterangan') );
                $("#va").html( $(this).data("va") );
                $("#batasWaktu").html( $(this).data('start') + " s/d " + $(this).data('end'));
                $("#totalBayar").html( $(this).data("total") );
                $("#terbayar").html( $(this).data("terbayar") );
                $("#belumTerbayar").html( $(this).data("sisa") );
                let label = '<h3><label class="label label-danger">Belum Lunas</label></h3>';
                if($(this).data("status") == 1)
                    label = '<h3><label class="label label-success">Sudah Lunas</label></h3>';
                else if($(this).data("status") == 2)
                    label = '<h3><label class="label label-warning">Dicicil</label></h3>';
                $("#status").html(label);
                $("#modalDetail").modal();
            });
        });

    </script>
@endsection