<div id="menuItem{{$item->id}}" class="accordion-collapse collapse" aria-labelledby="headingMarginOne" data-bs-parent="#accordionMargin" style="">
    <div class="accordion-body">

        @if (count($item->menus) < 1)
            <div class="row">
                <div class="text-center">
                    <h4>No menu items added yet</h4>
                </div>
            </div>
        @endif

        @foreach($item->menus as $menu)
        <div class="row">
            <div class="col-md-9">
                <h5 class="mt-1">
                    <i data-feather="shuffle"></i> &nbsp; {{ $menu->name }}
                </h5>
            </div>
            <div class="col-md-3 mt-1 mb-1 accordion-buttons">
                <a type="button" class="btn btn-primary blue-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#editMenuItemModal{{ $menu->id }}">
                    <i data-feather="edit"></i>
                </a>
                <a type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#selectFlavorsandSidesModal">
                    <i data-feather="layers"></i>
                </a>
                <a type="button" class="btn btn-primary red-bg waves-effect waves-float waves-light" data-bs-toggle="modal" data-bs-target="#deleteMenuItemModal{{$menu->id}}">
                    <i data-feather="trash-2"></i>
                </a>
                @include('inc.modals.deletes.menu_item')
            </div>
        </div>

            @include('inc.modals.edit_menu_item')
        @endforeach
    </div>
</div>
