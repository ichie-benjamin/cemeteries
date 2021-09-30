<!-- Add menu flavor item modal starts here-->
<div class="modal fade" id="addMenuFlavorsModal" tabindex="-1" aria-labelledby="addMenuMenuFlavorsModalTitle" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenuFlavorsModalTitle"> Add New Menu Flavor </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('flavor.store') }}"  class="restaurant-info-form">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ $res->id }}" name="restaurant_id">
                <div class="mb-1">
                    <label class="form-label" for="basicInput">Menu Flavor Item name</label>
                    <input type="text" value="{{ old('name') }}" name="name" class="form-control" id="basicInput" placeholder="Flavor Item name" required>
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>

                <div class="mb-1">
                    <label class="form-label" for="desc">Menu Flavor Item Description (Optional)</label>
                    <textarea name="description" class="form-control" id="desc" rows="3" placeholder="Description"></textarea>
                </div>
                <div class="mb-1">
                    <label class="form-label" for="price">Flavor Item Price</label>
                    <input type="number" name="price" step="any" value="{{ old('price') }}" class="form-control" id="price" placeholder="Flavor Item Price" required>
                    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
                </div>
                <div class="form-check form-switch mb-1">
                    <input type="checkbox" name="show_on_menu" value="1" checked class="form-check-input" id="flavor">
                    <label class="form-check-label" for="flavor"> Make this Item available on the menu</label>
                </div>

                <div class="d-grid mb-1">
                    <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Add menu flavor item modal ends here-->
