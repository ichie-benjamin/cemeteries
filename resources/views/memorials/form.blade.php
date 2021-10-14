
<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
    <label for="first_name" class="col-md-2 control-label">First Name</label>
    <div class="col-md-10">
        <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old('first_name', optional($memorial)->first_name) }}" minlength="1" placeholder="Enter first name here...">
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
    <label for="last_name" class="col-md-2 control-label">Last Name</label>
    <div class="col-md-10">
        <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old('last_name', optional($memorial)->last_name) }}" minlength="1" placeholder="Enter last name here...">
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
    <label for="middle_name" class="col-md-2 control-label">Middle Name</label>
    <div class="col-md-10">
        <input class="form-control" name="middle_name" type="text" id="middle_name" value="{{ old('middle_name', optional($memorial)->middle_name) }}" minlength="1" placeholder="Enter middle name here...">
        {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nickname') ? 'has-error' : '' }}">
    <label for="nickname" class="col-md-2 control-label">Nickname</label>
    <div class="col-md-10">
        <input class="form-control" name="nickname" type="text" id="nickname" value="{{ old('nickname', optional($memorial)->nickname) }}" minlength="1" placeholder="Enter nickname here...">
        {!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('maiden_name') ? 'has-error' : '' }}">
    <label for="maiden_name" class="col-md-2 control-label">Maiden Name</label>
    <div class="col-md-10">
        <input class="form-control" name="maiden_name" type="text" id="maiden_name" value="{{ old('maiden_name', optional($memorial)->maiden_name) }}" minlength="1" placeholder="Enter maiden name here...">
        {!! $errors->first('maiden_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
    <label for="gender" class="col-md-2 control-label">Gender</label>
    <div class="col-md-10">
        <input class="form-control" name="gender" type="text" id="gender" value="{{ old('gender', optional($memorial)->gender) }}" minlength="1" placeholder="Enter gender here...">
        {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('birth_day') ? 'has-error' : '' }}">
    <label for="birth_day" class="col-md-2 control-label">Birth Day</label>
    <div class="col-md-10">
        <input class="form-control" name="birth_day" type="text" id="birth_day" value="{{ old('birth_day', optional($memorial)->birth_day) }}" minlength="1" placeholder="Enter birth day here...">
        {!! $errors->first('birth_day', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('birth_month') ? 'has-error' : '' }}">
    <label for="birth_month" class="col-md-2 control-label">Birth Month</label>
    <div class="col-md-10">
        <input class="form-control" name="birth_month" type="text" id="birth_month" value="{{ old('birth_month', optional($memorial)->birth_month) }}" minlength="1" placeholder="Enter birth month here...">
        {!! $errors->first('birth_month', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('birth_year') ? 'has-error' : '' }}">
    <label for="birth_year" class="col-md-2 control-label">Birth Year</label>
    <div class="col-md-10">
        <input class="form-control" name="birth_year" type="text" id="birth_year" value="{{ old('birth_year', optional($memorial)->birth_year) }}" minlength="1" placeholder="Enter birth year here...">
        {!! $errors->first('birth_year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('death_day') ? 'has-error' : '' }}">
    <label for="death_day" class="col-md-2 control-label">Death Day</label>
    <div class="col-md-10">
        <input class="form-control" name="death_day" type="text" id="death_day" value="{{ old('death_day', optional($memorial)->death_day) }}" minlength="1" placeholder="Enter death day here...">
        {!! $errors->first('death_day', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('death_month') ? 'has-error' : '' }}">
    <label for="death_month" class="col-md-2 control-label">Death Month</label>
    <div class="col-md-10">
        <input class="form-control" name="death_month" type="text" id="death_month" value="{{ old('death_month', optional($memorial)->death_month) }}" minlength="1" placeholder="Enter death month here...">
        {!! $errors->first('death_month', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('death_year') ? 'has-error' : '' }}">
    <label for="death_year" class="col-md-2 control-label">Death Year</label>
    <div class="col-md-10">
        <input class="form-control" name="death_year" type="text" id="death_year" value="{{ old('death_year', optional($memorial)->death_year) }}" minlength="1" placeholder="Enter death year here...">
        {!! $errors->first('death_year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('birth_location') ? 'has-error' : '' }}">
    <label for="birth_location" class="col-md-2 control-label">Birth Location</label>
    <div class="col-md-10">
        <input class="form-control" name="birth_location" type="text" id="birth_location" value="{{ old('birth_location', optional($memorial)->birth_location) }}" minlength="1" placeholder="Enter birth location here...">
        {!! $errors->first('birth_location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('death_location') ? 'has-error' : '' }}">
    <label for="death_location" class="col-md-2 control-label">Death Location</label>
    <div class="col-md-10">
        <input class="form-control" name="death_location" type="text" id="death_location" value="{{ old('death_location', optional($memorial)->death_location) }}" minlength="1" placeholder="Enter death location here...">
        {!! $errors->first('death_location', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('bio') ? 'has-error' : '' }}">
    <label for="bio" class="col-md-2 control-label">Bio</label>
    <div class="col-md-10">
        <input class="form-control" name="bio" type="text" id="bio" value="{{ old('bio', optional($memorial)->bio) }}" minlength="1" placeholder="Enter bio here...">
        {!! $errors->first('bio', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('prefix') ? 'has-error' : '' }}">
    <label for="prefix" class="col-md-2 control-label">Prefix</label>
    <div class="col-md-10">
        <input class="form-control" name="prefix" type="text" id="prefix" value="{{ old('prefix', optional($memorial)->prefix) }}" minlength="1" placeholder="Enter prefix here...">
        {!! $errors->first('prefix', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('suffix') ? 'has-error' : '' }}">
    <label for="suffix" class="col-md-2 control-label">Suffix</label>
    <div class="col-md-10">
        <input class="form-control" name="suffix" type="text" id="suffix" value="{{ old('suffix', optional($memorial)->suffix) }}" minlength="1" placeholder="Enter suffix here...">
        {!! $errors->first('suffix', '<p class="help-block">:message</p>') !!}
    </div>
</div>

