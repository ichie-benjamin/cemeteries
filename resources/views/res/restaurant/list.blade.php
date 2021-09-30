@extends('layouts.res')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Manage Restaurants </h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-8 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{ route('restaurants.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> Add Restaurant
                    </a>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Manage individual restaurant menus, QR Codes, orders, membership plans and more. Edit each restaurant's information. </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->
            <div class="row match-height">

                @foreach($restaurants as $item)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"> {{ $item->name }}  </h2>
                            <a href="#" class="preview-restaurant" target="_blank"> <i data-feather="eye"></i> Preview </a>
                        </div>
                        <div class="card-body">

                            <div class="row mb-1">
                                <div class="col-md-6">
                                    <div class="restaurant-logo">
                                        <img src="{{ $item->logo }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5>Address </h5>
                                    <p>{{ $item->address }}</p>
                                </div>
                            </div>
                            <div class="mb-1">
                                <a href="{{ route('menu_categories.index',$item->id) }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light"> Manage</a>
                                <a href="{{ route('restaurants.edit', $item->id) }}" type="button" class="btn btn-primary blue-bg-outline waves-effect waves-float waves-light"> Edit</a>
                                <a type="button" class="btn btn-primary red-bg-outline waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteRestaurantModal{{$item->id}}"> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>


                    @include('inc.modals.res_delete')

                @endforeach

                @if (count($restaurants) < 1)

                @endif

            </div>
            <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
