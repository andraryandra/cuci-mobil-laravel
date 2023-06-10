<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BookingCuciCustomerController extends Controller
{
    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','user'])
        ->where('user_id', Auth::id())
        ->where('status_pesan', 'PENDING')->get();

        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::with(['kategoriMobil'])->get();
        return view('user.booking_cuci_user.index', compact('users','kategori_mobils','produks','bookings'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),
        [
            'user_id' => 'nullable',
            'kategori_mobil_id' => 'nullable',
            'produk_id' => 'nullable',
            // 'karyawan_id' => 'nullable',
            'nama_pemesan' => 'required',
            'no_telp_pemesan' => 'required',
            'nama_mobil' => 'required',
            'no_plat_mobil' => 'required',
            'tanggal_pesan' => 'required',
            'jam_pesan' => 'required',
            'status_pesan' => 'nullable',
            'status_bayar' => 'nullable',
        ]);

        $booking = new BookingCuci();
        $booking->user_id = $request->user_id;
        $booking->kategori_mobil_id = $request->kategori_mobil_id;
        $booking->produk_id = $request->produk_id;
        // $booking->karyawan_id = $request->karyawan_id;
        $booking->nama_pemesan = $request->nama_pemesan;
        $booking->no_telp_pemesan = $request->no_telp_pemesan;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->no_plat_mobil = $request->no_plat_mobil;
        $booking->tanggal_pesan = $request->tanggal_pesan;
        $booking->jam_pesan = $request->jam_pesan;
        $booking->status_pesan = 'PENDING';
        $booking->status_bayar = 'UNPAID';
        $booking->save();

        if($booking){
            return back()->with(['success' => 'Berhasil Booking! Terimakasih sudah Membooking Cucian Mobil kami. Harap datang tepat waktu sesuai jadwal pesan Booking.']);
        }else{
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(),
        [
            'user_id' => 'nullable',
            'kategori_mobil_id' => 'nullable',
            'produk_id' => 'nullable',
            // 'karyawan_id' => 'nullable',
            'nama_pemesan' => 'nullable',
            'no_telp_pemesan' => 'required',
            'nama_mobil' => 'required',
            'no_plat_mobil' => 'required',
            'tanggal_pesan' => 'nullable',
            'jam_pesan' => 'nullable',
            // 'status_pesan' => 'nullable',
            // 'status_bayar' => 'nullable',
        ]);

        $booking = BookingCuci::findOrFail($id);
        $booking->user_id = $request->user_id;
        $booking->kategori_mobil_id = $request->kategori_mobil_id;
        $booking->produk_id = $request->produk_id;
        // $booking->karyawan_id = $request->karyawan_id;
        $booking->nama_pemesan = Auth::id();
        $booking->no_telp_pemesan = $request->no_telp_pemesan;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->no_plat_mobil = $request->no_plat_mobil;
        // $booking->tanggal_pesan = $request->tanggal_pesan;
        // $booking->jam_pesan = $request->jam_pesan;
        // $booking->status_pesan = $request->status_pesan;
        // $booking->status_bayar = $request->status_bayar;
        $booking->save();

        if($booking){
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
}
