<nav>
    <!-- Default menu-->
    <div class="template-component-menu-default">
        <ul class="sf-menu">
            <li><a href="{{ route('landingPage.home') }}"
                    class="{{ Request::routeIs('landingPage.home') ? 'template-state-selected' : '' }}">Home</a></li>
            <li class=""><a href="{{ route('landingPage.booking') }}"
                    class="{{ Request::routeIs('landingPage.booking') ? 'template-state-selected' : '' }}">Booking</a>
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
            <li><a href="{{ route('landingPage.home') }}"
                    class="{{ Request::routeIs('landingPage.home') ? 'template-state-selected' : '' }}">Home</a>
            </li>
            <li class=""><a href="{{ route('landingPage.booking') }}"
                    class="{{ Request::routeIs('landingPage.booking') ? 'template-state-selected' : '' }}">Booking</a>
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
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log
                            in</a>


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


<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.template-header-top').templateHeader();
    });
</script>
