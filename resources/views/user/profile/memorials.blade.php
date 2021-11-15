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
                        <h3 class="text-capitalize">{{ $user->name }} > Memorials </h3>
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
                                    <h3>{{ count($memorials) }} Memorial(s) : </h3>
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

                                                <h3><a href="#">{{ $item->name }}</a></h3>
                                                <p>{{ $item->age }}</p>

                                            </div>
                                            <div class="geodir-category-content fl-wrap text-justify">

                                                <h3><a href="#">{{ optional($item->cemetery)->name }}</a></h3>
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
                            <div class="col-md-4">
                                <div class="fl-wrap">
                                    <!-- listsearch-input-wrap  -->
                                    <div class="listsearch-input-wrap fl-wrap">
                                        <form action="" method="get">
                                            <div class="listsearch-input-item">
                                                <i class="mbri-key single-i"></i>
                                                <input type="text" placeholder="Name?" name="name" value=""/>
                                            </div>
                                            <div class="listsearch-input-item">
                                                <input style="width: 45%" type="text" placeholder="Year Born " name="birthday" value=""/>
                                                <input style="width: 45%; float: right" type="text" placeholder="Year Dead " name="deathday" value=""/>
                                            </div>

                                            <div class="listsearch-input-text" id="autocomplete-container">
                                                <label><i class="mbri-map-pin"></i> Cemetery Location</label>
                                                <input name="location" type="text" placeholder="Cemetery Location" id="autocomplete-input" class="qodef-archive-places-search" value=""/>
                                                <a  href="#"  class="loc-act qodef-archive-current-location"><i class="fa fa-dot-circle-o"></i></a>
                                            </div>

                                            <div class="listsearch-input-item" style="margin-top: 20px">
                                                <button class="button fs-map-btn" type="submit">Search</button>
                                            </div>
                                        </form>

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



            @include('partials.foot')
        </div>
        <!-- content end-->
    </div>
    <!-- wrapper end -->
@endsection
