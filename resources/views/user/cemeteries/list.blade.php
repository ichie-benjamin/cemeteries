@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Manage Cemeteries </h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-8 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{ route('cemeteries.create') }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> Add Cemetery
                    </a>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Manage individual cemeteries memorials, Edit each cemetery information. </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->
            <div class="row match-height">

                @foreach($cemeteries as $item)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="card-title"> {{ $item->name }}  </h2>
                            <a href="{{ route('cemetery.show',['id'=>$item->id, 'username' => $item->username]) }}" class="preview-restaurant" target="_blank"> <i data-feather="eye"></i> Preview </a>
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
                                <a href="{{ route('memorials.index') }}?cemetery={{ $item->id }}" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light"> Memorials</a>
                                <a href="{{ route('cemeteries.edit', $item->id) }}" type="button" class="btn btn-primary blue-bg-outline waves-effect waves-float waves-light"> Edit</a>
                                <a type="button" class="btn btn-primary red-bg-outline waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteRestaurantModal{{$item->id}}"> Delete</a>
                            </div>
                        </div>
                    </div>
                </div>


                @endforeach

                @if (count($cemeteries) < 1)
                        <div class="col-md-12 col-12">
                        <div class="alert alert-danger p-3">
                        <p>No cemetery added yet, start by adding your cemeteries</p>
                        </div>
                    </div>
                @endif

            </div>
            <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
