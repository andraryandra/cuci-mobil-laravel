@extends('layouts.app')
@section('title', 'Dashboard - Admin')
@section('contentAdmin')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Booking Cuci Mobil</h4>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}.
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}.
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!--end row-->
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="my-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="fa fa-plus-circle"></i> Create Booking Cuci Mobil
                            </button>
                        </div>

                        <div class="table-responsive-custom">
                            <table id="datatable" class="table table-bordered table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kategori Mobil</th>
                                        <th class="text-center">Nama Pemesan</th>
                                        {{-- <th class="text-center">No Telp</th> --}}
                                        <th class="text-center">Nama Mobil</th>
                                        <th class="text-center">No Plat Mobil</th>
                                        <th class="text-center">Tanggal Pesanan</th>
                                        {{-- <th class="text-center">Karyawan</th> --}}
                                        <th class="text-center">Status Booking</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->kategoriMobil->kategori_mobil }}</td>
                                            <td class="text-center text-capitalize">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#show{{ $item->id }}">
                                                    <u>{{ $item->nama_pemesan }}</u>
                                                    <span class="show-button">Show</span>
                                                </a>
                                            </td>
                                            {{-- <td class="text-center">{{ $item->no_telp_pemesan }}</td> --}}
                                            <td class="text-center">{{ $item->nama_mobil }}</td>
                                            <td class="text-center">{{ $item->no_plat_mobil }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d-m-Y') }} ||
                                                {{ $item->jam_pesan }}</td>

                                            {{-- <td class="text-center text-capitalize">
                                                @if ($item->karyawan_id == null)
                                                    <button type="button" class="btn btn-info text-light me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit2{{ $item->id }}">
                                                        Pilih Karyawan
                                                    </button>
                                                @else
                                                    {{ $item->karyawan->name }}
                                                @endif
                                            </td> --}}
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        @if ($item->status_pesan == 'PENDING')
                                                            Menunggu Cucian
                                                        @elseif ($item->status_pesan == 'PROCESS')
                                                            <i class="fa fa-spin fa-spinner"></i> Sedang Dicuci
                                                        @elseif ($item->status_pesan == 'SUCCESS')
                                                            Pencucian Selesai
                                                        @endif
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <form
                                                            action="{{ route('booking-cuci-sedang-dicuci.updateStatusCuci', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button class="btn btn-success col-md-12" type="submit">
                                                                <i class="fa fa-check-circle"></i> Cucian Selesai
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- <td class="text-center">
                                                @if ($item->status_bayar == 'UNPAID')
                                                    <span class="badge bg-warning text-light">Belum Bayar</span>
                                                @elseif ($item->status_bayar == 'PAID')
                                                    <span class="badge bg-success text-light">Sudah Bayar</span>
                                                @endif
                                            </td> --}}
                                            <td class="align-middle">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-navicon"></i> Action
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <button class="dropdown-item btn btn-warning text-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#modalEdit{{ $item->id }}">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </button>
                                                        <form action="{{ route('booking-cuci.destroy', $item->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item btn btn-danger text-white">
                                                                <i class="fa fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Modal Edit --}}
    @include('admin.booking_cuci.sedangDicuci.edit')

    {{-- Modal Karyawan --}}
    {{-- @include('admin.booking_cuci.edit-2')   --}}

    @include('admin.booking_cuci.sedangDicuci.show')

    {{-- Modal Produk --}}
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Booking Cuci</h1>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('booking-cuci.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="kategori-mobil" class="form-label">Kategori Mobil ID</label>
                            <select class="custom-select" name="kategori_mobil_id" id="kategori-mobil"
                                title="Kategori Mobil" required>
                                <option value="" selected>Select Kategori Mobil</option>
                                @foreach ($kategori_mobils as $kategori_mobil)
                                    <option value="{{ $kategori_mobil->id }}">{{ $kategori_mobil->kategori_mobil }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="produk-id" class="form-label">Kategori Mobil ID</label>
                            <select class="custom-select" name="produk_id" id="produk-id" title="Produk" required>
                                <option value="" selected>Select Produk</option>
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->kategoriMobil->kategori_mobil }} ||
                                        {{ $produk->nama_produk }} || Rp. {{ number_format($produk->harga_produk) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                            {{-- <select class="custom-select" name="user_id" id="user_id" title="User" required>
                                <option value="" selected>Select User</option>
                                @foreach ($users as $user)
                                    @if ($user->role == '0' || $user->role == 'user')
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select> --}}
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan"
                                title="User" placeholder="Nama Pemesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp_pemesan" class="form-label">No. Telp Pemesan</label>
                            <input type="text" class="form-control" id="no_telp_pemesan" name="no_telp_pemesan"
                                title="No Telp" placeholder="No Telp" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama_mobil" class="form-label">Nama Mobil</label>
                            <input type="text" class="form-control" id="nama_mobil" name="nama_mobil"
                                title="Nama Mobil" placeholder="Nama Mobil" required>
                        </div>
                        <div class="mb-3">
                            <label for="no_plat_mobil" class="form-label">No. Plat Mobil</label>
                            <input type="text" class="form-control" id="no_plat_mobil" name="no_plat_mobil"
                                title="No Plat Mobil" placeholder="No Plat Mobil" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_pesan" class="form-label">Tanggal Pesan</label>
                            <input type="date" class="form-control" id="tanggal_pesan" name="tanggal_pesan"
                                title="Tanggal Pesan" placeholder="Tanggal Pesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="jam_pesan" class="form-label">Jam Pesan</label>
                            <input type="time" class="form-control" id="jam_pesan" name="jam_pesan"
                                title="Jam Pesan" placeholder="Jam Pesan" required>
                        </div>
                        <div class="mb-3">
                            <label for="status_pesan" class="form-label">Status Pesan</label>
                            <select class="custom-select" name="status_pesan" id="status_pesan" title="Status Pesan"
                                required>
                                <option value="" selected>Select Status Pesan</option>
                                <option value="PENDING">Menunggu Cucian</option>
                                <option value="PROCESS">Sedang Dicuci</option>
                                <option value="SUCCESS">Pencucian Selesai</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status_bayar" class="form-label">Status Bayar</label>
                            <select class="custom-select" name="status_bayar" id="status_bayar" title="Status Bayar"
                                required>
                                <option value="" selected>Select Status Bayar</option>
                                <option value="UNPAID">Belum Bayar</option>
                                <option value="PAID">Sudah Bayar</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection


@push('style')
    <style>
        .custom-select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            padding: 0.375rem 1.75rem 0.375rem 0.75rem;
        }

        .custom-select:focus {
            outline: none;
            border-color: #80bdff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }

        .custom-select:disabled {
            background-color: #e9ecef;
            opacity: 1;
        }
    </style>

    <style>
        .table-responsive-custom {
            overflow-x: auto;
        }

        .table-responsive-custom table {
            width: 100%;
            min-width: 750px;
            /* Sesuaikan dengan lebar tabel jika diperlukan */
        }
    </style>

    <style>
        .text-center.text-capitalize a {
            position: relative;
            display: inline-block;
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        .text-center.text-capitalize a::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #333;
            transform: scaleX(0);
            transform-origin: left center;
            transition: transform 0.3s;
        }

        .text-center.text-capitalize a:hover {
            color: #0077ff;
        }

        .text-center.text-capitalize a:hover::before {
            transform: scaleX(1);
        }

        .text-center.text-capitalize a .show-button {
            position: absolute;
            top: calc(100% + 10px);
            left: 50%;
            transform: translateX(-50%);
            background-color: #0077ff;
            color: #fff;
            padding: 8px 16px;
            border-radius: 4px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        .text-center.text-capitalize a:hover .show-button {
            opacity: 1;
            visibility: visible;
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('bootstrap5-3/css/bootstrap.min.css') }}"> --}}
@endpush

@push('script')
    <script src="{{ asset('bootstrap5-3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('option[value=""]').css('display', 'none');
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kategoriMobilSelect = document.querySelector('.kategori-mobil');
            var produkSelect = document.querySelector('.produk-id');

            kategoriMobilSelect.addEventListener('change', function() {
                var selectedKategoriMobilId = this.value;

                // Menghapus semua opsi produk sebelumnya
                produkSelect.innerHTML = '';

                if (selectedKategoriMobilId) {
                    // Mendapatkan daftar produk berdasarkan kategori mobil yang dipilih
                    var produkList = {!! $produks->toJson() !!};

                    // Membuat opsi produk yang sesuai dengan kategori mobil terpilih
                    produkList.forEach(function(produk) {
                        if (produk.kategori_mobil_id == selectedKategoriMobilId) {
                            var option = document.createElement('option');
                            option.value = produk.id;
                            option.textContent = produk.nama_produk + ' || Rp. ' + parseFloat(produk
                                .harga_produk).toLocaleString();
                            produkSelect.appendChild(option);
                        }
                    });
                }
            });

            // Memastikan produk terpilih saat halaman dimuat
            var initialKategoriMobilId = kategoriMobilSelect.value;
            if (initialKategoriMobilId) {
                // Memicu perubahan pada kategori mobil untuk mengisi produk
                kategoriMobilSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>



    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var kategoriMobilSelect = document.getElementById('kategori-mobil');
            var produkSelect = document.getElementById('produk-id');

            kategoriMobilSelect.addEventListener('change', function() {
                var selectedKategoriMobilId = this.value;

                // Menghapus semua opsi produk sebelumnya
                produkSelect.innerHTML = '';

                if (selectedKategoriMobilId) {
                    // Mendapatkan daftar produk berdasarkan kategori mobil yang dipilih
                    var produkList = {!! $produks->toJson() !!};

                    // Membuat opsi produk yang sesuai dengan kategori mobil terpilih
                    produkList.forEach(function(produk) {
                        if (produk.kategori_mobil_id == selectedKategoriMobilId) {
                            var option = document.createElement('option');
                            option.value = produk.id;
                            option.textContent = produk.nama_produk + ' || Rp. ' + parseFloat(produk
                                    .harga_produk)
                                .toLocaleString();
                            produkSelect.appendChild(option);
                        }
                    });
                }
            });

            // Memastikan produk terpilih saat halaman dimuat
            var initialKategoriMobilId = kategoriMobilSelect.value;
            if (initialKategoriMobilId) {
                // Memicu perubahan pada kategori mobil untuk mengisi produk
                kategoriMobilSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endpush
