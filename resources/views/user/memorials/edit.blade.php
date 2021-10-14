@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Editing {{ $memorial->name }} </h2>
                    </div>
                    <p class="back-to-previous mt-1"> <a href="{{ route('cemeteries.index') }}"> <i data-feather="chevron-left"></i> Back to Previous</a> </p>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            Add/Edit your cemetery information, select a template and configure your payment settings.
                        </div>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-primary" role="alert">
                                <div class="alert-body">
                    <ul class="">
                        @foreach ($errors->all() as $error)
                            <li class="list-item">{{ $error }}</li>
                        @endforeach
                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Page form starts here -->
            <section id="nav-filled">
                <div class="row match-height">


                    <!-- Justified Tabs starts -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <!-- Tab panes -->
                                <div class="tab-content pt-1">
                                    <div class="tab-pane active" id="cemetery-info" role="tabpanel" aria-labelledby="cemetery-info-tab-justified">

                                        <form method="POST" action="{{ route('memorials.update', $memorial->id) }}"  class="cemetery-info-form">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="row g-1 mb-md-1">
                                                <div class="col-md-4">
                                                    <label class="form-label">First Name:</label>
                                                    <input required name="first_name" value="{{ old('first_name', $memorial->first_name) }}" type="text" class="form-control dt-input dt-full-name" data-column="1"/>
                                                    {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Last Name:</label>
                                                    <input required name="last_name" value="{{ old('last_name', $memorial->last_name) }}" type="text" class="form-control dt-input dt-full-name" data-column="1"/>
                                                    {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Middle Name:</label>
                                                    <input required name="middle_name" value="{{ old('middle_name', $memorial->middle_name) }}" type="text" class="form-control dt-input dt-full-name" data-column="1"/>
                                                    {!! $errors->first('middle_name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                            <div class="row g-1 pt-1">
                                                <div class="col-md-4">
                                                    <label class="form-label">Nickname:</label>
                                                    <input required value="{{ old('nickname', $memorial->nickname) }}" name="nickname" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('nickname', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Maiden Name:</label>
                                                    <input required value="{{ old('maiden_name', $memorial->maiden_name) }}" name="maiden_name" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('maiden_name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Gender:</label>
                                                    <select name="gender" class="form-control">
                                                        <option {{ $memorial->gender == 'male' ? 'selected' : '' }} value="male">Male</option>
                                                        <option {{ $memorial->gender == 'female' ? 'selected' : '' }} value="female">Female</option>
                                                    </select>
                                                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-md-1">
                                                    <label class="form-label">Birth day:</label>
                                                    <input required value="{{ old('birth_day', $memorial->birth_day) }}" name="birth_day" type="number" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('birth_day', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Birth Month:</label>
                                                    <select required name="birth_month" class="form-control">
                                                        @foreach($months as $item)
                                                            <option value="{{ $loop->index+1 }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('birth_month', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">Birth Year:</label>
                                                    <input required value="{{ old('birth_year', $memorial->birth_year) }}" name="birth_year" type="number" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('birth_year', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Birth Location:</label>
                                                    <input required value="{{ old('birth_location', $memorial->birth_location) }}" name="birth_location" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('birth_location', '<p class="help-block">:message</p>') !!}
                                                </div>


                                                <div class="col-md-1">
                                                    <label class="form-label">Death day:</label>
                                                    <input required value="{{ old('death_day', $memorial->death_day) }}" name="death_day" type="number" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('death_day', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Death Month:</label>
                                                    <select required name="death_month" class="form-control">
                                                        @foreach($months as $item)
                                                            <option value="{{ $loop->index+1 }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('death_day', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-1">
                                                    <label class="form-label">Death Year:</label>
                                                    <input required value="{{ old('death_year', $memorial->death_year) }}" name="death_year" type="number" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('death_year', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Death Location:</label>
                                                    <input required value="{{ old('death_location', $memorial->death_location) }}" name="death_location" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('death_location', '<p class="help-block">:message</p>') !!}
                                                </div>



                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="description">Bio Information </label>
                                                        <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Description">{{ old('bio', $memorial->bio) }}</textarea>
                                                        {!! $errors->first('bio', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-label">Select Cemetery :</label>
                                                    <select required name="cemetery_id" class="form-control">
                                                        @foreach($cemeteries as $item)
                                                            <option {{ $memorial->cemetery_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('cemetery_id', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-md-2">
                                                    <label class="form-label">Select Prefix :</label>
                                                    <select required name="prefix" class="form-control">
                                                        @foreach($prefix as $item)
                                                            <option {{ $memorial->prefix == $item ? 'selected' : '' }} value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('prefix', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Select Suffix :</label>
                                                    <select required name="suffix" class="form-control">
                                                        @foreach($sufix as $item)
                                                            <option {{ $memorial->sufix == $item ? 'selected' : '' }} value="{{ $item }}">{{ $item }}</option>
                                                        @endforeach
                                                    </select>
                                                    {!! $errors->first('suffix', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="form-label">Is Famous  :</label>
                                                    <select  required name="is_famous" class="form-control">
                                                        <option  {{ $memorial->is_famous == 0 ? 'selected' : '' }} value="0">No</option>
                                                        <option {{ $memorial->is_famous == 1 ? 'selected' : '' }} value="1">Yes</option>
                                                    </select>
                                                    {!! $errors->first('is_famous', '<p class="help-block">:message</p>') !!}
                                                </div>


                                            </div>
{{--                                            <div class="row g-1 pt-1">--}}
{{--                                                <div class="col-6">--}}
{{--                                                    <label class="form-label" for="description">Upload Cover Image </label>--}}
{{--                                                    @include('inc.image-upload',['field' => 'image','id' => 'image'])--}}
{{--                                                </div>--}}

{{--                                            </div>--}}
                                            <div class="row g-1 pt-1">

                                                <div class="col-12">
                                                    <div class="mt-2 mb-1">
                                                        <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-float waves-light" />
                                                    </div>
                                                </div>


                                            </div>
                                        </form>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Justified Tabs ends -->
                </div>
            </section>
            <!-- Page forms end here -->

        </div>
    </div>
@endsection
