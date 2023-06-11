<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function index()
    {
        $kategori_mobil = KategoriMobil::get();

        return view('layouts.component_landingpage.footer',compact(
                'kategori_mobil'
            ));
    }
}
