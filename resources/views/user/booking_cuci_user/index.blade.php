@extends('layouts.app')
@section('title', 'Dashboard - Customer')
@section('contentUser')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Booking Cuci Mobil - Customer {{ Auth::user()->name }}</h4>
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
                                        <th class="text-center">Status Booking</th>
                                        <th class="text-center">Status Bayar</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->kategoriMobil->kategori_mobil }}</td>
                                            <td class="text-center text-capitalize">{{ $item->user->name }}</td>
                                            {{-- <td class="text-center">{{ $item->no_telp_pemesan }}</td> --}}
                                            <td class="text-center">{{ $item->nama_mobil }}</td>
                                            <td class="text-center">{{ $item->no_plat_mobil }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($item->tanggal_pesan)->format('d-m-Y') }} ||
                                                {{ $item->jam_pesan }}</td>


                                            <td class="text-center">
                                                @if ($item->status_pesan == 'PENDING')
                                                    <span class="badge bg-warning text-light p-2">
                                                        <i class="fa fa-spin fa-circle-o-notch"></i> Menunggu Cucian
                                                    </span>
                                                @elseif ($item->status_pesan == 'PROCESS')
                                                    <span class="badge bg-primary text-light p-2">Sedang Dicuci</span>
                                                @elseif ($item->status_pesan == 'SUCCESS')
                                                    <span class="badge bg-success text-light p-2">Pencucian Selesai</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($item->status_bayar == 'UNPAID')
                                                    <span class="badge bg-warning text-light">Belum Bayar</span>
                                                @elseif ($item->status_bayar == 'PAID')
                                                    <span class="badge bg-success text-light">Sudah Bayar</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                @if ($item->status_pesan == 'PROCESS' || $item->status_pesan == 'SUCCESS')
                                                @else
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
                                                            <form
                                                                action="{{ route('booking-cuci-customer.destroy', $item->id) }}"
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
                                                @endif
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
    @include('user.booking_cuci_user.edit')
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
