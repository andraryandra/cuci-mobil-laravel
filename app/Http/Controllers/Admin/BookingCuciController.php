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
use Illuminate\Support\Facades\Auth;

class BookingCuciController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = BookingCuci::with(['kategoriMobil','karyawan','user'])->where('status_pesan', 'PENDING')->get();
        $users = User::get();
        $kategori_mobils = KategoriMobil::get();
        $produks = ProdukMobil::with(['kategoriMobil'])->get();
        return view('admin.booking_cuci.index', compact('bookings','users','kategori_mobils','produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        $this->validate(request(), [
            'user_id' => 'nullable',
            'kategori_mobil_id' => 'required',
            'produk_id' => 'required',
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
        $booking->status_pesan = $request->status_pesan;
        $booking->status_bayar = $request->status_bayar;


        if ($booking->save()) {
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    } catch (\Illuminate\Validation\ValidationException $e) {
        return back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        return back()->with(['error' => 'Data Gagal Disimpan!']);
    }
}





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $this->validate(request(), [
        'user_id' => 'nullable', // Remove 'required'
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
        // 'status_bayar' => 'nullable',
    ]);

    $booking = BookingCuci::findOrFail($id);
    $booking->user_id = isset($request->user_id) ? intval($request->user_id) : $booking->user_id;
    // $booking->user_id = $request->user_id ? intval($request->user_id) : null; // Set to null if user_id is empty
    $booking->kategori_mobil_id = intval($request->kategori_mobil_id);
    $booking->produk_id = intval($request->produk_id);
    // $booking->karyawan_id = $request->karyawan_id;
    $booking->nama_pemesan = $request->nama_pemesan;
    $booking->no_telp_pemesan = $request->no_telp_pemesan;
    $booking->nama_mobil = $request->nama_mobil;
    $booking->no_plat_mobil = $request->no_plat_mobil;
    $booking->tanggal_pesan = $request->tanggal_pesan;
    $booking->jam_pesan = $request->jam_pesan;
    // $booking->status_pesan = $request->status_pesan;
    // $booking->status_bayar = $request->status_bayar;
    // dd($booking);
    $booking->save();

    if ($booking) {
        return back()->with(['success' => 'Data Berhasil Disimpan!']);
    } else {
        return back()->with(['error' => 'Data Gagal Disimpan!']);
    }
}


    public function updateStatusCuci(Request $request, $id)
    {
        $this->validate(request(), [
            'status_pesan' => 'nullable',
        ]);

        try {
            DB::beginTransaction();

            $booking = BookingCuci::findOrFail($id);

            $booking->update([
                // 'karyawan_id' => $booking->karyawan_id,
                'status_pesan' => 'PROCESS',
            ]);

            DB::commit();

            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        } catch (\Exception $e) {
            DB::rollback();

            return back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // public function updateKaryawan(Request $request, $id)
    // {
    //     $this->validate(request(), [
    //         'karyawan_id' => 'nullable',
    //         'status_pesan' => 'nullable',
    //         'status' => 'nullable'
    //     ],
    // [
    //     'karyawan_id.required' => 'Karyawan Harus Dipilih!',
    //     'status_pesan.required' => 'Status Pesan Harus Dipilih!',
    //     'status.required' => 'Status Harus Dipilih!',
    // ]);

    //     try {
    //         DB::beginTransaction();

    //         $booking = BookingCuci::findOrFail($id);

    //         $booking->update([
    //             'karyawan_id' => $request->karyawan_id,
    //             'status_pesan' => 'PROCESS',
    //         ]);

    //         $statusKaryawan = StatusKaryawan::where('karyawan_id', $request->karyawan_id)->first();
    //         $statusKaryawan->status = 'ACTIVE';
    //         $statusKaryawan->save();

    //         DB::commit();

    //         if ($booking) {
    //             return back()->with(['success' => 'Data Berhasil Disimpan!']);
    //         } else {
    //             return back()->with(['error' => 'Data Gagal Disimpan!']);
    //         }
    //     } catch (\Exception $e) {
    //         DB::rollback();

    //         return back()->with(['error' => 'Data Gagal Disimpan!']);
    //     }
    // }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // hapus data
                $booking = BookingCuci::findOrFail($id);
                $booking->delete();

                if($booking){
                    return back()->with(['success' => 'Data Berhasil Dihapus!']);
                }else{
                    return back()->with(['error' => 'Data Gagal Dihapus!']);
                }
    }
}
