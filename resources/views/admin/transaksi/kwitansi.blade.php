<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Kwitansi Transaksi</title>
    <style>
        /* Gaya CSS untuk kwitansi */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .header {
            text-align: left;
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .info {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .table th {
            font-weight: bold;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            text-align: right;
        }

        .thanks {
            margin-top: 30px;
            text-align: center;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1 class="title" style="text-align: center;">Kwitansi Transaksi</h1>
    <div class="header">
        <p class="info"><b>Detail Info Pemesanan:</b></p>
        <p class="info">Booking ID: {{ $booking->id }}</p>
        <p class="info">Nama Pelanggan: {{ $booking->user->name }}</p>
        <p class="info">Kategori Mobil: {{ $booking->kategoriMobil->kategori_mobil }}</p>
        <p class="info">Nama Mobil: {{ $booking->nama_mobil }}</p>
        <p class="info">No Plat Mobil: {{ $booking->no_plat_mobil }}</p>
        <p class="info">No Telepon Pelanggan: {{ $booking->no_telp_pemesan }}</p>
        <p class="info">Tanggal Booking: {{ $booking->created_at->format('d-m-Y') }} || {{ $booking->jam_pesan }}</p>

        <p class="info">Status Booking: {{ $booking->status_pesan }}</p>

        <p class="info">Status Pembayaran: {{ $booking->status_bayar }}</p>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $booking->produkMobil->nama_produk }}</td>
                <td>Rp. {{ number_format($booking->produkMobil->harga_produk, 0, ',', '.') }}</td>
                <td>1</td>
                <td>Rp. {{ number_format($booking->produkMobil->harga_produk, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <div class="total">
        Total: Rp. {{ number_format($booking->produkMobil->harga_produk, 0, ',', '.') }}
    </div>

    <div class="thanks">
        Terimakasih atas transaksi Anda. Kami sangat menghargai kepercayaan Anda dan kami harap dapat
        melayani Anda kembali di masa mendatang.
    </div>
</body>

</html>
