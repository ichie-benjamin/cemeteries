
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($side)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-md-2 control-label">Description</label>
    <div class="col-md-10">
        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1" maxlength="1000">{{ old('description', optional($side)->description) }}</textarea>
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('restaurant_id') ? 'has-error' : '' }}">
    <label for="restaurant_id" class="col-md-2 control-label">Restaurant</label>
    <div class="col-md-10">
        <select class="form-control" id="restaurant_id" name="restaurant_id">
        	    <option value="" style="display: none;" {{ old('restaurant_id', optional($side)->restaurant_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select restaurant</option>
        	@foreach ($restaurants as $key => $restaurant)
			    <option value="{{ $key }}" {{ old('restaurant_id', optional($side)->restaurant_id) == $key ? 'selected' : '' }}>
			    	{{ $restaurant }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('restaurant_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('show_on_menu') ? 'has-error' : '' }}">
    <label for="show_on_menu" class="col-md-2 control-label">Show On Menu</label>
    <div class="col-md-10">
        <input class="form-control" name="show_on_menu" type="text" id="show_on_menu" value="{{ old('show_on_menu', optional($side)->show_on_menu) }}" minlength="1" placeholder="Enter show on menu here...">
        {!! $errors->first('show_on_menu', '<p class="help-block">:message</p>') !!}
    </div>
</div>

