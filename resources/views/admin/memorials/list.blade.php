@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0 text-capitalize">  {{ $title }} </h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-8 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{ route('admin.memorials.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> Add Memorial
                    </a>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Manage individual  memorials, Edit each memorial information. </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->

            <div class="row" id="basic-table">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Search Cemeteries</h4>
                        </div>
                        <div class="card-body">
                            <form class="" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="form-label">Name:</label>
                                        <input type="text" class="form-control dt-input dt-full-name" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label"> Country:</label>
                                        <input type="text" class="form-control dt-input dt-item-name" />
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">State:</label>
                                        <input type="text" class="form-control dt-input dt-price" />
                                    </div>
                                </div>

                                <div class="row mt-1">

                                    <div class="col-md-4">
                                        <label class="form-label">Date & Time:</label>
                                        <div class="mb-0">
                                            <input type="date" class="form-control dt-date flatpickr-range dt-input" placeholder="StartDate to EndDate" name="dt_date" />
                                            <input type="hidden" class="form-control dt-date start_date dt-input" name="value_from_start_date" />
                                            <input type="hidden" class="form-control dt-date end_date dt-input" name="value_from_end_date" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label" for="basicSelect"> Order Status</label>
                                        <select class="form-select" id="basicSelect">
                                            <option>Active</option>
                                            <option> Disabled </option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Table items filter -->
                        <div class="row mb-1">
                            <div class="d-flex justify-content-between align-items-center mx-0 row">
                                <div class="col-sm-12 col-md-2"><div class="dataTables_length" id="DataTables_Table_0_length">
                                        <label class="form-label" for="basicSelect">Show cemeteries</label>
                                        <select class="form-select" id="basicSelect">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Table rows and columns start here-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                    <th>Photos</th>
                                    <th> Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($memorials as $item)
                                    <tr>
                                        <td>
                                            <span class="fw-bold"> {{ $loop->index+1 }} </span>
                                        </td>
                                        <td>
                                            <img height="30px" width="50px" src="{{ $item->image }}" />
                                        </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->age }} </td>
                                        <td> <a href="{{ route('admin.memorials.index') }}?cemetery={{ $item->id }}">{{ $item->photos_count }}</a></td>
                                        <td class="d-flex">
                                            <span class="badge rounded-pill badge-light-success me-1"> active </span>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.cemeteries.edit', $item->id) }}">
                                                        <i data-feather="check-circle" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i data-feather="x-circle" class="me-50"></i>
                                                        <span>Disable</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <!-- Table pagination -->
                            <div class="d-flex justify-content-between mx-0 row mt-1">
                                <div class="col-sm-12 col-md-6">
                                    <div role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="" id="">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled">
                                                <a href="#" class="page-link">&nbsp;</a>
                                            </li>
                                            <li class="paginate_button page-item next disabled">
                                                <a href="#" class="page-link">&nbsp;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
