<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProdukMobil;
use App\Models\KategoriMobil;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingCuci extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'karyawan_id', 'id');
    }

    public function statusKaryawan()
    {
        return $this->hasMany(StatusKaryawan::class, 'karyawan_id', 'id');
    }

    public function kategoriMobil()
    {
        return $this->belongsTo(KategoriMobil::class, 'kategori_mobil_id', 'id');
    }

    public function produkMobil()
    {
        return $this->belongsTo(ProdukMobil::class, 'produk_id', 'id');
    }



}
