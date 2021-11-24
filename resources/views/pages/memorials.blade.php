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

                            <div class="col-6 col-md-4 mb-3 mb-md-0">
                                <label class="sr-only" for="birthyear">Year Born</label>
                                <div class="input-group date-select">
                                    <input type="number" id="birthyear" name="birthyear" class="form-control hide-ac" maxlength="4" placeholder="Year Born" value="" pattern="\d*" autocomplete="on" title="Year Born">
                                    <div class="birthyearfilter input-group-append select-exact">
                                        <button class="btn dropdown-toggle dropdown" type="button" data-toggle="dropdown" id="dropdownbyfilter1">

                                            Exact

                                        </button>
                                        <ul class="dropdown-menu shadow-sm dropdown-menu-right" aria-labelledby="dropdownbyfilter1">
                                            <li><a href="#" role="button" class="dropdown-item" value="exact">Exact</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="before">Before</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="after">After</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="1">+/- 1 year</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="3">+/- 3 years</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="5">+/- 5 years</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="10">+/- 10 years</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="25">+/- 25 years</a></li>
                                            <li><a href="#" role="button" class="dropdown-item" value="unknown">Unknown</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <input type="hidden" name="birthyearfilter" id="birthyearfilter" value="">
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
{{--                            @section('hide')--}}
                                <div class="col-md-4">
                                    <div class="fl-wrap">
                                        <!-- listsearch-input-wrap  -->
                                        <div class="listsearch-input-wrap fl-wrap">
                                            <div class="listsearch-input-item">
                                                <i class="mbri-key single-i"></i>
                                                <h3>EXPLORE</h3>
                                            </div>
                                            <div class="box-widget">
                                                <div class="box-widget-content">
                                                    <ul class="cat-item">
                                                        <li><a href="#">Born/Died on This Date</a></li>
                                                        <li><a href="#">Yearly Necrologies</a> </li>
                                                        <li><a href="#">Posthumous Reunions</a> </li>
                                                        <li><a href="#">Interesting Monuments</a> </li>
                                                        <li><a href="#">Interesting Epitaphs</a> </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Checkboxes -->
                                            <div class=" fl-wrap filter-tags years">
                                                <h4>Filter by Year of Birth / Death</h4>
                                                <div class="list-single-tags tags-stylwrap blog-tags filter-year">
                                                    @for ($i = 1900; $i <= date('Y') - 5; $i+=5)
                                                        <a href="{{ route('memorials') }}?y_from={{ $i }}&y_to={{ $i+4 }}">{{ $i }}-{{ $i + 4 }}</a>
                                                    @endfor
                                                </div>
                                            </div>

                                        </div>
                                        <!-- listsearch-input-wrap end -->
                                    </div>
                                </div>
{{--                            @endsection--}}

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
