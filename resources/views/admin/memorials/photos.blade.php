@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Manage Photos </h2>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-end col-md-8 col-12 d-md-block">
                <div class="mb-1 breadcrumb-right">
                    <a  data-bs-toggle="modal" data-bs-target="#addPhoto" type="button" class="btn btn-primary green-bg waves-effect waves-float waves-light">
                        <i data-feather="plus"></i> Add Photo
                    </a>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Manage individual  memorial photos, delete any wrong photo. </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->
            <div class="row match-height">
                @foreach($photos as $item)
                <div class="col-md-4 col-lg-3">
                        <div class="card">
                            <img class="card-img-top" style="max-height: 400px" src="{{ $item->path }}" alt="Card image cap" />
                            <div class="card-body">
                                <p class="card-title">{{ $item->name }}</p>
{{--                                <a href="#" class="btn btn-outline-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach


                    @if(count($photos) < 1)
                        <div class="col-12 text-center" style="margin-top: 50px">
                            <h3>No Memorial photos found, pls add photos</h3>
                        </div>
                    @endif
            </div>

            <!-- Select Cards Row ends here -->

        </div>
    </div>


    <!-- Add menu item modal starts here-->
    <div class="modal fade" id="addPhoto" tabindex="-1" aria-labelledby="addPhoto" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuItemModalTitle"> Add New Memorial Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('memorials.photo.store') }}">
                        {{ csrf_field() }}
                        <input name="memorial_id" value="{{ $memorial->id }}" type="hidden" />
                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Add caption</label>
                            <input name="name" value="{{ old('name', $memorial->name ) }}" type="text" class="form-control" id="basicInput" placeholder="photo name" required>
                        </div>

                        <div class="mb-1">
                            <label class="form-label" for="basicInput">Photo</label>
                            @include('inc.image-upload',['field' => 'image','id' => 'image'])
                        </div>

                        <div class="mb-1">
                          <input type="radio" name="type" value="grave" class="frm-control" /> Grave
                          <input type="radio" name="type" value="person" class="fom-control" /> Person
                          <input type="radio" name="type" value="family" class="" /> Family
                          <input type="radio" name="type" value="other" class="" /> Other
                        </div>

                        <div class="mb-1">
                            <h3>General photo guidelines:</h3>
                            <ul>
                                <li>
                                    Photos larger than 8.0 MB will be optimized and reduced.
                                </li>
                                <li>Each contributor can upload a maximum of 5 photos for a memorial.</li>
                                <li>A memorial can have a maximum of 20 photos from all contributors.</li>
                                <li>The sponsor of a memorial may add an additional 10 photos (for a total of 30 on the memorial).</li>
                                <li>Include gps location with grave photos where possible.</li>
                                <li>No animated GIFs, photos with additional graphics (borders, embellishments.)</li>
                                <li>No post-mortem photos.</li>
                            </ul>
                        </div>


                        <div class="d-grid mb-1">
                            <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Add menu item modal ends here-->

@endsection
