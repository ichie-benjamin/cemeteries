
<div class="form-group {{ $errors->has('user_id') ? 'has-error' : '' }}">
    <label for="user_id" class="col-md-2 control-label">User</label>
    <div class="col-md-10">
        <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($cementery)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($cementery)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-md-2 control-label">Name</label>
    <div class="col-md-10">
        <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($cementery)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
    <label for="city" class="col-md-2 control-label">City</label>
    <div class="col-md-10">
        <input class="form-control" name="city" type="text" id="city" value="{{ old('city', optional($cementery)->city) }}" minlength="1" placeholder="Enter city here...">
        {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
    <label for="state" class="col-md-2 control-label">State</label>
    <div class="col-md-10">
        <input class="form-control" name="state" type="text" id="state" value="{{ old('state', optional($cementery)->state) }}" minlength="1" placeholder="Enter state here...">
        {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label for="country" class="col-md-2 control-label">Country</label>
    <div class="col-md-10">
        <input class="form-control" name="country" type="number" id="country" value="{{ old('country', optional($cementery)->country) }}" placeholder="Enter country here...">
        {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
    <label for="address" class="col-md-2 control-label">Address</label>
    <div class="col-md-10">
        <input class="form-control" name="address" type="text" id="address" value="{{ old('address', optional($cementery)->address) }}" minlength="1" placeholder="Enter address here...">
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('longitute') ? 'has-error' : '' }}">
    <label for="longitute" class="col-md-2 control-label">Longitute</label>
    <div class="col-md-10">
        <input class="form-control" name="longitute" type="text" id="longitute" value="{{ old('longitute', optional($cementery)->longitute) }}" minlength="1" placeholder="Enter longitute here...">
        {!! $errors->first('longitute', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
    <label for="latitude" class="col-md-2 control-label">Latitude</label>
    <div class="col-md-10">
        <input class="form-control" name="latitude" type="text" id="latitude" value="{{ old('latitude', optional($cementery)->latitude) }}" minlength="1" placeholder="Enter latitude here...">
        {!! $errors->first('latitude', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
    <label for="status" class="col-md-2 control-label">Status</label>
    <div class="col-md-10">
        <input class="form-control" name="status" type="text" id="status" value="{{ old('status', optional($cementery)->status) }}" minlength="1" placeholder="Enter status here...">
        {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('approved') ? 'has-error' : '' }}">
    <label for="approved" class="col-md-2 control-label">Approved</label>
    <div class="col-md-10">
        <input class="form-control" name="approved" type="text" id="approved" value="{{ old('approved', optional($cementery)->approved) }}" minlength="1" placeholder="Enter approved here...">
        {!! $errors->first('approved', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('municipalities') ? 'has-error' : '' }}">
    <label for="municipalities" class="col-md-2 control-label">Municipalities</label>
    <div class="col-md-10">
        <input class="form-control" name="municipalities" type="text" id="municipalities" value="{{ old('municipalities', optional($cementery)->municipalities) }}" minlength="1" placeholder="Enter municipalities here...">
        {!! $errors->first('municipalities', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
    <label for="website" class="col-md-2 control-label">Website</label>
    <div class="col-md-10">
        <input class="form-control" name="website" type="text" id="website" value="{{ old('website', optional($cementery)->website) }}" minlength="1" placeholder="Enter website here...">
        {!! $errors->first('website', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    <label for="image" class="col-md-2 control-label">Image</label>
    <div class="col-md-10">
        <input class="form-control" name="image" type="number" id="image" value="{{ old('image', optional($cementery)->image) }}" placeholder="Enter image here...">
        {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
    </div>
</div>

