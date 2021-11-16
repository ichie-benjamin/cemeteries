@extends('layouts.user')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/assets/css/pages/page-profile.min.css">
@endsection
@section('content')

<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0">Profile</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Pages</a>
                            </li>
                            <li class="breadcrumb-item active">Profile
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body"><div id="user-profile">
            <!-- profile header -->
            <div class="row">
                <div class="col-12">
                    <div class="card profile-header mb-2 profile-bg" style="background-image: url('/images/slider1.jpeg'); height: 280px">
                        <div style="height: 270px"></div>
                        <!-- profile cover photo -->
{{--                        <img--}}
{{--                            class="card-img-top"--}}
{{--                            src="/images/slider1.jpeg" height="250px"--}}
{{--                            alt="User Profile Image"--}}
{{--                        />--}}
                        <!--/ profile cover photo -->

                        <div class="position-relative">
                            <!-- profile picture -->
                            <div class="profile-img-container d-flex align-items-center">
                                <div class="profile-img">
                                    <img
                                        src="{{ $user->avatar }}"
                                        class="rounded img-fluid" height="100%"
                                        alt="{{ $user->name }}"
                                    />
                                </div>
                                <!-- profile title -->
                                <div class="profile-title ms-3">
                                    <h2 class="text-white text-capitalize">{{ $user->name }}</h2>
                                    <p class="text-white">{{ $user->role }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- tabs pill -->
                        <div class="profile-header-nav">
                            <!-- navbar -->
                            <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                <button
                                    class="btn btn-icon navbar-toggler"
                                    type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent"
                                    aria-controls="navbarSupportedContent"
                                    aria-expanded="false"
                                    aria-label="Toggle navigation"
                                >
                                </button>

                                <!-- collapse  -->
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                        <ul class="nav nav-pills mb-0">
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold active" href="#">
                                                    <span class="d-none d-md-block">Profile</span>
                                                    <i data-feather="rss" class="d-block d-md-none"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold" href="{{ $data['memorials'] > 0 ? route('user.memorials', $user->id) : '' }}">
                                                    <span class="d-none d-md-block">Managed Memorials ({{ $data['memorials'] }})</span>
                                                    <i data-feather="info" class="d-block d-md-none"></i>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold" href="{{ $data['photos'] > 0 ? route('user.photos', $user->id) : '' }}">
                                                    <span class="d-none d-md-block">Photos ({{ $data['photos'] }})</span>
                                                    <i data-feather="image" class="d-block d-md-none"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- edit button -->
                                        @if (auth()->id() == $user->id)
                                            <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">
                                                <i data-feather="edit" class="d-block d-md-none"></i>
                                                <span class="fw-bold d-none d-md-block">Edit Profile</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <!--/ collapse  -->
                            </nav>
                            <!--/ navbar -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ profile header -->

            <!-- profile info section -->
            <section id="profile-info">
                <div class="row">
                    <!-- left profile info section -->
                    <div class="col-lg-6 col-12 order-2 order-lg-1">
                        <!-- about -->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-75">Bio Information</h5>
                                <p class="card-text">
                                    @if (strlen($user->bio) < 5)
                                        Add a short bio or something interesting about you.

                                        @if (auth()->id() == $user->id)
                                        <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Add Bio</a>
                                            @endif

                                    @endif

                                    {{ $user->bio }}
                                </p>
                                <div class="mt-2">
                                    <h5 class="mb-75">Date Joined:</h5>
                                    <p class="card-text">{{ $user->created_at->format('M d Y') }}</p>
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-75">Phone:</h5>
                                    <p class="card-text">{{ $user->phone }}</p>
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-75">Email:</h5>
                                    <p class="card-text">{{ $user->email }}</p>
                                </div>
                                <div class="mt-2">
                                    <h5 class="mb-50">Account Type:</h5>
                                    <p class="card-text mb-0">{{ $user->role }}</p>
                                </div>
                            </div>
                        </div>
                        <!--/ about -->
                    </div>
                    <!--/ left profile info section -->

                    <!-- center profile info section -->
                    <div class="col-lg-6 col-12 order-1 order-lg-2">
                        <!-- post 1 -->
                        <div class="card">
                            <div class="card-header">
                                Contributions
                            </div>
                            <hr/>
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center mb-1">
{{--                                    <div class="row">--}}
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p>Suggested Edits : </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <p><a href="{{ $data['memorials'] > 0 ? route('user.memorials', $user->id) : '' }}">Memorials Added </a> : {{ $data['memorials'] }}</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-6">
                                            <div class="row">
                                                <div class="col-10">
                                                    <p><a href="{{ $data['photos'] > 0 ? route('user.photos', $user->id) : '' }}">Photos Added </a>: {{ $data['photos'] }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <p><a href="{{ route('cemeteries.index') }}">Virtual Cemetery </a>  :  {{ $data['v_cemeteries'] }}</p>
                                                </div>
                                            </div>

                                        </div>
{{--                                    </div>--}}
                                </div>
                            </div>
                            <div class="card-footer">

                                <h3>Followers ({{ count($data['followings']) }})</h3>
                                <hr />
                                <div class="row">

                                    @foreach($data['followings'] as $item)
                                    <div class="col-2">
                                        <img class="rounded-circle" src="{{ $item->avatar }}" height="60px" />
                                        <br/>
                                        <a href="">{{ $item->name }}</a>
                                    </div>
                                    @endforeach

                                </div>

                                <div class="row">
                                    <div>
                                        <a href="{{ route('user.find.members') }}">
                                            <img height="40px" src="/images/search.png" />
                                            <p>Find a member</p>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--/ post 1 -->
                    </div>
                    <!--/ center profile info section -->

                </div>
                <!--/ polls card -->
            </section>
        </div>
        <!--/ right profile info section -->
    </div>

    <!-- reload button -->

    <!--/ reload button -->
    <!--/ profile info section -->
</div>

@endsection
