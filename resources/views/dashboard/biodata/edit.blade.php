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
                <h3 class="text-themecolor">Edit Biodata</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Edit Biodata</li>
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
                <div class="col-sm-12 col-md-4">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Foto Profil</h3>
                        </div>
                        <div class="card-body">
                            <h6 class=" text-center card-subtitle m-b-40">Harap menggunakan foto profil yang formal dan resmi</h6>
                            <center>
                                <img src="{{ asset('berkas/'.Auth::user()->cama_foto) }}" width="140" height="140" alt="user" class="img-circle img-thumbnail" /><br>
                                <a href="/fotoprofil" class="btn btn-info m-t-20">Ganti Foto Profil</a>
                            </center>
                            {{-- <div class="row justify-content-center m-t-30">
                                <div class="col-sm-12 col-md-10">
                                    <input id="upload_image" type="file" class="form-control" placeholder="Ganti Foto Profil">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Melengkapi Biodata</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="/biodata/edit" enctype="multipart/form-data">
                                <div class="row justify-content-center">
                                    <div class="col-sm-12">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-4">Jenjang Studi yang Dicari</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" disabled id="selectJenjangProdi">
                                                    @if(count($jenjangprodi))
                                                        @foreach ($jenjangprodi as $e_jenjangprodi)
                                                            <option value="{{ $e_jenjangprodi->jenjangprodi_id }}"
                                                                @if($e_jenjangprodi->jenjangprodi_id == Auth::user()->jenjangprodi_id)
                                                                    selected
                                                                @endif 
                                                            >
                                                                {{ $e_jenjangprodi->jenjang }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('jenjangprodi_id'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('jenjangprodi_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Program yang Dicari</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="program_id" disabled>
                                                    @if(count($program))
                                                        @foreach ($program as $e_program)
                                                            <option value="{{ $e_program->program_id }}"
                                                                @if($e_program->program_id == Auth::user()->program_id)
                                                                    selected
                                                                @endif 
                                                            >
                                                                {{ $e_program->nama_program }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('program_id'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('program_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Jenjang Studi yang Dicari</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" disabled id="selectJenjangProdi">
                                                    @if(count($jenjangprodi))
                                                        @foreach ($jenjangprodi as $e_jenjangprodi)
                                                            <option value="{{ $e_jenjangprodi->jenjangprodi_id }}"
                                                                @if($e_jenjangprodi->jenjangprodi_id == Auth::user()->jenjangprodi_id)
                                                                    selected
                                                                @endif 
                                                            >
                                                                {{ $e_jenjangprodi->jenjang }}
                                                            </option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('jenjangprodi_id'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('jenjangprodi_id') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Nama Lengkap</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cama_nama" class="form-control" required value="{{ Auth::user()->cama_nama }}">
                                                @if($errors->has('cama_nama'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_nama') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Alamat Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="cama_email" class="form-control" required value="{{ Auth::user()->cama_email }}">
                                                @if($errors->has('cama_email'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_email') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Tempat Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cama_tempatlahir" class="form-control" required value="{{ Auth::user()->cama_tempatlahir }}">
                                                @if($errors->has('cama_tempatlahir'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_tempatlahir') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Tanggal Lahir</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cama_tgllahir" id="tglLahir" class="form-control datepicker-autoclose" required @if(Auth::user()->cama_tgllahir) value="{{ date('Y-m-d', strtotime(Auth::user()->cama_tgllahir)) }}" @endif>
                                                @if($errors->has('cama_tgllahir'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_tgllahir') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Agama</label>
                                            <div class="col-sm-8">
                                                <select name="cama_idagama" class="form-control" required>
                                                    <option disabled selected>Daftar Agama</option>
                                                    @if(count($agama) > 0)
                                                        @foreach($agama as $data)
                                                            @if($data->agama_id == Auth::user()->cama_idagama)
                                                                <option value="{{ $data->agama_id }}" selected>{{ $data->agama }}</option>
                                                            @else
                                                                <option value="{{ $data->agama_id }}">{{ $data->agama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('cama_idagama'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_idagama') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Tempat Tinggal</label>
                                            <div class="col-sm-8">
                                                <textarea name="cama_alamat" class="form-control" required>{{ Auth::user()->cama_alamat }}</textarea>
                                                @if($errors->has('cama_alamat'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_alamat') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Nomor Telepon</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cama_telepon" class="form-control" required value="{{ Auth::user()->cama_telepon }}">
                                                @if($errors->has('cama_telepon'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_telepon') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Kabupaten</label>
                                            <div class="col-sm-8">
                                                <select name="id_kab" id="inputKabupaten" class="form-control" data-live-search="on">
                                                </select>
                                            </div>
                                            @if($errors->has('id_kab'))
                                                <div class="form-control-feedback text-danger">{{ $errors->first('id_kab') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4">Kecamatan</label>
                                            <div class="col-sm-8">
                                                <select id="inputKecamatan" name="id_kec" class="form-control" data-live-search="on" required>
                                                </select>
                                                @if($errors->has('id_kec'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('id_kec') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Kode Pos</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="cama_kodepos" class="form-control" required value="{{ Auth::user()->cama_kodepos }}">
                                                @if($errors->has('cama_kodepos'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_kodepos') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row" id="divNIS">
                                            <label class="col-sm-4"> NIS Nasional</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="cama_nisn" class="form-control" value="{{ Auth::user()->cama_nisn }}">
                                                @if($errors->has('cama_nisn'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_nisn') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Asal Sekolah</label>
                                            <div class="col-sm-8">
                                                <select name="cama_idsekolah" id="sekolah" class="form-control selectpicker" data-live-search="true" autocomplete="off" required>
                                                    <option value="0">Belum Terdaftar</option>
                                                    @if(count($sekolah) > 0)
                                                        @foreach($sekolah as $data)
                                                            @if($data->sekolah_id == Auth::user()->cama_idsekolah)
                                                                <option value="{{ $data->sekolah_id }}" selected>{{ $data->sekolah_nama }}</option>
                                                            @else
                                                                <option value="{{ $data->sekolah_id }}">{{ $data->sekolah_nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('cama_idsekolah'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_idsekolah') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row" id="desSekolah">
                                            <label class="col-sm-4"></label>
                                            <div class="col-sm-8">
                                                <textarea name="cama_des_sekolah" rows="3" class="form-control" placeholder="Masukan nama asal sekolah Anda jika tidak terdaftar diatas">{{ Auth::user()->cama_des_sekolah }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4"> Bidang Ilmu</label>
                                            <div class="col-sm-8">
                                                <select name="cama_idjurusansma" class="form-control" required>
                                                    @if(count($jurusan_sma) > 0)
                                                        @foreach($jurusan_sma as $data)
                                                            @if($data->jursma_id == Auth::user()->cama_idjurusansma)
                                                                <option value="{{ $data->jursma_id }}" selected>{{ $data->jursma_nama }}</option>
                                                            @else
                                                                <option value="{{ $data->jursma_id }}">{{ $data->jursma_nama }}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @if($errors->has('cama_idjurusansma'))
                                                    <div class="form-control-feedback text-danger">{{ $errors->first('cama_idjurusansma') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <hr>
                                <div class="text-right">
                                    <button class="btn btn-info" type="submit">
                                        <span class="btn-label"><i class="mdi mdi-content-save m-l-5"></i></span> Simpan Biodata
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


@endsection


@section('css')
<link href="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endsection

@section('js')
@include('admin.inc.sweetalert')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/crud.js') }}"></script>
<script>
    let ID_KAB = null;
    let ID_KEC = null;
    @if(Auth::user()->id_kab) ID_KAB = {{ Auth::user()->id_kab }}; @endif
    @if(Auth::user()->id_kec) ID_KEC = {{ Auth::user()->id_kec }}; @endif
</script>
<script src="{{ asset('js/registrasi/main.js') }}"></script>

@endsection