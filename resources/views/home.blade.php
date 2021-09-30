@extends('layouts.frontend')

@section('content')

    <div id="wrapper">
        <!-- Content-->
        <div class="content">
            <!--section -->
            <section class="scroll-con-sec hero-section" data-scrollax-parent="true" id="sec1">
                <div class="slideshow-container" data-scrollax="properties: { translateY: '200px' }" >
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg"  data-bg="images/slider1.jpeg"></div>
                    </div>
                    <!--  slideshow-item end  -->
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg"  data-bg="images/slider2.jpeg"></div>
                    </div>
                    <!--  slideshow-item end  -->
                    <!-- slideshow-item -->
                    <div class="slideshow-item">
                        <div class="bg"  data-bg="images/slider3.jpeg"></div>
                    </div>
                    <!--  slideshow-item end  -->
                </div>
                <div class="overlay"></div>
                <div class="hero-section-wrap fl-wrap">
                    <div class="container">
                        <div class="intro-item fl-wrap">
                            <h2>World’s largest gravesite collection.</h2>
                            <h3>Over 190 million memorials created by the community since 1995.</h3>
                        </div>
                        <div class="main-search-input-wrap">
                            <div class="main-search-input fl-wrap">
                                <div class="main-search-input-item">
                                    <input type="text" placeholder="Name" value=""/>
                                </div>
                                <div class="main-search-input-item location" id="autocomplete-container">
                                    <input type="text" placeholder="Location" id="autocomplete-input" value=""/>
                                    <a href="#"><i class="fa fa-dot-circle-o"></i></a>
                                </div>
                                <div class="main-search-input-item">
                                    <select data-placeholder="Year Died" class="chosen-select" >
                                        <option>1992</option>
                                        <option>1993</option>
                                        <option>1994</option>
                                        <option>1995</option>
                                    </select>
                                </div>
                                <button class="main-search-button" onclick="window.location.href=''">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bubble-bg"> </div>
                <div class="header-sec-link">
                    <div class="container"><a href="#sec2" class="custom-scroll-link">Let's Start</a></div>
                </div>
            </section>

            <!-- section end -->
            <!--section -->
            <section id="sec2">
                <div class="container">
                    <div class="section-title">
                        <h2>Cemeteries</h2>
                        <div class="section-subtitle">Catalog of Cemeteries</div>
                        <span class="section-separator"></span>
                        <p>See your favorite cemeteries here, just select the Add Favorite button on any cemetery.</p>
                    </div>
                    <!-- portfolio start -->
                    <div class="gallery-items fl-wrap mr-bot spad">
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="/images/c/5.jpeg"></div>
                                    <div class="listing-counter"><span>10 </span> Memorials</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="#listing.html">Abernathy - Cogdell Cemetery</a></h3>
                                        <p>Hydes Ferry Road  Nashville, Davidson County, Tennessee, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item gallery-item-second">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="/images/c/1.jpeg"></div>
                                    <div class="listing-counter"><span>26 </span> Memorials</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="#listing.html">Search Memorials in Daniel Abernathy Cemetery</a></h3>
                                        <p>Old Highway 15, left into Blooming Grove Road, 1/2 mile past church, down the land on the left. On hill at old Poor Farm</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="/images/c/1.jpeg"></div>
                                    <div class="listing-counter"><span>21 </span> Memorials</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="#listing.html">William Harp Abernathy Cemetery</a></h3>
                                        <p>Giles County, Tennessee, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="/images/c/2.jpeg"></div>
                                    <div class="listing-counter"><span>73 </span> Memorials</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="#listing.html">Talley-Abernathy Cemetery</a></h3>
                                        <p>Marion, Montgomery County, Tennessee, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                        <!-- gallery-item-->
                        <div class="gallery-item">
                            <div class="grid-item-holder">
                                <div class="listing-item-grid">
                                    <div class="bg"  data-bg="/images/c/3.jpeg"></div>
                                    <div class="listing-counter"><span>35 </span> Memorials</div>
                                    <div class="listing-item-cat">
                                        <h3><a href="#listing.html">Sterling Abernathy Cemetery</a></h3>
                                        <p>Giles County, Tennessee, USA</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    </div>
                    <!-- portfolio end -->
                    <a href="{{ route('cemeteries') }}" class="btn  big-btn circle-btn dec-btn  color-bg flat-btn">View All<i class="fa fa-eye"></i></a>
                </div>
            </section>
            <!-- section end -->

            <section class="gray-section">
                <div class="container">
                    <div class="section-title">
                        <h2>How can you help</h2>
                        <div class="section-subtitle">Be a part of this community </div>
                        <span class="section-separator"></span>
                        {{--                        <p>Explore some of the best tips from around the world.</p>--}}
                    </div>
                    <!--process-wrap  -->
                    <div class="process-wrap fl-wrap">
                        <ul>
                            <li>
                                <div class="process-item">

                                    <div class="time-line-icon">
                                        <img src="/images/take_photos.png"/>
                                    </div>
                                    <h4> Take Photos</h4>
                                    <p>Join hundreds of thousands of people just like you who are taking photos
                                        of headstones all over the world! Our free iOS, Android and Windows mobile apps make taking photos a breeze!
                                        Document an entire
                                        cemetery and capture the GPS location all in one step! No data plan required</p>
                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <div class="time-line-icon">
                                        <img src="/images/t.png"/>
                                    </div>
                                    <h4> Transcribe Photos</h4>
                                    <p>Don't have a smartphone? Then transcribing is a great way to participate from the comfort of your home.
                                        Transcribe (index) the photos taken in cemeteries to make them searchable by millions of families looking for their ancestors!</p>
                                </div>
                                <span class="pr-dec"></span>
                            </li>
                            <li>
                                <div class="process-item">
                                    <div class="time-line-icon">
                                        <img src="/images/rc.png"/>
                                    </div>
                                    <h4> Research Records</h4>
                                    <p>Search our free index for family and link records to your favorite familytree resource. We've partnered with great companies like FamilySearch,
                                        MyHeritage and Findmypast. Whatever you find on BillionGraves is copied onto our partner sites!</p>
                                </div>
                            </li>
                        </ul>
                        {{--                        <div class="process-end"><i class="fa fa-check"></i></div>--}}
                    </div>
                    <!--process-wrap   end-->
                </div>
            </section>



            @include('partials.foot')
        </div>
        <!-- Content end -->
    </div>


@endsection
