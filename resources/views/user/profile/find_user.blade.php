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
                    <h2 class="content-header-title float-start mb-0">Member Search</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="content-body">


        <section id="accordion-with-margin">

            <div class="row">

                <div class="col-md-7 col-7">
                    <div class="row">
                        <form method="get" action="">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="form-label">Member Search</label>
                                    <input name="name" value="{{ old('name', request()->get('name')) }}" type="text" class="form-control dt-input dt-full-name " data-column="1"/>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Member ID</label>
                                    <input name="id" value="{{ old('id', request()->get('id')) }}" type="text" class="form-control dt-input dt-full-name " data-column="1"/>
                                </div>
                                <div class="col-12 mt-1">
                                    <div class="">
                                        <input type="submit" value="Search" class="btn btn-primary waves-effect waves-float waves-light" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>


                    @if (count($users) > 0)
                        <div class="row members-list mt2">

                            @foreach($users as $user)
                                    <div class="col-sm-12">
                                        <div class="accordion accordion-margin" id="accordionMargin">
                                            <div class="accordion-item " id="heading-1">

                                                <div class="row p-1" >
                                                    <div class="col-md-2 col-2">
                                                        {{--                                    <h2 class="accordion-header" id="headingMarginOne">--}}
                                                        <img class="rounded-circle" src="{{ auth()->user()->avatar }}" />

                                                        {{--                                    </h2>--}}
                                                    </div>
                                                    <div class="col-md-7">
                                                        <h4 class="text-capitalize"><a href="{{ route('user.profile', $user->id) }}"> {{ $user->name }}</a></h4>
                                                        <h6>Member Since : {{ $user->created_at->format('M Y') }}</h6>
                                                        <h6>User ID : {{ $user->site_id }}</h6>

                                                    </div>
                                                    <div class="col-md-3 accordion-buttons float-right float-end mb-1">
                                                        <a href="{{ route('user.profile', $user->id) }}">
                                                        <h6>Memorials :  {{ $user->memorials_count }}</h6>
                                                        <h6>Photos : {{ $user->photos_count }}</h6>
                                                        <h6>Followers  : {{ $user->followers()->count() }}</h6>
                                                        </a>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>

        </section>


    </div>

</div>

@endsection
