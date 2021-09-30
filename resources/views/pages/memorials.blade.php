@extends('layouts.frontend')

@section('content')
    <!-- wrapper -->
    <div id="wrapper">
        <!--  content  -->
        <div class="content">
            <!--  section  end-->
            <!--  section  -->
            <section class="parallax-sectio" style="padding: 0 5%" data-scrollax-parent="true">
                <div class="listsearch-maiwrap box-inside fl-wrap">
                    <div class="listsearch-header fl-wrap">
                        <h3>Search Memorials : </h3>
                    </div>
                    <!-- listsearch-input-wrap  -->
                    <div class="listsearch-input-wrap fl-wrap">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input type="text" placeholder="First name " value=""/>
                        </div>
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input type="text" placeholder="Last name " value=""/>
                        </div>

                        <div class="listsearch-input-item">
                            <select data-placeholder="Year Born" class="chosen-select" >
                                <option>Select Year of birth</option>
                                <option>1992</option>
                                <option>1993</option>
                                <option>1994</option>
                                <option>1995</option>
                                <option>1996</option>
                            </select>
                        </div>
                        <div class="listsearch-input-item">
                            <select data-placeholder="Year Died" class="chosen-select" >
                                <option>Select Year of death</option>
                                <option>1991</option>
                                <option>1992</option>
                                <option>1993</option>
                                <option>1994</option>
                                <option>1995</option>
                                <option>1996</option>
                            </select>
                        </div>
                        <div class="listsearch-input-text" id="autocomplete-container">
                            <label><i class="mbri-map-pin"></i> Cemetery Location</label>
                            <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value=""/>
                            <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>
                        </div>
                        <!-- hidden-listing-filter -->
                        <div class="hidden-listing-filter fl-wrap">
                            <!-- Checkboxes -->
                            <div class=" fl-wrap filter-tags">
                                <h4>Filter by Tags</h4>
                                <div class="filter-tags-wrap">
                                    <input id="check-a" type="checkbox" name="check" checked>
                                    <label for="check-a">Famous</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-b" type="checkbox" name="check">
                                    <label for="check-b">Sponsored</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-c" type="checkbox" name="check">
                                    <label for="check-c">Not buried in a cemetery</label>
                                </div>
                                <div class="filter-tags-wrap">
                                    <input id="check-d" type="checkbox" name="check">
                                    <label for="check-d">Cenotaph</label>
                                </div>
                            </div>
                        </div>
                        <!-- hidden-listing-filter end -->
                        <button class="button fs-map-btn">Search</button>
                        <div class="more-filter-option">More Filters <span></span></div>
                    </div>
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
                                    <h3>Recent Memorials : </h3>
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
                                    @foreach($memorials as $item)
                                    <div class="listing-item list-layout">
                                        <article class="geodir-category-listing fl-wrap">
                                            <div class="geodir-category-img">
                                                <img style="padding: 15px" src="images/all/4.jpg" alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">

                                                <h3><a href="listing-single.html">Benard Richard Henrdors</a></h3>
                                                <p>12th Sept 1900 - 23 Oct 1990</p>

                                            </div>
                                            <div class="geodir-category-content fl-wrap text-justify">

                                                <h3><a href="#">Garilbalian Cemetery</a></h3>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis consectetur distinctio doloremque doloribus
                                                 At doloremque </p>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end-->
                                    <div class="clearfix"></div>
                                @endforeach
                                    <!-- pagination-->
                                    <div class="pagination">
                                        <a href="#" class="prevposts-link"><i class="fa fa-caret-left"></i></a>
                                        <a href="#" class="blog-page transition">1</a>
                                        <a href="#" class="blog-page current-page transition">2</a>
                                        <a href="#" class="blog-page transition">3</a>
                                        <a href="#" class="blog-page transition">4</a>
                                        <a href="#" class="nextposts-link"><i class="fa fa-caret-right"></i></a>
                                    </div>
                                </div>
                                <!-- list-main-wrap end-->
                            </div>
                            <div class="col-md-4">
                                <div class="fl-wrap">
                                    <!-- listsearch-input-wrap  -->
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <div class="listsearch-input-item">
                                            <i class="mbri-key single-i"></i>
                                            <input type="text" placeholder="Keywords?" value=""/>
                                        </div>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="Location" class="chosen-select" >
                                                <option>All Locations</option>
                                                <option>Bronx</option>
                                                <option>Brooklyn</option>
                                                <option>Manhattan</option>
                                                <option>Queens</option>
                                                <option>Staten Island</option>
                                            </select>
                                        </div>
                                        <div class="listsearch-input-item">
                                            <select data-placeholder="All Categories" class="chosen-select" >
                                                <option>All Categories</option>
                                                <option>Shops</option>
                                                <option>Hotels</option>
                                                <option>Restaurants</option>
                                                <option>Fitness</option>
                                                <option>Events</option>
                                            </select>
                                        </div>
                                        <div class="listsearch-input-text" id="autocomplete-container">
                                            <label><i class="mbri-map-pin"></i> Enter Addres </label>
                                            <input type="text" placeholder="Destination , Area , Street" id="autocomplete-input" class="qodef-archive-places-search" value=""/>
                                            <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>
                                        </div>
                                        <div class="distance-input fl-wrap">
                                            <div class="distance-title"> Radius around selected destination <span></span> km</div>
                                            <div class="distance-radius-wrap fl-wrap">
                                                <input class="distance-radius rangeslider--horizontal" type="range" min="1" max="100" step="1" value="1" data-title="Radius around selected destination">
                                            </div>
                                        </div>
                                        <!-- Checkboxes -->
                                        <div class=" fl-wrap filter-tags">
                                            <h4>Filter by Tags</h4>
                                            <div class="filter-tags-wrap">
                                                <input id="check-a" type="checkbox" name="check" checked>
                                                <label for="check-a">Elevator in building</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-b" type="checkbox" name="check">
                                                <label for="check-b">Friendly workspace</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-c" type="checkbox" name="check">
                                                <label for="check-c">Instant Book</label>
                                            </div>
                                            <div class="filter-tags-wrap">
                                                <input id="check-d" type="checkbox" name="check">
                                                <label for="check-d">Wireless Internet</label>
                                            </div>
                                        </div>
                                        <!-- hidden-listing-filter end -->
                                        <button class="button fs-map-btn">Update</button>
                                    </div>
                                    <!-- listsearch-input-wrap end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--  section  end-->
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
        <!-- content end-->
    </div>
    <!-- wrapper end -->
@endsection
