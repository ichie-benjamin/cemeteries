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
                        <h3>Search Memorials : </h3>
                    </div>
                    <!-- listsearch-input-wrap  -->
                    <div class="listsearch-input-wrap fl-wrap">
                        <form action="" method="get">
                        <div class="listsearch-input-item">
                            <i class="mbri-key single-i"></i>
                            <input name="name" type="text" placeholder="Name " value="{{ request()->get('name') }}"/>
                        </div>

                        <div class="listsearch-input-item">
                            <select name="birth_year" data-placeholder="Year Born" class="chosen-select" >
                                <option value="">Select Year of birth</option>
                                @for ($i = 1700; $i <= date('Y'); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="listsearch-input-item">
                            <select name="death_year" data-placeholder="Year Died" class="chosen-select" >
                                <option value="">Select Year of death</option>
                                @for ($i = 1700; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="listsearch-input-item" id="autocomplete-container">

                            <input name="location" type="text" placeholder="Cemetery Location" id="autocomplete-input" class="qodef-archive-places-search" value="{{ request()->get('location') }}"/>
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
                        <button class="button fs-map-btn" type="submit">Search</button>
                        <div class="more-filter-option">More Filters <span></span></div>
                        </form>
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
                                    <h3>{{ $title }} : </h3>
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
                                                <img style="padding: 15px" src="{{ $item->image }}" alt="">
                                            </div>
                                            <div class="geodir-category-content fl-wrap">

                                                <h3><a href="{{ route('memorial.show', $item->id) }}">{{ $item->name }}</a></h3>
                                                <p>{{ $item->age }}</p>

                                            </div>
                                            <div class="geodir-category-content fl-wrap text-justify">

                                                <h3><a href="{{ route('cemetery.show', [optional($item->cemetery)->id, optional($item->cemetery)->username]) }}">{{ optional($item->cemetery)->name }}</a></h3>
                                            <p> {{ $item->short_bio }} </p>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- listing-item end-->
                                    <div class="clearfix"></div>
                                @endforeach
                                    <!-- pagination-->

                                    @if (count($memorials) < 1)
                                        <h3 style="font-size: 2em; margin-top: 50px">No Memorial Found</h3>
                                    @endif


                                    <div class="pagination">
                                        {!! $memorials->links('paginate.home') !!}
                                    </div>

                                </div>
                                <!-- list-main-wrap end-->
                            </div>
                            @section('hide')
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
                                                {{--                                            <div class="filter-tags-wrap">--}}
                                                {{--                                                <input id="check-a" type="checkbox" name="check" checked>--}}
                                                {{--                                                <label for="check-a">Elevator in building</label>--}}
                                                {{--                                            </div>--}}
                                            </div>
                                            <!-- hidden-listing-filter end -->
                                            <button class="button fs-map-btn">Update</button>
                                        </div>
                                        <!-- listsearch-input-wrap end -->
                                    </div>
                                </div>
                            @endsection

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
