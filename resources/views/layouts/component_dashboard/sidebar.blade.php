{{-- <div class="left-sidenav">
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
                    <li><a href="{{ route('kategori-produk.index') }}">Kategori Produk</a></li>
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
                    <li><a href="{{ route('booking-cuci.sedangDicuci') }}">Sedang Di Cuci</a></li>
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
</div> --}}



<div class="sidebar">

    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ asset('assets/img/profile.jpg') }}">
            </div>
            <div class="info">
                <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                    <span>
                        Hizrian
                        <span class="user-level">Administrator</span>
                        <span class="caret"></span>
                    </span>
                </a>
                <div class="clearfix"></div>

                <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                    <ul class="nav">
                        <li>
                            <a href="#profile">
                                <span class="link-collapse">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#edit">
                                <span class="link-collapse">Edit Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#settings">
                                <span class="link-collapse">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item active">
                <a href="{{ route('admin.home') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                    <span class="badge badge-count">5</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="components.html">
                    <i class="la la-table"></i>
                    <p>Components</p>
                    <span class="badge badge-count">14</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="forms.html">
                    <i class="la la-keyboard-o"></i>
                    <p>Forms</p>
                    <span class="badge badge-count">50</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="tables.html">
                    <i class="la la-th"></i>
                    <p>Tables</p>
                    <span class="badge badge-count">6</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="notifications.html">
                    <i class="la la-bell"></i>
                    <p>Notifications</p>
                    <span class="badge badge-success">3</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="typography.html">
                    <i class="la la-font"></i>
                    <p>Typography</p>
                    <span class="badge badge-danger">25</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="icons.html">
                    <i class="la la-fonticons"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="nav-item update-pro">
                <button data-toggle="modal" data-target="#modalUpdate">
                    <i class="la la-hand-pointer-o"></i>
                    <p>Update To Pro</p>
                </button>
            </li>
        </ul>
    </div>
</div>
