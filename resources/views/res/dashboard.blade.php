@extends('layouts.res')

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
        <div class="content-header-right text-md-end col-md-7 col-12 d-md-block">
            <div class="mb-1 breadcrumb-right">
                <a href="{{ route('restaurants.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                    <i data-feather="plus"></i> Manage Restaurants
                </a>
            </div>
        </div>

    </div>

    <!-- Contant Body starts here-->
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
                                            <h4 class="fw-bolder mb-0">{{ $data['total_menu'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Menus </p>
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
                                            <h4 class="fw-bolder mb-0">{{ $data['total_res'] }}</h4>
                                            <p class="card-text font-small-3 mb-0">Total Restaurant(s)</p>
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
                                            <h4 class="fw-bolder mb-0">0</h4>
                                            <p class="card-text font-small-3 mb-0">Completed Orders</p>
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
                                            <h4 class="fw-bolder mb-0">0</h4>
                                            <p class="card-text font-small-3 mb-0"> Total Customers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Statistics Card -->
            </div>

            <div class="row match-height">


                <!-- Scans Insights Card -->
                <div class="col-lg-12 col-md-12 col-9">
                    <div class="card card-revenue-budget">
                        <div class="row mx-0">
                            <div class="col-md-12 col-12 revenue-report-wrapper">
                                <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                    <h4 class="card-title mb-50 mb-sm-0">  <i data-feather="bar-chart-2"></i> Scan Insights</h4>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex align-items-center me-2">
                                            <label class="form-label">  Date Range </label>
                                            <div class="mb-0 ms-1">
                                                <input type="date" class="form-control dt-date flatpickr-range dt-input" placeholder="StartDate to EndDate" name="dt_date" />
                                                <input type="hidden" class="form-control dt-date start_date dt-input" name="value_from_start_date" />
                                                <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" />
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center ms-75">
                                            <!-- <label class="form-label" for="basicSelect">  Monthly </label> -->
                                            <select class="form-select" id="basicSelect">
                                                <option> Monthly</option>
                                                <option> January </option>
                                                <option> February </option>
                                                <option> March </option>
                                                <option> April </option>
                                                <option> May </option>
                                                <option> June </option>
                                                <option> July </option>
                                                <option> August </option>
                                                <option> September </option>
                                                <option> October </option>
                                                <option> November </option>
                                                <option> December </option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <div id="revenue-report-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Scans Insights Card ends here -->
            </div>

        </section>


    </div>
    <!-- Content Body ends here -->

</div>

@endsection
