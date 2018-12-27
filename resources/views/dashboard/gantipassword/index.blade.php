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
                <h3 class="text-themecolor">Ganti Password</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Beranda</a></li>
                    <li class="breadcrumb-item active">Ganti Password</li>
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
                <div class="col-sm-12 col-md-6">
                    <div class="card card-outline-info">
                        <div class="card-header">
                            <h3 class="m-b-0 text-white text-center">Ganti Password</h3>
                        </div>
                        <div class="card-body">
                            <form action="/password/ganti" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-md-4 col-sm-12">Password Lama</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="password" name="password_lama" class="form-control">
                                        @if($errors->has('password_lama'))
                                            <div class="form-control-feedback text-danger">{{ $errors->first('password_lama') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-sm-12">Password Baru</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="password" name="password_baru" class="form-control">
                                        @if($errors->has('password_baru'))
                                            <div class="form-control-feedback text-danger">{{ $errors->first('password_baru') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-sm-12"></label>
                                    <div class="col-md-8 col-sm-12">
                                        <button type="submit" class="btn btn-info">
                                            <span class="btn-label"><i class="mdi mdi-content-save"></i></span>
                                            Simpan Password
                                        </button>
                                    </div>
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
<link rel="stylesheet" href="{{ asset('assets/plugins/croppie/croppie.css') }}">
@endsection

@section('js')
<script src="{{ asset('assets/plugins/croppie/croppie.js') }}"></script>
@include('admin.inc.sweetalert')
@endsection