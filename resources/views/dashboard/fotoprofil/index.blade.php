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
                <h3 class="text-themecolor">Ganti Foto Profil</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Ganti Foto Profil</li>
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
                <div class="col-sm-12 col-md-5">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Foto Profil</h3>
                        </div>
                        <div class="card-body">
                            <center>
                                <div id="main-cropper"></div>
                                <button class="btn btn-info btn-upload">
                                    <span class="btn-label"><i class="mdi mdi-file-image"></i></span> Ganti Gambar
                                    <input type="file" id="inputGambar" accept="image/*">
                                </button>
                                <button class="btn btn-primary" id="btnUploadGambar">
                                    <span class="btn-label" id="iconUpload"><i class="mdi mdi-upload"></i></span> Upload
                                </button>
                            </center>
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
<link rel="stylesheet" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/plugins/croppie/croppie.js') }}"></script>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    
var basic = $('#main-cropper').croppie({
    viewport: { width: 250, height: 250},
    boundary: { width: 300, height: 300 },
    url: '{{ config('app.url').'berkas/'.Auth::user()->cama_foto }}'
});

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#main-cropper').croppie('bind', {
        url: e.target.result
      });
      //$('.actionDone').toggle();
      //$('.actionUpload').toggle();
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('.btn-upload input').on('change', function () { readFile(this); });

$("#btnUploadGambar").click(function(){
    basic.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function(response) {
        $.ajax({
            url: "/fotoprofil/ganti",
            method: "POST",
            data: {"gambar": response},
            beforeSend: function(){
                $("#iconUpload").html('<i class="fa fa-spin fa-spinner"></i>');
            }
            ,
            success: function(res){
                $("#iconUpload").html('<i class="mdi mdi-upload"></i>');
                if(res.status){
                    swal({
                        title: 'SUKSES!',
                        text: res.msg,
                        type: 'success',
                        confirmButtonColor: '#3085d6'
                    }).then(function(){
                        window.location.href = "/dashboard";
                    });
                }
            }
        });
    });
});

</script>
@endsection