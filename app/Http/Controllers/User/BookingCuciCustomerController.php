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
        $user_id = Auth::id();

        $bookings = BookingCuci::with(['kategoriMobil', 'user'])
            ->where(function ($query) use ($user_id) {
                if ($user_id) {
                    $query->where('user_id', $user_id);
                }
            })
            ->whereIn('status_pesan', ['PENDING', 'PROCESS','SUCCESS'])
            ->whereIn('status_bayar', ['UNPAID'])
            ->get();

        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::with(['kategoriMobil'])->get();

        return view('user.booking_cuci_user.index', compact('users', 'kategori_mobils', 'produks', 'bookings'));
    }



    public function store(Request $request)
{
    try {
        $this->validate(request(), [
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
        ], [
            'kategori_mobil_id.required' => 'Kategori Mobil Harus Diisi!',
            'produk_id.required' => 'Produk Harus Diisi!',
            // 'karyawan_id.required' => 'Karyawan Harus Diisi!',
            'nama_pemesan.required' => 'Nama Pemesan Harus Diisi!',
            'no_telp_pemesan.required' => 'No Telp Pemesan Harus Diisi!',
            'nama_mobil.required' => 'Nama Mobil Harus Diisi!',
            'no_plat_mobil.required' => 'No Plat Mobil Harus Diisi!',
            'tanggal_pesan.required' => 'Tanggal Pesan Harus Diisi!',
            'jam_pesan.required' => 'Jam Pesan Harus Diisi!',
        ]);

        $booking = new BookingCuci();
        $booking->user_id = Auth::check() ? Auth::id() : null;
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

        if ($booking) {
            return back()->with(['success' => 'Berhasil Booking! Terimakasih sudah Membooking Cucian Mobil kami. Harap datang tepat waktu sesuai jadwal pesan Booking.']);
        } else {
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    } catch (\Exception $e) {
        return back()->with(['error' => 'Terjadi kesalahan dalam memproses permintaan. Kesalahan ini terjadi biasanya terjadi karena anda belum memilih tipe kategori mobil / pesanan cucian mobil.']);
    }
}


public function update(Request $request, $id)
{
    try {
        $this->validate(request(), [
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
        ], [
            'kategori_mobil_id.required' => 'Kategori Mobil Harus Diisi!',
            'produk_id.required' => 'Produk Harus Diisi!',
            // 'karyawan_id.required' => 'Karyawan Harus Diisi!',
            'nama_pemesan.required' => 'Nama Pemesan Harus Diisi!',
            'no_telp_pemesan.required' => 'No Telp Pemesan Harus Diisi!',
            'nama_mobil.required' => 'Nama Mobil Harus Diisi!',
            'no_plat_mobil.required' => 'No Plat Mobil Harus Diisi!',
            'tanggal_pesan.required' => 'Tanggal Pesan Harus Diisi!',
            'jam_pesan.required' => 'Jam Pesan Harus Diisi!',
        ]);

        $booking = BookingCuci::find($id);
        if (!$booking) {
            return back()->with(['error' => 'Booking not found!']);
        }
        $booking->user_id = isset($request->user_id) ? intval($request->user_id) : $booking->user_id;

        // $booking->user_id = Auth::check() ? Auth::id() : null;
        $booking->kategori_mobil_id = $request->kategori_mobil_id;
        $booking->produk_id = $request->produk_id;
        // $booking->karyawan_id = $request->karyawan_id;
        $booking->nama_pemesan = $request->nama_pemesan;
        $booking->no_telp_pemesan = $request->no_telp_pemesan;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->no_plat_mobil = $request->no_plat_mobil;
        $booking->tanggal_pesan = $request->tanggal_pesan;
        $booking->jam_pesan = $request->jam_pesan;
        // $booking->status_pesan = 'PENDING';
        // $booking->status_bayar = 'UNPAID';

        $booking->save();

        if ($booking) {
            return back()->with(['success' => 'Berhasil memperbarui data booking!']);
        } else {
            return back()->with(['error' => 'Gagal memperbarui data booking!']);
        }
    } catch (\Exception $e) {
        return back()->with(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
    }
}

}
