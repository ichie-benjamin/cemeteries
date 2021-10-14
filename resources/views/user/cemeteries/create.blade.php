@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Create A Cemetery</h2>
                    </div>
                    <p class="back-to-previous mt-1"> <a href="{{ route('dashboard') }}"> <i data-feather="chevron-left"></i> Back to Previous</a> </p>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            Add/Edit your cemetery information, select a template and configure cemetery.
                        </div>
                    </div>
                </div>

                @include('partials.errors')
            </div>

            <!-- Page form starts here -->
            <section id="nav-filled">
                <div class="row match-height">


                    <!-- Justified Tabs starts -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="cemetery-info-tab-justified" data-bs-toggle="tab" href="#cemetery-info" role="tab" aria-controls="cemetery-info" aria-selected="true">Cemetery Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="cemetery-template-tab-justified" data-bs-toggle="tab" href="#cemetery-template" role="tab" aria-controls="cemetery-template" aria-selected="false">Cemetery Template</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="payment-settings-tab-justified" data-bs-toggle="tab" href="#payment-settings" role="tab" aria-controls="payment-settings" aria-selected="true">Map Settings</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content pt-1">
                                    <div class="tab-pane active" id="cemetery-info" role="tabpanel" aria-labelledby="cemetery-info-tab-justified">

                                        <form method="POST" action="{{ route('cemeteries.store') }}"  class="cemetery-info-form">
                                            {{ csrf_field() }}
                                            <div class="row g-1 mb-md-1">
                                                <div class="col-md-8">
                                                    <label class="form-label">Cemetery Name:</label>
                                                    <input required name="name" value="{{ old('name') }}" type="text" class="form-control dt-input dt-full-name" data-column="1"/>
                                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Cemetery Username: </label>
                                                    <input required name="username" value="{{ old('username') }}" type="text" class="form-control dt-input dt-full-name @error('username') is-invalid @enderror" data-column="1"/>
                                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                                </div>
                                            </div>

                                            <div class="row g-1 pt-1">
                                                <div class="col-md-4">
                                                    <label class="form-label">Country:</label>
                                                    <input required value="{{ old('country') }}" name="country" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('country', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">State:</label>
                                                    <input required value="{{ old('state') }}" name="state" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('state', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">City:</label>
                                                    <input required value="{{ old('city') }}" name="city" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="form-label">Address:</label>
                                                    <input required value="{{ old('address') }}" name="address" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="description">Cemetery Info </label>
                                                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description">{{ old('name') }}</textarea>
                                                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>


                                                <div class="col-3">
                                                    <label class="form-label" for="description">Upload Logo </label>
                                                    @include('inc.image-upload',['field' => 'logo','id' => 'logo'])
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label" for="description">Upload Cover Image </label>
                                                    @include('inc.image-upload',['field' => 'image','id' => 'image'])
                                                </div>

                                                <div class="col-12">
                                                    <div class="mt-2 mb-1">
                                                        <input type="submit" value="Submit" class="btn btn-primary waves-effect waves-float waves-light" />
                                                    </div>
                                                </div>


                                            </div>
                                        </form>

                                        <div class="row">
{{--                                            <div class="col-md-3">--}}
{{--                                                <div class="upload-cemetery-logo">--}}
{{--                                                    <p> Upload Logo</p>--}}
{{--                                                    <form action="#" class="dropzone dropzone-area dz-clickable" id="dpz-multiple-files">--}}
{{--                                                        <div class="dz-message">Drop files here or click to upload.</div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="upload-cemetery-cover">--}}
{{--                                                    <p> Upload Cover Image</p>--}}
{{--                                                    <form action="#" class="dropzone dropzone-area dz-clickable" id="dpz-single-file">--}}
{{--                                                        <div class="dz-message">Drop files here or click to upload.</div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="cemetery-template" role="tabpanel" aria-labelledby="cemetery-template-tab-justified">
                                        <p>
                                            Coming soon...
                                        </p>
                                    </div>
                                    <div class="tab-pane" id="payment-settings" role="tabpanel" aria-labelledby="payment-settings-tab-justified">
                                        <h5 class="pb-1"> Configure payment options for customers </h5>
                                        <!-- Checkboxes start here -->
                                        <div class="form-check form-switch mb-1">
                                            <input type="checkbox" class="form-check-input" id="customSwitch1">
                                            <label class="form-check-label" for="customSwitch1"> Allow customers to send order notifications or request a server. </label>
                                        </div>
                                        <div class="form-check form-switch mb-1">
                                            <input type="checkbox" class="form-check-input" id="customSwitch2">
                                            <label class="form-check-label" for="customSwitch2"> Allow customers to scan and pay online through the menu. </label>
                                        </div>
                                        <!-- Checkboxes end here -->
                                        <div class="mt-2 mb-1">
                                            <button type="button" class="btn btn-primary waves-effect waves-float waves-light"> Save </button>
                                        </div>
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
