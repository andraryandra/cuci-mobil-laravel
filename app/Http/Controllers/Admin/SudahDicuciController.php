<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;

class SudahDicuciController extends Controller
{
    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','karyawan','user'])
        ->where('status_pesan', 'SUCCESS')
        ->where('status_bayar', 'UNPAID')
        ->get();

        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::get();
        return view('admin.booking_cuci.SudahDicuci.sudah_dicuci', compact('bookings','users','kategori_mobils','produks'));
    }


    public function update(Request $request, $id)
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
            // 'status_pesan' => 'nullable',
            'status_bayar' => 'nullable',
        ]);

        $booking = BookingCuci::findOrFail($id);
        $booking->user_id = $request->user_id ? intval($request->user_id) : null; // Set to null if user_id is empty
        $booking->kategori_mobil_id = $request->kategori_mobil_id;
        $booking->produk_id = $request->produk_id;
        // $booking->karyawan_id = $request->karyawan_id;
        $booking->nama_pemesan = $request->nama_pemesan;
        $booking->no_telp_pemesan = $request->no_telp_pemesan;
        $booking->nama_mobil = $request->nama_mobil;
        $booking->no_plat_mobil = $request->no_plat_mobil;
        $booking->tanggal_pesan = $request->tanggal_pesan;
        $booking->jam_pesan = $request->jam_pesan;
        // $booking->status_pesan = $request->status_pesan;
        $booking->status_bayar = $request->status_bayar;
        $booking->save();

        if($booking){
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function updateStatusBayar(Request $request, $id)
    {
        $this->validate(request(),
        [
            'status_bayar' => 'nullable',
        ]);

        $booking = BookingCuci::findOrFail($id);
        $booking->status_bayar = 'PAID';
        $booking->save();

        if($booking){
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function sendWhatsAppMessage($id)
    {
        $booking = BookingCuci::findOrFail($id);
        $noTelp = $booking->no_telp_pemesan;

        // Hapus karakter selain angka dari nomor telepon
        $noTelp = preg_replace('/[^0-9]/', '', $noTelp);

        // Cek apakah nomor telepon dimulai dengan "0" (nol)
        if (substr($noTelp, 0, 1) === '0') {
            // Hapus angka 0 di depan nomor telepon
            $noTelp = substr($noTelp, 1);
        }

        $user = $booking->user;
        $namaUser = $user->name;
        $produk = $booking->produkMobil;
        $statusPesan = '';

        if ($booking->status_pesan == 'PENDING') {
            $statusPesan = 'Sedang Mengantri';
        } elseif ($booking->status_pesan == 'PROCESS') {
            $statusPesan = 'Sedang Dicuci';
        } elseif ($booking->status_pesan == 'SUCCESS') {
            $statusPesan = 'Pencucian Mobil Selesai';
        } else {
            $statusPesan = 'Status Pesan Tidak Valid';
        }

        $bookingCuciMobil =
                        "*Detail Booking Cuci Mobil:*\n" .
                        "Nama Pemesan: $namaUser\n" .
                        "Nama Mobil: " . $booking->nama_mobil . "\n" .
                        "No Plat Mobil: " . $booking->no_plat_mobil . "\n" .
                        "Tanggal Pesan: " . date('d-m-Y', strtotime($booking->tanggal_pesan)) . "\n" .
                        "Jam Pesan: " . $booking->jam_pesan . "\n" .
                        "*-------------------------------------------------------------*" . "\n" .
                        "*Status Pesan: " . $statusPesan . "*\n" .
                        "*Status Bayar: " . ($booking->status_bayar == 'PAID' ? 'Sudah Dibayar' : 'Belum Dibayar') . "*\n" .
                        "*Total Bayar: Rp " . number_format($produk->harga_produk, 0, ',', '.') . "*\n" .
                        "*-------------------------------------------------------------*". "\n";

        if ($booking->status_pesan == 'SUCCESS' && $booking->status_bayar == 'UNPAID') {
            $pesan = "Terima kasih atas kepercayaan Anda dalam menggunakan layanan kami. Cucian mobil Anda sudah selesai dicuci dengan cermat. Silahkan melakukan pembayaran.\n\n" .
                     $bookingCuciMobil;
        } else {
            $pesan = "Terima kasih atas pembayaran Anda. Cucian mobil Anda sudah selesai dicuci dengan cermat.\n\n" .
                     $bookingCuciMobil;
        }

        $url = "https://api.whatsapp.com/send?phone=" . $noTelp . "&text=" . urlencode($pesan);

        return redirect($url);
    }


}
