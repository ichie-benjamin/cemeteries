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
                    @if (request()->has('cemetery'))
                        <a href="{{ route('memorials.create') }}?id={{ request()->get('cemetery') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                            <i data-feather="plus"></i> Add Memorial
                        </a>
                    @else
                        <a href="{{ route('memorials.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                            <i data-feather="plus"></i> Add Memorial
                        </a>
                    @endif

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
            <div class="row match-height">

                @foreach($memorials as $item)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"> {{ $item->name }} </h2>
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i data-feather="more-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#" target="_blank">
                                        <i data-feather="eye" class="me-50"></i>
                                        <span> Preview Memorial</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('memorials.photos',$item->id) }}">
                                        <i data-feather="menu" class="me-50"></i>
                                        <span> Manage Photos</span>
                                    </a>
                                    <a class="dropdown-item" href="{{ route('memorials.edit',$item->id) }}">
                                        <i data-feather="edit-2" class="me-50"></i>
                                        <span>Edit</span>
                                    </a>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteRestaurantModal">
                                        <i data-feather="trash" class="me-50"></i>
                                        <span>Delete</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="row mb-1">
                                <div class="col-md-4">
                                    <div class="restaurant-logo">
                                        <img src="{{ $item->image }}">
                                    </div>
                                </div>
                                <div class="col-md-8">
{{--                                    <h5> BIRTH : {{ $item->b_date }} </h5>--}}
                                    <p> BIRTH : {{ $item->b_date }} => <span>{{ $item->birth_location }}</span></p>
                                    <p> DEATH : {{ $item->d_date }} =>  <span>{{ $item->death_location }}</span> </p>
                                    <p>PHOTOS :  {{ $item->photos_count }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                @if(count($memorials) < 1)
                <div class="col-12 text-center" style="margin-top: 50px">
                    <h3>No Memorials found, pls add memorials</h3>
                </div>
                    @endif

            </div>

            <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
