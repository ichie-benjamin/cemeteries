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
                            <h4 class="card-title"> Listing Memorials </h4>
                        </div>

                        <!-- Table items filter -->
                        <!-- Table rows and columns start here-->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Cemetery</th>
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
                                        <td> {{ optional($item->cemetery)->name }} </td>

                                        <td> {{ $item->age }} </td>
                                        <td> <a href="{{ route('admin.memorials.index') }}?cemetery={{ $item->id }}">{{ $item->photos_count }}</a></td>
                                        <td class="d-flex">
                                            <span class="badge rounded-pill badge-light-success me-1"> active </span>
                                            <div class="dropdown">
                                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i data-feather="more-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('admin.memorials.edit', $item->id) }}">
                                                        <i data-feather="check-circle" class="me-50"></i>
                                                        <span>Edit</span>
                                                    </a>
                                                    <a type="button" class="dropdown-item"
                                                       data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}">
                                                        <i data-feather="x-circle" class="me-50"></i>
                                                        <span>Delete</span>
                                                    </a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>

                            <!-- Table pagination -->

                            <div class="d-flex justify-content-between mx-auto row mt-4 mb-4">
                                {{ $memorials->links() }}

                            </div>

                        </div>
                    </div>
                </div>
            </div>



        @foreach($memorials as $item)
            @include('partials.delete_modal', ['name' => 'Memorial', 'route' => route('memorials.destroy', $item->id), 'item' => $item])
        @endforeach

        <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
