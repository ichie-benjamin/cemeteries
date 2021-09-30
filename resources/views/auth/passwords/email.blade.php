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
                                <img src="/assets/images/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="/assets/images/pages/forgot-password-v2.svg" alt="Forgot password V2"/></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Forgot password-->

                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">





                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">

                            @if (session('status'))
                                <div class="col-12">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                </div>
                            @endif

                            <h2 class="card-title fw-bold mb-1">Forgot Password? 🔒</h2>
                            <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>


                            <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="forgot-password-email">Email</label>
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email"  id="forgot-password-email" type="text" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" autofocus="" tabindex="1"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary w-100" tabindex="2">Send reset link</button>
                            </form>
                            <p class="text-center mt-2"><a href="{{ route('login') }}"><i data-feather="chevron-left"></i> Back to login</a></p>
                        </div>
                    </div>
                    <!-- /Forgot password-->
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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
