@extends('layouts.app')
@section('title', 'Dashboard - Admin')
@section('contentAdmin')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Laporan Transaksi Booking Cuci Mobil</h4>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session('error') }}.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="my-3">
                                    <a href="{{ route('booking-cuci.exportCSV') }}" class="btn btn-primary">
                                        <i class="fa fa-file-excel-o mr-1"></i> All Export Customs CSV
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('booking-cuci.exportCustomCSV') }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tanggal_awal">Tanggal Awal:</label>
                                                        <input type="date" name="tanggal_awal" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="tanggal_akhir">Tanggal Akhir:</label>
                                                        <input type="date" name="tanggal_akhir" class="form-control"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Export</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    {{-- <style>
        th {
            white-space: nowrap;
            /* Menghindari pemotongan teks */
            overflow: hidden;
            /* Menyembunyikan teks yang melebihi lebar */
            text-overflow: ellipsis;
            /* Menampilkan tanda elipsis (...) untuk teks yang terpotong */
        }
    </style> --}}
@endpush

@push('script')
    <script src="{{ asset('bootstrap5-3/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('option[value=""]').css('display', 'none');
        });
    </script>

    {{-- <script>
    $(document).ready(function() {
        $('.table').DataTable({
            "paging": true, // Aktifkan pagination
            "searching": true, // Aktifkan fitur pencarian
            "ordering": true, // Aktifkan pengurutan kolom
            "info": true, // Tampilkan informasi halaman
            "lengthMenu": [10, 25, 50, 75, 100], // Opsi jumlah baris per halaman
            "language": {
                "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(disaring dari _MAX_ total baris)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script> --}}
@endpush
