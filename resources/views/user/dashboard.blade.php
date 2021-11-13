@extends('layouts.user')

@section('content')

<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-5 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-start mb-0"> Dashboard </h2>
                </div>
            </div>
        </div>
        @if (auth()->user()->has_cemetery)
        <div class="content-header-right text-md-end col-md-7 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
                <a href="{{ route('cemeteries.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                    <i data-feather="plus"></i> Manage Cemeteries
                </a>
            </div>
        </div>
            @endif

    </div>


    <div class="content-body"><!-- Dashboard Analytics Start -->
        @if (auth()->user()->has_cemetery)
            @include('user.partials.has_cemetery_dash')
    @else

            <section id="dashboard-analytics">
                <div class="row match-height">
                    <!-- Greetings Card starts -->
                    <div  class="col-lg-6 col-md-12 col-sm-12 mt-4 mx-auto">
                        <div class="card card-congratulations">
                            <div class="card-body text-center">
                                <img
                                    src="/assets/images/elements/decore-left.png"
                                    class="congratulations-img-left"
                                    alt="card-img-left"
                                />
                                <img
                                    src="/assets/images/elements/decore-right.png"
                                    class="congratulations-img-right"
                                    alt="card-img-right"
                                />
                                <div class="avatar avatar-xl bg-primary shadow">
                                    <div class="avatar-content">
                                        <i data-feather="user" class="font-large-1"></i>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h1 class="mb-1 text-white">Welcome {{ auth()->user()->username }}</h1>
                                    <p class="card-text m-auto w-75">
                                        You have not added any memorial yet,  get started by adding memorials
                                    </p>
                                    <div class="mt-2">
                                        <a  href="{{ route('memorials.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                                            <i data-feather="plus"></i> Create A Memorial
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Greetings Card ends -->
                </div>
            </section>

        @endif

        <!-- Dashboard Analytics end -->

    </div>


    <!-- Contant Body starts here-->
    @section('hide')
    <div class="content-body">
        <!-- Dashboard Starts here  -->
        <section id="dashboard-ecommerce">
            <div class="row match-height">

                <!-- Statistics Card -->
                <div class="col-xl-12 col-md-6 col-12">
                    <div class="card card-statistics">
                        <div class="card-header">
                            <h4 class="card-title"> Insights </h4>
                        </div>
                        <div class="card-body statistics-body">
                            <div class="row">
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar black-bg me-2">
                                            <div class="avatar-content">
                                                <i data-feather="menu" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $data['total_cemeteries'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Cemeteries </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar black-bg me-2">
                                            <div class="avatar-content">
                                                <i data-feather="bar-chart-2" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $data['total_memorials'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Memorials</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                    <div class="d-flex flex-row">
                                        <div class="avatar black-bg me-2">
                                            <div class="avatar-content">
                                                <i data-feather="activity" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $data['total_cemeteries'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Cemeteries</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 col-12">
                                    <div class="d-flex flex-row">
                                        <div class="avatar black-bg me-2">
                                            <div class="avatar-content">
                                                <i data-feather="users" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="my-auto">
                                            <h4 class="fw-bolder mb-0">{{ $data['photos'] }}</h4>
                                            <p class="card-text font-small-3 mb-0"> My Photos</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>


        </section>
    </div>
@endsection
    <!-- Content Body ends here -->

</div>

@endsection
