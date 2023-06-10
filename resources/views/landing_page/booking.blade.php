@extends('layouts.landing-page')
@section('title', 'Landing Page - Booking')
@section('template', 'template-page-contact-style-1')
@section('contentLandingPage')

    <!-- Section -->
    <div class="template-component-booking template-section template-main" id="template-booking">
        <!-- Booking form -->
        <form action="{{ route('booking-cucis-customer.store') }}" method="POST">
            @csrf
            <ul>
                @if (session('success'))
                    <div
                        style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;">
                        <strong>{{ session('success') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (session('error'))
                    <div
                        style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Vehcile list -->
                <li>
                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>1</span>
                            <span>/</span>
                            <span>3</span>
                        </span>
                        <h3>Pilih Tipe Mobil</h3>
                        <h5>Berikut pilihan dari tipe mobil.</h5>
                    </div>

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
                                                    value="{{ $item->id }}" hidden>
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
                <!-- Package list -->

                <!-- Step -->
                <li>
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>2</span>
                            <span>/</span>
                            <span>3</span>
                        </span>
                        <h3>Paket Cucian Mobil</h3>
                        <h5>Pencucian mana yang terbaik untuk kendaraan Anda?</h5>
                    </div>
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
                                        <li data-id="{{ $produk->id }}">{{ $produk->deskripsi_produk }}</li>
                                    </ul>

                                    <div class="custom-radio-button">
                                        <label class="btn">
                                            <input type="radio" name="produk_id" value="{{ $produk->id }}"
                                                class="template-component-button-radio">
                                            <span class="custom-button"><i class="bi bi-check2-circle"
                                                    style="font-size: 1.5rem;"></i> Booking Sekarang Juga!</span>
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                <!-- Service list -->
                <!-- Summary -->
                <li>
                    <!-- Step -->
                    <div class="template-component-booking-item-header template-clear-fix">
                        <span>
                            <span>3</span>
                            <span>/</span>
                            <span>3</span>
                        </span>
                        <h3>Booking Cucian - Buat Pesanan Anda!</h3>
                        <h5>Harap berikan kami informasi kontak Anda.</h5>
                    </div>
                    <!-- Form Content -->
                    <div class="template-component-booking-item-content">

                        <ul class="template-component-booking-summary template-clear-fix">

                            <!-- Duration -->
                            {{-- <li class="template-component-booking-summary-duration">
                                <div class="template-icon-booking-meta-total-duration"></div>
                                <h5>
                                    <span>0</span>
                                    <span>h</span>
                                    &nbsp;
                                    <span>0</span>
                                    <span>min</span>
                                </h5>
                                <span>Duration</span>
                            </li> --}}

                            <!-- Price -->
                            <li class="template-component-booking-summary-price">
                                <div class="template-icon-booking-meta-total-price"></div>
                                <h5>
                                    {{-- <span class="template-component-booking-summary-price-symbol">$</span> --}}
                                    <span class="template-component-booking-summary-price-value"
                                        id="total-price">0.00</span>
                                </h5>
                                <span>Total Price</span>
                            </li>


                        </ul>

                    </div>

                    <!-- Form Content -->
                    <div class="template-component-booking-item-content template-margin-top-reset">
                        {{-- <input type="text" name="kategori_mobil_id" value="1" id="">
                        <input type="text" name="produk_id" value="1" id=""> --}}
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix" hidden>
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-first-name">User ID *</label>
                                    @if (Auth::check())
                                        <input type="text" name="user_id" id="booking-form-first-name"
                                            value="{{ Auth::user()->id }}" required />
                                    @else
                                        <input type="text" name="user_id" id="booking-form-first-name" required />
                                    @endif
                                </div>
                            </li>
                        </ul>
                        <!-- Layout -->
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                            <!-- First name -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-first-name">Nama Pemesan *</label>
                                    @if (Auth::check())
                                        <input type="text" name="nama_pemesan" id="booking-form-first-name"
                                            value="{{ Auth::user()->name }}" required />
                                    @else
                                        <input type="text" name="nama_pemesan" id="booking-form-first-name" required />
                                    @endif
                                </div>
                            </li>

                            <!-- Second name -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-second-name">No. Telephone *</label>
                                    @if (Auth::check())
                                        <input type="text" name="no_telp_pemesan" id="booking-form-second-name"
                                            value="{{ Auth::user()->phone }}" required />
                                    @else
                                        <input type="text" name="no_telp_pemesan" id="booking-form-second-name"
                                            required />
                                    @endif
                                </div>
                            </li>

                        </ul>

                        <!-- Layout -->
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">
                            <!-- E-mail address -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-email">Nama Mobil *</label>
                                    <input type="text" name="nama_mobil" id="booking-form-email" required />
                                </div>
                            </li>

                            <!-- Phone number -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-phone">No Plat Mobil *</label>
                                    <input type="text" name="no_plat_mobil" id="booking-form-phone" required />
                                </div>
                            </li>

                        </ul>
                        <!-- Layout -->
                        <ul class="template-layout-33x33x33 template-layout-margin-reset template-clear-fix">

                            <!-- Vehicle make -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-make">Tanggal Pesan</label>
                                    <input type="date" name="tanggal_pesan" id="booking-form-vehicle-make" />
                                </div>
                            </li>

                            <!-- Vehicle model -->
                            <li class="template-layout-column-center template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-model">Jam Pesan</label>
                                    <input type="time" name="jam_pesan" id="booking-form-vehicle-model" />
                                </div>
                            </li>
                        </ul>
                        <!-- Text + submit button -->
                        <div class="template-align-center template-clear-fix template-margin-top-2">
                            <p class="template-padding-reset template-margin-bottom-2">Kami akan mengkonfirmasi janji Anda
                                dengan Anda melalui telepon atau email dalam waktu 24 jam setelah menerima permintaan Anda.
                            </p>
                            <input type="submit" value="Confirm Booking" class="template-component-button"
                                name="booking-form-submit" id="booking-form-submit" />
                            <input type="hidden" value="" name="booking-form-data" id="booking-form-data" />
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>

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


@push('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kategoriMobilRadios = document.querySelectorAll('input[name="kategori_mobil_id"]');
            var produkList = document.querySelectorAll('.produk-item');

            kategoriMobilRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var selectedKategoriMobilId = this.value;

                    produkList.forEach(function(produk) {
                        var kategoriMobilId = produk.getAttribute('data-id-vehicle-rel');
                        if (kategoriMobilId === selectedKategoriMobilId ||
                            selectedKategoriMobilId === '') {
                            produk.style.display = 'block';
                        } else {
                            produk.style.display = 'none';
                        }
                    });
                });
            });

            // Memastikan produk terpilih saat halaman dimuat
            var initialKategoriMobilRadio = document.querySelector('input[name="kategori_mobil_id"]:checked');
            if (initialKategoriMobilRadio) {
                // Memicu perubahan pada kategori mobil untuk menampilkan produk
                initialKategoriMobilRadio.dispatchEvent(new Event('change'));
            } else {
                // Jika tidak ada kategori mobil yang terpilih, sembunyikan semua produk
                produkList.forEach(function(produk) {
                    produk.style.display = 'none';
                });
            }
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kategoriMobilRadios = document.querySelectorAll('input[name="kategori_mobil_id"]');
            var vehicleListItems = document.querySelectorAll('.template-component-booking-vehicle-list li');

            kategoriMobilRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    vehicleListItems.forEach(function(item) {
                        var itemId = item.getAttribute('data-id');
                        var icon = item.querySelector('i');
                        if (radio.checked && itemId === radio.value) {
                            item.style.backgroundColor = '#3498db';
                            item.style.color = '#fff';
                            icon.style.display = 'inline-block';
                        } else {
                            item.style.backgroundColor = '';
                            item.style.color = '';
                            icon.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>


    <script>
        var produkRadios = document.querySelectorAll('input[name="produk_id"]');
        var totalPriceElement = document.getElementById('total-price');

        produkRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                var selectedProduk = this.closest('.produk-item');
                var hargaProduk = selectedProduk.querySelector(
                    '.template-component-booking-package-price-total').getAttribute('data-harga-produk');

                // Memformat harga_produk sebagai mata uang Rupiah
                var formattedHargaProduk = parseFloat(hargaProduk).toLocaleString('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                });

                // Perbarui harga_produk
                totalPriceElement.textContent = formattedHargaProduk;
            });
        });
    </script>



    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kategoriMobilRadios = document.querySelectorAll('input[name="kategori_mobil"]');
            var produkList = document.querySelectorAll('.produk-item');

            kategoriMobilRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    var selectedKategoriMobilId = this.value;

                    produkList.forEach(function(produk) {
                        var kategoriMobilId = produk.getAttribute('data-id-vehicle-rel');
                        if (kategoriMobilId === selectedKategoriMobilId ||
                            selectedKategoriMobilId === '') {
                            produk.style.display = 'block';
                        } else {
                            produk.style.display = 'none';
                        }
                    });
                });
            });

            // Memastikan produk terpilih saat halaman dimuat
            var initialKategoriMobilRadio = document.querySelector('input[name="kategori_mobil"]:checked');
            if (initialKategoriMobilRadio) {
                // Memicu perubahan pada kategori mobil untuk menampilkan produk
                initialKategoriMobilRadio.dispatchEvent(new Event('change'));
            }
        });
    </script> --}}
@endpush
