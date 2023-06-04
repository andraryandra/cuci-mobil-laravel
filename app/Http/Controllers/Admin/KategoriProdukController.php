<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Controllers\Controller;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produk = KategoriProduk::get();
        return view('admin.kategori.kategori_produk.index', compact('kategori_produk'));
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
        $this->validate(request(),
        [
            'nama_kategori' => 'required'
        ],
        [
            'nama_kategori.required' => 'Nama Kategori tidak boleh kosong'
        ]);

        $kategori_produk = KategoriProduk::create([
            'nama_kategori' => $request->nama_kategori,
            'slug_kategori' => Str::slug($request->nama_kategori)
        ]);

        if($kategori_produk){
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
        $this->validate(request(),
        [
            'nama_kategori' => 'required'
        ],
        [
            'nama_kategori.required' => 'Nama Kategori tidak boleh kosong'
        ]);

        $kategori_produk = KategoriProduk::find($id);
        $kategori_produk->nama_kategori = $request->nama_kategori;
        $kategori_produk->slug_kategori = Str::slug($request->nama_kategori);

        if($kategori_produk->save()){
            return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->back()->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                // Delete Data
        $kategori_produk = KategoriProduk::find($id);
        if($kategori_produk->delete()){
            return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
        }else{
            return redirect()->back()->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
