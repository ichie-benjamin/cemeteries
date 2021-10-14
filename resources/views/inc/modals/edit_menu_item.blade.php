<!-- Add menu item modal starts here-->
<div class="modal fade" id="editMenuItemModal{{ $menu->id }}" tabindex="-1" aria-labelledby="addMenuMenuItemModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuItemModalTitle"> Editing {{ $menu->name }} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('menu.update', $menu->id) }}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}
                    <input name="menu_category_id" value="{{ $item->id }}" type="hidden" />
                <div class="mb-1">
                    <label class="form-label" for="basicInput">Menu Item name</label>
                    <input name="name" value="{{ old('old', $menu->name) }}" type="text" class="form-control" id="basicInput" placeholder="Item name" required>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="exampleFormControlTextarea1">Menu Item Description (Optional)</label>
                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Description">{{ $menu->description }}</textarea>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="basicInput">Item Price</label>
                    <input name="price" value="{{ $menu->price }}" type="number" step="any" class="form-control" id="basicInput" placeholder="Item Price" required>
                </div>
                <div class="form-check form-switch mb-1">
                    <input name="available_on_menu" type="checkbox" {{ $menu->available_on_menu ? 'checked' : '' }}  class="form-check-input" id="customSwitch1">
                    <label class="form-check-label" for="customSwitch1"> Make this Item available on the menu</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input {{ $menu->pay_tru_menu ? 'checked' : '' }} name="pay_tru_menu" type="checkbox" class="form-check-input" id="customSwitch2">
                    <label class="form-check-label" for="customSwitch2"> Customers can pay for this item through the menu</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input {{ $menu->send_order_notification ? 'checked' : '' }} name="send_order_notification" type="checkbox" class="form-check-input" id="customSwitch3">
                    <label class="form-check-label" for="customSwitch3">Customers can send order notifications only</label>
                </div>
                <div class="form-check form-switch mb-1">
                    <input {{ $menu->cant_order ? 'checked' : '' }} name="cant_order" type="checkbox" class="form-check-input" id="customSwitch4">
                    <label class="form-check-label" for="customSwitch4"> Customers can only view item (no ordering/paying)</label>
                </div>


                <div class="d-grid mb-1">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add menu item modal ends here-->
