@extends('layouts.res')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Editing {{ $res->name }} </h2>
                    </div>
                    <p class="back-to-previous mt-1"> <a href="{{ route('restaurants.index') }}"> <i data-feather="chevron-left"></i> Back to Previous</a> </p>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            Add/Edit your restaurant information, select a template and configure your payment settings.
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
                                <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="restaurant-info-tab-justified" data-bs-toggle="tab" href="#restaurant-info" role="tab" aria-controls="restaurant-info" aria-selected="true">Restaurant Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="restaurant-template-tab-justified" data-bs-toggle="tab" href="#restaurant-template" role="tab" aria-controls="restaurant-template" aria-selected="false">Restaurant Template</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="payment-settings-tab-justified" data-bs-toggle="tab" href="#payment-settings" role="tab" aria-controls="payment-settings" aria-selected="true">Payment Settings</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content pt-1">
                                    <div class="tab-pane active" id="restaurant-info" role="tabpanel" aria-labelledby="restaurant-info-tab-justified">

                                        <form method="POST" action="{{ route('restaurants.update', $res->id) }}"   class="restaurant-info-form">
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="PUT">
                                            <div class="row g-1 mb-md-1">
                                                <div class="col-md-8">
                                                    <label class="form-label">Restaurant Name:</label>
                                                    <input required name="name" value="{{ old('name', $res->name) }}" type="text" class="form-control dt-input dt-full-name " data-column="1"/>
                                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-md-4">
                                                    <label class="form-label">Restaurant Username:</label>
                                                    <input required name="username" disabled value="{{ old('username', $res->username) }}" type="text" class="form-control dt-input dt-full-name" data-column="1"/>
                                                    {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
                                                </div>

                                            </div>

                                            <div class="row g-1 pt-1">
                                                <div class="col-md-8">
                                                    <label class="form-label">Restaurant Address:</label>
                                                    <input required value="{{ old('address', $res->address) }}" name="address" type="text" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Restaurant Phone Number:</label>
                                                    <input required name="phone" value="{{ old('phone', $res->phone) }}" type="tel" class="form-control dt-input" data-column="4" placeholder="" data-column-index="3"/>
                                                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                                                </div>

                                                <div class="col-12">
                                                    <div class="mb-1">
                                                        <label class="form-label" for="description">Restaurant Description </label>
                                                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description">{{ old('description', $res->description) }}</textarea>
                                                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}

                                                    </div>

                                                </div>

                                                <div class="col-3">
                                                    <label class="form-label" for="description">Upload Logo </label>
                                                    @include('inc.image-upload',['field' => 'logo','id' => 'logo','image' => $res->logo])
                                                </div>

                                                <div class="col-6">
                                                    <label class="form-label" for="description">Upload Cover Image </label>
                                                    @include('inc.image-upload',['field' => 'cover_img','id' => 'cover_img', 'image' => $res->cover_img])
                                                </div>

                                                <div class="col-12">
                                                    <div class="">
                                                        <input type="submit" value="Update" class="btn btn-primary waves-effect waves-float waves-light" />
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">
{{--                                            <div class="col-md-3">--}}
{{--                                                <div class="upload-restaurant-logo">--}}
{{--                                                    <p> Upload Logo</p>--}}
{{--                                                    <form action="#" class="dropzone dropzone-area dz-clickable" id="dpz-multiple-files">--}}
{{--                                                        <div class="dz-message">Drop files here or click to upload.</div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-md-6">--}}
{{--                                                <div class="upload-restaurant-cover">--}}
{{--                                                    <p> Upload Cover Image</p>--}}
{{--                                                    <form action="#" class="dropzone dropzone-area dz-clickable" id="dpz-single-file">--}}
{{--                                                        <div class="dz-message">Drop files here or click to upload.</div>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>

                                    </div>
                                    <div class="tab-pane" id="restaurant-template" role="tabpanel" aria-labelledby="restaurant-template-tab-justified">
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
