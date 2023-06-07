<div class="left-sidenav">
    <ul class="metismenu left-sidenav-menu" id="side-nav">
        <li class="menu-title">Main</li>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == '1')
            <li>
                <a href="{{ route('admin.home') }}"><i class="mdi mdi-speedometer"></i><span>Dashboards</span></a>
            </li>

            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-account-location"></i><span>Users</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('user-admin.index') }}">Admin</a></li>
                    <li><a href="{{ route('user-karyawan.index') }}">Karyawan</a></li>
                    <li><a href="{{ route('user-customer.index') }}">Customer</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-account-location"></i><span>Kategori</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    {{-- <li><a href="{{ route('kategori-produk.index') }}">Kategori Produk</a></li> --}}
                    <li><a href="{{ route('kategori-mobil.index') }}">Kategori Mobil</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('produk-mobil.index') }}"><i class="mdi mdi-calendar"></i><span>Produk</span></a>
            </li>
            <li>
                <a href="javascript: void(0);">
                    <i class="mdi mdi-account-location"></i><span>Cuci Mobil</span><span class="menu-arrow"><i
                            class="mdi mdi-chevron-right"></i></span>
                </a>
                <ul class="nav-second-level" aria-expanded="false">
                    <li><a href="{{ route('booking-cuci.index') }}">Antrian Cuci</a></li>
                    <li><a href="{{ route('booking-cuci-sedang-dicuci.index') }}">Sedang Di Cuci</a></li>
                    <li><a href="{{ route('booking-cuci.selesaiDicuci') }}">Cucian Selesai</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('transaction-booking.index') }}"><i
                        class="mdi mdi-calendar"></i><span>Transaksi</span></a>
            </li>
            <li>
                <a href="calendar.html"><i class="mdi mdi-calendar"></i><span>Calendar</span></a>
            </li>
        @elseif (Auth::user()->role == 'user' || Auth::user()->role == '0')
            <li>
                <a href="{{ route('user.home') }}"><i class="mdi mdi-speedometer"></i><span>Dashboards</span></a>
            </li>
        @endif


    </ul>
</div>
