<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu" id="side-nav">
        <li class="menu-title">Main</li>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == '1')
            <li>
                <a href="{{ route('admin.home') }}"><i
                        class="mdi mdi-home
                    "></i><span>Dashboards</span></a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-home-modern"></i><span>Landing Page</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-checkbox-multiple-blank"></i><span>Home</span><span class="menu-arrow"><i
                                    class="mdi mdi-chevron-right"></i></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{ route('home-carousel-landing-page.index') }}"><i
                                        class=" ti-layout-menu"></i>Carousel</a>
                            </li>
                            <li><a href="{{ route('home-body-landing-page.index') }}"><i
                                        class=" ti-layout-menu"></i>Home Item</a>
                            </li>

                        </ul>
                    </li>
                    <li><a href="{{ route('contact-landing-page.index') }}"><i class=" ti-layout-menu"></i>Contact</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-account-multiple"></i><span>Users</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('user-admin.index') }}"><i class=" ti-layout-menu"></i>Admin</a></li>
                    {{-- <li><a href="{{ route('user-karyawan.index') }}"><i class=" ti-layout-menu"></i>Karyawan</a></li> --}}
                    <li><a href="{{ route('user-customer.index') }}"><i class=" ti-layout-menu"></i>Customer</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-tag"></i><span>Kategori</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    {{-- <li><a href="{{ route('kategori-produk.index') }}">Kategori Produk</a></li> --}}
                    <li><a href="{{ route('kategori-mobil.index') }}"><i class=" ti-layout-menu"></i>Kategori Mobil</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('produk-mobil.index') }}"><i class="mdi mdi-view-grid"></i><span>Produk</span></a>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-car-wash"></i><span>Cuci Mobil</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('booking-cuci.index') }}"><i class=" ti-layout-menu"></i>Antrian Cuci</a></li>
                    <li><a href="{{ route('booking-cuci-sedang-dicuci.index') }}"><i class=" ti-layout-menu"></i>
                            Sedang
                            Di Cuci</a></li>
                    <li><a href="{{ route('booking-cuci-selesai-dicuci.index') }}"><i
                                class=" ti-layout-menu"></i>Cucian
                            Selesai</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('transaction-booking.index') }}"><i
                        class="mdi mdi-cash"></i><span>Transaksi</span></a>
            </li>
            <li>
                <a href="{{ route('booking-cuci-export.index') }}"><i
                        class="mdi mdi-file-multiple
                        "></i><span>Laporan</span></a>
            </li>
        @elseif (Auth::user()->role == 'user' || Auth::user()->role == '0')
            <li>
                <a href="{{ route('user.home') }}"><i class="mdi mdi-home"></i><span>Dashboards</span></a>
            </li>
            <li>
                <a href="{{ route('booking-cuci-customer.index') }}"><i class="mdi mdi-car-wash"></i><span>Booking
                        Cuci</span></a>
            </li>
            <li>
                <a href="{{ route('transaction-customer.index') }}"><i class="mdi mdi-cash"></i><span>Transaksi
                        Customer</span></a>
            </li>
        @endif


    </ul>
</div>
