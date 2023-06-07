<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Models\StatusKaryawan;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SedangDicuciController extends Controller
{
    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','karyawan','user'])->where('status_pesan', 'PROCESS')->get();
        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::get();
        return view('admin.booking_cuci.sedangDicuci.sedang_dicuci', compact('bookings','users','kategori_mobils','produks'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(request(),
        [
            'user_id' => 'nullable',
            'kategori_mobil_id' => 'nullable',
            'produk_id' => 'nullable',
            'karyawan_id' => 'nullable',
            'nama_pemesan' => 'nullable',
            'no_telp_pemesan' => 'required',
            'nama_mobil' => 'required',
            'no_plat_mobil' => 'required',
            'tanggal_pesan' => 'required',
            'jam_pesan' => 'required',
            'status_pesan' => 'nullable',
            'status_bayar' => 'nullable',
        ]);

        $booking = BookingCuci::findOrFail($id);
        $booking->user_id = $request->user_id;
        $booking->kategori_mobil_id = $request->kategori_mobil_id;
        $booking->produk_id = $request->produk_id;
        $booking->karyawan_id = $request->karyawan_id;
        $booking->nama_pemesan = $request->user_id;
        $booking->no_telp_pemesan = $request->no_telp_pemesan;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->no_plat_mobil = $request->no_plat_mobil;
        $booking->tanggal_pesan = $request->tanggal_pesan;
        $booking->jam_pesan = $request->jam_pesan;
        $booking->status_pesan = $request->status_pesan;
        $booking->status_bayar = $request->status_bayar;
        $booking->save();

        if($booking){
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function updateStatusCuci(Request $request, $id)
    {
        $this->validate(request(), [
            'karyawan_id' => 'nullable',
            'status_pesan' => 'nullable',
            'status' => 'nullable'
        ]);

        try {
            DB::beginTransaction();

            $booking = BookingCuci::findOrFail($id);

            $booking->update([
                'karyawan_id' => $booking->karyawan_id,
                'status_pesan' => 'SUCCESS',
            ]);

            if ($booking->karyawan_id) {
                $statusKaryawan = StatusKaryawan::where('karyawan_id', $booking->karyawan_id)->first();
                if ($statusKaryawan) {
                    $statusKaryawan->status = 'INACTIVE';
                    $statusKaryawan->save();
                }
            }

            DB::commit();

            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }




}
