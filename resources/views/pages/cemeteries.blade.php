@extends('layouts.frontend')

@section('content')

    <!-- wrapper -->
    <div id="wrapper">
        <div class="content">
            <!-- Map -->
            <div class="map-container column-map right-pos-map">
                <div id="map-main"></div>
                <ul class="mapnavigation">
                    <li><a href="#" class="prevmap-nav">Prev</a></li>
                    <li><a href="#" class="nextmap-nav">Next</a></li>
                </ul>
                <div class="scrollContorl mapnavbtn" title="Enable Scrolling"><span><i class="fa fa-lock"></i></span></div>
            </div>
            <!-- Map end -->
            <!--col-list-wrap -->
            <div class="col-list-wrap left-list">
                <div class="listsearch-options fl-wrap" id="lisfw" >
                    <div class="container">
                        <div class="listsearch-header fl-wrap">
                            <h3>Cemeteries : <span>Map - VIew</span></h3>
                            <div class="listing-view-layout">
                                <ul>
                                    <li><a class="grid active" href="#"><i class="fa fa-th-large"></i></a></li>
                                    <li><a class="" href="{{ route('cemeteries.list') }}"><i class="fa fa-list-ul"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- listsearch-input-wrap  -->
                        <div class="listsearch-input-wrap fl-wrap">
                            <div class="listsearch-input-item">
                                <i class="mbri-key single-i"></i>
                                <input type="text" placeholder="Cemetery name" value=""/>
                            </div>
                            <div class="listsearch-input-text" id="autocomplete-container">
                                <label><i class="mbri-map-pin"></i> Enter Addres </label>
                                <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value=""/>
                                <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>
                            </div>

                            <button class="button fs-map-btn">Search</button>
                        </div>
                        <!-- listsearch-input-wrap end -->
                    </div>
                </div>
                <!-- list-main-wrap-->
                <div class="list-main-wrap fl-wrap card-listing">
                    <a class="custom-scroll-link back-to-filters btf-l" href="#lisfw"><i class="fa fa-angle-double-up"></i><span>Back to Filters</span></a>
                    <div class="container">
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
                                        <a class="listing-geodir-category" href="#">{{ $item->memorials_count }} Memorials</a>

                                        <h3><a href="{{ route('cemetery.show', $item->username) }}">{{ $item->name }}</a></h3>
                                        <p>{{ $item->short_desc }}.</p>


                                        <div class="geodir-category-options fl-wrap">

                                            <p>(100% Photographed)</p>

                                            <div class="geodir-category-location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $item->full_address }}</a></div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <!-- listing-item end-->
                        @endforeach
                    </div>
                    <a class="load-more-button" href="#">Load more <i class="fa fa-circle-o-notch"></i> </a>
                </div>
                <!-- list-main-wrap end-->
            </div>
            <!--col-list-wrap -->
            <div class="limit-box fl-wrap"></div>
            <!--section -->
            <section class="gradient-bg">
                <div class="cirle-bg">
                    <div class="bg" data-bg="images/bg/circle.png"></div>
                </div>
                <div class="container">
                    <div class="join-wrap fl-wrap">
                        <div class="row">
                            <div class="col-md-8">
                                <h3>Join our online community</h3>
                                <p>Grow your marketing and be happy with your online business</p>
                            </div>
                            <div class="col-md-4"><a href="#" class="join-wrap-btn modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>
                        </div>
                    </div>
                </div>
            </section>
            <!--section end -->
        </div>
        <!--content end -->
    </div>
    <!-- wrapper end -->

@endsection
