@extends('layouts.landing-page')
@section('title', 'Landing Page - Booking')
@section('template', 'template-page-contact-style-1')
@section('contentLandingPage')



    <!-- Section -->
    <div class="template-component-booking template-section template-main" id="template-booking">


        @if (session('success'))
            <div
                style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; padding: .75rem 1.25rem; margin-bottom: 1rem; border: 1px solid transparent; border-radius: .25rem;">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (is_array(session('error')))
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    @foreach (session('error') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                    <li>{{ session('error') }}</li>
                </ul>
            </div>
        @endif

        <div class="alert alert-warning" role="alert">
            Anda wajib datang 5 menit sebelum waktu pencucian dimulai. Jika datang setelah lewat dari jam pencucian,
            maka pemesanan akan hangus dan Anda diharuskan untuk melakukan pemesanan ulang.
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pelanggan Booking</h5>
                <div class="list-group">
                    @forelse ($history_bookings as $item)
                        <div class="list-group-item">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-1">Kategori Mobil - {{ $item->kategoriMobil->kategori_mobil }}</h6>
                                <small>Status: Booking Cucian Mobil ({{ $item->status_pesan }})</small>
                            </div>
                            <p class="mb-1">Terimakasih Telah membooking Cucian Mobil dikami {{ $item->nama_pemesan }},
                                berikut pesanan Cucian Booking Mobil Anda,</p>
                            <p class="mb-1">Nama Pemesan: {{ $item->nama_pemesan }}, </p>
                            <p class="mb-1">Nama Produk Booking: {{ $item->produkMobil->nama_produk }}, </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-muted">
                                    <span class="mr-1">Rp.</span>
                                    <span
                                        class="font-weight-bold">{{ number_format($item->produkMobil->harga_produk, 0, ',', '.') }}</span>
                                </div>
                                <small>Tanggal & Jam Booking Cucian Mobil:
                                    <b>{{ date('d-m-Y', strtotime($item->tanggal_pesan)) }},
                                        {{ $item->jam_pesan }}</b></small>
                            </div>
                        </div>
                    @empty
                        <div class="list-group-item">
                            <p class="mb-0">Belum ada pelanggan yang melakukan booking.</p>
                        </div>
                    @endforelse
                </div>
                <div class="text-center mt-3">
                    <div class="pagination">
                        {{ $history_bookings->links() }}
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Daftar Pelanggan Booking</h5>
                <div class="list-group">
                    @forelse ($history_bookings as $item)
                        <div class="list-group-item">
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <h6 class="mb-1" style="font-weight: bold;">Kategori Mobil -
                                    {{ $item->kategoriMobil->kategori_mobil }}</h6>
                                <p>Status Booking Cucian Mobil: <span class="badge badge-primary p-2 rounded-pill">
                                        {{ $item->status_pesan }}
                                    </span>
                                </p>
                            </div>
                            <p class="card-text mb-2">Terimakasih Telah membooking Cucian Mobil dikami
                                {{ $item->nama_pemesan }}, berikut pesanan Cucian Booking Mobil Anda.</p>
                            <span class="card-text mb-2">Nama Pemesan: {{ $item->nama_pemesan }}</span><br>
                            <span class="card-text mb-2">Nama Produk Booking: {{ $item->produkMobil->nama_produk }}</span>
                            <div class="d-flex flex-wrap justify-content-between align-items-center">
                                <div class="text-muted mb-2 btn badge-success ">
                                    <span class="mr-1 text-white">Rp.</span>
                                    <span
                                        class="font-weight-bold text-white">{{ number_format($item->produkMobil->harga_produk, 0, ',', '.') }}</span>
                                </div>
                                <p class="mb-2">Tanggal & Jam Booking Cucian Mobil:
                                    <b>{{ date('d-m-Y', strtotime($item->tanggal_pesan)) }},
                                        {{ $item->jam_pesan }}</b>
                                </p>
                            </div>

                        </div>
                    @empty
                        <div class="list-group-item">
                            <p class="card-text mb-0">Belum ada pelanggan yang melakukan booking.</p>
                        </div>
                    @endforelse
                </div>
                <div class="text-center mt-3">
                    <div class="pagination">
                        {{ $history_bookings->links() }}
                    </div>
                </div>
            </div>
        </div>




        <br>
        <!-- Booking form -->
        <form action="{{ route('booking-cucis-customer.store') }}" method="POST">
            @csrf
            <ul>
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
                                            <div class="text-center">
                                                <img src="{{ Storage::url($item->gambar_kategori_mobil) }}"
                                                    alt="{{ $item->id }}" width="65"
                                                    style="display: inline-block;  border-radius: 20%; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input kategori-mobil-radio required-field"
                                                    type="radio" name="kategori_mobil_id"
                                                    id="kategori-mobil-{{ $item->id }}" required
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
                                        <span
                                            class="template-component-booking-package-duration-value">{{ $produk->estimasi_waktu }}</span>
                                    </div>
                                    <ul class="template-component-booking-package-service-list">
                                        <li data-id="{{ $produk->id }}">{!! $produk->deskripsi_produk !!}</li>
                                    </ul>

                                    <div class="custom-radio-button">
                                        <label class="btn">
                                            <input type="radio" name="produk_id" value="{{ $produk->id }}" required
                                                class="template-component-button-radio required-field">
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
                        <!-- Layout -->
                        <ul class="template-layout-50x50 template-layout-margin-reset template-clear-fix">

                            <!-- First name -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-first-name">Nama Pemesan *</label>
                                    @if (Auth::check())
                                        <input type="text" name="nama_pemesan" id="booking-form-first-name"
                                            class="required-field" required value="{{ Auth::user()->name }}" />
                                    @else
                                        <input type="text" name="nama_pemesan" id="booking-form-first-name"
                                            class="required-field" required />
                                    @endif
                                </div>
                            </li>

                            <!-- Second name -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-second-name">No. Telephone *</label>
                                    @if (Auth::check())
                                        <input type="text" name="no_telp_pemesan" id="booking-form-second-name"
                                            required value="{{ Auth::user()->phone }}" class="required-field" />
                                    @else
                                        <input type="text" name="no_telp_pemesan" id="booking-form-second-name"
                                            class="required-field" required />
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
                                    <input type="text" name="nama_mobil" id="booking-form-email"
                                        class="required-field" required />
                                </div>
                            </li>

                            <!-- Phone number -->
                            <li class="template-layout-column-right template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-phone">No Plat Mobil *</label>
                                    <input type="text" name="no_plat_mobil" id="booking-form-phone"
                                        class="required-field" required />
                                </div>
                            </li>

                        </ul>
                        <!-- Layout -->
                        <ul class="template-layout-33x33x33 template-layout-margin-reset template-clear-fix">

                            <!-- Vehicle make -->
                            <li class="template-layout-column-left template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-make">Tanggal Pesan</label>
                                    <input type="date" name="tanggal_pesan" id="booking-form-vehicle-make"
                                        class="required-field" required />
                                </div>
                            </li>

                            <!-- Vehicle model -->
                            <li class="template-layout-column-center template-margin-bottom-reset">
                                <div class="template-component-form-field">
                                    <label for="booking-form-vehicle-model">Jam Pesan</label>
                                    <input type="time" name="jam_pesan" id="booking-form-vehicle-model"
                                        class="required-field" required />
                                </div>
                            </li>
                        </ul>
                        <!-- Text + submit button -->
                        <div class="template-align-center template-clear-fix template-margin-top-2">
                            <p class="template-padding-reset template-margin-bottom-2">Kami akan mengkonfirmasi janji Anda
                                dengan Anda melalui telepon atau email dalam waktu 24 jam setelah menerima permintaan Anda.
                            </p>
                            <!-- Button trigger modal -->
                            {{-- <input type="submit" value="Confirm Booking" class="template-component-button"
                                name="booking-form-submit" id="booking-form-submit" />
                            <input type="hidden" value="" name="booking-form-data" id="booking-form-data" /> --}}
                            <input type="submit" value="Confirm Booking" class="template-component-button"
                                name="booking-form-submit" id="booking-form-submit" onclick="validateForm(event)" />
                            <input type="hidden" value="" name="booking-form-data" id="booking-form-data" />
                        </div>
                    </div>
                </li>
            </ul>
        </form>
    </div>

@endsection


@push('style')
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-4/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">

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
    {{-- <script src="{{ asset('bootstrap-4/js/bootstrap.bundle.min.js') }}"></script> --}}

    {{-- <script src="{{ url('https://cdn.jsdelivr.net/npm/sweetalert2@11') }}"></script> --}}
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        function validateForm(event) {
            event.preventDefault(); // Menghentikan pengiriman formulir secara default

            // Validasi field yang diperlukan
            var requiredFields = document.querySelectorAll(".required-field");
            var isValid = true;

            requiredFields.forEach(function(field) {
                if (field.value.trim() === "") {
                    isValid = false;
                    field.classList.add("is-invalid");
                } else {
                    field.classList.remove("is-invalid");
                }
            });

            if (isValid) {
                showConfirmationAlert();
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Mohon lengkapi semua field yang diperlukan!",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        }

        function showConfirmationAlert() {
            Swal.fire({
                title: "Konfirmasi Booking",
                // text: "Apakah Anda yakin ingin melakukan booking?",
                text: " Anda wajib datang 5 menit sebelum waktu pencucian dimulai. Jika datang setelah lewat dari jam pencucian,maka pemesanan akan hangus dan Anda diharuskan untuk melakukan pemesanan ulang.",
                icon: "info",
                showCancelButton: true,
                confirmButtonText: "Ya",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lakukan tindakan setelah konfirmasi
                    document.getElementById("booking-form-data").value = "Data yang ingin disimpan";
                    document.getElementById("booking-form-submit").form.submit();
                }
            });
        }
    </script>

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
@endpush
