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
                <a href="{{ route('admin.cemeteries.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                    <i data-feather="plus"></i> Manage Cemeteries
                </a>
            </div>
        </div>
            @endif

    </div>


    <div class="content-body"><!-- Dashboard Analytics Start -->
        <section id="dashboard-analytics">
            <div class="row match-height">
                <!-- Greetings Card starts -->
                <div class="col-lg-6 col-md-12 col-sm-12">
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
                                    There is about <strong>{{ $data['total_cemeteries'] }} </strong> cemeteries and <strong>{{ $data['total_memorials'] }} </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Greetings Card ends -->

                <!-- Subscribers Chart Card starts -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="book-open" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $data['total_cemeteries'] }} Cemeteries</h2>
                            {{--                            <p class="card-text">Total Cemeteries</p>--}}
                            <a href="{{ route('admin.cemeteries.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                                <i data-feather="plus"></i> View Cemetery
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Subscribers Chart Card ends -->

                <!-- Orders Chart Card starts -->
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-header flex-column align-items-start pb-0">
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="package" class="font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="fw-bolder mt-1">{{ $data['total_memorials'] }} Memorials</h2>
                            <a href="{{ route('admin.memorials.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                                <i data-feather="plus"></i> View Memorials
                            </a>
                        </div>
                        <div id="order-chart"></div>
                    </div>
                </div>
                <!-- Orders Chart Card ends -->
            </div>


            @section('hide')
            <div class="row match-height">

                <!-- Support Tracker Chart Card starts -->
                <div class="col-lg-6 col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between pb-0">
                            <h4 class="card-title">Cemetery View Statistics</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-2 col-12 d-flex flex-column flex-wrap text-center">
                                    <h1 class="font-large-2 fw-bolder mt-2 mb-0">{{ $data['total_cemeteries_views'] }}</h1>
                                    <p class="card-text">Total Views</p>
                                </div>
                                <div class="col-sm-10 col-12 d-flex justify-content-center">
                                    <div id="support-trackers-chart"></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-1">
                                <div class="text-center">
                                    <p class="card-text mb-50">Unique Views</p>
                                    <span class="font-large-1 fw-bold">{{ $data['total_cemeteries_u_views'] }}</span>
                                </div>
                                <div class="text-center">
                                    <p class="card-text mb-50">Today Total Views</p>
                                    <span class="font-large-1 fw-bold">{{ $data['total_cemeteries_today_views'] }}</span>
                                </div>
                                <div class="text-center">
                                    <p class="card-text mb-50">Today Unique Views</p>
                                    <span class="font-large-1 fw-bold">{{ $data['total_cemeteries_today_u_views'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Support Tracker Chart Card ends -->
            </div>
            @endsection

        </section>


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
