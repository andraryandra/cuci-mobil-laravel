<?php

namespace App\Http\Controllers\Admin;

// use PDF;
// use Barryvdh\DomPDF\Facade as PDF;
use Dompdf\Dompdf;
use App\Models\User;
// use Barryvdh\DomPDF\PDF;
use App\Models\BookingCuci;
use App\Models\ProdukMobil;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class TransactionBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','karyawan','user'])
        ->where('status_pesan', 'SUCCESS')
        ->where('status_bayar', 'PAID')
        ->get();

        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::get();
        return view('admin.transaksi.index', compact('bookings','users','kategori_mobils','produks'));
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

    public function sendWhatsAppMessageTransaction($id)
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

        $bookingCuciMobil = "Cucian mobil Anda sudah selesai dicuci dengan cermat. Terima kasih, $namaUser!\n\n" .
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

        $pesan = "$bookingCuciMobil\n" .
                "Terima kasih atas kepercayaan Anda dalam menggunakan layanan kami. Kami mengundang Anda untuk datang kembali dan merasakan pengalaman yang luar biasa bersama kami. Kami akan dengan senang hati melayani Anda dengan layanan terbaik kami.";

        $url = "https://api.whatsapp.com/send?phone=" . $noTelp . "&text=" . urlencode($pesan);

        return redirect($url);
    }


    public function ExportPDFTransaction($id)
    {
        $booking = BookingCuci::with('kategoriMobil', 'produkMobil')->findOrFail($id);

        // Generate nama file PDF
        $fileName = 'Kwitansi_' . $booking->user->name . '_' . date('d-m-Y', strtotime($booking->created_at)) . '.pdf';

        // Buat instance Dompdf
        $dompdf = new Dompdf();

        // Render tampilan ke dalam PDF
        $html = View::make('admin.transaksi.kwitansi', compact('booking'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Mengunduh file PDF
        $dompdf->stream($fileName);
    }

    public function destroy($id)
    {
        $booking = BookingCuci::findOrFail($id);
        $booking->delete();

        if($booking){
            return back()->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return back()->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
