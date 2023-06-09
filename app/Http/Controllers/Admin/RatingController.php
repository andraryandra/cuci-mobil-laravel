<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookingCuci;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function create($booking_id)
    {
        $booking = BookingCuci::findOrFail($booking_id);
        return view('admin.rating.create', compact('booking'));
    }

    public function store(Request $request, $booking_id)
    {
        // Validasi data form
        $validatedData = $request->validate([
            'ulasan' => 'required',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // dd($request->all());

        // Simpan ulasan dan rating ke database
        $booking = BookingCuci::findOrFail($booking_id);
        $booking->ulasan = $validatedData['ulasan'];
        $booking->rating = $validatedData['rating'];
        $booking->save();

        return redirect()->back()->with('success', 'Ulasan dan rating berhasil ditambahkan');
    }

}
