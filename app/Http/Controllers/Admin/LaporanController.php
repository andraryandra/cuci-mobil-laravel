<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
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
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

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
            $data = DB::table('booking_cucis')
                ->join('produk_mobils', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
                ->join('kategori_mobils', 'kategori_mobils.id', '=', 'booking_cucis.kategori_mobil_id')
                ->leftJoin('users', 'users.id', '=', 'booking_cucis.user_id')
                ->whereBetween('booking_cucis.created_at', [$tanggalAwal.' 00:00:00', $tanggalAkhir.' 23:59:59'])
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
                $user_id = $row->user_id ?? '';

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

//     public function exportBookingCuciMobilCustomPDF(Request $request)
// {
//     $tanggalAwal = $request->input('tanggal_awal');
//     $tanggalAkhir = $request->input('tanggal_akhir');

//     $filename = 'Laporan_transaksi_'.$tanggalAwal.'_'.$tanggalAkhir.'.pdf';

//     $options = new Options();
//     $options->setIsHtml5ParserEnabled(true);

//     $dompdf = new Dompdf($options);
//     $dompdf->loadHtml('<html><body><table>');

//     // Fetch the data from the tables based on date range
//     $data = DB::table('booking_cucis')
//         ->join('produk_mobils', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
//         ->join('kategori_mobils', 'kategori_mobils.id', '=', 'booking_cucis.kategori_mobil_id')
//         ->leftJoin('users', 'users.id', '=', 'booking_cucis.user_id')
//         ->whereBetween('booking_cucis.created_at', [$tanggalAwal.' 00:00:00', $tanggalAkhir.' 23:59:59'])
//         ->select(
//             'produk_mobils.id as produk_id',
//             'users.id as user_id',
//             'produk_mobils.nama_produk',
//             'produk_mobils.harga_produk',
//             'kategori_mobils.kategori_mobil',
//             'booking_cucis.nama_pemesan',
//             'booking_cucis.no_telp_pemesan',
//             'booking_cucis.nama_mobil',
//             'booking_cucis.no_plat_mobil',
//             'booking_cucis.tanggal_pesan',
//             'booking_cucis.jam_pesan',
//             'booking_cucis.status_pesan',
//             'booking_cucis.status_bayar',
//         )
//         ->get();

//     $html = '<table>';
//     $html .= '<thead><tr><th>Produk ID</th><th>User ID</th><th>Nama Produk</th><th>Harga Produk</th><th>Kategori Mobil</th><th>Nama Pemesan</th><th>No. Telp Pemesan</th><th>Nama Mobil</th><th>No. Plat Mobil</th><th>Tanggal Pesan</th><th>Jam Pesan</th><th>Status Pesan</th><th>Status Pembayaran</th></tr></thead>';
//     $html .= '<tbody>';
//     foreach ($data as $row) {
//         $user_id = $row->user_id ?? '';

//         $html .= '<tr>';
//         $html .= '<td>'.$row->produk_id.'</td>';
//         $html .= '<td>'.$user_id.'</td>';
//         $html .= '<td>'.$row->nama_produk.'</td>';
//         $html .= '<td>'.$row->harga_produk.'</td>';
//         $html .= '<td>'.$row->kategori_mobil.'</td>';
//         $html .= '<td>'.$row->nama_pemesan.'</td>';
//         $html .= '<td>'.$row->no_telp_pemesan.'</td>';
//         $html .= '<td>'.$row->nama_mobil.'</td>';
//         $html .= '<td>'.$row->no_plat_mobil.'</td>';
//         $html .= '<td>'.$row->tanggal_pesan.'</td>';
//         $html .= '<td>'.$row->jam_pesan.'</td>';
//         $html .= '<td>'.$row->status_pesan.'</td>';
//         $html .= '<td>'.$row->status_bayar.'</td>';
//         $html .= '</tr>';
//     }
//     $html .= '</tbody></table></body></html>';

//     $dompdf->loadHtml($html);
//     $dompdf->setPaper('A4', 'landscape');
//     $dompdf->render();

//     $dompdf->stream($filename, [
//         'Attachment' => true,
//     ]);
// }

    public function exportBookingCuciMobilPDF(Request $request)
    {
        // Fetch the data from the tables
        $data = DB::table('booking_cucis')
            ->join('produk_mobils', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
            ->join('kategori_mobils', 'kategori_mobils.id', '=', 'booking_cucis.kategori_mobil_id')
            ->leftJoin('users', 'users.id', '=', 'booking_cucis.user_id')
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

        // Count the number of orders in each category
        $pesananKategoriMobil = $data->groupBy('kategori_mobil')->map->count();

        // Count the number of orders for each product
        $pesananProdukMobil = $data->groupBy('nama_produk')->map->count();

        // Find the earliest and latest booking dates
        $tanggalAwalBooking = $data->min('tanggal_pesan');
        $tanggalAkhirBooking = $data->max('tanggal_pesan');

        $html = view('admin.laporan.pdf.transaction_booking_all', compact('data', 'pesananKategoriMobil', 'pesananProdukMobil', 'tanggalAwalBooking', 'tanggalAkhirBooking'))->render();

        $filename = 'Laporan_transaksi.pdf';

        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream($filename, [
            'Attachment' => true,
        ]);
    }



    public function exportBookingCuciMobilCustomPDF(Request $request)
    {
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        // Fetch the data from the tables based on date range
        $data = DB::table('booking_cucis')
            ->join('produk_mobils', 'produk_mobils.id', '=', 'booking_cucis.produk_id')
            ->join('kategori_mobils', 'kategori_mobils.id', '=', 'booking_cucis.kategori_mobil_id')
            ->leftJoin('users', 'users.id', '=', 'booking_cucis.user_id')
            ->whereBetween('booking_cucis.created_at', [$tanggalAwal . ' 00:00:00', $tanggalAkhir . ' 23:59:59'])
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

        $tanggalAwalFormatted = \Carbon\Carbon::parse($tanggalAwal)->format('d-m-Y');
        $tanggalAkhirFormatted = \Carbon\Carbon::parse($tanggalAkhir)->format('d-m-Y');

        // Count the number of orders in each category
        $pesananKategoriMobil = $data->groupBy('kategori_mobil')->map->count();

        // Count the number of orders for each product
        $pesananProdukMobil = $data->groupBy('nama_produk')->map->count();

        $html = view('admin.laporan.pdf.transaction_booking_custom', compact('data', 'tanggalAwalFormatted', 'tanggalAkhirFormatted', 'pesananKategoriMobil', 'pesananProdukMobil'))->render();

        $filename = 'Laporan_transaksi_' . $tanggalAwal . '_' . $tanggalAkhir . '.pdf';

        $options = new Options();
        $options->setIsHtml5ParserEnabled(true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        return $dompdf->stream($filename, [
            'Attachment' => true,
        ]);
    }




}
