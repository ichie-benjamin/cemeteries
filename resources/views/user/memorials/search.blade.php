@extends('layouts.user')

@section('content')
    <div class="content-wrapper container-xxl p-0" id="app">
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-start mb-0"> Search for Cemetery </h2>
                    </div>
                </div>
            </div>


        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-primary" role="alert">
                        <div class="alert-body">
                            <p> Search within our dataset for a cemetery to add your memorials
                            </p>
                        </div>
                    </div>
                </div>

                @include('inc.alert')

            </div>

            <!--  Restaurant Cards row starts here -->
            <div class="row match-height">

                <Search type="search" url="{{ route('cemeteries.search') }}" placeholder="Start typing ......."></Search>

            </div>
            <!-- Select Cards Row ends here -->

        </div>
    </div>
@endsection
