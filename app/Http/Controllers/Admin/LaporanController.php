<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LaporanController extends Controller
{

    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','produkMobil','karyawan','user'])
        ->where('status_pesan', 'SUCCESS')
        ->where('status_bayar', 'PAID')
        ->get();

        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::get();

        return view('admin.laporan.index', compact('bookings','users','kategori_mobils','produks'));
    }

    public function exportBookingCuciMobilCSV()
{
    $filename = 'Laporan_all_transaksi.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () {
        $handle = fopen('php://output', 'w');

        // Write the CSV headers
        fputcsv($handle, [
            'Produk ID',
            'User ID',
            'Nama Produk',
            'Harga Produk',
            'Kategori Mobil',
            'Nama Pemesan',
            'No. Telp Pemesan',
            'Nama Mobil',
            'No. Plat Mobil',
            'Tanggal Pesan',
            'Jam Pesan',
            'Status Pesan',
            'Status Pembayaran',
        ]);

        // Fetch the data from the tables
        $data = DB::table('produk_mobils')
            ->join('booking_cucis', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
            ->join('kategori_mobils', 'booking_cucis.kategori_mobil_id', '=', 'kategori_mobils.id')
            ->leftJoin('users', 'booking_cucis.user_id', '=', 'users.id') // Use leftJoin instead of join
            ->select(
                'produk_mobils.id as produk_id',
                'users.id as user_id',
                'produk_mobils.nama_produk',
                'produk_mobils.harga_produk',
                'kategori_mobils.kategori_mobil',
                'booking_cucis.nama_pemesan',
                'booking_cucis.no_telp_pemesan',
                'booking_cucis.nama_mobil',
                'booking_cucis.no_plat_mobil',
                'booking_cucis.tanggal_pesan',
                'booking_cucis.jam_pesan',
                'booking_cucis.status_pesan',
                'booking_cucis.status_bayar',
            )
            ->get();

        // Write the data rows to the CSV
        foreach ($data as $row) {
            $user_id = $row->user_id ?? ''; // Use null coalescing operator to handle null user_id

            fputcsv($handle, [
                $row->produk_id,
                $user_id,
                $row->nama_produk,
                $row->harga_produk,
                $row->kategori_mobil,
                $row->nama_pemesan,
                $row->no_telp_pemesan,
                $row->nama_mobil,
                $row->no_plat_mobil,
                $row->tanggal_pesan,
                $row->jam_pesan,
                $row->status_pesan,
                $row->status_bayar,
            ]);
        }

        fclose($handle);
    };

    return new StreamedResponse($callback, 200, $headers);
}



    public function exportBookingCuciMobilCustomCSV(Request $request)
{
    $tanggalAwal = Carbon::parse($request->input('tanggal_awal'))->startOfDay();
    $tanggalAkhir = Carbon::parse($request->input('tanggal_akhir'))->endOfDay();

    $filename = 'Laporan_transaksi_'.$tanggalAwal.'_'.$tanggalAkhir.'.csv';

    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    $callback = function () use ($tanggalAwal, $tanggalAkhir) {
        $handle = fopen('php://output', 'w');

        // Write the CSV headers
        fputcsv($handle, [
            'Produk ID',
            'User ID',
            'Nama Produk',
            'Harga Produk',
            'Kategori Mobil',
            'Nama Pemesan',
            'No. Telp Pemesan',
            'Nama Mobil',
            'No. Plat Mobil',
            'Tanggal Pesan',
            'Jam Pesan',
            'Status Pesan',
            'Status Pembayaran',
        ]);

        // Fetch the data from the tables based on date range
        // Fetch the data from the tables
        $data = DB::table('produk_mobils')
            ->join('booking_cucis', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
            ->join('kategori_mobils', 'booking_cucis.kategori_mobil_id', '=', 'kategori_mobils.id')
            ->leftJoin('users', 'booking_cucis.user_id', '=', 'users.id') // Use leftJoin instead of join
            ->select(
                'produk_mobils.id as produk_id',
                'users.id as user_id',
                'produk_mobils.nama_produk',
                'produk_mobils.harga_produk',
                'kategori_mobils.kategori_mobil',
                'booking_cucis.nama_pemesan',
                'booking_cucis.no_telp_pemesan',
                'booking_cucis.nama_mobil',
                'booking_cucis.no_plat_mobil',
                'booking_cucis.tanggal_pesan',
                'booking_cucis.jam_pesan',
                'booking_cucis.status_pesan',
                'booking_cucis.status_bayar',
            )
            ->get();

        // Write the data rows to the CSV
        foreach ($data as $row) {
            $user_id = $row->user_id ?? ''; // Use null coalescing operator to handle null user_id

            fputcsv($handle, [
                $row->produk_id,
                $user_id,
                $row->nama_produk,
                $row->harga_produk,
                $row->kategori_mobil,
                $row->nama_pemesan,
                $row->no_telp_pemesan,
                $row->nama_mobil,
                $row->no_plat_mobil,
                $row->tanggal_pesan,
                $row->jam_pesan,
                $row->status_pesan,
                $row->status_bayar,
            ]);
        }

        fclose($handle);
    };

    return new StreamedResponse($callback, 200, $headers);
}

}
