@extends('dashboard.app')

@section('content')

<section id="wrapper">
    <div class="login-register login-sidebar" style="border-radius: 0 !important; background-image:url({{ asset('assets/images/background/login-register.jpg') }}) ;">
        <div class="login-box card">
            <div class="card-body" style="overflow-y: scroll;">
                <form class="form-horizontal" method="POST" id="loginform" action="/register">
                    @csrf
                    <a href="javascript:void(0)" class="text-center db"><img src="{{ asset('assets/images/logo-icon.png') }}" alt="Home" /><br/><img src="{{ asset('assets/images/logo-text.png') }}" alt="Home" /></a>
                    <h3 class="box-title m-t-40 m-b-0">Form Pendaftaran</h3><small>Lengkapi form data berikut</small>
                    <div class="form-group m-t-20">
                        <div class="col-xs-12">
                            <input name="cama_nama" value="{{ old('cama_nama') }}" type="text" class="form-control" placeholder="Masukan nama lengkap">
                            @if($errors->has('cama_nama'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('cama_nama') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input name="cama_email" value="{{ old('cama_email') }}" type="email" class="form-control" placeholder="Masukan email">
                            @if($errors->has('cama_email'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('cama_email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password" type="password" class="form-control" placeholder="Masukan password">
                            @if($errors->has('password'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Masukan ulang password">
                            @if($errors->has('password_confirmation'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('password_confirmation') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <img id="captcha-img"></img>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input name="captcha" type="text" class="form-control" placeholder="Kode Chaptcha">
                        </div>
                        <div class="col-sm-6">
                            <a style="margin-top: 4px" class="btn-ganti-captcha" href="#" onclick="event.preventDefault(); refresh()"><i class="fa fa-rotate-right"></i> Ganti Captcha</a>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Daftar</button>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-12 text-center">
                            <p>Sudah punya akun? <a href="/login" class="text-info m-l-5"><b>Login</b></a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@section('js')
    @include('admin.inc.sweetalert')
    <script src="{{ asset('js/captcha.js') }}"></script>
    <script>refresh();</script>
@endsection