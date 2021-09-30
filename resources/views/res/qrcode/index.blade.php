@extends('layouts.res')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-5 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> QR Code Builder </h2>
                        <p class="restaurant-title"> {{ $res->name }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Generate and download your QR code. </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Row starts here -->

            <qr_builder :res='@json($qr)' upload_url="{{ route('api.post.image') }}"  url="{{ $res->url }}"></qr_builder>

            <!-- Row ends here -->

        </div>
    </div>
@endsection
