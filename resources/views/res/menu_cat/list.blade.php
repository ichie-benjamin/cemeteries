@extends('layouts.res')

@section('contents')
    <div class="content-wrapper container-xxl p-0">
        <!-- Begin Page header-->
        <div class="content-header row">

            @include('partials.errors')


            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Manage Menus </h2>
                        <p>  { {{ $res->name }} }</p>
                    </div>
                </div>
            </div>


            @if (count($categories) > 0)
                <div class="content-header-right text-md-end col-md-8 col-12 d-md-block">
                    <div class="mb-1 breadcrumb-right">
                        <button type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuCategoryModal">
                            <i data-feather="plus"></i> Add Menu Category
                        </button>
                        <a href="{{ route('sides.index',$res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                            Add Sides
                        </a>
                        <a href="{{ route('flavors.index', $res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                            Add Flavors
                        </a>
                    </div>
                </div>
        @endif


        </div>
        <!-- End Page Header-->

        <div class="content-body">


            @if (count($categories) > 0)
                <!-- Menu Accordions start here -->
                @foreach($categories as $item)
                    <section id="accordion-with-margin">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="accordion accordion-margin accordion-without-arrow" id="accordionMargin" data-toggle-hover="true">
                                    <div class="accordion-item">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h2 class="accordion-header" id="headingMarginOne">
                                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#menuItem{{$item->id}}" aria-expanded="false" aria-controls="menuItem{{ $item->id  }}">
                                                        <i data-feather="menu"></i> &nbsp; {{ $item->name }}
                                                    </button>
                                                </h2>
                                            </div>
                                            <div class="col-md-3 mt-1 mb-1 accordion-buttons">
                                                <a type="button" class="btn btn-primary waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuSubCategoryModal{{ $item->id }}">
                                                    <i data-feather="folder-plus"></i>
                                                </a>
                                                <a type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuItemModal{{ $item->id }}">
                                                    <i data-feather="plus"></i>
                                                </a>
                                                <a type="button" class="btn btn-primary blue-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#editMenuCategoryModal{{$item->id}}">
                                                    <i data-feather="edit"></i>
                                                </a>
                                                <a type="button" class="btn btn-primary red-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteMenuCatModal{{$item->id}}">
                                                    <i data-feather="trash-2"></i>
                                                </a>
                                                @include('inc.modals.deletes.menu_cat')
                                            </div>
                                        </div>



                                        @include('inc.menu_items')
                                    </div>


                                </div>
                            </div>
                        </div>

                        @include('inc.modals.add_menu_item')


                        <!-- Select Flavors/Sides modal starts here-->
                        <div class="modal fade" id="selectFlavorsandSidesModal" tabindex="-1" aria-labelledby="selectFlavorsandSidesModalTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="selectFlavorsandSidesModalTitle"> Select Sides or Flavors </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body pt-0">
                                        <div class="card-body p-0">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="sides-tab" data-bs-toggle="tab" href="#sides" aria-controls="sides" role="tab" aria-selected="true">Sides</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="flavors-tab" data-bs-toggle="tab" href="#flavors" aria-controls="flavors" role="tab" aria-selected="false">Flavors</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="sides" aria-labelledby="sides-tab" role="tabpanel">
                                                    <p>
                                                        Please select your sides.
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="side1" value="unchecked">
                                                        <label class="form-check-label" for="side1">Side 1</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="side2" value="unchecked">
                                                        <label class="form-check-label" for="side2">Side 2</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="side3" value="unchecked">
                                                        <label class="form-check-label" for="side3">Side 3</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="side4" value="unchecked">
                                                        <label class="form-check-label" for="side4">Side 4</label>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="flavors" aria-labelledby="flavors-tab" role="tabpanel">
                                                    <p>
                                                        Please select your flavors.
                                                    </p>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="flavor1" value="unchecked">
                                                        <label class="form-check-label" for="flavor1">Flavor 1</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="flavor2" value="unchecked">
                                                        <label class="form-check-label" for="flavor2">Flavor 2</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="flavor3" value="unchecked">
                                                        <label class="form-check-label" for="flavor3">Flavor 3</label>
                                                    </div>
                                                    <div class="form-check mt-1">
                                                        <input class="form-check-input" type="checkbox" id="flavor4" value="unchecked">
                                                        <label class="form-check-label" for="flavor4">Flavor 4</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid mt-1 mb-1">
                                                <button type="submit" class="btn btn-primary waves-effect waves-float waves-light" data-bs-dismiss="modal">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Select Flavors/Sides modal ends here-->

                    </section>
                    <!-- Menu Accordions end here -->

{{--                    EDIT MENU CATEGORY--}}
                        @include('inc.modals.edit_menu_category')

                        @include('inc.modals.add_menu_sub_category')

                    @endforeach

                @else
                    <div class="mx-auto text-center mt-4">
                        <button type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuCategoryModal">
                            <i data-feather="plus"></i> Add Menu Category
                        </button>
                    </div>

            @endif


        </div>
    </div>

    @include('inc.modals.add_menu_category')
@endsection

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <!-- Begin Page header-->
        <div class="content-header row">
            <div class="content-header-left col-md-5 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0">Manage Menus</h2>
                        <p class="restaurant-title"> {{ $res->name }}</p>
                    </div>
                </div>
            </div>


{{--            @if (count($categories) > 0)--}}
                <div class="content-header-right text-md-end col-md-7 col-12 d-md-block">
                    <div class="mb-1 breadcrumb-right">
                        <button type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#addMenuCategoryModal">
                            <i data-feather="plus"></i> Add Menu Category
                        </button>
                        <a href="{{ route('sides.index',$res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                            Add Sides
                        </a>
                        <a href="{{ route('flavors.index', $res->id) }}" type="button" class="btn btn-outline-primary waves-effect waves-float waves-light">
                            Add Flavors
                        </a>
                    </div>
                </div>
{{--            @endif--}}


        </div>
        <!-- End Page Header-->

        <menu_page :sides='@json($sides)' :flavors='@json($flavors)'
                   save_sides="{{ route('menu.save.sides') }}"
                   save_flavors="{{ route('menu.save.flavors') }}"
                   cat_url="{{ route('api.categories', $res->id) }}"
                   store_menu_url="{{ route('menu.store') }}"
                   edit_menu_url="{{ route('menu.store') }}"
                   store_category_url="{{ route('menu_cats.store') }}"
                   :cats='@json($categories)'
                   :res='@json($res)'
        ></menu_page>
    </div>
@endsection
