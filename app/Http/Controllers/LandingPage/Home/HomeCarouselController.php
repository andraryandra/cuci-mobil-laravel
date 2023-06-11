<?php

namespace App\Http\Controllers\LandingPage\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeLandingPageCarousel;
use Illuminate\Support\Facades\Storage;

class HomeCarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carousel = HomeLandingPageCarousel::get();

        return view('admin.landingPage.home.carousel.index', compact(
            'carousel'
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
            'header_carousel' => 'required',
            'sub_header_carousel' => 'required',
            'image_carousel' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // dd($request->all());

        $carousels = HomeLandingPageCarousel::create([
            'header_carousel' => $request->header_carousel,
            'sub_header_carousel' => $request->sub_header_carousel,
        ]);

        if ($request->hasFile('image_carousel')) {
            if ($request->file('image_carousel')->isValid()) {
                $imagePath = $request->file('image_carousel')->store('home/carousel', 'public');
                $carousels->image_carousel = $imagePath;
                $carousels->save();
            } else {
                return back()->withErrors(['image_carousel' => 'Failed to upload image.']);
            }
        }


        if ($carousels) {
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
        'header_carousel' => 'required',
        'sub_header_carousel' => 'required',
        'image_carousel' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $carousel = HomeLandingPageCarousel::findOrFail($id);

    $carousel->header_carousel = $request->header_carousel;
    $carousel->sub_header_carousel = $request->sub_header_carousel;

    if ($request->hasFile('image_carousel')) {
        if ($request->file('image_carousel')->isValid()) {
            // Delete old image
            Storage::disk('public')->delete($carousel->image_carousel);

            $imagePath = $request->file('image_carousel')->store('home/carousel', 'public');
            $carousel->image_carousel = $imagePath;
        } else {
            return back()->withErrors(['image_carousel' => 'Failed to upload image.']);
        }
    }

    $carousel->save();

    return back()->with(['success' => 'Data Berhasil Diupdate!']);
}

public function destroy($id)
{
    $carousel = HomeLandingPageCarousel::findOrFail($id);

    // Delete image
    Storage::disk('public')->delete($carousel->image_carousel);

    $carousel->delete();

    return back()->with(['success' => 'Data Berhasil Dihapus!']);
}

}
