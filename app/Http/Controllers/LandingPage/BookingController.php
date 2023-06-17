<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $kategori_mobil = KategoriMobil::get();
        $history_bookings = BookingCuci::with(['kategoriMobil','karyawan','user','produkMobil'])->where('status_pesan', 'PENDING')->paginate(1);
        $bookings = BookingCuci::with(['kategoriMobil','produkMobil','user'])->get();
        $produk_mobil = ProdukMobil::with(['kategoriMobil'])->get();
        $users = User::get();


        return view('landing_page.booking', compact(
            'kategori_mobil',
            'bookings',
            'history_bookings',
            'produk_mobil',
            'users'
        ));
    }
}
