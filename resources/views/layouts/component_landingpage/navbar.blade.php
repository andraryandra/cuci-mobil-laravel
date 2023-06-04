<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.html"><img src="{{ asset('landing-page/assets/img/logo/logo.png') }}"
                                        alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper  d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="{{ route('landingPage.home') }}">Home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a href="{{ route('landingPage.services') }}">services</a></li>
                                            <li><a href="blog.html">Blog</a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">Blog</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                                @if (Route::has('login'))
                                    <div class="header-right-btn d-none d-lg-block ml-20">
                                        {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                                        @auth
                                            @if (Auth::user()->role == 'admin')
                                                <a href="{{ route('admin.home') }}" class="btn header-btn">
                                                    Dashboard
                                                </a>
                                            @elseif (Auth::user()->role == 'user')
                                                <a href="{{ route('user.home') }}" class="btn header-btn">
                                                    Dashboard
                                                </a>
                                            @endif
                                        @else
                                            <a href="{{ route('login') }}" class="btn header-btn">
                                                Login
                                            </a>
                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}"
                                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                                {{-- <div class="header-right-btn d-none d-lg-block ml-20">
                                    <a href="{{ route('login') }}" class="btn header-btn">
                                        Login
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
