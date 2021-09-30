@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <!-- Brand logo--> <div class="login-logo">
                        <div class="nav-item">
                            <a class="navbar-brand ml-2" href="#">
                                <img src="/assets/images/logo/logo.png">
                            </a>
                        </div>
                    </div>
                    <!-- /Brand logo-->
                    <!-- Left Text-->
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid" src="/assets/images/pages/login/qrcode-scan.jpeg" alt="Register V2"/></div>
                    </div>
                    <!-- /Left Text-->
                    <!-- Register-->
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">Create an account 🚀</h2>
                            <p class="card-text mb-2">Join the revolution!</p>
                            <form class="auth-register-form mt-2" action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="register-username">Username</label>
                                    <input required class="form-control @error('username') is-invalid @enderror" id="register-username"  value="{{ old('username') }}" type="text" name="username" placeholder="johndoe" aria-describedby="register-username" autofocus="" tabindex="1"/>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="register-email">Email</label>
                                    <input  value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="register-email" type="email" required name="email" placeholder="john@example.com" aria-describedby="register-email" tabindex="2"/>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="register-email">Phone</label>
                                    <input  value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="register-phone" type="text" required name="phone" placeholder="+2348373828288" aria-describedby="register-phone" tabindex="2"/>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="register-password">Password</label>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="register-password" type="password" name="password" placeholder="" aria-describedby="register-password" tabindex="3"/><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="confirm-password">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="confirm-password" type="password" required name="password_confirmation"  aria-describedby="confirm-password" tabindex="3"/>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                        <input required class="form-check-input" id="register-privacy-policy" type="checkbox" tabindex="4"/>
                                        <label class="form-check-label" for="register-privacy-policy">I agree to<a href="#">&nbsp;privacy policy & terms</a></label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" tabindex="5">Sign up</button>
                            </form>
                            <p class="text-center mt-2"><span>Already have an account?</span><a href="{{ route('login') }}"><span>&nbsp;Sign in instead</span></a></p>

                        </div>
                    </div>
                    <!-- /Register-->
                </div>
            </div>
        </div>
    </div>
@endsection
