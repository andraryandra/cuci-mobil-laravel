<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $kategori_mobil = KategoriMobil::get();

        return view('landing_page.services', compact(
            'kategori_mobil',
        ));
    }
}
