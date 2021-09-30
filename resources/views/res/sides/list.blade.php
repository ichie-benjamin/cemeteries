@extends('layouts.res')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <!-- Begin Page header-->
        <div class="content-header row">

            @include('partials.errors')

            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Manage Sides </h2>
                        <p>  { {{ $res->name }} }</p>
                    </div>
                </div>
            </div>

            <div class="content-header-right text-md-end col-md-7 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a href="{{ route('menu_categories.index', $res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                        Main Menu
                    </a>
                    <a href="{{ route('flavors.index',$res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                        Add Flavors
                    </a>
                    <a type="button" class="btn btn-primary waves-effect green-bg waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuSidesModal">
                        <i data-feather="plus"></i> Add Sides
                    </a>
                </div>
            </div>


        </div>
        <!-- End Page Header-->

        <div class="content-body">

            <section id="accordion-with-margin">
                @if (count($sides) > 0)
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach($sides as $item)
                            <div class="accordion accordion-margin accordion-without-arrow">
                                <div class="accordion-item">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed text-capitalize" type="button">
                                                    <i data-feather="menu"></i> &nbsp; {{ $item->name }} ({{ $item->price }})
                                                </button>
                                            </h2>
                                        </div>
                                        <div class="col-md-3 mt-1 mb-1 accordion-buttons">
                                            <a type="button" class="btn btn-primary blue-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#editMenuSidesModal{{ $item->id }}">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <a type="button" class="btn btn-primary red-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteSideModal{{ $item->id }}">
                                                <i data-feather="trash-2"></i>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                                @include('res.sides.modals.delete_side')
                                @include('res.sides.modals.edit_side')

                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-12 text-center mt-100">
                            <h4>No sides added yet</h4>
                        </div>
                    </div>
            @endif

                @include('res.sides.modals.add_side')

            </section>

        </div>
    </div>
@endsection
