<nav>
    <!-- Default menu-->
    <div class="template-component-menu-default">
        <ul class="sf-menu">
            <li><a href="{{ route('landingPage.home') }}"
                    class="{{ Request::routeIs('landingPage.home') ? 'template-state-selected' : '' }}">Home</a></li>
            <li class=""><a href="{{ route('landingPage.booking') }}"
                    class="{{ Request::routeIs('landingPage.booking') ? 'template-state-selected' : '' }}">Booking</a>
            </li>
            <li>
                <a href="#.html">Blog</a>
                <ul>
                    <li><a href="blog-small-image-right-sidebar.html">Blog Small Image - Right
                            Sidebar</a></li>
                    <li><a href="blog-small-image-left-sidebar.html">Blog Small Image - Left Sidebar</a>
                    </li>
                    <li><a href="blog-large-image-right-sidebar.html">Blog Large Image - Right
                            Sidebar</a></li>
                    <li><a href="blog-large-image-left-sidebar.html">Blog Large Image - Left Sidebar</a>
                    </li>
                    <li><a href="single-post-right-sidebar.html">Single Post - Right Sidebar</a></li>
                    <li><a href="single-post-left-sidebar.html">Single Post - Left Sidebar</a></li>
                </ul>
            </li>
            <li class=""><a href="{{ route('landingPage.contact') }}"
                    class="{{ Request::routeIs('landingPage.contact') ? 'template-state-selected' : '' }}">Contact</a>
            </li>
            <li>
                @if (Route::has('login'))
                    @auth
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <a href="{{ route('user.home') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>


                </li>
                <li>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
                @endif
            </li>

        </ul>
    </div>

</nav>

<nav>
    <!-- Mobile menu-->
    <div class="template-component-menu-responsive">
        <ul class="flexnav">
            <li><a href="#"><span
                        class="touch-button template-icon-meta-arrow-large-tb template-component-menu-button-close"></span>&nbsp;</a>
            </li>
            <li><a href="index.html" class="template-state-selected">Home</a></li>
            <li>
                <a href="#.html">Pages</a>
                <ul>
                    <li><a href="about-style-1.html">About Style 1</a></li>
                    <li><a href="about-style-2.html">About Style 2</a></li>
                    <li><a href="service-style-1.html">Services Style 1</a></li>
                    <li><a href="service-style-2.html">Services Style 2</a></li>
                    <li><a href="single-service-right-sidebar.html">Single Service</a></li>
                    <li><a href="404.html">Page 404</a></li>
                </ul>
            </li>
            <li><a href="book-your-wash.html">Booking</a></li>
            <li>
                <a href="#.html">Services</a>
                <ul>
                    <li><a href="service-style-1.html">Services Style 1</a></li>
                    <li><a href="service-style-2.html">Services Style 2</a></li>
                    <li><a href="single-service-right-sidebar.html">Single Service - Right Sidebar</a>
                    </li>
                    <li><a href="single-service-left-sidebar.html">Single Service - Left Sidebar</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#.html">Blog</a>
                <ul>
                    <li><a href="blog-small-image-right-sidebar.html">Blog Small Image - Right
                            Sidebar</a></li>
                    <li><a href="blog-small-image-left-sidebar.html">Blog Small Image - Left
                            Sidebar</a></li>
                    <li><a href="blog-large-image-right-sidebar.html">Blog Large Image - Right
                            Sidebar</a></li>
                    <li><a href="blog-large-image-left-sidebar.html">Blog Large Image - Left
                            Sidebar</a></li>
                    <li><a href="single-post-right-sidebar.html">Single Post - Right Sidebar</a></li>
                    <li><a href="single-post-left-sidebar.html">Single Post - Left Sidebar</a></li>
                </ul>
            </li>
            <li><a href="gallery.html">Gallery</a></li>
            <li>
                <a href="#.html">Contact</a>
                <ul>
                    <li><a href="contact-style-1.html">Contact Style 1</a></li>
                    <li><a href="contact-style-2.html">Contact Style 2</a></li>
                </ul>
            </li>
        </ul>
    </div>

</nav>


<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.template-header-top').templateHeader();
    });
</script>
