<div class="main-menu-content mt-3">
    @if(auth()->user()->hasRole(['admin','superadmin']))
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item  {{ active('admin.dashboard') }}"><a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span></a>
            </li>
            <li class=" nav-item {{ active('admin.cemeteries.*') }} "><a class="d-flex align-items-center" href="{{ route('admin.cemeteries.index') }}"><i data-feather="coffee"></i><span class="menu-title text-truncate" data-i18n="Home">Cemeteries</span></a>
            </li>
            <li class=" nav-item {{ active('admin.memorials.*') }} "><a class="d-flex align-items-center" href="{{ route('admin.memorials.index') }}"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Home">Memorials</span></a>
            </li>

            {{--        <li class=" nav-item {{ active(['menu_cats','menu_categories.index','flavors.*','sides.*']) }} "><a class="d-flex align-items-center" href="{{ route('menu_cats') }}"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Home">Menu</span></a>--}}
            {{--        </li>--}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-plus"></i><span class="menu-title text-truncate" data-i18n="Home">Photo Request</span></a>
            </li>
            <li class=" nav-item {{ active('admin.photos') }}"><a class="d-flex align-items-center" href="{{ route('admin.photos') }}"><i data-feather="image"></i><span class="menu-title text-truncate" data-i18n="Home">Photos </span></a>
            </li>

            <li class=" nav-item mt-2"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span class="menu-title text-truncate" data-i18n="Page Layouts"> Account Info </span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Profile</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Account Settings</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a target="_blank" class="d-flex align-items-center" href="{{ route('home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home"> Home Page -> </span></a>
            </li>

            <li class=" nav-item">
                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="d-flex align-items-center" ><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Home">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>


        </ul>
    @else
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item  {{ active('dashboard') }}"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span></a>
            </li>
            @if(auth()->user()->hasRole('cemetery'))
            <li class=" nav-item {{ active('cemeteries.*') }} "><a class="d-flex align-items-center" href="{{ route('cemeteries.index') }}"><i data-feather="coffee"></i><span class="menu-title text-truncate" data-i18n="Home">Cemeteries</span></a>
            </li>
            @endif
            <li class=" nav-item {{ active('memorials.*') }} "><a class="d-flex align-items-center" href="{{ route('memorials.index') }}"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Home">My Memorials</span></a>
            </li>

            {{--        <li class=" nav-item {{ active(['menu_cats','menu_categories.index','flavors.*','sides.*']) }} "><a class="d-flex align-items-center" href="{{ route('menu_cats') }}"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Home">Menu</span></a>--}}
            {{--        </li>--}}
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather="file-plus"></i><span class="menu-title text-truncate" data-i18n="Home">Photo Request</span></a>
            </li>
            <li class=" nav-item {{ active('photos') }}"><a class="d-flex align-items-center" href="{{ route('photos') }}"><i data-feather="image"></i><span class="menu-title text-truncate" data-i18n="Home"> My Photos </span></a>
            </li>

            <li class=" nav-item mt-2"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span class="menu-title text-truncate" data-i18n="Page Layouts"> Account Info </span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Profile</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="settings"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Account Settings</span></a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item"><a target="_blank" class="d-flex align-items-center" href="{{ route('home') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home"> Home Page -> </span></a>
            </li>

            <li class=" nav-item">
                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="d-flex align-items-center" ><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Home">Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>


        </ul>
    @endif
</div>
