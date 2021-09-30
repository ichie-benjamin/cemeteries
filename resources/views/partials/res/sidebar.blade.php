<div class="main-menu-content mt-3">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item  {{ active('dashboard') }}"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="grid"></i><span class="menu-title text-truncate" data-i18n="Home">Dashboard</span></a>
        </li>
        <li class=" nav-item {{ active('restaurants.*') }} "><a class="d-flex align-items-center" href="{{ route('restaurants.index') }}"><i data-feather="coffee"></i><span class="menu-title text-truncate" data-i18n="Home">Restaurant</span></a>
        </li>
        <li class=" nav-item {{ active(['menu_cats','menu_categories.index','flavors.*','sides.*']) }} "><a class="d-flex align-items-center" href="{{ route('menu_cats') }}"><i data-feather="menu"></i><span class="menu-title text-truncate" data-i18n="Home">Menu</span></a>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="orders.html"><i data-feather="activity"></i><span class="menu-title text-truncate" data-i18n="Home">Orders</span></a>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="marketing.html"><i data-feather="database"></i><span class="menu-title text-truncate" data-i18n="Home"> Marketing </span></a>
        </li>
        <li class=" nav-item"><a class="d-flex align-items-center" href="membership.html"><i data-feather="gift"></i><span class="menu-title text-truncate" data-i18n="Home">Membership</span></a>
        </li>
        <li class=" nav-item {{ active(['qr','qrbuilder']) }}"><a class="d-flex align-items-center" href="{{ route('qr') }}"><i data-feather="cpu"></i><span class="menu-title text-truncate" data-i18n="Home">QR Builder</span></a>
        </li>

        <li class=" nav-item mt-2"><a class="d-flex align-items-center" href="#"><i data-feather="layout"></i><span class="menu-title text-truncate" data-i18n="Page Layouts"> Account Info </span></a>
            <ul class="menu-content">
                <li><a class="d-flex align-items-center" href="transactions.html"><i data-feather="credit-card"></i><span class="menu-item text-truncate" data-i18n="Collapsed Menu">Transactions</span></a>
                </li>
                <li><a class="d-flex align-items-center" href="account-settings.html"><i data-feather="settings"></i><span class="menu-item text-truncate" data-i18n="Layout Full">Account Settings</span></a>
                </li>
            </ul>
        </li>
        <li class=" nav-item">
            <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"  class="d-flex align-items-center" ><i data-feather="log-out"></i><span class="menu-title text-truncate" data-i18n="Home">Logout</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>

        </li>
    </ul>
</div>
