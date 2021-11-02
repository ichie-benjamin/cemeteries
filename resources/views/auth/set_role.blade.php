@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- Brand logo-->
                    <div class="login-logo">
                        <div class="nav-item">
                            <a class="navbar-brand ml-2" href="#">
                                <img src="/images/logo.png">
                            </a>
                        </div>
                    </div>

                    <div class="d-flex col-lg-6 align-items-center auth-bg px-2 p-lg-5 mx-auto">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1 text-center">SELECT YOUR ACCOUNT TYPE</h2>
                            <p class="card-text mb-2 text-center">Choose either a volunteer or cemetery owner</p>

                            <div class="row">
                                <div class="col-6">
                                    <a href="{{ route('user.set.role','volunteer') }}">
                                        <div class="bg-img" style="background-image: url('/images/volun.png'); height: 250px; width: 100%"></div>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('user.set.role','cemetery') }}">
                                        <div style="background-image: url('/images/ceme.jpeg'); height: 250px; width: 100%">
                                            <h2 class="text-center mt-2 pt-2">Owns a cemetery</h2>
                                        </div>
                                    </a>
                                    </a>

                                </div>
                            </div>

                            <p class="text-center mt-2"><span>Don't have an account?</span><a href="{{ route('register') }}"><span>&nbsp;Create an account</span></a></p>

                        </div>
                    </div>
                    <!-- /Login-->
                </div>
            </div>
        </div>
    </div>
@endsection


@section('contents')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
