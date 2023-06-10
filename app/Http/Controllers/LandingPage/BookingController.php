<?php

namespace App\Http\Controllers\LandingPage;

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
        $bookings = BookingCuci::with(['kategoriMobil','produkMobil','user'])->get();
        $produk_mobil = ProdukMobil::with(['kategoriMobil'])->get();


        return view('landing_page.booking', compact(
            'kategori_mobil',
            'bookings',
            'produk_mobil',
        ));
    }
}
