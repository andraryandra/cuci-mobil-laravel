<!-- transaksi.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <!-- Include CSS styles for table -->
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        .total-row {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Laporan Transaksi</h1>

    <!-- Date Range -->
    <p>Laporan Rekapan dari {{ \Carbon\Carbon::parse($tanggalAwalBooking)->format('d-m-Y') }} sampai
        {{ \Carbon\Carbon::parse($tanggalAkhirBooking)->format('d-m-Y') }}</p>

    <!-- Table -->
    <table>
        <thead>
            <tr>
                <th>Produk ID</th>
                <th>User ID</th>
                <th>Nama Produk</th>
                <th>Harga Produk</th>
                <th>Kategori Mobil</th>
                <th>Nama Pemesan</th>
                <th>No. Telp Pemesan</th>
                <th>Nama Mobil</th>
                <th>No. Plat Mobil</th>
                <th>Tanggal Pesan</th>
                <th>Jam Pesan</th>
                <th>Status Pesan</th>
                <th>Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalHarga = 0;
                $totalKategoriMobil = [];
                $totalProdukMobil = [];
            @endphp
            @foreach ($data as $row)
                @php
                    $user_id = $row->user_id ?? '';
                    $totalHarga += $row->harga_produk;

                    // Hitung total pesanan berdasarkan kategori mobil
                    if (isset($totalKategoriMobil[$row->kategori_mobil])) {
                        $totalKategoriMobil[$row->kategori_mobil]++;
                    } else {
                        $totalKategoriMobil[$row->kategori_mobil] = 1;
                    }

                    // Hitung total pesanan berdasarkan produk mobil
                    if (isset($totalProdukMobil[$row->nama_produk])) {
                        $totalProdukMobil[$row->nama_produk]++;
                    } else {
                        $totalProdukMobil[$row->nama_produk] = 1;
                    }
                @endphp
                <tr>
                    <td>{{ $row->produk_id }}</td>
                    <td>{{ $user_id }}</td>
                    <td>{{ $row->nama_produk }}</td>
                    <td>{{ 'Rp. ' . number_format($row->harga_produk) }}</td>
                    <td>{{ $row->kategori_mobil }}</td>
                    <td>{{ $row->nama_pemesan }}</td>
                    <td>{{ $row->no_telp_pemesan }}</td>
                    <td>{{ $row->nama_mobil }}</td>
                    <td>{{ $row->no_plat_mobil }}</td>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal_pesan)->format('d-m-Y') }}</td>
                    <td>{{ $row->jam_pesan }}</td>
                    <td>{{ $row->status_pesan }}</td>
                    <td>
                        <b>
                            @if ($row->status_bayar === 'PAID')
                                Terbayar
                            @elseif($row->status_bayar === 'UNPAID')
                                Belum Terbayar
                            @else
                                <!-- Nilai status_bayar tidak diketahui -->
                                {{ $row->status_bayar }}
                            @endif
                        </b>
                    </td>
                </tr>
            @endforeach

            <tr class="total-row">
                <td colspan="3">Total Pendapatan Omset</td>
                <td colspan="10" style="text-align: center;">{{ 'Rp. ' . number_format($totalHarga) }}</td>
                {{-- <td ></td> --}}
            </tr>

        </tbody>
    </table>

    <!-- Total Pesanan per Kategori Mobil -->
    <h2>Total Pesanan per Kategori Mobil</h2>
    <table>
        <thead>
            <tr>
                <th>Kategori Mobil</th>
                <th>Total Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalKategoriMobil as $kategori => $total)
                <tr>
                    <td>{{ $kategori }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Pesanan per Produk Mobil -->
    <h2>Total Pesanan per Produk Mobil</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Total Pesanan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($totalProdukMobil as $produk => $total)
                <tr>
                    <td>{{ $produk }}</td>
                    <td style="text-align: center; font-weight: bold;">{{ $total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
