@extends('layouts.frontend')

@section('content')
    <!-- wrapper -->
    <div id="wrapper" class="memorials">
        <!--  content  -->
        <div class="content">
            <!--  section  end-->
            <!--  section  -->
            <section class="parallax-sectio" style="padding: 0 5%" data-scrollax-parent="true">
                <div class="listsearch-maiwrap box-inside fl-wrap">
                    <div class="listsearch-header fl-wrap">
                        <h3 class="text-capitalize">{{ $user->name }} > Photos </h3>
                    </div>
                    <!-- listsearch-input-wrap  -->
                    <!-- listsearch-input-wrap end -->
                </div>
            </section>
            <!--  section  end-->
            <!--  section  -->
            <section class="gray-bg no-pading no-top-padding" id="sec1">
                <div class="col-list-wrap fh-col-list-wrap  left-list">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="listsearch-header fl-wrap">
                                    <h3>{{ count($photos) }} Photo(s) : </h3>
                                    <div class="listing-view-layout">
                                        <ul>
{{--                                            <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>--}}
                                            <li><a class="list active" href="#"><i class="fa fa-list-ul"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- list-main-wrap-->
                                <div class="list-main-wrap fl-wrap card-listing">

                                    <!-- listing-item end-->
                                    <!-- listing-item -->
                                    @foreach($photos as $item)
                                    <div class="listing-item list-layout">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="padding: 15px" src="{{ $item->path }}" alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">

                                            </div>
                                            <div class="geodir-category-content fl-wrap text-justify">

                                                <h3>{{ $item->name }}</h3>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end-->
                                    <div class="clearfix"></div>
                                @endforeach
                                    <!-- pagination-->

                                    @if (count($photos) < 1)
                                        <h3 style="font-size: 2em; margin-top: 50px">No Photo Found</h3>
                                    @endif


                                    <div class="pagination">
                                        {!! $photos->links('paginate.home') !!}
                                    </div>
                                </div>
                                <!-- list-main-wrap end-->
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!--  section  end-->
            <div class="limit-box fl-wrap"></div>



            @include('partials.foot')
        </div>
        <!-- content end-->
    </div>
    <!-- wrapper end -->
@endsection
