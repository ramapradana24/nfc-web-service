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
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a><span class="step">2</span>Pemilihan Jalur</a>
                                        </li>
                                        <li role="tab" class="done" aria-disabled="true">
                                            <a><span class="step">3</span>Upload Berkas</a>
                                        </li>
                                        <li role="tab" class="current" aria-disabled="true">
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
                            </center>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Pemilihan Program Studi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-12">
                                    <h6 class="text-muted m-b-30">Jumlah maksimal memilih program studi : <b>{{ $max_pilih }}</b></h6>
                                    @if(count($daftarprodi) < $max_pilih)
                                        <button type="button" data-toggle="modal" data-target="#modalTambah" class="btn btn-success waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-plus"></i></span>Pilih Program Studi</button>
                                    @endif
                                    <table class="table table-bordered m-t-20">
                                        <thead>
                                            <tr>
                                                <th>No Urut</th>
                                                <th>Nama Program Studi</th>
                                                <th>Sumbangan</th>
                                                <th>Operasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(count($daftarprodi) > 0)
                                            @foreach($daftarprodi as $row)
                                                <tr>
                                                    <td>Pilihan {{ $row->urutan }}</td>
                                                    <td>{{ $row->proditawar->prodi->nama_prodi }}</td>
                                                    <td class="text-right">Rp. {{ number_format($row->sumbangan, 2, ',', '.') }}</td>
                                                    <td>
                                                        <form method="POST" action="/daftarprodi/{{ $row->daftarprodi_id }}">
                                                            @csrf
                                                            {{ method_field("DELETE") }}
                                                            <button type="submit" class="btn btn-danger">
                                                                <span class="btn-label"><i class="mdi mdi-close"></i></span>
                                                                Batal
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center" colspan="4">Anda belum memilih program studi</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="text-right">
                                <a href="javascript:void(0)" id="btnKembali" class="btn btn-danger">
                                    <i class="mdi mdi-arrow-left-bold m-l-5"></i> Tahap Sebelumnya
                                </a>
                                <form method="POST" action="/registrasi/tahap4" style="display: inline-block;">
                                    @csrf
                                    <button class="btn btn-info" type="submit">
                                    Tahap Selanjutnya <i class="mdi mdi-arrow-right-bold m-l-5"></i>
                                </form>
                                <form id="formKembali" method="POST" action="/registrasi/kembali/tahap3">@csrf</form>
                                </button>
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

<!-- MODAL TAMBAH -->
<div id="modalTambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <form method="POST" id="formProdiTawar" action="/daftarprodi" enctype="multipart/form-data">
    @csrf
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white">Pilih Program Studi</h4>
                <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true"><i class="mdi mdi-close"></i></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="urutan" value="{{ count($daftarprodi) + 1 }}">
                <div class="form-group">
                    <label class="control-label">Program Studi</label>
                    <select id="select" name="proditawar_id" class="form-control selectpicker" data-live-search="true" autocomplete="off">
                    @if(count($proditawar))
                        @foreach($proditawar as $row)
                            <option value="{{ $row->proditawar_id }}">{{ $row->prodi->nama_prodi }}</option>
                        @endforeach
                    @else
                        <option disabled selected>Data kosong</option>
                    @endif
                    </select>
                    @if($errors->has('proditawar_id'))
                        <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('proditawar_id') }}</div>
                    @endif
                </div>
                <div class="form-group" id="conSumbangan">
                    <label class="control-label">Nominal Sumbangan</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                        </div>
                        <input id="sumbangan" type="text" class="form-control" value="0">
                        <input id="sumbanganInteger" name="sumbangan" type="hidden">
                    </div>
                    @if($errors->has('sumbangan'))
                        <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('sumbangan') }}</div>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-inverse waves-effect waves-light" data-dismiss="modal"><span class="btn-label"><i class="mdi mdi-close"></i></span>Batal</button>
                <button type="button" id="btnSubmit" class="btn btn-info waves-effect waves-light"><span class="btn-label"><i class="mdi mdi-content-save"></i></span>Simpan</button>
            </div>
        </div>
    </div>
    </form>
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
<script src="{{ asset('assets/plugins/autonumeric/autonumeric.min.js') }}"></script>
<script src="{{ asset('assets/plugins/accounting/accounting.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>
@include('admin.inc.sweetalert')
<script>

var proditawar;
$.ajax({
    type: "GET",
    url: "/get/proditawar",
    success: function(data){
        start(data);
    }
});

const inputSumbangan = new AutoNumeric('#sumbangan', {
    decimalCharacter : ',',
    digitGroupSeparator : '.',
});

function start(data){
    proditawar = data;
    //init
    $("#conSumbangan").hide();
    var row = proditawar.find(function(e){
        return e.proditawar_id == $("#select").val();
    });
    inputSumbangan.set(row.sumbangan);
    if(row.sumbangan > 0){
        $("#conSumbangan").show();
    }

    //mengatur sumbangan secara dinamik
    $("#select").on("change", function(){
        $("#conSumbangan").hide();
        const id = $(this).val();
        var row = proditawar.find(function(e){
            return e.proditawar_id == id;
        });
        inputSumbangan.set(row.sumbangan);
        if(row.sumbangan > 0){
            $("#conSumbangan").show();
        }
    });
    //mengecek nominal sumbangan sebelum submit
    $("#btnSubmit").click(function(){
        const id = $("#select").val();
        var row = proditawar.find(function(e){
            return e.proditawar_id == id;
        });
        if(row.sumbangan > parseInt(inputSumbangan.getNumericString())){
            swal({
                'title': 'ERROR!',
                text: "Sumbangan tidak boleh lebih kecil dari nominal",
                type: 'error',
                confirmButtonColor: '#d33',
            });
            $("#sumbangan").val(row.sumbangan);
            return false
        } else {
            $("#sumbanganInteger").val(parseInt(inputSumbangan.getNumericString()))
            $("#formProdiTawar").submit();
        }
    });
}

</script>
@endsection