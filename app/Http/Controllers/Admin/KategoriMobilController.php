<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriMobil;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KategoriMobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_mobil = KategoriMobil::get();
        return view('admin.kategori.kategori_mobil.index', compact('kategori_mobil'));
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
        $this->validate($request,
        [
            'kategori_mobil' => 'required',
            'gambar_kategori_mobil' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ],
        [
            'kategori_mobil.required' => 'Nama Kategori Mobil tidak boleh kosong',
            'gambar_kategori_mobil.image' => 'File harus berupa gambar',
            'gambar_kategori_mobil.mimes' => 'File harus berupa gambar',
            'gambar_kategori_mobil.max' => 'Ukuran file maksimal 2MB',
        ]);

        $kategori_mobils = KategoriMobil::create([
            'kategori_mobil' => $request->kategori_mobil,
            'slug_kategori_mobil' => Str::slug($request->kategori_mobil)
        ]);

        if ($request->hasFile('gambar_kategori_mobil')) {
            if ($request->file('gambar_kategori_mobil')->isValid()) {
                $kategoriPath = $request->file('gambar_kategori_mobil')->store('kategori', 'public');
                $kategori_mobils->gambar_kategori_mobil = $kategoriPath;
                $kategori_mobils->save();
            } else {
                return back()->withErrors(['gambar_kategori_mobil' => 'Failed to upload image.']);
            }
        }

        $kategori_mobils->save();

        // dd($kategori_mobils);

        if($kategori_mobils){
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
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
        $this->validate($request,
            [
                'kategori_mobil' => 'required',
                'gambar_kategori_mobil' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            ],
            [
                'kategori_mobil.required' => 'Nama Kategori Mobil tidak boleh kosong',
                'gambar_kategori_mobil.image' => 'File harus berupa gambar',
                'gambar_kategori_mobil.mimes' => 'File harus berupa gambar',
                'gambar_kategori_mobil.max' => 'Ukuran file maksimal 2MB',
            ]);

        $kategori_mobil = KategoriMobil::findOrFail($id);
        $kategori_mobil->kategori_mobil = $request->kategori_mobil;
        $kategori_mobil->slug_kategori_mobil = Str::slug($request->kategori_mobil);

        if ($request->hasFile('gambar_kategori_mobil')) {
            // Menghapus gambar kategori mobil yang lama jika ada
            if ($kategori_mobil->gambar_kategori_mobil) {
                Storage::disk('public')->delete($kategori_mobil->gambar_kategori_mobil);
            }

            $gambar_kategori_mobilPath = $request->file('gambar_kategori_mobil')->store('kategori', 'public');
            $kategori_mobil->gambar_kategori_mobil = $gambar_kategori_mobilPath;
        }

        $kategori_mobil->save();

        if ($kategori_mobil) {
            return redirect()->back()->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Diperbarui!']);
        }
    }

    public function destroy($id)
    {
        $kategori_mobil = KategoriMobil::findOrFail($id);

        // Menghapus gambar kategori mobil jika ada
        if ($kategori_mobil->gambar_kategori_mobil) {
            Storage::disk('public')->delete($kategori_mobil->gambar_kategori_mobil);
        }

        $kategori_mobil->delete();

        if ($kategori_mobil) {
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

}
