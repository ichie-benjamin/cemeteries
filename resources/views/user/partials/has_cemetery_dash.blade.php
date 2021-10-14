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
                            You have about <strong>{{ $data['total_cemeteries_views'] }} </strong> views already. Check your statistics to see how your cemetery page is performing.
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
                    <a href="{{ route('cemeteries.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> Add Cemetery
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
                    <a href="{{ route('cemeteries.index') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> View Cemeteries
                    </a>
                </div>
                <div id="order-chart"></div>
            </div>
        </div>
        <!-- Orders Chart Card ends -->
    </div>

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

</section>
