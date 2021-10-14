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

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> photos attached to memorials. </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->
            <div class="row match-height">
                @foreach($photos as $item)
                <div class="col-md-4 col-lg-3">
                        <div class="card img-card" style='background: url("{{ $item->path }}"); height : 200px'>
                            <div class="card-body">
                                <p class="">{{ $item->name }}</p>
                                <p class="text-muted">{{ $item->created_at }}</p>
{{--                                <a href="#" class="btn btn-outline-primary">Go somewhere</a>--}}
                            </div>
                        </div>
                    </div>
                @endforeach


                    @if(count($photos) < 1)
                        <div class="col-12 text-center" style="margin-top: 50px">
                            <h3>No photos found, pls add photos</h3>
                        </div>
                    @endif
            </div>

            <!-- Select Cards Row ends here -->

        </div>
    </div>


@endsection
