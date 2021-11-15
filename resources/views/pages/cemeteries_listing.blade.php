@extends('layouts.frontend')

@section('content')

    <!-- wrapper -->
    <div id="wrapper" class="clisting">
        <!--  content  -->
        <div class="content">
            <!--  section  end-->
            <!--  section  -->
            <section class="parallax-section" data-scrollax-parent="true">
                <div class="bg par-elem "  data-bg="/images/slider2.jpeg" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title center-align">
                        <h2><span>Cemeteries - List View</span></h2>
                        <div class="breadcrumbs fl-wrap"><a href="#">Home</a><a href="#">Cemeteries</a></div>
                        <span class="section-separator"></span>
                    </div>
                </div>
            </section>
            <!--  section  end-->
            <!--  section  -->
            <section class="gray-bg no-pading no-top-padding" id="sec1">
                <div class="col-list-wrap fh-col-list-wrap  left-list">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="listsearch-maiwrap box-inside fl-wrap">
                                    <div class="listsearch-header fl-wrap">
                                        <h3><span>Listing Cemeteries</span></h3>
                                        <div class="listing-view-layout">
                                            <ul>
                                                <li><a class="" href="{{ route('cemeteries') }}"><i class="fa fa-th-large"></i></a></li>
                                                <li><a class="list active" href="#"><i class="fa fa-list-ul"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- listsearch-input-wrap  -->
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <div class="listsearch-input-item" style="width: 50%">
                                            <i class="mbri-key single-i"></i>
                                            <input type="text" placeholder="Cemetery name" value=""/>
                                        </div>
                                        <div class="listsearch-input-text" id="autocomplete-container" style="width: 50%">
{{--                                            <label><i class="mbri-map-pin"></i> Location</label>--}}
                                            <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value=""/>
{{--                                            <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>--}}
                                        </div>

                                        <div class="listsearch-input-item" style="width: 50%">
                                        <button class="button fs-map-btn mt-2">Search</button>
                                        </div>

                                    </div>
                                    <!-- listsearch-input-wrap end -->
                                </div>


                                <!-- list-main-wrap-->
                                <div class="list-main-wrap fl-wrap card-listing cemeteries">

                                    <!-- listing-item -->
                                    @foreach($cemeteries as $item)
                                    <div class="listing-item">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img src="{{ $item->image }}" alt="">
                                                <div class="overlay"></div>
                                                <div class="list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                                            </div>
                                            <div class="geodir-category-content fl-wrap">
                                                <a class="listing-geodir-category" href="#listing.html">{{ $item->memorials_count }} Memorials</a>

                                                <h3><a href="{{ route('cemetery.show', [$item->id, $item->username]) }}">{{ $item->name }}</a></h3>
                                                <p>{{ $item->short_desc }}</p>


                                                <div class="geodir-category-options fl-wrap">

                                                    <p>(100% Photographed)</p>

                                                    <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->full_address }}</a></div>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end-->
                                    @endforeach

                                    <div class="clearfix"></div>

                                    <div class="mt-3 pt-2">
                                    {!! $cemeteries->links() !!}
                                    </div>

{{--                                    <div class="pagination">--}}
{{--                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>--}}
{{--                                        <a href="#" class="blog-page transition">1</a>--}}
{{--                                        <a href="#" class="blog-page current-page transition">2</a>--}}
{{--                                        <a href="#" class="blog-page transition">3</a>--}}
{{--                                        <a href="#" class="blog-page transition">4</a>--}}
{{--                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>--}}
{{--                                    </div>--}}
                                </div>
                                <!-- list-main-wrap end-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  section  end-->
            <div class="limit-box fl-wrap"></div>
            <!--  section  -->


{{--            FOOT--}}
        @include('partials.foot')

            <!--  section  end-->
        </div>
        <!-- content end-->
    </div>
    <!-- wrapper end -->

@endsection
