@extends('dashboard.app')

@section('title')
  Login DOSEN
@endsection


@section('content')

<section id="wrapper">
    <div class="login-register" style="background-color: #CDDCDC;background-image: radial-gradient(at 50% 100%, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%), linear-gradient(to bottom,rgba(255,255,255,0.25) 0%, rgba(0,0,0,0.25) 100%); background-blend-mode: screen, overlay;">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal" method="POST" id="loginform" action="{{action('DosenController@login')}}">
                    @csrf
                    <h1 class="text-center m-b-20">LOGIN DOSEN</h1>
                    <div class="form-group m-b-15">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-info" style="border:none">
                                        <i class="ti-user text-white"></i>
                                    </span>
                                </div>
                                <input name="username" class="form-control" type="text" required="" placeholder="Masukan Username">
                            </div>
                            @if($errors->has('username'))
                                <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('username') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-info" style="border:none">
                                    <i class="ti-key text-white"></i>
                                </span>
                            </div>
                            <input name="password" class="form-control" type="password" required="" placeholder="Masukan Password">
                        </div>
                        @if($errors->has('password'))
                            <div class="form-control-feedback m-t-10 text-danger">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                    <p class="text-center">Belum Punya Akun? <a href="/register">Buat Akun</a></p>
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
@endsection
