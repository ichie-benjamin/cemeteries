<!-- header-->
<header class="main-header dark-header fs-header sticky">
    <div class="header-inner">
        <div class="logo-holder">
            <a href="{{ route('home') }}"><img src="/images/logo.png" alt=""></a>
        </div>
{{--        <div class="header-search vis-header-search">--}}
{{--            <div class="header-search-input-item">--}}
{{--                <input type="text" placeholder="Discover your ancestor" value=""/>--}}
{{--            </div>--}}
{{--            <div class="header-search-select-item">--}}
{{--                <select data-placeholder="All Categories" class="chosen-select" >--}}
{{--                    <option>All Categories</option>--}}
{{--                    <option>Shops</option>--}}
{{--                    <option>Hotels</option>--}}
{{--                    <option>Restaurants</option>--}}
{{--                    <option>Fitness</option>--}}
{{--                    <option>Events</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <button class="header-search-button" >Search</button>--}}
{{--        </div>--}}
{{--        <div class="show-search-button"><i class="fa fa-search"></i> <span>Search</span></div>--}}

        @guest()
            <a href="{{ route('login') }}" class="add-list">Upload Photos <span><i class="fa fa-plus"></i></span></a>
            <div class="show-reg-form text-white"><a href="{{ route('login') }}" style="color:#fff;" class="text-white"><i class="fa fa-sign-in"></i>Sign In</a></div>
    @else
            <a href="{{ route('dashboard') }}" class="add-list">Upload Photos <span><i class="fa fa-plus"></i></span></a>
{{--            <div class="show-reg-form modal-open"><i class="fa fa-sign-in"></i>Dashboard</div>--}}
    @endguest

        <!-- nav-button-wrap-->
        <div class="nav-button-wrap color-bg">
            <div class="nav-button">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- nav-button-wrap end-->
        <!--  navigation -->
        <div class="nav-holder main-menu">
            <nav>
                <ul>
                    <li><a href="{{ route('memorials') }}">Memorials</a></li>
                    <li><a href="{{ route('cemeteries') }}">Cemeteries</a></li>
                    <li><a href="{{ route('memorials.famous') }}">Famous</a></li>
                    <li><a href="{{ route('help') }}">Get Help</a></li>
                    @auth()
                    <li>
                        <a href="#" class="text-capitalize">
                            <img style="border-radius: 50%" class="rounded" src="{{ auth()->user()->avatar }}" height="35" width="35" />
                            {{ auth()->user()->username }} <i class="fa fa-caret-down"></i></a>
                        <!--second level -->
                        <ul>
                            <li><a href="{{ route('user.profile', auth()->id()) }}">Profile</a></li>
                            <li><a href="{{ route('dashboard') }}">Account</a></li>
                            <li><a href="{{ route('memorials.index') }}">My Memorials</a></li>
                            <li>
                                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                                  Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

{{--                                <a href="#how-itworks.html">Logout</a>--}}
                            </li>

                        </ul>
                        <!--second level end-->
                    </li>
                        @endauth()
                </ul>
            </nav>
        </div>
        <!-- navigation  end -->
    </div>
</header>
<!--  header end -->
