@extends('dashboard.app')

@section('content')

<section id="wrapper">
    <div class="login-register register" style="background-color: #CDDCDC;
 background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom,rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%); background-blend-mode: screen, overlay;">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal" method="POST" id="loginform" action="/register">
                	@csrf
                    <img src="{{ asset('img/logo2.png') }}" alt="Logo SMRTI" class="m-b-20" width="100%">
                    <div class="form-group m-b-15">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info" style="border:none">
                                        <i class="ti-user text-white"></i>
                                    </span>
                                </div>
                                <input name="cama_nama" value="{{ old('cama_nama') }}" type="text" class="form-control" placeholder="Masukan nama lengkap">
                            </div>
                            @if($errors->has('cama_nama'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('cama_nama') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-b-15">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info" style="border:none">
                                        <i class="ti-email text-white"></i>
                                    </span>
                                </div>
                                <input name="cama_email" value="{{ old('cama_email') }}" type="email" class="form-control" placeholder="Masukan email">
                            </div>
                            @if($errors->has('cama_email'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('cama_email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group m-b-15">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info" style="border:none">
                                    <i class="ti-key text-white"></i>
                                </span>
                            </div>
                            <input name="password" type="password" class="form-control" placeholder="Masukan password">
                        </div>
                        @if($errors->has('password'))
                            <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info" style="border:none">
                                    <i class="ti-reload text-white"></i>
                                </span>
                            </div>
                            <input name="password_confirmation" type="password" class="form-control" placeholder="Ulang masukan password">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="col-md-12 font-14">
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" name="remember" type="checkbox">
                                <label for="checkbox-signup"> Ingat saya? </label>
                            </div>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-7">
                            <img id="captcha-img" style="width: 100%"></img>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <a style="margin-top: 10px; display: block;" class="btn-ganti-captcha" href="#" onclick="event.preventDefault(); refresh()"><i class="fa fa-rotate-right"></i> Ganti Captcha</a>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info" style="border:none">
                                        <i class="ti-uppercase text-white"></i>
                                    </span>
                                </div>
                                <input name="captcha" type="text" class="form-control" placeholder="Kode Chaptcha">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-4">
                            @if(session('error_captcha'))
                                <span class="error">
                                    <i class="fa fa-info-circle"></i>
                                    {{ session('error_captcha') }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">REGISTER</button>
                        </div>
                    </div>
                    <p class="text-center">Sudah Punya Akun? <a href="/login">Login</a></p>
                </form>
                <form class="form-horizontal" id="recoverform" action="index.html">
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email"> </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
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