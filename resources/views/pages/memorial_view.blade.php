@extends('layouts.frontend')

@section('content')
    <!-- wrapper -->
    <div id="wrapper " class="memo_view">
        <!--  content  -->
        <div class="content">
            <!--  section  -->
            <section class="parallax-section single-par list-single-section" data-scrollax-parent="true" id="sec1">
                <div class="bg par-elem "  data-bg="/images/bg/17.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="bubble-bg"></div>
                <div class="list-single-header absolute-header fl-wrap">
                    <div class="container">
                        <img style="height: 200px" src="{{ $memorial->image }}" />
                        <div class="list-single-header-item">
                            <h2 class="text-capitalize">{{ $memorial->name }}<span> - Posted By </span><a class="text-capitalize" href="#">{{ optional($memorial->user)->name }}</a> </h2>
{{--                            <span class="section-separator"></span>--}}
{{--                            <div class="listing-rating card-popup-rainingvis" data-starrating2="5">--}}
{{--                                <span>(11 reviews)</span>--}}
{{--                            </div>--}}
{{--                            <div class="list-post-counter single-list-post-counter"><span>4</span><i class="fa fa-heart"></i></div>--}}
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="list-single-header-contacts fl-wrap">
                                        <ul>
                                            <li><i class="fa fa-map-marker"></i><a  href="#">BIRTH : {{ $memorial->birth_year }}
                                                    [{{ $memorial->birth_location }}]
                                                </a></li>
                                            <br />
                                            <br />
                                            <li><i class="fa fa-map-marker"></i><a  href="#">DEATH : {{ $memorial->death_year }} (Aged {{ $memorial->death_year - $memorial->birth_year }} yrs)
                                                [{{ $memorial->death_location }}]
                                                </a></li>


                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="fl-wrap list-single-header-column">
                                        <div class="share-holder hid-share">
                                            <div class="showshare"><span>Share </span><i class="fa fa-share"></i></div>
                                            <div class="share-container  isShare"></div>
                                        </div>
                                        <span class="viewed-counter"><i class="fa fa-plus"></i> SAVE TO </span>
                                        <a class="custom-scroll-link" href="#sec5"><i class="fa fa-edit"></i>SUGGEST EDIT</a>
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
{{--                            <li><a class="act-scrlink" href="#sec1">Top</a></li>--}}
                            <li><a href="#sec2">Details</a></li>
                            <li><a href="#sec3">Photos ({{ $memorial->photos_count }})</a></li>
                            <li><a href="#sec4">Flowers</a></li>
                        </ul>
                    </nav>
                    <a href="#" class=" save-btn book-btn"> <i class="fa fa-heart"></i> ADD PHOTOS </a>
{{--                    <button class="save-btn  color-bg flat-btn book-btn">Book Now<i class="fa fa-angle-right"></i></button>--}}
                </div>
            </div>
            <!--  section  -->
            <section class="gray-section no-top-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="list-single-main-wrapper fl-wrap" id="sec2">
                                <div class="breadcrumbs gradient-bg  fl-wrap"><a href="#">Home</a><a href="#">Listings</a><span>Listing Single</span></div>

                                <div class="list-single-main-item fl-wrap">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>{{ $memorial->name }} Bio</h3>
                                    </div>
                                    <p>{!! $memorial->bio !!}</p>

                                    <span class="fw-separator"></span>

                                </div>

                                <div class="list-single-main-item fl-wrap" id="sec3">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Photos ({{ $memorial->photos_count }})</h3>
                                    </div>
                                    <!-- gallery-items   -->
                                    <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                        <!-- 1 -->
                                        @foreach ($memorial->photos as $item)
                                            <div class="gallery-item">
                                                <div class="grid-item-holder">
                                                    <div class="box-item">
                                                        <img  src="{{ $item->path }}"   alt=""{{ $item->name }}>
                                                        <a href="{{ $item->path }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                    </div>
                                                </div>
                                                <p>{{ $item->name }}</p>
                                            </div>
                                    @endforeach
                                        @if (count($memorial->photos) < 1)
                                            <h2>No photo added yet</h2>
                                        @endif
                                        <!-- 1 end -->
                                        <!-- 2 -->
                                    </div>
                                    <!-- end gallery items -->
                                </div>
                                <div class="list-single-main-item fl-wrap" id="sec4">
                                    <div class="list-single-main-item-title fl-wrap">
                                        <h3>Flowers ({{ $memorial->photos_count }})</h3>
                                    </div>
                                    <!-- gallery-items   -->
                                    <div class="gallery-items grid-small-pad  list-single-gallery three-coulms lightgallery">
                                        <!-- 1 -->
                                        @foreach ($memorial->photos as $item)
                                            <div class="gallery-item">
                                                <div class="grid-item-holder">
                                                    <div class="box-item">
                                                        <img  src="{{ $item->path }}"   alt="{{ $item->name }}">
                                                        <a href="{{ $item->path }}" class="gal-link popup-image"><i class="fa fa-search"  ></i></a>
                                                    </div>
                                                    <p>{{ $item->name }}</p>
                                                </div>
                                            </div>
                                    @endforeach
                                        @if (count($memorial->photos) < 1)
                                            <h2>No flower added yet</h2>
                                        @endif
                                        <!-- 1 end -->
                                        <!-- 2 -->
                                    </div>
                                    <!-- end gallery items -->
                                </div>
                                <!-- list-single-main-item end -->
                                <!-- list-single-main-item -->
                            </div>
                        </div>
                        <!--box-widget-wrap -->
                        <div class="col-md-4">
                            <div class="box-widget-wrap">
                                <!--box-widget-item -->
                                <div class="box-widget-item fl-wrap">
                                    <div class="box-widget-item-header">
                                        <h3>Memorial Details : </h3>
                                    </div>
                                    <div class="box-widget opening-hours">
                                        <div class="box-widget-content">
                                            <ul>
                                                <li><span class="opening-hours-day">BIRTH  </span><span class="opening-hours-time">{{ $memorial->birth_year }}
                                                    <br />
                                                        {{ $memorial->birth_location }}
                                                    </span></li>
                                                <li><span class="opening-hours-day">DEATH </span><span class="opening-hours-time">{{ $memorial->death_year }}
                                                     (Aged {{ $memorial->death_year - $memorial->birth_year }} yrs) <br />
                                                        {{ $memorial->death_location }}
                                                    </span></li>
                                                <li><span class="opening-hours-day">MEMORIAL ID </span><span class="opening-hours-time">{{ $memorial->mem_id }}
                                                    </span></li>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--box-widget-item end -->

                                <!--box-widget-item -->
                                @if ($memorial->cemetery)
                                    <div class="box-widget-item fl-wrap">
                                        <div class="box-widget-item-header">
                                            <h3>Cemetery Location : </h3>
                                        </div>
                                        <div class="box-widget">
                                            <div class="map-container">
                                                <div id="singleMap" data-latitude="{{ $memorial->cemetery->latitude }}" data-longitude="{{ $memorial->cemetery->longitude }}" data-mapTitle="Out Location"></div>
                                            </div>
                                            <div class="box-widget-content">
                                                <div class="list-author-widget-contacts list-item-widget-contacts">
                                                    <ul>
                                                        <li><span><i class="fa fa-home"></i> Cemetery :</span> <a href="#">{{ optional($memorial->cemetery)->name }}</a></li>
                                                        <li><span><i class="fa fa-map-marker"></i> Address :</span> <a href="#">{{ optional($memorial->cemetery)->address }}</a></li>
                                                        <li><span><i class="fa fa-globe"></i> Website :</span> <a href="#">{{ optional($memorial->cemetery)->website }}</a></li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!--box-widget-item end -->
                                @endif


                            </div>
                        </div>
                        <!--box-widget-wrap end -->
                    </div>
                </div>
            </section>
            <!--  section end -->
            <div class="limit-box fl-wrap"></div>

        </div>
        <!--  content end  -->


    </div>
    <!-- wrapper end -->

    <div class="booking-modal-wrap">
        <div class="booking-modal-container">
            <div class="booking-modal-content fl-wrap">
                <div class="booking-modal-info">
                    <div class="booking-modal-close color-bg"><i class="fa fa-times" aria-hidden="true"></i></div>
                    <div class="bg"  data-bg="/images/bg/2.jpg" ></div>
                    <div class="overlay"></div>
                    <div class="booking-modal-info_content fl-wrap">
                        <h4>Upload photos to this memorial</h4>
                        <ul>
                        </ul>
                    </div>
                </div>
                <div class="bookiing-form-wrap">
                    <div class="list-single-main-item fl-wrap hidden-section tr-sec">
                        <div class="profile-edit-container">
                            <div class="custom-for">
                                <form method="POST" action="{{ route('memorials.photo.store') }}">
                                    <div class="row">
                                        {{ csrf_field() }}
                                        <input name="memorial_id" value="{{ $memorial->id }}" type="hidden" />
                                        <div class="col-md-12">
                                            <label class="form-label" for="basicInput">Add caption</label>
                                            <input name="name" value="{{ old('name', $memorial->name ) }}" type="text" class="form-control" id="basicInput" placeholder="photo name" required>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="row">
                                                <label class="form-label col-md-12" for="basicInput">Photo</label>
                                                <div class="col-md-12">
                                                    @include('inc.image-upload',['field' => 'image','id' => 'image'])
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-md-12">
                                            <input type="radio" name="type" value="grave" class="frm-control" /> Grave
                                            <input type="radio" name="type" value="person" class="fom-control" /> Person
                                            <input type="radio" name="type" value="family" class="" /> Family
                                            <input type="radio" name="type" value="other" class="" /> Other
                                        </div>

                                        <div class="col-md-12">
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


                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!--   list-single-main-item end -->
                </div>
            </div>
        </div>
    </div>
    <div class="bmw-overlay"></div>
    <!--booking-modal-wrap end -->
@endsection
