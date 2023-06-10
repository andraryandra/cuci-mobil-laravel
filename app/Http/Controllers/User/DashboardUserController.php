<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardUserController extends Controller
{
    public function index()
    {
        $users_count = User::count();
        $users_customer_count = User::where('role', '0')->count();
        $kategori_mobil_count = KategoriMobil::count();
        $produk_count = ProdukMobil::count();
        $transaksi_count = BookingCuci::where('status_bayar', 'PAID')->where('user_id', auth()->user()->id)->count();
        $total_transaksi_sum = BookingCuci::join('produk_mobils', 'booking_cucis.produk_id', '=', 'produk_mobils.id')
        ->where('booking_cucis.status_bayar', 'PAID')
        ->where('booking_cucis.user_id', auth()->user()->id)
        ->sum('produk_mobils.harga_produk');



        $usersChartData = User::select('role', DB::raw('COUNT(*) as total_users'))
            ->groupBy('role')
            ->get();

        $userRoles = $usersChartData->pluck('role')->toArray();
        $userCounts = $usersChartData->pluck('total_users')->toArray();

        $transaksiCounts = BookingCuci::where('status_bayar', 'PAID')
            ->where('user_id', auth()->user()->id)
            ->select('produk_id', DB::raw('count(*) as total'))
            ->groupBy('produk_id')
            ->pluck('total', 'produk_id')
            ->toArray();

        $produkNames = ProdukMobil::whereIn('id', array_keys($transaksiCounts))
            ->pluck('nama_produk')
            ->toArray();

        $produkPrices = ProdukMobil::whereIn('id', array_keys($transaksiCounts))
            ->pluck('harga_produk')
            ->toArray();

            $totalTransaksi = BookingCuci::join('produk_mobils', 'booking_cucis.produk_id', '=', 'produk_mobils.id')
            ->join('kategori_mobils', 'produk_mobils.kategori_mobil_id', '=', 'kategori_mobils.id')
            ->where('booking_cucis.status_bayar', 'PAID')
            ->select('kategori_mobils.kategori_mobil', DB::raw('COUNT(*) as total_transaksi'))
            ->groupBy('kategori_mobils.kategori_mobil')
            ->get();

        $kategoriLabels = $totalTransaksi->pluck('kategori_mobil')->toArray();

        $totalTransaksi = BookingCuci::join('produk_mobils', 'booking_cucis.produk_id', '=', 'produk_mobils.id')
            ->where('booking_cucis.status_bayar', 'PAID')
        ->where('booking_cucis.user_id', auth()->user()->id)
        ->select('produk_mobils.nama_produk', DB::raw('COUNT(*) as total_transaksi'))
            ->groupBy('produk_mobils.nama_produk')
            ->get();

        $produkNames = $totalTransaksi->pluck('nama_produk')->toArray();
        $totalTransaksiCounts = $totalTransaksi->pluck('total_transaksi')->toArray();

        $totalOmset = BookingCuci::join('produk_mobils', 'booking_cucis.produk_id', '=', 'produk_mobils.id')
        ->where('booking_cucis.status_bayar', 'PAID')
        ->where('booking_cucis.user_id', auth()->user()->id)
        ->groupBy('produk_mobils.nama_produk')
        ->select('produk_mobils.nama_produk', DB::raw('SUM(produk_mobils.harga_produk) as total_omset'))
        ->get();

        $kategoriLabelsProduk = $totalOmset->pluck('nama_produk')->toArray();
        $omsetData = $totalOmset->pluck('total_omset')->toArray();

        return view('user.dashboard_user', compact(
            'users_count',
            'users_customer_count',
            'userRoles',
            'userCounts',
            'kategori_mobil_count',
            'produk_count',
            'transaksi_count',
            'transaksiCounts',
            'produkNames',
            'produkPrices',
            'total_transaksi_sum',
            'totalTransaksi',
            'kategoriLabels',
            'produkNames',
            'totalTransaksiCounts',
            'kategoriLabelsProduk',
            'totalOmset',
            'omsetData'


        ));
    }
}
