<?php

namespace App\Http\Controllers\LandingPage\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeLandingPageItem;
use Illuminate\Http\Request;

class HomeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home_item = HomeLandingPageItem::get();

        return view('admin.landingPage.home.item.index', compact(
            'home_item'
        ));
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image_home' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        // dd($request->all());

        $homeItem = HomeLandingPageItem::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        if ($request->hasFile('image_home')) {
            if ($request->file('image_home')->isValid()) {
                $imageBodyPath = $request->file('image_home')->store('home/homeBody', 'public');
                $homeItem->image_home = $imageBodyPath;
                $homeItem->save();
            } else {
                return back()->withErrors(['image_home' => 'Failed to upload image.']);
            }
        }


        if ($homeItem) {
            return back()->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
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
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image_home' => 'nullable|mimes:jpg,png,jpeg|max:2048',
    ]);

    $homeItem = HomeLandingPageItem::findOrFail($id);
    $homeItem->title = $request->title;
    $homeItem->content = $request->content;

    if ($request->hasFile('image_home')) {
        if ($request->file('image_home')->isValid()) {
            $imageBodyPath = $request->file('image_home')->store('home/homeBody', 'public');
            $homeItem->image_home = $imageBodyPath;
        } else {
            return back()->withErrors(['image_home' => 'Failed to upload image.']);
        }
    }

    $homeItem->save();

    if ($homeItem) {
        return back()->with(['success' => 'Data Berhasil Diperbarui!']);
    } else {
        return back()->with(['error' => 'Data Gagal Diperbarui!']);
    }
}

public function destroy($id)
{
    $homeItem = HomeLandingPageItem::findOrFail($id);

    if ($homeItem->delete()) {
        return back()->with(['success' => 'Data Berhasil Dihapus!']);
    } else {
        return back()->with(['error' => 'Data Gagal Dihapus!']);
    }
}

}
