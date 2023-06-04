<?php

namespace App\Models;

use App\Models\User;
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

    public function kategori_mobil()
    {
        return $this->belongsTo(KategoriMobil::class, 'kategori_mobil_id', 'id');
    }
}
