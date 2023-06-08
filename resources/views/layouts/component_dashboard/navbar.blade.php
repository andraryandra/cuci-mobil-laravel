<nav class="navbar-custom">
    <!-- Search input -->
    <div class="search-wrap" id="search-wrap">
        <div class="search-bar">
            <input class="search-input" type="search" placeholder="Search here.." /> <a href="javascript:void(0);"
                class="close-search search-btn" data-target="#search-wrap"><i class="mdi mdi-close-circle"></i></a>
        </div>
    </div>
    <ul class="list-unstyled topbar-nav float-right mb-0">

        {{-- <li class="dropdown">
            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown"
                href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="mdi mdi-bell-outline nav-icon"></i> <span
                    class="badge badge-danger badge-pill noti-icon-badge">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                <!-- item-->
                <h6 class="dropdown-item-text">Notifications (258)</h6>
                <div class="slimscroll notification-list">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of
                                the printing and typesetting industry.</small></p>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                        <p class="notify-details">New Message received<small class="text-muted">You have 87
                                unread messages</small></p>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                        <p class="notify-details">Your item is shipped<small class="text-muted">It is a long
                                established fact that a reader will</small></p>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                        <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of
                                the printing and typesetting industry.</small></p>
                    </a>
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                        <p class="notify-details">New Message received<small class="text-muted">You have 87
                                unread messages</small></p>
                    </a>
                </div>
                <!-- All-->
                <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i
                        class="fi-arrow-right"></i></a>
            </div>
        </li> --}}
        <li class="hidden-sm">
            <a class="nav-link waves-effect waves-light" href="javascript:void(0);" id="btn-fullscreen"><i
                    class="mdi mdi-fullscreen nav-icon"></i></a>
        </li>
        <li class="dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                @if (Auth::check())
                    <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="profile-user"
                        class="rounded-circle" />
                @else
                    <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile-user" class="rounded-circle" />
                @endif
                {{-- <img src="{{ Storage::url(Auth::user()->photo) }}" alt="profile-user" class="rounded-circle" /> --}}
                {{-- <img src="{{ asset('assets/images/users/user-1.jpg') }}" alt="profile-user" class="rounded-circle" /> --}}
                <span class="ml-1 nav-user-name hidden-sm">{{ Auth::user()->name }} <i
                        class="mdi mdi-chevron-down"></i></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="{{ route('user-profile.index') }}"><i
                        class="dripicons-user text-muted mr-2"></i>
                    Profile</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="dripicons-exit text-muted mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
    <ul class="list-unstyled topbar-nav mb-0">
        <li>
            <button class="button-menu-mobile nav-link waves-effect waves-light"><i
                    class="mdi mdi-menu nav-icon"></i></button>
        </li>
    </ul>
</nav>
