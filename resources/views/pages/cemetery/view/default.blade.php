@extends('layouts.frontend')

@section('content')
    <!-- wrapper -->
    <div id="wrapper">
        <!--  content  -->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section single-par list-single-section" data-scrollax-parent="true" id="sec1">
                <div class="bg par-elem "  data-bg="{{ $cemetery->image }}" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="bubble-bg"></div>
                <div class="list-single-header absolute-header fl-wrap">
                    <div class="container">
                        <div class="list-single-header-item">
                            <div class="list-single-header-item-opt fl-wrap">
                                <div class="list-single-header-cat fl-wrap">
                                    <a href="#memorial">{{ $cemetery->memorials_count }} Memorials added</a>
                                    <span>  Verified <i class="fa fa-check"></i></span>
                                </div>
                            </div>
                            <h2>{{ $cemetery->name }} <span> -  </span><a href="#">{{ $cemetery->address }}</a> </h2>
                            <span class="section-separator"></span>
                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">
{{--                                <span>({{ views($cemetery)->unique()->count() }} reviews)</span>--}}
                            </div>
                            <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="list-single-header-contacts fl-wrap">
                                        <ul>
                                            <li><i class="fa fa-location-arrow"></i><a  href="#">{{ $cemetery->country }}</a></li>
                                            <li><i class="fa fa-map-marker"></i><a  href="#">{{ $cemetery->address }}</a></li>
                                            <li><i class="fa fa-id-badge"></i><a  href="#">CEMETERY ID : {{ $cemetery->id }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="fl-wrap list-single-header-column">
                                        <div class="share-holder hid-share">
                                            <div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>
                                            <div class="share-container  isShare"></div>
                                        </div>
                                        <span class="viewed-counter"><i class="fa fa-eye"></i> Viewed -  {{ views($cemetery)->unique()->count() }} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  section end -->
            <div class="scroll-nav-wrapper fl-wrap">
                <div class="container">
                    <nav class="scroll-nav scroll-init">
                        <ul>
                            <li><a class="act-scrlink" href="#sec1">Cemetery Info</a></li>
                            <li><a href="#sec2">Details</a></li>
                            <li><a href="#sec3">Photos</a></li>
                            <li><a href="#memorial">Memorials ({{ $cemetery->memorials_count }})</a></li>
{{--                            <li><a href="#sec4">Map</a></li>--}}
                        </ul>
                    </nav>
                    <a href="#" class="save-btn"> <i class="fa fa-heart"></i> Add Favorite </a>
                </div>
            </div>
            <!--  section  -->
            <section class="gray-section no-top-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
{{--                                <div class="breadcrumbs gradient-bg  fl-wrap">--}}
{{--                                    <a href="#">Home</a><a href="#">Listings</a><span>Listing Single</span>--}}
{{--                                </div>--}}
{{--                                <div class="list-single-main-media fl-wrap">--}}
{{--                                    <img src="images/all/4.jpg" class="respimg" alt="">--}}
{{--                                    <a href="https://vimeo.com/70851162" class="promo-link gradient-bg image-popup"><i class="fa fa-play"></i><span>Promo Video</span></a>--}}
{{--                                </div>--}}
                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>About {{ $cemetery->name }} </h3>
                                    </div>
                                    <p>{{ $cemetery->description }}</p>

                                    <span class="fw-separator"></span>

{{--                                    <span class="fw-separator"></span>--}}

                                </div>
{{--                                <div class="accordion">--}}
{{--                                    <a class="toggle act-accordion" href="#"> Details option   <i class="fa fa-angle-down"></i></a>--}}
{{--                                    <div class="accordion-inner visible">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>--}}
{{--                                    </div>--}}
{{--                                    <a class="toggle" href="#"> Details option 2  <i class="fa fa-angle-down"></i></a>--}}
{{--                                    <div class="accordion-inner">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>--}}
{{--                                    </div>--}}
{{--                                    <a class="toggle" href="#"> Details option 3  <i class="fa fa-angle-down"></i></a>--}}
{{--                                    <div class="accordion-inner">--}}
{{--                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="list-single-facts fl-wrap gradient-bg">
                                    <!-- inline-facts -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <i class="fa fa-male"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ views($cemetery)->unique()->count() }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Total Views</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <i class="fa fa-heart"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ $cemetery->likes_count }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Total favorites</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                    <!-- inline-facts  -->
                                    <div class="inline-facts-wrap">
                                        <div class="inline-facts">
                                            <i class="fa fa-photo"></i>
                                            <div class="milestone-counter">
                                                <div class="stats animaper">
                                                    <div class="num" data-content="0" data-num="{{ count($cemetery->photos()) }}">0</div>
                                                </div>
                                            </div>
                                            <h6>Total Photos</h6>
                                        </div>
                                    </div>
                                    <!-- inline-facts end -->
                                </div>
                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Photos </h3>
                                    </div>
                                    <!-- gallery-items   -->
                                    <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                        <!-- 1 -->
                                        @foreach ($cemetery->photos() as $item)
                                            <div class="gallery-item">
                                                <div class="grid-item-holder">
                                                    <div class="box-item">
                                                        <img  src="{{ $item->path }}"   alt="{{ $item->name  }}">
                                                        <a href="{{ $item->path }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach

                                    </div>
                                    <!-- end gallery items -->
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                                <div class="list-single-main-item fl-wrap" id="memorial">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Memorials -  <span> {{ $cemetery->memorials_count }} </span></h3>
                                    </div>
                                    <div class="reviews-comments-wrap">
                                        <!-- list-main-wrap-->
                                        <div class="list-main-wrap fl-wrap card-listing">
                                            <!-- listing-item end-->
                                            <!-- listing-item -->
                                            @foreach($cemetery->memorials as $item)
                                                <div class="listing-item list-layout">
                                                    <article class="geodir-category-listing fl-wrap">
                                                        <div class="geodir-category-img">
                                                            <img style="padding: 15px; max-height: 200px" src="{{ $item->image }}" alt="">
                                                        </div>
                                                        <div class="geodir-category-content fl-wrap">

                                                            <h3><a href="listing-single.html">{{ $item->name }}</a></h3>
                                                            <p>{{ $item->age }}</p>

                                                        </div>
                                                        <div class="geodir-category-content fl-wrap text-justify">

                                                            <p> {{ $item->short_bio }}</p>
                                                        </div>
                                                    </article>
                                                </div>
                                                <!-- listing-item end-->
                                                <div class="clearfix"></div>
                                        @endforeach
                                        <!-- pagination-->
                                        </div>

                                </div>
                                </div>
                                <!-- list-single-main-item end -->

                            </div>
                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            <div class="box-widget-wrap">

                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Location / Address : </h3>
                                    </div>
                                    <div class="box-widget">
                                        <div class="map-container">
                                            <div id="singleMap" data-latitude="{{ $cemetery->latitude }}" data-longitude="{{ $cemetery->longitude }}" data-mapTitle="{{ $cemetery->name }} Location"></div>
                                        </div>
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-contacts list-item-widget-contacts">
                                                <ul>
                                                    <li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="#">{{ $cemetery->full_address }}</a></li>
{{--                                                    <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>--}}
{{--                                                    <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>--}}
                                                    <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">{{ $cemetery->website }}</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                @section('hide')
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Hosted by : </h3>
                                    </div>
                                    <div class="box-widget list-author-widget">
                                        <div class="list-author-widget-header shapes-bg-small  color-bg fl-wrap">
                                            <span class="list-author-widget-link"><a href="author-single.html">Alisa Noory</a></span>
                                            <img src="images/avatar/4.jpg" alt="">
                                        </div>
                                        <div class="box-widget-content">
                                            <div class="list-author-widget-text">
                                                <div class="list-author-widget-contacts">
                                                    <ul>
                                                        <li><span><i class="fa fa-phone"></i> Phone :</span> <a href="#">+7(123)987654</a></li>
                                                        <li><span><i class="fa fa-envelope-o"></i> Mail :</span> <a href="#">AlisaNoory@domain.com</a></li>
                                                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">themeforest.net</a></li>
                                                    </ul>
                                                </div>
                                                <a href="author-single.html" class="btn transparent-btn">View Profile <i class="fa fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endsection
                                <!--box-widget-item end -->
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Similar cemeteries : </h3>
                                    </div>
                                    <div class="box-widget widget-posts">
                                        @section('hide')
                                        <div class="box-widget-content">
                                            <ul>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/all/1.jpg"  alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Cafe "Lollipop"</a>
                                                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 21 Mar 2017 </span>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/all/2.jpg"  alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title=""> Apartment in the Center</a>
                                                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                                    </div>
                                                </li>
                                                <li class="clearfix">
                                                    <a href="#"  class="widget-posts-img"><img src="images/all/3.jpg"  alt=""></a>
                                                    <div class="widget-posts-descr">
                                                        <a href="#" title="">Event in City Mol</a>
                                                        <span class="widget-posts-date"><i class="fa fa-calendar-check-o"></i> 7 Mar 2017 </span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <a class="widget-posts-link" href="#">See All Listing<span><i class="fa fa-angle-right"></i></span></a>
                                        </div>
                                        @endsection
                                    </div>
                                </div>
                                <!--box-widget-item end -->
                            </div>
                        </div>
                        <!--box-widget-wrap end -->
                    </div>
                </div>
            </section>
            <!--  section end -->
            <div class="limit-box fl-wrap"></div>
            <!--  section  -->
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
            <!--  section  end-->
        </div>
        <!--  content end  -->
    </div>
    <!-- wrapper end -->
@endsection
