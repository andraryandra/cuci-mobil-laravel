<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMobil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function produkMobil()
    {
        return $this->hasMany(ProdukMobil::class, 'kategori_mobil_id', 'id');
    }

    public function bookingCuci()
    {
        return $this->hasMany(BookingCuci::class, 'kategori_mobil_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
