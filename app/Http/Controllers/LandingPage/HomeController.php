<?php

namespace App\Http\Controllers\LandingPage;

use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Models\ContactLandingPage;
use App\Models\HomeLandingPageItem;
use App\Http\Controllers\Controller;
use App\Models\HomeLandingPageCarousel;

class HomeController extends Controller
{
    public function index()
    {
        $contacts = ContactLandingPage::get();
        $kategori_mobil = KategoriMobil::get();
        $bookings = BookingCuci::with(['kategoriMobil','produkMobil','user'])->get();
        $produk_mobil = ProdukMobil::with(['kategoriMobil'])->get();
        $carousel = HomeLandingPageCarousel::get();
        $home_item = HomeLandingPageItem::get();



        return view('landing_page.landingPage', compact(
            'contacts',
            'kategori_mobil',
            'bookings',
            'produk_mobil',
            'carousel',
            'home_item'
        ));
    }

    public function CarouselLandingPage()
    {
        $carousel = HomeLandingPageCarousel::get();

        return view('layouts.landing-page', compact(
            'carousel'
        ));
    }
}
