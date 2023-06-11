@extends('layouts.landing-page')
@section('title', 'Landing Page - Home')
@section('template', 'template-page-home')
@section('contentLandingPage')

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Siapa Autospa</h2>
            <div></div>
            <span>Cucian Mobil &amp; merinci layanan</span>
        </div>

        <!-- Layout 33x66% -->
        <div class="template-layout-33x66 template-clear-fix">

            @forelse ($home_item as $item)
                <div class="template-layout-column-left">
                    <img src="{{ Storage::url($item->image_home) }}" alt="{{ $item->id }}" />
                </div>

                <!-- Right column -->
                <div class="template-layout-column-right">

                    <!-- Text -->
                    <p class="template-padding-reset">
                        {!! $item->content !!}
                    </p>
                @empty
                    <!-- Left column -->
                    <div class="template-layout-column-left">
                        <img src="{{ asset('landing-page/assets/media/image/sample/460x678/image_01.jpg') }}"
                            alt="" />
                    </div>

                    <!-- Right column -->
                    <div class="template-layout-column-right">

                        <!-- Text -->
                        <p class="template-padding-reset">
                            Autospa Hand Wash adalah layanan cuci tangan dan detailing mobil ramah lingkungan yang berbasis
                            di
                            Portland. Perusahaan kami didirikan pada tahun 2005 oleh tim ahli dengan pengalaman mencuci
                            mobil
                            profesional lebih dari 10 tahun. Kami mengoperasikan tiga pencucian mobil melalui area Portland.
                            Tujuan
                            kami adalah untuk memberikan pelanggan kami pengalaman mencuci mobil tangan yang paling ramah
                            dan
                            nyaman. Kami menggunakan modul reklamasi air paling modern dan terkini sebagai bagian dari
                            sistem
                            pencucian mobil kami. Produk kami semuanya dapat terurai secara hayati dan ramah lingkungan.
                        </p>
            @endforelse

            <!-- Feature list -->
            <div class="template-component-feature-list template-component-feature-list-position-top template-clear-fix">

                <!-- Layout 50x50% -->
                <ul class="template-layout-50x50 template-clear-fix">

                    <!-- Left column -->
                    <li class="template-layout-column-left template-margin-bottom-reset">
                        <div class="template-component-space template-component-space-2"></div>
                        <span class="template-icon-feature-water-drop"></span>
                        <h5>Cuci Mobil Terbaik</h5>
                        <ul class="template-component-list">
                            <li><span class="template-icon-meta-check"></span>Kami menawarkan berbagai layanan dengan
                                nilai yang
                                bagus</li>
                            <li><span class="template-icon-meta-check"></span>Lokasi Cuci Mobil di Indramayu</li>
                            <li><span class="template-icon-meta-check"></span>Produk yang ramah lingkungan dan mudah
                                terurai</li>
                            <li><span class="template-icon-meta-check"></span>Bayar cuci mobil secara elektronik dan
                                aman</li>
                            <li><span class="template-icon-meta-check"></span>Tim cuci mobil yang terlatih dan terampil
                            </li>
                        </ul>
                    </li>
                    <!-- Right column -->
                    <li class="template-layout-column-right template-margin-bottom-reset">
                        <div class="template-component-space template-component-space-2"></div>
                        <span class="template-icon-feature-user-chat"></span>
                        <h5>Menghubungi Kami</h5>
                        <ul class="template-component-list">
                            <li><span class="template-icon-meta-check"></span>Kami adalah perusahaan yang sangat terbuka
                                dan mudah
                                dihubungi</li>
                            <li><span class="template-icon-meta-check"></span>Email kami diperiksa setiap jam pada hari
                                kerja</li>
                            <li><span class="template-icon-meta-check"></span>Pesan janji temu online dalam waktu kurang
                                dari 3
                                menit</li>
                            <li><span class="template-icon-meta-check"></span>Nomor bebas pulsa kami akan dijawab</li>
                            <li><span class="template-icon-meta-check"></span>Anda dapat membayar secara online untuk
                                janji
                                temu Anda</li>
                        </ul>
                    </li>

                </ul>

            </div>

        </div>

    </div>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix template-background-color-1">

        <!-- Call to action -->
        <div class="template-component-call-to-action">
            <div class="template-main">
                <h3>NO 1. SISTEM PEMESANAN CUCI MOBIL</h3>
                <a href="{{ route('landingPage.booking') }}" class="template-component-button">Booking Sekarang!</a>
            </div>
        </div>

    </div>

    <!-- Section -->
    <div
        class="template-section template-background-image template-background-image-5 template-background-image-parallax template-color-white template-clear-fix">

        <!-- Mian -->
        <div class="template-main">

            <!-- Header + subheader -->
            <div class="template-component-header-subheader">
                <h2>Sistem Pemrosesan Kami</h2>
                <div></div>
                <span>Kami tahu waktu Anda berharga</span>
            </div>

            <!-- Space -->
            <div class="template-component-space template-component-space-1"></div>

            <!-- Process list -->
            <div class="template-component-process-list template-clear-fix">

                <!-- Layout 25x25x25x25% -->
                <ul class="template-layout-25x25x25x25 template-clear-fix template-layout-margin-reset">

                    <!-- Left column -->
                    <li class="template-layout-column-left">
                        <span class="template-icon-feature-check"></span>
                        <h5>1. Pemesanan</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Center left column -->
                    <li class="template-layout-column-center-left">
                        <span class="template-icon-feature-car-check"></span>
                        <h5>2. Inspeksi</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Center right column -->
                    <li class="template-layout-column-center-right">
                        <span class="template-icon-feature-payment"></span>
                        <h5>3. Penilaian</h5>
                        <span class="template-icon-meta-arrow-large-rl"></span>
                    </li>

                    <!-- Right column -->
                    <li class="template-layout-column-right">
                        <span class="template-icon-feature-vacuum-cleaner"></span>
                        <h5>4. Penyelesaian</h5>
                    </li>

                </ul>

            </div>

        </div>


    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Header + subheader -->
        <div class="template-component-header-subheader">
            <h2>Paket Cucian Mobil</h2>
            <div></div>
            <span>Pencucian mana yang terbaik untuk kendaraan Anda?</span>
        </div>

        <!-- Booking -->
        <div class="template-component-booking" id="template-booking">

            <form>

                <ul>

                    <li>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Vehicle list -->
                            <ul class="template-component-booking-vehicle-list">

                                <!-- Vehicle -->
                                @foreach ($kategori_mobil as $item)
                                    <li data-id="{{ $item->id }}">
                                        <label class="form-check-label" for="kategori-mobil-{{ $item->id }}">
                                            <div>
                                                <!-- Icon -->
                                                <div class="template-icon-vehicle-small-car"></div>
                                                <div class="form-check">
                                                    <input class="form-check-input kategori-mobil-radio" type="radio"
                                                        name="kategori_mobil_id" id="kategori-mobil-{{ $item->id }}"
                                                        required value="{{ $item->id }}" hidden>
                                                    <i class="bi bi-cart-check-fill" hidden style="font-size: 15px;"></i>
                                                    {{ $item->kategori_mobil }}
                                                </div>
                                            </div>
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>

                    <li>

                        <!-- Content -->
                        <div class="template-component-booking-item-content">

                            <!-- Package list -->
                            <ul class="template-component-booking-package-list">
                                @foreach ($produk_mobil as $produk)
                                    <!-- Package -->
                                    <li class="produk-item" data-id="{{ $produk->kategori_mobil_id }}"
                                        data-id-vehicle-rel="{{ $produk->kategori_mobil_id }}">
                                        <h4 class="template-component-booking-package-name">{{ $produk->nama_produk }}</h4>
                                        <div class="template-component-booking-package-price">
                                            <span class="template-component-booking-package-price-currency">Rp.</span>
                                            <span class="template-component-booking-package-price-total"
                                                data-harga-produk="{{ $produk->harga_produk }}">{{ number_format($produk->harga_produk, 0, ',', '.') }}</span>
                                        </div>
                                        <div class="template-component-booking-package-duration">
                                            <span class="template-icon-booking-meta-duration"></span>
                                            <span class="template-component-booking-package-duration-value">25</span>
                                            <span class="template-component-booking-package-duration-unit">min</span>
                                        </div>
                                        <ul class="template-component-booking-package-service-list">
                                            <li data-id="{{ $produk->id }}">{!! $produk->deskripsi_produk !!}</li>
                                        </ul>

                                        <div class="custom-radio-button">
                                            <a href="{{ route('landingPage.booking') }}">
                                                <label class="btn">
                                                    {{-- <input type="radio" name="produk_id" value="{{ $produk->id }}" required
                                                    class="template-component-button-radio"> --}}
                                                    <span class="custom-button"><i class="bi bi-check2-circle"
                                                            style="font-size: 1.5rem;"></i> Booking Sekarang Juga!</span>
                                                </label>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                    </li>

                </ul>

            </form>

        </div>

        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('#template-booking').booking();
            });
        </script>

    </div>

    <!-- Section -->
    <div class="template-section template-section-padding-reset template-clear-fix">

        <!-- Flex layout 50x50% -->
        <div class="template-layout-flex template-background-color-1 template-clear-fix">

            <!-- Left column -->
            <div class="template-background-image template-background-image-1"></div>

            <!-- Right column -->
            <div class="template-section-padding-1">

                <!-- Features list -->
                <div class="template-component-feature-list template-component-feature-list-position-top">

                    <!-- Layout 50x50% -->
                    <ul class="template-layout-50x50 template-clear-fix">

                        <!-- Left column -->
                        <li class="template-layout-column-left">
                            <span class="template-icon-feature-location-map"></span>
                            <h5>Kenyamanan</h5>
                            <p>Kami berdedikasi untuk menyediakan layanan berkualitas, kepuasan pelanggan dengan nilai
                                tinggi di berbagai lokasi yang menawarkan jam kerja yang nyaman.</p>
                        </li>

                        <!-- Right column -->
                        <li class="template-layout-column-right">
                            <span class="template-icon-feature-eco-nature"></span>
                            <h5>Produk organik</h5>
                            <p>Produk kami ramah lingkungan dan produk interior semuanya organik. Kami menggunakan kurang
                                dari satu galon air dengan limbah nol.</p>
                        </li>

                        <!-- Left column -->
                        <li class="template-layout-column-left">
                            <span class="template-icon-feature-team"></span>
                            <h5>Tim Berpengalaman</h5>
                            <p>Anggota kru kami semua terlatih dan terampil dan dilengkapi dengan peralatan dan perlengkapan
                                yang dibutuhkan agar kami dapat memberikan hasil terbaik.</p>
                        </li>

                        <!-- Right column -->
                        <li class="template-layout-column-right">
                            <span class="template-icon-feature-spray-bottle"></span>
                            <h5>Nilai Luar Biasa</h5>
                            <p>Kami menawarkan berbagai layanan dengan harga terjangkau untuk memenuhi kebutuhan Anda. Kami
                                menawarkan layanan premium sambil menghemat waktu dan uang Anda.</p>
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>




    <!-- Section -->
    <div class="template-section template-section-padding-1 template-clear-fix template-main">

        <!-- Features list -->
        <div class="template-component-feature-list template-component-feature-list-position-left template-clear-fix">

            <!-- Layout 33x33x33% -->
            <ul class="template-layout-33x33x33 template-clear-fix">

                @foreach ($contacts as $contact)
                    <li class="template-layout-column" style="flex: 0 0 25%; max-width: 25%; margin: 10px 0;">
                        <div style="display: flex; align-items: center;">
                            @if ($contact->image_contact)
                                <img src="{{ Storage::url($contact->image_contact) }}" alt="{{ $contact->id }}"
                                    width="85">
                            @else
                                <span class="template-icon-feature-phone-circle"></span>
                            @endif
                            <div style="margin-left: 10px;">
                                <h5 style="margin-bottom: 3px; margin-top: 0;">{{ $contact->title_contact }}</h5>
                                <p style="margin-bottom: 5px; margin-top: 0;">{!! $contact->description_contact !!}</p>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    {{-- </div> --}}


@endsection

@push('style')
    <link rel="stylesheet"
        href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css') }}">

    <style>
        .custom-radio-button .btn {
            position: relative;
            padding-right: 30px;
        }

        .custom-radio-button .btn input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .custom-radio-button .btn .custom-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f1f1f1;
            color: #333;
            border: 1px solid #ccc;
            border-radius: 9999px;
            /* Menentukan radius untuk membuat bentuk rounded-full */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .custom-radio-button .btn .custom-button:hover {
            background-color: #e0e0e0;
        }

        .custom-radio-button .btn .custom-button-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            transition: background-image 0.3s ease;
        }

        .custom-radio-button .btn input[type="radio"]:checked+.custom-button {
            background-color: #3498db;
            color: #fff;
        }

        .custom-radio-button .btn .custom-button i {
            display: none;
        }

        .custom-radio-button .btn input[type="radio"]:checked+.custom-button i {
            display: inline-block;
        }
    </style>
@endpush
